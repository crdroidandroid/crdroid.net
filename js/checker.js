const wrapper = document.querySelector(".crblocker-wrapper");
const button = wrapper.querySelector("button");
const btnlayer = wrapper.querySelector(".bg-layer");

button.disabled = true;
button.addEventListener("click", ()=>{
  wrapper.classList.remove("show");
  setCookie();
});

if (document.getElementById("dl-ads") !== null){
  document.getElementById("dl-ads").style.display = "none";
}
if (document.getElementById("dl-links") !== null){
  document.getElementById("dl-links").style.display = 'none';
}

async function checkStatus(){
    let adBlockEnabled = await AdBlockChecker.checkAdBlock();
    console.log("adBlockEnabled " + adBlockEnabled)

    if (adBlockEnabled == true) {
    let ads = getCookie();
    if (ads == "yes"){
        wrapper.classList.remove("show");
    }else{
        wrapper.classList.add("show");
    }
    if (document.getElementById("dl-ads") != null){
        document.getElementById("dl-ads").style.display = "inherit";
    }
        runCounter();
        runDLCounter();
    }else{
        wrapper.classList.remove("show");
        if (document.getElementById("dl-links") != null){
            document.getElementById("dl-links").style.display = 'inherit';
        }
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
    for(let i = 0; i <ca.length; i++){
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
    let count = 10;

    function timer() {
        if (count <= 0) {
            document.getElementById("timed").innerHTML = "Okay, I'll Whitelist";
            button.disabled = false;
            btnlayer.classList.remove("disable");
            return;
        }

        document.getElementById("timed").innerHTML = "Please wait " + count + " seconds...";
        count--;

        setTimeout(timer, 1000);
    }

    button.disabled = true;
    btnlayer.classList.add("disable");
    timer();
}

function runDLCounter() {
    let count = 15;

    function timer() {
        if (count <= 0) {
            if (document.getElementById("dl-ads") != null) {
                document.getElementById("dl-ads").remove();
            }
            if (document.getElementById("dl-links") != null) {
                document.getElementById("dl-links").style.display = 'inherit';
            }
            return;
        }

        if (document.getElementById("dl-ads") != null) {
            document.getElementById("dl-ads").innerHTML = "Please disable adblock to download faster (" + count + ")";
        }
        if (document.getElementById("dl-links") != null) {
            document.getElementById("dl-links").style.display = 'none';
        }

        count -= 1;
        setTimeout(timer, 1000);
    }

    timer();
}

window.addEventListener("load", checkStatus);