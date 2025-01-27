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
        <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
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
                      <div class="step" data-target="#ordersum">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Order Details</span>
                            <span class="bs-stepper-subtitle">Color & Cuff Details</span>
                          </span>
                        </button>
                      </div><div class="line">
                        <i class="ti ti-chevron-right"></i>
                      </div>
                      <div class="step" data-target="#timeaction">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">4</span>
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
                           <?php
                        // LOOP TILL END OF DATA
                        $sql = "SELECT * FROM order_document where cid='$sid'";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_fetch_array($result);
                            ?>
                          <div class="row g-3">
                              
                          <div class="col-sm-6">
                             <input type="text" hidden name="tid" id="tid" value="<?php echo $rows['id']; ?>"
                             <label for="formFile" class="form-label">Doc-1</label>
                             <input class="form-control" type="file" id="file1" name="doc1" 
       accept="image/jpeg,image/png,application/pdf">
       <a href="uploads/<?php echo $rows['doc1'];?>" target="blank"><?php echo $rows['doc1'];?></a>                       
                                 </div>
                                
                                 <div class="col-sm-6">
                                  
                             <label for="formFile" class="form-label">Doc-2</label>
                             <input class="form-control" type="file" id="file2" name="doc2" 
       accept="image/jpeg,image/png,application/pdf"> 
       <a href="uploads/<?php echo $rows['doc2'];?>" target="blank"><?php echo $rows['doc2'];?></a>                       
                                 </div>
                                 <div class="col-sm-6">
                                  
                             <label for="formFile" class="form-label">Doc-3</label>
                             <input class="form-control" type="file" id="file3" name="doc3" 
       accept="image/jpeg,image/png,application/pdf">    
       <a href="uploads/<?php echo $rows['doc3'];?>" target="blank"><?php echo $rows['doc3'];?></a>                    
                                 </div>
                                  <div class="col-sm-6">
                                  
                             <label for="formFile" class="form-label">Doc-4</label>
                             <input class="form-control" type="file" id="file4" name="doc4" 
       accept="image/jpeg,image/png,application/pdf">  
       <a href="uploads/<?php echo $rows['doc4'];?>" target="blank"><?php echo $rows['doc4'];?></a>                      
                                 </div>
                         
                          </div>
                        </div>
                        <!-- Personal Info -->
                        <div id="personal-info" class="content">
                        <div class="row mb-3">
                              
                        <?php
                        // LOOP TILL END OF DATA
                        $sql = " SELECT * FROM order_details where id='$sid'";
                        $result = mysqli_query($conn, $sql);
                       $rows = mysqli_fetch_array($result);
                            ?>
                               <input type="text" hidden name="cid" id="cid" value="<?php echo $rows['id'];?>">
                              <div class="col">
                               <label class="form-label" for="ecommerce-product-barcode">#</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="form_no"
                                 placeholder=""
                                 readonly
                                 name="form_no"
                               value="<?php echo $rows['form_no'];?>"
                                 aria-label="Product barcode" />
                              </div>
                                 <div class="col">
                                 <label class="form-label" for="formtabs-country">Order Type</label>
                                 <select name="order_type" id="order_type" class="select2 form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                                <option value="Process Order" <?php if($rows['order_type']=='Process Order'){ ?>Selected<?php } ?> >Process Order </option>
                                <option value="Sample Order" <?php if($rows['order_type']=='Sample Order'){ ?>Selected<?php } ?> >Sample Order</option>  
                                 </select>
                               </div>
                                    
                             <div class="col">
                                 <label class="form-label" for="formtabs-country">Yarn/Fabric</label>
                                 <select name="order_for" id="order_for" class="select2 form-select" data-allow-clear="true">
                                 <option value="">Select</option>
                                <option value="Yarns" <?php if($rows['order_for']=='Yarns'){ ?>Selected<?php } ?> >Yarns </option>
                                <option value="Fabrics" <?php if($rows['order_for']=='Fabrics'){ ?>Selected<?php } ?> >Fabrics</option>
                                 </select>
                               </div>

                             <div class="col">
                               <label class="form-label" for="ecommerce-product-barcode">IO No.: <span style="background-color: blueviolet; color: white;border-radius: 2px;padding: 2px"> 2023 </span></label>
                               <input 
                                 type="text"
                                 class="form-control"
                                 id="productBarcode"
                                 placeholder=""
                                 value="<?php echo $rows['iono']; ?>"
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
                                 class="form-control"
                                 id="fabric_code"
                                 value="<?php echo $rows['fabric_code']; ?>"
                                 placeholder=""
                                 name="fabric_code"
                                 aria-label="Product barcode" />
                               </div>
                 <div class="col">
                               <label class="form-label" for="ecommerce-product-barcode">Style Code</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="style_code"
                                 value="<?php echo $rows['style_code']; ?>"
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
                                 id="ref_no"
                                 value="<?php echo $rows['ref_no']; ?>"
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
                  <div class="col" >
                               <label class="form-label" for="ecommerce-product-barcode">Order Qty <span style="background-color: green; color: white;border-radius: 2px;padding: 2px"> Kgs/Mtrs </span></label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="ord_qty"
                                 placeholder=""
                                 value="<?php echo $rows['ord_qty']; ?>"
                                 name="ord_qty"
                                 aria-label="Product barcode" />
                                 
                               
                             </div>
                 
                  <div class="col">
                               <label class="form-label" for="ecommerce-product-barcode">Unit</label>
                               <select name="unit" id="unit" class="select2 form-select" data-allow-clear="true">
                                   <option value="">Select</option>
                   
                                <option value="Kgs" <?php if($rows['unit']=='Kgs'){ ?>Selected<?php } ?> >Kgs </option>
                                <option value="Mtrs" <?php if($rows['unit']=='Mtrs'){ ?>Selected<?php } ?> >Mtrs</option>
                                 </select>
                               
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
                         <option <?php if($rw['id']==$rows['gsm']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['gsm'];?></option>
					<?php } ?>
                              </select>
                             </div>
                 <div class="col">
                               <label class="form-label" for="ecommerce-product-barcode">Dia</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="dia"
                                 value="<?php echo $rows['dia']; ?>"
                                 placeholder=""
                                 name="dia"
                                 aria-label="Product barcode" />
                             </div>
            
                   <div class="col">
                               <label class="form-label" for="ecommerce-product-barcode">Meter/Kg</label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="mtrperkg"
                                 placeholder=""
                                 value="<?php echo $rows['mtrperkg']; ?>"
                                 name="mtrperkg"
                                 aria-label="Product barcode" />
                             </div>
                 
                 
                 
                 <div class="col">
                               <label class="form-label" for="ecommerce-product-barcode">Gray Qty </label>
                               <input
                                 type="text"
                                 class="form-control"
                                 id="gray_qty"
                                 placeholder=""
                                 value="<?php echo $rows['gray_qty']; ?>"
                                 name="gray_qty" />
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
                             <input name="entry_date" type="date" id="entry_date" placeholder="DD/MM/YYYY" class="form-control" value="<?php echo $rows['entry_date']; ?>" />
                           </div><div class="col">
                             <label for="bs-datepicker-format" class="form-label">Order Date</label>
                             <input name="ord_date" type="date" id="ord_date" placeholder="DD/MM/YYYY" class="form-control" value="<?php echo $rows['ord_date']; ?>"/>
                           </div><div class="col">
                             <label for="bs-datepicker-format" class="form-label">Actual Delivery Date</label>
                             <input name="act_del_date" type="date" id="act_del_date" placeholder="DD/MM/YYYY" class="form-control" value="<?php echo $rows['act_del_date']; ?>"/>
                           </div><div class="col">
                             <label for="bs-datepicker-format" class="form-label">Fact Delivery Date</label>
                             <input name="fact_del_date" type="date" id="fact_del_date" placeholder="DD/MM/YYYY" class="form-control" value="<?php echo $rows['fact_del_date']; ?>"/>
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
                       </div> 
                
                        <!-- Social Links -->
                        <div id="ordersum" class="content">
                        <div class="col-md-12 mb-4 mt-4">
                      <div class="divider">
                        <div class="divider-text"><strong>Color and Cuff Details</strong></div>
                      </div>
                </div>


               <div class="row mb-3">
                 <div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Style Code</label>
                             <input name="stylecode"  value="<?php echo $rows['stylecode']; ?>" type="text" id="stylecode"  class="form-control"  />
                           </div>
                <div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Design ID</label>
                             <input name="designid" type="text"  value="<?php echo $rows['designid']; ?>" id="designid"  class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Color Name</label>
                             <input name="cname" type="text"  value="<?php echo $rows['cname']; ?>" id="cname"  class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">TTL Dema</label>
                             <input name="ttl" type="text" id="ttl"  value="<?php echo $rows['ttl']; ?>" class="form-control" />
                           </div><div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Count</label>
                             <input
                                 type="text"
                                 class="form-control"
                                 id="count"
                                 placeholder=""
                                 value="<?php echo $rows['count']; ?>"
                                 name="count"
                                 aria-label="Product barcode" />
                           </div>
                            
                 <div class="col-md-2">
                             <label for="bs-datepicker-format" class="form-label">Blend</label>
                             <input name="blend" type="text"  value="<?php echo $rows['blend']; ?>" id="blend"  class="form-control"  />
                           </div>
						   
						   </div>
						   
						   <div class="row mb-3">
						   
						      <div class="col-md-4">
                             <label for="bs-datepicker-format" class="form-label">Size Group</label>
                             <select name="sizegrp" id="sizegrp" class="select form-select"  data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM sizegroup  order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$rows['sizegrp']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['sizegrp'];?></option>
                    <?php } ?>
                                
                              </select>
                           </div>
                           
                           </div>
                          <div class="table-responsive col-6">
                            <table class="table table-border border-top">
                            <thead class="border-bottom">
                            <tr>
                                  <th>#</th>
                                  <th>size</th>
                                  <th>quantity</th>
                                  
                                  
                                </tr>
                              </thead>
                              <tbody>

                              <?php
                              $sno=1;
							                $sql = "SELECT * FROM order_stylecode";
                              $result = mysqli_query($conn, $sql);
                              while($rw1 = mysqli_fetch_array($result))
                    { ?>
                           
       <input type="text" hidden name="fid[]" id="fid<?php echo $i;?>" value="<?php echo $rw1['id'];?>"> 
                                     <tr>
                                     <td  style="padding: 0.3rem;">
                              <?php echo $sno;?>
                </td>
                <td  style="padding: 0.3rem;width:300px;">
                <select name="size[]" id="size" class="select form-select"  data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM size order by size asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$rw1['size']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['size'];?></option>
                    <?php } ?>
                                
                              </select>
                      </td>
                                         <td style="padding: 0.3rem">
                       <input style="width:300px"
                                          type="text"
                                          class="form-control"
                                          id="qty"
                                          value="<?php echo $rw1['qty']; ?>"
                                          name="qty[]"/>
                      </td>
                      
                      
                                             </tr>
                                             <?php
									$sno++;
          }
                                    ?>
                                                                
                     
                              </tbody>
                            </table>
                          </div><br>
                          
                          
                          </div>
                        
                         
                        <div id="timeaction" class="content">
                       
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
                            <?php
												$sno=1;
                                               $wz = "SELECT * FROM order_ta where cid='$sid'";
                                                $wz1 = mysqli_query($conn, $wz);
                                                while ($wzq = mysqli_fetch_array($wz1)) {
                                                    ?>
                            <input type="text" name="rid[]" id="rid" hidden value="<?php echo $wzq['id'];?>">
                                 <tr >
                             
                              <td  style="padding: 0.3rem;" align="center">
                            <?php echo $sno;?>
                                   </td>
                                 <td style="padding: 0.3rem">
                                 <select id="operation" name="operation[]" class="select form-select" >
                 <option value="">Select Name</option>

                         	<?php 
					$sql = "SELECT * FROM process order by process asc";
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
                                    id="days<?php echo $i;?>"
                                    placeholder="9"
                                    name="days[]"
                                    value="<?php echo $wzq['days']; ?>"
                                    
                                    aria-label="Product barcode"/>
                                       
                          </td>
                        <td style="padding: 0.3rem">
                          <input type="date" id="st_date" name="st_date[]"  value="<?php echo $wzq['st_date']; ?>" placeholder="DD/MM/YYYY" class="form-control" />
                          </td><td style="padding: 0.3rem">
                            <input type="date" id="end_date" name="end_date[]"  value="<?php echo $wzq['end_date']; ?>" placeholder="DD/MM/YYYY" class="form-control" />
                            </td>
                        
                        <td>
                        
                            <select id="responsible" name="responsible[]" class="select form-select" >
                                   <option value="">Select</option>
                                <option value="Murugan" <?php if($wzq['responsible']=='Murugan'){ ?>Selected<?php } ?> >Murugan </option>
                                <option value="Dinesh" <?php if($wzq['responsible']=='Dinesh'){ ?>Selected<?php } ?> >Dinesh</option>
                                <option value="Rachel" <?php if($wzq['responsible']=='Rachel'){ ?>Selected<?php } ?> >Rachel</option>
                                <option value="Riya" <?php if($wzq['responsible']=='Riya'){ ?>Selected<?php } ?> >Riya</option>
                                <option value="Oreos" <?php if($wzq['responsible']=='Oreos'){ ?>Selected<?php } ?> >Oreos</option>
                            </select>
                          </td> 
                              </tr>
                              <?php
				   $sno++;
                    }
					?>
                                </tbody>
                          </table>
                            <br>
                             </div>
                        </div>
                      </div></div>  </div>
                   
                            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="order.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Update</span>
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
</body>
</html>
<?php include "footer.php"; ?>

