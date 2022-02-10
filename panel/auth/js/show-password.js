const passwordInput = document.querySelector('.auth-form__input-pass');
const passShowIcon = document.querySelector('.auth-form__custom-input__icon');

passShowIcon.addEventListener('click', () => {
    if (passwordInput.getAttribute('type') == 'password') {
		passwordInput.setAttribute('type', 'text');
	} else {
		passwordInput.setAttribute('type', 'password');
	}
});