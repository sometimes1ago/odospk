$(document).ready(() => {
  let headers = $(".headerSortBy__parent").children();

  headers.click(function () {
    let selectedHeader = $(this).data("sortbyvalue");

    $.ajax({
      type: "POST",
      url: "/server_processing/admin/queries/sortPhoneQueriesHandler.php",
      data: {
        sortBy: selectedHeader
      },
    }).done(function (response) {
      $(".sortCallsQueriesResult").html(response);

      let checkboxes = $(".query__checkbox");
      let actionsContainer = $(".queries__actions");

      checkboxes.on('change', function() {
        updateCheckbox($(this));
      });

      function updateCheckbox(checkbox) {
        checkbox.toggleClass("query__checkbox-active");
        let checkboxActive = $(".query__checkbox-active");
        actionsContainer.toggleClass("queries__actions-visible");

        if (checkboxActive.length > 1) {
          checkbox.prop('checked', false);
          actionsContainer.toggleClass("queries__actions-visible");
          checkbox.removeClass("query__checkbox-active");
        }
      }
    });
  });
});