<?php
if (isset($_POST['submit'])) {

  $tid = $_POST['tid'];
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
  
    $gray_qty = $_POST['gray_qty'];
$stylecode = $_POST['stylecode'];
      $designid = $_POST['designid'];
      $cname = $_POST['cname'];
      $ttl = $_POST['ttl'];
      $blend = $_POST['blend'];
      $count = $_POST['count'];
      $sizegrp = $_POST['sizegrp'];

    $sql = "UPDATE order_details SET form_no='$form_no',order_type='$order_type',order_for='$order_for',iono='$iono',gsm='$gsm',design_id='$design_id',
   fabric_code='$fabric_code',style_code='$style_code',order_no='$order_no',ref_no='$ref_no',season='$season',ord_qty='$ord_qty',dia='$dia',
   mtrperkg='$mtrperkg',buyer_name='$buyer_name',exporter_name='$exporter_name',merch='$merch',currency='$currency',
   brand='$brand',entry_date='$entry_date',ord_date='$ord_date',act_del_date='$act_del_date',fact_del_date='$fact_del_date',tot_days='$tot_days',
   created_by='$user_id',unit='$unit',gray_qty='$gray_qty',stylecode='$stylecode',designid='$designid',cname='$cname',ttl='$ttl',blend='$blend',count='$count',sizegrp='$sizegrp' Where id='$cid'";
    $result = mysqli_query($conn, $sql);
  
		
    foreach ($_POST['size'] as $key => $val) {

      $fid = $_POST['fid'][$key];
      
      $size = $_POST['size'][$key];
      $qty = $_POST['qty'][$key];
     
     $sql = "UPDATE order_stylecode SET size='$size',qty='$qty' WHERE id='$fid'";
       $result = mysqli_query($conn, $sql);
      
    }
    
		foreach ($_POST['days'] as $key => $val) {

     $rid = $_POST['rid'][$key];
    $operation = $_POST['operation'][$key];
    $days = $_POST['days'][$key];
    $st_date = $_POST['st_date'][$key];
    $end_date = $_POST['end_date'][$key];
    $responsible = $_POST['responsible'][$key];

     $sql = "UPDATE order_ta SET operation='$operation',days='$days',st_date='$st_date',end_date='$end_date',responsible='$responsible' WHERE id='$rid'";
      $result = mysqli_query($conn, $sql);
    
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

  $sql = "UPDATE order_document SET doc1='$p1',doc2='$p2',doc3='$p3',doc4='$p4' where id='$tid'";
    $result = mysqli_query($conn, $sql);
	
  

  if ($result) {

 echo "<script>alert('Order Updated successfully');window.location='order.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


