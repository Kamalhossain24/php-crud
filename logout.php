<?php
session_start();
unset($_SESSION['login_user']);
echo "<script>alert('Good Bye!!',window.location.href='login.php')</script>";
