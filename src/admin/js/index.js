// Show and hide nav for mobile
var nav = document.getElementsByTagName("nav")[0];
var main_area = document.getElementById("main-area");
var menu_icon = document.getElementById("menu-icon");
function show_nav() {
    nav.style.display = "flex";
    main_area.style.display = "none";
    menu_icon.removeEventListener("click", show_nav);
    menu_icon.addEventListener("click", hide_nav);
}
function hide_nav() {
    nav.style.display = "none";
    main_area.style.display = "flex";
    menu_icon.removeEventListener("click", hide_nav);
    menu_icon.addEventListener("click", show_nav);
}
menu_icon.addEventListener("click", show_nav);
// reset default values when is chenged to mobile/normal mode
addEventListener("resize", function () {
    if (window.innerWidth > 600) {
        nav.style.display = "flex";
        main_area.style.display = "flex";
    }
    else if (window.innerWidth <= 600) {
        nav.style.display = "none";
        main_area.style.display = "flex";
    }
});
// home icon functionality
var home_icon = document.getElementById("home-icon");
home_icon.addEventListener("click", function () { return location.href = "../index.php"; });
// nav functionality
document.querySelectorAll("nav div").forEach(function (element) {
    var panel = element.innerHTML.toLowerCase();
    element.addEventListener("click", function () {
        location.href = "index.php?panel=".concat(panel);
    });
});
// add item functionality
var element = document.getElementById("add-item-btn");
var target_element = document.getElementById("add-item");
element.addEventListener("click", function () {
    target_element.style.display = "flex";
});
element = document.getElementById("close");
target_element = document.getElementById("add-item");
element.addEventListener("click", function () {
    target_element.style.display = "none";
});
