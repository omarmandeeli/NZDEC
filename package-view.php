<?php
  session_start();

  include_once 'packages-view-header.php';

  include 'includes/dbh.inc.php';

mysqli_select_db($conn, "test");
$sql = "SELECT * FROM package";
$data = mysqli_query($conn, $sql);


while ($record = mysqli_fetch_array($data)) {

$id = $record['package_id'];


echo '<div class="packagehead">
<h1>PACKAGES</h1>
</div>';

echo "<div class='grid'>";
    while ($record = mysqli_fetch_array($data)) {
      $id = $record['package_id'];
      echo "<div>";
          echo "<h1>" . $record['package_name'] . "</h1>";
        echo '<img src="data:image/jpeg;base64,'.base64_encode($record['package_image'] ).'" height="200" width="200" class="img-thumnail" />';
        echo nl2br("<p>" . "<br />" .  $record['package_details'] . "<br />" . "</p>") ;
      echo "</div>";
    }
  echo "</div>";


}

?>
    <form action="includes/inquire.inc.php" method="POST">
        <div class="buttonwrap">

    <div class="packbuttinquire">
      <input type="submit" name="submit" value="Inquire Now">
    </div>
</div>
      </form>
      <footer id='contacts'>
          <span class="fudge">ZDEC</span>
        <span class='cc'>
          Copyright &copy; 2014-2017, Zaldy Ducusin Events and Consultancy
        </span>
      </footer>
