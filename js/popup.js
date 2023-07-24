const popupLinks = document.querySelectorAll(".popup-link");

//для блокировки скролла
const body = document.querySelector("body");
const lockPadding = document.querySelectorAll(".lock-padding");

//Чтобы не было двойных нажатий
let unlock = true;

const timeout = 800;

//Ищем ссылку popup-link и вешаем событие на неё
if (popupLinks.length > 0) {
  for (let index = 0; index < popupLinks.length; index++) {
    const popupLink = popupLinks[index];
    popupLink.addEventListener("click", function (e) {
      //убираем хэштэг из ссылки, чтобы было чистое имя ссылки
      const popupName = popupLink.getAttribute("href").replace("#", "");
      const curentPopup = document.getElementById(popupName);
      popupOpen(curentPopup);
      //так как это ссылка, этим свойством мы запрещаем перезагружать страницу
      e.preventDefault();
    });
  }
}

//функция для объектов, которые закрывают popup
const popupCloseIcon = document.querySelectorAll(".close-popup");
if (popupCloseIcon.length > 0) {
  for (let index = 0; index < popupCloseIcon.length; index++) {
    const el = popupCloseIcon[index];
    el.addEventListener("click", function (e) {
      popupClose(el.closest(".popup"));
      e.preventDefault();
    });
  }
}

//Функция открытия popup
function popupOpen(curentPopup) {
  if (curentPopup && unlock) {
    const popupActive = document.querySelector(".popup.open");
    if (popupActive) {
      popupClose(popupActive, false);
    } else {
      bodyLock();
    }
    curentPopup.classList.add("open");
    curentPopup.addEventListener("click", function (e) {
      //закрытие popup, если будет клик по области, где нет popup content, то есть по темной области
      if (!e.target.closest(".popup_content")) {
        popupCloseIcon(e.target.closest(".popup"));
      }
    });
  }
}

function popupClose(popupActive, doUnlock = true) {
  if (unlock) {
    popupActive.classList.remove("open");
    if (doUnlock) {
      bodyLock();
    }
  }
}

function bodyLock() {
  //Расчитываем разницу между шириной вьюпорта (размера экарна) и шириной объекта, который находится внутри него.
  //Это нужно, чтобы получить ширину скролла, который мы будем скрывать, чтобы контент не сдвигался
  const lockPaddingValue =
    window.innerWidth - document.querySelector(".wrapper").offsetWidth + "px";
  if (lockPadding.length > 0) {
    for (let index = 0; index < lockPadding.length; index++) {
      const el = lockPadding[index];
      el.style.paddingRight = lockPaddingValue;
    }
  }
  //присваеваем эту разницу к body
  body.style.paddingRight = lockPaddingValue;
  body.classList.add("lock");

  unlock = false;
  setTimeout(function () {
    unlock = true;
  }, timeout);
}

function bodyUnlock() {
  //появление скролла только после того, как закончится анимация
  setTimeout(function () {
    if (lockPadding.length > 0) {
      for (let index = 0; index < lockPadding.length; index++) {
        const el = lockPadding[index];
        el.style.paddingRight = "0px";
      }
    }
    body.style.paddingRight = "0px";
    body.classList.remove("lock");
  }, timeout);

  unlock = false;
  setTimeout(function () {
    unlock = true;
  }, timeout);
}

//Закрытие popup по нажатию кнопки Esc
document.addEventListener("keydown", function (e) {
  if (e.which === 27) {
    const popupActive = document.querySelector(".popup.open");
    popupClose(popupActive);
  }
});
