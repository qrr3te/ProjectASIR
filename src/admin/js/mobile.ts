// Show and hide nav for mobile
let current_area = document.getElementById("home-area")!;
const nav: HTMLElement = document.getElementsByTagName("nav")[0];
const menu_icon: HTMLElement = document.getElementById("menu-icon")!;

function show_nav(): void {
   const main_area: HTMLElement = document.getElementById("main-area")!;
   nav.style.display = "flex";
   current_area.style.display = "none";
   menu_icon.removeEventListener("click", show_nav);
   menu_icon.addEventListener("click", hide_nav);
}

function hide_nav(): void {
   const main_area: HTMLElement = document.getElementById("main-area")!;
   nav.style.display = "none";
   current_area.style.display = "grid";
   menu_icon.removeEventListener("click", hide_nav);
   menu_icon.addEventListener("click", show_nav);
}

menu_icon.addEventListener("click", show_nav);

// reset default values when is chenged to mobile/normal mode
addEventListener("resize", () => {
   if (window.innerWidth > 600) {
      nav.style.display = "flex";
      current_area.style.display = "grid";
   } else if (window.innerWidth <= 600) {
      nav.style.display = "none";
      current_area.style.display = "grid";
   }
})
