$(document).ready(() => {
  let feedbackValue = $(".dropdown__changeFeedbackValue").data("dropdownvalue"),
    feedbackProp = $(".dropdown__changeFeedbackProp").data("dropdownvalue"),
    feedbackChangeValue = $(".changFeedbackValue"),
    feedbackChangeOptions = $(".changeFeedbackOptions").children(),
    feedbackChangePropOptions = $(".changeFeedbackPropOptions").children();

  let changeFeedbackDataToSend = [
    feedbackValue, 
    feedbackProp, 
    feedbackChangeValue.value
  ];

  feedbackChangeValue.on('input', () => {
    changeFeedbackDataToSend = [
      feedbackValue, 
      feedbackProp, 
      feedbackChangeValue.val().trim()
    ];
  });

  feedbackChangeOptions.click(function() {
    feedbackValue = $(this).text();
  });

  feedbackChangePropOptions.click(function() {
    feedbackProp = $(this).text();
  });

  $('.changeFeedbackSender').click(function(event) {
    event.preventDefault();

    if (isEmpty(feedbackChangeValue)) {
      createError('Вы не ввели значение!', '.responseContainer');
    } else {
      $('.responseContainer').children().remove();

      $.ajax({
        type: "POST",
        url: "/server_processing/admin/data/change/changeFeedbackHandler.php",
        data: { 
          insertedData: 
          changeFeedbackDataToSend 
        },
      }).done(function (response) {
        feedbackChangeValue.val('');
        $('.responseContainer').html(response);
      
        //Reload page after successful feedback change response
        setTimeout(function() {
          location.reload();
        }, 2000);
      });
    }
  });
});
