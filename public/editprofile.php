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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/images/8.png" />
    <title>Edit Profile | Tinda</title>
</head>
<body>
    <?php
        require 'php/scripts.php';

        if (!isset($_SESSION['user'])) {
            header('Location: index.php');
        } else {
            $user = $_SESSION['user'];
            if(!$user) {
                echo '<div class="accs"><a href="signup.php"class="su">Sign Up</a> | <a href="signin.php" class="si">Sign In</a></div>';
            } else {
                echo '<div class="accs"><a href="editprofile.php"class="ep">' . $user['username'] . '</a></div>';
            }
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
                <input type='submit' name='submit' value='Save'>
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
                <input required='required' placeholder='Seller Name' type='text' class='sellerName' name='sellername' value=''><br> 
                <input type='submit' name='submit' value='Save'>
            </form>
            </div>";
        }
    ?>

    <div class="header">
        <div class="icon">
            <img src="resources/images/3.png" alt="Tinda" style="">
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
            <a href="#">Sell on Tinda</a>
        </div>
        <div class="searchbar">
            <form>
            <input type="text" placeholder="  Look for great finds on Tinda!">
            <button type="submit" class="search"><img src="resources/images/search.png" alt=""></button>
            </form>
        </div>
        <div class="cart">
            <a href=#><img src="resources/images/cart.png" alt="Cart" class="carti"><a>
        </div>   
        <div class="notifc">
            <div class="notifs">
                <img src="resources/images/notifs.png" alt="Notifications" class="notifi">
                <p class="notifp">Notifications</p>
            </div>
        </div>
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