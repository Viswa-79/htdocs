<?php include "config.php"; ?>



<script>
function ee1(x)
{


// alert(x);
var a=x;
var c=(a.substr(9));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>


<script>
function ee3(x)
{


//alert(x);
var a=x;
var c=(a.substr(10));
e=parseInt(c)+1;

document.getElementById('s3'+e).style.display='table-row';

}

</script>

<script>
function ee4(x)
{


//alert(x);
var a=x;
var c=(a.substr(7));
e=parseInt(c)+1;

document.getElementById('s4'+e).style.display='table-row';

}

</script>

<script>
function ee5(x)
{


//alert(x);
var a=x;
var c=(a.substr(3));
e=parseInt(c)+1;

document.getElementById('s5'+e).style.display='table-row';

}

</script>

<script>
function ee6(x)
{


//alert(x);
var a=x;
var c=(a.substr(2));
e=parseInt(c)+1;

document.getElementById('s6'+e).style.display='table-row';

}

</script>

<script>
function ee7(x)
{


//alert(x);
var a=x;
var c=(a.substr(5));
e=parseInt(c)+1;

document.getElementById('s7'+e).style.display='table-row';

}

</script>

<script>
function ee8(x)
{


//alert(x);
var a=x;
var c=(a.substr(8));
e=parseInt(c)+1;

document.getElementById('s8'+e).style.display='table-row';

}

</script>

<script>
function ee9(x)
{

// alert(x);
var a=x;
var c=(a.substr(11));
e=parseInt(c)+1;

document.getElementById('s9'+e).style.display='table-row';

}

</script>

<script>
function ee10(x)
{


// alert(x);
var a=x;
var c=(a.substr(12));
e=parseInt(c)+1;

document.getElementById('s10'+e).style.display='table-row';

}

</script>


<script>
function ee2(x)
{


// alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s2'+e).style.display='table-row';

}

</script>

<script>
function ee01(x)
{


// alert(x);
var a=x;
var c=(a.substr(7));
e=parseInt(c)+1;

document.getElementById('s01'+e).style.display='table-row';

}

</script>

<script>
function ee02(x)
{


// alert(x);
var a=x;
var c=(a.substr(4));
e=parseInt(c)+1;

document.getElementById('s02'+e).style.display='table-row';

}

</script>

<script>
function ee03(x)
{


// alert(x);
var a=x;
var c=(a.substr(5));
e=parseInt(c)+1;

document.getElementById('s03'+e).style.display='table-row';

}

</script>

<script>
function ee04(x)
{


// alert(x);
var a=x;
var c=(a.substr(7));
e=parseInt(c)+1;

document.getElementById('s04'+e).style.display='table-row';

}

</script>

<script>
function ee05(x)
{


// alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s05'+e).style.display='table-row';

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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Inspection</button>
                      <a href="inspect_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Inspection
                          </a>
                    </div>  <br>      <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>               
                               <div class="col-12 mb-4">
                  
                  <div class="">
                  <div class="card card-body">
                      <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                        
                        <!-- Personal Info -->
                        <?php 
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=16";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $write_permit = $row['write_access'];
                    

					$sql = "SELECT * FROM inspection_grn where cid='$sid'";
                    $result = mysqli_query($conn, $sql);
                    $rw11 = mysqli_fetch_array($result);

                    $partyname = $rw11['partyname']; 
                    $pack1 = $rw11['pack1tot']; 
                    $pack2 = $rw11['pack2tot']; 
                    $unpack2 = $rw11['unpack2tot']; 
                    $unpack1 = $rw11['unpack1tot']; 
                    $unfinish = $rw11['unfinishtot']; 
                    $cartonqty = $rw11['cartonqtytot']; 
                    $totalcarton = $rw11['totalcartontot']; 
                    $selectcarton = $rw11['selectedcarton']; 
                    $cno = $rw11['cartonno']; 
                    $qntremark = $rw11['qntyremark']; 
                    $styleitem = $rw11['styleitem']; 
                    $styleremarks = $rw11['styleremarks']; 
                    $callowtot = $rw11['callowtot']; 
                    $cfoundtot = $rw11['cfoundtot']; 
                    $majallowtot = $rw11['majallowtot']; 
                    $majfoundtot = $rw11['majfoundtot']; 
                    $minallowtot = $rw11['minallowtot']; 
                    $minfoundtot = $rw11['minfoundtot']; 
                    $critfoundtot = $rw11['critfoundtot']; 
                    $majfoundtot1 = $rw11['majfoundtot1']; 
                    $minfoundtot1 = $rw11['minfoundtot1']; 
                    $critaccepttot = $rw11['critaccepttot']; 
                    $majaccepttot = $rw11['majaccepttot']; 
                    $minaccepttot = $rw11['minaccepttot']; 
                    $wmnotes = $rw11['wmnotes']; 
                    $wmremarks = $rw11['wmremarks']; 
                    $packmethod = $rw11['packmethod']; 
                    $cartonply = $rw11['cartonply']; 
                    $fastmethod = $rw11['fastmethod']; 
                    $material = $rw11['material']; 
                    $metal = $rw11['metal']; 
                    $packremark = $rw11['packremark']; 
                    $tolprovide = $rw11['tolprovide']; 
                    $signe = $rw11['signe']; 
                    $signed1 = $rw11['signed1']; 
                    $signed2 = $rw11['signed2']; 
                    $signed3 = $rw11['signed3']; 
                    $measureresult = $rw11['measureresult']; 
                    

                     ?>
                      <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $rw11['dcno']; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['date'];?>"
                              placeholder="" />
                          </div>    

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Job&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="jobno"
                              name="jobno"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['dcno'];?>"
                              placeholder="" />
                          </div>                       
                         
                     <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Client&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            
                       <input
                              type="text"
                              id="clientname"
                              name="clientname"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['clientname'];?>"
                              placeholder="" />
                          </div>
                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Client&nbsp;Country&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="clientcountry"
                              name="clientcountry"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['clientcountry'];?>"
                              placeholder="" />
                          </div>   
                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Po&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['pono'];?>"
                              placeholder="" />
                          </div>   
                          </div>  <br>
                         
                         
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Factory&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="factoryname"
                              name="factoryname"
                              readonly
                              value="<?php echo $rw11['factoryname']; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">SKU / Article No.&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="sku"
                              name="sku"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['sku'];?>"
                              placeholder="" />
                          </div>    

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Service&nbsp;Performed&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="service"
                              name="service"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['service'];?>"
                              placeholder="" />
                          </div>                       
                          
                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Order Qty /&nbsp;Offer Qty (Sets)&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="ordqty"
                              name="ordqty"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['ordqty'];?>"
                              placeholder="" />
                          </div>   
                         
                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Inspector Name&nbsp;<span style="color:red;">*</span></label>
                            <input
                            type="text"
                            id="inspectname"
                            name="inspectname"
                            class="form-control"
                           value= "<?php echo $rw11['inspectname']; ?>" 

                             readonly>
                          </div>   

                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Inspector's In-Out Time&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="inspecttime"
                              name="inspecttime"
                              readonly
                              class="form-control"
                              value="<?php echo $rw11['inspecttime']; ?>"
                              placeholder="" />
                          </div>   
                          </div>   
                         
                          <br>
                          <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Inspection&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                            <select id="ins_level" name="ins_level" class="form-control bg-white" disabled>
                              <option value="">--SELECT--</option> 
                            <optgroup label="General Inspection">
                              <option value="g1" <?php if($rw11['inspect_level']=='g1'){ ?>Selected<?php } ?> >Level 1</option>
                              <option value="g2" <?php if($rw11['inspect_level']=='g2'){ ?>Selected<?php } ?> >Level 2</option>
                              <option value="g3" <?php if($rw11['inspect_level']=='g3'){ ?>Selected<?php } ?> >Level 3</option>
                            </optgroup>
                            <optgroup label="Special Inspection">
                              <option value="s1" <?php if($rw11['inspect_level']=='s1'){ ?>Selected<?php } ?>>S1</option>
                              <option value="s2" <?php if($rw11['inspect_level']=='s2'){ ?>Selected<?php } ?>>S2</option>
                              <option value="s3" <?php if($rw11['inspect_level']=='s3'){ ?>Selected<?php } ?>>S3</option>
                              <option value="s4" <?php if($rw11['inspect_level']=='s4'){ ?>Selected<?php } ?>>S4</option>
                            </optgroup>
                          </select>
                            <select id="inspect_level" name="inspect_level" class="form-control" hidden >
                              <option value="">--SELECT--</option> 
                            <optgroup label="General Inspection">
                              <option value="g1" <?php if($rw11['inspect_level']=='g1'){ ?>Selected<?php } ?> >Level 1</option>
                              <option value="g2" <?php if($rw11['inspect_level']=='g2'){ ?>Selected<?php } ?> >Level 2</option>
                              <option value="g3" <?php if($rw11['inspect_level']=='g3'){ ?>Selected<?php } ?> >Level 3</option>
                            </optgroup>
                            <optgroup label="Special Inspection">
                              <option value="s1" <?php if($rw11['inspect_level']=='s1'){ ?>Selected<?php } ?>>S1</option>
                              <option value="s2" <?php if($rw11['inspect_level']=='s2'){ ?>Selected<?php } ?>>S2</option>
                              <option value="s3" <?php if($rw11['inspect_level']=='s3'){ ?>Selected<?php } ?>>S3</option>
                              <option value="s4" <?php if($rw11['inspect_level']=='s4'){ ?>Selected<?php } ?>>S4</option>
                            </optgroup>
                          </select>
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Critical&nbsp;AQL&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                            <select id="crit" name="crit" class="form-control bg-white" disabled>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw11['critical']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw11['critical']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw11['critical']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw11['critical']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw11['critical']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw11['critical']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw11['critical']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw11['critical']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw11['critical']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw11['critical']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw11['critical']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                            <select id="critical" name="critical" class="form-control" hidden >
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw11['critical']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw11['critical']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw11['critical']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw11['critical']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw11['critical']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw11['critical']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw11['critical']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw11['critical']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw11['critical']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw11['critical']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw11['critical']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                          </div>    

                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Major&nbsp;AQL&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                            <select id="maj" name="maj" class=" form-control bg-white" disabled>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw11['major']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw11['major']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw11['major']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw11['major']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw11['major']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw11['major']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw11['major']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw11['major']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw11['major']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw11['major']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw11['major']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                            <select id="major" name="major" class=" form-control" hidden>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw11['major']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw11['major']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw11['major']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw11['major']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw11['major']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw11['major']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw11['major']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw11['major']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw11['major']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw11['major']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw11['major']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                          </div>                       
                          
                           <div class="col-md-3">
                          <label class="form-label" for="collapsible-fullname">Minor&nbsp;AQL&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                           <select id="min" name="min" class=" form-control bg-white" disabled>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw11['minor']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw11['minor']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw11['minor']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw11['minor']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw11['minor']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw11['minor']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw11['minor']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw11['minor']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw11['minor']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw11['minor']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw11['minor']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                           <select id="minor" name="minor" class=" form-control" hidden>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw11['minor']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw11['minor']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw11['minor']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw11['minor']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw11['minor']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw11['minor']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw11['minor']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw11['minor']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw11['minor']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw11['minor']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw11['minor']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                          </div>   
                          </div>    

                            <br>
                           <div class="row g-3">
                           <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Inspector Location&nbsp;<span style="color:red;">*</span></label>
                            <input 
                              type="text"
                              id="inspectloc"
                              name="inspectloc"
                              class="form-control"
                              readonly
                              value="<?php echo $rw11['inspectloc'];?>"
                              placeholder="" >
                          </div>   
                          </div> 
                          <div class="card-body">
                          <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <img 
                      src="uploads/<?php echo $rw11['uploadimg']; ?>"
                            id="imagePreview"
                            style="width: 100%;
            height: 100%;
           
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center; background-image: url(http://192.168.1.11/projects/credence/pages/uploads/<?php echo $rw11['uploadimg']; ?>);"
                          class="d-block w-px-100 h-px-100 rounded"
                         
                          
                          />    
                        <div class="button-wrapper">
                          <label for="imageUpload" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span  class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              name="imageUpload"
                              id="imageUpload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg" />
                          </label>
                          <input type="text" hidden name="imageUpload_1"  value="<?php echo $rw11['uploadimg'];?>"/>
                      
                          

                          <button type="cancel" value="cancel" class="btn btn-label-secondary account-image-reset mb-3">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                      </div>
</div>
                          </div>
					
                    </div>
                </div>
                </div>

                <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">1.Quantity Details</span>
                     </div>

                     <div class="card card-body">
                     <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom " >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="padding-bottom:35px;font-weight:bold" rowspan="2" style="width:50px">Po&nbsp;No</th>
                                  <th style="padding-bottom:30px;font-weight:bold" rowspan="2">sku&nbsp;/ Article&nbsp;No</th> 
                                  <th  style="padding-bottom:30px;font-weight:bold" rowspan="2">Order Qty(pcs)</th> 
                                  <th style="text-align:center;font-weight:bold" colspan="3">Offered&nbsp;Quantity Breakdown(sets)</th> 
                                  <th style="padding-bottom:30px;font-weight:bold" rowspan="2">Quantity&nbsp;per carton(Pcs)</th>
                                  <th style="padding-bottom:30px;font-weight:bold" rowspan="2">Total&nbsp;no&nbsp;of cartons</th>
                                  <th style="text-align:center;font-weight:bold" colspan="2">samples&nbsp;picked</th>
                                 
                                </tr>
                                <tr >
                                  <th style="font-weight:bold">packed&nbsp;(pcs)</th> 
                                  <th style="font-weight:bold">unpacked&nbsp;(pcs)</th> 
                                  <th style="font-weight:bold">unfinished&nbsp;(Pcs)</th>
                                 <th style="width:120px;font-weight:bold">packed&nbsp;(pcs)</th> 
                                  <th style="width:120px;font-weight:bold">unpacked&nbsp;(pcs)</th> 
                                 
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $sno=1;
                              $i=0; 
                              $tqty=0;
					  $sql2 = "SELECT * FROM inspection_qty where cid='$sid'";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw2 = mysqli_fetch_array($result2))
					{
            
             ?> 
             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw2['id'];?>">
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="pono1<?php echo $i;?>"
                                    name="pono1[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw2['pono1'];?>"                                
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="skuno<?php echo $i;?>"
                                    name="skuno[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw2['skuno'];?>"                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="orderqty<?php echo $i;?>"
                                    name="orderqty[]" 
                                    style="text-align:center;"
                                    readonly
                                    value="<?php echo $rw2['orderqty'];?>"
                                    onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pack1<?php echo $i;?>"
                                name="pack1[]" 
                                value="<?php echo $rw2['pack1'];?>"
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unpack1<?php echo $i;?>"
                                name="unpack1[]" 
                                value="<?php echo $rw2['unpack1'];?>"
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unfinish<?php echo $i;?>"
                                name="unfinish[]" 
                                value="<?php echo $rw2['unfinish'];?>"
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="cartonqty<?php echo $i;?>"
                                    name="cartonqty[]" 
                                    value="<?php echo $rw2['cartonqty'];?>"    
                                         onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"                           
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="totcarton<?php echo $i;?>"
                                name="totcarton[]"
                                 value="<?php echo $rw2['totcarton'];?>"
                                 onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;width:120px"
                                    id="pack2<?php echo $i;?>"
                                name="pack2[]"
                                  value="<?php echo $rw2['pack2'];?>"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center"
                                    id="unpack2<?php echo $i;?>"
                                name="unpack2[]"
                                value="<?php echo $rw2['unpack2'];?>"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="1234567<?php echo $i;?>" class="btn btn-primary" onclick="ee4(this.id)">+</span>
          </td>
                                </tr>
                                <?php
								$i++;
                $tqty+=$rw2['orderqty'];

          }
        $j=$i;
        for ($i = $j, $sno = $j+1; $i < 10; $i++, $sno++) {
          ?>
          <input type="text" hidden name="rid[]" id="rid" value="">
                                <tr id="s4<?php echo $i;?>" style="display:none">
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="pono1<?php echo $i;?>"
                                    name="pono1[]"
                                    style="text-align:center;"
                                                                  
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="skuno<?php echo $i;?>"
                                    name="skuno[]"
                                    style="text-align:center;"
                                                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="orderqty<?php echo $i;?>"
                                    name="orderqty[]" 
                                    style="text-align:center;"
                                    onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pack1<?php echo $i;?>"
                                name="pack1[]" 
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unpack1<?php echo $i;?>"
                                name="unpack1[]" 
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unfinish<?php echo $i;?>"
                                name="unfinish[]" 
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="cartonqty<?php echo $i;?>"
                                    name="cartonqty[]"     
                                         onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"                           
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="totcarton<?php echo $i;?>"
                                name="totcarton[]"
                                 onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="pack2<?php echo $i;?>"
                                name="pack2[]"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="unpack2<?php echo $i;?>"
                                name="unpack2[]"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);"
                                onchange="tot(pack1<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="1234567<?php echo $i;?>" class="btn btn-primary" onclick="ee4(this.id)">+</span>
          </td>
                                </tr>   
<?php
                           
                           
                          }
                              ?> 
                              <input type="text" hidden name="rc3" id="rc3" value="<?php echo $i;?>">
                              <tr>
                                
                                  <td colspan="2" style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    style="text-align:center;font-weight:bold"
                                    value="TOTAL" 
                                    readonly                                
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="qtytot"
                                    name="qtytot"      
                                    style="text-align:center;font-weight:bold"
                                    value="<?php echo $tqty;?>" 
                                    readonly                             
                                    aria-label="Product barcode"/>
                                       
              

                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pack1tot"
                                    name="pack1tot"   
                                    readonly    
                                    value="<?php echo $pack1;?>"                  
                                    style="text-align:center;font-weight:bold"                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="unpack1tot"
                                    name="unpack1tot"   
                                    value="<?php echo $unpack1;?>"        
                                    style="text-align:center;font-weight:bold"
                                        readonly                               
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="unfinishtot"
                                name="unfinishtot"      
                                 value="<?php echo $unfinish;?>"
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cartonqtytot"
                                name="cartonqtytot"      
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                value="<?php echo $cartonqty;?>" 

                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalcartontot"
                                name="totalcartontot"      
                                    style="text-align:center;font-weight:bold"
                                readonly   value="<?php echo $totalcarton;?>" 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pack2tot"
                                name="pack2tot"      
                                    style="text-align:center;font-weight:bold;width:120px"
                                readonly value="<?php echo $pack2;?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unpack2tot"
                                name="unpack2tot"      
                                    style="text-align:center;font-weight:bold;"
                                readonly value="<?php echo $unpack2;?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  

                                </tr>                 
                              </tbody>
                            </table>
                                </div>
                         <br>
                            <div class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Total number of selected Carton:&nbsp;<span style="color:red;">*</span></label>
                        <input 
                        type="text"
                        class="form-control"
                        id="selectedcarton"
                        name="selectedcarton"
                        value="<?php echo $selectcarton;?>"
                        >
                          </div>
                         
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Carton number/Item no &nbsp;<span style="color:red;">*</span></label>
                            <textarea
                              id="cartonno"
                              name="cartonno"
                              class="form-control" ><?php echo $cno;?></textarea>
                          </div>    
                          </div>
                           
                           <br>
                            <div class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Result</label>
                        <select id="qntyresult" name="qntyresult" class="form-select" >
                          <option value="">Select</option>
                          <option value="Pass" <?php if($rw11['qntyresult']=='Pass'){ ?>Selected<?php } ?> >PASS </option>
                          <option value="Fail"<?php if($rw11['qntyresult']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                          <option value="Pending"<?php if($rw11['qntyresult']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                          <option value="na"<?php if($rw11['qntyresult']=='na'){ ?>Selected<?php } ?>>N/A</option>
                      </select>
                          </div>
                         
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <textarea
                              id="qntyremark"
                              name="qntyremark"
                              
                              class="form-control" ><?php echo $qntremark;?></textarea>
                          </div>    
                          </div>
                            </div><br>

                            <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">2.Style, Material and Color Conformity</span>
                     </div>

                <div class="card card-body">
                <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom  ">
                                <tr >
                                  <th style="font-weight:bold">Item&nbsp;No</th>
                                  <th style="font-weight:bold">Approved&nbsp;sample/digital&nbsp;image&nbsp;provided&nbsp;by</th>
                                  <th style="font-weight:bold">Style&nbsp;&&nbsp;Material&nbsp;Color&nbsp;Conformity</th>
                                  <th style="font-weight:bold">Color&nbsp;or&nbsp;Shade&nbsp;Conformity</th>
                                  <th style="font-weight:bold">result</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                               $sql2 = "SELECT * FROM inspection_style where cid='$sid'";
                               $result2 = mysqli_query($conn, $sql2);
                               while($rw21 = mysqli_fetch_array($result2))
                               {
                                ?> 
                                <tr>
                        
                 <td style="padding: 0.3rem">
                  <input 
                                    type="text"
                                    class="form-control"
                                    id="styleitem<?php echo $i;?>"
                                    name="styleitem[]"
                                    style="width:100px" 
                                    readonly 
                                    value="<?php echo $rw21['styleitem']; ?>" 

                                    aria-label="Product barcode">
                </td>
                 <td style="padding: 0.3rem">
                 <select name="approve[]" id="approve<?php echo $i;?>"  class="form-select" >
                 <option value="">Select</option> 
               <option value="Buyer" <?php if($rw21['approve']=='Buyer'){ ?>Selected<?php } ?> >BUYER </option>
               <option value="Manufacturer"<?php if($rw21['approve']=='Manufacturer'){ ?>Selected<?php } ?>>MANUFACTURER</option>
               <option value="Credence Officer"<?php if($rw21['approve']=='Credence Officer'){ ?>Selected<?php } ?>>CREDENCE OFFICER</option>
               <option value="na"<?php if($rw21['approve']=='na'){ ?>Selected<?php } ?>>N/A</option>
                  </select>
                                       
                </td>
                                                
                <td style="padding: 0.3rem">
                <select id="stylematerial<?php echo $i;?>" name="stylematerial[]" class="form-select" >
                         <option value="">Select</option>
                          <option value="Yes" <?php if($rw21['stylematerial']=='Yes'){ ?>Selected<?php } ?> >YES </option>
                          <option value="No"<?php if($rw21['stylematerial']=='No'){ ?>Selected<?php } ?>>NO</option>
                          <option value="na"<?php if($rw21['stylematerial']=='na'){ ?>Selected<?php } ?>>N/A</option>
                      </select>
                </td>  

                <td style="padding: 0.3rem">
                <select id="stylecolor<?php echo $i;?>" name="stylecolor[]" class="form-select" >
                          <option value="">Select</option>
                          <option value="Yes" <?php if($rw21['stylecolor']=='Yes'){ ?>Selected<?php } ?> >YES </option>
                          <option value="No"<?php if($rw21['stylecolor']=='No'){ ?>Selected<?php } ?>>NO</option>
                          <option value="na"<?php if($rw21['stylecolor']=='na'){ ?>Selected<?php } ?>>N/A</option>
                      </select>      
                </td>  

                <td style="padding: 0.3rem">
                                    <select name="styleresult[]" style="width:120px" id="styleresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                 <option value="Pass" <?php if($rw21['styleresult']=='Pass'){ ?>Selected<?php } ?> >PASS </option>
                          <option value="Fail"<?php if($rw21['styleresult']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                          <option value="Pending"<?php if($rw21['styleresult']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                          <option value="na"<?php if($rw21['styleresult']=='na'){ ?>Selected<?php } ?>>N/A</option>
                      </select>
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="01234567<?php echo $i;?>" class="btn btn-primary" onclick="ee8(this.id)">+</span>
          </td>
                                </tr>
                                <?php
                              // $i++;
                            }
                            $j = $i;
                              for ($i = $i, $sno = $j+1; $i <=5; $i++, $sno++) {
                                ?>
                                <tr id="s8<?php echo $i; ?>" style="display:none">
                        
                                <td style="padding: 0.3rem">
                  <input 
                                    type="text"
                                    class="form-control"
                                    id="styleitem<?php echo $i;?>"
                                    name="styleitem[]"
                                    style="width:100px" 
                                    aria-label="Product barcode">
                </td>
                 <td style="padding: 0.3rem">
                 <select name="approve[]" id="approve<?php echo $i;?>"  class="form-select" >
                 <option value="">Select</option>
                          <option value="Buyer">BUYER</option>
                          <option value="Manufacturer">MANUFACTURER</option>
                          <option value="Credence Officer">CREDENCE OFFICER</option>
                          <option value="na"> N/A</option>
                  </select>
                                       
                </td>
                                                
                <td style="padding: 0.3rem">
                <select id="stylematerial<?php echo $i;?>" name="stylematerial[]" class="form-select" >
                          <option value="">Select</option>
                          <option value="Yes">YES</option>
                          <option value="No">NO</option>
                          <option value="na">N/A</option>
                      </select>
                </td>  
                <td style="padding: 0.3rem">
                <select id="stylecolor<?php echo $i;?>" name="stylecolor[]" class="form-select" >
                          <option value="">Select</option>
                          <option value="Yes">YES</option>
                          <option value="No">NO</option>
                          <option value="na">N/A</option>
                      </select>      
                </td>
                <td style="padding: 0.3rem">
                                    <select name="styleresult[]" style="width:120px" id="styleresult<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Pass">PASS </option>
                                <option value="Fail">FAIL</option>
                                <option value="Pending">PENDING</option>
                                <option value="na">N/A</option>
                      </select>
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="01234567<?php echo $i;?>" class="btn btn-primary" onclick="ee8(this.id)">+</span>
          </td>
                                </tr>
                              <?php
                              }
                              ?>
                      </tbody>
                      </table>
                      <br>
                          </div> 
                         <hr>
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <textarea
                              id="styleremarks"
                              name="styleremarks"
                              class="form-control" ><?php echo  $styleremarks; ?></textarea>

                          </div> 
  </div><br>
              
  <!-- <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">1.Workmanship Summary</span>
                     </div>

                <div class="card card-body">
                        
                <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom ">
                                <tr >

                                  <th style="padding-bottom:55px;text-align:center;font-weight:bold"  rowspan="3" style="width:50px">Po&nbsp;No</th>
                                  <th style="padding-bottom:55px;text-align:center;font-weight:bold" rowspan="3">Item&nbsp;No</th> 
                                  <th style="padding-bottom:50px;text-align:center;font-weight:bold" rowspan="3">sample size(pcs)</th> 
                                  <th style="text-align:center;font-weight:bold" colspan="6">defects summary</th> 
                                  <th style="padding-bottom:55px;text-align:center;font-weight:bold" rowspan="3">Result</th>
                                 
                                </tr>
                                <tr >

                                  <th style="text-align:center;font-weight:bold" colspan="2">critical</th> 
                                  <th style="text-align:center;font-weight:bold" colspan="2">major</th> 
                                  <th style="text-align:center;font-weight:bold" colspan="2">minor</th>
                                 
                                </tr>
                                <tr >

                                  <th style="text-align:center;font-weight:bold">allowed</th> 
                                  <th style="text-align:center;font-weight:bold">found</th> 
                                  <th style="text-align:center;font-weight:bold">allowed</th>
                                 <th style="text-align:center;font-weight:bold">found</th> 
                                 <th style="text-align:center;font-weight:bold">allowed</th> 
                                 <th style="text-align:center;font-weight:bold">found</th> 
                                 
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $sno=1;
                              $i=0; 
                              $tqty=0;
					  $sql2 = "SELECT * FROM inspection_wm_summary where cid='$sid'";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw3 = mysqli_fetch_array($result2))
					{
             ?> 
             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw3['id'];?>">
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="wmpono<?php echo $i;?>"
                                    name="wmpono[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw3['wmpono'];?>"                                
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="itemno<?php echo $i;?>"
                                    name="itemno[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw3['itemno'];?>"                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    name="size[]" 
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw3['size'];?>" 
                                    onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    value="<?php echo $rw2['size'];?>"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="callow<?php echo $i;?>"
                                name="callow[]" 
                                    style="text-align:center;"
                                    value="<?php echo $rw3['callow'];?>" 
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cfound<?php echo $i;?>"
                                name="cfound[]" 
                                    style="text-align:center;"
                                    value="<?php echo $rw3['cfound'];?>" 
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majallow<?php echo $i;?>"
                                name="majallow[]" 
                                    style="text-align:center;"
                                    value="<?php echo $rw3['majallow'];?>" 
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="majfound<?php echo $i;?>"
                                    name="majfound[]"     
                                    value="<?php echo $rw3['majfound'];?>" 
                                         onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"                           
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minallow<?php echo $i;?>"
                                name="minallow[]"
                                    value="<?php echo $rw3['minallow'];?>" 
                                 onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minfound<?php echo $i;?>"
                                name="minfound[]"
                                    value="<?php echo $rw3['minfound'];?>" 
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td  style="padding: 0.3rem">
                                    <select name="wmresult1[]" id="wmresult1<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                    <option value="">Select</option>
                          <option value="Pass"<?php if($rw3['wmresult1']=='Pass'){ ?>Selected<?php } ?>>PASS</option>
                          <option value="Fail"<?php if($rw3['wmresult1']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                          <option value="Pending"<?php if($rw3['wmresult1']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                          <option value="na"<?php if($rw3['wmresult1']=='na'){ ?>Selected<?php } ?>>N/A</option>
                              </select>       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123<?php echo $i;?>" class="btn btn-primary" onclick="ee5(this.id)">+</span>
          </td>
                                </tr>
                                <?php

                                // $i++;
                                $tqty1+=$rw3['size'];
                                 }
                                 $j=$i;
        for ($i = $j, $sno = $j+1; $i < 10; $i++, $sno++) {
                                  ?>
                                  <input type="text" hidden name="rid[]" id="rid" value="">
                                <tr id="s5<?php echo $i;?>" style="display:none">
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="wmpono<?php echo $i;?>"
                                    name="wmpono[]"
                                    style="text-align:center;"                              
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="itemno<?php echo $i;?>"
                                    name="itemno[]"
                                    style="text-align:center;"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                    name="size[]" 
                                    style="text-align:center;"
                                     onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="callow<?php echo $i;?>"
                                     name="callow[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cfound<?php echo $i;?>"
                                name="cfound[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majallow<?php echo $i;?>"
                                name="majallow[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="majfound<?php echo $i;?>"
                                    name="majfound[]"     
                                         onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"                           
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minallow<?php echo $i;?>"
                                name="minallow[]"
                                 onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minfound<?php echo $i;?>"
                                name="minfound[]"
                                onkeyUp="tot1(callow<?php echo $i;?>.id);"
                                onchange="tot1(callow<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td  style="padding: 0.3rem">
                                    <select name="wmresult1[]" id="wmresult1<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Pass">PASS </option>
                                <option value="Fail">FAIL</option>
                                <option value="Pending">PENDING</option>
                                <option value="na">N/A</option>
                                
                              </select>       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123<?php echo $i;?>" class="btn btn-primary" onclick="ee5(this.id)">+</span>
          </td>
                                </tr>
                                     
<?php
                           
                        
                        }
                              ?> 
                              <input type="text" hidden name="rc4" id="rc4" value="<?php echo $i;?>">
                              <tr>
                                
                                  <td colspan="2" style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    style="text-align:center;font-weight:bold"
                                    value="TOTAL"     
                                    readonly                            
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="sizetot"
                                    name="sizetot"      
                                    style="text-align:center;font-weight:bold"
                                    value="<?php echo $tqty1;?>" 
                                    readonly                             
                                    aria-label="Product barcode"/>
                                       
              

                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="callowtot"
                                    name="callowtot"   
                                    readonly              
                                    value="<?php echo $callowtot;?>"        
                                    style="text-align:center;font-weight:bold"                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="cfoundtot"
                                    name="cfoundtot"        
                                     value="<?php echo $cfoundtot;?>"   
                                    style="text-align:center;font-weight:bold"
                                        readonly                               
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="majallowtot"
                                name="majallowtot"
                                 value="<?php echo $majallowtot;?>"      
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majfoundtot"
                                name="majfoundtot"  
                                 value="<?php echo $majfoundtot;?>"     
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="minallowtot"
                                name="minallowtot"
                                 value="<?php echo $minallowtot;?>"       
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="minfoundtot"
                                name="minfoundtot" 
                                  value="<?php echo $minfoundtot;?>"         
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                      
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      </tr>
                                        
                              </tbody>
                            </table>
                            <br>
                            
                            </div>
                            <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Notes</label>
                            <textarea class="form-control" id="wmnotes" name="wmnotes"><?php echo $wmnotes;?></textarea>
                        </div>
                        </div>
                            <br>    -->
              
                            <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">3.A Workmanship Record</span>
                     </div>

                <div class="card card-body">
                        
                <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom  ">
                                <tr style="font-weight:bold">
                                  <th style="text-align:center;width:50px;font-weight:bold">s.no</th>
                                  <th style="text-align:center;width:50px;font-weight:bold">po&nbsp;no</th>
                                  <th style="text-align:center;width:50px;font-weight:bold">style&nbsp;no</th>
                                  <th style="text-align:center;width:50px;font-weight:bold">colour</th>
                                  <th style="text-align:center;width:50px;font-weight:bold">size</th>
                                  <th style="text-align:center;font-weight:bold">Defect&nbsp;no</th>
                                  <th style="font-weight:bold">Defect&nbsp;description</th>
                                  <th style="font-weight:bold">Defect&nbsp;size</th>
                                  <th style="text-align:center;font-weight:bold">critical</th>
                                  <th style="text-align:center;font-weight:bold">major</th>
                                  <th style="text-align:center;font-weight:bold">minor</th>
                                </tr>
                              </thead>
                              <tbody>
                            
                                <tr>
                                <?php
                                $sno=1;
                                $i=0;
                              	  $sql4 = "SELECT * FROM inspection_wm_records where cid='$sid'";
                                  $result4 = mysqli_query($conn, $sql4);
                                  while($rw4 = mysqli_fetch_array($result4))
                        {
                                ?>  
                                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw4['id'];?>">
                                  <td  style="padding: 0.3rem;text-align:center">
                                 <?php echo $sno;?>
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pono_work<?php echo $i;?>"
                                    name="pono_work[]"
                                    value="<?php echo $rw4['pono_work']; ?>"
                                    style="text-align:center"  
                                    readonly               
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="style_work<?php echo $i;?>"
                                    name="style_work[]"
                                    value="<?php echo $rw4['style_work']; ?>"
                                    style="text-align:center"
                                    readonly                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="color_work<?php echo $i;?>"
                                    name="color_work[]"
                                    value="<?php echo $rw4['color_work']; ?>"             
                                    aria-label="Product barcode"/>
                                       
                </td>

                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size_work<?php echo $i;?>"
                                    name="size_work[]"
                                    value="<?php echo $rw4['size_work']; ?>"             
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="defectno<?php echo $i;?>"
                                    name="defectno[]"
                                    value="<?php echo $rw4['defectno']; ?>"
                                    style="text-align:center"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="defectdesc<?php echo $i;?>"
                                    name="defectdesc[]"
                                    value="<?php echo $rw4['defectdesc']; ?>"                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                 <td style="padding: 0.3rem">
                 <select id="defsize<?php echo $i;?>" name="defsize[]" class="form-select" >
                          <option value="">Select</option>
                          <option value="inch"<?php if($rw4['defsize']=='inch'){ ?>Selected<?php } ?>>INCH</option>
                          <option value="cm"<?php if($rw4['defsize']=='cm'){ ?>Selected<?php } ?>>CM</option>
                   </select>  
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_critical<?php echo $i;?>"
                                name="wmr_critical[]"
                                style="text-align:center" 
                                value="<?php echo $rw4['wmr_critical']; ?>"
                                onchange="tott(wmr_critical<?php echo $i;?>.id)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_major<?php echo $i;?>"
                                name="wmr_major[]" 
                                style="text-align:center"
                                value="<?php echo $rw4['wmr_major']; ?>"
                                 onchange="tott(wmr_critical<?php echo $i;?>.id)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_minor<?php echo $i;?>"
                                name="wmr_minor[]"
                                style="text-align:center" 
                                value="<?php echo $rw4['wmr_minor']; ?>"
                                 onchange="tott(wmr_critical<?php echo $i;?>.id)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123456789<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
                                </tr>
                                <?php
                             
                           $sno++;
                          $i++;
                        }
                            $j=$i;
                              for ($i = $j, $sno = $j+1; $i <=19; $i++, $sno++) {
                                ?>
                                <input type="text" hidden name="rid[]" id="rid" value="">
                      <tr id="s1<?php echo $i; ?>" style="display:none">

                                  <td  style="padding: 0.3rem;text-align:center">
                                    <?php echo $sno;?>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pono_work<?php echo $i;?>"
                                    name="pono_work[]"  
                                    style="text-align:center"                     
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="style_work<?php echo $i;?>"
                                    name="style_work[]"  
                                    style="text-align:center"                     
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="color_work<?php echo $i;?>"
                                    name="color_work[]"                     
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size_work<?php echo $i;?>"
                                    name="size_work[]"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="defectno<?php echo $i;?>"
                                    name="defectno[]"  
                                    style="text-align:center"                     
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="defectdesc<?php echo $i;?>"
                                    name="defectdesc[]"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                <td style="padding: 0.3rem">
                 <select class="form-select" id="defsize<?php echo $i;?>" name="defsize[]">
                <option value="">Select</option>                  
                <option value="inch">INCH</option>                  
                <option value="cm">CM</option>                  
                 </select>
                </td>         

                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_critical<?php echo $i;?>"
                                name="wmr_critical[]" 
                                style="text-align:center"
                                 onchange="tott(wmr_critical<?php echo $i;?>.id)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_major<?php echo $i;?>"
                                name="wmr_major[]"
                                style="text-align:center" 
                                 onchange="tott(wmr_critical<?php echo $i;?>.id)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_minor<?php echo $i;?>"
                                name="wmr_minor[]"
                                style="text-align:center"
                                 onchange="tott(wmr_critical<?php echo $i;?>.id)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>                          
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123456789<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
               </tr>
                                     
<?php
                        }
                        
                              ?> 
                          <input type="text" hidden name="rc3" id="rc3" value="<?php echo $i;?>"> 
                              <tr>
                                
                                  <td colspan="8" style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    style="text-align:right;font-weight:bold"
                                    value="TOTAL FOUND"  
                                    readonly                               
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="critfoundtot"
                                name="critfoundtot"   
                                value="<?php echo $critfoundtot;?>"   
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majfoundtot1"
                                name="majfoundtot1"
                                value="<?php echo $majfoundtot1;?>"         
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="minfoundtot1"
                                name="minfoundtot1"    
                                  value="<?php echo $minfoundtot1;?>" 
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>
                                </tr>                 
                              <tr>
                                
                                  <td colspan="8" style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    style="text-align:right;font-weight:bold"
                                    value="ACCEPTANCE"   
                                    readonly                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="critaccepttot"
                                name="critaccepttot"      
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                value="<?php echo  $critaccepttot;?>" 

                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majaccepttot"
                                name="majaccepttot"      
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                  value="<?php echo  $majaccepttot;?>" 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="minaccepttot"
                                name="minaccepttot"     
                                value="<?php echo   $minaccepttot;?>" 

                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>
                                </tr> 
                      </tbody>
                      </table>
 </div>   
 <br>
 <div class="row">
                      <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Result</label>
                        <select id="wmresult2" name="wmresult2" class="form-select" >
                          <option value="">Select</option>
                          <option value="Pass"<?php if($rw11['wmresult2']=='Pass'){ ?>Selected<?php } ?>>PASS</option>
                          <option value="Fail"<?php if($rw11['wmresult2']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                          <option value="Pending"<?php if($rw11['wmresult2']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                          <option value="na"<?php if($rw11['wmresult2']=='na'){ ?>Selected<?php } ?>>N/A</option>
                      </select>
                          </div>
                         
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <textarea
                              id="wmremarks"
                              name="wmremarks"
                              
                              class="form-control" ><?php echo $wmremarks;?></textarea>
                          </div> 
                          </div> 
                     <hr>
 </div><br>


 <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">4.Packing Details</span>
                     </div>

                <div class="card card-body">
                        
                <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom "  >
                                <tr style="font-weight:bold">

                                  <th  rowspan="2" style="width:50px;font-weight:bold;padding-bottom:30px;text-align:center">Sku&nbsp;/ Article&nbsp;No</th>
                                  <th   style="font-weight:bold;text-align:center" colspan="2">QTY/Master Carton (sets)</th> 
                                  <th  style="font-weight:bold;text-align:center" colspan="2">QTY/Inner carton&nbsp;(pcs) </th> 
                                  <th  style="font-weight:bold;text-align:center" colspan="2">Carton&nbsp;Gross&nbsp;weight&nbsp;(KGS) </th> 
                                  <th  style="font-weight:bold;text-align:center" colspan="2">Carton&nbsp;Dimension&nbsp;(CM)&nbsp;LxWxH</th>
                                 
                                </tr>
                                 <tr style="font-weight:bold">
                                  <th style="text-align:center;font-weight:bold;text-align:center">spec</th> 
                                  <th style="text-align:center;font-weight:bold;text-align:center">actual</th> 
                                  <th style="text-align:center;font-weight:bold;text-align:center">spec</th> 
                                  <th style="text-align:center;font-weight:bold;text-align:center">actual</th>
                                  <th style="text-align:center;font-weight:bold;text-align:center">spec</th>
                                  <th style="text-align:center;font-weight:bold;text-align:center">actual</th>
                                  <th style="text-align:center;font-weight:bold;text-align:center">spec</th>
                                  <th style="text-align:center;font-weight:bold;text-align:center">actual</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                              <?php 
                              $sno=1;
                              $i=0; 
                              
					  $sql2 = "SELECT * FROM inspection_packing where cid='$sid'";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw2 = mysqli_fetch_array($result2))
					{
             ?> 
             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw2['id'];?>">
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="pkpono<?php echo $i;?>"
                                    name="pkpono[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw2['pkpono'];?>"                                
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="qtyspec<?php echo $i;?>"
                                    name="qtyspec[]"
                                    style="text-align:center;"
                                    value="<?php echo $rw2['qtyspec'];?>"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="qtyactual<?php echo $i;?>"
                                    name="qtyactual[]" 
                                    style="text-align:center;"
                                    value="<?php echo $rw2['qtyactual'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="innerspec<?php echo $i;?>"
                                name="innerspec[]" 
                                    style="text-align:center;"
                                   value="<?php echo  $rw2['innerspec'];?>"

                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="inneractual<?php echo $i;?>"
                                name="inneractual[]" 
                                    style="text-align:center;"
                               value="<?php echo   $rw2['inneractual'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="grossspec<?php echo $i;?>"
                                name="grossspec[]" 
                                    style="text-align:center;"
                               value="<?php echo $rw2['grossspec'];?>"

                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="grossactual<?php echo $i;?>"
                                    name="grossactual[]"     
                                    value="<?php echo $rw2['grossactual'];?>"                               
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="dimspec<?php echo $i;?>"
                                name="dimspec[]"
                                value="<?php echo $rw2['dimspec'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="dimactual<?php echo $i;?>"
                                name="dimactual[]"
                                value="<?php echo $rw2['dimactual'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="12<?php echo $i;?>" class="btn btn-primary" onclick="ee6(this.id)">+</span>
          </td>
                                </tr>
                                 <?php
                                 $sno++;
                                //  $i++;
          }
                                        $j=$i;
                                        for ($i = $j, $sno = $j+1; $i < 10; $i++, $sno++) 
                                        {
                                           ?>
                            <input type="text" hidden name="rid[]" id="rid" value="">
                                <tr id="s6<?php echo $i;?>" style="display:none">
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="pkpono<?php echo $i;?>"
                                    name="pkpono[]"
                                    
                                    style="text-align:center;"                                
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="qtyspec<?php echo $i;?>"
                                    name="qtyspec[]"
                                    
                                    style="text-align:center;"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="qtyactual<?php echo $i;?>"
                                    name="qtyactual[]" 
                                    style="text-align:center;"                            
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="innerspec<?php echo $i;?>"
                                name="innerspec[]" 
                                    style="text-align:center;"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="inneractual<?php echo $i;?>"
                                name="inneractual[]" 
                                    style="text-align:center;"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="grossspec<?php echo $i;?>"
                                name="grossspec[]" 
                                    style="text-align:center;"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="grossactual<?php echo $i;?>"
                                    name="grossactual[]"     
                                                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="dimspec<?php echo $i;?>"
                                name="dimspec[]"
                                
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="dimactual<?php echo $i;?>"
                                name="dimactual[]"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="12<?php echo $i;?>" class="btn btn-primary" onclick="ee6(this.id)">+</span>
          </td>
                                </tr>
                                     
                  <?php
                       
                        }
                              ?> 
                              <input type="text" hidden name="rc3" id="rc3" value="<?php echo $i;?>">
                           
                                 
                              </tbody>
                            </table>
                            </div>
                            <br>

                            <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Packing Method&nbsp;</label>
                            <textarea
                              id="packmethod"
                              name="packmethod"
                              class="form-control" ><?php  echo $packmethod;?></textarea>

                          </div>
                          <br>
                          <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Carton&nbsp;Ply&nbsp;</label>
                            <input
                              type="text"
                              id="cartonply"
                              name="cartonply"
                              class="form-control"
                              value="<?php  echo $cartonply;?>"
                               />
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Fastening&nbsp;Method&nbsp;</label>
                            <input
                              type="text"
                              id="fastmethod"
                              name="fastmethod"
                               value="<?php echo  $fastmethod;?>"

                              class="form-control"
                              placeholder="" />
                          </div>    

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Material&nbsp;</label>
                            <input
                              type="text"
                              id="material"
                              name="material"
                              value="<?php echo   $material;?>"

                              class="form-control"
                              placeholder="" />
                          </div>                       
                        
                     <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Metal&nbsp;Strapped?&nbsp;</label>
                            
                       <input
                              type="text"
                              id="metal"
                              name="metal"
                               value="<?php echo $metal;?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                     <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Result&nbsp;</label>
                          <select name="packresult"  id="packresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
                          <option value="">Select</option>
                          <option value="Pass"<?php if($rw11['packresult']=='Pass'){ ?>Selected<?php } ?>>PASS</option>
                          <option value="Fail"<?php if($rw11['packresult']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                          <option value="Pending"<?php if($rw11['packresult']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                          <option value="na"<?php if($rw11['packresult']=='na'){ ?>Selected<?php } ?>>N/A</option>
                      </select>
                          </div>
                          
                          <br>
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks&nbsp;</label>
                            <textarea
                              id="packremark"
                              name="packremark"
                              
                              class="form-control" ><?php echo  $packremark;?></textarea>

                          </div> 
                         </div>
                         </div>
                            <br> 


                                <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">5.Carton Marking / Labelling / Trims</span>
                     </div>

                <div class="card card-body">
                        
                <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom  ">
                                <tr >
                                  <th style="font-weight:bold">Specifications</th>
                                  <th style="font-weight:bold">Result</th>
                                  <th style="font-weight:bold">observations</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                 $i=0;
                             	  $sql21 = "SELECT * FROM inspection_carton where cid='$sid'";
                                 $result21 = mysqli_query($conn, $sql21);
                                 while($rw21 = mysqli_fetch_array($result21))
                        {
                                ?> 
                                <input type="text" hidden name=rid7[] id="rid7<?php echo $i;?>" value="<?php echo $rw21['id'];?>">
                                <tr>
                        
                                <td style="padding: 0.3rem">
                  <select name="specs[]" id="specs<?php echo $i;?>" class="form-select">         
                    <option value="">Select</option>
                    <?php 
                    $query = "SELECT * FROM carton_master ORDER BY id asc";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)){
?>
       <option <?php if($row['id']==$rw21['specs']){ ?> Selected <?php } ?> value="<?php echo $row['id'];?>"><?php echo $row['specs'];?></option>
       <?php }?>
                </td>
                
                <td style="padding: 0.3rem">
                  <select name="cartonresult[]" style="width:150px" id="cartonresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
                    <option value="">Select</option>
                    <option value="Conform" <?php if($rw21['cartonresult']=='Conform'){ ?>Selected<?php } ?>>Conform </option>
                    <option value="Not Conform"<?php if($rw21['cartonresult']=='Not Conform'){ ?>Selected<?php } ?>>Not Conform</option>
                    <option value="na" <?php if($rw21['cartonresult']=='na'){ ?>Selected<?php } ?>>N/A</option>
                  </select>
                </td>  

                <td style="padding: 0.3rem">
                 <input 
                 type="text"
                 style="width:850px"
                 name="observation[]" 
                 id="observation<?php echo $i;?>"  
                 class="form-control" 
                 value="<?php echo $rw21['observation']; ?>"
                 >         
               </td>

                <td>
                  <span style="font-size:16px;font-family:table-icons" id="carton<?php echo $i;?>" class="btn btn-primary" onclick="ee05(this.id)">+</span>
          </td>
                                </tr>
                                <?php
                              }
                              $j = $i;
                              for ($i = $j, $sno = $j +1; $i <=50; $i++, $sno++) {
                                ?>
                                <tr id="s05<?php echo $i; ?>" style="display:none">
                               
                                <td style="padding: 0.3rem">
                  <select name="specs[]" id="specs<?php echo $i;?>" class="form-select">         
                    <option value="">Select</option>
                    <?php 
                    $query = "SELECT * FROM carton_master ORDER BY id asc";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($result)){
?>
                 <option value="<?php echo $row['id'];?>"><?php echo $row['specs'];?></option>
                    <?php }?>
                </td>
                
                <td style="padding: 0.3rem">
                  <select name="cartonresult[]" style="width:150px" id="cartonresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
                    <option value="">Select</option>
                    <option value="conform">Conform </option>
                    <option value="Mot Conform">Not Conform</option>
                    <option value="na">N/A</option>
                  </select>
                </td>  

                <td style="padding: 0.3rem">
                 <select 
                 type="text"
                 name="observation[]" 
                 id="observation<?php echo $i;?>"  
                 class="form-control" 
                 >         
               </td>

                <td>
                  <span style="font-size:16px;font-family:table-icons" id="carton<?php echo $i;?>" class="btn btn-primary" onclick="ee05(this.id)">+</span>
                </td>
                           </tr>
                              <?php
                              }
                              ?>
                      </tbody>
                      </table>
                      <br>

                      

                   
                          </div><div class="row g-3">
                          
                         
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Result:&nbsp;</label>
                           <select name="cartresult" id="cartresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
                    <option value="">Select</option>
                    <option value="Pass"<?php if($rw11['cartresult']=='Pass'){ ?>Selected<?php } ?>>PASS </option>
                    <option value="Fail"<?php if($rw11['cartresult']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                    <option value="Pending"<?php if($rw11['cartresult']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                    <option value="na"<?php if($rw11['cartresult']=='na'){ ?>Selected<?php } ?>>N/A</option>
                  </select>
                          </div>    

                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Remarks&nbsp;</label>
                            <textarea
                            name="cartremarks"
                            id="cartremarks<?php echo $i;?>"
                            class="form-control"
                            ><?php echo $rw11['cartremarks'];?></textarea>
                          </div>                       
                              
                          </div>
                           </div><br>


                            <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">6.Onsite Testing</span>
                     </div>

                <div class="card card-body">
                        
                <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom  ">
                                <tr >
                                  <th style="font-weight:bold">Test</th>
                                  <th style="font-weight:bold">sample&nbsp;size</th>
                                  <th style="font-weight:bold">method&nbsp;of&nbsp;testing</th>
                                  <th style="font-weight:bold">Details&nbsp;of&nbsp;Testing (tested&nbsp;parts&nbsp;&&nbsp;failure&nbsp;details)</th>
                                  <th style="font-weight:bold">result</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                             	  $sql21 = "SELECT * FROM inspection_onsite where cid='$sid' order by id asc";
                                 $result21 = mysqli_query($conn, $sql21);
                                 while($rw21 = mysqli_fetch_array($result21))
                       {
                                ?> 
                                <input type="text" hidden name="rid6[]" id="rid6" value="<?php echo $rw21['id'];?>">
                                <tr>
                        
                 <td style="padding: 0.3rem">
                  <select name="testtype[]" id="testtype<?php echo $i;?>"  class="form-select" style="width:230px;font-weight:bold"  onchange="get_type(this.id,this.value)">
                                <option value="">Select</option>
                 <?php
                 $sql = "SELECT * FROM test_detail Order By id asc";
                 $result = mysqli_query($conn, $sql);
                 while($row = mysqli_fetch_assoc($result)) {
                  ?>
       <option <?php if($row['id']==$rw21['testtype']){ ?> Selected <?php } ?> value="<?php echo $row['id'];?>"><?php echo $row['testtype'];?></option>

                  <?php
                 }
                 ?>
                  </select>
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="dropsize<?php echo $i;?>"
                                    name="dropsize[]"
                                    style="width:140px"  
                                    value="<?php echo $rw21['dropsize'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="dropmethod<?php echo $i;?>"
                                name="dropmethod[]" 
                                style="width:350px" 
                                value="<?php echo $rw21['dropmethod'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="dropdetail<?php echo $i;?>"
                                name="dropdetail[]" 
                                 style="width:350px" 
                                 value="<?php echo $rw21['dropdetail'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                                    <select name="dropresult[]" style="width:120px" id="dropresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
                                    <option value="">Select</option>
                          <option value="Pass">PASS</option>
                          <option value="Fail"<?php if($rw21['dropresult']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                          <option value="Pending"<?php if($rw21['dropresult']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                          <option value="na"<?php if($rw21['dropresult']=='na'){ ?>Selected<?php } ?>>N/A</option>
                      </select>
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="0123456789<?php echo $i;?>" class="btn btn-primary" onclick="ee3(this.id)">+</span>
          </td>
                                </tr>
                                <?php
                             $i++;
                             }
                             $j = $i;
                              for ($i = $j, $sno = $j+1; $i <=10; $i++, $sno++) {
                                ?>
                                <input type="text" hidden name="rid6[]" id="rid6" value="">
                                <tr id="s3<?php echo $i; ?>" style="display:none">
                        
                 <td style="padding: 0.3rem">
                 <select name="testtype[]" id="testtype<?php echo $i;?>"  class="form-select" style="width:230px;font-weight:bold"  onchange="get_type(this.id,this.value)">
                                <option value="">Select</option>
                 <?php
                 $sql = "SELECT * FROM test_detail Order By id asc";
                 $result = mysqli_query($conn, $sql);
                 while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <option value="<?php echo  $row['id']; ?>"><?php echo $row['testtype']; ?></option>
                  <?php
                 }
                 ?>
                  </select>
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="dropsize<?php echo $i;?>"
                                    name="dropsize[]"
                                    style="width:140px"  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="dropmethod<?php echo $i;?>"
                                name="dropmethod[]" 
                                style="width:350px" 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="dropdetail<?php echo $i;?>"
                                name="dropdetail[]" 
                                 style="width:350px" 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                                    <select name="dropresult[]" style="width:120px" id="dropresult<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Pass">PASS </option>
                                <option value="Fail">FAIL</option>
                                <option value="Pending">PENDING</option>
                                <option value="na">N/A</option>
                      </select>
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="0123456789<?php echo $i;?>" class="btn btn-primary" onclick="ee3(this.id)">+</span>
          </td>
                                </tr>
                              <?php
                              }
                              ?>
                      </tbody>
                      </table>
                      <br>

                      

                   
                          </div><div class="row g-3">
                          
                         
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">MEASUREMENT CHART PROVIDED BY:&nbsp;</label>
                          <select name="measurement" id="measurement" class="form-select" >
                            <option value="">Select</option>
                            <option value="Buyer"<?php if($tolprovide=='Buyer'){ ?>Selected<?php } ?>>Buyer</option>
                            <option value="Manufacturer"<?php if($rw11['measurement']=='Manufacturer'){ ?>Selected<?php } ?>>Manufacturer</option>
                            <option value="Not Available"<?php if($rw11['measurement']=='Not Available'){ ?>Selected<?php } ?>>Not Available</option>
                            </select>
                          </div>    

                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Measurement&nbsp;Result&nbsp;</label>
                            <select name="measureresult" id="measureresult" class="form-select" >
                            <option value="">Select</option>
                            <option value="Within Tolerance"<?php if($rw11['measureresult']=='Within Tolerance'){ ?>Selected<?php } ?>>Within Tolerance</option>
                            <option value="Beyond Tolerance"<?php if($rw11['measureresult']=='Beyond Tolerance'){ ?>Selected<?php } ?>>Beyond Tolerance</option>
                            <option value="Actual Finding"<?php if($rw11['measureresult']=='Actual Finding'){ ?>Selected<?php } ?>>Actual Finding</option>
                            </select>
                          </div>                       
                           
                     <div class="col-md-4">
                          <label class="form-label" for="collapsible-fullname">Tolerance&nbsp;Provided By&nbsp;</label>
                        <select name="tolprovide" id="tolprovide" class="form-select" >
                            <option value="">Select</option>
                            <option value="Buyer"<?php if($tolprovide=='Buyer'){ ?>Selected<?php } ?>>Buyer</option>
                            <option value="Manufacturer"<?php if($tolprovide=='Manufacturer'){ ?>Selected<?php } ?>>Manufacturer</option>
                            <option value="Not Available"<?php if($tolprovide=='Not Available'){ ?>Selected<?php } ?>>Not Available</option>
                            </select>
                          </div>
                              
                          </div>
                           </div><br>
              
                           <div style=" text-align:center;padding:15px">
                               <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">7.Client Special Requirement</span>
                            </div>
                            
                            <div class="card card-body ">
                        <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom  " >
                                <tr >

                                  <!-- <th   style="width:80px"><b>S.No</b></th> -->
                                  <th   ><b>Client Requirement</b></th> 
                                  <th  style="width:140px"><b>Result</b></th> 
                                 
                                </tr>
                                
                              </thead>
                              <tbody>
                              <?php
                              $i=0;
                              $sno=1;
                             	  $sql22 = "SELECT * FROM inspection_client where cid='$sid'";
                                 $result22 = mysqli_query($conn, $sql22);
                                 while($rw22 = mysqli_fetch_array($result22))
                       {
                                ?>  
                                <input type="text" hidden name="rid8[]" id="rid8" value="<?php echo $rw22['id'];?>">
                                <tr>
                                
                                  <td hidden style="padding: 0.3rem;text-align:center">
                                    <?php echo $sno;?>
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="clientreq<?php echo $i;?>"
                                    name="clientreq[]"   
                                    value="<?php echo $rw22['clientreq']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                                    <select name="clientresult[]" id="clientresult<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Pass"<?php if($rw22['clientresult']=='Pass'){ ?>Selected<?php } ?>>PASS </option>
                                <option value="Fail"<?php if($rw22['clientresult']=='Fail'){ ?>Selected<?php } ?>>FAIL</option>
                                <option value="Pending"<?php if($rw22['clientresult']=='Pending'){ ?>Selected<?php } ?>>PENDING</option>
                                <option value="na"<?php if($rw22['clientresult']=='na'){ ?>Selected<?php } ?>>N/A</option>
                                </select>         
                </td>
                                 
                <td style="width:50px">
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="12345<?php echo $i;?>" class="btn btn-primary" onclick="ee7(this.id)">+</span>
          </td>
                                </tr>
                           <?php
                          //  $sno++;   
                            }
                                $j=$i;
                                for ($i = $j, $sno = $sno; $i < 10; $i++, $sno++) {
                                ?>
                                <input type="text" hidden name="rid8[]" id="rid8" value="">
                        <tr id="s7<?php echo $i; ?>" style="display:none">
                        <td hidden style="padding: 0.3rem;text-align:center">
                                  <?php echo $sno;?>
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="clientreq<?php echo $i;?>"
                                    name="clientreq[]"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                                           <select name="clientresult[]" id="clientresult<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Pass">PASS </option>
                                <option value="Fail">FAIL</option>
                                <option value="Pending">PENDING</option>
                                <option value="na">N/A</option>
                                </select>      
                </td>
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="12345<?php echo $i;?>" class="btn btn-primary" onclick="ee7(this.id)">+</span>
          </td>
                                </tr> 
                               <?php
                            }
                              ?>
                                            
                              </tbody>
                            </table>
                            </div> 
                            <br> 

<div class="row g-3">
                          <div class="col-md-3">
                            
                            <label class="form-label" for="collapsible-fullname">Factory&nbsp;Repository&nbsp;</label>
                           <input type="text"
                           class="form-control" 
                           id="signe"
                           name="signe"
                           value="<?php echo $signe;?>"
                           aria-label="Full name" />
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Credence&nbsp;Inspector&nbsp;</label>
                             <select class="form-select" id="signed1" name="signed1" >
        <option value="">Select</option>
        <?php
        $sql = "SELECT * FROM employee Order By name asc";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          ?>
        <option <?php if($row['id']==$signed1){ ?> Selected <?php } ?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

          <?php
        }
        ?>
        </select>
                          </div>    

                          <div class="col-md-3">
                            
                            <label class="form-label" for="collapsible-fullname">Reviewed&nbsp;By&nbsp;</label>
                            <select class="form-select" id="signed2" name="signed2" >
        <option value="">Select</option>
        <?php
        $sql = "SELECT * FROM employee Order By name asc";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          ?>
      <option <?php if($row['id']==$signed2){ ?> Selected <?php } ?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

          <?php
        }
        ?>
        </select>
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Released&nbsp;By&nbsp;</label>
                             <select class="form-select" id="signed3" name="signed3" >
        <option value="">Select</option>
        <?php
        $sql = "SELECT * FROM employee Order By name asc";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          ?>
        <option <?php if($row['id']==$signed3){ ?> Selected <?php } ?> value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>

          <?php
        }
        ?>
        </select>
                          </div>    

                           
                          </div> 
                          </div>
               
                              </div>
                          
                          
            <div class="col-12 mt-4 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="inspect_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
                          <?php if($write_permit==1){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } else { ?>
                              <button disabled class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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

  $cid = $_POST['cid'];
  $dcno = $_POST['dcno'];
  $date = $_POST['date'];
  $jobno = $_POST['jobno'];
  $clientname = $_POST['clientname'];
  $factoryname = $_POST['factoryname'];
  $clientcountry = $_POST['clientcountry'];
  $sku = $_POST['sku'];
  $service = $_POST['service'];
  $pono = $_POST['pono'];
  $ordqty = $_POST['ordqty'];
  $inspectname = $_POST['inspectname'];
  $inspecttime = $_POST['inspecttime'];
  $inspectloc = $_POST['inspectloc'];
  $qtytot = $_POST['qtytot'];
  $pack1tot = $_POST['pack1tot'];
  $unpack1tot = $_POST['unpack1tot'];
  $unfinishtot = $_POST['unfinishtot'];
  $cartonqtytot = $_POST['cartonqtytot'];
  $totalcartontot = $_POST['totalcartontot'];
  $pack2tot = $_POST['pack2tot'];
  $unpack2tot = $_POST['unpack2tot'];
  $selectedcarton = $_POST['selectedcarton'];
  $cartonno = $_POST['cartonno'];
  $qntyresult = $_POST['qntyresult'];
  $qntyremark = $_POST['qntyremark'];
  $styleremarks = $_POST['styleremarks'];
  $sizetot = $_POST['sizetot'];
  $callowtot = $_POST['callowtot'];
  $cfoundtot = $_POST['cfoundtot'];
  $majallowtot = $_POST['majallowtot'];
  $majfoundtot = $_POST['majfoundtot'];
  $minallowtot = $_POST['minallowtot'];
  $minfoundtot = $_POST['minfoundtot'];
  $wmnotes = $_POST['wmnotes'];
  $critfoundtot = $_POST['critfoundtot'];
  $majfoundtot1 = $_POST['majfoundtot1'];
  $minfoundtot1 = $_POST['minfoundtot1'];
  $critaccepttot = $_POST['critaccepttot'];
  $majaccepttot = $_POST['majaccepttot'];
  $minaccepttot = $_POST['minaccepttot'];
  $wmresult2 = $_POST['wmresult2'];
  $wmremarks = $_POST['wmremarks'];
  $packmethod = $_POST['packmethod'];
  $cartonply = $_POST['cartonply'];
  $fastmethod = $_POST['fastmethod'];
  $material = $_POST['material'];
  $metal = $_POST['metal'];
  $packresult = $_POST['packresult'];
  $packremark = $_POST['packremark'];
  $measurement = $_POST['measurement'];
  $measureresult = $_POST['measureresult'];
  $tolprovide = $_POST['tolprovide'];
  $signed = $_POST['signed'];
  $signed1 = $_POST['signed1'];
  $signed2 = $_POST['signed2'];
  $signed3 = $_POST['signed3'];
  $inspect_level = $_POST['inspect_level'];
  $critical = $_POST['critical'];
  $major = $_POST['major'];
  $minor = $_POST['minor'];
  $cartresult = $_POST['cartresult'];
  $cartremarks = $_POST['cartremarks'];

 

   $sql = "UPDATE inspection_grn SET dcno='$dcno',date='$date',jobno='$jobno',clientname='$clientname',factoryname='$factoryname',clientcountry='$clientcountry',sku='$sku',service='$service',
 pono='$pono',ordqty='$ordqty',inspectname='$inspectname',inspecttime='$inspecttime',inspectloc='$inspectloc',qtytot='$qtytot',pack1tot='$pack1tot',unpack1tot='$unpack1tot',
  unfinishtot='$unfinishtot',cartonqtytot='$cartonqtytot',totalcartontot='$totalcartontot',pack2tot='$pack2tot',unpack2tot='$unpack2tot',selectedcarton='$selectedcarton',
  cartonno='$cartonno',qntyresult='$qntyresult',qntyremark='$qntyremark',styleremarks='$styleremarks',sizetot='$sizetot',callowtot='$callowtot',cfoundtot='$cfoundtot',majallowtot='$majallowtot',majfoundtot='$majfoundtot',
  minallowtot='$minallowtot',minfoundtot='$minfoundtot',wmnotes='$wmnotes',critfoundtot='$critfoundtot',majfoundtot1='$majfoundtot1',minfoundtot1='$minfoundtot1',cartresult='$cartresult',cartremarks='$cartremarks',
  critaccepttot='$critaccepttot',majaccepttot='$majaccepttot',minaccepttot='$minaccepttot',wmresult2='$wmresult2',wmremarks='$wmremarks',packmethod='$packmethod',inspect_level='$inspect_level',
  cartonply='$cartonply',fastmethod='$fastmethod',material='$material',metal='$metal',packresult='$packresult',packremark='$packremark',measurement='$measurement',critical='$critical',major='$major',minor='$minor',
  measureresult='$measureresult',tolprovide='$tolprovide',signed='$signed',signed1='$signed1',signed2='$signed2',signed3='$signed3' where cid='$sid'";
 
 
  foreach ($_POST['pono1'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];
    $pono1 = $_POST['pono1'][$key];
    $skuno = $_POST['skuno'][$key];
    $orderqty = $_POST['orderqty'][$key];
    $pack1 = $_POST['pack1'][$key];
    $unpack1 = $_POST['unpack1'][$key];
    $unfinish = $_POST['unfinish'][$key];
    $cartonqty = $_POST['cartonqty'][$key];
    $totcarton = $_POST['totcarton'][$key];
    $pack2 = $_POST['pack2'][$key];
    $unpack2 = $_POST['unpack2'][$key];
   
  
    if ($pono1!= '') {
       if ($rid != '') {
      $sql1 = "UPDATE  inspection_qty SET pono1='$pono1',skuno='$skuno',orderqty='$orderqty',pack1='$pack1',unpack1='$unpack1',unfinish='$unfinish',cartonqty='$cartonqty',
      totcarton='$totcarton',pack2='$pack2',unpack2='$unpack2' Where id = '$rid'";
       $result1 = mysqli_query($conn, $sql1);
       }
       else{
        $sql11 = "INSERT into inspection_qty (cid,pono1,skuno,orderqty,pack1,unpack1,unfinish,cartonqty,totcarton,pack2,unpack2)
  values('$sid','$pono1','$skuno','$orderqty','$pack1','$unpack1','$unfinish','$cartonqty','$totcarton','$pack2','$unpack2')";
     $result1 = mysqli_query($conn, $sql11);
     
       }   
    }
  }
  
  foreach ($_POST['wmpono'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $wmpono = $_POST['wmpono'][$key];
    $itemno = $_POST['itemno'][$key];
    $size = $_POST['size'][$key];
    $callow = $_POST['callow'][$key];
    $cfound = $_POST['cfound'][$key];
    $majallow = $_POST['majallow'][$key];
    $majfound = $_POST['majfound'][$key];
    $minallow = $_POST['minallow'][$key];
    $minfound = $_POST['minfound'][$key];
    $wmresult1 = $_POST['wmresult1'][$key];
   
   
  
    if ($wmpono!= '') {
       if ($rid != '') {
      $sql1 = "UPDATE inspection_wm_summary SET wmpono='$wmpono',itemno='$itemno',size='$size',callow='$callow',cfound='$cfound',majallow='$majallow',
  majfound='$majfound',minallow='$minallow',minfound='$minfound',wmresult1='$wmresult1' Where id = '$rid'";
       $result1 = mysqli_query($conn, $sql1);
       }
       else{
        $sql11 = "INSERT into inspection_wm_summary (cid,wmpono,itemno,size,callow,cfound,majallow,majfound,minallow,minfound,wmresult1)
  values('$sid','$wmpono','$itemno','$size','$callow','$cfound','$majallow','$majfound','$minallow','$minfound','$wmresult1')";
     $result1 = mysqli_query($conn, $sql11);
     
       }   
    }
  }
  
  foreach ($_POST['defectdesc'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
    $pono_work = $_POST['pono_work'][$key];
    $style_work = $_POST['style_work'][$key];
    $color_work = $_POST['color_work'][$key];
    $size_work = $_POST['size_work'][$key];
    $defectno = $_POST['defectno'][$key];
    $defectdesc = $_POST['defectdesc'][$key];
    $defsize = $_POST['defsize'][$key];
    $wmr_critical = $_POST['wmr_critical'][$key];
    $wmr_major = $_POST['wmr_major'][$key];
    $wmr_minor = $_POST['wmr_minor'][$key];

  
    if ($defectdesc!='') {
      if ($rid != '') {
        $sql1 = "UPDATE inspection_wm_records SET pono_work='$pono_work',style_work='$style_work',color_work='$color_work',size_work='$size_work',defectno='$defectno',defectdesc='$defectdesc',defsize='$defsize',wmr_critical='$wmr_critical',
  wmr_major='$wmr_major',wmr_minor='$wmr_minor' Where id = '$rid'";
       $result1 = mysqli_query($conn, $sql1);
      }
      else{
        $sql11 = "INSERT into inspection_wm_records (cid,pono_work,style_work,color_work,size_work,defsize,defectno,defectdesc,wmr_critical,wmr_major,wmr_minor)
  values('$cid','$pono_work','$style_work','$color_work','$size_work','$defsize','$defectno','$defectdesc','$wmr_critical','$wmr_major','$wmr_minor')";
     $result1 = mysqli_query($conn, $sql11);
     
       }   
    }
  }

  foreach ($_POST['specs'] as $key => $val) {
    
    
    $rid7 = $_POST['rid7'][$key];
    $specs = $_POST['specs'][$key];
    $cartonresult = $_POST['cartonresult'][$key];
    $observation = $_POST['observation'][$key];
  
    if ($specs!='') {
      if ($rid7 != '') {
        $sql1 = "UPDATE inspection_carton SET specs='$specs',cartonresult='$cartonresult',observation='$observation' Where id = '$rid7'";
       $result1 = mysqli_query($conn, $sql1);
      }
      else{
        $sql11 = "INSERT into inspection_carton (cid,specs,cartonresult,observation)
  values('$sid','$specs','$cartonresult','$observation')";
     $result1 = mysqli_query($conn, $sql11);
     
       }   
    }
  }
  
  foreach ($_POST['pkpono'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];
    $pkpono = $_POST['pkpono'][$key];
    $qtyspec = $_POST['qtyspec'][$key];
    $qtyactual = $_POST['qtyactual'][$key];
    $innerspec = $_POST['innerspec'][$key];
    $inneractual = $_POST['inneractual'][$key];
    $grossspec = $_POST['grossspec'][$key];
    $grossactual = $_POST['grossactual'][$key];
    $dimspec = $_POST['dimspec'][$key];
    $dimactual = $_POST['dimactual'][$key];
   
    
    if ($pkpono!='') {
       if ($rid != '') {
      $sql1 = "UPDATE  inspection_packing SET pkpono='$pkpono',qtyspec='$qtyspec',qtyactual='$qtyactual',innerspec='$innerspec',inneractual='$inneractual',grossspec='$grossspec',
  grossactual='$grossactual',dimspec='$dimspec',dimactual='$dimactual' Where id = '$rid'";
       $result1 = mysqli_query($conn, $sql1);
       }
       else{
        $sql11 = "INSERT into inspection_packing (cid,pkpono,qtyspec,qtyactual,innerspec,inneractual,grossspec,grossactual,dimspec,dimactual)
  values('$sid','$pkpono','$qtyspec','$qtyactual','$innerspec','$inneractual','$grossspec','$grossactual','$dimspec','$dimactual')";
     $result1 = mysqli_query($conn, $sql11);
     
       }   
    }
  }
  
  
  foreach ($_POST['testtype'] as $key => $val) {
    
    $rid6 = $_POST['rid6'][$key];
   
    $testtype = $_POST['testtype'][$key];
    $dropsize = $_POST['dropsize'][$key];
    $dropmethod = $_POST['dropmethod'][$key];
    $dropdetail = $_POST['dropdetail'][$key];
    $dropresult = $_POST['dropresult'][$key];
   
  
    if ($testtype!='') {
       if ($rid6 != '') {
      $sql1 = "UPDATE inspection_onsite SET testtype='$testtype',dropsize='$dropsize',dropmethod='$dropmethod',dropdetail='$dropdetail',dropresult='$dropresult' Where id = '$rid6'";
       $result1 = mysqli_query($conn, $sql1);
       }
       else {
      echo  $sql11 = "INSERT into inspection_onsite (cid,testtype,dropsize,dropmethod,dropdetail,dropresult)
  values('$sid','$testtype','$dropsize','$dropmethod','$dropdetail','$dropresult')";
     $result1 = mysqli_query($conn, $sql11);
       }   
    }
  }
  
  
  foreach ($_POST['clientreq'] as $key => $val) {
    
    $rid8 = $_POST['rid8'][$key];
    $clientreq = $_POST['clientreq'][$key];
    $clientresult = $_POST['clientresult'][$key];
   
  
    if ($clientreq!='') {
       if ($rid8 != '') {
      $sql1 = "UPDATE  inspection_client SET clientreq='$clientreq',clientresult='$clientresult' Where id = '$rid8'";
       $result1 = mysqli_query($conn, $sql1);
       }
       else{
        $sql11 = "INSERT into inspection_client (cid,clientreq,clientresult)
  values('$sid','$clientreq','$clientresult')";
     $result11 = mysqli_query($conn, $sql11);
       }   
    }
  }
  
  foreach ($_POST['styleitem'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];
    $styleitem = $_POST['styleitem'][$key];
    $stylecolor = $_POST['stylecolor'][$key];
    $stylematerial = $_POST['stylematerial'][$key];
    $approve = $_POST['approve'][$key];
    $styleresult = $_POST['styleresult'][$key];
   
  
    if ($styleitem!='') {
       if ($rid != '') {
      $sql1 = "UPDATE  inspection_style SET styleitem='$styleitem',stylecolor='$stylecolor',stylematerial='$stylematerial',approve='$approve',styleresult='$styleresult' Where id = '$rid'";
       $result1 = mysqli_query($conn, $sql1);
       }
       else{
        $sql11 = "INSERT into inspection_style (cid,styleitem,stylecolor,stylematerial,approve,styleresult)
  values('$sid','$styleitem','$stylecolor','$stylematerial','$approve','$styleresult')";
     $result1 = mysqli_query($conn, $sql11);
     
       }   
    }
  }
  
  if ($result) {

   echo "<script>alert('Inspection Updated Successfully');window.location='inspect_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


<script language="javascript" type="text/javascript">

function tot(v2)
{


//alert(v2);

a=v2;
b=(a.substr(5));

var rc3=document.getElementById('rc3').value;

    k11=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('orderqty'+i).value!='')
	{

	  
	  var a13= document.getElementById('orderqty'+i).value?document.getElementById('orderqty'+i).value:0;
	
		 var k11=(parseFloat)(k11)+(parseFloat)(a13);
	

		
	    var netwt=k11.toFixed(0);
	    document.getElementById('qtytot').value=netwt;
     // alert(netwt);

	}
	  }
    
    k3=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('pack1'+i).value!='')
	{

	  
	  var a13= document.getElementById('pack1'+i).value?document.getElementById('pack1'+i).value:0;
	
		 var k3=(parseFloat)(k3)+(parseFloat)(a13);
	

		
	    var netwt=k3.toFixed(0);
	    document.getElementById('pack1tot').value=netwt;
     // alert(netwt);

	}
	  }

    k1=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('unpack1'+i).value!='')
	{

	  
	  var a11= document.getElementById('unpack1'+i).value?document.getElementById('unpack1'+i).value:0;
	
		 var k1=(parseFloat)(k1)+(parseFloat)(a11);
	

		
	    var grwt=k1.toFixed(0);
	    document.getElementById('unpack1tot').value=grwt;
     // alert(grwt);

	}
	  }

    k12=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('unfinish'+i).value!='')
	{

	  
	  var a11= document.getElementById('unfinish'+i).value?document.getElementById('unfinish'+i).value:0;
	
		 var k12=(parseFloat)(k12)+(parseFloat)(a11);
	

		
	    var grwt=k12.toFixed(0);
	    document.getElementById('unfinishtot').value=grwt;
     // alert(grwt);

	}
	  }

    k4=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('cartonqty'+i).value!='')
	{

	  
	  var a11= document.getElementById('cartonqty'+i).value?document.getElementById('cartonqty'+i).value:0;
	
		 var k4=(parseFloat)(k4)+(parseFloat)(a11);
	

	    var grwt=k4.toFixed(0);
	    document.getElementById('cartonqtytot').value=grwt;
     // alert(grwt);

	}
	  }

    k5=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('totcarton'+i).value!='')
	{

	  
	  var a112= document.getElementById('totcarton'+i).value?document.getElementById('totcarton'+i).value:0;
	
		 var k5=(parseFloat)(k5)+(parseFloat)(a112);
	

		
	    var grwt=k5.toFixed(0);
	    document.getElementById('totalcartontot').value=grwt;
     // alert(grwt);

	}
	  }

    k6=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('pack2'+i).value!='')
	{

	  
	  var a11= document.getElementById('pack2'+i).value?document.getElementById('pack2'+i).value:0;
	
		 var k6=(parseFloat)(k6)+(parseFloat)(a11);
	

		
	    var grwt=k6.toFixed(0);
	    document.getElementById('pack2tot').value=grwt;
     // alert(grwt);

	}
	  }

    k7=0;
      for(i=0;i<rc3;i++)
	  {
	  
	   	if(document.getElementById('unpack2'+i).value!='')
	{

	  
	  var a11= document.getElementById('unpack2'+i).value?document.getElementById('unpack2'+i).value:0;
	
		 var k7=(parseFloat)(k7)+(parseFloat)(a11);
	

		
	    var grwt=k7.toFixed(0);
	    document.getElementById('unpack2tot').value=grwt;
     // alert(grwt);

	}
	  }

		
	
		  
}

