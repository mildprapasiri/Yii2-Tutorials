<?php

    session_start();
    require_once 'shop/condb.php';

    if (isset($_POST['signup'])) {


        $m_level = mysqli_real_escape_string($con,$_POST["m_level"]);
        $m_user = mysqli_real_escape_string($con,$_POST["m_user"]);
        $m_pass = mysqli_real_escape_string($con,$_POST["m_pass"]);
        $m_name = mysqli_real_escape_string($con,$_POST["m_name"]);
        $m_email = mysqli_real_escape_string($con,$_POST["m_email"]);
        $m_tel = mysqli_real_escape_string($con,$_POST["m_tel"]);
        $m_address = mysqli_real_escape_string($con,$_POST["m_address"]);
        $m_state = mysqli_real_escape_string($con,$_POST["m_state"]);
        $m_city = mysqli_real_escape_string($con,$_POST["m_city"]);
        $m_zip = mysqli_real_escape_string($con,$_POST["m_zip"]);
    

        if (empty( $m_level )) {
            $_SESSION['error'] = 'กรุณาเลือก';
            header("location: signup.php");
        }else if (empty($m_user)) {
            $_SESSION['error'] = 'กรุณากรอกUser';
            header("location: signup.php");
        }else if (empty($m_name)) {
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header("location: signup.php");
        }else if (empty($m_email)) {
            $_SESSION['error'] = 'กรุณากรอกอีเมล';
            header("location: signup.php");
        }else if (empty($m_pass)) {
            $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
            header("location: signup.php");
        }else if (strlen($_POST['m_pass']) >20 || strlen($_POST['m_pass']) < 5) {
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5-20 ตัวอักษร';
            header("location: signup.php");
        }else {
            try{
                $check_m_user = $conn->prepare("SELECT m_user FROM tbl_member WHERE m_user = :m_user");
                $check_m_user->bindParam(":m_user",$m_user);
                $check_m_user->execute();
                $row = $check_m_user->fetch(PDO::FETCH_ASSOC);

                if($row['m_user'] == $m_user) {
                    $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='index.php'>คลิกที่นี้</a> เพื่อเข้าสู่ระบบ";
                    header("location: signup.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO tbl_member(m_level, m_user, m_pass, m_name, m_email,m_tel,m_address,m_state,m_city,m_zip)
                                            VALUES (:m_level, :m_user, :m_pass, :m_name, :m_email, :m_tel, :m_address, :m_state, :m_city, :m_zip)");
                    $stmt->bindParam(":m_level", $m_level);
                    $stmt->bindParam(":m_user", $m_user);
                    $stmt->bindParam(":m_pass", $m_pass);
                    $stmt->bindParam(":m_name", $m_name);
                    $stmt->bindParam(":m_email", $m_email);
                    $stmt->bindParam(":m_tel", $m_tel);
                    $stmt->bindParam(":m_address", $m_address);
                    $stmt->bindParam(":m_state", $m_state);
                    $stmt->bindParam(":m_city", $m_city);
                    $stmt->bindParam(":m_zip", $m_zip);
                    $stmt->execute();
                    $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว! <a href='login.php' class='alert-link'>คลิกที่นี้</a> เพื่อเข้าสู่ระบบ";
                    header("location: signup.php");
                } else {
                    $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: signup.php");
                }
            } catch(PDOException $e){
                echo $e->getMessage();
            }

        }
    
    }



?>