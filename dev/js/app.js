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
  formEl.style.display = 'none';
  formSuccessScreen.style.display = 'flex';

  // якщо сталась помилка
  // formEl.style.display = "none";
  // formErrorScreen.style.display = "flex";
};

nameInput.addEventListener('blur', checkNameValid);
phoneInput.addEventListener('blur', checkPhoneValid);
emailInput.addEventListener('blur', checkEmailValid);
formEl.addEventListener('submit', onFormSubmit);
