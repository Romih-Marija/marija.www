document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("hamburger-button");
    const menu = document.getElementById("mobile-menu");
  
    if (button && menu) {
      button.addEventListener("click", function () {
        menu.classList.toggle("active");
      });
    }
  });
  
 