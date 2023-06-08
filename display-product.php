<?php
$items = [
    [
        'id' => 1,
        'product' => 'Nike Air',
        'price' => 234,
        'image_url' => './assets/img/shoe_one.png',
    ],
    [
        'id' => 2,
        'product' => 'Nike Air',
        'price' => 234,
        'image_url' => './assets/img/shoe_one.png',
    ],
    [
        'id' => 3,
        'product' => 'Nike Air',
        'price' => 234,
        'image_url' => './assets/img/shoe_one.png',
    ],
    [
        'id' => 4,
        'product' => 'Nike Air',
        'price' => 234,
        'image_url' => './assets/img/shoe_one.png',
    ],
];

foreach ($items as $item) {
    echo '<div class="container_store_product">';
    echo '<form method="post" action="index.php">';
    echo '<img src="' . $item['image_url'] . '" alt="' . $item['product'] . '">';
    echo '<div class="container_store_product_div">';
    echo '<div class="container_store_product_div_info">';
    echo '<h4>' . $item['product'] . '</h4>';
    echo '<p>' . $item['price'] . '€</p>';
    echo '</div>';
    echo '<div class="container_store_product_div">';
    echo '<form method="post" action="add_to_cart.php">';
    echo '<input type="hidden" name="productId" value="' . $item['id'] . '">';
    echo '<button class="container_store_product_button" type="submit"> Add to cart </button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
};
