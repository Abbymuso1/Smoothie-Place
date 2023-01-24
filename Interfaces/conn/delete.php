<?php

include_once 'db_connection.php';
$conn=connect();
error_reporting(0);

$ad1=@$_GET["ad1"];                  


$sql = "DELETE FROM user_data WHERE id='$ad1'";

$result = $conn->query($sql);

if($result)
{
    echo "Success";
    header("location: notify.php?Success");
}
else
{
    echo "No success";
    header("location: notify.php?No success");
}


?>

<?php

include_once 'db_connection.php';
$conn=connect();
error_reporting(0);

$id=@$_GET["id"];     


$smoothie=$_POST['name0'];
$price=$_POST['name1'];
$quantity=$_POST['name2'];
$subtotal=$_POST['name3'];
$event=$_POST['event'];


$order=array($smoothie,$price,$quantity);

if($event=="update")
{
$_SESSION[$smoothie]=$order;
header("location: shopping-cart.php?Updated");
}
elseif($event=="delete")
{
unset($_SESSION[$smoothie]);
header("location: shopping-cart.php?Deleted");
}


?>

