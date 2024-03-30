const mobileBtn = document.querySelector('.header__btn');
const mobileMenu = document.querySelector('.mobile-menu');
const mobileMenuText = document.querySelector('.header__btn-text');
const mobileMenuIcon = document.querySelector('.header__btn-icon');
const sloganBlock = document.querySelector('.slogan');
const sloganTextHeight = document.querySelector('.slogan p');
const toggleMoreText = document.querySelector('.slogan__toggle');

function toggleMenu() {
  mobileMenu.classList.toggle('mobile-menu__active');
  if (!mobileMenu.classList.contains('mobile-menu__active')) {
    mobileMenuIcon.style.display = 'none';
    mobileMenuText.style.display = 'block';
    document.body.style.overflow = 'visible';
  } else {
    mobileMenuText.style.display = 'none';
    mobileMenuIcon.style.display = 'block';
    mobileBtn.style.width = 'clamp(1px,15.33vw,138px)';
    document.body.style.overflow = 'hidden';
  }
}

function lessMoreText() {
  sloganBlock.classList.toggle('slogan__hide');
  if (!sloganBlock.classList.contains('slogan__hide')) {
    toggleMoreText.innerHTML = 'Hide all';
  } else {
    toggleMoreText.innerHTML = 'View all';
  }
}

mobileBtn?.addEventListener('click', toggleMenu);
toggleMoreText?.addEventListener('click', lessMoreText);

const nameInput = document.querySelector('.form__input[name="name"]');
const phoneInput = document.querySelector('.form__input[name="phone"]');
const emailInput = document.querySelector('.form__input[name="email"]');
const nameInputError = document.querySelector(
  '.form__input[name="name"] ~ .form__error-message'
);
const phoneInputError = document.querySelector(
  '.form__input[name="phone"] ~ .form__error-message'
);
const emailInputError = document.querySelector(
  '.form__input[name="email"] ~ .form__error-message'
);
const formEl = document.querySelector('.form__mould');
const overlay = document.querySelector('.overlay');
const formSuccessScreen = document.querySelector('.form__success-screen');
const formErrorScreen = document.querySelector('.form__error-screen');

const emailRegExp = /^([a-z0-9_.-]+)@([\da-z.-]+)\.([a-z.]{2,6})$/;

const phoneRegExp = /^\+[1-9]\d{11}$/;

const checkNameValid = (e) => {
  if (e.target.value.trim() === '') {
    nameInputError.style.display = 'block';
  } else {
    nameInputError.style.display = 'none';
  }
};

const checkPhoneValid = (e) => {
  if (phoneRegExp.test(e.target.value.trim())) {
    phoneInputError.style.display = 'none';
  } else {
    phoneInputError.style.display = 'block';
  }
};

const checkEmailValid = (e) => {
  if (emailRegExp.test(e.target.value.trim().toLowerCase())) {
    emailInputError.style.display = 'none';
  } else {
    emailInputError.style.display = 'block';
  }
};

const onFormSubmit = (e) => {
  e.preventDefault();
  if (nameInput.value.trim() === '') {
    nameInputError.style.display = 'block';
  }
  if (!emailRegExp.test(emailInput.value.trim().toLowerCase())) {
    emailInputError.style.display = 'block';
  }
  if (!phoneRegExp.test(phoneInput.value.trim())) {
    phoneInputError.style.display = 'block';
  }
  if (
    nameInput.value.trim() === '' ||
    !emailRegExp.test(emailInput.value.trim().toLowerCase()) ||
    !phoneRegExp.test(phoneInput.value.trim())
  ) {
    return;
  }

  // успішна відправка
  overlay.classList.add('overlay__open', 'overlay__success');
  document.body.style.overflowY = 'hidden';
  // setTimeout(() => {
  //   overlay.classList.remove('overlay__open', 'overlay__success');
  //   document.body.style.overflowY = 'visible';
  // }, 3000);
};

nameInput.addEventListener('blur', checkNameValid);
phoneInput.addEventListener('blur', checkPhoneValid);
emailInput.addEventListener('blur', checkEmailValid);
formEl.addEventListener('submit', onFormSubmit);

//chech scroll position
document.addEventListener('DOMContentLoaded', function () {
  const worksList = document.querySelector('.works__list');

  if (worksList) {
    let scrollHeight = 0;
    let scrollTimeout = null;

    if (sessionStorage.getItem('scrollHeight')) {
      scrollHeight = parseInt(sessionStorage.getItem('scrollHeight'), 10);
      window.scrollTo(0, scrollHeight);
      sessionStorage.removeItem('scrollHeight');
    }

    window.addEventListener('scroll', function () {
      if (scrollTimeout) {
        clearTimeout(scrollTimeout);
      }

      scrollTimeout = setTimeout(function () {
        scrollHeight = window.scrollY;
        console.log('Скролл остановлен, сохраняем позицию:', scrollHeight);
        sessionStorage.setItem('scrollHeight', scrollHeight.toString());
      }, 200);
    });
  } else {
    console.log('Элемент .works__list не найден на странице.');
  }
});
//header scroller

let lastScrollY = window.scrollY;
const header = document.getElementById('header');

function handleScroll() {
  const currentScrollY = window.scrollY;
  // Check if the viewport height is more than 1200px
  if (currentScrollY > 600) {
    // Add 'header__scrolled' to make header fixed at the top
    header.classList.add('header__scrolled');

    if (currentScrollY > lastScrollY) {
      // Scrolling down, hide the header
      header.classList.remove('visible');
    } else {
      // Scrolling up, show the header
      header.classList.add('visible');
    }
  } else {
    // If viewport height is less than or equal to 1200px, make the header static
    header.classList.remove('header__scrolled', 'visible');
  }

  lastScrollY = currentScrollY; // Update the last scroll position
}

window.addEventListener('scroll', handleScroll);
window.addEventListener('resize', handleScroll);
