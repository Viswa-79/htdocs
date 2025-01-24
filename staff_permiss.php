<?php include "config.php";include "head.php" ?><?php include "session.php";?>

<!-- <script src="sweetalert2@11.js"></script>  
<script src="jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <body>
    
  <script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(7));

d=c-1;
e=parseInt(c)+1;



document.getElementById('s1'+e).style.display='block';




}

</script>

<script>
function nn()
{
//alert('hello');
  var r1=document.getElementById('monthleave').value?document.getElementById('monthleave').value:0;
  var r1=document.getElementById('leave_remain').value?document.getElementById('leave_remain').value:0;
  var k1=document.getElementById('nod').value?document.getElementById('nod').value:0;
 


   
  //alert(r1);
  if((parseFloat)(r1)>(parseFloat)(k1))
  {
  var tt=(parseFloat)(r1)-(parseFloat)(k1);
   document.getElementById('paidleave').value=k1;
   document.getElementById('unpaidleave').value=0;
  }
 else
  {
	   var tt=(parseFloat)(k1)-(parseFloat)(r1);
	  document.getElementById('paidleave').value=r1;
	document.getElementById('unpaidleave').value=tt;

}

}
</script>
<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#fdate').attr('min', maxDate);
});
</script>
<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#todate').attr('min', maxDate);
});
</script>
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
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-4">
          <h3> <button class="btn btn-success">Apply Permission </button></h3>
                     
            <?php 
             $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=7";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $write_permit = $row['write_access'];

                     if($create_permit==1){ ?>       
         <a class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="modal" data-bs-target="#editUser" tabindex="0"   onclick="addCurrency();"><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Apply Permission</a>
         <?php } else { ?>
         <button class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="modal" data-bs-target="#editUser" tabindex="0"   disabled><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Apply Permission</button>
         <?php } ?>
</div>         
   <!-- Teams Cards -->
   <div class=" row g-4">
               
             
              
   <div class="col-xl-12 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-0">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                        
                       </a>
                       <div class="ms-auto">
                         
                       </div>
                     </div>
                     
 
                  <div  class="card-datatable table-responsive">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <th style="text-align:center">S.no</th>
                          <th style="text-align:center">Date</th>
                          <th nowrap>Staff Name</th>
                          
                          <th>Permission Hrs</th>
                         
                          <th  style="text-align:center">Status</th>
                          <!-- <th  style="text-align:center">Action</th> -->
                         
                        
                      
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                                      $clr='';
                      // LOOP TILL END OF DATA
                    $sql = " SELECT *,a.id as id,a.status as status,a.date as date FROM  permiss a  left join employee c on a.staff=c.id where a.staff='$user_id'  order by a.id desc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {


                    $status=$rows['status'];  
				
				
                    if($status=='Pending')
                      $clr='primary';
                    elseif($status=='Approved')
                      $clr='success';
                    elseif($status=='Rejected')
                      $clr='danger';
                           







                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr style="font-size:15px">
                        <td align="center"><?php echo $sno;?></td>

                        <td nowrap style="text-align:center"><?php echo date ('d M Y ',strtotime($rows['date'])); ?> </td>
                        <td nowrap style="text-transform:uppercase;"><?php echo $rows['name'];?></td>
                        <td nowrap ><?php echo $rows['duration1'];?>&nbsp;</td>
                   
                  
                     
                      <td align="center"><button   class="btn btn-<?php echo $clr;?> me-sm-3 me-1" ><?php echo $status;?></button></td>
             
                                  
                          <!-- <td align="center">

                          <?php  if($status=='Pending') { ?>
                          <a type="button" data-bs-toggle="modal" data-bs-target="#editUser" 
                        
                        id="edit<?php echo $sno;?>" onclick="getdia(edit<?php echo $sno;?>.id);" 
                       >
                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                    </a>
                    <?php }else{  ?>
                      &nbsp; &nbsp;  <?php } ?>
                         
                        
