<?php
session_start();

include_once 'db_connection.php';

if(isset($_POST['order']))
{
  $sql1="INSERT INTO order_manager('Order_id','name','phone_no',' address') VALUES('$_POST['user']','$_POST['location']','$_POST['Smoothie']')";

  if($conn->query($sql2)===true)
  {
    $Order_id=$conn->insert_id;
    $sql2= "INSERT INTO order_table (cust_uname,smoothie,price,quantity,subtotal,total ) VALUES (?, ?,?);
  }

}




$

if ($conn->query($sql2) === TRUE) 
{
//echo "New record created successfully";
include "receiveorder.php";
  
} 
else {
  echo "Error: " . $sql2. "<br>" . $conn->error;
}

$conn->close();






?>