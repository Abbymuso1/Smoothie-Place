<?php


function connect()
{

//create functions to do the various functions on the db......inserting,selecting,deleting 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bubbles_groovy_smoothies";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
        
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
 return $conn;
}
}


function getUsersdata($id)
{
  $rows=array();
  $conn=connect();
  $q="SELECT * from user_data where id=$id ";
  $result=mysqli_query($conn,$q);
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
$rows['user_name']=$row['user_name'];
$rows['phone_no']=$row['phone_no'];
$rows['user_location']=$row['user_location'];
$rows['user_newpass']=$row['user_newpass'];
$rows['user_retype_pass']=$row['user_retype_pass'];
$rows['usertype']=$row['usertype'];
  }
  
  return $rows;


}


function getid($username)
{
  $rows[]=array();
  $conn=connect();
  $q="SELECT 'id 'from user_data where user_name=$username";
  $result=mysqli_query($conn,$q);
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
return $row['id'];
  }

}

function getdata($sql)
{
  $link=connect();
  $result=mysqli_query($link,$sql);
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
$rows[]=$row;
  }
  return $rows;
}


function setdata($sql)

{
  $link=connect();
  if(mysqli_query($link,$sql))
  {
    return true;
  }
  else{
    return false;
  }
}




?>
  
