<div class="row gutters-sm">
    

    <div class="col-sm-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-alt"></i> Requirements Uploaded

                </h6>

            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <!-- <th>#</th> -->
                                <th class="text-center">Requirement</th>
                                <th width="250" class="text-center">Date Uploaded</th>
                                <th width="120" class="text-center">Remarks</th>
                                <th width="120" class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php // displays all the submitted requirements of the student
                            $sql = "SELECT * FROM vwsubmittedreq where id=? order by sr_ID";
                            $data = array($sid); // sid of current user
                            $stmt = $con->prepare($sql);
                            $stmt->execute($data);
                            while ($row = $stmt->fetch()) {


                                echo '<tr> 
                                        <!--<td>' . $row['sr_ID'] . '</td>-->
                                        <td>' . $row['reqname'] . '</td> 
                                        <td>' . $row['date_submitted'] . '</td>

                                        <td>
                                        Validated
                                        </td>


                                        <td>
    
                                        <a href="uploads/requirements/' . $row['sr_ID'] . '.jpg" ><button" class="userinfo btn btn-info" title="View">
                                        <i class="far fa-eye"></i></button></a>

                                        <input type="hidden" class="deletereqval" value="' . $row['sr_ID'] . '"
                                        <a href="javascript:void(0)" ><button" class="deletereqbtn btn btn-danger" title="Delete">
                                        <i class="fas fa-trash"></i></button></a>
                                                        
                                        </td>

                    
                                                        
                                        </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>