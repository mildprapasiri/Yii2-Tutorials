<?php 
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=orders.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=orders.php" />';
  }

$query = "
SELECT * FROM orders 
ORDER BY id ASC" or die("Error:" . $mysqli_error());
$result = mysqli_query($con, $query);
echo '<table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='5%'>ID</th>
      <th width='10%' class='hidden-xs'>Username</th>
      <th width='10%' class='hidden-xs'>Email</th>
      <th width='20%'>Address</th>
      <th width='10%'>Phone</th>
      <th width='8%'>City</th>
      <th width='5%'>States</th>
      <th width='5%'>Zip</th>
      <th width='10%' class='hidden-xs'>Day</th>  
      <th width='10%'>Status</th>
      <th width='7%'></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
    $st = $row["order_status"];
    echo "<tr>";
    echo "<td  class='hidden-xs'>" .$row["id"] .  "</td> ";
    echo "<td> " .$row["order_name"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["order_email"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["order_address"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["order_phone"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["order_city"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["order_state"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["order_zipcode"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["created_at"] ."</td> ";
    echo "<td class='hidden-xs'>" .$row["order_status"]."</td> ";
    echo "<td class='hidden-xs' align='center'>";
    $status = 2; 
 
// if($status==1){
// 	echo "<font color='red'> รอชำระเงิน </font>";
// }
// elseif ($status==2) {
//  echo "<font color='green'> รอตรวจสอบการชำระเงิน </font>";
// }
// elseif ($status==3) {
//  echo "<font color='blue'> ชำระเงินถูกต้อง </font>";
// }
// else{
// 	 echo "<font color='orange'> ตรวจสอบการจัดส่งสินค้า </font>";
// 	 echo "<h1> รหัส EMS xxxx    </h1>";
// }
    
    
   
  } 
echo "</table>";
mysqli_close($con);
