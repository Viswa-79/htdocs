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


              
   <div class="card-header d-flex align-items-center justify-content-between mb-2">
                      <h3 class="py-0 mb-2"><b>Profile Details</b></h3>
                     
                    
                                 
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
                              $sql4 = " SELECT *,e.id as id,f.desig as desig  FROM employee e left join  depart d on e.depart=d.id left join desi_master f on e.desig=f.id left join shift s on e.shiftgrp=s.id WHERE e.id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);


                             
                              $sql5 = " SELECT * FROM employee  WHERE id='".$wz1['reportmanager']."'";
                              $result5 = mysqli_query($conn, $sql5);
                              $wz2 = mysqli_fetch_array($result5);
                                  ?>



                              


                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">

              
                    
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <img 
                      src="uploads/<?php echo $wz1['imageUpload']; ?>"
                            id="imagePreview"
                            style=" width: 100%;
            height: 100%;
           
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center; background-image: url(http://192.168.1.11/projects/credence/pages/500?img=7);"
                          class="d-block w-px-100 h-px-100 rounded"
                          
                          />    
                        <div class="button-wrapper">
                          <label for="imageUpload" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span  class="d-none d-sm-block" style="text-transform:uppercase"><?php echo $wz1['name']; ?></span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <!-- <input
                              type="file"
                              name="imageUpload"
                              id="imageUpload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg" readonly/>
                              <input class="form-control " type="text"  name="photo1" id="photo1" value="<?php echo $wz1['imageUpload']; ?>" hidden> -->
                          </label>
                         

                          <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                    
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label"> Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              value="<?php echo $wz1['name']; ?>"
                              readonly
                              autofocus />
                          </div>
                         
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">E-mail</label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo $wz1['email']; ?>" readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
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
                              maxlength="10"
                              readonly />
                          </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Alt&nbsp;Ph.No</label>
                            <div class="input-group input-group-merge">
                            <span class="input-group-text">IND (+91)</span>
                            <input
                              type="text"
                              class="form-control"
                              id="altphno"
                              name="altphno"
                              value="<?php echo $wz1['altphno']; ?>"readonly

                              maxlength="10"/>
                          </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Date Of Birth</label>
                            <div class="input-group input-group-merge">
                              
                              <input
                                type="date"
                                id="dob"
                                name="dob"
                                class="form-control"
                                placeholder="" 
                                onchange="datediff()"
                                value="<?php echo $wz1['dob']; ?>"readonly
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
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Age</label>
                            <input type="text" class="form-control" id="age" name="age"  value="<?php echo $wz1['age']; ?>"
                            readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Gender</label>
                            <input type="text" class="form-control" id="gender" name="gender"   value="<?php echo $wz1['gender']; ?>"
                            readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Blood Group</label>
                            <input type="text" class="form-control" id="bgrp" name="bgrp"   value="<?php echo $wz1['bgrp']; ?>"
                            readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="country" class="form-label">Country</label>
                           
                            <input type="text" class="form-control" id="country" name="country"   value="<?php echo $wz1['country']; ?>" readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">State</label>
                            <input
                              type="text"
                              class="form-control"
                              id="state"
                              name="state"
                              value="<?php echo $wz1['state']; ?>" readonly
                             />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="city">City</label>
                            <input
                              type="text"
                              class="form-control"
                              id="city"
                              name="city"
                              value="<?php echo $wz1['city']; ?>" readonly
                              />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Pincode</label>
                            <input
                              type="text"
                              class="form-control"
                              id="pincode"
                              name="pincode"
                              placeholder="231465"
                              maxlength="6"
                              value="<?php echo $wz1['pincode']; ?>"readonly
                              />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Father&nbsp;Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="fname"
                              name="fname"
                              value="<?php echo $wz1['fname']; ?>"
                              maxlength="6"
                              readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Father&nbsp;Ph.No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="fphno"
                              name="fphno"
                              value="<?php echo $wz1['fphno']; ?>"
                              maxlength="10"
                              readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Mother&nbsp;Name</label>
                            <input
                              type="text"
                              class="form-control"
                              id="mname"
                              name="mname"
                              value="<?php echo $wz1['mname']; ?>"
                              readonly
                              />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="country">Mother&nbsp;Ph.No</label>
                            <input
                              type="text"
                              class="form-control"
                              id="mphno"
                              name="mphno"
                              value="<?php echo $wz1['mphno']; ?>"
                              maxlength="10"
                              readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Language</label>
                            <input
                              type="text"
                              class="form-control"
                              id="lang"
                              name="lang"
                              value="<?php echo $wz1['lang']; ?>"
                              readonly
                              />
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Branch</label>
                            <input
                              type="text"
                              class="form-control"
                              id="branch"
                              name="branch"
                              value="<?php echo $wz1['branch']; ?>"
                              readonly
                              />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="language" class="form-label">Any Disability</label>
                            <input type="text" class="form-control" id="disability" name="disability" value="<?php echo $wz1['disability']; ?>" readonly/>

                           
                          </div>
                          <?php if($wz1['disability']=='Yes'){ ?>
                          <div class="mb-3 col-md-6" id="dis">
                            <label for="address" class="form-label">Reason</label>
                            <input type="text" class="form-control" id="reason" name="reason" value="<?php echo $wz1['reason']; ?>" readonly/>
                          </div>
                          <?php }?>
                        
                          <div class="mb-3 col-md-6" id="dis">
                           
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
                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="ecommerce-product-barcode">Department <span style="color:red;">*</span></label>
                            <input type="text" class="form-control" id="depart" name="depart" value="<?php echo $wz1['depname']; ?>" readonly/>

                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="desig" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="desig" name="desig" value="<?php echo $wz1['desig']; ?>" readonly/>

                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Reporting&nbsp;Manager</label>
                            <input
                              type="text"
                              class="form-control"
                              id="reportmanager"
                              name="reportmanager"
                              value="<?php echo $wz2['name']; ?>"
                              readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Reference Medium</label>
                            <input id="refmedium" name="refmedium" class="form-control" value="<?php echo $wz1['refmedium']; ?>" readonly/>

                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Shift&nbsp;Group</label>
                            <input
                              type="text"
                              class="form-control"
                              id="shiftgrp"
                              name="shiftgrp"
                              value="<?php echo $wz1['shiftname']; ?>" readonly
                             />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="ot" name="ot" value="<?php echo $wz1['ot']; ?>"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Salary Type</label>
                            <input id="salary" name="salary" class="form-control" value=" <?php echo $wz1['salary']; ?>" readonly/>

                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Monthly Leave Allowed</label>
                            <input id="allowleave" name="allowleave" class="form-control" value=" <?php echo $wz1['allowleave']; ?>" readonly/>
                          </div> 

                         
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">PF No</label>
                            <input type="number" class="form-control" id="pf" name="pf" value="<?php echo $wz1['pf']; ?>" readonly/>
                          </div>
                         
                            
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">PF Joining Date</label>
                            <input type="Date" class="form-control" id="hiringdate" name="hiringdate"  value="<?php echo $wz1['hiringdate']; ?>" readonly/>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">ESI No</label>
                            <input type="number" class="form-control" id="esino" name="esino" value="<?php echo $wz1['esino']; ?>" readonly/>
                          </div>


                            
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">ESI Joining Date</label>
                            <input type="Date" class="form-control" id="esijod" name="esijod"  value="<?php echo $wz1['esijod']; ?>" readonly/>
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
                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="ecommerce-product-barcode">Account No: <span style="color:red;">*</span></label>
                          <input
                              type="text"
                              class="form-control"
                              id="accno"
                              name="accno"
                              value="<?php echo $wz1['accno']; ?>"readonly
                             />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Account Name</label>
                            <input class="form-control" type="text" name="accname" id="accname"   value="<?php echo $wz1['accname']; ?>" readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Bank</label>
                            <input
                              type="text"
                              class="form-control"
                              id="bank"
                              name="bank"
                              value="<?php echo $wz1['bank']; ?>"
                              readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Branch</label>
                            <input
                              type="text"
                              class="form-control"
                              id="accbranch"
                              name="accbranch"
                              value="<?php echo $wz1['accbranch']; ?>" readonly
                             />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">IFSC Code</label>
                            <input
                              type="text"
                              class="form-control"
                              id="ifsc"
                              name="ifsc"
                              value="<?php echo $wz1['ifsc']; ?>" readonly
                             />
                          </div>
                         
                          
                         
                        
                         
                          
                        </div>
                       
                    </div>
                  </div>








                  <div class="card mb-4">
                    <h5 class="card-header">Allowance Details</h5>
                    <!-- Account -->
                   
                    <hr class="my-0" />
                    <div class="card-body">
                    
                        <div class="row">
                          <div class="mb-3 col-md-6">
                          <label class="form-label" for="ecommerce-product-barcode">Incentive <span style="color:red;">*</span></label>
                          <input id="initiative" name="initiative" class="form-control"  value="<?php echo $wz1['initiative']; ?>" readonly/>

                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Convey</label>
                            <input class="form-control" type="text" name="convey" id="convey" value="<?php echo $wz1['convey']; ?>" readonly/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Bike Allowance</label>
                            <input
                              type="text"
                              class="form-control"
                              id="specharge"
                              name="specharge"
                              value="<?php echo $wz1['specharge']; ?>"
                              readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Over Time</label>
                            <input
                              type="text"
                              class="form-control"
                              id="aot"
                              name="aot" value="<?php echo $wz1['aot']; ?>" readonly
                             />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Profile Create By</label>
                            <input
                              type="text"
                              style="border:none"
                             value="<?php echo $wz1['createby']; ?>"
                            readonly />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label"></label>
                            <input
                            hidden
                              type="text"
                              class="form-control"
                              id="id"
                             
                              readonly/>
                          </div>
                         
                         
                          
                         
                        
                         
                          
                        </div>
                        <!-- <div class="mt-2">
                          <button type="submit" name="submit" class="btn btn-primary me-2">Save </button>
                          <button type="reset" class="btn btn-label-secondary">Cancel</button>
                        </div> -->
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


 
				
			
 $sql="UPDATE employee SET name='$name',email='$email',phno='$phno',altphno='$altphno',dob='$dob',age='$age',gender='$gender',bgrp='$bgrp',country='$country',state='$state',city='$city',pincode='$pincode',fname='$fname',fphno='$fphno',mname='$mname',mphno='$mphno',lang='$lang',branch='$branch',disability='$disability',reason='$reason',depart='$depart',desig='$desig',reportmanager='$reportmanager',refmedium='$refmedium',shiftgrp='$shiftgrp',salary='$salary',hiringdate='$hiringdate',pf='$pf',esino='$esino',esijod='$esijod',ot='$ot',accno='$accno',accname='$accname',bank='$bank',accbranch='$accbranch',ifsc='$ifsc',initiative='$initiative',convey='$convey',specharge='$specharge',aot='$aot',allowleave='$allowleave',yearlyallow='$yearlyallow',imageUpload='$p1' WHERE id='$sid'"; 
$result2=mysqli_query($conn, $sql);



 if($result2) { 
 echo "<script>alert('Profile Updated Successfully');window.location='emp_master1.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
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