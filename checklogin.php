<?php
include 'config.php';

$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM users WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);
if($count==1){

setcookie('username', $row['username'], time() + 604800);
setcookie('pass', $row['password'], time() + 604800);
header("location:login_success.php");
}

else {
echo "Wrong Username or Password, try again!";
}
?>