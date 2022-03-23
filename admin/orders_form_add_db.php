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
	$order_name = mysqli_real_escape_string($con,$_POST["order_name "]);
	$order_email = mysqli_real_escape_string($con,$_POST["order_email "]);
	$order_address = mysqli_real_escape_string($con,$_POST["order_address"]);
	$order_phone = mysqli_real_escape_string($con,$_POST["order_phone"]);
	$order_city = mysqli_real_escape_string($con,$_POST["order_city"]);
	$order_state = mysqli_real_escape_string($con,$_POST["order_state"]);
	$order_zipcode = mysqli_real_escape_string($con,$_POST["order_zipcode"]);
	$created_at = mysqli_real_escape_string($con,$_POST["created_at"]);
	$order_status = mysqli_real_escape_string($con,$_POST["order_status"]);
	$updated_at = mysqli_real_escape_string($con,$_POST["updated_at"]);
	

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
	$upload=$_FILES['m_img']['name'];
	if($upload !='') { 
		$path="../m_img/";
		$type = strrchr($_FILES['m_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../m_img/".$newname;
		move_uploaded_file($_FILES['m_img']['tmp_name'],$path_copy);  
	}

	// $check = "
	// SELECT m_user
	// FROM tbl_member
	// WHERE m_user = '$m_user'
	// ";
    // $result1 = mysqli_query($con, $check) or die(mysqli_error());
    // $num=mysqli_num_rows($result1);

    // if($num > 0)
    // {
	//       	  echo '<script>';
	// 	      echo "window.location='member.php?act=add&do=d';";
	// 	      echo '</script>';
    // }else{
	
	mysqli_query($con,"BEGIN");
	$sql = "INSERT INTO orders
	(
	
    order_name,
	order_email,
	order_address,
	order_phone,
	order_city,
	order_state,
	order_zipcode,
	created_at,
	
	
	-- order_status,
	updated_at,
	
	)
	VALUES
	(
	'$order_name',
	'$order_email',
	'$order_address',
	'$order_phone',
	'$order_city',
	'$order_state',
	'$order_zipcode',
	'$created_at',
	1
	'$updated_at',

	)";

	$query = mysqli_query($con, $sql) or die ("Error in query: $sql " . $mysqli_error($sql));

	if($query){
		mysqli_query($con,"COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว";
		foreach($_SESSION['cart'] as $id)
		{
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($con,"ROLLBACK");
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ";
	}
	
	mysqli_close($con);

	if($result){
	echo '<script>';
    echo "window.location='oders.php?do=success';";
    echo '</script>';
	}else{
	echo '<script>';
    echo "window.location='oders.php?act=add&do=f';";
    echo '</script>';
}
