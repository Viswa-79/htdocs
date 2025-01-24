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


<script language="javascript" type="text/javascript">


function tott(v1)
{


//alert(v1);

a=v1;
b=(a.substr(4));


        var t=document.getElementById('quantity'+b).value?document.getElementById('quantity'+b).value:0;

		var v=document.getElementById('rate'+b).value?document.getElementById('rate'+b).value:0;

        var tt=parseFloat(t)*parseFloat(v);
		
		document.getElementById('value'+b).value=tt.toFixed(2);
		
		var v=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
var k2=(parseFloat)(tt)/100*(parseFloat)(v);
document.getElementById('gstamount'+b).value=k2.toFixed(2);
var k3=(parseFloat)(tt)+(parseFloat)(k2);
//alert(k2);
document.getElementById('amount'+b).value=k3.toFixed(2);

var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;

  k=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('value'+i).value!='')
	{
		
      var r= document.getElementById('value'+i).value?document.getElementById('value'+i).value:0;
  
      var k=(parseFloat)(r)+(parseFloat)(k);
	  
	//  alert(k);
	   document.getElementById('taxable').value=k.toFixed(2);
		
		
	}
	  }
	  
	  
	   k=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('amount'+i).value!='')
	{
		
      var r= document.getElementById('amount'+i).value?document.getElementById('amount'+i).value:0;
  
      var k=(parseFloat)(r)+(parseFloat)(k);
	  
	//  alert(k);

	   document.getElementById('net').value=k.toFixed(2);
		
		
	}
	  }

    p=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('gstamount'+i).value!='')
	{
		
      var r1= document.getElementById('gstamount'+i).value?document.getElementById('gstamount'+i).value:0;
  
      var p=(parseFloat)(r1)+(parseFloat)(p);
	  
	 //alert(k6);

	   document.getElementById('cgst').value=p.toFixed(2);
		
     
		
	}
	  }
nn();



}
</script>
<script language="javascript" type="text/javascript">

