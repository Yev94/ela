import CrudUsers from 'http://localhost/ela/view/js/crud/crud_admin_users.js';

window.onload = () => {
    //From main form
    let users = document.getElementById('users');
    let name = document.getElementById('name');
    let lastName = document.getElementById('last-name');
    let identityCard = document.getElementById('dni');
    let img = document.getElementById('img');
    let nickname = document.getElementById('nickname');
    let password = document.getElementById('password');
    let form = document.getElementById('form');

    let crud = new CrudUsers(users);

    crud.init();


    //Submit of main form
    form.addEventListener('submit', (e) => {
        let formData = new FormData();
        formData.append('file', img.files[0]);

        let options = {
            method: 'POST',
            body: formData
        }

        ;(async () => {
            try {
                let response = await fetch('/ela/api/upload', options);
                let data = await response.json();
                let dataSend = {
                    name: name.value,
                    lastName: lastName.value,
                    identityCard: identityCard.value,
                    img: data.result,
                    nickname: nickname.value,
                    password: password.value
                };
                crud.create(dataSend);
                form.reset();
            } catch (error) {
                console.error(error);
            }
        })();
        
    });

}