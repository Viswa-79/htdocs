<?php include "config.php"; ?>

  <?php include "head.php"; ?>
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
          <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>   
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
          
                                <?php 
					$sql = "SELECT * FROM partymaster where party_group='Sales' and id='$sid' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    $rw = mysqli_fetch_array($result);
                    $name=$rw['name'];
					 ?>
               
             
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">GROUPS : <span style="text-transform:uppercase"><?php echo $name;?></span></button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="party_master.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
                               </a>
                              
                              
                              <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  Tools
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
                    <table id="myTable" class="table  table-hover display">
                      <thead>
                      
                        <tr>
                        <!-- <th><div align="center"><input type="checkbox" id="selectall" ></div></th>               -->
                        <th><div align="center">S.No</div></th>              
                        <th>company&nbsp;name</th>  
                        <th>mobile&nbsp;no</th>
                          <th ><strong>Options</strong></th>
                          
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                         $sql = " SELECT *,e.id as id,m.name as name,e.name as names FROM assignment e left join partymaster m on e.partyname=m.id where m.name='$name' ORDER by e.id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                         
                          
                           ?>
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <!-- <td><div align="center"><input type="checkbox"  value="<?php/* echo $sno;*/?>"></td>                                                    -->
                     
                     <td><div align="center"><?php echo $sno; ?></div></td>                                                   
                     <td nowrap style="text-transform:uppercase"><?php echo $rows['names']; ?></td>                          
                     <td nowrap><?php echo $rows['mobile']; ?></td>                          
                    
                          <td nowrap>
                           
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#largeModal"
                id="edit<?php echo $sno;?>" onclick="getParty(edit<?php echo $sno;?>.id);">
                    <span class="ti-xs ti ti-edit me-1"></span>Edit
               </button>
                          
                            <a  href="ajax/del_assign.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" data-bs-toggle="offcanvas"
                          
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delsampleenq(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>
                        
                          </td>
                        </tr>
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="6" align="center">  <p>No Data Found</p></td> </tr>
                 <?php
                 } ?>

                
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
              <br>
              <br>
              <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="party_master.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
                              <!-- <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button> -->
                            </div>     

              <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-simple modal-pricing" role="document">
                          <div class="modal-content">
                            <button type="button" style="width:150px" class="btn btn-label-primary">Party Details
             </button></h5>
                          <form action="" method="post" autocomplete="off">
                            <div class="modal-header">
                            
                              <h5 class="modal-title" id="exampleModalLabel3"><span id="form-title"></span> 
                              
                            
                            </div>
                            <table class="table table-border table-hover">
                              <thead class="border-bottom">
                                <tr>
                                <th style="width:50px">S.No</th> 
                                  <th>Name</th> 
                                  <th>email&nbsp;id</th>
                                  <th>mobile&nbsp;no</th>
                                  <th hidden>merchandiser</th> 
                                  <th>address</th> 
                                </tr>
                              </thead>
                              <tbody>
                             
                                <tr>
                                <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo "1"; ?>
                                  
              </td>
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
                <td  style="padding: 0.3rem;width:200px;">
                 <input 
                                    type="text"
                                    class="form-control"
                                    id="name<?php echo $i;?>"
                                name="name"
                               
                                    aria-label="Product barcode"
                                    style='text-transform:uppercase'/>
                                       
                </td>  
                <td style="padding: 0.3rem;width:250px;">
                 <input
                                    type="email"
                                    class="form-control"
                                    id="email<?php echo $i;?>"
                                name="email"
                              
                                    aria-label="Product barcode"/>
                                       
                </td>  
              <td style="padding: 0.3rem;width:200px;">
               <input 
                                  type="number"
                                  class="form-control"
                                  id="mobile<?php echo $i;?>"
                               
                                  name="mobile"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td hidden style="padding: 0.3rem;width:200px;">
               <input 
                                  type="text"
                                  class="form-control invisible"
                                  id="merchant<?php echo $i;?>"
                               
                                  name="merchant"
                                  
                                  aria-label="Product barcode"/>
                                     
              </td>
              <td style="padding: 0.3rem;width:450px;">
               <input 
                                  type="text"
                                  class="form-control"
                                  id="address<?php echo $i;?>"
                                  name="address"
                                  
                                  onKeyDown="ee1(this.id);"
                                  aria-label="Product barcode"/>
                                </td>
             
                                </tr>    
                                          
                              </tbody>
                            </table>
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
    
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>

  <?php
if (isset($_POST['submit'])) {
     
      $id = $_POST['id'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $merchant = $_POST['merchant'];
      $address = $_POST['address'];
    
    
    $sql1 = "UPDATE assignment SET name='$name',email='$email',mobile='$mobile',merchant='$merchant',address='$address' WHERE id='$id'";
    $result1 = mysqli_query($conn, $sql1);    

  if ($result1) {

  echo "<script>alert('Assignment Updated Successfully');</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<script>
function delsampleenq(id) {

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
  window.location='assign_list.php?cid=<?php echo base64_encode($rw['id']);?>';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/del_assign.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>


<script>
function getParty(id) {
  
  var c=(id.substr(4));
  // alert(c);
  var user_id=document.getElementById('cid'+c).value;
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
                    $('#email').val(data.email);            
                    $('#mobile').val(data.mobile);
					          $('#address').val(data.address);  					
}            
      }
    };
    xmlhttp.open("GET","ajax/get_assign.php?cid="+user_id,true);
    xmlhttp.send();
  }
}
</script>


<script>
$(document).ready(function(){
  $("#selectall").click(function() {
  // alert("hello");
$("input[type='checkbox']").prop('checked',this.checked);
});
});
</script>