<footer class="p-3 mt-5 pt-md-5 border-top bg-light footer-ela">
    <div class="row">
        <div class="col-12 col-md">
            <img class="mb-2" src="<?php echo DOMAIN ?>img/logoescuelaweb2.png" alt="..." width="50" height="55">
            <small class="d-block mb-3 text-muted">© 2022</small>
        </div>
        <div class="col-12 col-sm-6 col-md">
            <h5>Contáctanos</h5>
            <ul class="list-unstyled text-small">
                <li class="mb-1"><a class="link-secondary text-decoration-none" title="Llamar" href="tel:+34608069225">60 80 69 225</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="mailto:info@ecoleammari.com?Subject=Contacto%20footer%20atención%20al%20cliente">info@ecoleammari.com</a></li>
                <li class="mb-1 link-secondary">C/ Me lo invento</li>
                <li class="mb-1 link-secondary">Alicante (Comunidad Valenciana)</li>
            </ul>
        </div>
        <div class="col-12 col-sm-6 col-md">
            <h5>Síguenos</h5>
            <ul class="list-unstyled text-small">
                <li class="mb-1">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-sm-6 col-md">
            <h5>Lo que nadie lee</h5>
            <ul class="list-unstyled text-small">
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Terminos y condiciones</a></li>
                <li class="mb-1"></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Política de privacidad</a></li>
                <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Política de cookies</a></li>
            </ul>
        </div>
    </div>
    <?php
    //Defined in src/controller/login_admin_controller.php->executePost()
    $sessionUser = new UserSession();
    $userRole = $sessionUser->getUserRole();
    if ($userRole == '3') {
        echo '<div class="telegram transform">
            <a></a>
        </div>';
    }
    ?>
</footer>
<script>
    let telegram = document.querySelector('.telegram');
    let toggleTelegram = (element) => {
        element.classList.toggle('transform');
        element.classList.toggle('transform-clicked');

    }
    telegram.addEventListener('click', function() {
        toggleTelegram(telegram);
        setTimeout(function() {
            window.open('https://t.me/Yev694', '_blank');
            toggleTelegram(telegram);
        }, 1100);
    });

    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>