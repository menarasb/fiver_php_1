<?php
$id = mysqli_real_escape_string($con,$_GET['id']);
$get_product = $con->query("SELECT * FROM products WHERE product_id = '$id'");
$p = mysqli_fetch_array($get_product);

if (isset($_POST['edit_product'])) {
    $product_name = mysqli_real_escape_string($con,$_POST['product_name']);
    $quantity = $_POST['quantity'];
    $product_type = mysqli_real_escape_string($con,$_POST['product_type']);
    $add_product = $con->query("UPDATE products SET product_name = '$product_name', quantity = '$quantity', product_type = '$product_type' WHERE product_id = '$id'");
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
        <input type="text" value="<?= $p['product_name'];?>" name="product_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="number" value="<?= $p['quantity'];?>" name="quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Product type</label>
        <input type="text" value="<?= $p['product_type'];?>" name="product_type" class="form-control" required>
    </div>
    <button type="submit" name="edit_product" class="btn btn-warning float-right">Update Product</button>
</form>