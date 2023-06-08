<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


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
        ob_clean();
        global $jsonFile;
        $json = file_get_contents($jsonFile);
        $cart = json_decode($json, true);
        $total = 0;
        if ($cart != "") {
            foreach ($cart as $index => $item) {
                $price = $item["price"] * $item["number"];
                echo "<div class='Cart__Item'>";
                echo "<span class='Cart__Item__Product'>$item[product]</span>";
                echo "<span class='Cart__Item__Price'>$price</span>";
                echo "<img class='Cart__Item__Image' src='$item[image_url]' alt='Picture of a shoe'>";
                echo "<span class='Cart__Item__Price'>$item[number]</span>";
                echo "<form action='shopping-cart.php' method='post'>";
                echo "<input type='hidden' name='remove_item' value='$index'>";
                echo "<input type='submit' class='Cart__Item__Remove' value='Remove'>";
                echo "</form>";
                echo "</div>";
                $total = $total + $price;
            }
            if ($total != 0) {
                echo "<span class='Cart__Item__Total'>$total</span>";
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
    displayShoppingCart()
        ?>


</body>

</html>