<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bubbles Groovy Smoothies Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Abi Muso">
    <meta name="description" content="Login Page">
    <link rel="stylesheet" href="../Css_Styling/newpagestyle.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Klee+One&display=swap" rel="stylesheet">
</head>

<body>
    <div class="border">
        <div class="header">
            <h1>Shopping Cart</h1>
        </div>

        <div class="icon">


            <style>
                .icon {
                    background-image: url("../Css_Styling/Images/login (2).png");
                    /* background-color: pink; */
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    border-style: none;
                }
            </style>
        </div>
        <div class="user">
            <a href="login.php">Untitled login</a>
        </div>

        <div class="logo">
            <style>
                .logo {
                    background-image: url("../Css_Styling/Images/logo.jpeg");
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
            <a href="../menu.php"> Smoothie menu</a>
            <a href="Smoothie Sale.php">Home</a>

        </div>

        <div class="row">
            <div class="column image">



                <style>
                    .para {
                        margin: auto;

                        width: 400px;
                        padding: 25px;

                    }

                    .para input {
                        border-style: ridge;
                        border-top: none;
                        border-left: none;
                        border-right: none;
                    }

                    .column.image {
                        background-image: url("Css_Styling/Images/Login.jpeg");
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

                    <h2>I am loving your flavours!</h2>
                    <h3><a href="shopping-cart.php">Shopping Cart </a></h3>
                    <h4>Shopping Cart</h4>
                </div>

                <div class="details">


                    <table border="1px">
                        <tr>
                            <th>Order_id</th>
                            <th>name</th>
                            <th> Quantity</th>
                            <th>Subtotal</th>
                            <th>Operations</th>

                        </tr>



                        <?php

                        require_once("../conn/db_connection.php");
                        $conn = connect();
                     
                            $sql = "SELECT * FROM userorders WHERE Order_id=''";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();

                            echo "<style>
                            table th
                                {
                                    height:10px;
                                    text-align:centre;

                                }

                                table td
                                {
                            text-align:centre;
                            height: 15px;
                            width:120px;
                                }
                   
                                    </style>";

                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['price']}</td>";
                            echo "<td>{$row['quantity']}</td>";


                            echo "</tr>";
                        }
                        ?>




                </div>

                <a href="Smoothie Sale.php"> <button type="reset" id="button2">Back</button></a>

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
                </table>
            </div>
        </div>
</body>

</html>