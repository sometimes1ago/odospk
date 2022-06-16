$(document).ready(() => {
  //Program selected to change
  let changeProgDropdownValue = $(".dropdown__changeProgValue").data('dropdownvalue'),
    //Programs options list
    changeProgOptions = $(".changeProgOptions").children(),
    //Program property dropdown value
    changePropPropDropdownValue = $(".dropdown__changeProgProp").data('dropdownvalue'),
    //Program property options list
    changeProgPropOptions = $(".changeProgPropOptions").children(),
    //Program selected course type value
    changeProgCourseTypeValue = $(".dropdown__program-course-type__value").data('dropdownvalue'),
    //Program selected diploma type value
    changeProgDiplomaTypeValue = $(".dropdown__program-diploma-type__value").data('dropdownvalue'),

    courseTypeOptions = $(".courseTypeOptions").children(),
    courseDiplomaOptions = $(".courseDiplomaTypeOptions").children();

  //Program diploma type dropdown
  const changeProgDiplomaType = $(".dropdown__prog-diploma-type"),
    //Program property new value input
    changeProgInputValue = $(".changeProgramValue"),
    //Program course type dropdown
    changePropCourseType = $(".dropdown__prog-course-type");

  let changeProgDataToSend = [
    changeProgDropdownValue, 
    changePropPropDropdownValue, 
    changeProgInputValue.val().trim()
  ];

  /* On change value into input data grabbing */
  changeProgInputValue.on('input', () => {
    changeProgDataToSend = [
      changeProgDropdownValue, 
      changePropPropDropdownValue, 
      changeProgInputValue.val().trim()
    ];
  });

  changeProgOptions.click(function() {
    changeProgDropdownValue = $(this).text();
  });
  

  changeProgPropOptions.each(function() {
    $(this).click(function() {
      changePropPropDropdownValue = $(this).text();

      if (changePropPropDropdownValue == "Тип программы") {
        changeProgInputValue.css({display: 'none'});
        changePropCourseType.css({display: 'block'});
        changeProgDiplomaType.css({display: 'none'});

        /* Initial data grabbing on prog prop change*/
        changeProgDataToSend = [
          changeProgDropdownValue, 
          changePropPropDropdownValue, 
          changeProgCourseTypeValue
        ];

        courseTypeOptions.each(function() {
          $(this).click(function() {
            changeProgCourseTypeValue = $(this).text();

            /* OnChange dropdown data grabbing */
            changeProgDataToSend = [
              changeProgDropdownValue, 
              changePropPropDropdownValue, 
              changeProgCourseTypeValue
            ];
          });
        });
      } else if (changePropPropDropdownValue == "Выдаваемый документ") {
        changeProgInputValue.css({display: 'none'});
        changeProgDiplomaType.css({display: 'block'});
        changePropCourseType.css({display: 'none'});

        /* Initial data grabbing on prog prop change*/
        changeProgDataToSend = [
          changeProgDropdownValue, 
          changePropPropDropdownValue, 
          changeProgDiplomaTypeValue
        ];

        courseDiplomaOptions.each(function() {
          $(this).click(function() {
            changeProgDiplomaTypeValue = $(this).text();

            changeProgDataToSend = [
              changeProgDropdownValue, 
              changePropPropDropdownValue,
              changeProgDiplomaTypeValue
            ];
          });
        });
      } else {
        changeProgDiplomaType.css({display: 'none'});
        changePropCourseType.css({display: 'none'});
        changeProgInputValue.css({display: 'block'});

        changeProgDataToSend = [
          changeProgDropdownValue, 
          changePropPropDropdownValue, 
          changeProgInputValue.val().trim()];
      }
    });
  });

  if (changePropPropDropdownValue != "Тип программы") {
    changeProgDiplomaType.css({display: 'none'});
    changeProgInputValue.css({display: 'block'});
  }

  if (changePropPropDropdownValue != "Выдаваемый документ") {
    changePropCourseType.css({display: 'none'});
    changeProgInputValue.css({display: 'block'});
  }

  $('.changeProgramSender').click(function(event) {
    event.preventDefault();

    if ($('.responseContainer').children().length >= 1) {
      $('.responseContainer').children().first().remove();
    }

    if (changeProgInputValue.css('display') == 'block') {
      if (isEmpty(changeProgInputValue)) {
        createError('Вы не ввели значение!', '.responseContainer');
      } else {
        $('.responseContainer').children().remove();

        $.ajax({
          type: "POST",
          url: "/server_processing/admin/data/change/changeProgramHandler.php",
          data: { 
            insertedData: 
            changeProgDataToSend 
          },
        }).done(function (response) {
          changeProgInputValue.val('');
          $('.responseContainer').html(response);
          
          //Reload page after successful program change response
          setTimeout(function() {
            location.reload();
          }, 2000);
        });
      }
    }

    if (changePropPropDropdownValue == "Тип программы" || changePropPropDropdownValue == "Выдаваемый документ") {
      $('.responseContainer').children().remove();

      $.ajax({
        type: "POST",
        url: "/server_processing/admin/data/change/changeProgramHandler.php",
        data: { 
          insertedData: 
          changeProgDataToSend 
        },
      }).done(function (response) {
        $('.responseContainer').html(response);
        
        //Reload page after successful program change response
        setTimeout(function() {
          location.reload();
        }, 2000);
      });
    }
  });
});
