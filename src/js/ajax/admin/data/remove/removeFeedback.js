$(document).ready(() => {
  let removeFeedbacksOptions = $(".removeFeedbackOptions").children(),
    selectedFeedback = $(".dropdown__removeFeedbackValue").data("dropdownvalue"),
    removeFeedbackSender = $(".removeFeedbackSender");

    removeFeedbacksOptions.click(function () {
      selectedFeedback  = $(this).text();
  });

  removeFeedbackSender.click(function (event) {
    event.preventDefault();

    $.ajax({
      type: "POST",
      url: "/server_processing/admin/data/remove/removeFeedbackHandler.php",
      data: { 
        insertedData: 
        selectedFeedback
      },
    }).done(function (response) {
      $('.responseContainer').html(response);
    });
  });
});