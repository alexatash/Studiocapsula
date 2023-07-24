// const list = document.querySelector(".list"),
//   items = document.querySelectorAll("blocks_item");

// function filter() {
//   list.addEventListener("click", (event) => {
//     const targetId = event.target.dataset.id;
//     switch (targetId) {
//       case "all":
//         break;
//       case "suits":
//         items.forEach((item) => {
//           if (item.classList.contains("suits")) {
//             item.style.display = "block";
//           } else {
//             item.style.display = "none";
//           }
//         });
//         break;
//     }
//   });
// }
// filter();

// const items = document.querySelectorAll("blocks_item");

// document.querySelector(".list").addEventListener("click", (event) => {
//   if (event.target.tagName !== "LI") return false;
//   let FilterClass = event.target.dataset["id"];
//   console.log(FilterClass);

//   items.forEach((elem) => {
//     elem.classList.remove("hide");
//     if (!elem.classList.contains(FilterClass)) {
//       elem.classList.add("hide");
//     }
//   });
// });

filterSelection("all"); // Показ всех элементов
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Добавление класса show (display:block) к отфильтрованным эоементам и
  // удаление этого класса с элементов, которые не выбраны
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Показать отфильтрованные элементы
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Скрыть элементы, которые не выбраны
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Добавление активного класса к кнопке (изменение цвета)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
