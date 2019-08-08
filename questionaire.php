<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>選址達人</title>
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
	<style type="text/css">
		body{
			width:100%;
			font-family: Microsoft JhengHei;
		}
	</style>
</head>
<body>

<?php
$a = "192.168.2.200";
$u = "takoffli_obs4";
$p = "ncku102openbird";
$d = "takoffli_openbird_q";
$con = mysqli_connect($a,$u,$p,$d);
if(!$con){
	die("Couldn't connect : " . mysqli_error($con));
}

$stmt = $con->prepare("INSERT INTO answers( email , answer ) VALUES( ? , ? )");
$stmt->bind_param("ss" , $email, $answers);
$answers = implode( "," , $_POST["answers"] );
$email = $_POST["email"];
$opinion = $_POST["opinion"];
$stmt->execute();
$stmt->close();
mysqli_close($con);
?>

<?php

echo "感謝你的支持，我們將會盡速照需求開發產品，敬請期待!"

?>




</body>

</html>