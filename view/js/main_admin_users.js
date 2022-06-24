import CrudUsers from 'http://localhost/ela/view/js/crud/crud_admin_users.js';

window.onload = () => {
    //From main form
    let users = document.getElementById('users');
    let name = document.getElementById('name');
    let lastName = document.getElementById('last-name');
    let form = document.getElementById('form');
    
    let crud = new CrudUsers(users);
    
    crud.init();

    //Submit of main form
    form.addEventListener('submit', (e) =>  {
        crud.create(name.value, lastName.value);
        form.reset();
    });

}