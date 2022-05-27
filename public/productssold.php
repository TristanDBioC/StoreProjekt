<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="List of seller's products.">
    <link rel="stylesheet" href="stylesheets/productssold.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>My Products | Tinda</title>
</head>
<body>
    <?php
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }

        function logoutUser() {
            unset($_SESSION['user']);
            unset($user);
            header('Location: index.php');
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            logoutUser();
        }
    ?>

    <div class="header">
        <div class="icon">
            <a href="index.php"></a><img src="resources/images/5.png" alt="Tinda" style=""></a>
        </div>
        <div class="notifc">
            <div class="notifs">
                <img src="resources/images/notifs.png" alt="Notifications" class="notifi">
                <p class="notifp">Notifications</p>
            </div>
        </div>
        <?php
            if(!isset($user)) {
                echo '<div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>';
            } else {
                echo    '<div class="accs">
                            <div class="acdrop">
                                <a href="editprofile.php"class="ep">' . $user['username'] . '</a>
                                <div class="dropcont">
                                    <a href="#" class="vp">View Purchases</a>
                                    <form method="POST">
                                        <input type="submit" value="Logout" name="Logout" class="logout">
                                    </form>
                                </div>
                            </div>
                        </div>';
            }
        ?>
    </div>

    <!--BODY-->
    <div class="main_content">
        <p class='subheading'>My Products</p>
                <br>
                <a href = "addproduct.html"><button class="btn">Add Product +</button></a>
                <button class="btn2" id="deleteEvent"><img src = "resources/images/trash.png" class = "delete">Delete</button>
              
                <!-- Checkbox -->
                <div class="selectall">
                    <input type="checkbox" id="selectall" name="selectall">
                    <label for="selectall"> Select All </label>
                </div>

                <!-- Insert button to uncheck all checkboxes -->
                <div class="clearselection" id="clear">
                    Clear Selection
                </div>
            </div>
            
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <p>Are you sure you want to delete these events? This will also delete all users' attendance for the event.</p>
                    <div class="modalbuttons">
                        <button class='confirmDelete'id='confirmDelete'>Yes</button>
                        <button class='cancelDelete' id='cancelDelete'>Cancel</button>
                    </div>
                </div>

            </div>

            <!-- Display Table -->
            <div class="container" id="productstable">
                <table class="products" id="products">
                    <colgroup>
                        <col class="tick">
                        <col class="Product">
                        <col class="Price">
                        <col class="QTY">
                        <col class="Sales">
                    </colgroup>
                    <tr>
                        <th></th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stocks</th>
                        <th>Sales</th>
                    </tr>
                    
                    <!-- Insert events from database -->
                    <tbody id="productsdata">
                        <tr>
                            <td colspan="5" class="loading_message"><br><br><br>LOADING DATA</td>
                        </tr>
                    </tbody>
                </table>
            </div>
</body>
</html>