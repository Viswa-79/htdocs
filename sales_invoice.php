<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(5));
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
function get_style(id,value) {
//alert("hello");
  var c=id.substr(7);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#gsm'+c).val(data.gsm);
$('#dia'+c).val(data.dia);
$('#quantity'+c).val(data.ord_qty);
$('#rate'+c).val(data.salesrate);
                  
}
      }
    };
    xmlhttp.open("GET","ajax/getstyle.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>


<script>
function get_order_details(value) {
  
  
  if (value != "") {
    // alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  $('#currency').val(data.currency);
  $('#partyname').val(data.buyer_name);
  $('#orderdate').val(data.ord_date);
  $('#styleno').val(data.style_code);

}

}
};
xmlhttp.open("GET","ajax/getorderdetail.php?id="+value,true);
xmlhttp.send();
  }
}
</script>
<?php
// $fg1="select max(invoiceno) as id from sales_invoice";
// 		   //echo $fg1;
// 		   $fg2=mysqli_query($conn,$fg1);
// 		   $fg3=mysqli_fetch_object($fg2);
// 		   $fg4=$fg3->id+1;
		
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
            
                           
                                
                    
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button   class="btn btn-label-primary">Sales Invoice</button>
                      <a href="sales_invoice_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Sales
                          </a>
                    </div>
                  <div class="bs-stepper wizard-numbered mt-4">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">INVOICE DETAILS</span>
                            <span class="bs-stepper-subtitle">Basic info for the Invoice</span>
                          </span>
                        </button>
                      </div>
                      <!-- <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#item_details" >
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">STYLE DETAILS</span>
                            <span class="bs-stepper-subtitle">Style Details</span>
                          </span>
                        </button>
                      </div> -->
                       
                      

                    </div>

                    
                    <div class="bs-stepper-content">
                      <form action="" method="post" onSubmit="return true" enctype="multipart/form-data">
                        
                      <?php
                      $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=21";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                    


                              $sql4 = " SELECT * FROM profomo WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Invoice No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="invoiceno"
                              name="invoiceno"
                              readonly
                              value="<?php echo $wz1['profomo']; ?>"
                              class="form-control bg-light"
                               />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date'];?>"
                              placeholder="" />
                          </div>
                         
                         
                          <div class="col-md-4">
                          <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw2 = mysqli_fetch_array($result))
					{ ?>
    <option <?php if($rw2['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw2['id'];?>"><?php echo $rw2['name'];?></option>

					<?php }  ?>
                              </select>
                          </div>
                          
                          
                          </div><br>
                          
                      </div>
                
                       
                       
					
                  </div>
				  
                </div>
                <br>

                <button onclick="return false" class="btn btn-label-primary">Particulars</button>
                <br>
                <br>
                <div class="card ">
                        <div class="table-responsive mt-4 pb-2">
                        <table class="table table-border table-hover">
                              <thead class="border-bottom">
                                <tr>

                                  <th style="width:50px">S.No</th>
                                  <th style="width:300px">Description.</th>
                                  <th>Sac&nbsp;code</th>
                                  <th>inspection</th> 
                                  <th>charges</th> 
                                  <!-- <th>gst</th>  -->
                                  <th>total&nbsp;amnt</th>

                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0; $amount=0;
                               $sql14 = " SELECT * FROM profomo1 Where cid='$sid'";
                              $result14 = mysqli_query($conn, $sql14);
                              while ($rw = mysqli_fetch_array($result14))
                              {
                               $amnt = $rw['manday'] * $rw['charges'];
                                  ?>   
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                   <?php echo $sno; ?>               
                </td>

                        <td style="padding: 0.3rem;">
                           <input style="width:400px;"
                                    type="text"
                                    class="form-control"
                                    id="descr<?php echo $i;?>"
                                    name="descr[]"
                                    onKeyDown="ee11(this.id);"
                                    aria-label="Product barcode"/>        
                        </td>

                <td style="width:150px;padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="saccode<?php echo $i;?>"
                                name="saccode[]"
                                value="<?php echo $rw['styleno']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  

                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="inspection<?php echo $i;?>"
                                    name="inspection[]"
                                    style="text-align:right;"       
                                     onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"   
                                    value="<?php echo $rw['manday'];?>"                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
               
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="charges<?php echo $i;?>"
                                    name="charges[]"
                                    style="text-align:right;"   
                                    value="<?php echo $rw['charges'];?>"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                <!-- <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="gst<?php echo $i;?>"
                                    name="gst[]"
                                    style="text-align:right;"   
                                    value="<?php echo $rw['gst'];?>"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                 
                                    aria-label="Product barcode"/>
                                       
                </td> -->
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totamnt<?php echo $i;?>"
                                    name="totamnt[]"
                                    style="text-align:right;"   
                                    value="<?php echo number_format((float)$amnt, 2, '.', ''); ?>"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                                </tr>
                                        
<?php
                            $sno++;$i++; 
                             $amount+=  number_format((float)$amnt, 2, '.', '');
                          }
                              ?>       
  <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
          
                              </tbody>
                            </table>
                            </div>
              <hr>
                    <div class="card-body ">
                    
                    <div class="row g-3">
                            <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Gross Value</label>
                            <input
                              type="text"
                              id="grossamt"
                              name="grossamt"
                              onkeyup="nn()"
                              value="<?php echo $amount; ?>"
                              style="text-align:right"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">CGST</label>
                            <input
                              type="text"
                              id="cgst"
                              name="cgst"
                              onkeyup="nn()"
                                style="text-align:right"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">SGST</label>
                            <input
                              type="text"
                              id="sgst"
                              name="sgst"
                              onkeyup="nn()"
                                style="text-align:right"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">IGST</label>
                            <input
                              type="text"
                              id="igst"
                              name="igst"
                              onkeyup="nn()"
                                style="text-align:right"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Round&nbsp;Off</label>
                            <input
                              type="text"
                              id="round"
                              name="round"
                              onkeyup="nn()"
                                style="text-align:right"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Net Total</label>
                            <input
                              type="text"
                              id="net"
                              onkeyup="nn()"
                              name="net"
                             value="<?php echo $amount; ?>"
                               style="text-align:right"
                              class="form-control"
                               />
                          </div>                            
                        </div><br>
                        
                  </div>
                </div>
                </div>
               	 <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="home.php" >
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Home</span>
                              </a>
                             <?php  if($create_permit == 1){ ?>
                              <button class="btn btn-success btn-next" onSubmit="return true" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
                                <i class="ti ti-arrow-right me-sm-1 me-0"></i>
                              </button>
                              <?php } else { ?>                             
                              <button disabled class="btn btn-success btn-next" onSubmit="return true" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
                                <i class="ti ti-arrow-right me-sm-1 me-0"></i>
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
  </body>


<?php
if (isset($_POST['submit'])) {

  $invoiceno = $_POST['invoiceno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $grossamt = $_POST['grossamt'];
  $cgst = $_POST['cgst'];
  $sgst = $_POST['sgst'];
  $round = $_POST['round'];
  $igst = $_POST['igst'];
  $net = $_POST['net'];
  
    $sql = "INSERT into sales_invoice (invoiceno,date,partyname,grossamt,cgst,sgst,round,igst,net) 
    values ('$invoiceno','$date','$partyname','$grossamt','$cgst','$sgst','$round','$igst','$net')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['saccode'] as $key => $val) {
    
    
    $saccode = $_POST['saccode'][$key];
    $inspection = $_POST['inspection'][$key];
    $charges = $_POST['charges'][$key];
    $gst = $_POST['gst'][$key];
    $totamnt = $_POST['totamnt'][$key];
    $descr = $_POST['descr'][$key];

    if ($descr != '') {
       $sql1 = "INSERT into sales_invoice1 (cid,inspection,saccode,charges,totamnt,descr,gst) 
 values ('$cid','$inspection','$saccode','$charges','$totamnt','$descr','$gst')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Sales Registered Successfully');window.location='saleslist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, Data Not Stored")</script>';
  }
}
?> 

<script language="javascript" type="text/javascript">


function tott(v1)
{


//alert(v1);

a=v1;
b=(a.substr(7));


        var v=document.getElementById('inspection'+b).value?document.getElementById('inspection'+b).value:0;
        var t=document.getElementById('charges'+b).value?document.getElementById('charges'+b).value:0;
        // var gst=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
        
        var tt=parseFloat(v) * parseFloat(t);
        // var tm=parseFloat(tt) * parseFloat(gst)/100;
        // var tm1=parseFloat(tm) + parseFloat(tt);
		
		document.getElementById('totamnt'+b).value=tt.toFixed(2);

var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;

  k=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('totamnt'+i).value!='')
	{
		
      var r= document.getElementById('totamnt'+i).value?document.getElementById('totamnt'+i).value:0;
  
      var k=(parseFloat)(r)+(parseFloat)(k);
	  
	//  alert(k);
	   document.getElementById('grossamt').value=k.toFixed(2);
	   document.getElementById('net').value=k.toFixed(2);
		
		
	}
	  }
	  


// nn();

	  


}


function nn()
{

         var t1=document.getElementById('grossamt').value?document.getElementById('grossamt').value:0;
       var cgst=document.getElementById('cgst').value?document.getElementById('cgst').value:0;
		var sgst=document.getElementById('sgst').value?document.getElementById('sgst').value:0;
		var igst=document.getElementById('igst').value?document.getElementById('igst').value:0;
		var roundoff=document.getElementById('round').value?document.getElementById('round').value:0;
		
   
    var k2=(parseFloat)(t1)*(parseFloat)(cgst)/100;

 
    var k3=(parseFloat)(t1)*(parseFloat)(sgst)/100;
   
    
    var k4=(parseFloat)(t1)*(parseFloat)(igst)/100;
	
    var k5=(parseFloat)(k2)+(parseFloat)(k3)+(parseFloat)(k4);

    var k6=(parseFloat)(t1)+(parseFloat)(k5)+(parseFloat)(roundoff);
	  document.getElementById('net').value=k6.toFixed(2);


}

</script>

<script>
function get_invoice(value) {
//alert(value);

  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
r1=r.split('???');
// alert(r);


						  document.getElementById('structure').innerHTML =r1[0];
						    document.getElementById('grossamt').value =r1[1]; 
							document.getElementById('net').value =r1[1];
						
            }
    };
    xmlhttp.open("GET","ajax/get_invoice.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>