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
  $to1 = date('t', strtotime($fromdate));
  $to2=date("Y-m",strtotime($fromdate)).'-'.$to1;
 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">

            <!-- <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1> -->
     
              <div id="mydiv" class="card mb-4 ">

              <div class="card-header d-flex align-items-center justify-content-between"> 
                       <span style="font-size:14px;font-family:table-icons;text-transform:uppercase" class="btn btn-warning">Salary Report </span>&nbsp;
                       <button style="font-size:14px;font-family:table-icons;text-transform:uppercase" class="btn btn-outline-warning">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp;| &nbsp;To : <?php echo date('d-m-Y',strtotime($todate));?></button>
                  </div>



                <!-- <div style=" text-align:center;padding:15px">
                      <span style="font-size:26px;font-family:table-icons" class="btn btn-outline-warning">Salary Report</span>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <span style="font-size:14px" class="btn btn-outline-primary" type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp; </span>
                     <span style="font-size:14px" class="btn btn-outline-success"  type="text">To : <?php echo date('d-m-Y',strtotime($todate));?> </span>
                  </div> -->
                  <div class="card-body text-nowrap table-responsive">
    <table id="ConvertTable" class="table table-bordered table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                  <tr>
                  <th nowrap style="font-weight:bold">S.No</th>
                  <th nowrap style="font-weight:bold">emp&nbsp;ID.</th>
					        <th  nowrap nowrap style="font-weight:bold">emp&nbsp;Name</th>
					        <th  nowrap style="font-weight:bold">Department</th>
                  <th  nowrap style="font-weight:bold">No.of&nbsp;days</th>
                  <th  nowrap style="font-weight:bold">per day salary</th>
                  <!-- <th  nowrap>working days</th>     -->
                  <th  nowrap style="font-weight:bold">total salary</th>    
                  <th  nowrap style="font-weight:bold">PF (12%)</th>    
                  <th  nowrap style="font-weight:bold">ESI (0.75%)</th>    
                  <th  nowrap style="font-weight:bold">Net salary</th>    
	              </tr>

                </thead>
                 <tbody style="text-align:center">
                <?php
               
                $sno=1;
                 $sundays=0;
                 $pft=0;
                 $salaryt=0;
                 $tott=0;
                 $nett=0;
                 $esit=0;

                 
              $start = new DateTime($fromdate);
$end = new DateTime($to2);
// otherwise the  end date is excluded (bug?)
$end->modify('+1 day');

$interval = $end->diff($start);

// total days
$days = $interval->days;

// create an iterateable period of date (P1D equates to 1 day)
$period = new DatePeriod($start, new DateInterval('P1D'), $end);

// best stored as array, so you can add more than one
$holidays = array('');

foreach($period as $dt) {
    $curr = $dt->format('D');

    // substract if Saturday or Sunday
    if ($curr == 'Sun') {
        $days--;
    }

    // (optional) for the updated question
    elseif (in_array($dt->format('Y-m-d'), $holidays)) {
        $days--;
    }
}
  $days; // 4

             $sql4 = "SELECT *,count(workdur)as workdur,n.empid as empid,n.ot as ot FROM attendance_report m left join employee n on m.emp=n.id left join depart s on n.depart=s.id where dates between '$fromdate' and '$todate' and workdur > 0 group by emp order by n.id asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
             $pfno=$wz1['pf'];
             $esino=$wz1['esino'];
             $emp=$wz1['empid'];
           $salary= $wz1['ot'] / $days;
             $work=$wz1['workdur'];
             $tot= ($salary * $work);

             if($pfno !=''){
             $pf=  ($tot * 12)/100;
           }
             else{
              $pf=0;
             }
             
             if($esino !=''){
             $esi=  ($tot * 0.75)/100;
             }
             else{
              $esi=0;
             }
               $net= $tot - $pf - $esi;
            ?> 
                <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td style="text-align:center"><?php echo $emp;?></td>      
               <td style="text-align:left"><?php echo $wz1['name']; ?></td>              
               <td nowrap style="text-align:left"><?php echo $wz1['depname']; ?></td>              
               <td><?php echo $work; ?></td>
               <td style="text-align:right"><?php echo number_format((float)$salary, 2, '.', ''); ?></td>
               <td style="text-align:right"><?php echo number_format((float)$tot, 2, '.', ''); ?></td>
               <td style="text-align:right"><?php echo number_format((float)$pf, 2, '.', ''); ?></td>
               <td style="text-align:right"><?php echo number_format((float)$esi, 2, '.', ''); ?></td>
               
               <td style="text-align:right"><?php echo round($net); ?></td>
               </tr>
           
             <?php 
           $sno++;
          //  $salaryt+=number_format((float)$salary, 2, '.', '');
           $tott+=number_format((float)$tot, 2, '.', '');
            $pft+=number_format((float)$pf, 2, '.', '');
            $esit+=number_format((float)$esi, 2, '.', '');
            $nett+=number_format((float)$net, 2, '.', '');
            }
              
             ?>
             <tr style="font-weight:bold;font-size:17px">
             <td colspan="6" style="text-align:right;"><?php echo 'TOTAL'; ?></td>
             <!-- <td style="text-align:right"><?php echo number_format((float)$salaryt, 2, '.', ''); ?></td> -->
             <td style="text-align:right"><?php echo number_format((float)$tott, 2, '.', ''); ?></td>
             <td style="text-align:right"><?php echo number_format((float)$pft, 2, '.', ''); ?></td>
             <td style="text-align:right"><?php echo number_format((float)$esit, 2, '.', ''); ?></td>
             <td style="text-align:right"><?php echo number_format((float)$nett, 2, '.', ''); ?></td>
          </tr>
            </tbody>
            
</table> 
</div>
              </div> 
                         
              
            
      <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="salary_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
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
