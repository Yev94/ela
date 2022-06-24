import * as assetFunction from 'http://localhost/ela/view/js/assets.js';
import ApiCrud from 'http://localhost/ela/view/js/api_crud.js';
import CreateAndAppend from 'http://localhost/ela/view/js/create_and_append.js';
import BootstrapEla from '../bootstrap.js';

export default class CrudEnrol {

    idUsers;
    urlUsers = '/users';
    urlCrudEnrollments = '/enrollments';
    urlEnrollments = '/ela/api' + this.urlCrudEnrollments;
    apiUsers;
    apiEnrollments;
    createAndAppend;
    tableEnrollments;
    bootstrap;

    constructor(id) {
        this.tableEnrollments = document.getElementById('table-enrollments');
        let modalEnrolment = document.getElementById('modal-enrolment');
        this.apiUsers = new ApiCrud(this.urlUsers);
        this.idUsers = id;
        this.createAndAppend = new CreateAndAppend();

        this.apiEnrollments = new ApiCrud(this.urlCrudEnrollments);

        this.setTitle();
        this.setButtonsListeners();
        this.consultByIdUser();

    }

    setTitle() {
        let modalTitle = document.getElementById('modal-enrolment-label');
        let response = this.apiUsers.consult(this.idUsers);
        //Create async await for consult
        response.then(data => {
            modalTitle.innerText = '';
            this.createAndAppend.textElement(modalTitle, ('Matriculas de ' + data[0].user_name + ' ' + data[0].last_name) ?? 'Usuario incorrecto');
        }
        ).catch(error => console.error(error));
    }

    setButtonsListeners() {
        let modalEnrolment = document.getElementById('modal-enrolment');
        let formEnrol = document.getElementById('form-enrol');
        let buttonCloseEnrol = document.querySelector('.button-close-enrol');
        let bootstrap = new BootstrapEla(modalEnrolment);
        let selectYearEnrol = document.querySelector('#year-enrol');
        bootstrap.openModal();
        
        
        let removeEventSubmit = () => {
            formEnrol.removeEventListener('submit', this.submitFormEnrol);
        }
        
        let removeEventSetNameEnrolment = () => {
            selectYearEnrol.removeEventListener('change', this.setNameEnrolmentByYear);
        }
        
        let removeEventsAndUpdate = () => {
            removeEventSubmit();
            removeEventSetNameEnrolment();
            modalEnrolment.removeEventListener('hidden.bs.modal', removeEventsAndUpdate);
        }
        
        modalEnrolment.addEventListener('hidden.bs.modal', removeEventsAndUpdate);

        //Submit of modal form
        selectYearEnrol.addEventListener('change', this.setNameEnrolmentByYear);
        formEnrol.addEventListener('submit', this.submitFormEnrol);

    }

    setNameEnrolmentByYear = (e) => {
        let response = this.getNameEnrolmentByYear(e.target.value);
        response.then(data => {
            let selectEnrolment = document.querySelector('#name-enrol');
            assetFunction.removeChildren(selectEnrolment);
            data.forEach(enrolment => {
                this.createAndAppend.optionElement(selectEnrolment, enrolment.name.toUpperCase(), enrolment.id);
            }
            );
        }
        ).catch(error => console.error(error));
    }

    getNameEnrolmentByYear(yearId) {
        let urlAPI = this.urlEnrollments + '?type=consultByYear&id=' + yearId;
        return this.apiEnrollments.connectAndReturnData(urlAPI);
    }

    consultByIdUser() {
        let urlAPI = this.urlEnrollments + '?type=consultByIdUser&id=' + this.idUsers;
        let response = this.apiEnrollments.connectAndReturnData(urlAPI);
        response.then(data => {
            assetFunction.removeChildren(this.tableEnrollments);
            let tableEnrollments = document.getElementById('table-enrollments');

            data.forEach(enrolment => {
                let date = new Date(enrolment.start_date).toLocaleDateString('es-ES');
                let row = this.createAndAppend.element(tableEnrollments, 'tr');
                let columnID = this.createAndAppend.element(row, 'td');
                let columnName = this.createAndAppend.element(row, 'td');
                let columnYear = this.createAndAppend.element(row, 'td');
                let columnRolUser = this.createAndAppend.element(row, 'td');
                let columnStartDate = this.createAndAppend.element(row, 'td');
                let columnButton = this.createAndAppend.element(row, 'td');
                // let updateButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-info m-1 btn-edit');
                let deleteButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-danger m-1 btn-delete');

                this.createAndAppend.textElement(columnID, enrolment.id ?? '-');
                this.createAndAppend.textElement(columnName, enrolment.name.toUpperCase() ?? '-');
                this.createAndAppend.textElement(columnYear, enrolment.year ?? '-');
                this.createAndAppend.textElement(columnRolUser, enrolment.rol ?? '-');
                this.createAndAppend.textElement(columnStartDate, date ?? '-');
                // this.createAndAppend.textElement(updateButton, 'Editar');
                this.createAndAppend.textElement(deleteButton, 'Eliminar');

                // updateButton.addEventListener('click', () => {
                //     this.update(enrolment.id);
                // }
                // );

                deleteButton.addEventListener('click', () => {
                    this.delete(enrolment.id);
                }
                );
            }
            )
        }).catch(error => console.error(error));
    }

    submitFormEnrol = () => {
        let form = document.getElementById('form-enrol');
        let selectEnrollment = document.querySelector('#name-enrol');
        let selectTypeUser = document.querySelector('#type-user');
        let selectDateEnrollment = document.querySelector('#date-enrollment');

        let sendData = {
            idUser: this.idUsers,
            selectEnrollment: selectEnrollment.value,
            selectTypeUser: selectTypeUser.value,
            selectDateEnrollment: selectDateEnrollment.value,
        }

        this.apiEnrollments.create(sendData);
        this.consultByIdUser();
    }

    delete(id) {
        this.apiEnrollments.delete(id);
        this.consultByIdUser();
    }
}