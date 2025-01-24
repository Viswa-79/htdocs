<?php include 'config.php';?>

<?php include 'head.php';?>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      <script src="sweetalert2@11.js"></script>  
        <!-- Menu -->

        <?php include 'menu.php';?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include 'header.php';?>


<?php
  $tz = 'Indian/Kolkata';   
  date_default_timezone_set($tz);
  $date=date("Y-m-d");
  ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y mt-2">
              <div class="row ">
                <!-- View sales -->
                <div class="col-xl-4  mb-4 col-lg-5 col-12">
                  <div class="card ">
                    <div class="d-flex align-items-end row ">
                      <div class="col-7 ">
                        <div class="card-body text-nowrap mt-4">
                          <h5 class="card-title mb-0">Credence Welcomes You..! </h5>
                          <p class="mb-2">Attendance for this month</p>
                          <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                      <span style="font-size:18px" class="text-primary" type="text"><?php echo date('d-m-Y',strtotime($date));?> </span>
                     <span style="font-size:18px" class="text-success" id="days" type="text"></span>
                            </div><br>

                          <button data-bs-toggle="modal" data-bs-target="#largeModal" class="btn btn-primary">Attendance</button>
                          
                        </div>
                      </div>
                      <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/card-advance-sale.png"
                            height="140"
                            alt="view sales" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ View sales -->

                <?php
                              $sql4 = " SELECT * FROM employee where id='$user_id'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                              $id =$wz1['id'];
                              $name =$wz1['name'];
							  $eid=$wz1['empid'];
							  $sts=$wz1['status'];
							
                                  ?>
                <!--Attendance Model -->
                <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                          <form action="" method="post" autocomplete="off">
                            <div class="modal-header">
                            <button onclick="return false" class="btn btn-secondary" style="width:100%;height:90px;font-size:25px;font-family:table-icons">ATTENDANCE&nbsp; MANAGEMENT
                            
                            <span style="padding-left:30px;color:black" id=time name="time"></span>
                            </button>
                              
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                           
                              <div class="row g-4">
                                
                                <div class="col-md-6">
                                <label class="form-label"  for="formtabs-country">Employee ID&nbsp;<span style="color:red;">*</span></label>
                              <input 
                              type="text" 
                              id="emp_id" 
                              autofocus
                              readonly
                              value="<?php echo $eid;?>"
                              class="form-control" 
                              name="emp_id">
                              
							  <input 
                              type="text" 
                              id="empid" 
                              hidden
                              readonly
                              value="<?php echo $user_id;?>"
                              class="form-control" 
                              name="empid">
                                </div>

                                <div class="col-md-6">
                                <label class="form-label" for="formtabs-country">Date&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="date"
                              class="form-control"
                              id="date"
                              name="date"
                              value="<?php echo $date;?>"
                              readonly
                              aria-label="Product barcode" />
                                </div>
                                <div class="col-md-6">
                                <label class="form-label" for="formtabs-country">Day&nbsp;<span style="color:red;">*</span></label>
                               <br>
                               <div style="border:1px solid #999" class="form-control">
                                <span type="text"
                              id="day"
                              name="day"
                                ></span>
                                </div>
                                </div>

                                <div class="col-md-6">
                                <label class="form-label" for="formtabs-country">Employee Name&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="text"
                              class="form-control"
                              id="empname"
                              placeholder="Enter Name"
                              name="empname"
                              readonly
                              value="<?php echo $user_name;?>"
                              aria-label="Product barcode" required/>
                                </div>
                                
                              
							   </div>
                           </div>
                           
                           <div class="modal-footer card-header d-flex align-items-center justify-content-between">
                           <?php
                             
							    $sql3 = "SELECT * FROM attendance where empid='$id' and date='$date' order by id desc";
                              $result3 = mysqli_query($conn, $sql3);
                              $wz11 = mysqli_fetch_array($result3);
							  $dir=$wz11['direction'];

                                 $t11="SELECT * from attendance where empid='$id' and date='$date' and direction='$dir' ";
                                $t11=mysqli_query($conn,$t11);                                
                              $count1=mysqli_num_rows($t11);
                              $row1=mysqli_fetch_array($t11);
                              $status=$row1['status'];
                               
                                   ?>
                         <?php
                         if($sts==2){
                          ?>
                         <button style="margin-left:200px" class="btn btn-label-dark"  disabled  onclick="return false">
                               You are Relieved From The Company...!
                              </button>
                          <?php
                         }
                         else
                         {?>
                              <button class="btn btn-success" <?php if ($status=='1'){ ?> disabled <?php   } ?> onSubmit="return true" name="submit" value="submit">
                                Check IN
                              </button>
                         
                              <button class="btn btn-warning btn-next" <?php if ($status == '0' || $status == ''){ ?> disabled <?php   } ?> onSubmit="return true" name="submit2" value="submit2">
                                Check OUT
                              </button>
                              <?php
                              }?>
                            </div>
          </form>
                          </div>
                        </div>
                      </div>
                <!--/ Attendance Model -->


                <!-- Statistics -->
                <div class="col-xl-8 mb-4 col-lg-7 col-12">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Attendance</h5>
                        <small class="text-muted">Updated 1 month ago</small>
                      </div>
                    </div>
                    
                           <?php
                              $sql3 = " SELECT *,count(status) as status FROM attendance where empid='$eid1' and direction='IN' group by date";
                              $result3 = mysqli_query($conn, $sql3);
                              $wz11 = mysqli_fetch_array($result3);
                              $id =$wz11['id'];
                              $present =$wz11['status'];
                                  ?>
                    <div class="card-body">
                      <div class="row gy-3">
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                              <i class="ti ti-check ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0"><?php echo $present; echo" /31"?>&nbsp;<small style="font-size:11px" class="text-dark">DAYS</small></h5>
                              <small>Present</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-secondary me-3 p-2">
                              <i class="ti ti">&#10005</i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">8.549k</h5>
                              <small>Absent</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                              <i class="ti ti-dashboard ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">1.423k</h5>
                              <small>Over Time</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-danger me-3 p-2">
                              <i class="ti ti-badge ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">$9745</h5>
                              <small>Miss Punch</small>
                            </div>
                            
                          </div>
                        </div>
                      </div><br>
                      <?php if ($user_role=='2'){ ?>
                      <div class="row gy-3">
                      <div class="col-md-3 col-6">
                      <a href="leave_req.php" class="btn btn-primary">Leave Request</a>
                      </div>
                      <div class="col-md-3 col-6">
                      <a href="exp_claim.php" class="btn btn-primary">Expense Claim</a>
                      </div>
                      <div class="col-md-3 col-6">
                      <a href="staff_permiss.php" class="btn btn-primary">Permission</a>
                      </div>


                    </div>
                    <?php } ?>
                    </div>
                  </div>
                </div>
                <!--/ Statistics -->

                <div class="col-xl-4 col-12">
                  <div class="row">
                    <!-- Expenses -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                      <div class="card">
                        <div class="card-header pb-0">
                          <h5 class="card-title mb-0">82.5k</h5>
                          <small class="text-muted">Expenses</small>
                        </div>
                        <div class="card-body">
                          <div id="expensesChart"></div>
                          <div class="mt-md-2 text-center mt-lg-3 mt-3">
                            <small class="text-muted mt-3">$21k Expenses more than last month</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Expenses -->

                    <!-- Profit last month -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                      <div class="card">
                        <div class="card-header pb-0">
                          <h5 class="card-title mb-0">Profit</h5>
                          <small class="text-muted">Last Month</small>
                        </div>
                        <div class="card-body">
                          <div id="profitLastMonth"></div>
                          <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                            <h4 class="mb-0">624k</h4>
                            <small class="text-success">+8.24%</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Profit last month -->

                    <!-- Generated Leads -->
                    <div class="col-xl-12 mb-4 col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                              <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                                <small>Monthly Report</small>
                              </div>
                              <div class="chart-statistics">
                                <h3 class="card-title mb-1">4,350</h3>
                                <small class="text-success text-nowrap fw-medium"
                                  ><i class="ti ti-chevron-up me-1"></i> 15.8%</small
                                >
                              </div>
                            </div>
                            <div id="generatedLeadsChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Generated Leads -->
                  </div>
                </div>
                <?php if ($user_role=='1'){ ?>
                <!-- Revenue Report -->
                <div class="col-md-6 col-xl-4 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Leave Requests</h5>
                        <!-- <small class="text-muted">Total 10.4k Visitors</small> -->
                      </div>
                      <!-- <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="popularProduct"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div> -->
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">

                      <?php


$date2=date("Y-m-d");
//echo "$date";
 $year=date("Y");
     //echo "$year";
   $date1=$year.'-01-01';

                                      $sno=1;
                                      $clr='';
                      // LOOP TILL END OF DATA
                   $sql = " SELECT *,a.id as id,a.status as status,c.gender as gender FROM  leave_req a left join leave_type b on a.leavetype=b.id left join  employee c on a.staff=c.id  where a.fdate<'$date2' and a.a_status='1' and a.status='Pending' and c.userrole!='1' order by a.id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {


                    $status=$rows['status'];  
                    $gender=$rows['gender'];  
				
				
                    if($status=='Pending')
                      $clr='primary';
                    elseif($status=='Approved')
                      $clr='success';
                    elseif($status=='Rejected')
                      $clr='danger';
                           


                  ?>


                        <li class="d-flex mb-4 pb-1">


                          <div class="me-3">
                            <img  <?php if($gender=='Male') { ?> src="../assets/img/illustrations/card-advance-sale.png" <?php  }else{ ?> src="../assets/img/illustrations/girl-with-laptop.png" <?php }?>  alt="User" class="rounded" width="36" />
                          </div>

                         


                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0"><?php echo $rows['name'];?></h6>
                              <small class="text-muted d-block"><b><?php echo date('d-m-Y',strtotime($rows['fdate'])); ?>&nbsp;-&nbsp;<?php echo date('d-m-Y',strtotime($rows['todate'])); ?></b></small>
                              <small class="text-muted d-block">No.of.Days:&nbsp;&nbsp;<b><?php echo $rows['nod'];?></b></small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium"><button  class="btn btn-primary btn-sm waves-effect waves-light"><?php echo $status;?></button></p>
                            </div>
                          </div>
                        </li>

                        <?php
                           $sno++;
                         } ?>
                        </tr>
                        
                        <?php
                 
                      }
                    
                   
                 else{ ?>
              
               
                <p>No Data Found</p>
                
              
                 <?php
                 } ?>



                        
                      </ul>
                    </div>
                  </div>
                </div>



                <!--/ Popular Product -->

                <!-- Sales by Countries tabs-->
                <div class="col-md-6 col-xl-4 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2"> Permission Requests </h5>
                        <!-- <small class="text-muted">Total 10.4k Visitors</small> -->
                      </div>
                      <!-- <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="popularProduct"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div> -->
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">


                      <?php
                                      $sno=1;
                                      $clr='';
                      // LOOP TILL END OF DATA
                  $sql = " SELECT *,a.id as id,a.status as status,c.name as name,c.gender as gender FROM permiss a  left join employee c on a.staff=c.id  left join depart d on c.depart=d.id where a.a_status='1' and a.status='Pending' and c.userrole!='1' order by a.id desc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows1=mysqli_fetch_array($result))
                  
                  
                  
                  {


                    $status=$rows1['status'];  
                    $gender=$rows1['gender'];  
				
                    if($status=='Pending')
                      $clr='primary';
                    elseif($status=='Approved')
                      $clr='success';
                    elseif($status=='Rejected')
                      $clr='danger';
                           







                  ?>








                        <li class="d-flex mb-4 pb-1">
                        <div class="me-3">
                            <img  <?php if($gender=='Male') { ?> src="../assets/img/illustrations/card-advance-sale.png" <?php  }else{ ?> src="../assets/img/illustrations/girl-with-laptop.png" <?php }?>  alt="User" class="rounded" width="36" />
                          </div>

                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0"><?php echo $rows1['name'];?></h6>
                              <small class="text-muted d-block">Date:&nbsp;&nbsp;<b><?php echo date('d-m-Y',strtotime($rows['date'])); ?></b> </small>
                              <small class="text-muted d-block">Permission:&nbsp;&nbsp;<b><?php echo $rows1['duration1'];?></b> </small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium"><button  class="btn btn-primary btn-sm waves-effect waves-light"><?php echo $status;?></button></p>
                            </div>
                          </div>
                        </li>
                      
                       
                       
                        <?php
                           $sno++;
                         } ?>
                        </tr>
                        
                        <?php
                 
                      }
                    
                   
                 else{ ?>
              
              
                 <p>No Data Found</p></td> 
              
                 <?php
                 } ?>







                      </ul>
                    </div>
                  </div>
                </div>

                <?php } ?>
                <!--/ Revenue Report -->

                <!-- Earning Reports -->
                <?php if ($user_role=='2'){ ?>
                <div class="col-md-6 col-xl-4 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Popular Products</h5>
                        <small class="text-muted">Total 10.4k Visitors</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="popularProduct"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="popularProduct">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="me-3">
                            <img src="../assets/img/products/iphone.png" alt="User" class="rounded" width="46" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Apple iPhone 13</h6>
                              <small class="text-muted d-block">Item: #FXZ-4567</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium">$999.29</p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="me-3">
                            <img
                              src="../assets/img/products/nike-air-jordan.png"
                              alt="User"
                              class="rounded"
                              width="46" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Nike Air Jordan</h6>
                              <small class="text-muted d-block">Item: #FXZ-3456</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium">$72.40</p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="me-3">
                            <img src="../assets/img/products/headphones.png" alt="User" class="rounded" width="46" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Beats Studio 2</h6>
                              <small class="text-muted d-block">Item: #FXZ-9485</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium">$99</p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="me-3">
                            <img
                              src="../assets/img/products/apple-watch.png"
                              alt="User"
                              class="rounded"
                              width="46" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Apple Watch Series 7</h6>
                              <small class="text-muted d-block">Item: #FXZ-2345</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium">$249.99</p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="me-3">
                            <img
                              src="../assets/img/products/amazon-echo.png"
                              alt="User"
                              class="rounded"
                              width="46" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Amazon Echo Dot</h6>
                              <small class="text-muted d-block">Item: #FXZ-8959</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium">$79.40</p>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="me-3">
                            <img
                              src="../assets/img/products/play-station.png"
                              alt="User"
                              class="rounded"
                              width="46" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Play Station Console</h6>
                              <small class="text-muted d-block">Item: #FXZ-7892</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <p class="mb-0 fw-medium">$129.48</p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>



                <div class="col-md-6 col-xl-4 col-xl-4 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between pb-2 mb-1">
                      <div class="card-title mb-1">
                        <h5 class="m-0 me-2">Sales by Countries</h5>
                        <small class="text-muted">62 Deliveries in Progress</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="salesByCountryTabs"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="nav-align-top">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link active"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-new"
                              aria-controls="navs-justified-new"
                              aria-selected="true">
                              New
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-link-preparing"
                              aria-controls="navs-justified-link-preparing"
                              aria-selected="false">
                              Preparing
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-link-shipping"
                              aria-controls="navs-justified-link-shipping"
                              aria-selected="false">
                              Shipping
                            </button>
                          </li>
                        </ul>
                        <div class="tab-content pb-0">
                          <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                            <ul class="timeline timeline-advance timeline-advance mb-2 pb-1">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-0">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Barry Schowalter</h6>
                                  <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                            <ul class="timeline timeline-advance mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-0">Veronica Herman</h6>
                                  <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Helen Jacobs</h6>
                                  <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>

                          <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                            <ul class="timeline timeline-advance mb-2 pb-1">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-0">Barry Schowalter</h6>
                                  <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                            <ul class="timeline timeline-advance mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-0">Veronica Herman</h6>
                                  <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Helen Jacobs</h6>
                                  <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                            <ul class="timeline timeline-advance mb-2 pb-1">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-0">Veronica Herman</h6>
                                  <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Barry Schowalter</h6>
                                  <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                            <ul class="timeline timeline-advance mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-medium">sender</small>
                                  </div>
                                  <h6 class="mb-0">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-transparent">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-medium">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Helen Jacobs</h6>
                                  <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>















                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Earning Reports</h5>
                        <small class="text-muted">Weekly Earnings Overview</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="earningReports"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReports">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body pb-0">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-3">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                              ><i class="ti ti-chart-pie-2 ti-sm"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Net Profit</h6>
                              <small class="text-muted">12.4k Sales</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-3">
                              <small>$1,619</small>
                              <div class="d-flex align-items-center gap-1">
                                <i class="ti ti-chevron-up text-success"></i>
                                <small class="text-muted">18.6%</small>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-3">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"
                              ><i class="ti ti-currency-dollar ti-sm"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Total Income</h6>
                              <small class="text-muted">Sales, Affiliation</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-3">
                              <small>$3,571</small>
                              <div class="d-flex align-items-center gap-1">
                                <i class="ti ti-chevron-up text-success"></i>
                                <small class="text-muted">39.6%</small>
                              </div>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-3">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"
                              ><i class="ti ti-credit-card ti-sm"></i
                            ></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Total Expenses</h6>
                              <small class="text-muted">ADVT, Marketing</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-3">
                              <small>$430</small>
                              <div class="d-flex align-items-center gap-1">
                                <i class="ti ti-chevron-up text-success"></i>
                                <small class="text-muted">52.8%</small>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                      <div id="reportBarChart"></div>
                    </div>
                  </div>
                </div>
                <!--/ Earning Reports -->

                <!-- Popular Product -->
              




                <div class="col-12 col-xl-8 mb-4">
                  <div class="card">
                    <div class="card-body p-0">
                      <div class="row row-bordered g-0">
                        <div class="col-md-8 position-relative p-4">
                          <div class="card-header d-inline-block p-0 text-wrap position-absolute">
                            <h5 class="m-0 card-title">Revenue Report</h5>
                          </div>
                          <div id="totalRevenueChart" class="mt-n1"></div>
                        </div>
                        <div class="col-md-4 p-4">
                          <div class="text-center mt-4">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                type="button"
                                id="budgetId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                                <a class="dropdown-item prev-year1" href="javascript:void(0);">
                                  <script>
                                    document.write(new Date().getFullYear() - 1);
                                  </script>
                                </a>
                                <a class="dropdown-item prev-year2" href="javascript:void(0);">
                                  <script>
                                    document.write(new Date().getFullYear() - 2);
                                  </script>
                                </a>
                                <a class="dropdown-item prev-year3" href="javascript:void(0);">
                                  <script>
                                    document.write(new Date().getFullYear() - 3);
                                  </script>
                                </a>
                              </div>
                            </div>
                          </div>
                          <h3 class="text-center pt-4 mb-0">$25,825</h3>
                          <p class="mb-4 text-center"><span class="fw-medium">Budget: </span>56,800</p>
                          <div class="px-3">
                            <div id="budgetChart"></div>
                          </div>
                          <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary">Increase Budget</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!--/ Sales by Countries tabs -->

                <!-- Transactions -->
                <div class="col-md-6 col-xl-4 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                      <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Transactions</h5>
                        <small class="text-muted">Total 58 Transactions done in this Month</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="transactionID"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-3 pb-1 align-items-center">
                          <div class="badge bg-label-primary me-3 rounded p-2">
                            <i class="ti ti-wallet ti-sm"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Wallet</h6>
                              <small class="text-muted d-block">Starbucks</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0 text-danger">-$75</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                          <div class="badge bg-label-success rounded me-3 p-2">
                            <i class="ti ti-browser-check ti-sm"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Bank Transfer</h6>
                              <small class="text-muted d-block">Add Money</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0 text-success">+$480</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                          <div class="badge bg-label-danger rounded me-3 p-2">
                            <i class="ti ti-brand-paypal ti-sm"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Paypal</h6>
                              <small class="text-muted d-block mb-1">Client Payment</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0 text-success">+$268</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                          <div class="badge bg-label-secondary me-3 rounded p-2">
                            <i class="ti ti-credit-card ti-sm"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Master Card</h6>
                              <small class="text-muted d-block mb-1">Ordered iPhone 13</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0 text-danger">-$699</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                          <div class="badge bg-label-info me-3 rounded p-2">
                            <i class="ti ti-currency-dollar ti-sm"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Bank Transactions</h6>
                              <small class="text-muted d-block mb-1">Refund</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0 text-success">+$98</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-3 pb-1 align-items-center">
                          <div class="badge bg-label-danger me-3 rounded p-2">
                            <i class="ti ti-brand-paypal ti-sm"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Paypal</h6>
                              <small class="text-muted d-block mb-1">Client Payment</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0 text-success">+$126</h6>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex align-items-center">
                          <div class="badge bg-label-success me-3 rounded p-2">
                            <i class="ti ti-browser-check ti-sm"></i>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Bank Transfer</h6>
                              <small class="text-muted d-block mb-1">Pay Office Rent</small>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0 text-danger">-$1290</h6>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->

                <!-- Invoice table -->
                <div class="col-xl-8">
                  <div class="card">
                    <div class="table-responsive card-datatable">
                      <table class="table datatable-invoice border-top">
                        <thead>
                          <tr>
                            <th></th>
                            <th>ID</th>
                            <th><i class="ti ti-trending-up text-secondary"></i></th>
                            <th>Total</th>
                            <th>Issued Date</th>
                            <th>Invoice Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /Invoice table -->
              </div>
            </div>
            <!-- / Content -->

          

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
<?php include 'footer.php';?>


<?php
	 date_default_timezone_set("Asia/Kolkata");
	 $time=date("H:i:s");
	 $date=date("Y-m-d");
	 $day=date("l");
	if(isset($_POST['submit']))
	{

$t0="select * from employee where name='".$_POST['empname']."'";
$t1=mysqli_query($conn,$t0);
$count1=mysqli_num_rows($t1);


if($count1>0)
{
$query1 = "insert into attendance(`empid`,`empname`, `date`, `time`, `day`, `direction`, `status`)values('".$_POST['empid']."','".$_POST['empname']."','$date','$time','$day','IN','1')";
	//echo $query1;
	$result2 = mysqli_query($conn, $query1);

	$sql = "SELECT * from employee where name='".$_POST['name']."'";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($result);
				// $customer_name=$row['customer_name'];
	
		if ($result2) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Punch IN.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "attendance.php"; // Corrected line
    }
  });
