<?php include "config.php"; ?>

<script>
function ee1(x)
{


// alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>

<?php
    $sid=base64_decode($_GET['cid']);


$fg1="select max(dcno) as id from staff_assign";
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
                      <button class="btn btn-primary">Inspector Assignment</button>
                      <a href="staff_assign_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Inspector
                          </a>
                    </div>  <br>         
                    <form action="" method="post"  autocomplete="off">
                                <div class="card mb-2 mt-2">
                   <?php
                   $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=17";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                    

                   $query = "SELECT * FROM quote WHERE quote_no = '$sid'";
                   $result = mysqli_query($conn, $query);
                   $row = mysqli_fetch_assoc($result);
                   $qno=$row['quote_no'];
                   $cid=$row['id'];
                   $partyname = $row['partyname'];
                   ?>
                        
                      <div id="fabric_process" class="content card-body">
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
                            <label class="form-label" for="collapsible-fullname">Staff Assign Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>                       

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quote&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="quote"
                              name="quote"
                              value="<?php echo $qno;?>"
                              onchange="get_assign(this.value);get_po(this.value);"
                              class="form-control"
                              placeholder="" autofocus/>
                          </div>        

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PO&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              value="<?php echo $row['pono'];?>"
                              class="form-control"
                              placeholder=""
                              />
                          </div>        

                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true" required onblur="get_party(this.value);get_party1(this.value);" onchange="get_party(this.value);get_party1(this.value);" style="text-transform:uppercase">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
     <option <?php if($rw['id']==$row['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
						 </option>
					<?php }  ?>
                              </select>
                          </div>
                          
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplyname" id="supplyname" class="select form-select" data-allow-clear="true"  style="text-transform:uppercase">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                             <option <?php if($rw['id']==$row['supplyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
						 </option>
					<?php }  ?>
                              </select>
                          </div>
                          
                          
                          </div><br><hr>
                     
                        
                        <div class="table-responsive card-body content" style="height:500px">
                            <table class="table table-responsive table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>factory&nbsp;Name</th> 
                                  <th>location</th> 
                                  <th>style&nbsp;No</th> 
                                  <th>item&nbsp;description</th> 
                                  <th>color</th> 
                                  <th>size</th> 
                                  <th>inspection&nbsp;type</th>
                                  <th>order&nbsp;qty</th>
                                  <th>unit</th> 
                                  <th>aql&nbsp;level</th> 
                                  <th>aql&nbsp;limit</th> 
                                  <th>manday</th> 
                                  <th style="width:300px">inspector</th>                                  
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $sno=1;
                              $i=0;
                              $sq = "SELECT * FROM quote1 WHERE cid ='$cid'";
                              $result = mysqli_query($conn, $sq);
                              while($rs = mysqli_fetch_array($result)){
                                $inspect = $rs['inspect'];
                                ?>  
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                   <?php echo $sno; ?>
                </td>
               
                                   <td style="padding: 0.3rem">
                                   <select name="factoryname[]" style="width:200px;text-transform:uppercase" id="factoryname<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
                              <?php 
					$sql1 = "SELECT * FROM assignment WHERE partyname='$partyname' order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rs['companyname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                              </select>
                </td>

                <td style="padding: 0.3rem">
                 <input style="width:150px"
                                    type="text"
                                    class="form-control"
                                    id="location"
                                name="location[]"
                                value="<?php echo $rs['factoryloc']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input style="width:120px"
                                    type="text"
                                    class="form-control"
                                    id="styleno<?php echo $i;?>"
                                name="styleno[]"
                                value="<?php echo $rs['styleno']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="itemdesc<?php echo $i;?>"
                                name="itemdesc[]"
                                value="<?php echo $rs['itemdesc']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input style="width:120px"
                                    type="text"
                                    class="form-control"
                                    id="color<?php echo $i;?>"
                                name="color[]"
                                value="<?php echo $rs['color']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input style="width:120px"
                                    type="text"
                                    class="form-control"
                                    id="size<?php echo $i;?>"
                                name="size[]"
                                value="<?php echo $rs['size']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                
                <td style="padding: 0.3rem">
                  <select id="inspecttype<?php echo $i;?>" style="width:200px" name="inspecttype[]" class="select form-select">
                    <option value="">Select</option>
                    <?php 
                      $sql2 = "SELECT * FROM inspect_type ORDER BY id asc";
                      $result2 = mysqli_query($conn, $sql2);
                      while($rw1 = mysqli_fetch_array($result2)){
                        ?>
                     <option <?php if($rw1['id']==$rs['inspect']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['type'];?></option>
                        <?php }
                      ?>
                      
                    </select>
                  </td>
                  
                                  <td style="padding: 0.3rem">
                                   <input
                                                      type="text"
                                                      class="form-control"
                                                      id="offerqty<?php echo $i;?>"
                                                  name="offerqty[]"
                                                  value="<?php echo $rs['quantity']; ?>"
                                                      aria-label="Product barcode"/>
                                                         
                                  </td>  
                           <td style="padding: 0.3rem">
                  <select id="unit<?php echo $i;?>" name="unit[]" style="width:120px" class="select form-select">
                    <option value="">Select</option>
                    <?php 
                      $sql2 = "SELECT * FROM unit_master ORDER BY id asc";
                      $result2 = mysqli_query($conn, $sql2);
                      while($rw1 = mysqli_fetch_array($result2)){
                        ?>
    <option <?php if($rw1['unit']==$rs['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>

                        <?php }
                      ?>
                      
                    </select>
                  </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="aqllevel<?php echo $i;?>"
                                    name="aqllevel[]"                           
                                    aria-label="Product barcode"/>
                </td>
                
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="aqllimit<?php echo $i;?>"
                                    name="aqllimit[]"                            
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="manday<?php echo $i;?>"
                                    name="manday[]"  
                                    value= "<?php echo $rs['manday'];?>"
                                    onkeydown="ee1(this.id)"                            
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem" style="width:300px">
                <select id="staff<?php echo $i;?>" name="staff[<?php echo $i;?>][]" style="width:300px" data-live-search="true" class="select2 form-select" multiple>
                     <option value="">Select </option>
                     <?php 
$sql12 = "SELECT * FROM employee where depart='9' and status=1 order by name asc";
         $result12 = mysqli_query($conn, $sql12);
         while($rw5 = mysqli_fetch_array($result12))
{ ?>
              <option value="<?php echo $rw5['id'];?>"><?php echo $rw5['name'];?>
  </option>
<?php } ?>
                   </td>           
                
                   </tr>         <?php
                            $sno++; $i++;
    }
    $j=$i;
    $sn=$sno;
    for ($i = $j, $sno = $sn; $i <=29; $i++, $sno++) {

      ?>
                       <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                      <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
             
                                   <td style="padding: 0.3rem;">
                                   <select style="width:200px;text-transform:uppercase" name="factoryname[]" id="factoryname<?php echo $i;?>" class="select form-select" data-allow-clear="true" onchange="get_details(this.id,this.value);">
                                <option value="">Select</option>
                               
                              </select>
                </td>
               
                <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="location<?php echo $i;?>"
                                    name="location[]"                                    
                                    aria-label="Product barcode"/>       
                </td>
                <td style="padding: 0.3rem">
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
                                    id="itemdesc<?php echo $i;?>"
                                    name="itemdesc[]"                                    
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
                                    id="size<?php echo $i;?>"
                                    name="size[]"                                    
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
                                      id="offerqty<?php echo $i;?>"
                                      name="offerqty[]"                                    
                                      aria-label="Product barcode"/>       
                  </td>
                   <td style="padding: 0.3rem">
                  <select id="unit<?php echo $i;?>" name="unit[]" class="select form-select">
                    <option value="">Select</option>
                    <?php 
                      $sql2 = "SELECT * FROM unit_master ORDER BY id asc";
                      $result2 = mysqli_query($conn, $sql2);
                      while($rs = mysqli_fetch_array($result2)){
                        ?>
                        <option value="<?php echo $rs['unit'];?>"><?php echo $rs['unit'];?></option>
                        <?php }
                      ?>
                      
                    </select>
                  </td>
                  <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="aqllevel<?php echo $i;?>"
                                    name="aqllevel[]"
                                    
                                    aria-label="Product barcode"/>
                </td>
                  <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="aqllimit<?php echo $i;?>"
                                    name="aqllimit[]"
                                    
                                    aria-label="Product barcode"/>
                </td>
                  <td style="padding: 0.3rem">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="manday<?php echo $i;?>"
                                    name="manday[]"
                                    onkeydown="ee1(this.id)"
                                    aria-label="Product barcode"/>
                </td>

                <td style="padding: 0.3rem">
                <select id="staff<?php echo $i;?>"  name="staff[<?php echo $i;?>][]" data-live-search="true" style="width:300px"  class="select2 form-select" multiple>
                     <option value="">Select </option>
                     <?php 
$sql12 = "SELECT * FROM employee where depart='9' and status=1 order by name asc";
         $result12 = mysqli_query($conn, $sql12);
         while($rw5 = mysqli_fetch_array($result12))
{ ?>
              <option value="<?php echo $rw5['id'];?>"><?php echo $rw5['name'];?>
  </option>
<?php } ?>
                   </td>           
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
               
           
                          
                         <div class="col-12 d-flex justify-content-between ">
                              <a class="btn btn-label-dark btn-prev" href="staff_assignment_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Preview</span>
                              </a>
                             <?php if($create_permit==1){ ?>
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                              <?php } else { ?>
                              <button class="btn btn-success" disabled name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                              <?php } ?>
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
  $quote = $_POST['quote'];
  $pono = $_POST['pono'];
  $partyname = $_POST['partyname'];
  $supplyname = $_POST['supplyname'];

  if ($partyname != '') {
  $sql = "INSERT into staff_assign (dcno,date,quote,partyname,supplyname,pono)
  values('$dcno','$date','$quote','$partyname','$supplyname','$pono')";
  $result = mysqli_query($conn, $sql);
  }

  $cid = mysqli_insert_id($conn);

  foreach ($_POST['factoryname'] as $key => $val) {
    
    $factoryname = $_POST['factoryname'][$key];
    $location = $_POST['location'][$key];
    $styleno = $_POST['styleno'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $color = $_POST['color'][$key];
    $size = $_POST['size'][$key];
    $unit = $_POST['unit'][$key];
    $aqllevel = $_POST['aqllevel'][$key];
    $aqllimit = $_POST['aqllimit'][$key];
    $offerqty = $_POST['offerqty'][$key];
    $inspecttype = $_POST['inspecttype'][$key];
    $manday = $_POST['manday'][$key];

    if(isset($_POST['staff'][$key])){
      
    $processes=implode(",", $_POST['staff'][$key]);
    }
    else{
      $processes=0;
    }

    if ($factoryname != '') {
       $sql1 = "INSERT into staff_assign1 (cid,factoryname,location,offerqty,inspecttype,manday,staff,styleno,itemdesc,color,size,unit,aqllevel,aqllimit) 
 values ('$cid','$factoryname','$location','$offerqty','$inspecttype','$manday','$processes','$styleno','$itemdesc','$color','$size','$unit','$aqllevel','$aqllimit')";
      $result1 = mysqli_query($conn, $sql1);
    }
  
  
  if ($result) {

 echo "<script>alert('Staff Assigned Successfully');window.location='staff_assignment_list.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
}
?> 



<script>
function get_assign(value) {
 
//   alert(value);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

$('#partyname').val(data.partyname);
$('#pono').val(data.pono);
}

      }
    };
    xmlhttp.open("GET","ajax/get_assign.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_party(value) {
  // alert(value);
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
  for(var i=0;i<=200;i++)
	 {
   document.getElementById('factoryname'+i).innerHTML =r;
   }

}
};
xmlhttp.open("GET","ajax/get_assign1.php?id="+value,true);
xmlhttp.send();
  }
}
</script> 


<!-- <script>
function get_po(value) {
  
    // alert(c);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

}

      }
    };
    xmlhttp.open("GET","ajax/get_assign.php?id="+value,true);
    xmlhttp.send();
  }
}
</script> -->


