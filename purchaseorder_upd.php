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
// alert(t);
		var v1=document.getElementById('rate'+b).value?document.getElementById('rate'+b).value:0;

        var tt=parseFloat(t)*parseFloat(v1);
		
        document.getElementById('bvalue'+b).value=tt.toFixed(2);
        
        var v=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
        // alert(v);
var k2=(parseFloat)(tt)/100*(parseFloat)(v);
document.getElementById('gstamount'+b).value=k2.toFixed(2);
var k3=(parseFloat)(tt)+(parseFloat)(k2);
document.getElementById('amount'+b).value=k3.toFixed(2);

var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;

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

    s=0;
      for(i=0;i<=20;i++)
	  {
	  
	   	if(document.getElementById('bvalue'+i).value!='')
	{
		
      var r1= document.getElementById('bvalue'+i).value?document.getElementById('bvalue'+i).value:0;
  
      var s=(parseFloat)(r1)+(parseFloat)(s);
	  
	//  alert(k);

	   document.getElementById('taxable').value=s.toFixed(2);
		
		
	}
	  }

nn();

	  


}


function nn()
{

        var t1=document.getElementById('taxable').value?document.getElementById('taxable').value:0;
       var cgst=document.getElementById('cgst').value?document.getElementById('cgst').value:0;
	//	var sgst=document.getElementById('sgst').value?document.getElementById('sgst').value:0;
	//	var igst=document.getElementById('igst').value?document.getElementById('igst').value:0;
		var roundoff=document.getElementById('round').value?document.getElementById('round').value:0;
		
   //     var cgsta=parseFloat(t1)*parseFloat(cgst)/100;
	//	var sgsta=parseFloat(t1)*parseFloat(sgst)/100;
	//	var igsta=parseFloat(t1)*parseFloat(igst)/100;
		

      var tot=parseFloat(t1)+parseFloat(cgst)+parseFloat(roundoff);
	  
	  document.getElementById('net').value=tot.toFixed(2);

}

</script>

