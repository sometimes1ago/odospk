$(document).ready(() => {
  let changeUserProps = $('.changeUserProps').children(),
    changeUserInput = $('.changeUserValue'),
    changeUserProp = $('.dropdown__changeUserProp').data('dropdownvalue'),
    changeUserConfirmBtn = $('.changeUserConfirm');

  let changeUserDataToSend = [
    changeUserProp,
    changeUserInput.val().trim()
  ];

  changeUserInput.on('input', () => {
    changeUserDataToSend = [
      changeUserProp,
      changeUserInput.val().trim()
    ];
  });

  changeUserProps.click(function() {
    changeUserProp = $(this).text();

    changeUserDataToSend = [
      changeUserProp,
      changeUserInput.val().trim()
    ];
  });

  changeUserConfirmBtn.click(function(event) {
    event.preventDefault();

    if ($('.changeUserResult').children().length >= 1) {
      $('.changeUserResult').children().first().remove();
    }

    if (isEmpty(changeUserInput)) {
      createError('Вы не ввели значение для изменения данных!', '.changeUserResult');
    } else {
      $('.changeUserResult').children().remove();

      $.ajax({
        type: "POST",
        url: "/server_processing/admin/users/changeUserHandler.php",
        data: { 
          insertedData: 
          changeUserDataToSend 
        },
      }).done(function (response) {
        changeUserInput.val('');

        $('.changeUserResult').html(response);
        
        //Reload page after successful user change response
        setTimeout(function() {
          location.reload();
        }, 2000);
      });
    }
  });
});