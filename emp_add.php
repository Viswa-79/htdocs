<?php include "config.php";include "head.php" ?>
<!-- <link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css" /> -->
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


<script>
function datediff() { 

    const dob = document.getElementById('dob').value;
    const tod = document.getElementById('tod').value;

    // Convert the dates to Date objects
    const startDate = new Date(dob);
    const endDate = new Date(tod);

    // Calculate the difference in milliseconds between the dates
    const diffInMs = endDate - startDate;

    // Convert milliseconds to years
    const diffInYears = diffInMs / (1000 * 60 * 60 * 24 * 365.25);

    // Round down to get the whole number of years
    const ageInYears = Math.floor(diffInYears);

    // Set the age value in the element with id 'age'
    document.getElementById('age').value = ageInYears;
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
              
              
              
              <div class="card-header d-flex align-items-center justify-content-between mb-2 mt-4">
              <h3> <button class="btn btn-primary">Profile Details</button></h3>
              <span>
              <a href="emp_master1.php" class="btn btn-outline-warning"> <i class="ti-xs ti ti-eye me-1"></i>View List</a>
             </span>
              </div>       
              <form  method="POST" action=""  enctype="multipart/form-data" >
              <div class="row">
                <div class="col-md-12">
                  <!-- <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item">
                      <a class="nav-link active" href=""
                        ><i class="ti-xs ti ti-users me-1"></i> Account</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  href="security.php?cid=$id"
                        ><i class="ti-xs ti ti-lock me-1"></i> Security</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"
                        ><i class="ti-xs ti ti-file-description me-1"></i> Billing & Plans</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" 
                        ><i class="ti-xs ti ti-bell me-1"></i> Notifications</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" 
                        ><i class="ti-xs ti ti-link me-1"></i> Connections</a
                      >
                    </li>
                  </ul> -->
                  <div class="card mb-4">
                    <h5 class="card-header">Personal Details</h5>
                    <!-- Account -->
                    <div class="card-body">

              
                    
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <img 
                            id="imagePreview"
                            style=" width: 100%;
            height: 100%;
           
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center; background-image: url(500?img=7);"
                          class="d-block w-px-100 h-px-100 rounded"
                          
                          />
                        <div class="button-wrapper">
                          <label for="imageUpload" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span  class="d-none d-sm-block">Upload new photo</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              name="imageUpload"
                              id="imageUpload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg" />
                          </label>
                          <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      
                        <div class="row">
                          

                          <div hidden class="mb-2 col-md-3">
                            <label for="firstName" hidden class="form-label"> Staff ID</label>
                            <input
                              class="form-control"
                              type="text"
                              id="emp_id"
                              name="emp_id"
                              hidden
                                  />
                          </div>
                          <div class="mb-2 col-md-3">
                            <label for="firstName" class="form-label"> Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              
                              required    />
                          </div>
                       
                          <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Ph.No</label>
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">IND (+91)</span>
                            <input
                              class="form-control"
                              type="number"
                              id="phno"
                              name="phno"
                              
                              placeholder="" 
                              maxlength="10"   />
                          </div>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Alt&nbsp;Ph.No</label>
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">IND (+91)</span>
                            <input
                              type="text"
                              class="form-control"
                              id="altphno"
                              name="altphno"
                              
                              maxlength="10"  />
                          </div>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Emergency&nbsp;Ph.No</label>
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">IND (+91)</span>
                            <input
                              type="text"
                              class="form-control"
                              id="emgphno"
                              name="emgphno"
                              
                              maxlength="10"  />
                          </div>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="phoneNumber">Date Of Birth</label>
                            <div class="input-group input-group-merge">
                              
                              <input
                                type="date"
                                id="dob"
                                name="dob"
                                class="form-control"
                                placeholder="" 
                                onchange="datediff()"   />
                                

                            </div>
                            <input
                          hidden
                          type="date"
                          id="tod"
                          name="tod"
                          value="<?php echo date("Y-m-d");?>"
                          class="form-control"
                          />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age"  readonly/>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Gender</label>
                            <select id="gender" name="gender" class="select2 form-select"  >
                              <option value="">Select</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Blood Group</label>
                            <input type="text" class="form-control" id="bgrp" name="bgrp"    />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" name="country" class="select2 form-select"   >
                              <option value="">Select</option>
                              <option value="Australia">Australia</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Brazil">Brazil</option>
                              <option value="Canada">Canada</option>
                              <option value="China">China</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Japan">Japan</option>
                              <option value="Korea">Korea, Republic of</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Russia">Russian Federation</option>
                              <option value="South Africa">South Africa</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="zipCode" class="form-label">State</label>
                            <input
                              type="text"
                              class="form-control"
                              id="state"
                              name="state"
                               
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="city">City</label>
                            <input
                              type="text"
                              class="form-control"
                              id="city"
                              name="city"
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Pincode</label>
                            <input
                              type="text"
                              class="form-control"
                              id="pincode"
                              name="pincode"
                              placeholder="231465"
                              maxlength="6"
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Father&nbsp;Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="fname"
                              name="fname"
                              
                             
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Father&nbsp;Ph.No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="fphno"
                              name="fphno"
                              
                              maxlength="10"
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Mother&nbsp;Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="mname"
                              name="mname"
                        
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Mother&nbsp;Ph.No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="mphno"
                              name="mphno"
                              
                              maxlength="10"
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Language</label>
                            <input
                              type="text"
                              class="form-control"
                              id="lang"
                              name="lang"
                              
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Marital Status</label>
                            <select id="mstatus" name="mstatus" class="select form-select" >
                              <option value="">Select </option>
                              <option value="Married">Married</option>
                              <option value="Unmarried">Unmarried</option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-3" id="spo">
                          <label for="language" class="form-label">Spouse Name</label>
                          <input
                              type="text"
                              class="form-control"
                              id="spouse"
                              name="spouse"
                               
                              
                              />
                              
                             
                          </div>
                          <div class="mb-3 col-md-6" >
                          <label for="language" class="form-label">Local Address</label>
                          <input
                              type="text"
                              class="form-control"
                              id="localaddress"
                              name="localaddress"
                               
                              
                              />
                              
                             
                          </div>
                          <div class="mb-3 col-md-6" >
                          <label for="language" class="form-label">Permanant Address</label>
                          <input
                              type="text"
                              class="form-control"
                              id="peraddress"
                              name="peraddress"
                               
                              
                              />
                              
                             
                          </div>

                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Reference 1</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ref1"
                              name="ref1"
                               placeholder="Number & Mobile Number"
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Reference 2</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ref2"
                              name="ref2"
                              placeholder="Number & Mobile Number"
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Reference 3</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ref3"
                              name="ref3"
                              placeholder="Number & Mobile Number"
                              
                              />
                          </div>

                          
                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Branch</label>
                            <input
                              type="text"
                              class="form-control"
                              id="branch"
                              name="branch"
                               
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Any Disability</label>
                            <select id="disability" name="disability" class="select form-select" onchange="dd(this.value);" >
                              <option value="">Select </option>
                              <option value="No">No</option>
                              <option value="Yes">Yes</option>
                            </select>
                          </div>
                        
                          <div class="mb-3 col-md-3" id="dis">
                           
                          </div>
                        </div>
                       
                   
                    </div>
                  </div>  



                  <div class="card mb-4">
                    <h5 class="card-header">Account Login</h5>
                    <!-- Account -->
                   
                    <hr class="my-0" />
                    <div class="card-body">
                    
                        <div class="row">
                       

                     

                        
                        <div class="mb-2 col-md-3">
                            <label for="lastName" class="form-label">E-mail</label>
                            <input class="form-control" type="email" name="email" id="email" required/>
                          </div>
                        
                          <div class="mb-3 col-md-3 form-password-toggle">
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
                         
                          <div class="mb-3 col-md-3 form-password-toggle">
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
                          
                         
                     
                          
                         
                        
                         
                          
                        </div>
                       
                     
                    </div>
                  </div> 





























                    
                 
                  <div class="card mb-4">
                    <h5 class="card-header">Office Details</h5>
                    <!-- Account -->
                   
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                        <div class="mb-2 col-md-3">
                            <label for="desig" class="form-label">Role</label>
                            <select id="userrole" name="userrole" class="form-select" onchange="get_id(this.value)" required >
                              <option value="">Select </option>
                              <?php 
                             
          if($user_role==1){
					$sql1 = "SELECT * FROM user_role Where role!='Super Admin'";
          }else if($user_role!=1){
					$sql1 = "SELECT * FROM user_role Where role!='Super Admin' and role!='Admin'";
          }
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw1['id'];?>"><?php echo $rw1['role'];?>
						 </option>
					<?php } ?>
                            </select>
                          </div>

                          <div class="mb-2 col-md-3">
                            <label for="firstName" class="form-label"> Staff ID</label>
                            <input
                              class="form-control bg-light"
                              type="text"
                              id="empid"
                              name="empid"
                              required
                              readonly
                                  />
                          </div>


                          <div class="mb-3 col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Department<span style="color:red;">*</span></label>
                            <select name="depart" id="depart"  class="select2 form-select"  onchange="get_items(this.value);get_name(this.value);"       >
                                <option value="">Select</option>

                                <?php 
					$sql = "SELECT * FROM depart ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['depname'];?>
						 </option>
					<?php } ?>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="desig" class="form-label">Designation</label>
                            <select class="select2 form-select"  name="desig" id="desig"  >
						  <option value="">--Select--</option>
              </select>
                          </div>
                        
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Reporting Manager</label>
                            <select class="select2 form-select"  name="reportmanager" id="reportmanager"  >
						  <option value="">--Select--</option>
              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Reference Medium</label>
                            <select id="refmedium" name="refmedium" class="select2 form-select"     >
                              <option value="">Select </option>
                              <option value="Employee">Employee</option>
                              <option value="Linkedin">Linkedin</option>
                              <option value="Others">Others</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Shift</label>
                            <select  id="shiftgrp"  name="shiftgrp"  class="select2 form-select"    >
                               <option value="">Select </option>
                                <?php 
             $sql12 = "SELECT * FROM shift order by id asc";
             $result12 = mysqli_query($conn, $sql12);
             while($rw5 = mysqli_fetch_array($result12))
              { ?>
              <option value="<?php echo $rw5['id'];?>"><?php echo $rw5['shiftname'];?>
             </option>
              <?php } ?>
                           </select>
                          </div>
                         
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="phoneNumber">Allowed Leave</label>
                            <select id="allowleave" name="allowleave1" class="select2 form-select"   >
                              <option value="0">Select </option>
                              <option value="1"> 1</option>
                              <option value="2"> 2</option>
                              <option value="3"> 3</option>
                            </select>
                          </div>
                          
                         
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Date Of Joining </label>
                            <input type="date" class="form-control" id="hiringdate" name="hiringdate"   />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">PF No</label>
                            <input type="number" class="form-control" id="pf" name="pf"   />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label"> PF Date</label>
                            <input type="date" class="form-control" id="pfdate" name="pfdate"   />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">ESI No</label>
                            <input type="number" class="form-control" id="esino" name="esino"    />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">ESI Joining Date</label>
                            <input type="date" class="form-control" id="esijod" name="esijod"    />
                          </div>
                          <div class="mb-3 col-md-3">
                          
                            <input type="number" hidden id="yearlyallow" name="yearlyallow"    />
                          </div>
                          
                         
                        
                         
                          
                        </div>
                       
                     
                    </div>
                  </div> 
                  
                  

