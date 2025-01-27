<!DOCTYPE html>
<?php include "config.php"; ?>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">
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

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

  <div class="card">
               <div 
                      class="card-header sticky-element bg-label-success d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" >ORDERS LIST</h5>
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
               &nbsp;   <a class="btn btn-primary add-new " tabindex="0" href="order_start.php"
                 type="button" >
                  <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                 Add New Order </a>
                      </div>
                    </div>
            <!-- Users List Table -->
            <div class="card">
              <div class="card-datatable table-responsive">
             
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>
                        <div align="center">S.No</div>
                      </th>

                      <th>Name</th>
                      <th>Order Number</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th style="padding-left:80px">Action</td>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">



                    <?php
                    $sno = 1;
                    // LOOP TILL END OF DATA
                    $sql = "SELECT * FROM order_details order by id desc";
                    $result = mysqli_query($conn, $sql);
                    $count=mysqli_num_rows($result);
                    if($count>0)
                         {  
                    while($rows = mysqli_fetch_array($result))
					{
					 ?>
                      <tr>
                        <!-- FETCHING DATA FROM EACH
                          ROW OF EVERY COLUMN -->
                        <td align="center">
                        <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">

                          <?php echo $sno; ?>
                        </td>
                        <td>
                          <?php echo $rows['buyer_name']; ?>
                        </td>
                        <td>
                          <?php echo $rows['form_no']; ?>
                        </td>
                        <td>
                          <?php echo $rows['entry_date']; ?>
                        </td>

                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                          <a href="order_start_update.php?cid=<?php echo base64_encode($rows['id']);?>" type="button" class="btn btn-outline-primary" id="">
                            <span class="ti-xs ti ti-edit me-1"></span>Update
                          </a>
                          <button type="button"
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delorder(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
          </button>
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
			  </div>
              

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

            <?php include "footer.php"; ?>

</body>

</html>

<script>
function delorder(id) {

  var res = confirm("Are you sure to Delete?");
  if (res) {
    
    
    var c=(id.substr(3));
   // alert(c);
  var cid=document.getElementById('cid'+c).value;
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='order.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/order_del.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>