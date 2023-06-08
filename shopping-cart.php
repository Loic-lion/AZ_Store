<?php
$json = file_get_contents('assets/json/cart.json');
$shoppingCart = array(
    [
        'id' => 1,
        'product' => 'Nike Air Max 270',
        'price' => 140,
        'image_url' => '/assets/img/nike-air-max-279.jpeg',
    ],
    [
        'id' => 2,
        'product' => 'Nike Air Max 270',
        'price' => 145,
        'image_url' => '/assets/img/nike-air-max-279.jpeg',
    ]
);

function createCartItem($items, $id)
{
    global $shoppingCart;
    array_push($shoppingCart, $items[$id]);
    displayShoppingCart($items);
    return $items;
}

function displayShoppingCart($shoppingCart)
{
    foreach ($shoppingCart as $index => $item) {
        echo "<div class='Cart__Item'>";
        echo "<span class='Cart__Item__Product'>$item[product]</span>";
        echo "<span class='Cart__Item__Price'>$item[price]</span>";
        echo "<img class='Cart__Item__Image' src='$item[image_url]' alt='Picture of a shoe'>";
        echo "<form action='index.php' method='post'>";
        echo "<input type='hidden' name='remove_item' value='$index'>";
        echo "<input type='submit' class='Cart__Item__Remove' value='Remove'>";
        echo "</form>";
        echo "</div>";
    }
    print_r($shoppingCart);
}

function removeCartItem($cart, $index)
{
    if (isset($cart[$index])) {
        unset($cart[$index]);
    }
    displayShoppingCart($cart);
    return $cart;
}

if (isset($_POST['submit'])) {
    displayShoppingCart($shoppingCart);
}

if (isset($_POST['remove_item'])) {
    $itemIndex = $_POST['remove_item'];
    $shoppingCart = removeCartItem($shoppingCart, $itemIndex);
}

?>

<form action="index.php" method="post">
    <input type="submit" name="submit" value="Cliquez ici" />
</form>