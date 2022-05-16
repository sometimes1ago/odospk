let changeUser = document.querySelector('.dropdown__changeUserValue').dataset.dropdownvalue,
  changeUserProp = document.querySelector('.dropdown__changeUserProp').dataset.dropdownvalue,
  changeUserAccessValue = document.querySelector('.dropdown__changeUserAccessValue').dataset.dropdownvalue;
  changeUserPropOptions = document.querySelectorAll('.changeUserPropOption'),
  changeUserAccessLevels = document.querySelectorAll('.accessLevelOption');

const changeUserPhoto = document.querySelector('.changeUserPhoto'),
  changeUserAccess = document.querySelector('.dropdown__changeUserAccess'),
  changeUserInput = document.querySelector('.changeUserValue');

let changeUserDataToSend = [
  changeUser,
  changeUserProp,
  changeUserInput.value
];

changeUserInput.onchange = () => {
  changeUserDataToSend = [
    changeUser,
    changeUserProp,
    changeUserInput.value
  ];
}

changeUserPropOptions.forEach((changeUserPropOption) => {
  changeUserPropOption.addEventListener('click', () => {
    changeUserProp = changeUserPropOption.textContent;

    if (changeUserProp == 'Фото') {
      changeUserPhoto.style.display = 'block';
      changeUserAccess.style.display = 'none';
      changeUserInput.style.display = 'none';

      changeUserDataToSend = [
        changeUser,
        changeUserProp,
        changeUserPhoto
      ];

    } else if (changeUserProp == 'Уровень доступа') {
      changeUserPhoto.style.display = 'none';
      changeUserAccess.style.display = 'block';
      changeUserInput.style.display = 'none';

      changeUserDataToSend = [
        changeUser,
        changeUserProp,
        changeUserAccessValue
      ];

      changeUserAccessLevels.forEach((userAccessLevel) => {
        userAccessLevel.addEventListener('click', () => {
          changeUserAccessValue = userAccessLevel.textContent;

          changeUserDataToSend = [
            changeUser,
            changeUserProp,
            changeUserAccessValue
          ];
        });
      });
    }
  });
});



