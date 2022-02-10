const inputsArray = document.querySelectorAll('.auth-form__custom-input'); 

function InputFocus() {
    inputsArray.forEach((input) => {
        input.addEventListener('click', (e) => {
            input.classList.toggle('auth-form__custom-input__focused');
        })
    })
}

InputFocus();