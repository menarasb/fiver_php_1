<?php
$id = mysqli_real_escape_string($con,$_GET['id']);
$get_payment = $con->query("SELECT a.*,b.name,c.product_name FROM payments a LEFT JOIN customer b ON b.customer_id = a.customer_id LEFT JOIN products c ON c.product_id = a.product_id WHERE a.payment_id = '$id'");
$p = mysqli_fetch_array($get_payment);

if (isset($_POST['edit_payment'])) {
    $payment_details = $_POST['payment_details'];
    $customerID = $_POST['customer_id'];
    $productID = $_POST['product_id'];
    $add_customer = $con->query("UPDATE payments SET payment_details = '$payment_details', customer_id = '$customerID' , product_id = '$productID' WHERE payment_id = '$id'");
    if($add_customer){
        echo "<script> location.replace('payment.php?page=data'); </script>";
    } else {
        echo "GAGAL";
    }
}

?>
<form name="form1" enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
        <label>Payment Details</label>
        <input value="<?= $p['payment_details'];?>" type="text" name="payment_details" class="form-control" required>
    </div>
    <div class="form-group">
        <label>CustomerID</label>
        <select class="form-control js-example-basic-single select2" name="customer_id">
            <option value="<?= $p['customer_id'];?>">#<?= $p['customer_id'];?> | <?= $p['name'];?></option>
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
            <option value="<?= $p['product_id'];?>">#<?= $p['product_id'];?> | <?= $p['product_name'];?></option>
            <?php 
            $products = $con->query("SELECT * FROM products");
            while ($pid = mysqli_fetch_array($products)){
            ?>
            <option value="<?= $pid['product_id'];?>">#<?= $pid['product_id'];?> | <?= $pid['product_name'];?></option>
            <?php  }?>
        </select>
    </div>

    <button type="submit" name="edit_payment" class="btn btn-primary float-right">Update Payment</button>
</form>