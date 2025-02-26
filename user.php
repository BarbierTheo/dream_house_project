<?php include_once 'show.php' ?>

<?php
            $data = file_get_contents('./assets/json/users.json');
            $json = json_decode($data, TRUE);
            ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dreamhouse</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.css">
    <script src="https://kit.fontawesome.com/dd845416b8.js" crossorigin="anonymous"></script>
</head>

<body>

    <?= showNavbar() ?>



    <section class="users">
        <div class="user-list">
            <div class="user-tab">
                <h1>Liste d'utilisateurs</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom*</th>
                            <th scope="col">E-mail*</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Commandes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= showUsers() ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?= showFooter() ?>

    <script src="node_modules\@popperjs\core\dist\umd\popper.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="./assets/js/script.js"></script>

</body>

</html>