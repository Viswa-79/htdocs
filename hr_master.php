<?php include "config.php";include "head.php";include "session.php";?>

  <body>
 
  <script src="sweetalert2@11.js"></script>  
  <script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(6));

d=c-1;
e=parseInt(c)+1;



document.getElementById('s1'+e).style.display='table-row';




}

</script>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php"; ?>
        <?php  ?>
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
         
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-outline-primary waves-effect">HR Master</button>
                              <a type="button" href="onboard.php" class="btn btn-success waves-effect"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
  <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
</svg>&nbsp;&nbsp;Onboard</a>
                            </div>
                         
                     
                    
                                  <a class="btn btn-primary float-end btn-group" style="color:white"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="addCurrency();" ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add New</a>
</div>         
   <!-- Teams Cards -->
   <div class=" row g-4">
               
             
              
               
   <?php
                                      $sno=1;$i=1;
                      // LOOP TILL END OF DATA
                   $sql = " SELECT *,h.id as id FROM hr_master h left join depart d on h.depname=d.id left join desi_master m on h.desiname=m.id order by h.id asc ";
                  $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                 
                         if($count>0)
                         {
                          while($rows=mysqli_fetch_array($result))

                         {
                         
                  ?>
                     <input type="text" hidden name="id[]" id="did<?php echo $sno; ?>" value="<?php  echo $rows['id'];?>">
              
             
               <div class="col-xl-4 col-lg-6 col-md-6">
                 <div class="card">
                   <div style="padding: 10px;" class="card-body ">
                     <div class="d-flex align-items-center mb-3">
                       <a  class="d-flex align-items-center">
                         
                         <div class="me-2 text-body h6 mb-0"><?php echo $rows['depname'];?> :&nbsp;<?php echo $rows['desig'];?></div>
                       </a>
                       <div class="ms-auto">
                         <ul class="list-inline mb-0 d-flex align-items-center">
                         
                           <li class="list-inline-item">
                             <div class="dropdown">
                               <button
                                 type="button"
                                 class="btn dropdown-toggle hide-arrow p-0"
                                 data-bs-toggle="dropdown"
                                 aria-expanded="false">
                                 <i class="ti ti-dots-vertical text-muted"></i>
                               </button>
                               <ul class="dropdown-menu dropdown-menu-end">
                                 
                                 <li><a class="dropdown-item"  id="edit<?php echo $sno;?>" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" tabindex="0" onclick="getCurr(this.id,this.value);" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>&nbsp;&nbsp;Edit</a></li>
                                 <li>
                                   <hr class="dropdown-divider" />
                                 </li>
                                 <li>
                                  
                                 <a type="button" 
                          class="dropdown-item"
                          id="del<?php echo $sno;?>" onclick="delCurr(this.id,this.value);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>

                                  

                                 </li>
                               </ul>
                             </div>
                           </li>
                         </ul>
                       </div>
                     </div>
                     <?php
                     $sql2 = "SELECT * FROM details_entry where cid= '".$rows['id']."' ";
$result2 = mysqli_query($conn,$sql2);
$count1=mysqli_num_rows($result2);

?>

                     <div class="row gx-0 gap-2 mt-4 ">
                            <div style="background-color:#E1E1E1;border-radius:5px" class="col p-2 card-box rounded-5px">
                                <h5 class="mb-0 fw-semibold"> N.O.S : <?php echo $rows['nop'];?></h5>
                                <h6 class="mb-0 fw-semibold mt-2"><b>Created</b>&nbsp;:&nbsp;<?php echo  date('d M Y ',strtotime($rows['create_at']));?></h6>
                                <h6 class="mb-0 fw-semibold mt-2"><b>Interview</b>&nbsp;:&nbsp;<?php echo  date('d M Y ',strtotime($rows['inter_date']));?></h6>
                            </div>
                          
                            <div class="d-grid gap-2 col-lg-4 mx-auto ">
                          
                            <button class="btn btn-warning btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalCenter2" tabindex="0" type="button" id="add<?php echo $sno;?>" onclick="getid(this.value); " value="<?php echo $rows['id'];?>"  >Add</button>


                            <button class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalCenter3" tabindex="0" type="button" id="add<?php echo $sno;?>" value="<?php echo $rows['id'];?>" onclick="getid1(this.value);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
  <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
  <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zM1 3a1 1 0 0 1 1-1h2v2H1zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3zm-4-2h3v2H2a1 1 0 0 1-1-1zm3-1H1V8h3zm0-3H1V5h3z"/>
</svg>&nbsp;<?php echo $count1; ?>
                          </button>


                         
                            <div style="padding:0px" class="btn-group" role="group" aria-label="Basic example">
                              <a type="button" href="candid_report1.php?id=<?php echo base64_encode($rows['id']);?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Summary Report" class="btn btn-secondary btn-sm waves-effect waves-light"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="black" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
</svg>
                         </a>
                              
                              <a style="padding:0px" href="candid_detail.php?id=<?php echo base64_encode($rows['id']);?>"  type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Detail Report" class="btn btn-secondary btn-sm waves-effect waves-light"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="black" class="bi bi-file-earmark-richtext" viewBox="0 0 16 16">
  <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
  <path d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208M6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5"/>
</svg></a>
                            </div>
                      
                            
                            
                         
                        </div>
                           
                       
                        </div>
                       
                 
                   </div>
                 </div>
               </div>

               <?php
              
              $sno++;$i++;
              
              } ?>
                        </tr>
                        <?php
                 
                      }
                    
                    
                 else{ ?>
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>







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



      <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Department</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                    </div>
                    <div class="mb-3">
                    <form action="" method="post">
                     
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
                         
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                  <div class="mb-3">
                      <label class="form-label" for="ecommerce-product-barcode">Department Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="depname" id="depname" class="select form-select"  required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM depart ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['depname'];?>
						 </option>
					<?php } ?>
                              </select>
                      </div>
             


                      <div class="mb-3">
                      <label class="form-label" for="ecommerce-product-barcode">Designation Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="desiname" id="desiname" class="select form-select"  required>
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM desi_master";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['desig'];?>
						 </option>
					<?php } ?>
                              </select>
                      </div>

                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname" >No.of.Staff</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nop"
                          placeholder="" 
                          name="nop"
                          value=""
                             aria-label="John Doe"
                          />
                    </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname" >Interview Date</label>
                        <input
                          type="date"
                          class="form-control"
                          id="inter_date"
                          placeholder="" 
                          name="inter_date"
                          value="<?php echo date("Y-m-d");?>"
                             aria-label="John Doe"
                          />
                        <input
                          type="date"
                          class="form-control"
                          id="create_at"
                          placeholder="" 
                          hidden
                          name="create_at"
                          value="<?php echo date("Y-m-d");?>"
                             aria-label="John Doe"
                          />
                    </div>

