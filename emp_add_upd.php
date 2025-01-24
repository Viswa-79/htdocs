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
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 


              
   <div class="card-header d-flex align-items-center justify-content-between mb-2 mt-4">
   <h3> <button class="btn btn-primary">Personal Details</button></h3>                     
   <a href="emp_master1.php" class="btn btn-outline-warning"> <i class="ti-xs ti ti-eye me-1"></i>View List</a>

                                 
</div>       
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



                  <?php
	 $sid=base64_decode($_GET['cid']);


		 ?>               

<?php
                              $sql4 = " SELECT * FROM employee WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>



                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    
                    <!-- Account -->
                    <div class="card-body">

              
                    
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <img 
                      src="uploads/<?php echo $wz1['imageUpload']; ?>"
                            id="imagePreview"
                            style="width: 100%;
            height: 100%;
           
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center; background-image: url(http://192.168.1.11/projects/credence/pages/uploads/<?php echo $wz1['imageUpload']; ?>);"
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
                          <input class="form-control " type="text" hidden name="photo1" id="photo1" value="<?php echo $wz1['imageUpload']; ?>" hidden>

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
                       
                       

                        <div hidden class="mb-3 col-md-3">
                            <label for="firstName" class="form-label" hidden> Staff ID</label>
                            <input
                              class="form-control"
                              type="text"
                              id="emp_id"
                              name="emp_id" hidden
                              value="<?php echo $wz1['emp_id']; ?>"
                           readonly
                                  />
                          </div>

                          
                          <div class="mb-3 col-md-3">
                            <label for="firstName" class="form-label"> Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              value="<?php echo $wz1['name']; ?>"
                           required
                               />
                          </div>
                         
                          <div class="mb-3 col-md-3">
                            <label for="lastName" class="form-label">E-mail</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo $wz1['email']; ?>" required/>
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
                              value="<?php echo $wz1['phno']; ?>"
                              placeholder="" 
                              maxlength="10" />
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
                              value="<?php echo $wz1['altphno']; ?>"

                              maxlength="10"/>
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
                              value="<?php echo $wz1['emgphno']; ?>"

                              maxlength="10"/>
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
                                onchange="datediff()"
                                value="<?php echo $wz1['dob']; ?>"
 />


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
                            <input type="text" class="form-control" id="age" name="age"  value="<?php echo $wz1['age']; ?>"
 />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Gender</label>
                            <select id="gender" name="gender" class="select2 form-select" <?php echo $wz1['gender']; ?>>
                              <option value="">Select</option>
                              <option value="Male"<?php if($wz1['gender']=='Male'){ ?>Selected<?php } ?>>Male</option>
                              <option value="Female"<?php if($wz1['gender']=='Female'){ ?>Selected<?php } ?>>Female</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Blood Group</label>
                            <input type="text" class="form-control" id="bgrp" name="bgrp"   value="<?php echo $wz1['bgrp']; ?>"
 />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" name="country" class="select2 form-select" value="<?php echo $wz1['country']; ?>">
                              <option value="">Select</option>
                              <option value="Australia"<?php if($wz1['country']=='Australia'){ ?>Selected<?php } ?>>Australia</option>
                              <option value="Bangladesh"<?php if($wz1['country']=='Bangladesh'){ ?>Selected<?php } ?>>Bangladesh</option>
                              <option value="Belarus"<?php if($wz1['country']=='Belarus'){ ?>Selected<?php } ?>>Belarus</option>
                              <option value="Brazil"<?php if($wz1['country']=='Brazil'){ ?>Selected<?php } ?>>Brazil</option>
                              <option value="Canada"<?php if($wz1['country']=='Canada'){ ?>Selected<?php } ?>>Canada</option>
                              <option value="China"<?php if($wz1['country']=='China'){ ?>Selected<?php } ?>>China</option>
                              <option value="France"<?php if($wz1['country']=='France'){ ?>Selected<?php } ?>>France</option>
                              <option value="Germany"<?php if($wz1['country']=='Germany'){ ?>Selected<?php } ?>>Germany</option>
                              <option value="India"<?php if($wz1['country']=='India'){ ?>Selected<?php } ?>>India</option>
                              <option value="Israel"<?php if($wz1['country']=='Israel'){ ?>Selected<?php } ?>>Israel</option>
                              <option value="Italy"<?php if($wz1['country']=='Italy'){ ?>Selected<?php } ?>>Italy</option>
                              <option value="Japan"<?php if($wz1['country']=='Japan'){ ?>Selected<?php } ?>>Japan</option>
                              <option value="Korea"<?php if($wz1['country']=='Korea'){ ?>Selected<?php } ?>>Korea</option>
                              <option value="Mexico"<?php if($wz1['country']=='Mexico'){ ?>Selected<?php } ?>>Mexico</option>
                              <option value="Philippines"<?php if($wz1['country']=='Philippines'){ ?>Selected<?php } ?>>Philippines</option>
                              <option value="Russia"<?php if($wz1['country']=='Russia'){ ?>Selected<?php } ?>>Russia</option>
                              <option value="South Africa"<?php if($wz1['country']=='South Africa'){ ?>Selected<?php } ?>>South Africa</option>
                              <option value="Thailand"<?php if($wz1['country']=='Thailand'){ ?>Selected<?php } ?>>Thailand</option>
                              <option value="Turkey"<?php if($wz1['country']=='Turkey'){ ?>Selected<?php } ?>>Turkey</option>
                              <option value="Ukraine"<?php if($wz1['country']=='Ukraine'){ ?>Selected<?php } ?>>Ukraine</option>
                              <option value="United Arab Emirates"<?php if($wz1['country']=='United Arab Emirates'){ ?>Selected<?php } ?>>United Arab Emirates</option>
                              <option value="United Kingdom"<?php if($wz1['country']=='United Kingdom'){ ?>Selected<?php } ?>>United Kingdom</option>
                              <option value="United States"<?php if($wz1['country']=='United States'){ ?>Selected<?php } ?>>United States</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="zipCode" class="form-label">State</label>
                            <input
                              type="text"
                              class="form-control"
                              id="state"
                              name="state"
                              value="<?php echo $wz1['state']; ?>"
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="city">City</label>
                            <input
                              type="text"
                              class="form-control"
                              id="city"
                              name="city"
                              value="<?php echo $wz1['city']; ?>"
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
                              value="<?php echo $wz1['pincode']; ?>"
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Father&nbsp;Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="fname"
                              name="fname"
                              value="<?php echo $wz1['fname']; ?>"
                              
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Father&nbsp;Ph.No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="fphno"
                              name="fphno"
                              value="<?php echo $wz1['fphno']; ?>"
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
                              value="<?php echo $wz1['mname']; ?>"
                            
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="country">Mother&nbsp;Ph.No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="mphno"
                              name="mphno"
                              value="<?php echo $wz1['mphno']; ?>"
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
                              value="<?php echo $wz1['lang']; ?>"
                            
                              />
                          </div>

                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Marital Status</label>
                            <select id="mstatus" name="mstatus" class="select form-select">
                              <option value="">Select </option>
                              <option value="Married"<?php if($wz1['mstatus']=='Married'){ ?>Selected<?php } ?>>Married</option>
                              <option value="Unmarried"<?php if($wz1['mstatus']=='Unmarried'){ ?>Selected<?php } ?>>Unmarried</option>
                            </select>
                          </div>

                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Spouse Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="spouse"
                              name="spouse"
                              value="<?php echo $wz1['spouse']; ?>"
                            
                              />
                              </div>

                              <div class="mb-3 col-md-6" >
                          <label for="language" class="form-label">Local Address</label>
                          <input
                              type="text"
                              class="form-control"
                              id="localaddress"
                              name="localaddress"
                              value="<?php echo $wz1['localaddress']; ?>"
                              
                              />
                              
                             
                          </div>
                          <div class="mb-3 col-md-6" >
                          <label for="language" class="form-label">Permanant Address</label>
                          <input
                              type="text"
                              class="form-control"
                              id="peraddress"
                              name="peraddress"
                               
                              value="<?php echo $wz1['peraddress']; ?>"
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
                               value="<?php echo $wz1['ref1']; ?>"
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
                              value="<?php echo $wz1['ref2']; ?>"
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
                              value="<?php echo $wz1['ref3']; ?>"
                              />
                          </div>




                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Branch</label>
                            <input
                              type="text"
                              class="form-control"
                              id="branch"
                              name="branch"
                              value="<?php echo $wz1['branch']; ?>"
                            
                              />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="language" class="form-label">Any Disability</label>
                            <select id="disability" name="disability" class="select form-select" onclick="getpayment(this.value);dd(this.value);" value="<?php echo $wz1['disability']; ?>">
                              <option value="">Select </option>
                              <option value="No"<?php if($wz1['disability']=='No'){ ?>Selected<?php } ?>>No</option>
                              <option value="Yes"<?php if($wz1['disability']=='Yes'){ ?>Selected<?php } ?>>Yes</option>
                            </select>
                          </div>
                          <?php if($wz1['disability']=='Yes'){ ?>
                          <div class="mb-3 col-md-3" id="dis">
                            <label for="address" class="form-label">Reason</label>
                            <input type="text" class="form-control" id="reason" name="reason" value="<?php echo $wz1['reason']; ?>"/>
                          </div>
                          <?php }?>
                        
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

                        <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Role</label>
                            <select id="userrole" name="userrole" class="select form-select" autofocus required <?php echo $wz1['userrole']; ?>>
                              <option value="">Select </option>
                              <?php 
					$sql = "SELECT * FROM user_role  ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                          <option <?php if($rw['id']==$wz1['userrole']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['role'];?></option>
                                                    <?php } ?> 
                            </select>
                          </div>

                        <div class="mb-3 col-md-3">
                            <label for="firstName" class="form-label"> Staff ID</label>
                            <input
                              class="form-control"
                              type="text"
                              id="empid"
                              name="empid"
                              value="<?php echo $wz1['empid']; ?>"
                           readonly
                               required   />
                          </div>

                          <div class="mb-3 col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Department <span style="color:red;">*</span></label>
                            <select name="depart" id="depart"  class="select2 form-select"  onchange="get_items(this.value);get_name(this.value);"  value="<?php echo $wz1['depart']; ?>" >
                                <option value="">Select</option>

                                <?php 
					$sql = "SELECT * FROM depart ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                          <option <?php if($rw['id']==$wz1['depart']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['depname'];?></option>
                                                    <?php } ?> 
				
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="desig" class="form-label">Designation</label>
                            <select class="select2 form-select"  name="desig" id="desig"   >
						  <option value="">--Select--</option>


                          <?php 
					$sql = "SELECT * FROM desi_master where depart='".$wz1['depart']."' ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                          <option <?php if($rw['id']==$wz1['desig']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['desig'];?></option>
                                                    <?php } ?> 
				
              </select>
                          </div>
                          
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Reporting&nbsp;Manager</label>
                            <select class="select2 form-select"  name="reportmanager" id="reportmanager">
						  <option value="">--Select--</option>


                          <?php 
					$sql = "SELECT * FROM employee where id!='".$wz1['id']."' ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                          <option <?php if($rw['id']==$wz1['reportmanager']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                                                    <?php } ?> 
				
              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Reference Medium</label>
                            <select id="refmedium" name="refmedium" class="select2 form-select"  <?php echo $wz1['refmedium']; ?>>
                              <option value="">Select </option>
                              <option value="Employee"<?php if($wz1['refmedium']=='Employee'){ ?>Selected<?php } ?>>Employee</option>
                              <option value="Linkedin"<?php if($wz1['refmedium']=='Linkedin'){ ?>Selected<?php } ?>>Linkedin</option>
                              <option value="Others"<?php if($wz1['refmedium']=='Others'){ ?>Selected<?php } ?>>Others</option>
                            </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Shift</label>
                            <select name="shiftgrp" id="shiftgrp"  class="select2 form-select"  value="<?php echo $wz1['shiftgrp']; ?>" >
                                <option value="">Select</option>

                                <?php 
					$sql = "SELECT * FROM shift ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                          <option <?php if($rw['id']==$wz1['shiftgrp']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['shiftname'];?></option>
                                                    <?php } ?> 
				
                              </select>

                          </div>
                         
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Monthly Leave Allowed</label>
                            <select id="allowleave" name="allowleave" class="select2 form-select" <?php echo $wz1['allowleave']; ?>>
                              <option value="0">Select </option>
                              <option value="1"<?php if($wz1['allowleave']=='1'){ ?>Selected<?php } ?>> 1</option>
                              <option value="2"<?php if($wz1['allowleave']=='2'){ ?>Selected<?php } ?>> 2</option>
                              <option value="3"<?php if($wz1['allowleave']=='3'){ ?>Selected<?php } ?>> 3</option>
                            </select>                          </div> 

                            
                            <div class="mb-3 col-md-3">
                              <label for="address" class="form-label">Date Of Joining</label>
                              <input type="Date" class="form-control" id="hiringdate" name="hiringdate"  value="<?php echo $wz1['hiringdate']; ?>"/>
                            </div>

                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">PF No</label>
                            <input type="number" class="form-control" id="pf" name="pf" value="<?php echo $wz1['pf']; ?>"/>
                          </div>

                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">PF Date</label>
                            <input type="date" class="form-control" id="pfdate" name="pfdate" value="<?php echo $wz1['pfdate']; ?>"/>
                          </div>
                          
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">ESI No</label>
                            <input type="number" class="form-control" id="esino" name="esino" value="<?php echo $wz1['esino']; ?>"/>
                          </div>


                            
                          <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">ESI Joining Date</label>
                            <input type="date" class="form-control" id="esijod" name="esijod"  value="<?php echo $wz1['esijod']; ?>"/>
                          </div>
                           
                            <input type="number" class="form-control" hidden  id="yearlyallow" name="yearlyallow"  />
                          
                        
                         
                          
                       
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
                          <label class="form-label" for="ecommerce-product-barcode">Account No: <span style="color:red;">*</span></label>
                          <input
                              type="text"
                              class="form-control"
                              id="accno"
                              name="accno"
                              value="<?php echo $wz1['accno']; ?>"
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="lastName" class="form-label">Account Holder Name</label>
                            <input class="form-control" type="text" name="accname" id="accname"   value="<?php echo $wz1['accname']; ?>"/>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Bank</label>
                            <input
                              type="text"
                              class="form-control"
                              id="bank"
                              name="bank"
                              value="<?php echo $wz1['bank']; ?>"
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Branch</label>
                            <input
                              type="text"
                              class="form-control"
                              id="accbranch"
                              name="accbranch"
                              value="<?php echo $wz1['accbranch']; ?>"
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="phoneNumber">IFSC Code</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ifsc"
                              name="ifsc"
                              value="<?php echo $wz1['ifsc']; ?>"
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
                            <input type="text" class="form-control" id="ctc" name="ctc"  value="<?php echo $wz1['ctc']; ?>"   />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Basic DA</label>
                            <input type="text" class="form-control" id="basic_da" name="basic_da"  value="<?php echo $wz1['basic_da']; ?>"   />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">HRA</label>
                            <input type="text" class="form-control" id="hra" name="hra"  value="<?php echo $wz1['hra']; ?>"   />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Allowance</label>
                            <input type="text" class="form-control" id="allowance" name="allowance"   value="<?php echo $wz1['allowance']; ?>"  />
                          </div>
                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Deduction</label>
                            <input type="text" class="form-control" id="deduction" name="deduction"   value="<?php echo $wz1['deduction']; ?>"  />
                          </div>

                        <div class="mb-3 col-md-3">
                            <label for="address" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="ot" name="ot" value="<?php echo $wz1['ot']; ?>"/>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label class="form-label" for="phoneNumber">Salary Type</label>
                            <select id="salary" name="salary" class="select2 form-select" <?php echo $wz1['salary']; ?>>
                              <option value="">Select </option>
                              <option value="Hourly"<?php if($wz1['salary']=='Hourly'){ ?>Selected<?php } ?>> Hourly</option>
                              <option value="Weekly"<?php if($wz1['salary']=='Weekly'){ ?>Selected<?php } ?>> Weekly</option>
                              <option value="Monthly"<?php if($wz1['salary']=='Monthly'){ ?>Selected<?php } ?>> Monthly</option>
                            </select>
                          </div>
                          <!-- <div class="mb-3 col-md-3">
                          <label class="form-label" for="ecommerce-product-barcode">Incentive <span style="color:red;">*</span></label>
                          <select id="initiative" name="initiative" class="select2 form-select" <?php echo $wz1['initiative']; ?>>
                              <option value="">Select </option>
                              <option value="Yes"<?php if($wz1['initiative']=='Yes'){ ?>Selected<?php } ?>> Yes</option>
                              <option value="No"<?php if($wz1['initiative']=='No'){ ?>Selected<?php } ?>> No</option>
                              </select>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="lastName" class="form-label">Convey</label>
                            <input class="form-control" type="text" name="convey" id="convey" value="<?php echo $wz1['convey']; ?>"/>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="email" class="form-label">Bike Allowance</label>
                            <input
                              type="text"
                              class="form-control"
                              id="specharge"
                              name="specharge"
                              value="<?php echo $wz1['specharge']; ?>"
                             />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label">Over Time</label>
                            <input
                              type="text"
                              class="form-control"
                              id="aot"
                              name="aot" value="<?php echo $wz1['aot']; ?>"
                             />
                          </div> -->
                          <div class="mb-3 col-md-12">
                            <label for="organization" class="form-label">Profile Create By</label>
                            <input
                              type="text"
                              style="border:none;width:300px"
                             value="<?php echo $wz1['createby']; ?>"
                             readonly/>
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="organization" class="form-label"></label>
                            <input
                            hidden
                              type="text"
                              class="form-control"
                              id="id"
                             
                             />
                          </div>
                         
                         
                          
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="submit" class="btn btn-primary me-2">Save </button>
                          <a type="button" href="emp_master1.php" class="btn btn-label-secondary">Cancel</a>
                        </div>
                      </form>
                    </div>
                  </div>

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
  $id=$_POST['id'];  
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
$refmedium=$_POST['refmedium'];
$shiftgrp=$_POST['shiftgrp'];
$salary=$_POST['salary'];
$hiringdate=$_POST['hiringdate'];
$pfdate=$_POST['pfdate'];
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
$convey=$_POST['convey'];
$specharge=$_POST['specharge'];
$aot=$_POST['aot'];
$allowleave=$_POST['allowleave'];
$yearlyallow=$_POST['allowleave']*12;
$userrole=$_POST['userrole'];
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


