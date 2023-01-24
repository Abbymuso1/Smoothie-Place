<?php

include_once 'db_connection.php';
error_reporting(0);

$ad1=@$_GET["ad1"];                  


$sql = "DELETE FROM order_table WHERE order_id='$ad1'";

$result = $conn->query($sql);

if($result)
{
   // echo "Success";
    include "receiveorder.php";
}
else
{
    echo "No success";
    include "receiveorder.php";
}


?>
