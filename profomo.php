<?php include "config.php"; ?>

<script>
function ee1(x)
{


// alert(x);
var a=x;
var c=(a.substr(7));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

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


<?php
$fg1="select max(profomo) as id from profomo";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
		
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
                      <button   class="btn btn-label-primary">Proforma Invoice</button>
                      <a href="profomo_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Proforma
                          </a>
                    </div>
                  <div class="bs-stepper wizard-numbered mt-4">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">PROFORMA DETAILS</span>
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
                      $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=19";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     

                              $sql4 = " SELECT * FROM quote WHERE quote_no='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                               $id=$wz1['id'];
                               $party=$wz1['partyname'];
                                  ?>
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Proforma No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="profomo"
                              name="profomo"
                              readonly
                              value="<?php echo $fg4; ?>"
                              class="form-control bg-label-dark"
                               />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quote No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="quote"
                              name="quote"
                              readonly
                              value="<?php echo $wz1['quote_no']; ?>"
                            class="form-control bg-label-dark"
                               />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo date('Y-m-d');?>"
                              placeholder="" />
                          </div>
                         
                         
                          <div class="col-md-4">
                          <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true"  style="text-transform:uppercase">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
  <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>

					<?php }  ?>
                              </select>
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PO&nbsp;No</label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              class="form-control"
                              value="<?php echo $wz1['pono'];?>"
                              placeholder="" />
                          </div>
                          </div>
<br>
                          <div class="row g-3">
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Inspection&nbsp;Description</label>
                            <input
                              type="text"
                              id="description"
                              name="description"
                            class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">GST&nbsp;Type</label>
                            <select 
                              id="gsttype"
                              name="gsttype"
                            class="form-select">
                            <option value="">Select</option>
                            <option value="1">CGST / SGST</option>
                            <option value="2">IGST</option>
          </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">GST&nbsp;(%)</label>
                            <select 
                              id="gstpercent"
                              name="gstpercent"
                            class="form-select" onchange="chk_gst(this.value)">
                            <option value="">Select</option>
                            <option value="4">4%</option>
                            <option value="18">18%</option>
          </select>
                          </div>
                          </div><br>
                          
                      </div>
                
                  </div>
				  
                </div>
                <br>
                
