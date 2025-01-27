<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(4));
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
function get_item_details(id,value) {
  var c=id.substr(6);
  
  
   var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){


$('#pono'+c).val(data.pono);  
$('#itemdesc'+c).val(data.descr);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#size'+c).val(data.size);
$('#quantity'+c).val(data.quantity);
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>
<?php
$fg1="select max(id) as id from sample1";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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
                      <button class="btn btn-label-primary">Fabric</button>
                      <a href="fabric_computationlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Fabric
                          </a>
                    </div>  <br>         
                                
              <div class="row">
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">FABRIC DETAILS</h5>
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        
                        <!-- Social Links -->
                        <div id="fabric_p<?php
                              $sql4 = " SELECT * FROM fabric_computation WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>rocess" class="content">
                        <div class="row g-3">
                        <div class="col-md-3">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="bookno"
                              name="bookno"
                              readonly
                              value="<?php echo $wz1['bookno']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              class="form-control"
                              
                              value="<?php echo $wz1['orderno']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Item&nbsp;No</label>
                            <input
                              type="text"
                              id="itemno"
                              name="itemno"
                              class="form-control"
                              value="<?php echo $wz1['itemno']; ?>"
                              placeholder="" />
                          </div>
                         
                         
                          </div><br><hr><br>
                        <div class="card">
                        
                        <div class="table-responsive">

                            <table class="table table-border  table-hover">
                            <thead class="border-bottom">
                                <tr>
                                <th style="width:50px">S.No</th>
                                  <th>Cut&nbsp;Pannel&nbsp;Name</th>
                                  <th >Color</th>
                                  <th>width</th>
                                  <th>length</th> 
                                  <th>Take&nbsp;Fabric&nbsp;Inches</th>
                                  <th>Allot&nbsp;Fabric&nbsp;width&nbsp;Inches</th>
                                  <th>No&nbsp;Of&nbsp;Bits</th> 
                                  <th>consumption</th> 
                                  <th>Quantity</th>
                                  <th>Total&nbsp;Meters</th>
                                  <th>Fabric&nbsp;Process</th>
                                  <th>Printing</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM fabric_computation1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?>
                                <tr>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                
                                  <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pannelname<?php echo $i;?>"
                                    name="pannelname[]"
                                    value="<?php echo $rw['pannelname']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                   style="width:100px"
                                    class="form-control"
                                    id="color<?php echo $i;?>"
                                    name="color[]"
                                    value="<?php echo $rw['color']; ?>"
                                    aria-label="Product barcode"/>
                                       
                                    <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="width<?php echo $i;?>"
                                    name="width[]"
                                    value="<?php echo $rw['width']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="length<?php echo $i;?>"
                                    name="length[]"
                                    value="<?php echo $rw['length']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="takefabric"
                                    name="takefabric[]"
                                    value="<?php echo $rw['takefabric']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="allotfabric<?php echo $i;?>"
                                    name="allotfabric[]"
                                    value="<?php echo $rw['allotfabric']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="bits<?php echo $i;?>"
                                    name="bits[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['bits']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>       
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                    name="consumption[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['consumption']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>         
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    min="0"
                                    id="quantity<?php echo $i;?>"
                                    name="quantity[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalmeters<?php echo $i;?>"
                                    name="totalmeters[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['totalmeters']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="process<?php echo $i;?>"
                                    name="process[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['process']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>   <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="printing<?php echo $i;?>"
                                    name="printing[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['printing']; ?>"
									onkeyUp="tott(printing<?php echo $i;?>.id);"
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
                 </div><br>
                  </div>
                </div>
                          </div>
             
                         <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="fabric_computationlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
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
</html>


<?php
if (isset($_POST['submit'])) {
  $cid =$_POST['cid'];
  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];
  $itemno = $_POST['itemno'];

  $sql = "UPDATE fabric_computation SET bookno='$bookno',date='$date',orderno='$orderno',itemno='$itemno' WHERE id='$cid'";
  $result = mysqli_query($conn, $sql);


  foreach ($_POST['pannelname'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
    $pannelname = $_POST['pannelname'][$key];
    $color = $_POST['color'][$key];
    $width = $_POST['width'][$key];
    $length = $_POST['length'][$key];
    $takefabric = $_POST['takefabric'][$key];
    $allotfabric = $_POST['allotfabric'][$key];
    $bits = $_POST['bits'][$key];
    $consumption = $_POST['consumption'][$key];
    $quantity = $_POST['quantity'][$key];
    $totalmeters = $_POST['totalmeters'][$key];
    $process = $_POST['process'][$key];
    $printing = $_POST['printing'][$key];

    
    
    
    $sql1 = "UPDATE  fabric_computation1 SET cid='$cid',pannelname='$pannelname',color='$color',width='$width',length='$length',takefabric='$takefabric',allotfabric='$allotfabric',bits='$bits',consumption='$consumption',quantity='$quantity',totalmeters='$totalmeters',process='$process',printing='$printing'  WHERE id='$rid'";
    $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Fabric Computation Updated successfully');window.location='fabric_computationlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
