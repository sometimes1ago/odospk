//Program selected to change
let changeProgDropdownValue = document.querySelector('.dropdown__changeProgValue').dataset.dropdownvalue,
  //Programs options list
  changeProgOptions = document.querySelectorAll('.changeProgOption'),
  //Program property dropdown value
  changePropPropDropdownValue = document.querySelector('.dropdown__changeProgProp').dataset.dropdownvalue,
  //Program property options list
  changeProgPropOptions = document.querySelectorAll('.changeProgPropOption'),
  //Program selected course type value
  changeProgCourseTypeValue = document.querySelector('.dropdown__program-course-type__value').dataset.dropdownvalue,
  //Program selected diploma type value
  changeProgDiplomaTypeValue = document.querySelector('.dropdown__program-diploma-type__value').dataset.dropdownvalue;

  courseTypeOptions = document.querySelectorAll('.courseTypeOption');

//Program diploma type dropdown 
const changeProgDiplomaType = document.querySelector('.dropdown__prog-diploma-type'),
  //Program property new value input
  changeProgInputValue = document.querySelector('.changeProgramValue'),
  //Program course type dropdown
  changePropCourseType = document.querySelector('.dropdown__prog-course-type');

/* On change value into input data grabbing */
changeProgInputValue.onchange = () => {
  let changeDataToSend = [
    changeProgDropdownValue,
    changePropPropDropdownValue,
    changeProgInputValue.value
  ];
}

changeProgOptions.forEach((changeProgOption) => {
  changeProgOption.addEventListener('click', () => {
    changeProgDropdownValue = changeProgOption.textContent;
  });
});

changeProgPropOptions.forEach((changeProgPropOption) => {
  changeProgPropOption.addEventListener('click', () => {
    changePropPropDropdownValue = changeProgPropOption.textContent;

    if (changePropPropDropdownValue == 'Тип программы') {
      changeProgInputValue.style.display = 'none';
      changePropCourseType.style.display = 'block';
      changeProgDiplomaType.style.display = 'none';

      /* Initial data grabbing */
      let changeDataToSend = [
        changeProgDropdownValue,
        changePropPropDropdownValue,
        changeProgCourseTypeValue
      ];

      courseTypeOptions.forEach((courseTypeOption) => {
        courseTypeOption.addEventListener('click', () => {
          changeProgCourseTypeValue = courseTypeOption.textContent;

          /* OnChange dropdown data grabbing */
          let changeDataToSend = [
            changeProgDropdownValue,
            changePropPropDropdownValue,
            changeProgCourseTypeValue
          ];
        });
      });

      
    } else if (changePropPropDropdownValue == 'Выдаваемый документ') {
      changeProgInputValue.style.display = 'none';
      changeProgDiplomaType.style.display = 'block';
      changePropCourseType.style.display = 'none';
    } else {
      changeProgDiplomaType.style.display = 'none';
      changePropCourseType.style.display = 'none';
      changeProgInputValue.style.display = 'block';
    }
  });
});

if (changePropPropDropdownValue != 'Тип программы') {
  changeProgDiplomaType.style.display = 'none';
  changeProgInputValue.style.display = 'block';
}

if (changePropPropDropdownValue != 'Выдаваемый документ') {
  changePropCourseType.style.display = 'none';
  changeProgInputValue.style.display = 'block';
}
