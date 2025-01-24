<?php include "config.php"; 

ini_set('memory_limit', '32M');
ini_set('post_max_size', '16M');
ini_set('upload_max_filesize', '16M');

?>

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
function ee11(x)
{

// alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('addimage'+e).style.display='table-row';

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
function ee05(x)
{


// alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s05'+e).style.display='table-row';

}

</script>


<?php
$fg1="select max(dcno) as id from inspection_grn";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>



<?php
		 $sid=base64_decode($_GET['cid']);
		 ?> 

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
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->  

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row ">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Inspection</button>
                      <a href="inspect_list.php"
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
                        <?php 
					$sql = "SELECT * FROM staff_assign where id='$sid'";
                    $result = mysqli_query($conn, $sql);
                    $rw11 = mysqli_fetch_array($result);
                    $partyname = $rw11['partyname']; 
                    $quote = $rw11['quote']; 
                    $pono = $rw11['pono']; 
                    
					$sql5 = "SELECT * FROM staff_assign1 where cid='$sid'";
                    $result5 = mysqli_query($conn, $sql5);
                    $rw5 = mysqli_fetch_array($result5);
                    $factory = $rw5['factoryname']; 
                    $style = $rw5['styleno']; 
                    

                     ?>
     <input type="text" hidden name="sidd" id="sidd" value="<?php echo $sid;?>">

                      <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $fg4; ?>"
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
                              value="<?php echo date("Y-m-d");?>"
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
                           <?php 
					$sql = "SELECT * FROM partymaster where id='$partyname'";
                    $result = mysqli_query($conn, $sql);
                    $rw = mysqli_fetch_array($result);
                    $name = $rw['name'];
                    $country = $rw['country'];
                    
                     ?>
                     <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Client&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            
                       <input
                              type="text"
                              id="clientname"
                              name="clientname"
                              readonly
                              class="form-control"
                              value="<?php echo $name;?>"
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
                              value="<?php echo $country;?>"
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
                          <?php 
					$sql6 = "SELECT * FROM assignment Where id='$factory'";
                    $result6 = mysqli_query($conn, $sql6);
                    $rw6 = mysqli_fetch_array($result6);
                    $fname = $rw6['name'];

                   
                    ?>
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Factory&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="factoryname"
                              name="factoryname"
                              readonly
                              value="<?php echo $fname; ?>"
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
                              value="<?php echo $rw5['styleno'];?>"
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
                              value="PRE-SHIPMENT INSPECTION"
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
                              value="<?php echo $rw5['offerqty'];?>"
                              placeholder="" />
                          </div>   
                         
                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Inspector Name&nbsp;<span style="color:red;">*</span></label>
                            <input
                            type="text"
                            id="inspectname"
                            name="inspectname"
                            class="form-control"
                           value= "<?php echo $user_name;?>"
                             readonly>
                          </div>   

                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Inspector's In-Out Time&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="inspecttime"
                              name="inspecttime"
                              
                              class="form-control"
                              value="10.30AM - 6.30PM"
                              placeholder="" />
                          </div>   
                          </div>   

                          <br>
                          <?php
                           $query = "SELECT * FROM quote m left join quote1 n on m.id=n.cid WHERE m.quote_no = '$quote' ";
                           $result = mysqli_query($conn, $query);
                           $rw1 = mysqli_fetch_array($result);
                           $inspect = $rw1['inspect_level'];
                           $critical = $rw1['critical'];
                           $major = $rw1['major'];
                           $minor = $rw1['minor'];
                           ?>
                           
                        <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Inspection&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                            <select id="ins_level" name="ins_level" class="form-control bg-white" disabled>
                              <option value="">--SELECT--</option> 
                            <optgroup label="General Inspection">
                              <option value="g1" <?php if($rw1['inspect_level']=='g1'){ ?>Selected<?php } ?> >Level 1</option>
                              <option value="g2" <?php if($rw1['inspect_level']=='g2'){ ?>Selected<?php } ?> >Level 2</option>
                              <option value="g3" <?php if($rw1['inspect_level']=='g3'){ ?>Selected<?php } ?> >Level 3</option>
                            </optgroup>
                            <optgroup label="Special Inspection">
                              <option value="s1" <?php if($rw1['inspect_level']=='s1'){ ?>Selected<?php } ?>>S1</option>
                              <option value="s2" <?php if($rw1['inspect_level']=='s2'){ ?>Selected<?php } ?>>S2</option>
                              <option value="s3" <?php if($rw1['inspect_level']=='s3'){ ?>Selected<?php } ?>>S3</option>
                              <option value="s4" <?php if($rw1['inspect_level']=='s4'){ ?>Selected<?php } ?>>S4</option>
                            </optgroup>
                          </select>
                            <select id="inspect_level" name="inspect_level" class="form-control" hidden >
                              <option value="">--SELECT--</option> 
                            <optgroup label="General Inspection">
                              <option value="g1" <?php if($rw1['inspect_level']=='g1'){ ?>Selected<?php } ?> >Level 1</option>
                              <option value="g2" <?php if($rw1['inspect_level']=='g2'){ ?>Selected<?php } ?> >Level 2</option>
                              <option value="g3" <?php if($rw1['inspect_level']=='g3'){ ?>Selected<?php } ?> >Level 3</option>
                            </optgroup>
                            <optgroup label="Special Inspection">
                              <option value="s1" <?php if($rw1['inspect_level']=='s1'){ ?>Selected<?php } ?>>S1</option>
                              <option value="s2" <?php if($rw1['inspect_level']=='s2'){ ?>Selected<?php } ?>>S2</option>
                              <option value="s3" <?php if($rw1['inspect_level']=='s3'){ ?>Selected<?php } ?>>S3</option>
                              <option value="s4" <?php if($rw1['inspect_level']=='s4'){ ?>Selected<?php } ?>>S4</option>
                            </optgroup>
                          </select>
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Critical&nbsp;AQL&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                            <select id="crit" name="crit" class="form-control bg-white" disabled>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw1['critical']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw1['critical']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw1['critical']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw1['critical']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw1['critical']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw1['critical']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw1['critical']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw1['critical']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw1['critical']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw1['critical']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw1['critical']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                            <select id="critical" name="critical" class="form-control" hidden >
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw1['critical']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw1['critical']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw1['critical']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw1['critical']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw1['critical']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw1['critical']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw1['critical']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw1['critical']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw1['critical']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw1['critical']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw1['critical']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                          </div>    

                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Major&nbsp;AQL&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                            <select id="maj" name="maj" class=" form-control bg-white" disabled>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw1['major']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw1['major']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw1['major']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw1['major']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw1['major']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw1['major']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw1['major']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw1['major']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw1['major']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw1['major']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw1['major']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                            <select id="major" name="major" class=" form-control" hidden>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw1['major']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw1['major']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw1['major']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw1['major']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw1['major']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw1['major']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw1['major']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw1['major']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw1['major']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw1['major']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw1['major']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                          </div>                       
                          
                           <div class="col-md-3">
                          <label class="form-label" for="collapsible-fullname">Minor&nbsp;AQL&nbsp;Level&nbsp;<span style="color:red;">*</span></label>
                           <select id="min" name="min" class=" form-control bg-white" disabled>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw1['minor']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw1['minor']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw1['minor']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw1['minor']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw1['minor']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw1['minor']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw1['minor']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw1['minor']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw1['minor']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw1['minor']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw1['minor']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                           <select id="minor" name="minor" class=" form-control" hidden>
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065" <?php if($rw1['minor']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw1['minor']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw1['minor']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw1['minor']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw1['minor']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw1['minor']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw1['minor']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw1['minor']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw1['minor']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw1['minor']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw1['minor']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
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
                              value="<?php echo $rw5['location'];?>"
                              readonly
                              placeholder="" >
                          </div> 
                          
                          <div class="card-body">

<div class="d-flex align-items-start align-items-sm-center gap-4">
<img 
      id="imagePreview"
      style=" width: 100%;
height: 100%;

background-size: cover;
background-repeat: no-repeat;
background-position: center; background-image: url(500?img=7);"
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
                              />
                          </label>
                          <button type="clear" value="clear" class="btn btn-label-secondary account-image-reset mb-3">
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
                                  <th  style="padding-bottom:30px;font-weight:bold" rowspan="2">Order&nbsp;Qty&nbsp; (pcs&nbsp;/&nbsp;Sets)</th> 
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
					  $sql2 = "SELECT * FROM staff_assign1 where cid='$sid'";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw2 = mysqli_fetch_array($result2))
					{
            $offqty = $rw2['offerqty'];
             ?> 
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="pono1<?php echo $i;?>"
                                    name="pono1[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw11['pono'];?>"                                
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
                                    value="<?php echo $style;?>"                                    
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
                                    value="<?php echo $offqty;?>"
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
                                onkeyUp="tot(pack1<?php echo $i;?>.id);aql_value(pack1tot.value)"
                                onchange="tot(pack1<?php echo $i;?>.id);aql_value(pack1tot.value)"
                                onblur="aql_value(pack1tot.value);get_calc(dummy.value);get_calc1(dummy.value);get_calc2(dummy.value)"
                                    aria-label="Product barcode"/>
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unpack1<?php echo $i;?>"
                                name="unpack1[]" 
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);aql_value(pack1tot.value)"
                                onchange="tot(pack1<?php echo $i;?>.id);aql_value(pack1tot.value)"
                                onblur="aql_value(pack1tot.value);get_calc(dummy.value);get_calc1(dummy.value);get_calc2(dummy.value)"
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
                                    style="text-align:center;width:120px"
                                    id="pack2<?php echo $i;?>"
                                name="pack2[]"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);aql_value(pack1tot.value);"
                                onchange="tot(pack1<?php echo $i;?>.id);aql_value(pack1tot.value);"
                                onblur="aql_value(pack1tot.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center"
                                    id="unpack2<?php echo $i;?>"
                                name="unpack2[]"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);aql_level(pack1tot.value);"
                                onchange="tot(pack1<?php echo $i;?>.id);aql_level(pack1tot.value);"
                                onblur="aql_level(pack1tot.value);"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="1234567<?php echo $i;?>" class="btn btn-primary" onclick="ee4(this.id)">+</span>
          </td>
                                </tr>
                                <?php
								$i++;
                $tqty+=$offqty;

          }
        $j=$i;
        for ($i = $j, $sno = $j+1; $i < 10; $i++, $sno++) {
          ?>
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
                                onkeyup="tot(pack1<?php echo $i;?>.id);aql_value();"
                                onchange="tot(pack1<?php echo $i;?>.id);aql_value();"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unpack1<?php echo $i;?>"
                                name="unpack1[]" 
                                    style="text-align:center;"
                                onkeyUp="tot(pack1<?php echo $i;?>.id);aql_value();"
                                onchange="tot(pack1<?php echo $i;?>.id);aql_value();"
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
                                     onkeyup="aql_value(this.value)"          
                                     onblur="aql_value(this.value)"          
                                    style="text-align:center;font-weight:bold"                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="unpack1tot"
                                    name="unpack1tot"   
                                     onkeyup="aql_value(pack1tot.value)"     
                                     onblur="aql_value(pack1tot.value)"     
                                    style="text-align:center;font-weight:bold"
                                        readonly                               
                                    aria-label="Product barcode"/>
                                       
                 <input   hidden
                                    type="text"
                                    class="form-control"
                                    id="dummy"
                                    name="dummy"
                                    onkeyup="get_calc(this.value);get_calc1(this.value);get_calc2(this.value)"
                                     onchange="get_calc(this.value);get_calc1(this.value);get_calc2(this.value)"      
                                     onblur="get_calc(this.value);get_calc1(this.value);get_calc2(this.value)"      
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
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalcartontot"
                                name="totalcartontot"      
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pack2tot"
                                name="pack2tot"      
                                    style="text-align:center;font-weight:bold;width:120px"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="unpack2tot"
                                name="unpack2tot"      
                                    style="text-align:center;font-weight:bold;"
                                readonly 
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
                        >
                          </div>
                         
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Carton number/Item no &nbsp;<span style="color:red;">*</span></label>
                            <textarea
                              id="cartonno"
                              name="cartonno"
                              
                              class="form-control" ></textarea>
                          </div>    
                          </div>
                           
                           <br>
                            <div class="row g-3">
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Result</label>
                        <select id="qntyresult" name="qntyresult" class="form-select" >
                          <option value="">Select</option>
                          <option value="Pass">PASS</option>
                          <option value="Fail">FAIL</option>
                          <option value="Pending">PENDING</option>
                          <option value="na">N/A</option>
                      </select>
                          </div>
                         
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <textarea
                              id="qntyremark"
                              name="qntyremark"
                              
                              class="form-control" ></textarea>
                          </div>    
                          </div>
                            </div><br>

                            <div class="card card-body">
<div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary"> Remark Images</span>
                        </div>
<div class="table-responsive">
<table class="table table-border border-top table-hover">
  <thead class="border-bottom " >
    <tr style="text-align:center;font-weight:bold">
        <th style="font-weight:bold" >s.no</th>
        <th style="font-weight:bold" >images</th>
        <th style="font-weight:bold" >remarks</th> 
        <th style="font-weight:bold" ></th> 
        
      </tr>
      
    </thead>
    <tbody>
      <?php 		
      $i = 0;
      $sno = 1;
      $sql2 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=1 order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($result2);
                    if($count2 > 0){
                    while($rw2 = mysqli_fetch_array($result2))
                     {
                      $img_id = $rw2['img_id'];
                      $no = $rw2['sno'];
                      $status = $rw2['status'];
                                ?> 
            
               
               <tr >
                                  <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw2['id'];?>" /> 
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="<?php echo $img_id;?>" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <!-- <input type="text" hidden name="file11"  value="<?php echo $rw2['defimg'];?>"/> -->
                                      <input class="form-control"  type="file" id="file<?php echo $i;?>" name="file"
                         >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td nowrap>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                           <button class="btn btn-warning" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                             <?php 
                       } else{
                         ?>
                         <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                           <span class="ti ti-repeat"></span>&nbsp;Replace</button>

                           <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>

                       <?php 
                       }
                        ?>
          </td>
          <td >   
          <a  href="uploads/<?php echo $rw2['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                     </td>
                                </tr>
                              
                                <?php
                  $i++;
          }
          $j = $i;
             for ($i = $j, $sno = $j+1; $i < 100; $i++, $sno++) {
               ?>
                                
                             
                              <form action="" method="post" enctype="multipart/form-data">
                                  <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn"  onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr>   
             
                        <?php
                          }
                        }
                        else{
                           for ($i = 0, $sno = 1; $i <1; $i++, $sno++) {
                          ?>
                         <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn"  onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 1, $sno = 2; $i < 100; $i++, $sno++) {
                         ?>      
                       
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                  
                                <?php
                                }
                                }
                                ?>
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                      
                                <br>

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
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
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
                                    value="<?php echo $style;?>"
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
                                    <select name="dropresult[]" style="width:120px" id="dropresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
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
                              for ($i = 1, $sno = 2; $i <=5; $i++, $sno++) {
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
                           <br>
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <textarea
                              id="styleremarks"
                              name="styleremarks"
                              
                              class="form-control" ></textarea>
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
          //                     $sno=1;
          //                     $i=0; 
          //                     $tqty=0;
					//   $sql2 = "SELECT * FROM staff_assign1 where cid='$sid'";
          //           $result2 = mysqli_query($conn, $sql2);
          //           while($rw2 = mysqli_fetch_array($result2))
					// {
             ?> 
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="wmpono<?php/* echo $i;*/?>"
                                    name="wmpono[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php/* echo $rw11['pono'];*/?>"                                
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="itemno<?php /*echo $i;*/?>"
                                    name="itemno[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php/* echo $style;*/?>"                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size<?php/* echo $i;*/?>"
                                    name="size[]" 
                                    readonly
                                    style="text-align:center;"
                                    onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"
                                    value="<?php/* echo $rw2['size'];*/?>"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="callow<?php /*echo $i;*/?>"
                                name="callow[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cfound<?php/* echo $i;*/?>"
                                name="cfound[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php  /*$i;*/?>.id);"
                                onchange="tot1(callow<?php /* $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majallow<?php/* echo $i;*/?>"
                                name="majallow[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="majfound<?php/* echo $i;?>"
                                    name="majfound[]"     
                                         onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"                           
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minallow<?php/* echo $i;*/?>"
                                name="minallow[]"
                                 onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minfound<?php/* echo $i;*/?>"
                                name="minfound[]"
                                onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php /*echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td  style="padding: 0.3rem">
                                    <select name="wmresult1[]" id="wmresult1<?php /*echo $i;*/?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Pass">PASS </option>
                                <option value="Fail">FAIL</option>
                                <option value="Pending">PENDING</option>
                                <option value="na">N/A</option>
                                
                              </select>       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123<?php/* echo $i;*/?>" class="btn btn-primary" onclick="ee5(this.id)">+</span>
          </td>
                                </tr>
                                <?php

        //                         $i++;
        //                         $tqty+=$rw2['size'];
        //                          }
        //                          $j=$i;
        // for ($i = $j, $sno = $j+1; $i < 10; $i++, $sno++) {
                                  ?>
                                <tr id="s5<?php/* echo $i;*/?>" style="display:none">
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="wmpono<?php/* echo $i;*/?>"
                                    name="wmpono[]"
                                    style="text-align:center;"                              
                                    aria-label="Product barcode"/>
                                    
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="itemno<?php /*echo $i;*/?>"
                                    name="itemno[]"
                                    style="text-align:center;"                                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size<?php/* echo $i;*/?>"
                                    name="size[]" 
                                    style="text-align:center;"
                                     onkeyUp="tot1(callow<?php /*echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="callow<?php /*echo $i;*/?>"
                                     name="callow[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="cfound<?php/* echo $i;*/?>"
                                name="cfound[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php /*echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majallow<?php/* echo $i;*/?>"
                                name="majallow[]" 
                                    style="text-align:center;"
                                onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="majfound<?php/* echo $i;*/?>"
                                    name="majfound[]"     
                                         onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"                           
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minallow<?php /*echo $i;*/?>"
                                name="minallow[]"
                                 onkeyUp="tot1(callow<?php /*echo $i;*/?>.id);"
                                onchange="tot1(callow<?php /*echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    style="text-align:center;"
                                    id="minfound<?php/* echo $i;*/?>"
                                name="minfound[]"
                                onkeyUp="tot1(callow<?php/* echo $i;*/?>.id);"
                                onchange="tot1(callow<?php/* echo $i;*/?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td  style="padding: 0.3rem">
                                    <select name="wmresult1[]" id="wmresult1<?php/* echo $i;*/?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Pass">PASS </option>
                                <option value="Fail">FAIL</option>
                                <option value="Pending">PENDING</option>
                                <option value="na">N/A</option>
                                
                              </select>       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123<?php/* echo $i;*/?>" class="btn btn-primary" onclick="ee5(this.id)">+</span>
          </td>
                                </tr>
                                     
<?php
                           
                        
                        // }
                              ?> 
                              <input type="text" hidden name="rc4" id="rc4" value="<?php /*echo $i;*/?>">
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
                                    value="<?php/* echo $tqty;*/?>" 
                                    readonly                             
                                    aria-label="Product barcode"/>
                                       
              

                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="callowtot"
                                    name="callowtot"   
                                    readonly                      
                                    style="text-align:center;font-weight:bold"                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                                 
                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="cfoundtot"
                                    name="cfoundtot"        
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
                            <textarea class="form-control" id="wmnotes" name="wmnotes" >

                            </textarea>
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
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                  <td  style="padding: 0.3rem;text-align:center">
                                 <?php echo $sno;?>
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="pono_work<?php echo $i;?>"
                                    name="pono_work[]"  
                                    value="<?php echo $pono;?>"    
                                    readonly
                                    style="text-align:center"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="style_work<?php echo $i;?>"
                                    name="style_work[]"    
                                    value="<?php echo $style;?>"
                                    readonly
                                    style="text-align:center"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="color_work<?php echo $i;?>"
                                    name="color_work[]"      
                                    style="text-align:left"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size_work<?php echo $i;?>"
                                    name="size_work[]"      
                                    style="text-align:left"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="defectno<?php echo $i;?>"
                                    name="defectno[]"      
                                    style="width:120px;text-align:center"                 
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
                                onchange="tott(wmr_critical<?php echo $i;?>.id);chk_qty(critfoundtot.value)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id);chk_qty(critfoundtot.value)"
                                onblur="chk_qty(critfoundtot.value)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_major<?php echo $i;?>"
                                name="wmr_major[]" 
                                style="text-align:center"
                                 onchange="tott(wmr_critical<?php echo $i;?>.id);chk_qty1(majfoundtot1.value)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id);chk_qty1(majfoundtot1.value)"
                                  onblur="chk_qty1(majfoundtot1.value)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_minor<?php echo $i;?>"
                                name="wmr_minor[]"
                                style="text-align:center" 
                                 onchange="tott(wmr_critical<?php echo $i;?>.id);chk_qty2(minfoundtot1.value)"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id);chk_qty2(minfoundtot1.value)"
                                 onblur="chk_qty2(minfoundtot1.value)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123456789<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
                                </tr>
                                <?php
                              }
                              $j=$i;
                              for ($i = $j, $sno = $j+1; $i <=19; $i++, $sno++) {
                                ?>
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
                                    style="text-align:left"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="size_work<?php echo $i;?>"
                                    name="size_work[]"      
                                    style="text-align:left"                 
                                    aria-label="Product barcode"/>
                                       
                </td>
                 <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="defectno<?php echo $i;?>"
                                    name="defectno[]"  
                                    style="width:120px;text-align:center"                     
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
                                 onchange="tott(wmr_critical<?php echo $i;?>.id);"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id);"
                                onblur="chk_qty(critfoundtot.value)"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_major<?php echo $i;?>"
                                name="wmr_major[]"
                                  onchange="tott(wmr_critical<?php echo $i;?>.id);"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id);chk_qty1(majfoundtot1.value)"
                                  onblur="chk_qty1(majfoundtot1.value)"
                                style="text-align:center" 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="wmr_minor<?php echo $i;?>"
                                name="wmr_minor[]"  onchange="tott(wmr_critical<?php echo $i;?>.id);"
                                onkeyup="tott(wmr_critical<?php echo $i;?>.id);chk_qty2(minfoundtot1.value)"
                                 onblur="chk_qty2(minfoundtot1.value)"
                                style="text-align:center"
                                    aria-label="Product barcode"/>                          
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="123456789<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
               </tr>
                                     
