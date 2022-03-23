<?php
$queryorder = "SELECT * FROM orders WHERE id = $id ";
$rsorder = mysqli_query($condb, $gueryorder);
//echo $queryorder; 



?>

<h3>ประวัติการสั่งซื้อ</h3>
<table id='example' class="display table table-bordered table-hover table-striped">
    <thead>
        <tr class="danger">
            <th width="5%">#</th>
            <th width="10%">status</th>
            <th width="15%">dater</th>
            <th width="10%"><center>total</center></th>
            <th width="5%">slip</th>
            <th width="510%">ems</th>
            <th width="5%">view</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($rsorder as $row){ ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td>
            <?php 
                $st = $row['order_status'];
                    if($st==1){
                        echo "<font color='#1100ff'>";
                        echo 'รอชำระเงิน';
                        echo "</font>";
                    }elseif($st==2){
                        echo "<font color='orange'>";
                        echo 'ชำระเงินแล้ว';
                        echo "</font>";
                    }elseif($st==3){
                        echo "<font color='green'>";
                        echo 'ตรวจสอบเลข EMS';
                        echo "</font>";
                    }else{
                        echo "<font color='red'>";
                        echo 'ยกเลิก';
                        echo "</font>";
                    }
            ?>
                
               </td>
                <td><?php echo $row['o_dttm'];?></td>
                <td align="right"><?php echo number_format($row['o_total'],2);?></td>
                <td>slip</td>
                <td><?php echo $row['0_ems'];?></td>

                <?php
                    $id = $row['id'];
                    if($st==1){
                        echo "<a href='../payment.php?id=$id' class='btn btn-primary btn-zs'> ชำระเงิน </a>";
                    }elseif ($st==2){
                        echo "<a href='#' class='btn btn-info btn-xs'> เปิดดู </a>";
                    }elseif($st==3){
                        echo "<a href='#' class='btn btn-success btn-xs'> ดูเลขEMS </a>";
                    }else{
                        echo "<a href='#' class='btn btn-info btn-xs'> เปิดดู </a>";
                    }
                ?>
            </td>
        </tr> 
      <?php } ?>

    </tbody>
</table>