
<html class='no-js'>

  <head>

    <meta charset='utf-8'>
    <meta content='IE=edge' http-equiv='X-UA-Compatible'>
    <title>Inquire</title>

    

    <meta content='width=device-width, initial-scale=1.0' name='viewport'>

    <link href="stylesheets/loginstyle.css" media="screen" rel="stylesheet" type="text/css" />
    
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
        </div>
        
      </header>



<dd>

<div class="container2">  
   <form id="contact" action="" method="post">
    <h3>LogIn</h3>
    
    
    <fieldset>
      <input name="u_name" placeholder="Name" type="text" tabindex="1" required autofocus>
    </fieldset>

    <fieldset>
      <input name="u_pwd" placeholder="Password" type="Password" tabindex="1" required autofocus>
    </fieldset>
   

      <button name="submit" type="button" id="contact-submit">Login</button>
      


    </fieldset>

  </form>
  </div>
</div>


 


      
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
    <script>
    $(".dropdown dt a").on('click', function() {
  $(".dropdown dd ul").slideToggle('fast');
});

$(".dropdown dd ul li a").on('click', function() {
  $(".dropdown dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown dt a').append(ret);

  }
});
</script>
    <script src="javascripts/libs/holder.js" type="text/javascript"></script>
    <script src="javascripts/plugins.js" type="text/javascript"></script>
    <script src="javascripts/formsjs.js" type="text/javascript"></script>
  </body>
</html>
