<?php include "config.php";include "head.php" ?>

  <body>
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
                      <h5 class="mb-0">Upload Documents <span >1/5 Pending</span></h5> 
                     
                    
                                  <a class="btn btn-primary float-end btn-group" href="javascript:void(0);"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"  onclick="addCurrency();"><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>  Report</a>
</div>         
  

<!-- Teams Cards -->
<div class=" row g-4">
                 <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php  echo $rows['id'];?>">
                          
                         
                           <div class="col-xl-6 col-lg-6 col-md-6">
                             <div class="card">
                               <div class="card-body">
                                 <div class="d-flex align-items-center mb-3">
                                   <a href="javascript:;" class="d-flex align-items-center">
                                     
                                     <div class="me-2 text-body h5 mb-0"><?php echo $rows['depname'];?></div>
                                   </a>
                                   <div class="ms-auto">
                                     <ul class="list-inline mb-0 d-flex align-items-center">
                                     
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
                                   </div>
                                 </div>
                                 
                              
                                 <div class="row gx-0 gap-3 mt-4">
                                        <div style="background-color:#E1E1E1;border-radius:5px" class="col p-2 card-box rounded-5px">
                                            <h5 class="mb-0 fw-semibold">Aadhaar</h5>
                                            <h6 class="mb-0 fw-semibold mt-2">255245565545</h6>
                                        </div>
                                        <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                            
                                            <h5 class="mb-0 fw-semibold">Details</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap">image</h6>
                                        </div>
                                    </div>
                                   
                               
                               </div>
                             </div>
                           </div>
                           <div class="col-xl-6 col-lg-6 col-md-6">
                             <div class="card">
                               <div class="card-body">
                                 <div class="d-flex align-items-center mb-3">
                                   <a href="javascript:;" class="d-flex align-items-center">
                                     
                                     <div class="me-2 text-body h5 mb-0"><?php echo $rows['depname'];?></div>
                                   </a>
                                   <div class="ms-auto">
                                     <ul class="list-inline mb-0 d-flex align-items-center">
                                     
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
                                   </div>
                                 </div>
                                 
                              
                                 <div class="row gx-0 gap-3 mt-4">
                                        <div style="background-color:#E1E1E1;border-radius:5px" class="col p-2 card-box rounded-5px">
                                            <h5 class="mb-0 fw-semibold">PAN NO</h5>
                                            <h6 class="mb-0 fw-semibold mt-2">4684846</h6>
                                        </div>
                                        <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                            
                                            <h5 class="mb-0 fw-semibold">Details</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap">Image</h6>
                                        </div>
                                    </div>
                                   
                               
                               </div>
                             </div>
                           </div>  <div class="col-xl-12 col-lg-6 col-md-6">
                             <div class="card">
                               <div class="card-body">
                                 <div class="d-flex align-items-center mb-3">
                                   <a href="javascript:;" class="d-flex align-items-center">
                                     
                                     <div class="me-2 text-body h5 mb-0"><?php echo $rows['depname'];?></div>
                                   </a>
                                   <div class="ms-auto">
                                     <ul class="list-inline mb-0 d-flex align-items-center">
                                     
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
                                             
                                             <li><a class="dropdown-item"  id="edit<?php echo $sno;?>" data-bs-toggle="pan1" data-bs-target="#pan1" tabindex="0" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
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
                                   </div>
                                 </div>
                                 
                              
                                 <div class="row gx-0 gap-3 mt-4">
                                        <div style="background-color:#E1E1E1;border-radius:5px" class="col p-2 card-box rounded-5px">
                                            <h5 class="mb-0 fw-semibold"></h5>
                                            <h6 class="mb-0 fw-semibold mt-2">Total Employees</h6>
                                        </div>
                                        <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                            
                                            <h5 class="mb-0 fw-semibold">0</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap">Employees Present</h6>
                                        </div>
                                        <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                            
                                            <h5 class="mb-0 fw-semibold">0</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap">Employees Present</h6>
                                        </div>
                                        <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                            
                                            <h5 class="mb-0 fw-semibold">0</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap">Employees Present</h6>
                                        </div>
                                        <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                            
                                            <h5 class="mb-0 fw-semibold">0</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap">Employees Present</h6>
                                        </div>
                                        <div class="col p-2 card-box rounded-5px" style="background-color:#E1E1E1;border-radius:5px" >
                                            
                                            <h5 class="mb-0 fw-semibold">0</h5>
                                            <h6 class="mb-0 fw-semibold mt-2 text-nowrap">Employees Present</h6>
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
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>



<!-- <div
            class="offcanvas offcanvas-end"
            tabindex="-1"
            id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Department</h5>
              <button
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
              </div>
              <div class="mb-3">
              <form action="" method="post">
               
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
                <label class="form-label" for="add-user-fullname">Aadhaar No</label>
                  <input
                    type="text"
                    class="form-control"
                    id="depname"
                    placeholder=" "
                    autofocus
                   
                    name="depname"
                    aria-label="John Doe" required/>
                </div>
       
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Aadhaar Image</label>
                  <input
                    type="text"
                    class="form-control"
                    id="depname"
                    placeholder=" "
                    autofocus
                   
                    name="depname"
                    aria-label="John Doe" required/>
                </div>
       
               
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 


   <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
              </form>
            </div>
          </div>
          </div> -->






          <div
            class="offcanvas offcanvas-end"
            tabindex="1"
            id="pan1"
            aria-labelledby="pan1">
            <div class="offcanvas-header">
              <h5 id="pan" class="offcanvas-title"><span id="form-title1">Add</span> Department</h5>
              <button
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
              </div>
              <div class="mb-3">
              <form action="" method="post">
               
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
                <label class="form-label" for="add-user-fullname">PAN No</label>
                  <input
                    type="text"
                    class="form-control"
                    id="panno"
                    placeholder=" "
                    autofocus
                   
                    name="panno"
                    aria-label="John Doe" required/>
                </div>
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <div class="mb-3">
                <label class="form-label" for="add-user-fullname">PAN Image</label>
                  <input
                    type="text"
                    class="form-control"
                    id="panimg"
                    placeholder=" "
                    autofocus
                   
                    name="panimg"
                    aria-label="John Doe" required/>
                </div>
       
               
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 


   <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
              </form>
            </div>
          </div>


<div
            class="offcanvas offcanvas-end"
            tabindex="-1"
            id="offcanvasAddUser"
            aria-labelledby="offcanvasAddUserLabel1">
            <div class="offcanvas-header">
              <h5 id="offcanvasAddUserLabel1" class="offcanvas-title"><span id="form-title">Add</span> Department</h5>
              <button
                type="button"
                class="btn-close text-reset"
                data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
              </div>
              <div class="mb-3">
              <form action="" method="post">
               
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
                   
            <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Department Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="depname"
                    placeholder=" "
                    autofocus
                   
                    name="depname"
                    aria-label="John Doe" required/>
                </div>
       
               
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 


   <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
              </form>
            </div>
          </div>

    
<?php include "footer.php"; ?>
  </body>



  <script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');  
                    $('#depname').val('');                 
                   
}
</script>
<script>
function addCurrency1() {
  document.getElementById('form-title1').innerHTML='Add';
                    $('#id').val('');  
                    $('#depname').val('');                 
                   
}
</script>