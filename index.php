<?php
// session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thai Traditional Cloth</title>
    <!-- <link rel="shortcut icon" type="image/x-icon" href="icon.ico"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Muli" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="img/favicon.png" rel="shortcut icon">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
    <link href="../shop/member/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../shop/member/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="../shop/member/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
    <link href="../shop/member/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
    <link href="../shop/member/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="shop/style.css" rel="stylesheet">

</head>

<body>
    <?php
    require '../shop/connect.php';
    /** ดึงข้อมูลสินค้า */
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    /** เพิ่มข้อมูลสินค้าลงในตะกร้าแล้วหรือไม่ */
    if (isset($_GET['cart']) && ($_GET['cart'] == 'success')) {
        echo "<script>
                    Swal.fire({
                        text: 'You have added the product to your cart.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    window.history.replaceState(null, null, window.location.pathname)
                </script>";
    }
    ?>

    <body class="body-wrapper">

        <br><br>

        <div class='main-content'>
            <nav class="navbar navbar-expand-lg navbar-light static-top">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="../shop/index.php">Home</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="../shop/about/about.php">About Us</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="../shop/about/contact.php">Contact Us</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="../shop/login.php">Admin</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="../shop/history.php">Search</a>
                            </li>

                            <span class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="btn-group">
                                    <a class="nav-link" href="../shop/cart.php">
                                        Your shopping cart <i class="fa fa-shopping-cart "></i>
                                        <span class="position-absolute translate-middle badge rounded-pill bg-danger z-10">
                                            <?php echo isset($_SESSION['cart_item']) ? count($_SESSION['cart_item']) : 0; ?>
                                        </span>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-white dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <?php if (!empty($_SESSION['cart_item'])) : ?>
                                        <ul class="dropdown-menu dropdown-menu-end" style="font-size: 0.9rem;">
                                            <?php
                                            foreach ($_SESSION['cart_item'] as $value) :
                                            ?>
                                                <li class="dropdown-item" style="width: 270px">
                                                    <img src="<?php echo $value['product_img'] ?>" class="img-fluid" width="100%" alt="AppzStory">
                                                    <span><?php echo substr($value['p_name'], 0, 20) ?>... </span>
                                                    <span class="badge rounded-pill bg-danger">
                                                        <?php echo $value['p_amount'] ?>
                                                    </span>
                                                </li>
                                            <?php endforeach; ?>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item text-end" href="../shop/cart.php">ํYour shopping cart</a></li>

                                        </ul>

                                    <?php else : ?>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item">There are no items in the cart.</li>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                            </span>

                            <!-- <li class="nav-item active">
                            <a class="nav-link" href="../shop/login.php">Login</a>
                        </li> -->
                            <!-- <li class="nav-item active">
                            <a class="nav-link" href="../shop/index.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');">Logout </a>
                        </li> -->
                    </div>
            </nav>
            </ul>

        </div>
        </nav>
        </div>
        </div>
        </div>

        <section class="hero-area bg-light text-center overly">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-block">

                            <h2> With an outstanding style, only for you</h2>
                            <h2>Exclusively designed for you</h2>

                        </div>
                    </div>
                </div>
        </section>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-90" src="../shop/product_img/hh1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-90" src="../shop/product_img/hh2.jpg" alt="Second slide">
                </div>
            </div>
        </div>
        <section class="hero-area bg-light text-center overly">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-block">
                            <br><br>
                            <h2> Thai Traditional Cloth</h2>
                            <h6>Local Wisdom of Lanna Cloth is a weaving culture with unique lines, patterns and colors that
                                are unique to the locality and is the process of creating local fabrics that may be woven
                                with cotton.Silk is a tradition Thai community way of life.</h6>
                            <br><br><br>
                        </div>
                    </div>
                </div>
        </section>


        <div class="row">
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) :
            ?>
                <div class="col-md-6 mb-4">
                    <div class="shadow rounded p-3 bg-body h-100">
                        <div class="row">
                            <div class="col-lg-5 mb-3 mb-lg-0">
                                <div class="bg-light d-flex align-items-center justify-content-center h-100">
                                    <img src="p_img/<?php echo $row['p_img'] ?>" class="img-cover" alt="AppzStory">
                                </div>
                            </div>
                            <div class="col-lg-7 ps-lg-0">
                                <div class="card-body text-left text-lg-start p-0">
                                    <br><br>
                                    <h3 class="card-title "><?php echo $row['p_name'] ?></h3><br>
                                    <div class="card-text-left">
                                        <div class="variants mb-5">
                                            <p><?php echo $row['p_title'] ?></p>
                                        </div>
                                    </div>
                                    <div class="card-price d-flex align-items-center justify-content-between">
                                        <span class="fw-bold text-danger">USD&nbsp;&nbsp;<?php echo number_format($row['price'], 2) ?></span>
                                        <a href="../shop/updatecart.php?p_id=<?php echo $row['p_id'] ?>" class="btn btn-outline-primary" type="button">
                                            <i class="fas fa-cart-plus"></i> Add to Cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>


        </section><br><br>
        <footer class="footer section section-sm">

            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-1 col-md-6">
                        <div class="block">
                            <ul>
                                <li><a href="../shop/index.php">Home</a></li>
                                <li><a href="../shop/index.php">Order</a></li>


                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 offset-md-2 offset-lg-0">
                        <div class="block">
                            <ul>


                                <li><a href="https://www.instagram.com/chompu_tyr/">Instagram</a></li>
                                <li><a href="https://www.facebook.com/">Facebook</a></li>


                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 offset-md-3 offset-lg-1">
                        <div class="block">
                            <ul>
                                <li><a href="../shop/about/contact.php">Contact Us</a>
                                </li>
                                <li><a href="../shop/about/about.php">About us</a></li>





                            </ul>
                        </div>
                    </div>




                </div>
            </div>
            </div>


        </footer><br>
        <p class="author fw-bolder text-secondary text-center">
            <a href="../shop/login.php">Admin Login</a>





        <footer class="footer-bottom">

            <p class="author fw-bolder text-secondary text-center">
                Thank you for purchasing our products. <span class="text-pink fs-3" style="vertical-align: sub;">♥️</span>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
                <script src="../poject/plugins/google-map/gmap.js"></script>
                <script src="js/script.js"></script>

                <script src="../shop/member/plugins/tether/js/tether.min.js"></script>
                <script src="../shop/member/plugins/raty/jquery.raty-fa.js"></script>
                <script src="../shop/member/plugins/slick-carousel/slick/slick.min.js"></script>
                <script src="../shop/member/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
                <script src="../shop/member/plugins/fancybox/jquery.fancybox.pack.js"></script>
                <script src="../shop/member/plugins/smoothscroll/SmoothScroll.min.js"></script>

                <script src="../shop/member/plugins/jQuery/jquery.min.js"></script>
                <script src="../shop/member/plugins/bootstrap/js/popper.min.js"></script>
                <script src="../shop/member/plugins/bootstrap/js/bootstrap-slider.js"></script>
    </body>

</html>