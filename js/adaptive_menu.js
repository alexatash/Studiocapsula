// var myMobile = {
//   Android: function () {
//     return navigator.userAgent.match(/Android/i);
//   },
//   BlackBerry: function () {
//     return navigator.userAgent.match(/BlackBerry/i);
//   },
//   iOS: function () {
//     return navigator.userAgent.match(/iPhone|iPad|iPod/i);
//   },
//   Opera: function () {
//     return navigator.userAgent.match(/Opera Mini/i);
//   },
//   Windows: function () {
//     return navigator.userAgent.match(/IEMobile/i);
//   },
//   any: function () {
//     return (
//       myMobile.Android() ||
//       myMobile.BlackBerry() ||
//       myMobile.iOS() ||
//       myMobile.Opera() ||
//       myMobile.Windows()
//     );
//   },
// };

// let body = document.querySelector("body");
// let menu_link = document.querySelector("menu_link");
// if (myMobile.any()) {
//   body.classList.add("touch");
//   let arrow = document.querySelectorAll(".arrow");
//   for (i = 0; i < arrow.length; i++) {
//     let thisLink = arrow[i].previousElementSibling;
//     let subMenu = arrow[i].nextElementSibling;
//     let thisArrow = arrow[i];
//     thisLink.classList.add("parent");
//     arrow[i].addEventListener("click", function () {
//       subMenu.classList.toggle("open");
//       thisArrow.classList.toggle("active");
//     });
//   }
// } else {
//   body.classList.add("mouse");
// }

let arrow = document.querySelector(".arrow");
document.querySelector(".menu_link").addEventListener("click", function () {
  arrow.classList.toggle("active");
  document.querySelector(".sub-menu_list").classList.toggle("open");
});
