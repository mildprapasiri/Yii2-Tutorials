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
                                <a class="nav-link" href="../shop/login.php">admin</a>
                            </li>

                        </ul>
                        </div>


</div>
</nav>
</div>





            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 mb-3">
                        <div class="card-body">
                            <form action="/shop/search.php" method="POST">
                                
                                <div class="row px-3 px-md-5 py-3">
                                    <div class="col-md-3 mb-3">
                                        <label for="order_name" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="E-mail" required>
                                         <input type="submit" name="submit" class="btn btn-danger px-5" value="Search">
                                    </div>

                                </div>
                                <hr>
                                <br>
                                   
                                    
                            
                                
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>    


        
        





        

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