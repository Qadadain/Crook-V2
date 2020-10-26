import {rulesPseudo} from "./rules";


const pseudoInput = document.getElementById('registration_form_pseudo');
const errorPseudo = document.getElementById('errorPseudo');

pseudoInput.addEventListener('change', () => {
    errorPseudo.innerHTML = '';
    let errorsArrayPseudo = [];

    if (pseudoInput.value.length > 50) {
        errorsArrayPseudo.push(rulesPseudo.lenght);
    }

    if (errorsArrayPseudo.length) {
        pseudoInput.style.borderColor = 'red';
        for (let i = 0; i < errorsArrayPseudo.length; i++) {
            errorPseudo.innerHTML = errorsArrayPseudo[i];
        }
    } else {
        pseudoInput.style.borderColor = 'green';
    }
})