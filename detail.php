<?php include_once 'show.php' ?>


<?php

$data = file_get_contents('./assets/json/products.json');
$json = json_decode($data, TRUE);
$product = 3;

// var_dump($json[$product]);
$fmt = numfmt_create('fr_FR', NumberFormatter::CURRENCY);


$reviews = file_get_contents('./assets/json/reviews_avg.json');
$reviewsJson = json_decode($reviews, TRUE);

$reviewsUnique = file_get_contents('./assets/json/reviews.json');
$reviewsUniqueJson = json_decode($reviewsUnique, TRUE);
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
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>

    <?= showNavbar() ?>

    <section class="product">
        <div class="img-meuble"
            style="background:url(<?= $json[$product]['product_img'] ?>);background-size: cover;background-position: center;">
        </div>
        <div class="meuble-barre">
            <div class="meuble-ref">référence : <?= $json[$product]['product_reference'] ?></div>
            <div class="meuble-prix"> <?= numfmt_format_currency($fmt, $json[$product]['product_price'], "EUR") ?></div>
        </div>
        <div class="meuble-main">
            <h1><?= $json[$product]['product_name'] ?></h1>
            <p><?= $json[$product]['product_description'] ?></p>
            <div class="meuble-bottom">
                <div class="left">
                    <h2>Catégories :</h2>
                    <div class="tags">
                        <?php 
                            

                        ?>

                        <span>Salle de bain</span>
                        <span>Cuisine</span>
                    </div>
                    <div class="note-box">
                        <h3>Notes et Avis</h3>
                        <a href="#scrollspyHeading1">Voir les commentaires</a>
                        <div class="note"><?= $reviewsJson[$product]['moyenne'] ?>/5</div>
                    </div>
                </div>
                <div class="right">
                    <div class="top">
                        <div class="commande">
                            <div class="quantity">
                                <button>-</button>
                                <p>1</p>
                                <button>+</button>
                            </div>
                            <div class="add-cart">
                                <button>Ajout au panier</button>
                            </div>
                            <div class="paypal">
                                <button><i class="fa-brands fa-paypal"></i> Paypal</button>
                            </div>
                            <div class="carte">
                                <button><i class="fa-regular fa-credit-card"></i> Carte de crédit</button>
                            </div>
                        </div>
                        <div class="total">
                            <span>Total de la commande</span>
                            <b><?= numfmt_format_currency($fmt, $json[$product]['product_price'], "EUR") ?></b>
                            <i>Nom du produit</i>
                            <b>+ 50€</b>
                            <i>Frais de port</i>
                            <h3><?= numfmt_format_currency($fmt, $json[$product]['product_price']+50, "EUR") ?></h3>
                            <i>total</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php 
            foreach ($reviewsUniqueJson as $key => $value) {
                var_dump($value);
            }

?>

    <section class="avis" id="scrollspyHeading1">
        <div class="box-avis">
            <div class="top-avis" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                aria-controls="collapseExample">
                <h3>Username</h3>
                <div class="note-avis">
                    <b>4.5</b>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <span>Avis sur : <b>Nom du produit</b></span>
            </div>
            <div class="colle" id="collapseExample">
                <div class="cb">
                    Some placeholder content for the collapse component. This panel is hidden by default but revealed
                    when the user activates the relevant trigger.
                </div>
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