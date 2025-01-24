<?php include "config.php"; ?>



  <?php include "head.php"; ?>
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
          <?php
		
    $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=15";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $write_permit = $row['write_access'];
		  
		   $fg1="select max(enq_no) as id from enquiry";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->  

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row ">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Enquiry</button>
                      <a href="enquirylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View List
                          </a>
                    </div>

                <!-- Default Wizard -->
                <br>
                <br>
                <div class="col-12 mb-4">
                  
                  <div class="">
                  <div class="card card-body">
                      <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row g-3">
                          <div class="col-md-3">

                          <label class="form-label" for="ecommerce-product-barcode">job&nbsp;No.&nbsp;<span style="color:red;">*</span></label>
                          <input
                            type="text"
                            class="form-control bg-label-secondary text-dark"
                            id="enq_no"
                            placeholder=""
                            name="enq_no"
                            value="<?php echo $enq; ?>"
                            readonly
                            aria-label="Product barcode" />  
                             </div>
                         <!-- <div class="col-md-3">
                          <label class="form-label" for="formtabs-country">Book&nbsp;No.&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="text"
                              class="form-control"
                              id="pono"
                              placeholder=""
                              name="pono"
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
                              value="<?php echo date("Y-m-d");?>"
                              aria-label="Product barcode" />
                            </div>
                        
                          <div class="col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" style="text-transform:uppercase" onchange="get_party(this.value)" autofocus required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
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
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php }?>
                              </select>  
                          </div>

                        </div>
                         <br>
                         <div class="table-responsive" style="border-none">
                            <table class="table " style="border-none">
                              
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                 
                                   <td style="padding: 0.3rem">
                                   <label class="form-label" for="formtabs-country">Document 1</label>
                                   <input 
                                    name="doct1"
                                    type="file"
                                    id="file1<?php echo $i;?>" 
                                    class="form-control"
                                      >
                                     </td>
               
               <td style="padding: 0.3rem">
               <label class="form-label" for="formtabs-country">Document 2</label>
                 <input 
                                    type="file"
                                    class="form-control"
                                    id="file2<?php echo $i;?>"
                                    name="doct2"
                                    onkeyup="ee2(this.id)"
                                    aria-label="Product barcode"/>     
                       </td>
                  </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=1; $i++, $sno++) {
                                ?>
                      <tr id="s2<?php echo $i; ?>" style="display:none">
                       <td style="padding: 0.3rem">
                       <label class="form-label" for="formtabs-country">Document 3</label>
                                   <input 
                                    name="doct3"
                                    type="file"
                                    id="file3<?php echo $i;?>" 
                                    class="form-control"
                                      >
                                     </td>
               
               <td style="padding: 0.3rem">
               <label class="form-label" for="formtabs-country">Document 4</label>
                 <input 
                                    type="file"
                                    class="form-control"
                                    id="file4<?php echo $i;?>"
                                    name="doct4"
                                    onkeyup="ee2(this.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>
                               
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

                <button onclick="return false"  class="btn btn-label-primary">Item Details</button>
<br>
<br>     
                <div class="card mb-4 pb-0">
                        
                <div class="card-body" style="padding-bottom:0px;">
                        <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>factory&nbsp;Name</th>
                                  <th>location</th>
                                  <th>style&nbsp;no</th>
                                  <th>item&nbsp;desc</th>
                                  <th>color</th>
                                  <th>Size</th>
                                  <th nowrap>order qty</th> 
                                  <th >Unit</th>
                                  <th nowrap>AQL Level</th>
                                  <th nowrap>AQL Limit</th> 
                                 <!--  <th>Price</th> -->
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
                                   <td style="padding: 0.3rem">
                                   <select name="companyname[]" style="width:200px;text-transform:uppercase" id="companyname<?php echo $i;?>"  class="select form-select" onchange=get_factory(this.id,this.value) >
                                <option value="">Select</option>
					
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input style="width:150px"
                                    type="text"
                                    class="form-control"
                                    id="location<?php echo $i;?>"
                                    name="location[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input style="width:100px"
                                    type="text"
                                    class="form-control"
                                    id="styleno<?php echo $i;?>"
                                    name="styleno[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input style="width:200px"
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    name="itemdesc[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input style="width:100px"
                                    type="text"
                                    class="form-control"
                                    id="color<?php echo $i;?>"
                                    name="color[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input style="width:100px"
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                name="size[]"
                                
                                    aria-label="Product barcode"/>  
                </td>
            <td style="padding: 0.3rem">
                 <input style="width:150px"
                                    type="text"
									
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select" style="width:120px" onKeyDown="ee1(this.id);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?>
						 </option>
					<?php } ?>
                              </select>              
                </td>
               <td style="padding: 0.3rem">
                 <input style="width:150px"
                                    type="text"
									
                                    class="form-control"
                                    id="aqllevel<?php echo $i;?>"
                                    name="aqllevel[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
               <td style="padding: 0.3rem">
                 <input style="width:150px"
                                    type="text"
									
                                    class="form-control"
                                    id="aqllimit<?php echo $i;?>"
                                    name="aqllimit[]"
                                    aria-label="Product barcode"/>
                                       
                </td>
              
                  </tr>

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=200; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                             <div align="center"><?php echo $sno;?></div>
                </td>
                <td style="padding: 0.3rem">
                                   <select name="companyname[]" onchange=get_factory(this.id,this.value) style="width:200px;text-transform:uppercase" id="companyname<?php echo $i;?>" class="select form-select"  >
                                <option value="">Select</option>
							
                              </select>
                                       
                </td>
                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="location<?php echo $i;?>"
                                    name="location[]"
                                    aria-label="Product barcode"/>
                                       
                </td>     
                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="styleno<?php echo $i;?>"
                                    name="styleno[]"
                                    aria-label="Product barcode"/>
                                       
                </td>     
                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                    name="itemdesc[]"
                                    aria-label="Product barcode"/>
                                       
                </td>     
                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="color<?php echo $i;?>"
                                    name="color[]"
                                    aria-label="Product barcode"/>
                                       
                </td>     
                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                name="size[]"
                                
                                    aria-label="Product barcode"/>  
                </td> 
            <td style="padding: 0.3rem">
                 <input 
                                    type="text"
									
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select" onKeyDown="ee1(this.id);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM unit_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?>
						 </option>
					<?php } ?>
                              </select>              
                </td>

               <td style="padding: 0.3rem">
                 <input 
                                    type="text"
									
                                    class="form-control"
                                    id="aqllevel<?php echo $i;?>"
                                    name="aqllevel[]"
                                    aria-label="Product barcode"/>
                                       
                </td>

                    <td style="padding: 0.3rem">
                 <input 
                                    type="text"
									
                                    class="form-control"
                                    id="aqllimit<?php echo $i;?>"
                                    name="aqllimit[]"
                                    aria-label="Product barcode"/>
                                       
                </td>             
                                </tr>          
                        <?php
                              }
                              ?>                 
                              </tbody>
                            </table>
                          </div>
                <hr>
              <br>
             
              </div>     </div>
              
				   <div class="col-12 d-flex justify-content-between">
                              <a href="home.php" class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Home</span>
                              </a>
                             
                              <?php if($create_permit==1){ ?>
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                              <?php } else { ?>
                                <button class="btn btn-success" disabled name="submit" value="submit">
                                  <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                                </button>
							                <?php } ?>
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


