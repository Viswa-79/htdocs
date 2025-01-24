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
                      <button class="btn btn-primary">Project Expense</button>
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
                             style="background-color:#f5f5f5"
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
                              style="background-color:#f5f5f5"
                              value="<?php echo $wz1['date'];?>"
                              readonly
                              placeholder="" />
                          </div>                       
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quote&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="quote"
                              name="quote"
                              style="background-color:#f5f5f5"
                              class="form-control"
                              value="<?php echo $wz1['quote'];?>"
                              readonly
                              placeholder="" />
                          </div>                       
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">PO&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="pono"
                              name="pono"
                              class="form-control"
                              style="background-color:#f5f5f5"
                              value="<?php echo $wz1['pono'];?>"
                              readonly
                              placeholder="" />
                          </div>                       
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Party Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="form-control"  data-allow-clear="true"  style="pointer-events:none;background-color:#f5f5f5;text-transform:uppercase" >
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
                            <select name="supplyname" id="supplyname" style="pointer-events:none;background-color:#f5f5f5;text-transform:uppercase" class="form-control"  data-allow-clear="true" >
                               
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
                        
                        <div class="table-responsive content" style="height:250px">
                        <table class="table table-border table-responsive table-hover">
                              <thead class="border-bottom">
                                <tr>
                                <th style="width:50px">S.No</th> 
                                  <th>factory&nbsp;Name</th> 
                                  <th>location</th> 
                                  <th>Food&nbsp;+&nbsp;Transport&nbsp;+&nbsp;Accommodation</th> 
                                  <th>Other&nbsp;Expense</th> 
                                  <th>Total</th>
                                  

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
                                 <select  name="factoryname[]" id="factoryname<?php echo $i;?>" class="form-control" style="pointer-events:none; background-color:#f5f5f5;font-size:12px;text-transform:uppercase" data-allow-clear="true">
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
               <input 
                                  type="text"
                                  style="background-color:#f5f5f5"
                                  class="form-control"
                                  id="location<?php echo $i;?>"
                                  value="<?php echo $rw['location']; ?>"
                                  name="location[]"
                                  aria-label="Product barcode" 
                                  readonly/>                
              </td>
              
              <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="exp_amt<?php echo $i;?>"
                                  name="exp_amt[]" 
                                  
                                  value="<?php echo $rw['exp_amt']; ?>"
                                  onkeyUp="tott(exp_amt<?php echo $i;?>.id);"
                                  aria-label="Product barcode"
                                />
                                                  
              </td>
              
              <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="other_exp<?php echo $i;?>"
                                  name="other_exp[]"
                                  value="<?php echo $rw['other_exp']; ?>"

                                  onkeyUp="tott(exp_amt<?php echo $i;?>.id);"
                                  aria-label="Product barcode"
                                /> 

              </td>
              
              <td style="padding: 0.3rem">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="total<?php echo $i;?>"
                                  name="total[]"
                                  value="<?php echo $rw['total']; ?>"
                                  style="background-color:#f5f5f5"
                                  onkeyUp="tott(exp_amt<?php echo $i;?>.id);"
                                  aria-label="Product barcode"
                                
                                  readonly/>                
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
  

  foreach($_POST['factoryname'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];    
      $exp_amt = $_POST['exp_amt'][$key];
      $other_exp= $_POST['other_exp'][$key];
      $total = $_POST['total'][$key];
     

      
     
    
   
     $sq1 = "UPDATE staff_assign1 SET exp_amt='$exp_amt',other_exp='$other_exp',total='$total' WHERE id='$rid'";
    $result = mysqli_query($conn, $sq1);

  

}
if($result){
  echo "<script>alert('Staff Updated Successfully');window.location='staff_assign_list.php';</script>";

  } 
  else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }

}
?> 

<script language="javascript" type="text/javascript">

function tott(id)
{

    var c=(id.substr(7));

        var t1=document.getElementById('exp_amt'+c).value?document.getElementById('exp_amt'+c).value:0;
        var cgst=document.getElementById('other_exp'+c).value?document.getElementById('other_exp'+c).value:0;

      var tot=parseFloat(t1)+parseFloat(cgst);
	  
	  document.getElementById('total'+c).value=tot;

}
</script>