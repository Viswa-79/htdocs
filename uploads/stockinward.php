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
  var c=id.substr(11);
  //alert(c);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

$('#price'+c).val(data.price);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<?php
		   $fg1="select max(receipt) as id from stockinward";
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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Stock Inward</button>
                      <a href="stockinwardlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View list
                          </a>
                    </div>
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Receipt&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="receipt"
                              name="receipt"
                              readonly
                              value="<?php echo $enq; ?>"
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
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>
                          <div class="col-md-4">
                            <label  class="form-label" for="collapsible-fullname">Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplier" id="supplier" class="select form-select" data-allow-clear="true" autofocus required>
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster WHERE party_group='Purchase' Order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                                                    </select>
                          </div>
                        </div><br><hr>  
                        <div class="row g-3"> 
                      <div class="card mb-2 mt-4">
                        <div class="table-responsive">
                            <table class="table table-border  table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th>S.No</th>
                                  <th>PARTICULARS</th> 
                                  <th>QTY</th>
                                  <th>UNIT</th>
                                  <th>PRICE</th>
                                  <th>GST&nbsp;%</th>
                                  <th>AMOUNT</th>
                                  
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
                </td>
                <td style="padding: 0.3rem">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select" onchange="get_product_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                       
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select">
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM unit_master order by unit asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                    name="price[]"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="gstno<?php echo $i;?>"
                                    name="gstno[]"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                    name="amount[]"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
          </tr>
                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                                  
                <td style="padding: 0.3rem">
                <select name="productname[]" id="productname<?php echo $i;?>" class="select form-select" onchange="get_product_details(this.id,this.value);" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_master order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['productname'];?></option>
                    <?php } ?>
                </select>            
                </td>
               
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    style="text-align:right"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    name="quantity[]"
                                    aria-label="Product barcode"/>
                                       
                    </td>


                    <td style="padding: 0.3rem">
                <select name="unit[]" id="unit<?php echo $i;?>" class="select form-select">
                                <option value="">Select</option>
							<?php 
					$sql3 = "SELECT * FROM unit_master order by unit asc";
                    $result3 = mysqli_query($conn, $sql3);
                    while($rw = mysqli_fetch_array($result3))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="price<?php echo $i;?>"
                                    name="price[]"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="gstno<?php echo $i;?>"
                                    name="gstno[]"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>



                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                    name="amount[]"
                                    onKeyDown="ee1(this.id);"
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
              <hr>
              <div class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Sub&nbsp;Total</label>
                            <input
                              type="text"
                              id="subtotal"
                              name="subtotal"
                              style="text-align:right"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Other&nbsp;Charges</label>
                            <input
                              type="text"
                              id="othercharges"
                              name="othercharges"
                              style="text-align:right"
                              class="form-control"
                              placeholder="" />
                          </div>
                          
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Net&nbsp;Total</label>
                            <input
                              type="text"
                              id="nettotal"
                              style="text-align:right"
                              name="nettotal"
                              class="form-control"/>
                          </div>
                          </div>
                          </div>

                          </div>
                  </div>
              </div>    
              </div>
               


                          <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span>
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
</html>


<?php
if (isset($_POST['submit'])) {

  $receipt = $_POST['receipt'];
  $date = $_POST['date'];
  $supplier = $_POST['supplier'];
  $subtotal = $_POST['subtotal'];
  $othercharges = $_POST['othercharges'];
  $nettotal = $_POST['nettotal'];
  
    $sql = "INSERT into stockinward (receipt,date,supplier,subtotal,othercharges,nettotal)
    values ('$receipt','$date','$supplier','$subtotal','$othercharges','$nettotal')";
    $result = mysqli_query($conn, $sql);
  
    $sq="select max(id) as id from stockinward";
		$res = mysqli_query($conn,$sq);
		$rw = mysqli_fetch_array($res);
		$cid=$rw['id'];

  foreach ($_POST['quantity'] as $key => $val) {
    
    
    $productname = $_POST['productname'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $price = $_POST['price'][$key];
    $gstno = $_POST['gstno'][$key];
    $amount = $_POST['amount'][$key];

    if ($quantity != '') {
     $sql1 = "INSERT into stockinward1 (cid,productname,quantity,unit,price,gstno,amount) 
 values ('$cid','$productname','$quantity','$unit','$price','$gstno','$amount')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

echo "<script>alert('Stock Inward Registered successfully');window.location='stockinward.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


