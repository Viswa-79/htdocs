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

   
         <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
             
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-success">GRN LIST</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                      
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="purchase_orderlist.php" class="btn btn-primary">Generate New
                             
</a>
                              
                              
                              <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  
                                </button>
                               
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                       
                                  <a class="dropdown-item" href="javascript:void(0);">  <span class="ti ti-file"></span> Report</a>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                    </div>
 
      <div class="card mt-4">
               
                  
                <div class="card-body">
                <div class="card-datatable table-responsive">
                            <table  id="myTable" class="table table-hover display">
                              <thead >
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th style="width:50px">Rec.No</th>
                                  <th nowrap>Product&nbsp;Type</th> 
                                  <th nowrap>Group</th> 
                                  <th nowrap>Product&nbsp;Name</th> 
                                  <th nowrap>Warrant&nbsp;Date</th> 
                                  <th>Qty</th> 
                                  <th nowrap>Product No</th> 
                                  <th nowrap>Department</th>
                                  <th nowrap>Designation</th>
                                  <th nowrap>Assign</th>
                                  <th nowrap>Assign Date</th>
                                  <th>Status</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1;$j=0;$pi=1;
                        $sql4 = " SELECT *,a.id as id,c.type as type,a.quantity as quantity,c.id as lp,d.id as dd,e.id as ee FROM purchaseentry1 a left join purchaseentry b on a.cid=b.id left join asset_type c on b.type=c.id left join asset_group d on a.productgrp=d.id left join asset_master e on a.productname=e.id  where e.asset_type='Asset' order by a.id asc";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                
                               $id=$rw['id'];
                               $lp=$rw['lp'];
                               $dd=$rw['dd'];
                               $ee=$rw['ee'];
                               $a=$rw['quantity'];
                               $type=$rw['type'];
                                 $group_name=$rw['group_name'];
                                 $asset_name=$rw['asset_name'];
                                 $warrant_date=$rw['warrant_date'];

                                $sql5 = " SELECT * FROM  asset_assign    where pro_type='$lp' and pro_grp='$dd' and pro_name='$ee' and pro_no!='' order by id asc";
                                 $result5 = mysqli_query($conn, $sql5);
                                 $rw2 = mysqli_fetch_array($result5);
                                $Count = mysqli_num_rows($result5);
                                  //if($Count>0)
								  {

                                  

                      
		  for($i=1;$i<=$a;$i++){ ?>
		   <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $id;?>"> 
				<td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno++; ?></div>
                </td>
				<td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno++; ?></div>
                </td>


                <td style="padding: 0.3rem;width:230p;">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_type<?php echo $i;?>"
                                    name="pro_type[]"
                                    style="text-align:left;width:230px"
                                    hidden
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $lp; ?>"
                                    aria-label="Product barcode"  readonly/>
                                    <input type="text"  class="form-control"    style="text-align:left;width:230px"  id="pro_type1<?php echo $i;?>"
                                    name="pro_type1[]"  value="<?php echo $type; ?>" readonly /> 

                                       
                </td>   
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_grp<?php echo $i;?>"
                                    name="pro_grp[]"
                                    style="text-align:left;width:200px"
                                    hidden
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $dd; ?>"
                                    aria-label="Product barcode" readonly/>
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_grp1<?php echo $i;?>"
                                    name="pro_grp1[]"
                                    style="text-align:left;width:200px"
                                    
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $group_name; ?>"
                                    aria-label="Product barcode" readonly/>
                                       
                </td>   
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_name<?php echo $i;?>"
                                    name="pro_name[]"
                                    style="text-align:left"
                                    hidden
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $ee; ?>"
                                    aria-label="Product barcode" readonly/>
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_name1<?php echo $i;?>"
                                    name="pro_name1[]"
                                    style="text-align:left"
                                    
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $asset_name; ?>"
                                    aria-label="Product barcode" readonly/>
                                       
                </td>   


                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="warrant_date<?php echo $i;?>"
                                    name="warrant_date[]"
                                    style="text-align:right"
                                    value="<?php echo $warrant_date; ?>"
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                   
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="qty<?php echo $i;?>"
                                    name="qty[]"
                                    style="text-align:right"
                                    
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="1"
                                    aria-label="Product barcode" readonly/>
                                       
                </td>            
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_no<?php echo $i;?>"
                                    name="pro_no[]"
                                    style="text-align:right"
                                    value="<?php echo $i;?>"
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                   
                                    aria-label="Product barcode" readonly/>
                                       
                </td>            
                         
                <td style="padding: 0.3rem;width:130px;">
                <select name="depart[]" id="depart<?php echo $j;?>"  class="select form-select"  onchange="get1(this.id,this.value);" >
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
                                       
                </td>   
                <td style="padding: 0.3rem;width:130px;">
                <select class="select form-select"  name="desig[]" id="desig<?php echo $j;?>" >
						  <option value="">--Select--</option>
              </select>
                                       
                </td>   
                
                <td style="padding: 0.3rem">
                <select name="assign_to[]" id="assign_to<?php echo $i;?>"  class="select form-select"   >
                                <option value="">Select</option>

                                <?php 
					$sql = "SELECT * FROM employee ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                   
                                    step="0.01"
                                    class="form-control"
                                    id="assign_date<?php echo $i;?>"
                                    name="assign_date[]"
                                   value="<?php echo date("Y-m-d");?>"
                                  
									 onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="padding: 0.3rem">

                <select name="status[]" id="status<?php echo $i;?>"  class="select form-select"   >
                                <option value="">Select</option>
                                <option value="1">GET</option>
                                <option value="2">Not GET</option>
                    </select>
                    </td>



                          
          </tr>
                        
                <?php
                $j++;
               }
    }
  }
