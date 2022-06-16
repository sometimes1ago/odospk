$(document).ready(() => {
  let addFeedbackName = $(".addFeedbackName"),
    addFeedbackContent = $(".addFeedbackContent"),
    addFeedbackSender = $(".addFeedbackSender");

  let addFeedbackDataToSend = [addFeedbackName.val().trim(), addFeedbackContent.val().trim()];

  addFeedbackName.on('input', () => {
    addFeedbackDataToSend[0] = addFeedbackName.val().trim();
  });

  addFeedbackContent.on('input', () => {
    addFeedbackDataToSend[1] = addFeedbackContent.val().trim();
  });

  addFeedbackSender.click(function (event) {
    event.preventDefault();

    if ($(".responseContainer").children().length >= 1) {
      $(".responseContainer").children().first().remove();
    }

    if (isEmpty(addFeedbackName)) {
      createError("Вы не ввели имя автора!", ".responseContainer");
    } else if (isEmpty(addFeedbackContent)) {
      createError("Вы не ввели содержание отзыва!", ".responseContainer");
    } else {
      $(".responseContainer").children().remove();

      $.ajax({
        type: "POST",
        url: "/server_processing/admin/data/add/addFeedbackHandler.php",
        data: {
          insertedData: addFeedbackDataToSend,
        },
      }).done(function (response) {
        addFeedbackName.val("");
        addFeedbackContent.val("");

        $(".responseContainer").html(response);

        //Reload page after successful program add response
        setTimeout(function () {
          location.reload();
        }, 2000);
      });
    }
  });
});
