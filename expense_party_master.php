<?php include "config.php"; ?>

  <?php include "head.php";?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php";?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

         <?php include "header.php";?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Users List Table -->


              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-primary">EXPENSE&nbsp;PARTY&nbsp;LIST</button><br>
                      

                      <div class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a  tabindex="0" onclick="addParty();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="modal"
                          data-bs-target="#largeModal" class="btn btn-primary" style="color: white;"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
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
                <table id="myTable" class="table table-hover display">
                    <thead>
                      <tr>
                      <th><div align="center">S.No</div></th>   
                      <th>Party Name</th>
                       
                        <th>Status</th>
                        <th style="padding-left:80px">Action</th>
                       </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                                      
                  
                  
                                      <?php
                                      $sno=1;
            
                  $sql = " SELECT * FROM expense_party order by name asc";
					        $result =mysqli_query($conn, $sql);
                  $count=mysqli_num_rows($result);
                  if($count>0)
                  {
                   while($rows=mysqli_fetch_array($result))
 
                  {
                    
                  ?>
                  <tr>
                      
                      <td align="center"><?php echo $sno;?></td>
                      <input type"text" name="id" hidden id ="id<?php echo $sno;?>" value="<?php echo $rows['id'];?>">
                      <td nowrap><?php echo $rows['name'];?></td>
                      
                      <td><span class="badge bg-label-primary me-1">Active</span></td>
                                        
                        

                  <td nowrap>
                                          <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#largeModal"
                id="edit<?php echo $sno;?>" onclick="getParty(edit<?php echo $sno;?>.id);">
                    <span class="ti-xs ti ti-edit me-1"></span>Edit
               </button>

                  <button type="button" 
                    class="btn btn-outline-danger" 
                    id="del<?php echo $sno;?>" onclick="delParty(del<?php echo $sno;?>.id);" >
                    <span class="ti-xs ti ti-trash me-1"></span>Delete
                  </button> 
                                          </td>
                                      

                      </tr>
                      <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr>
                <td  > <p></p></td> 
                <td > <p></p></td> 
               
                <td  align="center"> <p>No Data Found</p></td> 
                <td  > <p></p></td> 
                 
                </tr>
                 <?php
                 } ?>
                    </tbody>
                                    </table>
                 
                </div>
                </div>
                </div>
                <!-- Offcanvas to add new user -->
               
              </div>
            </div>
            <!-- / Content -->

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
                               
                                
                                
                                <div class="col-md-4">
                                <label class="form-label" for="formtabs-country">Party Name&nbsp;<span style="color:red;">*</span></label>
                              <input
                              type="text"
                              class="form-control"
                              id="name"
                              placeholder="Enter Name"
                              name="name"
                              aria-label="Product barcode" required/>
                                </div>

                                <div class="col-md-4">
                                  
                                <label class="form-label" for="formtabs-country">Contact Person Name&nbsp;<span style="color:red;">*</span></label>
                      <div class="input-group">
                        
                        <span style="width: 60px;"  class="input-group-text"><select style="border: none;padding: 0px;"  id="title" class="form-control" name="title" data-allow-clear="true">
                          <option value="">Title</option>
                          <option value="Mr.">Mr.</option>
                          <option value="Ms.">Ms.</option>
                          <option value="Mrs">Mrs</option>
                         
                        </select></span>
                        <input
                          type="text"
                          class="form-control"
                          id="cpname"
                              placeholder=""
                              name="cpname"
                           />
                      </div>
                                </div>
                            
                                
                                <div class="col-md-4">
                                <label class="form-label"  for="formtabs-country">Mobile No&nbsp;</label>
                                <input
                              type="number"
                              class="form-control"
                              id="mobileno"
                              placeholder="+91 6398X XXXXX"
                              name="mobileno" />
                                </div>
                                <div class="col-md-4">
                                <label class="form-label" for="formtabs-country">Telephone No</label>
                                <input
                              type="number"
                              class="form-control"
                              id="telephone"
                              placeholder="+91 9874X XXXXX"
                              name="telephone" />
                                </div>
                             
							  
                               <div class="col-md-4">
                                  
                                  <label class="form-label" for="form-repeater-1-4">Email</label>
                                  <input class="form-control" type="email" name="email" id="email" />
                                </div> 
                      
                               
                                <div class="col-md-4">
                                <label class="form-label" for="formtabs-country">GST No</label>
                                <input
                              type="text"
                              class="form-control"
                              id="gstno"
                              name="gstno" />
                                </div>
								  <div class="col-md-4">
                                  
                                  <label class="form-label" for="form-repeater-1-4">City</label>
                                  <input
                              type="text"
                              class="form-control"
                              id="city"
                              placeholder="Enter City"
                              name="city" />
                                
                              </select>
                                </div>
                                <div class="col-md-4">
                                <label class="form-label"  for="formtabs-country">Pincode</label>
                                <input
                              type="text"
                              class="form-control"
                              id="pincode"
                              name="pincode" />
                                </div>
                               
                            
								
                               
								
								      <div class="col-md-4">
                                <label class="form-label" for="formtabs-country">State&nbsp;</label>
                                <input
                              type="text"
                              class="form-control"
                              id="state"
                              placeholder="Enter State"
                              name="state" />
                                </div>
                                
                              
                             
                              
                                  <div class="col-md-12">
                                  <label for="emailLarge" class="form-label">Address&nbsp;<span style="color:red;">*</span></label>
                                  <input type="text" id="address" name="address" class="form-control" required>
                                   </input>
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

            <!-- Footer -->
            <?php include "footer.php";?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

  
  </body>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id']; 
$party_group=$_POST['party_group'];
$name=$_POST['name'];
$title=$_POST['title'];
$cpname=$_POST['cpname'];
$mobileno=$_POST['mobileno'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];
$address=$_POST['address'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$pincode=$_POST['pincode'];
$gstno=$_POST['gstno'];
$merchant=$_POST['merchant'];

if($id==""){
  $sql="insert into expense_party (party_group,name,title,cpname,mobileno,telephone,email,address,country,state,city,pincode,gstno,merchant) 
 values('$party_group','$name','$title','$cpname','$mobileno','$telephone','$email','$address','$country','$state','$city','$pincode','$gstno','$merchant')"; 
$result1=mysqli_query($conn, $sql);
}else{
  $sql="UPDATE expense_party SET party_group='$party_group',name='$name',title='$title',cpname='$cpname',mobileno='$mobileno',telephone='$telephone',email='$email',address='$address',country='$country',state='$state',city='$city',pincode='$pincode',gstno='$gstno',merchant='$merchant' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);
}
if($result1) { 
 
  echo "<script>alert('Party Registered successfully');window.location='expense_party_master.php';</script>";
 
}
else if($result2) { 
  echo "<script>alert('Party Updated Successfully');window.location='expense_party_master.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}
}
?>  


<script>
function getParty(id) {
   // alert(id);
  document.getElementById('form-title').innerHTML='Edit';  
  
  var c=(id.substr(4));
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
                    $('#party_group').val(data.party_group);            
                    $('#name').val(data.name);
					 $('#title').val(data.title);  					
                    $('#cpname').val(data.cpname);                 
                    $('#mobileno').val(data.mobileno);                 
                    $('#telephone').val(data.telephone);                 
                    $('#email').val(data.email);                 
                    $('#address').val(data.address);                 
                    $('#country').val(data.country);                 
                    $('#state').val(data.state);                 
                    $('#city').val(data.city);                 
                    $('#pincode').val(data.pincode);                 
                    $('#gstno').val(data.gstno);  
                    $('#merchant').val(data.merchant);  
                  
}

      }
    };
    xmlhttp.open("GET","ajax/get_exp_party.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>

<script>
function addParty() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');                 
                    $('#party_group').val('');                 
                    $('#name').val('');                 
                    $('#cpname').val('');                 
                    $('#mobileno').val('');                 
                    $('#telephone').val('');                 
                    $('#email').val('');                 
                    $('#address').val('');                 
                    $('#country').val('');                 
                    $('#state').val('');                 
                    $('#city').val('');                 
                    $('#pincode').val('');                 
                    $('#gstno').val('');  
                    $('#merchant').val('');  
                    
}
</script>

<script>
function delParty(id) {

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
  window.location='expense_party_master.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delexp_Party.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>