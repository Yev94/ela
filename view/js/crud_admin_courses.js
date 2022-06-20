import ApiCrud from 'http://localhost/ela/view/js/api_crud.js';
import CreateAndAppend from 'http://localhost/ela/view/js/create_and_append.js';
import BootstrapEla from './bootstrap.js';
export default class Crud {

    url = '/courses';
    
    api;
    createAndAppendElement;
    constructor(courses) {
        this.api = new ApiCrud(this.url);
        this.courses = courses;
        this.createAndAppend = new CreateAndAppend();
    }

    init() {
        this.reed();
    }


    reed() {
        while (this.courses.firstChild) {
            this.courses.removeChild(this.courses.firstChild);
        }
        let response = this.api.reed();
        response.then(data => {
            data.forEach(course => {
                let row = this.createAndAppend.element(this.courses, 'tr');
                let columnID = this.createAndAppend.element(row, 'td');
                let columnName = this.createAndAppend.element(row, 'td');
                let columnIdentityCard = this.createAndAppend.element(row, 'td');
                let columnButton = this.createAndAppend.element(row, 'td');
                let updateButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-info m-1 btn-edit');
                let deleteButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-danger m-1 btn-delete');

                this.createAndAppend.textElement(columnID, course.id ?? '-');
                this.createAndAppend.textElement(columnName, course.name.toUpperCase() ?? '-');
                this.createAndAppend.textElement(columnIdentityCard, course.identity_card ?? '-');
                this.createAndAppend.textElement(updateButton, 'Editar');
                this.createAndAppend.textElement(deleteButton, 'Eliminar');

                updateButton.addEventListener('click', () => {
                    this.update(course.id);
                }
                );

                deleteButton.addEventListener('click', () => {
                    this.delete(course.id);
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
        let modal = document.getElementById('modal-course-info');

        //From modal form
        let idUpdate = document.getElementById('id-update');
        let inputNameUpdate = document.getElementById('name-update');
        let inputLastNameUpdate = document.getElementById('last-name-update');
        let formUpdate = document.getElementById('form-update');
        let buttonClose = document.querySelector('.button-close');

        let response = this.api.consult(id);

        //Create async await for consult
        response.then(data => {
            idUpdate.value = data[0].id;
            inputNameUpdate.value = data[0].course_name;
            inputLastNameUpdate.value = data[0].last_name;
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