&nbsp;
                          <a type="button" 

                     
                          id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                      </a>
                          
                          </td> -->
                          <?php
                           $sno++;
                         } ?>
                        </tr>
                        
                        <?php
                 
                      }
                    
                   
                 else{ ?>
               <tr>
                <td >  <p></p></td> 
                <td >  <p></p></td> 
                
                <td  align="center">  <p>No Data Found</p></td> 
                <td >  <p></p></td> 
                <td >  <p></p></td> 
                
              </tr>
                 <?php
                 } ?>
                      </tbody>
                    </table>
                  </div>

                   
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



     
      <?php 
					$sql2 = "SELECT * FROM employee where id=$user_id";
                    $result2 = mysqli_query($conn, $sql2);
                    $rw2 = mysqli_fetch_array($result2)
					?>


                <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                  <div class="modal-content p-3 p-md-2">
                    <div class="modal-body">
                    
                      <div class="text-center mb-4">
                     
                        <h3 class="mb-2"><span id="form-title"></span>&nbsp;Apply Permission</span></h3>
                        <p class="text-muted"></p>
                      </div>
                      <form id="editUserForm" method="post" action=""  enctype="multipart/form-data" class="row g-3" >
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      
                        <div class="col-12">
                          <label class="form-label" for="modalEditUserName">Staff name</label>
                          <input name="staff" id="staff"   class="form-control"  readonly  value="<?php echo $rw2['name'];?>" />
                          <input name="staff1" id="staff1"   class="form-control"     value="<?php echo $user_id;?>" hidden />
                          <input name="id" id="id"   class="form-control"    hidden />
                               
                        </div>
                        
                            <!-- / Navbar -->
   
                            <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditTaxID"> Date</label>
                          <input
                            type="date"
                            id="date"
                            name="date"
                            value="<?php echo date("Y-m-d");?>"
                            class="form-control modal-edit-tax-id"
                          required
                             />
                        </div>
    
                        
                      
                         <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserLanguage">Permission Hrs/Month</label>
                          <input
                            type="text"
                            id="per"
                            name="per"
                          value="2 Hrs"
                            class="form-control"
                           
                          readonly
                             />
                        </div>

                        <?php
                    $sql3 = "SELECT COALESCE(SUM(duration),0) as total_duration FROM permiss WHERE staff=$user_id";
                    $result3 = mysqli_query($conn, $sql3);
                    $rw3 = mysqli_fetch_array($result3);
                 $total_duration = $rw3['total_duration'];
                    $remaining_hours = 2 - $total_duration;

                    $remaining_minutes = $remaining_hours * 60;
$remaining_hours_display = floor($remaining_minutes / 60);
$remaining_minutes_display = $remaining_minutes % 60;
                    ?>

                    <?php if($remaining_hours!=0){ ?>
                    <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserLanguage">Remaining Hrs</label>
                          <input
                            type="text"
                            id="remain_hrs"
                            name="remain_hrs"
                            value="<?php echo $remaining_hours_display . ' Hrs ' . $remaining_minutes_display . ' Mins'; ?>"
                            class="form-control"
                           readonly
                          
                             />
                          <input hidden
                            type="text"
                            id="remain_hrs1"
                            name="remain_hrs1"
                            value="<?php echo $total_duration; ?>"
                            class="form-control"
                         
                          
                             />
                        </div>
                         <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserLanguage">From Time</label>
                          <input
                            type="time"
                            id="from_time"
                            name="from_time"
                          
                            class="form-control"
                           
                          required
                             />
                        </div>
                         <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserLanguage">To Time</label>
                          <input
                            type="time"
                            id="to_time"
                            name="to_time"
                            onchange="calculateDuration();"
                            class="form-control"
                           
                          required
                             />
                        </div>
                         <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserLanguage">Time Duration</label>
                          <input type="text" id="duration1" name="duration1"  class="form-control" readonly />
                        <input type="text" hidden id="duration" name="duration" onchange="updateRemainingHours();"  class="form-control" readonly />
                        </div>
                   
                      
                      
                        <div class="col-12">
                          <label class="form-label" for="modalEditUserName">Remarks</label>
                          <input
                            type="text"
                            id="remarks"
                            name="remarks"
                            class="form-control"
                            />
                        </div>
                        
                        <!-- <div class="col-12">
                          <label class="switch">
                            <input type="checkbox" class="switch-input" />
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Notify on Email ?</span>
                          </label>
                        </div> -->
                        <div class="col-12 text-center">
                          <button type="submit" name="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                          <button
                            type="reset"
                            class="btn btn-label-secondary"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                            Cancel
                          </button>


                        </div>
                        <?php }else{ ?>
                          
                          <div class="col-12">
                            <center>
<h4>Your Permission Time Over For This Month</h4>
                        </center>
</div>
                        <?php } ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>



             








                <?php
