<?php 
session_start();
 $email = $_POST['email'];
 require '../shop/condb.php';

$query = "SELECT * FROM  order_details 
INNER JOIN orders
ON order_details.order_id = orders.id
WHERE order_email =  '$email'" ;
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
      
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
   
    echo "<tr>";
    echo "<td>" .$row["id"] .  "</td> ";
    echo("<td> <img src ='p_img/". $row['product_img'] ."' width=100 ></td>");
    echo "<td> " .$row["product_name"] ."</td> ";
    echo "<td >" .$row["order_detail_amount"] ."</td> ";
    echo "<td>  " .$row["order_detail_price"] ."</td> ";
    echo "<td > " .$row["order_name"] .  "</td> ";
    echo "<td >" .$row["order_address"] ."</td> ";
    echo "<td >" . $row["order_state"] . "</td> ";
    echo "<td >" . $row["order_city"] . "</td> ";
    echo "<td >" . $row["order_zipcode"] . "</td> ";
    echo "<td >" . $row["updated_at"] . "</td> ";
    echo "<td >" . $row["order_status"] . "</td> ";
    echo "<td ><a href='product1.php?act=edit&ID=$row[id]' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-edit'></span></a> </td> ";
  } 
echo "</table>"; ?>
<h3 align="center"><a href="index.php" title="">Back</a></h3>
<?
mysqli_close($con);
?>
