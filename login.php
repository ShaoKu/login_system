<?php
//呼叫資料庫，統一編碼
mysql_query("SET NAMES UTF8");

//選擇資料庫
mysql_connect("localhost", "root", ""); #server, username, pswd
mysql_select_db("account_test"); #db name

$result=mysql_query("SELECT * FROM account");



?>

<!DOCTYPE html>
<html>
<head>
 <title>Account Test</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<br><br><br><br>

</body>
</html>