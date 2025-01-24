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
                      <button class="btn btn-success">INSPECTOR ASSIGNMENT</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="staff_assign_list.php" class="btn btn-primary"> <i class="ti ti-eye me-0 me-sm-1 ti-xs"></i> View Inspector
                             
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
                        <th style="width:50px"><div align="center">S.No</div></th>
                        <th align="center" style="width:100px">ENQ&nbsp;No</th>
                        <th align="center" style="width:100px">Quote&nbsp;No</th>
                        <th style="width:200px">Date</th>
                        <th style="width:150px">Party&nbsp;name</th>                       
                          <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                         $sql = " SELECT *,n.id as id FROM quote n left join quote1 m on n.id=m.cid left join partymaster b on n.partyname=b.id group by enqno ORDER by n.id desc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                          $quote = $rows['quote_no'];

                            {
                            $enqno=$rows['enqno']; 
                            //  $enq=implode(",",$enqno);
                            }

                          $query = "SELECT * FROM staff_assign WHERE quote = $quote "; 
                          $res = mysqli_query($conn,$query);
                          $row = mysqli_fetch_array($res);
                           $qt =$row['quote'];
                           ?>
                           <?php
                          if($quote != $qt){ ?>
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td><div align="center"><?php echo $sno; ?></div></td>                                          
                     <td nowrap style="padding-left:30px"><?php echo $enqno; ?></td>                          
                     <td nowrap style="padding-left:30px"><?php echo $rows['quote_no']; ?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                          
                     <td nowrap style="text-transform:uppercase"><?php echo $rows['name']; ?></td>                          
                    
                          <td nowrap>
                            
                          <a href="staff_assign.php?cid=<?php echo base64_encode($rows['quote_no']);?>" 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                            <span class="ti-xs ti ti-edit me-1"></span>Prepare Allotment
                          </a>

                            </td>
                            <?php
                             } 
                            ?>
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