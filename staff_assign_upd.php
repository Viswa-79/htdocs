<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

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
                      <button class="btn btn-primary">Inspector Assignment</button>
                      <a href="staff_assign_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Inspector
                          </a>
                    </div>  <br>      <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>               
                                <div class="card mb-2 mt-2">
                      <form  action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        <!-- Personal Info -->
                        <?php
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=17";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $write_permit = $row['write_access'];

                              $sql4 = " SELECT * FROM staff_assign WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                              $party=$wz1['partyname'];
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content card-body">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Book&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              readonly
                              value="<?php echo $wz1['dcno']; ?>"
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
                              value="<?php echo $wz1['date'];?>"
                              placeholder="" />
                          </div>                       
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quote&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="quote"
                              name="quote"
                              class="form-control"
                              value="<?php echo $wz1['quote'];?>"
                              placeholder="" />
                          </div>                       
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PO&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              class="form-control"
                              value="<?php echo $wz1['pono'];?>"
                              placeholder="" />
                          </div>                       
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Party Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true"  style="text-transform:uppercase">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster Where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Supplier Name&nbsp;</label>
                            <select name="supplyname" id="supplyname" class="select form-select" data-allow-clear="true" style="text-transform:uppercase" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster Where party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['supplyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                
                              </select>
                          </div>
                          </div><br><hr>
                        <div >
                        
                        <div class="table-responsive content" style="height:500px">
                        <table class="table table-border table-responsive table-hover">
                              <thead class="border-bottom">
                                <tr>
                                <th style="width:50px">S.No</th> 
                                  <th>factory&nbsp;Name</th> 
                                  <th>location</th> 
                                  <th>style&nbsp;no</th> 
                                  <th>item&nbsp;description</th> 
                                  <th>color</th> 
                                  <th>size</th> 
                                  <th>inspection&nbsp;type</th>
                                  <th>order&nbsp;qty</th>
                                  <th>unit</th>
                                  <th>aql&nbsp;level</th>
                                  <th>aql&nbsp;limit</th>
                                  <th>manday</th> 
                                  <th style="width:300px">inspector&nbsp;</th> 

                                </tr>
                              </thead>
                              <tbody>
                              <?php
                                  $sno=1; $i=0;
                              $sql4 = "SELECT * FROM staff_assign1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                $process=$rw['staff'];
						   $processes=explode(",",$process);

               $sql11 = " SELECT * FROM partymaster WHERE id='$party'";
               $result11 =mysqli_query($conn, $sql11);
               $rw11=mysqli_fetch_array($result11);
                $city=$rw11['city'];
                                  ?>
                             <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                                <tr>
                                <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
            
                                 <td style="padding: 0.3rem">
                                 <select style="width:200px;text-transform:uppercase" name="factoryname[]" id="factoryname<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM assignment order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw1 = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw1['id']==$rw['factoryname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?>,&nbsp; <?php echo $city;?></option>
                    <?php } ?>
                                
                              </select>
                                     
              </td> 
               
              <td style="padding: 0.3rem">
               <input style="width:150px"
                                  type="text"
                                  class="form-control"
                                  id="location<?php echo $i;?>"
                                  value="<?php echo $rw['location']; ?>"
                                  name="location[]"
                                  aria-label="Product barcode"/>                
              </td>
              
              <td style="padding: 0.3rem">
               <input style="width:120px"
                                  type="text"
                                  class="form-control"
                                  id="styleno<?php echo $i;?>"
                                  value="<?php echo $rw['styleno']; ?>"
                                  name="styleno[]"
                                  aria-label="Product barcode"/>                
              </td>
              
              <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="itemdesc<?php echo $i;?>"
                                  value="<?php echo $rw['itemdesc']; ?>"
                                  name="itemdesc[]"
                                  aria-label="Product barcode"/>                
              </td>
              
              <td style="padding: 0.3rem">
               <input style="width:120px"
                                  type="text"
                                  class="form-control"
                                  id="color<?php echo $i;?>"
                                  value="<?php echo $rw['color']; ?>"
                                  name="color[]"
                                  aria-label="Product barcode"/>                
              </td>
              
              <td style="padding: 0.3rem">
               <input style="width:120px"
                                  type="text"
                                  class="form-control"
                                  id="size<?php echo $i;?>"
                                  value="<?php echo $rw['size']; ?>"
                                  name="size[]"
                                  aria-label="Product barcode"/>                
              </td>
              
              <td style="padding: 0.3rem">
                                <select  name="inspecttype[]" style="width:160px" id="inspecttype<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM inspect_type order by id asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['inspecttype']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['type'];?></option>
                    <?php } ?>
                                
                              </select>
                              </td>

                   <td style="padding: 0.3rem">
               <input style="width:120px"
                                  type="text"
                                  class="form-control"
                                  id="offerqty<?php echo $i;?>"
                                  value="<?php echo $rw['offerqty']; ?>"
                                  name="offerqty[]"
                                  aria-label="Product barcode"/>                
              </td>
              <td style="padding: 0.3rem">
                                <select  name="unit[]" id="unit<?php echo $i;?>" class="select form-select" style="width:120px" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM unit_master order by id asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['unit']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                              </td>
              <td style="padding: 0.3rem">
               <input style="width:120px"
                                  type="text"
                                  class="form-control"
                                  id="aqllevel<?php echo $i;?>"
                                  value="<?php echo $rw['aqllevel']; ?>"
                                  name="aqllevel[]" 
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input style="width:120px"
                                  type="text"
                                  class="form-control"
                                  id="aqllimit<?php echo $i;?>"
                                  value="<?php echo $rw['aqllimit']; ?>"
                                  name="aqllimit[]" 
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="manday<?php echo $i;?>"
                                  value="<?php echo $rw['manday']; ?>"
                                  name="manday[]" 
                                   onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"/>
                                     
              </td>
              
              <td style="padding: 0.3rem">
              <select id="staff<?php echo $i;?>" name="staff[<?php echo $i;?>][]"  class="select2 form-select" multiple>
                     <option value="">Select </option>
                     <?php
         $sql = "SELECT * FROM employee where depart='9' and status=1 group by name order by name asc";
         $result = mysqli_query($conn, $sql);
         while($rows = mysqli_fetch_array($result))
{
        ?>
           <option <?php  if(in_array($rows['id'], $processes)){ ?> Selected <?php } ?> value="<?php echo $rows['id'];?>"><?php echo $rows['name'];?></option>
                    <?php 
					} ?>
                </select>
              </td>
                                 
                                  
                                </tr>                   
