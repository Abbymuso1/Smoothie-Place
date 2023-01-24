<?php

include_once 'conn/db_connection.php';
error_reporting(0);

$custid = @$_GET["custid"];
$rn = @$_GET["rn"];
$pn = @$_GET["pn"];
$cl = @$_GET["cl"];
$cnp = @$_GET["cnp"];
$crp = @$_GET["crp"];
$ut = @$_GET["ut"];

?>
<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Customer Information Update Page🥰</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Abi Muso">
    <meta name="description" content="Login Page">
    <link rel="stylesheet" href="Css_Styling/newpagestyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Klee+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="border">
        <div class="header">
            <h1>Update Page</h1>
        </div>

        <div class="icon">


            <style>
                .icon {
                    background-image: url("Css_Styling/Images/login (2).png");
                    /* background-color: pink; */
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    border-style: none;
                }
            </style>
        </div>
        <div class="user">
            <?php echo $_SESSION['User']; ?>
        </div>

        <div class="logo">
            <style>
                .logo {
                    background-image: url("Css_Styling/Images/logo.jpeg");
                    background-color: pink;
                    background-position: top;
                    background-repeat: no-repeat;
                    background-size: cover;
                    border-style: none;
                }
            </style>
        </div>

        <div class="topnav">
            <a href="contact.php">Contact Us</a>
            <a href="menu.php"> Smoothie menu</a>
            <a href="Smoothie Sale.php">Home</a>

        </div>

        <div class="row">
            <div class="column image">
                <style>
                    .column.image {
                        background-image: url("Css_Styling/Images/Update.jpeg");
                        background-color: pink;
                        background-position: top;
                        background-repeat: no-repeat;
                        background-size: cover;
                        width: 60%;
                        height: 60%;
                        border-style: none;
                        object-fit: cover;
                    }
                </style>
            </div>
            <div class="column content">

                <div class="welcome">

                    <h2>Customers Logged In</h2>
                    <h3><a href="update.php">Update Information</a></h3>
                    <h4>Update registration</h4>
                </div>

                <div class="details">

                    <form action="" method="GET">
                        <table border="1px">
                            <tr>
                                <td>Customer id</td>
                                <td><input name="id" type="text" value="<?php echo "$custid" ?>"></td>
                                <td>Customer Name</td>
                                <td><input name="name" type="text" value="<?php echo "$rn" ?>"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><input name="phone" type="text" value="<?php echo "$pn" ?>"></td>
                                <td>Customer Location</td>
                                <td><input name="location" type=text value="<?php echo "$cl" ?>"></td>
                            </tr>
                            <tr>
                                <td>Customer New Password</td>
                                <td><input name="newpass" type=text value="<?php echo "$cnp" ?>"></td>

                                <td>Customer Retype Password</td>
                                <td><input name="retypepass" type=text value="<?php echo "$crp" ?>"></td>

                            </tr>
                            <td>User Type</td>
                            <td><input name="type" type=text value="<?php echo "$ut" ?>"></td>
                            </tr>
                        </table>
                        <input type="submit" id="button1" name="submit" value="Change">
                    </form>

                </div>

                <a href="notify.php"> <button type="reset" id="button2">Back</button></a>

                <a class="homepage" href="Smoothie Sale.php">Home page</a>
            </div>



            <div class="footer">
                <table id="table">
                    <tr>
                        <th>Contact Us</th>
                        <th>Offers</th>
                </tr>
                    <tr>
                        <td><a href="contact.php">Email address</a></td>
                        <td><a href="Smoothie Sale.php">Buy two smoothies get one free!</a></td>
                    </tr>
                    <tr>
                        <td> <a href="contact.php">Phone Number</a></td>
                        <td><a href="Smoothie Sale.php">A new flavour of smoothie comes with cookie</a></td>
                    </tr>
                    <tr>
                        <td><a href="contact.php">Postal Address</a></td>
                        <td><a href="Smoothie Sale.php">Smoothie Sale coming soon</a></td>

                    </tr>

            </div>
        </div>


</body>


</html>
<?php
if ($_GET["submit"]) {

    $m = $_GET["id"];
    $n = $_GET["name"];
    $o = $_GET["phone"];
    $p = $_GET["location"];
    $q = $_GET["newpass"];
    $r = $_GET["retypepass"];
    $s = $_GET["type"];

    $conn = mysqli_connect("localhost", "root", "", 'bubbles_groovy_smoothies');
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }
    $sql = "UPDATE user_data SET `id`='$m',`user_name`='$n',`phone_no`='$o',`user_location`='$p',`user_newpass`='$q',`user_retype_pass`='$r',`usertype`='$s' WHERE `id`='$m'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Success";
        include "notify.php";
    } else {
        echo "No success";
        include "update.php";
    }
}




?>