import { rulesPassword } from "./rules";

const inputPassword = document.getElementById('registration_form_plainPassword_first');
const inputRepeatPassword = document.getElementById('registration_form_plainPassword_second');
const errorPassword = document.getElementById('errorPassword');
const errorRepeatPassword = document.getElementById('errorRepeatPassword');

inputPassword.addEventListener('change', () => {
    errorPassword.innerHTML = '';
    let errorArrayPassword = [];

    if (!rulesPassword.regexPassword.test(inputPassword.value)) {
        errorArrayPassword.push(rulesPassword.noValid)
    }

    if (errorArrayPassword.length > 0) {
        for (let i = 0; i < errorArrayPassword.length; i++) {
            errorPassword.innerHTML = errorArrayPassword[i];
        }
    } else {
        inputPassword.style.borderColor = 'green';
    }
})

inputRepeatPassword.addEventListener('change', () => {
    errorRepeatPassword.innerHTML = '';
    let errorsArrayRepeatPassword = [];

    if (!rulesPassword.regexPassword.test(inputRepeatPassword.value)) {
        errorsArrayRepeatPassword.push(rulesPassword.noValid);
    }

    if (inputPassword.value !== inputRepeatPassword) {
        errorsArrayRepeatPassword.push(rulesPassword.samePassword);
    }

    if (errorsArrayRepeatPassword.length > 0) {
        for (let i = 0; i < errorsArrayRepeatPassword.length; i++) {
            errorRepeatPassword.innerHTML = errorsArrayRepeatPassword[i];
        }
    } else {
        inputPassword.style.borderColor = 'green';
    }
})