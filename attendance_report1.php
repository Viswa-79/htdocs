<?php include "config.php"; ?>


  <?php include "head.php"; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

          
    



            <?php
  $fromdate=$_POST['fromdate'];
  $todate=$_POST['todate'];
  $type=$_POST['type'];
 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">
     
              <div id="mydiv" class="card mb-4 ">
                <form action="" method="post" enctype="multipart/form-data">
                <div style=" text-align:center;padding:15px">
                      <span style="font-size:26px;font-family:table-icons" class="btn btn-outline-warning">Attendance Report</span>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                         <span style="font-size:14px" class="btn btn-outline-primary"  type="text">From Date : <?php echo date('d-m-Y',strtotime($fromdate));?> </span>
                         <span style="font-size:14px" class="btn btn-outline-success"  type="text">To Date : <?php echo date('d-m-Y',strtotime($todate));?> </span>
                        </div>

                        
                <div class="card-body text-nowrap table-responsive">
         
                <?php
                $intime=array();
                $outtime=array();
                $sno=1;
                
             $sql4 = "SELECT * FROM attendance where date between '$fromdate' and '$todate' group by empid,date order by empname asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $empname= $wz1['empname'];
            $date=$wz1['date'];
              $emp=$wz1['empid'];
              $dir=$wz1['direction'];
              $remarks=$wz1['remarks'];
              
              $sql2 = "SELECT * FROM employee m left join shift n on m.shiftgrp=n.id where name='$empname' and m.id='$emp' order by m.id asc";
              $result2 = mysqli_query($conn, $sql2);
              $wz6 = mysqli_fetch_array($result2);
                 $shift=$wz6['shiftname'];
               $shiftime=$wz6['ftime'];
              $id=$wz6['id'];

              $sql25 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='IN' order by id asc";
              $result25 = mysqli_query($conn, $sql25);
              $count1=mysqli_num_rows($result25);
			  
			   $sql25 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='OUT' order by id asc";
              $result25 = mysqli_query($conn, $sql25);
              $count2=mysqli_num_rows($result25);
         
              
              $sql5 = "SELECT min(time) as time FROM attendance where empname='$empname' and date='$date' and direction='IN' order by id asc";
              $result5 = mysqli_query($conn, $sql5);
              while($wz = mysqli_fetch_array($result5)){
               $intime=date('H:i:s',strtotime($wz['time']));
			   }
              // print_r($intime);
               
             

             $sql6 = "SELECT max(time) as time FROM attendance where empname='$empname' and date='$date' and direction='OUT' order by id asc";
              $result6 = mysqli_query($conn, $sql6);
              while($wz2 = mysqli_fetch_array($result6))
			  {
                $outtime=date('H:i:s',strtotime($wz2['time']));
              }
			 // print_r($outtime);
                


              if($intime!='' && $count2 > 0)
              {
               $timein = strtotime($intime);
               $timeout = strtotime($outtime);

               if($intime!='' && $outtime!=''){
               
               $hours1=round((abs($timeout - $timein) / 3600));
              // $start_t = new DateTime($outtime);
              // $current_t = new DateTime($intime);
              // $difference = $start_t ->diff($current_t );
              // $hours1 = $difference ->format('%H:%I');
               }
               else
			   { 
                $hours1="0";
               }
              }
			  else
			  {
				  $outtime=0;
          $hours1="0";
			  }
               
              
        if ($shiftime < $intime && $grace < $intime && $shift!='' && $count1 > 0)
        {
         $status = "Present";
             
        
        }
       else if ($shiftime < $intime && $grace > $intime && $shift!='' && $count1 > 0)
        {
           $status="Late Entry";
              
         
        }
        
         else
        {
          $status="Absent";
        
         }
          
            //  if($intime <= "09:30" )
            //    {
            //        $status="Present";
            //        $clr="rgb(39 191 107)";
            // }
            // else if($intime > "09:30" && $intime <= "09:40" )
            // {
            //     $status="Late Entry";
            //     $clr="rgb(255 159 67)";
            //    }
            //   else if($intime > "09:41" )
            //    {
            //     $status = "Absent";
            //     $clr="rgb(234 84 85)";
            //    } 
            
              if($hours1 > 8){
                $hrs = "8";
                $ot = $hours1 - 8;
               
              }
              if($hours1 <= 8)
              {
              $ot = "0";     
              $hrs = $hours1 ;     
              }

            $tothrs= $ot + $hrs;

	    $emp = $emp;
    // $empname = $empname;
    $dates = $wz1['date'];
    $shift = $shiftname;
    $intime = $intime;
    $outtime = $outtime;
    $workdur = $hrs;
    $ot = $ot;
    $tothrs = $tothrs;
    $status = $status;
    $remarks = $remarks; 
     
    $sql25 = "SELECT * FROM attendance_report where emp='$emp' and dates='$dates'";
    $result25 = mysqli_query($conn, $sql25);
    $count3=mysqli_num_rows($result25);


    if($count3==0){
	  $sql1 = "INSERT into attendance_report (emp,dates,shift,intime,outtime,workdur,tothrs,status,remarks,ot) 
 values ('$emp','$dates','$shift','$intime','$outtime','$workdur','$tothrs','$status','$remarks','$ot')";      echo "<br>";
    }
    else{
      $sql1 = "UPDATE attendance_report SET shift='$shift',intime='$intime',outtime='$outtime',ot='$ot',
      workdur='$workdur',tothrs='$tothrs',status='$status',remarks='$remarks' WHERE emp='$emp' and dates='$dates'"; echo "<br>";
    }
    $result1 = mysqli_query($conn, $sql1);
	
              
	 if ($result1) {

   echo "<script>alert('Attendance Registered Successfully');window.location='attendance_report.php';</script>";

  } 
  else {
   echo '<script>alert("Something Wrong, data not stored")</script>';
  }
	
			 $sno++;
      }
      //  unset($status);
             ?>
         <br>
      <div class="card-header d-flex align-items-center justify-content-between"> 
         <a href="attendance_report.php" 
         type="button" class="btn btn-outline-info" >
         <span class="ti-xs ti ti-arrow-left me-1"></span>Back
        </a>
        
        <!-- <a href="attendance_list.php" 
         type="button" class="btn btn-outline-dark" >
         <span class="ti-xs ti ti-eye me-1"></span>Edit
        </a>          -->
      </div>

      </div>
        </div> 
        
        <!-- <div class="col-12 d-flex justify-content-between ">
                              <a class="btn btn-label-dark btn-prev" href="attendance_report.php">
                              <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Back</span>
                              </a>

                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block me-sm-1">Submit</span>
                                <i class="ti ti-arrow-right me-sm-1 "></i> 
                              </button> 
        </div>     -->
    </form>
</div>
        
            <!-- / Content -->

          

            <div class="content-backdrop fade"></div>
          </div> </div>
          <!-- Content wrapper -->
         
          
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>
