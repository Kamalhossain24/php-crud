<?php
require('./config.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header('Location: login.php');
}
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    $sql = "DELETE FROM `user` WHERE id=$user_id ";
    $result = $conn->query($sql);
    if ($result === true) {
        echo "<script>window.alert('done',window.location.href='list.php')</script>";
       // header('Location: list.php');
    }
}
