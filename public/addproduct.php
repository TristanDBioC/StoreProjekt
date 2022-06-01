<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Page where seller can add a product.">
 
    <link rel="stylesheet" href="stylesheets/addproduct.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Add Product | Tinda</title>
</head>
<body>
    <?php
        require 'php/imagehandler.php';

        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            if ($_SESSION['user']['isseller'] == 0) {
                header('Location: editprofile.php');
            }
        }

        function logoutUser() {
            unset($_SESSION['user']);
            unset($user);
            header('Location: index.php');
        }

        function addProduct() {
            $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');
            // set varuabkes
            $imagepatharray = saveImage('img', count($_FILES['img']['name']));
            $id = 0;
            $sellerid = $_SESSION['user']['id'];
            $name = $_POST['prodname'];
            $desc = $_POST['desc'];
            $price = substr($_POST['price'],3);
            $quantity = $_POST['stock'];
            $imagepath = $imagepatharray[0];
            $category = $_POST['category'];
            $type = $_POST['type'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            
            //SQL statement
            $sql = "INSERT INTO product VALUES ('".
                                $id."','".
                                $sellerid."','".
                                $name."','".
                                $desc."','".
                                $price."','".
                                $quantity."','".
                                $imagepath."','".
                                $category."','".
                                $type."','".
                                $color."','".
                                $size."', '0')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // CHANGE THIS TO REDIRECT to PRODSOLD
                $lastID = mysqli_insert_id($conn);
                foreach($imagepatharray as $path) {
                    savePathtoDB($lastID, $path);
                }
                header('Location: index.php');
            }

        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['Logout'])){
                logoutUser();
            }
            if (isset($_POST['submit'])) {
                addProduct();
            }
        }

    ?>

<div class="header">
    <div class="icon">
            <a href="index.php"><img src="resources/images/5.png" alt="Tinda" style=""></a>
    </div>
        
        <?php
            if(!isset($_SESSION['user'])) {
                echo '<div class="accs">
                        <a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a>
                    </div>';
            } else {
                echo    '<div class="accs">
                            <div class="acdrop">
                                <a href="editprofile.php"class="ep">' . $user['username'] . '</a>
                                <div class="dropcont">
                                    <a href="purchasehistory.php" class="vp">View Purchases</a>
                                    <form method="POST">
                                        <input type="submit" value="Logout" name="Logout" class="logout">
                                    </form>
                                </div>
                            </div>
                        </div>';
            }
        ?>
    </div>

    <div class="main_content">
        <form id="addproduct" class="addproduct" action="" method="post" enctype="multipart/form-data">
            <p class="subheader">Add a new product</p>

            <input required="required" placeholder="Input product name" type="text" class="prodname" name="prodname" value=""><br>
        
            <textarea required="required" placeholder="Describe your product" class="desc" name="desc"></textarea><br>

            <div class="custom-select" style="width:200px;">
                <select name="category">
                    <option value="0">Select a category:</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                    <option value="Children">Children</option>
                </select>
            </div>

            <div class="custom-select" style="width:200px;">
                <select name='type'>
                    <option value="0">Select Type:</option>
                    <option value="Top">Top</option>
                    <option value="Bottom">Bottom</option>
                </select>
            </div>

            <div class="custom-select" style="width:200px;">
                <select name='color'>
                    <option value="0">Select Color:</option>
                    <option value="Red">Red</option>
                    <option value="Orange">Orange</option>
                    <option value="Yellow">Yellow</option>
                    <option value="Green">Green</option>
                    <option value="Blue">Blue</option>
                    <option value="Indigo">Indigo</option>
                    <option value="Violet">Violet</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Brown">Brown</option>
                    <option value="Grey">Grey</option>
                </select>
            </div>

            <div class="custom-select" style="width:200px;">
                <select name='size'>
                    <option value="0">Select Size:</option>
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>

            <br><br><br><br><br>

            Upload images of your product:
            <input required="required "type="file" class="uploadImage" name="img[]" multiple='multiple'><br>

            Stock <input required="required" placeholder="0" type="number" class="stock" name="stock" min="1" max=""><br>

            Pricing<input required="required" placeholder='&#8369;0.00' type="currency" class="price" name="price" value=""  /><br>

            <input type="submit" value="SUBMIT" name='submit' class="addProd">
        </form>
    </div>
    <?php

    ?>

    <script src="bundles/addproduct.js"></script>
</body>
</html>

