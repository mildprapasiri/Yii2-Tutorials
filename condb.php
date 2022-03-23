<?php
// session_start();
$con= mysqli_connect("localhost","std","BIS_2019","shop") ;
mysqli_query($con, "SET NAMES 'utf8' ");
error_reporting( error_reporting() & ~E_NOTICE );
date_default_timezone_set('Asia/Bangkok');




$servername = "localhost";
$username = "std";
$password = "BIS_2019";
$dbname = "shop";
$conn = null;
try {
  $conn = new PDO("mysql:host=$servername;dbname=shop", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit();

}
// class Database {
//     private $host = "localhost";
//     private $dbname = "shopcart";
//     private $username = "root";
//     private $password = "";
//     private $conn = null;

//     public function connect() {
//         try{
//             $this->conn = new PDO('mysql:host='.$this->host.'; 
//                                 dbname='.$this->dbname.'; 
//                                 charset=utf8', 
//                                 $this->username, 
//                                 $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         }catch(PDOException $exception){
//             echo "ไม่สามารถเชื่อมต่อฐานข้อมูลได้: " . $exception->getMessage();
//             exit();
//         }
//         return $this->conn;
//     }
// }
// /**
//  * ประกาศ Instance ของ Class Database
//  */
// $Database = new Database();
// $conn = $Database->connect();
