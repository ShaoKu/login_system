<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>選址達人</title>
	<meta name="viewport" content="initial-scale=1.0, width=device-width" />
	<style type="text/css">
		body{
			width:100%;
			margin:0;
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

$stmt = $con->prepare("SELECT * FROM answers ");
$stmt->execute();
$result = $stmt->get_result();
?>

<?php
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

if( mysqli_num_rows($result) > 0 ){
	echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	//echo "<th>id</th>";
	echo "<th>email</th>";
	echo "<th>answers</th>";
	echo "</tr>";
	while( $row = mysqli_fetch_array($result) ){
		echo "<tr>";
		//echo "<td>".$row["id"]."</td>";
		echo "<td>".$row["email"]."</td>";
		echo "<td>".$row["answer"]."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
}
else{
	echo " no data found in databse.";
}
$stmt->close();
mysqli_close($con);
?>




</body>

</html>