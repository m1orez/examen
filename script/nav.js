const hamburger = document.getElementById("hamburger");

const navLinks = document.querySelector(".navLinks");

hamburger.addEventListener(
  "click",

  () => {
    navLinks.classList.toggle("open");
  }
);
