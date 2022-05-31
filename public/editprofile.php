<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Edit profile page.">
    <link rel="stylesheet" href="stylesheets/editprofile.css">
    <link rel="stylesheet" href="stylesheets/dropdown.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Edit Profile | Tinda</title>
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

        function displayisNotSeller() {
            echo "
            <div class='main_content'>
            <form id='editprofile' class='editprofile' action='' method='post'>
                <p class='subheading'>Edit profile</p>
                <p class='caption'>General information</p>
                <input required='required' placeholder='Displayed Name' type='text' class='number' name='displayname' value=''><br><br>
                <input required='required' placeholder='Address' type='text' class='address' name='address' value=''><br>
                <input required='required' placeholder='Contact Number' type='number' class='number' name='number' value=''><br>
                <input type='submit' name='submit' value='Save' class='save'>
            </form>
            <form method='post'>
                <input type='submit' name='becomeSeller', value='Register as Seller'>
             </form>
            </div>";

        }

        function displayIsSeller() {
            echo "
            <div class='main_content'>
            <form id='editprofile' class='editprofile' action='' method='post'>
                <p class='subheading'>Edit profile</p>
                <p class='caption'>General information</p>
                <input required='required' placeholder='Displayed Name' type='text' class='number' name='displayname' value=''><br><br>
                <input required='required' placeholder='Address' type='text' class='address' name='address' value=''><br>
                <input required='required' placeholder='Contact Number' type='number' class='number' name='number' value=''><br>
                <p class='subheading'>Seller information</p>
                <input required='required' placeholder='Seller Name' type='text' class='sellerName' name='sellername' value=''><br><br><br><br>  
                <a href='productssold.php'>View my Products > </a><br>
                <input type='submit' name='submit' value='Save' class='save'>
            </form>
            </div>";
        }
    ?>

    <div class="header">
        <div class="icon">
            <a href="index.php"><img src="resources/images/3.png" alt="Tinda" style=""></a>
        </div>
        <div class="hcatscont">
            <div class="hcats">
                <p class="drop">Categories</p>
                <div class="dropcont">
                    <a href="#">Men</a>
                    <a href="#">Women</a>
                    <a href="#">Children</a>
                </div>
            </div>
        </div>
        <div class="SoT">
            <!-- MAKE THIS CONDITIONAL IF USER IS SELLER -->
            <a href="addproduct.php">Sell on Tinda</a>  
        </div>
        <div class="searchbar">
            <form>
            <input type="text" placeholder="  Look for great finds on Tinda!">
            <button type="submit" class="search"><img src="resources/images/search.png" alt=""></button>
            </form>
        </div>
        <div class="cart">
            <a href="cart.php"><img src="resources/images/cart.png" alt="Cart" class="carti"><a>
        </div>   
        <div class="notifc">
            <div class="notifs">
                <img src="resources/images/notifs.png" alt="Notifications" class="notifi">
                <p class="notifp">Notifications</p>
            </div>
        </div>
        <?php
            if(!isset($_SESSION['user'])) {
                echo '<div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>';
            } else {
                echo    "<div class='accs'>
                            <div class='acdrop'>
                                <a href='editprofile.php'class='ep'>" . $user['username'] . "</a>
                                <div class='dropcont'>
                                    <a href='purchasehistory.php' class='vp'>View Purchases</a>
                                    <form method='POST'>
                                        <input type='submit' value='Logout' name='Logout' class='logout'>
                                    </form>
                                </div>
                            </div>
                        </div>";
            }
        ?>
    </div>

    <div class="main_content">
    </div>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit'])) {
                updateMember($user['username'],$_POST['number'],$_POST['displayname'],$_POST['sellername']);
            }
            if (isset($_POST['becomeSeller'])) {
                if (becomeSeller($user['username'])) {
                    $_SESSION['user']['isseller'] = 1;
                    header('Location: editprofile.php');
                } else {
                    echo "failed somehow";
                }

            }
        }

        if($user['isseller'] == 1) {
            displayIsSeller();
        } else {
            displayisNotSeller();
        }
   ?>
</body>
</html>