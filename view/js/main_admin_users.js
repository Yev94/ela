import Crud from 'http://localhost/ela/view/js/crud.js';

window.onload = () => {
    //From main form
    let users = document.getElementById('users');
    let name = document.getElementById('name');
    let identityCard = document.getElementById('identity-card');
    let form = document.getElementById('form');
    
    let app = new Crud(users);
    
    app.init();

    //Submit of main form
    form.addEventListener('submit', (e) =>  {
        app.create(name.value, identityCard.value);
        form.reset();
    });
}