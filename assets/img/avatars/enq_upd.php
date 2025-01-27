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
function get_item_details(id,value) {
//alert("hello");
  var c=id.substr(6);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#itemdesc'+c).val(data.descr);
$('#label'+c).val(data.label);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#size'+c).val(data.size);
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_party_details(value) {
  
  
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

  $('#currency').val(data.currency);
  
}

}
};
xmlhttp.open("GET","ajax/getParty.php?id="+value,true);
xmlhttp.send();
  }
}
</script> 

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
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Enquiry</button>
                      <a href="enquirylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Enquiry
                          </a>
                    </div><br>
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">ENQUIRY</span>
                            <span class="bs-stepper-subtitle">Basic info for the Order</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#fabric_process" >
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">ITEM DETAILS</span>
                            <span class="bs-stepper-subtitle">Style Details</span>
                          </span>
                        </button>
                      </div><div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#loi">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">DOCUMENT UPLOAD</span>
                            <span class="bs-stepper-subtitle">Upload Indent Doc , Mail Rec</span>
                          </span>
                        </button>
                      </div>
                       
                    <!--  <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>  
                      <div class="step" data-target="#timeaction">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">4</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Time & Action</span>
                            <span class="bs-stepper-subtitle">Time allotment for the Process.</span>
                          </span>
                        </button>
                      </div> -->
                    </div>

                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                    <?php
                    
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM enquiry WHERE id='$sid'";
                  $result =mysqli_query($conn, $sql);
                  $rows=mysqli_fetch_array($result);
                  
                  ?>
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                          <div class="row ">
                            
                              <div class="col-2 mb-4">
                            <label class="form-label" hidden for="ecommerce-product-barcode">ID</label>
                            <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $rows['id']; ?>" />

                            <label class="form-label" for="ecommerce-product-barcode">Enquiry No.&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              class="form-control"
                              id="enq_no"
                              placeholder=""
                              name="enq_no"
                              value="<?php echo $rows['enq_no']; ?>"
                              readonly
                              aria-label="Product barcode" />                            
                          </div>
                          
                              <div class="col-2 mb-4">
                              <label class="form-label" for="formtabs-country">Ref No</label>
                              <input
                              type="text"
                              class="form-control"
                              id="partyref"
                              placeholder=""
                              name="partyref"
                              value="<?php echo $rows['partyref']; ?>"
                              aria-label="Product barcode" />
                            </div>
                              
                              
                              
                          <div class="col-2 mb-4">
                              <label class="form-label" for="formtabs-country">Date&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo $rows['date']; ?>"
                              aria-label="Product barcode" />
                            </div>
                           
                          <div class="col-2 mb-4">
                            <label class="form-label" for="ecommerce-product-barcode">Buyer Name &nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select2 form-select" onchange="get_party_details(this.value);" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$rows['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>

                          <div class="col-2 mb-4">
                          <label class="form-label" for="ecommerce-product-barcode">Currency &nbsp;<span style="color:red;">*</span></label>
                          <select name="currency" id="currency"   class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM currency order by currency asc";
                    $result = mysqli_query($conn, $sql);
                    while($wz1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($wz1['id']==$rows['currency']){ ?> Selected <?php } ?> value="<?php echo $wz1['id'];?>"><?php echo $wz1['currency'];?></option>
                    <?php } ?>
                              </select>
                          </div>
						  <div class="col-2 mb-4">
                            <label class="form-label" for="ecommerce-product-barcode">Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="ordertype" id="ordertype"  class="select2 form-select" data-allow-clear="true">
                                <option value="<?php echo $rows['ordertype']; ?>"><?php echo $rows['ordertype']; ?></option>
                                <option value="Fabrics">Fabrics </option>
                                <option value="Madeups">Madeups</option>
                                
                              </select>
                            </div>    
                        </div>

             
                       <br>
                      
                             </div>
                                <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="card">
                        <div class="table-responsive">
                            <table class="table table-border border-top table-hover">
                              <thead class="border-bottom">
                      <tr>
                        <th>S.No</th>   
                        <th>Item&nbsp;No</th>
                        <th>Item&nbsp;Description</th>
                        <th>Label/Handtag</th>
                        <th>Print</th>
                        <th>Quality</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Price</th>
                       
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                  
                    <?php
                                 $sno=1; $i=0;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM enquiry1 WHERE cid='$sid'";
                  $result =mysqli_query($conn, $sql);
                  while($rw=mysqli_fetch_array($result))
                  {
                  ?>

<input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                  <tr>
                      <!-- FETCHING DATA FROM EACH
                          ROW OF EVERY COLUMN -->
                      <td style="text-align:center"><?php echo $sno;?></td>
                    
                  
                      <td style="padding: 0.3rem"><select style="width:100px" name="itemno[]" id="itemno<?php echo $i;?>" onchange="get_item_details(this.id,this.value);" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM item_master order by code asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['itemno']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['code'];?></option>
                    <?php } ?>
                                
                              </select></td>
                      <td style="padding: 0.3rem"><input 
                            class="form-control"
                            id="itemdesc<?php echo $i;?>"
                            name="itemdesc[]"
                            value="<?php echo $rw['itemdesc']; ?>"
                            rows="3"></input>
