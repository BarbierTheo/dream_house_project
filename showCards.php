<?php


$data = file_get_contents('./assets/json/products.json');
$json = json_decode($data, TRUE);
// var_dump($json);

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
                    <button>ajouter au panier</button>
                    <span><i class="fa-regular fa-eye" data-bs-toggle="tooltip" data-bs-placement="top"
                         data-bs-title="Tooltip on top"></i></span>
                </div>
            </div>
            ';
        $count++;
    }


    return $productsCards;
}
