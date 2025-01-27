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
function get_product_details(id,value) {
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
<?php
		   $fg1="select max(bookno) as id from material_resource";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
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
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Material List</button>
                      <a href="material_resourcelist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>          
                                
            
               
                
              <div class="card mb-2 mt-3" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    
                      <h4 class="mb-0">Material&nbsp;Resource</h4>
                     
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                              $sql4 = " SELECT * FROM material_resource WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3 mt-2">
                          <div class="col-md-4">
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
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              class="form-control"
                              value="<?php echo $wz1['orderno']; ?>"
                              placeholder="" />
                          </div>
                        </div>
                         
                    </div><br><hr><br>
                      <div class="card mb-2 mt-2">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="text-align:center">S.No</th>
                                 
                                  <th>PARTICULARS</th> 
                                  <th>REQ&nbsp;QTY</th>
                                  <th>EXCESS&nbsp;QTY&nbsp;(%)</th>
                                  <th>EXCESS&nbsp;QTY</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM material_resource1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 


                               <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>

                <td style="padding: 0.3rem;width: 600px;">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select"  >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM product_master order by productname asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['productname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo   $rw1['productname'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>        
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    style="text-align:right"
                                    class="form-control"
                                    id="reqqty"
                                    name="reqqty[]"
                                    value="<?php echo $rw['reqqty']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>                       
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    style="text-align:right"
                                    class="form-control"
                                    id="excess<?php echo $i;?>"
                                    name="excess[]"
                                    value="<?php echo $rw['excess']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    style="text-align:right"
                                    class="form-control"
                                    id="excessqty<?php echo $i;?>"
                                    name="excessqty[]"
                                    value="<?php echo $rw['excessqty']; ?>"
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
                          <a class="btn btn-label-dark " href="material_resourcelist.php">
                                <i class="ti ti-arrow-left"></i>
                                <span class="align-middle d-sm-inline-block  me-sm-1">Preview</span>
                            </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Update</span>
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
</html>


<?php
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];



    $sql = "UPDATE material_resource SET bookno='$bookno',date='$date',orderno='$orderno' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['reqqty'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $productname = $_POST['productname'][$key];
    $reqqty = $_POST['reqqty'][$key];
    $excess = $_POST['excess'][$key];
    $excessqty = $_POST['excessqty'][$key];

    if ($reqqty != '') {
      $sql1 = "UPDATE material_resource1 SET productname='$productname',reqqty='$reqqty',excess='$excess',excessqty='$excessqty' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Stock Inward Updated Successfully');window.location='material_resourcelist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


