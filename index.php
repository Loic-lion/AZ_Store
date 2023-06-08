<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/scss/css/main.css" />
    <title>AZ Store</title>

</head>

<body>
    <?php include 'display-header.php';    ?>
    <main>
        <section class="container_leading">
            <div class="container_leading_slogan">
                <h1> SHOE THE RIGHT <span class="container_leading_slogan_blue">ONE</span>.</h1>
                <button class="container_leading_button">See our store</button>
            </div>
            <div class="container_leading_photo">
                <p>NIKE</p>
                <div>
                    <img class="container_leading_photo_shoe" src="./assets/img/shoe_one.png">

                </div>
            </div>
            <hr>
        </section>
        <section class="container_store">
            <h5>
                <span class="contaner_store_blue">Our</span> last products
            </h5>
            <?php include 'display-product.php';    ?>
        </section>
        <section class="container_pub">
            <img class="container_pub_shoe" src="./assets/img/shoe_two.png">
            <h2> WE PROVIDE YOU THE BEST QUALITY. </h2>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam ratione eos consequuntur facilis voluptatum doloremque, officia nobis libero itaque, voluptas, beatae blanditiis! </p>
        </section>
        <section class="container_opinion">
            <div class="container_opinion_cellule">
                <img class="container_opinion_cellule_person" src="./assets/img/image-emily.jpg">
                <h3>Emily from xyz </h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quam labore soluta eum optio. </p>
            </div>
            <img class="container_opinion_cellule_person" src="./assets/img/image-thomas.jpg">
            <h3>Thomas from corporate </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quam labore soluta eum optio. </p>
            </div>
            <img class="container_opinion_cellule_person" src="./assets/img/image-jennie.jpg">
            <h3>Jennie from Nike </h3>
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quam labore soluta eum optio. </p>
            </div>
        </section>
        <?php include 'add-to-cart.php'; ?>
    </main>
    <?php include 'display-footer.php';    ?>
</body>

</html>