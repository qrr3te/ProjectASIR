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

addEventListener("resize", () => {
   if (window.innerWidth > 600) {
      nav.style.display = "flex";
      main_area.style.display = "flex";
   } else if (window.innerWidth <= 600) {
      nav.style.display = "none";
      main_area.style.display = "flex";
   }
})

const home_icon: HTMLElement = document.getElementById("home-icon")!;
home_icon.addEventListener("click", () => location.href = "../index.php");
