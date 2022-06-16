$(document).ready(() => {
  let removeProgOptions = $(".removeProgOptions").children(),
    selectedProgram = $(".dropdown__removeProgValue").data("dropdownvalue"),
    removeProgramSender = $(".removeProgramSender");

  removeProgOptions.click(function () {
    selectedProgram  = $(this).text();
  });

  removeProgramSender.click(function (event) {
    event.preventDefault();

    $.ajax({
      type: "POST",
      url: "/server_processing/admin/data/remove/removeProgramHandler.php",
      data: { 
        insertedData: 
        selectedProgram
      },
    }).done(function (response) {
      $('.responseContainer').html(response);

      //Reload page after successful program remove response
      setTimeout(function () {
        location.reload();
      }, 2000);
    });
  });
});
