
<div class="container">
    <form method="GET" action="checkout.php">
       <p class="firstname">Enter your firstname : <input name="firstname" type="text"> 
       <p class="lastname">Enter your lastname : <input name="lastname"type="text"> 
       <p class="email">Enter your email : <input name="lastname" type="email"> 
       <p class="address">Enter your address : <input name="address" type="text"> 
       <p class="city">Enter your city : <input name="city" type="text"> 
       <p class="zip-code">Enter your zip-code : <input name="zip-code" type="number"> 
       <p class="country">Enter your country : <input name="country" type="text"> 
       <p class="submit"><input name="submit" value="Submit" type="submit"> 
    </form>
</div>

<?php
if(isset($_GET['submit'])) {
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $email = $_GET['email'];
    $address = $_GET['adress'];
    $city = $_GET['city'];
    $zipCode = $_GET['zip-code'];
    $country = $_GET['country'];

    $filterFirstname = filter_var($fullname, FILTER_SANITIZE_STRING);
    $filterLastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    $filterEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    $filterAddress = filter_var($address, FILTER_SANITIZE_STRING);
    $filterCity = filter_var($city, FILTER_SANITIZE_STRING);
    $filterZipCode = filter_var($zipCode, FILTER_SANITIZE_INT);
    $filterCountry = filter_var($country, FILTER_SANITIZE_STRING);

    $errors = [];

    if(empty($filterFirstname)) {
        $error[] = 'Fullname is required';
    };
    if(empty($$filterLastname)) {
        $error[] = 'Lastname is required';
    };
    if(empty($filterEmail)) {
        $error[] = 'Email is required';
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
}
?>