<!--hjjj-->
<div class="card mb-4">
                    <h5 class="card-header">Account Details</h5>
                    <!-- Account -->
                   
                    <hr class="my-0" />
                    <div class="card-body">
                    
                        <div class="row">
                          <div class="mb-3 col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Account No:</label>
                          <input
                              type="text"
                              class="form-control"
                              id="accno"
                              name="accno"
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="lastName" class="form-label">Account Holder Name</label>
                            <input class="form-control" type="text" name="accname" id="accname" />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Bank Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="bank"
                              name="bank"
                              
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Branch</label>
                            <input
                              type="text"
                              class="form-control"
                              id="accbranch"
                              name="accbranch"
                              
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="phoneNumber">IFSC Code</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ifsc"
                              name="ifsc"
                              
                             />
                          </div>
                         
                          
                         
                        
                         
                          
                        </div>
                       
                    </div>
                  </div>








                  <div class="card mb-4">
                    <h5 class="card-header">Salary Details</h5>
                    <!-- Account -->
                   
                    <hr class="my-0" />
                    <div class="card-body">
                    
                        <div class="row">
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">CTC</label>
                            <input type="text" class="form-control" id="ctc" name="ctc"     />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Basic DA</label>
                            <input type="text" class="form-control" id="basic_da" name="basic_da"     />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">HRA</label>
                            <input type="text" class="form-control" id="hra" name="hra"     />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Allowance</label>
                            <input type="text" class="form-control" id="allowance" name="allowance"     />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Deduction</label>
                            <input type="text" class="form-control" id="deduction" name="deduction"     />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="ot" name="ot"     />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="phoneNumber">Salary Type</label>
                            <select id="salary" name="salary" class="select2 form-select"   >
                              <option value="">Select </option>
                              <option value="Hourly"> Hourly</option>
                              <option value="Weekly"> Weekly</option>
                              <option value="Monthly"> Monthly</option>
                            </select>
                          </div>


                          <!-- <div class="mb-3 col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Incentive <span style="color:red;">*</span></label>
                          <select id="initiative" name="initiative" class="select2 form-select" >
                              <option value="">Select </option>
                              <option value="Yes"> Yes</option>
                              <option value="No"> No</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="lastName" class="form-label">Convey</label>
                            <input class="form-control" type="text" name="convey" id="convey" />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Bike Allowance</label>
                            <input
                              type="text"
                              class="form-control"
                              id="specharge"
                              name="specharge"
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Over Time</label>
                            <input
                              type="text"
                              class="form-control"
                              id="aot"
                              name="aot"
                             />
                          </div> -->
                          <div class="mb-3 col-md-12">
                            <label for="organization" class="form-label">Profile Create By</label>
                            <input
                              type="text"
                              class="form-control"
                              id="createby"
                              name="createby"
                              style="border:none;width:300px"
                             value="<?php echo $user_name; ?>" readonly/>
                          </div>
                         
                         
                         
                          
                         
                        
                         
                          
                        </div>
                        <div class="mt-2">
                          <button type="submit" value="submit" name="submit" class="btn btn-primary me-2">Save </button>
                          <a type="button" href="emp_master1.php" class="btn btn-label-secondary">Cancel</a>
                        </div>
                      </form>
                    </div>
                    </div>
           
                </div>
              </div>
            </div>



             </div>
             <!--/ Teams Cards -->


            </div>  
            </div>  
        <!-- / Layout page -->
      </div>
    
      
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>


                <?php
