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
            <?php 
         
         $sql = "SELECT * FROM employee WHERE id='$user_id'";
         $result = mysqli_query($conn, $sql);
         $rows = mysqli_fetch_array($result);
       $module = $rows['module'];

  	  $mod2=explode(",",$module);
	 
	 foreach($mod2 as $mod) {
	 $modules[]=$mod;
	 }

            ?>
            <?php //if($user_role==1){ ?>
           <?php if(in_array(2, $modules)){ ?>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">HR</span>
            </li>
          

  <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Masters">Masters</div>
              </a>
             
              <ul class="menu-sub">
              <li class="menu-item">
              <a href="depart.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="menu-icon tf-icons bi bi-diagram-3-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5A1.5 1.5 0 0 1 7.5 2h1A1.5 1.5 0 0 1 10 3.5v1A1.5 1.5 0 0 1 8.5 6v1H14a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0V8h-5v.5a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 2 7h5.5V6A1.5 1.5 0 0 1 6 4.5zm-6 8A1.5 1.5 0 0 1 1.5 10h1A1.5 1.5 0 0 1 4 11.5v1A1.5 1.5 0 0 1 2.5 14h-1A1.5 1.5 0 0 1 0 12.5zm6 0A1.5 1.5 0 0 1 7.5 10h1a1.5 1.5 0 0 1 1.5 1.5v1A1.5 1.5 0 0 1 8.5 14h-1A1.5 1.5 0 0 1 6 12.5zm6 0a1.5 1.5 0 0 1 1.5-1.5h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Department">Department</div>
                  </a>
           </li>

                <li class="menu-item">
                  <a href="desig_master.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-buildings-fill" viewBox="0 0 16 16">
  <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z"/>
</svg>&nbsp;&nbsp; -->
         <div data-i18n="Designation">Designation</div>
                  </a>
           </li>


           <li class="menu-item">
                <a href="emp_master1.php" class="menu-link">
              <!-- <i class="menu-icon tf-icons ti ti-user"></i>&nbsp;&nbsp; -->
                <div data-i18n="Staff Master">Staff Master</div>
              </a>
           </li>

           <li class="menu-item">
                              <a href="shift.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-hourglass-split" viewBox="0 0 16 16">
  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Shift master">Shift master</div>
                  </a>
           </li>
                
                 
                 
              


           <li class="menu-item">
                 <a href="holiday.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="menu-icon tf-icons bi bi-calendar-check-fill" viewBox="0 0 16 16">
  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Holiday">Holiday</div>
                  </a>
           </li>
              
           <li class="menu-item">
                 <a href="leavetype.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-signpost-split-fill" viewBox="0 0 16 16">
  <path d="M7 16h2V6h5a1 1 0 0 0 .8-.4l.975-1.3a.5.5 0 0 0 0-.6L14.8 2.4A1 1 0 0 0 14 2H9v-.586a1 1 0 0 0-2 0V7H2a1 1 0 0 0-.8.4L.225 8.7a.5.5 0 0 0 0 .6l.975 1.3a1 1 0 0 0 .8.4h5z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Leave Type">Leave Type</div>
                  </a>
           </li>

               
           </ul>

              </li>
			  
            <li class="menu-item">
           <a href="javascript:void(0);" class="menu-link menu-toggle">

                <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Transactions">Transactions</div>
          </a>
             
             
                <ul class="menu-sub">

            
             
                 
                 <li class="menu-item">

                  <a href="staff_permiss.php" class="menu-link" >
                  
                  
                    <div data-i18n="Permission">Permission</div>
                  </a>
                </li>
                
                    <li class="menu-item">

                  <a href="permiss_approve.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Permission Approve">Permission Approve</div>
                  </a>
                  </li>
				

             

           
                <li class="menu-item">

                  <a href="leave_req.php" class="menu-link" >
                  <!-- <i class="menu-icon tf-icons ti ti-chart-pie"></i>&nbsp;&nbsp; -->
                    <div data-i18n="Leave Request">Leave Request
                     
                    </div>
                  </a>
               </li>
           


                 
                  <li class="menu-item">
                     <a href="leave_application.php" class="menu-link">
              <!-- <i class="menu-icon tf-icons ti ti-file"></i>&nbsp;&nbsp; -->
                <div data-i18n="Leave Approval">Leave Approval</div>
              </a>
                 </li>
              
                 <li class="menu-item">
                  <a href="relieve.php" class="menu-link">
              <!-- <i class="menu-icon tf-icons ti ti-logout"></i>&nbsp;&nbsp; -->
                <div data-i18n="Relieve">Relieve</div>
              </a>
                 </li>
              
                 <li class="menu-item">
                  <a href="rejoin.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-login"></i>
                <div data-i18n="Rejoin">Rejoin</div>
              </a>
                 </li>
                 </ul>
              
             </li> 
             
             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Reports">Reports</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="daily_report.php" class="menu-link" >
                    <div data-i18n="Daily Basic Report">Daily Basic Report</div>
                  </a>
                </li>
                
                <li class="menu-item">
                  <a href="attendance_report.php" class="menu-link" >
                 
                    <div data-i18n="Attendance">Attendance</div>
                  </a>
         </li>


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
                  <a href="leave_report.php" class="menu-link" >
                    <div data-i18n="Leave Report">Leave Report</div>
                  </a>
                </li>
                 <!-- <li class="menu-item">
                  <a href="adv_report.php" class="menu-link" >
                    <div data-i18n="Advance Salary Report">Advance Salary Report</div>
                  </a>
                </li> -->
                 
                 
               </ul>
            </li>   
             <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
           <i style="font-size:18px" class="menu-icon tf-icons fa fa-chair"></i>
                <div data-i18n="Recruitment">Recruitment</div>
              </a>
              <ul class="menu-sub">
                  <a href="hr_master.php" class="menu-link">
              <i class="menu-icon tf-icons ti ti-clipboard"></i>&nbsp;&nbsp;
                <div data-i18n="Recruitment ">Recruitment </div>
              </a>
                </ul>
            </li>
            <?php }
            ?>
               

          <?php if (in_array(3, $modules)){ ?>
                <li class="menu-header small text-uppercase">
              <span class="menu-header-text">INSPECTION</span>
            </li> 
			
			<li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Masters">Masters</div>
              </a>
             
             <ul class="menu-sub">
             <li class="menu-item">
                  <a href="test_type.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-hourglass-split" viewBox="0 0 16 16">
  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Test master">Test master</div>
                  </a>
         </li>
             
         <li class="menu-item">
                  <a href="carton_master.php" class="menu-link" >
                 <i class="menu-icon tf-icons ti ti-box"></i>
                    <div data-i18n="Carton master">Carton master</div>
                  </a>
         </li>

         <li class="menu-item">
                 <a href="party_master.php" class="menu-link">
        
                <div data-i18n="Party Master">Party Master</div>
              </a>
         </li>
                </ul>
             
                
             </li>
			
            <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-truck"></i>
                <div data-i18n="Transactions">Transactions</div>
              </a>
           
                
            <ul class="menu-sub">
            <li class="menu-item">

                  <a href="enquiry.php" class="menu-link" >
                 <!-- <i class="menu-icon tf-icons ti ti-bookmark"></i>&nbsp;&nbsp; -->
                    <div data-i18n="Enquiry">Enquiry</div>
                  </a>
         </li>

         <li class="menu-item">
                   <a href="quote_list.php" class="menu-link" >
                 <!-- <i class="menu-icon tf-icons ti ti-list"></i>&nbsp;&nbsp; -->
                    <div data-i18n="Quotation">Quotation</div>
                  </a>
         </li>

         <li class="menu-item">
                  <a href="staff_assignment_list.php" class="menu-link" >
                 <!-- <i class="menu-icon tf-icons ti ti-file"></i>&nbsp;&nbsp; -->
                    <div data-i18n="Inspector Allotment">Inspector Allotment</div>
                  </a>
         </li>
         <!-- <li class="menu-item">
                  <a href="project_expenes_entry.php" class="menu-link" >
              <i class="menu-icon tf-icons ti ti-file"></i>&nbsp;&nbsp;
                    <div data-i18n="Expense Claim">Expense Claim</div>
                  </a>
         </li> -->

         <li class="menu-item">
                  <a href="profomo_list.php" class="menu-link" >
                 <!-- <i class="menu-icon tf-icons ti ti-clipboard"></i>&nbsp;&nbsp; -->
                    <div data-i18n="Proforma Invoice">Proforma Invoice</div>
                  </a>
         </li>

         <li class="menu-item">
                 <a href="inspection_list.php" class="menu-link" >
             <i class="menu-icon tf-icons ti ti-help"></i>
                <div data-i18n="Inspection">Inspection</div>
              </a>
         </li>

          
            
         <li class="menu-item">
                
             <a href="sales_invoice_list.php" class="menu-link" >
                 <!-- <i class="menu-icon tf-icons ti ti-file"></i>&nbsp;&nbsp; -->
                    <div data-i18n="Sales Invoice">Sales Invoice</div>
                  </a>
         </li>
         </ul>
             </li> 
                
				  <li class="menu-item">
                 <a href="aql_simulator.php" class="menu-link" >
             <i class="menu-icon tf-icons ti ti-calculator"></i>
                <div data-i18n="AQL Simulator">AQL Simulator</div>
              </a>
                </li>
        
			   <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Reports">Reports</div>
              </a>
              <ul class="menu-sub">
                
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
                 <li class="menu-item">
                  <a href="staffassign_report.php" class="menu-link" >
                    <div data-i18n="Inspector Allotment">Inspector Allotment</div>
                  </a>
                </li>
               
               </ul>
            </li>
          <?php }?>
          
        <?php if (in_array(4, $modules)){ ?>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Asset Managment</span>
            </li>


            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Masters">Masters</div>
              </a>

         
              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="asset_group.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
  <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Asset Group">Asset Group</div>
                  </a>
         </li>
         <li class="menu-item">              
              <a href="asset_master.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
  <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139q.323-.119.684-.12h5.396z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Asset Master">Asset Master</div>
                  </a>
         </li>
         </ul>
         </li>
			 
           
                <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">PURCHASE</span>
            </li> 
			
			
            <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Masters">Masters</div>
              </a>
            
            
                <ul class="menu-sub">
                 <a href="product_group.php" class="menu-link" >
             <i class="menu-icon tf-icons ti ti-chart-pie"></i>&nbsp;&nbsp;
                <div data-i18n="Product Group">Product Group</div>
              </a>
                </ul>
                <ul class="menu-sub">
                 <a href="product_master.php" class="menu-link" >
             <i class="menu-icon tf-icons ti ti-shopping-cart"></i>&nbsp;&nbsp;
                <div data-i18n="Product Master">Product Master</div>
              </a>
                </ul>
              
                
             </li>
			  -->
			 <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Transactions">Transactions</div>
              </a>
            
                <ul class="menu-sub">
                <li class="menu-item">
                 <a href="purchase_order.php" class="menu-link" >
             <!-- <i class="menu-icon tf-icons ti ti-shopping-cart"></i>&nbsp;&nbsp; -->
                <div data-i18n="Purchase Order">Purchase Order</div>
              </a>
         </li>

         <li class="menu-item">               
            <a href="purchase_orderlist.php" class="menu-link" >
             <!-- <i class="menu-icon tf-icons ti ti-note"></i>&nbsp;&nbsp; -->
                <div data-i18n="Purchase Entry">Purchase Entry</div>
              </a>
         </li>
         <li class="menu-item">               
            <a href="ass.php" class="menu-link" >
             <!-- <i class="menu-icon tf-icons ti ti-note"></i>&nbsp;&nbsp; -->
                <div data-i18n="Asset Assignment">Asset Assignment</div>
              </a>
         </li>

         <li class="menu-item">            
                <a href="asset_outward.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Asset Outward">Asset Outward</div>
                  </a>
         </li>
         <li class="menu-item">              
              <a href="asset_inward.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Asset Inward">Asset Inward</div>
                  </a>
         </li>
         </ul> 
             </li>
			 
			 
			  <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                <div data-i18n="Reports">Reports</div>
              </a>
              <ul class="menu-sub">
                
                 <li class="menu-item">
                  <a href="pur_ord_report.php" class="menu-link" >
                    <div data-i18n="Purchase Order Report">Purchase Order Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="pur_entry_report.php" class="menu-link" >
                    <div data-i18n="Purchase Entry Report">Purchase Entry Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="asset_outward_report.php" class="menu-link" >
                    <div data-i18n="Asset Outward Report">Asset Outward Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="asset_inward_report.php" class="menu-link" >
                    <div data-i18n="Asset Inward Report">Asset Inward Report</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="asset_combain_report.php" class="menu-link" >
                    <div data-i18n="Asset Combain Report">Asset Combain Report</div>
                  </a>
                </li>

                
                 <li class="menu-item">
                  <a href="assign_report.php" class="menu-link" >
                    <div data-i18n="Asset Report">Asset Report</div>
                  </a>
                </li>
                
                 <li class="menu-item">
                  <a href="stock_report.php" class="menu-link" >
                    <div data-i18n="Stock Report">Stock Report</div>
                  </a>
                </li>
                 
               
               </ul>
            </li>
            <?php } ?>

             <?php if (in_array(5, $modules)){ ?>
             <li class="menu-header small text-uppercase">
              <span class="menu-header-text">ACCOUNTS</span>
            </li> 

            <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-user"></i>
                <div data-i18n="Master">Master</div>
              </a>

              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="expense.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-hourglass-split" viewBox="0 0 16 16">
  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Expense master">Expense master</div>
                  </a>
         </li>

         <li class="menu-item">
          
                  <a href="expense_party_master.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" menu-icon tf-icons bi bi-hourglass-split" viewBox="0 0 16 16">
  <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Expense Party ">Expense Party </div>
                  </a>
         </li>

         <li class="menu-item">
                 <a href="party_master.php" class="menu-link">
        
                <div data-i18n="Party Master">Party Master</div>
              </a>
         </li>
         </ul>



         </li>


            <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-building"></i>
                <div data-i18n="Transactions">Transactions</div>
              </a>


             


               

              <ul class="menu-sub">
             
         <li class="menu-item">
                  <a href="general_expense.php" class="menu-link" >
<!--                   
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="General Expense">General Expense</div>
                  </a>
         </li>
         <li class="menu-item">
                  <a href="exp_approve.php" class="menu-link" >
                  <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
  <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
  <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
  <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
</svg>&nbsp;&nbsp; -->
                    <div data-i18n="Expense Approve">Expense Approve</div>
                  </a>
         </li>
         </ul>
         </li>


                <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-file"></i></i>
                <div data-i18n="Voucher">Voucher</div>
              </a>


                



                 <ul class="menu-sub">
                 <!-- <li class="menu-item">
                  <a href="adv_salary.php" class="menu-link" >&nbsp;&nbsp;
                    <div data-i18n="Salary Voucher">Salary Voucher</div>
                  </a>
         </li> -->

         <li class="menu-item">             
               <a href="voucher.php" class="menu-link" >
                  <i class="menu-icon tf-icons ti ti-file-dollar"></i>
                    <div data-i18n="Payment Voucher">Payment Voucher</div>
                  </a>
         </li>
         </ul>
                 </li>

                 <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-files"></i>
                <div data-i18n="Reports">Reports</div>
              </a>
              <!-- <ul class="menu-sub">
                 <li class="menu-item">
                  <a href="voucher_report.php" class="menu-link" >
                    <div data-i18n="Voucher Report">Voucher Report</div>
                  </a>
                </li>
               </ul> -->

               
                <ul class="menu-sub">
                <li class="menu-item">
                  <a href="gen_exp_report.php" class="menu-link" >

                    <div data-i18n="General&nbsp;Expense&nbsp;Report">General&nbsp;Expense&nbsp;Report</div>
                  </a>
                  </li>
         </ul>
                <ul class="menu-sub">
                <li class="menu-item">
                  <a href="payment_ledger_report.php" class="menu-link" >

                    <div data-i18n="Statement Report">Statement&nbsp;Report</div>
                  </a>
                  </li>
         </ul>




            </li>   
            <?php } ?>
            <?php //} ?>

            <?php if($user_role == 1){ ?>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Logs</span>
            </li> 

            <li class="menu-item">
                  <a href="lastlogin.php" class="menu-link">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="menu-icon tf-icons bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
</svg>&nbsp;&nbsp;
              
                <div data-i18n="Recent Login">Recent Login</div>
              </a>
         </li>
           
            <?php } ?> 
			
				</ul>
            </li>
			    
				</ul>
			</li>
			
			
            
           
            
         
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