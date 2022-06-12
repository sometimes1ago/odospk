$(document).ready(function () {
  //Open modal on mobile devices
  let modalInitBtn = $(".menu__help-modal-start"),
    modal = $(".modal"),
    modalCloser = $(".modal__closer"),
    modalFooterInitializer = $('.call-order__modal-btn');

  modalInitBtn.click(() => {
    modal.toggleClass("modal__active");
  });

  modalCloser.click(() => {
    modal.toggleClass("modal__active");
  });

  modalFooterInitializer.click(() => {
    modal.toggleClass('modal__active');
  });

  //Burger menu back call request handling
  let inpustContainer = $(".burger__request-form"),
    menuClientName = $(".menu__help-clientname"),
    menuClientPhone = $(".menu__help-clientphone"),
    menuAgreement = $(".burger__request-agreement"),
    menuRequestSender = $(".menu__help-sender"),
    menuRequestResult = $(".burger__request-result"),
    menuRequestErrors = $(".burger__request-errors");

  menuAgreement.on('change', () => {
    if (menuAgreement.is(':not(:checked)')) {
      menuRequestSender.prop('disabled', true);
      menuRequestSender.css({backgroundColor: '#606060', boxShadow: 'none'});
    } else {
      menuRequestSender.prop('disabled', false);
      menuRequestSender.css({backgroundColor: '#375DE1'});
    }
  });

  menuRequestSender.click((event) => {
    event.preventDefault();

    if (menuRequestSender.prop('disabled') == false) {
      if (menuRequestErrors.children().length >= 1) {
        menuRequestErrors.children().first().remove();
      }

      if (isEmpty(menuClientName)) {
        createError('Вы не ввели Ваше имя!');
      } else if (isEmpty(menuClientPhone)) {
        createError('Вы не ввели Ваш телефон!');
      } else {
        if (!isEmpty(menuClientPhone) && validatePhone(menuClientPhone)) {
          menuRequestErrors.children().remove();

          $.ajax({
            type: "POST",
            url: "server_processing/landing/phoneCallback.php",
            data: { 
              insertedName: menuClientName.val().trim(),
              insertedPhone: menuClientPhone.val().trim()
            },
          }).done(function (response) {
            menuRequestErrors.children().remove();
            inpustContainer.addClass('burger__request-form__hidden');
            menuRequestResult.addClass('burger__request-result__visible');
            menuRequestResult.html(response);

            if ($('.callOrderSucceded')) {
              let succededCallBtn = $('.callOrderSucceded');

              succededCallBtn.click(() => {
                inpustContainer.removeClass('burger__request-form__hidden');
                menuRequestResult.removeClass('burger__request-result__visible');
              });
            }

            if ($('.callOrderRollbacked')) {
              let rollbackCallBtn = $('.callOrderRollbacked');

              rollbackCallBtn.click(() => {
                inpustContainer.removeClass('burger__request-form__hidden');
                menuRequestResult.removeClass('burger__request-result__visible');
              });
            }
          });
        } else {
          createError('Вы ввели некорректный номер телефона!');
        }
      }
    }
  })

  function isEmpty(input) {
    let processedInput = input.val().trim();

    if (processedInput) {
      return false;
    } else {
      return true;
    }
  }

  function createError(message) {
    $("<p class='text-14 text-light-400 break-words'>" + message + "</p>").appendTo($("<div class='w-full mt-16 mb-16 rounded-8 p-12 bg-state-error'></div>").appendTo($(".burger__request-errors")));
  }

  function validatePhone(phoneInput) {
    let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
    return regex.test(phoneInput.val().trim());
  }
});
