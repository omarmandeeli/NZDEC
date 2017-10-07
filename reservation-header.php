<html class='no-js'>

  <head>

    <meta charset='utf-8'>
    <meta content='IE=edge' http-equiv='X-UA-Compatible'>
    <title>Inquire</title>



    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <link href="stylesheets/screen.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="stylesheets/reset.css" media="screen" rel="stylesheet" type="text/css" />

    <link href="stylesheets/reservecss.css" media="screen" rel="stylesheet" type="text/css" />

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


            <?php
           if (isset($_SESSION['u_uid'])) {

           echo '<form action="includes/logout.inc.php"    method="POST">
           <div class="logout"><button type="submit" name="submit">logout</button>
           </div></form>
           ';
         } else {
           echo '<form action="Login.php"><button type="submit" name="submit">
           Login</button> </form>
           <form action="Signup.php"> <button type="submit" name="signup">Signup</button> </form>';
         }
         ?>
               </div>

      </header>


</div>
