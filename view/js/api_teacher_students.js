import * as assetFunction from 'http://localhost/ela/view/js/assets.js';
import CreateAndAppend from 'http://localhost/ela/view/js/create_and_append.js';
import ApiCrud from 'http://localhost/ela/view/js/api_crud.js';

window.onload = () => {
    let form = document.getElementById('form')
    let apiTeacher = new ApiCrud();
    let urlTeacherStudents = '/teacher/students';
    let urlApiTeacherStudents = '/ela/api' + urlTeacherStudents;

    let courseElement = document.getElementById("course-name");
    let yearElement = document.getElementById("course-year");
    let createAndAppend = new CreateAndAppend();

    let getNameCourseByYear = (yearId) => {
        let urlAPI = urlApiTeacherStudents + '?type=consultByYear&id=' + yearId;
        return apiTeacher.connectAndReturnData(urlAPI);
    }

    let setNameCourseByYear = () => {
        let yearId = yearElement.value;
        let response = getNameCourseByYear(yearId);
        response.then(data => {
            assetFunction.removeChildren(courseElement);
            data.forEach(course => {
                createAndAppend.optionElement(courseElement, course.name.toUpperCase(), course.id);
            }
            );
        }
        ).catch(error => console.error(error));
    }

    yearElement.addEventListener('change', setNameCourseByYear);



    let getStudents = () => {
        let courseId = courseElement.value;
        let urlAPI = urlApiTeacherStudents + '?type=consultStudentsByCourse&id=' + courseId;
        let response = apiTeacher.connectAndReturnData(urlAPI);
        response.then(data => {
            let tableStudents = document.getElementById('students');
            assetFunction.removeChildren(tableStudents);

            data.forEach(students => {

                let date = new Date(students.start_date).toLocaleDateString('es-ES');
                let row = createAndAppend.element(tableStudents, 'tr');
                let columnID = createAndAppend.element(row, 'td');

                //avatar
                let avatar = createAndAppend.element(row, 'td');
                let img = createAndAppend.element(avatar, 'img');
                img.src = 'http://localhost/ela/img/users/' + (students.picture ?? 'default.png');
                img.classList.add('img-avatar');

                let columnName = createAndAppend.element(row, 'td');
                let columnIdentityCard = createAndAppend.element(row, 'td');
                let columnStartDate = createAndAppend.element(row, 'td');

                createAndAppend.textElement(columnID, students.id ?? '-');
                createAndAppend.textElement(columnName, students.name ?? '-');
                createAndAppend.textElement(columnIdentityCard, students.identity_card ?? '-');
                createAndAppend.textElement(columnStartDate, date ?? '-');

            }
            )
        }).catch(error => console.error(error));
    }
    getStudents();

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        getStudents();
    }
    );
};