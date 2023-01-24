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
            <link rel="stylesheet" href="Css_Styling/newpagestyle.css">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&family=Klee+One&display=swap" rel="stylesheet">
        </head>

        <body>
            <div class="border">
                <div class="header">
                    <h1>Order Your Smoothy🍹</h1>
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
                                background-image: url("Css_Styling/Images/ordernow.jpeg");
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

                            <h2>Order Time!</h2>
                            <h3>It is Smoothie time</h3>
                            <h4>Order Now</h4>
                        </div>
                    

                    <div class="details">

                        <form method="POST" action="conn/ordercust.php">
                            <label name="Username">Username</label>
                            <input placeholder="Name" type="text" name="user">
                            <label name="location">Location</label>
                            <input placeholder="location" type="text" name="location">
                            <label name="smoothie">Smoothie</label>
                            <input placeholder="Smoothie flavour" type="text" name="smoothie">
                            <label name="quantity">Quantity</label>
                            <input placeholder="quantity" type="text" name="quantity">
                            <button type="submit" id="button1" name="Order">Order</button>

                        </form>

                    </div>

                    <a href="menu.php"> <button type="reset" id="button2">Back</button></a>

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