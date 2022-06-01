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
    subtractquantity($productid, $quantity, 0);
 }

 function removefromcart($id) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
    $sql = "SELECT * FROM `cart-product` WHERE id='".$id."'";
    $result = mysqli_query($conn, $sql);
    $cartproduct = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $quantity = 0 - $cartproduct[0]['quantity'];
    subtractquantity($cartproduct[0]['productid'], $quantity, 0);

    $sql = "DELETE FROM `cart-product` WHERE id='".$id."'";
    mysqli_query($conn, $sql);
 }

 function subtractquantity($prodid, $quantity, $sold) {
    $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
    $sql = "SELECT * FROM product WHERE id='".$prodid."'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $newquantity = $product[0]['quantity'] - $quantity;
    $tsold = $product[0]['amount_sold'] + $sold;


    $sql = "UPDATE product SET quantity='".$newquantity."', amount_sold='".$tsold."' WHERE id='".$prodid."'";
    $result = mysqli_query($conn, $sql);

 }


 function checkcredential($memberid, $prodid, $quantity) {
     $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
     $sql = "SELECT * FROM product WHERE id='".$prodid."'";
     $result = mysqli_query($conn, $sql);
     $product = mysqli_fetch_all($result, MYSQLI_ASSOC);
     if ($product[0]['quantity'] < $quantity) {
         echo "not enough items";
         return FALSE;
     }
     if ($product[0]['sellerid'] == $memberid) {
         echo "cant buy your own product";
         return FALSE;
     }
     return TRUE;

 }


 ?>