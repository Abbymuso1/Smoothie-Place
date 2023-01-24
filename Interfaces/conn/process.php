<?php

require_once("db_connection.php");

if(isset($_POST['done']))
{

    $target="../img/".basename($_FILES['food']['name']);
   $conn=connect();

   $food_name=$_POST['fooditem'];
   $image=$_FILES['food']['name'];
   $price=$_POST['price'];
   $sql="INSERT INTO `food_menu`( `food_name`, `image_path`, `food_price`) VALUES ('".$_POST["fooditem"]."','$image','".$_POST["price"]."')";

   mysqli_query($conn, $sql);

   if(move_uploaded_file($_FILES['food']['tmp_name'],$target))
   {
       $msg="Image uploaded successfully";
       echo $msg;
       header("location: ../view_food.php");
   }
   else
   {
    $msg="Unsuccessful";
    echo $msg;
   }


}

?>


<?php
        if ($_POST["matata"]) {

            $m = $_POST["id"];
            $n = $_POST["name"];
            $o = $_POST["img"];
            $p = $_POST["price"];


            $conn = connect();


            $sql = "UPDATE `food_menu` SET `id`='$m',`food_name`='$n',`image_path`='$o',`food_price`='$p' WHERE `id`='$m'";

            $result = $conn->query($sql);

            if ($result) {
                // echo "Success";
                header("location: ../view_food.php");
            } else {

                echo "No success";
                // include "edit_food.php";

            }
        }

        ?>




