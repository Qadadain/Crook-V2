import axios from 'axios';

export function favorite(formData) {
    return new Promise(((resolve, reject) => {
        axios.post('/profil/add-favorite', formData)
            .then(function (response) {
                resolve(response.data);
            })
            .catch(function (error) {
                reject(error.response.statusText);
            });
    }))
}
