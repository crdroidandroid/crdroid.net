import requests
from bs4 import BeautifulSoup
from urllib.parse import urljoin, urlparse
import xml.etree.ElementTree as ET
from tqdm import tqdm
from xml.dom import minidom

# Site URL and base setup
base_url = 'https://crdroid.net'
visited_urls = set()
url_priority_list = []  # Store URLs with calculated priorities

priority_map = {
    0: 1.00,  # Home page
    1: 0.80,  # Main sections
    2: 0.64,  # Subpages
    3: 0.50,  # Deeper pages
}
image_extensions = {'.jpg', '.jpeg', '.png', '.gif', '.bmp', '.svg', '.webp'}

def calculate_priority(url):
    if url == base_url:
        return 1.00
    path_depth = len(urlparse(url).path.strip('/').split('/'))
    return priority_map.get(path_depth, 0.30)

def fetch_urls(url):
    try:
        response = requests.get(url)
        soup = BeautifulSoup(response.text, 'html.parser')
        page_urls = {urljoin(base_url, a['href']) for a in soup.find_all('a', href=True)}
        # Filter out image URLs and URLs containing a hash
        return {
            u for u in page_urls
            if base_url in u and
            u not in visited_urls and
            not u.lower().endswith(tuple(image_extensions)) and
            '#' not in u  # Exclude URLs with #
        }
    except Exception as e:
        print(f"Error fetching URLs from {url}: {e}")
        return set()

def prettify_xml(element):
    rough_string = ET.tostring(element, 'utf-8')
    reparsed = minidom.parseString(rough_string)
    return reparsed.toprettyxml(indent="  ")

def generate_sitemap(url):
    urls_to_visit = {url}
    main_bar = tqdm(total=len(urls_to_visit), desc="Generating:", position=0, leave=True, bar_format="{desc} {percentage:3.0f}%|{bar}|")
    status_bar = tqdm(total=0, position=1, bar_format="Crawling: {elapsed}{postfix}")

    while urls_to_visit:
        current_url = urls_to_visit.pop()
        visited_urls.add(current_url)
        main_bar.update(1)
        main_bar.total = len(visited_urls) + len(urls_to_visit)
        main_bar.refresh()
        status_bar.set_postfix(url=current_url, refresh=True)

        priority = calculate_priority(current_url)
        url_priority_list.append((current_url, priority))  # Add URL and its priority to the list

        new_urls = fetch_urls(current_url)
        urls_to_visit.update(new_urls - visited_urls)

    main_bar.close()
    status_bar.close()

    # Sort URLs by priority in descending order
    url_priority_list.sort(key=lambda x: x[1], reverse=True)

    # Generate XML from sorted URLs
    root = ET.Element('urlset', xmlns="http://www.sitemaps.org/schemas/sitemap/0.9")
    for url, priority in url_priority_list:
        url_element = ET.SubElement(root, 'url')
        ET.SubElement(url_element, 'loc').text = url
        ET.SubElement(url_element, 'changefreq').text = 'hourly'
        ET.SubElement(url_element, 'priority').text = str(priority)

    pretty_xml = prettify_xml(root)
    with open('sitemap.xml', 'w', encoding='UTF-8') as file:
        file.write(pretty_xml)
    print("Sitemap generated as sitemap.xml")

# Run the sitemap generator
generate_sitemap(base_url)
