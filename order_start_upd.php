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
function ee3(x)
{
//alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;
document.getElementById('s3'+e).style.display='table-row';
}
</script>

<script>
function get_excess_details(value) {
//alert(value);
   if (value.length==0) { 
    document.getElementById('excess_details').innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
	{
	 
	 //alert(xmlhttp.responseText); 
	     r=xmlhttp.responseText;
	  
	  document.getElementById('excess_details').innerHTML=r;

	 }
  }
  xmlhttp.open("GET","ajax/get_excess_details.php?q="+value,true);
  
  
  xmlhttp.send();

}
</script>

<script>
function put_excess(value) {
//alert(value);
var c=(value.substr(6));

var v1=document.getElementById('process'+c).value;
var v2=document.getElementById('subprocess'+c).value;
var v3=document.getElementById('excess'+c).value;
var v4=document.getElementById('ffid').value;
var v5=document.getElementById('eid'+c).value;

   if (value.length==0) { 
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
	{
	 
	// alert(xmlhttp.responseText); 
	     r=xmlhttp.responseText;

	 }
  }
  xmlhttp.open("GET","ajax/put_excess_details.php?q1="+v1+"&q2="+v2+"&q3="+v3+"&q4="+v4+"&q5="+v5,true);
  
  
  xmlhttp.send();

}
</script> 

