<?php 
   
    require_once '../member/' ; 
    if( !isset($_SESSION['id'] ) ){
        header('Location: ../signin.php');  
    }
?>