<?php
                        }
                        
                              ?> 
                             
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
                                onkeyup="chk_qty(critfoundtot.value);"   
                                onblur="chk_qty(critfoundtot.value);"   
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
                                onkeyup="chk_qty1(majfoundtot1.value);"   
                                onblur="chk_qty1(majfoundtot1.value);"       
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
                                onkeyup="chk_qty2(minfoundtot1.value);"   
                                onblur="chk_qty2(minfoundtot1.value);"      
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
                                onkeyup="chk_qty(critfoundtot.value);"     
                                onblur="chk_qty(critfoundtot.value);"     
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                value="0"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="majaccepttot"
                                name="majaccepttot"  
                                onkeyup="chk_qty1(majfoundtot1.value);"     
                                onblur="chk_qty1(majfoundtot1.value);"       
                                    style="text-align:center;font-weight:bold"
                                readonly 
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="minaccepttot"
                                name="minaccepttot" 
                                onkeyup="chk_qty2(minfoundtot1.value);"     
                                onblur="chk_qty2(minfoundtot1.value);"        
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
                          <option value="Pass">PASS</option>
                          <option value="Fail">FAIL</option>
                          <option value="Pending">PENDING</option>
                          <option value="na">N/A</option>
                      </select>
                          </div>
                         
                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <textarea
                              id="wmremarks"
                              name="wmremarks"
                              
                              class="form-control" ></textarea>
                          </div> 
                          <br>
                        
                          </div> 
 </div><br>

 <div class="card card-body">
                              <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary"> Workmanship Record</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >Reamrks</th> 
                                  <th style="font-weight:bold" ></th> 
                                  
                                </tr>
                                
                              </thead>
                              <tbody>
                             
              <?php 		
                     $i = 100;
                  $sno = 1;
                   $sql3 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=2 order by id asc";
                    $result3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($result3);
                    if($count3 > 0){
                    while($rw3 = mysqli_fetch_array($result3))
                     {
                      $imgid = $rw3['img_id'];
                      $no = $rw3['sno'];
                      $sts = $rw3['status'];
                                ?> 
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw3['id'];?>" /> 
                                <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $rw3['sno'];?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                        <input type="text" hidden name="file11"  value="<?php echo $rw3['file'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                                    
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw3['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($imgid!=$sts){
                          ?>
                         <button class="btn btn-warning submit-btn"  onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                      <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                      <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                       <?php 
                       }
                        ?>
          </td>
                  <td >
                  <a  href="uploads/<?php echo $rw3['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                     </td>
                                </tr>
                                <?php
           
          }
          $j = $i;
          $no = $sno;
             for ($i = $j, $sno = $no; $i < 200; $i++, $sno++) {
          ?>
                                <tr  id="addimage<?php echo $i;?>" style="display:none">
                                 <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    aria-label="Product barcode"/>
                                    
                </td>
                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                     
                         <button class="btn btn-warning submit-btn" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 100, $sno = 1; $i <101; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 101, $sno = 2; $i < 200; $i++, $sno++) {
                         ?>      
                         
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn"  onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?>
                                              
                              </tbody>
                            </table>
                          </div>
                             </div>


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
                              $tqty=0;
					  $sql2 = "SELECT * FROM staff_assign1 where cid='$sid'";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw2 = mysqli_fetch_array($result2))
					{
             ?> 
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="text"
                                    class="form-control"
                                    id="pkpono<?php echo $i;?>"
                                    name="pkpono[]"
                                    readonly
                                    style="text-align:center;"
                                    value="<?php echo $rw11['pono'];?>"                                
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
                                 $i++;
          }
                                        $j=$i;
                                        for ($i = $j, $sno = $j+1; $i < 10; $i++, $sno++) 
                                        {
                                           ?>

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
                              class="form-control" ></textarea>
                          </div>
                          <br>
                          <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Carton&nbsp;Ply&nbsp;</label>
                            <select type="text" id="cartonply" name="cartonply" class="form-select" >
                              <option value="">SELECT</option>
                              <option value="3">3</option>
                              <option value="5">5</option>
                              <option value="7">7</option>
                              <option value="9">9</option>
                      </select>
                          </div>
                         
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Fastening&nbsp;Method&nbsp;</label>
                           <select type="text" id="fastmethod" name="fastmethod" class="form-select" >
                              <option value="">SELECT</option>
                              <option value="Glue">Glue</option>
                              <option value="Stappled">Stappled</option>
                              <option value="Stabled">Stabled</option>
                      </select>
                          </div>    

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Material&nbsp;</label>
                              <select type="text" id="material" name="material" class="form-select" >
                              <option value="">SELECT</option>
                              <option value="Card Board">Card Board</option>
                              <option value="Palette">Palette</option>
                      </select>
                          </div>                       
                        
                     <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Metal&nbsp;Strapped?&nbsp;</label>
                              <select type="text" id="metal" name="metal" class="form-select" >
                              <option value="">SELECT</option>
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                      </select>
                          </div>

                     <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Result&nbsp;</label>
                          <select name="packresult"  id="packresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" onkeyup="ee3(this.id)">
                                <option value="">SELECT</option>
                                <option value="Pass">PASS </option>
                                <option value="Fail">FAIL</option>
                                <option value="Pending">PENDING</option>
                                <option value="na">N/A</option>
                      </select>
                          </div>
                          
                          <br>
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks&nbsp;</label>
                            <textarea
                              id="packremark"
                              name="packremark"
                              
                              class="form-control" ></textarea>
                          </div> 
                         </div>
                         </div>
                            <br> 
              
                            <div class="col-md-12 mb-4 card card-body">
                              
                         <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">Packing List</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>
                                
                              </thead>
                              <tbody>
                              <?php 		
                               $i = 200;
                               $sno = 1;
                $sql4 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=3 order by id asc";
                    $result4 = mysqli_query($conn, $sql4);
                    $count4 = mysqli_num_rows($result4);
                    if($count4 > 0){
                    while($rw4 = mysqli_fetch_array($result4))
                     {
                      $img = $rw4['img_id'];
                      $no = $rw4['sno'];
                      $status1 = $rw4['status'];
                                ?> 
                           
                           
                                <tr >
                                <td hidden>
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw4['id'];?>" /> 

                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $rw4['sno'];?>">
                              </td>
                                  <td style="padding: 0.3rem;text-align:center">
                               
                        <input type="text" hidden name="file11"  value="<?php echo $rw4['file'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                                
                            </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw4['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img!=$status1){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                        <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                        <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                          <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                         <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw4['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                      </td>
                                </tr>
                                <?php
           
          }
          $j = $i;
          // $no = $sno;
             for ($i = $j, $sno = $no; $i < 300; $i++, $sno++) {
          ?>
                                <tr  id="addimage<?php echo $i;?>" style="display:none">
                                 <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    aria-label="Product barcode"/>
                                    
                </td>
                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                     
          </td>
          <td >
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 200, $sno = 1; $i <201; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 201, $sno = 2; $i < 300; $i++, $sno++) {
                         ?>      
                         
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3" 
                                  aria-label="Product barcode"/>
                                  </td>

                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?>          
                              </tbody>
                            </table>
                                </div> 
                                </div>                               

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
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?> 
                                <tr>
                        
                 <td style="padding: 0.3rem">
                  <select name="specs[]" id="specs<?php echo $i;?>" class="form-select" onchange="get_specs(this.id,this.value)">         
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
                    <option value="Conform">Conform </option>
                    <option value="Not Conform">Not Conform</option>
                    <option value="N/A">N/A</option>
                  </select>
                </td>  

                <td style="padding: 0.3rem">
                 <input 
                 type="text"
                 style="width:850px"
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
                              for ($i = 1, $sno = 2; $i <=50; $i++, $sno++) {
                                ?>
                                <tr id="s05<?php echo $i; ?>" style="display:none">
                               
                                <td style="padding: 0.3rem">
                  <select name="specs[]" id="specs<?php echo $i;?>" class="form-select" onchange="get_specs(this.id,this.value)">         
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
                    <option value="Conform">Conform </option>
                    <option value="Not Conform">Not Conform</option>
                    <option value="N/A">N/A</option>
                  </select>
                </td>  

                <td style="padding: 0.3rem">
                 <input 
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
                           <select name="cartresult[]" id="cartresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
                    <option value="">Select</option>
                    <option value="Pass">PASS </option>
                    <option value="Fail">FAIL</option>
                    <option value="Pending">PENDING</option>
                    <option value="na">N/A</option>
                  </select>
                          </div>    

                          <div class="col-md-8">
                            <label class="form-label" for="collapsible-fullname">Remarks&nbsp;</label>
                            <textarea
                            name="cartremarks"
                            id="cartremarks<?php echo $i;?>"
                            class="form-control"
                            ></textarea>
                          </div>                       
                              
                          </div>
                           </div><br>
                         
                           <div class="col-md-12 mb-4 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">Barcode Sheet</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>                                
                              </thead>
                              <tbody>
                              <?php 		
                           $i = 300;
                           $sno = 1;
                    $sql5 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=4 order by id asc";
                    $result5 = mysqli_query($conn, $sql5);
                    $count5 = mysqli_num_rows($result5);
                    if($count5 > 0){
                    while($rw5 = mysqli_fetch_array($result5))
                     {
                      $img_id1 = $rw5['img_id'];
                      $no = $rw5['sno'];
                      $sts1 = $rw5['status'];
                                ?> 
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw5['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4"
                                  aria-label="Product barcode"/>
                                  </td>

                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                               
                        <input type="text" hidden name="file11"  value="<?php echo $rw5['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                      </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw5['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id1!=$sts1){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                       <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                       <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                       <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw5['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
              </td>
            </tr>
                                <?php

          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 400; $i++, $sno++) {
          ?>
                                <tr  id="addimage<?php echo $i;?>" style="display:none">
                                 <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    aria-label="Product barcode"/>
                                    
                </td>
                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 300, $sno = 1; $i <301; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 301, $sno = 2; $i < 400; $i++, $sno++) {
                         ?>      
                         
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?>
                                              
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                                  
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
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?> 
                                <tr>
                        
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
                                    <select name="dropresult[]" style="width:120px" id="dropresult<?php echo $i;?>" class="select form-select" data-allow-clear="true" >
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
                              for ($i = 1, $sno = 2; $i <=5; $i++, $sno++) {
                                ?>
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
                            <option value="Buyer">Buyer</option>
                            <option value="Manufacturer">Manufacturer</option>
                            <option value="Not Available">Not Available</option>
                            </select>
                          </div>    

                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Measurement&nbsp;Result&nbsp;</label>
                            <select name="measureresult" id="measureresult" class="form-select" >
                            <option value="">Select</option>
                            <option value="Within Tolerance">Within Tolerance</option>
                            <option value="Beyond Tolerance">Beyond Tolerance</option>
                            <option value="Actual Finding">Actual Finding</option>
                            </select>
                          </div>                       
                           
                     <div class="col-md-4">
                          <label class="form-label" for="collapsible-fullname">Tolerance&nbsp;Provided By&nbsp;</label>
                            
                       <input
                              type="text"
                              id="tolprovide"
                              name="tolprovide"
                              class="form-control"
                              placeholder="" />
                          </div>
                              
                          </div>
                           </div><br>

                           <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">Onsite Test</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>  
                                
                              </thead>
                              <tbody>
                              <?php 		
                              $i = 400;
                              $sno = 1;
                $sql6 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=5 order by id asc";
                    $result6 = mysqli_query($conn, $sql6);
                    $count6 = mysqli_num_rows($result6);
                    if($count6 > 0){
                    while($rw6 = mysqli_fetch_array($result6))
                     {
                      $img_id = $rw6['img_id'];
                      $no = $rw6['sno'];
                      $sts = $rw6['status'];
                                ?> 
                            
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw6['id'];?>" /> 

                                <td hidden style="padding: 0.3rem;text-align:center">
                                  <input type="text" hidden  class="form-control" id="img_id<?php echo $i;?>" name="img_id" value="5">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                        <input type="text" hidden name="file11"  value="<?php echo $rw6['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw6['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                        
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$sts){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                         <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                        <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                        ?>
          </td> 
        <td >
        <a  href="uploads/<?php echo $rw6['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                     </td>
                                </tr>
                                <?php

          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 500; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                              
                                <td hidden>
                                  <input hidden type="text" class="form-control" id="img_id<?php echo $i;?>" name="img_id" value="5">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
             </td>
                     <td  style="padding: 0.3rem;text-align:center">
                                     <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                </td>
                   <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td> 

           <td >
           
                     </td>
            </tr>
            <?php
                          }
                        }
                        else{
                           for ($i = 400, $sno = 1; $i <401; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="5" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 401, $sno = 2; $i < 500; $i++, $sno++) {
                         ?>      
                         
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="5" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?>                  
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                           
                           <div style=" text-align:center;padding:15px">
                               <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">7.Client Special Requirement</span>
                            </div>
                            
                            <div class="card card-body ">
                        <div class="table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom  " >
                                <tr >

                                  <th   style="width:80px"><b>S.No</b></th>
                                  <th   ><b>Client Requirement</b></th> 
                                  <th  style="width:140px"><b>Result</b></th> 
                                 
                                </tr>
                                
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
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
                                 
                <td style="width:50px">
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="12345<?php echo $i;?>" class="btn btn-primary" onclick="ee7(this.id)">+</span>
          </td>
                                </tr>
                           <?php
                              
                            }
                                $j=$i;
                                for ($i = $j, $sno = $j+1; $i < 10; $i++, $sno++) {
                                ?>
                        <tr id="s7<?php echo $i; ?>" style="display:none">
                        <td  style="padding: 0.3rem;text-align:center">
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
                             <div class="row g-3 mb-4">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Factory&nbsp;Representative&nbsp;</label>
                            <select class="form-select" id="signed" name="signed" >
        <option value="">Select</option>
        <?php
        $sql = "SELECT * FROM employee Order By name asc";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
          <?php
        }
        ?>
        </select>
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
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
          <?php
        }
        ?>
        </select>
                          </div>    
                          
                        </div> 
                      </div> 
                      <br>
                                <br>

                                <div class="col-md-12 mb-8 card card-body">
                      
                              <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">REFERENCE SAMPLE V/S BULK</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>  
                     
                              </thead>
                              <tbody>
                              <?php 		
                          $i = 500;
                          $sno = 1;
                $sql7 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=6 order by id asc";
                    $result7 = mysqli_query($conn, $sql7);
                    $count7 = mysqli_num_rows($result7);
                    if($count7 > 0){
                    while($rw7 = mysqli_fetch_array($result7))
                     {
                      $img_id = $rw7['img_id'];
                      $no = $rw7['sno'];
                      $status = $rw7['status'];
                                ?> 
                              <?php 
                              // for ($i = 500, $sno = 1; $i <501; $i++, $sno++) {
             ?> 
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw7['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="6">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw7['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw7['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                      <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                        <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                          <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw7['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a> 
             </td>
                                </tr>
                                <?php

          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 600; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="6">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
                   </td>
                       
                      <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >
             </td>
                                </tr>   
                               
                                <?php
                          }
                        }
                        else{
                           for ($i = 500, $sno = 1; $i <501; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="6" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 501, $sno = 2; $i < 600; $i++, $sno++) {
                         ?>      
                         
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="6" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?>             
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                             <br>
                             <br>


                             <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">GENERAL PRESENTATION </span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr> 
                              </thead>
                              <tbody>
                              <?php 		
                             $i = 600;
                           $sno = 1;
                    $sql8 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=7 order by id asc";
                    $result8 = mysqli_query($conn, $sql8);
                    $count8 = mysqli_num_rows($result8);
                    if($count8 > 0){
                    while($rw8 = mysqli_fetch_array($result8))
                     {
                      $img_id = $rw8['img_id'];
                      $no = $rw8['sno'];
                      $status = $rw8['status'];
                                ?> 

                                  <tr >
                                  <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw8['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="7">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw8['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw8['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                        <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                        <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                         <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                        ?>
          </td> 
          <td > 
          <a  href="uploads/<?php echo $rw8['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
          </td>
                                </tr>
                          
                               
                                <?php

          }
             for ($i = 601, $sno = 2; $i < 700; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="7">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                   
          </td>
          <td > 
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 600, $sno = 1; $i <601; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="7" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 601, $sno = 2; $i < 700; $i++, $sno++) {
                         ?>      
                         
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="7" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?> 
                                              
                              </tbody>
                            </table>
                                </div> 
                                </div>                            
                                 <br>
                                 <br>


                             <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">PO Sheet Image</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr> 
                              </thead>
                              <tbody>
                              <?php 		
                         $i = 700;
                         $sno = 1;
                    $sql9 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=8";
                    $result9 = mysqli_query($conn, $sql9);
                    $count9 = mysqli_num_rows($result9);
                    if($count9 > 0){
                    while($rw9 = mysqli_fetch_array($result9))
                     {
                      $img_id = $rw9['img_id'];
                      $no = $rw9['sno'];
                      $status = $rw9['status'];
                                ?> 
                             
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw9['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="8">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw9['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw9['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                      <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                         <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                          <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw9['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                      </td>
                                </tr>
                                <?php

          }
          $j =$i;
             for ($i = $j, $sno = $no; $i < 800; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="8">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td > 
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 700, $sno = 1; $i <701; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="8" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 701, $sno = 2; $i < 800; $i++, $sno++) {
                         ?>      
                         
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="8" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?>             
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                                <br>
                                <br>


                             <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">COC Image</span>
                        </div>
                        
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr> 
                              </thead>
                              <tbody>
                              <?php 		
      $i = 800;
      $sno = 1;
      $sql10 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=9 order by id asc";
                    $result10 = mysqli_query($conn, $sql10);
                    $count10 = mysqli_num_rows($result10);
                    if($count10 > 0){
                    while($rw10 = mysqli_fetch_array($result10))
                     {
                      $img_id = $rw10['img_id'];
                      $no = $rw10['sno'];
                      $status = $rw10['status'];
                                ?> 
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw10['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="9">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw10['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                       
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw10['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                        <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                        <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                           <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                      // for ($i = 800, $sno = 1; $i <801; $i++, $sno++) {
                        ?>
                    </td>
                    <td >
                    <a  href="uploads/<?php echo $rw10['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a> 
                       </td>
                                </tr>
              <?php
          
          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 900; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="9">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
          <td>    
                     
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
             </td>
          <td>    
            
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 800, $sno = 1; $i <801; $i++, $sno++) {
                          ?>
                           
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="9" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 801, $sno = 2; $i < 900; $i++, $sno++) {
                         ?>      
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="9" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee11(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       
                                <?php
                                }
                                }
                                ?>            
                              </tbody>
                            </table>
                                </div> 
                                </div>   
                                <br>
                                <br>
              
				   <div class="col-12 d-flex justify-content-between">
                              <a href="inspection_list.php" class="btn btn-label-dark btn-prev">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Preview</span>
                              </a>
                             
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
							
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

      
      <div class="drag-target"></div>
    
<?php include "footer.php"; ?>




<?php
if (isset($_POST['submit'])) {


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


  $img = $_FILES['imageUpload']['name'];
  $p_tmp1 = $_FILES['imageUpload']['tmp_name'];
  $path = "uploads/$img";
  $move = move_uploaded_file($p_tmp1, $path);
  
  
  $po_sheet_img = $_FILES['po_sheet_img']['name'];
  $p_tmp1 = $_FILES['po_sheet_img']['tmp_name'];
  $path = "uploads/$po_sheet_img";
  $move = move_uploaded_file($p_tmp1, $path);
  
  $coc_img = $_FILES['coc_img']['name'];
  $p_tmp1 = $_FILES['coc_img']['tmp_name'];
  $path = "uploads/$coc_img";
  $move = move_uploaded_file($p_tmp1, $path);

  if ($jobno != '') {
  $sql = "INSERT into inspection_grn (dcno,date,jobno,clientname,factoryname,clientcountry,sku,service,pono,ordqty,inspectname,inspecttime,inspectloc,qtytot,pack1tot,unpack1tot,
  unfinishtot,cartonqtytot,totalcartontot,pack2tot,unpack2tot,selectedcarton,cartonno,qntyresult,qntyremark,styleremarks,critical,major,minor,inspect_level,
  sizetot,callowtot,cfoundtot,majallowtot,majfoundtot,minallowtot,minfoundtot,wmnotes,critfoundtot,majfoundtot1,minfoundtot1,critaccepttot,majaccepttot,minaccepttot,wmresult2,
 wmremarks,packmethod,cartonply,fastmethod,material,metal,packresult,packremark,measurement,measureresult,tolprovide,signed,signed1,signed2,signed3,uploadimg,po_sheet_img,coc_img,cartresult,cartremarks)
  values('$dcno','$date','$jobno','$clientname','$factoryname','$clientcountry','$sku','$service','$pono','$ordqty','$inspectname','$inspecttime','$inspectloc','$qtytot','$pack1tot','$unpack1tot',
  '$unfinishtot','$cartonqtytot','$totalcartontot','$pack2tot','$unpack2tot','$selectedcarton','$cartonno','$qntyresult','$qntyremark','$styleremarks','$critical','$major','$minor','$inspect_level',
  '$sizetot','$callowtot','$cfoundtot','$majallowtot','$majfoundtot','$minallowtot','$minfoundtot','$wmnotes','$critfoundtot','$majfoundtot1','$minfoundtot1','$critaccepttot','$majaccepttot','$minaccepttot','$wmresult2',
  '$wmremarks','$packmethod','$cartonply','$fastmethod','$material','$metal','$packresult','$packremark','$measurement','$measureresult','$tolprovide','$signed','$signed1','$signed2','$signed3','$img','$po_sheet_img','$coc_img','$cartresult','$cartremarks')";
 
 $result = mysqli_query($conn, $sql);
  }

  $cid = mysqli_insert_id($conn);
  
  foreach ($_POST['pono1'] as $key => $val) {
    
    
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
   
   
    if ($pono1!= '' ) {
      $sql17 = "INSERT into inspection_qty (cid,pono1,skuno,orderqty,pack1,unpack1,unfinish,cartonqty,totcarton,pack2,unpack2)
  values('$cid','$pono1','$skuno','$orderqty','$pack1','$unpack1','$unfinish','$cartonqty','$totcarton','$pack2','$unpack2')";
     $result1 = mysqli_query($conn, $sql17);
    }
  }

  // foreach ($_POST['wmpono'] as $key => $val) {
    
  //   $wmpono = $_POST['wmpono'][$key];
  //   $itemno = $_POST['itemno'][$key];
  //   $size = $_POST['size'][$key];
  //   $callow = $_POST['callow'][$key];
  //   $cfound = $_POST['cfound'][$key];
  //   $majallow = $_POST['majallow'][$key];
  //   $majfound = $_POST['majfound'][$key];
  //   $minallow = $_POST['minallow'][$key];
  //   $minfound = $_POST['minfound'][$key];
  //   $wmresult1 = $_POST['wmresult1'][$key];
   
   
  //   if ($wmpono!= '') {
  //     $sql16 = "INSERT into inspection_wm_summary (cid,wmpono,itemno,size,callow,cfound,majallow,majfound,minallow,minfound,wmresult1)
  // values('$cid','$wmpono','$itemno','$size','$callow','$cfound','$majallow','$majfound','$minallow','$minfound','$wmresult1')";
     
  //    $result1 = mysqli_query($conn, $sql16);
  //   }
  // }

  foreach ($_POST['defectno'] as $key => $val) {
    
   
    $pono_work = $_POST['pono_work'][$key];
    $style_work = $_POST['style_work'][$key];
    $color_work = $_POST['color_work'][$key];
    $size_work = $_POST['size_work'][$key];
    $defectdesc = $_POST['defectdesc'][$key];
    $defsize = $_POST['defsize'][$key];
    $wmr_critical = $_POST['wmr_critical'][$key];
    $wmr_major = $_POST['wmr_major'][$key];
    $wmr_minor = $_POST['wmr_minor'][$key];
   
   
    if ($defectdesc!='') {
      $sql15 = "INSERT into inspection_wm_records (cid,pono_work,style_work,color_work,size_work,defsize,defectno,defectdesc,wmr_critical,wmr_major,wmr_minor)
  values('$cid','$pono_work','$style_work','$color_work','$size_work','$defsize','$defectno','$defectdesc','$wmr_critical','$wmr_major','$wmr_minor')";
     
     $result1 = mysqli_query($conn, $sql15);
    }
  }

  foreach ($_POST['pkpono'] as $key => $val) {
    
    $pkpono = $_POST['pkpono'][$key];
    $qtyspec = $_POST['qtyspec'][$key];
    $qtyactual = $_POST['qtyactual'][$key];
    $innerspec = $_POST['innerspec'][$key];
    $inneractual = $_POST['inneractual'][$key];
    $grossspec = $_POST['grossspec'][$key];
    $grossactual = $_POST['grossactual'][$key];
    $dimspec = $_POST['dimspec'][$key];
    $dimactual = $_POST['dimactual'][$key];
  
   
    if ($pkpono!='' ) {
      $sql14 = "INSERT into inspection_packing (cid,pkpono,qtyspec,qtyactual,innerspec,inneractual,grossspec,grossactual,dimspec,dimactual)
  values('$cid','$pkpono','$qtyspec','$qtyactual','$innerspec','$inneractual','$grossspec','$grossactual','$dimspec','$dimactual')";
     
     $result1 = mysqli_query($conn, $sql14);
    }
  }

  foreach ($_POST['testtype'] as $key => $val) {
    
    $testtype = $_POST['testtype'][$key];
    $dropsize = $_POST['dropsize'][$key];
    $dropmethod = $_POST['dropmethod'][$key];
    $dropdetail = $_POST['dropdetail'][$key];
    $dropresult = $_POST['dropresult'][$key];
   
   
    if ($testtype!='') {
      $sql13 = "INSERT into inspection_onsite (cid,testtype,dropsize,dropmethod,dropdetail,dropresult)
  values('$cid','$testtype','$dropsize','$dropmethod','$dropdetail','$dropresult')";
     
     $result1 = mysqli_query($conn, $sql13);
    }
  }

  foreach ($_POST['specs'] as $key => $val) {
    
    $specs = $_POST['specs'][$key];
    $cartonresult = $_POST['cartonresult'][$key];
    $observation = $_POST['observation'][$key];
   
    if ($specs!='') {
      $sql113 = "INSERT into inspection_carton (cid,specs,cartonresult,observation)
  values('$cid','$specs','$cartonresult','$observation')";
     
     $result1 = mysqli_query($conn, $sql113);
    }
  }
  
  foreach ($_POST['clientreq'] as $key => $val) {
    
    $clientreq = $_POST['clientreq'][$key];
    $clientresult = $_POST['clientresult'][$key];
   
    if ($clientreq!='') {
      $sql12 = "INSERT into inspection_client (cid,clientreq,clientresult)
  values('$cid','$clientreq','$clientresult')";
     
     $result1 = mysqli_query($conn, $sql12);
    }
  }


  foreach ($_POST['styleitem'] as $key => $val) {
    
    $styleitem = $_POST['styleitem'][$key];
    $stylecolor = $_POST['stylecolor'][$key];
    $stylematerial = $_POST['stylematerial'][$key];
    $approve = $_POST['approve'][$key];
    $styleresult = $_POST['styleresult'][$key];
   
    if ($stylematerial!='') { 
      $sql11 = "INSERT into inspection_style (cid,styleitem,stylecolor,stylematerial,approve,styleresult)
  values('$cid','$styleitem','$stylecolor','$stylematerial','$approve','$styleresult')";
     
     $result1 = mysqli_query($conn, $sql11);
    }
  }


  
  if ($result) {

  echo "<script>alert('Inspection Registered Successfully');window.location='inspection_list.php';</script>";

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
function get_specs(id,value) {
  var c=id.substr(5);
  // alert(c);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#cartonresult'+c).val(data.sample);
$('#observation'+c).val(data.method);
}

      }
    };
    xmlhttp.open("GET","ajax/get_specs.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>


<script>
function get_type(id,value) {
  var c=id.substr(8);
  // alert(c);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#dropsize'+c).val(data.sample);
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


<script>
function get_calc(value) {
  // alert(value);
  // var c =id.substr(5);
    var value2=document.getElementById('inspect_level').value;
    var value3=document.getElementById('critical').value;
      // alert (value3);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

$('#critaccepttot').val(data.ap);
$('#pack2'+c).val(data.sample);
// $('#rp3').val(data.rp);

}

      }
    };
    xmlhttp.open("GET","ajax/get_aql.php?ins_id="+value2+"&quantity="+value+"&aql_id="+value3, true);
    xmlhttp.send();
  }
}
</script>


<script>
function get_calc1(value) {
  // var c =id.substr(5);
  // alert(value);
    var value2=document.getElementById('inspect_level').value;
    var value3=document.getElementById('major').value;
      // alert (value3);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

$('#majaccepttot').val(data.ap);

}

      }
    };
    xmlhttp.open("GET","ajax/get_aql.php?ins_id="+value2+"&quantity="+value+"&aql_id="+value3, true);

    xmlhttp.send();
  }
}
</script>


<script>
function get_calc2(value) {
  // var c =id.substr(5);
  // alert(value);
    var value2=document.getElementById('inspect_level').value;
    var value3=document.getElementById('minor').value;
      // alert (value3);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

$('#minaccepttot').val(data.ap);

}

      }
    };
    xmlhttp.open("GET","ajax/get_aql.php?ins_id="+value2+"&quantity="+value+"&aql_id="+value3, true);

    xmlhttp.send();
  }
}
</script>

<script>
  function chk_qty(value){
    // alert(value);

    var qty=document.getElementById('critaccepttot').value?document.getElementById('critaccepttot').value:0;
   if(parseFloat(qty) < parseFloat(value)){
      
      document.getElementById('wmresult2').value='Fail';
    }
    else{
      document.getElementById('wmresult2').value='Pass';
      }
  }
  
</script>

<script>
  function chk_qty1(value){
    // alert(value);
    var qty1=document.getElementById('majaccepttot').value?document.getElementById('majaccepttot').value:0;

   if(parseFloat(qty1) < parseFloat(value)){
      document.getElementById('wmresult2').value='Fail';
    }
    else{
      document.getElementById('wmresult2').value='Pass';
      }
  }
  
</script> 

<script>
  function chk_qty2(value){
    //  alert(value);
    var qty2=document.getElementById('minaccepttot').value?document.getElementById('minaccepttot').value:0;
    if(parseFloat(qty2) < parseFloat(value) ){
      
      document.getElementById('wmresult2').value='Fail';
    }
    else{
      document.getElementById('wmresult2').value='Pass';
      }
  }


  </script>


<script>
  function aql_value(value){
    var pktot=document.getElementById('pack1tot').value?document.getElementById('pack1tot').value:0;
    var upktot=document.getElementById('unpack1tot').value?document.getElementById('unpack1tot').value:0;
    
    var pt = parseFloat(pktot) + parseFloat(upktot);
    //  alert(pt);

          document.getElementById('dummy').value=pt;

  }


  </script>

  


<script>
function upload_img(id) {
  var c=(id.substr(7));
  // alert(c);
  var formData = new FormData();
    var imageFile = document.getElementById('file'+c).files[0];
    var value3=document.getElementById('remimg_remarks'+c).value;
  var value4=document.getElementById('rid'+c).value;
  
    formData.append('file', imageFile);
    formData.append('remimg_remarks', value3);
    formData.append('rid', value4);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/ajax_php_upd.php', true);
    xhr.onload = function() {
      r = xhr.responseText;
      
        if (xhr.status === 200) {
            // alert('Image Replaced Successfully!');
            alert(r);
        } else {
            // alert('Image Replaced Failed!');
        }
    };
    xhr.send(formData);
 
}

</script>

<script>
function save_img(id) {
	// alert(id);
  var c=(id.substr(10));
  var formData = new FormData();
    var imageFile = document.getElementById('file'+c).files[0];
    var value3=document.getElementById('remimg_remarks'+c).value;
  var value4=document.getElementById('img_id'+c).value;
  // alert(value4);
  var value5=document.getElementById('sidd').value;
  var value6=document.getElementById('sno'+c).value;
  
    formData.append('file', imageFile);
    formData.append('remimg_remarks', value3);
    formData.append('img_id', value4);
    formData.append('sidd', value5);
    formData.append('sno', value6);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/ajax_php_file.php', true);
    xhr.onload = function() {
      r = xhr.responseText;
     
        if (xhr.status === 200) {
            // alert('Image Uploaded Successfully!');
             alert(r);
             window.location='ins.php?cid=<?php echo base64_encode($sid);?>';

        } else {
            // alert('Image Upload Failed!');
        }
    };
    xhr.send(formData);
 
}

</script>

<script>
function del_img(id) {

  var res = confirm("Are you sure to Delete?");

  if (res) {
  var c=(id.substr(6));
  var formData = new FormData();
  var value6=document.getElementById('rid'+c).value;
  
    formData.append('rid', value6);
     
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/del_img.php', true);
    xhr.onload = function() {
      r = xhr.responseText;
    //  alert(r);
        if (xhr.status === 200) {
            alert('Image Deleted Successfully!');
            window.location='ins.php?cid=<?php echo base64_encode($sid);?>';
        } else {
            alert('Image Deleted Failed!');
        }
    };
    xhr.send(formData);
}
}

</script>