<script>
function get_subprocess(id,value) {
//alert(value);

var c=(id.substr(7));

   if (value.length==0) { 
    document.getElementById('subprocess'+c).innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
	{
	 
	// alert(xmlhttp.responseText); 
	     r=xmlhttp.responseText;
	  
	  document.getElementById('subprocess'+c).innerHTML=r;

	 }
  }
  xmlhttp.open("GET","ajax/get_subprocess.php?q="+value,true);
  
  
  xmlhttp.send();

}
</script>

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
		 <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Default -->
              <div class="row">
                <div class="col-12">
                  <h5> ORDER UPDATE
				   <a href="order.php" style="float:right;" class="btn btn-primary" name="view" value="view"><span class="align-middle d-sm-inline-block d-none me-sm-1">&nbsp;X CANCEL</span></a></h5>
                </div>
                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#loi">
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
                      <div class="step" data-target="#order_details">
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
					  
                    
					  <div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
					    <div class="step" data-target="#fabric_process">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">4</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Fabric Process</span>
                            <span class="bs-stepper-subtitle">Style Details</span>
                          </span>
                        </button>
                      </div>
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        <!-- Account Details -->
                        <div id="loi" class="content">
                         <div class="col-12 d-flex justify-content-center border rounded pt-4">
                          <img
                            src="../assets/img/illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            alt="wizard-create-deal"
                            data-app-light-img="illustrations/wizard-create-deal-girl-with-laptop-light.png"
                            data-app-dark-img="illustrations/wizard-create-deal-girl-with-laptop-dark.png"
                            width="650"
                            class="img-fluid" />
                        </div>
                           <br> 
						      <?php
                        // LOOP TILL END OF DATA
                        $sql = "SELECT * FROM order_document where cid='$sid'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_array($result);
                            ?>
                          <div class="row g-3">
                            <div class="col-sm-6">
                        <label for="formFile" class="form-label">LOI Doccuments</label>
                        <input class="form-control" type="file" id="file1" name="loi" 
  accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
  <a href="uploads/<?php echo $rows['loi'];?>" target="blank"><?php echo $rows['loi'];?></a>                      
                            </div>
                            <div class="col-sm-6">
                        <label for="formFile" class="form-label">Email Screenshot</label>
                        <input class="form-control" type="file" id="file" name="email" 
  accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps"> 
 <a href="uploads/<?php echo $rows['loi'];?>" target="blank"><?php echo $rows['email'];?></a>  
                            </div>
                            <div class="col-sm-6">
                        <label for="formFile" class="form-label">Other Document 1</label>
                        <input class="form-control" type="file" id="file" name="doc1" 
  accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
 <a href="uploads/<?php echo $rows['loi'];?>" target="blank"><?php echo $rows['doc1'];?></a>  
                            </div>
                        <div class="col-sm-6">
                        <label for="formFile" class="form-label">Other Document 2</label>
                        <input class="form-control" type="file" id="file" name="doc2" 
  accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps"> 
 <a href="uploads/<?php echo $rows['loi'];?>" target="blank"><?php echo $rows['doc2'];?></a>  
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-dark btn-prev" disabled>
                                <i class="ti ti-home me-sm-1 me-0"></i>
                              </button>
                               <div class="step" data-target="#order_details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Next</span>
							  <i class="ti ti-arrow-right me-sm-1 me-0"></i>
                          </span>
                        </button>
                      </div>
                            </div>
                          </div>
                        </div>
                        <!-- Personal Info -->
                        <?php
                        // LOOP TILL END OF DATA
                        $sql = " SELECT * FROM order_details where id='$sid'";
                        $result = mysqli_query($conn, $sql);
                       $rows = mysqli_fetch_array($result);
                            ?>
							
			   <input type="text" hidden name="cid" id="cid" value="<?php echo $rows['id'];?>"> 
             <div id="order_details" class="content">
               <div class="row mb-3">
                   <div class="col">
             
                 <label class="form-label" for="ecommerce-product-barcode">#</label>
                 <input
                   type="text"
                   class="form-control"
                   id="form_no"
                   placeholder=""
                   name="form_no"
                   value="<?php echo $rows['form_no']; ?>"
                   aria-label="Product barcode" />
               </div>
                   <div class="col">
                              <label class="form-label" for="formtabs-country">Order Type</label>
                              <select name="order_type" id="order_type"
                               class="select2 form-select" data-allow-clear="true">
                                <option value="<?php echo $rows['order_type']; ?>"><?php echo $rows['order_type']; ?></option>
                                <option value="process">Process Order</option>
                                <option value="sample">Sample Order</option>
                                
                              </select>
                            </div>
               <div class="col">
                   <label class="form-label" for="formtabs-country">Yarn/Fabric</label>
                                        <select name="order_for" id="order_for" 
                                         
   class="select2 form-select" data-allow-clear="true">
                                          <option  value="<?php echo $rows['order_for']; ?>"><?php echo $rows['order_for']; ?></option>
                                          <option value="Yarn">Yarn </option>
                                          <option value="Fabric">Fabric</option>
                                        </select>
                                      </div>
                                    <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">IO No.: <span style="background-color: blueviolet; color: white;border-radius: 2px;padding: 2px"> 2023 </span></label>
                                      <input 
                                        type="text"
                                        class="form-control"
                                        id="iono"
                                        value="<?php echo $rows['iono']; ?>"
                                        placeholder=""
                                        name="iono"
                                        aria-label="Product barcode" />
                                    </div>

                                    <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">Design Id</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      id="design_id"
                                      value="<?php echo $rows['design_id']; ?>"
                                      placeholder=""
                                      name="design_id"
                                      aria-label="Product barcode" />
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                        <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">Fabric Code</label>
                                      <input
                                        type="text"
                                        value="<?php echo $rows['fabric_code']; ?>"
                                        class="form-control"
                                        id="fabric_code"
                                        placeholder=""
                                        name="fabric_code"
                                        aria-label="Product barcode" />
                                      </div>
                        <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">Style Code</label>
                                      <input
                                        type="text"
                                        class="form-control"
                                        value="<?php echo $rows['style_code']; ?>"
                                        id="style_code"
                                        placeholder=""
                                        name="style_code"
                                        aria-label="Product barcode" />
                                      </div>
                        <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">Order Number</label>
                                      <input
                                        type="text"
                                        class="form-control"
                                        id="order_no"
                                        value="<?php echo $rows['order_no']; ?>"
                                        placeholder=""
                                        name="order_no"
                                        aria-label="Product barcode" />
                                      </div>
                                        <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">SBT Reference No</label>
                                      <input
                                        type="text"
                                        class="form-control"
                                        value="<?php echo $rows['ref_no']; ?>"
                                        id="ref_no"
                                        placeholder=""
                                        name="ref_no"
                                        aria-label="Product barcode" />
                                    </div>
                                    <div class="col">
                              <label class="form-label" for="formtabs-country">Season</label>
                              <select name="season" id="season" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM season order by season asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$rows['season']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['season'];?></option>
                    <?php } ?>
                                
                              </select>
                            </div>     
                        
                                  </div>
                                  <div class="row mb-3">
                         <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">Order Qty <span style="background-color: green; color: white;border-radius: 2px;padding: 2px"> Kgs. </span></label>
                                      <input
                                        type="text"
                                        class="form-control"
                                        id="ord_qty"
                                        value="<?php echo $rows['ord_qty']; ?>"
                                        placeholder=""
                                        name="ord_qty"
                                        aria-label="Product barcode" />
                                    </div>

                                    <div class="col">
                            <label class="form-label" for="ecommerce-product-barcode">GSM</label>
                            <select name="gsm" id="gsm" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
								<?php 
					$sql = "SELECT * FROM gsm order by gsm asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['gsm']==$rows['gsm']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['gsm'];?></option>
                    <?php } ?>
                                
                              </select>
                            
                          </div>
                                    <div class="col">
                            <label class="form-label" for="ecommerce-product-barcode">Dia</label>
                            <input
                              type="text"
                              class="form-control"
                              id="dia"
                              placeholder=""
                              name="dia"
                              value="<?php echo $rows['dia']; ?>"
                              aria-label="Product barcode" />
                          </div>
                        
                        <div class="col">
                                      <label class="form-label" for="ecommerce-product-barcode">Total Meter</label>
                                      <input
                                        type="text"
                                        class="form-control"
                                        id="tot_mtr"
                                        value="<?php echo $rows['tot_mtr']; ?>"
                                        placeholder=""
                                        name="tot_mtr"
                                        aria-label="Product barcode" />
                                    </div>
                                    <div class="col">
                            <label class="form-label" for="ecommerce-product-barcode">Meter/Kg</label>
                            <input
                              type="text"
                              class="form-control"
                              id="mtrperkg"
                              placeholder=""
                              name="mtrperkg"
                              value="<?php echo $rows['mtrperkg']; ?>"
                              aria-label="Product barcode" />
                          </div>
                                  </div>
                                      <div class="row mb-3">
                                      <div class="col">
                              <label class="form-label" for="formtabs-country">Buyer Name</label>
                              <select name="buyer_name" id="buyer_name" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
										<?php 
					$sql = "SELECT * FROM party order by partyname asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw['id']==$rows['buyer_name']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
					<?php } ?>
                                
                              </select>
                            </div>
                            <div class="col">
                              <label class="form-label" for="formtabs-country">Exporter Name</label>
                              <select name="exporter_name" id="exporter_name" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                              		<?php 
					$sql = "SELECT * FROM party order by partyname asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw['id']==$rows['exporter_name']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['partyname'];?></option>
					<?php } ?>
                                
                              </select>
                            </div>
                            <div class="col">
                              <label class="form-label" for="formtabs-country">Merchandiser</label>
                              <select name="merch" id="merch" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                          		<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw['id']==$rows['merch']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
					<?php } ?>
                              </select>
                            </div>
                            <div class="col">
                              <label class="form-label" for="formtabs-country">Currency</label>
                              <select name="currency" id="currency" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                       		<?php 
					$sql = "SELECT * FROM currency order by currency asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw['id']==$rows['currency']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['currency'];?></option>
					<?php } ?>
                                
                              </select>
                            </div>
                            <div class="col">
                          <label class="form-label" for="ecommerce-product-barcode">Brand</label>
                            <select name="brand" id="brand" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                		<?php 
					$sql = "SELECT * FROM brand order by brand asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw['id']==$rows['brand']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['brand'];?></option>
					<?php } ?>
                              </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                                    <label for="bs-datepicker-format" class="form-label">Entry Date</label>
                                    <input name="entry_date" type="date" value="<?php echo $rows['entry_date']; ?>" id="entry_date" placeholder="DD/MM/YYYY" class="form-control" />
                                  </div><div class="col">
                                    <label for="bs-datepicker-format" class="form-label">Order Date</label>
                                    <input name="order_date" type="date" id="order_date" value="<?php echo $rows['ord_date']; ?>" placeholder="DD/MM/YYYY" class="form-control" />
                                  </div><div class="col">
                                    <label for="bs-datepicker-format" class="form-label">Actual Delivery Date</label>
                                    <input name="act_del_date" type="date" id="act_del_date" value="<?php echo $rows['act_del_date']; ?>" placeholder="DD/MM/YYYY" class="form-control" />
                                  </div><div class="col">
                                    <label for="bs-datepicker-format" class="form-label">Fact Delivery Date</label>
                                    <input name="fact_del_date" type="date" id="fact_del_date" value="<?php echo $rows['fact_del_date']; ?>" placeholder="DD/MM/YYYY" class="form-control" />
                                  </div><div class="col">
                                    <label for="bs-datepicker-format" class="form-label">Total Days</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="tot_days"
                                        value="<?php echo $rows['tot_days']; ?>"
                                        placeholder=""
                                        name="tot_days"
                                        aria-label="Product barcode" />
                                  </div>
                                   </div>
                                     
                                        <div class="table-responsive" >
                                 
                                         <div class="col-12 d-flex justify-content-between">
                                          <button class="btn btn-label-secondary btn-prev">
                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                          </button>
                                       
                                         	<div class="step" data-target="#timeaction">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Next</span>
							  <i class="ti ti-arrow-right me-sm-1 me-0"></i>
                          </span>
                        </button>
                      </div>
                                        </div>
                                   </div> </div>
                             
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                          <div class="table-responsive">
                            <table class="table table-border border-top">
                              <thead class="border-bottom">
                                <tr>
                                  <th >#</th>
                                  <th>Fabric&nbsp;Name</th>
                                  <th>Fabric&nbsp;Stru</th>
                                  <th>Color</th> 
                                  <th>C.Weight</th>
                                  <th>Aop&nbsp;Colour</th>
                                  <th>Count</th>
                                  <th>FGsm</th>
                                  <th>FDia</th> 
                                  <th>KGsm</th>
                                  <th>GG</th>
                                  <th>LL</th>
                                  <th>KDia</th>
                                 <th>Mtr/Kg</th>
                                 <th>Excess&nbsp;%</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
							  $sno=1;
							  $i=0;
                              $sql1 = " SELECT * FROM order_fabric where cid='$sid'";
                              $result1 = mysqli_query($conn, $sql1);
                              while ($rw = mysqli_fetch_array($result1)) {
                                  ?>
       <input type="text" hidden name="fid[]" id="fid<?php echo $i;?>" value="<?php echo $rw['id'];?>"> 
                            <td align="center" style="padding: 0.3rem;">
         <?php echo $sno;?>
          </td>
          <td  style="padding: 0.3rem;">
                      <select class="form-select" id="fabric" name="fabric[]">
					     		<?php 
					$sql = "SELECT * FROM fabric order by fabric asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw1['id']==$rw['fabric']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['fabric'];?></option>
					<?php } ?>
					</select>
                      </td>
                              <td style="padding: 0.3rem">
            <input
                               type="text"
                               class="form-control"
                               id="structure"
                               name="structure[]"
                               value="<?php echo $rw['structure']; ?>"
                               />
           </td>
           <td style="padding: 0.3rem">
					<select class="form-select" id="color" name="color[]">
          <option value="">Select</options>

					     		<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw1['id']==$rw['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
					<?php } ?>
					</select>
    
                      </td>
              <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="weight"
                                  name="weight[]"
                                  value="<?php echo $rw['weight']; ?>"
                                />
              </td>
              <td style="padding: 0.3rem">
					<select class="form-select" id="aop" name="aop[]">
          <option value="">Select</options>

					     		<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw1['id']==$rw['color']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
					<?php } ?>
					</select>
    
                      </td>
                      <td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="count"
                                  name="count[]"
                                  value="<?php echo $rw['count']; ?>"
                                  />
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="fgsm"
                                  name="fgsm[]"
                                  value="<?php echo $rw['fgsm']; ?>"
                                  />
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="fdia"
                                  name="fdia[]"
                                  value="<?php echo $rw['fdia']; ?>"
								  />
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="kgsm"
                                  name="kgsm[]"
                                  value="<?php echo $rw['kgsm']; ?>"
                                 />
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="gg"
                                  name="gg[]"
                                  value="<?php echo $rw['gg']; ?>"
                                  />
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="ll"
                                  name="ll[]"
                                  value="<?php echo $rw['ll']; ?>"
                                  />
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="kdia"
                                  name="kdia[]"
                                  value="<?php echo $rw['kdia']; ?>"
                                 />
              </td><td style="padding: 0.3rem">
               <input
                                  type="text"
                                  class="form-control"
                                  id="mtr"
                                  name="mtr[]"
                                  value="<?php echo $rw['mtr']; ?>"
                                 />
              </td>
           
              <td  style="padding: 0.3rem"> 
			  <button
			  onclick="get_excess_details(fid<?php echo $i;?>.value);"
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#largeModal">
                Details
              </button></td>  
                              </tr>
             
                                    <?php
									$sno++;
									$i++;
    }
	$j=$i;
	$ssno=$sno;
    ?>
	
	 <?php
	 
            for ($i = $j, $sno = $ssno; $i < $j+1; $i++, $sno++) {
                                ?>
		<input type="text" hidden name="fid[]" id="fid" value=""> 
                                     <tr>
                                       <td align="center" style="padding: 0.3rem;">
                    <?php echo $sno;?>
                     </td>
                                        <td  style="padding: 0.3rem;">
                       <select class="form-select" id="fabric" name="fabric[]"/>
					   <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM fabric order by fabric asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
					<?php } ?>
					</select>
                      </td>
                                         <td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="structure"
                                          placeholder="Structure"
                                          name="structure[]"/>
                      </td>
                      <td style="padding: 0.3rem">
                       <select class="form-select" id="color" name="color[]"/>
					     <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
					<?php } ?>
					</select>
                             </td>
                             <td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="weight"
                                                 placeholder="Weight"
                                                 name="weight[]"/>
 
                             </td><td style="padding: 0.3rem">
                             <select class="form-select" id="aop" name="aop[]"/>
							   <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
					<?php } ?>
					</select>
 
                             </td><td style="padding: 0.3rem">
                  <select class="form-select" id="count" name="count[]"/>
				    <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM product_count order by product_count asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['product_count'];?></option>
					<?php } ?>
					</select>
 
                             </td><td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="fgsm"
                                                 placeholder="fgsm"
                                                 name="fgsm[]"/>
 
                             </td><td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="fdia"
                                                 placeholder="fdia"
                                                 name="fdia[]"/>
 
                             </td><td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="kgsm"
                                                 placeholder="kgsm"
                                                 name="kgsm[]"/>
 
                             </td><td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="gg"
                                                 placeholder="gg"
                                                 name="gg[]"/>
 
                             </td><td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="ll"
                                                 placeholder="ll"
                                                 name="ll[]"/>
 
                             </td><td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="kdia"
                                                 placeholder="kdia"
                                                 name="kdia[]"/>
 
                             </td><td style="padding: 0.3rem">
                              <input
                                                 type="text"
                                                 class="form-control"
                                                 id="mtr<?php echo $i;?>"
                                                 placeholder="mtr"
                                                 name="mtr[]"
												onKeyDown="ee1(this.id);"/>
 
                             </td>
                          
 
 
                             <td  style="padding: 0.3rem"></td>  
                                             </tr>
                                           <?php
                              }
							  
						$j=$i;
	$ssno=$sno;
							  
                              for ($i = $j, $sno = $ssno; $i < 21; $i++, $sno++)
								  {
							
                                ?>
								
	<input type="text" hidden name="fid[]" id="fid" value=""> 
                                      <tr id="s1<?php echo $i; ?>" style="display:none;">
                                        <td align="center" style="padding: 0.3rem;">
                        <?php echo $sno;?>
                      </td>
                                        <td  style="padding: 0.3rem;">
                      <select class="form-select" id="fabric" name="fabric[]"/>
					    <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM fabric order by fabric asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['fabric'];?></option>
					<?php } ?>
					</select>
                      </td>
                                         <td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="structure"
                                          placeholder="Structure"
                                          name="structure[]"/>
    
                      </td><td style="padding: 0.3rem">
					<select class="form-select" id="color" name="color[]"/>
					  <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
					<?php } ?>
					</select>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="weight"
                                          placeholder="Weight"
                                          name="weight[]"
    
                      </td><td style="padding: 0.3rem">
                      <select class="form-select" id="aop" name="aop[]"/>
					    <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM color order by color asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
					<?php } ?>
					</select>
    
                      </td><td style="padding: 0.3rem">
                     <select class="form-select" id="count" name="count[]"/>
					   <option value="">Select</option>
					     		<?php 
					$sql = "SELECT * FROM product_count order by product_count asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['product_count'];?></option>
					<?php } ?>
					</select>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="fgsm"
                                          placeholder="fgsm"
                                          name="fgsm[]"/>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="fdia"
                                          placeholder="fdia"
                                          name="fdia[]"/>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="kgsm"
                                          placeholder="kgsm"
                                          name="kgsm[]"/>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="gg"
                                          placeholder="gg"
                                          name="gg[]"/>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="ll"
                                          placeholder="ll"
                                          name="ll[]"/>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="kdia"
                                          placeholder="kdia"
                                          name="kdia[]"/>
    
                      </td><td style="padding: 0.3rem">
                       <input
                                          type="text"
                                          class="form-control"
                                          id="mtr<?php echo $i;?>"
                                          placeholder="mtr"
                                          name="mtr[]"
										 onKeyDown="ee1(this.id);"/>
    
                      </td>
                    
                      <td  style="padding: 0.3rem"></td>  
					  
                                      </tr>
                                      <?php
                              }
                              ?>                              
                     
    </tbody>
                              </table>
                              </div>

                          <br><div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                          
                              <button class="btn btn-primary" name="submit">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Update</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                        </div>
                      

                     
                          <div id="timeaction" class="content">
                    
                    <div class="table-responsive">
                      <table class="table table-border border-top">
                        <thead class="border-bottom">
                          <tr>
                            <th style="width:2%;">#</th>
                            <th style="width:20%;">Operation</th>
                            <th style="width:10%;">Days</th>
                            <th style="width:10%;">Start Date</th>
                            <th style="width:10%;">End Date</th>
                            <th style="width:40%;">Responsible</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php
												$sno=1;
                                               $wz = "SELECT * FROM order_ta where cid='$sid'";
                                                $wz1 = mysqli_query($conn, $wz);
                                                while ($wzq = mysqli_fetch_array($wz1)) {
                                                    ?>
                    <input type="text" hidden name="tid[]" id="tid" value="<?php echo $wzq['id'];?>"> 
                   <tr>
                                   <td align="center" style="padding: 0.3rem;">
                   <?php echo $sno;?>
                   </td>
                   <td style="padding: 0.3rem">
                 <select id="operation" name="operation[]" class="select2 form-select" >
                 <option value="">Select Name</option>

                         	<?php 
					$sql = "SELECT * FROM process where process_group='0' order by process asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw1['id']==$wzq['operation']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['process'];?>
						 </option>
					<?php } ?>
                           </select>
               </td>
                             <td style="padding: 0.3rem">
                               <input
                                         type="number"
                                         class="form-control"
                                         id="operation_days"
                                         value="<?php echo $wzq['operation_days']; ?>"
                                        
                                         name="operation_days[]"
                                               onKeyDown="ee2(this.id);"
                                               aria-label="Product barcode"/>
                                     </td>
                                   <td style="padding: 0.3rem">
                                     <input type="date" id="st_date" name="st_date[]" value="<?php echo $wzq['st_date']; ?>" placeholder="DD/MM/YYYY" class="form-control" />
                                     </td><td style="padding: 0.3rem">
                                       <input type="date" id="end_date" name="end_date[]" value="<?php echo $wzq['end_date']; ?>" placeholder="DD/MM/YYYY" class="form-control" />
                                       </td>
                                       <td>
                       <div class="select2-dark">
                         <select id="responsible" name="responsible[]" class="select2 form-select" >
                           <option value="">Select Name</option>
                         	<?php 
					$sql = "SELECT * FROM staff order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                         <option <?php if($rw1['id']==$wzq['responsible']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
					<?php } ?>
                           </select>
						   </div>
                       </td>
                                         </tr>
                    
                   <?php
				   $sno++;
                    }
					?>
                            </tbody>
                          </table>
                            <div class="col-12 d-flex justify-content-between">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                        
                             	<div class="step" data-target="#fabric_process">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">4</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Next</span>
							  <i class="ti ti-arrow-right me-sm-1 me-0"></i>
                          </span>
                        </button>
                      </div>
                            </div>
                        </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
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
                              <div class="table-responsive" id="excess_details">
                      


								</div>
                            </div>
                          </div>
                        </div>
                      </div>
         
					 </div>
            <!-- / Content -->
            <!-- Footer -->
           <?php include "footer.php"; ?>
            <!-- / Footer -->
            <div class="content-backdrop fade">
              
            </div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../assets/vendor/libs/select2/select2.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