if($_FILES['imageUpload']['name']!='')
{
$p1 = $_FILES['imageUpload']['name'];
$p_tmp1 = $_FILES['imageUpload']['tmp_name'];
$path = "uploads/$p1";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
 $p1 = $_REQUEST['photo1'];
}


 
				
			
  $sql="UPDATE employee SET name='$name',email='$email',phno='$phno',altphno='$altphno',dob='$dob',age='$age',gender='$gender',bgrp='$bgrp',country='$country',state='$state',city='$city',pincode='$pincode',fname='$fname',fphno='$fphno',mname='$mname',mphno='$mphno',lang='$lang',branch='$branch',disability='$disability',reason='$reason',depart='$depart',desig='$desig',reportmanager='$reportmanager',refmedium='$refmedium',shiftgrp='$shiftgrp',salary='$salary',hiringdate='$hiringdate',pf='$pf',pfdate='$pfdate',esino='$esino',esijod='$esijod',ot='$ot',accno='$accno',accname='$accname',bank='$bank',accbranch='$accbranch',ifsc='$ifsc',initiative='$initiative',convey='$convey',specharge='$specharge',aot='$aot',allowleave='$allowleave',yearlyallow='$yearlyallow',userrole='$userrole',ctc='$ctc',basic_da='$basic_da',hra='$hra',allowance='$allowance',deduction='$deduction',mstatus='$mstatus',emgphno='$emgphno',spouse='$spouse',localaddress='$localaddress',ref1='$ref1',ref2='$ref2',ref3='$ref3',imageUpload='$p1' WHERE id='$sid'"; 
$result2=mysqli_query($conn, $sql);



if ($result2) {
  echo '<script>
  Swal.fire({
    title: "Updated!",
    text: "Profile has been Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "emp_master1.php"; // Corrected line
    }
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
      function getpayment(value)
{

var a=value;
//alert(a);
if(a=='Yes')
{
		document.getElementById('dis').style.display='block';
        
		
		}
    else if( a='No'){

        document.getElementById('dis').style.display='none';
     

    }
	   
	

		 
		 }
		 
		 </script>