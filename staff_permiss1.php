<?php 
include "config.php";
include "head.php";
include "session.php"; 

// Process form submission

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?php include "menu.php"; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <?php include "header.php"; ?>

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-4">
                        <h3><button class="btn btn-label-primary">Apply Permission </button></h3>
                        <a class="btn btn-primary float-end btn-group" style="color:white" data-bs-toggle="modal" data-bs-target="#editUser" tabindex="0" onclick="prepareForm();">
                            <i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Apply Permission
                        </a>
                    </div>

                    <!-- Teams Cards -->
                    <div class="row g-4">
                        <div class="col-xl-12 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-0">
                                        <a href="javascript:;" class="d-flex align-items-center"></a>
                                        <div class="ms-auto"></div>
                                    </div>

                                    <div class="card-datatable table-responsive">
                                        <table id="myTable" class="table table-hover display">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center">S.no</th>
                                                    <th style="text-align:center">Date</th>
                                                    <th nowrap>Staff Name</th>
                                                    <th>Permission Hrs</th>
                                                    <th style="text-align:center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sno = 1;
                                                $clr = '';
                                                $sql = "SELECT *, a.id as id, a.status as status, a.date as date FROM permiss a LEFT JOIN employee c ON a.staff=c.id WHERE a.staff='$user_id' ORDER BY a.id DESC";
                                                $result = mysqli_query($conn, $sql);
                                                $count = mysqli_num_rows($result);

                                                if ($count > 0) {
                                                    while ($rows = mysqli_fetch_array($result)) {
                                                        $status = $rows['status'];
                                                        $clr = ($status == 'Pending') ? 'primary' : (($status == 'Approved') ? 'success' : 'danger');
                                                ?>
                                                        <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id']; ?>">
                                                        <tr style="font-size:15px">
                                                            <td align="center"><?php echo $sno; ?></td>
                                                            <td nowrap style="text-align:center"><?php echo date('d M Y ', strtotime($rows['date'])); ?></td>
                                                            <td nowrap style="text-transform:uppercase;"><?php echo $rows['name']; ?></td>
                                                            <td nowrap><?php echo $rows['duration1']; ?>&nbsp;</td>
                                                            <td align="center">
                                                                <button class="btn btn-<?php echo $clr; ?> me-sm-3 me-1"><?php echo $status; ?></button>
                                                            </td>
                                                        </tr>
                                                <?php
                                                        $sno++;
                                                    }
                                                } else {
                                                ?>
                                                    <tr>
                                                        <td colspan="5" align="center"> <p>No Data Found</p></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Teams Cards -->

                </div>
            </div>
            <!-- / Layout page -->
        </div>
    </div>
</div>


<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

<?php 
$sql2 = "SELECT * FROM employee WHERE id=$user_id";
$result2 = mysqli_query($conn, $sql2);
$rw2 = mysqli_fetch_array($result2);
?>

<div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-edit-user">
        <div class="modal-content p-3 p-md-2">
            <div class="modal-body">
                <div class="text-center mb-4">
                    <h3 class="mb-2"><span id="form-title"></span>&nbsp; Permission</span></h3>
                    <p class="text-muted"></p>
                </div>
                <form id="editUserForm" method="post" action="" enctype="multipart/form-data" class="row g-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    <div class="col-12">
                        <label class="form-label" for="modalEditUserName">Staff name</label>
                        <input name="staff" id="staff" class="form-control" readonly value="<?php echo $rw2['name']; ?>" />
                        <input name="staff1" id="staff1" class="form-control" value="<?php echo $user_id; ?>" hidden />
                        <input name="id" id="id" class="form-control" hidden />
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditTaxID">Date</label>
                        <input type="date" id="date" name="date" value="<?php echo date("Y-m-d"); ?>" class="form-control modal-edit-tax-id" required />
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label" for="modalEditUserLanguage">Permission Hrs/Month</label>
                        <input type="text" id="per" name="per" value="2 Hrs" class="form-control" readonly />
                    </div>

                    <?php
                    $sql3 = "SELECT COALESCE(SUM(duration), 0) as total_duration FROM permiss WHERE staff=$user_id";
                    $result3 = mysqli_query($conn, $sql3);
                    $rw3 = mysqli_fetch_array($result3);
                 $total_duration = $rw3['total_duration'];
                    $remaining_hours = 2 - $total_duration;

                    $remaining_minutes = $remaining_hours * 60;
$remaining_hours_display = floor($remaining_minutes / 60);
$remaining_minutes_display = $remaining_minutes % 60;
                    ?>
                    <div class="col-12 col-md-3">
                        <label class="form-label" for="modalEditUserLanguage">Remaining Hrs</label>
                        <input type="text" id="remain_hrs" name="remain_hrs" value="<?php echo $remaining_hours_display . ' Hrs ' . $remaining_minutes_display . ' Mins'; ?>" class="form-control" readonly />
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label" for="modalEditUserLanguage">From Time</label>
                        <input type="time" id="from_time" name="from_time" class="form-control" required />
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label" for="modalEditUserLanguage">To Time</label>
                        <input type="time" id="to_time" name="to_time" class="form-control" required />
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label" for="modalEditUserLanguage">Duration</label>
                        <input type="text" id="duration1" name="duration1" class="form-control" readonly />
                        <input type="text" id="duration" name="duration" onchange="updateRemainingHours();" hidden class="form-control" readonly />
                    </div>

                    <div class="col-12">
                        <label class="form-label" for="modalEditUserLanguage">Remarks</label>
                        <textarea class="form-control" id="remarks" name="remarks" rows="2"></textarea>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $staff = $_POST['staff1'];
    $date = $_POST['date'];
    $remain_hrs = $_POST['remain_hrs'];
    $from_time = $_POST['from_time'];
    $to_time = $_POST['to_time'];
    $duration = $_POST['duration'];
    $duration1 = $_POST['duration1'];
    $remarks = $_POST['remarks'];

    // Insert new permission record
    $sql = "INSERT INTO permiss (staff, date, remain_hrs, from_time, to_time, duration,duration1,remarks) 
            VALUES ('$staff', '$date', '$remain_hrs', '$from_time', '$to_time','$duration','$duration1','$remarks')";
    $result1 = mysqli_query($conn, $sql);

    if ($result1) {
        echo '<script>
        Swal.fire({
            title: "Success!",
            text: "Claim Request has been saved successfully.",
            icon: "success",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "staff_permiss.php";
            }
        });
        </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "Error!",
            text: "There was an error saving the Claim.",
            icon: "error",
            confirmButtonText: "OK"
        });
        </script>';
    }
}
?>
<?php include "footer.php"; ?>

