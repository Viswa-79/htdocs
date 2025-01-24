<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(7));
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
function get_quality(id,value) {
  
  var c=id.substr(6);
//alert(c);
   var value2=document.getElementById('orderno'+c).value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);

document.getElementById('quality'+c).innerHTML =r;


      }
    };
    xmlhttp.open("GET","ajax/get_qty.php?itemno="+value+"&orderno="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items(id,value) {
//alert(value);
var c=id.substr(7);
var form='sewing_inward1';

		//alert(c);		
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(r);
if(sts==1)
{
document.getElementById('itemno'+c).innerHTML =r1[1];
					
            }
             else if(sts==0)
            {
              alert("Sewing Outward Already Made For This Order No.!");
              document.getElementById('orderno').value='';
            }
            else if(sts==2)
            {
              alert("Order No. Not Available.!");
              document.getElementById('orderno').value='';
            }

      }
    };
    xmlhttp.open("GET","ajax/get_order_items.php?id="+value+"&q="+form,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_item_details(id,value) {
//alert("hello");
  var c=id.substr(6);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#color'+c).val(data.color);
$('#descr'+c).val(data.size);

}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<?php
$fg1="select max(id) as id from inspection";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>


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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Inspection</button>
                      <a href="inspect_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Inspection
                          </a>
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                   
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                      <div id="fabric_process" class="content">
                        <div class="row mb-6">
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
                          <div class="col-md-4">
                          <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true" required >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php }  ?>
                              </select>
                          </div>
                          </div><br><hr>
                        <div >
                        
                        <div class="table-responsive">

                            <table class="table table-border table-hover">
                              <thead class="border-bottom">
                                <tr>

                                  <th style="width:50px">S.No</th>
                                  <th>factory&nbsp;Name</th> 
                                  <th>factory&nbsp;location</th>
                                  <th>style&nbsp;no</th>
                                  <th>offer&nbsp;qty</th>
                                  <th>inspection&nbsp;type</th>
                                  <th>manday</th> 
                                  <th>charges</th> 
                                  <th >gst&nbsp;</th>
                                  <th>total&nbsp;amnt</th>
                                  <!-- <th>transport & hostel&nbsp;charges</th>  -->
                                  <th>remarks&nbsp;</th> 

                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                 
                                   <?php echo $sno; ?>
                                    
                </td>
               
                                   <td style="padding: 0.3rem">
                                   <select name="factoryname[]" style="width:200px" id="factoryname" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php }  ?>
                              </select>
                </td>

                                   <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="factoryloc<?php echo $i;?>"
                                    name="factoryloc[]"                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="styleno<?php echo $i;?>"
                                name="styleno[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="offerqty<?php echo $i;?>"
                                name="offerqty[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  

                <td style="padding: 0.3rem">
                      <select id="inspecttype<?php echo $i;?>" name="inspecttype[]" class="select form-select">
                      <option value="">Select</option>
                      <?php 
                      $sql2 = "SELECT * FROM inspect_type ORDER BY id asc";
                      $result2 = mysqli_query($conn, $sql2);
                      while($rs = mysqli_fetch_array($result2)){
                        ?>
                        <option value="<?php echo $rs['id'];?>"><?php echo $rs['type'];?></option>
                     <?php }
                      ?>
                      
                      </select>
                                </td>
                
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="manday<?php echo $i;?>"
                                    name="manday[]"  
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="charges<?php echo $i;?>"
                                    name="charges[]" 
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input style="width:100px"
                                    type="text"
                                    class="form-control"
                                    id="gst<?php echo $i;?>"
                                    name="gst[]" 
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totamnt<?php echo $i;?>"
                                    name="totamnt[]"  
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                  
                                    aria-label="Product barcode"/>
                                       
                </td>
                <!-- <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="transport<?php echo $i;?>"
                                    name="transport[]"                                    
                                    aria-label="Product barcode"/>
                                       
                </td> -->
              
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="remarks<?php echo $i;?>"
                                    name="remarks[]"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                    
                                </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 100; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                      <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
             
                                   <td style="padding: 0.3rem;">
                                   <select style="width:200px" name="factoryname[]" id="factoryname" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php }  ?>
                              </select>
                </td>
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="factoryloc"
                                name="factoryloc[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="styleno"
                                name="styleno[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  

                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="offerqty<?php echo $i;?>"
                                   
                                    name="offerqty[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
               
                <td style="padding: 0.3rem">
                      <select id="inspecttype<?php echo $i;?>" name="inspecttype[]" class="select form-select">
                      <option value="">Select</option>
                      <?php 
                      $sql2 = "SELECT * FROM inspect_type ORDER BY id asc";
                      $result2 = mysqli_query($conn, $sql2);
                      while($rs = mysqli_fetch_array($result2)){
                        ?>
                        <option value="<?php echo $rs['id'];?>"><?php echo $rs['type'];?></option>
                     <?php }
                      ?>
                      
                      </select>
                                </td>

                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="manday<?php echo $i;?>"
                                    name="manday[]"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="charges<?php echo $i;?>"
                                    name="charges[]"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="gst<?php echo $i;?>"
                                    name="gst[]" 
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"                                   
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="totamnt<?php echo $i;?>"
                                    name="totamnt[]"
                                    onkeyup="tott(charges<?php echo $i;?>.id)"
                                    onchange="tott(charges<?php echo $i;?>.id)"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <!-- <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="transport<?php echo $i;?>"
                                    name="transport[]"
                                    
                                    aria-label="Product barcode"/>
                                       
                </td> -->
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="remarks<?php echo $i;?>"
                                    name="remarks[]"
                                    onKeyDown="ee1(this.id);"
                                    aria-label="Product barcode"/>
                                       
                </td>
                                       
                    
                                </tr>         
