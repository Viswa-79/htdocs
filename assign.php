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
// $fg1="SELECT max(id) as id from assignment where partyname!='$partyid'";
// 		  //  echo $fg1;
// 		   $fg2=mysqli_query($conn,$fg1);
// 		   $fg3=mysqli_fetch_object($fg2);
// 		   $fg4=$fg3->id+1;
       ?>

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

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
               <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' and id='$sid' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    $rw = mysqli_fetch_array($result);
                    $partyid = $rw['id'];
                    ?>
              <!-- Default -->
              <div class="row">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Party Group</button>
                      <a href="assign_list.php?cid=<?php echo base64_encode($rw['id']);?>"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Group
                          </a>
                    </div>  <br>         
                                <div class="card mb-2 mt-2">
                              
                      
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                      <div id="fabric_process" class="content">
                        <div class="row mb-6">
                       <!--   <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">File&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $fg4;?>"
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
                          </div>                        -->
                          <div class="col-md-4">
                          <button type="button" class="btn btn-outline-secondary">
                            PARTY NAME:
                            <?php echo $rw['name']; ?>
                          </button>
                          </div>
                          </div>
                          <br>
                          <hr>
                        <div >
                        
                        <div class="table-responsive">

                            <table class="table table-border table-hover">
                              <thead class="border-bottom">
                                <tr>

                                  <th style="width:50px">S.No</th>
                                  <th>Name</th> 
                                  <th>email&nbsp;id</th>
                                  <th>mobile&nbsp;no</th>
                                  <th hidden>merchandiser</th>
                                  <th>Address</th>
                                  <!-- <th>Location</th> -->
                                  
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
               
                                 
                                   <td hidden  style="padding: 0.3rem;width:200px">
                                   <input type="text"
                                    name="partyname[]"
                                    id="partyname<?php echo $i;?>"
                                    class="form-control"  hidden
                                    value="<?php echo $partyid;?>"
                                    style='text-transform:uppercase'/>
                                 </td>
                                   <td style="padding: 0.3rem;width:200px">
                                   <input type="text"
                                    name="name[]"
                                    id="name<?php echo $i;?>"
                                    class="form-control" 
                                    style='text-transform:uppercase'/>
                                 </td>

                                   <td style="padding: 0.3rem;width:250px">
                 <input 
                                    type="email"
                                    class="form-control"
                                    id="email<?php echo $i;?>"
                                    name="email[]"                                    
                                    aria-label="Product barcode"/>
                                       
                </td>
                
                <td style="padding: 0.3rem;width:200px;">
                 <input 
                                    type="number"
                                    class="form-control"
                                    id="mobile<?php echo $i;?>"
                                name="mobile[]"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td  hidden style="padding: 0.3rem;width:200px;">
                 <input  hidden
                                    type="text"
                                    class="form-control"
                                    id="merchant<?php echo $i;?>"
                                name="merchant[]"
                               
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem;width:450px">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="address<?php echo $i;?>"
                                name="address[]"
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
                 <td  hidden style="padding: 0.3rem;width:200px">
                                   <input type="text"
                                    name="partyname[]" hidden
                                    id="partyname<?php echo $i;?>"
                                    class="form-control" 
                                    value="<?php echo $partyid;?>"
                                    style='text-transform:uppercase'/>
                                 </td>
                                 

                 <td style="padding: 0.3rem;width:200px">
                                   <input type="text"
                                    name="name[]"
                                    id="name<?php echo $i;?>"
                                    class="form-control" 
                                    style='text-transform:uppercase'/>
                                 </td>
                <td  style="padding: 0.3rem">
                 <input 
                                    type="email"
                                    class="form-control"
                                    id="email"
                                name="email[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="mobile"
                                name="mobile[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td hidden style="padding: 0.3rem">
                 <input hidden
                                    type="text"
                                    class="form-control"
                                    id="merchant"
                                name="merchant[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  

                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="address<?php echo $i;?>"
                                    name="address[]"    
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

  foreach ($_POST['name'] as $key => $val) {
    
    
    $partyname = $_POST['partyname'][$key];
    $name = strtoupper($_POST['name'][$key]);
    $email = $_POST['email'][$key];
    $mobile = $_POST['mobile'][$key];
    $merchant = $_POST['merchant'][$key];
    $address = $_POST['address'][$key];
    $name = ucwords($name);
    if ($name != '') {
       $sql1 = "INSERT into assignment (partyname,name,email,mobile,merchant,address) 
 values ('$partyname','$name','$email','$mobile','$merchant','$address')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result1) {

  echo "<script>alert('Assignment Registered Successfully');window.location='party_master.php';</script>";

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
