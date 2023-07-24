$(".form-parameters").on("submit", function (event) {
  event.stopPropagation();
  event.preventDefault();

  let form = this,
    submit = $(".submit", form),
    data = new FormData(),
    files = $("input[type=file]");

  $(".submit", form).val("Отправка...");
  $("input, textarea", form).attr("disabled", "");

  data.append("photo", $('[name="photo"]', form).val());
  data.append("addition", $('[name="addition"]', form).val());
  data.append("og", $('[name="og"]', form).val());
  data.append("ot", $('[name="ot"]', form).val());
  data.append("ob", $('[name="ob"]', form).val());
  data.append("height", $('[name="height"]', form).val());
  data.append("name", $('[name="name"]', form).val());
  data.append("phone", $('[name="phone"]', form).val());
  data.append("mail", $('[name="mail"]', form).val());
  data.append("delivery", $('[name="delivery"]', form).val());
  data.append("place", $('[name="place"]', form).val());
  data.append("street", $('[name="street"]', form).val());
  data.append("house", $('[name="house"]', form).val());
  data.append("room", $('[name="room"]', form).val());

  files.each(function (key, file) {
    let cont = file.files;
    if (cont) {
      $.each(cont, function (key, value) {
        data.append(key, value);
      });
    }
  });

  $.ajax({
    url: "ajax.php",
    type: "POST",
    data: data,
    cache: false,
    dataType: "json",
    processData: false,
    contentType: false,
    xhr: function () {
      let myXhr = $.ajaxSettings.xhr();

      if (myXhr.upload) {
        myXhr.upload.addEventListener(
          "progress",
          function (e) {
            if (e.lengthComputable) {
              let percentage = (e.loaded / e.total) * 100;
              percentage = percentage.toFixed(0);
              $(".submit", form).html(percentage + "%");
            }
          },
          false
        );
      }

      return myXhr;
    },
    error: function (jqXHR, textStatus) {
      // Тут выводим ошибку
    },
    complete: function () {
      // Тут можем что-то делать ПОСЛЕ успешной отправки формы
      console.log("Complete");
      form.reset();
    },
  });

  return false;
});
