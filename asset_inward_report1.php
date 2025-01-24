<?php include "config.php"; ?>

  <?php include "head.php"; ?>
  <body>
    <!-- Layout wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
            <?php 
  $fromdate=$_POST['fromdate'];
  $todate=$_POST['todate'];
  $partyname=$_POST['partyname'];
  
 ?>
           
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 " >
                <div style=" text-align:center;padding:15px">
                <table>
                    <tr>
           <h1 class="btn btn-warning" style="font-size:20px">Credence Inward Report</h1>
</tr>
<tr>
          
</tr>
</table>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <span style="font-size:14px" class="btn btn-outline-primary" type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp; </span>
                     <span style="font-size:14px" class="btn btn-outline-success"  type="text">To : <?php echo date('d-m-Y',strtotime($todate));?> </span>
                  </div>
                  <div class="card-body text-nowrap table-responsive">
    <table id="ConvertTable" class="table table-bordered table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                
                  <tr >
                           <th >S.No</th>
                           <th nowrap>Inward&nbsp;DC&nbsp;No.</th>
                            <th>Date</th>
                            <th>Dc&nbsp;No.</th>
                              <th>Party&nbsp;Name</th>
                  
                             <th nowrap >Product&nbsp;Group</th>
                            <th nowrap>Product&nbsp;Name</th>
                            <th nowrap>Product&nbsp;No</th>
                             <th nowrap>Warranty&nbsp;Date</th>
                            <th nowrap>Remarks</th>
                            <th nowrap>Status</th>
                   
                    
                    </tr>
                </thead>
                 <?php 
                 $sno=1;

                 $aa=array('s.supplier'=>$partyname);
                 $aa=array_filter($aa);
                 
                 //print_r($aa);
                 
                 $i=1;
                 $rr='';
                 foreach($aa as $key => $aa1)
                 {
                   if($i<count($aa))
                   {
                      $rq='and';
                     }
                   else
                   {
                    $rq='';	
                   }
                   $rr=$rr.' '.$key."="."'".$aa[$key]."'"." ".$rq;
                 
                   
                 $i++;	
                 }
                 
                 
                   if($rr!='')
                 
                 { 
                    
                  $rr='and'.$rr;  
                    
                 }
                   else
                 
                 { 
                    
                  $rr='';  
                    
                 } 

           $sql4 = " SELECT *,s.id as id,s.date as date,a.name as name,s1.status as status FROM asset_inward s left join asset_inward1 s1 on s.id=s1.cid left join asset_master c on s1.ass_name=c.id left join asset_group j on s1.ass_grp=j.id left join partymaster a on s.supplier=a.id left join asset_assign b on s1.ass_no=b.id   where s.date between '$fromdate' and '$todate' $rr order by s1.id asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4))
                 {
                  $date=$wz1['date'];
                  $warrant=$wz1['warrant'];
                     ?>
                <tbody>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td style="text-align:left"><?php echo $wz1['rec_no']; ?></td>      
               <td nowrap><?php echo date('d/m/Y',strtotime($date)); ?></td>   
               <td><?php echo $wz1['dcno']; ?></td>        
               <td nowrap><?php echo $wz1['name']; ?></td>        
               <td nowrap><?php echo $wz1['group_name']; ?></td>        
               <td nowrap><?php echo $wz1['asset_name']; ?></td>        
               <td><?php echo $wz1['pro_no']; ?></td>          
             
               <td nowrap><?php echo date('d/m/Y',strtotime($warrant)); ?></td>      
               <td style="text-align:right" nowrap><?php echo $wz1['remark']; ?></td>      
               <td style="text-align:right" nowrap><?php echo $wz1['status']; ?></td>      
                 
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
            <div class="card-header d-flex align-items-center justify-content-between">
              
<a href="asset_inward_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-warning mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning mt-4" ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>

</div> </div>
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

        // Add the company address with left padding
      

        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