<script>
  function chkreqqty2(id,value){
    var c=id.substr(8);
    //alert(c);
    var reqqty=document.getElementById('reqqty'+c).value?document.getElementById('reqqty'+c).value:0;
   if(parseFloat(value)>parseFloat(reqqty)){
      alert("Required Quantity Exceeded Order Quantity.");
      document.getElementById('quantity'+c).value='';
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
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">Purchase Order</button>
                      <a href="purchaseorderlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Purchase 
                          </a>
                    </div>  <br>         
                                
            
               
                
              <div class="card mb-2 mt-2" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php

                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=24";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $read_permit = $row['read_access'];
                     $write_permit = $row['write_access'];
                     $delete_permit = $row['delete_access'];

                              $sql4 = " SELECT * FROM purchaseorder WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Purchase&nbsp;Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="purchaseno"
                              name="purchaseno"
                              readonly
                              value="<?php echo $wz1['purchaseno']; ?>"
                              class="form-control"
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
                            <label class="form-label" for="collapsible-fullname">Delivery&nbsp;Due&nbsp;Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="duedate"
                              name="duedate"
                              value=<?php echo  $wz1['duedate']; ?> 

                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label >Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
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
                            <label >Product&nbsp;Type&nbsp;<span style="color:red;">*</span></label>
                            <select name="type" id="type" class="select form-select" data-allow-clear="true" onchange="get_items(this.value);" required>
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM asset_type order by type asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['type']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['type'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                          
                          
                          <div class="col-md-2">
                            <label class="form-label" for="ecommerce-product-barcode">Status</label>
                            <select name="approve" id="approve" class="select form-select" data-allow-clear="true">
                            <option value="">Select</option> 
                                <option value="1" <?php if($wz1['approve']=='1'){ ?>Selected<?php } ?> >Approved</option>
                                <option value="0" <?php if($wz1['approve']=='0'){ ?>Selected<?php } ?> >Approval Pending</option>   
                              </select>
                            </div>   </div>
                      
                        </div><br>
                        <div class="mb-0"><hr></div>
                                           
                        <div class="table-responsive">
                            <table class="table table-border  table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Group</th> 
                                  <th>Particulars</th> 
                                  <th>QUANTITY</th>
                                  <th>UNIT</th>
                                  <th nowrap>Budget from</th> 
                                  <th nowrap>budget to</th> 
                                  <th>remarks</TH>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM purchaseorder1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                               <td  style="padding: 0.3rem">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>

              
                <td style="padding: 0.3rem;width: 230px;">
                <select name="productgrp[]"  id="productgrp<?php echo $i;?>" class="select form-select" onchange="get_items1(this.value);" >
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
                <select name="productname[]"  id="productname<?php echo $i;?>" class="select form-select" onchange="get_product_details(this.id,this.value);" >
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
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                    style="text-align:right"
                                    name="quantity[]"
                                    value="<?php echo $rw['quantity']; ?>"
                                    onkeydown="chkreqqty2(this.id,this.value);"
									   onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                <select name="unit[]" style="width:100px" id="unit<?php echo $i; ?>" class="select form-select" >
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
                                    id="budget_from<?php echo $i;?>"
                                    name="budget_from[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['budget_from']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>        
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="budget_to<?php echo $i;?>"
                                    name="budget_to[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['budget_to']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>        
                     
                <td style="padding: 0.3rem">
                 <input style="width:300px"
                                    type="text"
                                    class="form-control"
                                    id="remark<?php echo $i;?>"
                                    name="remark[]"
                                    style="text-align:left"
                                    value="<?php echo $rw['remark']; ?>"
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
              <!-- <div class="mb-0"><hr></div>
              <div class="row g-3 mt-2">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Gross&nbsp;Value</label>
                            <input
                              type="text"
                              id="taxable"
                              name="taxable"
                              style="text-align:right"
                              onKeyUp="nn();"
                              value="<?php echo $wz1['taxable']; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">GST Total</label>
                            <input
                              type="text"
                              id="cgst"
                              style="text-align:right"
                              name="cgst"
                              value="<?php echo $wz1['cgst']; ?>"
                              class="form-control"
							   onKeyUp="nn();"
                              placeholder="" />
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
                          </div> -->
                          
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
                          <a class="btn btn-label-dark btn-prev" href="purchaseorderlist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
  
                              <button   <?php  if($write_permit==0){ echo "disabled"; } ?> class="btn btn-warning btn-next" name="submit" value="submit" >
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

  $cid = $_POST['cid'];
  $purchaseno = $_POST['purchaseno'];
  $date = $_POST['date'];
  $duedate = $_POST['duedate'];
  $supplier = $_POST['supplier'];
  $type = $_POST['type'];
  $approve = $_POST['approve'];
  $taxable = $_POST['taxable'];
 $cgst = $_POST['cgst'];
  $round = $_POST['round'];
  $net = $_POST['net'];
  $remarks = $_POST['remarks'];


   $sql = "UPDATE purchaseorder SET purchaseno='$purchaseno',duedate='$duedate',date='$date',supplier='$supplier',type='$type',taxable='$taxable',round='$round',net='$net',remarks='$remarks',approve='$approve',cgst='$cgst' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['productname'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $productgrp = $_POST['productgrp'][$key];
    $productname = $_POST['productname'][$key];
    $bvalue = $_POST['bvalue'][$key];
    $quantity = $_POST['quantity'][$key];
    $budget_from = $_POST['budget_from'][$key];
    $budget_to = $_POST['budget_to'][$key];
    $remark = $_POST['remark'][$key];
    $unit = $_POST['unit'][$key];
    $rate = $_POST['rate'][$key];
    $amount = $_POST['amount'][$key];
    $gst = $_POST['gst'][$key];
    $gstamount = $_POST['gstamount'][$key];

    
     $sql1 = "UPDATE purchaseorder1 SET productgrp='$productgrp', productname='$productname',quantity='$quantity',budget_from='$budget_from',budget_to='$budget_to',remark='$remark',unit='$unit',rate='$rate',amount='$amount',gst='$gst',gstamount='$gstamount',bvalue='$bvalue' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Purchase Updated Successfully');window.location='purchaseorderlist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
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
function get_items1(value) {
//  alert(value);



  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);
  for (var i=0;i<=20;i++){
						  document.getElementById('productname'+i).innerHTML = r;
  }

      }
    };
    xmlhttp.open("GET","ajax/get_assname.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>