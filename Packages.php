<?php
  session_start();
?>



<!DOCTYPE html>
<html class='no-js'>

  <head>

    <meta charset='utf-8'>
    <meta content='IE=edge' http-equiv='X-UA-Compatible'>
    <title>Inquire</title>


    

    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <link href="stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/reset.css" media="screen" rel="stylesheet" type="text/css" />
    
    <link href="stylesheets/packagestyle.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="javascripts/libs/modernizr-2.7.1.min.js" type="text/javascript"></script>
    <style>

</style>
  </head>
  <body class='homepage'>
   

    <div class='container'>
      <header id='header' class="fixed-top">
   
        <div class='site-main-menu' id='menu'>
          <ul>
            <li>
              <a href='index.php'>HOME</a>
            </li>
            <li>
              <a href='index.php'>ABOUT US</a>
            </li>
            <li>
              <a href='index.php'>PROJECTS</a>
            </li>
            <li>
              <a href='index.php'>CONTACT</a>
            </li>
            <li>
              <a href='inquire.php'>INQUIRE</a>
            </li>
          </ul>
          <span class='follow'>
            <a class='links' href='#' target='_blank' title='Twitter'>
              <i class='fa fa-twitter'></i>
            </a>
            
            <a class='links' href='#' target='_blank' title='Youtube'>
              <i class='fa fa-facebook'></i>
            </a>
            <a class='links' href='#' target='_blank' title='Youtube'>
              <i class='fa fa-google-plus'></i>
            </a>
          </span>

         <?php 
      if (isset($_SESSION['u_uid'])) {

        echo '<form action="includes/logout.inc.php"    method="POST">
        <button type="submit" name="submit">logout</button>
        </form>
        ';
      } else {
        echo '<form action="Login.php"><button type="submit" name="submit">
        Login</button> </form>
        <form action="Signup.php"> <button type="submit" name="signup">Signup</button> </form>';
      }
      ?>
        </div>

        
        
      </header>



   <div class="columns">
  <ul class="price">
    <li class="header">Package 1</li>
    <li class="grey">P999999</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
   <li class="grey"><button type="submit">Inquire</button></li>
  </ul>
</div>

<div class="columns">
  <ul class="price">
    <li class="header">Package 1</li>
    <li class="grey">P999999</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li class="grey"><button type="submit">Inquire</button></li>
  </ul>
</div>
<div class="columns">
  <ul class="price">
    <li class="header">Package 1</li>
    <li class="grey">P999999</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li class="grey"><button type="submit">Inquire</button></li>
  </ul>
</div>
<div class="columns">
  <ul class="price">
    <li class="header">Package 1</li>
    <li class="grey">P999999</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li class="grey"><button type="submit">Inquire</button></li>
  </ul>
</div>
<div class="columns">
  <ul class="price">
    <li class="header">Package 1</li>
    <li class="grey">P999999</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li>Lorem Ipsum</li>
    <li class="grey"><button type="submit">Inquire</button></li>
  </ul>
</div>




  </body>

</html>
