import Crud from './crud.js';

window.onload = () => {
    //From main form
    let users = document.getElementById('users');
    let name = document.getElementById('name');
    let lastName = document.getElementById('last-name');
    let form = document.getElementById('form');
    
    let app = new Crud(users);
    
    app.init();

    //Submit of main form
    form.addEventListener('submit', (e) =>  {
        app.create(name.value, lastName.value);
        form.reset();
    });
}