<?php 
$ID = mysqli_real_escape_string($con,$_GET['ID']);
$sql = "SELECT *
FROM orders
WHERE id =$ID" or die("Error:" . $mysqli_error());
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . $mysqli_error());
$row = mysqli_fetch_array($result);


$sql2 = "SELECT * FROM tbl_type 
ORDER BY type_id ASC" or die("Error:" . $mysqli_error());
$result_t = mysqli_query($con, $sql2) or die ("Error in query: $sql " . $mysqli_error());


?>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<form action="edit_statusdb.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      OrderID:
    </div>
    <div class="col-sm-3">
      <input type="text" name="p_name" readonly required class="form-control" value="<?php echo $row['id'];?>">
    </div>
  </div>

 
    


  <div class="form-group">
    <div class="col-sm-2 control-label">
      Name:
    </div>
    <div class="col-sm-3">
      <input type="text" name="asdasd" readonly required class="form-control" value="<?php echo $row['order_name'];?>">
    
    </div>
  </div>
   

  <div class="form-group">
    <div class="col-sm-2 control-label">
      Address:
    </div>
    <div class="col-sm-3">
      <div class="">
      <input type="text" width="400" name="dasdsadas" readonly required class="form-control" value="<?php echo $row['order_address'];?>">
      <input type="text" width="400" name="asdasdas" readonly required class="form-control" value="<?php echo $row['order_state'];?>">
      <input type="text" width="400" name="sadasdasd" readonly required class="form-control" value="<?php echo $row['order_city'];?>">
        <input type="text" name="dasdasdasddd" readonly required class="form-control" value="<?php echo $row['order_zipcode'];?>">
    </div>
   

    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      Status:
    </div>
    <div class="col-sm-3">
      <input type="text" name="status_name"  required class="form-control" value="<?php echo $row['order_status'];?>">
    
    </div>
  </div>

  

  
  
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
       <input type="hidden" name="p_img2" value="<?php echo $row['p_img'];?>">
      <input type="hidden" name="p_id" value="<?php echo $ID; ?>" />
      <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
      <a href="product.php" class="btn btn-danger">ยกเลิก</a>
    </div>
  </div>
</form>