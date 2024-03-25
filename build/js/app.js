const mobileBtn = document.querySelector(".header__btn");
const mobileMenu = document.querySelector(".mobile-menu");
const mobileMenuText = document.querySelector(".header__btn-text");
const mobileMenuIcon = document.querySelector(".header__btn-icon");
const sloganBlock = document.querySelector(".slogan");
const sloganTextHeight = document.querySelector(".slogan p");
const toggleMoreText = document.querySelector(".slogan__toggle");

function toggleMenu() {
  mobileMenu.classList.toggle("mobile-menu__active");
  if (!mobileMenu.classList.contains("mobile-menu__active")) {
    mobileMenuIcon.style.display = "none";
    mobileMenuText.style.display = "block";
    document.body.style.overflow = "visible";
  } else {
    mobileMenuText.style.display = "none";
    mobileMenuIcon.style.display = "block";
    mobileBtn.style.width = "clamp(1px,15.33vw,138px)";
    document.body.style.overflow = "hidden";
  }
}

function lessMoreText() {
  sloganBlock.classList.toggle("slogan__hide");
  if (!sloganBlock.classList.contains("slogan__hide")) {
    toggleMoreText.innerHTML = "Hide all";
  } else {
    toggleMoreText.innerHTML = "View all";
  }
}

mobileBtn.addEventListener("click", toggleMenu);
toggleMoreText.addEventListener("click", lessMoreText);
