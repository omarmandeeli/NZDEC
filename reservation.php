<?php
 session_start();

 include_once 'reservation-header.php';

include 'includes/dbh.inc.php';


$c_id = $_SESSION['u_id'];
$n_id = $_GET['n_id'];
$p_id = $_GET['new_p_id'];


    $sql = "SELECT event_id, event_name, event_date, event_time_start, event_time_end, cusact_id, theme, reserve_date, reserve_time  FROM event_table WHERE cusact_id = $c_id AND event_id=$n_id";
    $data = mysqli_query($conn, $sql);
    

if(!$data){
        echo("Error description: " . mysqli_error($conn));
    }


  while ($record = mysqli_fetch_array($data)) {



echo "<table border = 1>";
echo "<tr>";
echo "<th>" . "Name of The Event" ."</th>";
echo "<th>" . "Date of the Event" ."</th>";
echo "<th>" . "Time of the Event" ."</th>";
echo "<th>" . "End Time of the Event" ."</th>";
echo "<th>" . "Theme" ."</th>";
echo "<th>" . "Reserve Date" ."</th>";
echo "<th>" . "Reserve Time" ."</th>";

echo "</tr>";
echo "<tr>"; 
echo "<td>" . "<br />" .  $record['event_name'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['event_date'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['event_time_start'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['event_time_end'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['theme'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['reserve_date'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['reserve_time'] . "<br />" . "</td>" ;

echo "<tr/>";



}


$p_sql = "SELECT * FROM package where package_id = '$p_id'";
$data = mysqli_query($conn, $p_sql);
$result = mysqli_fetch_assoc($data);   
$p_amount = $result['package_price'];

if(!$data){
        echo("Error description: " . mysqli_error($conn));
    }


  while ($record = mysqli_fetch_array($data)) {


echo "<table border = 1>";
echo "<tr>";
echo "<th>" . "Package Name" . "</th>";
echo "<th>" . "Package Price" . "</th>";
echo "<th>" . "Package Details" . "</th>";
echo "<th>" . "Package Categories" . "</th>";

echo "</tr>";
echo "<tr>"; 
echo "<td>" . "<br />" .  $record['package_name'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['package_price'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['package_details'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record['package_categories'] . "<br />" . "</td>" ;

echo "<tr/>";





}
echo "</table>";


?>















      
      <footer id='contacts'>
        
        <span class='cc'>
          @ 2014 . Zaldy Ducusin
        </span>
      </footer>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
  








    <script src="javascripts/libs/holder.js" type="text/javascript"></script>
    <script src="javascripts/plugins.js" type="text/javascript"></script>
    <script src="javascripts/formsjs.js" type="text/javascript"></script>
  </body>
</html>