</script>


<script language="javascript" type="text/javascript">

function tott(v1)
{


// alert(v1);

a=v1;
b=(a.substr(12));


    k3=0;
      for(i=0;i<=19;i++)
	  {
	  
	   	if(document.getElementById('wmr_critical'+i).value!='')
	{

	  
	  var a13= document.getElementById('wmr_critical'+i).value?document.getElementById('wmr_critical'+i).value:0;
    
		 var k3=(parseFloat)(k3)+(parseFloat)(a13);
	
		
	    var netwt=k3.toFixed(0);
	    document.getElementById('critfoundtot').value=netwt;
     // alert(netwt);

	}
	  }

    k1=0;
      for(i=0;i<=19;i++)
	  {
	  
	   	if(document.getElementById('wmr_major'+i).value!='')
	{

    var a12= document.getElementById('wmr_major'+i).value?document.getElementById('wmr_major'+i).value:0;
    
    var k1=(parseFloat)(k1)+(parseFloat)(a12);
    
    
    var grwt=k1.toFixed(0);
    // alert(grwt);
    document.getElementById('majfoundtot1').value=grwt;
	  // alert("hi");

	}
	  }

    k12=0;
      for(i=0;i<=19;i++)
	  {
	  
	   	if(document.getElementById('wmr_minor'+i).value!='')
	{

	  
	  var a13= document.getElementById('wmr_minor'+i).value?document.getElementById('wmr_minor'+i).value:0;
	
		 var k12=(parseFloat)(k12)+(parseFloat)(a13);
	

		
	    var grwt=k12.toFixed(0);
	    document.getElementById('minfoundtot1').value=grwt;
     // alert(grwt);

	}
	  }

 
}

