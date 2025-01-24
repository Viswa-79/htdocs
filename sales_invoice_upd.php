<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(11));
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

  $('#partyname').val(data.partyname);
  
  
}

}
};
xmlhttp.open("GET","ajax/getenquiry.php?id="+value,true);
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
            
                           
                                
                    
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button  class="btn btn-label-primary">Sales Invoice</button>
                      <a href="sales_invoice_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View sales
                          </a>
                    </div><br>
                  <div class="bs-stepper wizard-numbered mt-2">
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
                     

                    </div>

                    <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">

                      <?php
                      $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=21";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $write_permit = $row['write_access'];
                    

                              $sql4 = " SELECT * FROM sales_invoice WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                            <input type="text" hidden name="cid" id="cid" value="<?php echo $wz1['id'];?>">                                                                                                                                                                                                                                                  <tr>
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Invoice No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="invoiceno"
                              name="invoiceno"
                              readonly
                              value="<?php echo $wz1['invoiceno']; ?>"
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
                          
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Party Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                       
                          
                      </div>
                
                        <!-- Social Links -->
                        
      </div>
      </div>
    </div>  
    <br>
    <!-- <button class="btn btn-label-primary">STYLE DETAILS</button> -->
                <br>
                <br>
                <div class="card mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-border border-top table-hover">
                            <thead class="border-bottom">
                                <tr>

                                <th style="width:50px">S.No</th>
                                <th style="width:400px">Description.</th> 
                                  <th>Sac&nbsp;code</th>
                                  <th>inspection</th> 
                                  <th>charges</th> 
                                  <!-- <th>gst</th>  -->
                                  <th>total&nbsp;amnt</th>
 
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM sales_invoice1 Where cid='$sid' order by id asc";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?>
                                <tr>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                  <td  style="padding: 0.3rem;text-align:center">
                                   <?php echo $sno; ?>      
                                   </td>

                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="descr<?php echo $i;?>"
                              style="width:400px"
                               onkeyUp="tott(rate<?php echo $i;?>.id);"
                              name="descr[]"
                              value="<?php echo $rw['descr']; ?>"
                              class="form-control"
                              placeholder="" />
          </td>
                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="saccode"
                              name="saccode[]"
                              style="width:150px"
                              value="<?php echo $rw['saccode']; ?>"
                              class="form-control"
                              placeholder="" />
          </td>

               
                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="inspection<?php echo $i;?>"
                              name="inspection[]"
                              style="text-align:right"
                              value="<?php echo $rw['inspection']; ?>"
                              onkeyup="tott(charges<?php echo $i;?>.id)"
                              onchange="tott(charges<?php echo $i;?>.id)"
                              class="form-control"
                              placeholder="" />
          </td>

               
                 <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="charges<?php echo $i;?>"
                              style="text-align:right;"
                              name="charges[]"
                              value="<?php echo $rw['charges']; ?>"
                              class="form-control"
                              onkeyup="tott(charges<?php echo $i;?>.id)"
                               onchange="tott(charges<?php echo $i;?>.id)"
                              placeholder="" />
                       </td>
                 <!-- <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="gst<?php echo $i;?>"
                              style="text-align:right;"
                              name="gst[]"
                              value="<?php echo $rw['gst']; ?>"
                              class="form-control"
                              onkeyup="tott(charges<?php echo $i;?>.id)"
                               onchange="tott(charges<?php echo $i;?>.id)"
                              placeholder="" />
                       </td> -->
                 
                <td style="padding: 0.3rem;">
                      <input
                                    type="text"
                                    id="totamnt<?php echo $i;?>"
                                    name="totamnt[]"
                                    style="text-align:right"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"
                                    value="<?php echo number_format((float)$rw['totamnt'], 2, '.', '');  ?>"
                                    class="form-control"
                                    placeholder="" />
                </td>

               
                       </tr>
                             
<?php
                            $sno++; $i++;   }
                              ?>   
                              <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
              
                              </tbody>
                            </table>
          
                  </div>
                  <br><hr>   
                  <br>
                    <div class="row g-3">
                            <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Gross Value</label>
                            <input
                              type="text"
                              id="grossamt"
                              name="grossamt"
                              onkeyup="nn()"
                              style="text-align:right"
                              value= "<?php echo $wz1['grossamt']; ?>"
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
                              value= "<?php echo $wz1['cgst']; ?>"
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
                              value= "<?php echo $wz1['sgst']; ?>"
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
                              value= "<?php echo $wz1['igst']; ?>"
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
                              value= "<?php echo $wz1['round']; ?>"
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
                              value= "<?php echo $wz1['net']; ?>"
                               style="text-align:right"
                              class="form-control"
                               />
                          </div>                            
                        </div><br>
                        
                  </div>
                </div>     
                    </div>
                          
                            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="sales_invoice_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
                              </a>
                             <?php if($write_permit==1){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } else { ?>
                              <button disabled class="btn btn-warning btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
                            </div>
                        </div>
                          
                       
                        </form>
                   
               
           
            
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
    $invoiceno = $_POST['invoiceno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $grossamt = $_POST['grossamt'];
  $cgst = $_POST['cgst'];
  $sgst = $_POST['sgst'];
  $round = $_POST['round'];
  $igst = $_POST['igst'];
  $net = $_POST['net'];
  
   $sql = "UPDATE sales_invoice SET invoiceno='$invoiceno',date='$date',partyname='$partyname',grossamt='$grossamt',cgst='$cgst',sgst='$sgst',igst='$igst',round='$round',
    net='$net' WHERE id='$cid'";
    $result = mysqli_query($conn, $sql);
  
    foreach ($_POST['saccode'] as $key => $val) {
    
      $rid = $_POST['rid'][$key];
      $saccode = $_POST['saccode'][$key];
      $inspection = $_POST['inspection'][$key];
      $charges = $_POST['charges'][$key];
      $totamnt = $_POST['totamnt'][$key];
      $descr = $_POST['descr'][$key];

       $sql1 = "UPDATE sales_invoice1 SET cid='$cid',saccode='$saccode',inspection='$inspection',charges='$charges',totamnt='$totamnt',descr='$descr' WHERE id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Sales Updated Successfully');window.location='sales_invoice_list.php';</script>";

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


        var t=document.getElementById('inspection'+b).value?document.getElementById('inspection'+b).value:0;

		var v=document.getElementById('charges'+b).value?document.getElementById('charges'+b).value:0;
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