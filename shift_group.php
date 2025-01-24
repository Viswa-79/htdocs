<?php include "config.php";include "head.php" ?>
<?php include "session.php";?>



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

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <div class="card-header d-flex align-items-center justify-content-between mb-4">
          <button class="btn btn-label-primary">Shift Group</button>
                    

</div>         
<form method="post" action="">
<div class="row">


<div class="col-xl-9 col-lg-6 col-md-6">
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
                          <th>Shift Name</th>
                          <th>Shift</th>
                          <!--<th>Break Time</th>
                          <th>Duration</th>
                           <th>Lunch time</th>
                          <th>Duration</th> -->
                        
                        <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM shift_group  order by id asc";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))
                   {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr>
                        <td align="center"><?php echo $sno;?></td>
                      
                      <td><?php echo $rows['shiftname'];?></td>

                      <td align="left"> <?php
                           $name=$rows['shift'];
                           $sname = explode(",", $name);
                           
                           foreach($sname as $element)
                           {
                            $sql1 = " SELECT * FROM shift where id='$element'";
                          $result1 =mysqli_query($conn, $sql1);
                          $rows11=mysqli_fetch_array($result1);
                           echo $rows11['shiftname'].","." ";
                           }
                           ?></td>
                      
                      <!-- <td align="center"><?php echo date ('h:i A ',strtotime($rows['break']));?></td>
                      <td align="center"><?php echo $rows['duration'];?>Mins</td>
                      <td align="center"><?php echo date ('h:i A ',strtotime($rows['lunch']));?></td>
                      <td align="center"><?php echo $rows['lunchduration'];?>Mins</td> -->
                                  
                          <td align="left">

                          <a 
                        href="shift_group_upd.php?cid=<?php echo base64_encode($rows['id']);?>" type="button"
                          id="edit" 
                         >
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="blue" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                      </a>
                        
&nbsp;
                          <a type="button" 

                     
                          id="del<?php echo $sno;?>" onclick="deldia(del<?php echo $sno;?>.id);" >
                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-trash3-fill" viewBox="0 0 16 16">
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
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>
                      </tbody>
                    </table>
                  </div>

                   
                   </div>
                 </div>
               </div>
               <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                          <form action="" method="post" autocomplete="off">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel3"><span id="form-title">Add</span> Party Details</h5>
                              
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="col-md-3">
                                <label class="form-label" hidden for="formtabs-country">ID</label>
                                <input
                          type="text"
                          class="form-select"
                          id="id"
                          hidden
                          placeholder=""
                          name="id"
                          aria-label="John Doe" />
                                </div>
                              <div class="row g-4">
                                <div class="col-md-3">
                                <label class="form-label" for="add-user-fullname">Shift Group Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="shiftname"
                          placeholder=" "
                          autofocus
                          name="shiftname"
                          aria-label="John Doe" required/>
                                </div>
                                
                                
                                <div class="col-md-6">
                                <label class="form-label"  for="add-user-fullname">Shift</label>
                      <select  id="shift"  name="shift[]" data-live-search="true" class="select2 form-select" multiple>
                                <?php 
             $sql12 = "SELECT * FROM shift order by id asc";
             $result12 = mysqli_query($conn, $sql12);
             while($rw5 = mysqli_fetch_array($result12))
              { ?>
              <option value="<?php echo $rw5['id'];?>"><?php echo $rw5['shiftname'];?>
             </option>
              <?php } ?>
                           </select>
                                </div>
                             
                             
							   </div>
                        
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                Close
                              </button>
                              <button class="btn btn-primary btn-next" onSubmit="return true" name="submit" value="submit">
                                <span class="align-middle me-sm-1">Submit</span>
                                
                              </button>
                            </div>
          </form>
                          </div>
                        </div>
                      </div>


               <div class="col-xl-3 col-lg-6 col-mb-6" >
                 <div class="card">
                   <div class="card-body" >
                     <div class="d-flex align-items-center mb-3">
                       
                       <div class="col">
                       <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span>&nbsp;Shift&nbsp;Group</h5>
                    
                    </div>

<br>


                       <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                        <div class="mb-3">
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
                </div>

                          <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Shift Group Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="shiftname"
                          placeholder=" "
                          autofocus
                          name="shiftname"
                          aria-label="John Doe" required/>
                      </div>



                      <div class="mb-3" >
                      <label class="form-label"  for="add-user-fullname">Shift</label>
                      <select  id="shift"  name="shift[]" data-live-search="true" class="select2 form-select" multiple>
                     <option value="">Select </option>
                     <?php 
             $sql12 = "SELECT * FROM shift order by id asc";
             $result12 = mysqli_query($conn, $sql12);
             while($rw5 = mysqli_fetch_array($result12))
              { ?>
              <option value="<?php echo $rw5['id'];?>"><?php echo $rw5['shiftname'];?>
             </option>
              <?php } ?>
                </select>
                      </div>

                      
                      

<button type="submit" style="margin-top:100px" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
         <button class="btn btn-label-secondary" style="margin-top:100px" data-bs-dismiss="offcanvas">Reset</button>
                           
                </div>
             
     

                
                  </div>
                </div>


                     </div>
    
                   </div>
                 </div>
               </div>
               </form>


</div>


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
 

  <?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$shiftname=$_POST['shiftname'];
$shift=implode(",",$_POST['shift']);


if($id==""){
 	
 echo $sql="INSERT into shift_group (shiftname,shift)values('$shiftname','$shift')"; 
$result1=mysqli_query($conn, $sql);


}else{
  $sql="UPDATE shift_group SET shiftname='$shiftname',shift='$shift' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);
}
if($result1) { 
 
echo "<script>alert(' Shift Group Added Successfully');window.location='shift_group.php';</script>";
 
}
else if($result2) { 
 echo "<script>alert('Shift Updated Successfully');window.location='shift_group.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}

}
?> 



<script>
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
  window.location='shift_group.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delshift_grp.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>


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
  //  document.getElementById('shift').innerHTML =r;
  
   
}

      }
    };
    xmlhttp.open("GET","ajax/getshift_grp.php?id="+user_id,true);
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

document.getElementById('day').value=diffInDays; 

}
  </script>
