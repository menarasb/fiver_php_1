<?php
// connections
    include 'settings/db.php';
// GET action URL
$act = $_GET['act'];
if($act=='product_del'){
    $id = mysqli_real_escape_string($con,$_GET['id']);
    $del_product = $con->query("DELETE FROM products WHERE product_id = '$id'");
    if($del_product){
        header("location:product_manager.php?page=data");
    } else {
        echo "Error";
    }
}
if($act=='customer_del'){
    $id = mysqli_real_escape_string($con,$_GET['id']);
    $del_product = $con->query("DELETE FROM customer WHERE customer_id = '$id'");
    if($del_product){
        header("location:customer.php?page=data");
    } else {
        echo "Error";
    }
}

if($act=='payment_del'){
    $id = mysqli_real_escape_string($con,$_GET['id']);
    $del_product = $con->query("DELETE FROM payments WHERE payment_id = '$id'");
    if($del_product){
        header("location:customer.php?page=data");
    } else {
        echo "Error";
    }
}

if($act=='shipment_del'){
    $id = mysqli_real_escape_string($con,$_GET['id']);
    $del_product = $con->query("DELETE FROM shipment WHERE shipment_id = '$id'");
    if($del_product){
        header("location:shipment.php?page=data");
    } else {
        echo "Error";
    }
}

if($act=='delivery_del'){
    $id = mysqli_real_escape_string($con,$_GET['id']);
    $del_product = $con->query("DELETE FROM delivery WHERE delivery_id = '$id'");
    if($del_product){
        header("location:delivery.php?page=data");
    } else {
        echo "Error";
    }
}

if ($act == 'logout') {
    // activate session
    session_start();

    // destroy session
    session_destroy();

    // back to login form
    header("location:index.php");
}
