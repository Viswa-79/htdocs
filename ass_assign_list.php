<?php include "config.php"; ?>


  <?php include "head.php"; ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php"; ?>
        <!-- / Menu -->
        <script src="sweetalert2@11.js"></script>  

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php"; ?>

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
             
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">Asset Assign List</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                      
                     <div >



                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> <a
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-secondary"
                             href="damage_ass_list.php"
                                  aria-haspopup="true"
                                  aria-expanded="false">Damage list
                                  
</a>&nbsp;&nbsp;
                              <a type="button"  href="ass.php"  class="btn btn-primary"><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>Add Assign 
                             
</a>
                              
                              
                              <!-- <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  
                                </button>
                               
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                       
                                 
                                </div>
                              </div> -->
                            </div>
                          </div>
                    </div>
                    </div>
 
      <div class="card mt-4">
               
                  
                <div class="card-body">
                  <div class="card-datatable table-responsive">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                        
                        <th >S.No</th>
                                  <th >Rec.No</th>
                                  <th >Supplier</th>
                                  <th nowrap>Product&nbsp;Type</th> 
                                  <th nowrap>Group</th> 
                                  <th nowrap>Product&nbsp;Name</th> 
                                  <th nowrap>Warrant&nbsp;Date</th> 
                             
                                  <th nowrap>Product No</th> 
                                  <th nowrap>Department</th>
                                  <th nowrap>Designation</th>
                                  <th nowrap>Assign</th>
                                  <th nowrap>Assign Date</th>
                                  <th nowrap>Action</th>
                                  <!-- <th nowrap>Assign Date</th> -->
                                  <!-- <th nowrap>Action</th> -->
                                 
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                        $sql = " SELECT *,a.id as id,c.type as type,l.desig as desig,n.name as nn,m.name as name  FROM asset_assign a left join asset_type c on a.pro_type=c.id left join asset_group d on a.pro_grp=d.id left join asset_master e on a.pro_name=e.id left join depart k on a.depart=k.id left join desi_master l on a.desig=l.id left join employee m on a.assign_to=m.id
                        left join purchaseentry1 p1 on a.pid=p1.id left join purchaseentry p on p.id=p1.cid left join partymaster n on p.supplier=n.id where a.ass_status!='2' order by a.id asc";
                         $result = mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                           
                           ?>
                           <tr style="Font-size:14px">
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td ><?php echo $sno; ?></td>                                                 
                     <td><?php echo $rows['rec_no'];?></td>                          
                     <td nowrap style="text-align:left"><?php echo $rows['nn'];?></td>                          
                     <td nowrap><?php echo $rows['type'];?></td>                          
                     <td nowrap><?php echo $rows['group_name'];?></td>                          
                     <td nowrap><?php echo $rows['asset_name'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['warrant_date'])); ?></td>                            
                     <td><?php echo $rows['pro_no'];?></td>                          
                     <td nowrap style="font-size:12px"><?php echo $rows['depname'];?></td>                          
                     <td nowrap><?php echo $rows['desig'];?></td>                          
                     <td nowrap><?php echo $rows['name'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['assign_date'])); ?></td>                         
                                      
                                            
                          <td nowrap>
                        <!--        <a href="pur_entry_print.php?cid=<?php echo base64_encode($rows['id']);?>" 
                            type="button" style="width:113px" class="btn btn-outline-warning" id="edit<?php echo $sno;?>">
                              <span class="ti-xs ti ti-printer me-1"></span>Print
                            </a> -->
                          
                        <button 
                          type="button" style="width:113px" class="btn btn-outline-primary" id="edit<?php echo $sno;?>"  onclick="getdia(edit<?php echo $sno;?>.id);" data-bs-toggle="modal"
                          data-bs-target="#modalCenter2">
                            <span class="ti-xs ti ti-edit me-1"></span>View/Edit
                         </button>

                           <!--     <a  href="ajax/delpurchaseentry.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"style="width:113px" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delpurchaseentry(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>  -->
                          </td>
                        </tr>
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr>
                <td  >  <p></p></td> 
                <td  >  <p></p></td> 
                <td  >  <p></p></td> 
                <td  >  <p></p></td> 
                <td  >  <p></p></td> 
                <td  >  <p></p></td> 
                <td  align="center">  <p>No Data Found</p></td> 
                <td >  <p></p></td> 
                <td >  <p></p></td> 
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
        <!-- / Layout page -->
      </div>
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

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
                                <h5 class="modal-title" id="modalCenterTitle">Assign Details</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Rec.no</label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    <input type="text" id="rec_no"     name="rec_no" class="form-control" readonly style="border:none"/>

                                  </div>
                                  <input type="text" id="id"   hidden  name="id" />
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Product Group</label>
                                    </div>
                                  <div class="col mb-0">
                                    <input type="text" id="pro_grp"  style="border:none"  readonly  name="pro_grp" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Product Name </label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="pro_name"  style="border:none" readonly  name="pro_name" class="form-control" />

                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Product No </label>
                                   
                                  </div>
                                  <div class="col mb-0">
                                    
                                    <input type="text" id="pro_no"  style="border:none" readonly  name="pro_no" class="form-control" />

                                  </div>
                                </div>
                               
                               
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Department</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                    
                                  <select name="depart" id="depart"  class="select form-select"  onchange="get1(this.id,this.value);" >
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
                                
                                </div>
                                <br>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Designation</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                    
                                  <select class="select form-select"  name="desig" id="desig" >
						  <option value="">--Select--</option>
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
                                </div>
                                <br>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Assign To</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                  <select name="assign_to" id="assign_to" class="select form-select"   >
                                <option value="">Select</option>

                                <?php 
					$sql = "SELECT * FROM employee";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                              </select>

                                  </div>
                                </div><br>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Status</label>
                                    
                                  </div>
                                  <div class="col mb-0">
                                  <select name="ass_status" id="ass_status" class="select form-select"   >
                                <option value="">Select</option>
                                <option value="2">Damage</option>
                                <option value="1">Normal</option>

                                
					
                              </select>

                                  </div>
                                </div>
                                <br>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
$depart=$_POST['depart'];
$desig=$_POST['desig'];
$assign_to=$_POST['assign_to'];
$ass_status=$_POST['ass_status'];


 $sql="UPDATE asset_assign SET depart='$depart',desig='$desig',assign_to='$assign_to',ass_status='$ass_status' WHERE id='$id'";
  $result2=mysqli_query($conn, $sql);

 
  
  
  
  if ($result2) {
    echo '<script>
    Swal.fire({
      title: "Updated!",
      text: " Updated successfully.",
      icon: "success",
      confirmButtonText: "OK"
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "ass_assign_list.php"; // Corrected line
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












      
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>


<script>
function delpurchaseentry(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
  var cid=document.getElementById('cid'+c).value;
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='purchaseentrylist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delpurchaseentry.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>
<script>
function getdia(id) {
  //  alert(id);
   
  var c=(id.substr(4));
 // alert(c);
  var user_id=document.getElementById('cid'+c).value;
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
   $('#rec_no').val(data.rec_no);  
   $('#pro_grp').val(data.pro_grp);             
   $('#pro_name').val(data.pro_name);             
   $('#pro_no').val(data.pro_no);             
   $('#depart').val(data.depart);             
         
   $('#desig').val(data.desig);             
   $('#assign_to').val(data.assign_to);             
        
}

      }
    };
    xmlhttp.open("GET","ajax/get_asset_assign.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get1(id,value) {
// alert(value);
var c=(id.substr(6));
// alert(c);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);

						  document.getElementById('desig'+c).innerHTML = r;
					   

      }
    };
    xmlhttp.open("GET","ajax/getdesignation.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>