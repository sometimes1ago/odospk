$(document).ready(() => {
  let addUserName = $(".addUserName"),
    addUserLogin = $(".addUserLogin"),
    addUserPassword = $(".addUserPassword"),
    addUserAccessLevel = $(".dropdown__addUserAccess").data("dropdownvalue"),
    addUserAccessOptions = $('.addUserAccessOptions').children(),
    addUserEmail = $(".addUserEmail"),
    addUserSender = $(".addUserSender");
  
  let addUserDataToSend = [
    addUserName.val().trim(),
    addUserLogin.val().trim(),
    addUserPassword.val().trim(),
    addUserAccessLevel,
    addUserEmail.val().trim(),
  ];

  addUserName.on('input', () => {
    addUserDataToSend[0] = addUserName.val().trim();
  });

  addUserLogin.on('input', () => {
    addUserDataToSend[1] = addUserLogin.val().trim();
  });

  addUserPassword.on('input', () => {
    addUserDataToSend[2] = addUserPassword.val().trim();
  });

  addUserAccessOptions.click(function() {
    addUserDataToSend[3] = $(this).text();
  });

  addUserEmail.on('input', () => {
    addUserDataToSend[4] = addUserEmail.val().trim();
  });

  addUserSender.click(function(event) {
    event.preventDefault();

    if ($('.responseContainer').children().length >= 1) {
      $('.responseContainer').children().first().remove();
    }

    if (isEmpty(addUserName)) {
      createError('Вы не ввели имя сотрудника!', '.responseContainer');
    } else if (isEmpty(addUserLogin)) {
      createError('Вы не ввели логин пользователя!', '.responseContainer');
    } else if (isEmpty(addUserPassword)) {
      createError('Вы не ввели пароль пользователя!', '.responseContainer');
    } else if (isEmpty(addUserEmail)) {
      createError('Вы не ввели Email пользователя', '.responseContainer');
    } else {
      $(".responseContainer").children().remove();
      console.log(addUserDataToSend);
      $.ajax({
        type: "POST",
        url: "/server_processing/admin/data/add/addUserHandler.php",
        data: {
          insertedData: addUserDataToSend,
        },
      }).done(function (response) {
        addUserName.val("");
        addUserLogin.val("");
        addUserPassword.val("");
        addUserEmail.val("");

        $(".responseContainer").html(response);

        //Reload page after successful program add response
        setTimeout(function () {
          location.reload();
        }, 2000);
      });
    }
  });
});
