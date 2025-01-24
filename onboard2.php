

<?php include "config.php";include "head.php";include "session.php";?>
<link rel="stylesheet" href="../assets/vendor/libs/nouislider/nouislider.css" />

<script src="sweetalert2@11.js"></script>  
<script src="jquery.min.js"></script>
<style>
        .form-container {
            max-height: 700px; /* Adjust this height as needed */
            overflow-y: auto;
            padding: 1rem;
            border: 1px solid #ddd;
        }
        .form-password-toggle .input-group-text {
            cursor: pointer;
        }
    </style>
  <body>
    <!-- Content -->
   
    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- Left Text -->
        <div
          class="d-none d-lg-flex col-lg-4 align-items-center justify-content-center p-5 auth-cover-bg-color position-relative auth-multisteps-bg-height">
          <img
            src="../assets/img/illustrations/auth-register-multisteps-illustration.png"
            alt="auth-register-multisteps"
            class="img-fluid"
            width="280" />

          <img
            src="../assets/img/illustrations/bg-shape-image-light.png"
            alt="auth-register-multisteps"
            class="platform-bg"
            data-app-light-img="illustrations/bg-shape-image-light.png"
            data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
        <!-- /Left Text -->

        <?php
	  $sid=base64_decode($_GET['cid']);


		 ?>           
     
     <?php
                              $sql4 = " SELECT * FROM details_entry d left join hr_master h on d.cid=h.id left join depart a on h.depname=a.id  left join desi_master b on h.desiname=b.id  WHERE d.id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>


        <!--  Multi Steps Registration -->
        <div   class=" card d-flex col-lg-8 align-items-center justify-content-center p-sm-0 p-10 row">
   
                <h5  class="card-header pt-0 pb-3"><img src="../assets/img/avatars/CREDENCE.png" style="width:150px;height:50px;align:center"  /> </h5>
                <div class="form-container">
                  <div class="row">
                <div class="col-md-4">
                <h4><b class="md-5">Name&nbsp;:&nbsp;</b>
                  <span style="text-transform:uppercase"><?php echo $wz1['name']; ?></span></h4>
                  </div>
                  <div class="col-md-4">
                  <h4> <b class="md-5">Department</b>&nbsp;:&nbsp;<?php echo $wz1['depname']; ?></h4>
                  </div>
                  <div class="col-md-4">
                  <h4><b class="md-5">Designation</b>&nbsp;:&nbsp;<?php echo $wz1['desig']; ?> </h4>
                  </div>
                  </div>
                <form class="card-body" action="" method="post"  enctype="multipart/form-data" >
                  <h6>1.Communication Skills</h6>

                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">Clarity of expression</label>
                      <input style="width:100%" type="range" id="slider-hover" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val" name="slider_val" value="0"/></small>                    </div>
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-email">Active listening</label>
                      <input style="width:100%" type="range" id="slider-hover2" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val2" name="slider_val2" value="0"/></small>  
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Ability to articulate ideas</label>
                        <input style="width:100%" type="range" id="slider-hover3" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val3" name="slider_val3" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Ability to speak bold</label>
                        <input style="width:100%" type="range" id="slider-hover4" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val4" name="slider_val4" value="0"/></small>
                      </div>
                    </div>
                   
                  </div>
                  <hr class="my-4 mx-n4" />
                  <h6>2.Technical Proficiency:</h6>
                  <div class="row g-3">
                  <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Knowledge of relevant tools/software</label>
                        <input style="width:100%" type="range" id="slider-hover5" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val5" name="slider_val5" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Problem-solving ability</label>
                        <input style="width:100%" type="range" id="slider-hover6" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val6" name="slider_val6" value="0"/></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Familiarity with industry best practices</label>
                        <input style="width:100%" type="range" id="slider-hover7" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val7" name="slider_val7" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Understand the technical requirements & explain to respective teams</label>
                        <input style="width:100%" type="range" id="slider-hover8" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val8" name="slider_val8" value="0"/></small>
                      </div>
                    </div>
                  </div>
                
                  <hr class="my-4 mx-n4" />
                  <h6>3. Teamwork and Collaboration</h6>
                  <div class="row g-3">
                  <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Ability to work well in a team</label>
                        <input style="width:100%" type="range" id="slider-hover9" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val9" name="slider_val9" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Contributing to group discussions</label>
                        <input style="width:100%" type="range" id="slider-hover10" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val10" name="slider_val10" value="0"/></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Handling conflicts or disagreements</label>
                        <input style="width:100%" type="range" id="slider-hover11" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val11" name="slider_val11" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Encourage continuously and developing team</label>
                        <input style="width:100%" type="range" id="slider-hover12" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val12" name="slider_val12" value="0"/></small>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4 mx-n4" />
                  <h6>4.Adaptability:</h6>
                  <div class="row g-3">
                  <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Flexibility in handling change</label>
                        <input style="width:100%" type="range" id="slider-hover13" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val13" name="slider_val13" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Willingness to learn new skills
