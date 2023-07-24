let form = document.getElementById("form_order");
let button = document.getElementById("clean-btn");
button.addEventListener("click", () => form.reset());
button.addEventListener("click", () => form.preventDefault());
