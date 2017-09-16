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
          echo "<h1>" . $record['package_name'] . "</h1>";
       
        echo "<ul>";

        echo "<ul/>";
        echo  "<a href='package.all.php?id=$id'>Submit</a>";
      echo "</div>";
    }
  echo "</div>";


// echo "<div class='grid'>";
// while ($record = mysqli_fetch_array($data)) {
// $id = $record['package_id'];

// echo "<div>";
// echo "<h1>";
// echo "<p>" . $record['package_name'] . "</p>";
// echo "</h1>";
// echo '<img src="data:image/jpeg;base64,'.base64_encode($record['package_image'] ).'" height="200" width="200" class="img-thumnail" />';
// echo "<ul>";
// echo nl2br("<li>" . "<br />" .  $record['package_details'] . "<br />" . "</li>") ;
// echo "<ul/>";

// echo  "<td><a href='package.all.php?id=$id'>Submit</a></td>";
// echo "</div>";

// }
// echo "</div>";


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
$my_date = date('Y-m-d', strtotime($d_event));


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
      header("Location:../Packages.all.php?input=datescheduled");
  exit();
    }




else{





$sql = "INSERT INTO event_table (event_name, event_date, event_time_start, event_time_end, cusact_id, theme, venue, reserve_date, reserve_time, package_id, Availed) VALUES ('$e_name', '$my_date', '$t_event', '$e_t_event', '$c_id', '$theme', '$venue', '$date', '$time', '$p_id', '$avail' );";
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


 header("Location:order.confirmation.php?n_id=$newest_id&new_p_id=$p_id");



 if(!$result){
        echo("Error description: " . mysqli_error($conn));
    }
}




}
}




//----------------------------------------------------------------------------------------------------------//


if (isset($_POST['submit-addon'])) {



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
$my_date = date('Y-m-d', strtotime($d_event));


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
      header("Location:../Packages.all.php?input=datescheduled");
  exit();
    }




else{





$sql = "INSERT INTO event_table (event_name, event_date, event_time_start, event_time_end, cusact_id, theme, venue, reserve_date, reserve_time, package_id, Availed) VALUES ('$e_name', '$my_date', '$t_event', '$e_t_event', '$c_id', '$theme', '$venue', '$date', '$time', '$p_id', '$avail' );";
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


 header("Location:cart-index.php?n_id=$newest_id&new_p_id=$p_id");



 if(!$result){
        echo("Error description: " . mysqli_error($conn));
    }
}




}
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

<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<label for="job">Day of the Event</label>
<input type="text" name="d_event" id="mydate" size="30" data-date-format='yy-mm-dd' />


<label for="job">Time of the Event</label>
<input type="Time" name="t_event" placeholder="Enter Time of Event*"/>

<label for="job">End Time of the Event</label>
<input type="Time" name="e_t_event" placeholder="Enter End Time of Event*"/>

<label>Theme</label>
<input type="text" name="theme" placeholder="Enter Theme*"/>

<label>Venue</label>
<input type="text" name="venue" placeholder="Enter Venue*"/>

<input name="submit" type="submit" value="Submit"/>
<input name="submit-addon" type="submit" value="Click to add services"/>

<style type="text/css">

.ui-datepicker-calendar>tbody>tr>td.ui-datepicker-unselectable>span.ui-state-default:before{
    bottom: 0;
    content: "X";
    height: 10px;
    color: red;
    left: 7px;
    margin: auto;
    position: relative;
    right: 0;
    top: 0;
    width: 4px;
}


</style>


<?php  
$query = " SELECT  * FROM event_table ";
$result = mysqli_query($conn,$query);
$sentToList = array();
while($row = mysqli_fetch_assoc($result)) { 

  $sentToList[] = $row['event_date'];

   }
$json = json_encode($sentToList);

?>

<script >



$( function() 
{
  //build up your array
  //this is a mock of var arrayFromPHP = <?php echo json_encode($json); ?>;
  var phpArrayString = '<?php print_r($json)?>';
  
  //parse your json here
  var array = JSON.parse(phpArrayString);

  //include dateFormat AND beforeShowDay options
  $( "#mydate" ).datepicker({ 
      dateFormat: 'yy-mm-dd',
      beforeShowDay: function(date)
      {
        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        
        //You can even use tooltips to make dates you can select more obvious
        return [ array.indexOf(string) == -1, 'highlight', 'You may select this date' ];
      }
  });
  
    //Optionally - call the tooltip plugin on dates that can be selected
  $('#mydate .highlight a').tooltip();
});

// $(document).ready(function () {
//     initComponent();
// });

// function initComponent () {
//     var array = ['2017-09-05', '2017-09-06'];
//     $('#date').datepicker({
//     dateFormat: 'yy-mm-dd',
//     beforeShowDay: function(d) {
//         var string = jQuery.datepicker.formatDate('yy-mm-dd', d);
//         return [ array.indexOf(string) == -1 ]
//     }
// });


</script>

</form>


      <footer id='contacts'>

        <span class='cc'>
          @ 2014 . Zaldy Ducusin
        </span>
      </footer>
    </div>


</html>
