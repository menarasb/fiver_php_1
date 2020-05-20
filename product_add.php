<?php
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $product_type = $_POST['product_type'];
    $add_product = $con->query("INSERT INTO products (product_name,quantity,product_type) VALUES ('$product_name','$quantity','$product_type')");
    if($add_product){
        echo "<script> location.replace('product_manager.php?page=data'); </script>";
    } else {
        echo "GAGAL";
    }
}
?>
<form name="form1" enctype="multipart/form-data" method="POST" action="">
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" name="product_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" name="quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Product type</label>
        <input type="text" name="product_type" class="form-control" required>
    </div>
    <button type="submit" name="add_product" class="btn btn-primary float-right">Add Product</button>
</form>