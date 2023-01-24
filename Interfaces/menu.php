<?php session_start();
?>

<!-- so now use this to display details from the database -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bubble's Menu and Pricing Page</title>




    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Bubble's Menu and Pricing Page</title>
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
            <h1>Menu😻</h1>
            <?php echo $bad; ?>
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
            <style>
                .user a {
                    text-decoration: none;
                    color: black;

                }
            </style>
            <a href="profile.php">
                <?php echo $_SESSION['User']; ?>
            </a>
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
            <a href="shopping-cart/shopping-cart.php"> View Cart</a>
            <a href="Smoothie Sale.php">Home</a>

        </div>

        <div class="row">
            <div class="column image">
                <style>
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

                    <h2>Bubbles Smoothies</h2>
                    <h4>Smoothie Menu and Pricing</h4>
                  
                </div>

                <div class="details">

                   
                    <table border="1px">
                        <tr>
                            <th>Smoothie</th>
                            <th></th>
                            <th>Price</th>
                            <th colspan="2" allign="centre"> Quantity</th>
                        </tr>


                        <?php

                     

                        if (!isset($_SESSION['shopping_cart'])) {
                            $_SESSION['shopping_cart'] = array();
                        } //to create the cart

                        //clearing the cart
                        if(isset($_GET['clear']))
                        {
                            $_SESSION['shopping_cart'] = array();
                            //initializing the array into an empty array
                        }

                        //buying the goods
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                        
                          $quan= @$_GET['quan'];
                     
                        } //isset



                        //so for the first is validating the input if it is bad input
                        //PHP INPUTS USIALLY IN STRINGS
                        if (@$quan > 0 && filter_var($quan, FILTER_VALIDATE_INT)) {
                            //buy now 
                            if (isset($_SESSION['shopping_cart'][$id])) //we are looking for the variables in the cart through this
                            {
                                $_SESSION['shopping_cart'][$id]=$quan;
                            }
                            else
                            {
                                $_SESSION['shopping_cart'][$id]=$quan;
                            }
                        } else {
                            $out = "bad output";
                        }

                        echo "<pre>";
                        print_r($_SESSION['shopping_cart']);
                        echo "</pre>";

                       echo "<a href=menu.php?clear=1>Clear the Cart</a>";

                        require_once('conn/db_connection.php');
                        $conn = connect();
                        $sql = "SELECT * from food_menu";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class=product>";
                            echo "<style>
                        th
                        {
                            height:40px;
                        }

                         td
                        {
                    text-align:centre;
                    height: 70px;
                    width:120px;
                        }
                        #image
                        {
                            width:140px;
                            
                        }
                        </style>";

                            echo "<tr>";
                            echo "<td>" . $row['food_name'] . "</td>";
                            echo "<td id=image><img style: border-radius: 50% src= img/" . $row['image_path'] . "></td>";
                            echo "<td>" . $row['food_price'] . "</td>";
                            echo "<td>
                     <form  method=GET>
                     <input type=text name=quan id=quan>
                     <input type='hidden' name='id' id='id' value='" . $row['id'] . "'>

                     <button type=submit>Add to Cart</button>
                    
                     </form>
                  
                        </td>";

                            // echo "<td><a href=shopping-cart/add_to_cart.php?id=".$row['id'].">Add to Cart</a></td>";

                            // echo "</tr>";

                            echo "</div>";
                            echo "";
                        }



                        ?>

                    </table>
                    <a href="customerorderpage.php"><button type="button" id="button1">Order Now</button></a>

                </div>

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

        </div>
    </div>


</body>


</html>