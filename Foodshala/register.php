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
                echo '<li><a href="login.php">Login</a></li>';
            }
         ?>
        </ul>
  </nav>

  <!-- Content -->
  <section id="post" class="wrapper bg-img" data-bg="">
    <div class="inner">
      <article class="box">
        <header>
          <h2>Registration</h2>
        </header>
        <div class="content">

          <p>

            <form method="post" action="#" id="registerForm">
              <div class="row uniform">
                <div class="6u 12u$(xsmall)">
                  <input type="text" name="name" id="name" value="" placeholder="Name" />
                </div>
                <div class="6u$ 12u$(xsmall)">
                  <input type="email" name="email" id="email" value="" placeholder="Email" />
                </div>
                <div class="12u$">
              <input type="text" name="address" id="address" value="" placeholder="Address" />
            </div>
                <div class="12u$">
              <input type="password" name="password" id="password" value="" placeholder="Password" />
            </div>
            <div class="12u$">
              <input type="password" name="repassword" id="repassword" value="" placeholder="Re-Enter Password" />
            </div>
                <!-- Break -->
                <div class="4u 12u$(small)">
                  <h4>User Type :</h4>
                </div>
                <div class="4u 12u$(small)" id="triggerHide" >
                  <input type="radio" id="restaurant" name="usertype" value="2">
                  <label for="restaurant">Restaurant</label>
                </div>
                <div class="4u$ 12u$(small)" id="triggerShow">
                  <input type="radio" id="customer" name="usertype" value="1">
                  <label for="customer">Customer</label>
                </div>
                <!-- Break -->
                <div class="12u$" id="pref">
                <div class="4u 12u$(small) ">
                  <h4>Preference :</h4>
                </div>
                <div class="4u 12u$(small)">
                  <input type="radio" id="vegetarian" name="preference" value="1">
                  <label for="vegetarian">Vegetarian</label>
                </div>
                <div class="4u$ 12u$(small)">
                  <input type="radio" id="nonvegetarian" name="preference" value="2">
                  <label for="nonvegetarian">Non-Vegetarian</label>
                </div>
                </div>
                
                <div class="12u$">
                  <ul class="actions">
                    <li></li>
                    <li><a class="button special" id="signup">Sign Up</a></li>
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