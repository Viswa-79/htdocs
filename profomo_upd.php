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
                      <button  class="btn btn-label-primary">Proforma Invoice</button>
                      <a href="profomo_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Proforma
                          </a>
                    </div><br>
                  <div class="bs-stepper wizard-numbered mt-2">
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
                     

                    </div>

                    <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">

                      <?php
                      $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=19";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $write_permit = $row['write_access'];

                              $sql4 = " SELECT * FROM profomo WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                              $party=$wz1['partyname'];  ?>
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                            <input type="text" hidden name="cid" id="cid" value="<?php echo $wz1['id'];?>">                                                                                                                                                                                                                                                  <tr>
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Proforma No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="profomo"
                              name="profomo"
                              readonly
                              value="<?php echo $wz1['profomo']; ?>"
                              class="form-control bg-label-dark"
                               />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quote&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="quote"
                              name="quote"
                              class="form-control bg-label-dark"
                              readonly
                              value="<?php echo $wz1['quote']; ?>"
                              placeholder="" />
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
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true" style="text-transform:uppercase">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                       
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PO&nbsp;No</label>
                            <input
                            type="text"
                            id="pono"
                            name="pono"
                            class="form-control"
                            value="<?php echo $wz1['pono']; ?>"
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
                              value="<?php echo $wz1['description']; ?>"

                            class="form-control"
                               />
                          </div>

                          <div class="col-md-2">
                        <label class="form-label" for="collapsible-fullname">GST&nbsp;Type</label>
                          <select name="gsttype" id="gsttype"
                               class="select form-select" >
                                <option value="">Select</option>
                                <option value="1" <?php if($wz1['gsttype']=='1'){ ?>Selected<?php } ?> >CGST / SGST</option>
                                <option value="2" <?php if($wz1['gsttype']=='2'){ ?>Selected<?php } ?> >IGST</option>                                
                                                        
                              </select>  
                          </div>

                          <div class="col-md-2">
                        <label class="form-label" for="collapsible-fullname">GST&nbsp;(%)</label>
                          <select name="gstpercent" id="gstpercent"
                               class="select form-select" onchange="chk_gst(this.value)">
                                <option value="">Select</option>
                                <option value="4" <?php if($wz1['gstpercent']=='4'){ ?>Selected<?php } ?> >4% </option>
                                <option value="18" <?php if($wz1['gstpercent']=='18'){ ?>Selected<?php } ?> >18%</option>                                
                                                        
                              </select>
                          </div>
                         
                      </div>
                
                        <!-- Social Links -->
                        
      </div>
      </div>
    </div>  
    
    <br>

           <?php 
           $i=0;
  $sql21 = " SELECT * FROM profomo1 m left join assignment n on m.factoryname=n.id WHERE m.cid='$sid' group by m.factoryname order by m.id asc";
  $result21 =mysqli_query($conn, $sql21);
  while($rw21=mysqli_fetch_array($result21))
  {
    $id = $rw21['factoryname'];
    ?>       
       <button onclick="return false"  style="font-family:serif;text-transform:capitalize;" class="btn btn-label-primary">FACTORY - <?php echo $rw21['name'];?></button>
       <br>
       <br>
       <div class="card mb-4">
         <div class="card-body">
           <div class="table-responsive">
   
                            <table class="table table-border table-hover">
                            <thead class="border-bottom">
                                <tr>

                                <th style="width:50px">S.No</th>
                                <th style="width:400px">inspection date</th> 
                                  <th hidden>factory&nbsp;name</th>
                                  <th>Factory&nbsp;Location</th>
                                  <th>style&nbsp;no</th>
                                  <th>offer&nbsp;qty</th>
                                  <th>inspection&nbsp;type</th>
                                  <th>sac&nbsp;code</th> 
                                  <th>manday</th> 
                                  <th>charges</th> 
                                  <th>Total&nbsp;Amnt</th> 
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
                        $sno=1; 
                             $sql4 = " SELECT * FROM profomo1 Where cid='$sid' and factoryname='$id' order by id asc";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                $sql11 = " SELECT * FROM partymaster WHERE id='$party'";
                                $result11 =mysqli_query($conn, $sql11);
                                $rw11=mysqli_fetch_array($result11);
                                 $city=$rw11['city'];
                                  ?>
                                <tr>
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                  <td  style="padding: 0.3rem;text-align:center">
                                   <?php echo $sno; ?>      
                                   </td>

                <td style="padding: 0.3rem;">
                <input
                              type="date"
                              id="insdate<?php echo $i;?>"
                              style="width:200px"
                              name="insdate[]"
                              value="<?php echo $rw['insdate']; ?>"
                              class="form-control"
                              placeholder="" />
          </td>

                <td hidden style="padding: 0.3rem;">
                <select hidden style="width:300px" name="factoryname[]" id="factoryname<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM assignment order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['factoryname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?>,&nbsp; <?php echo $city;?></option>
                    <?php } ?>
                                
                              </select>
          </td>
                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="factoryloc"
                              name="factoryloc[]"
                              value="<?php echo $rw['factoryloc']; ?>"
                              class="form-control"
                              placeholder="" />
          </td>
                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="styleno"
                              name="styleno[]"
                              style="width:120px"
                              value="<?php echo $rw['styleno']; ?>"
                              class="form-control"
                              placeholder="" />
          </td>
                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="orderqty"
                              name="orderqty[]"
                              value="<?php echo $rw['orderqty']; ?>"
                              class="form-control"
                              placeholder="" />
          </td>
                <td style="padding: 0.3rem;width:150px">
                <select  name="inspecttype[]" id="inspecttype<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM inspect_type order by id asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['inspecttype']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['type'];?></option>
                    <?php } ?>
                                
                              </select>
          </td>
                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="sac"
                              name="sac[]"
                              style="width:150px"
                              value="<?php echo $rw['sac']; ?>"
                              class="form-control"
                              placeholder="" />
          </td>

               
                <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="manday<?php echo $i;?>"
                              name="manday[]"
                              style="text-align:right"
                              value="<?php echo $rw['manday']; ?>"
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
                
                 <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="taxable<?php echo $i;?>"
                              style="text-align:right;"
                              name="taxable[]"
                              value="<?php echo $rw['taxable']; ?>"
                              class="form-control"
                              onkeyup="tott(charges<?php echo $i;?>.id)"
                               onchange="tott(charges<?php echo $i;?>.id)"
                              placeholder="" />
                       </td>
                
                 <td style="padding: 0.3rem;">
                <input
                              type="text"
                              id="gst<?php echo $i;?>"
                              style="text-align:right;"
                              name="gst[]"
                              readonly
                              value="<?php echo $rw['gst']; ?>"
                              class="form-control"
                              onkeyup="tott(charges<?php echo $i;?>.id)"
                               onchange="tott(charges<?php echo $i;?>.id)"
                              placeholder="" />
                       </td>
                
                 
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
  
                <td style="padding: 0.3rem;">
                      <input
                                    type="date"
                                    id="billdate<?php echo $i;?>"
                                    name="billdate[]"
                                    value="<?php echo $rw['billdate']; ?>"
                                    class="form-control"
                                    placeholder="" />
                </td>
  
                <td style="padding: 0.3rem;">
                      <input
                                    type="text"
                                    id="th_charges<?php echo $i;?>"
                                    name="th_charges[]"
                                    value="<?php echo $rw['th_charges'];  ?>"
                                    class="form-control"
                                    placeholder="" />
                </td>
  
                <td style="padding: 0.3rem;">
                      <input
                                    type="text"
                                    id="remarkreport<?php echo $i;?>"
                                    name="remarkreport[]"
                                    value="<?php echo $rw['remarkreport'];  ?>"
                                    class="form-control"
                                    placeholder="" />
                </td>
  
                <td style="padding: 0.3rem;">
                <select style="width:150px" name="inspectbook[]" id="inspectbook" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
  <option <?php if($rw1['id']==$rw['inspectbook']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['title'];?> <?php echo $rw1['cpname'];?></option>

					<?php }  ?>
                              </select>
                </td>
  
               
                       </tr>
                             
