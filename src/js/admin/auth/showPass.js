const passwordInput = document.querySelector('.password__input'),
  showPasswordIcon = document.querySelector('.show__password');

showPasswordIcon.addEventListener('click', () => {
  if (passwordInput.type == 'password') {
    passwordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
  }
});