if(isset($_POST['submit'])) {
  $id = $_POST['id'];
  $staff = $_POST['staff1'];
  $date = $_POST['date'];
  $remain_hrs = $_POST['remain_hrs'];
  $from_time = $_POST['from_time'];
  $to_time = $_POST['to_time'];
  $duration = $_POST['duration'];
  $duration1 = $_POST['duration1'];
  $remarks = $_POST['remarks'];

  // Insert new permission record
  $sql = "INSERT INTO permiss (staff, date, remain_hrs, from_time, to_time, duration,duration1,remarks) 
          VALUES ('$staff', '$date', '$remain_hrs', '$from_time', '$to_time','$duration','$duration1','$remarks')";
  $result1 = mysqli_query($conn, $sql);

  if ($result1) {
      echo '<script>
      Swal.fire({
          title: "Success!",
          text: "Permission Request has been saved successfully.",
          icon: "success",
          confirmButtonText: "OK"
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = "staff_permiss.php";
          }
      });
      </script>';
  } else {
      echo '<script>
      Swal.fire({
          title: "Error!",
          text: "There was an error saving the Permission.",
          icon: "error",
          confirmButtonText: "OK"
      });
      </script>';
  }
}
?> 
    
<?php include "footer.php"; ?>
  </body>


 






<script>
 function datediff(value) { 
  //  alert(id);
//alert(purchase_date)
//var c=id.substr(13);
//alert(c)
const date=document.getElementById('fdate').value?document.getElementById('fdate').value:0;
 const todate=document.getElementById('todate').value?document.getElementById('todate').value:0;
//alert(purchase_date);
//alert(warrenty_date);


const startDate  = date;
const endDate    = todate;

const diffInMs   = new Date(endDate) - new Date(startDate)
const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
// alert( diffInDays  );

document.getElementById('nod').value=diffInDays+1; 

}
  </script>



