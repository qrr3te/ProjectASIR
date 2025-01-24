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

// nav functionality
document.querySelectorAll("nav div").forEach( (element: Element) => {
   const panel: string = element.innerHTML.toLowerCase();
   
   element.addEventListener("click", () => {
      location.href = `index.php?panel=${panel}`
   })
})

// add item functionality
let element: HTMLElement = document.getElementById("add-item-btn")!;
let target_element: HTMLElement = document.getElementById("add-item")!;
element.addEventListener("click", () => {
   target_element.style.display = "flex";
})

element = document.getElementById("close")!;
target_element = document.getElementById("add-item")!;
element.addEventListener("click", () => {
   target_element.style.display = "none";
})
