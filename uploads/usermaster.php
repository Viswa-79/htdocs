
<?php 
include "config.php";
 ?>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
  <?php include "head.php";?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php";?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Users List Table -->
              <div class="card">
               <div 
                      class="card-header sticky-element bg-label-success d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" >USER LIST</h5>
                      <div class="action-btns">
                      
                      
                      <button
                        type="button"
                        class="btn btn-icon btn-warning"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Print">
                        <span class="ti ti-printer"></span>
                      </button>
                    
                      &nbsp;  <button type="button" 
                class="btn btn-icon btn-secondary"
                data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="PDF">
                  <span class="ti ti-file"></span>
                   </button>
               &nbsp;   <button class="btn btn-secondary add-new btn-primary" tabindex="0" onclick="addUsers();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add New User</span></span></button>
                      </div>
                    </div> 
              <table class="table table-hover">
                    <thead >
                      <tr>
                      <th><div align="center">S.No</div></th>
                      <th><div align="center" hidden>Id </div></th>

                        <th>Name </th>
                        <th>Email</th>
                        <th>Status</th>
                        <th style="padding-left:80px">Action</td>

                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                                      
                  
                  
                                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM users order by name asc";
                  $result =mysqli_query($conn, $sql);
                  
                      while($rows=mysqli_fetch_array($result))
                      {
                  if($rows['status']==1){
                    $status ="Active";
        
                  }
                  else{
                    $status ="Inactive";
                  }
                  ?>
                  <tr>
                      <!-- FETCHING DATA FROM EACH
                          ROW OF EVERY COLUMN -->
                      <td align="center"><?php echo $sno;?></td>
                      <td><input type"text" name="user_id" hidden id ="user_id<?php echo $sno;?>" value="<?php echo $rows['id'];?>"></td>

                      <td><?php echo $rows['name'];?></td>
                      <td><?php echo $rows['email'];?></td>

                      <td><span class="badge bg-label-primary me-1">
                        <?php echo $status; ?>
                      </span></td>
                                          <td>
                                          <button type="button" class="btn btn-outline-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditUser"
                id="edit<?php echo $sno;?>" onclick="getUsers(edit<?php echo $sno;?>.id);">
                    <span class="ti-xs ti ti-edit me-1"></span>Edit
               </button>

                  <button type="button" 
                    class="btn btn-outline-danger" 
                    id="del<?php echo $sno;?>" onclick="delUsers(del<?php echo $sno;?>.id);" >
                    <span class="ti-xs ti ti-trash me-1"></span>Delete
                  </button> 
                                          </td>
                      </tr>
                  <?php
                  $sno++;
                      }
                  ?>
                  </table>
                </div>
                <!-- Offcanvas to add new user -->
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="">Add</span> User</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form action="" method="post">
                    
                    
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="your name"
                          name="name"
                          aria-label="John Doe"
                          required />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input
                          type="text"
                          id="email"
                          class="form-control"
                          placeholder="john.doe@gmail.com"
                          aria-label="john.doe@gmail.com"
                          name="email" required/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-contact">Password</label>
                        <input
                          type="password"
                          id="password"
                          class="form-control "
                          placeholder="Abc12#* "
                          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                          title="Must contain at least one number,
		                     	one uppercase and lowercase letter,
                          at least 8 characters"
                          aria-label="john.doe@example.com"
                          name="password" required/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-company">Confirm Password</label>
                        <input
                          type="password"
                          id="cpassword"
                          class="form-control"
                          placeholder=""
                          aria-label="jdoe1"
                          name="cpassword"
                          onkeyup="validate_password()" />
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="user-role">User Role</label>
                        <select id="userrole" class="form-select" name="userrole">
                        <option value="0">Select Role</option>
                        <?php 
                 
                 $sql = " SELECT * FROM user_role ORDER BY role asc ";
$result =mysqli_query($conn, $sql);

    while($row=mysqli_fetch_array($result))
{   
                    ?>  
                    <option value="<?php echo $row['id'];?>"><?php echo $row['role'];?></option>
                    <?php } ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-company">Ph Number</label>
                        <input
                          type="text"
                          id="phnumber"
                          class="form-control"
                          placeholder="+91 988 765(4321)"
                          aria-label="jdoe1"
                          name="phnumber" required/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status" name="status" class=" form-select">
                          <option value="1">Active</option>
                          <option value="2">Inactive</option></select>
</div>

 
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create"
                      onclick="wrong_pass_alert()"  name="submit">Submit</button>                      
                      <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
                
                


                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasEditUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title1">Edit</span> User</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form action="" method="post">
                    <div class="mb-3">
                      <label class="form-label" for="add-user-fullname" hidden >ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="uid"
                          placeholder=""
                          name="uid"
                          hidden
                          value=""
                          
                          aria-label="John Doe"
                          />
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="name1"
                          placeholder="your name"
                          name="name1"
                          aria-label="John Doe"
                          required />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input
                          type="text"
                          id="email1"
                          class="form-control"
                          placeholder="john.doe@gmail.com"
                          aria-label="john.doe@gmail.com"
                          name="email1" required/>
                      </div>
                      
                      <div class="mb-3">
                        <label class="form-label" for="user-role">User Role</label>
                        <select id="userrole1" class="form-select" name="userrole1">
                        <option value="0">Select Role</option>
                        <?php 
                 
                 $sql = " SELECT * FROM user_role ORDER BY role asc ";