<script>
function deldia(id) {
  var c = id.substr(3);
  var user_id = document.getElementById('id' + c).value;

  // Using SweetAlert for confirmation
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result4) => {
    if (result4.isConfirmed) {
      // User confirmed deletion
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          r = xmlhttp.responseText;
          const data = JSON.parse(r);
          if (data.sts == 'ok') {
            // Notify user and redirect on success
            Swal.fire('Deleted!', 'Your file has been deleted.', 'success').then(() => {
              window.location = 'exp_claim.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/del_claim.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>

<script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='';
                    $('#id').val('');  
                 
                    
                    $('#date').val('');                 
                 
                    $('#from_time').val('');  
                    $('#to_time').val('');  
                    $('#duration1').val('');  
                              
                    $('#remarks').val('');                 
                   
}
</script>


<script>
function getdia(id) {
    //alert(id);
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
       // alert(r);
        const data = JSON.parse(r);
        if(data.sts == 'ok'){
   $('#id').val(data.id);  
   $('#exp_type').val(data.exp_type);             
   $('#date').val(data.date);             
   $('#amount').val(data.amount);             
              
               
   $('#remarks').val(data.remarks);             
           
              
}

      }
    };
    xmlhttp.open("GET","ajax/getclaim.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>














<script>
function get_items(value) {
//alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
alert(r);
  
						  document.getElementById('leave_remain').value = r;
					   

      }
    };
    xmlhttp.open("GET","ajax/getremain.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>


<!-- <script>
        function calculateDuration() {
            // Get the input values
            const fromTime = document.getElementById('from_time').value;
            const toTime = document.getElementById('to_time').value;

            // Ensure both times are set
            if (!fromTime || !toTime) {
                document.getElementById('duration').value = '';
                document.getElementById('remain_hrs').value = '';
                return;
            }

            // Parse the input values into Date objects
            const fromDate = new Date(`1970-01-01T${fromTime}:00`);
            const toDate = new Date(`1970-01-01T${toTime}:00`);

            // Calculate the duration in milliseconds
            let duration = toDate - fromDate;

            // Adjust for crossing midnight
            if (duration < 0) {
                duration += 24 * 60 * 60 * 1000; // Add one day in milliseconds
            }

            // Convert the duration to hours and minutes
            const totalHours = Math.floor(duration / (1000 * 60 * 60));
            const totalMinutes = Math.floor((duration % (1000 * 60 * 60)) / (1000 * 60));

            // Display the total duration
            document.getElementById('duration').value = `${totalHours}Hrs ${totalMinutes}mins`;

            // Calculate the remaining time: 2 hours - duration
            const twoHoursInMinutes = 2 * 60;
            const totalDurationInMinutes = totalHours * 60 + totalMinutes;
            let remainingMinutes = twoHoursInMinutes - totalDurationInMinutes;

            // Convert remaining minutes back to hours and minutes
            let remainingHours = Math.floor(remainingMinutes / 60);
            remainingMinutes = remainingMinutes % 60;

            // If the result is negative, set it to 0
            if (remainingHours < 0) {
                remainingHours = 0;
                remainingMinutes = 0;
            }

            // Display the remaining time
            document.getElementById('remain_hrs').value = `${remainingHours}Hrs ${remainingMinutes}mins`;
        }
    </script> -->

    <script>
    function prepareForm() {
        document.getElementById("editUserForm").reset();
        document.getElementById("form-title").innerText = "Apply";
        document.getElementById("id").value = "";
    }

    document.getElementById("from_time").addEventListener("change", calculateDuration);
    document.getElementById("to_time").addEventListener("change", calculateDuration);

    function calculateDuration() {
        let fromTime = document.getElementById("from_time").value;
        let toTime = document.getElementById("to_time").value;

        if (fromTime && toTime) {
            let from = new Date(`1970-01-01T${fromTime}:00`);
            let to = new Date(`1970-01-01T${toTime}:00`);

            if (to < from) {
                to.setDate(to.getDate() + 1); // Adjust for overnight duration
            }

            let durationInMs = to - from;
            let durationInHours = durationInMs / (1000 * 60 * 60);

            document.getElementById("duration").value = `${durationInHours.toFixed(2)} Hrs`;


            var orderqty=document.getElementById('remain_hrs1').value?document.getElementById('remain_hrs1').value:0;
            var a= parseFloat(orderqty) + parseFloat(durationInHours.toFixed(2))
    // alert(orderqty);
    // alert(durationInHours.toFixed(2));
   if(a > 2){
      alert("your Permission Time Allow Within Remaining Time.");

      document.getElementById('to_time').value='';
      document.getElementById('duration1').value='';
    }
else{
            
            let durationInMinutes = durationInMs / (1000 * 60);
            let durationHours = Math.floor(durationInMinutes / 60);
            let minutes = Math.round(durationInMinutes % 60);

            document.getElementById("duration1").value = `${durationHours} Hrs ${minutes} Mins`;
}


//            var remaining_minutes = durationInHours * 60;
//           // alert(remaining_minutes);
//  var remaining_hours_display =remaining_minutes / 60;
//  //alert(remaining_hours_display);
// var remaining_minutes_display = remaining_minutes % 60;

// var k =remaining_hours_display+ "Hrs"+remaining_minutes_display+"Mins";
//             document.getElementById("duration").value = k;

//  alert(k)  ;    
 }
    }
</script>


    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/extended-ui-sweetalert2.js"></script>

    <script>
  function get_checkqty(value){

    // alert(c);
    var orderqty=document.getElementById('remain_hrs').value?document.getElementById('remain_hrs').value:0;
    var duration=document.getElementById('duration').value?document.getElementById('duration').value:0;
    //alert('hello');
   if(parseFloat(duration) > parseFloat(orderqty)){
      alert("Quantity Exceeded Order Quantity.");

      document.getElementById('to_time').value='';
      document.getElementById('to_time').value='';
    }
  }
  </script>