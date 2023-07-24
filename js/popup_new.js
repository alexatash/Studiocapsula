const modalBtns = document.querySelectorAll("._modal-open");
const modals = document.querySelectorAll("._modal");

const body = document.body;

function openModal(elem) {
  //Функция открытия модального окна
  elem.classList.add("_active");
  //Функция блокировки скролла
  body.classList.add("_locked");
}

//Функция закрытия модального окна
function closeModal(e) {
  //Если при клике у элемента есть класс modal-close и modal-bg, и его ближайший родитель имеет класс modal-close (т.к. крестик это картинка),
  // то модальное окно будет закрыто
  if (
    e.target.classList.contains("modal-close") ||
    e.target.closest(".modal-close") ||
    e.target.classList.contains("modal-bg")
  ) {
    e.target.closest("._modal").classList.remove("_active");
    //убираем класс блокировки у body
    body.classList.remove("_locked");
  }
}

//Связываем кнопку с модальным окном
modalBtns.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    let data = e.target.dataset.modalOpen;

    //Если дата имена у кнопки и у модального окна совпадают, то модальное окно открывается
    modals.forEach((modal) => {
      if (modal.dataset.modal == data) {
        openModal(modal);
      }
    });
  });
});

modals.forEach((modal) => {
  modal.addEventListener("click", (e) => closeModal(e));
});

//Закртыие модального окна с помощью клавиши Esc
window.addEventListener("keydown", (e) => {
  modals.forEach((modal) => {
    //если нажатая клавиша равняется Esc и модальное окно содержит класс active,
    //то мы убираем класс active и класс _locked для разблокировки скролла
    if (e.key === "Escape" && modal.classList.contains("_active")) {
      modal.classList.remove("_active");
      body.classList.remove("_locked");
    }
  });
});
