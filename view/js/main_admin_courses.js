import CourseCrud from 'http://localhost/ela/view/js/crud_admin_courses.js';

window.onload = () => {
    //From main form
    let courses = document.getElementById('courses');
    let name = document.getElementById('name');
    let year = document.getElementById('year');
    let form = document.getElementById('form');
    
    let crud = new CourseCrud(courses);
    
    crud.init();

    //Submit of main form
    form.addEventListener('submit', (e) =>  {
        crud.create(name.value, year.value);
        form.reset();
    });
}