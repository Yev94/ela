import BootstrapEla from './bootstrap.js';
export default class Crud {

    url = 'http://localhost/ela/api';

    constructor(users) {
        this.users = users;
    }


    init() {
        this.reed();
    }

    reed() {

        while (this.users.firstChild) {
            this.users.removeChild(this.users.firstChild);
        }

        fetch(this.url)
            .then(response => response.json())
            .then(data => {
                data.forEach(user => {
                    //We create a new table elements
                    let row = document.createElement('tr');
                    let columnID = document.createElement('td');
                    let columnName = document.createElement('td');
                    let columnLastName = document.createElement('td');
                    let columnButton = document.createElement('td');
                    let buttonDelete = document.createElement('button');
                    let buttonEdit = document.createElement('button');

                    //We add the text to the button
                    let textEnviar = document.createTextNode('Editar');
                    let textEliminar = document.createTextNode('Eliminar');
                    buttonDelete.appendChild(textEliminar);
                    buttonEdit.appendChild(textEnviar);

                    //We add buttons to the table
                    columnButton.appendChild(buttonDelete);
                    columnButton.appendChild(buttonEdit);

                    //We add classes to the table elements
                    columnID.classList.add('id');
                    columnID.classList.add('name');
                    columnLastName.classList.add('last-name');
                    columnButton.classList.add('button');
                    buttonDelete.classList.add('btn', 'btn-danger', 'm-1', 'btn-delete');
                    buttonEdit.classList.add('btn', 'btn-info', 'm-1', 'btn-edit');

                    //We add the text to the table
                    let textID = document.createTextNode(user.id);
                    let textName = document.createTextNode(user.user_name);
                    let textLastName = document.createTextNode(user.last_name);
                    columnID.appendChild(textID);
                    columnName.appendChild(textName);
                    columnLastName.appendChild(textLastName);

                    //We events to the buttons so we can delete and edit
                    buttonDelete.addEventListener('click', () => {
                        this.delete(user.id);
                    });
                    buttonEdit.addEventListener('click', () => {
                        this.update(user.id);
                    });

                    //We add the table elements to the table
                    row.appendChild(columnID);
                    row.appendChild(columnName);
                    row.appendChild(columnLastName);
                    row.appendChild(columnButton);
                    columnButton.appendChild(buttonEdit);
                    columnButton.appendChild(buttonDelete);
                    this.users.appendChild(row);
                }
                )



            })
            .catch(error => console.error(error));

    }

    create(inputName, inputLastName) {
        let data = { inputName, inputLastName };
        let urlAPI = this.url + '?insert=true';
        fetch(urlAPI, {
            method: 'PUT',
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(data => {
                this.reed();
            })
            .catch(error => console.error(error));
    }

    delete(id) {
        let urlAPI = this.url + '?delete=' + id;
        fetch(urlAPI, {
            method: 'DELETE'
        })
            .then(response => response.json())
            .then(data => {
                this.reed();
            })
            .catch(error => console.error(error));
    }

    update(id) {
        let modal = document.getElementById('modalUserInfo');

        //From modal form
        let idUpdate = document.getElementById('id-update');
        let inputNameUpdate = document.getElementById('name-update');
        let inputLastNameUpdate = document.getElementById('last-name-update');
        let formUpdate = document.getElementById('form-update');

        let urlAPI = this.url + '?consult=' + id;

        fetch(urlAPI)
            .then(response => response.json())
            .then(data => {
                idUpdate.value = data[0].id;
                inputNameUpdate.value = data[0].user_name;
                inputLastNameUpdate.value = data[0].last_name;
            })
            .catch(error => console.error(error));


        let bootstrap = new BootstrapEla(modal);
        bootstrap.openModal();
        
        let submitFormUpdate = () => {
            let data = { 
                idUpdate : idUpdate.value, 
                inputNameUpdate : inputNameUpdate.value,
                inputLastNameUpdate : inputLastNameUpdate.value
            };
    
            let urlAPI = this.url + '?update=' + id;
            fetch(urlAPI, {
                method: 'PUT',
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    bootstrap.closeModal();

                    this.reed();
                }
                )
                .catch(error => console.error(error));
            formUpdate.removeEventListener('submit', submitFormUpdate);
        }
        //Submit of modal form
        formUpdate.addEventListener('submit', submitFormUpdate);
    }
}