<script src="../assets/vendor/libs/dropzone/dropzone.js"></script>
    <!-- Main JS -->
    <!-- Page JS -->
    <script src="../assets/js/forms-file-upload.js"></script>
    <!-- Page JS -->
    <script src="../assets/js/form-wizard-numbered.js"></script>
    <script src="../assets/js/form-wizard-validation.js"></script>
  </body>
</html>
<?php
if (isset($_POST['submit2'])) {
  
    if ($result) {
       // echo "<script>alert('Fabric Updated successfully');window.location='order_start.php';</script>";
    } else {
        echo '<script>alert("Something Wrong, data not stored")</script>';
    }
}
?> 
<?php
if (isset($_POST['submit'])) {
    
    $cid = $_POST['cid'];
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
    $tot_mtr = $_POST['tot_mtr'];
    $buyer_name = $_POST['buyer_name'];
    $exporter_name = $_POST['exporter_name'];
    $merch = $_POST['merch'];
    $currency = $_POST['currency'];
    $brand = $_POST['brand'];
    $entry_date = $_POST['entry_date'];
    $order_date = $_POST['order_date'];
    $act_del_date = $_POST['act_del_date'];
    $fact_del_date = $_POST['fact_del_date'];
    $tot_days = $_POST['tot_days'];
    if ($order_type != '') {
       $sql = "UPDATE order_details SET form_no='$form_no',order_type='$order_type',order_for='$order_for',iono='$iono',gsm='$gsm',design_id='$design_id',fabric_code='$fabric_code',style_code='$style_code',order_no='$order_no',ref_no='$ref_no',season='$season',ord_qty='$ord_qty',dia='$dia',mtrperkg='$mtrperkg',tot_mtr='$tot_mtr',buyer_name='$buyer_name',exporter_name='$exporter_name',merch='$merch',currency='$currency',brand='$brand',entry_date='$entry_date',ord_date='$order_date',act_del_date='$act_del_date',fact_del_date='$fact_del_date',tot_days='$tot_days',created_by='$user_id' WHERE id='$cid'"; 
        $result = mysqli_query($conn, $sql);
    }
	
	
	 foreach($_POST['operation'] as $key => $val) 
	 {

        $tid = $_POST['tid'][$key];
        $operation = $_POST['operation'][$key];
        $operation_days = $_POST['operation_days'][$key];
        $st_date = $_POST['st_date'][$key];
        $end_date = $_POST['end_date'][$key];
        $responsible = $_POST['responsible'][$key];
        if ($operation!='')
			{
           $sql1 = "UPDATE order_ta set operation='$operation',operation_days='$operation_days',st_date='$st_date',end_date='$end_date',responsible='$responsible' WHERE id='$tid'";
            $result1 = mysqli_query($conn, $sql1);
        }
    }
	
	
	  foreach ($_POST['fabric'] as $key => $val) {
      
        $fid = $_POST['fid'][$key];
        $fabric = $_POST['fabric'][$key];
        $structure = $_POST['structure'][$key];
        $color = $_POST['color'][$key];
        $weight = $_POST['weight'][$key];
        $aop = $_POST['aop'][$key];
        $count = $_POST['count'][$key];
        $fgsm = $_POST['fgsm'][$key];
        $fdia = $_POST['fdia'][$key];
        $kgsm = $_POST['kgsm'][$key];
        $gg = $_POST['gg'][$key];
        $ll = $_POST['ll'][$key];
        $kdia = $_POST['kdia'][$key];
        $mtr = $_POST['mtr'][$key];
        if ($fabric != '') {
		if($fid!='')
		{			
     $sql2 = "UPDATE order_fabric SET fabric='$fabric',structure='$structure',color='$color',weight='$weight',aop='$aop',count='$count',fgsm='$fgsm',fdia='$fdia',kgsm='$kgsm',gg='$gg',ll='$ll',kdia='$kdia',mtr='$mtr' WHERE id='$fid'"; 
            $result2 = mysqli_query($conn, $sql2);
		}
		else
		{
	  $sql3 = "INSERT into order_fabric (cid,fabric,structure,color,weight,aop,count,fgsm,fdia,kgsm,gg,ll,kdia,mtr) 
 values ('$cid','$fabric','$structure','$color','$weight','$aop','$count','$fgsm','$fdia','$kgsm','$gg','$ll','$kdia','$mtr')";
      $result3 = mysqli_query($conn, $sql3);
			
		}
        }
    }
	
    if ($result) {
       echo "<script>alert('Data Registered successfully');window.location='order_start.php';</script>";
    } else {
        echo '<script>alert("Something Wrong, data not stored")</script>';
    }
}
?> 
<
<?php
include "config.php";
if (isset($_POST["submit1"])) {
    $p1 = $_FILES['loi']['name'];
    $p_tmp1 = $_FILES['loi']['tmp_name'];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);
    $p1 = $_FILES["loi"]["size"];
    $p_tmp1 = $_FILES['loi']['tmp_name'];
    $p2 = $_FILES['email']['name'];
    $p_tmp2 = $_FILES['email']['tmp_name'];
    $path = "uploads/$p2";
    $move = move_uploaded_file($p_tmp2, $path);
    $p2 = $_FILES["email"]["size"];
    $p_tmp2 = $_FILES['email']['tmp_name'];
    $p3 = $_FILES['doc1']['name'];
    $p_tmp3 = $_FILES['doc1']['tmp_name'];
    $path = "uploads/$p3";
    $move = move_uploaded_file($p_tmp3, $path);
    $p3 = $_FILES["doc1"]["size"];
    $p_tmp3 = $_FILES['doc1']['tmp_name'];
    $p4 = $_FILES['doc2']['name'];
    $p_tmp4 = $_FILES['doc2']['tmp_name'];
    $path = "uploads/$p4";
    $move = move_uploaded_file($p_tmp4, $path);
    $p4 = $_FILES["doc2"]["size"];
    $p_tmp4 = $_FILES['doc2']['tmp_name'];
    //image size should be in 150kb
    if ($p_tmp1 <= 150000) {
        //do upload part
    } else {
        //wrong image type
    }
    $sql = "insert into order_document (loi,email,doc1,doc2) values('$p1','$p2','$p3','$p4')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Image Uploaded successfully")</script>';
    } else {
        echo '<script>alert("Something data wrong")</script>';
    }
}
?>
