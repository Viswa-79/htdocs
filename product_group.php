<?php include "config.php";include "head.php" ?>

  <body>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
          <button class="btn btn-label-primary">Product Group</button>

</div>         
<form method="post" action="">
<div class="row">


<div class="col-xl-8 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-0">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                         <div class="me-2 text-body h5 mb-0"><?php echo $rows['depname'];?></div>
                       </a>
                       <div class="ms-auto">
                         
                       </div>
                     </div>
                     
 
                  <div  class="card-datatable table-responsive">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <th style="text-align:center">ID</th>
                          <th>product&nbsp;group</th>
                      
                         <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * from product_group order by id desc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr  style="font-size:15px">
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['pro_grp_name'];?></td>
                                
                          <td>
                          <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                        
                          id="edit<?php echo $sno;?>" onclick="getdia(edit<?php echo $sno;?>.id);" 
                         >
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                      </a>

                         &nbsp; <a type="button" 
                       
                        
                         id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                      </a>
                          
                          </td>
                          
                        </tr>
                        
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>
                      </tbody>
                    </table>
                  </div>

                   
                   </div>
                 </div>
               </div>


               <div class="col-xl-4 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-3">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                        
                       </a>
                       
                       <div class="col">
                       <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Create/Edit</span>&nbsp;Product Group</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                    </div>

<br>


                       <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                     
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


                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Product&nbsp;Group</label>
                        <input
                          type="text"
                          class="form-control"
                          id="pro_grp_name"
                          name="pro_grp_name"
                          aria-label="John Doe" required/>
                      </div>
                       
                </div>
             
                     
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit" id="submitBtn">Submit</button> 

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                
                  </div>
                </div>


                     </div>
    
                   </div>
                 </div>
               </div>
               </form>


</div>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$pro_grp_name=$_POST['pro_grp_name'];

if($id==""){				
			
  $sql="insert into product_group (pro_grp_name)values('$pro_grp_name')"; 
$result1=mysqli_query($conn, $sql);


}else{
  $sql="UPDATE product_group SET pro_grp_name='$pro_grp_name' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}

// if ($result1) {
//   echo '<script>
//     Swal.fire({
//         title: "Are you sure?",
//         text: "Want to Save",
//         icon: "success",
//         showCancelButton: true,
//         confirmButtonColor: "#1D4705",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, Save it!"
//     }).then((result) => {
//         if (result.isConfirmed) {
//             window.location.href = "desig_master.php"; // Corrected line
//             Swal.fire({
//                 title: "Saved!",
//                 text: "Your designation has been saved successfully.",
//                 icon: "success",
//                 showConfirmButton: false // Hide confirm button
//             });
//         }
//     });
// </script>';
// } else {
//   echo '<script>
//           Swal.fire({
//             title: "Error!",
//             text: "There was an error saving the designation.",
//             icon: "error",
//             confirmButtonText: "OK"
//           });
//         </script>';
// }


if ($result1) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Designation has been saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "product_group.php"; // Corrected line
    }
  });
</script>';
} 



elseif ($result2) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Designation has been Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "product_group.php"; // Corrected line
    }
  });
</script>';
} 

else {
  echo '<script>
          Swal.fire({
            title: "Error!",
            text: "There was an error saving the designation.",
            icon: "error",
            confirmButtonText: "OK"
          });
        </script>';
}
}
?> 



<script>
function getdia(id) {
    //alert(id);
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
       // alert(r);
        const data = JSON.parse(r);
        if(data.sts == 'ok'){
   $('#id').val(data.id);  
   $('#pro_grp_name').val(data.pro_grp_name);                           
              
}

      }
    };
    xmlhttp.open("GET","ajax/getprogrp.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>


<script>
function deldia(id) {
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
              window.location = 'product_group.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/delprogrp.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>


<script>
document.getElementById('submitBtn').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to submit the form?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, submit it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('myForm').submit();
            Swal.fire(
                'Submitted!',
                'Your form has been submitted.',
                'success'
            );
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Your form was not submitted.',
                'error'
            );
        }
    });
});

document.getElementById('deleteBtn').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to delete this item?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, keep it',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Perform delete action here
            Swal.fire(
                'Deleted!',
                'The item has been deleted.',
                'success'
            );
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'The item was not deleted.',
                'error'
            );
        }
    });
});
</script>















               
  


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