?>  
<input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">            
                              </tbody>
                            </table>
                          </div>
                </div>
              </div>
            </div>  
            </div> 



</div>
      </div>
    </div>

     




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
                                <h5 class="modal-title" id="modalCenterTitle">Leave Details</h5>
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
                                    <input type="text" id="leavename"  style="border:none"  readonly  name="leavename" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">From Date</label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="fdate"  style="border:none" readonly  name="fdate" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">To Date</label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    <input type="text" id="todate"    style="border:none"  readonly name="todate" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">No.Of.Days</label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    <input type="text" id="nod"    style="border:none"  readonly name="nod" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Reason</label>
                                    
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
                                <button type="submit" name="submit" class="btn btn-primary">submit</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                </form>


                                          <!-- new model -->


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
                          <input name="staff" id="staff"   class="form-control"  readonly  />
                         
                               
                        </div>
                        
                            <!-- / Navbar -->
    <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserStatus">Monthly Leave</label>
                          <input
                            type="text"
                            id="monthleave"
                            name="monthleave"
                            class="form-control"
                            style="background-color:#F1EFEF "
                           
                            value="<?php echo $rw2['allowleave'];?>" readonly/>
                            
                        </div>
                        <?php
						
$sdate=date("Y-m-01");
$today=date("Y-m-d");

  
 $sql = "SELECT sum(nod) as nod from leave_req where staff='$user_id' ";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result);
  $nod=$row['nod'];
  
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
                            value="<?php echo $leave_remain;?>" readonly/>
                            
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserEmail">Leave Type</label>
                          <select name="leavetype" id="leavetype"  class="select form-select" required>
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
                        
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditTaxID">From Date</label>
                          <input
                            type="date"
                            id="fdate1"
                            name="fdate1"
                            value="<?php echo date("Y-m-d");?>"
                            class="form-control modal-edit-tax-id"
                             />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserPhone">To Date</label>
                          <div class="input-group">
                           
                            <input
                              type="date"
                              id="todate1"
                              name="todate1"
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
                              
                              id="eid"
                              name="eid"
                              hidden
                             
                              />
                         <div class="col-12 col-md-6">
                          <label class="form-label" for="modalEditUserLanguage">No.Of.Days</label>
                          <input
                            type="text"
                            id="nod1"
                            name="nod1"
                            style="background-color:#F1EFEF "
                            class="form-control"
                           
                            readonly
                             />
                        </div>
                        <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserLanguage">Paid Leave</label>
                          <input
                            type="text"
                            id="paidleave1"
                            name="paidleave1"
                            class="form-control"
                            style="background-color:#F1EFEF "
                            
                            readonly/>
                        </div>
                        <div class="col-12 col-md-3">
                          <label class="form-label" for="modalEditUserCountry">Unpaid Leave</label>
                          <input
                            type="text"
                            id="unpaidleave1"
                            name="unpaidleave1"
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


 $sql="UPDATE leave_req SET status='$status' WHERE id='$id'";
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
        window.location.href = "leave_application.php"; // Corrected line
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
  
 
  $leave_remain=$_POST['leave_remain'];
  $leavetype=$_POST['leavetype'];
  $fdate=$_POST['fdate'];
  $todate=$_POST['todate'];

  $monthleave=$_POST['monthleave'];
  
  $nod=$_POST['nod'];
  $paidleave=$_POST['paidleave'];
  $unpaidleave=$_POST['unpaidleave'];
  
  $remarks=$_POST['remarks'];
  

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

 $sql="UPDATE leave_req SET leave_remain='$leave_remain',leavetype='$leavetype',fdate='$fdate',todate='$todate',monthleave='$monthleave',nod='$nod',paidleave='$paidleave',paidleave='$unpaidleave',unpaidleave='$paidleave',remarks='$remarks', doc='$p1' WHERE id='$id'";
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
        window.location.href = "leave_application.php"; // Corrected line
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
              window.location = 'leave_application.php';
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
function getdia(id) {
   // alert(id);
   
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
   $('#leavename').val(data.leavename);             
   $('#fdate').val(data.fdate);             
   $('#todate').val(data.todate);             
   $('#nod').val(data.nod);             
   $('#remarks').val(data.remarks);             
   $('#status').val(data.status);             
}

      }
    };
    xmlhttp.open("GET","ajax/get_staffleave.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>



<script>
function getdia1(id) {
   // alert(id);
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
   $('#eid').val(data.id);  
   $('#staff').val(data.staff);  
   $('#leave_remain').val(data.leave_remain);             
   $('#leavetype').val(data.leavetype);             
   $('#fdate1').val(data.fdate);             
   $('#todate1').val(data.todate);             
   $('#monthleave').val(data.monthleave);             
   $('#nod1').val(data.nod);             
   $('#paidleave1').val(data.paidleave);             
   $('#unpaidleave1').val(data.unpaidleave);             
   $('#remarks1').val(data.remarks);             
              
               
              
           
              
}

      }
    };
    xmlhttp.open("GET","ajax/get_leave.php?id="+user_id,true);
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