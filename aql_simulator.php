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
                      <button class="btn btn-success">AQL Sampling Simulator</button>
                      <!-- <a href="inspect_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Inspection
                          </a> -->
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                      <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quantity</label>
                            <input
                              type="number"
                              id="quantity"
                              name="quantity"
                              min="2"
                              onkeyup="get_calcq(this.value);get_calcq1(this.value);get_calcq2(this.value);get_sample(this.value)"
                              class="form-control"
                              autofocus />
                          </div>
                                        
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Inspection&nbsp;Level</label>
                          <select id="inspect_level" name="inspect_level" class="select form-select" onchange="get_calcq(quantity.value);get_calcq1(quantity.value);get_calcq2(quantity.value);get_sample(quantity.value)"
                          onkeyup="get_calcq(quantity.value);get_calcq1(quantity.value);get_calcq2(quantity.value);get_sample(quantity.value)">
                              <option value="">--SELECT--</option>
                            <optgroup label="General Inspection">
                              <option value="g1">Level 1</option>
                              <option value="g2" selected>Level 2</option>
                              <option value="g3">Level 3</option>
                            </optgroup>
                            <optgroup label="Special Inspection">
                              <option value="s1">S1</option>
                              <option value="s2">S2</option>
                              <option value="s3">S3</option>
                              <option value="s4">S4</option>
                            </optgroup>
                          </select>
                          </div>
                          
                          <!-- <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Sample Code</label>
                            <input
                              type="text"
                              id="size1"
                              name="size1"
                              class="form-control"
                               readonly/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Sample Size</label>
                            <input
                              type="text"
                              id="sample"
                              name="sample"
                              class="form-control"
                               readonly/>
                          </div> -->

                          </div>
                          </div>
                          </div>                       
              </div>
            </div>
              

              <div class="row"> 
                <!-- Critical Defects -->
                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <div class="card card-body">
                      <div class="card-title mb-0" >
                        <h5 class="mb-0" style="text-align:center"><button tabindex=1 onclick="return false" class="btn btn-label-danger">CRITICAL DEFECTS</button></h5>
                      </div>
                      <br>
                      <br>
                      <div class="col-md-12" style="font-size:18px">
                            <label class="form-label" for="collapsible-fullname">Select AQL</label>
                            <select id="critical" name="critical" class="select form-select" onchange="get_calcq(quantity.value);" onkeyup="get_calcq(quantity.value);">
                              <option value="0" selected>Not Allowed</option>
                              <option value="0.065">0.065</option>
                              <option value="0.1">0.1</option>
                              <option value="0.15">0.15</option>
                              <option value="0.25">0.25</option>
                              <option value="0.4">0.4</option>
                              <option value="0.65">0.65</option>
                              <option value="1.0">1.0</option>
                              <option value="1.5">1.5</option>
                              <option value="2.5">2.5</option>
                              <option value="4">4.0</option>
                              <option value="6.5">6.5</option>
                          </select>
                          </div> 
                          
                          <br>
                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname"> Sample Size :</label>
                         <input
                         type="text"
                         class="form-control"
                         id="sample1"
                         tabindex=1
                         name="sample1"
                         value="0"
                         style="border:none"
                         readonly/>
                          </div>

                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname">Access Point :</label>
                         <input
                         type="text"
                         class="form-control text-success"
                         id="ap1"
                         tabindex=1
                         style="border:none"
                         name="ap1"
                         value="0"
                         readonly/>
                          </div>

                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname">Reject Point :</label>
                         <input
                         type="text"
                         class="form-control text-danger"
                         id="rp1"
                         tabindex=1
                         name="rp1"
                         value="1"
                         style="border:none"
                         readonly/>
                          </div>
                  </div>
                  </div>
                </div>
                <!--/ Critical Defects -->

                <!-- Major Defects -->
                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <div class="card card-body">
                      <div class="card-title mb-0" >
                        <h5 class="mb-0" style="text-align:center"><button tabindex=1 onclick="return false" class="btn btn-label-warning">MAJOR DEFECTS</button></h5>
                      </div>
                      <br>
                      <br>
                      <div class="col-md-12" style="font-size:18px">
                            <label class="form-label" for="collapsible-fullname">Select AQL</label>
                            <select id="major" name="major" class="select form-select" onchange="get_calcq1(quantity.value);" onkeyup="get_calcq1(quantity.value);">
                              <option value="0">Not Allowed</option>
                              <option value="0.065">0.065</option>
                              <option value="0.1">0.1</option>
                              <option value="0.15">0.15</option>
                              <option value="0.25">0.25</option>
                              <option value="0.4">0.4</option>
                              <option value="0.65">0.65</option>
                              <option value="1.0">1.0</option>
                              <option value="1.5">1.5</option>
                              <option value="2.5" selected>2.5</option>
                              <option value="4">4.0</option>
                              <option value="6.5">6.5</option>
                          </select>
                          </div> 
                          
                          <br>
                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname"> Sample Size :</label>
                         <input
                         type="text"
                         class="form-control"
                         id="sample2"
                         tabindex=1
                         style="border:none"
                         name="sample2"
                         value="0"
                         readonly/>
                          </div>

                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname">Access Point :</label>
                         <input
                         type="text"
                         class="form-control text-success"
                         id="ap2"
                         tabindex=1
                         name="ap2"
                         style="border:none"
                         value="0"
                         readonly/>
                          </div>

                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname">Reject Point :</label>
                         <input
                         type="text"
                         class="form-control text-danger"
                         id="rp2"
                         tabindex=1
                         name="rp2"
                         style="border:none"
                         value="0"
                         readonly/>
                          </div>
                  </div>
                  </div>
                </div>
                <!--/ Major Defects -->

                <!-- Minor Defects -->
                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <div class="card card-body">
                      <div class="card-title mb-0" >
                        <h5 class="mb-0" style="text-align:center"><button tabindex=1 onclick="return false" class="btn btn-label-success">MINOR DEFECTS</button></h5>
                      </div>
                      <br>
                      <br>
                      <div class="col-md-12" style="font-size:18px">
                            <label class="form-label" for="collapsible-fullname">Select AQL</label>
                            <select id="minor" name="minor" class="select form-select" onchange="get_calcq2(quantity.value);" onkeyup="get_calcq2(quantity.value);">
                              <option value="0">Not Allowed</option>
                              <option value="0.065">0.065</option>
                              <option value="0.1">0.1</option>
                              <option value="0.15">0.15</option>
                              <option value="0.25">0.25</option>
                              <option value="0.4">0.4</option>
                              <option value="0.65">0.65</option>
                              <option value="1.0">1.0</option>
                              <option value="1.5">1.5</option>
                              <option value="2.5">2.5</option>
                              <option value="4" selected>4.0</option>
                              <option value="6.5">6.5</option>
                          </select>
                          </div> 
                          
                          <br>
                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname"> Sample Size :</label>
                         <input
                         type="text"
                         class="form-control"
                         id="sample3"
                         tabindex=1
                         style="border:none"
                         value="0"
                         name="sample3"
                         readonly/>
                          </div>

                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname">Access Point :</label>
                         <input
                         type="text"
                         class="form-control text-success"
                         id="ap3"
                         tabindex=1
                         name="ap3"
                         value="0"
                         style="border:none"
                         readonly/>
                          </div>

                          <br>
                          <div class="col-md-12" style="font-size:16px">
                             <label class="form-label" for="collapsible-fullname">Reject Point :</label>
                         <input
                         type="text"
                         class="form-control text-danger"
                         id="rp3"
                         tabindex=1
                         name="rp3"
                         value="0"
                         style="border:none"
                         readonly/>
                          </div>
                  </div>
                  </div>
                </div>
                <!--/ Minor Defects -->

                 <!-- Sample Size -->
                 <div class="col-xl-6 mb-4 order-2 order-xl-0">
                  <div class="card h-100">
                   <div class="card-body pb-0">
                    <div class="table-responsive">
                    <img style="height:500px;width:600px" src="../assets/img/calc/sample_size.jpeg">
                  </div>
                  </div>
                  </div>
                </div>
                <!--/ Sample Size -->

                <!-- Sample Code -->
                <div class="col-xl-6 mb-4 order-2 order-xl-0">
                  <div class="card h-100">
                    <div class="card-body pb-0">
                      <div class="table-responsive">
                    <img style="height:500px;width:600px" src="../assets/img/calc/sample_code.jpeg">
                  </div>
                    </div>
                  </div>
                </div>
                <!--/ Sample Code -->
              </div>
              
                        </form>
                   
                   
            </div>
            </div>    
            </div>  
        <!-- / Layout page -->
      </div>
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    <?php include 'footer.php';?>
</body>
  
    
      <script>
