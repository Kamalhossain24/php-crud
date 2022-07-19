<?php
session_start();
require('./config.php');
if (isset($_SESSION['login_user'])) {
    header('Location: list.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form method="POST">
            <table>
                <tr>
                    <td><input type="text" name="name" placeholder="Name"></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"><button><a href="login.php">Login</a></button></td>
                </tr>
            </table>
        </form>


        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user where `email`='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<script>alert('User Already Registered',window.location.href='login.php')</script>";
            }else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user`(`name`,`email`,`password`) VALUE('$name','$email','$hashed_password')";
            $Result = $conn->query($sql);
            if ($Result == TRUE) {
                echo "<script>alert('register',window.location.href='list.php')</script>";
            }}
        }
        ?>
    </center>
</body>

</html>