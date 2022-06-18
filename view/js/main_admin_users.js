import Crud from 'http://localhost/ela/view/js/crud.js';

window.onload = () => {
    //From main form
    let users = document.getElementById('users');
    let name = document.getElementById('name');
    let lastName = document.getElementById('last-name');
    let form = document.getElementById('form');
    
    let crud = new Crud(users);
    
    crud.init();

    //Submit of main form
    form.addEventListener('submit', (e) =>  {
        crud.create(name.value, lastName.value);
        form.reset();
    });
}