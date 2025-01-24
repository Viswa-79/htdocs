<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="padding-bottom:30px;">
          <div class="app-brand demo">
            <a href="dashboard.php" class="app-brand-link">
              <span >
                <a href="/">
                <img width="45" height="43" margin-left="none" class="mt-3" fill="none"
                  
                  src="../assets/img/favicon/logo1.png"
                  />
              </a>
              </span>
              <span ><img width="140" height="30" margin-left="none" class="mt-3"
                  
                  src="../assets/img/favicon/log61.png"
                  /></span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto mt-3">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
			
          </div>
			
          <!-- <div class="menu-inner-shadow"></div>
<span class="badge bg-label-primary" id=salute ></span> -->
          <ul class="menu-inner py-1">
          
		   <br>
            <!-- Dashboards -->
            <li class="menu-item">
              <a href="attendance.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
               
              </a>
           
            </li>
            
            <!-- Attendance -->
           



            
			     <!-- Masters -->
            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">HR</span>
            </li>
           
            <!-- <li class="menu-item">
              <a href="master_page.php" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Masters">Masters</div>
              </a>

            </li> -->
         
			
          
          
           
			
        

			
				     <!-- Transactions -->
            

            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                <div data-i18n="Payroll Master">Payroll Master</div>
              </a>
