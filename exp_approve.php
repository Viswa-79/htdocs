<?php include "config.php";include "head.php" ?><?php include "session.php";?>

<script src="sweetalert2@11.js"></script>  

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

          <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-4">
          <h3> <button class="btn btn-success"> Expense Claim Managment</button></h3>
          <a  href="exp_claimadd.php" class="btn btn-primary float-end btn-group" style="color:white"  ><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Apply Claim</a>

                     
                    
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
                          <th style="text-align:left">Staff Name</th>
                          <th style="text-align:center">Expense&nbsp;Type</th>
                          <th style="text-align:center">Expense&nbsp;Date</th>
                          <th style="text-align:center">Applied&nbsp;On</th>
                          <th style="text-align:center">Attachment</th>
                          <th style="text-align:center">Status</th>
                          <th style="text-align:center">Action</th>
                         
                        
                        
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                                      $clr='';
                      // LOOP TILL END OF DATA
                $sql = " SELECT *,a.id as id,a.status as status FROM  exp_claim a left join expense b on a.exp_type=b.id left join  employee c on a.staff=c.id  where  a.a_status='1' and a.g_status!='1' order by a.id desc";
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
                     <input type="text" hidden name="eid[]" id="eid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr  style="font-size:15px">
                        <td align="center"><?php echo $sno;?></td>

                        <td align="left" nowrap style="text-transform:uppercase"><?php echo $rows['name'];?></td>
                      <td align="left"><?php echo $rows['expense_name'];?></td>
                      <td nowrap style="text-align:center"><?php echo date ('d M Y ',strtotime($rows['date'])); ?> </td>
                      
                      <td align="center" nowrap><?php echo date('d M Y ',strtotime($rows['applydate']));?></td>
                  
                      <td align="center"> <?php if($rows['doc']!='') {?> <a type="button" class="btn btn-outline-success " href="uploads/<?php echo $rows['doc']; ?>" target="blank">Preview</a><?php } else {?>None<?php }?></td>
                      <td align="center"><button class="btn btn-<?php echo $clr;?> me-sm-3 me-1"   id="edit<?php echo $sno;?>" onclick="getdia(edit<?php echo $sno;?>.id);" data-bs-toggle="modal"
                          data-bs-target="#modalCenter2"><?php echo $status;?>&nbsp;&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb-fill" viewBox="0 0 16 16">
  <path d="M8.5 1.75v2.716l.047-.002c.312-.012.742-.016 1.051.046.28.056.543.18.738.288.273.152.456.385.56.642l.132-.012c.312-.024.794-.038 1.158.108.37.148.689.487.88.716q.113.137.195.248h.582a2 2 0 0 1 1.99 2.199l-.272 2.715a3.5 3.5 0 0 1-.444 1.389l-1.395 2.441A1.5 1.5 0 0 1 12.42 16H6.118a1.5 1.5 0 0 1-1.342-.83l-1.215-2.43L1.07 8.589a1.517 1.517 0 0 1 2.373-1.852L5 8.293V1.75a1.75 1.75 0 0 1 3.5 0"/>
</svg></button></td>
             
                                  
                          <td align="center">
                          <a type="button" data-bs-toggle="modal" data-bs-target="#editUser" 
                        
                        id="edit" onclick="getdia1(edit<?php echo $sno;?>.id);" 
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
     




<form method="post" action="">
              <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-medium"></small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                       
                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter2" tabindex="-1" aria-hidden="true">
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
                                    <input type="text" id="name"     name="name" class="form-control" readonly style="border:none"/>

                                  </div>
                                  <input type="text" id="id"   hidden  name="id" />
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Leave Type</label>
                                    </div>
                                  <div class="col mb-0">
                                    <input type="text" id="expense_name"  style="border:none"  readonly  name="expense_name" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Expense Date</label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="date"  style="border:none" readonly  name="date" class="form-control" />

                                  </div>
                                </div>
                               
                               
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Amount</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="amount"    style="border:none" readonly name="amount" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Remarks</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="remarks"    style="border:none" readonly name="remarks" class="form-control" />

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
                                <button type="submit" name="submit" class="btn btn-primary">sumbit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                    <div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

