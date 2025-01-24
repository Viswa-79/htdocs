<?php include "config.php";include "head.php" ?>
<?php include "session.php";?>

  <body>
  <script src="sweetalert2@11.js"></script>  

  
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

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-4">
          <button class="btn btn-primary">Shift Time</button>
           <?php
            $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=4";
            $result1 = mysqli_query($conn, $sq);
            $row = mysqli_fetch_array($result1);
             $create_permit = $row['create_access'];
             $delete_permit = $row['delete_access'];
             $write_permit = $row['write_access'];
                    
             if($create_permit==1){
?>
          <a class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="addCurrency();" ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add Shift</a>
          <?php } else { ?>
          <button disabled class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0"  ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add Shift</button>
                    <?php } ?>

</div>         

<div class="row">


<div class="col-xl-12 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-0">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                        
                       </a>
                       <div class="ms-auto">
                         
                       </div>
                     </div>
                     
 <div class="table-responsive  " >
                  <div  class="card-datatable ">
                    
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <th style="text-align:center">S.no</th>
                          <th nowrap>Shift Name</th>
                          <th nowrap>From Time</th>
                          <th nowrap>To Time</th>
                          <th nowrap>Grace Time</th>
                          <th nowrap>Break Time</th>
                          <th nowrap>Duration</th>
                          <th nowrap>Lunch time</th>
                          <th nowrap>Duration</th>
                          <th nowrap>2nd Break</th>
                          <th nowrap>Duration</th>
                        
                        <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT *FROM shift order by id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr style="font-size:13px">
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['shiftname'];?></td>
                      <td ><?php echo date ('h:i A ',strtotime($rows['ftime']));?></td>
                      <td><?php echo date ('h:i A ',strtotime($rows['totime']));?></td>
                      <td align="center"><?php echo date ('h:i A ',strtotime($rows['gracetime']));?></td>
                      <td align="center"><?php echo date ('h:i A ',strtotime($rows['break']));?></td>
                      <td align="center"><?php echo $rows['duration'];?>Mins</td>
                      <td align="center"><?php echo date ('h:i A ',strtotime($rows['lunch']));?></td>
                      <td align="center"><?php echo $rows['lunchduration'];?>Mins</td>
                      <td align="center"><?php echo  date ('h:i A ',strtotime($rows['break2']));?></td>
                      <td align="center"><?php echo $rows['break2_dur'];?>Mins</td>
                                  
                          <td align="center" nowrap>

                          <?php if($write_permit==1){ ?>
                          <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                        
                          id="edit<?php echo $sno;?>" onclick="getdia(edit<?php echo $sno;?>.id);" 
                         >
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                      </a>
                            <?php } else { ?>
                          <button disabled type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                        
                          id="edit<?php echo $sno;?>" 
                         >
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                      </button >
                      &nbsp;
                      <?php } ?>
                      &nbsp;
                      <?php if($delete_permit==1){ ?>
                          <a type="button" 

                     
                          id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                      </a>
                          <?php } else { ?>
                          <button disabled                     
                          id="del<?php echo $sno;?>" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                          </button>
                      <?php } ?>
                          
                          </td>
                          <?php
                           $sno++;
                         } ?>
                        </tr>
                        
                        <?php
                 
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
               </div>


            
               
               <div
                  class="offcanvas offcanvas-end "
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Shift</h5>
                    
                  </div>

                       <div class=" offcanvas-body mx-0 flex-grow-0 pt-0  h-100">
                      <div class="mb-3">
                      <form method="post" action="">
                      <label class="form-label" for="add-user-fullname">Shift Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="shiftname"
                          placeholder=" "
                          autofocus
                         
                          name="shiftname"
                          aria-label="John Doe" required/>
                      </div>

                      <label class="form-label" for="add-user-fullname" hidden>ID</label>
                        <input
                          type="text"
                          class="form-control"
                          id="id"
                          placeholder="" 
                          name="id"
                          value=""
                          hidden
                          aria-label="John Doe"
                          />


                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">From Time</label>
                        <input
                          type="time"
                          class="form-control"
                          id="ftime"
                          placeholder=" "
                          autofocus
                         
                          name="ftime"
                          aria-label="John Doe" required/>
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">To Time</label>
                        <input
                        type="time"
                          class="form-control"
                          id="totime"
                          placeholder=" "
                          autofocus
                          onchange="datediff(value);"
                          name="totime"
                          aria-label="John Doe" required/>
                </div>
                            
                        
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Grace Time</label>
                        <input
                          type="time"
                          class="form-control"
                          id="gracetime"
                          placeholder=" "
                          autofocus
                        
                          name="gracetime"
                          aria-label="John Doe" required />
                      </div>



                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Break Time</label>
                        <input
                          type="time"
                          class="form-control"
                          id="break"
                          placeholder=" "
                          autofocus
                        
                          name="break"
                          aria-label="John Doe"  required/>
                      </div>


                           
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Duration</label>
                        <input
                          type="number"
                          class="form-control"
                          id="duration"
                          placeholder=" "
                          autofocus
                        
                          name="duration"
                          aria-label="John Doe" required/>
                      </div>


                           
                           
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Lunch Time</label>
                        <input
                          type="time"
                          class="form-control"
                          id="lunch"
                          placeholder=" "
                          autofocus
                        
                          name="lunch"
                          aria-label="John Doe" required/>
                      </div>


                           
                           
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Lunch Duration</label>
                        <input
                          type="number"
                          class="form-control"
                          id="lunchduration"
                          placeholder=" "
                          autofocus
                        
                          name="lunchduration"
                          aria-label="John Doe" required />
                      </div>


                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">2nd Break Time</label>
                        <input
                          type="time"
                          class="form-control"
                          id="break2"
                          placeholder=" "
                          autofocus
                        
                          name="break2"
                          aria-label="John Doe" required/>
                      </div>

                          
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">2nd Break Duration</label>
                        <input
                          type="number"
                          class="form-control"
                          id="break2_dur"
                          placeholder=" "
                          autofocus
                        
                          name="break2_dur"
                          aria-label="John Doe" required />
                      </div>


                      <span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Reset</button>
                           
                             </form>
                </div>
             
                     

                
                  </div>
                </div>


               </div>


