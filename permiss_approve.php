<?php include "config.php";include "head.php" ?><?php include "session.php";?>

<script src="sweetalert2@11.js"></script>  
<script src="jquery.min.js"></script>
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
  var k1=document.getElementById('nod').value?document.getElementById('nod').value:0;
 
  

   

  var tt=(parseFloat)(r1)-(parseFloat)(k1);
  //alert(tt);
  document.getElementById('leave_remain').value=tt;
  document.getElementById('paidleave').value=k1;

   
}
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

          <div class="card-header d-flex align-items-center justify-content-between mb-4">
          <h3> <button class="btn btn-success"> Approve Permission </button></h3>
                     
                    
                                  <a class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="modal" data-bs-target="#modalCenter2" tabindex="0" onclick="addCurrency();" ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Apply Permission</a>
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
                          <th nowrap>Staff Name</th>
                          <th>Department</th>
                          <th>Date</th>
                          <th nowrap >Permission Hrs</th>
                      
                          <th>Status</th>
                          <th>Action</th>
                         
                          <!-- <th>Status</th> -->
                         
                        
                        <!-- <th >Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                                      $clr='';
                      // LOOP TILL END OF DATA
                  $sql = " SELECT *,a.id as id,a.status as status,c.name as name FROM permiss a  left join employee c on a.staff=c.id  left join depart d on c.depart=d.id where a.a_status='1' order by a.id desc";
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
                        <tr>
                        <td align="center"><?php echo $sno;?></td>

                        <td align="left" nowrap><?php echo $rows['name'];?></td>
                        <td align="left" nowrap><?php echo $rows['depname'];?></td>
                      <td nowrap><?php echo date ('d M Y ',strtotime($rows['date'])); ?> </td>
                      <td align="center" nowrap><?php echo $rows['duration1'];?>&nbsp;Hr</td>
                      
                      
                  
                      <td align="left"><button class="btn btn-<?php echo $clr;?> me-sm-3 me-1"   id="edit<?php echo $sno;?>" onclick="getdia1(edit<?php echo $sno;?>.id);" data-bs-toggle="modal"
                          data-bs-target="#modalCenter3"><?php echo $status;?>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
  <path d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716q.113.137.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0"/>
</svg></td>
             
                                  
                          <td align="center">
                          <a type="button" data-bs-toggle="modal" data-bs-target="#modalCenter2"
                        
                        id="edit" onclick="getdia(edit<?php echo $sno;?>.id);" 
                       >
                       <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                    </a>

                         
                        
&nbsp;
                          <a type="button" 

                     
                          id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                      </a>
                          
                          </td>
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
                <td >  <p></p></td> 
              
                <td  align="center">  <p>No Data Found</p></td> 
                <td >  <p></p></td> 
                <td >  <p></p></td> 
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

