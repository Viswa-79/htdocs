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
                      <button class="btn btn-success">INSPECTOR ASSIGNMENT LIST</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="staff_assignment_list.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
</a>
                              
                              
                              <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-secondary dropdown-toggle"
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
                        <th style="width:50px"><div align="center">S.No</div></th>
                        <th align="center" style="width:0px">Book&nbsp;No</th>
                        <th align="center" style="width:70px">Enq&nbsp;No</th>
                        <th align="center" style="width:70px">Quote&nbsp;No</th>
                        <th>Staff Assign Date</th>
                        <th>Party&nbsp;name</th>                       
                          <th ><strong>Options</strong></th>
                          <th  style="text-align:center">Exp&nbsp;Amount</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=17";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $delete_permit = $row['delete_access'];
                     $read_permit = $row['read_access'];

                         $sno=1;
                         // LOOP TILL END OF DATA
                          $sql = " SELECT *,e.id as id FROM staff_assign e  left join partymaster m on e.partyname=m.id ORDER by e.id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                          $quote = $rows['quote'];
                          
                             $query = "SELECT * FROM quote m left join quote1 n on m.id=n.cid Where qno='$quote'";
                             $res =mysqli_query($conn, $query);
                              $r1=mysqli_fetch_array($res);
                              $enq = $r1['enqno'];


                           $sql1 = " SELECT *,sum(total) as total FROM staff_assign1 where cid='".$rows['id']."'" ;
                          $result1 =mysqli_query($conn, $sql1);  
                  $rows1=mysqli_fetch_array($result1);


                           $total=$rows1['total'];
                          if($total!='0' && $total!=''){
                            $clr="success";

                          }
                           
                           ?>
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td><div align="center"><?php echo $sno; ?></div></td>                          
                     <td nowrap style="padding-left:40px"><?php echo $rows['dcno']; ?></td>                          
                     <td nowrap style="padding-left:30px"><?php echo $enq; ?></td>                          
                     <td nowrap style="padding-left:30px"><?php echo $rows['quote']; ?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                          
                     <td nowrap style="text-transform:uppercase"><?php echo $rows['name']; ?></td>                          
                    
                          <td nowrap>
                            <!-- <a href="inspect_print.php?cid=<?php echo base64_encode($rows['id']);?>" 
                            type="button" class="btn btn-outline-warning" id="<?php echo $sno;?>">
                              <span class="ti-xs ti ti-printer me-1"></span>Print
                            </a> -->
                          <?php if($read_permit==1){ ?> 
                          <a href="staff_assign_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </a>
                          <?php } else { ?>
                          <button disabled 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Edit
                          </button>
                          <?php } if($delete_permit==1){ ?>
                            <a  href="ajax/del_staffassign.php?cid=<?php echo base64_encode($rows['id']);?>"
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

                         <a href="project_exp_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" class="btn btn-<?php if($total!='0' && $total!=''){ echo $clr ;}else{ echo"secondary";}?>" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Project Expense 
                          </a>
                        
                          </td>
                          <td style="text-align:center">
                            <?php if($total!='' &&  $total!='0'){ ?>
                            <button class="btn btn-primary" style="width:100px" > <?php echo $total ;?></button>
<?php }else { ?>
 <span ><?php echo $total ;?></span> 
  <?php } ?>
                          </td>
                        </tr>
                        <?php
                  $sno++;
                      }
                    
                    }
                 else{ ?>
               <tr>
                <td  align="center">  <p></p></td>
                <td  align="center">  <p></p></td>
                <td  align="center">  <p></p></td>
                <td  align="center">  <p>No Data Found</p></td>
                <td  align="center">  <p></p></td>
                <td  align="center">  <p></p></td>
                <td  align="center">  <p></p></td>
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
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='staff_assign_list.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/del_staffassign.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>