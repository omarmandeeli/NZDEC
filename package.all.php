<?php
  session_start();

  include_once 'packages-header.php';

  include 'includes/dbh.inc.php';

mysqli_select_db($conn, "test");
$sql = "SELECT * FROM package";
$data = mysqli_query($conn, $sql);


echo "<div class='grid'>";
while ($record = mysqli_fetch_array($data)) {
$id = $record['package_id'];

echo "<div>";
echo "<h1>";
echo "<p>" . $record['package_name'] . "</p>";
echo "</h1>";

echo "<ul>";
echo nl2br("<li>" . "<br />" .  $record['package_details'] . "<br />" . "</li>") ;
echo "<ul/>";

echo  "<td><a href='package.all.php?id=$id'>Submit</a></td>";
echo "</div>";

}
echo "</div>";

if (isset($_POST['submit'])) {



$p_id = $_GET['id'];
$c_id = $_SESSION['u_id'];
$e_name = mysqli_real_escape_string($conn, $_POST['e_name']) ;
$d_event = mysqli_real_escape_string($conn, $_POST['d_event']) ;
$t_event = mysqli_real_escape_string($conn, $_POST['t_event']) ;
$e_t_event = mysqli_real_escape_string($conn, $_POST['e_t_event']) ;
$theme = mysqli_real_escape_string($conn, $_POST['theme']) ;
$venue = mysqli_real_escape_string($conn, $_POST['venue']) ;
date_default_timezone_set('Asia/Manila');
$date = date('Y/m/d'). substr((string)1, 6);
$time = date('H:i');
$avail = "Package";


  if (empty($e_name) || empty($d_event) || empty($t_event) || empty($e_t_event) || empty($theme)){

    header("Location:../Packages.all.php?empty");
    exit();
  }

  else{
    $sql = "SELECT * FROM event_table WHERE event_date = '$d_event'" ;
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);


 if(!$result){
        echo("Error description: " . mysqli_error($conn));

}

    if ($resultcheck>=1) {
      header("Location:../Packages.all..overload.php?input=datescheduled");
  exit();
    }




else{





$sql = "INSERT INTO event_table (event_name, event_date, event_time_start, event_time_end, cusact_id, theme, venue, reserve_date, reserve_time, package_id, Availed) VALUES ('$e_name', '$d_event', '$t_event', '$e_t_event', '$c_id', '$theme', '$venue', '$date', '$time', '$p_id', '$avail' );";
$result = mysqli_query ($conn, $sql);


$newest_id = mysqli_insert_id($conn);
$reservation_type = 1;
$order_q = 1;

$sql = "SELECT * FROM admin WHERE admin_id = '1'" ;
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);


$sql = "INSERT INTO reservation (reservation_type_id, admin_id, event_id, res_expires) VALUES ('$reservation_type', '$resultcheck', '$newest_id', NOW() + INTERVAL 24 HOUR );";
$result = mysqli_query ($conn, $sql);

//price
$p_sql = "SELECT package_price from package WHERE package_id = '$p_id'" ;
$p_result = mysqli_query($conn, $p_sql);
$price = mysqli_fetch_assoc($p_result);


$p_p = $price['package_price'];


$sql = "INSERT INTO order_list (order_qnty, event_id, amount) VALUES ('$order_q', '$newest_id', '$p_p');";
$result = mysqli_query ($conn, $sql);
$order_n_id = mysqli_insert_id($conn);

 header("Location:order.confirmation.php?n_id=$newest_id&new_p_id=$p_id&o_id=$order_n_id");



 if(!$result){
        echo("Error description: " . mysqli_error($conn));
    }
}




}
}
 else {


}



?>





               <?php
      if (isset($_SESSION['u_uid'])) {


        echo '<form action="includes/logout.inc.php"    method="POST">
        <button type="submit" name="submit">logout</button>
        </form>

        ';
      } else {
        // echo '<form action="Login.php"><button type="submit" name="submit">
        // Login</button> </form>
        // <form action="signup.php"> <button type="submit" name="signup">Signup</button> </form>';
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


<form method="POST">
<label>Event Name</label>
<input type="text" name="e_name" placeholder="Enter Event Name*"/>

<label for="job">Day of the Event</label>
<input type="date" name="d_event" placeholder="Enter Date of Event*"/>


<label for="job">Time of the Event</label>
<input type="Time" name="t_event" placeholder="Enter Time of Event*"/>

<label for="job">End Time of the Event</label>
<input type="Time" name="e_t_event" placeholder="Enter End Time of Event*"/>

<label>Theme</label>
<input type="text" name="theme" placeholder="Enter Theme*"/>

<label>Venue</label>
<input type="text" name="venue" placeholder="Enter Venue*"/>

<input name="submit" type="submit" value="Submit"/>
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

</html>
