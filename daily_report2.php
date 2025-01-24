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
                  <th>in&nbsp;time</th>
                  <th>out&nbsp;time</th>
                  <th>work&nbsp;dur</th>
                  <th>ot</th>
                  <th>tot&nbsp;dur</th>
                  <th>status</th>
                  <th>remarks</th>
                    
	</tr>
                </thead>
                 <tbody  id="myTable">
                <?php
                $intime=array();
                $outtime=array();
                $sno=1;
                
             $sql4 = "SELECT * FROM attendance group by empid,date order by id asc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $empname= $wz1['empname'];
            $date=$wz1['date'];
              $emp=$wz1['empid'];
              
              $sql25 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='IN' order by id asc";
              $result25 = mysqli_query($conn, $sql25);
              $count1=mysqli_num_rows($result25);
              while($wz = mysqli_fetch_array($result25)){
               //$intime=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz['time']));
			   }
              
              $sql5 = "SELECT min(time) as time FROM attendance where empname='$empname' and date='$date' and direction='IN' order by id asc";
              $result5 = mysqli_query($conn, $sql5);
              while($wz = mysqli_fetch_array($result5)){
               $intime=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz['time']));
			   }
              // print_r($intime);
               
             $sql26 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='OUT' order by id asc";
              $result26 = mysqli_query($conn, $sql26);
              $count2=mysqli_num_rows($result26);
              while($wz2 = mysqli_fetch_array($result26))
			  {
                //$outtime=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz2['time']));
              }

             $sql6 = "SELECT max(time) as time FROM attendance where empname='$empname' and date='$date' and direction='OUT' order by id asc";
              $result6 = mysqli_query($conn, $sql6);
              while($wz2 = mysqli_fetch_array($result6))
			  {
                $outtime=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz2['time']));
              }
			 // print_r($outtime);

              if($intime!='')
              {
               $timein = strtotime($intime);
               $timeout = strtotime($outtime);

               if($intime!='' && $outtime!=''){
               
                $hours1=round(abs($timeout - $timein) / 3600);
               }
               else{
                $hours1=0;
               }
              }
            ?>
                <tr>
               <td style="text-align:center"><?php echo $sno; ?></td>      
               <td nowrap><?php echo  date('d-m-Y',strtotime($date)); ?></td>      
               <td><?php echo $emp;?></td>      
               <td><?php echo $wz1['empname']; ?></td>      
               <td><?php echo $wz1['shiftname']; ?></td>     
               <td nowrap><?php if($count1>0){ echo $intime; } ?></td>      
               <td nowrap><?php if($count2>0){ echo $outtime; } ?></td>      
               <td><?php echo $hours1; ?></td>      
               <td><?php echo $wz1['2hrs']; ?></td>          
               <td><?php echo $wz1['12hrs']; ?></td>          
               <td><?php echo $wz1['present']; ?></td>          
               <td><?php echo $wz1['']; ?></td>
               </tr>
           
             <?php 
     
			 $sno++;
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
                  <th>in&nbsp;time</th>
                  <th>out&nbsp;time</th>
                  <th>work&nbsp;dur</th>
                  <th>ot</th>
                  <th>tot&nbsp;dur</th>
                  <th>status</th>
                  <th>remarks</th>
                  <th>in&nbsp;1</th>
                  <th>out&nbsp;1</th>
                  <th>in&nbsp;2</th>
                  <th>out&nbsp;2</th>
                  <th>in&nbsp;3</th>
                  <th>out&nbsp;3</th>
                  <th>in&nbsp;4</th>
                  <th>out&nbsp;4</th>
                  <th>in&nbsp;5</th>
                  <th>out&nbsp;5</th>
                  <th>in&nbsp;6</th>
                  <th>out&nbsp;6</th>
                  <th>in&nbsp;7</th>
                  <th>out&nbsp;7</th>
                  <th>in&nbsp;8</th>
                  <th>out&nbsp;8</th>
                  <!-- <th>in&nbsp;4</th> -->
                  <!-- <th>out&nbsp;4</th> -->
                 
                    
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
              
             echo $sql11 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='IN' order by id asc";
              $result11 = mysqli_query($conn, $sql11);
              $count1=mysqli_num_rows($result11);
              while($wz11 = mysqli_fetch_array($result11)){
              //  $intime=$wz11['time'];
               //$intime1[]=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz11['time']));
            }
            //print_r($intime);
               
              $sql111 = "SELECT min(time) as time FROM attendance where empname='$empname' and date='$date' and direction='IN' order by id asc";
              $result111 = mysqli_query($conn, $sql111);
              while($wz111 = mysqli_fetch_array($result111)){
               $intime1=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz111['time']));
            }
            
               
              $sql15 = "SELECT * FROM attendance where empname='$empname' and date='$date' and direction='OUT' order by id asc";
              $result15 = mysqli_query($conn, $sql15);
              $count2=mysqli_num_rows($result15);
              while($wz21 = mysqli_fetch_array($result15)){
              //  $outtime=$wz21['time'];
               //$outtime1[]=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz21['time']));
              }

              $sql115 = "SELECT max(time) as time FROM attendance where empname='$empname' and date='$date' and direction='OUT' order by id asc";
              $result115 = mysqli_query($conn, $sql115);
              while($wz211 = mysqli_fetch_array($result115)){
               $outtime1=date('Y-m-d',strtotime($date)).' '.date('h:i:s',strtotime($wz211['time']));
              }

              if($intime1!='')
              {
               $timein = strtotime(current($intime1));echo "<br>";
               $timeout = strtotime(end($outtime1));

               if($intime1!='' && $outtime1!=''){
               
                $hours11=round(abs($timeout - $timein) / 3600);
               }
               else{
                $hours11=0;
               }
              }
            ?>
                    <tr>
                    <td style="text-align:center"><?php echo $sno; ?></td>      
               <td nowrap><?php echo  date('d-m-Y',strtotime($date)); ?></td>      
               <td><?php echo $emp;?></td>      
               <td><?php echo $wz1['empname']; ?></td>      
               <td><?php echo $wz1['shiftname']; ?></td>     
               <td nowrap><?php if($count1>0){ echo $intime1; } ?></td>      
               <td nowrap><?php if($count2>0){ echo $outtime1; } ?></td>  
               <td><?php echo $hours11; ?></td>      
               <td><?php echo $wz1['2hrs']; ?></td>          
               <td><?php echo $wz1['12hrs']; ?></td>          
               <td><?php echo $wz1['present']; ?></td>          
               <td><?php echo ''; ?></td> 
               <!-- <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>      
               <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>      
               <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>      
               <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>      
               <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>      
               <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>      
               <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>      
               <td><?php echo $intime; ?></td>      
               <td><?php echo $outtime; ?></td>       -->
             
                  </tr>
           
             <?php $sno++;
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
