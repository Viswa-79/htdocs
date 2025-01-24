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
                      <button class="btn btn-success">INSPECTION LIST</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="inspection_list.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
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
                        <th ><div align="center">S.No</div></th>
                        <th >Book&nbsp;No</th>
                        <th >Date</th>
                        <th >Party&nbsp;name</th>                       
                        <th ><strong>Generate&nbsp;Report</strong></th>
                        <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=20";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $read_permit = $row['read_access'];
                     $write_permit = $row['write_access'];
                     $delete_permit = $row['delete_access'];
                    

                         $sno=1;
                         // LOOP TILL END OF DATA
                        $sql = " SELECT *,e.id as id FROM inspection_grn e  ORDER by e.id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                           
                           ?>
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['cid'];?>">
                     <td><div align="center"><?php echo $sno; ?></div></td>                          
                     <td nowrap><?php echo $rows['dcno']; ?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                          
                     <td nowrap style="text-transform:uppercase"><?php echo $rows['clientname']; ?></td>                          
                    
                          <td nowrap>
                            <a href="inspection_draftrep.php?cid=<?php echo base64_encode($rows['cid']);?>" 
                            type="button" class="btn btn-outline-success" data-bs-toggle="tooltip"
                            data-bs-placement="bottom"  title="Draft Report" id="<?php echo $sno;?>">
                            <span class="ti-xs ti ti-files me-1"></span>Draft Report
                          </a>
                   
                            <a href="inspection_printing.php?cid=<?php echo base64_encode($rows['cid']);?>" 
                            type="button" class="btn btn-outline-info" data-bs-toggle="tooltip"
                            data-bs-placement="bottom"  title="Final Report" id="<?php echo $sno;?>">
                            <span class="ti-xs ti ti-files me-1"></span>Final Report
                          </a>
                        </td>
                        <td nowrap> 
                        <?php if($write_permit==1){ ?>
                        <a href="inspect_img.php?cid=<?php echo base64_encode($rows['cid']);?>" 
                          type="button" class="btn btn-outline-success" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-photo me-1"></span>Upload Image
                          </a>
                          <?php } else { ?>
                        <button disabled
                          type="button" class="btn btn-outline-success" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-photo me-1"></span>Upload Image
                          </button>
                          <?php } if($read_permit==1){ ?>
                            <a href="inspect_upd.php?cid=<?php echo base64_encode($rows['cid']);?>" 
                            type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </a>
                          <?php } else { ?>
                            <button disabled
                            type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>
                        <?php  } if($delete_permit==1){ ?>

                          <a  href="ajax/del_inspection.php?cid=<?php echo base64_encode($rows['cid']);?>"
                          type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delsampleenq(del<?php echo $sno;?>.id);" >
                          <span class="ti-xs ti ti-trash me-1"></span>Delete
                        </a>
                        <?php } else { ?>
                            <button disabled
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delsampleenq(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                        </button>
                         <?php } ?>
                        
                          </td>
                        </tr>
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr>
                <td>  <p></p></td> 
                <td>  <p></p></td> 
                <td>  <p></p></td> 
                <td >  <p>No Data Found</p></td> 
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

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
<?php include "footer.php"; ?>
  </body>


<script>
function delsampleenq(id) {

  var res = confirm("Are you sure to Delete?");
if (res) {
    

  var c=(id.substr(3));
  var cid=document.getElementById('cid'+c).value;
  // alert(cid);
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='inspect_list.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/del_inspection.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>