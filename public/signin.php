<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="stylesheets/font.css">
    <link rel="stylesheet" href="stylesheets/bg-icon.css">
    <link rel="stylesheet" href="stylesheets/signin.css">
</head>
<body>

<?php
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                verifyUser();
            }

            function verifyUser() {

                $conn = mysqli_connect('localhost', 'cs36', '1234', 'tindadb');

                $username = $_POST['username'];
                $pass = hash('sha256', $_POST['password'], false);
                $sql = "SELECT * FROM member WHERE username='". $username. "' AND password='". $pass. "'";

                $result = mysqli_query($conn, $sql);
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if (count($users) == 0) {
                    displayError();
                } else {
                    echo "User found";
                    $_SESSION["user"] = array('id'=>$users[0]['id'], 'username'=>$users[0]["username"], 'address'=>$users[0]['address'], 'contact'=>$users[0]['contact'], 'displayname'=>$users[0]['displayname'], 'isseller'=>$users[0]['isseller'], 'sellername'=>$users[0]['sellername']);
                    header('Location: index.php');
                }
            }
            
            function displayError() {
                echo "<div class='err'><p>Invalid Login Credentials!</p></div>";
            }
        ?>
    <div class="wrap">
    <div class="icon">
        <img src="resources/images/6.png" alt="Tinda Logo">
    </div>
    <div class="signinform">
            <h1 class="title">Sign In</h1>
        <div class="inputs">
            <form method="POST">
                <input type="text" name="username" id="em" placeholder="Username">
                <input type="password" name="password" id="pw" placeholder="Password">
                <input type="submit" name="submit" value="SIGN IN">
            </form>
        </div>

        <p class="new">New to Tinda? <a href="signup.php" class="signup">Sign Up</a></p>
    </div>
    </div>

</body>
</html>