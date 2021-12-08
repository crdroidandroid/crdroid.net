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
}

// check browser level dark mode
// Check to see if Media-Queries are supported
if (window.matchMedia) {
	// Check if the dark-mode Media-Query matches
	if(window.matchMedia('(prefers-color-scheme: dark)').matches){
		//dark theme on
		//check if user defined specific use of dark mode from previous visit
		if (isDark == null) {
			enableDarkTheme();
		} else{
			if (isDark) {
				enableDarkTheme();
			} else {
				disableDarkTheme();
			}
		  }
	} else {
		//dark theme off
		//check if user defined specific use of dark mode from previous visit
		if (isDark == null) {
			disableDarkTheme();
		} else {
			if (isDark) {
				enableDarkTheme();
			} else {
				disableDarkTheme();
			}
		}
	}
  } else {
	  //didn't detect mode
	  //check if user defined specific use of dark mode from previous visit
		if (isDark) {
			enableDarkTheme();
		} else {
			disableDarkTheme();
		}
}