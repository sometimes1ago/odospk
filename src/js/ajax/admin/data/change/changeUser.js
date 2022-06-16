$(document).ready(() => {
  let changeUser = $(".dropdown__changeUserValue").data("dropdownvalue"),
    changeUserProp = $(".dropdown__changeUserProp").data("dropdownvalue"),
    changeUserAccessValue = $(".dropdown__changeUserAccessValue").data("dropdownvalue"),
    changeUserPropOptions = $(".changeUserPropOptions").children(),
    changeUserAccessLevels = $(".accessLevelOptions").children(),
    changeUserOptions = $(".changeUserOptions").children();

  const changeUserAccess = $(".dropdown__changeUserAccess"),
    changeUserInput = $(".changeUserValue");

  let changeUserDataToSend = [changeUser, changeUserProp, changeUserInput.val()];

  changeUserInput.on("input", () => {
    changeUserDataToSend = [changeUser, changeUserProp, changeUserInput.val()];
  });

  changeUserOptions.click(function () {
    changeUser = $(this).text();

    changeUserDataToSend = [changeUser, changeUserProp, changeUserInput.val()];
  });

  changeUserPropOptions.click(function () {
    changeUserProp = $(this).text();

    if (changeUserProp == "Уровень доступа") {
      changeUserAccess.css({ display: "block" });
      changeUserInput.css({ display: "none" });

      changeUserDataToSend = [changeUser, changeUserProp, changeUserAccessValue];

      changeUserAccessLevels.click(function () {
        changeUserAccessValue = $(this).text();

        changeUserDataToSend = [changeUser, changeUserProp, changeUserAccessValue];
      });
    } else {
      changeUserAccess.css({ display: "none" });
      changeUserInput.css({ display: "block" });
    }
  });

  if (changeUserProp != "Уровень доступа") {
    changeUserAccess.css({ display: "none" });
    changeUserInput.css({ display: "block" });
  }

  $(".changeUserSender").click(function (event) {
    event.preventDefault();

    if (changeUserInput.css("display") == "block") {
      if (isEmpty(changeUserInput)) {
        createError("Вы не ввели значение!", ".responseContainer");
      } else {
        $(".responseContainer").children().remove();

        $.ajax({
          type: "POST",
          url: "/server_processing/admin/data/change/changeUserHandler.php",
          data: {
            insertedData: changeUserDataToSend,
          },
        }).done(function (response) {
          changeUserInput.val("");
          $(".responseContainer").html(response);

          //Reload page after successful program change response
          setTimeout(function () {
            location.reload();
          }, 2000);
        });
      }
    } else if (changeUserAccess.css("display") == "block") {
      $(".responseContainer").children().remove();

      $.ajax({
        type: "POST",
        url: "/server_processing/admin/data/change/changeUserHandler.php",
        data: {
          insertedData: changeUserDataToSend,
        },
      }).done(function (response) {
        changeUserInput.val("");
        $(".responseContainer").html(response);

        //Reload page after successful program change response
        setTimeout(function () {
          location.reload();
        }, 2000);
      });
    }
  });
});
