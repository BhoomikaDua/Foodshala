<?php
include("models/Template.php");
session_start();

// database settings
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'foodshala';

// connect to the database
$Database = new mysqli($server, $user, $pass, $db);

$Template=new Template();
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>FoodShala</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="subpage">

  <!-- Header -->
  <header id="header" class="alt">
    <div class="logo"><a href="index.php">FOODSHALA</a></div>
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

  <!-- Main -->
  <div id="main" class="container">
    <?php
            //for restaurant
            if(isset($_SESSION['usertype']) && $_SESSION['usertype']=='2'){
            echo '<div class="cornering">
            <a href="newitem.php" class="button">Add New Item</a>
            <a href="orders.php" class="button">Orders</a>
            </div>';
            }
         ?>
    <div class="box hide" id="notification">
      <p></p>
    </div>

    <!-- Table -->

    <h4>Vegetarian Options</h4>
    <div class="table-wrapper">
      <?php $Template->displayVegetarianOptions(); ?>

      <h4>Non-Vegetarian Options</h4>
      <div class="table-wrapper">
        <?php $Template->displayNonVegetarianOptions(); ?>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer id="footer">
    <div class="inner">

      <h2>Contact Me</h2>

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
  <script src="assets/js/ajax.js"></script>

</body>

</html>