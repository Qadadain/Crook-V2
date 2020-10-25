import {favorite} from './axiosRequest';

const favorites = document.getElementsByClassName('favorite');
for (let i = 0; favorites.length > i; i++) {
    favorites[i].addEventListener('click', () => {
        const id = favorites[i].getAttribute('data-id');
        const formData = new FormData();
        formData.append('id', id);

        favorite(formData).then(response => {
            if (!response) {
               favorites[i].textContent = 'favorite';
                favorites[i].classList.toggle('favorite-full');
            } else {
                favorites[i].textContent = 'favorite_border';
                favorites[i].classList.toggle('favorite-full');
            }
        }).catch(error => {

        })
    })

}