<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    
                  </div>
                </div>
                </form>
                </div>


                <form action="" method="post">
                <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Contact Details</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <input type="text" name="num" id="num"  hidden/>
                              <div class="modal-body">
                                
                              <table class="table table-border table-hover">
                            <thead class="border-bottom">
                                <tr>
                                  <th >S.No</th>
                                  <th>Name</th>
                                  <th>phno</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                  <td  style="padding: 0.3rem;"><?php echo $sno;?>
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="name<?php echo $i;?>"
                                name="name[]"
                                
                                    aria-label="Product barcode"/>
                                       
                </td>

                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="mobile<?php echo $i;?>"
                                name="mobile[]"
                                style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    onkeyup="getcustomer2(this.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>

                  </tr>

                                <?php
                              }
                              for ($i = 1, $sno = 2; $i <50; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      <td  style="padding: 0.3rem;"><?php echo $sno;?>
                </td>
                
             
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="name<?php echo $i;?>"
                                name="name[]"
                                
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="mobile<?php echo $i;?>"
                                name="mobile[]"
                                style="text-align:right"
                                    onKeyDown="ee1(this.id);"
                                    onkeyup="getcustomer2(this.value);"
                                    aria-label="Product barcode"/>
                                       
                </td>



              
                
		
                  </tr>     
<?php
                              }
                              ?>   
                                
                              </tbody>
                            

                  </table>
                    
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit2" class="btn btn-primary">Save changes</button>
                              </div>
                              <span id="gym" style="color:red;font-weight:bold"></span>    
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                            </form>





                <form action="" method="post">
                <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter3" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div id="diss">
                             
                             
                              <div class="modal-body">
                                
                            </div>
                              <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit2" class="btn btn-primary">Save changes</button>
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                            </form>



                            <form action="" method="post">
                <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Contact Details</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <input type="text" name="num" id="num" />
                              <div class="modal-body">
                                <div id="dis">
                             
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit2" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                            </form>



                   
                <?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];  
