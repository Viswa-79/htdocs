<?php include "config.php"; ?>


  <?php include "head.php"; ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php include "menu.php"; ?>
        <!-- / Menu -->
        <?php
		 $sid=base64_decode($_GET['cid']);

     $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=16";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $delete_permit = $row['delete_access'];
                     $read_permit = $row['read_access'];
		 ?>
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
                      <button class="btn btn-success">QUOTATION LIST</button><br>
                        
                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                      
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="enquirylist.php" class="btn btn-primary"><span class="ti-xs ti ti-plus me-1"></span>Generate Quote
                             
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
                          <th>S.No</th>
                          <th style="text-align:left">Enq&nbsp;No</th>
                          <!-- <th>Enq&nbsp;Date</th> -->
                          <th style="text-align:center">Quote&nbsp;No</th>
                          <th>Date</th>
                          <th nowrap>party&nbsp;name</th>
                          <th style="padding-left:50px">Status</th>
                          <th nowrap style="padding-left:15px">Staff Allot</th>
                          <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                         $sql = " SELECT *,m.id as id,m.status as status FROM quote m left join partymaster n on m.partyname=n.id ORDER by m.id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))
                       
                       {
                       $sts = $rows['status'];
                       $quote = $rows['qno'];
                       $cid = $rows['id'];

                        $sql2 = "SELECT * FROM quote1 where cid='$cid' group by enqno order by id asc" ;
                                        $result2 =mysqli_query($conn, $sql2);
                                      while($rows2=mysqli_fetch_array($result2))
                            {
                             $enqno=$rows2['enqno']; 
                            //  $enq=implode(",",$enqno);
                            }

                       $sql1 = "SELECT * FROM staff_assign where quote=$quote ORDER by id desc";
                       $result1 =mysqli_query($conn, $sql1);
                       $count2=mysqli_num_rows($result1);
                        if($sts == 1)
                        {
                          $status="Appoved";
                          $clr="Success";
                        }
                        else
                        {
                          $status="Approval Pending";
                          $clr="Warning";
                        }

                        if($count2 > 0)
                        {
                          $char="Done";
                          $clr1="primary";
                        }
                        else
                        {
                          $char="Not Yet";
                          $clr1="danger";
                        }
                           ?>
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td style="text-align:center"><?php echo $sno; ?></td>                                                 
                     <td style="text-align:center"><?php echo $enqno;?></td>                          
                     <td style="text-align:center"><?php echo $rows['quote_no'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                            
                     <td nowrap style="text-transform:uppercase"><?php echo $rows['name'];?></td>                          
                     <td>
                      <span style="width:150px;" class="badge bg-label-<?php echo $clr;?> me-1"><?php echo $status;?></span>
                    </td>                
                     <td>
                      <span style="width:100px;" class="badge bg-label-<?php echo $clr1;?> me-1"><?php echo $char;?></span>
                    </td>                
                                                
                          <td nowrap>
                            <a href="quote_print.php?cid=<?php echo base64_encode($rows['id']);?>" 
                            type="button" style="width:113px" class="btn btn-outline-warning" id="edit<?php echo $sno;?>">
                              <span class="ti-xs ti ti-printer me-1"></span>Print
                            </a>
                          <?php if($read_permit==1){ ?>
                          <a href="quote_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" style="width:113px" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>View/Edit
                          </a>
                            <?php } else { ?>
                          <button disabled
                          type="button" style="width:113px" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>View/Edit
                            </button>
                          <?php } ?>

                          <?php
                          if($delete_permit==1){ ?>

                            <a href="ajax/delquote.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer" style="width:113px" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delpurchaseentry(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>
                         <?php } else { ?>
                          <button disabled
                          type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer" style="width:113px" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delpurchaseentry(del<?php echo $sno;?>.id);" >
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
               <tr><td colspan="6" align="center">  <p>No Data Found</p></td> </tr>
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
  window.location='quote_list.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delquote.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>