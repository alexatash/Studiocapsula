window.onload = () => {
  const uploadFile = document.getElementById("upload-file");
  const uploadBtn = document.getElementById("upload-text");

  uploadFile.addEventListener("change", function () {
    if (uploadFile.value) {
      uploadBtn.innerText = uploadFile.value.match(
        /[\/\\]([\w\d\s\.\-(\)]+)$/
      )[1];
    } else {
      uploadBtn.innerText = "Файл не выбран";
    }
  });
};
