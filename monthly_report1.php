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
$tod =date("Y-m-d");
$today = date("d", strtotime($tod));


date_default_timezone_set("Asia/Kolkata"); 

$tim=date("h:i A");
$month=$_POST['month'];
$year=date("Y");
$month=str_pad($month,2,"0",STR_PAD_LEFT);

$from=$year.'-'.$month.'-01';
$to = date('Y-m-t', strtotime($from));
$to1 = date('t', strtotime($from));

 $monthName = date("F", strtotime($from));

 


 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">

            <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1>
            
              <div id="mydiv" class="card mb-4 ">

                <div class="card-header d-flex align-items-center justify-content-between"> 
                       <span style="font-size:14px;font-family:table-icons;text-transform:uppercase" class="btn btn-outline-primary">Monthly Attendance Report - &nbsp;<b><?php echo $monthName;?></b></span>&nbsp;
                       <button style="border:none;color:black;font-size:14px;font-family:table-icons;text-transform:uppercase" class="btn btn-outline-primary">&nbsp;
                       <span style="text-align:right;font-size:14px;font-family:table-icons;text-transform:uppercase" class="badge badge-dot bg-success me-1"> </span>Present&nbsp;&nbsp;&nbsp;&nbsp;
                       <span style="font-size:14px;font-family:table-icons;text-transform:uppercase" class="badge badge-dot bg-danger me-1"> </span>Absent</button>
                  </div>
                  <div class="card-body text-nowrap table-responsive">
    <table id="ConvertTable" class="table table-bordered table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                 
                         <tr >
                         <th style="text-align:center">S.No</th>
                         <!-- <th>Date</th> -->
                         <th style="text-align:center">emp&nbsp;ID.</th>
					               <th>emp&nbsp;Name</th>
                     <?php
            
            
            for($d=1;$d<=$to1;$d++){
              $d1=STR_PAD($d,2,"0",STR_PAD_LEFT);

          ?>
                         <th style="text-align:center"><?php echo $d1;?></th>

                         <?php
      }
    
      ?>
                         <th>no.of&nbsp;present</th>
                         <!-- <th>no.of&nbsp;absent</th> -->
                    
	</tr>
</thead>
<tbody  id="myTable">
<?php
if($month!=''){
  ?>
    <?php
                $sno=1;
                 
             $sql4 = "SELECT *,n.id as eid FROM attendance_report m left join employee n on m.emp=n.id where dates between '$from' and '$to' and n.status!=2 group by emp order by n.id asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $empname= $wz1['empname'];
              $emp=$wz1['emp'];
              $emp1=$wz1['empid'];
              $name=$wz1['name'];
			  
	 $sql1 = "SELECT * FROM attendance_report where emp='$emp' and dates between '$from' and '$to' and workdur>'0'";
              $result1 = mysqli_query($conn, $sql1);
              $count3=mysqli_num_rows($result1);
             ?>
                    <tr>
               <td style="text-align:center;width:40px"><?php echo $sno; ?></td>      
               <!-- <td style="width:30px" nowrap><?php echo  date('d-m-Y',strtotime($date));?></td>       -->
               <td style="text-align:center;width:30px"><?php echo $emp1;?></td>      
               <td style="width:130px"><?php echo $name; ?></td> 
               <?php
			   $precent=0;
       for($d=1;$d<=$to1;$d++)
            {

         $d1=STR_PAD($d,2,"0",STR_PAD_LEFT);
              $date=$year.'-'.$month.'-'.$d1;
              $dt  = new DateTime($date);
      

     $sql11 = "SELECT * FROM attendance_report where emp='$emp' and dates='$date'";
              $result11 = mysqli_query($conn, $sql11);
              $wz = mysqli_fetch_array($result11);
            $workdur=$wz['workdur'];
          
            
                if($workdur > 0 )
             {
                 $log="P";
                 $clr="success";
                 
          }
            elseif(($workdur == '' || $workdur== 0) && $dt->format("D") == "Sun" && $date<=$tod)
             {
              $log = "S";
              $clr="primary";
			  
             } 
               elseif(($workdur == '' || $workdur== 0 )&& $date<=$tod)
             {
              $log = "A";
              $clr="danger";
			  
             } 
            
     ?>
               <td style="width:40px;text-align:center"><span  class="badge bg-<?php echo $clr;?> me-1"><?php echo $log;?></span></td>
               <?php 
                unset($log);
             unset($clr); 
            }
            ?>
               <td style="width:50px;text-align:center"><?php echo $count3; ?></td>
               <!-- <td style="width:50px"><?php echo ''; ?></td> -->
                </tr>
           
             <?php 
             $sno++;
            
            }
             ?>
            
            <?php
}
else{
  ?>
<div class="card-body pb-0">
                      <ul class="timeline pt-3">
                        <li class="timeline-item pb-4 timeline-item-primary">
                          <span class=" timeline-indicator-primary">
                           
                          </span>
                          <div class="timeline-event">
                            <div class="timeline-header border-bottom mb-3">
                              <h6 class="mb-0">Message..!</h6>
                              <span class="text-muted"><?php echo $today; echo" ";echo $monthName;?></span>
                            </div>
                            <div class="d-flex justify-content-between flex-wrap mb-2">
                              <div class="d-flex align-items-center">
                                <span>No Datas are in <?php echo $monthName;?> Month....</span>
                                
                              </div>
                              <div>
                                <span><?php echo $tim;?></span>
                              </div>
                            </div>
                           
                          </div>
                        </li>
                        
                      </ul>
                    </div>
<?php
}
?>
</tbody> 
</table> 

                </div>
              </div>            
                
            <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="monthly_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
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
