import ApiCrud from 'http://localhost/ela/view/js/api_crud.js';
import CreateAndAppend from 'http://localhost/ela/view/js/create_and_append.js';
import BootstrapEla from '../bootstrap.js';
export default class CrudCourses {

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
                let columnShortName = this.createAndAppend.element(row, 'td');
                let columnLongName = this.createAndAppend.element(row, 'td');
                let columnYear = this.createAndAppend.element(row, 'td');
                let columnButton = this.createAndAppend.element(row, 'td');
                let updateButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-info m-1 btn-edit');
                let deleteButton = this.createAndAppend.element(columnButton, 'button', 'btn btn-danger m-1 btn-delete');

                this.createAndAppend.textElement(columnID, course.id ?? '-');
                this.createAndAppend.textElement(columnShortName, course.short_name.toUpperCase() ?? '-');
                this.createAndAppend.textElement(columnLongName, course.long_name ?? '-');
                this.createAndAppend.textElement(columnYear, course.year ?? '-');
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

    create(inputShortName, inputLongName, inputYear) {
        let dataSend = {
            inputShortName: inputShortName.toLowerCase(),
            inputLongName: inputLongName,
            inputYear
        };
        this.api.create(dataSend);
        this.reed();
    }

    delete(id) {
        this.api.delete(id);
        this.reed();
    }

    update(id) {
        let modalCourse = document.getElementById('modal-course-info');

        //From modal form
        let idUpdate = document.getElementById('id-update');
        let inputShortNameUpdate = document.getElementById('short-name-update');
        let inputLongNameUpdate = document.getElementById('long-name-update');
        let inputYearUpdate = document.getElementById('year-update');
        let formUpdate = document.getElementById('form-update');
        let buttonClose = document.querySelector('.button-close');

        formUpdate.reset();
        let response = this.api.consult(id);

        //Create async await for consult
        response.then(data => {
            data[0].id ? idUpdate.value = data[0].id : idUpdate.placeholder = '-';

            data[0].short_name ? inputShortNameUpdate.value = data[0].short_name : inputShortNameUpdate.placeholder = '-';
            data[0].long_name ? inputLongNameUpdate.value = data[0].long_name : inputLongNameUpdate.placeholder = '-';
            data[0].year ? inputYearUpdate.value = data[0].year : inputYearUpdate.placeholder = '-';
        }
        ).catch(error => console.error(error));

        let bootstrap = new BootstrapEla(modalCourse);
        bootstrap.openModal();

        let removeEventSubmit = () => {
            formUpdate.removeEventListener('submit', submitFormUpdate);
        }

        let removeEventsAndUpdate = () => {
            this.reed();
            removeEventSubmit();
            modalCourse.removeEventListener('hidden.bs.modal', removeEventsAndUpdate);
        }

        modalCourse.addEventListener('hidden.bs.modal', removeEventsAndUpdate);


        let submitFormUpdate = () => {
            let data = {
                inputShortNameUpdate: inputShortNameUpdate.value,
                inputLongNameUpdate: inputLongNameUpdate.value,
                inputYearUpdate: inputYearUpdate.value
            };

            this.api.update(idUpdate.value, data);
            bootstrap.closeModal();
            this.reed();
            removeEventSubmit();
        }
        //Submit of modal form
        formUpdate.addEventListener('submit', submitFormUpdate);
    }
}