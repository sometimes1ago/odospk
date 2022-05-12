let changeProgDropdownValue = document.querySelector('.dropdown__changeProgValue').dataset.dropdownvalue,
  changeProgOptions = document.querySelectorAll('.changeProgOption'),
  changePropPropDropdownValue = document.querySelector('.dropdown__changeProgProp').dataset.dropdownvalue,
  changeProgPropOptions = document.querySelectorAll('.changeProgPropOption'),
  changeProgCourseTypeValue = document.querySelector('.dropdown__program-diploma-type__value'),
  changeProgDiplomaTypeValue = document.querySelector('.dropdown__program-diploma-type__value');

const changeProgDiplomaType = document.querySelector('.dropdown__prog-diploma-type'),
  changeProgInputValue = document.querySelector('.changeProgramValue'),
  changePropCourseType = document.querySelector('.dropdown__prog-course-type');
  
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
      changePropCourseType.style.display = 'none';
      changeProgDiplomaType.style.display = 'block';
    } else if (changePropPropDropdownValue == 'Выдаваемый документ') {
      changeProgInputValue.style.display = 'none';
      changeProgDiplomaType.style.display = 'none';
      changePropCourseType.style.display = 'block';
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