<script>
function get_details(id,value) {
    var c=id.substr(11);
    // alert(c);
  var value2=document.getElementById('quote').value;
  var value3=document.getElementById('partyname').value;
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#location'+c).val(data.location);
$('#offerqty'+c).val(data.quantity);
$('#styleno'+c).val(data.styleno);
$('#itemdesc'+c).val(data.itemdesc);
$('#color'+c).val(data.color);
$('#size'+c).val(data.size);
$('#inspecttype'+c).val(data.inspect);
}

      }
    };
    xmlhttp.open("GET","ajax/get_details.php?id="+value+"&quote="+value2+"&partyname="+value3,true);
    xmlhttp.send();
  }
}
</script>

<!-- <script>
function get_party1(value) {
  // alert(value);
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
// alert(r);
  for(var i=0;i<=200;i++)
	 {
    $('#location'+i).val(data.city);
   }

}
};
xmlhttp.open("GET","ajax/getParty.php?id="+value,true);
xmlhttp.send();
  }
}
</script>  -->

<!-- <script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('myForm');
    const select = document.getElementById('ponakshathram');

    form.addEventListener('submit', function (event) {
        // Get selected options
        const selectedOptions = Array.from(select.selectedOptions).filter(option => option.value !== '');

        // Check if at least one option is selected
        if (selectedOptions.length === 0) {
            event.preventDefault();
            alert('Please select at least one Porunthum Nakshathram.');
			document.getElementById('ponakshathram').focus();
// alert(select);
            // Ensure the focus is set correctly after the alert is dismissed
            select.focus();
            setTimeout(() => {
                select.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 0);
        }
    });
});


</script> -->