<?php include "config.php";include "head.php" ?>
<link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" />
  <body>
    
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
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php"; ?>

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <div class="card-header d-flex align-items-center justify-content-between mb-4">
          <button class="btn btn-label-primary">All Employee</button>
                     
                    
                                  <a class="btn btn-primary float-end btn-group"  style="color: white;" tabindex="0" href="emp_add.php"><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add Employee</a>
</div>         
   <!-- Teams Cards -->
   <div class=" row g-4">
               
             
   <?php
    
    $sql="SELECT * from employee ";
 //$wz=mysqli_query($conn,"select * from add_profile  where id='$user_id'");
   $result=mysqli_query($conn,$sql);
 $wz1=mysqli_fetch_array($result);
   $id=$wz1['id'];
   
   
   ?>  
               
  
  

              <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>TOTAL STAFFS</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2"><?php echo $id ?> </h3>
                            <p class="text-success mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>STAFFS PRESENT</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">4,567</h3>
                            <p class="text-success mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-danger">
                          <i class="ti ti-user-check ti-sm"> </i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>STAFFS ABSENT</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">19,860</h3>
                            <p class="text-danger mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-success">
                          <i class="ti ti-user ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>STAFFS ON LEAVE</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2">237</h3>
                            <p class="text-success mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-warning">
                            <i class="ti ti-user-exclamation ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Users List Table -->
              
   

                

                    <div class="card rounded-10px shadow-custom border-custom p-3" data-select2-id="select2-data-8-wxqv">
                                
                    <div  class="card-datatable table-responsive">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <th style="text-align:center">S.no</th>
                          <th> Name</th>
                          <th>Emp ID</th>
                          <th>Department</th>
                          <th>Designation</th>
                          <th>Reporting Manager</th>
                          <th>JoinDate</th>
                          <th>Status</th>
                        
                        <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT *,e.id as id FROM employee e left join depart d on e.depart=d.id left join desi_master m on e.desig=m.id order by e.id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr>
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['name'];?></td>
                      <td ><?php echo $rows['id'];?></td>
                      <td><?php  echo $rows['depname'];?></td>
                      <td align="center"><?php echo $rows['desig'];?></td>
                      <td align="center"><?php  echo $rows['city'];?></td>
                      <td align="center"><?php echo $rows['hiringdate'];?></td>
                      <td align="center"><?php echo $rows['bgrp'];?></td>
                     
                                  
                          <td >


                          
                 
                         <ul style="justify-content:space-evenly;" class="list-inline mb-0 d-flex align-items-middle ">
                         
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
                                 
                                 <li><a class="dropdown-item"  id="edit<?php echo $sno;?>" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="getCurr(edit<?php echo $sno;?>.id);" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>&nbsp;&nbsp;Edit</a></li>
                                 <li>
                                   <hr class="dropdown-divider" />
                                 </li>
                                 <li>
                                  
                                 <a type="button" 
                          class="dropdown-item"
                          id="del<?php echo $sno;?>" onclick="delCurr(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>

                                  

                                 </li>
                               </ul>
                             </div>
                           </li>
                         </ul>
                  
                        

                       
                          </td>
                          <?php
                           $sno++;
                         } ?>
                        </tr>
                        
                        <?php
                 
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



  
                   


                <?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$depname=$_POST['depname'];


if($id==""){
 
				
			
  $sql="insert into depart (depname)values('$depname')"; 
$result1=mysqli_query($conn, $sql);


}else{
 $sql="UPDATE depart SET depname='$depname' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if($result1) { 
 
  echo "<script>alert(' Department added successfully');window.location='depart.php';</script>";
 
}
else if($result2) { 
  echo "<script>alert('Department Updated Successfully');window.location='depart.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}

}
?> 
    
<?php include "footer.php"; ?>
  </body>


  <script>
function getCurr(id) {
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
//alert(id);
  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
 if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='depart.php';

                   
 }
      }
    };
    xmlhttp.open("GET","ajax/deldept.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>

<!-- <script>
    function confirmDelete(id) {
      alert(id);
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, redirect to delete script with the id
                window.location.href = 'deldept.php?id='+user_id,true;
            }
        
        });
    }

$.ajax({
    type: "POST",
    url: "deldept.php",
    data: { id: sno }, // Pass the ID of the item to be deleted
    success: function(response) {
        // Handle the response from the server
        if(response === "success") {
            // If deletion is successful, show success message
            Swal.fire({
                title: 'Deleted!',
                text: 'Your file has been deleted.',
                icon: 'success',
                timer: 2000, // Set a timer for the success message
                timerProgressBar: true,
                onClose: () => {
                    // Redirect to desired page after success
                    window.location.href = 'redirect_page.php';
                }
            });
        } else {
            // If there's an error, display error message
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred while deleting.',
                icon: 'error'
            });
        }
    },
    error: function(xhr, status, error) {
        // If there's an error in the AJAX request, display error message
        Swal.fire({
            title: 'Error!',
            text: 'An error occurred while processing your request.',
            icon: 'error'
        });
    }
});

</script> -->



<!-- <script>
    function delCurr(id) {
      alert(id);
        // Extract the ID from the string
        var c = id.substr(6);
        var user_id = document.getElementById('id' + c).value;

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, send AJAX request to delete
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        // Parse the response
                        const data = JSON.parse(xmlhttp.responseText);
                        if (data.sts === 'ok') {
                            // If deletion is successful, show success message and redirect
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Deleted Successfully.',
                                icon: 'success'
                            }).then(() => {
                                // Redirect to currency.php after success
                                window.location = 'depart.php';
                            });
                        } else {
                            // If deletion fails, show error message
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting.',
                                icon: 'error'
                            });
                        }
                    }
                };
                // Send AJAX request to delete
                xmlhttp.open("GET", "ajax/deldept.php?id=" + user_id, true);

                xmlhttp.send();
            }
        });
    }
</script> -->


    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/extended-ui-sweetalert2.js"></script>













    <script>
        var BASE_URL = 'https://app.yohrm.com';
        var base_url = 'https://app.yohrm.com';
    </script>
    <script src="https://app.yohrm.com/assets/static/js/components/dark.js" data-navigate-once=""></script>
    <script src="https://app.yohrm.com/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js" data-navigate-once=""></script>
    <script type="module">$(function(){window.LaravelDataTables=window.LaravelDataTables||{};window.LaravelDataTables["employee-table"]=$("#employee-table").DataTable({"serverSide":true,"processing":true,"ajax":{"url":"https:\/\/app.yohrm.com\/employee\/all","type":"GET","data":function(data) {
            for (var i = 0, len = data.columns.length; i < len; i++) {
                if (!data.columns[i].search.value) delete data.columns[i].search;
                if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
            }
            delete data.search.regex;}},"columns":[{"data":"name","name":"name","title":"Name","orderable":true,"searchable":true},{"data":"emp_id","name":"emp_id","title":"Emp Id","orderable":true,"searchable":true},{"data":"designation","name":"designation","title":"Designation","orderable":true,"searchable":true},{"data":"department_id","name":"department_id","title":"Department","orderable":true,"searchable":true},{"data":"reporting_manager_id","name":"reporting_manager_id","title":"Reporting Manager","orderable":true,"searchable":true},{"data":"joining_date","name":"joining_date","title":"Joining Date","orderable":true,"searchable":true},{"data":"user_status","name":"user_status","title":"Status","orderable":true,"searchable":true},{"data":"action","name":"action","title":"Action","orderable":false,"searchable":false,"width":60,"className":"text-center"}],"order":[[1,"desc"]],"select":{"style":"single"}});});</script>