</script>';
} 

}
else {
  echo '<script>
          Swal.fire({
            title: "Error!",
            text: "Submission Failed...!.",
            icon: "error",
            confirmButtonText: "OK"
          });
        </script>';
}
	}
	
	
	if(isset($_POST['submit2']))
	{
	
	
	$t0="select * from employee where name='".$_POST['empname']."'";
$t1=mysqli_query($conn,$t0);
$count1=mysqli_num_rows($t1);
if($count1>0)
{
	$query1 = "insert into attendance(`empid`, `empname`, `date`, `time`, `day`, `direction`)values('".$_POST['empid']."','".$_POST['empname']."','$date','$time','$day','OUT')";
	//echo $query1;
	$result3 = mysqli_query($conn, $query1);	
	
  if ($result3) {
    echo '<script>
    Swal.fire({
      title: "Success!",
      text: "Punch OUT.",
      icon: "success",
      confirmButtonText: "OK"
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "attendance.php"; // Corrected line
      }
    });
  </script>';
  } 
  
  }
  else {
    echo '<script>
            Swal.fire({
              title: "Error!",
              text: "Submission Failed...!.",
              icon: "error",
              confirmButtonText: "OK"
            });
          </script>';
  }
	}
		
    ?>

<script>
function clock1(){var date=new Date();var weekday=date.getDay();var year=date.getYear();var month=date.getMonth();var day=date.getDate();var hour=date.getHours();var minute=date.getMinutes();var second=date.getSeconds();var days=new Array ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday" );var months=new Array("January","February","March","April","May","June","July","August","September","October","November","december");var monthname=months[month];var dayname=days[weekday];var ap;var sal;if(year<1000){year=year+1900} if(hour<12 &&minute<60 &&second<60){sal='Good Morning';} if(hour>=12 &&hour<17 &&minute<60 &&second<60 ){sal='Good Afternoon';} if(hour>=17 &&hour<24 &&minute<60 &&second<60 ){sal='Good Evening';} if(hour>=12){hour=hour-12;ap='PM';}else{ap='AM';} if(minute<10){minute="0"+minute} if(second<10){second="0"+second};
//document.getElementById('time').innerHTML=hour+" : "+ minute +" : "+second+" " +ap; 
document.getElementById('day').innerHTML=dayname;
document.getElementById('days').innerHTML=dayname;
document.getElementById('dt').innerHTML=monthname+" "+day+", "+year;
document.getElementById('salute').innerHTML=sal;setTimeout("clock()",60000)}

