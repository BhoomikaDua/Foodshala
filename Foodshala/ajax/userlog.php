<?php
session_start();

//to encrypt user password
$salt = 'j4H9?s0d';

// database settings
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'foodshala';

// connect to the database
$Database = new mysqli($server, $user, $pass, $db);

if($_POST['action'] === 'login') {
  $email = $Database -> real_escape_string($_POST['email']);
  $pass = $Database -> real_escape_string($_POST['password']);

  $password=md5($pass . $salt);

  $sql = "SELECT * FROM users WHERE email = '".$email."' AND userpassword = '".$password."' ";
  $result = $Database->query($sql);
   if ($result->num_rows > 0) {
    // success
    $row = $result->fetch_assoc();
    $_SESSION['id']=$row["id"];
    $_SESSION['username']=$row["username"];
    $_SESSION['usertype']=$row["usertype"];
		echo 'TRUE';
    }
  else {
    // failure
		echo 'FALSE';
  }
}
  elseif($_POST['action'] === 'register') {

    $name = $Database -> real_escape_string($_POST['name']);
    $email = $Database -> real_escape_string($_POST['email']);
    $address = $Database -> real_escape_string($_POST['address']);
    $password = $Database -> real_escape_string($_POST['password']);
    $usertype = $Database -> real_escape_string($_POST['usertype']);
    $preference = $Database -> real_escape_string($_POST['preference']);

    $securePassword=md5($password . $salt);

    $sqlCheck = "SELECT id FROM users WHERE email='".$email."' ";
    $resultCheck = $Database->query($sqlCheck);
    if ($resultCheck->num_rows > 0) {
     echo 'EXISTS';
     return;
     }

    $sql = "INSERT INTO users (username, email, address, usertype, userpassword, preference)
    VALUES ('".$name."','".$email."','".$address."','".$usertype."','".$securePassword."','".$preference."')";
    $result = $Database->query($sql);
    if ($result) {
      // success
		  echo 'TRUE';
    }
    else {
      // failure
		  echo 'FALSE';
  }
 }

 elseif($_POST['action'] === 'newItem') {
  $name = $Database -> real_escape_string($_POST['name']);
  $price = $Database -> real_escape_string($_POST['price']);
  $description = $Database -> real_escape_string($_POST['description']);
  $preference = $Database -> real_escape_string($_POST['preference']);

  $sql = "INSERT INTO items (title,companyId, descr, price, preference)
  VALUES ('".$name."','".$_SESSION['id']."','".$description."','".$price."','".$preference."')";
  $result = $Database->query($sql);
  if ($result) {
    // success
    echo 'TRUE';
  }
  else {
    // failure
    echo 'FALSE';
}
}

elseif($_POST['action'] === 'orderComplete') {
  $id = $Database -> real_escape_string($_POST['id']);

  $sql = "UPDATE orders SET completed='1' WHERE id ='".$id."' ";
  $result = $Database->query($sql);
  if ($result) {
    // success
    echo 'TRUE';
  }
  else {
    // failure
    echo 'FALSE';
}
}
elseif($_POST['action'] === 'order') {
  $id = $Database -> real_escape_string($_POST['id']);
  $restaurantId = $Database -> real_escape_string($_POST['restaurantId']);

  //generating orderId
  $uniqueId = time() . mt_rand() . $id;

  $sql ="INSERT INTO orders(customerId, restaurantId, itermId, orderNumber, completed)
   VALUES ('".$_SESSION['id']."','".$restaurantId."','".$id."','".$uniqueId."','0')";
  $result = $Database->query($sql);
   if ($result) {
    // success
		echo 'TRUE';
    }
  else {
    // failure
		echo 'FALSE';
  }
}
