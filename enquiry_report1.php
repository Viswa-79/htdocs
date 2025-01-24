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
	  alert("hello");
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
  $partyname=$_POST['partyname'];
 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">

            <!-- <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1> -->
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <h1 class="btn btn-warning" style="font-size:20px">Enquiry Report</h1>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <span style="font-size:14px" class="btn btn-outline-primary" type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp; </span>
                     <span style="font-size:14px" class="btn btn-outline-success"  type="text">To : <?php echo date('d-m-Y',strtotime($todate));?> </span>
                  </div>
                <!-- <div class="card-body text-nowrap table-responsive" style="height:400px;">
                <table  id="ConvertTable" class=" table table-bordered " style="border-collapse:collapse" border="1" width="100%">
                <thead > -->

                <div class="card-body text-nowrap table-responsive" style="height:400px;">
    <table id="ConvertTable" class="table table-bordered table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                 
                  <tr >
                  <th >S.No</th>
                  <th>enq&nbsp;no</th>
                  <th>Date</th>
					 <th>party&nbsp;Name</th>
                     <th>factory&nbsp;name</th>
                     <th>style&nbsp;No</th>
                     <th style="text-align:center">Size</th>
                     <th>Quantity</th>
                     <th>Unit</th>
                    
	</tr>
                </thead>
                 <tbody  id="myTable">
                <?php
                $sno=1;

                $aa=array('q.partyname'=>$partyname);
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
            
                
             $sql4 = " SELECT *,w.size as size,q.id as idn,m.name as names,e.name as name FROM enquiry q left join enquiry1 w on q.id=w.cid left join partymaster e on q.partyname=e.id left join assignment m on w.companyname=m.id where date between '$fromdate' and '$todate' $rr order by q.id asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $id =$wz1['idn'];
            ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td style="text-align:center"><a href="enq_upd.php?cid=<?php echo base64_encode($id);?>" target="blank" ><?php echo $wz1['enq_no']; ?></a></td>    
               <td nowrap><?php echo date('d-m-Y',strtotime($wz1['date'])); ?></td>  
               <td><div style="width:200px;"><?php echo $wz1['name']; ?></div></td>      
               <td><div style="width:250px;"><?php echo $wz1['names'];echo",&nbsp; "; echo $wz1['city']; ?></div></td>      
               <td style="text-align:center"><div ><?php echo $wz1['styleno']; ?></div></td> 
               <td style="text-align:center"><div ><?php echo $wz1['size']; ?></div></td>      
               <td style="text-align:center"><?php echo $wz1['quantity']; ?></td>          
               <td style="text-align:center"><?php echo $wz1['unit']; ?></td>          
            
               
                  </tr>
           
             <?php $sno++;
            }
             ?>
            </tbody>
            
</table> 

                </div>
              </div>            
                  
           <br>
            <div class="card-header d-flex align-items-center justify-content-between">
              
<a href="enquiry_report.php" class="btn btn-primary"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-warning" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning " ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>
        
</div> 
</div>
        
          

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
