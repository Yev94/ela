import ApiCrud from 'http://localhost/ela/view/js/api_crud.js';
import CreateAndAppend from 'http://localhost/ela/view/js/create_and_append.js';
import BootstrapEla from './bootstrap.js';
export default class CrudUsers {

    url = '/users';
    
    api;
    createAndAppendElement;
    constructor(users) {
        this.api = new ApiCrud(this.url);
        this.users = users;
        this.createAndAppend = new CreateAndAppend();
    }

    init() {
        this.reed();
    }


    reed() {
        while (this.users.firstChild) {
            this.users.removeChild(this.users.firstChild);
        }
        let response = this.api.reed();
        response.then(data => {
            data.forEach(user => {
                let row = this.createAndAppend.element(this.users, 'tr');
                let columnID = this.createAndAppend.element(row, 'td');
                let columnName = this.createAndAppend.element(row, 'td');
                let columnIdentityCard = this.createAndAppend.element(row, 'td');
                let columnButton = this.createAndAppend.element(row, 'td');
                let updateButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-info m-1 btn-edit');
                let deleteButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-danger m-1 btn-delete');
                let enrolButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-info m-1 btn-warning');

                this.createAndAppend.textElement(columnID, user.id ?? '-');
                this.createAndAppend.textElement(columnName, user.user_name ?? '-');
                this.createAndAppend.textElement(columnIdentityCard, user.identity_card ?? '-');
                this.createAndAppend.textElement(updateButton, 'Editar');
                this.createAndAppend.textElement(deleteButton, 'Eliminar');
                this.createAndAppend.textElement(enrolButton, 'Matriculación');

                updateButton.addEventListener('click', () => {
                    this.update(user.id);
                }
                );

                deleteButton.addEventListener('click', () => {
                    this.delete(user.id);
                }
                );

                enrolButton.addEventListener('click', () => {
                    console.log("🐒 ~ file: crud_admin_users.js ~ line 57 ~ Crudusers ~ enrolButton.addEventListener ~ user", user);
                }
                );
            }
            );
        }
        ).catch(error => console.error(error));
    }

    create(inputName, inputLastName) {
        let dataSend = {
            inputName,
            inputLastName
        };
        this.api.create(dataSend);
        this.reed();
    }

    delete(id) {
        this.api.delete(id);
        this.reed();
    }

    update(id) {
        let modal = document.getElementById('modal-user-info');

        //From modal form
        let idUpdate = document.getElementById('id-update');
        let inputNameUpdate = document.getElementById('name-update');
        let inputLastNameUpdate = document.getElementById('last-name-update');
        let formUpdate = document.getElementById('form-update');
        let buttonClose = document.querySelector('.button-close');

        let response = this.api.consult(id);

        //Create async await for consult
        response.then(data => {
            data[0].id ? idUpdate.value = data[0].id : idUpdate.placeholder = '-';
            data[0].user_name ? inputNameUpdate.value = data[0].user_name : inputNameUpdate.placeholder = '-';
            data[0].last_name ? inputLastNameUpdate.value = data[0].last_name : inputLastNameUpdate.placeholder = '-';
        }
        ).catch(error => console.error(error));

        let bootstrap = new BootstrapEla(modal);
        bootstrap.openModal();

        let removeEventSubmit = () => {
            formUpdate.removeEventListener('submit', submitFormUpdate);
        }

        let removeEventsModal = () => {
            removeEventSubmit();
            buttonClose.removeEventListener('click', removeEventSubmit);
        }


        let submitFormUpdate = () => {
            let data = {
                inputNameUpdate: inputNameUpdate.value,
                inputLastNameUpdate: inputLastNameUpdate.value
            };

            this.api.update(idUpdate.value, data);
            bootstrap.closeModal();
            this.reed();
            removeEventSubmit();
        }
        //Submit of modal form
        formUpdate.addEventListener('submit', submitFormUpdate);
        buttonClose.addEventListener('click', removeEventsModal);
        this.reed();
    }
}