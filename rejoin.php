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
          <h3> <button class="btn btn-success"> Rejoin </button></h3>
                     
                    
                                  <a class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="modal" data-bs-target="#editUser" tabindex="0"  ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Apply Rejoin</a>
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
                          <th style="text-align:center">Designation</th>
                          <th  style="text-align:center">Rejoin&nbsp;On</th>
                     
                          <th  style="text-align:center">Status</th>
                         
                        
                      
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                                      $clr='';
                      // LOOP TILL END OF DATA
                     $sql = " SELECT *,a.id as id,b.status as status FROM  rejoin a left join employee b on a.staffname=b.id left join depart c on b.depart=c.id left join desi_master d on b.desig=d.id where b.status!='0' order by a.id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {


                    $status=$rows['status'];  
				
				
                    
                    if($status=='1'){
                        $status='Active';$clr='success';}
                     







                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr style="font-size:15px">
                        <td align="center"><?php echo $sno;?></td>

                        <td  style="text-transform:uppercase;"><?php echo $rows['name'];?></td>
                      <td><?php echo $rows['depname'];?></td>
                      <td><?php echo $rows['desig'];?></td>
                      <td nowrap style="text-align:center"><?php echo date ('d M Y ',strtotime($rows['date'])); ?> </td>
                      
                  
                  
                      <td align="center"><button class="btn btn-label-<?php echo $clr;?>" ><?php echo $status;?></button></td>
             
                                  
                          <!-- <td align="center">


                         
                        
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
                <td  >  <p></p></td>
                <td  >  <p></p></td>
                <td  >  <p></p></td>
                <td  >  <p>No Data Found</p></td>
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
                     
                        <h3 class="mb-2">Rejoin Application</h3>
                        <p class="text-muted">create a Rejoin request </p>
                      </div>
                      <form id="editUserForm" method="post" action=""  enctype="multipart/form-data" class="row g-3" >
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      
                        <div class="col-12">

                        
                          <label class="form-label" for="modalEditUserName">Staff name</label>
                          <select name="staffname" id="staffname"  class="select2 form-select" required>
                          <option value="">Select</option>

                          <?php 
				echo	$sql = "SELECT *,e.id as id  FROM employee e left join depart d on e.depart=d.id where e.status='2' order by e.id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>-<?php echo $rw['depname'];?>
						 </option>
					<?php } ?>
                              </select>
                               
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
                             />
                        </div>
                        
                        
                        <div class="col-12">
                          <label class="form-label" for="modalEditUserName">Reason</label>
                          <input
                            type="text"
                            id="reason"
                            name="reason"
                            class="form-control"
                            />
                        </div>
                        <div class="col-12">
                          <label class="switch">
                            <input type="checkbox" class="switch-input" />
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Notify on Email ?</span>
                          </label>
                        </div>
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
$staffname=$_POST['staffname'];

$date=$_POST['date'];

$reason=$_POST['reason'];

//$leave_remain=$monthleave-$nod;





 
				
			
    $sql="insert into rejoin (staffname,date,reason)values('$staffname','$date','$reason')"; 
$result1=mysqli_query($conn, $sql);



 $sql1="UPDATE employee SET status='1' WHERE id='$staffname'";
  $result1=mysqli_query($conn, $sql1);

if ($result1) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Rejoin Staff saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "rejoin.php"; // Corrected line
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