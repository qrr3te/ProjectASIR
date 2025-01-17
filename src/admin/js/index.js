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
var home_icon = document.getElementById("home-icon");
home_icon.addEventListener("click", function () { return location.href = "../index.php"; });
