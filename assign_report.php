<?php include "config.php"; ?>

<?php include "head.php"; ?>

<body>
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

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Default -->
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">

                                    <button class="btn btn-label-primary">Asset Report </button>

                                </div> <br>
                                <div class="card mb-2 mt-2">

                                    <form class="card-body" action="assign_report1.php" method="post"
                                        enctype="multipart/form-data">

                                        <!-- Personal Info -->


                                        <!-- Social Links -->
                                        <div class="content">
                                            <div class="row g-2">
                                                <div class="col-md-2">
                                                    <label class="form-label" for="collapsible-fullname">From
                                                        Date&nbsp;<span style="color:red;">*</span></label>
                                                    <input type="date" id="fromdate"
                                                        value="<?php echo date("Y-m-01"); ?>" name="fromdate"
                                                        class="form-control" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label" for="collapsible-fullname">To
                                                        Date&nbsp;<span style="color:red;">*</span></label>
                                                    <input type="date" id="todate" name="todate" class="form-control"
                                                        value="<?php echo date("Y-m-d"); ?>" placeholder="" />
                                                </div>


                                                <div class="col-md-2">
                                                    <label class="form-label"
                                                        for="collapsible-fullname"><b>Type</b></label>
                                                    <select name="type" id="type" class="select form-select"
                                                        onchange="get_items(this.value);">
                                                        <option value="">Select All</option>
                                                        <?php
                                                        $sql = "SELECT * FROM asset_type";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($rw = mysqli_fetch_array($result)) { ?>
                                                            <option value="<?php echo $rw['id']; ?>">
                                                                <?php echo $rw['type']; ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label"
                                                        for="collapsible-fullname"><b>Group</b></label>
                                                    <select name="group_name" id="group_name"
                                                        class="select form-select">
                                                        <option value="">Select All</option>

                                                    </select>
                                                </div>






                                            </div>
                                        </div>

                                </div>



                                <div class="col-12 d-flex justify-content-between">
                                    <a class="btn btn-label-secondary btn-prev" href="home.php">
                                        <i class="ti ti-home me-sm-1 me-0"></i>
                                        <span class="align-middle d-sm-inline-block ">Home</span>
                                    </a>
                                    <button class="btn btn-success ">
                                        <span class="align-middle d-sm-inline-block  me-sm-1">Report</span>
                                        <i class="ti ti-arrow-right me-sm-1 me-0"></i>
                                    </button>
                                </div>

                                </form>


                            </div>
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

        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <?php include "footer.php"; ?>
</body>
<script>
    function get_items(value) {
        //alert(value);




        if (value != "") {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    r = xmlhttp.responseText;
                    //  alert(r);

                    document.getElementById('group_name').innerHTML = r;


                }
            };
            xmlhttp.open("GET", "ajax/get_assgrp.php?id=" + value, true);
            xmlhttp.send();
        }
    }
</script>