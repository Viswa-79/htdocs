<?php include "config.php"; ?>

<script>
function ee1(x)
{
// alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;
document.getElementById('s1'+e).style.display='table-row';
}
</script>

<script>
function get_party(value) {
  // alert(value);
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
  for(var i=0;i<=200;i++)
	 {
   document.getElementById('companyname'+i).innerHTML =r;
   }
 
}
};
xmlhttp.open("GET","ajax/get_assign1.php?id="+value,true);
xmlhttp.send();
  }
}
</script>

<script>
function get_party1(value) {
  // alert(value);
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
// alert(r);
  for(var i=0;i<=200;i++)
	 {
    $('#location'+i).val(data.city);
   }

}
};
xmlhttp.open("GET","ajax/getParty.php?id="+value,true);
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

     $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=15";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $write_permit = $row['write_access'];
		 ?>
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Enquiry</button>
                      <a href="enquirylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View List
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
                      <!-- <div class="line">
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
                      </div> -->
                       
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
                  $party=$rows['partyname'];
                  ?>
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row g-3"><input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $rows['id']; ?>" />

                          <div class="col-md-3">

                          <label class="form-label" for="ecommerce-product-barcode">Job&nbsp;No.&nbsp;<span style="color:red;">*</span></label>
                          <input
                            type="text"
                            class="form-control bg-label-secondary text-dark"
                            id="enq_no"
                            placeholder=""
                            name="enq_no"
                            value="<?php echo $rows['enq_no']; ?>"
                            readonly
                            aria-label="Product barcode" />  
                             </div>
                         <!-- <div class="col-md-3">
                            <label class="form-label" for="collapsible-phone">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              class="form-control"
                              id="pono"
                              placeholder=""
                              name="pono"
                              value="<?php echo $rows['pono']; ?>"
                              aria-label="Product barcode" />
                          </div> -->
                          <div class="col-md-3">
                          <label class="form-label" for="formtabs-country">Job Date&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo $rows['date']; ?>"
                              aria-label="Product barcode" />
                            </div>
                       
                          <div class="col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" onchange="get_party(this.value);get_party1(this.value);" style="text-transform:uppercase">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ 
            
            ?>
                     <option <?php if($rw['id']==$rows['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                            
                          </div>
                          
                          <div class="col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplyname" id="supplyname" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ 
            
            ?>
                     <option <?php if($rw['id']==$rows['supplyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                            
                          </div>
                          

                        </div>
                         
                       <br>
                       <div class="row g-3">
                    
                         <?php
                              $sql44 = " SELECT * FROM enquiry2 where cid='$sid'";
                              $result44 = mysqli_query($conn, $sql44);
                              $rw = mysqli_fetch_array($result44);
                              ?>

<input type="text" hidden  name="fid" id="fid" value="<?php echo $rw['id'];?>"> 

                        <div class="col-sm-6">
                        <label for="formFile" class="form-label">Document 1</label>
                        <input type="text" hidden name="doct11"  value="<?php echo $rw['doct1'];?>"/>
                        <input class="form-control" type="file" id="file1" name="doct1"
                        accept="image/jpeg,image/png,application/pdf">                      
                        <a href="uploads/<?php echo $rw['doct1']; ?>" target="blank"><?php echo $rw['doct1']; ?></a>  
                            </div>
                          
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 2</label>
                        <input type="text" hidden name="doct22"  value="<?php echo $rw['doct2'];?>"/>
                        <input class="form-control" type="file" id="file2" name="doct2" 
  accept="image/jpeg,image/png,application/pdf">  
  <a href="uploads/<?php echo $rw['doct2']; ?>" target="blank"><?php echo $rw['doct2']; ?></a>                      
                            </div>
                          <?php
                         if ($rw['doct3']!=''){
                          ?>
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 3</label>
                        <input type="text" hidden name="doct33"  value="<?php echo $rw['doct3'];?>"/>
                        <input class="form-control" type="file" id="file3" name="doct3" 
  accept="image/jpeg,image/png,application/pdf">  
  <a href="uploads/<?php echo $rw['doct3']; ?>" target="blank"><?php echo $rw['doct3']; ?></a>                      
                            </div>
                          <?php
                         }
                         else{}
                         if ($rw['doct4']!=''){
                          ?>
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Document 4</label>
                        <input type="text" hidden name="doct44"  value="<?php echo $rw['doct4'];?>"/>
                        <input class="form-control" type="file" id="file4" name="doct4" 
  accept="image/jpeg,image/png,application/pdf">  
  <a href="uploads/<?php echo $rw['doct4']; ?>" target="blank"><?php echo $rw['doct4']; ?></a>                      
                            </div>
                          <?php
                          }
                          else{}
                          ?>
 </div>
                             </div>
                        
                </div></div> 
<br>
           
<button  onclick="return false" class="btn btn-label-primary">Item Details</button>
<br>
<br>

                <div class="card mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom">
                      <tr>
                        <th>S.No</th>   
                        <th>factory&nbsp;name</th>
                        <th>location</th>
                        <th>style&nbsp;No</th>
                        <th>item&nbsp;desc</th>
                        <th>color</th>
                        <th>Size</th>
                        <th>order&nbsp;qty</th>
                        <th>Unit</th>
                        <th>Aql&nbsp;level</th>
                        <th>Aql&nbsp;limit</th>
                       
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
                      <td style="text-align:center"><?php echo $sno;?></td>
                    
                  
                      <td style="padding: 0.3rem">
                      <select style="width:200px;text-transform:capitalise" name="companyname[]" id="companyname<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM assignment WHERE partyname='$party' order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['companyname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                                
                              </select></td>
                      <td style="padding: 0.3rem">
                      <input style="width:150px"
                            class="form-control"
                            id="location<?php echo $i;?>"
                            name="location[]"
                            value="<?php echo $rw['location']; ?>"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input style="width:100px"
                            class="form-control"
                            id="styleno<?php echo $i;?>"
                            name="styleno[]"
                            value="<?php echo $rw['styleno']; ?>"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input style="width:200px"
                            class="form-control"
                            id="itemdesc<?php echo $i;?>"
                            name="itemdesc[]"
                            value="<?php echo $rw['itemdesc']; ?>"
                             ></td>
                      <td style="padding: 0.3rem">
                      <input style="width:100px"
                            class="form-control"
                            id="color<?php echo $i;?>"
                            name="color[]"
                            value="<?php echo $rw['color']; ?>"
                             ></td>
                      <td style="padding: 0.3rem">
                      <input style="width:100px"
                            class="form-control"
                            id="size<?php echo $i;?>"
                            name="size[]"
                            value="<?php echo $rw['size']; ?>"
                             ></td>
                        <td style="padding: 0.3rem">
					  <input type="text" 
                      style="width:150px"
                            class="form-control"
                            id="quantity<?php echo $i;?>"
                            name="quantity[]"
                            value="<?php echo $rw['quantity']; ?>"
                               ></td>

                      <td style="padding: 0.3rem;width:130px">
                      <select style="width:120px" name="unit[]" id="unit<?php echo $i;?>"  class="select form-select" onKeyDown="ee1(this.id);">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM unit_master ";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['unit']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select></td>

                               <td style="padding: 0.3rem">
					  <input type="text" 
                      
                            class="form-control"
                            id="aqllevel<?php echo $i;?>"
                            name="aqllevel[]"
                            value="<?php echo $rw['aqllevel']; ?>"
                             style="width:150px"  ></td>
                               <td style="padding: 0.3rem">
					  <input type="text" 
                      
                            class="form-control"
                            id="aqllimit<?php echo $i;?>"
                            name="aqllimit[]"
                            value="<?php echo $rw['aqllimit']; ?>"
                              style="width:150px" ></td>
                            
                                <td> <a href="ajax/del_enquiry_row.php?cid=<?php echo base64_encode($rw['id']);?>">
                                <button type="button" 
                                class="btn btn-link btn-sm text-danger" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="Delete">
                                <i class="fa fa-trash"></i></button>
                              </a></td>

                      </tr>
                      <?php
                            $sno++; $i++;
    }
    $j=$i;
    $sn=$sno;
    for ($i = $j, $sno = $sn; $i <=200; $i++, $sno++) {

      ?>
                  <input type="text" hidden name="rid[]" id="rid" value="">
                  <tr id="s1<?php echo $i; ?>" style="display:none">

                      <td style="text-align:center"><?php echo $sno;?></td>
                    
                  
                      <td style="padding: 0.3rem">
                      <select  name="companyname[]" id="companyname<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM assignment order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                                
                              </select></td>
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="location<?php echo $i;?>"
                            name="location[]"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="styleno<?php echo $i;?>"
                            name="styleno[]"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="itemdesc<?php echo $i;?>"
                            name="itemdesc[]"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="color<?php echo $i;?>"
                            name="color[]"
                            >
                    </td>

                     <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="size<?php echo $i;?>"
                            name="size[]"
                          
                                ></td>
                            
                      <td style="padding: 0.3rem">
					            <input type="text" 
                      
                            class="form-control"
                            id="quantity<?php echo $i;?>"
                            name="quantity[]"
                               ></td>

                      <td style="padding: 0.3rem;width:130px">
                      <select  name="unit[]" id="unit<?php echo $i;?>"  class="select form-select"   onKeyDown="ee1(this.id);">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM unit_master ";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select></td>

                                <td style="padding: 0.3rem">
					            <input type="text" 
                      
                            class="form-control"
                            id="aqllevel<?php echo $i;?>"
                            name="aqllevel[]"
                               ></td>
                                <td style="padding: 0.3rem">
					            <input type="text" 
                      
                            class="form-control"
                            id="aqllimit<?php echo $i;?>"
                            name="aqllimit[]"
                               ></td>
                                

                      </tr>
                 
                            <?php
                          
    }
?>
                    </tbody>
                  </table>
                </div>
                <hr>
                  </div>
                </div>
                
            </div>
                            <div class="col-12 d-flex justify-content-between">
                            <a class="btn btn-label-dark btn-prev" href="enquirylist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Back</span>
                              </a>
                             
                              <?php if ($write_permit==1){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } else { ?>
                              <button class="btn btn-warning btn-next" disabled name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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


<?php
if (isset($_POST['submit'])) {


 
  $cid = $_POST['cid'];
  $fid = $_POST['fid'];
  $enq_no = $_POST['enq_no'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $supplyname = $_POST['supplyname'];
  $pono = $_POST['pono'];

    $sql = "UPDATE enquiry SET enq_no='$enq_no',date='$date',partyname='$partyname',pono='$pono',supplyname='$supplyname' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['companyname'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];
    $companyname = $_POST['companyname'][$key];
    $location = $_POST['location'][$key];
    $styleno = $_POST['styleno'][$key];
    $styledesc = $_POST['styledesc'][$key];
    $quantity = $_POST['quantity'][$key];
    $size = $_POST['size'][$key];
    $unit = $_POST['unit'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $color = $_POST['color'][$key];
    $aqllevel = $_POST['aqllevel'][$key];
    $aqllimit = $_POST['aqllimit'][$key];
   
    if ($styleno != '') {
      if ($rid != '') {
      $sql1 = "UPDATE enquiry1 SET companyname='$companyname',location='$location',styleno='$styleno',styledesc='$styledesc',size='$size',quantity='$quantity',unit='$unit',itemdesc='$itemdesc',color='$color',aqllevel='$aqllevel',aqllimit='$aqllimit' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    }
    else{
      $sql1 = "INSERT into enquiry1 (cid,companyname,styleno,styledesc,size,quantity,unit,itemdesc,color,aqllevel,aqllimit) 
      values ('$cid','$companyname','$styleno','$styledesc','$size','$quantity','$unit','$itemdesc','$color','$aqllevel','$aqllimit')";
           $result1 = mysqli_query($conn, $sql1);
  }
}
  }

  if($_FILES['doct1']['name']!='')
  {

$p1 = $_FILES['doct1']['name'];
$p_tmp1 = $_FILES['doct1']['tmp_name'];
$path = "uploads/$p1";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
$p1=$_REQUEST['doct11'];
} 


if($_FILES['doct2']['name']!='')
  {

$p2 = $_FILES['doct2']['name'];
$p_tmp2 = $_FILES['doct2']['tmp_name'];
$path = "uploads/$p2";
$move = move_uploaded_file($p_tmp2, $path);

}
else
{
$p2=$_REQUEST['doct22'];
} 

  if($_FILES['doct3']['name']!='')
  {

$p3 = $_FILES['doct3']['name'];
$p_tmp1 = $_FILES['doct3']['tmp_name'];
$path = "uploads/$p3";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
$p3=$_REQUEST['doct33'];
} 


if($_FILES['doct4']['name']!='')
  {

$p4 = $_FILES['doct4']['name'];
$p_tmp2 = $_FILES['doct4']['tmp_name'];
$path = "uploads/$p4";
$move = move_uploaded_file($p_tmp2, $path);

}
else
{
$p4=$_REQUEST['doct44'];
} 


    $sql4 = "UPDATE enquiry2 SET doct1='$p1',doct2='$p2',doct3='$p3',doct4='$p4' WHERE id='$fid'";
    $result4 = mysqli_query($conn, $sql4);
    

  if ($result) {

   echo "<script>alert('Enquiry Updated Successfully');window.location='enquirylist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 