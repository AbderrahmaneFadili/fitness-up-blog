/* Get Elements from the pages */
const dropdownBlog = document.querySelector(".blog");
const dropdownBlogMenu = document.querySelector(".blog + ul");

const user = document.querySelector(".user");
const dropdownUser = document.querySelector(".user + ul");

dropdownBlog.addEventListener("click", (event) => {
    dropdownBlogMenu.classList.toggle("hidden");
});

user.addEventListener("click", function () {
    dropdownUser.classList.toggle("hidden");
});
