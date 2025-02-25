<?php require 'showCards.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream House</title>
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
    <nav class="navbarre">
        <div class="nav-left">
            <div class="nav-title">
                <a href="index.html">Dream House</a>
            </div>
            <a class="nav-link" href="#scrollspyHeading1">Collection de meubles</a>
        </div>
        <button>commandes</button>
    </nav>
    <header>
        <h1>Urban Elegance</h1>
        <h2>Une selection de meubles pour votre confort</h2>
    </header>
    <section class="meubles-list" id="scrollspyHeading1">

    <?php
    echo showCards(8)
    ?>


        <!-- <div class="meuble-card">
            <div class="img-card" style="background:url(https://placehold.co/300x300);"></div>
            <span>REF : 57789009</span>
            <h3>Nom du meuble</h3>
            <p>99.9€</p>
            <div class="bottom">
                <button>ajouter au panier</button>
                <span><i class="fa-regular fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Tooltip on top"></i></span>
            </div>
        </div> -->


    </section>
    <footer>
        <div class="links">
            <a href="#">à propos</a> | <a href="#">mention légales</a> |  <a href="#">confidentialité</a>
        </div>
        <span><b>DREAM HOUSE</b> © BARBIER Théo, LE CALVEZ Morgane 2025</span>
    </footer>
    <script src="node_modules\@popperjs\core\dist\umd\popper.js"></script>
    <script src="node_modules\bootstrap\dist\js\bootstrap.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>