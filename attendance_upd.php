<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>
<script>
function ee2(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;

document.getElementById('s2'+e).style.display='table-row';

}

</script>
<script>
function get_process_details(id,value) {
//alert("hello");
  var c=id.substr(11);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_qty_details(value) {
//alert("hello");
  
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

$('#orderqty').val(data.qty);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_ordqty.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<script>
  function calcdays(id){
    var c=id.substr(9);
    var startDate=document.getElementById('startdate'+c).value?document.getElementById('startdate'+c).value:0;
    var days=parseInt(document.getElementById('days'+c).value?document.getElementById('days'+c).value:0);


 // Convert the input string to a Date object
  const startDateObject = new Date(startDate);

  // Calculate the end date by adding the number of days
  const endDateObject = new Date(startDateObject.getTime() + days * 24 * 60 * 60 * 1000);

  // Format the end date as a string (you can adjust the format as needed)
  const endDateString = endDateObject.toISOString().split('T')[0];

  //alert(endDateString);
  
    document.getElementById('enddate'+c).value=endDateString;

  }
  </script>

<script>
function get_order_check(value) {
//alert(value);
var form='action_form';
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

var sts = xmlhttp.responseText;

//alert(sts);

             if(sts==0)
            {
              alert("T & A Already Made For This Order No.!");
              document.getElementById('orderno').value='';
            }
            else if(sts==2)
            {
              alert("Order No. Not Available.!");
              document.getElementById('orderno').value='';
            }
      }
    };
    xmlhttp.open("GET","ajax/get_order_check.php?id="+value+"&q="+form,true);
    xmlhttp.send();
  }
}
</script>



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
              <?php
		 $sid=base64_decode($_GET['cid']);
     $dt=date('d-m-Y',strtotime($sid));
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Attendance&nbsp;Report</button>
                      <a href="attendance_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>          
                                
              <div class="card mb-2 mt-3" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                   
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <button type="button" class="btn btn-primary">
                            Date
                            <span style="padding-left:50px;padding-right:50px;text-align:center" class="badge bg-white text-primary badge-center ms-2"><?php echo $dt; ?></span>

                          </button>
                       
                        <!-- Social Links -->
                      <div >
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="text-align:center">S.No</th>
                                  <th>emp&nbsp;id</th> 
                                  <th>emp&nbsp;name</th> 
                                  <!-- <th>DAte</th> -->
                                  <th>shift</th>
                                  <th>in&nbsp;time</th>
                                  <th>out&nbsp;time</th>
                                  <th>work&nbsp;duration</th>
                                  <th>ot</th>
                                  <th>total&nbsp;hours</th>
                                  <!-- <th>status</th> -->
                                  <th>remarks</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT *,n.id as eid,n.empid as eid1,m.ot as ot FROM attendance_report m left join employee n on m.emp=n.id where dates='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                             $status=$rw['status'];
                             $workdur=$rw['workdur'];
                             $emp1=$rw['eid1'];
                             $emp=$rw['emp'];
                             $wh=$rw['workdur'];
                             $th=$rw['tothrs']; 
                            


                                if($workdur > 0 )
               {
                   $status="Present";
                   $clr="rgb(39 191 107)";
            }
           
              else 
               {
                $status = "Absent";
                $clr="rgb(234 84 85)";
               } 
            
               
                             
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['emp'];?>"> 


                               <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id=""
                                    name=""
                                    readonly
                                   value="<?php echo $emp1;?>"
                                    aria-label="Product barcode"/>
                                       
                 <input
                                    type="text"
                                    class="form-control"
                                    id="emp<?php echo $i;?>"
                                    name="emp[]"
                                    readonly hidden
                                   value="<?php echo $emp;?>"
                                    aria-label="Product barcode"/>
                                       
                </td>                       
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="empname<?php echo $i;?>"
                                    name="empname[]"
                                    readonly
                                    value="<?php echo $rw['name'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>                       
                                  
                <!-- <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="dates<?php echo $i;?>"
                                    name="dates[]"
                                    value="<?php echo $rw['dates'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   -->
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="shift<?php echo $i;?>"
                                    name="shift[]"
                                    readonly
                                    style="width:100px"
                                    value="<?php echo $rw['shift'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem">
                 <input
                                    type="time"
                                    class="form-control"
                                    id="intime<?php echo $i;?>"
                                    name="intime[]"
                                    style="width:120px;"
                                    value="<?php echo $rw['intime'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem">
                 <input
                                    type="time"
                                    class="form-control"
                                    id="outtime<?php echo $i;?>"
                                    name="outtime[]"
                                    style="width:120px"
                                    value="<?php echo $rw['outtime'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="workdur<?php echo $i;?>"
                                    name="workdur[]"
                                    style="text-align:left"
                                    value="<?php echo $wh;?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="ot<?php echo $i;?>"
                                    name="ot[]"
                                    style="width:100px"
                                    value="<?php echo $rw['ot'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="tothrs<?php echo $i;?>"
                                    name="tothrs[]"
                                    style="text-align:center"
                                    value="<?php echo $th;?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
                <!-- <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="status<?php echo $i;?>"
                                    name="status[]"
                                    style="color:white;background-color:<?php echo $clr;?>"
                                    value="<?php echo $status;?>"
                                    aria-label="Product barcode"/>
                </td>           -->
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="remarks<?php echo $i;?>"
                                    name="remarks[]"
                                    style="width: 200px;"
                                    value="<?php echo $rw['remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>          
               
          </tr>
                        
                <?php
                            $sno++; $i++;
    }
?>              
                              </tbody>
                            </table>
                          </div>
                
              </div>
 </div>
                  </div>
              </div>    
            
                          <br><div class="col-12 d-flex justify-content-between">
                          <a class="btn btn-label-dark " href="attendance_list.php">
                                <i class="ti ti-arrow-left"></i>
                                <span class="align-middle d-sm-inline-block  me-sm-1">Preview</span>
                            </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div>    
                        </div>
                        </form>
                   
               
            </div>
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


<?php
if (isset($_POST['submit'])) {

  
  foreach ($_POST['empname'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $emp = $_POST['emp'][$key];
    $empname = $_POST['empname'][$key];
    // $dates = $_POST['dates'][$key];
    $shift = $_POST['shift'][$key];
    $intime = $_POST['intime'][$key];
    $outtime = $_POST['outtime'][$key];
    $workdur = $_POST['workdur'][$key];
    // $ot = $_POST['ot'][$key];
    $tothrs = $_POST['tothrs'][$key];
    $status = $_POST['status'][$key];
    $remarks = $_POST['remarks'][$key];
    
      $sql1 = "UPDATE attendance_report SET emp='$emp',empname='$empname',shift='$shift',intime='$intime',outtime='$outtime',workdur='$workdur',tothrs='$tothrs',status='$status',remarks='$remarks' where emp='$rid' and dates='$sid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result1) {

  echo "<script>alert('Attendance Updated Successfully');window.location='attendance_list.php';</script>";

  } else {
   echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


