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
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             
              <!-- Default -->
             
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">General Expense List</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     
                      <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="general_expense.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
</a>
                              
                              
                              <!-- <div class="btn-group" role="group">
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
                          <th>S.No</th>
                          <th>Rec&nbsp;no</th>
                          <th>Date</th>
                          <th>Supplier&nbsp;Name</th>
                        
                          <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                         $sql = " SELECT *,b.id as id FROM general_exp b left join expense_party c on b.supplier=c.id ORDER by b.id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
							 if($rows['approve']==1)
							 {
								 $status="Approved";
								 $clr="Success";
							 }
							 else
							 {
								 $status="Approval Pending";
								 $clr="Warning";
							 }
                           
                           ?>
                     <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td ><?php echo $sno; ?></td>                                                 
                     <td><?php echo $rows['rec_no'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                            
                     <td><?php echo $rows['name'];?></td>                          
                            
                                                
                          <td nowrap>
                           
                           
                          <a href="general_exp_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" style="width:113px" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>View/Edit
                          </a> 



                          <a href="expense_print.php?cid=<?php echo base64_encode($rows['id']);?>" 
                            type="button" style="width:113px" class="btn btn-outline-warning" >
                              <span class="ti-xs ti ti-printer me-1"></span>Print
                            </a>


                         
                            <button  onclick="deldia(del<?php echo $sno;?>.id);"
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"style="width:113px" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                      >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </button>
                         
                          </td>
                        </tr>
                        <?php
                  $sno++;
                      }
                    
                    }
                 else
                 { ?>
               <tr>
                <td >  <p></p></td>
                <td >  <p></p></td>
                <td align="center">  <p>No Data Found</p></td>
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

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>




<script>
function deldia(id) {
  var c = id.substr(3);
  var user_id = document.getElementById('cid' + c).value;

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
              window.location = 'general_exp_list.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/del_general_exp.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>