document.addEventListener("DOMContentLoaded", function () {
  const burger = document.getElementById("burger");
  const nav = document.getElementById("main-nav");

  // Opening/closing the burger menu
  burger.addEventListener("click", function () {
    nav.classList.toggle("active");
  });

  // For mobile: opening a submenu
  const hasChildren = document.querySelectorAll(".menu-item-has-children > a");

  hasChildren.forEach((link) => {
    link.addEventListener("click", function (e) {
      if (window.innerWidth <= 768) {
        e.preventDefault(); // Blocks link navigation
        const parent = this.parentElement;
        parent.classList.toggle("open"); // Adds/removes a class
      }
    });
  });
});
