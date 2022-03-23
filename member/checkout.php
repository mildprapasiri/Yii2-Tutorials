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
     require_once '../connect.php';
    /** เช็คว่ามีข้อมูลสินค้าในตะกร้า session หรือไม่ */
    if(isset($_SESSION['cart_item'])){

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
                    <a href="../cart.php" aria-current="page" class="navbar-brand">
                        <span class="brand-center">
                            <img src="https://appzstory.dev/_nuxt/img/logo.37c9600.png" width="50px" class="me-2"> 
                            <span class="d-none d-md-block"> Thai Traditional Cloth <br>Shopping cart system.</span>
                        </span>
                    </a>
                    <span class="text-end position-relative">
                        <div class="btn-group">
                            <a href="./cart.php" class="btn btn-outline-secondary">edit shopping cart</a> 
                        </div>
                    </span>
                </div>
            </nav>
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body">
                        <form action="../createorder.php" method="POST">
                                <h5 class="card-title">Please complete the information.</h5>
                                <div class="row px-3 px-md-5 py-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="order_name" class="form-label">First and last name</label>
                                        <input type="text" class="form-control" id="order_name" name="order_name" placeholder="ชื่อ - นามสกุล" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="order_email" class="form-label">Email (example@domain.com)</label>
                                        <input type="email" class="form-control" id="order_email" name="order_email" placeholder="example@domain.com" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="order_phone" class="form-label">Telephone number (0823456789)</label>
                                        <input type="tel" class="form-control" id="order_phone" name="order_phone" placeholder="0823456789" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="order_address" class="form-label">Address</label>
                                        <textarea class="form-control" id="order_address" name="order_address" rows="3" required></textarea>
                                    </div>
                                </div>
                                <hr>
                                <h5 class="card-title">Order summary</h5>
                                <?php if(!empty($_SESSION['cart_item'])): ?>
                                    <div class="table-responsive">
                                        <table class="table align-middle">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Picture</th>
                                                    <th>Products name</th>
                                                    <th>Price per piece</th>
                                                    <th>Amount</th>
                                                    <th>Total price</th>
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
                                                    <td>$<?php echo number_format($value['p_price'], 2) ?></td>
                                                    <td><?php echo $value['p_amount'] ?></td>
                                                    <td>$<?php echo number_format($value['p_price'] * $value['p_amount'], 2) ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <tr class="pt-3">
                                                    <td colspan="5" class="text-end py-3">Total order:</td>
                                                    <td class="text-danger fw-bold py-3">$<?php echo number_format($total, 2); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btn-group float-end">
                                        <input type="submit" name="submit" class="btn btn-danger px-5" value="Order record">
                                        <a href="../login.php" class="btn btn-warning">Place an order</a>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center p-3">
                                        <p class="h4">ไม่มีสินค้าในตะกร้า</p>
                                        <a href="./">หน้ารวมสินค้า</a>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <p class="author fw-bolder text-secondary text-center">
            Thank you for purchasing our products. <span class="text-pink fs-3" style="vertical-align: sub;">♥️</span>
            
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>