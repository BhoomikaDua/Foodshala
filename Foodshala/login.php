<?php
session_start();
if (isset($_SESSION['username']))
{
  //redirect to menu page if already logged in.
  header("Location: menu.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>FOODSHALA</title>
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

  <!-- Content -->

  <section id="post" class="wrapper bg-img" data-bg="">
    <div class="inner">
      <article class="box">
        <header>
          <h2>Login</h2>
          <p>to the Realms of Flavor</p>
        </header>
        <div class="content">
          <p>
            <h3>Form</h3>
            <form method="post" action="#">
              <div class="row uniform">
              <div class="12u$">
              <input type="email" name="email" id="email" value="" placeholder="Email" />
            </div>

            <div class="12u$">
              <input type="password" name="password" id="password" value="" placeholder="Password" />
            </div>

            <!-- Break -->
                <div class="12u$">
                  <ul class="actions">
                    <li><a href="register.php" class="button">Register</a></li>
                    <li><a class="button special" id="signin">Sign In</a></li>
                  </ul>
                </div>
              </div>
            </form>

            <hr />
            <p class="error"></p>

          </p>
        </div>
      </article>
    </div>
  </section>

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