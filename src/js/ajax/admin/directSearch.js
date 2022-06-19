$(document).ready(() => {
  let searchBy = $(".dropdown__searchBy").data("dropdownvalue"),
    searchByOptions = $(".searchPropOptions").children(),
    searchByValue = $(".searchByValue"),
    searchSender = $(".searchSender");

  let searchDataToSend = [searchBy, searchByValue.val().trim()];

  searchByOptions.click(function () {
    searchBy = $(this).text();

    searchDataToSend = [searchBy, searchByValue.val().trim()];
  });

  searchByValue.on("input", function () {
    searchDataToSend = [searchBy, searchByValue.val().trim()];
  });

  searchSender.click(function(event) {
    event.preventDefault();

    searchDataToSend = [searchBy, searchByValue.val().trim(), location.pathname];

    $('.sortEduQueriesResult').children().remove();

    $.ajax({
      type: "POST",
      url: "/server_processing/admin/queries/directSearchHandler.php",
      data: { 
        dataToSearch: 
        searchDataToSend
      },
    }).done(function (response) {
      $('.sortEduQueriesResult').html(response);

      let checkboxes = $(".query__checkbox"),
        actionsContainer = $(".queries__actions");

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