<?php $sno++; $i++;
                              }
                              // $j=$i;
                              // $sn=$sno;
                              // for ($i=$j, $sno=$sn; $i<=50;$i++, $sno++){
                              ?>

                              <!-- <input type="text" hidden name="rid[]" id="rid" value="">
                              
                              <tr id="s1<?php echo $i; ?>" style="display:none">
                                <td  style="padding: 0.3rem;text-align:center"> 
                                 <?php echo $sno; ?>                                  
                               </td>
            
                                 <td style="padding: 0.3rem">
                                 <select  name="factoryname[]" id="factoryname<?php echo $i;?>" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					// $sql = "SELECT * FROM assignment order by name asc";
          //           $result = mysqli_query($conn, $sql);
          //           while($rw1 = mysqli_fetch_array($result))
					// { ?>
                     <option value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php //} ?>
                                
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
               <input 
                                  type="text"
                                  class="form-control"
                                  id="inspecttype<?php echo $i;?>"
                                  name="inspecttype[]"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="manday<?php echo $i;?>"
                                  name="manday[]"
                                   onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"/>
                                     
              </td>
             
              <td style="padding: 0.3rem">
              <select id="staff<?php echo $i;?>"  name="staff[<?php echo $i;?>][]" data-live-search="true" style="width:300px" class="select2 form-select" multiple>
                     <option value="">Select </option>
                     <?php 
// $sql12 = "SELECT * FROM employee where depart='9' order by name asc";
//          $result12 = mysqli_query($conn, $sql12);
        //  while($rw5 = mysqli_fetch_array($result12))
// { ?>
              <option value="<?php echo $rw5['id'];?>"><?php echo $rw5['name'];?>
  </option>
<?php //} ?>    
              </td>
                                 
                                  
                                </tr>     -->
                              <?php  
                              // }
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
                              <a class="btn btn-label-dark btn-prev" href="staff_assign_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Back</span>
  </a>
  <?php if($write_permit==1){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } else {
                                
                              ?>
                              <button disabled class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
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
  
  $cid =$_POST['cid'];
  $dcno = $_POST['dcno'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $supplyname = $_POST['supplyname'];
  $quote = $_POST['quote'];
  $pono = $_POST['pono'];

   $sql = "UPDATE staff_assign SET dcno='$dcno',date='$date',partyname='$partyname',quote='$quote',supplyname='$supplyname',pono='$pono' WHERE id='$sid'";
  $result = mysqli_query($conn, $sql);

  foreach($_POST['factoryname'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];    
      $factoryname = $_POST['factoryname'][$key];
      $location = $_POST['location'][$key];
      $styleno = $_POST['styleno'][$key];
      $itemdesc = $_POST['itemdesc'][$key];
      $color = $_POST['color'][$key];
      $size = $_POST['size'][$key];
      $offerqty = $_POST['offerqty'][$key];
      $unit = $_POST['unit'][$key];
      $aqllevel = $_POST['aqllevel'][$key];
      $aqllimit = $_POST['aqllimit'][$key];
      $inspecttype = $_POST['inspecttype'][$key];
      $manday = $_POST['manday'][$key];

      if(isset($_POST['staff'][$key])){
      
        $processes=implode(",", $_POST['staff'][$key]);
        }
        else{
          $processes=0;
        }
    
     
    
   
    $sq1 = "UPDATE staff_assign1 SET factoryname='$factoryname',location='$location',styleno='$styleno',itemdesc='$itemdesc',color='$color',size='$size',offerqty='$offerqty',inspecttype='$inspecttype',manday='$manday',staff='$processes',unit='$unit',aqllevel='$aqllevel',aqllimit='$aqllimit' WHERE id='$rid'";
    $res1 = mysqli_query($conn, $sq1);

  
//     else{
		 
//       $sq2 = "INSERT into staff_assign1 (cid,factoryname,offerqty,inspecttype,manday,staff) 
//  values ('$sid','$factoryname','$offerqty','$inspecttype','$manday','$processes')";
//       $res2 = mysqli_query($conn, $sq2);
//     }
  
}
if($result){
  echo "<script>alert('Staff Updated Successfully');window.location='staff_assign_list.php';</script>";

  } 
  else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }

}
?> 