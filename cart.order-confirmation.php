<?php
 session_start();

  include_once 'order.confirmation-header.php';

  include 'includes/dbh.inc.php';


$c_id = $_SESSION['u_id'];



$n_id = $_SESSION['n_id'];
$p_id = $_SESSION['p_id'];
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


if(!$data){
        echo("Error description: " . mysqli_error($conn));
    }


  while ($record = mysqli_fetch_array($data)) {
$p_amount = $record['package_price'];
$percentage = 12;

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


if(isset($_POST["submit-proof"])) {


  $p_type = $_POST['p_type'];
  $r_num = $_POST['r-num'];
  $amount = $_POST['amount'];
  $acc_num = $_POST['acc-num'];
  $status = "pending";
  //order_id
  date_default_timezone_set('Asia/Manila');
  $date = date('Y/m/d'). substr((string)1, 6);;


$p_sql = "SELECT * FROM payment_type where payment_type_id = $p_type";
$data1 = mysqli_query($conn, $p_sql);
$result1 = mysqli_fetch_assoc($data1);

$n_p_type = $result1['payment_type'];


    $image = addslashes(file_get_contents($_FILES["image"]['tmp_name']));


    $o_sql = "INSERT INTO billing (event_id, TotalPrice) VALUES ('$n_id', '$p_amount')";
    $data = mysqli_query($conn, $o_sql);
    $b_id = mysqli_insert_id($conn);  


    $p_sql = "INSERT INTO payment (billing_id, payment_type_id, Balance) VALUES ('$b_id', '$p_type', '$p_amount')";
    $data = mysqli_query($conn, $p_sql);
    $payment_id = mysqli_insert_id($conn);

    $proof_sql = "INSERT INTO proof_payment (acct_no, amount, image_reciept, payment_date, transaction_no, cusact_id, payment_id, event_id, payment_status) VALUES ('$acc_num', '$amount', '$image', '$date', '$r_num', '$c_id', '$payment_id', '$n_id', '$status')";
    $data = mysqli_query($conn, $proof_sql);

 

if(!$data){
        echo("Error description: " . mysqli_error($conn));
    }


}


if (isset($_POST["pay-later"])) {

header("Location:reservation.php");

}




      ?>






<body>
  
<div id="content-payment">
  
<form method="POST" enctype="multipart/form-data">

  <input type="hidden" name="size" value="1000000">


  <div>

    <input type='radio' name='p_type' value='2'/>Full Payment</br>
    <input type='radio' name='p_type' value='1'/>Installment</br>
   
    <input type="file" name="image" id="image">
    <input type="text" name="amount" placeholder="Amount">
    <input type="text" name="acc-num" placeholder="Reference Number">
    <input type="text" name="r-num" placeholder="Reference Number">

  </div>
  
<div>
<input type="submit" name="submit-proof" value="Submit Receipt">
<input type="submit" name="pay-paypal" value="Pay With Paypal">
<input type="submit" name="submit-cancel" value="Cancel Order">
<input type="submit" name="pay-later" value="Pay Later">

</div>


</form>

</div>




     <script>  
 $(document).ready(function(){  
      $('#submit-proof').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script>
      window.jQuery || document.write('<script src="/javascripts/libs/jquery-1.10.2.min.js"><\/script>')
    </script>
    <script src="javascripts/libs/holder.js" type="text/javascript"></script>
    <script src="javascripts/plugins.js" type="text/javascript"></script>
    <script src="javascripts/formsjs.js" type="text/javascript"></script>
  </body>
</html>
