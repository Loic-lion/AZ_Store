<?php
$jsonFile = 'assets/json/cart.json';

function createCartItem($json, $id)
{
    $shoppingCart = json_decode($json, true);
    array_push($shoppingCart, $json[$id]);
    saveShoppingCart($shoppingCart);
    displayShoppingCart();
    return $json;
}

function displayShoppingCart()
{
    global $jsonFile;
    $json = file_get_contents($jsonFile);
    $cart = json_decode($json, true);

    if ($cart != "") {
        foreach ($cart as $index => $item) {
            echo "<div class='Cart__Item'>";
            echo "<span class='Cart__Item__Product'>$item[product]</span>";
            echo "<span class='Cart__Item__Price'>$item[price]</span>";
            echo "<img class='Cart__Item__Image' src='$item[image_url]' alt='Picture of a shoe'>";
            echo "<form action='shopping-cart.php' method='post'>";
            echo "<input type='hidden' name='remove_item' value='$index'>";
            echo "<input type='submit' class='Cart__Item__Remove' value='Remove'>";
            echo "</form>";
            echo "</div>";
        }
    }
}

function removeCartItem($index)
{
    global $jsonFile;
    $json = file_get_contents($jsonFile);
    $cart = json_decode($json, true);

    if (isset($cart[$index])) {
        unset($cart[$index]);
        saveShoppingCart($cart);
    }
    displayShoppingCart();
}

function saveShoppingCart($cart)
{
    global $jsonFile;
    $json = json_encode($cart, JSON_PRETTY_PRINT);
    file_put_contents($jsonFile, $json);
}

if (isset($_POST['submit'])) {
    displayShoppingCart();
}

if (isset($_POST['remove_item'])) {
    $itemIndex = $_POST['remove_item'];
    removeCartItem($itemIndex);
}

?>

<form action="shopping-cart.php" method="post">
    <input type="submit" name="submit" value="Cliquez ici" />
</form>