<?php
                            $sno++; $i++; 
                                }
                            
                                ?>   
                          
                              </tbody>
                            </table>
          
                  </div>
                
                        
                  </div>
                </div> 
               <?php  
  }
  ?>
                        <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
               
                    <div class="card mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-border table-hover">
                              <thead class="border-bottom">  
                         <th colspan="7"></th>
                         <th>manday</th>
                        <!-- <th>charges</th> -->
                        <th>total&nbsp;amnt</th>
                        <th nowrap>gst value</th>
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
                            value="<?php echo $wz1['mantot'];  ?>"
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
                                 value="<?php echo $wz1['grossamt'];  ?>"
                                readonly ></td>
                                
                                <td style="padding: 0.3rem;width:100px">
                       <input style="font-weight:bold"
                             class="form-control "
                             id="gsttot"
                             name="gsttot"
                               value="<?php echo $wz1['gsttot'];  ?>"
                               style="width:60px" readonly ></td>
                              

                               <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="net"
                            name="net"
                              value="<?php echo $wz1['net'];  ?>"
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
                              <a class="btn btn-label-dark btn-prev" href="profomo_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Back</span>
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
    
      
<?php include "footer.php"; ?>
  </body>


<?php
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $profomo = $_POST['profomo'];
  $quote = $_POST['quote'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $grossamt = $_POST['grossamt'];
  $cgst = $_POST['cgst'];
  $sgst = $_POST['sgst'];
  $round = $_POST['round'];
  $igst = $_POST['igst'];
  $net = $_POST['net'];
  $pono = $_POST['pono'];
  $description = $_POST['description'];
  $gsttype = $_POST['gsttype'];
  $gstpercent = $_POST['gstpercent'];
  $gsttot = $_POST['gsttot'];
  $mantot = $_POST['mantot'];
  
   $sql = "UPDATE profomo SET profomo='$profomo',date='$date',mantot='$mantot',partyname='$partyname',grossamt='$grossamt',cgst='$cgst',sgst='$sgst',igst='$igst',round='$round',quote='$quote',pono='$pono',description='$description',gsttype='$gsttype',gstpercent='$gstpercent',gsttot='$gsttot',
    net='$net' WHERE id='$cid'";
    $result = mysqli_query($conn, $sql);
  
    foreach ($_POST['sac'] as $key => $val) {
    
      $rid = $_POST['rid'][$key];
      $sac = $_POST['sac'][$key];
      $styleno = $_POST['styleno'][$key];
      $factoryloc = $_POST['factoryloc'][$key];
      $orderqty = $_POST['orderqty'][$key];
      $inspecttype = $_POST['inspecttype'][$key];
      $manday = $_POST['manday'][$key];
      $charges = $_POST['charges'][$key];
      $taxable = $_POST['taxable'][$key];
      $gst = $_POST['gst'][$key];
      $totamnt = $_POST['totamnt'][$key];
      $descr = $_POST['descr'][$key];
      $billdate = $_POST['billdate'][$key];
      $th_charges = $_POST['th_charges'][$key];
      $remarkreport = $_POST['remarkreport'][$key];
      $inspectbook = $_POST['inspectbook'][$key];
      $insdate = $_POST['insdate'][$key];

       $sql1 = "UPDATE profomo1 SET cid='$cid',insdate='$insdate',sac='$sac',gst='$gst',taxable='$taxable',manday='$manday',charges='$charges',totamnt='$totamnt',descr='$descr',styleno='$styleno',factoryloc='$factoryloc',orderqty='$orderqty',inspecttype='$inspecttype',billdate='$billdate',th_charges='$th_charges',remarkreport='$remarkreport',inspectbook='$inspectbook' WHERE id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result) {

  echo "<script>alert('Profomo Updated Successfully');window.location='profomo_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, Data Not Stored")</script>';
  }
}
?> 

<script language="javascript" type="text/javascript">


function tott(v1)
{


// alert(v1);

a=v1;
b=(a.substr(7));


        var v=document.getElementById('manday'+b).value?document.getElementById('manday'+b).value:0;
        var t=document.getElementById('charges'+b).value?document.getElementById('charges'+b).value:0;
        var gst=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
        
        var tt=parseFloat(v) * parseFloat(t);
        var tm=parseFloat(tt) * parseFloat(gst)/100;
        var tm1=parseFloat(tm) + parseFloat(tt);
		// alert(v);
		document.getElementById('taxable'+b).value=tt.toFixed(2);
		document.getElementById('totamnt'+b).value=tm1.toFixed(2);

    var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;
// alert(rc);
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