if(isset($_POST['submit']))
{
$empid=$_POST['empid'];
$emp_id=$_POST['emp_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phno=$_POST['phno'];
$altphno=$_POST['altphno'];
$dob=$_POST['dob'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$bgrp=$_POST['bgrp'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$fname=$_POST['fname'];
$fphno=$_POST['fphno'];
$mname=$_POST['mname'];
$mphno=$_POST['mphno'];
$lang=$_POST['lang'];
$branch=$_POST['branch'];
$disability=$_POST['disability'];
$reason=$_POST['reason'];
$depart=$_POST['depart'];
$desig=$_POST['desig'];
$reportmanager=$_POST['reportmanager'];
$shiftgrp=$_POST['shiftgrp'];
$salary=$_POST['salary'];
$refmedium=$_POST['refmedium'];
$hiringdate=$_POST['hiringdate'];
$pf=$_POST['pf'];
$esino=$_POST['esino'];
$esijod=$_POST['esijod'];
$ot=$_POST['ot'];
$accno=$_POST['accno'];
$accname=$_POST['accname'];
$bank=$_POST['bank'];
$accbranch=$_POST['accbranch'];
$ifsc=$_POST['ifsc'];
$initiative=$_POST['initiative'];
$pfdate=$_POST['pfdate'];
$convey=$_POST['convey'];
$specharge=$_POST['specharge'];
$aot=$_POST['aot'];
$allowleave=$_POST['allowleave1'];
$yearlyallow=$_POST['allowleave1']*12;
$userrole=$_POST['userrole'];
$createby=$_POST['createby'];
$ctc=$_POST['ctc'];
$basic_da=$_POST['basic_da'];
$hra=$_POST['hra'];
$allowance=$_POST['allowance'];
$deduction=$_POST['deduction'];
$mstatus=$_POST['mstatus'];
$emgphno=$_POST['emgphno'];
$spouse=$_POST['spouse'];
$localaddress=$_POST['localaddress'];
$peraddress=$_POST['peraddress'];
$ref1=$_POST['ref1'];
$ref2=$_POST['ref2'];
$ref3=$_POST['ref3'];

$newpassword= md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);

  $p1 = $_FILES['imageUpload']['name'];
  $p_tmp1 = $_FILES['imageUpload']['tmp_name'];
  $path = "uploads/$p1";
  $move = move_uploaded_file($p_tmp1, $path);



  if($newpassword== $confirmpassword){

 $sql="INSERT into employee (empid,emp_id,name,email,phno,pfdate,altphno,dob,age,gender,bgrp,country,state,city,pincode,fname,fphno,mname,mphno,lang,branch,disability,reason,depart,desig,reportmanager,shiftgrp,salary,refmedium,hiringdate,pf,esino,esijod,ot,accno,accname,bank,accbranch,ifsc,initiative,convey,specharge,aot,allowleave,yearlyallow,userrole,createby,ctc,basic_da,hra,allowance,deduction,mstatus,emgphno,spouse,localaddress,peraddress,ref1,ref2,ref3,newpassword,imageUpload)
 values('$empid','$emp_id','$name','$email','$phno','$pfdate','$altphno','$dob','$age','$gender','$bgrp','$country','$state','$city','$pincode','$fname','$fphno','$mname','$mphno','$lang','$branch','$disability','$reason','$depart','$desig','$reportmanager','$shiftgrp','$salary','$refmedium','$hiringdate','$pf','$esino','$esijod','$ot','$accno','$accname','$bank','$accbranch','$ifsc','$initiative','$convey','$specharge','$aot','$allowleave','$yearlyallow','$userrole','$createby','$ctc','$basic_da','$hra','$allowance','$deduction','$mstatus','$emgphno','$spouse','$localaddress','$peraddress','$ref1','$ref2','$ref3','$newpassword','$p1')"; 
$result2=mysqli_query($conn, $sql);
$id = mysqli_insert_id($conn);
  }

if ($result2) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Profile has been Saved successfully.",
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
            text: "There was an error saving the Profile.",
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


function dd1(value) {
	//alert(value);

   
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
// location.reload();//
document.getElementById('spo').innerHTML=r;
						

      }
    };
    xmlhttp.open("GET","ajax/get_spouse.php?id="+value,true);
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


<script>
function get_items(value) {
//alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
  
						  document.getElementById('desig').innerHTML = r;
					   

      }
    };
    xmlhttp.open("GET","ajax/getdesignation.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<script>
function get_name(value) {
//alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
  
						  document.getElementById('reportmanager').innerHTML = r;
					   

      }
    };
    xmlhttp.open("GET","ajax/get_reportmanager.php?id="+value,true);
    xmlhttp.send();
  }
}
</script> 

<script>
function get_id(value) {
//alert("hello");

				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#empid').val(data.eid);
$('#emp_id').val(data.eid1);


}

      }
    };
    xmlhttp.open("GET","ajax/get_sno.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>