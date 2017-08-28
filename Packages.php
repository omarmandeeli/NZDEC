<?php
  session_start();

  include_once 'packages-header.php';

  include 'includes/dbh.inc.php';

mysqli_select_db($conn, "test");
$sql = "SELECT * FROM package";
$data = mysqli_query($conn, $sql);


while ($record = mysqli_fetch_array($data)) {

$id = $record['package_id'];

echo "<table border = 1>";
echo "<tr>";
echo "<th>" . $record['package_name'] . "</th>";


echo "</tr>";
echo "<tr>"; 
echo "<td>" . "<br />" .  $record['package_details'] . "<br />" . "</td>" ;

echo "<tr/>";

echo  "<td><a  href='package.all.php?id=$id'>Submit</a></td>";



}

echo "</table>";

if (isset($_POST['submit'])) {

include 'dbh.inc.php';

$p_id = $_GET['id'];
$c_id = $_SESSION['u_id'];
$e_name = mysqli_real_escape_string($conn, $_POST['e_name']) ;
$d_event = mysqli_real_escape_string($conn, $_POST['d_event']) ;
$t_event = mysqli_real_escape_string($conn, $_POST['t_event']) ;
$e_t_event = mysqli_real_escape_string($conn, $_POST['e_t_event']) ;
$theme = mysqli_real_escape_string($conn, $_POST['theme']) ;
$date = date('Y-m-d H:i:s');

	if (empty($e_name) || empty($d_event) || empty($t_event) || empty($e_t_event) || empty($theme)){

		header("Location:../Packages.all.php?empty");
		exit();
	}else{

 


$sql = "INSERT INTO event_table (event_name, event_date, event_time_start, event_time_end, cusact_id, theme, reserve_date_time) VALUES ('$e_name', '$d_event', '$t_event', '$e_t_event', '$c_id', '$theme', '$date');";
mysqli_query($conn, $sql);


}
}
 else {

	echo 'isset was false'; 
	

}


?>







  </body>

</html>
