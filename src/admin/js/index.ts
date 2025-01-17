// Show and hide nav for mobile
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

// home icon functionality
const home_icon: HTMLElement = document.getElementById("home-icon")!;
home_icon.addEventListener("click", () => location.href = "../index.php");

// nav
function show_nav_element(show_element: HTMLElement) {
      document.querySelectorAll("nav div").forEach( (element: Element) => {
         const target: string = element.innerHTML.toLowerCase();
         const target_element: HTMLElement = document.getElementById(target)!;
         target_element.style.display = "none";
      })
      show_element.style.display = "flex";
}

document.querySelectorAll("nav div").forEach( (element: Element) => {
   const target: string = element.innerHTML.toLowerCase();
   const target_element: HTMLElement = document.getElementById(target)!;
   target_element.style.display = "none";
   
   element.addEventListener("click", () => {
      show_nav_element(target_element);
      if (window.innerWidth <= 600) {
         hide_nav();
      }
   })
})
