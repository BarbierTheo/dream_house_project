<?php

function showCarousel()
{
    $data = file_get_contents('./assets/json/products.json');
    $json = json_decode($data, TRUE);
    $carousel = '';

    $randomNumber = rand(0, 9);

    $carousel .= "<header style='background: url(\"" . $json[$randomNumber]['product_img'] . "\");background-size: cover;'>
                    <h1>Urban Elegance</h1>
                    <h2>Une sélection de meubles pour votre confort</h2>
                    <a href=''>Découvrez " . $json[$randomNumber]['product_name'] . "<i class='fa-solid fa-arrow-right'></i></a>
                </header>";

    return $carousel;
}
