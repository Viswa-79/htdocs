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
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#color'+c).val(data.color);

}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>



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
                      <button class="btn btn-label-primary">Party Group</button>
                      <a href="assign_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Group
                          </a>
                    </div>  <br>      <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>               
                                <div class="card mb-2 mt-2">
                      <form class="card-body" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        <!-- Personal Info -->
                        <?php
                              $sql4 = " SELECT * FROM assignment WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">File&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $wz1['dcno']; ?>"
                              class="form-control"
                               />
                          </div>
                         
                          <!-- <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date'];?>"
                              placeholder="" />
                          </div>                        -->
                          
                          <div class="col-md-4">
                            <label class="form-label" for="collapsible-fullname">Party Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          </div><br><hr>
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
                                  <th>address</th> 
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                  $sno=1; $i=0;
                              $sql4 = " SELECT * FROM assignment1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {

                                  ?>
                             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                <tr>
                                <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
            
                                
                <td  style="padding: 0.3rem;width:200px;">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="name<?php echo $i;?>"
                                name="name[]"
                                value="<?php echo $rw['name']; ?>"
                                    aria-label="Product barcode"
                                    style='text-transform:uppercase'/>
                                       
                </td>  
                <td style="padding: 0.3rem;width:250px;">
                 <input
                                    type="email"
                                    class="form-control"
                                    id="email<?php echo $i;?>"
                                name="email[]"
                                value="<?php echo $rw['email']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
              <td style="padding: 0.3rem;width:200px;">
               <input 
                                  type="number"
                                  class="form-control"
                                  id="mobile<?php echo $i;?>"
                                  value="<?php echo $rw['mobile']; ?>"
                                  name="mobile[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td hidden style="padding: 0.3rem;width:200px;">
               <input hidden
                                  type="text"
                                  class="form-control"
                                  id="merchant<?php echo $i;?>"
                                  value="<?php echo $rw['merchant']; ?>"
                                  name="merchant[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem;width:450px;">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="address<?php echo $i;?>"
                                  value="<?php echo $rw['address']; ?>"
                                  name="address[]"
                                  onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"/>
                                </td>
             <td style="padding: 0.3rem;width:50px;">
                 <a href="ajax/del_assign_row.php?cid=<?php echo base64_encode($rw['id']);?>">
                 <button type="button" 
                 class="btn btn-link btn-sm text-danger" 
                 data-bs-toggle="tooltip" 
                 data-bs-placement="top" 
                 title="Delete">
                 <i class="fa fa-trash"></i>
                </button></a>
            </td>

                                </tr>                   
<?php $sno++; $i++;
                              }
                              $j=$i;
                              $sn=$sno;
                              for ($i=$j, $sno=$sn; $i<=99;$i++, $sno++){
                              ?>

                              <input type="text" hidden name="rid[]" id="rid" value="">
                              
                              <tr id="s1<?php echo $i; ?>" style="display:none">
                                <td  style="padding: 0.3rem;text-align:center"> 
                                 <?php echo $sno; ?>                                  
                               </td>
            
                                
                <td  style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="name<?php echo $i;?>"
                                name="name[]"
                                    aria-label="Product barcode"
                                    style='text-transform:uppercase'/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="email"
                                    class="form-control"
                                    id="email<?php echo $i;?>"
                                name="email[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  
              <td style="padding: 0.3rem">
               <input 
                                  type="number"
                                  class="form-control"
                                  id="mobile<?php echo $i;?>"
                                  name="mobile[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td hidden style="padding: 0.3rem">
               <input hidden
                                  type="text"
                                  class="form-control"
                                  id="merchant<?php echo $i;?>"
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
                </div>
                 
            
               
           
                          
            <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="assign_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
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
  
  $cid =$_POST['cid'];
  $dcno = $_POST['dcno'];
  $partyname = $_POST['partyname'];

  $sql = "UPDATE inspection SET dcno='$dcno',partyname='$partyname' WHERE id='$sid'";
  $result = mysqli_query($conn, $sql);

  foreach ($_POST['name'] as $key => $val) {
    
    
    $rid = $_POST['rid'][$key];    
      $name = $_POST['name'][$key];
      $email = $_POST['email'][$key];
      $mobile = $_POST['mobile'][$key];
      $merchant = $_POST['merchant'][$key];
      $address = $_POST['address'][$key];
    
    
    if($name !=''){
      if($rid !=''){
   $sql1 = "UPDATE assignment1 SET name='$name',email='$email',mobile='$mobile',merchant='$merchant',address='$address' WHERE id='$rid'";
    $result1 = mysqli_query($conn, $sql1);
    } 
    else{
      $sql12 = "INSERT into assignment1 (cid,name,email,mobile,address) 
 values ('$sid','$name','$email','$mobile','$address')";
      $result2 = mysqli_query($conn, $sql12);
    }
  }
}

  if ($result) {

  echo "<script>alert('Assignment Updated Successfully');window.location='assign_list.php';</script>";

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
		
		document.getElementById('totamnt'+b).value=tm1.toFixed(2);


}


</script>