<form id="editUserForm" method="post" action=""  enctype="multipart/form-data" class="row g-3" >
<div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle"><span id="form-title">Apply</span>&nbsp; Permission</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                
                               
                             
<!--                                
                                <div class="col-12">
                                  <div class="col mb-0">
                                  
                                    <input
                                      type="text"
                                      id="staff_name"
                                      name="staff_name"
                                      class="form-control"
                                      placeholder=""
                                      value="<?php echo $user_id;?>"
                                      hidden
                                     />
                                  </div>

                                 

                                  </div> -->

                                  <!-- <div class="col-12 col-md-6">
                                  <div class="col mb-0">
                                  <label class="form-label" for="modalEditUserName">Department</label>
                          <select name="staffname" id="staffname"  class="select2 form-select" required>
                          <option value="">Select</option>

                          <?php 
					$sql = "SELECT *  FROM  depart  order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['depname'];?>
						 </option>
					<?php } ?>
                              </select>
                                  </div>
                                  </div> -->


                                  <div class="col-12 ">
                                  <div class="col mb-0">
                                  <label class="form-label" for="modalEditUserName">Staff name</label>
                          <select name="staff" id="staff"  class="select form-select" required  onchange="get_items1(this.value);">
                          <option value="">Select</option>

                          <?php 
					$sql = "SELECT *,e.id as id  FROM employee e left join depart d on e.depart=d.id  order by e.id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>-<?php echo $rw['depname'];?>
						 </option>
					<?php } ?>
                              </select>
                                  </div>
                                  </div>
                                  <br>
                                  



                                  


                                     <input
                                     
                                      id="id"
                                      name="id"
                                      class="form-control"
                                     hidden
                                     />



                                <div class="row ">
                                  <div class="col-md-4">
                                    <label for="emailWithTitle" class="form-label">Date</label>
                                    <input
                                      type="date"
                                      id="date"
                                      name="date"
                                      class="form-control"
                                      placeholder=""
                                     />
                                  </div>
                                
                                <div class="col-md-4">
                                 
                                    <label for="emailWithTitle" class="form-label">Permission Hrs/month</label>
                                    <input
                                      type="text"
                                      id="hrs"
                                      name="hrs"
                                      class="form-control"
                                     value="2 Hrs"
                                     readonly
                                     />
                                  </div>

                                
                                <div class="col-md-4">
                                 
                                    <label for="emailWithTitle" class="form-label">Remaining Hrs</label>
                                    <input
                                      type="text"
                                      id="remain_hrs"
                                      name="remain_hrs"
                                      class="form-control"
                                      placeholder=""
                                      readonly
                                     />
                                  </div>
                                  </div><br>
                                  <div class="row">
                                <div class="col-md-4">
                                 
                                    <label for="emailWithTitle" class="form-label">From Time</label>
                                    <input
                                      type="time"
                                      id="from_time"
                                      name="from_time"
                                      class="form-control"
                                      placeholder=""
                                      
                                     />
                                  </div>
                                <div class="col-md-4">
                                 
                                    <label for="emailWithTitle" class="form-label">To Time</label>
                                    <input
                                      type="time"
                                      id="to_time"
                                      name="to_time"
                                      class="form-control"
                                      onchange="calculateDuration();"
                                      placeholder=""
                                      
                                     />
                                  </div>
                                <div class="col-md-4">
                                 
                                    <label for="emailWithTitle" class="form-label">Duration</label>
                                    <input
                                      type="text"
                                      id="duration1"
                                      name="duration1"
                                      class="form-control"
                                      placeholder=""
                                      readonly
                                     />
                                     <input type="text" id="duration" name="duration" onchange="updateRemainingHours();" hidden class="form-control" readonly />

                                  </div>
                                 
                                  </div>
                               
                                  <br>
                                  <div class="col-12">
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">Reason</label>
                                    <input type="text" id="remarks"     name="remarks" class="form-control" />

                                  </div>
                                  </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit" class="btn btn-primary">Save </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>



             


                <form method="post" action="">
              <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter3" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Claim Details</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Staff Name</label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    <input type="text" id="staff1"   name="staff1" class="form-control" readonly style="border:none"/>

                                  </div>
                                  <input type="text" id="eid"   hidden  name="eid" />
                                </div>
                              
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label"> Date</label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="date1"  style="border:none" readonly  name="date1" class="form-control" />

                                  </div>
                                </div>
                               
                               
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Permission Hrs</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="duration11"    style="border:none" readonly name="duration11" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Remarks</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="remarks1"    style="border:none" readonly name="remarks1" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Status</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                    
                                  <select id="status" name="status" class="select form-select">
                                  <option value="Pending">select</option>
                              <option value="Approved">Approved</option>
                              <option value="Rejected">Rejected</option>
                                 </select>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit1" class="btn btn-primary">sumbit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>





                    <?php
if(isset($_POST['submit1']))
{



  $id=$_POST['eid'];  
$status=$_POST['status'];



 $sql="UPDATE permiss SET status='$status' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);

 
  
  
  
  if ($result2) {
    echo '<script>
    Swal.fire({
      title: "Updated!",
      text: "Permission Updated successfully.",
      icon: "success",
      confirmButtonText: "OK"
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "permiss_approve.php"; // Corrected line
      }
    });
  </script>';
  } 
  
  else {
    echo '<script>
            Swal.fire({
              title: "Error!",
              text: "There was an error saving the Request.",
              icon: "error",
              confirmButtonText: "OK"
            });
          </script>';
  }

}
?> 














                <?php
