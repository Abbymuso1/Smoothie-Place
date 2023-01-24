<?php
session_start();

include_once '../conn/db_connection.php';

$name = $_POST['name'];
$phoneno = $_POST['phoneno'];
$location = $_POST['location'];

$foodname=$_POST['food_name'];
$foodPrice=$_POST['food_price'];
$quantity=$_GET['quan'];


if (isset($_POST['purchase'])) {


    $sql = "INSERT INTO order_manager (name, phone_no, address) VALUES ('$name', '$phoneno','$location');";
    $conn = connect();
    if (mysqli_query($conn, $sql)) {

        // echo "done";
        $Order_id = mysqli_insert_id($conn);
        $sql2 = "INSERT INTO user_orders (Order_id,name, price, quantity) VALUES (?,?,?,?);";
        $stmt = mysqli_prepare($conn, $sql2);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "isii", $Order_id, $name, $price, $quantity);
            foreach($_SESSION['shopping_cart'] as $key =>$values)
            {
                $name=$values['name'];
                $price=$values['price'];
                $quantity=$values['quantity'];
                mysqli_stmt_execute($stmt);

            }
            unset($_SESSION['shopping_cart'] );
            echo "Order Placed!";
            header("location: ../menu.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        //include "menu.php";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
