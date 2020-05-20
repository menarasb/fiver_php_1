<?php
if (isset($_POST['add_shipment'])) {
    $delivery_time = $_POST['delivery_time'];
    $customerID = $_POST['customer_id'];
    $shipmentID = $_POST['shipment_id'];
    $add_shipment = $con->query("INSERT INTO delivery (delivery_time,shipment_id,customer_id) VALUES ('$delivery_time','$shipmentID','$customerID')");
    if($add_shipment){
        echo "<script> location.replace('delivery.php?page=data'); </script>";
    } else {
        echo "GAGAL";
    }
}
?>
<form name="form1" enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
        <label>Delivery Time</label>
        <input type="date" name="delivery_time" class="datepicker form-control" data-provide="datepicker" required>
    </div>
    <div class="form-group">
        <label>CustomerID</label>
        <select class="form-control js-example-basic-single select2" name="customer_id">
            <?php 
            $customer = $con->query("SELECT * FROM customer");
            while ($c = mysqli_fetch_array($customer)){
            ?>
            <option value="<?= $c['customer_id'];?>">#<?= $c['customer_id'];?> | <?= $c['name'];?> | <?= $c['address'];?></option>
            <?php  }?>
        </select>
    </div>
    <div class="form-group">
        <label>ShipmentNumber</label>
        <select class="form-control js-example-basic-single select2" name="shipment_id">
            <?php 
            $products = $con->query("SELECT * FROM shipment");
            while ($pid = mysqli_fetch_array($products)){
            ?>
            <option value="<?= $pid['shipment_id'];?>"><?= $pid['order_number'];?></option>
            <?php  }?>
        </select>
    </div>

    <button type="submit" name="add_shipment" class="btn btn-primary float-right">Add Shipment</button>
</form>