<?php
session_start();
include_once 'reservation-header.php';
include 'includes/dbh.inc.php';
//======================================================================
// SY START
//======================================================================
$c_id = $_SESSION['u_id'];
$p_sql = "SELECT p.package_id, p.package_name, p.package_price, p.package_details, p.package_categories, p.package_id, e.event_id, e.event_name, e.event_date, e.event_time_start, e.event_time_end, e.theme, e.reserve_date, e.reserve_time, rt.reservation_status FROM event_table as e inner join package as p on e.package_id = p.package_id INNER JOIN reservation as rs ON rs.event_id = e.event_id INNER JOIN reservation_type as rt ON rs.reservation_type_id = rt.reservation_type_id where cusact_id = $c_id;";
$data_p = mysqli_query($conn, $p_sql) ;
while ($record_p = mysqli_fetch_array($data_p)) {
$e_id = $record_p ['event_id'];
$p_id = $record_p ['package_id'];

echo "<div class='yourreservation'>";
    echo "<h1>Your Reservation: <span style='color:#222'>".$record_p['event_name']."<span></h1>";
echo "</div>";
echo "<div class='gridcon'>";
echo "<div class='grid'>";
    echo "<div class='i1'>";
        echo "<p>" . "Package Name" . "</p>";
        echo "<p>" . $record_p['package_name'] . "</p>" ;
    echo "</div>";
    echo "<div class='i2'>";
        echo "<p>" . "Package Price" . "</p>";
        echo "<p>" . $record_p['package_price'] . "</p>" ;
    echo "</div>";
    echo "<div class='i4'>";
        echo "<p>" . "Package Categories" . "</p>";
        echo "<p>" . $record_p['package_categories'] . "</p>" ;
    echo "</div>";
    echo "<div class='i5'>";
        echo "<p>" . "Name of The Event" ."</p>";
        echo "<p>" . $record_p['event_name'] . "</p>" ;
    echo "</div>";
    echo "<div class='i6'>";
        echo "<p>" . "Date of the Event" ."</p>";
        echo "<p>" . $record_p['event_date'] . "</p>" ;
    echo "</div>";
    echo "<div class='i7'>";
        echo "<p>" . "Time of the Event" ."</p>";
        echo "<p>" . $record_p['event_time_start'] . "</p>" ;
    echo "</div>";
    echo "<div class='i8'>";
        echo "<p>" . "End Time of the Event" ."</p>";
        echo "<p>" . $record_p['event_time_end'] . "</p>" ;
    echo "</div>";
    echo "<div class='i9'>";
        echo "<p>" . "Theme" ."</p>";
        echo "<p>" . $record_p['theme'] . "</p>" ;
    echo "</div>";
    echo "<div class='i10'>";
        echo "<p>" . "Reserve Date" ."</p>";
        echo "<p>" . $record_p['reserve_date'] . "</p>" ;
    echo "</div>";
    echo "<div class='i11'>";
        echo "<p>" . "Reserve Time" ."</p>";
        echo "<p>" . $record_p['reserve_time'] . "</p>" ;
    echo "</div>";
    echo "<div class='i3'>";
        echo "<p>" . "Package Details" . "</p>";
        echo "<p>" . $record_p['package_details'] . "</p>" ;
    echo "</div>";
  echo '<div class="i12">';
        echo "<p>" . "Reservation Status" . "</p>";


        $upp=$record_p['reservation_status'];
        $upp = strtoupper($upp);

                IF($upp == 'PENDING RESERVATION'){

                echo "<p style='color:red;'>" . $record_p['reservation_status'] . "</p>" ;
                }

                ELSEIF($upp == 'APPROVED RESERVATION'){
                echo "<p style='color:green;'>" . $record_p['reservation_status'] . "</p>" ;
                }

                ELSEIF($upp == 'PENDING CANCELATION'){
                echo "<p style='color:yellow;'>" . $record_p['reservation_status'] . "</p>" ;
                }

                ELSEIF($upp == 'APPROVED CANCELATION'){
                echo "<p style='color:blue;'>" . $record_p['reservation_status'] . "</p>" ;
                }

                  ELSE {
                echo "<p style='color:blue;'>" . $record_p['reservation_status'] . "</p>" ;
                }


    echo "</div>";


echo "</div>";
echo "</div>";

echo "<div class='cancelres'>";
    echo "<a href='order.paynow.php?id=$e_id&p_id=$p_id' target='_parent'><button>Pay Now</button></a>";
    echo "<button>Cancel Reservation</button>";
echo "</div>";
}
// ======================================================================
// SY END
// ======================================================================
if(!$data_p){
        echo("Error description: " . mysqli_error($conn));
    }
?>
<footer id='contacts'>
    <span class="fudge">ZDEC</span>
  <span class='cc'>
    Copyright &copy; 2014-2017, Zaldy Ducusin Events and Consultancy
  </span>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="javascripts/libs/holder.js" type="text/javascript"></script>
<script src="javascripts/plugins.js" type="text/javascript"></script>
<script src="javascripts/formsjs.js" type="text/javascript"></script>
</body>
</html>
