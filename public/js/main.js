const menus = document.querySelectorAll(".menus");
const icon = document.querySelector(".icon");

icon.addEventListener("click", () => {
    menus.forEach((menu) => menu.classList.toggle("open"));
});

const overlay = document.querySelector(".overlay");
const myModal = document.querySelector("#my-modal");
const deleteAccount = document.querySelector("#delete-account");

overlay.addEventListener("click", function (event) {
    myModal.classList.add("hidden");
    overlay.classList.add("hidden");
});

deleteAccount.addEventListener("click", () => {
    myModal.classList.remove("hidden");
    myModal.classList.add("block");

    overlay.classList.remove("hidden");
    overlay.classList.add("block");
});