</script>


<script language="javascript" type="text/javascript">

function tot1(v3)
{


// alert(v3);

a=v3;
b=(a.substr(6));

var rc4=document.getElementById('rc4').value;

    k8=0;
      for(i=0;i<rc4;i++)
	  {
	  
	   	if(document.getElementById('size'+i).value!='')
	{

	  
	  var a13= document.getElementById('size'+i).value?document.getElementById('size'+i).value:0;
    
		 var k8=(parseFloat)(k8)+(parseFloat)(a13);
	
		
	    var netwt=k8.toFixed(0);
	    document.getElementById('sizetot').value=netwt;
     // alert(netwt);

	}
	  }
    
    k3=0;
      for(i=0;i<rc4;i++)
	  {
	  
	   	if(document.getElementById('callow'+i).value!='')
	{

	  
	  var a13= document.getElementById('callow'+i).value?document.getElementById('callow'+i).value:0;
    
		 var k3=(parseFloat)(k3)+(parseFloat)(a13);
	
		
	    var netwt=k3.toFixed(0);
	    document.getElementById('callowtot').value=netwt;
     // alert(netwt);

	}
	  }

    k1=0;
      for(i=0;i<rc4;i++)
	  {
	  
	   	if(document.getElementById('cfound'+i).value!='')
	{

    var a12= document.getElementById('cfound'+i).value?document.getElementById('cfound'+i).value:0;
    
    var k1=(parseFloat)(k1)+(parseFloat)(a12);
    
    
    var grwt=k1.toFixed(0);
    // alert(grwt);
    document.getElementById('cfoundtot').value=grwt;
	  // alert("hi");

	}
	  }

    k12=0;
      for(i=0;i<rc4;i++)
	  {
	  
	   	if(document.getElementById('majallow'+i).value!='')
	{

	  
	  var a13= document.getElementById('majallow'+i).value?document.getElementById('majallow'+i).value:0;
	
		 var k12=(parseFloat)(k12)+(parseFloat)(a13);
	

		
	    var grwt=k12.toFixed(0);
	    document.getElementById('majallowtot').value=grwt;
     // alert(grwt);

	}
	  }

    k13=0;
      for(i=0;i<rc4;i++)
	  {
	  
	   	if(document.getElementById('majfound'+i).value!='')
	{

	  
	  var a13= document.getElementById('majfound'+i).value?document.getElementById('majfound'+i).value:0;
	
		 var k13=(parseFloat)(k13)+(parseFloat)(a13);
	

		
	    var grwt=k13.toFixed(0);
	    document.getElementById('majfoundtot').value=grwt;
     // alert(grwt);

	}
	  }

    k14=0;
      for(i=0;i<rc4;i++)
	  {
	  
	   	if(document.getElementById('minallow'+i).value!='')
	{

	  
	  var a13= document.getElementById('minallow'+i).value?document.getElementById('minallow'+i).value:0;
	
		 var k14=(parseFloat)(k14)+(parseFloat)(a13);
	

		
	    var grwt=k14.toFixed(0);
	    document.getElementById('minallowtot').value=grwt;
     // alert(grwt);

	}
	  }

    k15=0;
      for(i=0;i<rc4;i++)
	  {
	  
	   	if(document.getElementById('minfound'+i).value!='')
	{

	  
	  var a13= document.getElementById('minfound'+i).value?document.getElementById('minfound'+i).value:0;
	
		 var k15=(parseFloat)(k15)+(parseFloat)(a13);
	

		
	    var grwt=k15.toFixed(0);
	    document.getElementById('minfoundtot').value=grwt;
     // alert(grwt);

	}
	  }

 
}

</script>


<script>
function get_type(id,value) {
  var c=id.substr(8);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#dropmethod'+c).val(data.method);
$('#dropdetail'+c).val(data.detail);

}

      }
    };
    xmlhttp.open("GET","ajax/gettype.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>


<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>