<div>
                    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                  <div class="modal-content p-3 p-md-2">
                    <div class="modal-body">
                    
                      <div class="text-center mb-4">
                     
                        <h3 class="mb-2"><span id="form-title"></span>&nbsp;Claim Expense</span></h3>
                        <p class="text-muted"></p>
                      </div>
                      <form id="editUserForm" method="post" action=""  enctype="multipart/form-data" class="row g-3" >
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      
                        <div class="col-12">
                          <label class="form-label" for="modalEditUserName">Staff name</label>
                          <input name="staff" id="staff"   class="form-control"  readonly   />
                          <input name="eid" id="eid"   class="form-control"    hidden />
                               
                        </div>
                        
                            <!-- / Navbar -->
   
                 
    
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserEmail">Expense Type</label>
                          <select name="exp_type" id="exp_type"  class="select form-select" required>
                          <option value="">Select</option>

                          <?php 
					$sql = "SELECT * FROM expense";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['expense_name'];?>
						 </option>
					<?php } ?>
                              </select>
                        </div>
                        
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditTaxID">Expense Date</label>
                          <input
                            type="date"
                            id="date1"
                            name="date1"
                            value="<?php echo date("Y-m-d");?>"
                            class="form-control modal-edit-tax-id"
                             />
                        </div>

                        <input
                            type="date"
                            id="applydate"
                            name="applydate"
                            value="<?php echo date("Y-m-d");?>"
                            class="form-control modal-edit-tax-id"
                            hidden
                             />
                      
                         <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserLanguage">Amount</label>
                          <input
                            type="text"
                            id="amount1"
                            name="amount1"
                          
                            class="form-control"
                           
                          required
                             />
                        </div>
                   
                      
                        <div class="col-12 col-md-6">
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
                            id="remarks1"
                            name="remarks1"
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
                          <button type="submit" name="submit1" class="btn btn-primary me-sm-3 me-1">Submit</button>
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
$status=$_POST['status'];


 $sql="UPDATE exp_claim SET status='$status' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);

 
  
  
  
  if ($result2) {
    echo '<script>
    Swal.fire({
      title: "Updated!",
      text: "Request Updated successfully.",
      icon: "success",
      confirmButtonText: "OK"
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "exp_approve.php"; // Corrected line
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
if(isset($_POST['submit1']))
{



  $id=$_POST['eid'];  
 
  $exp_type=$_POST['exp_type'];  
  $date=$_POST['date1'];  
  $amount=$_POST['amount1'];  
  $remarks=$_POST['remarks1'];  

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

 $sql="UPDATE exp_claim SET exp_type='$exp_type',date='$date',amount='$amount',remarks='$remarks',doc='$p1' WHERE id='$id'";
  $result3=mysqli_query($conn, $sql);

 
  
  
  
  if ($result3) {
    echo '<script>
    Swal.fire({
      title: "Updated!",
      text: " Updated successfully.",
      icon: "success",
      confirmButtonText: "OK"
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "exp_approve.php"; // Corrected line
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
              window.location = 'exp_approve.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/del_approve.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>


<script>
function getdia(id) {
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
   $('#id').val(data.id);  
   $('#name').val(data.name);             
   $('#expense_name').val(data.expense_name);             
   $('#date').val(data.date);             
   $('#amount').val(data.amount);             
         
   $('#remarks').val(data.remarks);             
   $('#status').val(data.status);             
}

      }
    };
    xmlhttp.open("GET","ajax/get_claim.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>


<script>
function getdia1(id) {
    //alert(id);
  document.getElementById('form-title').innerHTML='Edit';  
  var c=(id.substr(4));
  //alert(c);
  var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        
        r = xmlhttp.responseText;
      // alert(r);
        const data = JSON.parse(r);
        if(data.sts == 'ok'){
   $('#eid').val(data.id);  
   $('#staff').val(data.staff);  
   $('#exp_type').val(data.exp_type);             
   $('#date1').val(data.date);             
   $('#amount1').val(data.amount);             
              
               
   $('#remarks1').val(data.remarks);             
           
              
}

      }
    };
    xmlhttp.open("GET","ajax/getclaim.php?id="+user_id,true);
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