<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php");
} else{
    header("location:product_manager.php?page=data");
}
?>