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
          <h3> <button class="btn btn-success"> Leave Request</button></h3>
                     
                    
                                  <a class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="modal" data-bs-target="#editUser" tabindex="0" onclick="addCurrency();" ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Apply Leave</a>
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
                          
                          <th>Leave&nbsp;Type</th>
                          <th style="text-align:center">Leave&nbsp;Date</th>
                          <th  style="text-align:center">Applied&nbsp;On</th>
                          <th  style="text-align:center">Attachment</th>
                          <th  style="text-align:center">Status</th>
                          <!-- <th  style="text-align:center">Action</th> -->
                         
                        
                      
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                                      $clr='';
                      // LOOP TILL END OF DATA
                     $sql = " SELECT *,a.id as id,a.status as status FROM  leave_req a left join leave_type b on a.leavetype=b.id left join employee c on a.staff=c.id where a.staff='$user_id' and a.u_status='1' order by a.id desc";
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
                     <!-- <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['allowleave'];?>"> -->
                        <tr style="font-size:15px">
                        <td align="center"><?php echo $sno;?></td>

                        <td nowrap style="text-transform:uppercase;"><?php echo $rows['name'];?></td>
                      <td nowrap><?php echo $rows['leavename'];?></td>
                      <td nowrap style="text-align:center"><?php echo date ('d/m/Y ',strtotime($rows['fdate'])); ?> &nbsp; to &nbsp;<?php echo date ('d/m/Y ',strtotime($rows['todate'])); ?></td>
                      
                      <td align="center"><?php echo date ('d/m/Y ',strtotime($rows['applydate']));?></td>
                  
                      <td align="center"><?php if($rows['doc']!='') {?><a type="button" class="btn btn-outline-success " href="uploads/<?php echo $rows['doc']; ?>" target="blank">Preview<?php } else {?>None<?php }?></a></td>
                      <td align="center"><button  class="btn btn-<?php echo $clr;?> me-sm-3 me-1"><?php echo $status;?></button></td>
             
                                  
                          <!-- <td align="center">

                          <?php  if($status=='Pending') { ?>
                          <a type="button"  data-bs-toggle="modal" data-bs-target="#editUser" 
                        
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
                <td >  <p></p></td> 
                <td  align="center">  <p>No Data Found</p></td> 
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
                    $rw2 = mysqli_fetch_array($result2);
                  $allowleave=$rw2['allowleave'];
					?>


                <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                  <div class="modal-content p-3 p-md-2">
                    <div class="modal-body">
                    
                      <div class="text-center mb-4">
                     
                        <h3 class="mb-2"><span id="form-title"></span>Leave Application</h3>
                        <p class="text-muted">create a leave request </p>
                      </div>
                      <form id="editUserForm" method="post" action=""  enctype="multipart/form-data" class="row g-3" >
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      
                        <div class="col-12">
                          <label class="form-label" for="modalEditUserName">Staff name</label>
                          <input name="staff" id="staff"   class="form-control"  readonly  value="<?php echo $rw2['name'];?>" />
                          <input name="staff1" id="staff1"   class="form-control"     value="<?php echo $user_id;?>" hidden />
                               
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserEmail">Leave Type</label>
                          <select name="leavetype" id="leavetype"  class="select form-select" required  onchange="get_items1(this.value);">
                          <option value="">Select</option>

                          <?php 
					$sql = "SELECT * FROM leave_type ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['leavename'];?>
						 </option>
					<?php } ?>
                              </select>
                        </div>
                        
                            <!-- / Navbar -->
    <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserStatus">Leave</label>
                          <input
                            type="text"
                            id="monthleave"
                            name="monthleave"
                            class="form-control"
                            style="background-color:#F1EFEF "
                           
                           readonly/>
                            
                        </div>
                        <?php
						
$sdate=date("Y-m-01");
$today=date("Y-m-d");

  
 $sql = "SELECT sum(nod) as nod from leave_req where staff='$user_id' ";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $nod=$row['nod'];
  $nod1=$row['allowleave'];
  
  
  if($rw2['allowleave']>$nod)
   $leave_remain=$rw2['allowleave']-$nod;
else 
	$leave_remain=0;