</li> -->
<?php if ($user_role=='1'){ ?>
            
                <li class="menu-item">
                  <a href="depart.php" class="menu-link" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="menu-icon tf-icons bi bi-diagram-3-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5z"/>
</svg>
                    <div data-i18n="Department">Department</div>
                  </a>
                </li>

               
                <li class="menu-item">
                  <a href="desig_master.php" class="menu-link" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-buildings-fill" viewBox="0 0 16 16">
  <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z"/>
</svg>
         <div data-i18n="Designation">Designation</div>
                  </a>
                </li>
               
                <li class="menu-item">
                  <a href="shift.php" class="menu-link" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-hourglass-split" viewBox="0 0 16 16">
  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
</svg>
                    <div data-i18n="Shift master">Shift master</div>
                  </a>
                </li>
                

                <li class="menu-item">
                  <a href="holiday.php" class="menu-link" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="menu-icon tf-icons bi bi-calendar-check-fill" viewBox="0 0 16 16">
  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
</svg>
                    <div data-i18n="Holiday">Holiday</div>
                  </a>
                </li>
                
                <li class="menu-item">
                  <a href="leavetype.php" class="menu-link" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-signpost-split-fill" viewBox="0 0 16 16">
  <path d="M7 16h2V6h5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.8 2.4A1 1 0 0 0 14 2H9v-.586a1 1 0 0 0-2 0V7H2a1 1 0 0 0-.8.4L.225 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4h5z"/>
</svg>
                    <div data-i18n="Leave Type">Leave Type</div>
                  </a>
                </li>
                <?php } ?>

                <li class="menu-item">
                  <a href="leave_req.php" class="menu-link" >
                  <i class="menu-icon tf-icons ti ti-chart-pie"></i>
                    <div data-i18n="Leave Request">Leave Request
                     
                    </div>
                  </a>
                </li> 
                <?php if ($user_role=='1'){ ?>
                 
                <li class="menu-item">
              <a href="leave_application.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-file"></i>
                <div data-i18n="Leave Approval">Leave Approval</div>
              </a>
            </li> 
                 
                <li class="menu-item">
              <a href="relieve.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-logout"></i>
                <div data-i18n="Relieve">Relieve</div>
              </a>
            </li> 
                 
                <li class="menu-item">
              <a href="rejoin.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-login"></i>
                <div data-i18n="Rejoin">Rejoin</div>
              </a>
            </li> 

                <li class="menu-item">
              <a href="hr_master.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-clipboard"></i>
                <div data-i18n="HR Master">HR Master</div>
              </a>
            </li> 
            <li class="menu-item">
              <a href="emp_master1.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-user"></i>
              
                <div data-i18n="Staff Master">Staff Master</div>
              </a>

            </li>
<li class="menu-item">
                  <a href="attendance_report.php" class="menu-link" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="menu-icon tf-icons bi bi-calendar-check-fill" viewBox="0 0 16 16">
  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
</svg>
                    <div data-i18n="Attendance Generate">Attendance Generate</div>
                  </a>
                </li>

                <li class="menu-header small text-uppercase">
              <span class="menu-header-text">SALES</span>
            </li>
             <li class="menu-item">
              <a href="party_master.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-users"></i>
              
                <div data-i18n="Party Master">Party Master</div>
              </a>
            
           
            
                <li class="menu-item">
                  <a href="enquiry.php" class="menu-link" >
                 <i class="menu-icon tf-icons ti ti-bookmark"></i>
                    <div data-i18n="Enquiry">Enquiry</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="quote_list.php" class="menu-link" >
                 <i class="menu-icon tf-icons ti ti-list"></i>
                    <div data-i18n="Quotation">Quotation</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="staff_assign.php" class="menu-link" >
                 <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Staff Assignment">Staff Assignment</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="profomo_grn.php" class="menu-link" >
                 <i class="menu-icon tf-icons ti ti-clipboard"></i>
                    <div data-i18n="Profoma Invoice">Profoma Invoice</div>
                  </a>
                </li>

             <li class="menu-item">
              <a href="inspect.php" class="menu-link" >
             <i class="menu-icon tf-icons ti ti-help"></i>
                <div data-i18n="Inspection">Inspection</div>
              </a>
            </li>
                <li class="menu-item">
                  <a href="saleslist.php" class="menu-link" >
                 <i class="menu-icon tf-icons ti ti-file"></i>
                    <div data-i18n="Sales Invoice">Sales Invoice</div>
                  </a>
                </li>
            
            

           

            </li>
            <li class="menu-item">
              <a href="lastlogin.php" class="menu-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="menu-icon tf-icons bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
</svg>
              
                <div data-i18n="Recent Login">Recent Login</div>
              </a>

            </li>
           
            <!-- <li class="menu-item">
              <a href="shift_group.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Shift Group Master">Shift Group Master</div>
              </a>

            </li> -->
            <!-- <li class="menu-item">
              <a href="leave_req.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-tag"></i>
                <div data-i18n="Leave Request">Leave Request</div>
              </a>
            </li>
          
            
            <li class="menu-item">
              <a href="leave_application.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-clipboard"></i>
                <div data-i18n="Leave Application">Leave Application</div>
              </a>
            </li> 



            < Reports -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Reports</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Attendance Report">Attendance Report</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="daily_report.php" class="menu-link" >
                    <div data-i18n="Daily Basic Report">Daily Basic Report</div>
                  </a>
                </li>
                <!-- <li class="menu-item">
                  <a href="daily_io_report.php" class="menu-link" >
                    <div data-i18n="IN / OUT Report">IN / OUT Report</div>
                  </a>
                </li>
             
             
               
                <li class="menu-item"> 
                  <a href="attendance_report.php" class="menu-link" >
                    <div data-i18n="Attendance Report">Attendance Report</div>
                  </a>
                </li> -->
                 <li class="menu-item">
                  <a href="monthly_report.php" class="menu-link" >
                    <div data-i18n="Monthly Report">Monthly Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="salary_report.php" class="menu-link" >
                    <div data-i18n="Salary Report">Salary Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="staff_report.php" class="menu-link" >
                    <div data-i18n="Staff Report">Staff Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="enquiry_report.php" class="menu-link" >
                    <div data-i18n="Enquiry Report">Enquiry Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="quote_report.php" class="menu-link" >
                    <div data-i18n="Quotation Report">Quotation Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="profomo_report.php" class="menu-link" >
                    <div data-i18n="Proforma Report">Proforma Report</div>
                  </a>
                </li>
               
               </ul>
            </li>


            <?php } ?>
			
				   <!--Time & Action-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-clock"></i>
                <div data-i18n="Time & Action">Time & Action</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="action_form.php" class="menu-link" >
                    <div data-i18n="Time & Action">Time & Action</div>
                  </a>
                </li>
               </ul>
            </li>
			 -->
					   <!--Costing-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons fa fa-inr" style="font-size:20px"></i>
                <div data-i18n="Costing">Costing</div>
              </a>
              <ul class="menu-sub">
			  
                <li class="menu-item">
                  <a href="costing.php" class="menu-link" >
                    <div data-i18n="Costing">Costing</div>
                  </a>
                </li>
               </ul>
            </li> -->
			
			<!-- Front Pages -->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-layout"></i>
                <div data-i18n="Planning">Planning</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="fabric.php" class="menu-link" >
                    <div data-i18n="Fabric Plan">Fabric Plan</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="fabric_computation.php" class="menu-link" >
                    <div data-i18n="Fabric Computation">Fabric Computation</div>
                  </a>
                </li> -->
                <!--<li class="menu-item">
                  <a href="fabric_process.php" class="menu-link" >
                    <div data-i18n="Fabric Process Plan">Fabric Process Plan</div>
                  </a>
                </li>-->
                <!-- <li class="menu-item">
                  <a href="stitching.php" class="menu-link" >
                    <div data-i18n="Stitching Plan">Stitching Plan</div>
                  </a>
                </li>
				<li class="menu-item">
                    <a href="material_resource.php" class="menu-link" >
                            <div data-i18n="Material Resource Plan">Material Resource Plan</div>
                    </a>
                </li>
            
                <li class="menu-item">
                  <a href="printing.php" class="menu-link" >
                    <div data-i18n="Printing Plan">Printing Plan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="packing.php" class="menu-link" >
                    <div data-i18n="Packing Plan">Packing Plan</div>
                  </a>
                </li>
				
               </ul>
            </li> -->
			
	

            <!--Purchase-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Stores">Stores</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="purchaseorder.php" class="menu-link" >
                    <div data-i18n="Purchase Order">Purchase Order</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="purchase_orderlist.php" class="menu-link" >
                    <div data-i18n="Purchase Entry">Purchase Entry</div>
                  </a>
              </li> -->
              <!--<li class="menu-item">
                  <a href="stockinward.php" class="menu-link" >
                    <div data-i18n="Material Inward">Material Inward</div>
                  </a>
                </li>-->
              <!-- <li class="menu-item">
                  <a href="stockoutward.php" class="menu-link" >
                    <div data-i18n="Accessories Outward">Accessories Outward</div>
                  </a>
              </li>
               </ul>
            </li> -->
			
		
			
			   <!-- Fabric & Inward/Outward
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shirt"></i>
                <div data-i18n="Fabric">Fabric</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="fabric_inward.php" class="menu-link" >
                    <div data-i18n="Fabric Inward">Fabric Inward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="fabric_outward.php" class="menu-link" >
                    <div data-i18n="Fabric Outward">Fabric Outward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="fabric_stock_inward.php" class="menu-link" >
                    <div data-i18n="Fabric Stock Inward">Fabric Stock Inward</div>
                  </a>
                </li>
				 <li class="menu-item">
                  <a href="fabric_stock.php" class="menu-link" >
                    <div data-i18n="Fabric Stock Transfer">Fabric Stock Transfer</div>
                  </a>
                </li>
	
             
               </ul>
            </li> -->
			
			
			
			
			   <!--Fabric Processing-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-repeat"></i>
                <div data-i18n="Processing">Processing</div>
              </a>
              <ul class="menu-sub">
              
				<li class="menu-item">
                  <a href="process_po.php" class="menu-link" >
                    <div data-i18n="Process Po">Process Po</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="process_outward.php" class="menu-link" >
                    <div data-i18n="Process Outward">Process Outward</div>
                  </a>
                </li>
                	<li class="menu-item">
                  <a href="process_inward.php" class="menu-link" >
                    <div data-i18n="Process Inward">Process Inward</div>
                  </a>
                </li>
              
             
               </ul>
            </li> -->
			
			
			 <!--Cutting-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-cut"></i>
                <div data-i18n="Cutting">Cutting</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="cutting_inward.php" class="menu-link" >
                    <div data-i18n="Cutting Inward">Cutting Inward</div>
                  </a>
                </li>
               
                <li class="menu-item">
                  <a href="cutting.php" class="menu-link" >
                    <div data-i18n="Cutting">Cutting</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="cutpanel_outward.php" class="menu-link" >
                    <div data-i18n="Cutpanel Outward">Cutpanel Outward</div>
                  </a>
                </li> -->
			    <!-- <li class="menu-item">
                  <a href="cutpanel_inward.php" class="menu-link" >
                    <div data-i18n="Cutpanel Inward">Cutpanel Return</div>
                  </a>
                </li> -->
				</ul>
            </li>
			
			<!--Printing Inward/Outward-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-printer"></i>
                <div data-i18n="Printing">Printing</div>
              </a>
              <ul class="menu-sub">
               
                <li class="menu-item">
                  <a href="printing_inward.php" class="menu-link" >
                    <div data-i18n="Printing Inward">Printing Inward</div>
                  </a>
                </li>
			    <li class="menu-item">
                  <a href="printing_outward.php" class="menu-link" >
                    <div data-i18n="Printing Outward">Printing Outward</div>
                  </a>
                </li>
				</ul>
            </li> -->
			
		    <!--Sewing Inward/Outward-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Sewing">Sewing</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="sewing_inward.php" class="menu-link" >
                    <div data-i18n="Sewing Inward">Sewing Inward</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="sewing_outward.php" class="menu-link" >
                    <div data-i18n="Sewing Outward">Sewing Outward</div>
                  </a>
                </li>   
                <li class="menu-item">
                  <a href="ocr_entry.php" class="menu-link" >
                    <div data-i18n="OCR Entry">OCR Entry</div>
                  </a>
                </li>   
				</ul>
            </li> -->
			
		    <!--Checking Inward/Outward-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-reload"></i>
                <div data-i18n="Checking">Checking</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="checking_inward.php" class="menu-link" >
                    <div data-i18n="Checking Inward">Checking Inward</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="checking_outward.php" class="menu-link" >
                    <div data-i18n="Checking Outward">Checking Outward</div>
                  </a>
                </li>   
             <li class="menu-item">
                  <a href="ocr_entry.php" class="menu-link" >
                    <div data-i18n="OCR Entry">OCR Entry</div>
                  </a>
                </li>  
				</ul>
            </li> -->
			
			<!--Packing Inward/Outward-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Packing">Packing</div>
              </a>
              <ul class="menu-sub">
               
              <li class="menu-item">
                  <a href="packing_inward.php" class="menu-link" >
                    <div data-i18n="Packing Inward">Packing Inward</div>
                  </a>
                </li>

                <li class="menu-item">
                  <a href="packing_entry.php" class="menu-link" >
                    <div data-i18n="Packing Entry">Packing Entry</div>
                  </a>
                </li>
			  </ul>
            </li> -->
        

			  <!--Invoice-->
            <!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-clipboard"></i>
                <div data-i18n="Invoice">Invoice</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="sales_invoice.php" class="menu-link" >
                    <div data-i18n="Export Invoice">Export Invoice</div>
                  </a>
                </li>
           
             
               </ul>
            </li> -->
			
					<!--Reports-->
            <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Reports</span>
            </li>

			  
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-receipt"></i>
                <div data-i18n="Order Reports">Order Reports</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="sales_report.php" class="menu-link" >
                    <div data-i18n="Sales Order">Sales Order</div>
                  </a>
                </li>
				<li class="menu-item">
                  <a href="ord_pending_report.php" class="menu-link" >
                    <div data-i18n="Order Pending">Order Pending</div>
                  </a>
                </li>
				
                <li class="menu-item">
                  <a href="order_history_report.php" class="menu-link" >
                    <div data-i18n="Order History Report">Order History Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="order_tracking_report.php" class="menu-link" >
                    <div data-i18n="Order Tracking Report">Order Tracking Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="enquiry_report.php" class="menu-link" >
                    <div data-i18n="Enquiry">Enquiry</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="sample_report.php" class="menu-link" >
                    <div data-i18n="Sample">Sample</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ord_complete_report.php" class="menu-link" >
                    <div data-i18n="OCR Report">OCR Report</div>
                  </a>
                </li> -->
                <!-- <li class="menu-item">
                  <a href="complaint_report.php" class="menu-link" >
                    <div data-i18n="Complaint Report">Complaint Report</div>
                  </a>
                </li> -->
              
               
				</ul>
			</li>
			
			<!-- <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-map"></i>
                <div data-i18n="Planning Reports">Planning Reports</div>
              </a>
              <ul class="menu-sub">
			
                <li class="menu-item">
                  <a href="fabric_plan_report.php" class="menu-link" >
                    <div data-i18n="Fabric Plan">Fabric Plan</div>
                  </a>
                </li>
				  <li class="menu-item">
                  <a href="mrp_report.php" class="menu-link" >
                    <div data-i18n="MRP Report">MRP Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stitching_report.php" class="menu-link" >
                    <div data-i18n="Stitching">Stitching</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="printing_report.php" class="menu-link" >
                    <div data-i18n="Printing">Printing</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="packing_report.php" class="menu-link" >
                    <div data-i18n="Packing">Packing</div>
                  </a>
                </li>
			</ul>
			</li>
			
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-briefcase"></i>
                <div data-i18n="Purchase Reports">Purchase Reports</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="pur_ord_report.php" class="menu-link" >
                    <div data-i18n="Purchase Order">Purchase Order</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pur_entry_report.php" class="menu-link" >
                    <div data-i18n="Purchase Entry">Purchase Entry</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stock_inward_report.php" class="menu-link" >
                    <div data-i18n="Stock Inward">Stock Inward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stock_out_report.php" class="menu-link" >
                    <div data-i18n="Stock Outward">Stock Outward</div>
                  </a>
                </li>
              </ul>
            </li>
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-folder"></i>
                <div data-i18n="Fabric Reports">Fabric Reports</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="fabric_inward_report.php" class="menu-link" >
                    <div data-i18n="Fabric Inward">Fabric Inward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="fabric_outward_report.php" class="menu-link" >
                    <div data-i18n="Fabric Outward">Fabric Outward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="process_inward_report.php" class="menu-link" >
                    <div data-i18n="Process Inward">Process Inward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="process_outward_report.php" class="menu-link" >
                    <div data-i18n="Process Outward">Process Outward</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="stock_transfer_report.php" class="menu-link" >
                    <div data-i18n="Stock Transfer Report">Stock Transfer Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="qualityreport.php" class="menu-link" >
                    <div data-i18n="Fabric Stock Report">Fabric Stock Report</div>
                  </a>
                </li>
              </ul>
            </li>
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-database"></i>
                <div data-i18n="Stores Reports">Stores Reports</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item">
                  <a href="stockreport.php" class="menu-link" >
                    <div data-i18n="Accessories Stock">Accessories Stock</div>
                  </a>
                </li>
                
               
              </ul>
            </li>
				<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-database"></i>
                <div data-i18n="Document Reports">Document Reports</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="sales_invoice_report.php" class="menu-link" >
                    <div data-i18n="Sales Invoice Report">Sales Invoice Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="sales_register_report.php" class="menu-link" >
                    <div data-i18n="Sales Register Report">Sales Register Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="drawback.php" class="menu-link" >
                    <div data-i18n="Drawback Report"> Drawback Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="rodtep_rep.php" class="menu-link" >
                    <div data-i18n="RODTEP Report">RODTEP Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="rosctl.php" class="menu-link" >
                    <div data-i18n="ROSCTL Report">ROSCTL Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ecgc_report.php" class="menu-link" >
                    <div data-i18n="ECGC Report">ECGC Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="rex_report.php" class="menu-link" >
                    <div data-i18n="Rex Report">Rex Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="brc_rep.php" class="menu-link" >
                    <div data-i18n="BRC Report">BRC Report</div>
                  </a>
                </li>
              <li class="menu-item">
                  <a href="despatch_rep.php" class="menu-link" >
                    <div data-i18n="Despatch Report">Despatch Report</div>
                  </a>
                </li>
                
               
                <li class="menu-item">
                  <a href="shipment_report.php" class="menu-link" >
                    <div data-i18n="Shipment Report">Shipment Report</div>
                  </a>
                </li>
               
              </ul>
            </li>
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Calendar">Calendar</div>
              </a>
              <ul class="menu-sub">
              <li class="menu-item">
            <a href="calc.php" class="menu-link ">
                <i class="menu-icon tf-icons ti ti-calendar"></i>
                <div data-i18n="Calendar">Calendar</div>
              </a>
