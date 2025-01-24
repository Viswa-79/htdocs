<?php include "config.php";include "head.php";include "session.php";?>

  <body>
 
  <script src="sweetalert2@11.js"></script>  
  <script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(7));

d=c-1;
e=parseInt(c)+1;



document.getElementById('s1'+e).style.display='block';




}

</script>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php"; ?>
        <?php  ?>
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
          <button class="btn btn-primary">Department</button>
                     
                    <?php  
                    $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=1";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $write_permit = $row['write_access'];
                    

                    if($create_permit==1){?>
                                  <button class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="addCurrency();" ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add New</button>
                                  <?php }
                                  else{?>  
            <button class="btn btn-primary  btn-group" style="color:white" disabled data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="addCurrency();" ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add New</button>
                                    <?php } ?>
</div>         
   <!-- Teams Cards -->
   <div class=" row g-4">
               
             
              
               
   <?php
                                      $sno=1;$i=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM depart  order by id asc ";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                 
                         if($count>0)
                         {
                          while($rows=mysqli_fetch_array($result))

                         {
                         
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php  echo $rows['id'];?>">
              
             
               <div class="col-xl-4 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-3">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                         <div class="me-2 text-body h5 mb-0"><?php echo $rows['depname'];?></div>
                       </a>
                       <div class="ms-auto">
                         <ul class="list-inline mb-0 d-flex align-items-center">
                         
                           <li class="list-inline-item">
                             <div class="dropdown">
                               <button
                                 type="button"
                                 class="btn dropdown-toggle hide-arrow p-0"
                                 data-bs-toggle="dropdown"
                                 aria-expanded="false">
                                 <i class="ti ti-dots-vertical text-muted"></i>
                               </button>
                               <ul class="dropdown-menu dropdown-menu-end">
                                 
                                 <li>
                                 <?php
                                 if($write_permit==1){
                                  ?>
                                 <a class="dropdown-item"  id="edit<?php echo $sno;?>" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="getCurr(this.id,this.value);" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>&nbsp;&nbsp;Edit</a>
                                <?php
                                 }
                                 else{
                                  ?> 
                                            <button class="dropdown-item" disabled id="edit<?php echo $sno;?>" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="getCurr(this.id,this.value);" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>&nbsp;&nbsp;Edit</button>

                                  <?php
                                 }
                                 ?>
                               </li>
                                 <li>
                                   <hr class="dropdown-divider" />
                                 </li>
                                 <li>
                                  <?php
                                  if($delete_permit==1){
                                    ?>
                                 <a type="button" 
                          class="dropdown-item"
                          id="del<?php echo $sno;?>" onclick="delCurr(this.id,this.value);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>
                                   <?php
                                  }
                                  else{
                                    ?>
                                        <button
                          class="dropdown-item" disabled
                          id="del<?php echo $sno;?>" onclick="delCurr(this.id,this.value);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                                  </button>
                                    <?php
                                  }
                                  ?>
                                 </li>
                               </ul>
                             </div>
                           </li>
                         </ul>
                       </div>
                     </div>
                     
                    

                     <?php
                                    
                      // LOOP TILL END OF DATA
                     $sql1 = " SELECT * FROM  employee where depart='".$rows['id']."' ";
                  $result1 =mysqli_query($conn, $sql1);
                  $count1=mysqli_num_rows($result1);
                 
                       
                  ?>

                     <div class="row gx-0 gap-3 mt-4">
                            <div style="background-color:#E1E1E1;border-radius:5px" class="col p-2 card-box rounded-5px">
                                <h5 class="mb-0 fw-semibold"><?php echo $count1 ?></h5>
                                <h6 class="mb-0 fw-semibold mt-2">Total Employees</h6>
                            </div>
                            <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                
                                <h5 class="mb-0 fw-semibold">0</h5>
                                <h6 class="mb-0 fw-semibold mt-2 text-nowrap">Employees Present</h6>
                            </div>
                        </div>
                       
                 
                   </div>
                 </div>
               </div>

               <?php
              
              $sno++;$i++;
              
              } ?>
                        </tr>
                        <?php
                 
                      }
                    
                    
                 else{ ?>
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>







             </div>
             <!--/ Teams Cards -->


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



      <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Department</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                    <form action="" method="post">
                     
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
                         
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Department Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="depname"
                          placeholder=" "
                          autofocus
                         
                          name="depname"
                          aria-label="John Doe" required/>
                      </div>
             
                     
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
                </div>




                <?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];  
    $depname = $_POST['depname'];

    if ($id == "") {
        // Check for duplicate department name before inserting
        $checkDuplicate = "SELECT * FROM depart WHERE depname='$depname'";
        $resultDuplicate = mysqli_query($conn, $checkDuplicate);
        $countDuplicate = mysqli_num_rows($resultDuplicate);

        if ($countDuplicate > 0) {
            echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Found Duplicate Name In Department.",
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "depart.php";
                        }
                    });
                  </script>';
        } else {
            $sql = "INSERT INTO depart (depname) VALUES ('$depname')";
            $result3 = mysqli_query($conn, $sql);

            if ($result3) {
                echo '<script>
                        Swal.fire({
                            title: "Success!",
                            text: "Department has been saved successfully.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "depart.php";
                            }
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            title: "Error!",
                            text: "An error occurred while saving the department.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                      </script>';
            }
        }
    } else {
        // Check for duplicate department name before updating
        $checkDuplicate = "SELECT * FROM depart WHERE depname='$depname' AND id != '$id'";
        $resultDuplicate = mysqli_query($conn, $checkDuplicate);
        $countDuplicate = mysqli_num_rows($resultDuplicate);

        if ($countDuplicate > 0) {
            echo '<script>
                    Swal.fire({
                        title: "Error!",
                        text: "Found Duplicate Name In Department.",
                        icon: "error",
                        confirmButtonText: "OK"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "depart.php";
                        }
                    });
                  </script>';
        } else {
            $sql1 = "UPDATE depart SET depname='$depname' WHERE id='$id'";
            $result2 = mysqli_query($conn, $sql1);

            if ($result2) {
                echo '<script>
                        Swal.fire({
                            title: "Updated!",
                            text: "Department has been updated successfully.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "depart.php";
                            }
                        });
                      </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            title: "Error!",
                            text: "An error occurred while updating the department.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                      </script>';
            }
        }
    }
}
?>
















              


<script>
function getCurr(id,value) {
 //alert(id);
  document.getElementById('form-title').innerHTML='Edit';
  var c=(id.substr(4));
	///alert(c);
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                    $('#id').val(data.id);  
                    $('#depname').val(data.depname);                 
                    
}

      }
    };
    xmlhttp.open("GET","ajax/getdepname.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script> 


<script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');  
                    $('#depname').val('');                 
                   
}
</script>

</script>

<script>
function delCurr(id) {
  var c = id.substr(3);
  var user_id = document.getElementById('id' + c).value;

  // Using SweetAlert for confirmation
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result4) => {
    if (result4.isConfirmed) {
      // User confirmed deletion
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          r = xmlhttp.responseText;
          const data = JSON.parse(r);
          if (data.sts == 'ok') {
            // Notify user and redirect on success
            Swal.fire('Deleted!', 'Your file has been deleted.', 'success').then(() => {
              window.location = 'depart.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/deldept.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>


<?php include "footer.php"; ?>
  </body>


  
