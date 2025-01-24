<?php include "config.php";include "head.php";include "session.php";?>


  <body>
  <script src="sweetalert2@11.js"></script>  

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
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-4">
          <h3> <button class="btn btn-label-primary"> Documents Details</button></h3>
                     
          <a href="emp_master1.php" class="btn btn-outline-warning"> <i class="ti-xs ti ti-eye me-1"></i>View List</a>

</div> 

<?php
		 $sid=base64_decode($_GET['cid']);
		 ?>  
                          
                            
                            <?php
                              $sql4 = " SELECT * FROM employee WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>

<input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />
<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-12"> 
<!-- <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item">
                      <a class="nav-link " href="javascript:void(0);"
                        ><i class="ti-xs ti ti-users me-1"></i> Account</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href=""
                        ><i class="ti-xs ti ti-lock me-1"></i> Security</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href=""
                        ><i class="ti-xs ti ti-file-description me-1"></i> Documents</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href=""
                        ><i class="ti-xs ti ti-bell me-1"></i> Notifications</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href=""
                        ><i class="ti-xs ti ti-link me-1"></i> Connections</a
                      >
                    </li>
                  </ul> -->
</div>
<div class="col-6">


                   
<div class="card mb-4">
<div class="card-header d-flex align-items-center justify-content-between">
                    <h5 style="margin:0px">Aadhaar Details</h5>
                    <button
                          type="button" 
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter">
                          Edit
                        </button>
                    <!-- Account -->
</div>
                    <hr class="my-0" />
                    <div class="card-body">
                  
                    
                        <div class="row">
                       
                        <div style="background-color:#E1E1E1;border-radius:5px;margin-top:5px;width:200px;" class="col p-2 card-box rounded-5px gap-3" >
                                            <h5 class="mb-0 fw-semibold">Aadhaar No</h5>
                                            <h6 class="mb-0 fw-semibold mt-2"><?php echo $wz1['adhno'];?></h6>
                                        </div>&nbsp;
                                        <div class="col p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-top:5px;width:200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold">Details</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['adhimg']!=''){?><a href="uploads/<?php echo $wz1['adhimg']; ?>" target="blank">Preview Image&nbsp;</a>  <?php }
                                            ?>  </h6>
                                        </div>

                                     

                           
                        </div>
                       
                     
                       </div>
                     </div> 
                     </div> 
   
                     <div class="col-6">
                     <div class="card mb-4">
                     <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 style="margin:0px">PAN Details</h5>
                    <!-- Account -->
                    <button
                                        type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter2">
                          Edit
                        </button>