</label>
                        <input style="width:100%" type="range" id="slider-hover14" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val14" name="slider_val14" value="0"/></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Ability to work in diverse environments
</label>
                        <input style="width:100%" type="range" id="slider-hover15" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val15" name="slider_val15" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Able to manage any situation
</label>
                        <input style="width:100%" type="range" id="slider-hover16" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val16" name="slider_val16" value="0"/></small>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4 mx-n4" />
                  <h6>5. Leadership Potential (if applicable):</h6>
                  <div class="row g-3">
                  <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Initiative-taking</label>
                        <input style="width:100%" type="range" id="slider-hover17" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val17" name="slider_val17" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Decision-making skills</label>
                        <input style="width:100%" type="range" id="slider-hover18" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val18" name="slider_val18" value="0"/></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-password">Ability to motivate others</label>
                        <input style="width:100%" type="range" id="slider-hover19" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val19" name="slider_val19" value="0"/></small>  
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">create more leaders</label>
                        <input style="width:100%" type="range" id="slider-hover20" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val20" name="slider_val20" value="0"/></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Page</label>
                        
<br>
     <input type="file" class="form-control" readonly id="img1" name="img1" />
     <input class="form-control " type="text" hidden  name="photo1" id="photo1" hidden>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Page 2</label>
<br>
    <input type="file" class="form-control" readonly id="img2" name="img2"/>
    <input class="form-control " type="text" hidden  name="photo2" id="photo2" hidden>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-password-toggle">
                        <label class="form-label" for="multicol-confirm-password">Remarks</label>
<br>
    <input type="text" class="form-control"  id="remark" name="remark" />
    <input type="number" class="form-control" hidden id="totalmark" name="totalmark" />
                      </div>
                    </div>



                  </div>

                  <div class="pt-4">
                    <button type="submit" name="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <a type="button" href="onboard.php" class="btn btn-label-secondary">Back</a>
                  </div>
                </form>
              </div>
              
    </div>

    <?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
 $slider_val=$_POST['slider_val'];
 $slider_val2=$_POST['slider_val2'];
 $slider_val3=$_POST['slider_val3'];
 $slider_val4=$_POST['slider_val4'];
 $slider_val5=$_POST['slider_val5'];
 $slider_val6=$_POST['slider_val6'];
 $slider_val7=$_POST['slider_val7'];
 $slider_val8=$_POST['slider_val8'];
 $slider_val9=$_POST['slider_val9'];
 $slider_val10=$_POST['slider_val10'];
 $slider_val11=$_POST['slider_val11'];
 $slider_val12=$_POST['slider_val12'];
 $slider_val13=$_POST['slider_val13'];
 $slider_val14=$_POST['slider_val14'];
 $slider_val15=$_POST['slider_val15'];
 $slider_val16=$_POST['slider_val16'];
 $slider_val17=$_POST['slider_val17'];
 $slider_val18=$_POST['slider_val18'];
 $slider_val19=$_POST['slider_val19'];
 $slider_val20=$_POST['slider_val20'];
 $totalmark=$_POST['slider_val']+$_POST['slider_val2']+$_POST['slider_val3']+$_POST['slider_val4']+$_POST['slider_val5']+$_POST['slider_val6']+$_POST['slider_val7']+$_POST['slider_va8']+$_POST['slider_val9']+$_POST['slider_val10']+$_POST['slider_val11']+$_POST['slider_val12']+$_POST['slider_val13']+$_POST['slider_val14']+$_POST['slider_val15']+$_POST['slider_val16']+$_POST['slider_val17']+$_POST['slider_val18']+$_POST['slider_val19']+$_POST['slider_val20'];
$remark=$_POST['remark']; 


if($_FILES['img1']['name']!='')
{
$p1 = $_FILES['img1']['name'];
$p_tmp1 = $_FILES['img1']['tmp_name'];
$path = "uploads/$p1";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
 $p1 = $_REQUEST['photo1'];
}


if($_FILES['img2']['name']!='')
{
$p2 = $_FILES['img2']['name'];
$p_tmp1 = $_FILES['img2']['tmp_name'];
$path = "uploads/$p2";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
 $p2 = $_REQUEST['photo2'];
}




 $sql1="UPDATE details_entry SET slider_val='$slider_val',slider_val2='$slider_val2',slider_val3='$slider_val3',slider_val4='$slider_val4',slider_val5='$slider_val5',slider_val6='$slider_val6',slider_val7='$slider_val7',slider_val8='$slider_val8',slider_val9='$slider_val9',slider_val10='$slider_val10',slider_val11='$slider_val11',slider_val12='$slider_val12',slider_val13='$slider_val13',slider_val14='$slider_val14',slider_val15='$slider_val15',slider_val16='$slider_val16',slider_val17='$slider_val17',slider_val18='$slider_val18',slider_val19='$slider_val19',slider_val20='$slider_val20',img1='$p1',img2='$p2',remark='$remark',totalmark='$totalmark' WHERE  id='$sid'";
  $result3=mysqli_query($conn, $sql1);


  if ($result3) {
    echo "<script>
    Swal.fire({
      title: 'Success!',
      text: 'saved successfully.',
      icon: 'success',
      confirmButtonText: 'OK'
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'onboard.php'; // Corrected line
      }
    });
  </script>";
  } 
 
}
?>



   





