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
                      <button class="btn btn-label-success">SALES INVOICE GENERATE</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="sales_invoice_list.php" class="btn btn-primary"> <i class="ti ti-eye me-0 me-sm-1 ti-xs"></i> View SIG
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
                          <th style="text-align:center;width: 100px;">S.No</th>
                          <th style="text-align:center;width: 150px;">Proforma&nbsp;no</th>
                          <th style="width: 200px;">Date</th>
                          <th>party&nbsp;name</th>
                          <!-- <th style="padding-left:55px">Status</th> -->
                          <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php
                         $sno=1;
                           
                         // LOOP TILL END OF DATA
                         $sql = " SELECT *,b.id as id FROM profomo b left join partymaster m on b.partyname=m.id ORDER by b.id asc" ;
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))
                          {
                          $book=$rows['profomo'];
							
							            $b0="SELECT * from sales_invoice1 p left join sales_invoice o on p.cid=o.id where invoiceno='$book'";
                            $bz=mysqli_query($conn,$b0);
                            $bz1=mysqli_fetch_array($bz);
                            $invoice=$bz1['invoiceno'];

							
							
							//  if($rows['approve']==1 )
							//  {
							// 	 $status="Approved";
							// 	 $clr="Success";
							//  }
							//  else
							//  {
							// 	 $status="Approval Pending";
							// 	 $clr="Warning";
							//  }
                           
						   
						   if($invoice!= $book){
                           ?>
                     <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td style="text-align:center" ><?php echo $sno; ?></td>                                                 
                     <td style="text-align:center"><?php echo $rows['profomo'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>    
                     <td><?php echo $rows['name'];?></td>                          
                     <!-- <td>
                      <span style="width:150px;" class="badge bg-label-<?php echo $clr;?> me-1"><?php echo $status;?></span>
                    </td>                           -->
                                      
                                                
                          <td nowrap>
                            <a href="sales_invoice.php?cid=<?php echo base64_encode($rows['id']);?>" 
                            type="button" style="width:140px" class="btn btn-outline-primary" >
                              <span class="ti-xs ti ti-pencil me-1" nowrap></span>Generate SIG 
                            </a>
                  
                          </td>
                        </tr>
                        <?php
                  $sno++;
                      }
						  }
                    
                    }
                 else{ ?>
               <tr><td colspan="5" align="center">  <p>No Data Found</p></td> </tr>
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
function delpurchaseorder(id) {

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
  window.location='purchaseorderlist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delpurchaseorder.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>