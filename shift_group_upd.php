<?php include "config.php";include "head.php" ?>

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

         <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <div class="card-header d-flex align-items-center justify-content-between mb-4">
          <button class="btn btn-label-primary">Shift Group</button>
                    

</div>         
<form method="post" action="">
<div class="row">


<div class="col-xl-4 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-0">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                        
                       </a>
                       <div class="ms-auto">
                         
                       </div>
                     </div>
                     <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM shift_group where id=$sid order by id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_fetch_array($result);
                  $process=$count['shift'];
						   $processes=explode(",",$process);
                  ?>
                     <div class="col">
                       <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Edit</span>&nbsp;Shift&nbsp;Group</h5>
                    
                    </div>

<br>


                       <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                        <div class="mb-3">
                       <label class="form-label" for="add-user-fullname" hidden>ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="id"
                          placeholder="" 
                          name="id"
                          value=""
                          hidden
                          aria-label="John Doe"
                          />
                </div>

                          <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Shift Group Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="shiftname"
                          placeholder=" "
                          value="<?php echo $count['shiftname'];?>"
                          name="shiftname"
                          aria-label="John Doe" required/>
                      </div>

                      <div class="mb-3" >
                      <label class="form-label"  for="add-user-fullname">Shift</label>
                      <select  id="shift"  name="shift[]" data-live-search="true" class="select2 form-select" multiple>
                     <option value="">Select </option>
                     <?php 
             $sql12 = "SELECT * FROM shift group by shiftname order by id asc";
             $result12 = mysqli_query($conn, $sql12);
             while($rw5 = mysqli_fetch_array($result12))
              { 
                ?>

     <option <?php  if(in_array($rw5['id'], $processes)){ ?> Selected <?php } ?> value="<?php echo $rw5['id'];?>"><?php echo $rw5['shiftname'];?></option>
             </option>
              <?php }  ?>
                </select>
                      </div>
                      

<button type="submit" style="margin-top:100px" class="btn btn-success me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Update</button> 

  
         <a href="shift_group.php" class="btn btn-label-dark" style="margin-top:100px" >Preview</a>
                           
                </div>
             
     

                
                  </div>
                  

                   
                   </div>
                 </div>
               </div>
              
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
    
<?php include "footer.php"; ?>


  </body>
 

  <?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$shiftname=$_POST['shiftname'];
$processes=implode(",",$_POST['shift']);

if($id==""){
 	
  $sql="UPDATE shift_group SET shiftname='$shiftname',shift='$processes' WHERE id='$sid'";
  $result2=mysqli_query($conn, $sql);
}
 if($result2) { 
echo "<script>alert('Shift Group Updated Successfully');window.location='shift_group.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}

}
?> 







<script>
 function datediff(value) { 
  //  alert(id);
//alert(purchase_date)
//var c=id.substr(13);
//alert(c)
const date=document.getElementById('fdate').value?document.getElementById('fdate').value:0;
 const todate=document.getElementById('todate').value?document.getElementById('todate').value:0;
//alert(purchase_date);
//alert(warrenty_date);


const startDate  = date;
const endDate    = todate;

const diffInMs   = new Date(endDate) - new Date(startDate)
const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
// alert( diffInDays  );

document.getElementById('day').value=diffInDays; 

}
  </script>
