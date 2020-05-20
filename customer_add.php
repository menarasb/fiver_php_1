<?php
if (isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $card_details = $_POST['card_details'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];
    $add_product = $con->query("INSERT INTO customer (name,phone,card_details,address,city,postcode) VALUES ('$name','$phone','$card_details','$address','$city','$postcode')");
    if($add_product){
        echo "<script> location.replace('customer.php?page=data'); </script>";
    } else {
        echo "GAGAL";
    }
}
?>
<form name="form1" enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
        <label>Customer Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="number" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Card Details</label>
        <input type="text" name="card_details" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Address</label>
        <textarea type="text" name="address" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" name="city" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Postcode</label>
        <input type="text" name="postcode" class="form-control" required>
    </div>
    <button type="submit" name="add_customer" class="btn btn-primary float-right">Add Customer</button>
</form>