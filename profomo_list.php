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
                      <button class="btn btn-success">PROFORMA INVOICE LIST</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="profomo_grn.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
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
				
                
				<div class="row g-3" style="padding:10px;display:none;">
                
				   <div class="col-md-2">
                            <span class="ti-xs ti ti-printer me-1 btn-outline-success"></span>
                  &nbsp; EPCG Format&nbsp;
				  </div>
				<div class="col-md-2"> 
                            <span class="ti-xs ti ti-printer me-1 btn-outline-warning"></span>&nbsp; Normal Format&nbsp;
			    </div>
				<div class="col-md-2">
                            <span class="ti-xs ti ti-printer me-1 btn-outline-dark"></span>
              &nbsp; Bank Invoice&nbsp;
			  </div>
                  </div>
                  
                  
                <div class="card-body">
                  <div class="card-datatable  table-responsive">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                        <th><div align="center">S.No</div></th>
                        <th style="width:70px">Proforma&nbsp;No</th>
                        <th style="width:70px">quotation&nbsp;No</th>
                          <th>Date</th>
                          <th>Party&nbsp;name</th>
                          <th ><strong>Actions</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=19";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $read_permit = $row['read_access'];

                         $sno=1;
                         // LOOP TILL END OF DATA
                         $sql = " SELECT *,e.id as id FROM profomo e left join partymaster n on e.partyname=n.id ORDER by e.id desc";
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                          while($rows=mysqli_fetch_array($result))

                         {
                           
                           ?>
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td><div align="center"><?php echo $sno; ?></div></td>                          
                     <td style="padding-left:60px"><?php echo $rows['profomo'];?></td>                         
                     <td style="padding-left:60px"><?php echo $rows['quote'];?></td>                         
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                     
                     <td style="text-transform:uppercase"><?php echo $rows['name'];?></td>                         
                                      
                                                
                          <td nowrap>
                          <a href="profomo_print.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" class="btn btn-outline-warning" id="print<?php echo $sno;?>">
                            <span class="ti-xs ti ti-printer me-1"></span>Print
                          </a>
                          <?php if($read_permit==1){?>
                          <a href="profomo_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </a>
                          <?php } else { ?>                 
                          <button disabled 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>

                          <?php } if($delete_permit==1){ ?>                          
                            <a  href="ajax/delprofomo.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delsample(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>
                         <?php } else { ?>
                            <button disabled
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delsample(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>
                         <?php } ?>
                          </td>
                         
						
					
                        </tr>
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr><td colspan="7" align="center">  <p>No Data Found</p></td> </tr>
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
function delsample(id) {

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
  window.location='profomo_list.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delprofomo.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>