<?php include "config.php"; ?>
<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(3));
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
function get_size_details(value) {
  
  
  
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
document.getElementById('size_details').innerHTML=r;

      }
    };
    xmlhttp.open("GET","ajax/get_sizegrp.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_kgs()
{

        var ord_qty=document.getElementById('ord_qty').value?document.getElementById('ord_qty').value:0;
        var unit=document.getElementById('unit').value?document.getElementById('unit').value:0;
		var gsm=document.getElementById('gsm').value?document.getElementById('gsm').value:0;
		var dia=document.getElementById('dia').value?document.getElementById('dia').value:0;
		
		
		if(unit=='Mtrs')
		{
        var r1=(parseFloat(dia)*2.54*100*parseFloat(gsm))/10000;
		var r2=1000/parseFloat(r1);
		var r3=parseFloat(ord_qty)/parseFloat(r2);
	
	  document.getElementById('mtrperkg').value=r2.toFixed(1);
	  document.getElementById('tot_kgs').value=r3.toFixed(2);
		}
		else if(unit=='Kgs')
		{
		document.getElementById('mtrperkg').value=0;
		document.getElementById('tot_kgs').value=ord_qty;	
		}

}

</script>
<?php
		$sql="select max(id) as id from order_details";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_object($result);
		$fg=$row->id+1;
  
	    $sql="select max(form_no) as id from order_details";
		$result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_object($result);
		$form_no=$row->id+1;
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
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
              <div class="row">
                <div class="col-12">
                <div class="card-header d-flex align-items-center justify-content-between">
                      <button   class="btn btn-label-primary">Order Entry</button>
                      <a href="order.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Order
                          </a>
                    </div>
                </div>

                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                  <br>
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Letter Of Indent</span>
                            <span class="bs-stepper-subtitle">Upload Indent Doc , Mail Rec</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Order Details</span>
                            <span class="bs-stepper-subtitle">Basic info for the Order</span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                     
                      <div class="step" data-target="#timeaction">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Time & Action</span>
                            <span class="bs-stepper-subtitle">Time allotment for the Process.</span>
                          </span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        <!-- Account Details -->
                        <div id="account-details" class="content">
                         <div class="col-12 d-flex justify-content-center border rounded pt-4">
                          <img
                            src="../../assets/img/illustrations/wizard-create-deal-girl-with-laptop-light.png"
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
                         
                          </div>
                        </div>
                        <!-- Personal Info -->
                        <div id="personal-info" class="content">
                        <div class="row g-3">
                              <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">#</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="form_no"
                                 placeholder=""
                                 name="form_no"
                               value="<?php echo $form_no;?>"
                                 aria-label="Product barcode" />
                              </div>
                                 <div class="col-md-2">
                                 <label class="form-label" for="formtabs-country">Order Type</label>
                                 <select name="order_type" id="order_type" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                                   <option value="Process Order">Process Order</option>
                                   <option value="Sample Order">Sample Order</option>
                                   
                                 </select>
                               </div>
                                 
                                 
                                 
                             <div class="col-md-2">
                                 <label class="form-label" for="formtabs-country">Yarn/Fabric</label>
                                 <select name="order_for" id="order_for" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                                   <option value="Yarns">Yarns </option>
                                   <option value="Fabrics">Fabrics</option>
                                   
                                 </select>
                               </div>
                             <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">IO No.: <span style="background-color: blueviolet; color: white;border-radius: 2px;padding: 2px"> <?php echo date("Y");?> </span></label>
                               <input 
                                 type="text"
                                 class="form-control"
                                 id="productBarcode"
                                 placeholder=""
                                 name="iono"
                                 aria-label="Product barcode" />
                             </div>
                 
                 <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Design Id</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="design_id"
                                 placeholder=""
                                 name="design_id"
                                 aria-label="Product barcode" />
                             </div>
                  <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Fabric Code</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="fabric_code"
                                 placeholder=""
                                 name="fabric_code"
                                 aria-label="Product barcode" />
                               </div>
                  
                           </div><br>

                           <div class="row mb-3">
                 <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Style Code</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="style_code"
                                 placeholder=""
                                 name="style_code"
                                 aria-label="Product barcode" />
                               </div>
                 <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Order Number</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="order_no"
                                 placeholder=""
                                 name="order_no"
                                 aria-label="Product barcode" />
                               </div>
                                 <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">SBT Reference No</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="ref_no"
                                 placeholder=""
                                 name="ref_no"
                                 aria-label="Product barcode" />
                                 
                               
                             </div>
                                <div class="col-md-2">
                                 <label class="form-label" for="formtabs-country">Season</label>
                                 <select name="season" id="season" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                 <?php 
             $sql = "SELECT * FROM season order by season asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                        <option value="<?php echo $rw['id'];?>"><?php echo $rw['season'];?></option>
                       <?php } ?>
                                   
                                 </select>
                               </div>     
                               <div class="col-md-2" >
                               <label class="form-label" for="ecommerce-product-barcode">Order Qty <span style="background-color: green; color: white;border-radius: 2px;padding: 2px"> Kgs/Mtrs </span></label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="ord_qty"
                                 placeholder=""
                                 name="ord_qty"
                                 aria-label="Product barcode"
                                 onkeyup="get_kgs();"
								 />
                                 
                               
                             </div>
                 
                  <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Unit</label>
                               <select name="unit" id="unit" class="select form-select"   onchange="get_kgs();" data-allow-clear="true">
                                   <option value="">Select</option>
                   <option value="Kgs">Kgs</option>
                   <option value="Mtrs">Mtrs</option>
                 
                                   
                                 </select>
                               
                             </div> 
                           </div>
                               <div class="row mb-3">
                   <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">GSM</label>
                               <select name="gsm" id="gsm" class="select form-select"  onchange="get_kgs();" data-allow-clear="true">
                                   <option value="">Select</option>
                   <?php 
             $sql = "SELECT * FROM gsm order by gsm asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                           <option value="<?php echo $rw['gsm'];?>"><?php echo $rw['gsm'];?></option>
                       <?php } ?>
                                   
                                 </select>
             </div> <div hidden class="col-md-1"> <label hidden class="form-label" for="ecommerce-product-barcode">GSM Add</label>
                                 <button class="btn btn-outline-primary " hidden
                 type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                </span></button>
           
                             </div>
                             
                 <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Dia</label>
                                    <select name="dia" id="dia" class="select form-select"  onchange="get_kgs();" data-allow-clear="true">
                                   <option value="">Select</option>
                   <?php 
             $sql = "SELECT * FROM dia order by dia asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                           <option value="<?php echo $rw['dia'];?>"><?php echo $rw['dia'];?></option>
                       <?php } ?>
                                   
                                 </select>
                             </div>
            
             
                   <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Meter/Kg</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="mtrperkg"
                                 placeholder=""
                                 name="mtrperkg"
                                 aria-label="Product barcode"
								readonly />
                             </div>
                             <div class="col-md-2">
                               <label class="form-label" for="ecommerce-product-barcode">Actual Qty (Kgs)</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="tot_kgs"
                                 placeholder=""
                                 name="tot_kgs"
                                 aria-label="Product barcode"
								readonly	
								/>
                             </div>
                                <div class="col-md-4">
                                 <label class="form-label" for="formtabs-country">Buyer Name</label>
                                 <select name="buyer_name" id="buyer_name" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                       <?php 
             $sql = "SELECT * FROM party order by partyname asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                            <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
             <?php } ?>
                                   
                                 </select>
                               </div>
                           </div>
                               <div class="row mb-3">
                  
                                 <div class="col-md-4">
                                 <label class="form-label" for="formtabs-country">Exporter Name</label>
                                 <select name="exporter_name" id="exporter_name" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                                     <?php 
             $sql = "SELECT * FROM party order by partyname asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                            <option value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
             <?php } ?>
                                   
                                 </select>
                               </div>
                                 
                                 
                             <div class="col-md-4">
                                 <label class="form-label" for="formtabs-country">Merchandiser</label>
                                 <select name="merch" id="merch" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                                 <?php 
             $sql = "SELECT * FROM staff order by name asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                            <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
             <?php } ?>
                                 </select>
                               </div>
                             <div class="col-md-2">
                                 <label class="form-label" for="formtabs-country">Currency</label>
                                 <select name="currency" id="currency" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                              <?php 
             $sql = "SELECT * FROM currency order by currency asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                            <option value="<?php echo $rw['id'];?>"><?php echo $rw['currency'];?></option>
             <?php } ?>
                                   
                                 </select>
                               </div>
                                   <div class="col-md-2">
                             <label class="form-label" for="ecommerce-product-barcode">Brand</label>
                               <select name="brand" id="brand" class="select form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                       <?php 
             $sql = "SELECT * FROM brand order by brand asc";
                       $result = mysqli_query($conn, $sql);
                       while($rw = mysqli_fetch_array($result))
             { ?>
                            <option value="<?php echo $rw['id'];?>"><?php echo $rw['brand'];?></option>
             <?php } ?>
                                 </select>
                           </div>
               </div>
               
               
               <div class="row mb-3">
                
                 <div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Entry Date</label>
                             <input name="entry_date" type="date" id="entry_date" placeholder="DD/MM/YYYY" class="form-control" value="<?php echo date("Y-m-d");?>" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Order Date</label>
                             <input name="ord_date" type="date" id="ord_date" placeholder="DD/MM/YYYY" class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Actual Delivery Date</label>
                             <input name="act_del_date" type="date" id="act_del_date" placeholder="DD/MM/YYYY" class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Fact Delivery Date</label>
                             <input name="fact_del_date" type="date" id="fact_del_date" placeholder="DD/MM/YYYY" class="form-control" />
                           </div><div class="col-md-4">
                             <label for="bs-datepicker-format" class="form-label">Total Days</label>
                             <input
                                 type="number"
                                 class="form-control"
                                 id="tot_days"
                                 placeholder=""
                                 name="tot_days"
                                 aria-label="Product barcode" />
                           </div>
                           
                            </div>


                            <div class="col-md-12 mb-4 mt-4">
                      <div class="divider">
                        <div class="divider-text"><strong>Color and Cuff Details</strong></div>
                      </div>
                </div>


               <div class="row mb-3">
                 <div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Style Code</label>
                             <input name="stylecode[]" type="text" id="stylecode[]"  class="form-control"  />
                           </div>
                <div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Design ID</label>
                             <input name="designid[]" type="text" id="designid[]"  class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Color Name</label>
                             <input name="cname[]" type="text" id="cname[]"  class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">TTL Dema</label>
                             <input name="ttl[]" type="text" id="ttl[]"  class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Count</label>
                             <input
                                 type="text"
                                 class="form-control"
                                 id="count[]"
                                 placeholder=""
                                 name="count[]"
                                 aria-label="Product barcode" />
                           </div>
                            
                 <div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Blend</label>
                             <input name="blend[]" type="text" id="blend[]"  class="form-control"  />
                           </div>
						   
						   </div>
						   
						   <div class="row mb-3">
						   
						      <div class="col-md-4">
                             <label for="bs-datepicker-format" class="form-label">Size Group</label>
                             <select name="sizegrp[]" id="sizegrp[]" class="select form-select" onchange="get_size_details(this.value);" data-allow-clear="true">
                            
                                <option value="">Select</option>
                		<?php 
					$sql = "SELECT * FROM sizegroup group by sizegrp order by sizegrp asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['sizegrp_id'];?>"><?php echo $rw['sizegrp'];?></option>
					<?php } ?>
                              </select>
                           </div>
                           <div class="col-md-2"> 
                            <label class="form-label" for="ecommerce-product-barcode"> Size Details</label>
                            <button class="btn btn-outline-primary " 
                            type="button" data-bs-toggle="modal"
                            data-bs-target="#largeModal"><span>
                              <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                            </span>Add Quantity</button>
                
                             </div>
                
                           </div>
                           
                            </div>
                     
                          
                        <div id="timeaction" class="content">
                        <?php
                   for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                            ?>
                            <div class="table-responsive">
                          <table class="table table-border border-top">
                            <thead class="border-bottom">
                              <tr>
                                <th style="width:2%;">#</th>
                                <th style="width:20%;">Operation</th>
                                <th style="width:10%;">Days</th>
                                <th style="width:10%;">Date</th>
                                <th style="width:10%;">Actual Date</th>
                                
                                <th style="width:40%;">Responsible</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                              <td  style="padding: 0.3rem;" align="center">
                            <?php echo $sno;?>
                                   </td>
                                 <td style="padding: 0.3rem">
                                 <select id="operation" name="operation[]" class="select form-select" >
                           <option value="">Select </option>
                         	<?php 
					$sql = "SELECT * FROM process  order by process asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?>
						 </option>
					<?php } ?>
                           </select>
                        </td>
                        <td style="padding: 0.3rem">
                          <input
                                    type="number"
                                    class="form-control"
                                    id="days<?php echo $i;?>"
                                    placeholder="7"
                                    name="days[]"
                                    onKeyDown="ee2(this.id);"
                                    aria-label="Product barcode"/>
                                       
                         </td>
                        <td style="padding: 0.3rem">
                          <input type="date" id="st_date" name="st_date[]" placeholder="DD/MM/YYYY" class="form-control" />
                          </td><td style="padding: 0.3rem">
                            <input type="date" id="end_date" name="end_date[]" placeholder="DD/MM/YYYY" class="form-control" />
                            </td>
                        
                        <td>
                        
                            <select id="responsible" name="responsible[]" class="select form-select" >
                            <option value="">Select </option>
                              <option value="Murugan" selected>Murugan</option>
                              <option value="Dinesh" >Dinesh</option>
                              <option value="Rachel">Rachel</option>
                              <option value="Riya">Riya</option>
                              <option value="Oreos">Oreos</option>
                            </select>
                          </td> 
                              </tr>
                              <?php
           }
           for ($i = 1, $sno = 2; $i < 20; $i++, $sno++) {
             ?>
                              <tr id="s2<?php echo $i; ?>" style="display:none;">
                             
                              <td  style="padding: 0.3rem;" align="center">
                            <?php echo $sno;?>
                                   </td>
                                 <td style="padding: 0.3rem">
                                 <select id="operation" name="operation[]" class="select form-select" >
                           <option value="">Select </option>
                         	<?php 
					$sql = "SELECT * FROM process  order by process asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?>
						 </option>
					<?php } ?>
                           </select>
                        </td>
                        <td style="padding: 0.3rem">
                          <input
                                    type="number"
                                    class="form-control"
                                    id="days<?php echo $i;?>"
                                    placeholder="7"
                                    name="days[]"
                                    onKeyDown="ee2(this.id);"
                                    aria-label="Product barcode"/>
                                       
                          </td>
                        <td style="padding: 0.3rem">
                          <input type="date" id="st_date" name="st_date[]" placeholder="DD/MM/YYYY" class="form-control" />
                          </td><td style="padding: 0.3rem">
                            <input type="date" id="end_date" name="end_date[]" placeholder="DD/MM/YYYY" class="form-control" />
                            </td>
                        
                        <td>
                        
                            <select id="responsible" name="responsible[]" class="select form-select" >
                            <option value="">Select </option>
                              <option value="Murugan" selected>Murugan</option>
                              <option value="Dinesh" >Dinesh</option>
                              <option value="Rachel">Rachel</option>
                              <option value="Riya">Riya</option>
                              <option value="Oreos">Oreos</option>
                            </select>
                          </td> 
                              </tr>
                              <?php
           }
            ?>
                            </tbody>
                          </table>
                            <br>
                             </div>
                        </div>
                      </div></div>  </div>
                      <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>



                            <div class="modal-body">
                              <div class="table-responsive" id="size_details">

                            
								</div>
                            </div>
                          </div>
                        </div>
                      </div>
                            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Home</span>
                              </a>
                              <button class="btn btn-primary btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>  </form> 
            </div>
               

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        </div>
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    
    <!-- build:js assets/vendor/js/core.js -->
