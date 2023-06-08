<div class="container">
    <form method="GET" action="checkout.php">
       <p class="form__field">
           <label for="firstname" class="form__label">Enter your firstname:</label>
           <input id="firstname" name="firstname" type="text" class="form__input">
       </p>
       <p class="form__field">
           <label for="lastname" class="form__label">Enter your lastname:</label>
           <input id="lastname" name="lastname" type="text" class="form__input">
       </p>
       <p class="form__field">
           <label for="email" class="form__label">Enter your email:</label>
           <input id="email" name="email" type="email" class="form__input">
       </p>
       <p class="form__field">
           <label for="address" class="form__label">Enter your address:</label>
           <input id="address" name="address" type="text" class="form__input">
       </p>
       <p class="form__field">
           <label for="city" class="form__label">Enter your city:</label>
           <input id="city" name="city" type="text" class="form__input">
       </p>
       <p class="form__field">
           <label for="zip-code" class="form__label">Enter your zip-code:</label>
           <input id="zip-code" name="zip-code" type="number" class="form__input">
       </p>
       <p class="form__field">
           <label for="country" class="form__label">Enter your country:</label>
           <input id="country" name="country" type="text" class="form__input">
       </p>
       <p class="form__submit">
           <input name="submit" value="Submit" type="submit" class="form__button">
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
    $filterAddress = filter_var($address, FILTER_SANITIZE_STRING);
    $filterCity = filter_var($city, FILTER_SANITIZE_STRING);
    $filterZipCode = filter_var($zipCode, FILTER_SANITIZE_NUMBER_INT);
    $filterCountry = filter_var($country, FILTER_SANITIZE_STRING);

    $errors = [];

    if(empty($filterFirstname)) {
        $error[] = 'Fullname is required';
    };
    if(empty($filterLastname)) {
        $error[] = 'Lastname is required';
    };
    if(empty($filterAddress)) {
        $error[] = 'The address is required';
    };
    if(empty($filterCity)) {
        $error[] = 'City is required';
    };
    if(empty($filterZipCode)) {
        $error[] = 'ZipCode is required';
    };
    if(empty($filterCountry)) {
        $error[] = 'Country is required';
    };
    if(!empty($errors)){
        foreach($errors as $error) {
            echo '<span class="error">'.$error.'</span>';
        }
        exit;
    };
}
?>
<div class="display">
        <p>Thank you for your order</p>
</div>
