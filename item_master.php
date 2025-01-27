<?php include "config.php"; ?>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template">
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
              <div class="card">
               <div 
                      class="card-header sticky-element bg-label-success d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" >ITEM LIST</h5>
                      <div class="action-btns">
                      
                      
                      <button
                        type="button"
                        class="btn btn-icon btn-warning"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Print">
                        <span class="ti ti-printer"></span>
                      </button>
                    
                      &nbsp;  <button type="button" 
                class="btn btn-icon btn-secondary"
                data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="PDF">
                  <span class="ti ti-file"></span>
                   </button>
               &nbsp;   <button class="btn btn-secondary add-new btn-primary" tabindex="0" onclick="additem();" aria-controls="DataTables_Table_0"
                 type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span>
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                <span class="d-none d-sm-inline-block">Add New Items</span></span></button>
                      </div>
                    </div>
                  
                <div class="card-body">
                  <div class="card-datatable table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th style="text-align:center">s.no</th>
                    
                          <th>item code</th>
                          <th>item description</th>
                          <th>print</th>
                         
                          <th style="padding-left:80px">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                                      $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM item_master";
                  $result =mysqli_query($conn, $sql);
                  while($rows=mysqli_fetch_array($result))
                  {
                  ?>
                     <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <tr>
                        <td align="center"><?php echo $sno;?></td>
                      
                      
                      <td><?php echo $rows['code'];?></td>
                      <td><?php echo $rows['descr'];?></td>
                      <td><?php echo $rows['print'];?></td>
                      
                                              
                          <td>
                          <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"
                          class="btn btn-outline-primary"
                          id="edit<?php echo $sno;?>" onclick="getitem(edit<?php echo $sno;?>.id);" 
                         >
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>

                          <button type="button" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" onclick="delitem(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                          </button>
                          
                          </td>
                        </tr>
                        <?php
$sno++;
    }
?>
                      </tbody>
                    </table>
                  </div>
</div>
                <!-- Offcanvas to add new user -->
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasAddUser"
                  aria-labelledby="offcanvasAddUserLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasAddUserLabel" class="offcanvas-title"><span id="form-title">Add</span> Item</h5>
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
                      </div>
                  <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Item Code&nbsp;<span style="color:red;">*</span></label>
                        <input
                          type="text"
                          class="form-control"
                          id="code"
                          placeholder=" "
                          name="code"
                          aria-label="John Doe" required/>
                      </div>

                    
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Item Description</label>
                        <input
                          type="text"
                          class="form-control"
                          id="descr"
                          
                          name="descr"
                          aria-label="John Doe" />
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Label/Handtag</Label></label>
                        <input
                          type="text"
                          class="form-control"
                          id="label"
                          
                          name="label"
                          aria-label="John Doe" />
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Print&nbsp;<span style="color:red;">*</span></label>
                      <select name="print"  id="print" class="select form-select" required>
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM product_print order by product_print asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['product_print'];?>"><?php echo $rw['product_print'];?></option>
                    <?php } ?>
                                
                              </select>
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Quality</label>
                      <select name="quality" id="quality" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM gsm order by gsm asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['gsm'];?>"><?php echo $rw['gsm'];?></option>
                    <?php } ?>
                                
                              </select>
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Cloth Width</label>
                        <input
                          type="number"
                          class="form-control"
                          id="clwidth"
                          
                          name="clwidth"
                          aria-label="John Doe" />
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Size</label>
                      <select name="size"  id="size" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM size order by size asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['size'];?>"><?php echo $rw['size'];?></option>
                    <?php } ?>
                                
                              </select>
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Unit</label>
                      <select name="unit"  id="unit" class="select form-select" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM unit_master order by unit asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option value="<?php echo $rw['unit'];?>"><?php echo $rw['unit'];?></option>
                    <?php } ?>
                                
                              </select>
                      </div>
                      <div class="mb-3">
                      <label class="form-label" for="add-user-fullname">Packing Method</label>
                        <input
                          type="text"
                          class="form-control"
                          id="pack"
                          
                          name="pack"
                          aria-label="John Doe" />
                      </div>
                     
                      
<span id="wrong_pass_alert"></span>
<button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
id="create" onclick="wrong_pass_alert()" name="submit">Submit</button> 

  
         <button class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
          
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

    <?php include "footer.php" ?>
  </body>
</html>

<?php
if(isset($_POST['submit']))
{
  $id=$_POST['id'];    
$code=$_POST['code'];
$descr=$_POST['descr'];
$label=$_POST['label'];
$print=$_POST['print'];
$quality=$_POST['quality'];
$clwidth=$_POST['clwidth'];
$size=$_POST['size'];
$unit=$_POST['unit'];
$pack=$_POST['pack'];

if($id==""){
 $sql="insert into item_master (code,descr,label,print,quality,clwidth,size,unit,pack) values('$code','$descr','$label','$print','$quality','$clwidth','$size','$unit','$pack')"; 
$result1=mysqli_query($conn, $sql);
}else{
  $sql2="UPDATE item_master SET code='$code',descr='$descr',label='$label',print='$print',quality='$quality',clwidth='$clwidth',size='$size',unit='$unit',pack='$pack'  WHERE id='$id'";
  $result2=mysqli_query($conn, $sql2);
}
if($result1) { 
 
  echo "<script>alert('Item added successfully');window.location='item_master.php';</script>";
 
}
else if($result2) { 
 echo "<script>alert('Item Updated Successfully');window.location='item_master.php';</script>";

}
else{
echo '<script>alert("Something Wrong, data not stored")</script>';
}

}
?>  

<script>
function getitem(id) {
  document.getElementById('form-title').innerHTML='Edit';
  var c=(id.substr(4));
				var user_id=document.getElementById('id'+c).value;
  if (id != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                    $('#id').val(data.id);  
                    $('#code').val(data.code);
                    $('#descr').val(data.descr);
                    $('#label').val(data.label);
                    $('#print').val(data.print);
                    $('#quality').val(data.quality);
                    $('#clwidth').val(data.clwidth);
                    $('#size').val(data.size);
                    $('#unit').val(data.unit);
                    $('#pack').val(data.pack);
}

      }
    };
    xmlhttp.open("GET","ajax/getitem.php?id="+user_id,true);
    xmlhttp.send();
  }
}
</script>   

<script>
function additem() {
  document.getElementById('form-title').innerHTML='Add';
                    $('#id').val('');  
                    $('#code').val('');
                    $('#descr').val('');
                    $('#label').val('');
                    $('#print').val('');
                    $('#quality').val('');
                    $('#clwidth').val('');
                    $('#size').val('');
                    $('#unit').val('');
                    $('#pack').val('');
};
</script>

</script>

<script>
function delitem(id) {

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
  window.location='item_master.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delitem.php?id="+user_id,true);
    xmlhttp.send();
  }
}
}
</script>