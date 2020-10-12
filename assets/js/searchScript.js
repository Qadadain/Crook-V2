import { searchNavbar } from "./axiosRequest";

const searchNav = document.getElementById('fixed-header-drawer-exp');
const searchBarResult = document.getElementById('searchBarResult');

searchNav.addEventListener('keyup', e => {
    searchBarResult.innerHTML = '';
    if (e.target.value) {
        let formData = new FormData();
        formData.append('searchNav', e.target.value);
        searchNavbar(formData).then(response => {
            let ul = document.createElement('ul');
            for (let i = 0; i < response.length; i++) {
                let li = document.createElement('li')
                let a = document.createElement('a')
                a.setAttribute('href', `/sheet/${response[i].language}/${response[i].slug}`);
                li.textContent = response[i].title;
                a.appendChild(li);
                ul.appendChild(a);
            }
            searchBarResult.appendChild(ul);
        }).catch(error => {
            console.log(error)
        });
    }
})