$depname=$_POST['depname'];
$desiname=$_POST['desiname'];
$nop=$_POST['nop'];
$inter_date=$_POST['inter_date'];
$create_at=$_POST['create_at'];


if($id==""){
 
				
 $sql="insert into hr_master (depname,desiname,nop,inter_date,create_at)values('$depname','$desiname','$nop','$inter_date','$create_at')"; 
$result3=mysqli_query($conn, $sql);


}else{
 echo $sql1="UPDATE hr_master SET depname='$depname',desiname='$desiname',nop='$nop',inter_date='$inter_date' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql1);
}
if ($result3) {
  echo '<script>
  Swal.fire({
    title: "Success!",
    text: " saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "hr_master.php"; // Corrected line
    }
  });
</script>';
} 



elseif ($result2) {
  echo '<script>
  Swal.fire({
    title: "Updated!",
    text: " Updated successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "hr_master.php"; // Corrected line
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


<?php
if(isset($_POST['submit2']))
{
  
$num=$_POST['num'];  

foreach($_POST['name'] as $key => $par2)
{
  $mobile=$_POST['mobile'][$key]; 
    $name = $_POST['name'][$key];
   $b0="SELECT * from details_entry  where mobile='$mobile' ";
  $bz=mysqli_query($conn,$b0);
  $cz1=mysqli_fetch_array($bz);
   $count=mysqli_num_rows($bz);
 
        
  if($count > 0)
      {
       
        
  
     
  
     $sql3 = "UPDATE details_entry SET mobile='$mobile' where id='$mobile'";
          $result = mysqli_query($conn, $sql3);
        }
   
 
		else{		
   
  
        
  
        if($_POST['mobile'][$key]!='')
        {
          if($_POST['name'][$key]!='')
          {
          $sql3 = "insert into details_entry(name,mobile,cid) VALUES ('".$_POST["name"][$key]."','".$_POST["mobile"][$key]."','$num')";
            $result4 = mysqli_query($conn, $sql3);
            
          }
         
          
        }
     }
  }
if ($result4) {
 echo '<script>
  Swal.fire({
    title: "Success!",
    text: " Details has been saved successfully.",
    icon: "success",
    confirmButtonText: "OK"
  
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "hr_master.php"; // Corrected line
    }
  });
</script>';
} 


}
?>







<script>
function getCurr(id,value) {
//  alert(id);
  document.getElementById('form-title').innerHTML='Edit';
  var c=(id.substr(4));
	// alert(c);
  var user_id=document.getElementById('did'+c).value;
  // alert(user_id);
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                    $('#id').val(data.id);  
                    $('#depname').val(data.depname);                 
                    $('#desiname').val(data.desiname);                 
                    $('#nop').val(data.nop);                 
                    $('#inter_date').val(data.inter_date);                 
                    
}

      }
    };
    xmlhttp.open("GET","ajax/gethr_master.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script> 


<script>


function dd(value) {
	//alert(value);

   
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
// location.reload();//
document.getElementById('dis').innerHTML=r;
						

      }
    };
    xmlhttp.open("GET","ajax/get_num.php?id="+value,true);
    xmlhttp.send();
 
}
</script>





<script>
function getid(id) {

$('#num').val(id);  
$('#num1').val(id);  

}
</script> 


<script>
function addCurrency() {
 // alert('hello');
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');  
                    $('#depname').val('');                 
                    $('#desiname').val('');                 
                    $('#nop').val('');                 
                    $('#inter_date').val('');                 
                   
}
</script>

</script>

<script>
function delCurr(id) {
 
  var c = id.substr(3);
  var user_id = document.getElementById('did' + c).value;
// alert(user_id);
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
              window.location = 'hr_master.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/del_hr.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>


<?php include "footer.php"; ?>
  </body>


  


  <script>


function getid1(value) {
// alert(value);

   
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
// location.reload();//
document.getElementById('diss').innerHTML=r;
						

      }
    };
    xmlhttp.open("GET","ajax/getid.php?id="+value,true);
    xmlhttp.send();
 
}
</script> 

<script>
                function getcustomer2(value1) {

               //  alert(value1);
              
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                             
                            r = xmlhttp.responseText;
					// 		var r1=r.split('???');
					// alert(r);
          //         alert(r1[0]);   
						document.getElementById('gym').innerHTML = r;
						
                  //alert(r1[1]);    
                        
						//  location.reload();
							
                        }
                    }
                    xmlhttp.open("GET", "ajax/get_contact.php?q1="+value1, true);

                    xmlhttp.send();
					
                }
            </script>