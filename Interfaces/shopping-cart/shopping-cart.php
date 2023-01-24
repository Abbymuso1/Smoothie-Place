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


            <?php if(isset($_SESSION['shopping_cart'])&&count($_SESSION['shopping_cart'])>0)
            {
            ?>
                <div class="para">
                    <form method="POST" action="purchase.php">
                        <label name="Username">Username</label>
                        <input placeholder="Name" type="text" name="name" required>
                        <label name="smoothie">PhoneNo</label>
                        <input placeholder="phoneno" type="text" name="phoneno" required>
                        <label name="location">Location</label>
                        <input placeholder="location" type="text" name="location" required>
                        <button type="submit" id="button1" name="purchase">Purchase</button>

                    </form>
                </div>

<?php }?>


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
                            <th>Smoothie</th>
                            <th>Price</th>
                            <th> Quantity</th>
                            <th>Subtotal</th>
                            <th>Operations</th>

                        </tr>



                        <?php

                        require_once("../conn/db_connection.php");
                        $conn = connect();

                        $fullprice;
                        if (!isset($_SESSION['shopping_cart'])) {
                            $_SESSION['shopping_cart'] = array();
                        } //to create the cart

                        //clearing the cart
                        if (isset($_GET['clear'])) {
                            $_SESSION['shopping_cart'] = array();
                            //initializing the array into an empty array
                        }

                        if (isset($_GET['Remove_Item'])) {
                            foreach ($_SESSION['shopping_cart'] as $key => $val) {
                                if ($value['food_name'] == $_POST['food_name']) {
                                    unset($_SESSION['shopping_cart'][$key]);
                                    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
                                    echo "<script>Item Removed!</script>";
                                }
                            }
                        }

                        //to detect whether form was submitted...we can use quan or id 
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            @$quan = $_GET['quan'];

                            if ($quan >= 0 && filter_var($quan, FILTER_VALIDATE_INT)) {
                                //update the quantity
                                $_SESSION['shopping_cart'][$id] = $quan;
                            } elseif ($quan == 0 || isset($_GET['clearcart'])) {
                                unset($_SESSION['shopping_cart'][$id]);
                            } //if quan is 0
                            else {
                                //bad input
                                echo "Bad Input";
                            } //this is to check the value entered is valid or not



                            //initializing the array into an empty array

                        }



                        foreach ($_SESSION['shopping_cart'] as $key => $val) {
                            $sql = "SELECT * FROM food_menu WHERE id='$key'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();

                            $subtotal = $row['food_price'] * $val;

                            @$fullprice += $row['food_price'] * $val;

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

                echo "<td>{$row['food_name']}</td>";
                echo "<td>{$row['food_price']}</td>";
                                            //so we make the quantity input so that it can be changed
                echo " <td><form method=GET>
                <input value=$val name=quan>
                <input type=hidden value=$key name=id>
                <button><input type=submit value=Update></button>
                    

                </form></td>";


                                            echo "<td>$subtotal</td>";
                                            echo " <td><form method=GET>
                    
                        <input type=hidden value=$key name=id>
                        <button name=Remove_Item ><input type=submit value=Remove></button>
                        <input type=hidden value=$row[food_name] name=food_name>
                        </form></td>";

                                            echo "</tr>";
                        }


                        if (empty($_SESSION['shopping_cart'])) {
                            echo " <tr>
    <th colspan=4>Your cart is empty</th>
   </tr>";
                        } else {
                            echo " <tr>
        <td><button><a href=../menu.php>More Smoothies?🤩</a></button></td>
    <th colspan=2>Grand total</th>
    ";
                            echo "<td>$fullprice</td></tr>";
                        }
                        echo "</table><br/>";
                        echo "<a href=shopping-cart.php?clear=1>Clear the Cart</a>";
                        ?>


                        <button id=button1><a>Proceed to checkout</a></button>

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

