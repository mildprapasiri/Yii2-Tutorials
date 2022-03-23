<?php
// print('<pre>');
// print_r($_POST);
// print('</pre>');

$total = $_POST['total'].'00';
// echo $total;

// exit();


require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2015-11-17');
// define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
// define('OMISE_SECRET_KEY', 'SECRET_KEY');
define('OMISE_PUBLIC_KEY', 'pkey_test_5qpva0cg7bbpicpg4sh');
define('OMISE_SECRET_KEY', 'skey_test_5qpuvy6o1mikxav4kfr');

$charge = OmiseCharge::create(array(
  'amount' => $total,
  'currency' => 'thb',
  'card' => $_POST["omiseToken"]
));

$status = ($charge['status']);

// print('<pre>');
// print_r($charge);
// print('</pre>');

// echo $status;

if($status == 'successful'){
    // success
    echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    echo '<script>
    setTimeout(function() {
     swal({
         title: "ชำระเงินสำเร็จ",
         text: "กรุณารอตรวจสอบการชำระเงินจากทางร้าน",
         type: "success"
     }, function() {
         window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
     });
 }, 1000);
</script>';
}else{
    // error
    echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    echo '<script>
    setTimeout(function() {
     swal({
         title: "เกิดข้อผิดพลาด",
         text: "กรุณาลองอีกครั้ง",
         type: "error"
     }, function() {
         window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
     });
 }, 1000);
</script>';
}

?>