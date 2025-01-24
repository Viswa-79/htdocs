

<?php include "config.php";include "head.php";include "session.php";?>
<link rel="stylesheet" href="../assets/vendor/libs/nouislider/nouislider.css" />
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

        <!--  Multi Steps Registration -->
        <div class="d-flex col-lg-8 align-items-center justify-content-center p-sm-5 p-3">
          <div class="w-px-1000">
          <div class="bs-stepper vertical wizard-vertical-icons-example mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#account-details-vertical">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">
                            <i class="ti ti-file-description"></i>
                          </span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Communication Skills</span>
                            <span class="bs-stepper-subtitle">Setup Account Details</span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#personal-info-vertical">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">
                            <i class="ti ti-user"></i>
                          </span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Technical Proficiency</span>
                            <span class="bs-stepper-subtitle">Add personal info</span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#personal-info-vertical2">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">
                            <i class="ti ti-user"></i>
                          </span>
                          <span class="bs-stepper-label">
                          <span class="bs-stepper-title">Teamwork </span>
                            <span class="bs-stepper-subtitle">and Collaboration</span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#personal-info-vertical3">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">
                            <i class="ti ti-user"></i>
                          </span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Adaptability</span>
                            <span class="bs-stepper-subtitle"></span>
                          </span>
                        </button>
                      </div>
                      <div class="line"></div>
                      <div class="step" data-target="#social-links-vertical">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle"><i class="ti ti-brand-instagram"></i> </span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Leadership Potential </span>
                            <span class="bs-stepper-subtitle"></span>
                          </span>
                        </button>
                      </div>
                      
                    </div>
                    <div class="bs-stepper-content">
                      <form method="post"    >
                        <!-- Account Details -->
                        <div id="account-details-vertical" class="content">
                          <div class="content-header mb-5">
                           
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-6">
                              <label class="form-label" for="Communication Skills">Communication Skills</label>
  
        <input style="width:100%" type="range" id="slider-hover" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val" name="slider_val" value="0" /></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Clarity of expression">Clarity of expression</label>
                              <input style="width:100%" type="range" id="slider-hover2" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val2" oninput="updateSliderValue('slider-hover', 'slider_val2')" value="0"/></small>
                            </div>
                            <div class="col-sm-6 ">
                              <label class="form-label" for="Active listening">Active listening</label>
                              <input style="width:100%" type="range" id="slider-hover3" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val3" value="0"/></small>
                            </div>
                            <div class="col-sm-6 ">
                              <label class="form-label" for=" Ability to articulate ideas"> Ability to articulate ideas</label>
                              <input style="width:100%" type="range" id="slider-hover4" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val4" value="0"/></small>
                            </div>
                            <div class="col-12 d-flex justify-content-between mt-5">
                              <button class="btn btn-label-secondary btn-prev" disabled>
                                <i class="ti ti-arrow-left me-sm-1"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span data-target="#personal-info-vertical">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- Personal Info -->
                        <div id="personal-info-vertical" class="content">
                          <div class="content-header mb-6  mt-5">
                            
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-6">
                              <label class="form-label" for="Technical Skills Evaluation">Technical Proficiency</label>
                              <input style="width:100%" type="range" id="slider-hover5" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider_val5" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Behavioral and Situational Interviewing">Knowledge of relevant tools/software</label>
                              <input style="width:100%" type="range" id="slider-hover6" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val6" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Cultural Fit Assessment">Problem-solving ability</label>
                              <input style="width:100%" type="range" id="slider-hover7" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val7" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Communication Skills">Familiarity with industry best practices</label>
                              <input style="width:100%" type="range" id="slider-hover8" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val8" value="0"/></small>
                            </div>
                            <div class="col-12 d-flex justify-content-between mt-5">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div id="personal-info-vertical2" class="content">
                          <div class="content-header mb-6  mt-5">
                            
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-6">
                              <label class="form-label" for="References and Background Checks">Teamwork and Collaboration</label>
                              <input style="width:100%" type="range" id="slider-hover9" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val9" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                            <label class="form-label" for="Final Interview and Decision Making"> Ability to work well in a team</label>
                              <input style="width:100%" type="range" id="slider-hover10" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val10" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Cultural Fit Assessment">Contributing to group discussions</label>
                              <input style="width:100%" type="range" id="slider-hover11" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val11" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Communication Skills">Handling conflicts or disagreements</label>
                              <input style="width:100%" type="range" id="slider-hover12" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val12" value="0"/></small>
                            </div>
                            <div class="col-12 d-flex justify-content-between  mt-5">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div id="personal-info-vertical3" class="content">
                          <div class="content-header mb-6  mb-5">
                            
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-6">
                              <label class="form-label" for="Technical Skills Evaluation">Adaptability</label>
                              <input style="width:100%" type="range" id="slider-hover13" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val13" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Behavioral and Situational Interviewing">Flexibility in handling change</label>
                              <input style="width:100%" type="range" id="slider-hover14" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val14" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Cultural Fit Assessment">Willingness to learn new skills</label>
                              <input style="width:100%" type="range" id="slider-hover15" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val15" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Communication Skills">Ability to work in diverse environments</label>
                              <input style="width:100%" type="range" id="slider-hover16" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val16" value="0"/></small>
                            </div>
                            <div class="col-12 d-flex justify-content-between  mt-5">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button class="btn btn-primary btn-next">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                <i class="ti ti-arrow-right"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- Social Links -->
                        <div id="social-links-vertical" class="content">
                          <div class="content-header mb-6 mt-5">
                           
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-6">
                              <label class="form-label" for="References and Background Checks">Leadership Potential</label>
                              <input style="width:100%" type="range" id="slider-hover17" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val17" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Final Interview and Decision Making">Initiative-taking</label>
                              <input style="width:100%" type="range" id="slider-hover18" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val18" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for="Decision-making skills"> Decision-making skills</label>
                              <input style="width:100%" type="range" id="slider-hover19" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-val19" value="0"/></small>
                            </div>
                            <div class="col-sm-6">
                              <label class="form-label" for=" Ability to motivate others"> Ability to motivate others</label>
                              <input style="width:100%" type="range" id="slider-hover20" min="0" max="100" value="50">
<br>
    <small>Mark: <input type="text" style="width:20%;border:none" readonly id="slider-0" value="0"/></small>
    </div>
                            <div class="col-12 d-flex justify-content-between  mt-5">
                              <button class="btn btn-label-secondary btn-prev">
                                <i class="ti ti-arrow-left me-sm-1"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                              </button>
                              <button  type="submit" id="sumbit" value="<?php echo  $sid; ?>" name="submit" class="btn btn-success "  onclick="getmark(this.value)">Submit</button>
                            </div>
                          </div>
                          </div>
                       
                      </form>
                    
        </div>
        <!-- / Multi Steps Registration -->
      </div>
    </div>





   





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
		
		document.getElementById('slider-val6').value=value;
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
		
		document.getElementById('slider-val7').value=value;
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
		
		document.getElementById('slider-val8').value=value;
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
		
		document.getElementById('slider-val9').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue10(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val10').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue11(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val11').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue12(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val12').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue13(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val13').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue14(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val14').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue15(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val15').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue16(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val16').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue17(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val17').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue18(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val18').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue19(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val19').value=value;
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
  //  var sliderValueDisplay = document.getElementById('slider-val').value;

    // Function to update the displayed value
    function updateValue20(event) {
		
        var value = event.target.value;
		
		document.getElementById('slider-val20').value=value;
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