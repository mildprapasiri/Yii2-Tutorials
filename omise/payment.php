<html>
<head>
</head>
<body>
<?php
// $total = 100;
// echo 'ราคารวม'.$total;

?>
<form name="checkoutForm" method="POST" action="check.php">
  <script type="text/javascript" src="https://cdn.omise.co/omise.js"
    data-key="pkey_test_5qpva0cg7bbpicpg4sh"
    data-image="http://bit.ly/customer_image"
    data-frame-label="devbanban Shop"
    data-button-label="ชำระเงิน"
    data-submit-label="ชำระเงิน"
    data-location="no"
    data-amount="<?php  echo $total;?>00"
    data-currency="thb"
    >
  </script>
  <!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
  <input type="hidden" name="total" value="<?php  echo $total;?>">
</form>

<!-- data-key="YOUR_PUBLIC_KEY" -->
</body>
</html>