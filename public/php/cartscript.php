<?php
function cartexist($id) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');

    $sql = "SELECT * FROM cart WHERE id='".$id."' AND ischeckedout=0";
    $result = mysqli_query($conn, $sql);
    $carts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (count($carts) == 0) {
        return FALSE;
    } else {
        return TRUE;
    }
 }

 function initcart($memberid) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');

    $sql = "INSERT INTO cart VALUES ('0','".$memberid."','0','0')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $lastID = mysqli_insert_id($conn);
        $sql = "UPDATE member SET activecart_id='".$lastID."' WHERE id='".$memberid."'";
        $result2 = mysqli_query($conn, $sql);
        if ($result2) {
            $_SESSION['user']['activecart_id'] = $lastID;
        }
    }
 }

 function addtocart($memberid, $cartid, $productid, $quantity, $price) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
    $total = $quantity * $price;
    $sql = "INSERT INTO `cart-product` VALUES('0','".
                        $cartid."','".$productid."','".$quantity."','".$total."')";
    $result = mysqli_query($conn, $sql);
    subtractquantity($productid, $quantity);
 }

 function removefromcart($id) {
     // CODE LATER WHEN NEEDED
 }

 function subtractquantity($prodid, $quantity) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
    $sql = "SELECT * FROM product WHERE id='".$prodid."'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $newquantity = $product[0]['quantity'] - $quantity;
    $sold = $product[0]['amount_sold'] + $quantity;


    $sql = "UPDATE product SET quantity='".$newquantity."' WHERE id='".$prodid."'";
    $result = mysqli_query($conn, $sql);

 }


 ?>