

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $productId = $_POST['productId'];

    $cartContent = file_get_contents('./assets/json/cart.json');
    $cartItems = json_decode($cartContent, true);

    if (isset($cartItems[$productId])) {
        $cartItems[$productId]['number'] = $cartItems[$productId]['number'] + 1;
    } else {
        $cartItems[$productId] = [
            'product' => $item['product'],
            'price' => $item['price'],
            'image_url' => $item['image_url'],
            'number' => 1
        ];
    }

    $jsonContent = json_encode($cartItems);
    file_put_contents('./assets/json/cart.json', $jsonContent);
}