</body>
</html>
<?php include "footer.php"; ?>

<?php
if (isset($_POST['submit'])) {


  $form_no = $_POST['form_no'];
  $order_type = $_POST['order_type'];
  $order_for = $_POST['order_for'];
  $iono = $_POST['iono'];
  $gsm = $_POST['gsm'];
  $design_id = $_POST['design_id'];
  $fabric_code = $_POST['fabric_code'];
  $style_code = $_POST['style_code'];
  $order_no = $_POST['order_no'];
  $ref_no = $_POST['ref_no'];
  $season = $_POST['season'];
  $ord_qty = $_POST['ord_qty'];
  $dia = $_POST['dia'];
  $mtrperkg = $_POST['mtrperkg'];
  $buyer_name = $_POST['buyer_name'];
  $exporter_name = $_POST['exporter_name'];
  $merch = $_POST['merch'];
  $currency = $_POST['currency'];
  $brand = $_POST['brand'];
  $entry_date = $_POST['entry_date'];
  $ord_date = $_POST['ord_date'];
  $act_del_date = $_POST['act_del_date'];
  $fact_del_date = $_POST['fact_del_date'];
  $tot_days = $_POST['tot_days'];
  $unit = $_POST['unit'];
  


  //if ($order_type != '') 
  {
   echo $sql = "INSERT into order_details (form_no,order_type,order_for,iono,gsm,design_id,fabric_code,style_code,order_no,ref_no,season,ord_qty,dia,mtrperkg,buyer_name,exporter_name,merch,currency,brand,entry_date,ord_date,act_del_date,fact_del_date,tot_days,created_by,unit) 
   values ('$form_no','$order_type','$order_for','$iono','$gsm','$design_id','$fabric_code','$style_code','$order_no','$ref_no','$season','$ord_qty','$dia','$mtrperkg','$buyer_name','$exporter_name','$merch','$currency','$brand','$entry_date','$ord_date','$act_del_date','$fact_del_date','$tot_days','$user_id','$unit')";
    $result = mysqli_query($conn, $sql);
  }

		$sq="select max(id) as id from order_details";
		$res = mysqli_query($conn,$sq);
		$rw = mysqli_fetch_array($res);
		$cid=$rw['id'];


    foreach ($_POST['stylecode'] as $key => $val) {
      $stylecode = $_POST['stylecode'][$key];
      $designid = $_POST['designid'][$key];
      $cname = $_POST['cname'][$key];
      $ttl = $_POST['ttl'][$key];
      $blend = $_POST['blend'][$key];
      $count = $_POST['count'][$key];
      $sizegrp = $_POST['sizegrp'][$key];

      if ($stylecode != '') 
    {
       echo $sql = "INSERT into order_collar (cid,stylecode,designid,cname,ttl,blend,count,sizegrp) 
  values ('$cid','$stylecode','$designid','$cname','$ttl','$blend','$count','$sizegrp')";
        $result = mysqli_query($conn, $sql);
      }
    }

		foreach ($_POST['qty'] as $key => $val) {
      $sizes = $_POST['sizes'][$key];
      $qty = $_POST['qty'][$key];
     
      if ($qty != '') 
    {
       echo $sql = "INSERT into order_collarsizes (cid,size,qty) 
      values ('$cid','$sizes','$qty')";
        $result = mysqli_query($conn, $sql);
      }
    }
    
		foreach ($_POST['days'] as $key => $val) {
	  
    $operation = $_POST['operation'][$key];
    $days = $_POST['days'][$key];
    $st_date = $_POST['st_date'][$key];
    $end_date = $_POST['end_date'][$key];
    $responsible = $_POST['responsible'][$key];
    if ($operation != '') 
	{
    echo   $sql = "INSERT into order_ta (cid,operation,days,st_date,end_date,responsible) 
values ('$cid','$operation','$days','$st_date','$end_date','$responsible')";
      $result = mysqli_query($conn, $sql);
    }
  }


  $p1 = $_FILES['doc1']['name'];
  $p_tmp1 = $_FILES['doc1']['tmp_name'];
  $path = "uploads/$p1";
  $move = move_uploaded_file($p_tmp1, $path);

  $p2 = $_FILES['doc2']['name'];
  $p_tmp2 = $_FILES['doc2']['tmp_name'];
  $path = "uploads/$p2";
  $move = move_uploaded_file($p_tmp2, $path);
 
  $p3 = $_FILES['doc3']['name'];
  $p_tmp3 = $_FILES['doc3']['tmp_name'];
  $path = "uploads/$p3";
  $move = move_uploaded_file($p_tmp3, $path);

  $p4 = $_FILES['doc4']['name'];
  $p_tmp4 = $_FILES['doc4']['tmp_name'];
  $path = "uploads/$p4";
  $move = move_uploaded_file($p_tmp4, $path);

  $sql2 = "insert into order_document (cid,doc1,doc2,doc3,doc4) values('$cid','$p1','$p2','$p3','$p4')";
  $result2 = mysqli_query($conn, $sql2);
	
  

  if ($result) {

// echo "<script>alert('Order Registered successfully');window.location='order_start.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<script>
function putGsm() {
  
 var gsm=document.getElementById('newgsm').value;  
 //alert (gsm);
  var id=document.getElementById('id').value;
  //alert (id);
  if (gsm != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
       //alert(r);

      }
    };
    xmlhttp.open("GET","ajax/putGsm.php?id="+id+"&value="+gsm,true);
    xmlhttp.send();
  }
}
</script>