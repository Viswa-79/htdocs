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

          
     <!-- Content wrapper -->
     <div class="content-wrapper">
            <!-- Content -->
            <style>
			  #myInput {
				  border-radius: 10px;
    background-image: url('/css/searchicon.png');
	background-color: lavender; /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}


</style>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
	  //alert("hello");
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
const myFunction = () => {
  const trs = document.querySelectorAll('#myTable tr:not(.header)')
  const filter = document.querySelector('#myInput').value
  const regex = new RegExp(filter, 'i')
  const isFoundInTds = td => regex.test(td.innerHTML)
  const isFound = childrenArr => childrenArr.some(isFoundInTds)
  const setTrStyleDisplay = ({ style, children }) => {
    style.display = isFound([
      ...children // <-- All columns
    ]) ? '' : 'none' 
  }
  
  trs.forEach(setTrStyleDisplay)
}
</script>

            <?php
  $fromdate=$_POST['fromdate'];
  $todate=$_POST['todate'];
  $type=$_POST['type'];
  
  $today=date("Y-m-d");
 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">

            <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1>
     <?php 
       if($type=='1'){
      ?>
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <span style="font-size:26px;font-family:table-icons" class="btn btn-outline-warning">Daily Attendance Report (Basic Report)</span>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <!-- <span style="font-size:14px" class="btn btn-outline-primary" type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp; </span> -->
                     <span style="font-size:14px" class="btn btn-outline-success"  type="text">Date : <?php echo date('d-m-Y',strtotime($todate));?> </span>
                  </div>
                  <div class="card-body text-nowrap table-responsive">
    <table id="ConvertTable" class="table table-bordered table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                  <tr style="text-align:center;">
                  <th style="font-weight:bold">S.No</th>
                  <th style="font-weight:bold">emp&nbsp;ID.</th>
					        <th style="font-weight:bold" >emp&nbsp;Name</th>
                  <th style="font-weight:bold">shift</th>
                  <th style="font-weight:bold">in&nbsp;time</th>
                  <th style="font-weight:bold">out&nbsp;time</th>
                  <th style="font-weight:bold">work&nbsp;dur</th>
                  <!-- <th>over&nbsp;time</th> -->
                  <th style="font-weight:bold">late&nbsp;by</th>
                  <!-- <th>tot&nbsp;dur</th> -->
                  <th style="text-align:center;font-weight:bold">status</th>
                  <th style="font-weight:bold">remarks</th>
                    
	</tr>
                </thead>
                 <tbody style="text-align:center" id="myTable">
                <?php
                $intime=array();
                $outtime=array();
                $sno=1;
      
             $sql4 = "SELECT * FROM employee where status!=2 order by id asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $empname= $wz1['name'];
            // $date=$wz1['date'];
            //   $emp=$wz1['eid'];
              $emp1=$wz1['empid'];
              $dir=$wz1['direction'];
              $id=$wz1['id'];

            

              $sql2 = "SELECT * FROM employee m left join shift n on m.shiftgrp=n.id where m.id='$id' order by m.id asc";
              $result2 = mysqli_query($conn, $sql2);
              $wz6 = mysqli_fetch_array($result2);
              $shift=$wz6['shiftname'];
              $shiftime=$wz6['ftime']; //echo"&nbsp";
              $grace=$wz6['gracetime'];

              $sql25 = "SELECT * FROM attendance where empid='$id' and date='$todate' and direction='IN' order by id asc";
              $result25 = mysqli_query($conn, $sql25);
              $count1=mysqli_num_rows($result25);
             $w11 = mysqli_fetch_array($result25);
              $date=$w11['date'];
              $empid=$w11['empid'];
			  
			   $sql25 = "SELECT * FROM attendance where empid='$id' and date='$todate' and direction='OUT' order by id asc";
              $result25 = mysqli_query($conn, $sql25);
              $count2=mysqli_num_rows($result25);
         
              
              $sql5 = "SELECT min(time) as time FROM attendance where empid='$id' and date='$todate' and direction='IN' order by id asc";
              $result5 = mysqli_query($conn, $sql5);
              $wz = mysqli_fetch_array($result5);
               $intime=date('h:i A',strtotime($wz['time'])); 
               $tme=date('h:i',strtotime($wz['time'])); 
			   
              // print_r($intime);
               
             

             $sql6 = "SELECT max(time) as time FROM attendance where empid='$id' and date='$todate' and direction='OUT' order by id asc";
              $result6 = mysqli_query($conn, $sql6);
              $wz2 = mysqli_fetch_array($result6);
                $outtime=date('h:i A',strtotime($wz2['time']));
              
			 // print_r($outtime);

              if($count1 > 0 && $count2>0)
              {
             $timein = strtotime($intime);
               $timeout = strtotime($outtime);

               if($count1 > 0 && $count2>0)
			   {
               
                // $hours1=round((abs($timeout - $timein) / 3600)); 
               $datetime1 = new DateTime($outtime);
$datetime2 = new DateTime($intime);
$interval = $datetime1->diff($datetime2);
 $wh=$interval->format('%h')." Hr "."&nbsp;".$interval->format('%i')." Min";

               }
               else{
                $wh=0;
               }
              }

             
           $datetime1 = new DateTime($shiftime);
$datetime2 = new DateTime($tme);
$interval = $datetime1->diff($datetime2);
$late=$interval->format('%h')." Hr "."&nbsp;".$interval->format('%i')." Min";

              if ($shiftime < $intime && $grace < $intime && $shift!='' && $count1 > 0)
              {
               
               $sts =$late;
               $cl="red";
              }
             else if ($shiftime < $intime && $grace > $intime && $shift!='' && $count1 > 0)
              {
               
               $sts =$late;
               $cl="green"; 
              }
              
               else
              {
               $sts = '-';
               $cl="black";
               }
               

              //attendance
              if ( $count1==0 && $count2==0)
              {
               $status = "&nbsp;Absent&nbsp;";
               $clr="danger";
               }

              else if($count1>0 && $count2==0 && $todate!=$today)
               {
                $status="Miss Punch";
                $clr="warning";
               }
			   else if($count1>0)
               {
                $status="Present";
                $clr="success";
               }
              
               $tothrs=$wh+0;
            ?>
                <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <!-- <td hidden style="text-align:center"><?php $id; ?></td>       -->
               <td style="text-align:center"><?php echo $emp1;?></td>      
               <td  style="text-align:left" ><?php echo $wz1['name'];?></td>      
               <td><?php echo $shift;?></td>          
               <td nowrap><?php if($count1>0){ echo $intime; } ?></td>      
               <td nowrap><?php if($count2>0){ echo $outtime; } ?></td>      
               <td nowrap style="text-align:center;text-transform:capitalize"><?php echo $wh; ?></td>      
               <!-- <td><?php echo "0"; ?></td>           -->
               <td nowrap style="text-align:center;text-transform:capitalize"><span style="color:<?php echo $cl; ?>"><b><?php echo $sts; ?></b></span></td>          
               <!-- <td><?php echo ''; ?></td>           -->
               <td><span style="width:120px;text-align:center;" class="badge bg-label-<?php echo $clr;?> me-1"><?php echo $status;?></span></td>      
               <td><?php echo $wz1['']; ?></td>
               </tr>
           
             <?php 
			 $sno++;
       unset($status);
       unset($wh);
            }
             ?>
            </tbody>
            
