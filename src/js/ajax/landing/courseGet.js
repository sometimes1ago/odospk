$(document).ready(function () {
  let result = $(".courses__get-result"),
    courses = $(".courses__item"),
    activeCourse = $(".courses__item-active"),
    courseOrderBtn = $(".courseOrderBtn"),
    cancelOrderBtn = $(".cancelOrderBtn"),
    orderState = $(".courses__requesting"),
    initialState = $(".courses__initial"),
    orderResult = $('.course__ordering-result');

  setEventListeners();

  courses.click(function () {
    activeCourse.removeClass("courses__item-active");
    $(this).toggleClass("courses__item-active");
    activeCourse = $(this);
    selectedCourse = activeCourse.data("coursename");

    $.ajax({
      type: "POST",
      url: "server_processing/landing/coursesResponse.php",
      data: { progName: selectedCourse },
    }).done(function (response) {
      orderResult.removeClass('course__ordering-result__visible');
      orderState.removeClass('courses__requesting-visible');
      $('.courseErrorContainer').children().remove();
      result.html(response);
      setEventListeners();
    });
  });

  let courseOrderSender = $(".sendOrderBtn"),
    courseClientName = $(".courseClientName"),
    courseClientPhone = $(".courseClientPhone"),
    courseAgreement = $(".courseAgreement");

  courseAgreement.on("change", () => {
    if (courseAgreement.is(':not(:checked)')) {
      courseOrderSender.prop('disabled', true);
      courseOrderSender.css({backgroundColor: '#606060', boxShadow: 'none'});
    } else {
      courseOrderSender.prop('disabled', false);
      courseOrderSender.css({backgroundColor: '#375DE1'});
    }
  });

  courseOrderSender.click((event) => {
    event.preventDefault();
    if (courseOrderSender.prop('disabled') == false) {
      if (!validateInput(courseClientName)) {
        createError("Вы не ввели ваше имя!");
      } else if (!validateInput(courseClientPhone)) {
        createError("Вы не ввели ваш телефон!");
      } else {
        if (validateInput(courseClientPhone) && validatePhone(courseClientPhone)) {
          $('.courseErrorContainer').children().remove();
          $.ajax({
            type: "POST",
            url: "server_processing/landing/courseOrder.php",
            data: {
              clientName: courseClientName.val().trim(),
              clientPhone: courseClientPhone.val().trim(),
              selectedCourse: $('.courses__name').data('coursename')
            },
          }).done(function(response) {
            initialState.removeClass("courses__initial-visible");
            orderState.removeClass("courses__requesting-visible");
            orderResult.addClass("course__ordering-result__visible");
            orderResult.html(response);

            if ($('.courseOrderRollbacked')) {
              let rollbackBtn = $('.courseOrderRollbacked');

              rollbackBtn.click(() => {
                orderResult.removeClass('course__ordering-result__visible');
                initialState.addClass("courses__initial-visible");
              });
            }

            if ($('.courseOrderSucceded')) {
              let succededBtn = $('.courseOrderSucceded');

              succededBtn.click(() => {
                orderResult.removeClass('course__ordering-result__visible');
                initialState.addClass("courses__initial-visible");
              });
            }
          });
        } else {
          createError('Некорректный номер телефона!');
        }
      }
    }
  });

  function setEventListeners() {
    courseOrderBtn = $(".courseOrderBtn"),
    cancelOrderBtn = $(".cancelOrderBtn"),
    orderState = $(".courses__requesting"),
    initialState = $(".courses__initial");
  
    courseOrderBtn.click(() => {
      initialState.removeClass("courses__initial-visible");
      orderState.addClass("courses__requesting-visible");
    });
  
    cancelOrderBtn.click(() => {
      $('.courseErrorContainer').children().remove();
      orderState.removeClass("courses__requesting-visible");
      initialState.addClass("courses__initial-visible");
    });
  }

  function validateInput(input) {
    processedInput = input.val().trim();
  
    if (processedInput) {
      return true;
    } else {
      return false;
    }
  }
  
  function createError(message) {
    $("<p class='text-14 lg:text-16 md:text-18 text-light-400 break-words'>" + message + "</p>").
      appendTo($("<div class='w-full mt-16 mb-16 rounded-8 p-12 md:p-16 bg-state-error'></div>").
      appendTo($(".courseErrorContainer")));
  }
  
  function validatePhone(phoneInput) {
    let regex = /^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/;
    return regex.test(phoneInput.val().trim());
  }
});
