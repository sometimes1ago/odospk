$(document).ready(() => {
  let addProgName = $('.addProgName'),
    addProgEduLength = $('.addProdLength'),
    addProgCourseType = $('.dropdown__addProgCourseType').data('dropdownvalue'),
    addProgDiplomaType = $('.dropdown__addProgDiplomaType').data('dropdownvalue'),
    addProgCourseTypeOptions = $('.addProgCourseTypeOptions').children(),
    addProgDiplomaTypeOptions = $('.addProgDiplomaTypeOptions').children(),
    addProgSkills = $('.addProgSkills'),
    addProgDescription = $('.addProgDescription'),
    addProgPrice = $('.addProdPrice');

  let addProgDataToSend = [
    addProgName.val().trim(),
    addProgEduLength.val().trim(),
    addProgCourseType,
    addProgDiplomaType,
    addProgSkills.val().trim(),
    addProgDescription.val().trim(),
    addProgPrice.val().trim()
  ];

  addProgName.on('input', () => {
    addProgDataToSend[0] = addProgName.val().trim();
  });

  addProgEduLength.on('input', () => {
    addProgDataToSend[1] = addProgEduLength.val().trim();
  });

  addProgSkills.on('input', () => {
    addProgDataToSend[4] = addProgSkills.val().trim();
  });

  addProgDescription.on('input', () => {
    addProgDataToSend[5] = addProgDescription.val().trim();
  });

  addProgPrice.on('input', () => {
    addProgDataToSend[6] = addProgPrice.val().trim();
  });

  addProgCourseTypeOptions.click(function() {
    addProgDataToSend[2] = $(this).text();
  });

  addProgDiplomaTypeOptions.click(function() {
    addProgDataToSend[3] = $(this).text();
  });

  $('.addProdSender').click(function(event) {
    event.preventDefault();

    if ($('.responseContainer').children().length >= 1) {
      $('.responseContainer').children().first().remove();
    }

    if (isEmpty(addProgName)) {
      createError('Вы не ввели название!', '.responseContainer');
    } else if (isEmpty(addProgEduLength)) {
      createError('Вы не ввели срок обучения!', '.responseContainer');
    } else if (isEmpty(addProgSkills)) {
      createError('Вы не ввели чему учит программа!', '.responseContainer');
    } else if (isEmpty(addProgDescription)) {
      createError('Вы не ввели описание программы!', '.responseContainer');
    } else if (isEmpty(addProgPrice)) {
      createError('Вы не ввели стоимость программы!', '.responseContainer');
    } else {
      let parsedPrice = parseInt(addProgPrice.val().trim());

      if (Number.isInteger(parsedPrice)) {
        $(".responseContainer").children().remove();
        
        $.ajax({
          type: "POST",
          url: "/server_processing/admin/data/add/addProgramHandler.php",
          data: {
            insertedData: addProgDataToSend,
          },
        }).done(function (response) {
          addProgName.val("");
          addProgEduLength.val("");
          addProgSkills.val("");
          addProgDescription.val("");
          addProgPrice.val("");
  
          $(".responseContainer").html(response);
  
          //Reload page after successful program add response
          setTimeout(function () {
            location.reload();
          }, 2000);
        });
      } else {
        createError('Стоимость обучения может быть только числом!', '.responseContainer');
      }
    }
  });
});