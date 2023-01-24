<?php
session_start();
require_once 'db_connection.php';
$conn=connect();

$first= $_POST['user'];
$pass = $_POST['pass'];
$type=$_POST['usertype'];

if($type=="user")
{


            if(isset($_POST["Login"]))//if they have clicked on the button named login
            {

                    if(empty($first)||empty($pass)||empty($type))//check whether the username or password is empty like no data has been entered in the interface
                        {
                        header("location: ../login.php?error=EmptyInput");//gets redirected back to the login page till they enter the data
                        exit();
                        }
                 else{

                $sql= "Select * from user_data where user_name= '".$first."'and user_retype_pass='".$pass."'and usertype='".$type."'";
                
                $result= $conn->query($sql);
                if($row=$result->fetch_assoc())
                {
                    $_SESSION['User']=$_POST['user'];
                    $_SESSION['pass']=$_POST['pass'];



                    header("location: ../menu.php");

                }
                else
                {
                    header("location:../login.php?error=IncorrectCredentials");

                }
            }
        }
    }
    else if($type=="chef")
    {

        if(isset($_POST["Login"]))//if they have clicked on the button named login
        {

                if(empty($first)||empty($pass)||empty($type))//check whether the username or password is empty like no data has been entered in the interface
                    {
                    header("location: ../login.php?error=EmptyInput");//gets redirected back to the login page till they enter the data
                    exit();
                    }

             else{

            $sql= "Select * from user_data where user_name= '".$first."'and user_retype_pass='".$pass."'and usertype='".$type."'";
            
            $result= $conn->query($sql);
            if($row=$result->fetch_assoc())
            {
                $_SESSION['User']=$_POST['user'];


                header("location: ../view_food.php");

            }
            else
            {
                header("location:../login.php?error=IncorrectCredentials");

            }
        }
    }
}
    else if($type=="admin")
    {
        if(isset($_POST["Login"]))//if they have clicked on the button named login
        {

                if(empty($first)||empty($pass)||empty($type))//check whether the username or password is empty like no data has been entered in the interface
                    {
                    header("location:../login.php?error=EmptyInput");//gets redirected back to the login page till they enter the data
                    exit();
                    }

             else{

            $sql= "Select * from user_data where user_name= '".$first."'and user_retype_pass='".$pass."'and usertype='".$type."'";
            
            $result= $conn->query($sql);
            if($row=$result->fetch_assoc())
            {
                $_SESSION['User']=$_POST['user'];
                $_SESSION['pass']=$_POST['pass'];

                header("location:../admin_page.php");

            }
            else
            {
                header("location:../login.php?error=IncorrectCredentials");

            }
        }
    

    }
}
    





?>