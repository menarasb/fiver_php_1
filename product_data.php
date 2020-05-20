                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>                                          
                                            <th>Product Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php 
                                        //query show data from table movies
                                        $query = $con->query("SELECT * FROM products");
                                        while($m = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?= $m['product_name'];?></td>
                                            <td><?= $m['quantity'];?></td>
                                            <td><?= $m['product_type'];?></td>                                         
                                            <td><a href="?page=edit&id=<?= $m['product_id'];?>" class="btn btn-primary">Edit</a> &nbsp; <a href="action.php?act=product_del&id=<?= $m['product_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></td>
                                        </tr>     
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>