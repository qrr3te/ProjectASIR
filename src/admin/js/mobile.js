"use strict";
// Show and hide nav for mobile
const nav = document.getElementsByTagName("nav")[0];
const main_area = document.getElementById("main-area");
const menu_icon = document.getElementById("menu-icon");
function show_nav() {
    nav.style.display = "flex";
    main_area.style.display = "none";
    menu_icon.removeEventListener("click", show_nav);
    menu_icon.addEventListener("click", hide_nav);
}
function hide_nav() {
    nav.style.display = "none";
    main_area.style.display = "grid";
    menu_icon.removeEventListener("click", hide_nav);
    menu_icon.addEventListener("click", show_nav);
}
menu_icon.addEventListener("click", show_nav);
// reset default values when is chenged to mobile/normal mode
addEventListener("resize", () => {
    if (window.innerWidth > 600) {
        nav.style.display = "flex";
        main_area.style.display = "grid";
    }
    else if (window.innerWidth <= 600) {
        nav.style.display = "none";
        main_area.style.display = "grid";
    }
});
