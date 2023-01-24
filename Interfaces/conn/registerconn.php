<?php

include_once 'db_connection.php';
$conn=connect();

$user=@$_POST['user'];
$phone_no=@$_POST['phone_number'];
$location=@$_POST['location'];
$pass1= @$_POST['pass1'];
$pass2=@$_POST['password2'];
$type=@$_POST['usertype'];



$sql = "INSERT INTO user_data (user_name, phone_no, user_location, user_newpass, user_retype_pass,usertype)
VALUES ('$user', '$phone_no','$location','$pass1','$pass2','$type');";

if ($conn->query($sql) === TRUE) {
  echo "<script>New record created successfully</script>";
//include "menu.php";
  
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql_select="SELECT * FROM user_data";

$results=$conn->query($sql_select);

//$rows=$results->fetch_assoc();//this just fetches one

if($results-> num_rows>0)
{
  while($rows=$results->fetch_assoc())//while holding each of this values....what do you want to do?
  {
    header("location: ../login.php");
    break;
    
  }
//echo "</table>";
} else { 
  echo "0 results"; 


}

$conn->close();
  




?>
