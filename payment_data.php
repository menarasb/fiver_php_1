                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Payment Details</th>
                                            <th>#CustomerID | Name</th>                                          
                                            <th>#ProductID | Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php 
                                        //query show data from table movies
                                        $query = $con->query("SELECT a.*,b.name,c.product_name FROM payments a LEFT JOIN customer b ON b.customer_id = a.customer_id LEFT JOIN products c ON c.product_id = a.product_id");
                                        while($m = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?= $m['payment_details'];?></td>
                                            <td>#<?= $m['customer_id'];?> | <?= $m['name'];?></td>
                                            <td>#<?= $m['product_id'];?> | <?= $m['product_name'];?></td>                                         
                                            <td><a href="?page=edit&id=<?= $m['payment_id'];?>" class="btn btn-primary">Edit</a> &nbsp; <a href="action.php?act=product_del&id=<?= $m['payment_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></td>
                                        </tr>     
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>