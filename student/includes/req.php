<div class="row gutters-sm">
    <div class="col-md-5 mb-3">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-upload"></i> Upload Requirements</h6>
            </div>
            <div class="col-sm-12 mt-2">
                <button type="button" class="btn btn-info btn-sm float-right"  data-toggle="modal" data-target="#exampleModal" title="Requirements List"><i class="fa fa-th-list"></i> List</button>
            </div>
            <div class="card-body">

                <form action="uploadrequirement.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">

                        <div class="col-lg-12">
                            <label for="selDocument" style="font-weight:bold;" class="text-gray-900">Requirement Name</label>
                            <select class="form-control text-gray-800" id="selDocument" name="selDocument" required>
                                <option selected value="" disabled>Select Document..</option>

                                <?php
                                $sql1 = 'SELECT * FROM requirements WHERE req_ID NOT IN(SELECT req_ID 
                                                                    FROM studreq WHERE sid=?) AND isActive="ACTIVE" ';
                                $data1 = array($sid);
                                $stmt1 = $con->prepare($sql1);
                                $stmt1->execute($data1);
                                while ($row1 = $stmt1->fetch()) {
                                    echo '<option value=' . $row1['req_ID'] . '>' . $row1['reqname'] . '</option>';
                                }
                                $stmt = null;
                                ?>
                            </select>
                        </div> <br>
                        <div class="col-lg-12">

                            <label for="requirement" style="font-weight:bold;" class="text-gray-900">Upload Requirement </label>
                            <input type="file" class="form-control" name="requirement" id="requirement" accept="application/pdf" required><span style="color:black;"><br>NOTE: Please upload <b>scanned</b> copies of your requirements in <b>.pdf</b> format.</span>
                        </div>

                    </div>

                    <div class="text-right"> <button type="submit" class="btn btn-success" name="uploadReq"><i class="fas fa-check"></i> Submit</button></div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-7">

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/enroll_guide/g1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/enroll_guide/g2.png" alt="First slide">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
      </div>
      
    </div>
  </div>
</div>