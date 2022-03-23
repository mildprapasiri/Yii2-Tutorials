<?php
session_start();
echo '<meta charset="utf-8">';
include('../shop/condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
if ($_SESSION['m_level'] != 'admin') {
	Header("Location: index.php");
}
$order_detail_id = mysqli_real_escape_string($con, $_POST["order_detail_id"]);
$product_img = mysqli_real_escape_string($con, $_POST["product_img"]);
$product_name = mysqli_real_escape_string($con, $_POST["product_name"]);
$order_detail_amount = mysqli_real_escape_string($con, $_POST["order_detail_amount"]);
$order_detail_price = mysqli_real_escape_string($con, $_POST["order_detail_price"]);
$product_id = mysqli_real_escape_string($con, $_POST["product_id"]);
$order_id = mysqli_real_escape_string($con, $_POST["order_id"]);
$created_at = mysqli_real_escape_string($con, $_POST["created_at"]);
$status = mysqli_real_escape_string($con, $_POST["status"]);
$update_at = mysqli_real_escape_string($con, $_POST["update_at"]);

$date1 = date("Ymd_His");

$numrand = (mt_rand());
$order_details = (isset($_POST['product_img']) ? $_POST['product_img'] : '');
$upload = $_FILES['product_img']['name'];
if ($upload != '') {
	$path = "../products/";
	$type = strrchr($_FILES['product_img']['name'], ".");
	$newname = $numrand . $date1 . $type;
	$path_copy = $path . $newname;
	$path_link = "../products/" . $newname;
	move_uploaded_file($_FILES['product_img']['tmp_name'], $path_copy);
}




// $check = "
// SELECT m_user
// FROM order_details
// WHERE m_user = '$m_user'
// ";
// $result1 = mysqli_query($con, $check) or die($mysqli_error());
// $num=mysqli_num_rows($result1);

// if($num > 0)
// {
//       	  echo '<script>';
// 	      echo "window.location='member.php?act=add&do=d';";
// 	      echo '</script>';
// }else{

$sql = "INSERT INTO order_details
	(
    order_detail_id,
	product_img,
	product_name,
	order_detail_amount,
	order_detail_price,
	product_id,
	order_id,
	created_at,
    update_at,
	)
	VALUES
	(
    '$order_detail_id',
	'$product_img',
	'$product_name',
	'$order_detail_amount',
	'$order_detail_price',
	'$newname'
	'$order_id',
	'$created_at',
	'$status',
    '$update_at',
	)";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . $mysqli_error());



mysqli_close($con);

if ($result) {
	echo '<script>';
	echo "window.location='order_details.php?do=success';";
	echo '</script>';
} else {
	echo '<script>';
	echo "window.location='order_details.php?act=add&do=f';";
	echo '</script>';
}
