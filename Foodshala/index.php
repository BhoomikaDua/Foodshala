<?php
session_start();
?>
<!DOCTYPE HTML>
<html>


<head>
    <title>FOODSHALA</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>

    <!-- Header -->
    <header id="header">
        <div class="logo"><a href="index.php">FOODSHALA</a></div>
        <?php
        if(isset($_SESSION['username'])){
            echo '<span class="greeting"> '.$_SESSION['username'].'</span>';
        }
        else{
            echo '<a href="login.php" class="button alt">Login</a>';
        }
         ?>
        <a href="#menu"><span>Menu</span></a>
    </header>

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <?php
            //for restaurant
            if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='2'){
            echo '<li><a href="orders.php">Orders</a></li>';
            echo '<li><a href="newitem.php">Add New Item</a></li>';
            }
            //for customers and restaurants
            if(isset($_SESSION['usertype'])){
                echo '<li><a href="logout.php">LogOut</a></li>';
            }
            else{
                echo '<li><a href="register.php">Register</a></li>';
            }
         ?>
        </ul>
    </nav>

    <!-- Banner -->
    <section id="banner" class="bg-img" data-bg="banner.jpg">
        <div class="inner">
            <header>
                <h1>Eat All That Your Heart Desires.</h1>
                <a href="menu.php" class="button special icon fa-search">Explore Your Palette</a>
            </header>
        </div>
        <a href="#one" class="more">Learn More</a>
    </section>

    <!-- One -->
    <section id="one" class="wrapper post bg-img" data-bg="banner2.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Satisfy Your Sweet Tooth</h2>
                    <p>Vegetarian and Non-Vegetarian Options Available According To Your Preference</p>
                </header>
                <div class="content">
                    <p>Here at FoodShala, we value our customer's experience with food, especially the dessert. That is why we provide an array of options sourced from your locally favourite restaurants, choose and try all day long!</p>
                </div>
                <footer>
                    <a href="menu.php" class="button alt">Explore</a>
                </footer>
            </article>
        </div>
        <a href="#two" class="more">Learn More</a>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper post bg-img" data-bg="banner5.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Convenient and great tasting food</h2>
                    <p>Vegetarian and Non-Vegetarian Options Available According To Yur Preference</p>
                </header>
                <div class="content">
                    <p>Our goal is to provide you a heart-warming meal at whenever and wherever you like and simutaneously supporting our locally instituted restaurants. Delivery guaranteed within 30 minutes!</p>
                </div>
                <footer>
                    <a href="menu.php" class="button alt"> Explore</a>
                </footer>
            </article>
        </div>
        <a href="#three" class="more">Learn More</a>
    </section>

    <!-- Three -->
    <section id="three" class="wrapper post bg-img" data-bg="banner4.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>Being Healthy Was Never Easier!</h2>
                    <p>Vegetarian and Non-Vegetarian Options Available According To Yur Preference</p>
                </header>
                <div class="content">
                    <p>There are multiple healthy options for our health concious people out there. We have got low calorie snacks and meals which will keep you fueled and satisfied. </p>
                </div>
                <footer>
                    <a href="menu.php" class="button alt">Explore</a>
                </footer>
            </article>
        </div>
        <a href="#four" class="more">Learn More</a>
    </section>

    <!-- Four -->
    <section id="four" class="wrapper post bg-img" data-bg="banner3.jpg">
        <div class="inner">
            <article class="box">
                <header>
                    <h2>World Class Cuisine</h2>
                    <p>Vegetarian and Non-Vegetarian Options Available According To Yur Preference</p>
                </header>
                <div class="content">
                    <p>You can enjoy cuisine from every part of the world at your home. Be comfortable and enjoy specially prepared meals by World-Renowned Chefs.</p>
                </div>
                <footer>
                    <a href="menu.php" class="button alt">Explore</a>
                </footer>
            </article>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">

            <h2>Contact Us</h2>

            <form action="#" method="post">

                <div class="field half first">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" placeholder="Name">
                </div>
                <div class="field half">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" placeholder="Email">
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
                </div>
                <ul class="actions">
                    <li><input value="Send Message" class="button alt" type="submit"></li>
                </ul>
            </form>

            <ul class="icons">
                <li><a href="#" class="icon round fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon round fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon round fa-instagram"><span class="label">Instagram</span></a></li>
            </ul>

        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>