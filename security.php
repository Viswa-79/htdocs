<?php include "config.php";include "head.php";include "session.php";?>

<!-- <link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" /> -->

    <script src="sweetalert2@11.js"></script>  

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


<script>


function validate_password() {
    let newpassword = document.getElementById('newpassword').value;
    let confirmpassword = document.getElementById('confirmpassword').value;
    let passwordLength = newpassword.length;

    if (passwordLength < 6 || passwordLength > 10) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = '☒ Password must be between 6 and 10 characters';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = 0.4;
    } else if (newpassword !== confirmpassword) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = '☒ Use the same password';
        document.getElementById('create').disabled = true;
        document.getElementById('create').style.opacity = 0.4;
    } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '🗹 Passwords Matched';
        document.getElementById('create').disabled = false;
        document.getElementById('create').style.opacity = 1;
    }
}

    </script>



    <!-- Layout wrapper -->
    <form  method="POST" action=""  enctype="multipart/form-data" >
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
          <?php
	 $sid=base64_decode($_GET['cid']);
		 ?>               
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 


              
   <div class="card-header d-flex align-items-center justify-content-between mb-2 mt-4">
   <h3> <button class="btn btn-label-primary">Change Password</button></h3>
                     
                    
                     
                      










                      
</div>       
              <div class="row">
                <div class="col-md-12">
                  <!-- <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item">
                      <a class="nav-link " href="javascript:void(0);"
                        ><i class="ti-xs ti ti-users me-1"></i> Account</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href=""
                        ><i class="ti-xs ti ti-lock me-1"></i> Security</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href=""
                        ><i class="ti-xs ti ti-file-description me-1"></i> Billing & Plans</a
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
                   

                  <div class="card mb-4">
                    <h5 class="card-header">Create Password</h5>
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                    
                        <div class="row">
                          <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="newPassword">New Password</label>
                            <div class="input-group input-group-merge">
                              <input
                                class="form-control"
                                type="password"
                                id="newpassword"
                                name="newpassword"
                                onkeyup="validate_password();"
                                minilength="6"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" 
                                required/>
                              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                          </div>

                          <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="confirmPassword">Confirm New Password</label>
                            <div class="input-group input-group-merge">
                              <input
                                class="form-control"
                                type="password"
                                name="confirmpassword"
                                id="confirmpassword"
                                onkeyup="validate_password();"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" 
                                required/>
                              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                            <span id="wrong_pass_alert"></span>
                          </div>
                          <div class="col-12 mb-4">
                            <h6>Password Requirements:</h6>
                            <ul class="ps-3 mb-0">
                              <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                              <li class="mb-1">At least one lowercase character</li>
                              <li>At least one number, symbol, or whitespace character</li>
                            </ul>
                          </div>
                          <div>
                            <button type="submit" name="submit" class="btn btn-primary me-2">Save </button>
                            <button type="reset" class="btn btn-label-secondary">Cancel</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>



                  <!-- <div class="card mb-4">
                    <h5 class="card-header">Two-steps verification</h5>
                    <div class="card-body">
                      <h5 class="mb-3">Two factor authentication is not enabled yet.</h5>
                      <p class="w-75">
                        Two-factor authentication adds an additional layer of security to your account by requiring more
                        than just a password to log in.
                        <a href="javascript:void(0);">Learn more.</a>
                      </p>
                      <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">
                        Enable two-factor authentication
                      </button>
                    </div>
                  </div> -->




                 


                    
                 
                  
                  

<!--hjjj-->









                  
    <!-- /Account -->
                  
                 <!-- <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation" onsubmit="return false">
                        <div class="form-check mb-4">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation" />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit1" class="btn btn-danger deactivate-account">Deactivate Account</button>
                     
                    </div>
                  </div>  -->


                
                  
                </div>
              </div>
            </div>

                   






























             </div>
             <!--/ Teams Cards -->


            </div>  
            </div>  
        <!-- / Layout page -->
      </div>
      </form>
      
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    





                <?php
if(isset($_POST['submit']))
{
 
$newpassword= md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);







 
				


if($newpassword== $confirmpassword){


  $sql="UPDATE employee SET newpassword='$newpassword' WHERE id='$sid'";
  $result2=mysqli_query($conn, $sql);
}
else{
    printf("<script>alert(' Password incorrect');</script>");
}

if ($result2) {
  echo '<script>
  Swal.fire({
    title: "Updated!",
    text: "Password Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "emp_master1.php"; // Corrected line
    }
  });
</script>';
} 

else {
  echo '<script>
          Swal.fire({
            title: "Error!",
            text: "There was an error saving the Password.",
            icon: "error",
            confirmButtonText: "OK"
          });
        </script>';
}


}
?> 
    
<?php include "footer.php"; ?>
  </body>


  <script>


function dd(value) {
	//alert(value);

   
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
// location.reload();//
document.getElementById('dis').innerHTML=r;
						

      }
    };
    xmlhttp.open("GET","ajax/get_reason.php?id="+value,true);
    xmlhttp.send();
 
}
</script>


<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>