<?php include "config.php";include "head.php" ?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <script src="sweetalert2@11.js"></script>  

        <?php include "menu.php"; ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php"; ?>

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-0">
          <h3> <button class="btn btn-primary">Recent Devices Activites</button></h3>
          <h3> <a href="login_report.php" class="btn btn-primary"><span class="ti-xs ti ti-report me-1"></span>Report</a></h3>
                     
</div>         
 

<!-- Teams Cards -->
<div class=" row g-4">
                          
                         
                          
                 
            
            
            
                         </div>

                         




                  <div class="col-xl-12 col-lg-6 col-md-6 ">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-0">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                         <div class="me-2 text-body h5 mb-0"></div>
                       </a>
                       <div class="ms-auto">
                         
                       </div>
                     </div>
                     
 
                  <div  class="card-datatable table-responsive">
                    <table  id="myTable"  class="table table-hover display" style="text-transform:capitalize">
                      <thead>
                        <tr>
                          <th style="text-align:center;background-color:#C0C0C0;width:10px">S.no</th>
                          <th class="text-truncate" style="background-color:#FAEBD7;width:30px">User ID</th>
                            <th class="text-truncate" style="background-color:#D2B48C">User Name</th>
                             <th class="text-truncate" style="background-color:#D2B48C">Location</th> 
                             <th class="text-truncate" style="background-color:#FFF8DC;width:250px">Last login</th>
                        
                       
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                     $sql = " SELECT *,b.id as id,a.created_at as created_at,b.empid as emp,a.empid as empid FROM  login a left join employee b on a.empid=b.id order by a.id desc LIMIT 100";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                  ?>
                        <tr style="font-size:15px">
                         <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                         <input type="text" hidden name="latitude[]" id="latitude<?php echo $sno; ?>" value="<?php echo $rows['latitude'];?>">
                         <input type="text" hidden name="longitude[]" id="longitude<?php echo $sno; ?>" value="<?php echo $rows['longitude'];?>">
                        <td align="center"><?php echo $sno;?></td>
                      
                      <td><?php echo $rows['emp'];?></td>
                      <td><span style="font-color:black"><b><?php echo $rows['name'];?></b></span></td>
                      <td><a href="" class="btn btn-primary " style="font-size:15px" type="button" onclick="initMap(this.id);" id="mapLink<?php echo $sno; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
</svg>&nbsp;<b>View </b></a></td> 
                      <td nowrap><?php echo date('d-m-Y', strtotime($rows['date']));echo"&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;";echo date('h:i:s A',strtotime($rows['time']));?></td>

                         
                        </tr>
                        
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>
                      </tbody>
                    </table>
                  </div>

                   
                   </div>
                 </div>
               </div>


































                         <!--/ Teams Cards -->

 </div>  
            </div>  
        <!-- / Layout page -->
      </div>
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
<?php include "footer.php"; ?>
  </body>




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