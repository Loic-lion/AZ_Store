<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout</title>
</head>
<body>
 <?php include 'display-header.php'    ?>
<div class="container">
    <form method="GET" action="checkout.php">
       <p class="form__field">
           <label for="firstname" class="form__label">Enter your firstname :</label>
           <input id="firstname" name="firstname" type="text" class="form__input" required>
       </p>
       <p class="form__field">
           <label for="lastname" class="form__label">Enter your lastname:</label>
           <input id="lastname" name="lastname" type="text" class="form__input" required>
       </p>
       <p class="form__field">
           <label for="email" class="form__label">Enter your email :</label>
           <input id="email" name="email" type="email" class="form__input" required>
       </p>
       <p class="form__field">
           <label for="address" class="form__label">Enter your address :</label>
           <input id="address" name="address" type="text" class="form__input" required>
       </p>
       <p class="form__field">
           <label for="city" class="form__label">Enter your city :</label>
           <input id="city" name="city" type="text" class="form__input" required>
       </p>
       <p class="form__field">
           <label for="zip-code" class="form__label">Enter your zip-code :</label>
           <input id="zip-code" name="zip-code" type="number" class="form__input" required>
       </p>
       <p class="form__field">
           <label for="country" class="form__label">Enter your country :</label>
           <input id="country" name="country" type="text" class="form__input" required>
       </p>
       <p class="form__submit">
           <input name="submit" value="Submit" type="submit" class="form__button" required>
       </p>
    </form>
</div>


<?php
if(isset($_GET['submit'])) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $city = $_GET['city'];
    $zipCode = $_GET['zip-code'];
    $country = $_GET['country'];

    $filterFirstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    $filterLastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    $filterEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $filterAddress = filter_var($address, FILTER_SANITIZE_STRING);
    $filterCity = filter_var($city, FILTER_SANITIZE_STRING);
    $filterZipCode = filter_var($zipCode, FILTER_SANITIZE_NUMBER_INT);
    $filterCountry = filter_var($country, FILTER_SANITIZE_STRING);

    $errors = [];

    if(empty($filterFirstname)) {
        $errors[] = 'Firstname is required';
    }
    if(empty($filterLastname)) {
        $errors[] = 'Lastname is required';
    }
    if(empty($filterEmail)) {
        $errors[] = 'Email is required';
    }
    if(empty($filterAddress)) {
        $errors[] = 'The address is required';
    }
    if(empty($filterCity)) {
        $errors[] = 'City is required';
    }
    if(empty($filterZipCode)) {
        $errors[] = 'ZipCode is required';
    }
    if(empty($filterCountry)) {
        $errors[] = 'Country is required';
    }

    if(!empty($errors)) {
        foreach($errors as $error) {
            echo '<span class="error">'.$error.'</span>';
        }
    } else {
        unset($_SESSION['shopping-cart']);

        echo '
        <div class="result">
            <h2>Informations</h2>
            <ul>
                <li><strong>Firstname : </strong> <span class="result-user">' .$filterFirstname.'</span></li>
                <li><strong>Lastname : </strong> <span class="result-user">' .$filterLastname.'</span></li>
                <li><strong>Email : </strong> <span class="result-user">' .$filterEmail.'</span></li>
                <li><strong>Address : </strong> <span class="result-user">' .$filterAddress.'</span></li>
                <li><strong>City : </strong> <span class="result-user">' .$filterCity.'</span></li>
                <li><strong>ZipCode :</strong> <span class="result-user">' .$filterZipCode.'</span></li>
                <li><strong>Country :</strong> <span class="result-user">' .$filterCountry.'</span></li>
            </ul>
        </div>';

        retrieveItems();
    }
}
session_start();

function retrieveItems()
{
    $jsonFile = './assets/json/cart.json';
    $data = file_get_contents($jsonFile);
    $items = json_decode($data, true);

    echo '<h2>Order</h2>';
    echo '<ul>';

    foreach ($items as $item) {
        echo '<li>';
        echo '<h3>' . $item['product'] . '</h3>';
        echo '<img src="' . $item['image_url'] . '">';
        echo '<p>Prix: ' . $item['price'] . '</p>';
        echo '<p>Quantité: ' . $item['number'] . '</p>';
        echo '</li>';
    }

    echo '</ul>';
    $total = calculateTotal($items);
    echo '<p>Total: ' . $total . ' euros</p><br>';
    echo '<div class="display"><p>Thank you for your order</p></div>';
    unset($_SESSION['shopping-cart']);
}

function calculateTotal($items)
{
    $total = 0;

    foreach ($items as $item) {
        $total += $item['price'];
    }
    return $total;
}
?>
</body>
  <?php include 'display-footer.php'    ?>
</html>