?>
    <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserStatus">Leave Remaining</label>
                          <input
                            type="text"
                            id="leave_remain"
                            name="leave_remain"
                            class="form-control"
                            style="background-color:#F1EFEF "
                    readonly/>
                            
                        </div>
                       
                        <div class="col-12 col-md-3" hidden>
                          <label class="form-label" for="modalEditUserCountry">Unpaid Leave</label>
                          <input
                            type="text"
                            id="uid"
                            name="uid"
                            class="form-control"
                            value="<?php echo $uid;?>"
                            readoly />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditTaxID">From Date</label>
                          <input
                            type="date"
                            id="fdate"
                            name="fdate"
                            value="<?php echo date("Y-m-d");?>"
                            class="form-control modal-edit-tax-id"
                             />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserPhone">To Date</label>
                          <div class="input-group">
                           
                            <input
                              type="date"
                              id="todate"
                              name="todate"
                              onchange="datediff(value);nn();"
                              class="form-control "
                             
                              required />

                              <input
                              type="date"
                              id="applydate"
                              name="applydate"
                              hidden
                                value="<?php echo date("Y-m-d");?>"
                              class="form-control "
                             
                              />


                          </div>
                        </div> 
                        <input
                              
                              id="id"
                              name="id"
                              hidden
                             
                              />
                         <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserLanguage">No.Of.Days</label>
                          <input
                            type="text"
                            id="nod"
                            name="nod"
                            style="background-color:#F1EFEF "
                            class="form-control"
                           
                            readonly
                             />
                        </div>
                        <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserLanguage">Paid Leave</label>
                          <input
                            type="text"
                            id="paidleave"
                            name="paidleave"
                            class="form-control"
                            style="background-color:#F1EFEF "
                            
                            readonly/>
                        </div>
                        <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserCountry">Unpaid Leave</label>
                          <input
                            type="text"
                            id="unpaidleave"
                            name="unpaidleave"
                            class="form-control"
                            style="background-color:#F1EFEF "
                            readonly />
                        </div>
                        <div class="col-12 ">
                          <label class="form-label" for="modalEditUserPhone">Upload Doc</label>
                          <div class="input-group">
                           
                            <input
                              type="file"
                              id="doc"
                              name="doc"
                              class="form-control phone-number-mask"
                              />
                              <input class="form-control " type="text" hidden name="photo1" id="photo1" value="<?php echo $rows['doc']; ?>" hidden>

                          </div>
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
                      </form>
                    </div>
                  </div>
                </div>
              </div>



             








                <?php
if(isset($_POST['submit']))
{



  $id=$_POST['id'];  
$staff=$_POST['staff1'];
$leave_remain=$_POST['leave_remain'];
$leavetype=$_POST['leavetype'];
$fdate=$_POST['fdate'];
$todate=$_POST['todate'];
$applydate=$_POST['applydate'];
$monthleave=$_POST['monthleave'];

$nod=$_POST['nod'];
$paidleave=$_POST['paidleave'];
$unpaidleave=$_POST['unpaidleave'];

$remarks=$_POST['remarks'];
$email=$_POST['email'];
//$leave_remain=$monthleave-$nod;





if($id==""){
 
  $p1 = $_FILES['doc']['name'];
  $p_tmp1 = $_FILES['doc']['tmp_name'];
  $path = "uploads/$p1";
  $move = move_uploaded_file($p_tmp1, $path);
			
   $sql="insert into leave_req (staff,leave_remain,leavetype,fdate,todate,applydate,monthleave,nod,paidleave,unpaidleave,remarks,email,doc)values('$staff','$leave_remain','$leavetype','$fdate','$todate','$applydate','$monthleave','$nod','$paidleave','$unpaidleave','$remarks','$email','$p1')"; 
$result1=mysqli_query($conn, $sql);


}else{

  if($_FILES['doc']['name']!='')
  {
  $p1 = $_FILES['doc']['name'];
  $p_tmp1 = $_FILES['doc']['tmp_name'];
  $path = "uploads/$p1";
  $move = move_uploaded_file($p_tmp1, $path);
  }
  else
  {
   $p1 = $_REQUEST['photo1'];
  }
  


 $sql="UPDATE leave_req SET leave_remain='$leave_remain',leavetype='$leavetype',fdate='$fdate',todate='$todate',monthleave='$monthleave',nod='$nod',paidleave='$paidleave',unpaidleave='$unpaidleave',remarks='$remarks',doc='$p1' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if ($result1) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Request has been saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "leave_req.php"; // Corrected line
    }
  });
</script>';
} 
else if ($result2) {
  echo '<script>
  Swal.fire({
    title: "Update!",
    text: "Request has been Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "leave_req.php"; // Corrected line
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
  //alert(id);
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
          //alert(r);
          if (data.sts == 'ok') {
            // Notify user and redirect on success
            Swal.fire('Deleted!', 'Your file has been deleted.', 'success').then(() => {
              window.location = 'leave_req.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/delleave_req.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>


<!-- <script>
function addCurrency() {
  document.getElementById('form-title').innerHTML='';
                    $('#id').val('');  
                    $('#leave_remain').val('');                 
                    $('#leavetype').val('');                 
                    $('#fdate').val('');                 
                    
                    $('#todate').val('');                 
                    // $('#monthleave').val('');                 
                    $('#nod').val('');                 
                    $('#paidleave').val('');                 
                    $('#unpaidleave').val('');                 
                    $('#remarks').val('');                 
}
</script> -->


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
   $('#leave_remain').val(data.leave_remain);             
   $('#leavetype').val(data.leavetype);             
   $('#fdate').val(data.fdate);             
   $('#todate').val(data.todate);             
   $('#monthleave').val(data.monthleave);             
   $('#nod').val(data.nod);             
   $('#paidleave').val(data.paidleave);             
   $('#unpaidleave').val(data.unpaidleave);             
   $('#remarks').val(data.remarks);             
              
               
              
           
              
}

      }
    };
    xmlhttp.open("GET","ajax/get_leave.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>


<script>
function get_items1(value) {

  var value2=document.getElementById('uid').value;
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
  //  $('#id').val(data.id);  
   $('#monthleave').val(data.monthleave);             
   $('#leave_remain').val(data.leave_remain);             
             
           
              
}		   

      }


    };
    xmlhttp.open("GET","ajax/get_leavedays.php?id="+value+"&uid="+value2,true);
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


    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/extended-ui-sweetalert2.js"></script>