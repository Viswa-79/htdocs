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

            

            <div  class="container-xxl flex-grow-1 container-p-y">

            <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1>
            
              <div id="mydiv" class="card mb-4 ">


              <?php
              $from=$_REQUEST['fromdate'];
			  $to=$_REQUEST['todate'];
			  $empid=$_REQUEST['empid'];
			  
			  ?>
                   
                  <div class="card-header d-flex align-items-center justify-content-between mb-0 mt-2">
          <h3> <button class="btn btn-label-primary">Login Report</button></h3>
          <h3> <button class="btn btn-outline-warning">From : <?php echo date('d-m-Y',strtotime($from));?>&nbsp;| &nbsp;To : <?php echo date('d-m-Y',strtotime($to));?></button></h3>
                     
</div>       
                <div class="card-body text-nowrap table-responsive">
               
                <table  class="table table-bordered" style="border-collapse:collapse;font-size:15px" border="1" >
                <thead>
                 
                         <tr >
                         <th style="text-align:center">S.No</th>
                         <!-- <th>Date</th> -->
                         <th style="text-align:center">emp&nbsp;ID.</th>
					               <th>Staff Name</th>
                     
                         <th>Loaction</th>
                         <th>Last Login</th>
                         <!-- <th>no.of&nbsp;absent</th> -->
                    
	</tr>
</thead>
<tbody  id="myTable">
<?php
				$sno=1;	




        $aa=array('a.empid'=>$empid);
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
                $sno=1;
               
            $sql = " SELECT *,b.id as id,a.created_at as created_at,b.empid as emp,a.empid as empid FROM  login a left join employee b on a.empid=b.id   where a.date between '$from' and '$to' $rr order by a.id desc ";
                $result =mysqli_query($conn, $sql);
                $count=mysqli_num_rows($result);
                
                 while($rows=mysqli_fetch_array($result))
               
                {


                  $latitude=$rows['latitude'];
                  $longitude=$rows['longitude'];
                ?>
                      <tr style="font-size:15px">
                       <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <td align="center"><?php echo $sno;?></td>
                    
                    <td><?php echo $rows['emp'];?></td>
                    <td><span style="font-color:black"><b><?php echo $rows['name'];?></b></span></td>



               <?php if($latitude!='' &&  $longitude!=''){        ?>      <td>
  <a href="http://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>" style="font-size:15px" type="button" target="_blank">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
    </svg>
    &nbsp;<b>View</b>
  </a>
</td>  <?php }else {?>
  <td><span style="font-color:black"><b>Location Not Found</span></td> <?php } ?>



                    <td nowrap><?php echo date('d-m-Y', strtotime($rows['date']));echo"&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;";echo date('h:i:s A',strtotime($rows['time']));?></td>

                       
                      </tr>
           
             <?php $sno++;
            }
        
             ?>
            
            <?php


  ?>


</tbody> 
</table> 

                </div>
              </div>            
                
            <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="login_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
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



<script>
function initMap(id) {
  var a = id;
  var c = a.substr(7);
  
  // alert(c);

  // Assuming that 'mapLink' is an ID or a class you want to select
  var mapLinkId = 'mapLink' + c; // Modify according to your actual map link ID structure
  var mapLink = document.getElementById(mapLinkId);

  if (!mapLink) {
    alert('Map link element not found!');
    return;
  }

  var latitude = document.getElementById('latitude' + c).value;
  var longitude = document.getElementById('longitude' + c).value;

 
  // alert(latitude);
  // alert(longitude);

  // Update the href attribute

  if (latitude!='' &&  longitude!='') {
  mapLink.href = "http://maps.google.com/maps?q=" + latitude + ",+" + longitude + "+(You+are+here!)&iwloc=A&hl=en";
}
else{
  alert('Location not found!'); 
  window.location.href ='lastlogin.php';
}
  // alert(mapLink.href);

  // Assuming you want to make the map link visible
  // mapLink.style.display = 'block';
}
</script>
