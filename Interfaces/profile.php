<?php
session_start();

include_once 'conn/db_connection.php';
$conn = connect();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bubbles Groovy Smoothies Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Abi Muso">
    <meta name="description" content="Login Page">
    <link rel="stylesheet" href="Css_Styling/newpagestyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Klee+One&display=swap" rel="stylesheet">
    <style>
        .details table {
            width: 30px;
            height: 20px;
        }

        .details table th {
            height: 12px;

            font-size: 14px;
        }

        .details table tr {
            height: 10px;
            border: solid;
            border-color: black;
            font-size: 14.5px;
            border: 1px solid black;

        }

        .details table tr:hover {
            color: plum;
            cursor: pointer;

        }
    </style>
</head>

<body>
    <div class="border">
        <div class="header">
            <h1>Profile Page</h1>
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
            <?php echo "Your details  " . $_SESSION['User']; ?>
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
                        background-image: url("Css_Styling/Images/prof.jpeg");
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

                    <h2>Profile Page</h2>
                    <h4>User Details</h4>

                </div>

                <div class="details">

      <img alt="user"src="Images/smiley.jpeg" width="300" height="250">
                    <?php

                    $conn = connect();
                    $sql = "SELECT * from user_data";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) { //Fetch data
                    ?>

                            <form method="POST" action="conn/registerconn.php">
                                <label name="Username">Username</label>
                                <?php echo $row['user_name']; ?>
                                <label name="phone_number">Phone Number</label>
                                <?php echo $row['phone_no']; ?>
                                <label name="Location">Location/Region/State</label>
                                <?php echo $row['user_location']; ?>

                                <label>Select User type: </label>
                        <?php echo $row['usertype'];
                            break;
                        }
                    } ?>
                        <!-- <a href="menu.php"><button type="submit" id="button1">Proceed</button></a> -->
                            </form>

                </div>

                <a href="menu.php"> <button type="reset" id="button2">Proceed</button></a>

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