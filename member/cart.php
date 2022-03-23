<!-- 
 **** AppzStory Shopping Cart System PHP MySQL ****
 * 
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 -->
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping cart system.</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="icon.ico"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../../shop/member/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
</head>
<body>
<?php
    require_once '../member/connect.php';
    /** เช็คว่ามีข้อมูลสินค้าในตะกร้า session หรือไม่ */
    if(isset($_SESSION['cart_item'])){

        /** เช็คว่ามีการกดปุ่มคำนวณใหม่มาหรือไม่ */
        if(isset($_POST['newAmount'])){
            /** คำนวณยอดจำนวนสินค้า */
            foreach($_SESSION['cart_item'] as $key => $value) {
                $_SESSION['cart_item'][$key]['p_amount'] = $_POST['p_amount'][$value['p_id']];
            }
        }

        /** เช็คว่ามีการกดปุ่มลบมาหรือไม่ */
        if(isset($_GET['delete'])){
            /** ลบข้อมูลสินค้าออกจาก array */
            unset($_SESSION['cart_item'][$_GET['delete']]);
            echo "<script>
                    Swal.fire({
                        text: 'This item has been removed from the list.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    window.history.replaceState(null, null, window.location.pathname)
                </script>";
        }

        /** คำนวณยอดเต็มทั้งหมด */
        $total = array_sum(array_map(function($value){
            return $value['p_price'] * $value['p_amount'];
        }, $_SESSION['cart_item']));
        
    } else {
        header("location: ./");
    }
?>
     <div class="flex-container">
        <div class="container py-3">
            <h3 class="mb-4">Shopping cart system.</h3>
            <nav class="navbar navbar-light bg-white border-0 shadow-sm rounded-3 mb-4">
                <div class="container-fluid">
                    <a href="./" aria-current="page" class="navbar-brand">
                        <span class="brand-center">
                            <img src="https://appzstory.dev/_nuxt/img/logo.37c9600.png" width="50px" class="me-2"> 
                            <span class="d-none d-md-block"> Thai Traditional Cloth <br> Shopping cart system. </span>
                        </span>
                    </a>
                    <span class="text-end position-relative">
                        <div class="btn-group">
                            <a href="./" class="btn btn-outline-secondary">Add product list</a> 
                        </div>
                    </span>
                </div>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body">
                            <?php if(!empty($_SESSION['cart_item'])): ?>
                            <form action="" method="POST">
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Picture</th>
                                                <th>products</th>
                                                <th>Price per piece</th>
                                                <th>Amount</th>
                                                <th>Total price</th>
                                                <th>Modify</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $number = 0;
                                                foreach ($_SESSION['cart_item'] as $key => $value):
                                                    $number++;
                                            ?>
                                            <tr class="products">
                                                <td><?php echo $number;?></td>
                                                <td><img src="<?php echo $value['p_img'] ?>" class="img-fluid" width="150px" alt="AppzStory"></td>
                                                <td><?php echo $value['p_name'] ?></td>
                                                <td>USD<?php echo number_format($value['p_price'], 2) ?></td>
                                                <td>
                                                    <input type="number" name="p_amount[<?php echo $value['p_id'] ?>]" min="1" max="99" value="<?php echo $value['p_amount'] ?>">
                                                </td>
                                                <td>USD<?php echo number_format($value['p_price'] * $value['p_amount'], 2) ?></td>
                                                <td><a href="cart.php?delete=<?php echo $key ?>">Delete</a>  </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="5" class="text-end py-3">Total price:</td>
                                                <td class="text-danger fw-bold py-3">USD<?php echo number_format($total, 2); ?></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="btn-group float-end">
                                    <input type="submit" class="btn btn-secondary" name="newAmount" value="Calculate the goods">
                                    <a href="../../shop/checkout.php" class="btn btn-warning">Place an order</a>
                                </div>
                            </form>
                            <?php else: ?>
                                <div class="text-center p-3">
                                    <p class="h4">There are no items in the cart.</p>
                                    <a href="../shop/index.php">Goods overview page.</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            <p class="author fw-bolder text-secondary text-center">
            Thank you for purchasing our products. <span class="text-pink fs-3" style="vertical-align: sub;">♥️</span>
            
            </p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
	<script src="plugins/google-map/gmap.js"></script>
	<script src="js/script.js"></script>

    <script src="../../shop/member/plugins/tether/js/tether.min.js"></script>
	<script src="../../shop/member/plugins/raty/jquery.raty-fa.js"></script>
	<script src="../../shop/member/plugins/slick-carousel/slick/slick.min.js"></script>
	<script src="../../shop/member/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="../../shop/member/plugins/fancybox/jquery.fancybox.pack.js"></script>
	<script src="../../mycartshop/member/plugins/smoothscroll/SmoothScroll.min.js"></script>

    <script src="../../shop/member/plugins/jQuery/jquery.min.js"></script>
	<script src="../../BOS_templateshop/member/plugins/bootstrap/js/popper.min.js"></script>
	<script src="../../shop/member/plugins/bootstrap/js/bootstrap-slider.js"></script>
</body>
</html>