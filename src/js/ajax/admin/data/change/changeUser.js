let changeUser = document.querySelector('.dropdown__changeUserValue').dataset.dropdownvalue,
  changeUserProp = document.querySelector('.dropdown__changeUserProp').dataset.dropdownvalue,
  changeUserAccessValue = document.querySelector('.dropdown__changeUserAccessValue').dataset.dropdownvalue,
  changeUserPropOptions = document.querySelectorAll('.changeUserPropOption'),
  changeUserAccessLevels = document.querySelectorAll('.accessLevelOption'),
  changeUserOptions = document.querySelectorAll('.changeUserOption');

const changeUserAccess = document.querySelector('.dropdown__changeUserAccess'),
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

changeUserOptions.forEach((changeUserOption) => {
  changeUserOption.addEventListener('click', () => {
    changeUser = changeUserOption.textContent;

    changeUserDataToSend = [
      changeUser,
      changeUserProp,
      changeUserInput.value
    ];

  });
});

changeUserPropOptions.forEach((changeUserPropOption) => {
  changeUserPropOption.addEventListener('click', () => {
    changeUserProp = changeUserPropOption.textContent;

    if (changeUserProp == 'Уровень доступа') {
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
    } else {
      changeUserAccess.style.display = 'none';
      changeUserInput.style.display = 'block';
    }
  });
});

if (changeUserProp != 'Уровень доступа') {
  changeUserInput.style.display = 'block';
  changeUserAccess.style.display = 'none';
}





