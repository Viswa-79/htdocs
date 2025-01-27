<?php include "config.php"; ?>
<script>
function ee1(x)
{
//alert(x);
var a=x;
var c=(a.substr(10));
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
function ee3(x)
{
//alert(x);
var a=x;
var c=(a.substr(9));
e=parseInt(c)+1;

document.getElementById('s3'+e).style.display='table-row';

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
function ee4(x)
{
//alert(x);
var a=x;
var c=(a.substr(12));
e=parseInt(c)+1;

document.getElementById('s4'+e).style.display='table-row';

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
function get_items(value) {
//alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;

  for(var i=0;i<=20;i++)
					   {
						  document.getElementById('itemno'+i).innerHTML = r;
					   }

      }
    };
    xmlhttp.open("GET","ajax/get_items.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>



<script>
function get_item_details(id,value) {
  var c=id.substr(6);
  
  
   var value2=document.getElementById('orderno').value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){


                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
}
</script>

<?php
$fg1="select max(orderno) as id from budget_entry";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>


<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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
            <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>


            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row">
            
                           
                                
              <form action="" method="post" onSubmit="return true" enctype="multipart/form-data">
                        
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Budget&nbsp;Entry</button>
                      <a href="budget_entrylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View&nbsp;Entry
                          </a>
                    </div>    <br> 




                    <div class="col-12 mb-4 mb-md-0">
                  <div class="card">
                  <?php
                              $sql4 = " SELECT * FROM budget_entry WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                  <div class="card-body">
                  
                  <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                  <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">I.O No/Order No:</label>
                            <input type="text"
                             id="orderno"
                             name="orderno"
                             value="<?php echo $wz1['orderno']; ?>"
                              class="form-control"
                               readonly/>
                          </div>
                          
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Status</label>
                            <select name="status" id="status" class="select2 form-select" data-allow-clear="true">
                            <option value="">Select</option> 
                                <option value="Running" <?php if($wz1['status']=='Running'){ ?>Selected<?php } ?> >Running  </option>
                                <option value="Completed" <?php if($wz1['status']=='Completed'){ ?>Selected<?php } ?> >Completed </option>   
                                <option value="All" <?php if($wz1['status']=='All'){ ?>Selected<?php } ?> >All </option>   
                              </select>
                          </div><div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order Qty</label>
                            <input type="text" 
                            id="orderqty" 
                            name="orderqty" 
                            class="form-control" 
                            placeholder="500 Kg"
                            value="<?php echo $wz1['orderqty']; ?>" />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">P.O. Rate</label>
                            <input type="text"
                             id="porate" 
                             name="porate" 
                             class="form-control"
                              placeholder="282.45"
                              value="<?php echo $wz1['porate']; ?>" />
                          </div>
                          
                          
                        </div>
                    
                        </div>
                  </div>
                </div>


                  <div class="bs-stepper wizard-numbered mt-4">
                    <div class="bs-stepper-header">
                     
                      <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <!-- <span class="bs-stepper-circle">1</span> -->
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">YARN</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#item_details" >
                        <button type="button" class="step-trigger">
                          <!-- <span class="bs-stepper-circle">2</span> -->
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">KINTTING</span>
                          </span>
                        </button>
                      </div><div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      
                     
                      <div class="step" data-target="#timeaction">
                        <button type="button" class="step-trigger">
                          <!-- <span class="bs-stepper-circle">3</span> -->
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">DYEING</span>
                          </span>
                        </button>
                      </div> 
                       <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>  
                      <div class="step" data-target="#documents">
                        <button type="button" class="step-trigger">
                          <!-- <span class="bs-stepper-circle">4</span> -->
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">COMMERCIAL</span>
                          </span>
                        </button>
                      </div>

                    </div>

                    
                    <div class="bs-stepper-content">
                     
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                        <div class="table-responsive">
                          <table class="table table-border border-top">
                            <thead class="border-bottom">
                              <tr>
                                <th>Supplier</th>
                                <th>Yarn&nbsp;Type</th>
                                <th>Yarn&nbsp;Count</th>
                                <th>Yarn&nbsp;Colour</th>
                                <th>Req.Kgs</th> 
                                <th>Rate&nbsp;/&nbsp;Kgs</th>
                                <th>Req.Gsm</th>
                                <th>planed&nbsp;Rate</th>
                                <th>Approved&nbsp;Rate</th>
                                <th>Remarks</th> 
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                        $sno=1; $i=0;
                              $sql1 = " SELECT * FROM budget_entry1 Where cid='$sid'";
                              $result1 = mysqli_query($conn, $sql1);
                              while ($rw = mysqli_fetch_array($result1))
                              {
                                  ?>  
                              <tr>
                              <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 
                              <td style="padding: 0.3rem">
                <select name="supplier[]" id="supplier" style="width: 20rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM party order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['supplier']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['partyname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="yarntype"
                                   name="yarntype[]"
                                   style="width: 10rem;"
                                   value="<?php echo $rw['yarntype']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
                                 <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="yarncount"
                                  name="yarncount[]"
                                  value="<?php echo $rw['yarncount']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>   <td style="padding: 0.3rem">
                <select name="yarncolor[]" id="yarncolor" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM color order by color asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['yarncolor']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="reqdkgs"
                                  name="reqdkgs[]"
                                  value="<?php echo $rw['reqdkgs']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="ratekgs"
                                  name="ratekgs[]"
                                  value="<?php echo $rw['ratekgs']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="fingsm"
                                  name="fingsm[]"
                                  value="<?php echo $rw['fingsm']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="addrate"
                                  name="addrate[]"
                                  value="<?php echo $rw['addrate']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="reprocrate<?php echo $i;?>"
                                  name="reprocrate[]"
                                  onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"
                                  value="<?php echo $rw['reprocrate']; ?>"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="remarks"
                                  name="remarks[]"
                                  value="<?php echo $rw['remarks']; ?>"
                                  aria-label="Product barcode"/>
                                     
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
                
                        <!-- Social Links -->
                        <div id="item_details" class="content">
                        <div class="card">
                        <div class="table-responsive">
                          <table class="table table-border border-top">
                            <thead class="border-bottom">
                              <tr>
                                <th >Supplier</th>
                                <th>Fabric</th>
                                <th>Colour</th>
                                <th>Fab.Count</th>
                                <th>Gsm</th> 
                                <th>Fin.Gsm</th>
                                <th>GG</th>
                                <th>LL</th>
                                <th>Dia</th>
                                <th>Fin.Dia</th> 
                                <th>Prog.Kgs</th> 
                                <th>Prog.Pcs/Mtr</th> 
                                <th>Uom</th> 
                                <th>Rate.UOM</th>
                                <th>PoRate</th>
                                <th>Add..Rate</th>
                                <th>Repro.Rate</th>
                                <th>Remark</th>

                                
                                
                              </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM budget_entry2 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                              <tr>
                              <input type="text" hidden name="tid[]" id="tid" value="<?php echo $rw['id'];?>"> 
                              <td style="padding: 0.3rem">
                <select name="kinttingsupplier[]" id="kinttingsupplier" style="width: 17rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM party order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['kinttingsupplier']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['partyname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                <td style="padding: 0.3rem">
                <select name="fabric[]" id="fabric" style="width: 10rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM fabric order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['fabric']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['fabric'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                 <td style="padding: 0.3rem">
                <select name="kinttingcolor[]" id="kinttingcolor" style="width: 7rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM color order by color asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['kinttingcolor']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="fabcount"
                                  name="fabcount[]"
                                  value="<?php echo $rw['fabcount']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <select name="gsm[]" id="gsm" style="width: 7rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM gsm order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['gsm']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['gsm'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="kinfingsm"
                                  name="kinfingsm[]"
                                  value="<?php echo $rw['kinfingsm']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="kinttingg"
                                  name="kinttingg[]"
                                  value="<?php echo $rw['kinttingg']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="kinttingll"
                                  name="kinttingll[]"
                                  value="<?php echo $rw['kinttingll']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <select name="dia[]" id="dia" style="width: 7rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM dia order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['dia']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['dia'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="findia"
                                  name="findia[]"
                                  value="<?php echo $rw['findia']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="progkgs"
                                   name="progkgs[]"
                                   value="<?php echo $rw['progkgs']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="progpcsmtr"
                                   name="progpcsmtr[]"
                                   value="<?php echo $rw['progpcsmtr']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right;width:6rem"
                                   class="form-control"
                                   id="uom"
                                   name="uom[]"
                                   value="<?php echo $rw['uom']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="rateuom"
                                   name="rateuom[]"
                                   value="<?php echo $rw['rateuom']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="kinporate"
                                   name="kinporate[]"
                                   value="<?php echo $rw['kinporate']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="kinaddrate"
                                  name="kinaddrate[]"
                                  value="<?php echo $rw['kinaddrate']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="reprorate<?php echo $i;?>"
                                   name="reprorate[]"
                                   onKeyDown="ee3(this.id);"
                                   value="<?php echo $rw['reprorate']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="kinremark"
                                   name="kinremark[]"
                                   value="<?php echo $rw['kinremark']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               
              
                                
                              </tr>
                                
                              <?php
                            $sno++; $i++;
                                }
                               ?>
                              
                              
                              
                            </tbody>
                          </table> </div>
                
              </div>   
                        </div>
                        
                        <!-- Account Details -->
                        <div id="documents" class="content">
                         <!-- <div class="col-12 d-flex justify-content-center border rounded pt-4">
                          <img
                            src="../assets/img/illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            alt="wizard-create-deal"
                            data-app-light-img="illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            data-app-dark-img="illustrations/wizard-create-deal-girl-with-laptop-dark.png"
                            width="650"
                            
                            class="img-fluid" />
                        </div>
                            
                           <br> 
                          <div class="row g-3">
                          
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-1</label>
                        <input class="form-control" type="file" id="file1" name="doc1" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                           
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-2</label>
                        <input class="form-control" type="file" id="file2" name="doc2" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                            <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-3</label>
                        <input class="form-control" type="file" id="file3" name="doc3" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                             <div class="col-sm-6">
                             
                        <label for="formFile" class="form-label">Doc-4</label>
                        <input class="form-control" type="file" id="file4" name="doc4" 
  accept="image/jpeg,image/png,application/pdf">                      
                            </div>
                           
                          </div>   -->
                        </div>
                        
                          
                          <div id="timeaction" class="content">

                          <div class="table-responsive">
                          <table class="table table-border border-top">
                            <thead class="border-bottom">
                              <tr>
                                <th >Supplier</th>
                                <th>Fabric</th>
                                <th>color</th>
                                <th>Design</th>
                                <th>Fab.Count</th> 
                                <th>Gsm</th>
                                <th>Fin.Gsm</th>
                                <th>GG</th>
                                <th>LL</th>
                                <th>Dia</th> 
                                <th>Fin.Dia</th>
                                <th>Prog.Kgs</th> 
                                <th>Prog.pcs/Mtr</th>
                                <th>Uom</th> 
                                <th>Rate.UOM</th> 
                                <th>Rate</th>
                                <th>Add.Rate</th> 
                                <th>Reproc.Rate</th> 
                                <th>Remarks</th> 
                                
                                
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                        $sno=1; $i=0;
                              $sql3 = " SELECT * FROM budget_entry3 Where cid='$sid'";
                              $result3 = mysqli_query($conn, $sql3);
                              while ($rw = mysqli_fetch_array($result3))
                              {
                                  ?>    
                              <tr>
                              <input type="text" hidden name="yid[]" id="yid" value="<?php echo $rw['id'];?>"> 
                              <td style="padding: 0.3rem">
                <select name="dyesupplier[]" id="dyesupplier" style="width: 20rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM party order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['dyesupplier']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['partyname'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>

               
                <td style="padding: 0.3rem">
                <select name="dyefabric[]" id="dyefabric" style="width: 10rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM fabric order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['dyefabric']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['fabric'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
              <td style="padding: 0.3rem">
                <select name="dyecolor[]" id="dyecolor" style="width: 10rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM color order by color asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['dyecolor']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
               <td style="padding: 0.3rem">
                
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyedesign"
                                   name="dyedesign[]"
                                   value="<?php echo $rw['dyedesign']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefabcount"
                                  name="dyefabcount[]"
                                  value="<?php echo $rw['dyefabcount']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <select name="dyegsm[]" id="dyegsm" style="width: 7rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM gsm order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['dyegsm']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['gsm'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefingsm"
                                  name="dyefingsm[]"
                                  value="<?php echo $rw['dyefingsm']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="dyegg"
                                  name="dyegg[]"
                                  value="<?php echo $rw['dyegg']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="dyell"
                                  name="dyell[]"
                                  value="<?php echo $rw['dyell']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td> <td style="padding: 0.3rem">
                <select name="dyedia[]" id="dyedia" style="width: 7rem;" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM dia order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['dyedia']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['dia'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefindia"
                                  name="dyefindia[]"
                                  value="<?php echo $rw['dyefindia']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeprogkgs"
                                   name="dyeprogkgs[]"
                                   value="<?php echo $rw['dyeprogkgs']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeprogpcsmtr"
                                   name="dyeprogpcsmtr[]"
                                   value="<?php echo $rw['dyeprogpcsmtr']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right;width:6rem"
                                   class="form-control"
                                   id="dyeuom"
                                   name="dyeuom[]"
                                   value="<?php echo $rw['dyeuom']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyerateuom"
                                   name="dyerateuom[]"
                                   value="<?php echo $rw['dyerateuom']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeporate"
                                   name="dyeporate[]"
                                   value="<?php echo $rw['dyeporate']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyeaddrate"
                                  name="dyeaddrate[]"
                                  value="<?php echo $rw['dyeaddrate']; ?>"
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyereprorate<?php echo $i;?>"
                                   name="dyereprorate[]"
                                   onKeyDown="ee4(this.id);"
                                   value="<?php echo $rw['dyereprorate']; ?>"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeremark"
                                   name="dyeremark[]"
                                   value="<?php echo $rw['dyeremark']; ?>"
                                   aria-label="Product barcode"/>
                                      
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
				  
                </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                          <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                               </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div> 
                        </form>
            </div>
                
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
</html>


<?php
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $orderno = $_POST['orderno'];
  $status = $_POST['status'];
  $orderqty = $_POST['orderqty'];
  $porate = $_POST['porate'];


   $sql1 = "UPDATE budget_entry SET orderno='$orderno',status='$status',orderqty='$orderqty',porate='$porate' where id='$cid'";
  $result1 = mysqli_query($conn, $sql1);
  

foreach ($_POST['supplier'] as $key => $val) {

  $rid = $_POST['rid'][$key];
  $supplier = $_POST['supplier'][$key];
  $yarncount = $_POST['yarncount'][$key];
  $yarncolor = $_POST['yarncolor'][$key];
  $yarntype = $_POST['yarntype'][$key];
  $reqdkgs = $_POST['reqdkgs'][$key];
  $ratekgs = $_POST['ratekgs'][$key];
  $fingsm = $_POST['fingsm'][$key];
  $addrate = $_POST['addrate'][$key];
  $reprocrate = $_POST['reprocrate'][$key];
  $remarks = $_POST['remarks'][$key];
  

  
  
   $sql = "UPDATE budget_entry1 SET supplier='$supplier',yarncount='$yarncount',yarncolor='$yarncolor',yarntype='$yarntype',reqdkgs='$reqdkgs',ratekgs='$ratekgs',fingsm='$fingsm',addrate='$addrate',reprocrate='$reprocrate',remarks='$remarks' where id='$rid'";
  $result = mysqli_query($conn, $sql);


}




foreach ($_POST['kinttingsupplier'] as $key => $val) {

  $tid = $_POST['tid'][$key];
  $kinttingsupplier = $_POST['kinttingsupplier'][$key];
  $fabric = $_POST['fabric'][$key];
  $kinttingcolor = $_POST['kinttingcolor'][$key];
  $fabcount = $_POST['fabcount'][$key];
  $gsm = $_POST['gsm'][$key];
  $kinfingsm = $_POST['kinfingsm'][$key];
  $kinttingg = $_POST['kinttingg'][$key];
  $kinttingll = $_POST['kinttingll'][$key];
  $dia = $_POST['dia'][$key];
  $findia = $_POST['findia'][$key];
  $progkgs = $_POST['progkgs'][$key];
  $progpcsmtr = $_POST['progpcsmtr'][$key];
  $uom = $_POST['uom'][$key];
  $rateuom = $_POST['rateuom'][$key];
  $kinporate = $_POST['kinporate'][$key];
  $kinaddrate = $_POST['kinaddrate'][$key];
  $reprorate = $_POST['reprorate'][$key];
  $kinremark = $_POST['kinremark'][$key];

  
  
  
   $sql = "UPDATE budget_entry2 SET kinttingsupplier='$kinttingsupplier',fabric='$fabric',kinttingcolor='$kinttingcolor',fabcount='$fabcount',gsm='$gsm',kinfingsm='$kinfingsm',kinttingg='$kinttingg',kinttingll='$kinttingll',dia='$dia',findia='$findia',progkgs='$progkgs',progpcsmtr='$progpcsmtr',uom='$uom',rateuom='$rateuom',kinporate='$kinporate',kinaddrate='$kinaddrate',reprorate='$reprorate',kinremark='$kinremark' where id='$tid'";
  $result = mysqli_query($conn, $sql);
  

}





foreach ($_POST['dyesupplier'] as $key => $val) {


  $yid = $_POST['yid'][$key];
  $dyesupplier = $_POST['dyesupplier'][$key];
  $dyefabric = $_POST['dyefabric'][$key];
  $dyecolor = $_POST['dyecolor'][$key];
  $dyedesign = $_POST['dyedesign'][$key];
  $dyefabcount = $_POST['dyefabcount'][$key];
  $dyegsm = $_POST['dyegsm'][$key];
  $dyefingsm = $_POST['dyefingsm'][$key];
  $dyegg = $_POST['dyegg'][$key];
  $dyell = $_POST['dyell'][$key];
  $dyedia = $_POST['dyedia'][$key];
  $dyefindia = $_POST['dyefindia'][$key];
  $dyeprogkgs = $_POST['dyeprogkgs'][$key];
  $dyeprogpcsmtr = $_POST['dyeprogpcsmtr'][$key];
  $dyeuom = $_POST['dyeuom'][$key];
  $dyerateuom = $_POST['dyerateuom'][$key];
  $dyeporate = $_POST['dyeporate'][$key];
  $dyeaddrate = $_POST['dyeaddrate'][$key];
  $dyereprorate = $_POST['dyereprorate'][$key];
  $dyeremark = $_POST['dyeremark'][$key];
  

  
  
  

  $sql = "UPDATE budget_entry3 SET dyesupplier='$dyesupplier',dyefabric='$dyefabric',dyecolor='$dyecolor',dyedesign='$dyedesign',dyefabcount='$dyefabcount',dyegsm='$dyegsm',dyefingsm='$dyefingsm',dyegg='$dyegg',dyell='$dyell',dyedia='$dyedia',dyefindia='$dyefindia',dyeprogkgs='$dyeprogkgs',dyeprogpcsmtr='$dyeprogpcsmtr',dyeuom='$dyeuom',dyerateuom='$dyerateuom',dyeporate='$dyeporate',dyeaddrate='$dyeaddrate',dyereprorate='$dyereprorate',dyeremark='$dyeremark' where id='$yid'";
  $result = mysqli_query($conn, $sql);
  
}


  if ($result) {

 echo "<script>alert('Budget Entry Update successfully');window.location='budget_entrylist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>