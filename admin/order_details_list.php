<?php 
session_start();
 if(@$_GET['do']=='success'){
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=order_details_list.php" />';

  }else if(@$_GET['do']=='finish'){
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=order_details_list.php" />';
  }

$query = "SELECT orders.id,p_img,p_name,order_detail_amount,price,orders.order_name,order_address,order_state,order_city,order_zipcode,order_details.updated_at,order_status
FROM orders
INNER JOIN order_details
ON orders.id = order_details.order_id
INNER JOIN products
ON order_details.product_id = products.p_id

ORDER BY order_details.created_at DESC" ;
$result = mysqli_query($con, $query);
echo '<table order_detail_id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class=''>
      <th width='5%'>OrderId</th>
      <th width='7%'>Product_img</th>
      <th width='15%'>Product_name</th>
      <th width='10%'>Amount</th>
      <th width='10%'>Price</th>
       <th width='10%'>Name</th>
      <th width='5%' >Address</th>  
      <th width='10%' >stste</th> 
      <th width='7%' >city</th> 
      <th width='7%'>zip</th>
      <th width='7%'>Date</th>
      <th width='7%'>Status</th>
      <th width='7%'>edit Status</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
   
    echo "<tr>";
    echo "<td>" .$row["id"] .  "</td> ";
    echo("<td> <img src ='../p_img/". $row['p_img'] ."' width=100 ></td>");
    echo "<td> " .$row["p_name"] ."</td> ";
    echo "<td >" .$row["order_detail_amount"] ."</td> ";
    echo "<td>  " .$row["price"] ."</td> ";
    echo "<td > " .$row["order_name"] .  "</td> ";
    echo "<td >" .$row["order_address"] ."</td> ";
    echo "<td >" . $row["order_state"] . "</td> ";
    echo "<td >" . $row["order_city"] . "</td> ";
    echo "<td >" . $row["order_zipcode"] . "</td> ";
    echo "<td >" . $row["updated_at"] . "</td> ";
    echo "<td >" . $row["order_status"] . "</td> ";
    echo "<td ><a href='product1.php?act=edit&ID=$row[id]' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-edit'></span></a> </td> ";
  } 
echo "</table>";
mysqli_close($con);
?>