<script>


function getmark(value) {
	// alert(value);

   
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
alert(r);
						

      }
    };
    xmlhttp.open("GET","ajax/getmarks.php?id="+value,true);
    xmlhttp.send();
 
}
</script> 







<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue);
    slider.addEventListener('touchmove', updateValue); // For touch devices
});
  </script>
    <script>
      // Check selected custom option
      window.Helpers.initCustomOptionCheck();
    </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover2');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue2(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val2').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue2);
    slider.addEventListener('touchmove', updateValue2); // For touch devices
});
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover3');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue3(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val3').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue3);
    slider.addEventListener('touchmove', updateValue3); // For touch devices
});
  </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover4');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue4(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val4').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue4);
    slider.addEventListener('touchmove', updateValue4); // For touch devices
});
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover5');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue5(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val5').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue5);
    slider.addEventListener('touchmove', updateValue5); // For touch devices
});
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover6');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue6(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val6').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue6);
    slider.addEventListener('touchmove', updateValue6); // For touch devices
});
  </script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover7');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue7(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val7').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue7);
    slider.addEventListener('touchmove', updateValue7); // For touch devices
});
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover8');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue8(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val8').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue8);
    slider.addEventListener('touchmove', updateValue8); // For touch devices
});
  </script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover9');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue9(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val9').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue9);
    slider.addEventListener('touchmove', updateValue9); // For touch devices
});
  </script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover10');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue10(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val10').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue10);
    slider.addEventListener('touchmove', updateValue10); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover11');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue11(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val11').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue11);
    slider.addEventListener('touchmove', updateValue11); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover12');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue12(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val12').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue12);
    slider.addEventListener('touchmove', updateValue12); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover13');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue13(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val13').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue13);
    slider.addEventListener('touchmove', updateValue13); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover14');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue14(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val14').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue14);
    slider.addEventListener('touchmove', updateValue14); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover15');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue15(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val15').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue15);
    slider.addEventListener('touchmove', updateValue15); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover16');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue16(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val16').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue16);
    slider.addEventListener('touchmove', updateValue16); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover17');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue17(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val17').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue17);
    slider.addEventListener('touchmove', updateValue17); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover18');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue18(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val18').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue18);
    slider.addEventListener('touchmove', updateValue18); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover19');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue19(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val19').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue19);
    slider.addEventListener('touchmove', updateValue19); // For touch devices
});
  </script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Get the slider element
    var slider = document.getElementById('slider-hover20');
    // Get the element to display the hovered value
  //  var sliderValueDisplay = document.getElementById('slider_val').value;

    // Function to update the displayed value
    function updateValue20(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider_val20').value=value;
        //sliderValueDisplay.textContent = value;
    }

    // Add event listeners to update value on hover
    slider.addEventListener('mousemove', updateValue20);
    slider.addEventListener('touchmove', updateValue20); // For touch devices
});
  </script>

<script>
        function updateSliderValue(sliderId, outputId) {
            var slider = document.getElementById(sliderId);
            var output = document.getElementById(outputId);
            output.value = slider.value;
        }

        function validateForm() {
            var valid = true;

            // Example validation: check if Communication Skills score is at least 50
            var sliderVal = document.getElementById('slider_val').value;
            if (sliderVal < 50) {
                alert('Communication Skills score must be at least 50.');
                valid = false;
            }

            return valid;
        }

        document.getElementById('evaluationForm').addEventListener('submit', function(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        });

        // Initialize slider values
        document.addEventListener('DOMContentLoaded', function () {
            updateSliderValue('slider-hover', 'slider_val');
            updateSliderValue('slider-hover2', 'slider_val2');
            // Initialize other sliders as needed
        });
    </script>







    <script>
      // Check selected custom option
      window.Helpers.initCustomOptionCheck();
    </script>

    <!-- / Content -->


    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <script src="../assets/js/form-wizard-icons.js"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="../assets/vendor/libs/select2/select2.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/bundle/popular.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="../assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/pages-auth-multisteps.js"></script>






<!-- Page JS -->
<script src="../assets/js/forms-sliders.js"></script>

  </body>
</html>