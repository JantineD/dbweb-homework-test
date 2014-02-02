<?
session_start();
include('config.php');
if(!isset($_REQUEST['submit'])){
?>
<form method=post action=""<? $_SERVER['PHP_SELF'] ?>"">
  <table>
    <tr>
      <td><input type="text" name="username" maxlength="15"></td>
    </tr>
    <tr>
      <td><input type="password" name="password"></td>
    </tr>
    <tr>
      <td><input type="submit" value=submit name="submit"></td>
      <td><input type="reset"></td>
    </tr>
  </table>
</form>
<?php
}else{
   $username = $_POST['username'];
   $password = $_POST['password'];
         $query1 = "INSERT INTO users(username, password) VALUES ('$username','$password')";
         if(mysql_query($query1)){
             echo "You're awesome!.<br>No you should <a href=index.php>Login</a>";
		 }
}              
?>
