window.onload = function() {
    let tabStudent = document.getElementById('tab-student');
    let tabTeacher = document.getElementById('tab-teacher');
    let loginTitle = document.getElementById('login-title');
    let inputRole = document.getElementById('input-role');

    tabStudent.addEventListener('click', function() {
        loginTitle.innerHTML = 'Iniciar sesión como alumno 👩🏻‍🎓';
        tabTeacher.classList.remove('active');
        tabStudent.classList.add('active');
        inputRole.value = '1';
    }
    );

    tabTeacher.addEventListener('click', function() {
        loginTitle.innerHTML = 'Iniciar sesión como profesor 👨🏻‍🏫';
        tabStudent.classList.remove('active');
        tabTeacher.classList.add('active');
        inputRole.value = '2';
    }
    );

}