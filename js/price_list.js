let arrow = document.querySelector(".arrow");
arrow.addEventListener("click", function () {
  arrow.classList.toggle("active");
  document.querySelector(".repair-wrap").classList.toggle("open_list");
  document.querySelector(".line").classList.toggle("line-close");
});
