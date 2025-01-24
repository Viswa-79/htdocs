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



<?php
		   $fg1="select max(receipt) as id from purchaseentry";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>


  <?php include "head.php"; ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
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
                      <button class="btn btn-label-primary">GRN</button>
                      <a href="purchaseentrylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View GRN
                          </a>
                    </div><br>
              <div class="card mb-2 mt-2" >
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

                              $sql4 = " SELECT * FROM purchaseorder WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                              $purchaseno= $wz1['purchaseno'];
                              $id= $wz1['id'];
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">GRN&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="receipt"
                              name="receipt"
                              readonly
                              value="<?php echo $enq; ?>"
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
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>
                          <div  hidden class="col-md-2">
                            <label  hidden class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input hidden 
                              type="text"
                              id="idm"
                              name="idm"
                              class="form-control"
                              value="<?php echo $id;?>"
                              placeholder="" />
                          </div>
                          
                          <div class="col-md-2"  for="collapsible-fullname">
                            <label class="form-label">Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplier" id="supplier" class="select form-select" data-allow-clear="true"  required>
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster WHERE party_group='Purchase' order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
               <option <?php if($rw['id']==$wz1['supplier']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                                    </select>
                          </div>
                          



                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Payment&nbsp;Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="payment" id="payment" class="select form-select" required>
                                <option value="">Select</option>
                                <option value="CASH">CASH</option>
                                <option value="CREDIT">CREDIT</option>
                                
                              </select>
                            </div>  
                        
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PO&nbsp;No</label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              value="<?php echo $wz1['purchaseno'];?>"
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
                          <!-- <div class="col-md-2"  for="collapsible-fullname">
                            <label class="form-label">Entry&nbsp;Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="type" id="type" class="select form-select" data-allow-clear="true" onchange="get_type(this.value);" required>
                                <option value="">Select</option>
                                <option value="1">Normal</option>
                                <option value="2">Detail</option>
                                
                                                    </select>
                          </div> -->

                          <div class="mb-0"><hr></div>
                      <div class=" mb-2 mt-1">
                        <div class="table-responsive" id="iono">
                        <table class="table table-border  table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                               
                                  <th>Group</th> 
                                  <th>Product&nbsp;Name</th> 
                                  <th>model</th> 
                                  <th>Warrant&nbsp;Date</th> 
                                  <!-- <th>DIA</th> --> 
                                  <th>ORD/BAl&nbsp;QTY</th>
                                  <th>QUANTITY</th>
                                  <th>UNIT</th>
                                  <th>RATE/UNIT</th>
                                  <th>Basic&nbsp;value</TH>
                                  <th>GST&nbsp;(%)</TH>
                                  <th>GST&nbsp;amount</TH>
                                  <th>AMOUNT</TH>

                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0; 
                        $sql14 = " SELECT * FROM purchaseorder1 Where cid='$sid'";
                              $result14 = mysqli_query($conn, $sql14);
                              while ($rw = mysqli_fetch_array($result14))
                        {
                          $quantity= $rw['quantity'];
                          $productname= $rw['productname'];
                      
                          
                        $sql11 = "SELECT *,sum(m.quantity) as qty FROM purchaseentry s left join purchaseentry1 m on s.id=m.cid WHERE s.pono = '$purchaseno' and m.productname='$productname'";
                        $result11 = mysqli_query($conn, $sql11);
                      $row1 = mysqli_fetch_array($result11);   
                    $qty= $quantity - $row1['qty'];       
                   if($qty>0){
                    ?>
                                   
                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
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
                                    />
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    min="0"
                                    class="form-control"
                                    id="warrant_date<?php echo $i;?>"
                                    style="text-align:right;"
                                    name="warrant_date[]"
									                  onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value=<?php echo  $qty; ?>
                                    
                                    />
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    min="0"
                                    class="form-control"
                                    id="rec_quantity<?php echo $i;?>"
                                    style="text-align:right;background-color:#EFF0F6"
                                    name="rec_quantity[]"
									                  onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value=<?php echo  $qty; ?>
                                    
                                    readonly/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                    onkeydown="" 
									                  onkeyUp="tott(rate<?php echo $i;?>.id);get_checkqty(this.id,this.value)"
                                    aria-label="Product barcode"/>
                                       
                </td>
                              </td>  <td style="padding: 0.3rem;">
                              <select name="unit[]"  id="unit<?php echo $i; ?>" class="select form-select" style="width: 110px;">
                                  <option value="">Select</option>
                                   <?php 
					$sql5 = "SELECT * FROM unit_master order by unit asc";
                    $result5 = mysqli_query($conn, $sql5);
                    while($rw5 = mysqli_fetch_array($result5))
					{ ?>
                     <option <?php if($rw5['unit']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw5['unit'];?>"><?php echo $rw5['unit'];?></option>
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
                                    value="<?php echo $rw['rate'];?>"
									    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="value<?php echo $i;?>"
                                    name="value[]"
                                    value="<?php echo $rw['bvalue'];?>"
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="gst<?php echo $i;?>"
                                    name="gst[]"
                                    value="<?php echo $rw['gst'];?>"
                                    onkeyup="tott(rate<?php echo $i;?>.id);"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="gstamount<?php echo $i;?>"
                                    name="gstamount[]"
                                    value="<?php echo $rw['gstamount'];?>"
                                    onkeyup="tott(rate<?php echo $i;?>.id);"
                                    style="text-align:right"
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
									    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    onKeyDown="ee1(this.id);"
                                    value="<?php echo $rw['amount'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
          </tr>
               
                   
                                <?php
                                $sno++;
                                $i++;

          }

                              }

                              ?> 
<input type="text" hidden class="form-control form-control-lg" name="rc" id="rc" value="<?php echo $i;?>">							  
                              </tbody>
                            </table>

                        
                          </div>
                
              </div>
              <br>
              <div class="mb-0"><hr></div>
              <div class="row g-3 mt-2">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Taxable&nbsp;Value</label>
                            <input
                              type="text"
                              id="taxable"
                              name="taxable" 
                              value="<?php echo $wz1['taxable'];?>"
                              style="text-align:right"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">GST Total</label>
                            <input
                              type="text"
                              id="cgst"
                              name="cgst"
                              style="text-align:right"
                              class="form-control"
							  onKeyUp="nn();"
                value="<?php echo $wz1['cgst'];?>"
                              placeholder="" />
                          </div>
                          
                
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Other&nbsp;Charges</label>
                            <input
                              type="text"
                              id="other"
                              name="other"
                              style="text-align:right"
							  onKeyUp="nn();"
                
                              class="form-control"/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Round&nbsp;Off</label>
                            <input
                              type="text"
                              id="round"
                              value="<?php echo $wz1['round'];?>"
                              name="round"
                              style="text-align:right"
							  onKeyUp="nn();"
                              class="form-control"/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Net&nbsp;Value</label>
                            <input
                              type="text"
                              id="net"
                              name="net"
                              value="<?php echo $wz1['net'];?>"
                              style="text-align:right"
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
                              class="form-control"
                              placeholder="" />
                          </div>
                          </div>

 </div>
                  </div>
              </div>    
            
               
            </div>
</div>
                          <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="attendance.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button   <?php  if($create_permit==0){ echo "disabled"; } ?> class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
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


<?php
if (isset($_POST['submit'])) {

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
  $other = $_POST['other'];
  $remarks = $_POST['remarks'];
  
  echo  $sql = "INSERT into purchaseentry (receipt,date,supplier,type,payment,pono,taxable,cgst,round,net,other,remarks,inv_no) values ('$receipt','$date','$supplier','$type','$payment','$pono','$taxable','$cgst','$round','$net','$other','$remarks','$inv_no')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['productgrp'] as $key => $val) {
    
    
    $productgrp = $_POST['productgrp'][$key];
    $productname = $_POST['productname'][$key];
    $warrant_date = $_POST['warrant_date'][$key];
    $value = $_POST['value'][$key];
    $model = $_POST['model'][$key];
    $orderqty = $_POST['orderqty'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $rate = $_POST['rate'][$key];
    $gst = $_POST['gst'][$key];
    $gstamount = $_POST['gstamount'][$key];
    $amount = $_POST['amount'][$key];

    if ($quantity!='' && $quantity!=0 ) {


     echo $sql1 = "INSERT into purchaseentry1 (cid,productgrp,productname,warrant_date,quantity,unit,rate,gst,gstamount,amount,value,orderqty,model) 
 values ('$cid','$productgrp','$productname','$warrant_date','$quantity','$unit','$rate','$gst','$gstamount','$amount','$value','$orderqty','$model')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

 echo "<script>alert('Purchase Entered Successfully');window.location='purchase_orderlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 



  

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
// alert(k2);
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
	  
	  
	   k2=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('amount'+i).value!='')
	{
		
      var r= document.getElementById('amount'+i).value?document.getElementById('amount'+i).value:0;
  
      var k2=(parseFloat)(r)+(parseFloat)(k2);
	  
	//  alert(k);

	   document.getElementById('net').value=k2.toFixed(2);
		
		
	}
	  }
	   k1=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('gstamount'+i).value!='')
	{
		
      var r= document.getElementById('gstamount'+i).value?document.getElementById('gstamount'+i).value:0;
  
      var k1=(parseFloat)(r)+(parseFloat)(k1);
	  
	// alert(k1);

	   document.getElementById('cgst').value=k1.toFixed(2);
		
		
	}
	  }

//nn();



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
	  
	  document.getElementById('net').value=tot.toFixed(2);

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

<script>
function get_type(value) {
// alert(value);
var idm=document.getElementById('idm').value;
var pono=document.getElementById('pono').value;
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);


						  document.getElementById('iono').innerHTML =r;
						
            }
    };
    xmlhttp.open("GET","ajax/get_entry.php?id="+value+"&sid="+idm+"&pono="+pono,true);
    xmlhttp.send();
  }
}
</script>

<script>
  function get_checkqty(id,value){
    var c=id.substr(8);
    // alert(c);
    var orderqty=document.getElementById('rec_quantity'+c).value?document.getElementById('rec_quantity'+c).value:0;
   if(parseFloat(value) > parseFloat(orderqty)){
      alert("Quantity Exceeded Order Quantity.");
      document.getElementById('quantity'+c).value='';
    }
  }
  </script>