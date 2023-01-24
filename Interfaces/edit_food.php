<?php
include_once 'conn/db_connection.php';
error_reporting(0);
$custid = @$_GET["custid"];
$rn = @$_GET["rn"];
$pn = @$_GET["pn"];
$cl = @$_GET["cl"];
?>

<?php
session_start();
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Bubbles Groovy Smoothies Edit food Page</title>
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
                    <h1>Update Smoothie✨</h1>
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
                                background-image: url("Css_Styling/Images/View.jpg");
                                background-color: pink;
                                background-position: center;
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

                            <h2>Food Logged In</h2>
                            <h3><a href="edit_food.php">Update Page</a></h3>
                            <h4>Update registration</h4>
                        </div>

                        <div class="details">

                            <form action="conn/process.php" method="POST">
                                <table border="2px" cell spacing="5px">
                                    <tr>
                                        <td>Food id</td>
                                        <td><input name="id" type="text" value="<?php echo "$custid" ?>"></td>
                                        <td>Food Name</td>
                                        <td><input name="name" type="text" value="<?php echo "$rn" ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Food Image</td>
                                        <td><input name="img" type="file" value="<?php echo "$pn" ?>"></td>
                                        <td>Price</td>
                                        <td><input name="price" type=text value="<?php echo "$cl" ?>"></td>
                                    </tr>
                                    <tr>
                                </table>
                                <button input type="submit" id="button1" name="matata" value="Change">Update</button>
                            </form>
                        </div>
                        <a href="view_food.php"> <button type="reset" id="button2">Back</button></a>
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


        <!-- <?php
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
                header("location: notify.php");
            } else {

                echo "No success";
                // include "edit_food.php";

            }
        }

        ?> -->