<!-- Include JS files -->


<script>
    function prepareForm() {
        document.getElementById("editUserForm").reset();
        document.getElementById("form-title").innerText = "Apply";
        document.getElementById("id").value = "";
    }

    document.getElementById("from_time").addEventListener("change", calculateDuration);
    document.getElementById("to_time").addEventListener("change", calculateDuration);

    function calculateDuration() {
        let fromTime = document.getElementById("from_time").value;
        let toTime = document.getElementById("to_time").value;

        if (fromTime && toTime) {
            let from = new Date(`1970-01-01T${fromTime}:00`);
            let to = new Date(`1970-01-01T${toTime}:00`);

            if (to < from) {
                to.setDate(to.getDate() + 1); // Adjust for overnight duration
            }

            let durationInMs = to - from;
            let durationInHours = durationInMs / (1000 * 60 * 60);

            document.getElementById("duration").value = `${durationInHours.toFixed(2)} Hrs`;
            
            //alert('hello');
         

            
            let durationInMinutes = durationInMs / (1000 * 60);
            let durationHours = Math.floor(durationInMinutes / 60);
            let minutes = Math.round(durationInMinutes % 60);

            document.getElementById("duration1").value = `${durationHours} Hrs ${minutes} Mins`;

        
  
 }
    }
</script>





</body>   
</html>
