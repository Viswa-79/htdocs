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

                  <div class="card-body">
                  
                   
                  <div class="row g-3">
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">I.O No/Order No:</label>
                            <input type="text"
                             id="orderno"
                             name="orderno"
                             value="<?php echo $fg4; ?>"
                              class="form-control"
                               readonly/>
                          </div>
                          
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Status&nbsp;<span style="color:red;">*</span></label>
                            <select id="status" name="status"   required class="select2 form-select" data-allow-clear="true">
                              <option value="">Select</option>
                              <option value="Running">Running</option>
                              <option value="Completed">Completed</option>
                              <option value="All">All</option>
                            
                            </select>
                          </div><div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">Order&nbsp;Qty&nbsp;<span style="color:red;">*</span></label>
                            <input type="text" 
                            id="orderqty" 
                            name="orderqty" 
                            class="form-control" 
                            required
                            placeholder="500 Kg" />
                          </div>
                          <div class="col-md-3">
                            <label class="form-label" for="collapsible-fullname">P.O. Rate</label>
                            <input type="text"
                             id="porate" 
                             name="porate" 
                             class="form-control"
                              placeholder="282.45" />
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
                             for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                               ?> 
                              <tr>
                              <td style="padding: 0.3rem">
               <select name="supplier[]" id="supplier" style="width: 17rem;" class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM party order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
                
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="yarntype"
                                   name="yarntype[]"
                                   style="width: 10rem;"
                                   aria-label="Product barcode"/>
                                      
               </td>
                                 <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="yarncount"
                                  name="yarncount[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td> <td style="padding: 0.3rem">
               <select name="yarncolor[]" id="yarncolor" class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by color asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="reqdkgs"
                                  name="reqdkgs[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="ratekgs"
                                  name="ratekgs[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="fingsm"
                                  name="fingsm[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="addrate"
                                  name="addrate[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="reprocrate<?php echo $i;?>"
                                  name="reprocrate[]"
                                  onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="remarks"
                                  name="remarks[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              
                                
                              </tr>
                              <?php
                             }
                             for ($i = 1, $sno = 2; $i <= 20; $i++, $sno++) {
                               ?>
                              
                              <tr id="s1<?php echo $i; ?>" style="display:none">
                              <td style="padding: 0.3rem">
               <select name="supplier[]" id="supplier"  style="width: 17rem;"class="select form-select">
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM party order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
                
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="yarntype"
                                   name="yarntype[]"
                                   style="width: 10rem;"
                                   aria-label="Product barcode"/>
                                      
               </td>
                                 <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="yarncount"
                                  name="yarncount[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <select name="yarncolor[]" id="yarncolor" class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by color asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="reqdkgs"
                                  name="reqdkgs[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="ratekgs"
                                  name="ratekgs[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="fingsm"
                                  name="fingsm[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="addrate"
                                  name="addrate[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="reprocrate<?php echo $i;?>"
                                  name="reprocrate[]"
                                  onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="remarks"
                                  name="remarks[]"
                                  aria-label="Product barcode"/>
                                     
              </td>
              
                                
                              </tr>
                              
                              
                              <?php
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
                            <?php
                             for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                               ?> 
                              <tr>
                              <td style="padding: 0.3rem">
               <select name="kinttingsupplier[]" id="kinttingsupplier"  style="width: 17rem;"class="select form-select">
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM party order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <select name="fabric[]" id="fabric"  style="width: 10rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM fabric order by fabric asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <select name="kinttingcolor[]" id="kinttingcolor"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by color asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="fabcount"
                                  name="fabcount[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <select name="gsm[]" id="gsm"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM gsm order by gsm asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['gsm'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="kinfingsm"
                                  name="kinfingsm[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="kinttingg"
                                  name="kinttingg[]"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"   
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="kinttingll"
                                  name="kinttingll[]"
                                  aria-label="Product barcode"/>
                                     
              </td> <td style="padding: 0.3rem">
               <select name="dia[]" id="dia"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM dia order by dia asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['dia'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="findia"
                                  name="findia[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="progkgs"
                                   name="progkgs[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="progpcsmtr"
                                   name="progpcsmtr[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right;width:6rem"
                                   class="form-control"
                                   id="uom"
                                   name="uom[]"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="rateuom"
                                   name="rateuom[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="kinporate"
                                   name="kinporate[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="kinaddrate"
                                  name="kinaddrate[]"
                                
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
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="kinremark"
                                   name="kinremark[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               
              
                                
                              </tr>
                              

                              <?php
                             }
                             for ($i = 1, $sno = 2; $i <= 20; $i++, $sno++) {
                               ?>

                              <tr id="s3<?php echo $i; ?>" style="display:none">

                              <td style="padding: 0.3rem">
               <select name="kinttingsupplier[]" id="kinttingsupplier"  style="width: 17rem;"class="select form-select">
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM party order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <select name="fabric[]" id="fabric"  style="width: 10rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM fabric order by fabric asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <select name="kinttingcolor[]" id="kinttingcolor"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by color asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="fabcount"
                                  name="fabcount[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <select name="gsm[]" id="gsm"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM gsm order by gsm asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['gsm'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="kinfingsm"
                                  name="kinfingsm[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="kinttingg"
                                  name="kinttingg[]"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="kinttingll"
                                  name="kinttingll[]"
                                  aria-label="Product barcode"/>
                                     
              </td> <td style="padding: 0.3rem">
               <select name="dia[]" id="dia"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM dia order by dia asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['dia'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="findia"
                                  name="findia[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="progkgs"
                                   name="progkgs[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="progpcsmtr"
                                   name="progpcsmtr[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right;width:6rem"
                                   class="form-control"
                                   id="uom"
                                   name="uom[]"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="rateuom"
                                   name="rateuom[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="kinporate"
                                   name="kinporate[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="kinaddrate"
                                  name="kinaddrate[]"
                                
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
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="kinremark"
                                   name="kinremark[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               
              
                                
                              
                              
                                
                              <?php
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
                                <th>Color</th>
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
                             for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                               ?> 
                              <tr>
                              <td style="padding: 0.3rem">
               <select name="dyesupplier[]" id="dyesupplier"  style="width: 17rem;"class="select form-select">
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM party order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <select name="dyefabric[]" id="dyefabric"  style="width: 10rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM fabric order by fabric asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <select name="dyecolor[]" id="dyecolor"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by color asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
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
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefabcount"
                                  name="dyefabcount[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <select name="dyegsm[]" id="dyegsm"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM gsm order by gsm asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['gsm'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefingsm"
                                  name="dyefingsm[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="dyegg"
                                  name="dyegg[]"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="dyell"
                                  name="dyell[]"
                                  aria-label="Product barcode"/>
                                     
              </td>  <td style="padding: 0.3rem">
               <select name="dyedia[]" id="dyedia"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM dia order by dia asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['dia'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefindia"
                                  name="dyefindia[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeprogkgs"
                                   name="dyeprogkgs[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeprogpcsmtr"
                                   name="dyeprogpcsmtr[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right;width:6rem"
                                   class="form-control"
                                   id="dyeuom"
                                   name="dyeuom[]"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyerateuom"
                                   name="dyerateuom[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeporate"
                                   name="dyeporate[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyeaddrate"
                                  name="dyeaddrate[]"
                                
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
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeremark"
                                   name="dyeremark[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               
              
                                
                              </tr>
                              

                              <?php
                             }
                             for ($i = 1, $sno = 2; $i <= 20; $i++, $sno++) {
                               ?>

<tr id="s4<?php echo $i; ?>" style="display:none">
                              <td style="padding: 0.3rem">
               <select name="dyesupplier[]" id="dyesupplier"  style="width: 17rem;"class="select form-select">
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM party order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
               <select name="dyefabric[]" id="dyefabric"  style="width: 10rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM fabric order by fabric asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <select name="dyecolor[]" id="dyecolor"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by color asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
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
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefabcount"
                                  name="dyefabcount[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <select name="dyegsm[]" id="dyegsm"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM gsm order by gsm asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['gsm'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefingsm"
                                  name="dyefingsm[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="dyegg"
                                  name="dyegg[]"
                                  aria-label="Product barcode"/>
                                     
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right;width:6rem"
                                  class="form-control"
                                  id="dyell"
                                  name="dyell[]"
                                  aria-label="Product barcode"/>
                                     
              </td>  <td style="padding: 0.3rem">
               <select name="dyedia[]" id="dyedia"  style="width: 7rem;"class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM dia order by dia asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['dia'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyefindia"
                                  name="dyefindia[]"
                                
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeprogkgs"
                                   name="dyeprogkgs[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeprogpcsmtr"
                                   name="dyeprogpcsmtr[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right;width:6rem"
                                   class="form-control"
                                   id="dyeuom"
                                   name="dyeuom[]"
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyerateuom"
                                   name="dyerateuom[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeporate"
                                   name="dyeporate[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>

               <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="dyeaddrate"
                                  name="dyeaddrate[]"
                                
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
                                   aria-label="Product barcode"/>
                                      
               </td>
               <td style="padding: 0.3rem">
                <input
                                   type="text"
                                   style="text-align:right"
                                   class="form-control"
                                   id="dyeremark"
                                   name="dyeremark[]"
                                 
                                   aria-label="Product barcode"/>
                                      
               </td>
               
              
                                
                              </tr>
                              
                              
                                
                              <?php
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
                              <a class="btn btn-label-secondary btn-prev"  href="home.php" >
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Home</span>
                              </a>
                             
                              <button class="btn btn-success btn-next" onSubmit="return true" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
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

  $orderno = $_POST['orderno'];
  $status = $_POST['status'];
  $orderqty = $_POST['orderqty'];
  $porate = $_POST['porate'];


$sql = "INSERT into budget_entry (orderno,status,orderqty,porate) 
 values ('$orderno','$status','$orderqty','$porate')";
    $result = mysqli_query($conn, $sql);
  
  $sq="select max(id) as id from budget_entry";
  $res = mysqli_query($conn,$sq);
  $rw = mysqli_fetch_array($res);
  $cid=$rw['id'];






foreach ($_POST['supplier'] as $key => $val) {

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
  

  
  
  
if ($supplier != '') {
 $sql1 = "INSERT into budget_entry1 (cid,supplier,yarncount,yarncolor,yarntype,reqdkgs,ratekgs,fingsm,addrate,reprocrate,remarks) 
  values ('$cid','$supplier','$yarncount','$yarncolor','$yarntype','$reqdkgs','$ratekgs','$fingsm','$addrate','$reprocrate','$remarks')";
    $result1 = mysqli_query($conn, $sql1);


}
}



foreach ($_POST['kinttingsupplier'] as $key => $val) {

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
  

  
  
  
if ($kinttingsupplier != '') {
  $sql1 = "INSERT into budget_entry2 (cid,kinttingsupplier,fabric,kinttingcolor,fabcount,gsm,kinfingsm,kinttingg,kinttingll,dia,findia,progkgs,progpcsmtr,uom,rateuom,kinporate,kinaddrate,reprorate,kinremark) 
  values ('$cid','$kinttingsupplier','$fabric','$kinttingcolor','$fabcount','$gsm','$kinfingsm','$kinttingg','$kinttingll','$dia','$findia','$progkgs','$progpcsmtr','$uom','$rateuom','$kinporate','$kinaddrate','$reprorate','$kinremark')";
    $result1 = mysqli_query($conn, $sql1);


}
}




foreach ($_POST['dyesupplier'] as $key => $val) {

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
  

  
  
  
if ($dyesupplier != '') {
   $sql1 = "INSERT into budget_entry3 (cid,dyesupplier,dyefabric,dyecolor,dyedesign,dyefabcount,dyegsm,dyefingsm,dyegg,dyell,dyedia,dyefindia,dyeprogkgs,dyeprogpcsmtr,dyeuom,dyerateuom,dyeporate,dyeaddrate,dyereprorate,dyeremark) 
  values ('$cid','$dyesupplier','$dyefabric','$dyecolor','$dyedesign','$dyefabcount','$dyegsm','$dyefingsm','$dyegg','$dyell','$dyedia','$dyefindia','$dyeprogkgs','$dyeprogpcsmtr','$dyeuom','$dyerateuom','$dyeporate','$dyeaddrate','$dyereprorate','$dyeremark')";
    $result1 = mysqli_query($conn, $sql1);


}
}

  if ($result) {

 echo "<script>alert('Budget Entry Registered successfully');window.location='budget_entry.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>