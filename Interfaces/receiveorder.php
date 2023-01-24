<?php

$num_per_page = 3;
$conn = mysqli_connect("localhost", "root", "", 'bubbles_groovy_smoothies');
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$sql = "SELECT cust_id,cust_uname,cust_retype_pass,usertype from new_customer";
$result = $conn->query($sql);

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {


    $page = 1;
}
$start_from = ($page - 1) * 03;


$sql = " SELECT cust_id,cust_uname,cust_retype_pass,usertype from new_customer limit $start_from,$num_per_page";

?>
<?php

session_start();

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bubbles Groovy Smoothies Receiving Order Page</title>
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
            <h1>List Of Orders</h1>
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
            <a href="../contact_interface/contact.php">Contact Us</a>
            <a href="login.php"> Smoothie menu</a>
            <a href="Smoothie Sale.php">Home</a>

        </div>

        <div class="row">
            <div class="column image">
                <style>
                    .column.image {
                        background-image: url("Css_Styling/Images/rec_o.jpeg");
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

                    <h2>Order LineUp</h2>
                    <h3>The Orders In line:</h3>
                    <h4>Order Page</h4>
                </div>

                <div class="details">

                    <form method="POST">
                        <table border="1px" cellspacing="0.1">

                            <tr>
                                <th>Order ID</th>
                                <th>Customer name</th>
                                <th>Customer Location</th>
                                <th>Smoothie</th>
                                <th colspan="2" allign="centre"> Operation</th>
                            </tr>

                            <?php



                            $conn = mysqli_connect("localhost", "root", "", 'bubbles_groovy_smoothies');
                            if ($conn->connect_error) {
                                die("Connection failed:" . $conn->connect_error);
                            }
                            $sql = "SELECT * from order_table ";
                            $result = $conn->query($sql);

                            $rows_count_value = mysqli_num_rows($result);
                            $total_pages = ($rows_count_value / $num_per_page);


                            if ($result->num_rows > 0) {
                                // echo "<tr><th>Customer ID</th><th>Customer name</th><th>Customer password</th><th>User Type</th><th colspan="2" align="centre" >Operation/th></tr>";
                                while ($row = $result->fetch_assoc()) { //Fetch data

                                    echo
                                    "<tr>
                            <td>" . $row["order_id"] . "</td>
                            <td>" . $row["cust_uname"] . "</td>
                            <td>" . $row["cust_location"] . "</td>
                            <td>" . $row["smoothie"] . "</td>

                         <td><a href='update_order.php?ad=$row[order_id]&rn=$row[cust_uname]&crt=$row[cust_location]&ut=$row[smoothie]'>Edit/update</a></td>

                         <td><a href='delete_ordert.php?ad1=$row[order_id]'>Delete</a></td>
                            </tr>";
                                }
                            } else {

                                echo "<h1>No one has logged in yet</h1>";
                            }

                            $conn->close();
                            ?>
                        </table>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", 'bubbles_groovy_smoothies');
                        if ($conn->connect_error) {
                            die("Connection failed:" . $conn->connect_error);
                        }


                        $sql = "SELECT * from order_table ";
                        $result = $conn->query($sql);
                        $rows_count_value = mysqli_num_rows($result);

                        $total_pages = ($rows_count_value / $num_per_page);


                        echo "<br>";

                        for ($i = 1; $i < $total_pages + 1; $i++) {
                            echo "<button><a href='receiveorder.php?page=" . $i . "'>" . $i . "</a></button>";
                            echo " ";
                        }
                        ?>


                    </form>



                </div>

                <a href="various login.php"> <button type="reset" id="button2">Back</button></a>

                <a class="homepage" href="Smoothie Sale.php">Home page</a>
            </div>



            <div class="footer">
                <table id="table">
                    <tr>
                        <th>Contact Us</th>
                        <th>Offers</th>
                    </tr>
                    <tr>
                        <td><a href="../contact_interface/contact.php">Email address</a></td>
                        <td><a href="Smoothie Sale.php">Buy two smoothies get one free!</a></td>



                    </tr>
                    <tr>
                        <td> <a href="../contact_interface/contact.php">Phone Number</a></td>
                        <td><a href="Smoothie Sale.php">A new flavour of smoothie comes with cookie</a></td>
                    </tr>
                    <tr>
                        <td><a href="../contact_interface/contact.php">Postal Address</a></td>
                        <td><a href="../order_interface/menu.php">Smoothie Sale coming soon</a></td>

                    </tr>

            </div>
        </div>


</body>


</html>