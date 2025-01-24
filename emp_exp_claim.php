<?php include "config.php"; ?>

<script>
function ee1(x) {
    var a = x;
    var c = (a.substr(4));
    e = parseInt(c) + 1;
    document.getElementById('s1' + e).style.display = 'table-row';
}
</script>

<?php include "head.php"; ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include "menu.php"; ?>
            <div class="layout-page">
                <?php include "header.php"; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <button class="btn btn-label-primary">Expense&nbsp;Claim</button>
                                    <a href="exp_claim.php" class="btn btn-outline-warning">
                                        <span class="ti-xs ti ti-eye me-1"></span>View list
                                    </a>
                                </div>
                                <div class="card mb-2 mt-4">
                                    <div class="bs-stepper-content">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div id="fabric_process" class="content">
                                                <div class="table-responsive">
                                                    <table class="table table-border table-hover mt-2">
                                                        <thead class="border-bottom">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th nowrap>Expense Type</th>
                                                                <th nowrap>Expense Date</th>
                                                                <th>Amount</th>
                                                                <th nowrap>Upload Doc</th>
                                                                <th>Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                                                ?>
                                                                <tr>
                                                                    <td style="padding: 0.3rem;">
                                                                        <div align="center"><?php echo $sno; ?></div>
                                                                    </td>

                                                                    <?php 
					$sql2 = "SELECT * FROM employee WHERE id=$user_id";
                    $result2 = mysqli_query($conn, $sql2);
                    $rw2 = mysqli_fetch_array($result2)
					?>

                                                                    <td style="padding: 0.3rem" hidden>
                                                                        <input name="staff[]" id="staff<?php echo $i; ?>" class="form-control" value="<?php echo $user_id;?>" hidden />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <select name="exp_type[]" id="exp_type<?php echo $i; ?>" class="select form-select" required>
                                                                            <option value="">Select</option>
                                                                            <?php
                                                                            $sql = "SELECT * FROM expense";
                                                                            $result = mysqli_query($conn, $sql);
                                                                            while ($rw = mysqli_fetch_array($result)) {
                                                                                ?>
                                                                                <option value="<?php echo $rw['id']; ?>"><?php echo $rw['expense_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td style="padding: 0.3rem" hidden>
                                                                        <input type="date" class="form-control" id="applydate<?php echo $i; ?>" name="applydate[]" value="<?php echo date("Y-m-d");?>" onKeyDown="ee1(this.id);" aria-label="Product barcode" />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="date" class="form-control" id="date<?php echo $i; ?>" name="date[]" value="<?php echo date("Y-m-d");?>" onKeyDown="ee1(this.id);" aria-label="Product barcode" required />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="text" class="form-control" id="amount<?php echo $i; ?>" name="amount[]" aria-label="Product barcode" required />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="file" class="form-control" id="doc<?php echo $i; ?>" name="doc[]" aria-label="Product barcode" />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="text" class="form-control" id="remarks<?php echo $i; ?>" name="remarks[]" aria-label="Product barcode" />
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            for ($i = 1, $sno = 2; $i <= 20; $i++, $sno++) {
                                                                ?>
                                                                <tr id="s1<?php echo $i; ?>" style="display:none">
                                                                    <td style="padding: 0.3rem;">
                                                                        <div align="center"><?php echo $sno; ?></div>
                                                                    </td>
                                                                    <td style="padding: 0.3rem" hidden>
                                                                        <input name="staff[]" id="staff<?php echo $i; ?>" class="form-control" value="<?php echo $user_id;?>" hidden />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <select name="exp_type[]" id="exp_type<?php echo $i; ?>" class="select form-select">
                                                                            <option value="">Select</option>
                                                                            <?php
                                                                            $sql = "SELECT * FROM expense";
                                                                            $result = mysqli_query($conn, $sql);
                                                                            while ($rw = mysqli_fetch_array($result)) {
                                                                                ?>
                                                                                <option value="<?php echo $rw['id']; ?>"><?php echo $rw['expense_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td style="padding: 0.3rem" hidden>
                                                                        <input type="date" class="form-control" id="applydate<?php echo $i; ?>" value="<?php echo date("Y-m-d");?>" name="applydate[]" onKeyDown="ee1(this.id);" aria-label="Product barcode" />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="date" class="form-control" id="date<?php echo $i; ?>" name="date[]" value="<?php echo date("Y-m-d");?>" onKeyup="ee1(this.id);" aria-label="Product barcode" />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="text" class="form-control" id="amount<?php echo $i; ?>" name="amount[]" aria-label="Product barcode" />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="file" class="form-control" id="doc<?php echo $i; ?>" name="doc[]" aria-label="Product barcode" />
                                                                    </td>
                                                                    <td style="padding: 0.3rem">
                                                                        <input type="text" class="form-control" id="remarks<?php echo $i; ?>" name="remarks[]" aria-label="Product barcode" />
                                                                    </td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-12 d-flex justify-content-between">
                                                <a class="btn btn-label-secondary btn-prev" href="home.php">
                                                    <i class="ti ti-home me-sm-1 me-0"></i>
                                                    <span class="align-middle d-sm-inline-block">Home</span>
                                                </a>
                                                <button class="btn btn-success btn-next" name="submit">
                                                    <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
        <?php include "footer.php"; ?>
    </body>

<?php
if (isset($_POST['submit'])) {
    foreach ($_POST['exp_type'] as $key => $val) {
        $staff = $user_id;
        $exp_type = $_POST['exp_type'][$key];
        $date = $_POST['date'][$key];
        $applydate = $_POST['applydate'][$key];
        $amount = $_POST['amount'][$key];
        $remarks = $_POST['remarks'][$key];

        if ($exp_type != '') {
            $p1 = $_FILES['doc']['name'][$key];
            $p_tmp1 = $_FILES['doc']['tmp_name'][$key];
            $path = "uploads/$p1";
            $move = move_uploaded_file($p_tmp1, $path);

            $sql1 = "INSERT INTO exp_claim(staff, exp_type, date, applydate, amount, remarks) VALUES ('$staff', '$exp_type', '$date', '$applydate', '$amount', '$remarks')";
            $result1 = mysqli_query($conn, $sql1);

            if (!$result1) {
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }

    if ($result1) {
        echo "<script>alert('Entry successfully'); window.location='exp_claim.php';</script>";
    } else {
        echo '<script>alert("Something went wrong, data not stored")</script>';
    }
}
?>