if(isset($_POST['submit']))
{



  $id=$_POST['id'];  
  $staff=$_POST['staff'];  
$remain_hrs=$_POST['remain_hrs'];
$from_time=$_POST['from_time'];
$to_time=$_POST['to_time'];
$duration=$_POST['duration'];
$duration1=$_POST['duration1'];
$remarks=$_POST['remarks'];
$date=$_POST['date'];

if($id==""){
 
				
			
    $sql="insert into permiss (staff,remain_hrs,from_time,to_time,duration,duration1,remarks,date,status)values('$staff','$remain_hrs','$from_time','$to_time','$duration','$duration1','$remarks','$date','Approved')"; 
$result1=mysqli_query($conn, $sql);


}else{
 echo $sql="UPDATE permiss SET staff='$staff',remain_hrs='$remain_hrs',from_time='$from_time',to_time='$to_time',duration='$duration',duration1='$duration1',remarks='$remarks',date='$date' WHERE id='$id'";
  $result3=mysqli_query($conn, $sql);
}
if($result1) { 
 
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Permission saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "permiss_approve.php"; // Corrected line
    }
  });
</script>';
 
}
else if($result3) {
    
    
  echo '<script>
  Swal.fire({
    title: "Update!",
    text: " Permission Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "permiss_approve.php"; // Corrected line
    }
  });
</script>';

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
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

document.getElementById('nod').value=diffInDays; 

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
              window.location = 'permiss_approve.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/del_permission.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
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
//alert(r);
  
						  document.getElementById('leave_remain').value = r;
					   

      }
    };
    xmlhttp.open("GET","ajax/getremain.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='';
                    $('#id').val('');  
                    $('#staff').val('');  
                
                    
                    $('#date').val('');                 
                    $('#remain_hrs').val('');  
                    $('#from_time').val('');  
                    $('#to_time').val('');  
                    $('#duration1').val('');  
                              
                    $('#remarks').val('');                 
                   
}
</script>

<script>
function getdia(staff) {
   (id);
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
   $('#staff').val(data.staff);             
   $('#date').val(data.date);             
   $('#remain_hrs').val(data.remain_hrs);             
   $('#from_time').val(data.from_time);             
   $('#to_time').val(data.to_time);             
   $('#duration1').val(data.duration1);             
   $('#remarks').val(data.remarks);             
              
               
            
           
              
}

      }
    };
    xmlhttp.open("GET","ajax/get_permiss.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>


<script>
function getdia1(id) {
   //alert(id);
   
  var c=(id.substr(4));
 // alert(c);
  var user_id=document.getElementById('id'+c).value;
  //alert(user_id);
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
       // alert(r);
        const data = JSON.parse(r);
        if(data.sts == 'ok'){
   $('#eid').val(data.id);  
   $('#staff1').val(data.staff);             
          
   $('#date1').val(data.date);             
   $('#duration11').val(data.duration1);             
         
   $('#remarks1').val(data.remarks);             
   $('#status').val(data.status);             
}

      }
    };
    xmlhttp.open("GET","ajax/get_permiss_status.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items1(value) {

//alert(value);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
						
			
              if(data.sts == 'ok'){
              //  alert('hello');
  $('#id').val(data.id);  
   $('#remain_hrs').val(data.remain_hrs);             
              
             
           
              
}		   

      }


    };
    xmlhttp.open("GET","ajax/get_remain_hrs1.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

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
//alert(from);
            if (to < from) {
                to.setDate(to.getDate() + 1); // Adjust for overnight duration
            }

            let durationInMs = to - from;
            let durationInHours = durationInMs / (1000 * 60 * 60);

            document.getElementById("duration").value = `${durationInHours.toFixed(2)} Hrs`;


            var orderqty=document.getElementById('remain_hrs').value?document.getElementById('remain_hrs').value:0;
            
    //alert('hello');
   if(parseFloat(`${durationInHours.toFixed(2)} Hrs`) > parseFloat(orderqty)){
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