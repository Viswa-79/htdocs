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
  $today=date("Y-m-d");

       ?>



<?php
		  $sid=base64_decode($_GET['cid']);

     $fg1="select max(dcno) as id from inspection_grn";

     $fg2=mysqli_query($conn,$fg1);
     $fg3=mysqli_fetch_object($fg2);
     $fg4=$fg3->id+1;

       $akm="SELECT * from inspection_grn where cid='$sid'";
     $qbz=mysqli_query($conn,$akm);
     $conts=mysqli_num_rows($qbz);
     if($conts>0){
     $mbb=mysqli_fetch_array($qbz);
     $kid=$mbb['id'];
     $dcno=$mbb['dcno'];
     }


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
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                <div class="col-12 mb-4">
                  
                  <div class="">
                  <div class="card card-body">
                        
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
                              value="<?php if($kid==''){ echo $fg4; }else{ echo $dcno; }?>"
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

                          <?php
                          $sql = "SELECT *,min(time)as time FROM attendance WHERE empid='$user_id' and date = '$today' and direction='IN'";
                          $result = mysqli_query($conn, $sql);
                          $count1 = mysqli_num_rows($result);
                            if($count1 > 0){
                          }
                          $rw6 = mysqli_fetch_assoc($result);
                          $intime=date('h:i A',strtotime($rw6['time']));

                          $sql7 = "SELECT *,max(time)as time FROM attendance WHERE empid='$user_id' and date = '$today' and direction='OUT'";
                          $result7 = mysqli_query($conn, $sql7);
                          $rw7 = mysqli_fetch_assoc($result7);
                          $outtime=date('h:i A',strtotime($rw7['time']));

                          $time = $intime.' - '.$outtime;
                          ?>
                           <div class="col-md-2" hidden>
                            <label class="form-label" for="collapsible-fullname">Inspector's In-Out Time&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="inspecttime"
                              name="inspecttime"
                              readonly
                              class="form-control"
                              value="<?php echo $time; ?>"
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
                 <?php 
                  	$a0 = "SELECT * FROM inspection_qty where cid='$sid'";
                    $a00 = mysqli_query($conn,$a0);
                    $cnt = mysqli_num_rows($a00);
                    if($cnt<='0'){
          
                  ?>
                      <span style="font-size:16px;font-family:table-icons" class=" btn btn-outline-primary">1.Quantity Details</span>
                      <?php } ?>
                      <?php 
                  	$b0 = "SELECT * FROM inspection_style where cid='$sid'";
                    $b00 = mysqli_query($conn,$b0);
                    $cnt1 = mysqli_num_rows($b00);
                    if($cnt1<='0'){
          
                  ?>
                      <span style="font-size:16px;font-family:table-icons" onclick="get_style(this.id)" id="2.s" class="btn btn-outline-primary">2.Style, Material</span>
                      <?php } ?>
                      <?php 
                  	$c0 = "SELECT * FROM inspection_wm_records where cid='$sid'";
                    $c00 = mysqli_query($conn,$c0);
                    $cnt2 = mysqli_num_rows($c00);
                    if($cnt2<='0'){
          
                  ?>
                      <span style="font-size:16px;font-family:table-icons" onclick="get_style1(this.id)" id="3.w" class="btn btn-outline-primary">3.Workmanship Record</span>
<?php } ?>
<?php 
                  	$d0 = "SELECT * FROM inspection_packing where cid='$sid'";
                    $d00 = mysqli_query($conn,$d0);
                    $cnt3 = mysqli_num_rows($d00);
                    if($cnt3<='0'){
          
                  ?>
                      <span style="font-size:16px;font-family:table-icons" onclick="get_style2(this.id)" id="4.p" class="btn btn-outline-primary">4.Packing Details</span>
                      <?php } ?>
                      <?php 
                  	$e0 = "SELECT * FROM inspection_carton where cid='$sid'";
                    $e00 = mysqli_query($conn,$e0);
                    $cnt4 = mysqli_num_rows($e00);
                    if($cnt4<='0'){
          
                  ?>
                      <span style="font-size:16px;font-family:table-icons" onclick="get_style3(this.id)" id="5.c" class="btn btn-outline-primary">5.Carton Marking</span>
                      <?php  } ?>
                      <?php 
                  	$f0 = "SELECT * FROM inspection_onsite where cid='$sid'";
                    $f00 = mysqli_query($conn,$f0);
                    $cnt5 = mysqli_num_rows($f00);
                    if($cnt5<='0'){
          
                  ?>
                      <span style="font-size:16px;font-family:table-icons" onclick="get_style4(this.id)" id="6.o" class="btn btn-outline-primary">6.Onsite Testing</span>
                      <?php } ?>
                      <?php 
                  	$g0 = "SELECT * FROM inspection_client where cid='$sid'";
                    $g00 = mysqli_query($conn,$g0);
                    $cnt6 = mysqli_num_rows($g00);
                    if($cnt6<='0'){
          
                  ?>
                      <span style="font-size:16px;font-family:table-icons" onclick="get_style5(this.id)" id="7.c" class="btn btn-outline-primary">7.Client Requirement</span>
<?php } ?>
                      <span style="font-size:16px;font-family:table-icons" onclick="get_style6(this.id)" id="8.img" class="btn btn-outline-primary">Upload Image</span>
                     </div>
                    

                     <div class="card card-body"  id="form-title">
                       <div class=" mb-4">
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
                                        <input hidden type="text" name="img_name" id="img_name<?php echo $i;?>" class="form-control" value="<?php echo "Remark Image".' '.$sno;?>" />

                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <!-- <input type="text" hidden name="file11"  value="<?php echo $rw2['defimg'];?>"/> -->
                                      <input class="form-control"  type="file" id="file<?php echo $i;?>" name="file"
                                       data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        title="File size must below 2MB"
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
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Save</button>
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
                  $sno++;
          }
          $j = $i;
             for ($i = $j, $sno = $j+1; $i < 20; $i++, $sno++) {
               ?>
                                
                             
                                  <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
                                      <input hidden type="text" name="img_name" id="img_name<?php echo $i;?>" class="form-control" value="<?php echo "Remark Image".' '.$sno;?>" />

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
                                     data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        title="File size must below 2MB"
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
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Save</button>
                      
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
                                        <input hidden type="text" name="img_name" id="img_name<?php echo $i;?>" class="form-control" value="<?php echo "Remark Image".' '.$sno;?>" />

                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"  data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        title="File size must below 2MB"
                        >                      
                        
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
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Save</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           
                     <?php   
                     }
                       for ($i = 1, $sno = 2; $i < 20; $i++, $sno++) {
                         ?>      
                       
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
      <input hidden type="text" name="img_name" id="img_name<?php echo $i;?>" class="form-control" value="<?php echo "Remark Image".' '.$sno;?>" />

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
                                    data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        title="File size must below 2MB"
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
                         <button class="btn btn-warning submit-btn" value="upload" name="" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Save</button>
                      
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

                      <div style="text-align:center;" > <span style="font-size:16px;font-family:table-icons" class=" btn btn-outline-primary">1.Quantity Details</span></div>
                     <div class="content table-responsive" >
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
                                    value="<?php echo $pono;?>"                                
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
                       </td>                 
              

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
                    <?php                   
                     $sql4 = "SELECT * FROM inspection_grn where cid='$sid'";
               $result4 = mysqli_query($conn, $sql4);
               $rw4 = mysqli_fetch_array($result4); 
               $pack1 = $rw4['pack1tot'];
               $unpack1 = $rw4['unpack1tot'];
                  $aql = $pack1 + $unpack1;
?>
                     <input  type="text" class="form-control" id="dummy" name="dummy" value="<?php echo $aql;?>" onkeyup="get_calc(this.value);get_calc1(this.value);get_calc2(this.value)" onchange="get_calc(this.value);get_calc1(this.value);get_calc2(this.value)" onblur="get_calc(this.value);get_calc1(this.value);get_calc2(this.value)"   style="text-align:center;font-weight:bold" readonly   aria-label="Product barcode"/>                
                 <input   hidden type="text" class="form-control" id="dummy1" name="dummy1" style="text-align:center;font-weight:bold" readonly  aria-label="Product barcode"/>
                 <input  hidden type="text" class="form-control" id="dummy2" name="dummy2"   style="text-align:center;font-weight:bold" readonly   aria-label="Product barcode"/>
                 <input  hidden type="text" class="form-control" id="dummy3" name="dummy3" style="text-align:center;font-weight:bold" readonly   aria-label="Product barcode"/>

                                       
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
                          <br>
                          
                          <?php 
                  	$a0 = "SELECT * FROM inspection_qty where cid='$sid'";
                    $a00 = mysqli_query($conn,$a0);
                    $cnt = mysqli_num_rows($a00);
                    if($cnt<='0'){
          
                  ?>
                               
                                <div class="col-12 d-flex justify-content-between">
                              <a href="inspection_list.php" class="btn btn-label-dark btn-prev">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Preview</span>
                              </a>
                             
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Save</span>
                              </button>
							
                        </div>
                        <?php } ?>
                         
                            </div><br>

                        <br>
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

  

  
  $sizetot = $_POST['sizetot'];
  $callowtot = $_POST['callowtot'];
  $cfoundtot = $_POST['cfoundtot'];
  $majallowtot = $_POST['majallowtot'];
  $majfoundtot = $_POST['majfoundtot'];
  $minallowtot = $_POST['minallowtot'];
  $minfoundtot = $_POST['minfoundtot'];
  $wmnotes = $_POST['wmnotes'];

  $inspect_level = $_POST['inspect_level'];
  $critical = $_POST['critical'];
  $major = $_POST['major'];
  $minor = $_POST['minor'];


  $img = $_FILES['imageUpload']['name'];
  $p_tmp1 = $_FILES['imageUpload']['tmp_name'];
  $path = "uploads/$img";
  $move = move_uploaded_file($p_tmp1, $path);


  $akm1="SELECT* from inspection_grn where cid='$sid'";
  $qbz1=mysqli_query($conn,$akm1);
  $count=mysqli_num_rows($qbz1);
   if($count=='0'){        
  



  if ($jobno != '') {
  $sql = "INSERT into inspection_grn (dcno,cid,date,jobno,clientname,factoryname,clientcountry,sku,service,pono,ordqty,inspectname,inspecttime,inspectloc,inspect_level,critical,major,minor,uploadimg)
  values('$dcno','$sid','$date','$jobno','$clientname','$factoryname','$clientcountry','$sku','$service','$pono','$ordqty','$inspectname','$inspecttime','$inspectloc','$inspect_level','$critical','$major' ,'$minor','$img')";
 $result = mysqli_query($conn, $sql);
}

//  $cid = mysqli_insert_id($conn);
}
  foreach ($_POST['skuno'] as $key => $val) {
 

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
   
   
    if ($orderqty!= '' ) {
       $sql17 = "INSERT into inspection_qty (cid,pono1,skuno,orderqty,pack1,unpack1,unfinish,cartonqty,totcarton,pack2,unpack2)
  values('$sid','$pono1','$skuno','$orderqty','$pack1','$unpack1','$unfinish','$cartonqty','$totcarton','$pack2','$unpack2')";
     $result1 = mysqli_query($conn, $sql17);
    } 
     

  $qtytot = $_POST['qtytot'];  
  $qntyresult = $_POST['qntyresult'];
  $qntyremark = $_POST['qntyremark'];
  $pack1tot = $_POST['pack1tot'];
  $unpack1tot = $_POST['unpack1tot'];
  $unfinishtot = $_POST['unfinishtot'];
  $cartonqtytot = $_POST['cartonqtytot'];
  $totalcartontot = $_POST['totalcartontot'];
  $pack2tot = $_POST['pack2tot'];
  $unpack2tot = $_POST['unpack2tot'];
  $selectedcarton = $_POST['selectedcarton'];
  $cartonno = $_POST['cartonno'];
  } 
   $sq1 = "UPDATE inspection_grn SET qtytot='$qtytot',pack1tot='$pack1tot',unpack1tot='$unpack1tot',unfinishtot='$unfinishtot',cartonqtytot='$cartonqtytot',
totalcartontot='$totalcartontot',pack2tot='$pack2tot',unpack2tot='$unpack2tot',selectedcarton='$selectedcarton',cartonno='$cartonno',qntyresult='$qntyresult',qntyremark='$qntyremark'  WHERE cid='$sid'";
$result1 = mysqli_query($conn, $sq1);
  if ($result) {
    
      $pid = base64_encode($sid);
   echo "<script>alert('Inspection Registered Successfully');window.location='ins.php?cid=$pid';</script>";
 
  } else {
     echo '<script>alert("Something Wrong, data not stored")</script>';
  }
  }
