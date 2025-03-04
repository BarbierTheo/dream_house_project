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
                        <a href="./index.php"><img class="logo" src="./assets/img/testlogo.png" alt=""></a>
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

    $randomNumber = rand(0, 8);
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
                        <p>Quantité : ' . $json[1]['order_quantity'] . '</p>
                    </div>
                </div>
                <span class="price">' . numfmt_format_currency($fmt, $json[1]['product_price'], "EUR") . '</span>
            </div>';

    return $orders;
}



function showStar($review_note)
{

    $stars = "";

    for ($i = 1; $i <= $review_note; $i++) {
        $stars .= '<i class="fa-solid fa-star"></i>';
    }

    for ($i=$review_note; $i < 5; $i++) { 
        $review_note < 5 ? $stars .= '<i class="fa-regular fa-star"></i>' : $stars .= '';
    }

    return $stars;
}



function showUsers()
{

    $users = "";
    $data = file_get_contents('./assets/json/users.json');
    $json = json_decode($data, TRUE);
    // var_dump($json[2]);
    foreach ($json as $value) {

        $users .= " <tr>
                        <th scope='row'>" . $value['user_id'] . "</th>
                        <td>" . $value['user_name'] . "</td>
                        <td class='breakwords'>" . $value['user_mail'] . "</td>
                        <td>" . $value['user_tel'] . "</td>
                        <td><a href='#'><i class='fa-solid fa-circle-info'></i></a></td>
                    </tr>";
    }

    return $users;
}