</div>
                    <hr class="my-0" />
                    <div class="card-body">
                    
                        <div class="row">
                        <div style="background-color:#E1E1E1;border-radius:5px;margin-top:5px;width:200px;" class="col p-2 card-box rounded-5px gap-3" >
                                            <h5 class="mb-0 fw-semibold">PAN No</h5>
                                            <h6 class="mb-0 fw-semibold mt-2"><?php echo $wz1['panno'];?></h6>
                                        </div>&nbsp;
                                        <div class="col p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-top:5px;width:200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold">Details</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['panimg']!=''){?><a href="uploads/<?php echo $wz1['panimg']; ?>" target="blank">Preview Image</a>  <?php }
                                            ?>  </h6>
                                        </div>

                                      

                          </div>
                       
                     
                       </div>
                     </div> 
                     </div> 
                    </div>



                    <div class="col-12">
                     <div class="card mb-4">
                     <div class="card-header d-flex align-items-center justify-content-between">

                    <h5 style="margin:0px">Other Details</h5>
                    <!-- Account -->
                    <button
                          type="button"
                        
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter3">
                          Edit
                        </button>
                </div>
                    <hr class="my-0" />
                    <div class="card-body">
                    
                        <div class="row" >
                        <div class="col-md-2 p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-left:5px;margin-top:5px;width: 200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold"><?php if($wz1['docname1']!=''){?><?php echo $wz1['docname1']; ?><?php }else{
                                            ?>Document 1<?php } ?></h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['doc1']!=''){?><a href="uploads/<?php echo $wz1['doc1']; ?>" target="blank">Preview Image  </a> <?php }
                                            ?>  </h6>
                                        </div>&nbsp;
                                        <div class="col-md-2 p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-left:5px;margin-top:5px;width: 200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold"><?php if($wz1['docname2']!=''){?><?php echo $wz1['docname2']; ?><?php }else{
                                            ?>Document 2<?php } ?></h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['doc2']!=''){?><a href="uploads/<?php echo $wz1['doc2']; ?>" target="blank">Preview Image</a>  <?php }
                                            ?>  </h6>
                                        </div>&nbsp;
                                        <div class="col-md-2 p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-left:5px;margin-top:5px;width: 200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold"><?php if($wz1['docname3']!=''){?><?php echo $wz1['docname3']; ?><?php }else{
                                            ?>Document 3<?php } ?></h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['doc3']!=''){?><a href="uploads/<?php echo $wz1['doc3']; ?>" target="blank">Preview Image</a>  <?php }
                                            ?>  </h6>
                                        </div>&nbsp;
                                        <div class="col-md-2 p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-left:5px;margin-top:5px;width: 200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold"><?php if($wz1['docname4']!=''){?><?php echo $wz1['docname4']; ?><?php }else{
                                            ?>Document 4<?php } ?></h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['doc4']!=''){?><a href="uploads/<?php echo $wz1['doc4']; ?>" target="blank">Preview Image</a>  <?php }
                                            ?>  </h6>
                                        </div>&nbsp;
                                        <div class="col-md-2 p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-left:5px;margin-top:5px;width: 200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold"><?php if($wz1['docname5']!=''){?><?php echo $wz1['docname5']; ?><?php }else{
                                            ?>Document 5<?php } ?></h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['doc5']!=''){?><a href="uploads/<?php echo $wz1['doc5']; ?>" target="blank">Preview Image</a>  <?php }
                                            ?>  </h6>
                                        </div>&nbsp;
                                        <div class="col-md-2 p-2 card-box rounded-5px gap-3" style="background-color:#E1E1E1;border-radius:5px;margin-left:5px;margin-top:5px;width: 200px;" >
                                            
                                            <h5 class="mb-0 fw-semibold"><?php if($wz1['docname6']!=''){?><?php echo $wz1['docname6']; ?><?php }else{
                                            ?>Document 6<?php } ?></h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap"><?php if($wz1['doc6']!=''){?><a href="uploads/<?php echo $wz1['doc6']; ?>" target="blank">Preview Image</a>  <?php }
                                            ?>  </h6>
                                        </div>
                         
                          
                       </div>
                     </div> 
                     </div> 
                    </div>

                         
                          
                         
                        
                         
                          
                        </div>
                       
                     
                    </div>
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



      <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Aadhaar Details</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Aadhaar No</label>
                                    <input
                                      type="number"
                                      id="adhno"
                                      name="adhno"
                                      class="form-control"
                                      placeholder="xxxx@xxx.xx" value="<?php echo $wz1['adhno'];?>"/>
                                  </div>
                                  <div class="col mb-0">
                                    <label for="adhimg" class="form-label">Image</label>
                                    <input type="file" id="adhimg" class="form-control"  name="adhimg" /><?php echo $wz1['adhimg']; ?>
                                    <input class="form-control " type="text"  name="photo1" id="photo1" value="<?php echo $wz1['adhimg']; ?>" hidden>

                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit"  name="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>





                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">PAN Details</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">PAN No</label>
                                    <input
                                      type="text"
                                      id="panno"
                                      name="panno"
                                      class="form-control"
                                      placeholder="xxxx@xxx.xx"
                                      value="<?php echo $wz1['panno'];?>" />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Image</label>
                                    <input type="file" id="panimg"     name="panimg" class="form-control" />
                                    <input class="form-control " type="text"  name="photo2" id="photo2" value="<?php echo $wz1['panimg']; ?>" hidden>

                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit2" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"><small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter3" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Other Details</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                
                                <div class="row g-2">
                                <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Document Name</label>
                                    <input
                                      type="text"
                                      id="docname1"
                                      name="docname1"
                                      class="form-control"
                                      value="<?php echo $wz1['docname1']; ?>"
                                      />
                                     

                                  </div>
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Document 1</label>
                                    <input
                                      type="file"
                                      id="doc1"
                                      name="doc1"
                                      class="form-control"
                                      />
                                      <input class="form-control " type="text"  name="photo3" id="photo3" value="<?php echo $wz1['doc1']; ?>" hidden>

                                  </div>
                                  </div>
                                  <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Document Name</label>
                                    <input type="text" id="docname2"    name="docname2" class="form-control" value="<?php echo $wz1['docname2']; ?>" />
                                   
                                  </div>
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Document 2</label>
                                    <input type="file" id="doc2"    name="doc2" class="form-control" />
                                    <input class="form-control " type="text"  name="photo4" id="photo4" value="<?php echo $wz1['doc2']; ?>" hidden>
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Document Name</label>
                                    <input
                                      type="text"
                                      id="docname3"    name="docname3"
                                      class="form-control"
                                      value="<?php echo $wz1['docname3']; ?>"
                                      />
                                     
                                  </div>
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Document 3</label>
                                    <input
                                      type="file"
                                      id="doc3"    name="doc3"
                                      class="form-control"
                                      />
                                      <input class="form-control " type="text"  name="photo5" id="photo5" value="<?php echo $wz1['doc3']; ?>" hidden>
                                  </div>
                                  </div>
                                  <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Document Name</label>
                                    <input type="text" id="docname4"    name="docname4" class="form-control"  value="<?php echo $wz1['docname4']; ?>" />
                                   

                                  </div>
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Document 4</label>
                                    <input type="file" id="doc4"    name="doc4" class="form-control" />
                                    <input class="form-control " type="text"  name="photo6" id="photo6" value="<?php echo $wz1['doc4']; ?>" hidden>

                                  </div>
                                  </div>

                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Document Name</label>
                                    <input
                                      type="text"
                                      id="docname5"
                                      name="docname5"
                                      class="form-control"
                                      value="<?php echo $wz1['docname5']; ?>"
                                      />
                                      </div>
                                     
                                      <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Document 5</label>
                                    <input
                                      type="file"
                                      id="doc5"
                                      name="doc5"
                                      class="form-control"
                                      />
                                      <input class="form-control " type="text"  name="photo7" id="photo7" value="<?php echo $wz1['doc5']; ?>" hidden>

                                  </div>
                                  </div>
                                  <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Document Name</label>
                                    <input type="text" id="docname6"     name="docname6" class="form-control"  value="<?php echo $wz1['docname6']; ?>"/>
                                    </div>
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Document 6</label>
                                    <input type="file" id="doc6"     name="doc6" class="form-control" />
                                    <input class="form-control " type="text"  name="photo8" id="photo8" value="<?php echo $wz1['doc6']; ?>" hidden>

                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit3" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