<?php $i=0;
  $sql21 = " SELECT * FROM quote1 m left join assignment n on m.companyname=n.id WHERE m.cid='$id' group by companyname order by m.id asc";
  $result21 =mysqli_query($conn, $sql21);
  while($rw21=mysqli_fetch_array($result21))
  {
    $fid = $rw21['companyname'];
    ?> <br>
     <button onclick="return false"  style="font-family:serif;text-transform:capitalize;" class="btn btn-label-primary">FACTORY - <?php echo $rw21['name'];?></button>

                <br>
                <br>
                <div class="card ">
                        <div class="table-responsive mt-0 mb-4">
                        <table class="table table-border table-hover">
                              <thead class="border-bottom">
                                <tr>

                                  <th style="width:50px">S.No</th>
                                  <th style="width:300px">inspection&nbsp;date</th>
                                  <th hidden>Factory&nbsp;name</th>
                                  <th>Factory&nbsp;Location</th>
                                  <th>style&nbsp;no</th>
                                  <th>offer&nbsp;qty</th>
                                  <th>inspection&nbsp;type</th>
                                  <th>sac&nbsp;code</th> 
                                  <th>manday</th> 
                                  <th>charges</th> 
                                  <th>taxable&nbsp;Amnt</th> 
                                  <th>gst</th> 
                                  <th>final&nbsp;amnt</th>
                                  <th>rate&nbsp;adopted on&nbsp;billing&nbsp;date</th>
                                  <th>transport &&nbsp;hotel charges</th>
                                  <th>remarks / report&nbsp;no.</th>
                                  <th>inspection booked&nbsp;by</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                 $sno=1; $gross=0;
                                 // LOOP TILL END OF DATA
                                 $sql = " SELECT * FROM quote1 WHERE cid='$id' and companyname='$fid' order by id asc";
                             $result =mysqli_query($conn, $sql);
                             while($rw=mysqli_fetch_array($result))
                             {
                              $sql11 = " SELECT * FROM partymaster WHERE id='$party'";
                              $result11 =mysqli_query($conn, $sql11);
                              $rw11=mysqli_fetch_array($result11);
                               $city=$rw11['city'];
                               ?>   
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                   <?php echo $sno; ?>               
                </td>

                        <td style="padding: 0.3rem;">
                           <input style="width:200px;"
                                    type="date"
                                    class="form-control"
                                    id="insdate<?php echo $i;?>"
                                    name="insdate[]"
                                    value="<?php echo date('Y-m-d');?>"/>        
                        </td>

                <td hidden style="width:150px;padding: 0.3rem">
                <select hidden style="width:300px" name="factoryname[]" id="factoryname<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM assignment order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['companyname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?>,&nbsp; <?php echo $city;?></option>
                    <?php } ?>
                                
                              </select>
                </td>  

                
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="factoryloc<?php echo $i;?>"
                                    name="factoryloc[]" 
                                    value="<?php echo  $rw['factoryloc'];?>"      

                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="styleno<?php echo $i;?>"
                                    name="styleno[]" 
                                    value="<?php echo  $rw['styleno'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="orderqty<?php echo $i;?>"
                                    name="orderqty[]" 
                                    value="<?php echo  $rw['orderqty'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem;width:150px">
                <select id="inspecttype<?php echo $i;?>" name="inspecttype[]" class="select form-select">
                      <option value="">Select</option>
                      <?php 
                      $sql2 = "SELECT * FROM inspect_type ORDER BY id asc";
                      $result2 = mysqli_query($conn, $sql2);
                      while($rs = mysqli_fetch_array($result2)){
                        ?>
       <option <?php if($rs['id']==$rw['inspect']){ ?> Selected <?php } ?> value="<?php echo $rs['id'];?>"><?php echo $rs['type'];?></option>
                     <?php }
                      ?>
                      
                      </select>                  
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="sac<?php echo $i;?>"
                                    name="sac[]" 
                                    aria-label="Product barcode"/>
                                       
                </td>

                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="manday<?php echo $i;?>"
                                    name="manday[]"
                                    value="<?php echo $rw['manday'];?>"
                                    style="text-align:right;"       
                                     onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"   
                                    aria-label="Product barcode"/>
                                       
                </td>
               
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="charges<?php echo $i;?>"
                                    name="charges[]"
                                    value="<?php echo $rw['charges'];?>"
                                    style="text-align:right;"   
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="taxable<?php echo $i;?>"
                                    name="taxable[]"
                                    value="<?php echo $rw['totamnt'];?>"
                                    style="text-align:right;"   
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input style="width:100px"
                                    type="text"
                                    class="form-control"
                                    id="gst<?php echo $i;?>"
                                    name="gst[]"
                                    readonly
                                    value="<?php echo $rw['gst'];?>"
                                    style="text-align:right;"   
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
             
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totamnt<?php echo $i;?>"
                                    name="totamnt[]"
                                    style="text-align:right;"   
                                    value="<?php echo $rw['finamnt'];?>"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                 
                                    aria-label="Product barcode"
                                       onkeydown="ee1(this.id);"/>
                </td>

                <td style="padding: 0.3rem">
                 <input 
                                    type="date"
                                    class="form-control"
                                    id="billdate<?php echo $i;?>"
                                    name="billdate[]"                               
                                    aria-label="Product barcode"
                                       />
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="th_charges<?php echo $i;?>"
                                    name="th_charges[]"                             
                                    aria-label="Product barcode"
                                       />
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="remarkreport<?php echo $i;?>"
                                    name="remarkreport[]"                          
                                    aria-label="Product barcode"
                                       />
                </td>
                <td style="padding: 0.3rem">
                <select style="width:200px" name="inspectbook[]" id="inspectbook" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
  <option value="<?php echo $rw['id'];?>"><?php echo $rw['title'];?> <?php echo $rw['cpname'];?></option>

					<?php }  ?>
                              </select>
                </td>
                                </tr>
                                        