</table> 
</div>
              </div> 
                         
               <?php
               }
               if($type=='2'){
               ?>   
           
              <div id="mydiv" class="card mb-4 ">
              <div style=" text-align:center;padding:15px">
                      <span style="font-size:26px;font-family:table-icons" class="btn btn-outline-warning">Daily Attendance Report (IN / OUT Report)</span>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <!-- <span style="font-size:14px" class="btn btn-outline-primary" type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp; </span> -->
                     <span style="font-size:14px" class="btn btn-outline-success"  type="text">Date : <?php echo date('d-m-Y',strtotime($todate));?> </span>
                  </div>
                  <div class="card-body text-nowrap table-responsive">
    <table id="ConvertTable" class="table table-bordered table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                 
                  <tr style="text-align:center;">
                  <th style="font-weight:bold">S.No</th>
                  <th style="font-weight:bold">emp&nbsp;ID.</th>
					        <th style="font-weight:bold" >emp&nbsp;Name</th>
                  <th style="font-weight:bold">shift</th>
                  <th style="font-weight:bold">in&nbsp;time</th>
                  <th style="font-weight:bold">out&nbsp;time</th>
                  <th nowrap style="font-weight:bold">work&nbsp;dur</th>
                  <!-- <th style="font-weight:bold">ot</th> -->
                  <th nowrap style="font-weight:bold">late&nbsp;by</th>
                  <th  style="font-weight:bold">status</th>
                  <th style="font-weight:bold">remarks</th>
                  <th style="font-weight:bold">in&nbsp;1</th>
                  <th style="font-weight:bold">out&nbsp;1</th>
                  <th style="font-weight:bold">in&nbsp;2</th>
                  <th style="font-weight:bold">out&nbsp;2</th>
                  <th style="font-weight:bold">in&nbsp;3</th>
                  <th style="font-weight:bold">out&nbsp;3</th>
                  <th style="font-weight:bold">in&nbsp;4</th>
                  <th style="font-weight:bold">out&nbsp;4</th>
                  <th style="font-weight:bold">in&nbsp;5</th>
                  <th style="font-weight:bold">out&nbsp;5</th>
                  <th style="font-weight:bold">in&nbsp;6</th>
                  <th style="font-weight:bold">out&nbsp;6</th>
                  <th style="font-weight:bold">in&nbsp;7</th>
                  <th style="font-weight:bold">out&nbsp;7</th>
                  <th style="font-weight:bold">in&nbsp;8</th>
                  <th style="font-weight:bold">out&nbsp;8</th>
                  <!-- <th>in&nbsp;4</th> -->
                  <!-- <th>out&nbsp;4</th> -->
                 
                    
	</tr>
                </thead>
                 <tbody  id="myTable">
                <?php
                $sno=1;
               $intime1=array();
                $outtime1=array();
                
             $sql4 = "SELECT * FROM employee Where status!=2 order by id asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $empname= $wz1['name'];
              // $date=$wz1['date'];
              $id=$wz1['id'];
              $emp1=$wz1['empid'];
              $dir=$wz1['direction'];
			  
              $sql2 = "SELECT * FROM employee m left join shift n on m.shiftgrp=n.id where m.id='$id' order by m.id asc";
              $result2 = mysqli_query($conn, $sql2);
              $wz6 = mysqli_fetch_array($result2);
              $shift=$wz6['shiftname'];
              $shiftime = $wz6['ftime'];
              $grace = $wz6['gracetime'];

              $sql25 = "SELECT * FROM attendance where empid='$id' and date='$todate' and direction='IN' order by id asc";
              $result25 = mysqli_query($conn, $sql25);
              $count1=mysqli_num_rows($result25);
			  
			   $sql25 = "SELECT * FROM attendance where empid='$id' and date='$todate' and direction='OUT' order by id asc";
              $result25 = mysqli_query($conn, $sql25);
              $count2=mysqli_num_rows($result25);
			  
			  $sql5 = "SELECT min(time) as time FROM attendance where empid='$id' and date='$todate' and direction='IN' order by id asc";
              $result5 = mysqli_query($conn, $sql5);
              $wz = mysqli_fetch_array($result5);
               $intime=date('h:i A',strtotime($wz['time']));
			  $tme=date('h:i',strtotime($wz['time'])); 
              // print_r($intime);
               
             

             $sql6 = "SELECT max(time) as time FROM attendance where empid='$id' and date='$todate' and direction='OUT' order by id asc";
              $result6 = mysqli_query($conn, $sql6);
              $wz2 = mysqli_fetch_array($result6);
                $outtime=date('h:i A',strtotime($wz2['time']));
     
              
              $sql11 = "SELECT * FROM attendance where empid='$id' and date='$todate' and direction='IN' order by id asc";
              $result11 = mysqli_query($conn, $sql11);
              while($wz11 = mysqli_fetch_array($result11)){
               $intim[]=date('h:i A',strtotime($wz11['time']));
            }
            //print_r($intime);
               
              $sql15 = "SELECT * FROM attendance where empid='$id' and date='$todate' and direction='OUT' order by id asc";
              $result15 = mysqli_query($conn, $sql15);
              while($wz21 = mysqli_fetch_array($result15)){
               $outtim[]=date('h:i A',strtotime($wz21['time']));
              }

              $datetime1 = new DateTime($shiftime);
              $datetime2 = new DateTime($tme);
              $interval = $datetime1->diff($datetime2);
              $late=$interval->format('%h')." Hr "."&nbsp;".$interval->format('%i')." Min";


              if ($shiftime < $intime && $grace < $intime && $shift!='' && $count1 > 0)
              {
               
               $sts =$late;
               $cl="red";
              }
              
             else if ($shiftime < $intime && $grace > $intime && $shift!='' && $count1 > 0)
              {
               
               $sts =$late;
               $cl="green"; 
              }
                            
               else
              {
               $sts = '-';
               $cl="black";
               }

               
              if ( $count1==0 && $count2==0)
              {
               $status = "&nbsp;Absent&nbsp;";
               $clr="danger";
               }

              else if($count1>0 && $count2==0 && $todate!=$today)
               {
                $status="Miss Punch";
                $clr="warning";
               }
			   else if($count1>0)
               {
                $status="Present";
                $clr="success";
               }

               if($intime!='' && $count2>0)
               {
                $timein = strtotime($intime);
                $timeout = strtotime($outtime);
 
                if($intime!='' && $count2>0)
          {
                
                //  $hours1=round((abs($timeout - $timein) / 3600));
                 $datetime1 = new DateTime($outtime);
                 $datetime2 = new DateTime($intime);
                 $interval = $datetime1->diff($datetime2);
                  $wh=$interval->format('%h')." Hr "."&nbsp;".$interval->format('%i')." Min";
                }
                else{
                 $hours1=0;
                }
               }
             
              $tothrs1=$hours1+0;
            ?>
                    <tr>
                    <td style="text-align:center"><?php echo $sno; ?></td>        
               <td><?php echo $emp1;?></td>      
               <td><?php echo $wz1['name']; ?></td>      
               <td><?php echo $shift; ?></td>     
            <td nowrap><?php if($count1>0){ echo $intime; } ?></td>      
               <td nowrap><?php if($count2>0){ echo $outtime; } ?></td>       
               <td nowrap style="text-align:center;text-transform:capitalize"><?php echo $wh; ?></td>      
               <!-- <td><?php echo "0"; ?></td>           -->
               <td nowrap style="text-align:center;text-transform:capitalize"><span style="color:<?php echo $cl; ?>"><b><?php echo $sts; ?></b></span></td>          
               <td><span style="width:120px;text-align:center;" class="badge bg-label-<?php echo $clr;?> me-1"><?php echo $status;?></span></td>      
               <td><?php echo ''; ?></td> 
               <td nowrap><?php echo $intim[0]; ?></td>      
               <td nowrap><?php echo $outtim[0]; ?></td>      
               <td nowrap><?php echo $intim[1]; ?></td>      
               <td nowrap><?php echo $outtim[1]; ?></td>      
               <td nowrap><?php echo $intim[2]; ?></td>      
               <td nowrap><?php echo $outtim[2]; ?></td>      
               <td nowrap><?php echo $intim[3]; ?></td>      
               <td nowrap><?php echo $outtim[3]; ?></td>      
               <td nowrap><?php echo $intim[4]; ?></td>      
               <td nowrap><?php echo $outtim[4]; ?></td>      
               <td nowrap><?php echo $intim[5]; ?></td>      
               <td nowrap><?php echo $outtim[5]; ?></td>      
               <td nowrap><?php echo $intim[6]; ?></td>      
               <td nowrap><?php echo $outtim[6]; ?></td>      
               <td nowrap><?php echo $intim[7]; ?></td>      
               <td nowrap><?php echo $outtim[7]; ?></td>      
             
                  </tr>
           
             <?php $sno++;
			unset($wh);
       // unset($outtim1);
        unset($intim1);
			 unset($outtim);unset($intim);
            }
             ?>
            </tbody>
            
</table> 

                </div>
              </div>            
                  <?php
               }
               ?>
           
            
      <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="daily_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-warning mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning mt-4" ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>    
</div>
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
<script src="jquery-1.4.4.min.js" type="text/javascript"></script>

<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
   window.location.href = uri + base64(format(template, ctx))
  }
})()
</script> 

<script type="text/javascript">

    function PrintElem(elem) {
        Popup($(elem).html());
    }

    function Popup(data) {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>');
        mywindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; }');
        mywindow.document.write('table, th, td { border: 1px solid #000; }');
        mywindow.document.write('th, td { padding: 10px; text-align: center; }');
        mywindow.document.write('th { background-color: #f2f2f2; font-weight: bold; }');
        mywindow.document.write('tr:nth-child(even) { background-color: #f9f9f9; }');
        mywindow.document.write('</style>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>