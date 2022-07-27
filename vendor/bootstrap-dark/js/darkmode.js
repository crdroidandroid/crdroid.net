// get base domain to fix nginx/apache rewrite rules
var url = window.location.protocol + "//" + location.host.split(":")[0];

// unique identifier
const LOCAL_STORAGE_KEY = "toggle-bootstrap-theme";
const LOCAL_META_DATA = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY));

// path to dark theme bootstrap css used
const DARK_THEME_PATH = url + "/vendor/bootstrap-dark/css/bootstrap.min.css";
const DARK_STYLE_LINK = document.getElementById("dark-theme-style");
const THEME_TOGGLER = document.getElementById("theme-toggler");

let isDark = LOCAL_META_DATA && LOCAL_META_DATA.isDark;

if (isDark) {
	enableDarkTheme();
} else {
	disableDarkTheme();
}

function toggleTheme() {
  isDark = !isDark;
  if (isDark) {
    enableDarkTheme();
  } else {
    disableDarkTheme();
  }
  const META = { isDark };
  localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(META));
}

function enableDarkTheme() {
  DARK_STYLE_LINK.setAttribute("href", DARK_THEME_PATH);
  THEME_TOGGLER.innerHTML = "<span class='switcher'><i class='bx bxs-sun'></i></span>";
  var elements = document.getElementsByClassName('footer-top'); // get all elements
	for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#151515";
	}
  elements = document.getElementsByClassName('devicename')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.color = "#cdcdcd";
	}
  elements = document.getElementsByClassName('changelogTXT')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#232323";
    elements[i].style.color = "#fff";
	}
  elements = document.getElementsByClassName('footerbg')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#222";
	}
  elements = document.getElementsByClassName('form-control')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#181818";
	}
  elements = document.getElementsByClassName('blogbg')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#181818";
	}
  elements = document.getElementsByClassName('FAQ-element')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#191919";
	}
  var j = 0;
  elements = document.getElementsByClassName('gallery-lightbox')
  for(var i = 0, j = 0; i < elements.length; i++){
    if(i < 9)
      elements[i].href="img/gallery/gallery_dark-"+(i+1)+".webp";
    else {
      elements[i].href="img/gallery/gallery_dark-"+(j+1)+".webp";
      j++;
    }
	}
  elements = document.getElementsByClassName('screenshots-gallery')
  for(var i = 0, j = 0; i < elements.length; i++){
    if(i < 9)
      elements[i].src="img/gallery/gallery_dark-"+(i+1)+".webp";
    else {
      elements[i].src="img/gallery/gallery_dark-"+(j+1)+".webp";
      j++;
    }
  }
}

function disableDarkTheme() {
  DARK_STYLE_LINK.setAttribute("href", "");
  THEME_TOGGLER.innerHTML = "<span class='switcher'><i class='bx bxs-moon' ></i></span>";
  var elements = document.getElementsByClassName('footer-top'); // get all elements
	for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#fff";
	}
  elements = document.getElementsByClassName('devicename')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.color = "#585a61";
	}
  elements = document.getElementsByClassName('changelogTXT')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#fff";
    elements[i].style.color = "#000";
	}
  elements = document.getElementsByClassName('footerbg')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#eff2f8";
	}
  elements = document.getElementsByClassName('form-control')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#fff";
	}
  elements = document.getElementsByClassName('blogbg')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#e8ecf5";
	}
  elements = document.getElementsByClassName('FAQ-element')
  for(var i = 0; i < elements.length; i++){
		elements[i].style.backgroundColor = "#f5f5f5";
	}
  var j;
  elements = document.getElementsByClassName('gallery-lightbox')
  for(var i = 0, j = 0; i < elements.length; i++){
    if(i < 9)
       elements[i].href="img/gallery/gallery-"+(i+1)+".webp";
    else {
      elements[i].href="img/gallery/gallery-"+(j+1)+".webp";
      j++;
    }
  }
  elements = document.getElementsByClassName('screenshots-gallery')
  for(var i = 0, j = 0; i < elements.length; i++){
    if(i < 9)
      elements[i].src="img/gallery/gallery-"+(i+1)+".webp";
    else {
      elements[i].src="img/gallery/gallery-"+(j+1)+".webp";
      j++;
    }
  }
}