<?php
                 $sno++;$i++;
                 	$gross+=number_format((float)$rw['totamnt'], 2, '.', '');
                         }
                        
                              ?>   
         
        </tbody>
      </table>
    </div>
  </div>
  <?php
                               }
                               ?>  
                               <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">    
                 <br>            
                 <br>            
                            
                <div class="card mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-border table-hover">
                              <thead class="border-bottom">  
                         <th colspan="7"></th>
                         <th>manday</th>
                        <!-- <th>charges</th> -->
                        <th>total&nbsp;amnt</th>
                        <th>gst</th>
                        <!-- <th>discount</th> -->
                        <th>final&nbsp;amnt</th>
                </thead>
                <tbody>
                  <tr >
                        <td colspan="6"></td>

                        <td style="text-align:right"><b>TOTAL</b></td>
                          <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control"
                            id="mantot"
                            name="mantot"
                               style="width:60px" readonly ></td>

                               <!-- <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="chargetot"
                            name="chargetot"
                              style="width:60px " readonly></td> -->

                              
                              <td style="padding: 0.3rem;width:100px">
                                <input style="font-weight:bold"
                                class="form-control "
                                id="grossamt"
                                name="grossamt"
                                readonly ></td>
                                
                                <td style="padding: 0.3rem;width:100px">
                       <input style="font-weight:bold"
                             class="form-control "
                             id="gsttot"
                             name="gsttot"
                               style="width:60px" readonly ></td>
                              

                               <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="net"
                            name="net"
                               readonly ></td>
                                 <!-- <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="discounttot"
                            name="discounttot"
                               readonly ></td> -->
                      </tr>
                </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
               	 <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="home.php" >
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Home</span>
                              </a>
                             <?php if($create_permit==1){ ?>
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

  $profomo = $_POST['profomo'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $grossamt = $_POST['grossamt'];
  $cgst = $_POST['cgst'];
  $sgst = $_POST['sgst'];
  $round = $_POST['round'];
  $igst = $_POST['igst'];
  $net = $_POST['net'];
  $quote = $_POST['quote'];
  $pono = $_POST['pono'];
  $description = $_POST['description'];
  $gsttype = $_POST['gsttype'];
  $gsttot = $_POST['gsttot'];
  $gstpercent = $_POST['gstpercent'];
  $mantot = $_POST['mantot'];
  
    $sql = "INSERT into profomo (profomo,date,partyname,grossamt,cgst,sgst,round,igst,net,quote,pono,description,gsttype,gsttot,gstpercent,mantot) 
    values ('$profomo','$date','$partyname','$grossamt','$cgst','$sgst','$round','$igst','$net','$quote','$pono','$description','$gsttype','$gsttot','$gstpercent','$mantot')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['factoryname'] as $key => $val) {
    
    
    $insdate = $_POST['insdate'][$key];
    $factoryname = $_POST['factoryname'][$key];
    $factoryloc = $_POST['factoryloc'][$key];
    $styleno = $_POST['styleno'][$key];
    $orderqty = $_POST['orderqty'][$key];
    $inspecttype = $_POST['inspecttype'][$key];
    $charges = $_POST['charges'][$key];
    $gst = $_POST['gst'][$key];
    $totamnt = $_POST['totamnt'][$key];
    $taxable = $_POST['taxable'][$key];
    $descr = $_POST['descr'][$key];
    $manday = $_POST['manday'][$key];
    $sac = $_POST['sac'][$key];
    $billdate = $_POST['billdate'][$key];
    $th_charges = $_POST['th_charges'][$key];
    $remarkreport = $_POST['remarkreport'][$key];
    $inspectbook = $_POST['inspectbook'][$key];

    if ($factoryname != '') {
       $sql1 = "INSERT into profomo1 (cid,insdate,factoryname,charges,totamnt,descr,gst,manday,sac,factoryloc,styleno,orderqty,inspecttype,billdate,th_charges,remarkreport,inspectbook,taxable) 
 values ('$cid','$insdate','$factoryname','$charges','$totamnt','$descr','$gst','$manday','$sac','$factoryloc','$styleno','$orderqty','$inspecttype','$billdate','$th_charges','$remarkreport','$inspectbook','$taxable')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Proforma Saved Successfully');window.location='profomo_list.php';</script>";

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


        var v=document.getElementById('manday'+b).value?document.getElementById('manday'+b).value:0;
        var t=document.getElementById('charges'+b).value?document.getElementById('charges'+b).value:0;
        var gst=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
        
        var tt=parseFloat(v) * parseFloat(t);
        var tm=parseFloat(tt) * parseFloat(gst)/100;
        var tm1=parseFloat(tm) + parseFloat(tt);
		
		document.getElementById('taxable'+b).value=tt.toFixed(2);
		document.getElementById('totamnt'+b).value=tm1.toFixed(2);

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
    //manday
	  m=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('manday'+i).value!='')
	{
      var r= document.getElementById('manday'+i).value?document.getElementById('manday'+i).value:0;
  
      var m=(parseFloat)(r)+(parseFloat)(m);
	  
	//  alert(k);
	   document.getElementById('mantot').value=m;		
		
	}
	  }

    p=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('taxable'+i).value!='')
	{
      var r= document.getElementById('taxable'+i).value?document.getElementById('taxable'+i).value:0;
  
      var p=(parseFloat)(r)+(parseFloat)(p);
	  
	//  alert(k);
	   document.getElementById('grossamt').value=p.toFixed(2);		
		
	}
	  }

// nn();

	  
var tv=document.getElementById('net').value?document.getElementById('net').value:0;
        var fv=document.getElementById('grossamt').value?document.getElementById('grossamt').value:0;
		
        var gv=parseFloat(tv) - parseFloat(fv);
        // alert(gv);
        document.getElementById('gsttot').value=gv.toFixed(2);

}

</script>

<script>
  function chk_gst(value){
    var gstper=document.getElementById('gstpercent').value?document.getElementById('gstpercent').value:0;
    
    var rc=document.getElementById('rc').value;
    // alert(rc);

    for (var i=0; i<rc; i++) {
 
      document.getElementById('gst'+i).value=gstper;
    }
  }
  </script>