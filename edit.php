<?php
require('./config.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
}
$user_id = $_GET['id'];
$sql = "SELECT * FROM user where `id`=$user_id";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $d_name = $row['name'];
    $d_email = $row['email'];
    $d_password = $row['password'];
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
                    <td><input type="text" name="name" value="<?= $d_name ?>" placeholder="Name"></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" value="<?= $d_email ?>" placeholder="Email"></td>
                </tr>
                <tr>
                    <td><input type="password" value="<?= $d_password ?>" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>


        <?php
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "UPDATE `user` SET `name`='$name',`email`='$email',`password`='$password' WHERE id=$user_id";
            $result = $conn->query($sql);
            if ($result  == true) {
                echo "<script>alert('update',window.location.href='list.php')</script>";
                //header('Location: list.php');
            }
        }
        ?>
    </center>
</body>

</html>