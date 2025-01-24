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
 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">

            <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1>
              <div id="mydiv" class="card mb-4 ">
                <div style=" text-align:center;padding:15px">
                      <span style="font-size:26px;font-family:table-icons" class="btn btn-outline-warning">Daily Attendance Report (Detailed Report)</span>
                     </div>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                     <span style="font-size:14px" class="btn btn-outline-primary" type="text">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp; </span>
                     <span style="font-size:14px" class="btn btn-outline-success"  type="text">To : <?php echo date('d-m-Y',strtotime($todate));?> </span>
                  </div>
                <div class="card-body text-nowrap table-responsive">
                <table  class=" table table-bordered " style="border-collapse:collapse" border="1" >
                <thead >
                 
                         <tr >
                         <th >S.No</th>
                         <th>Date</th>
                         <th >emp&nbsp;No.</th>
					               <th>emp&nbsp;Name</th>
                         <th>shift</th>
                         <th>S.in&nbsp;time</th>
                         <th>S.out&nbsp;time</th>
                         <th>A.in&nbsp;time</th>
                         <th>A.out&nbsp;time</th>
                         <th>work&nbsp;dur</th>
                         <th>ot</th>
                         <th>tot&nbsp;dur</th>
                         <th>late&nbsp;by</th>
                         <th>early&nbsp;going&nbsp;by</th>
                         <th>status</th>
                         <th>punch&nbsp;records</th>
                    
	</tr>
                </thead>
                 <tbody  id="myTable">
                <?php
                $sno=1;
                
             $sql4 = "SELECT * FROM attendance group by empid,date order by id asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $empname= $wz1['empname'];
              $date=$wz1['date'];
              $emp=$wz1['empid'];
              
              $sql11 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='IN' order by id asc";
              $result11 = mysqli_query($conn, $sql11);
              while($wz = mysqli_fetch_array($result11)){
               $intime[]=$date.' '.$wz['time'];}
               
              $sql11 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='OUT' order by id asc";
              $result11 = mysqli_query($conn, $sql11);
              while($wz = mysqli_fetch_array($result11)){
               $outtime[]=$date.' '.$wz['time'];
              }
               $timein = strtotime(current($intime));
               $timeout = strtotime(end($outtime));

               if($intime!='' && $outtime!=''){
               
                $hours1=round(abs($timeout - $timein) / 3600);
               }
               else{
                $hours1=0;
               }
            
            ?>
                    <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td nowrap><?php echo  date('d-m-Y',strtotime($date)); ?></td>      
               <td><?php echo $emp;?></td>      
               <td><?php echo $wz1['empname']; ?></td>      
               <td><?php echo $wz1['shiftname']; ?></td>     
               <td><?php echo current($intime); ?></td>      
               <td><?php echo end($outtime); ?></td>      
               <td><?php echo $hours1; ?></td>      
               <td><?php echo $wz1['2hrs']; ?></td>          
               <td><?php echo $wz1['12hrs']; ?></td>          
               <td><?php echo $wz1['present']; ?></td>          
               <td><?php echo $wz1['']; ?></td>
               <td><?php echo $wz1['']; ?></td>
               <td><?php echo $wz1['']; ?></td>
               <td><?php echo $wz1['']; ?></td>
            
               
                  </tr>
           
             <?php $sno++;
            }
             ?>
            </tbody>
            
</table> 

                </div>
              </div>            
                  
           
            
            <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="detail_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
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
