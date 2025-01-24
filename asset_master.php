<?php include "config.php";include "head.php" ?>
<?php include "session.php";?>

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
          <button class="btn btn-primary">Asset Master</button>
          <?php
         $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=23";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $read_permit = $row['read_access'];
                     $write_permit = $row['write_access'];
                     $delete_permit = $row['delete_access'];
                   
?>
          <button  <?php  if($create_permit==0){ echo "disabled"; } ?> class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="addCurrency();" ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add Asset</button>
          

</div>         

<div class="row">


<div class="col-xl-12 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-0">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                        
                       </a>
                       <div class="ms-auto">
                         
                       </div>
                     </div>
                     
 <div class="table-responsive  " >
                  <div  class="card-datatable ">
                    
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <th style="text-align:center">S.no</th>
                          <th nowrap>Asset Group</th>
                          <th nowrap>Asset Name</th>
                          <th nowrap>Asset Type</th>
                        
                 
                        
                        <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT *,a.id as id FROM asset_master a left join asset_group b on a.asset_group=b.id order by a.id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr style="font-size:13px">
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['group_name'];?></td>
                      <td><?php echo $rows['asset_name'];?></td>
                      <td><?php echo $rows['asset_type'];?></td>
               
                     
                                  
                          <td align="left">

                         
                          <a type="button"   <?php  if($write_permit==0){ echo "disabled"; } ?> data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                          id="edit<?php echo $sno;?>" onclick="getdia(edit<?php echo $sno;?>.id);" 
                         >
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                      </a>
                        
&nbsp;
                          <button
                       <?php  if($delete_permit==0){ echo "disabled"; } ?>
                          id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                  </button>
                          
                          </td>
                          <?php
                           $sno++;
                         } ?>
                        </tr>
                        
                        <?php
                 
                      }
                    
                   
                 else{ ?>
               <tr>
                <td  >  <p></p></td>
                <td  >  <p></p></td>
                <td  align="center"><p>No Data Found</p></td>
                <td  >  <p></p></td>
                <td  >  <p></p></td>
            
             </tr>
                 <?php
                 } ?>
                      </tbody>
                    </table>
                  </div>

                   
                   </div>
                   </div>
                 </div>
               </div>


            
               
               <div
                  class="offcanvas offcanvas-end "
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Asset Master</h5>
                    
                  </div>

                       <div class=" offcanvas-body mx-0 flex-grow-0 pt-0  h-100">
                      <div class="mb-3">
                      <form method="post" action="">
                      <label class="form-label" for="add-user-fullname" >Asset Group</label>
                      <select name="asset_group" id="asset_group" class="select form-select"  required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM asset_group ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['group_name'];?>
						 </option>
					<?php } ?>
                              </select>
                               
                      </div>

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
                      <label class="form-label" for="add-user-fullname">Asset Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="asset_name"
                          placeholder=" "
                          
                         
                          name="asset_name"
                          aria-label="John Doe" required/>
                      </div>

                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Asset Type</label>
                      <select name="asset_type" id="asset_type" class="select form-select"  required>
                                <option value="">Select</option>
                                <option value="Asset">Asset</option>
                                <option value="Not Asset">Not Asset</option>
          </select>
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Description </label>
                      <input
                          type="text"
                          class="form-control"
                          id="descrip"
                          placeholder=" "
                          
                         
                          name="descrip"
                          aria-label="John Doe" />
                      </div>

                   
                          
                            
                    




                   

                           
                     


                           
                           
                     

                     

                     

<br>
                      <span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Reset</button>
                           
                             </form>
                </div>
             
                     

                
                  </div>
                </div>


               </div>


</div>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$asset_group=$_POST['asset_group'];
$asset_name=$_POST['asset_name'];
$asset_type=$_POST['asset_type'];
$descrip=$_POST['descrip'];



if($id==""){
 
				
			
  $sql="insert into asset_master (asset_group,asset_name,asset_type,descrip)values('$asset_group','$asset_name','$asset_type','$descrip')"; 
$result1=mysqli_query($conn, $sql);


}else{
  $sql="UPDATE asset_master SET asset_group='$asset_group',asset_name='$asset_name',asset_type='$asset_type',descrip='$descrip' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if ($result1) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: " saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "asset_master.php"; // Corrected line
    }
  });
</script>';
} 



elseif ($result2) {
  echo '<script>
  Swal.fire({
    title: "Updated!",
    text: " Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "asset_master.php"; // Corrected line
    }
  });
</script>';
} 

else {
  echo '<script>
          Swal.fire({
            title: "Error!",
            text: "There was an error saving the Holiday.",
            icon: "error",
            confirmButtonText: "OK"
          });
        </script>';
}

}
?> 

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
              window.location = 'asset_master.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/delasset_master.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>

<!-- <script>
function deldia(id) {

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
  window.location='shift.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delshift.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script> -->


<script>
function getdia(id) {
   // alert(id);
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
 // alert(c);
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
   $('#asset_group').val(data.asset_group);             
   $('#asset_name').val(data.asset_name);             
   $('#asset_type').val(data.asset_type);             
   $('#descrip').val(data.descrip);             
             
            
}

      }
    };
    xmlhttp.open("GET","ajax/get_asset_master.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='Add';
  $('#id').val('');  
   $('#asset_group').val('');             
   $('#asset_name').val('');             
   $('#asset_type').val('');             
   $('#descrip').val('');             
               
 
}
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