</td>
                      <td style="padding: 0.3rem"><input 
                            class="form-control"
                            id="label<?php echo $i;?>"
                            name="label[]"
                            value="<?php echo $rw['label']; ?>"

                            rows="3"></input></td>
                      <td style="padding: 0.3rem"><input 
                            class="form-control"
                            id="print<?php echo $i;?>"
                            name="print[]"
                            value="<?php echo $rw['print']; ?>"

                            rows="3"></input></td>
                      <td style="padding: 0.3rem"><input 
                            class="form-control"
                            id="quality<?php echo $i;?>"
                            name="quality[]"
                            value="<?php echo $rw['quality']; ?>"

                            rows="3"></input></td>
                      <td style="padding: 0.3rem"><input 
                            class="form-control"
                            id="size<?php echo $i;?>"
                            name="size[]"
                            value="<?php echo $rw['size']; ?>"

                            rows="3"></input></td>
                      <td style="padding: 0.3rem">
					  <input type="number" style="text-align:right"
                            class="form-control"
                            id="quantity<?php echo $i;?>"
                            name="quantity[]"
                            value="<?php echo $rw['quantity']; ?>"

                            rows="3"></input></td>
                      <td style="padding: 0.3rem"><input 
                            class="form-control"
                            id="unit<?php echo $i;?>"
                            name="unit[]"
                            value="<?php echo $rw['unit']; ?>"

                            rows="3"></input></td>
                      <td style="padding: 0.3rem;">
					  <input type="text" style="text-align:right"
                            class="form-control"
                            id="price<?php echo $i;?>"
                            name="price[]"
                            value="<?php echo $rw['price']; ?>"
                            onKeyDown="ee1(this.id);"
                            ></input></td>                    
                      </tr>
                 
                            <?php
                            $sno++; $i++;
    }
?>
                    </tbody>
                  </table>
                </div>
              </div><br>
              <div class="row">
              <div class="col-md-6">
                          <label class="form-label" for="formValidationBio"><strong>Cartoon Box size</strong></label>
                          <textarea
                            class="form-control"
                            id="boxsize"
                            name="boxsize"
                            
                            ><?php echo $rows['boxsize']; ?></textarea>
                        </div>
              <div class="col-md-6">
                          <label class="form-label" for="formValidationBio"><strong>Remarks</strong></label>
                          <textarea
                            class="form-control"
                            id="remarks"
                            name="remarks"
                            ><?php echo $rows['remarks']; ?></textarea>
                        </div>
              </div>
                          <br>    
                        </div>
                        
                        <!-- Account Details -->
                        <div id="loi" class="content">
                         <div class="col-12 d-flex justify-content-center border rounded pt-4">
                          <img
                            src="../assets/img/illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            alt="wizard-create-deal"
                            data-app-light-img="illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            data-app-dark-img="illustrations/wizard-create-deal-girl-with-laptop-dark.png"
                            width="650"
                            
                            class="img-fluid" />
                        </div>
                            
                           <br> 

                           
                          <div class="row g-3">
                            <div class="col-sm-6">
                          <?php
                              $sql4 = " SELECT * FROM enquiry2 where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $rw = mysqli_fetch_array($result4);
                                  ?>

