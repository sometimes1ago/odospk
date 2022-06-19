$(document).ready(function () {
  let result = $(".courses__get-result"),
    courses = $(".courses__item"),
    activeCourse = $(".courses__item-active"),
    courseOrderBtn = $(".courseOrderBtn"),
    cancelOrderBtn = $(".cancelOrderBtn"),
    orderState = $(".courses__requesting"),
    initialState = $(".courses__initial"),
    orderResult = $(".course__ordering-result");

  setEventListeners();

  courses.click(function (e) {
    activeCourse.removeClass("courses__item-active");
    $(this).toggleClass("courses__item-active");
    activeCourse = $(this);
    selectedCourse = activeCourse.data("coursename");

    if (window.matchMedia("(max-width: 520px)").matches) {
      console.log($('.courses__mobile-begin').offset());
      window.scrollTo($('.courses__mobile-begin').offset());
    }

    $.ajax({
      type: "POST",
      url: "server_processing/landing/coursesResponse.php",
      data: { progName: selectedCourse },
    }).done(function (response) {
      orderResult.removeClass("course__ordering-result__visible");
      orderState.removeClass("courses__requesting-visible");
      $(".courseErrorContainer").children().remove();
      result.html(response);
      setEventListeners();
    });
  });

  let courseOrderSender = $(".sendOrderBtn"),
    courseClientName = $(".courseClientName"),
    courseClientPhone = $(".courseClientPhone"),
    courseAgreement = $(".courseAgreement");

  courseAgreement.on("change", () => {
    if (courseAgreement.is(":not(:checked)")) {
      courseOrderSender.prop("disabled", true);
      courseOrderSender.css({ backgroundColor: "#606060", boxShadow: "none" });
    } else {
      courseOrderSender.prop("disabled", false);
      courseOrderSender.css({ backgroundColor: "#375DE1" });
    }
  });

  courseOrderSender.click((event) => {
    event.preventDefault();
    if (courseOrderSender.prop("disabled") == false) {
      if ($(".courseErrorContainer").children().length >= 1) {
        $(".courseErrorContainer").children().first().remove();
      }
      if (isEmpty(courseClientName)) {
        createError("Вы не ввели ваше имя!", ".courseErrorContainer");
      } else if (isEmpty(courseClientPhone)) {
        createError("Вы не ввели ваш телефон!", ".courseErrorContainer");
      } else {
        if (!isEmpty(courseClientPhone) && validatePhone(courseClientPhone)) {
          $(".courseErrorContainer").children().remove();
          $.ajax({
            type: "POST",
            url: "server_processing/landing/courseOrder.php",
            data: {
              clientName: courseClientName.val().trim(),
              clientPhone: courseClientPhone.val().trim(),
              selectedCourse: $(".courses__name").data("coursename"),
            },
          }).done(function (response) {
            initialState.removeClass("courses__initial-visible");
            orderState.removeClass("courses__requesting-visible");
            orderResult.addClass("course__ordering-result__visible");
            orderResult.html(response);

            if ($(".courseOrderRollbacked")) {
              let rollbackBtn = $(".courseOrderRollbacked");

              rollbackBtn.click(() => {
                orderResult.removeClass("course__ordering-result__visible");
                orderState.removeClass("courses__requesting-visible", "animate__animated", "animate__fadeIn", "animate__fast");
                initialState.addClass("courses__initial-visible", "animate__animated", "animate__fadeIn");
              });
            }

            if ($(".courseOrderSucceded")) {
              let succededBtn = $(".courseOrderSucceded");

              succededBtn.click(() => {
                orderResult.removeClass("course__ordering-result__visible");
                orderState.removeClass("courses__requesting-visible", "animate__animated", "animate__fadeIn", "animate__fast");
                initialState.addClass("courses__initial-visible", "animate__animated", "animate__fadeIn");
              });
            }
          });
        } else {
          createError("Некорректный номер телефона!", ".courseErrorContainer");
        }
      }
    }
  });

  function setEventListeners() {
    (courseOrderBtn = $(".courseOrderBtn")), (cancelOrderBtn = $(".cancelOrderBtn")), (orderState = $(".courses__requesting")), (initialState = $(".courses__initial"));

    courseOrderBtn.click(() => {
      initialState.removeClass("courses__initial-visible", "animate__animated", "animate__fadeIn");
      orderState.addClass("courses__requesting-visible", "animate__animated", "animate__fadeIn", "animate__fast");
    });

    cancelOrderBtn.click(() => {
      $(".courseErrorContainer").children().remove();
      orderState.removeClass("courses__requesting-visible", "animate__animated", "animate__fadeIn", "animate__fast");
      initialState.addClass("courses__initial-visible", "animate__animated", "animate__fadeIn");
    });
  }
});
