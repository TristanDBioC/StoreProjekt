<html>
    <head>
        <title>
            Tinda
        </title>
    </head>
    <body>
        <form action="" method="POST">
            <label for="username">Username: </label>
            <input type="text" name="username" id="username">
            <br>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password">
            <br>
            <input type="submit" name="submit">
        </form>
        <a href="signup.php">Sign up</a>
        <script src="bundles/index.js"></script>

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
                    echo "Invalid Login";
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    echo "User found";
                }
            }

        ?>

    </body>
</html>