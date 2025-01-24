<?php include "config.php"; ?>

  <?php include "head.php"; ?>
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
            <?php 
  $fromdate=$_POST['fromdate'];
  $todate=$_POST['todate'];
  $partyname=$_POST['partyname'];
  
 ?>
           
            <div  class="container-xxl flex-grow-1 container-p-y">
              <div id="mydiv" class="card mb-4 " >
                <div style=" text-align:center;padding:15px">
           <h1 class="btn btn-warning" style="font-size:20px">Purchase Order Report</h1>
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
                  <th >po&nbsp;No.</th>
                  <th>Date</th>
                  <th >particulars</th>
                     <th>quantity</th>
                     <th>unit</th>
                     <th>rate</th>
                     <th>gst(%)</th>
                     <th>amount</th>
                    
                    </tr>
                </thead>
                 <?php 
                 $sno=1;

                 $aa=array('partyname'=>$partyname);
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

                 $sql4 = " SELECT *,s.id as idn FROM purchaseorder s left join purchaseorder1 s1 on s.id=s1.cid left join asset_master c on s1.productname=c.id where date between '$fromdate' and '$todate' $rr order by purchaseno asc";
                 $result4 = mysqli_query($conn, $sql4);
                 while($wz1 = mysqli_fetch_array($result4))
                 {
                  $date=$wz1['date'];
                     ?>
                <tbody>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td style="text-align:left"><?php echo $wz1['purchaseno']; ?></td>      
               <td nowrap><?php echo date('d/m/Y',strtotime($date)); ?></td>   
               <td><?php echo $wz1['asset_name']; ?></td>        
               <td><?php echo $wz1['quantity']; ?></td>          
               <td><?php echo $wz1['unit']; ?></td>     
               <td style="text-align:right"><?php echo $wz1['rate']; ?></td>      
               <td style="text-align:right"><?php echo $wz1['gst']; ?></td>      
               <td style="text-align:right"><?php echo $wz1['amount']; ?></td>           
             
               
                  </tr>
           
             <?php $sno++;
                 }
             ?>
            </tbody>
</table> 

                </div>
              </div>            
                  
           
            <div class="card-header d-flex align-items-center justify-content-between">
              
<a href="pur_ord_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
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

    function PrintElem(elem)
    {
		
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="tables.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>