window.onload=function(){clock1();

}
window.setInterval(function(){
 clock1();
}, 1000);
// Widget Code by https://widgetcodes.com/
</script>

<script>function clock(){var date=new Date();var weekday=date.getDay();var year=date.getYear();var month=date.getMonth();var day=date.getDate();var hour=date.getHours();var minute=date.getMinutes();var second=date.getSeconds();var days=new Array ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday" );var months=new Array("January","February","March","April","May","June","July","August","September","October","November","december");var monthname=months[month];var dayname=days[weekday];var ap;var sal;if(year<1000){year=year+1900} if(hour<12 &&minute<60 &&second<60){sal='Hi, Good Morning';} if(hour>=12 &&hour<17 &&minute<60 &&second<60 ){sal='Hi, Good Afternoon';} if(hour>=17 &&hour<24 &&minute<60 &&second<60 ){sal='Hi, Good Evening';} if(hour>=12){hour=hour-12;ap='PM';}else{ap='AM';} if(minute<10){minute="0"+minute} if(second<10){second="0"+second};

document.getElementById('salute').innerHTML=sal;setTimeout("clock()",60000)}

window.onload=function(){clock();

}
window.setInterval(function(){
 clock();
}, 1001);
// Widget Code by https://widgetcodes.com/
</script>

<script>
function get_emp(value) {
//alert("hello");

				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#empname').val(data.name);
// $('#descr').val(data.size);

}

      }
    };
    xmlhttp.open("GET","ajax/get_atten.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>