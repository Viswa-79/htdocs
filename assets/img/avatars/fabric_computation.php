<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(8));
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


$('#pono'+c).val(data.pono);  
$('#itemdesc'+c).val(data.descr);
$('#print'+c).val(data.print);
$('#quality'+c).val(data.quality);
$('#size'+c).val(data.size);
$('#quantity'+c).val(data.quantity);
$('#unit'+c).val(data.unit);
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getorderitem.php?id="+value+"&q2="+value2,true);
    xmlhttp.send();
  }
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
<?php
		
		  
		   $fg1="select max(bookno) as id from fabric_computation";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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
                      <button class="btn btn-label-primary">Fabric Computation </button>
                      <a href="fabric_computationlist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Fabric
                          </a>
                    </div>


                     <!-- Multi Column with Form Separator -->
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        <div id="order_details" class="content">
                          <div class="row g-4">
                            
                          <div class="col-md-3">
                            

                            <label class="form-label" for="ecommerce-product-barcode">Book&nbsp;No&nbsp;&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              class="form-control"
                              id="bookno"
                              placeholder=""
                              name="bookno"
                              value="<?php echo $enq; ?>"
                              readonly
                              aria-label="Product barcode" />                            
                          </div>
                          
                          <div class="col-md-3">
                              <label class="form-label" for="formtabs-country">Date&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo date("Y-m-d");?>"

                              aria-label="Product barcode" />
                            </div>
                            <div class="col-md-3">
                            <label class="form-label" for="ecommerce-product-barcode">Order No&nbsp;<span style="color:red;">*</span></label>
                            <input 
                              type="text"
                              class="form-control"
                              id="orderno"
                              placeholder=""
                              name="orderno"
                              required
                              autofocus
                              onblur="get_items(this.value);"
                              aria-label="Product barcode" />
                          </div>
                            <div class="col-md-3">
                              <label class="form-label" for="ecommerce-product-barcode">Item&nbsp;No&nbsp;</label>
                              <input 
                                type="text"
                                class="form-control"
                                id="itemno"
                                placeholder=""
                                name="itemno"
                                aria-label="Product barcode" />
                              
                            </div>
                            
                        </div><br><hr>


                        <div class="card mb-2 mt-4">
                        
                        <div class="table-responsive">

                            <table class="table table-border  table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Cut&nbsp;Pannel&nbsp;Name</th>
                                  <th>Color</th>
                                  <th>width</th>
                                  <th>length</th> 
                                  <th>Take&nbsp;Fabric&nbsp;Inches</th>
                                  <th>Allot&nbsp;Fabric&nbsp;width&nbsp;Inches</th>
                                  <th>No&nbsp;Of&nbsp;Bits</th> 
                                  <th>consumption</th> 
                                  <th>Quantity</th>
                                  <th>Total&nbsp;Meters</th>
                                  <th>Fabric&nbsp;Process</th>
                                  <th>Printing</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
                <td style="padding: 0.3rem">
                  
                  <input
                                     type="text"
                                     class="form-control"
                                     id="pannelname<?php echo $i;?>"
                                 name="pannelname[]"
                                   
                                     aria-label="Product barcode"/>
                                        
                 </td>
                <td style="padding: 0.3rem">
                  
                  <input
                                     type="text"
                                     style="width:100px"
                                     class="form-control"
                                     id="color<?php echo $i;?>"
                                 name="color[]"
                                   
                                     aria-label="Product barcode"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="width<?php echo $i;?>"
                                      name="width[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="length<?php echo $i;?>"
                                name="length[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="takefabric<?php echo $i;?>"
                                name="takefabric[]"
                                  
                                    aria-label="Product barcode"/>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="allotfabric<?php echo $i;?>"
                                name="allotfabric[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="bits<?php echo $i;?>"
                                name="bits[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                name="consumption[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>



                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalmeters<?php echo $i;?>"
                                name="totalmeters[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="process<?php echo $i;?>"
                                name="process[]"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="printing<?php echo $i;?>"
                                name="printing[]"
                                style="text-align:right"
                                onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                  </tr>

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <=20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td>
                
                <td style="padding: 0.3rem">
                  
                  <input
                                     type="text"
                                     class="form-control"
                                     id="pannelname<?php echo $i;?>"
                                 name="pannelname[]"
                                   
                                     aria-label="Product barcode"/>
                                        
                 </td>
                <td style="padding: 0.3rem">
                  
                  <input
                                     type="text"
                                     class="form-control"
                                     id="color<?php echo $i;?>"
                                 name="color[]"
                                   
                                     aria-label="Product barcode"/>
                                        
                 </td>
                 <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="width<?php echo $i;?>"
                                      name="width[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="length<?php echo $i;?>"
                                name="length[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="takefabric<?php echo $i;?>"
                                name="takefabric[]"
                                  
                                    aria-label="Product barcode"/>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="allotfabric<?php echo $i;?>"
                                name="allotfabric[]"
                                  
                                    aria-label="Product barcode"/>
                                       
                </td><td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="bits<?php echo $i;?>"
                                name="bits[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="consumption<?php echo $i;?>"
                                name="consumption[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>


                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    id="quantity<?php echo $i;?>"
                                name="quantity[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>



                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="totalmeters<?php echo $i;?>"
                                name="totalmeters[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="process<?php echo $i;?>"
                                name="process[]"
                                style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="printing<?php echo $i;?>"
                                name="printing[]"
                                style="text-align:right"
                                onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>   
                  </tr>       
<?php
                              }
                              ?>                 
                              </tbody>
                  </table>
                </div>
              </div><br>  
                 
                    </div>
                       
                            
                       </div> 
</div>
                
                       <br>

                       <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev"  href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Submit</span>
                               
                              </button>
                            </div>  
                   
                        
                        </form>
              </div>

                <!-- Default Wizard -->
               
               
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
</html>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>


<?php
if (isset($_POST['submit'])) {


 
  $bookno = $_POST['bookno'];
  $date = $_POST['date'];
  $orderno = $_POST['orderno'];
  $itemno = $_POST['itemno'];

  if ($date != '') {
   $sql = "INSERT into fabric_computation (bookno,date,orderno,itemno) 
 values ('$bookno','$date','$orderno','$itemno')";
    $result = mysqli_query($conn, $sql);
  }

  $sq="select max(id) as id from fabric_computation";
  $res = mysqli_query($conn,$sq);
  $rw = mysqli_fetch_array($res);
  $cid=$rw['id'];

  foreach ($_POST['quantity'] as $key => $val) {
    
    

    $pannelname = $_POST['pannelname'][$key];
    $color = $_POST['color'][$key];
    $width = $_POST['width'][$key];
    $length = $_POST['length'][$key];
    $takefabric = $_POST['takefabric'][$key];
    $allotfabric = $_POST['allotfabric'][$key];
    $bits = $_POST['bits'][$key];
    $consumption = $_POST['consumption'][$key];
    $quantity = $_POST['quantity'][$key];
    $totalmeters = $_POST['totalmeters'][$key];
    $process = $_POST['process'][$key];
    $printing = $_POST['printing'][$key];
    
    if ($color != '') {
     $sql = "INSERT into fabric_computation1 (cid,pannelname,color,width,length,takefabric,allotfabric,bits,consumption,quantity,totalmeters,process,printing) 
 values ('$cid','$pannelname','$color','$width','$length','$takefabric','$allotfabric','$bits','$consumption','$quantity','$totalmeters','$process','$printing')";
      $result = mysqli_query($conn, $sql);
    }
  }

  if ($result) {

  echo "<script>alert('Fabric Computation Registered successfully');window.location='fabric_computation.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 
