<?php

session_start();

if (isset($_POST['submit'])) {
\
  header("Location:../signup.php");
}

