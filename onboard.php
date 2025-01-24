
<?php include "config.php";include "head.php";include "session.php";?>



  <body>
    <!-- Content -->



    <script>
                function getcustomer(value1) {

                    //alert(value1); 
               
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                             
                            r = xmlhttp.responseText;
						//alert(r);
							var r1=r.split('???');
              // var sts=r1[0];

					 document.getElementById('candid_name').innerHTML = r1[0];
					 document.getElementById('preattempt').value = r1[1];
					 document.getElementById('id').value = r1[2];
					 document.getElementById('nextattempt').value = r1[3];
					
           //alert(r1[3]);
          // alert(r1[4]);
					 //document.getElementById('customer_id').value = r1[1];
                    
           if( r1[4]<=r1[3] && r1[1]>0)  { 


document.getElementById('ii').innerHTML ='This Candidate Not Eligible to Attempt Now';
} 
else

{ 
document.getElementById('ii').innerHTML ='';
}

                     if(r1[0]=='')
					 {
					document.getElementById('interdate').style.display='none';	 
					document.getElementById('pre').style.display='none';	 
					 
					 }
					else{
					document.getElementById('interdate').style.display='block';	
					document.getElementById('pre').style.display='block';	
					
					}
						//  location.reload();
							
                        }
                    }
                    xmlhttp.open("GET", "ajax/getcandid.php?q1="+value1, true);

                    xmlhttp.send();

                }
            </script>
   

    <div class="authentication-wrapper authentication-basic px-4">
      <div class="authentication-inner py-4">
        <!--  Two Steps Verification -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center mb-4 mt-2">
              <a href="index.html" class="app-brand-link gap-2">
                <span >
               <img src="../assets/img/avatars/CREDENCE.png" style="width:170px;height:50px;align:center"  /> 
                </span>
                <!-- <span class="app-brand-text demo text-body fw-bold ms-1">CREDENCE</span> -->
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="app-brand fw-bold justify-content-center mb-4 mt-2">ONBOARDING</h4>
            
            <form id="twoStepsForm" action="" method="POST">

 

            <input type="text" class="form-control" id="id" name="id" hidden>
              <div class="mb-3">
              <div class="input-group input-group-merge">
                            <span class="input-group-text">IND (+91)</span>
                            <input type="text" class="form-control" id="phno" name="phno" onkeyup="getcustomer(this.value);getcustomer1(this.value);" required="" maxlength="10">
                          </div>
                <!-- Create a hidden field which is combined by 3 fields above -->
                <input type="hidden" name="otp" />
              </div>
              <div class="mb-3 ">
                          
              <select name="candid_name" id="candid_name" style="font-size:15px;text-transform:uppercase"    class="form-control">
      <option value="">Select</option>
      </select>
                          </div>
                          <div class="row">
              <div class="mb-3 col-md-6" id="pre">
              <label for="firstName" class="form-label"> Pre Attempt</label>
                            <input class="form-control" type="text" id="preattempt" name="preattempt" readonly>
                          </div>
            <div class="mb-3 col-md-6" id="interdate">
                            <label for="firstName" class="form-label "> Next Attempt</label>
                          
                            <input class="form-control" name="nextattempt" type="date"id="nextattempt" readonly>
                            
                             
                            <input class="form-control" type="text" hidden id="date" name="date"   value="<?php echo date("Y-m-d");?>">
                          </div>
                          </div>

                          <div style="font-weight:bold;font-size:17px;color:red" id="ii">
                </div>
<br>
              <button class="btn btn-primary d-grid w-100 mb-3" type="submit" name="submit">Verify</button>
              <div class="text-center">
                <?php if($_POST['preattempt']!=0) {?>
              Next attempt <span id="inter"> </span><br><?php } ?>
                <a class="btn btn-secondary d-grid w-100 mb-3" href="hr_master.php"> Back </a>
              </div>
            </form>
          </div>
        </div>
        <!-- / Two Steps Verification -->
      </div>
    </div>
   
<?php include "footer.php"; ?>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
  $date=$_POST['date'];  
$preattempt=$_POST['preattempt']+1;
$nextattempt=$_POST['nextattempt'];






  $sql1="UPDATE details_entry SET preattempt='$preattempt',date='$date',nextattempt='$nextattempt',status='1' WHERE  id='$id'";
  $result2=mysqli_query($conn, $sql1);
$cid=base64_encode($id);

  if ($result2) {
    echo "<script>
    Swal.fire({
      title: 'Success!',
      text: ' Department has been saved successfully.',
      icon: 'success',
      confirmButtonText: 'OK'
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'onboard2.php?cid=$cid'; // Corrected line
      }
    });
  </script>";
  } 
  else {
    echo '<script>
            Swal.fire({
              title: "Error!",
              text: "There was an error saving the Onboard.",
              icon: "error",
              confirmButtonText: "OK"
            });
          </script>';
  }
}
?>

<?php include "footer.php"; ?>