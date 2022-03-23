 <aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../m_img/<?php echo $m_img; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>คุณ <?php echo $m_name; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
        <li>
        <a href="index.php"><i class="fa fa-home"></i>
          <span> หน้าหลัก</span>
        </a>
      </li>
      
           <li class="active">
        <a href=""><i class="fa fa-cogs"></i> <span>จัดการข้อมูลระบบ</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-down pull-right"></i>
        </span>
      </a>
    </li>
    
      <li>
        <a href="member.php"><i class="glyphicon glyphicon-record"></i>
          <span> จัดการสมาชิก</span>
        </a>
      </li>
      
      <li>
        <a href="product.php"><i class="glyphicon glyphicon-record"></i>
          <span> จัดการสินค้า </span>
        </a>
      </li>
        <li>
        <a href="member_profile.php"><i class="glyphicon glyphicon-record"></i>
          <span> แก้ไขข้อมูลส่วนตัว </span>
        </a>
      </li>
           <li class="active">
        <a href=""><i class="fa fa-cogs"></i> <span>จัดการข้อมูลรายงาน</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-down pull-right"></i>
        </span>
      </a>
      <li>
      <a href="oders.php"><i class="glyphicon glyphicon-record"></i>
          <span> ข้อมูลลูกค้า </span>
        </a>
        <a href="order_details.php"><i class="glyphicon glyphicon-record"></i>
          <span> รายงานการสั่งซื้อสินค้า </span>
        </a>

      
      <li>
        <a href="../../shop/index.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');"><i class="glyphicon glyphicon-off"></i>
          <span> ออกจากระบบ</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>