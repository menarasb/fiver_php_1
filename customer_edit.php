<?php
$id = mysqli_real_escape_string($con,$_GET['id']);
$get_customer = $con->query("SELECT * FROM customer WHERE customer_id = '$id'");
$p = mysqli_fetch_array($get_customer);

if (isset($_POST['edit_customer'])) {
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = $_POST['phone'];
    $card_details = $_POST['card_details'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $add_customer = $con->query("UPDATE customer SET name = '$name', phone = '$phone', card_details = '$card_details', address = '$address', city = '$city', postcode = '$postcode' WHERE customer_id = '$id'");
    if($add_customer){
        echo "<script> location.replace('customer.php?page=data'); </script>";
    } else {
        echo "GAGAL";
    }
}

?>
<form name="form1" enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
        <label>Customer Name</label>
        <input type="text" value="<?= $p['name'];?>" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" value="<?= $p['phone'];?>" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Card Details</label>
        <input type="text" value="<?= $p['card_details'];?>" name="card_details" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea type="text" name="address" class="form-control" required><?= $p['address'];?></textarea>
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" value="<?= $p['city'];?>" name="city" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Postcode</label>
        <input type="text" value="<?= $p['postcode'];?>" name="postcode" class="form-control" required>
    </div>
    <button type="submit" name="edit_customer" class="btn btn-warning float-right">Update Customer</button>
</form>