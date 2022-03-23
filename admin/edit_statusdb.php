<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();
if($_SESSION['m_level']!='admin'){
	Header("Location: index.php");
}
	$p_id = mysqli_real_escape_string($con,$_POST["p_name"]);
	$status_name = mysqli_real_escape_string($con,$_POST["status_name"]);
	
	
	$sql = "UPDATE orders SET 
	order_status = '$status_name'
	WHERE id=$p_id ";

	$result = mysqli_query($con, $sql);
	mysqli_close($con);
	
	if($result){
	echo '<script>';
    echo "window.location='product.php?do=finish';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='product.php?act=add&do=f';";
    echo '</script>';
}
?>