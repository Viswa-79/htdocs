<?php include "config.php";include "head.php" ?>

  <body>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
          <button class="btn btn-primary">Holiday</button>
         

</div>         
<form method="post" action="">
<div class="row">


<div class="col-xl-8 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-0">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                         <div class="me-2 text-body h5 mb-0"><?php echo $rows['depname'];?></div>
                       </a>
                       <div class="ms-auto">
                         
                       </div>
                     </div>
                     
 
                  <div  class="card-datatable table-responsive">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <th style="text-align:center">S.no</th>
                          <th nowrap>Holiday Name</th>
                          <th nowrap>From Date</th>
                          <th nowrap>ToDate</th>
                          <th nowrap>Holiday Days</th>
                        
                        <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=5";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $write_permit = $row['write_access'];
                    

                                  $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT *FROM holiday order by id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))

                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr style="font-size:15px">
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['holiname'];?></td>
                      <td nowrap><?php echo date ('d M Y ',strtotime($rows['fdate'])); ?></td>
                      <td nowrap><?php echo date ('d M Y ',strtotime($rows['todate'])); ?></td>
                      <td align="center"><?php echo $rows['day'];?></td>
                      <?php if($user_role!=3){ ?>              
                          <td nowrap align="center">
                          <?php if($write_permit==1){ ?>
                          <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                        
                          id="edit<?php echo $sno;?>" onclick="getdia(edit<?php echo $sno;?>.id);" 
                         >
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                      </a>
                      <?php } else { ?>
                          <button disabled data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                        
                          id="edit<?php echo $sno;?>" onclick="getdia(edit<?php echo $sno;?>.id);" 
                         >
                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#474444" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                      </button>
                      <?php } ?>
                        
&nbsp;
                        <?php if($delete_permit==1){ ?>
                        &nbsp;
                          <a type="button" 

                     
                          id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                      </a>
                      <?php } else { ?>
                          <button
                        disabled
                          id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#474444" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                      </a>
                          <?php } ?>
                          </td>
                          <?php } ?>
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


               <div class="col-xl-4 col-lg-6 col-md-6">
                 <div class="card">
                   <div class="card-body">
                     <div class="d-flex align-items-center mb-3">
                       <a href="javascript:;" class="d-flex align-items-center">
                         
                        
                       </a>
                       
                       <div class="col">
                       <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span>&nbsp;Holiday</h5>
                    
                    </div>

<br>


                       <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Holiday Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="holiname"
                          placeholder=" "
                          autofocus
                         
                          name="holiname"
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
                      <label class="form-label" for="add-user-fullname">From date</label>
                        <input
                          type="date"
                          class="form-control"
                          id="fdate"
                          placeholder=" "
                          autofocus
                         
                          name="fdate"
                          aria-label="John Doe" required/>
                      </div>

                      <label class="form-label" for="add-user-fullname">To Date</label>
                        <input
                        type="date"
                          class="form-control"
                          id="todate"
                          placeholder=" "
                          autofocus
                          onchange="datediff(value);"
                          name="todate"
                          aria-label="John Doe" required/>
                          
                            
                        
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname"></label>
                        <input
                          type="text"
                          class="form-control"
                          id="day"
                          placeholder=" "
                          autofocus
                          hidden
                          name="day"
                          aria-label="John Doe" />
                      </div>






                </div>
             
  <?php if($create_permit==1){ ?>                   
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 
<?php } else { ?>
<span id="wrong_pass_alert"></span>
<button type="submit" disabled class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 
<?php } ?>

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Reset</button>
                
                  </div>
                </div>


                     </div>
    
                   </div>
                 </div>
               </div>
               </form>


</div>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$holiname=$_POST['holiname'];
$fdate=$_POST['fdate'];
$todate=$_POST['todate'];
$day=$_POST['day'];


if($id==""){
 
				
			
  $sql="insert into holiday (holiname,fdate,todate,day)values('$holiname','$fdate','$todate','$day')"; 
$result1=mysqli_query($conn, $sql);


}else{
  $sql="UPDATE holiday SET holiname='$holiname',fdate='$fdate',todate='$todate',day='$day' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if ($result1) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: " Holiday has been saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "holiday.php"; // Corrected line
    }
  });
</script>';
} 



elseif ($result2) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: "Holiday has been Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "holiday.php"; // Corrected line
    }
  });
</script>';
} 

else {
  echo '<script>
          Swal.fire({
            title: "Error!",
            text: "There was an error saving the designation.",
            icon: "error",
            confirmButtonText: "OK"
          });
        </script>';
}

}
?> 



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
  window.location='holiday.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delholiday.php?id="+user_id,true);
    xmlhttp.send();
  }
}
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
   $('#holiname').val(data.holiname);             
   $('#fdate').val(data.fdate);             
   $('#todate').val(data.todate);             
   $('#day').val(data.day);             
}

      }
    };
    xmlhttp.open("GET","ajax/getholiday.php?id="+user_id,true);
    xmlhttp.send();
  }
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

document.getElementById('day').value=diffInDays+1; 

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
              window.location = 'holiday.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/delholiday.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
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
