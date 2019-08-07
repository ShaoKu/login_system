<?php
$conn = mysqli_connect("localhost", "root", ""); 
mysqli_select_db($conn, "account_test");
mysqli_query($conn, "SET NAMES UTF8");
error_reporting(0);
$sql="INSERT INTO account(name, email, password, nick) VALUES('$_GET[name]','$_GET[email]','$_GET[password]','$_GET[nick]')";
mysqli_query($conn,$sql)
?>	
<!DOCTYPE html>
<html>
<head>
 <title>Account Register</title> 
</head>
<body>

 <h2 >Account Register</h2>
 
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
 <div>
 <label for="input-email">Email</label>
 <input type="email" name="email">
 </div>
 <div>
 <label for="input-name">Name</label>
 <input type="text"  name="name">
 </div>
 <div>
 <label for="input-nick">Nickname</label>
 <input type="text"   name="nick">
 </div>
 <div >
 <label for="input-password">Password</label>
 <input type="password" name="password">
 </div>

 </br>
 <input type="submit"  value="註冊" name="submit">
 </form>
 </body>
 </html>