function nn()
{

        var t1=document.getElementById('taxable').value?document.getElementById('taxable').value:0;
        var cgst=document.getElementById('cgst').value?document.getElementById('cgst').value:0;
		
		var roundoff=document.getElementById('round').value?document.getElementById('round').value:0;
		var other=document.getElementById('other').value?document.getElementById('other').value:0;
		
      

      var tot=parseFloat(t1)+parseFloat(cgst)+parseFloat(roundoff)+parseFloat(other);
	  
	  document.getElementById('net').value=tot;

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
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">GRN</button>
                      <a href="purchaseentrylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View GRN
                          </a>
                    </div>          
                                
            
               
                
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
              
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=25";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $read_permit = $row['read_access'];
                     $write_permit = $row['write_access'];
                     $delete_permit = $row['delete_access'];

                              $sql4 = " SELECT * FROM purchaseentry WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Receipt&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="receipt"
                              name="receipt"
                              readonly
                              value="<?php echo $wz1['receipt']; ?>"
                              class="form-control"
                              style="background-color:#EFF0F6"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>

                          


                          <div class="col-md-2">
                            <label class="form-label">Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplier" id="supplier" class="select form-select" data-allow-clear="true" required>
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Purchase' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['supplier']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                        <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Payment&nbsp;Type</label>
                            <select name="payment" id="payment" class="select form-select" data-allow-clear="true">
                            <option value="">Select</option> 
                                <option value="CASH" <?php if($wz1['payment']=='CASH'){ ?>Selected<?php } ?> >CASH</option>
                                <option value="CREDIT" <?php if($wz1['payment']=='CREDIT'){ ?>Selected<?php } ?> >CREDIT </option>   
                              </select>
                            </div>  
 
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Po&nbsp;No</label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              value="<?php echo $wz1['pono']; ?>"
                              readonly
                              class="form-control"
                              style="background-color:#EFF0F6"/>
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Invoice&nbsp;No</label>
                            <input
                              type="text"
                              id="inv_no"
                              name="inv_no"
                              value="<?php echo $wz1['inv_no']; ?>"
                              
                              class="form-control"/>
                          </div>

                          <div class="col-md-2"  for="collapsible-fullname">
                            <label class="form-label">Product&nbsp;Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="type" id="type" class="select form-select" data-allow-clear="true"  onchange="get_items(this.value);" required>
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM asset_type order by id asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
               <option <?php if($rw['id']==$wz1['type']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['type'];?></option>
                    <?php } ?>
                                                    </select>
                          </div>



                        </div><br>
                        
                        <div class="mb-0"><hr></div>
                      <div class=" mb-2 mt-4">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Group</th> 
                                  <th>Product&nbsp;Name</th> 
                                  <th>model</th> 
                                  <th>Warrant&nbsp;Date</th> 
                                  <th>quantity</th> 
                                  <th>UNIT</th>
                                  <th>RATE/UNIT</th>
                                  <th>basic&nbsp;value</th>
                                  <th>gst&nbsp;(%)</th>
                                  <th>gst&nbsp;amount</th>
                                  <th>AMOUNT</TH>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM purchaseentry1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 


                               <td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>


                <td style="padding: 0.3rem;width: 230px;">
                <select name="productgrp[]"  id="productgrp<?php echo $i;?>" class="select form-select"  onchange="get_items1(this.id,this.value);" >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM asset_group order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['productgrp']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['group_name'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>


                
                <td style="padding: 0.3rem;width: 230px;">
                <select name="productname[]"  id="productname<?php echo $i;?>" class="select form-select"  >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM asset_master order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['productname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['asset_name'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>
                   
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="model<?php echo $i;?>"
                                    style="text-align:left;text-transform:uppercase;width:200px"
                                    name="model[]"
                                    value="<?php echo $rw['model']; ?>"
                                    />
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="warrant_date<?php echo $i;?>"
                                    name="warrant_date[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['warrant_date']; ?>"
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                   
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    name="quantity[]"
                                    style="text-align:right"
                                    
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $rw['quantity']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                         
                <td style="padding: 0.3rem;width:130px;">
                <select name="unit[]"  id="unit<?php echo $i;?>" class="select form-select" style="width:120px">
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM unit_master order by unit asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['unit']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="rate<?php echo $i;?>"
                                    name="rate[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['rate']; ?>"
									 onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="value<?php echo $i;?>"
                                    name="value[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['value']; ?>"
									 onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="gst<?php echo $i;?>"
                                    name="gst[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['gst']; ?>"
									 onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    style="text-align:right"
                                    step="0.01"
                                    class="form-control"
                                    id="gstamount<?php echo $i;?>"
                                    name="gstamount[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['gstamount']; ?>"
									 onkeyUp="tott(rate<?php echo $i;?>.id);"
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
                                    style="text-align:right"
                                    value="<?php echo $rw['amount']; ?>"
									 onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>            
          </tr>
                        
                <?php
                            $sno++; $i++;
    }
?>  
<input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">            
                              </tbody>
                            </table>
                          </div>
                
              </div>
              <br>
              <div class="mb-0"><hr></div>
              <div class="row g-3 mt-2">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Total&nbsp;Value</label>
                            <input
                              type="text"
                              id="taxable"
                              style="text-align:right"
                              name="taxable"
                              value="<?php echo $wz1['taxable']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">GST&nbsp;Total</label>
                            <input
                              type="text"
                              id="cgst"
                              name="cgst"
                              style="text-align:right"
                              value="<?php echo $wz1['cgst']; ?>"
                              class="form-control"
							  onKeyUp="nn();"
                              placeholder="" />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Other&nbsp;Charges</label>
                            <input
                              type="text"
                              id="other"
                              style="text-align:right"
                              name="other"
                              value="<?php echo $wz1['other']; ?>"
							  onKeyUp="nn();"
                              class="form-control"/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Round&nbsp;Off</label>
                            <input
                              type="text"
                              id="round"
                              style="text-align:right"
                              name="round"
                              value="<?php echo $wz1['round']; ?>"
							  onKeyUp="nn();"
                              class="form-control"/>
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Net&nbsp;Value</label>
                            <input
                              type="text"
                              id="net"
                              style="text-align:right"
                              name="net"
                              value="<?php echo $wz1['net']; ?>"
							  onKeyUp="nn();"
                              class="form-control"/>
                          </div>
                          
                          
                          </div>


                          <div class="row g-3 mt-2">
                          
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <input
                              type="text"
                              id="remarks"
                              name="remarks"
                             
                              value="<?php echo $wz1['remarks']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          </div>


 </div>
                  </div>
              </div>    
            
                          <br><div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="purchaseentrylist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Preview</span>
                              </a>
                             
                              <button   <?php  if($write_permit==0){ echo "disabled"; } ?> class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block me-sm-1">Update</span>
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

  $cid = $_POST['cid'];
  $receipt = $_POST['receipt'];
  $date = $_POST['date'];
  $supplier = $_POST['supplier'];
  $type = $_POST['type'];
  $payment = $_POST['payment'];
  $pono = $_POST['pono'];
  $inv_no = $_POST['inv_no'];
  $taxable = $_POST['taxable'];
  $cgst = $_POST['cgst'];
  $round = $_POST['round'];
  $net = $_POST['net'];
  $remarks = $_POST['remarks'];
  $other = $_POST['other'];


   $sql = "UPDATE purchaseentry SET receipt='$receipt',date='$date',supplier='$supplier',type='$type',payment='$payment',taxable='$taxable',cgst='$cgst',round='$round',net='$net',pono='$pono',remarks='$remarks',other='$other',inv_no='$inv_no' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['productname'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $productgrp = $_POST['productgrp'][$key];
    $productname = $_POST['productname'][$key];
    $warrant_date = $_POST['warrant_date'][$key];
    $model = $_POST['model'][$key];
    $quantity = $_POST['quantity'][$key];
    $value = $_POST['value'][$key];
    $gst = $_POST['gst'][$key];
    $gstamount = $_POST['gstamount'][$key];
    $unit = $_POST['unit'][$key];
    $rate = $_POST['rate'][$key];
    $amount = $_POST['amount'][$key];

     $sql1 = "UPDATE purchaseentry1 SET productgrp='$productgrp',productname='$productname',warrant_date='$warrant_date',value='$value',gst='$gst',gstamount='$gstamount',quantity='$quantity',unit='$unit',rate='$rate',amount='$amount',model='$model' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Purchase Updated Successfully');window.location='purchaseentrylist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 



<script>
  function get_checkqty(id,value){
    var c=id.substr(8);
    // alert(c);
    var orderqty=document.getElementById('orderqty'+c).value?document.getElementById('orderqty'+c).value:0;
   if(parseFloat(value) > parseFloat(orderqty)){
      alert("Quantity Exceeded Order Quantity.");
      document.getElementById('quantity'+c).value='';
    }
  }
  </script>
  <script>
function get_items(value) {
// alert(value);



  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
  for (var i=0;i<=20;i++){
						  document.getElementById('productgrp'+i).innerHTML = r;
  }

      }
    };
    xmlhttp.open("GET","ajax/get_assgrp.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items1(id,value) {
//  alert(value);

var c=(id.substr(10));


  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('productname'+c).innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_assname.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>