
<div class="row">
    <div class="col-lg-6" id="enrolldetailsdiv" >
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-file-alt"></i> Assessment Status</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Department</th>
                                <th>Course</th>
                                <th hidden>SY</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php // displays all the submitted requirements of the student
                            $sql = "SELECT * FROM vwforenrollment_students where sid=? and schoolyr=? and semester=? ";
                            $data = array($sid, $currentsyval, $currentsemval); // sid of current user
                            $stmt = $con->prepare($sql);
                            $stmt->execute($data);
                            while ($row = $stmt->fetch()) {
                                $enrolldate = $row['date_enrolled'];

                                echo '<tr> 
                                        <td>' . $row['dept'] . '</td>
                                        <td>' . $row['course'] . '</td>
                                        <td hidden>' . $row['schoolyr'] . '</td> 
                                        <td>' . $row['semester'] . '</td>
                                        <td>' . $row['enrollment_status'] . '</td>
                                        <td>

                                        <button" class="btn btn-warning" id="enrolledit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                        </button>
                                        

                                        
                                                        
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
    <div class="col-lg-6" id="enrolldetailsdiv" >
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-file-alt"></i> Enrollment Details</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <!-- <th>#</th> -->
                                <th>Department</th>
                                <th>Course</th>
                                <th hidden>SY</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php // displays all the submitted requirements of the student
                            $sql = "SELECT * FROM vwforenrollment_students where sid=? and schoolyr=? and semester=? ";
                            $data = array($sid, $currentsyval, $currentsemval); // sid of current user
                            $stmt = $con->prepare($sql);
                            $stmt->execute($data);
                            while ($row = $stmt->fetch()) {
                                $enrolldate = $row['date_enrolled'];

                                echo '<tr> 
                                        <td>' . $row['dept'] . '</td>
                                        <td>' . $row['course'] . '</td>
                                        <td hidden>' . $row['schoolyr'] . '</td> 
                                        <td>' . $row['semester'] . '</td>
                                        <td>' . $row['enrollment_status'] . '</td>
                                        <td>

                                        <button" class="btn btn-warning" id="enrolledit" title="Edit">
                                        <i class="fas fa-edit"></i>
                                        </button>
                                        

                                        
                                                        
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
<div class="row">
    <div class="col-lg-6">
        <form id="myForm">
            <div class="card shadow">
                <div class="card-header text-gray-900 font-weight-bold">
                    <i class="fas fa-tasks"></i>
                    &nbsp;
                    Assessment Form
                </div>
                <div class="card-body">
                    <label for="filename" class="text-gray-900 font-weight-bold">File Name</label>
                    <input type="text" id="filename" name="filename" class="form-control mb-3" placeholder="e.g copyofgrades_2022_2023" required autofocus>
                    <label for="fileupload" class="text-gray-900 font-weight-bold">File Upload</label>
                    <input type="file" id="fileupload" name="fileupload" class="form-control mb-4" required>
                    
                    <div class="col-lg-12">
                        <div class="text-right"><button id="btnSubmit" class="btn btn-success w-100 ">Submit</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-6" id="enrolldiv">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-edit"></i> Enrollment Form</h6>
            </div>
            <div class="card-body">
                <form action="codes/enroll.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleFormControlSelect1">School Year</label>
                                <input type="text" class="form-control" value="<?= $currentsyval ?>" disabled>
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleFormControlSelect1">Semester</label>
                                <input type="text" class="form-control" value="<?= $currentsemval ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label for="exampleFormControlSelect1">Department</label>
                                <select class="form-control" id="seldept" name="seldept" required>
                                    <option selected="" disabled>Select Department..</option>
                                    <?php
                                    $sql = "select * from departments";
                                    $stmt = $con->prepare($sql);
                                    $stmt->execute();

                                    while ($row = $stmt->fetch()) {
                                        echo '<option value=' . $row['deptid'] . '>' . $row['dept'] . '</option>';
                                    }
                                    $stmt = null;
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleFormControlSelect1">Course</label>
                                <select class="form-control" id="selCourse" name="selCourse" required>
                                    <?php

                                    $sql = 'SELECT * FROM courses';
                                    $stmt = $con->query($sql);

                                    foreach ($stmt as $rows) {
                                        echo '<option value=' . $rows['course_ID'] . '>' . $rows['course'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label for="exampleFormControlSelect1" hidden>School Year</label>
                            <select class="form-control" id="exampleFormControlSelect1" hidden>
                                <?php
                                $sql = "select * from schoolyr where status='ACTIVE'";
                                $stmt = $con->prepare($sql);
                                $stmt->execute();

                                while ($row = $stmt->fetch()) {
                                    echo '<option selected value=' . $row['schoolyr_ID'] . '>' . $row['schoolyr'] . '</option>';
                                }
                                $stmt = null;
                                ?>
                            </select>
                        </div>


                    </div>
                    <div class="col-lg-12">
                        <div class="text-right"><button type="submit" class="btn btn-success" name="enroll" id="btnEnroll"><i class="fas fa-check"></i> Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>