$result =mysqli_query($conn, $sql);

    while($row=mysqli_fetch_array($result))
{   
                    ?>  
                    <option value="<?php echo $row['id'];?>"><?php echo $row['role'];?></option>
                    <?php } ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-company">Ph Number</label>
                        <input
                          type="text"
                          id="phnumber1"
                          class="form-control"
                          placeholder="+91 988 765(4321)"
                          aria-label="jdoe1"
                          name="phnumber1" required/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="status">Status</label>
                        <select id="status1" name="status1" class=" form-select">
                          <option value="1">Active</option>
                          <option value="2">Inactive</option></select>
</div>

 
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create"
                      onclick="wrong_pass_alert()"  name="submit">Submit</button>                      
                      <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
    
               
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasChangePassword"
                  aria-labelledby="offcanvasAddUserLabel">
                      <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Change Password
                    </h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                                     <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                    <form action="" method="post">
                    <div class="mb-3">
                      <label class="form-label" for="add-user-fullname" hidden >ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="uid2"
                          placeholder=""
                          name="uid2"
                          hidden
                          value=""
                          
                          aria-label="John Doe"
                          />
                      </div>
                         
                      <div class="mb-3">
                        <label class="form-label" for="add-user-contact">New Password</label>
                        <input
                          type="password"
                          id=""
                          class="form-control "
                          placeholder=" "
                          pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                          title="Must contain at least one number,
		                     	one uppercase and lowercase letter,
                          at least 8 characters"
                          aria-label="john.doe@example.com"
                          name="newpassword"
                           />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="add-user-company">Confirm Password</label>
                        <input
                          type="password"
                          id=""
                          class="form-control"
                          placeholder=""
                          aria-label="jdoe1"
                          name="confirmpassword"
                          onkeyup="validate_password()" />
                      </div>




                      
                       
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create"
                      onclick="wrong_pass_alert()" name="submit2">Submit</button>                      
                      <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  </body>
</html>

<?php
if(isset($_POST['submit']))
{
  $uid=$_POST['uid'];   

if($uid==""){
$name=$_POST['name'];
$email=$_POST['email'];
$password= md5($_POST['password']);
$userrole=$_POST['userrole'];
$phnumber=$_POST['phnumber'];
$status=$_POST['status'];

 $sql="insert into users (name,email,password,userrole,phnumber,status) values('$name','$email','$password','$userrole','$phnumber','$status')"; 
 $result1=mysqli_query($conn, $sql);
}
else{
  $id=$_POST['uid'];   
$name=$_POST['name1'];
$email=$_POST['email1'];
$userrole=$_POST['userrole1'];
$phnumber=$_POST['phnumber1'];
$status=$_POST['status1'];

  $sql="UPDATE users SET name='$name',email='$email',userrole='$userrole',phnumber='$phnumber',status='$status' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);

}
if($result1) { 
  echo "<script>alert('User Registered Successfully');window.location='usermaster.php';</script>";
}
else if($result2) { 
  echo "<script>alert('User Updated Successfully');window.location='usermaster.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';    
}

}


if(isset($_POST['submit2']))
{
  $uid2=$_POST['uid2'];   
$newpassword=md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);

if($newpassword == $confirmpassword){


  $sql="UPDATE users SET password='$newpassword' WHERE id='$uid2'"; 
  $result3=mysqli_query($conn, $sql);

}
else{
  echo '<script>alert("Password does not Matched!..")</script>';    
  }
  
if($result3) { 
  echo "<script>alert('Password Changed Successfully');window.location='usermaster.php';</script>";
}

else{
echo '<script>alert("Something Wrong, data not stored")</script>';    
}

}
?>  






<script>
function getUsers(id) {
  document.getElementById('form-title1').innerHTML='Edit';  
  var c=(id.substr(4));
				var user_id=document.getElementById('user_id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                    $('#uid').val(data.id);  
                    $('#name1').val(data.name);  
                    $('#email1').val(data.email); 
                    $('#userrole1').val(data.userrole);                 
                    $('#phnumber1').val(data.phnumber);                 
                    $('#status1').val(data.status);
}

      }
    };
    xmlhttp.open("GET","ajax/getUsers.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function delUsers(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
				var user_id=document.getElementById('user_id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='usermaster.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delUsers.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>

<script>
function get_id(id) {
  var c=(id.substr(4));
				var user_id=document.getElementById('user_id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                    $('#uid2').val(data.id);  
                  
}

      }
    };
    xmlhttp.open("GET","ajax/getUsers.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>