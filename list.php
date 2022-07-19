<?php
require('./config.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
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
        <form method="post">
            <input type="submit" name='logout' value="logout">
        </form>
        <table border="1">
            <tr>
                <th>Sl</th>
                <th>name</th>
                <th>email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            if (isset($_POST['logout'])) {
                header('Location: logout.php');
            }
            $sql = "SELECT * FROM `user`";
            $result = $conn->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><button><a href="edit.php?id=<?= $row['id'] ?>">Edit</a></button></td>
                        <td><button><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></button></td>
                    </tr>
            <?php }
            }
            ?>
        </table>
    </center>
</body>

</html>