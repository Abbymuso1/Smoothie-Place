<?php
session_start();
require_once 'db_connection.php';
$conn=connect();

$user= $_POST['user'];
$food = $_POST['food'];
$back = $_POST['back'];


            if(isset($user))
            {
                header("location: ../notify.php");
            }
               
    else if(isset($food))//if they have clicked on the button named login
        {
                header("location: ../upload_image.php");

            }
            else if(isset($back))
            {
                header("location: ../login.php");

            }
        else{
            header("location: ../admin_page.php");

        }
    





?>