<?php
if (isset($_POST['submit'])) {

  $enq_no = $_POST['enq_no'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $supplyname = $_POST['supplyname'];
  $pono = $_POST['pono'];
  
  if ($partyname != '') {
    $sql = "INSERT into enquiry (enq_no,date,partyname,supplyname,pono) 
 values ('$enq_no','$date','$partyname','$supplyname','$pono')";
    $result = mysqli_query($conn, $sql);
  }

  $cid = mysqli_insert_id($conn);

  foreach ($_POST['companyname'] as $key => $val) {

    $companyname = $_POST['companyname'][$key];
    $location = $_POST['location'][$key];
    $styleno = $_POST['styleno'][$key];
    $styledesc = $_POST['styledesc'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $color = $_POST['color'][$key];
    $aqllevel = $_POST['aqllevel'][$key];
    $aqllimit = $_POST['aqllimit'][$key];
   
    if ($companyname != '') {
      $sql1 = "INSERT into enquiry1 (cid,companyname,location,styleno,styledesc,size,quantity,unit,itemdesc,color,aqllevel,aqllimit) 
 values ('$cid','$companyname','$location','$styleno','$styledesc','$size','$quantity','$unit','$itemdesc','$color','$aqllevel','$aqllimit')";
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
    if ($p1 != '') {
    $sql2 = "insert into enquiry2 (cid,doct1,doct2,doct3,doct4) values('$cid','$p1','$p2','$p3','$p4')";
    $result2 = mysqli_query($conn, $sql2);
    }

  if ($result) {

  echo "<script>alert('Enquiry Saved Successfully');window.location='enquiry.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


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
var c=(a.substr(5));
e=parseInt(c)+1;

document.getElementById('s2'+e).style.display='table-row';

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
function get_factory(id,value) {
  var c=id.substr(11);
  // alert(c);
  var party=document.getElementById('partyname').value;
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);

  
    $('#location'+c).val(data.location);

}
};
xmlhttp.open("GET","ajax/get_assign2.php?id="+value+"&party="+party,true);
xmlhttp.send();
  }
}
</script> 
