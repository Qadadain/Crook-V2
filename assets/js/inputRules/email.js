import { rulesEmail } from './rules';


const inputEmail = document.getElementById('registration_form_email');
const errorEmail = document.getElementById('errorEmail');


inputEmail.addEventListener('change', () => {
    errorEmail.innerHTML = '';
    let errorsArray = [];

    if (!rulesEmail.regexEmail.test(inputEmail.value)) {
        errorsArray.push(rulesEmail.noValid);
    }

    if (errorsArray.length !== 0) {
        for (let i = 0; i < errorsArray.length; i++) {
            errorEmail.innerHTML = errorsArray[i];
        }
    } else {
        inputEmail.style.borderColor = 'green';
    }
})

