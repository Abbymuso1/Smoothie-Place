<?php

session_start();
// $conn=connect();
$num_per_page=03;
$conn = mysqli_connect("localhost", "root","", 'bubbles_groovy_smoothies');
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
 $sql = "SELECT * from food_menu";
                    $result = $conn->query($sql);

                    if(isset($_GET["page"]))
                    {
                        $page=$_GET["page"];
                    }
                    else{
                    
                    
                        $page=1;
                       
                    }
                    $start_from=($page-1)*03;
                    

                    $sql = "SELECT * from food_menu limit $start_from,$num_per_page";




?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bubble's Groovy Smoothies Administrator View Food Page </title>
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
            <h1>View Food Page</h1>
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
        <?php echo $_SESSION['User'];?>
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

           <h2>Viewing Food Page</h2>
            <h3><a href="view_food.php"> Viewing Food</a></h3>
            <h4>Notification of food Added!</h4>
        </div>

        <div class="details">
            
        <form method="POST">
        <table border="1px" cellspacing="0.1">

        <tr><th>Food ID</th>
        <th>Food name</th>
        <th>Image Path</th>
        <th>Price</th>
           
            <th colspan="2" allign="centre"> Operation</th>
            </tr>
                     
                    <?php
                    // $conn=connect();
                    $conn = mysqli_connect("localhost", "root","", 'bubbles_groovy_smoothies');
                    if ($conn->connect_error) {
                        die("Connection failed:" . $conn->connect_error);
                    }
                  

                    $num_per_page=03;
                    $sql = "SELECT * from food_menu";
                    $result = $conn->query($sql);
                    $rows_count_value = mysqli_num_rows($result);
                    $total_pages=($rows_count_value/$num_per_page);
                    
                    if ($result->num_rows > 0) {
                        
                        while ($row = $result->fetch_assoc()) {//Fetch data
                          
                            echo 
                            "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["food_name"] . "</td>
                            <td>" . $row["image_path"] . "</td>
                            <td>" . $row["food_price"] . "</td>


                         <td><a href='edit_food.php?
                         custid=$row[id]
                      &rn=$row[food_name]
                     &pn=$row[image_path]
                       &cl=$row[food_price]'>Edit/update</a></td>

                         
                         <td><a href='conn/delete_food.php?ad1=$row[id]'>Delete food</a></td>
                       </tr>";
                     
                            
                            
                    }
                   

                    } else {

                 echo "<h1>No entry of food yet</h1>";

                    }
                  
                
                    ?> 
                </table>
                <?php



                    $sql = "SELECT * from food_menu";
                    $result = $conn->query($sql);
                    $rows_count_value = mysqli_num_rows($result);

                    $total_pages=($rows_count_value/$num_per_page);


                    echo "<br>";
                    
                        for ($i=1;$i<$total_pages+1;$i++)
                        {
                            echo "<button><a href='notify.php?page=".$i."'>".$i."</a></button>";
                            echo " ";
                        }
                        ?>

</form>


            
        </div>

                <a href="receiveorder.php"> <button type="reset" id="button2">Back</button></a>

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
