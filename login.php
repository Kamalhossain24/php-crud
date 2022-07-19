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
                    <td><input type="text" name="email" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"><button><a href="insert.php">Register</a></button></td>
                </tr>
            </table>
        </form>


        <?php
        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user where `email`='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $d_name = $row['name'];
                    $d_email = $row['email'];
                    $d_password = $row['password'];
                };
                if (password_verify($password, $d_password)) {
                    echo "<script>window.alert('Login Successfull',window.location.href='list.php')</script>";
                    $_SESSION['login_user'] = $d_name;
                } else {
                    echo "<script>alert('Login Fail')</script>";
                }
            } else {
                echo "<script>alert('User Not Register',window.location.href='insert.php')</script>";
            }
        }
        ?>
    </center>
</body>

</html>