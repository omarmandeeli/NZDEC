<?php  
 //cart.php  
 session_start();  
include 'includes/dbh.inc.php';


if (!$conn) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
}

$c_id = $_SESSION['u_id'];

$n_id = $_SESSION['n_id'];
$p_id = $_SESSION['p_id'];

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Multi Tab Shopping Cart By Using PHP Ajax Jquery Bootstrap Mysql</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:800px;">  
                <?php  

                $c_id = $_SESSION['u_id'];

              
               
               

                if(isset($_POST["place_order"]))  
                {  
                      
                     $order_details = "";  
                     foreach($_SESSION["shopping_cart"] as $keys => $values)  
                     {  
                          $order_details .= "  
                          INSERT INTO order_list (order_qnty, event_id, service_id, amount)  
                          VALUES('".$values["product_quantity"]."', '$n_id', '".$values["product_id"]."','".$values["product_price"]."');  
                          ";  

                       
                     }  
                     if(mysqli_multi_query($conn, $order_details))  
                     {  
                          unset($_SESSION["shopping_cart"]);  
                          echo '<script>alert("You have successfully place an order...Thank you")</script>';  
                          echo '<script>window.location.href="cart.order-confirmation.php"</script>';  
                     }  

          
                }  
                              ?>  
           </div>  
      </body>  
 </html> 
