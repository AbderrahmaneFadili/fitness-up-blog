const menus = document.querySelectorAll(".menus");
const icon = document.querySelector(".icon");

icon.addEventListener("click", () => {
    menus.forEach((menu) => menu.classList.toggle("open"));
});
