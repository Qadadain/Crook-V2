import axios from 'axios';

export function favorite(formData) {
    return new Promise(((resolve, reject) => {
        axios.post('/profil/add-favorite', formData)
            .then( response => {
                resolve(response.data);
            })
            .catch( error => {
                reject(error.response.statusText);
            });
    }))
}

export function searchNavbar(formData) {
    return new Promise(((resolve, reject) => {
        axios.post('/home/axiosSearch', formData)
            .then( response => {
                resolve(response.data);
            })
            .catch( error => {
                reject(error.response.statusText);
            });
    }))
}
