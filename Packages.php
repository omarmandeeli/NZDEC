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




?>







  </body>

</html>
