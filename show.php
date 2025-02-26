<?php


// $data = file_get_contents('./assets/json/products.json');
// $json = json_decode($data, TRUE);
// var_dump($json);


function showNavbar()
{
    $navbar = ' 
            <nav class="navbarre">
                <div class="nav-left">
                    <div class="nav-title">
                        <a href="./index.php"><img src="./assets/img/testlogo.png" alt=""></a>
                    </div>
                    <!-- <a class="nav-link" href="#scrollspyHeading1">Collection de meubles</a> -->
                </div>
                <!-- <button>commandes</button> -->
                <div class="groupButton">
                    <a href="./user.php"><i class="fa-solid fa-user"></i></a>
                    <a href="./orders.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </nav>';

    return $navbar;
}


function showFooter()
{
    $footer = ' 
            <footer>
                <div class="links">
                     <a href="#">à propos</a> | <a href="#">mentions légales</a> | <a href="#">confidentialité</a>
                </div>
                 <span><b>DREAM HOUSE</b> © BARBIER Théo, LE CALVEZ Morgane 2025</span>
             </footer>';

    return $footer;
}


function showCarousel()
{
    $data = file_get_contents('./assets/json/products.json');
    $json = json_decode($data, TRUE);
    $carousel = '';

    $randomNumber = rand(0, 9);
    $carousel .= "<header style='background: url(\"" . $json[$randomNumber]['product_img'] . "\");background-size: cover;'>
                        <h1>Urban Elegance</h1>
                        <h2>Une sélection de meubles pour votre confort</h2>
                        <a href='./detail.php'>Découvrez " . $json[$randomNumber]['product_name'] . "<i class='fa-solid fa-arrow-right'></i></a>
                    </header>";



    return $carousel;
}


function showCards($total): string
{

    $data = file_get_contents('./assets/json/products.json');
    $json = json_decode($data, TRUE);
    // var_dump($json);
    $productsCards = '';
    $count = 0;

    $fmt = numfmt_create('fr_FR', NumberFormatter::CURRENCY);

    foreach ($json as $key => $value) {
        if ($total <= $count) {
            break;
        }

        // var_dump($value);
        $productsCards .= '
            <div class="meuble-card">
                <div class="img-card" style="background:url(' . $value['product_img'] . '); 
            background-size: cover; 
            background-position: center;"></div>
                <span>REF : ' . $value['product_reference'] . '</span>
                <h3>' . $value['product_name'] . '</h3>
                <p>' . numfmt_format_currency($fmt, $value['product_price'], "EUR") . '</p>
                <div class="bottom">
                    <button>Ajouter au panier</button>
                    <span><i class="fa-regular fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                         data-bs-title="Tooltip on top"></i></span>
                </div>
            </div>
            ';
        $count++;
    }


    return $productsCards;
}


// Page orders
function showOrders()
{
    $data = file_get_contents('./assets/json/orders.json');
    $json = json_decode($data, TRUE);
    // var_dump($json[1]);

    $fmt = numfmt_create('fr_FR', NumberFormatter::CURRENCY);
    $date = new DateTimeImmutable($json[1]['order_date']);


    $orders = ' 
            <div class="oneOrder">
                <div class="orderRow">
                    <div class="img" style="background: url(assets' . $json[1]['product_img'] . '); background-position : center; background-size: cover;"></div>
                    <div class="colRow">
                        <div class="col">
                            <a href="" class="">' . $json[1]['product_name'] . '</a>
                            <span>' . $date->format('d-m-Y')  . '</span>
                        </div>
                        <p>Quantité : ' . $json[1]['order_product_quantity'] . '</p>
                    </div>
                </div>
                <span class="price">' . numfmt_format_currency($fmt, $json[1]['product_price'], "EUR") . '</span>
            </div>';

    return $orders;
}



function showStar($review_note)
{
    
    $stars = "";

    switch ($review_note) {
        case ($review_note <= 0.5):
            $stars = '<i class="fa-solid fa-star-half-stroke"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 1 and $review_note > 0.5):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 1.5 and $review_note > 1):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 2 and $review_note > 1.5):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 2.5 and $review_note > 2):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 3 and $review_note > 2.5):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 3.5 and $review_note > 3):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 4 and $review_note > 3.5):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
            break;
        case ($review_note <= 4.5 and $review_note > 4):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star-half-stroke"></i>';
            break;
        case ($review_note <= 5 and $review_note > 4.5):
            $stars = '<i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>';
            break;
        default:
            $stars = '<i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>';
    }

    return $stars;
}


function showCategories () {

    $categories = "";
    

}