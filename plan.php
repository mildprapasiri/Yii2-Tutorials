<?php
 
$status = 1; 
 
if($status==1){
	echo "<font color='red'> รอชำระเงิน </font>";
}
elseif ($status==2) {
 echo "<font color='green'> รอตรวจสอบการชำระเงิน </font>";
}
elseif ($status==3) {
 echo "<font color='blue'> ชำระเงินถูกต้อง </font>";
}
else{
	 echo "<font color='orange'> ตรวจสอบการจัดส่งสินค้า </font>";
	 echo "<h1> รหัส EMS xxxx    </h1>";
}
?>