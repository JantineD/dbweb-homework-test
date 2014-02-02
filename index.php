<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Test</title>
</head>
<body>
<form name="login" method="post" action="checklogin.php">
  <center>
    <p>Login</p>
  </center>
  <table border="0" cellspacing="0" cellpadding="3" align="center">
    <tr>
      <td>Username: </td>
      <td><label for="username"></label>
        <input type="text" name="myusername" id="myusername" /></td>
    </tr>
    <tr>
      <td>Password: </td>
      <td><input type="password" name="mypassword" id="mypassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="Submit" id="submit" value="Login" /></td>
    </tr>
  </table>
</form>
<center>
  <p>Or <a href="register.php">register</a></p>
</center>
</body>
</html>
