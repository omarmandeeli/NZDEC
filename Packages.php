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
  echo '<img src="data:image/jpeg;base64,'.base64_encode($record['package_image'] ).'" height="200" width="200" class="img-thumnail" />';
  echo "<ul>";
  echo nl2br("<li>" . "<br />" .  $record['package_details'] . "<br />" . "</li>") ;
  echo "<ul/>";
  echo  "<a href='package.all.php?id=$id'>Submit</a>";
  echo "</div>";
  }
  echo "</div>";
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
  else{
  // echo 'isset was false';
  }
?>

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

</body>
</html>
