<?php
  session_start();
?>

<!DOCTYPE html>

<html class='no-js'>
  <head>

    <meta charset='utf-8'>
    <meta content='IE=edge' http-equiv='X-UA-Compatible'>
    <title>Zaldy Ducusin Events And Consultancy</title>



    <meta content='width=device-width, initial-scale=1.0' name='viewport'>

    <link href="stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/plugin.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/style.css" media="screen" rel="stylesheet" type="text/css" />

      <script src="javascripts/libs/modernizr-2.7.1.min.js" type="text/javascript"></script>

  </head>
  <body class='homepage'>
    <!--[if lt IE 8]>
      <p class='browsehappy'>
        You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
      </p>
    <![endif]-->
    <div class='container'>
      <header id='header'>
        <div class='parallax' data-velocity='.2'></div>
        <div class='site-main-menu' id='menu'>
          <ul>
            <li>
              <a href='#header'>HOME</a>
            </li>
            <li>
              <a href='#services'>ABOUT US</a>
            </li>
            <li>
              <a href='#projects'>PROJECTS</a>
            </li>
            <li>
              <a href='#contact'>CONTACT</a>
            </li>
            <li>
              <a href='signup.php'>PACKAGE</a>
            </li>




          <?php
      if (isset($_SESSION['u_uid'])) {


        include 'includes/dbh.inc.php';



        echo '<form action="includes/logout.inc.php"    method="POST">
        <button type="submit" name="submit">logout</button>
        </form>
        <form action="includes/inquire.inc.php"    method="POST">
        <button type="submit" name="submit">Inquire</button>
        </form>
        <form action="includes/reservation.inc.php"    method="POST">
        <button type="submit" name="submit">Reservations</button>
        </form>




        ';
      } else {
        echo '<form action="login.php"><button type="submit" name="submit">
        Login</button> </form>
        <form action="signup.php"> <button type="submit" name="signup">Signup</button> </form>';
      }
      ?>

        </div>




        <div class='site-header'>
          <p class='first'>
            Hi there, We Are <span>Zaldy Ducusic Events</span>
          </p>
          <div class='hr left'></div>
          <div class='hr right'></div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam bibendum<b> Taguig</b>. <br>
            Phasellus ac lorem sit amet arcu molestie<br>
          </p>
        </div>
        <div class='site-proceed'>
          <a href='#services'>
            <i class='fa fa-angle-down'></i>
          </a>
        </div>
      </header>
      <div id='main-content' role='main'>
        <section class='site-what-i-do' id='services'>
          <div class='site-wrapper'>
            <div class='site-wrapper-title'>
              <h2>ABOUT US?</h2>
            </div>
            <div class='site-what-i-do-box'>
              <div class='site-what-i-do-box-top'>
                <i class='fa fa-file-text'></i>
                <p>PLANNING</p>
              </div>
              <div class='site-what-i-do-box-bot'>
                <p>Duis eu leo massa. Vestibulum sed metus ac <br><br>hasellus hendrerit quis metus ut euismod. Donec viverra dui at nibh cursus fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.<br>id sodales nulla lacinia. Donec tempus bibendum neque, pharetra <br><br>Praesent viverra posuere orci vitae feugiat. Fusce eu felis ac dui porttitor laoreet feugiat ut orci. Fusce malesuada tortor a nisi laoreet placerat.</p>
              </div>
            </div>
            <div class='site-what-i-do-box'>
              <div class='site-what-i-do-box-top'>
                <i class='fa fa-pencil-square-o'></i>
                <p>CONSULTANCY</p>
              </div>
              <div class='site-what-i-do-box-bot'>
                 <p>Duis eu leo massa. Vestibulum sed metus ac <br><br>hasellus hendrerit quis metus ut euismod. Donec viverra dui at nibh cursus fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.<br>id sodales nulla lacinia. Donec tempus bibendum neque, pharetra <br><br>Praesent viverra posuere orci vitae feugiat. Fusce eu felis ac dui porttitor laoreet feugiat ut orci. Fusce malesuada tortor a nisi laoreet placerat.</p>
              </div>
            </div>
            <div class='site-what-i-do-box'>
              <div class='site-what-i-do-box-top'>
                <i class='fa fa-calendar'></i>
                <p>EVENTS</p>
              </div>
              <div class='site-what-i-do-box-bot'>
                 <p>Duis eu leo massa. Vestibulum sed metus ac <br><br>hasellus hendrerit quis metus ut euismod. Donec viverra dui at nibh cursus fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.<br>id sodales nulla lacinia. Donec tempus bibendum neque, pharetra <br><br>Praesent viverra posuere orci vitae feugiat. Fusce eu felis ac dui porttitor laoreet feugiat ut orci. Fusce malesuada tortor a nisi laoreet placerat.</p>
              </div>
            </div>
          </div>
        </section>
        <section class='site-projects' id='projects'>
          <div class='site-wrapper'>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
            <div class='site-projects-box'>
              <div class='site-projects-top'>
                <p>CLIENT</p>
              </div>
              <div class='site-projects-bot'>
                <img src='images/Untitled-1.jpg'>
              </div>
            </div>
          </div>
        </section>

      <footer id='contact'>
        <div class='site-wrapper'>
          <p class='interested'>
            Duis commodo, neque ut commodo condimentum
            <a href='#' target='_blank'>Duis eu leo massa</a>
            Vestibulum sed metus ac leo facilisis efficitur. Aliquam eget arcu ac nulla ultrices venenatis.
          </p>
          <p>Want to Plan an Event?</p>
          <hr>
          <a class='btn' href='#'>Email Us!</a>
        </div>
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
    <script src="javascripts/libs/signup.js" type="text/javascript"></script>
    <script src="javascripts/plugins.js" type="text/javascript"></script>
    <script src="javascripts/script.js" type="text/javascript"></script>
  </body>
</html>
