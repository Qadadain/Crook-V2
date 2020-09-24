import {favorite} from './axiosRequest';

const favorites = document.getElementsByClassName('favorite');
for (let i = 0; favorites.length > i; i++) {
    favorites[i].addEventListener('click', () => {
        const id = favorites[i].getAttribute('data-id');
        const formData = new FormData();
        formData.append('id', id)
        favorite(formData).then(r => {
console.log(r)
        }).catch(er => {
            console.log(er)
        })
    })

}