</div>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$shiftname=$_POST['shiftname'];
$ftime=$_POST['ftime'];
$totime=$_POST['totime'];
$gracetime=$_POST['gracetime'];
$break=$_POST['break'];
$duration=$_POST['duration'];
$lunch=$_POST['lunch'];
$lunchduration=$_POST['lunchduration'];
$break2=$_POST['break2'];
$break2_dur=$_POST['break2_dur'];


if($id==""){
 
				
			
  $sql="insert into shift (shiftname,ftime,totime,gracetime,break,duration,lunch,lunchduration,break2,break2_dur)values('$shiftname','$ftime','$totime','$gracetime','$break','$duration','$lunch','$lunchduration','$break2','$break2_dur')"; 
$result1=mysqli_query($conn, $sql);


}else{
  $sql="UPDATE shift SET shiftname='$shiftname',ftime='$ftime',totime='$totime',gracetime='$gracetime',break='$break',duration='$duration',lunch='$lunch',lunchduration='$lunchduration' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if ($result1) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: " Shift has been saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "shift.php"; // Corrected line
    }
  });
</script>';
} 



elseif ($result2) {
  echo '<script>
  Swal.fire({
    title: "Updated!",
    text: "Shift has been Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "shift.php"; // Corrected line
    }
  });
</script>';
} 

else {
  echo '<script>
          Swal.fire({
            title: "Error!",
            text: "There was an error saving the Holiday.",
            icon: "error",
            confirmButtonText: "OK"
          });
        </script>';
}

}
?> 

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
              window.location = 'shift.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/delshift.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>

<!-- <script>
function deldia(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='shift.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delshift.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script> -->


<script>
function getdia(id) {
   // alert(id);
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
 // alert(c);
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
   $('#id').val(data.id);  
   $('#shiftname').val(data.shiftname);             
   $('#ftime').val(data.ftime);             
   $('#totime').val(data.totime);             
   $('#gracetime').val(data.gracetime);             
   $('#break').val(data.break);             
   $('#duration').val(data.duration);             
   $('#lunch').val(data.lunch);             
   $('#lunchduration').val(data.lunchduration);             
   $('#break2').val(data.break2);             
   $('#break2_dur').val(data.break2_dur);             
}

      }
    };
    xmlhttp.open("GET","ajax/getshift.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='Add';
  $('#id').val('');  
   $('#shiftname').val('');             
   $('#ftime').val('');             
   $('#totime').val('');             
   $('#gracetime').val('');             
   $('#break').val('');             
   $('#duration').val('');             
   $('#lunch').val('');             
   $('#lunchduration').val('');  
   $('#break2').val('');  
   $('#break2_dur').val('');  
}
</script>



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

document.getElementById('day').value=diffInDays; 

}
  </script>










               
  


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
