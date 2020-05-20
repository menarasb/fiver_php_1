                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#CustomerID | Name</th>  
                                            <th>Customer Address</th>
                                            <th>Delivery Time</th>                                          
                                            <th>#ShipmentNumber</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php 
                                        //query show data from table movies
                                        $query = $con->query("SELECT a.*,b.name,b.address,c.order_number FROM delivery a LEFT JOIN customer b ON b.customer_id = a.customer_id LEFT JOIN shipment c ON c.shipment_id = a.shipment_id");
                                        while($m = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td>#<?= $m['customer_id'];?> | <?= $m['name'];?></td>  
                                            <td><?= $m['address'];?></td>
                                            <td><?= $m['delivery_time'];?></td>
                                            <td><?= $m['order_number'];?></td>                                         
                                            <td><a href="?page=edit&id=<?= $m['delivery_id'];?>" class="btn btn-primary">Edit</a> &nbsp; <a href="action.php?act=delivery_del&id=<?= $m['delivery_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></td>
                                        </tr>     
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>