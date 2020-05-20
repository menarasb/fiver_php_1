<?php
if (isset($_POST['add_payment'])) {
    $payment_details = $_POST['payment_details'];
    $customerID = $_POST['customer_id'];
    $productID = $_POST['product_id'];
    $add_payment = $con->query("INSERT INTO payments (payment_details,customer_id,product_id) VALUES ('$payment_details','$customerID','$productID')");
    if($add_payment){
        echo "<script> location.replace('payment.php?page=data'); </script>";
    } else {
        echo "GAGAL";
    }
}
?>
<form name="form1" enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
        <label>Payment Details</label>
        <input type="text" name="payment_details" class="form-control" required>
    </div>
    <div class="form-group">
        <label>CustomerID</label>
        <select class="form-control js-example-basic-single select2" name="customer_id">
            <?php 
            $customer = $con->query("SELECT * FROM customer");
            while ($c = mysqli_fetch_array($customer)){
            ?>
            <option value="<?= $c['customer_id'];?>">#<?= $c['customer_id'];?> | <?= $c['name'];?></option>
            <?php  }?>
        </select>
    </div>
    <div class="form-group">
        <label>ProductID</label>
        <select class="form-control js-example-basic-single select2" name="product_id">
            <?php 
            $products = $con->query("SELECT * FROM products");
            while ($pid = mysqli_fetch_array($products)){
            ?>
            <option value="<?= $pid['product_id'];?>">#<?= $pid['product_id'];?> | <?= $pid['product_name'];?></option>
            <?php  }?>
        </select>
    </div>

    <button type="submit" name="add_payment" class="btn btn-primary float-right">Add Payment</button>
</form>