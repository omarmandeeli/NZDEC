<?php
 session_start();

 include_once 'reservation-header.php';

include 'includes/dbh.inc.php';


$c_id = $_SESSION['u_id'];

/*

    $sql = "SELECT event_id, event_name, event_date, event_time_start, event_time_end, cusact_id, theme, reserve_date, reserve_time, package_id  FROM event_table WHERE ";
    $data = mysqli_query($conn, $sql);
    

if(!$data){
        echo("Error description: " . mysqli_error($conn));
    }


  while ($record = mysqli_fetch_array($data)) {

 $p_id = $record['package_id'];

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
*/

$p_sql = "SELECT p.package_name, p.package_price, p.package_details, p.package_categories, p.package_id, e.event_name, e.event_date, e.event_time_start, e.event_time_end, e.theme, e.reserve_date, e.reserve_time FROM event_table as e inner join package as p on e.package_id = p.package_id where cusact_id = $c_id";
$data_p = mysqli_query($conn, $p_sql) ;




  while ($record_p = mysqli_fetch_array($data_p)) {


echo "<table border = 1>";
echo "<tr>";
echo "<th>" . "Package Name" . "</th>";
echo "<th>" . "Package Price" . "</th>";
echo "<th>" . "Package Details" . "</th>";
echo "<th>" . "Package Categories" . "</th>";
echo "<th>" . "Name of The Event" ."</th>";
echo "<th>" . "Date of the Event" ."</th>";
echo "<th>" . "Time of the Event" ."</th>";
echo "<th>" . "End Time of the Event" ."</th>";
echo "<th>" . "Theme" ."</th>";
echo "<th>" . "Reserve Date" ."</th>";
echo "<th>" . "Reserve Time" ."</th>";

echo "</tr>";
echo "<tr>"; 
echo "<td>" . "<br />" .  $record_p['package_name'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['package_price'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['package_details'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['package_categories'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['event_name'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['event_date'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['event_time_start'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['event_time_end'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['theme'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['reserve_date'] . "<br />" . "</td>" ;
echo "<td>" . "<br />" .  $record_p['reserve_time'] . "<br />" . "</td>" ;

echo "<tr/>";





}
echo "</table>";

if(!$data_p){
        echo("Error description: " . mysqli_error($conn));
    }

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
