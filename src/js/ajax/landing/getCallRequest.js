$(document).ready(function () {
  //Open modal on mobile devices
  let modalInitBtn = $(".menu__help-modal-start"),
    modal = $(".modal"),
    modalCloser = $(".modal__closer"),
    modalFooterInitializer = $(".call-order__modal-btn");

  modalInitBtn.click(() => {
    modal.toggleClass("modal__active");
  });

  modalCloser.click(() => {
    modal.toggleClass("modal__active");
  });

  modalFooterInitializer.click(() => {
    modal.toggleClass("modal__active");
  });

  
  let inpustContainer = $(".burger__request-form"),
    menuClientName = $(".menu__help-clientname"),
    menuClientPhone = $(".menu__help-clientphone"),
    menuAgreement = $(".burger__request-agreement"),
    menuRequestSender = $(".menu__help-sender"),
    menuRequestResult = $(".burger__request-result"),
    menuRequestErrors = $(".burger__request-errors");

  menuAgreement.on("change", () => {
    if (menuAgreement.is(":not(:checked)")) {
      menuRequestSender.prop("disabled", true);
      menuRequestSender.css({ backgroundColor: "#606060", boxShadow: "none" });
    } else {
      menuRequestSender.prop("disabled", false);
      menuRequestSender.css({ backgroundColor: "#375DE1" });
    }
  });

  menuRequestSender.click((event) => {
    event.preventDefault();

    if (menuRequestSender.prop("disabled") == false) {
      if (menuRequestErrors.children().length >= 1) {
        menuRequestErrors.children().first().remove();
      }

      if (isEmpty(menuClientName)) {
        createError("Вы не ввели Ваше имя!", ".burger__request-errors");
      } else if (isEmpty(menuClientPhone)) {
        createError("Вы не ввели Ваш телефон!", ".burger__request-errors");
      } else {
        if (!isEmpty(menuClientPhone) && validatePhone(menuClientPhone)) {
          menuRequestErrors.children().remove();

          $.ajax({
            type: "POST",
            url: "server_processing/landing/phoneCallback.php",
            data: {
              insertedName: menuClientName.val().trim(),
              insertedPhone: menuClientPhone.val().trim(),
            },
          }).done(function (response) {
            menuRequestErrors.children().remove();
            menuClientName.val("");
            menuClientPhone.val("");
            inpustContainer.addClass("burger__request-form__hidden");
            menuRequestResult.addClass("burger__request-result__visible");
            menuRequestResult.html(response);

            if ($(".callOrderSucceded")) {
              let succededCallBtn = $(".callOrderSucceded");

              succededCallBtn.click(() => {
                inpustContainer.removeClass("burger__request-form__hidden").addClass("animate__animatd", "animate__fadeIn");
                menuRequestResult.removeClass("burger__request-result__visible");
              });
            }

            if ($(".callOrderRollbacked")) {
              let rollbackCallBtn = $(".callOrderRollbacked");

              rollbackCallBtn.click(() => {
                inpustContainer.removeClass("burger__request-form__hidden").addClass("animate__animatd", "animate__fadeIn");
                menuRequestResult.removeClass("burger__request-result__visible");
              });
            }
          });
        } else {
          createError("Вы ввели некорректный номер телефона!", ".burger__request-errors");
        }
      }
    }
  });

  let coursesCallClientName = $(".coursesCallClientName"),
    coursesCallClientPhone = $(".coursesCallClientPhone"),
    coursesCallSender = $(".coursesCallSender"),
    coursesCallErrors = $(".courses__call-order-errors"),
    coursesCallContent = $(".courses__call-order-content"),
    coursesCallResult = $(".courses__call-order-result");

  coursesCallSender.click((event) => {
    event.preventDefault();

    if (coursesCallErrors.children().length >= 1) {
      coursesCallErrors.children().first().remove();
    }

    if (isEmpty(coursesCallClientName)) {
      createError("Вы не ввели Ваше имя!", ".courses__call-order-errors");
    } else if (isEmpty(coursesCallClientPhone)) {
      createError("Вы не ввели Ваш телефон!", ".courses__call-order-errors");
    } else if (!isEmpty(coursesCallClientPhone) && validatePhone(coursesCallClientPhone)) {
      coursesCallErrors.children().remove();

      $.ajax({
        type: "POST",
        url: "server_processing/landing/phoneCallback.php",
        data: {
          insertedName: coursesCallClientName.val().trim(),
          insertedPhone: coursesCallClientPhone.val().trim(),
        },
      }).done(function () {
        coursesCallClientName.val("");
        coursesCallClientPhone.val("");
        coursesCallErrors.children().remove();
        coursesCallContent.addClass("courses__call-order-content__hidden");
        coursesCallResult.addClass("courses__call-order-result__visible");

        if ($(".coursesCallOrderSucceded")) {
          let coursesCallOrderSucceded = $(".coursesCallOrderSucceded");

          coursesCallOrderSucceded.click(() => {
            coursesCallContent.removeClass("courses__call-order-content__hidden");
            coursesCallResult.removeClass("courses__call-order-result__visible");
          });
        }
      });
    } else {
      createError('Вы ввели некорректный номер телефона!', ".courses__call-order-errors")
    }
  });

  let modalClientName = $(".modal__client-name"),
    modalClientPhone = $(".modal__client-phone"),
    modalErrors = $(".modal__errors"),
    modalAgreement = $(".modal__agreement"),
    modalControls = $(".modal__controls"),
    modalSender = $(".modal__sender"),
    modalResult = $(".modal__result-inject");

  modalAgreement.on("change", () => {
    if (modalAgreement.is(":not(:checked)")) {
      modalSender.prop("disabled", true);
      modalSender.css({ backgroundColor: "#606060", boxShadow: "none" });
    } else {
      modalSender.prop("disabled", false);
      modalSender.css({ backgroundColor: "#375DE1" });
    }
  });

  modalSender.click((event) => {
    event.preventDefault();

    if (modalSender.prop("disabled") == false) {
      if (modalErrors.children().length >= 1) {
        modalErrors.children().first().remove();
      }

      if (isEmpty(modalClientName)) {
        createError("Вы не ввели Ваше имя!", modalErrors);
      } else if (isEmpty(modalClientPhone)) {
        createError("Вы не ввели Ваш телефон!", modalErrors);
      } else if (!isEmpty(modalClientPhone) && validatePhone(modalClientPhone)) {
        modalErrors.children().remove();

        $.ajax({
          type: "POST",
          url: "server_processing/landing/phoneCallback.php",
          data: {
            insertedName: modalClientName.val().trim(),
            insertedPhone: modalClientPhone.val().trim(),
          },
        }).done(function (response) {
          menuRequestErrors.children().remove();
          modalControls.addClass("modal__controls__hidden");
          modalResult.addClass("modal__result-inject__visible");
          modalResult.html(response);

          if ($(".callOrderSucceded")) {
            let succededCallBtn = $(".callOrderSucceded");

            succededCallBtn.click(() => {
              modalControls.removeClass("modal__controls__hidden");
              modalResult.removeClass("modal__result-inject__visible");
            });
          }

          if ($(".callOrderRollbacked")) {
            let rollbackCallBtn = $(".callOrderRollbacked");

            rollbackCallBtn.click(() => {
              modalControls.removeClass("modal__controls__hidden");
              modalResult.removeClass("modal__result-inject__visible");
            });
          }
        });
      } else {
        createError("Вы ввели некорректный номер телефона!", modalErrors);
      }
    }
  });
});