</li>
</ul>
</li>
        <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Settings</span>
            </li>
			
			<li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="usermaster.php" class="menu-link">
                    <div data-i18n="List">List</div>
                  </a>
                </li>
              </ul>
            </li>
             <li class="menu-item">
              <a href="https://truezor.com/" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
               </ul>
            </li>  -->
			
			  <!-- Report end  -->

			  <!-- Settings -->
            
           
            
         
          </ul>
        </aside>
		
		

<script>function clock(){var date=new Date();var weekday=date.getDay();var year=date.getYear();var month=date.getMonth();var day=date.getDate();var hour=date.getHours();var minute=date.getMinutes();var second=date.getSeconds();var days=new Array ("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday" );var months=new Array("January","February","March","April","May","June","July","August","September","October","November","december");var monthname=months[month];var dayname=days[weekday];var ap;var sal;if(year<1000){year=year+1900} if(hour<12 &&minute<60 &&second<60){sal='Hi, Good Morning';} if(hour>=12 &&hour<17 &&minute<60 &&second<60 ){sal='Hi, Good Afternoon';} if(hour>=17 &&hour<24 &&minute<60 &&second<60 ){sal='Hi, Good Evening';} if(hour>=12){hour=hour-12;ap='PM';}else{ap='AM';} if(minute<10){minute="0"+minute} if(second<10){second="0"+second};

document.getElementById('salute').innerHTML=sal;setTimeout("clock()",60000)}

window.onload=function(){clock();

}
window.setInterval(function(){
 clock();
}, 1001);
// Widget Code by https://widgetcodes.com/
</script>