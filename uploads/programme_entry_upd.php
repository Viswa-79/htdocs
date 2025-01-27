<?php include "config.php"; ?>
<script>
function ee1(x)
{
//alert(x);
var a=x;
var c=(a.substr(9));
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
var c=(a.substr(10));
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
          <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>

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
            <?php
                              $sql4 = " SELECT * FROM programme_entry WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                <!-- Browser Default -->
                <div class="col-12 mb-4 mb-md-0">
                  <div class="card">

                    <div class="card-body">
                      
                      <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
                            <label class="form-label" for="collapsible-fullname">I.O&nbsp;No/Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="orderno"
                              name="orderno"
                              readonly
                              value="<?php echo $wz1['orderno']; ?>"
                              value="<?php echo $fg4; ?>"
                              class="form-control"
                               />
                          </div>
                          <div class="col-md-2">
                          <label class="form-label" for="ecommerce-product-barcode">Type</label>
                            <select name="type" id="type" class="select2 form-select" data-allow-clear="true">
                            <option value="">Select</option> 
                                <option value="Sample" <?php if($wz1['type']=='Sample'){ ?>Selected<?php } ?> >Sample  </option>
                                <option value="Process" <?php if($wz1['type']=='Process'){ ?>Selected<?php } ?> >Process </option>   
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Buyer&nbsp;Order&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="buyerorder"
                              name="buyerorder"
                              value="<?php echo $wz1['buyerorder']; ?>"
                              class="form-control"/>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Process&nbsp;Plan&nbsp;<span style="color:red;">*</span></label>
                            <select name="processplan" id="processplan" class="select2 form-select" data-allow-clear="true">
                            <option value="">Select</option> 
                                <option value="Yarn" <?php if($wz1['processplan']=='Yarn'){ ?>Selected<?php } ?> >Yarn  </option>
                                <option value="Dollor" <?php if($wz1['processplan']=='Dollor'){ ?>Selected<?php } ?> >Dollor </option>   
                              </select>
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Style&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="styleno"
                              name="styleno"
                              value="<?php echo $wz1['styleno']; ?>"
                              class="form-control"/>
                          </div>


                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Style&nbsp;Qty&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="styleqty"
                              name="styleqty"
                              value="<?php echo $wz1['styleqty']; ?>"
                              class="form-control"/>
                          </div>

                          <div class="col-md-1">
                            <label class="form-label" for="collapsible-fullname">Prd.Exs.%&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="prdexs"
                              name="prdexs"
                          value="<?php echo $wz1['prdexs']; ?>"
                              
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
                  <h5 class="card-header pb-2">Yarn&nbsp;Consumption&nbsp;Details</h5>
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
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM programme_entry2 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?>  
                               <tr>
                               <input type="text" hidden name="tid[]" id="tid" value="<?php echo $rw['id'];?>"> 
                              
                               <td style="padding: 0.3rem">
                <select name="yarncount[]" id="yarncount" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM product_count order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['yarncount']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['product_count'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
               <td style="padding: 0.3rem">
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
                                       
                </td>
               <td style="padding: 0.3rem">
                 <input
                 type="text"
                 style="text-align:right"
                 class="form-control"
                 id="cons<?php echo $i;?>"
                 name="cons[]"
                 value="<?php echo $rw['cons']; ?>"
                 onKeyDown="ee4(this.id);"
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
                <!-- /Browser Default -->
                <!-- Bootstrap Validation -->
                <div class="col-md">
                  <div class="card">
                  <h5 class="card-header pb-2">Consumption&nbsp;Details</h5>
                  <hr>
                  <div class="card-body">
                    
                    <div class="row g-4">
                      <div class="col-md-3">
                        <label class="form-label" for="collapsible-fullname">Measurment&nbsp;</label><br>
                        <input type="radio" name="measurment" value="With" <?php if($wz1['measurment'] == 'With'){ echo "checked"; } ?>>With<br>
                        <input type="radio" name="measurment" value="Without" <?php if($wz1['measurment'] == 'Without'){ echo "checked"; } ?>> Without
                    </div>
                        


                      <div class="col-md-3">
                      <label class="form-label" for="collapsible-fullname">Fabric&nbsp;Type</label><br>
                      <?php
                        $db_value = 'Tublar';
                        ?>
                        <input type="radio" name="fabrictype" value="Tublar"
                        <?php if($wz1['fabrictype'] == 'Tublar'){ echo "checked"; } ?>>Tublar<br>
                        <input type="radio" name="fabrictype" value="Single" 
                        <?php if($wz1['fabrictype'] == 'Single'){ echo "checked"; } ?>> Single
                        </div>
                      
                      <div class="col-md-3">
                      <label class="form-label" for="collapsible-fullname">Measurment&nbsp;In&nbsp;Type</label><br>

                      <?php
                        $db_value = 'Cm'; 
                        ?>
                        <input type="radio" name="measurmentintype" value="Cm" 
                        <?php if($wz1['measurmentintype'] == 'Cm'){ echo "checked"; } ?>>Cm<br>
                        <input type="radio" name="measurmentintype" value="Inches" 
                        <?php if($wz1['measurmentintype'] == 'Inches'){ echo "checked"; } ?>> Inches
                        </div> 
                     
                      
                      <div class="col-md-12">
                      <label class="form-label" for="collapsible-fullname">No&nbsp;Of&nbsp;Parts</label>
                      <input
                          type="text"
                          id="noofparts"
                          name="noofparts"
                          value="<?php echo $wz1['noofparts']; ?>"
                          class="form-control"
                           />
                        
                      </div>                         
                        </div>

                    
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
                    $sno=1; $i=0;
                          $sql4 = " SELECT * FROM programme_entry3 Where cid='$sid'";
                          $result4 = mysqli_query($conn, $sql4);
                          while ($rw = mysqli_fetch_array($result4))
                          {
                              ?> 
                            <tr>
                            <input type="text" hidden name="yid[]" id="yid" value="<?php echo $rw['id'];?>"> 
                           
                            <td style="padding: 0.3rem">
              <input
              type="text"
              style="text-align:right"
              class="form-control"
              id="description<?php echo $i;?>"
              name="description[]"
              value="<?php echo $rw['description']; ?>"
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
              value="<?php echo $rw['dollor']; ?>"
              aria-label="Product barcode"/>
              
            </td>
            
            <td style="padding: 0.3rem">
              
             <input
                                type="text"
                                style="text-align:right"
                                class="form-control"
                                id="avg<?php echo $i;?>"
                                value="<?php echo $rw['avg']; ?>"
                                name="avg[]"
                                onKeyDown="ee7(this.id);"
                                aria-label="Product barcode"/>
                                   
            </td>
            
            
           
                              
                            </tr>       
                            <?php
                        $sno++; $i++;
                            }
                           ?>       <tr>
                            <td>Cons.&nbsp;with&nbsp;&nbsp;loss%</td> 
                            <td style="padding: 0.3rem">
              <input
              style="text-align:right"
              type="text"
              class="form-control"
              id="dollorloss<?php echo $i;?>"
              name="dollorloss"
              value="<?php echo $wz1['dollorloss']; ?>"
              aria-label="Product barcode"/>
              
            </td>
            <td style="padding: 0.3rem">
              <input
              style="text-align:right"
              type="text"
              class="form-control"
              id="avgloss<?php echo $i;?>"
              name="avgloss"
              value="<?php echo $wz1['avgloss']; ?>"
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
                  <h5 class="card-header pb-2">Fabric&nbsp;Details</h5>
                  <hr>
                    <div class="card-body">
                     <div id="fabric_process" class="content">
                         <div class="row g-1">
                         <div class="row">
                         <div class="col-md-5">
                         <div class="form-check form-check-inline ">
                           <input
                             class="form-check-input"
                             type="radio"
                             id="fabricradiobtn" 
                             name="fabricradiobtn"
                             value="Kintted"  <?php if($wz1['fabricradiobtn'] == 'Kintted'){ echo "checked"; } ?>/>
                           <label class="form-check-label" for="knitted">Knitted</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input
                             class="form-check-input"
                             type="radio"
                             id="fabricradiobtn" 
                             name="fabricradiobtn"
                             value="Woven"  <?php if($wz1['fabricradiobtn'] == 'Woven'){ echo "checked"; } ?>/>
                           <label class="form-check-label" for="woven">Woven</label>
                         </div>
                            </div>
                        
                              
                         <div class="col-md-7">
                         <div class="form-check form-check-inline ">
                           <input 
                           class="form-check-input" 
                           type="checkbox" 
                           id="yarndyed" 
                           name="yarndyed" 
                           value="Yarn Dyed"  <?php if($wz1['yarndyed'] == 'Yarn Dyed'){ echo "checked"; } ?>/>
                           <label class="form-check-label" for="yarndyed">Yarn&nbsp;Dyed</label>
                         </div>
                         <div class="form-check form-check-inline">
                           <input 
                           class="form-check-input" 
                           type="checkbox" 
                           id="fabricyarn" 
                           name="fabricyarn"
                           value="Fabric To Yarn" <?php if($wz1['fabricyarn'] == 'Fabric To Yarn'){ echo "checked"; } ?>/>
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
                               value="<?php echo $wz1['fabric']; ?>"
                               class="form-control"
                                />
                             </div>
                           <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">Final&nbsp;GSM</label>
                             <input
                               type="text"
                               id="finalgsm"
                               name="finalgsm"
                               value="<?php echo $wz1['finalgsm']; ?>"
                               class="form-control"
                                />
                             </div>
                              <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">Grey&nbsp;GSM</label>
                             <input
                               type="text"
                               id="greygsm"
                               name="greygsm"
                               value="<?php echo $wz1['greygsm']; ?>"
                               class="form-control"
                                />
                             </div> 
                             <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">GG</label>
                             <input
                               type="text"
                               id="gg"
                               name="gg"
                               value="<?php echo $wz1['gg']; ?>"
                               class="form-control"
                                />
                             </div> <div class="col-md-6  mt-2">
                             <label class="form-label" for="collapsible-fullname">LL</label>
                             <input
                               type="text"
                               id="ll"
                               name="ll"
                               value="<?php echo $wz1['ll']; ?>"
                               class="form-control"
                                />
                             </div>
                             <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">Pce&nbsp;Exs&nbsp;%</label>
                             <input
                               type="text"
                               id="pceexs"
                               name="pceexs"
                               value="<?php echo $wz1['pceexs']; ?>"
                               class="form-control"
                                />
                             </div>
                             
                             <div class="col-md-8  mt-2">
                             <label class="form-label" for="collapsible-fullname">L.&nbsp;Fabric</label>
                             <input
                               type="text"
                               id="lfabric"
                               name="lfabric"
                               value="<?php echo $wz1['lfabric']; ?>"
                               class="form-control"
                                />
                             </div>
                           <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">Wt/Uom</label>
                             <input
                               type="text"
                               id="wtuom"
                               name="wtuom"
                               value="<?php echo $wz1['wtuom']; ?>"
                               class="form-control"
                                />
                             </div>
                             <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">Text</label>
                             <input
                               type="text"
                               id="text"
                               name="text"
                               value="<?php echo $wz1['text']; ?>"
                               class="form-control"
                                />
                             </div>
                             <div class="col-md-4  mt-2">
                             <label class="form-label" for="collapsible-fullname">F.Width</label>
                             <input
                               type="text"
                               id="fwidth"
                               name="fwidth"
                               value="<?php echo $wz1['fwidth']; ?>"
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
                  <h5 class="card-header pb-2">Component/Color&nbsp;Entry</h5>
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
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM programme_entry1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                               <tr>
                               <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 
                                <td style="padding: 0.3rem">
                                      <input
                                      type="text"
                                      style="text-align:right"
                                      class="form-control"
                                      id="component<?php echo $i;?>"
                                      name="component[]"
                                      value="<?php echo $rw['component']; ?>"
                                      aria-label="Product barcode"/>
                                      
                                    </td>
                                    
                                    <td style="padding: 0.3rem">
                                      <input
                                      type="text"
                                      style="text-align:right"
                                      class="form-control"
                                      id="part<?php echo $i;?>"
                                      name="part[]"
                                      value="<?php echo $rw['part']; ?>"
                                      aria-label="Product barcode"/>
                                      
                                    </td>
                                    <td style="padding: 0.3rem">
                                      <input
                                      type="text"
                                      style="text-align:right"
                                      class="form-control"
                                      id="block<?php echo $i;?>"
                                      name="block[]"
                                      value="<?php echo $rw['block']; ?>"
                                      aria-label="Product barcode"/>
                                      
                                    </td>


                                    <td style="padding: 0.3rem">
                                      <input
                                      type="text"
                                      style="text-align:right"
                                      class="form-control"
                                      id="combo<?php echo $i;?>"
                                      name="combo[]"
                                      value="<?php echo $rw['combo']; ?>"
                                      aria-label="Product barcode"/>
                                      
                                    </td>

                                   
                                    

                                    <td style="padding: 0.3rem">
                <select name="colordesc[]" id="colordesc" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM color order by color asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['colordesc']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['color'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                    <td>
                                    <label class="switch switch-square switch-lg  switch-success">
                          &nbsp;<input 
                          type="checkbox" 
                          class="switch-input"  
                          id="componentselect" 
                          name="componentselect[]"
                          />
                          <span class="switch-toggle-slider">
                          </span>
                        </label>
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
            <!-- / Content -->

            
            <div class="row mb-4">
                <!-- Browser Default -->
                <div class="col-12 mb-4 mb-md-0">
                  <div class="card">
                    <h5 class="card-header pb-2">Process&nbsp;Loss&nbsp;Details</h5>
                    <hr>
                    <div class="card-body">
                     
                      <div class="table-responsive text-nowrap">
                        
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
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM programme_entry4 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                                <tr>
                                <input type="text" hidden name="gid[]" id="gid" value="<?php echo $rw['id'];?>"> 
                                <td  style="padding: 0.3rem;text-align:center"><?php echo $sno; ?>
                                    </td>
                                    <td style="padding: 0.3rem">
                <select name="processdetails[]" id="processdetails" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM process order by process asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['processdetails']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['process'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                    
                                    <td>
                                    <label class="switch switch-square switch-lg  switch-success">
                          &nbsp;<input type="checkbox" 
                          class="switch-input" 
                          id="processselect"
                          name="processselect[]"
                          <?php if($rw['processselect'] == 'processselect'){ echo "checked"; } ?>/>
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
                                      value="<?php echo $rw['processloss']; ?>"
                                      aria-label="Product barcode"/>
                                      
                                    </td>

                                    <td style="padding: 0.3rem">
                <select name="subprocess[]" id="subprocess" class="select form-select" >
                                  <option value="">Select</option>
                                   <?php 
					$sql2 = "SELECT * FROM process order by sub asc";
                    $result2 = mysqli_query($conn, $sql2);
                    while($rw1 = mysqli_fetch_array($result2))
					{ ?>
                     <option <?php if($rw1['id']==$rw['subprocess']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['sub'];?></option>
                    <?php } ?>
                                
                              </select>
                                       
                </td>
                                  
                                </tr>
                               

                            


                                                
                                        
                                 <?php
                            $sno++; $i++;
                                }
                               ?> 
                                              </tbody>
                                              <tr>
                                                <td></td>
                                                <td></td>
                                                <td>total</td>
                                                </td>
                                <td style="padding: 0.3rem">
                                  <input
                                  type="text"
                                  style="text-align:right"
                                  class="form-control"
                                  id="processtotal<?php echo $i;?>"
                                  name="processtotal"
                                  value="<?php echo $wz1['processtotal']; ?>"
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
                              value="<?php echo $wz1['remarks']; ?>"
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

  $cid = $_POST['cid'];
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

  $sql = "UPDATE programme_entry SET orderno='$orderno',type='$type',buyerorder='$buyerorder',processplan='$processplan',styleno='$styleno',styleqty='$styleqty',prdexs='$prdexs',fabricradiobtn='$fabricradiobtn',yarndyed='$yarndyed',fabricyarn='$fabricyarn',fabric='$fabric',finalgsm='$finalgsm',greygsm='$greygsm',gg='$gg',ll='$ll',pceexs='$pceexs',lfabric='$lfabric',wtuom='$wtuom',text='$text',fwidth='$fwidth',measurment='$measurment',fabrictype='$fabrictype',measurmentintype='$measurmentintype',noofparts='$noofparts',dollorloss='$dollorloss',avgloss='$avgloss',processtotal='$processtotal',remarks='$remarks' where id='$cid'";
  $result = mysqli_query($conn, $sql);
  
  

  foreach ($_POST['component'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];
    $component = $_POST['component'][$key];
    $part = $_POST['part'][$key];
    $block = $_POST['block'][$key];
    $combo = $_POST['combo'][$key];
    $colordesc = $_POST['colordesc'][$key];
    $componentselect = $_POST['componentselect'][$key];
    
      $sql1 = "UPDATE programme_entry1 SET component='$component',part='$part',block='$block',combo='$combo',colordesc='$colordesc',componentselect='$componentselect' where id='$rid'";
        $result1 = mysqli_query($conn, $sql1);
    
  }
    foreach ($_POST['yarncount'] as $key => $val) {



        $tid = $_POST['tid'][$key];
        $yarncount = $_POST['yarncount'][$key];
        $yarncolor = $_POST['yarncolor'][$key];
        $cons = $_POST['cons'][$key];
        
        
     
      
  $sql1 = "UPDATE programme_entry2 SET yarncount='$yarncount',yarncolor='$yarncolor',cons='$cons' where id='$tid'";
    $result1 = mysqli_query($conn, $sql1);
        
      

   
  }
  
  foreach ($_POST['description'] as $key => $val) {

    $yid = $_POST['yid'][$key];
    $description = $_POST['description'][$key];
    $dollor = $_POST['dollor'][$key];
    $avg = $_POST['avg'][$key];
    
    
   
  
      $sql1 = "UPDATE programme_entry3 SET description='$description',dollor='$dollor',avg='$avg' where id='$yid'";
        $result1 = mysqli_query($conn, $sql1);
    
  


}



foreach ($_POST['processdetails'] as $key => $val) {

  $gid = $_POST['gid'][$key];
  $processdetails = $_POST['processdetails'][$key];
  $processselect = $_POST['processselect'][$key];
  $processloss = $_POST['processloss'][$key];
  $subprocess = $_POST['subprocess'][$key];
  
  
 
     $sql1 = "UPDATE programme_entry4 SET processdetails='$processdetails',processselect='$processselect',processloss='$processloss',subprocess='$subprocess' where id='$gid'";
      $result1 = mysqli_query($conn, $sql1);
  


}

  if ($result) {

 echo "<script>alert('Programme Entry Update successfully');window.location='programme_entrylist.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?>