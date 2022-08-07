(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
		return [...document.querySelectorAll(el)]
    } else {
		if (el != ''){
			return document.querySelector(el)
		}
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  let navbarlinks = select('#navbar .scrollto', true)
  const navbarlinksActive = () => {
    let position = window.scrollY + 200
    navbarlinks.forEach(navbarlink => {
      if (!navbarlink.hash) return
      let section = select(navbarlink.hash)
      if (!section) return
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        navbarlink.classList.add('active')
      } else {
        navbarlink.classList.remove('active')
      }
    })
  }
  window.addEventListener('load', navbarlinksActive)
  onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight
    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    const headerScrolled = () => {
      const LOCAL_STORAGE_KEY = "toggle-bootstrap-theme";
      const LOCAL_META_DATA = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY));
      let isDark = LOCAL_META_DATA && LOCAL_META_DATA.isDark;
      if (window.scrollY > 100) {
        if (isDark) {
          selectHeader.classList.add('header-scrolled-dark')
        }else{
          selectHeader.classList.add('header-scrolled')
        }
      } else {
        selectHeader.classList.remove('header-scrolled')
        selectHeader.classList.remove('header-scrolled-dark')
      }
    }
    window.addEventListener('load', headerScrolled)
    onscroll(document, headerScrolled)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Gallery Slider
   */
  new Swiper('.gallery-slider', {
    speed: 400,
    loop: true,
    centeredSlides: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 30
      },
      640: {
        slidesPerView: 3,
        spaceBetween: 30
      },
      992: {
        slidesPerView: 5,
        spaceBetween: 30
      },
      1200: {
        slidesPerView: 7,
        spaceBetween: 30
      }
    }
  });

  /**
   * Initiate gallery lightbox 
   */
  const galleryLightbox = GLightbox({
    selector: '.gallery-lightbox'
  });

  /**
   * Testimonials slider
   */
  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },

      1200: {
        slidesPerView: 2,
        spaceBetween: 40
      }
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  });

})()

const wrapper = document.querySelector(".blocker-wrapper");
const button = wrapper.querySelector("button");
const btnlayer = wrapper.querySelector(".bg-layer");

button.disabled = true;
document.getElementById("dl-ads").style.display = "none";
document.getElementById("dl-links").style.display = 'none';
button.addEventListener("click", ()=>{
  wrapper.classList.remove("show");
  setCookie();
});

async function detectAdBlock() {
  let adBlockEnabled = false
  const googleAdUrl = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'
  try {
    await fetch(new Request(googleAdUrl)).catch(_ => adBlockEnabled = true)
  } catch (e) {
    adBlockEnabled = true
  } finally {
    console.log(`AdBlock Enabled: ${adBlockEnabled}`)
  }
  if (adBlockEnabled == true) {
    let ads = getCookie();
    if (ads == "yes"){
      wrapper.classList.remove("show");
    }else{
      wrapper.classList.add("show");
    }
    document.getElementById("dl-ads").style.display = "inherit";
    runCounter();
    runDLCounter();
  }else{
    wrapper.classList.remove("show");
    document.getElementById("dl-links").style.display = 'inherit';
  }
}

function setCookie(){
  var now = new Date();
  now.setTime(now.getTime() + 1 * 300 * 1000);
  document.cookie = "adsaway=yes; expires=" + now.toUTCString() + "; path=/";
}

function getCookie(){
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  let ads = "adsaway=";
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(ads) == 0) {
      return c.substring(ads.length, c.length);
    }
  }
  return "";
}

function runCounter() {
  var count=5;
  var counter=setInterval(timer, 1000);
  function timer()
  {
    count=count-1;
    if (count <= 0)
    {
      clearInterval(counter);
      document.getElementById("timed").innerHTML="Okay, I'll Whitelist";
      button.disabled = false;
      btnlayer.classList.remove("disable");
      return;
    }
    document.getElementById("timed").innerHTML="Please wait " + count + " seconds...";
  }
}

function runDLCounter() {
  var count=7;
  var counter=setInterval(timer, 1000);
  function timer()
  {
    count=count-1;
    if (count <= 0)
    {
      clearInterval(counter);
      document.getElementById("dl-ads").remove();
      document.getElementById("dl-links").style.display = 'inherit';
      return;
    }
    document.getElementById("dl-ads").innerHTML="Please disable adblock to download faster (" + count + ")";
    document.getElementById("dl-links").style.display = 'none';
  }
}

detectAdBlock()