</form>




                    <?php
if(isset($_POST['submit']))
{
 
    $adhno=$_POST['adhno'];


    if($_FILES['adhimg']['name']!='')
    {
  $p1 = $_FILES['adhimg']['name'];
   $p_tmp1 = $_FILES['adhimg']['tmp_name'];
   $path = "uploads/$p1";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p1 = $_REQUEST['photo1'];
 }
   






 
				





  $sql="UPDATE employee SET adhno='$adhno',adhimg='$p1' WHERE id='$sid'";
  $result1=mysqli_query($conn, $sql);

  $id=base64_encode($sid);





if ($result1) {
  echo "<script>
  Swal.fire({
    title: 'Updated!',
    text: 'Aadhaar  Details Updated successfully.',
    icon: 'success',
    confirmButtonText: 'OK'
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'demo.php?cid=$id'; // Corrected line
    }
  });
</script>";
} 

else {
  echo '<script>
          Swal.fire({
            title: "Error!",
            text: "There was an error saving the Aadhaar.",
            icon: "error",
            confirmButtonText: "OK"
          });
        </script>';
}


}
?> 





                    
                <?php
if(isset($_POST['submit2']))
{
 



  $panno=$_POST['panno'];
   



    if($_FILES['panimg']['name']!='')
    {
  $p2 = $_FILES['panimg']['name'];
   $p_tmp1 = $_FILES['panimg']['tmp_name'];
   $path = "uploads/$p2";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p2 =$_REQUEST['photo2'];
 }
   
 
				





 $sql="UPDATE employee SET panno='$panno',panimg='$p2' WHERE id='$sid'";
  $result2=mysqli_query($conn, $sql);
  $id=base64_encode($sid);

  if ($result2) {
    echo "<script>
    Swal.fire({
      title: 'Updated!',
      text: 'PAN  Details Updated successfully.',
      icon: 'success',
      confirmButtonText: 'OK'
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'demo.php?cid=$id'; // Corrected line
      }
    });
  </script>";
  } 
  
  else {
    echo '<script>
            Swal.fire({
              title: "Error!",
              text: "There was an error saving the PAN.",
              icon: "error",
              confirmButtonText: "OK"
            });
          </script>';
  }


}
?> 






     
<?php
if(isset($_POST['submit3']))
{
 
  $docname1=$_POST['docname1'];
  $docname2=$_POST['docname2'];
  $docname3=$_POST['docname3'];
  $docname4=$_POST['docname4'];
  $docname5=$_POST['docname5'];
  $docname6=$_POST['docname6'];

    

    if($_FILES['doc1']['name']!='')
    {
  $p3 = $_FILES['doc1']['name'];
   $p_tmp1 = $_FILES['doc1']['tmp_name'];
   $path = "uploads/$p3";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p3 = $_REQUEST['photo3'];
 }
   

    if($_FILES['doc2']['name']!='')
    {
  $p4 = $_FILES['doc2']['name'];
   $p_tmp1 = $_FILES['doc2']['tmp_name'];
   $path = "uploads/$p4";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p4 = $_REQUEST['photo4'];
 }
   

    if($_FILES['doc3']['name']!='')
    {
  $p5 = $_FILES['doc3']['name'];
   $p_tmp1 = $_FILES['doc3']['tmp_name'];
   $path = "uploads/$p5";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p5 = $_REQUEST['photo5'];
 }
   

    if($_FILES['doc4']['name']!='')
    {
  $p6 = $_FILES['doc4']['name'];
   $p_tmp1 = $_FILES['doc4']['tmp_name'];
   $path = "uploads/$p6";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p6 = $_REQUEST['photo6'];
 }
   

    if($_FILES['doc5']['name']!='')
    {
  $p7 = $_FILES['doc5']['name'];
   $p_tmp1 = $_FILES['doc5']['tmp_name'];
   $path = "uploads/$p7";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p7 = $_REQUEST['photo7'];
 }
   

    if($_FILES['doc6']['name']!='')
    {
  $p8 = $_FILES['doc6']['name'];
   $p_tmp1 = $_FILES['doc6']['tmp_name'];
   $path = "uploads/$p8";
   $move = move_uploaded_file($p_tmp1, $path);
 }
 else
 {
     $p8 = $_REQUEST['photo8'];
 }
   



 
				





  $sql="UPDATE employee SET docname1='$docname1',docname2='$docname2',docname3='$docname3',docname4='$docname4',docname5='$docname5',docname6='$docname6',doc1='$p3',doc2='$p4',doc3='$p5',doc4='$p6',doc5='$p7',doc6='$p8' WHERE id='$sid'";
  $result3=mysqli_query($conn, $sql);
  $id=base64_encode($sid);
  if ($result3) {
    echo "<script>
    Swal.fire({
      title: 'Updated!',
      text: ' Documents Updated successfully.',
      icon: 'success',
      confirmButtonText: 'OK'
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'demo.php?cid=$id'; // Corrected line
      }
    });
  </script>";
  } 
  
  else {
    echo '<script>
            Swal.fire({
              title: "Error!",
              text: "There was an error saving the Documents.",
              icon: "error",
              confirmButtonText: "OK"
            });
          </script>';
  }


}
?> 




     

    
<?php include "footer.php"; ?>
  </body>



