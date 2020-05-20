                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>                                          
                                            <th>Card Details</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Postcode</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php 
                                        //query show data from table movies
                                        $query = $con->query("SELECT * FROM customer");
                                        while($m = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr>
                                            <td><?= $m['name'];?></td>
                                            <td><?= $m['phone'];?></td>
                                            <td><?= $m['card_details'];?></td>       
                                            <td><?= $m['address'];?></td>    
                                            <td><?= $m['city'];?></td>      
                                            <td><?= $m['postcode'];?></td>                                  
                                            <td><a href="?page=edit&id=<?= $m['customer_id'];?>" class="btn btn-primary">Edit</a> &nbsp; <a href="action.php?act=customer_del&id=<?= $m['customer_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></td>
                                        </tr>     
                                        <?php } ?>                                  
                                    </tbody>
                                </table>
                            </div>