<?php include "config.php"; ?>
<script>
function ee1(x)
{
//alert(x);
var a=x;
var c=(a.substr(5));
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
function ee4(x)
{
//alert(x);
var a=x;
var c=(a.substr(4));
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
function ee7(x)
{
//alert(x);
var a=x;
var c=(a.substr(3));
e=parseInt(c)+1;

document.getElementById('s7'+e).style.display='table-row';

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
var c=(a.substr(11));
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
$fg1="select max(orderno) as id from programme_entry";
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
          <div class="content-wrapper">
          <!-- Content wrapper -->


          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Programme&nbsp;Entry</button>
                      <a href="programme_entrylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View&nbsp;Entry
                          </a>
                    </div>    <br> 
            <!-- Content -->
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row mb-4">
                <!-- Browser Default -->
                <div class="col-12 mb-4 mb-md-0">
                  <div class="card">

                    <div class="card-body">
                      
                      <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">I.O&nbsp;No/Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              readonly
                              value="<?php echo $fg4; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label" for="ecommerce-product-barcode">Type</label>
                            <select name="type" id="type" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Sample">Sample </option>
                                <option value="Process">Process</option>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Buyer&nbsp;Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="buyerorder"
                              name="buyerorder"
                              required
                              class="form-control"/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Process&nbsp;Plan&nbsp;<span style="color:red;">*</span></label>
                            <select name="processplan" id="processplan" class="select2 form-select" data-allow-clear="true">
                                <option value="">Select</option>
                                <option value="Yarn">Yarn </option>
                                <option value="Dollor">Dollor</option>
                                
                              </select>
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Style&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="styleno"
                              name="styleno"
                              class="form-control"/>
                          </div>


                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Style&nbsp;Qty&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="styleqty"
                              name="styleqty"
                              class="form-control"/>
                          </div>

                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Prd.Exs.%&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="prdexs"
                              name="prdexs"
                              class="form-control"/>
                          </div>                          
                          <hr> 
                          </div>
                          </div>
                          </div>
                  </div>
                </div>
                <!-- /Browser Default -->

              
                
               
              </div>
              
              <div class="row mb-4">
                <!-- Browser Default -->
                <div class="col-md mb-4 mb-md-0">
                  <div class="card">
                  <h5 class="card-header pb-2"style="padding-bottom:3px">Yarn&nbsp;Consumption&nbsp;Details</h5>
                  <hr>
                  <div class="card-body">
                     
                     <div class="table-responsive text-nowrap">
                       
                       <table class="table">
                           <thead>
                               <tr class="text-nowrap">
                               <th>Yrn.Cnt</th>
                                 <th>Yrn.Color</th>
                                 <th>Cons.%</th>
                                 
                               </tr>
                             </thead>
                             <tbody>
                             <?php
                             for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                               ?>  
                               <tr>
                              
                               <td style="padding: 0.3rem">
               <select name="yarncount[]" id="yarncount" style="width: 17rem;" class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM product_count order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['product_count'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               <td style="padding: 0.3rem">
                <select name="yarncolor[]" id="yarncolor<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM color order by id asc";
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
                 id="cons<?php echo $i;?>"
                 name="cons[]"
                 onKeyDown="ee4(this.id);"
                 aria-label="Product barcode"/>
                 
               </td>
               
                   
               
               
              
                                 
                               </tr>
                               <?php
                             }
                             for ($i = 1, $sno = 2; $i <= 20; $i++, $sno++) {
                               ?>
                     <tr id="s4<?php echo $i; ?>" style="display:none">
                     
                     <td style="padding: 0.3rem">
               <select name="yarncount[]" id="yarncount" style="width: 17rem;" class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM product_count order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['product_count'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
               
               <td style="padding: 0.3rem">
                <select name="yarncolor[]" id="yarncolor<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM color order by id asc";
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
                 id="cons<?php echo $i;?>"
                 name="cons[]"
                 onKeyDown="ee4(this.id);"
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
                <!-- /Browser Default -->

                <!-- Bootstrap Validation -->
                <div class="col-md">
                  <div class="card">
                  <h5 class="card-header"style="padding-bottom:3px">Consumption&nbsp;Details</h5>
                  <hr>
                  <div class="card-body">
                    
                    <div class="row g-4">
                      <div class="col-md-3">
                        <label class="form-label" for="collapsible-fullname">Measurment&nbsp;</label><br>
                        <div class="form-check form-check-inline mdmt-1">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="measurment"
                        id="measurment"
                        value="With" />
                      <label class="form-check-label" for="With">With</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="measurment"
                        id="measurment"
                        value="Without" />
                      <label class="form-check-label" for="Without">Without</label>
                    </div>
                        
                      </div>


                      <div class="col-md-3">
                      <label class="form-label" for="collapsible-fullname">Fabric&nbsp;Type</label><br>
                      <div class="form-check form-check-inline mt-1">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="fabrictype"
                        id="fabrictype"
                        value="Tublar" />
                      <label class="form-check-label" for="Tublar">Tublar</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="fabrictype"
                        id="fabrictype"
                        value="Single" />
                      <label class="form-check-label" for="Single">Single</label>
                    </div>
                        </div>
                      
                      <div class="col-md-3">
                      <label class="form-label" for="collapsible-fullname">Measurment&nbsp;In&nbsp;Type</label><br>
                      <div class="form-check form-check-inline mt-1">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="measurmentintype"
                        id="measurmentintype"
                        value="Cm" />
                      <label class="form-check-label" for="Cm">Cm</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input
                        class="form-check-input"
                        type="radio"
                        name="measurmentintype"
                        id="measurmentintype"
                        value="Inches" />
                      <label class="form-check-label" for="Inches">Inches</label>
                    </div>
                        </div> 
                     
                      
                      <div class="col-md-3">
                      <label class="form-label" for="collapsible-fullname">No&nbsp;Of&nbsp;Parts</label>
                      <input
                          type="text"
                          id="noofparts"
                          name="noofparts"
                          class="form-control"
                           />
                        
                      </div>                         
                        </div>
                        </div>
<hr>
<div class="card-footer">
                    
                    <div class="table-responsive">

                        <table class="table table-border table-hover">
                        <thead class="border-bottom">
                            <tr>
                              <th>Description</th>
                              <th>Dollor</th>
                              <th>Avg</th>
                              
                              
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
              style="text-align:right"
              class="form-control"
              id="description<?php echo $i;?>"
              name="description[]"
              
              aria-label="Product barcode"/>
              
            </td>
            </td>
            <td style="padding: 0.3rem">
              <input
              type="text"
              style="text-align:right"
              class="form-control"
              id="dollor<?php echo $i;?>"
              name="dollor[]"
              
              aria-label="Product barcode"/>
              
            </td>
            
            <td style="padding: 0.3rem">
              
             <input
                                type="text"
                                style="text-align:right"
                                class="form-control"
                                id="avg<?php echo $i;?>"
                                
                                name="avg[]"
                                onKeyDown="ee7(this.id);"
                                aria-label="Product barcode"/>
                                   
            </td>
            
            
           
                              
                            </tr>
                            <?php
                          }
                          for ($i = 1, $sno = 2; $i < 21; $i++, $sno++) {
                            ?>
                  <tr id="s7<?php echo $i; ?>" style="display:none">
                  
                  <td style="padding: 0.3rem">
              <input
              type="text"
              style="text-align:right"
              class="form-control"
              id="description<?php echo $i;?>"
              name="description[]"
              
              aria-label="Product barcode"/>
              
            </td>
            <td style="padding: 0.3rem">
              <input
              type="text"
              style="text-align:right"
              class="form-control"
              id="dollor<?php echo $i;?>"
            
              name="dollor[]"
              
              aria-label="Product barcode"/>
              
            </td>
            
            <td style="padding: 0.3rem">
              
             <input
                                type="text"
                                style="text-align:right"
                                class="form-control"
                                id="avg<?php echo $i;?>"
                                
                                name="avg[]"
                                onKeyDown="ee7(this.id);"
                                aria-label="Product barcode"/>
                                   
            </td>
                            </tr>          
<?php
                          }
                          ?>           <tr>
                            <td>Cons.&nbsp;with&nbsp;&nbsp;loss%</td> 
                            <td style="padding: 0.3rem">
              <input
              type="text"
              style="text-align:right"
              class="form-control"
              id="dollorloss<?php echo $i;?>"
              name="dollorloss"
              
              aria-label="Product barcode"/>
              
            </td>
            <td style="padding: 0.3rem">
              <input
              type="text"
              style="text-align:right"
              class="form-control"
              id="avgloss<?php echo $i;?>"
              name="avgloss"
              
              aria-label="Product barcode"/>
              
            </td>     
                          </tbody>
                        </table>
                      </div>
                      </div>
                  </div>
                </div>
                
              </div>
              <div class="row mb-4">
                <!-- Browser Default -->
                <div class="col-md mb-4 mb-md-0">
                  <div class="card">
                  <h5 class="card-header pb-2"style="padding-bottom:3px">Fabric&nbsp;Details</h5>
                  <hr>
                    <div class="card-body">
                     <div id="fabric_process" class="content">
                         <div class="row g-1">
                         <div class="row  g-1">
                         <div class="col-md-5">
                         <div class="form-check form-check-inline ">
                           <input
                             class="form-check-input"
                             type="radio"
                             id="fabricradiobtn" 
                             name="fabricradiobtn"
                             value="Kintted" />
                           <label class="form-check-label" for="knitted">Knitted</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input
                             class="form-check-input"
                             type="radio"
                             id="fabricradiobtn" 
                             name="fabricradiobtn"
                             value="Woven" />
                           <label class="form-check-label" for="woven">Woven</label>
                         </div>
                            </div>
                         <div class="col-md-7">
                         <div class="form-check form-check-inline">
                           <input 
                           class="form-check-input" 
                           type="checkbox" 
                           id="yarndyed" 
                           name="yarndyed" 
                           value="Yarn Dyed" />
                           <label class="form-check-label" for="yarndyed">Yarn&nbsp;Dyed</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input 
                           class="form-check-input" 
                           type="checkbox" 
                           id="fabricyarn" 
                           name="fabricyarn"
                           value="Fabric To Yarn" />
                           <label class="form-check-label" for="fabricyarn">Fabric&nbsp;To&nbsp;Yarn</label>
                         </div>
                         
                       </div>
                     
                     </div>
                           <div class="col-md-12 mt-2">
                             <label class="form-label" for="collapsible-fullname">Fabric</label>
                             <input
                               type="text"
                               id="fabric"
                               name="fabric"
                               class="form-control"
                                />
                             </div>
                           <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">Final&nbsp;GSM</label>
                             <input
                               type="text"
                               id="finalgsm"
                               name="finalgsm"
                               class="form-control"
                                />
                             </div>
                              <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">Grey&nbsp;GSM</label>
                             <input
                               type="text"
                               id="greygsm"
                               name="greygsm"
                               class="form-control"
                                />
                             </div> 
                             <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">GG</label>
                             <input
                               type="text"
                               id="gg"
                               name="gg"
                               class="form-control"
                                />
                             </div> <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">LL</label>
                             <input
                               type="text"
                               id="ll"
                               name="ll"
                               class="form-control"
                                />
                             </div>
                             <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">Pce&nbsp;Exs&nbsp;%</label>
                             <input
                               type="text"
                               id="pceexs"
                               name="pceexs"
                               class="form-control"
                                />
                             </div>
                             
                             <div class="col-md-8  mt-2">
                             <label class="form-label" for="collapsible-fullname">L.&nbsp;Fabric</label>
                             <input
                               type="text"
                               id="lfabric"
                               name="lfabric"
                               class="form-control"
                                />
                             </div>
                           <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">Wt/Uom</label>
                             <input
                               type="text"
                               id="wtuom"
                               name="wtuom"
                               class="form-control"
                                />
                             </div>
                             <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">Text</label>
                             <input
                               type="text"
                               id="text"
                               name="text"
                               class="form-control"
                                />
                             </div>
                             <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">F.Width</label>
                             <input
                               type="text"
                               id="fwidth"
                               name="fwidth"
                               class="form-control"
                                />
                             </div>
                             </div>
                           </div>
                           </div>
                  </div>
                </div>
                <!-- /Browser Default -->

                <!-- Bootstrap Validation -->
                <div class="col-md">
                  <div class="card">
                  <h5 class="card-header pb-2"style="padding-bottom:3px">Component/Color&nbsp;Entry</h5>
                  <hr>
                    <div class="card-body">
                     
                     <div class="table-responsive text-nowrap">
                       
                       <table class="table">
                           <thead>
                               <tr class="text-nowrap">
                                 <th>Component</th>
                                 <th>Part</th>
                                 <th>Block</th>
                                 <th>Combo</th>
                                 <th>Color&nbsp;desc</th>
                                 <th>Select</th>
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
                                    style="text-align:right"
                                    class="form-control"
                                    id="component<?php echo $i;?>"
                                    name="component[]"
                                    aria-label="Product barcode"/>
                                    
                                  </td>
                                  
                                  <td style="padding: 0.3rem">
                                    <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="part<?php echo $i;?>"
                                    name="part[]"
                                    aria-label="Product barcode"/>
                                    
                                  </td>
                                  <td style="padding: 0.3rem">
                                    <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="block<?php echo $i;?>"
                                    name="block[]"
                                    aria-label="Product barcode"/>
                                    
                                  </td>


                                  <td style="padding: 0.3rem">
                                    <input
                                    type="text"
                                    style="text-align:right"
                                    class="form-control"
                                    id="combo<?php echo $i;?>"
                                    name="combo[]"
                                    aria-label="Product barcode"
                                    onKeyDown="ee1(this.id);"/>
                                    
                                  </td>

                                 
                                  

                                  <td style="padding: 0.3rem">
               <select name="colordesc[]" id="colordesc<?php echo $i;?>" class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
                                  <td>
                                  <label class="switch switch-square switch-lg  switch-success">
                        &nbsp;<input type="checkbox" 
                        class="switch-input"
                          id="componentselect"
                         name="componentselect[<?=1;?>]"/>
                        <span class="switch-toggle-slider">
                        </span>
                      </label>
                            </td>
               
              
                                 
                               </tr>
                               
                              
                              

                               <?php
                             }
                             for ($i = 1, $sno = 2; $i <= 20; $i++, $sno++) {
                               ?>
                     <tr id="s1<?php echo $i; ?>" style="display:none">
                     
                     <td style="padding: 0.3rem">
                                     <input
                                     type="text"
                                     style="text-align:right"
                                     class="form-control"
                                     id="component"
                                     name="component[]"
                                     aria-label="Product barcode"/>
                                     
                                   </td>
                                   
                                   <td style="padding: 0.3rem">
                                     <input
                                     type="text"
                                     style="text-align:right"
                                     class="form-control"
                                     id="part"
                                     name="part[]"
                                     aria-label="Product barcode"/>
                                     
                                   </td>
                                   <td style="padding: 0.3rem">
                                     <input
                                     type="text"
                                     style="text-align:right"
                                     class="form-control"
                                     id="block"
                                     name="block[]"
                                     aria-label="Product barcode"/>
                                     
                                   </td>


                                   <td style="padding: 0.3rem">
                                     <input
                                     type="text"
                                     style="text-align:right"
                                     class="form-control"
                                     id="combo<?php echo $i;?>"
                                     name="combo[]"
                                     onKeyDown="ee1(this.id);"
                                     aria-label="Product barcode"/>
                                     
                                   </td>

                                  
                                   

                                   <td style="padding: 0.3rem">
               <select name="colordesc[]" id="colordesc" class="select form-select" >
                               <option value="">Select</option>
             <?php 
         $sql2 = "SELECT * FROM color order by id asc";
                   $result2 = mysqli_query($conn, $sql2);
                   while($rw = mysqli_fetch_array($result2))
         { ?>
                    <option value="<?php echo $rw['id'];?>"><?php echo $rw['color'];?></option>
                   <?php } ?>
                               
                             </select>
                                      
               </td>
                                   <td>
                                   <label class="switch switch-square switch-lg switch-success">
                         &nbsp;<input type="checkbox" class="switch-input" id="componentselect" name="componentselect[<?=$i;?>]" />
                         <span class="switch-toggle-slider">

                         </span>
                       </label>
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
            <!-- / Content -->

            
            <div class="row mb-4">
                <!-- Browser Default -->
                <div class="col-12 mb-4 mb-md-0">
                  <div class="card">
                    <h5 class="card-header pb-2"style="padding-bottom:3px">Process&nbsp;Loss&nbsp;Details</h5>
                    <hr>
                    <div class="card-body">
                     
                      <div class="table-responsive  text-nowrap">
                        
                        <table class="table">
                            <thead>
                                <tr class="text-nowrap">
                                  <th style="text-align:center">S.no</th>
                                  <th>Process&nbsp;Details</th>
                                  <th>Select</th>
                                  <th>Loss%</th>
                                  <th>Sub&nbsp;Process</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?>
                                    </td>
                                    <td style="padding: 0.3rem">
                <select name="processdetails[]" id="processdetails" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM process order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                    
                                    <td>
                                    <label class="switch switch-square switch-lg  switch-success">
                          &nbsp;<input type="checkbox" class="switch-input" id="processselect"name="processselect[<?=1;?>]"/>
                          <span class="switch-toggle-slider">
                          </span>
                        </label>
                              </td>
                
                              <td style="padding: 0.3rem">
                                      <input
                                      type="text"
                                      style="text-align:right"
                                      class="form-control"
                                      id="processloss<?php echo $i;?>"
                                      name="processloss[]"
                                      onKeyDown="ee3(this.id);"
                                      aria-label="Product barcode"/>
                                      
                                    </td>

                                    <td style="padding: 0.3rem">
                <select name="subprocess[]" id="subprocess" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM process order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['sub'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                  
                                </tr>
                               

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <= 20; $i++, $sno++) {
                                ?>
                                
                      <tr id="s3<?php echo $i; ?>" style="display:none">
                      <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?> </td>
                                  
                      <td style="padding: 0.3rem">
                <select name="processdetails[]" id="processdetails" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM process order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['process'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                    <td>
                                    <label class="switch switch-square switch-lg  switch-success">
                          &nbsp;<input type="checkbox" 
                          class="switch-input" 
                          id="processselect"name="processselect[<?=$i;?>]"/>
                          <span class="switch-toggle-slider">
                          </span>
                        </label>
                              </td>
                              
                              <td style="padding: 0.3rem">
                                      <input
                                      type="text"
                                      style="text-align:right"
                                      class="form-control"
                                      id="processloss<?php echo $i;?>"
                                      name="processloss[]"
                                      onKeyDown="ee3(this.id);"
                                      aria-label="Product barcode"/>
                                      
                                    </td>
                                <td style="padding: 0.3rem">
                <select name="subprocess[]" id="subprocess<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql2 = "SELECT * FROM process order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw = mysqli_fetch_array($result2))
					{ ?>
                     <option value="<?php echo $rw['id'];?>"><?php echo $rw['sub'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                   
                                    
                                
                                   
                                                </tr>  


                                                
                                        
                                  <?php
                                              }
                                              ?> 
                                              </tbody>
                                              <tr>
                                                <td></td>
                                                <td></td>
                                                <td>Total</td>
                                                </td>
                                <td style="padding: 0.3rem">
                                  <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="processtotal<?php echo $i;?>"
                                  name="processtotal"
                                  aria-label="Product barcode"/>
                                  
                                </td><td><button type="button"  style="border: 2px solid;" class="btn btn-primary">Ok</button></td>
                              </tbody>
                            </table>
                      </div>


                                            <!-- <div class="row mt-3">
                        <div class="d-grid gap-1 col-lg-2 pb-1 mx-auto">
                          <button class="btn btn-primary btn-sm" type="button">Color&nbsp;Entry</button>
                          
                        </div>
                        <div class="d-grid gap-1 col-lg-2 pb-1 mx-auto">
                          <button class="btn btn-primary btn-sm" type="button">Color&nbsp;processing&nbsp;loss</button>
                          
                        </div>
                        <div class="d-grid gap-1 col-lg-2 pb-1 mx-auto">
                          <button class="btn btn-primary btn-sm" type="button">Design&nbsp;Entry</button>
                          
                        </div>
                        <div class="d-grid gap-1 col-lg-2 pb-1 mx-auto">
                          <button class="btn btn-primary btn-sm" type="button">Knitted&nbsp;Dia&nbsp;loss</button>
                          
                        </div>
                        <div class="d-grid gap-1 col-lg-2 pb-1 mx-auto">
                          <button class="btn btn-primary btn-sm" type="button">Pannel&nbsp;Entry</button>
                          
                        </div>
                        <div class="d-grid gap-1 col-lg-2 pb-1 mx-auto">
                          <button class="btn btn-primary btn-sm" type="button">Yarn&nbsp;Twisting&nbsp;Entry</button>
                          
                        </div>
                      </div> -->

                                            <div class="col-md-12 mt-4">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <input
                              type="text"
                              id="remarks"
                              name="remarks"
                              class="form-control"/>
                          </div> 
                                        
                    
                    </div>
                  </div>
                </div>
                <!-- /Browser Default -->

              
               
              </div>
              <br>
                <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                          </form>
              </div>


          
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          </div>
        </div>
      </div>  
              
    </div>







                            
        <!-- / Layout page -->
    
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
  $type = $_POST['type'];
  $buyerorder = $_POST['buyerorder'];
  $processplan = $_POST['processplan'];
  $styleno = $_POST['styleno'];
  $styleqty = $_POST['styleqty'];
  $prdexs = $_POST['prdexs'];
  $fabricradiobtn = $_POST['fabricradiobtn'];
  $yarndyed = $_POST['yarndyed'];
  $fabricyarn = $_POST['fabricyarn'];
  $fabric = $_POST['fabric'];
  $finalgsm = $_POST['finalgsm'];
  $greygsm = $_POST['greygsm'];
  $gg = $_POST['gg'];
  $ll = $_POST['ll'];
  $pceexs = $_POST['pceexs'];
  $lfabric = $_POST['lfabric'];
  $wtuom = $_POST['wtuom'];
  $text = $_POST['text'];
  $fwidth = $_POST['fwidth'];
  $measurment = $_POST['measurment'];
  $fabrictype = $_POST['fabrictype'];
  $measurmentintype = $_POST['measurmentintype'];
  $noofparts = $_POST['noofparts'];
  $dollorloss = $_POST['dollorloss'];
  $avgloss = $_POST['avgloss'];
  $processtotal = $_POST['processtotal'];
  $remarks = $_POST['remarks'];

 $sql = "INSERT into programme_entry (orderno,type,buyerorder,processplan,styleno,styleqty,prdexs,fabricradiobtn,yarndyed,fabricyarn,fabric,finalgsm,greygsm,gg,ll,pceexs,lfabric,wtuom,text,fwidth,measurment,fabrictype,measurmentintype,noofparts,dollorloss,avgloss,processtotal,remarks) 
 values ('$orderno','$type','$buyerorder','$processplan','$styleno','$styleqty','$prdexs','$fabricradiobtn','$yarndyed','$fabricyarn','$fabric','$finalgsm','$greygsm','$gg','$ll','$pceexs','$lfabric','$wtuom','$text','$fwidth','$measurment','$fabrictype','$measurmentintype','$noofparts','$dollorloss','$avgloss','$processtotal','$remarks')";
    $result = mysqli_query($conn, $sql);
  
  $sq="select max(id) as id from programme_entry";
  $res = mysqli_query($conn,$sq);
  $rw = mysqli_fetch_array($res);
  $cid=$rw['id'];

  foreach ($_POST['component'] as $key => $val) {
    
    
    $component = $_POST['component'][$key];
    $part = $_POST['part'][$key];
    $block = $_POST['block'][$key];
    $combo = $_POST['combo'][$key];
    $colordesc = $_POST['colordesc'][$key];
    $componentselect = $_POST['componentselect'][$key];

    if ( isset($componentselect) ) {
      $componentselect=1;
  } else { 
    $componentselect=0;
  }
    
    if ($component != '') {
    $sql1 = "INSERT into programme_entry1 (cid,component,part,block,combo,colordesc,componentselect) 
    values ('$cid','$component','$part','$block','$combo','$colordesc','$componentselect')";
      $result1 = mysqli_query($conn, $sql1);
    
    }
  }




    foreach ($_POST['yarncount'] as $key => $val) {



        $yarncount = $_POST['yarncount'][$key];
        $yarncolor = $_POST['yarncolor'][$key];
        $cons = $_POST['cons'][$key];
        
        
    if ($yarncount != '') {
      $sql1 = "INSERT into programme_entry2 (cid,yarncount,yarncolor,cons) 
        values ('$cid','$yarncount','$yarncolor','$cons')";
          $result1 = mysqli_query($conn, $sql1);
        
      

    }
  }
  
  foreach ($_POST['description'] as $key => $val) {

    $description = $_POST['description'][$key];
    $dollor = $_POST['dollor'][$key];
    $avg = $_POST['avg'][$key];
    
    
  if ($description != '') {
     $sql1 = "INSERT into programme_entry3 (cid,description,dollor,avg) 
    values ('$cid','$description','$dollor','$avg')";
      $result1 = mysqli_query($conn, $sql1);
    
  

}
}



foreach ($_POST['processdetails'] as $key => $val) {

  $processdetails = $_POST['processdetails'][$key];
  $processselect = $_POST['processselect'][$key];
  $processloss = $_POST['processloss'][$key];
  $subprocess = $_POST['subprocess'][$key];

  if ( isset($processselect) ) {
    $processselect=1;
} else { 
  $processselect=0;
}
  
  
if ($processdetails != '') {
   $sql1 = "INSERT into programme_entry4 (cid,processdetails,processselect,processloss,subprocess) 
  values ('$cid','$processdetails','$processselect','$processloss','$subprocess')";
    $result1 = mysqli_query($conn, $sql1);
  


}
}

  if ($result) {

 echo "<script>alert('Programme Entry Registered successfully');window.location='programme_entry.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>