<?php
                              }
                              ?>                 
                              </tbody>
                            </table>
                            </div><br>
                           
                    <div class="row g-3">
						  
              <div class="col-md-3">
                          <label class="form-label" for="collapsible-fullname">Transport&nbsp;&&nbsp;Hostel&nbsp;Charges</label>
                          <input
                            type="text"
                            id="transport"
                            name="transport"
                            class="form-control" />
                        </div>

              <div class="col-md-9">
                          <label class="form-label" for="collapsible-fullname">Remarks</label>
                          <input
                            type="text"
                            id="remark"
                            name="remark"
                            class="form-control" />
                        </div>
                        </div>
              </div>
              
              <br>
                  </div>
                
              </div>
              <br>
                  
            </div>
               
           
                          
                         <div class="col-12 d-flex justify-content-between ">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                            </div>    
                    
                        </form>
                   
                   
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


<?php
if (isset($_POST['submit'])) {

  $dcno = $_POST['dcno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $remark = $_POST['remark'];
  $transport = $_POST['transport'];

  if ($partyname != '') {
  $sql = "INSERT into inspection (dcno,date,partyname,remark,transport)
  values('$dcno','$date','$partyname','$remark','$transport')";
  $result = mysqli_query($conn, $sql);
  }

  $cid = mysqli_insert_id($conn);
  foreach ($_POST['factoryname'] as $key => $val) {
    
    
    $factoryname = $_POST['factoryname'][$key];
    $factoryloc = $_POST['factoryloc'][$key];
    $styleno = $_POST['styleno'][$key];
    $offerqty = $_POST['offerqty'][$key];
    $inspecttype = $_POST['inspecttype'][$key];
    $manday = $_POST['manday'][$key];
    $charges = $_POST['charges'][$key];
    $gst = $_POST['gst'][$key];
    $totamnt = $_POST['totamnt'][$key];
    $transport = $_POST['transport'][$key];
    $remarks = $_POST['remarks'][$key];

    if ($factoryname != '') {
       $sql1 = "INSERT into inspection1 (cid,factoryname,factoryloc,styleno,offerqty,inspecttype,manday,charges,gst,totamnt,transport,remarks) 
 values ('$cid','$factoryname','$factoryloc','$styleno','$offerqty','$inspecttype','$manday','$charges','$gst','$totamnt','$transport','$remarks')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result) {

  echo "<script>alert('Inspection Registered Successfully');window.location='inspect_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 


<script language="javascript" type="text/javascript">


function tott(v1)
{


//alert(v1);

a=v1;
b=(a.substr(7));


        var v=document.getElementById('manday'+b).value?document.getElementById('manday'+b).value:0;
        var t=document.getElementById('charges'+b).value?document.getElementById('charges'+b).value:0;
        var gst=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
        
        var tt=parseFloat(v) * parseFloat(t);
        var tm=parseFloat(tt) * parseFloat(gst)/100;
        var tm1=parseFloat(tm) + parseFloat(tt);
        // alert(tt);
		
		document.getElementById('totamnt'+b).value=tm1.toFixed(2);


}


</script>

