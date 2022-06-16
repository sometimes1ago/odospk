$(document).ready(() => {
  let removeUserOptions = $(".removeUserOptions").children(),
    selectedUser = $(".dropdown__removeUserValue").data("dropdownvalue"),
    removeUserSender = $(".removeUserSender");

    removeUserOptions.click(function () {
      selectedUser = $(this).text();
  });

  removeUserSender.click(function (event) {
    event.preventDefault();

    $.ajax({
      type: "POST",
      url: "/server_processing/admin/data/remove/removeUserHandler.php",
      data: { 
        insertedData: 
        selectedUser
      },
    }).done(function (response) {
      $('.responseContainer').html(response);

      //Reload page after successful user removing response
      setTimeout(function() {
        location.reload();
      }, 2000);
    });
  });
});