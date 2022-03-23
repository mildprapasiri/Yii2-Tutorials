<?php
    /**
     **** AppzStory Shopping Cart System PHP MySQL ****
    * 
    * @link https://appzstory.dev
    * @author Yothin Sapsamran (Jame AppzStory Studio)
    */
    require '../shop/connect.php';
    /** เช็คว่ามี param p_id เข้ามาหรือไม่ */
    if(isset($_GET["p_id"])) {
        $p_id = intval($_GET["p_id"]);
        /** ตรวจสอบฐานข้อมูลในสินค้านั้นๆ */
        $stmt = $conn->query("SELECT * FROM products WHERE p_id = '$p_id' ");
        $count = $stmt->rowCount();
        /** เช็คว่าเจอข้อมูลสินค้าหรือไม่ */
        if(intval($count)){
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            /** เก็บข้อมูลสินค้าใส่ array */
            $itemArray = array(intval($result["p_id"]) => array(
                'p_name'=> $result["p_name"], 
                'p_id'=> intval($result["p_id"]),
                'p_img'=> $result["p_img"],  
                'p_amount' => 1 ,
                'p_price'=>$result["price"])
            );
            $found = false;
            /** เช็คว่า session cart เป็นค่าว่างหรือไม่ */
            if(!empty($_SESSION["cart_item"])) {
                /** วนลูปข้อมูล session cart ที่มีอยู่ด้วย foreach */
                foreach($_SESSION["cart_item"] as $key => $value) {
                    /** เช็คว่าเคยมี product id ใน session นี้หรือไม่  */
                    if($result["p_id"] == $value['p_id']) {
                        $found= true;
                        /** เช็คว่าจำนวนสินค้า เป็นค่าว่างหรือไม่ */
                        if(empty($_SESSION["cart_item"][$key]["p_amount"])) {
                            $_SESSION["cart_item"][$key]["p_amount"] = 0;
                        }
                        /** เพิ่มจำนวนสินค้าเพิ่มขึ้น +1 */
                        $_SESSION["cart_item"][$key]["p_amount"] += 1;
                        break;
                    }
                }
                /** เช็คว่าเจอสินค้าตัวเดิมใน session หรือไม่ */
                if(!$found) {
                    /** เพิ่มสินค้าตัวใหม่เข้าไปใน array */
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                /** ยังไม่ได้สร้าง session ให้นำข้อมูลสินค้าชุดแรกมาใส่ */
                $_SESSION["cart_item"] = $itemArray;
            }
            /** เมื่อสำเร็จส่งกลับหน้าเดิมพร้อมแจ้งเตือน */
            header("location: ./?cart=success");
            exit();
        }
    }

    /** ไม่ว่าจะเกิดกรณีอะไรเกิดขึ้น ก็ให้กลับไปหน้าเดิม */
    header("location: ./");
    exit();
  
?>