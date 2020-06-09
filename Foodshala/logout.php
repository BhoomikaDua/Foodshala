<?php

session_start();

//destroy session
  session_unset();
  session_destroy();
  header("Location: index.php");