<input type="text" hidden name="fid" id="fid" value="<?php echo $rw['id'];?>"> 

                        <label for="formFile" class="form-label">Document 1</label>
                        <input class="form-control" type="file" id="file1" name="doct1"
                        accept="image/jpeg,image/png,application/pdf">                      
                        <a href="uploads/<?php echo $rw['doct1']; ?>" target="blank"><?php echo $rw['doct1']; ?></a>  
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 2</label>
                        <input class="form-control" type="file" id="file2" name="doct2" 
  accept="image/jpeg,image/png,application/pdf">  
  <a href="uploads/<?php echo $rw['doct2']; ?>" target="blank"><?php echo $rw['doct2']; ?></a>                      
                            </div>
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 3</label>
                        <input class="form-control" type="file" id="file3" name="doct3" 
  accept="image/jpeg,image/png,application/pdf">     
  <a href="uploads/<?php echo $rw['doct3']; ?>" target="blank"><?php echo $rw['doct3']; ?></a>                   
                            </div>
                             <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 4</label>
                        <input class="form-control" type="file" id="file4" name="doct4" 
  accept="image/jpeg,image/png,application/pdf">           
  <a href="uploads/<?php echo $rw['doct4']; ?>" target="blank"><?php echo $rw['doct4']; ?></a>             
                            </div>
 </div>
                  </div>
                </div></div> </div>
                            <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-label-secondary btn-prev" href="enquirylist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Preview</span>
                              </a>
                             
                              <button class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div>
                           
                        
                          
                         
                          
                         
                        </form>
                   
            </div>
                <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                         
              
            <!-- / Content -->
            <!-- Footer -->
           
            <!-- / Footer -->
            <div class="content-backdrop fade">
              
            </div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    </div>
    </div>
    </div>
    <!-- footer -->
    <?php include "footer.php" ?>
  </body>
</html>


<?php
if (isset($_POST['submit'])) {


 
  $cid = $_POST['cid'];
  $fid = $_POST['fid'];
  $enq_no = $_POST['enq_no'];
  $partyref = $_POST['partyref'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $currency = $_POST['currency'];
  $ordertype = $_POST['ordertype'];
  $boxsize = $_POST['boxsize'];
  $remarks = $_POST['remarks'];

    $sql = "UPDATE enquiry SET enq_no='$enq_no',partyref='$partyref',date='$date',partyname='$partyname',currency='$currency',ordertype='$ordertype',boxsize='$boxsize',remarks='$remarks' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['itemdesc'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];
    $itemno = $_POST['itemno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $label = $_POST['label'][$key];
    $print = $_POST['print'][$key];
    $quality = $_POST['quality'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $price = $_POST['price'][$key];
   
    if ($itemno != '') {
      $sql1 = "UPDATE enquiry1 SET itemno='$itemno',itemdesc='$itemdesc',label='$label',print='$print',quality='$quality',size='$size',quantity='$quantity',unit='$unit',price='$price' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
  }

    $p1 = $_FILES['doct1']['name'];
    $p_tmp1 = $_FILES['doct1']['tmp_name'];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);
  
    $p2 = $_FILES['doct2']['name'];
    $p_tmp2 = $_FILES['doct2']['tmp_name'];
    $path = "uploads/$p2";
    $move = move_uploaded_file($p_tmp2, $path);
   
    $p3 = $_FILES['doct3']['name'];
    $p_tmp3 = $_FILES['doct3']['tmp_name'];
    $path = "uploads/$p3";
    $move = move_uploaded_file($p_tmp3, $path);
  
    $p4 = $_FILES['doct4']['name'];
    $p_tmp4 = $_FILES['doct4']['tmp_name'];
    $path = "uploads/$p4";
    $move = move_uploaded_file($p_tmp4, $path);
   
    $sql4 = "UPDATE enquiry2 SET doct1='$p1',doct2='$p2',doct3='$p3',doct4='$p4' WHERE id='$fid'";
    $result4 = mysqli_query($conn, $sql4);
    

  if ($result) {

   echo "<script>alert('Enquiry Updated successfully');window.location='enquirylist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 