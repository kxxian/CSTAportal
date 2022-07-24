<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th>File</th>
                                            <th >Date Uploaded</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php // displays all the submitted requirements of the student
                                            $sql="SELECT * FROM vwsubmittedreq where id=? order by sr_ID";
                                            $data=array($sid); // sid of current user
                                            $stmt=$con->prepare($sql);
                                            $stmt->execute($data);
                                            while($row=$stmt->fetch()){
                                              $newname=sha1($row['reqname'].'-'.$username.'-'.$bday);
                                          
                                                echo '<tr> 
                                                        <!--<td>'.$row['sr_ID'].'</td>-->
                                                        <td>'.$row['reqname'].'</td> 
                                                        <td>
                                                        <td>'.$row['date_submitted'].'</td>
                                                        <a href="../student/uploads/requirements/'.$newname.'.jpg" target="_blank"><button" class="userinfo btn btn-info" title="View">
                                                        <i class="far fa-eye"></i></button></a></td>

                                                      
                                                      </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
             