function get_calcq(value) {

    var value2=document.getElementById('inspect_level').value;
    var value3=document.getElementById('critical').value;
    // alert (value3);
    // var value4=document.getElementById('minor').value;
    // var value5=document.getElementById('major').value;
    // alert(value)
  if (value != "" && value3!=0) {

  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

// $('#size').val(data.size);
$('#sample1').val(data.sample);
$('#ap1').val(data.ap);
$('#rp1').val(data.rp);
// get_calcq1(quantity.value);
// get_calcq2(quantity.value);

}

      }
    };
    xmlhttp.open("GET","ajax/get_calc1.php?ins_id="+value2+"&quantity="+value+"&aql_id="+value3, true);

    xmlhttp.send();
  }
  else{
    $('#ap1').val(0);
    $('#rp1').val(1);
    
  }
}
</script>

      <script>
function get_calcq1(value) {
    var value2=document.getElementById('inspect_level').value;
    var value3=document.getElementById('major').value; 
      //  alert (value3);
    // var value5=document.getElementById('major').value;
    // alert(value)
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

// $('#size').val(data.size);
$('#sample2').val(data.sample);
$('#ap2').val(data.ap);
$('#rp2').val(data.rp);
// get_calcq(quantity.value);
// get_calcq2(quantity.value);

}

      }
    };
    xmlhttp.open("GET","ajax/get_calc1.php?ins_id="+value2+"&quantity="+value+"&aql_id="+value3, true);

    xmlhttp.send();
  }
}
</script>
    
      <script>
function get_calcq2(value) {
    var value2=document.getElementById('inspect_level').value;
    var value3=document.getElementById('minor').value;
      // alert (value3);
    // alert(value)
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

// $('#size').val(data.size);
$('#sample3').val(data.sample);
$('#ap3').val(data.ap);
$('#rp3').val(data.rp);
// get_calcq(quantity.value);
// get_calcq1(quantity.value);

}

      }
    };
    xmlhttp.open("GET","ajax/get_calc1.php?ins_id="+value2+"&quantity="+value+"&aql_id="+value3, true);

    xmlhttp.send();
  }
}
</script>


      <script>
function get_sample(value) {
    var value2=document.getElementById('inspect_level').value;
      // alert (value3);
    // alert(value)
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

// $('#size').val(data.size);
$('#sample1').val(data.sample);

}

      }
    };
    xmlhttp.open("GET","ajax/get_calc.php?ins_id="+value2+"&quantity="+value, true);

    xmlhttp.send();
  }
}
</script>
 
