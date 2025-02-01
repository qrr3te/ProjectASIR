const nav: HTMLElement = document.getElementsByTagName("nav")[0];
const main_area: HTMLElement = document.getElementById("main-area")!;
const menu_icon: HTMLElement = document.getElementById("menu-icon")!;

function show_nav(): void {
   nav.style.display = "flex";
   main_area.style.display = "none";
   menu_icon.removeEventListener("click", show_nav);
   menu_icon.addEventListener("click", hide_nav);
}

function hide_nav(): void {
   nav.style.display = "none";
   main_area.style.display = "flex";
   menu_icon.removeEventListener("click", hide_nav);
   menu_icon.addEventListener("click", show_nav);
}

menu_icon.addEventListener("click", show_nav);

// reset default values when is chenged to mobile/normal mode
addEventListener("resize", () => {
   if (window.innerWidth > 600) {
      nav.style.display = "flex";
      main_area.style.display = "flex";
   } else if (window.innerWidth <= 600) {
      nav.style.display = "none";
      main_area.style.display = "flex";
   }
})
