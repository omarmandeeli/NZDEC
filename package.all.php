<?php
 session_start();
$id = $_GET['id'];
 
include 'includes/dbh.inc.php';
 
 
 
$query = "SELECT * FROM package WHERE package_id = '$id'";
mysqli_query($conn, $query) or die('Database error!');
/*
if (isset['submit']) {
  
}
*/

?> 


<!DOCTYPE html>

<html class='no-js'>

  <head>

    <meta charset='utf-8'>
    <meta content='IE=edge' http-equiv='X-UA-Compatible'>
    <title>Inquire</title>

    

    <meta content='width=device-width, initial-scale=1.0' name='viewport'>

    <link href="stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/plugin.css" media="screen" rel="stylesheet" type="text/css" />
  
    <link href="stylesheets/formsstyle.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="javascripts/libs/modernizr-2.7.1.min.js" type="text/javascript"></script>
    
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
              <a href='index.php'>INQUIRE</a>
            </li>

               <?php 
      if (isset($_SESSION['u_uid'])) {


        echo '<form action="includes/logout.inc.php"    method="POST">
        <button type="submit" name="submit">logout</button>
        </form>

        ';
      } else {
        echo '<form action="Login.php"><button type="submit" name="submit">
        Login</button> </form>
        <form action="signup.php"> <button type="submit" name="signup">Signup</button> </form>';
      }
      ?>
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
        </div>


      </header>


<div class="form-style-5">
<form class="sevent">

<form method="POST">

<label>Event Name</label>
<input type="text" name="field2" placeholder="Enter Event Name*">

<label for="job">Day of the Event</label>
<input type="date" name="field2" placeholder="Enter Date of Event*">


<label for="job">Time of the Event</label>
<input type="date" name="field2" placeholder="Enter Date of Event*">

<label for="job">End Time of the Event</label>
<input type="date" name="field2" placeholder="Enter Date of Event*">

<label>Theme</label>
<input type="text" name="field2" placeholder="Enter Theme*">
 <button name="submit" type="button" id="contact-submit" onclick="location.href='payment.php';">Submit</button>
</form>

      
      <footer id='contacts'>
        
        <span class='cc'>
          @ 2014 . Zaldy Ducusin
        </span>
      </footer>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
      window.jQuery || document.write('<script src="/javascripts/libs/jquery-1.10.2.min.js"><\/script>')
    </script>
    <script src="javascripts/libs/holder.js" type="text/javascript"></script>
    <script src="javascripts/plugins.js" type="text/javascript"></script>
    <script src="javascripts/formsjs.js" type="text/javascript"></script>
  </body>
</html>
