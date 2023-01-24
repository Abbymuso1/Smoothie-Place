<?php

include_once 'db_connection.php';
$conn=connect();
error_reporting(0);

$ad1=@$_GET["ad1"];                  


$sql = "DELETE FROM food_menu WHERE id='$ad1'";

$result = $conn->query($sql);

if($result)
{
    echo "Success";
    header("location: ../view_food.php?No success");
}
else
{
    echo "No success";
    header("location: ../view_food.php?No Success");
}


?>