?>


<?php
if (isset($_POST['submit1'])) {
$styleremarks = $_POST['styleremarks'];
  foreach ($_POST['approve'] as $key => $val) {
    
    $styleitem = $_POST['styleitem'][$key];
    $approve = $_POST['approve'][$key];
    $stylematerial = $_POST['stylematerial'][$key];
    $stylecolor = $_POST['stylecolor'][$key];
    $styleresult = $_POST['styleresult'][$key];
   
   
    if ($approve!= '' ) {
       $sql2 = "INSERT into inspection_style(cid,styleitem,approve,stylematerial,stylecolor,styleresult)
  values('$sid','$styleitem','$approve','$stylematerial','$stylecolor','$styleresult')";
     $result1 = mysqli_query($conn, $sql2);
    }    
  }
  
  $sq1 = "UPDATE inspection_grn SET styleremarks='$styleremarks' WHERE cid='$sid'";
$result1 = mysqli_query($conn, $sq1);
   if ($result1) {
    
      $pid = base64_encode($sid);
  echo "<script>alert('Inspection Registered Successfully');window.location='ins.php?cid=$pid';</script>";
 
  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>


<?php
if (isset($_POST['submit2'])) {
  $critfoundtot = $_POST['critfoundtot'];
  $majfoundtot1 = $_POST['majfoundtot1'];
  $minfoundtot1 = $_POST['minfoundtot1'];
  $critaccepttot = $_POST['critaccepttot'];
  $majaccepttot = $_POST['majaccepttot'];
  $minaccepttot = $_POST['minaccepttot'];
  $wmresult2 = $_POST['wmresult2'];
  $wmremarks = $_POST['wmremarks'];

  foreach ($_POST['color_work'] as $key => $val) {
    
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
   
    if ($color_work!= '' ) {
       $sql2 = "INSERT into inspection_wm_records(cid,pono_work,style_work,color_work,size_work,defectno,defectdesc,defsize,wmr_critical,wmr_major,wmr_minor)
  values('$sid','$pono_work','$style_work','$color_work','$size_work','$defectno','$defectdesc','$defsize','$wmr_critical','$wmr_major','$wmr_minor')";
     $result = mysqli_query($conn, $sql2);
    }
  }  
    
  $sq1 = "UPDATE inspection_grn SET critfoundtot='$critfoundtot',majfoundtot1='$majfoundtot1',minfoundtot1='$minfoundtot1',critaccepttot='$critaccepttot',majaccepttot='$majaccepttot',minaccepttot='$minaccepttot',wmresult2='$wmresult2',
  wmremarks='$wmremarks'  WHERE cid='$sid'";
  $result1 = mysqli_query($conn, $sq1);

  
  if ($result) {
    
      $pid = base64_encode($sid);
  //  echo "<script>alert('Inspection Registered Successfully');window.location='ins.php?cid=$pid';</script>";
 
  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>


<?php
if (isset($_POST['submit3'])) {

  $packmethod = $_POST['packmethod'];
  $cartonply = $_POST['cartonply'];
  $fastmethod = $_POST['fastmethod'];
  $material = $_POST['material'];
  $metal = $_POST['metal'];
  $packresult = $_POST['packresult'];
  $packremark = $_POST['packremark'];

  foreach ($_POST['qtyspec'] as $key => $val) {
    
    $pkpono = $_POST['pkpono'][$key];
    $qtyspec = $_POST['qtyspec'][$key];
    $qtyactual = $_POST['qtyactual'][$key];
    $innerspec = $_POST['innerspec'][$key];
    $inneractual = $_POST['inneractual'][$key];
    $grossspec = $_POST['grossspec'][$key];
    $grossactual = $_POST['grossactual'][$key];
    $dimspec = $_POST['dimspec'][$key];
    $dimactual = $_POST['dimactual'][$key];
   
    if ($qtyspec!= '' ) {
      $sql2 = "INSERT into inspection_packing(cid,pkpono,qtyspec,qtyactual,innerspec,inneractual,grossspec,grossactual,dimspec,dimactual)
  values('$sid','$pkpono','$qtyspec','$qtyactual','$innerspec','$inneractual','$grossspec','$grossactual','$dimspec','$dimactual')";
     $result1 = mysqli_query($conn, $sql2);
    }
    } 
  $sq1 = "UPDATE inspection_grn SET packmethod='$packmethod',cartonply='$cartonply',fastmethod='$fastmethod',material='$material',metal='$metal',
  packresult='$packresult',packremark='$packremark'  WHERE cid='$sid'";
  $result1 = mysqli_query($conn, $sq1);
    
  if ($result1) {
    
      $pid = base64_encode($sid);
   echo "<script>alert('Inspection Registered Successfully');window.location='ins.php?cid=$pid';</script>";
 
  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
  }
?>


<?php
if (isset($_POST['submit4'])) {
  
  
  $cartresult = $_POST['cartresult'];
  $cartremarks = $_POST['cartremarks'];
foreach ($_POST['cartonresult'] as $key => $val) {
    
    $specs = $_POST['specs'][$key];
    $cartonresult = $_POST['cartonresult'][$key];
    $observation = $_POST['observation'][$key];
   
    if ($specs!= '' ) {
      $sql2 = "INSERT into inspection_carton(cid,specs,cartonresult,observation)
  values('$sid','$specs','$cartonresult','$observation')";
     $result = mysqli_query($conn, $sql2);
    }
  } 
    
    $sq1 = "UPDATE inspection_grn SET cartresult='$cartresult',cartremarks='$cartremarks'  WHERE cid='$sid'";
    $result1 = mysqli_query($conn, $sq1);
    
 if ($result) {
    
      $pid = base64_encode($sid);
   echo "<script>alert('Inspection Registered Successfully');window.location='ins.php?cid=$pid';</script>";
 
  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
  }
?> 



<?php
if (isset($_POST['submit5'])) {
$measurement = $_POST['measurement'];
  $measureresult = $_POST['measureresult'];
  $tolprovide = $_POST['tolprovide'];

    foreach ($_POST['dropsize'] as $key => $val) {
      
      $testtype = $_POST['testtype'][$key];
      $dropsize = $_POST['dropsize'][$key];
      $dropmethod = $_POST['dropmethod'][$key];
      $dropdetail = $_POST['dropdetail'][$key];
      $dropresult = $_POST['dropresult'][$key];
     
      if ($testtype!= '' ) {
        $sql2 = "INSERT into inspection_onsite(cid,testtype,dropsize,dropmethod,dropdetail,dropresult)
    values('$sid','$testtype','$dropsize','$dropmethod','$dropdetail','$dropresult')";
       $result = mysqli_query($conn, $sql2);
      }
    }
      
  $sq1 = "UPDATE inspection_grn SET measurement='$measurement',measureresult='$measureresult',tolprovide='$tolprovide' WHERE cid='$sid'";
  $result1 = mysqli_query($conn, $sq1);
    
    if ($result) {
    
      $pid = base64_encode($sid);
   echo "<script>alert('Inspection Registered Successfully');window.location='ins.php?cid=$pid';</script>";
 
  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
  }
  ?>



<?php
if (isset($_POST['submit6'])) {

  
 
  $signe = $_POST['signe'];
  $signed1 = $_POST['signed1'];
  $signed2 = $_POST['signed2'];
  $signed3 = $_POST['signed3'];


  foreach ($_POST['clientresult'] as $key => $val) {
    
    $clientreq = $_POST['clientreq'][$key];
    $clientresult = $_POST['clientresult'][$key];
   
    if ($clientreq!= '' ) {
     echo $sql2 = "INSERT into inspection_client(cid,clientreq,clientresult)
  values('$sid','$clientreq','$clientresult')";
     $result1 = mysqli_query($conn, $sql2);
    }
  }

  
  $sq1 = "UPDATE inspection_grn SET signe='$signe',signed1='$signed1',signed2='$signed2',signed3='$signed3'  WHERE cid='$sid'";
$result1 = mysqli_query($conn, $sq1);

  if ($result1) {
    
      $pid = base64_encode($sid);
   echo "<script>alert('Inspection Registered Successfully');window.location='ins.php?cid=$pid';</script>";
 
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

$('#dummy1').val(data.ap);
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

$('#dummy2').val(data.ap);

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

$('#dummy3').val(data.ap);

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
    // alert(imageFile);
    var value3=document.getElementById('remimg_remarks'+c).value;
  var value4=document.getElementById('rid'+c).value;
  var value5=document.getElementById('img_name'+c).value;
  var value6=document.getElementById('sidd').value;
  
    formData.append('file', imageFile);
    formData.append('remimg_remarks', value3);
    formData.append('rid', value4);
    formData.append('img_name', value5);
    formData.append('sidd', value6);

    var xhr = new XMLHttpRequest();
    xhr.open('POST','ajax/ajax_php_upd.php',true);
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
  var value7=document.getElementById('img_name'+c).value;
  
    formData.append('file', imageFile);
    formData.append('remimg_remarks', value3);
    formData.append('img_id', value4);
    formData.append('sidd', value5);
    formData.append('sno', value6);
    formData.append('img_name', value7);

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

<script>
function get_styl(id) {
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
 alert(r);

 document.getElementById('form-title').innerHTML=r;  

	//  document.getElementById('2.style').innerHTML = r;


      }
    };
    xmlhttp.open("POST","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_style(id) {
  
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

 document.getElementById('form-title').innerHTML=r;  

	//  document.getElementById('2.style').innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_style1(id) {
  
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  // alert(value2);
  var value3 = document.getElementById('dummy1').value;
  // alert(value3);
  var value4 = document.getElementById('dummy2').value;
  // alert(value4);
  var value5 = document.getElementById('dummy3').value;
  // alert(value5);
  if (id!= "") {
    // alert('hello');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('form-title').innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2+"&a1="+value3+"&a2="+value4+"&a3="+value5,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_style2(id) {
  
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('form-title').innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_style3(id) {
  
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('form-title').innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_style4(id) {
  
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('form-title').innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_style5(id) {
  
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('form-title').innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_style6(id) {
  
  // alert(id);
  var value2 = document.getElementById('sidd').value;
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('form-title').innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_inspect_ajax.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

