<?php

$title = 'Contact';
include 'templates/head.php';

?>
</head>

<!-- Create contact form -->
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact <?php echo ucwords($name);?> </h1>
                <form action="/ela/contact" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php
    include 'templates/footer.php';
?>
