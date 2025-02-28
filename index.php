<?php require_once 'show.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dreamhouse</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.css">
    <script src="https://kit.fontawesome.com/dd845416b8.js" crossorigin="anonymous"></script>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?= showNavbar() ?>

    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <header style='background: url("./assets/img/dream_house_chair.jpg");background-size: cover;'>
                        <h1>Urban Elegance</h1>
                        <h2>Une sélection de meubles pour votre confort</h2>
                        <a href='./detail.php'>Découvrez Soki<i class='fa-solid fa-arrow-right'></i></a>
                    </header>
            </div>
            <div class="swiper-slide">
                <?= showCarousel() ?>
            </div>
            <div class="swiper-slide">
                <?= showCarousel() ?>
            </div>
        </div>
    </div>

    <div class="title-list">
        <p>Notre collection</p>
    </div>

    <section class="meubles-list" id="scrollspyHeading1">
        <?= showCards(8) ?>
    </section>


    <?= showFooter() ?>

    <script src="node_modules\@popperjs\core\dist\umd\popper.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="./assets/js/script.js"></script>

</body>

</html>