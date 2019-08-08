
<?php
$a = "192.168.2.200";
$u = "takoffli_obs4";
$p = "ncku102openbird";
$d = "takoffli_openbird_q";
$con = mysqli_connect($a,$u,$p,$d);
if(!$con){
	die("Couldn't connect : " . mysqli_error($con));
}


$stmt = $con->prepare("SELECT times FROM functionRec WHERE functionID = ?");
$stmt->bind_param("s" , $_POST["q"]);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
mysqli_close($con);

//$data = $_POST["q"];
$data = $result;
header('Content-Type: application/json');
echo json_encode($data);
?>