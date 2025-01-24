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
            
                    <input type="text" hidden  name="enq_no" id="enq_no" />  
                     <div class="card-header d-flex align-items-center justify-content-between">
                       <button style="margin-top:10px;" class="btn btn-success">ENQUIRY&nbsp;LIST</button>&nbsp;
                     <?php

                     $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=15";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $writrradmit = $row['write_access'];
                     $read_permit = $row['read_access'];


                  $sql = "SELECT * from partymaster where party_group='Sales' order by name ASC";
				          $result = mysqli_query($conn,$sql);
				          $row = mysqli_fetch_array($result);
                  ?>
                  <div class="input-group" style="width:450px;margin-right:10px;margin-top:10px;" >
                        
                        <span style="width:135px;height:40px"  class="input-group-text">
                         <input
                          type="text"
                          class="form-control"
                          style="border:none"
                          id=""
                              value="Party Name"
                              name=""
                          readonly /></span>
                        <select style="width:90px;height:40px;text-transform:uppercase" id="party_name" class="form-select" name="party_name" onchange="get_party(this.value)" data-allow-clear="true">
                        <option value="">Select</option>
                        <option value="01P">All Party</option>
                                <?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result)) 
					{ ?>
              <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
						 </option>
					<?php } ?>
                        </select>
                      </div> 
                      <button type="button" style="margin-top:10px;"
                      class="btn btn-outline-dark" 
                      value="Generate Quote" onclick="submitt(enq_no.value);"> <span class="ti-xs ti ti-plus me-1"></span>Generate Quote</button>
                     
                 
                  </div>
                
                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <a type="button" style="margin-right:10px"
                      class="btn btn-outline-warning" 
                      href="quote_list.php"> <span class="ti-xs ti ti-eye me-1"></span>View Quote</a>

                      <h5 class="card-title mb-sm-0 " ></h5>
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <a type="button" href="enquiry.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add Enquiry
                             
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
                  <div class="card-datatable table-responsive" id="enqlist">
                    <table id="myTable" class="table table-hover display">
                      <thead>
                        <tr>
                          <!-- <th><div align="center"></div></th> -->
                          <th><div align="center">S.No</div></th>
                          <th style="text-align:center">Enq&nbsp;No</th>
                          <th>Enq Date</th>
                          <th>Party&nbsp;Name</th>
                          <th>Factory&nbsp;Name</th>
                          <th style="padding-left:50px">Status</th>
                          <th ><strong>Options</strong></th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <?php
                         $sno=1; $i=0;
                         // LOOP TILL END OF DATA
                        
                          $sql = " SELECT *,e.id as id,e.partyname as partyname FROM enquiry e left join partymaster p on e.partyname=p.id ORDER by e.id desc" ;
                         
                         $result =mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {                         
                         while($rows=mysqli_fetch_array($result))
                         {
                          $name= $rows['enq_no'];
                          $partyid= $rows['partyname'];
                          

					 $b0="SELECT * from quote1 where enqno='$name' order by id desc";
                            $bz=mysqli_query($conn,$b0);
                            $count=mysqli_num_rows($bz);
                         
            
               if($count > 0)
							 {
								 $status="Quotation Generated";
								 $clr="Success";
							 }
							 else
							 {
								 $status="";
								$clr="";
							 }
                           ?>
  <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                   
                     <!-- <td><input type="checkbox"  name="check" id="check<?php /*echo $i;?>" value="<?php echo $rows['id']; */?>" onClick="findselected();"/></td>     -->
                     
                     <td><div align="center"><?php echo $sno; ?></div></td>                          
                     <td style="text-align:center"><?php echo $rows['enq_no']; ?></td>                    
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['date'])); ?></td>                          
                     <td style="text-transform:uppercase"><?php echo $rows['name']; ?></td>                          
                     <td style="text-transform:uppercase"><?php echo $rows['name']; ?></td>                          
                    <td>
                      <span style="width:150px;" class="badge bg-label-<?php echo $clr;?> me-1"><?php echo $status;?></span>
                    </td>                           
                                                
                     <td nowrap>

					   <!-- <a href="enquiry_print.php?cid=<?php echo base64_encode($rows['id']);?>"
                          type="button" class="btn btn-outline-warning" id="<?php echo $sno;?>">
                            <span class="ti-xs ti ti-printer me-1"></span>Print
                          </a> -->
                          <?php if($read_permit==1){ ?>
                          <a href="enq_upd.php?cid=<?php echo base64_encode($rows['id']);?>" 
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                          <span class="ti-xs ti ti-edit me-1"></span>View/Edit
                        </a>
                        <?php }   else { ?>
                          <button disabled
                          type="button" class="btn btn-outline-primary" id="edit<?php echo $sno;?>">
                          <span class="ti-xs ti ti-edit me-1"></span>View/Edit
                        </button>
                        <?php } 
                        if($delete_permit==1){ ?>
                        
                        <a  href="ajax/delenquiry.php?cid=<?php echo base64_encode($rows['id']);?>"
                        type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasEcommerceCustomer"
                        class="btn btn-outline-danger"
                        id="del<?php echo $sno;?>" 
                        onclick="delenquiry(del<?php echo $sno;?>.id);" >
                        <span class="ti-xs ti ti-trash me-1"></span>Delete
                      </a>
                      <?php } else { ?>
                        <button disabled
                        type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasEcommerceCustomer"
                        class="btn btn-outline-danger"
                        id="del<?php echo $sno;?>" 
                        onclick="delenquiry(del<?php echo $sno;?>.id);" >
                        <span class="ti-xs ti ti-trash me-1"></span>Delete
                      </button>
                      <?php } ?>
                         </td>
                        
                        </tr>
                        <?php
                  $sno++; $i++;
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
function delenquiry(id) {

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
  window.location='enquirylist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delenquiry.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>

<script>
function delquote(id) {
  var res = confirm("Are you sure to Delete?");
  if (res) {
    
    var c=(id.substr(6));
    // alert(id);
  var cid=document.getElementById('mid'+c).value;
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r); 
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("Deleted Successfully");
  window.location='enquirylist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delquote.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>

<script>
$(document).ready(function(){
  $("#selectall").click(function() {
  // alert("hello");
$("input[type='checkbox']").prop('checked',this.checked);
});
});
</script>

<script>
function findselected(){
  // alert("hello");
	var checkboxes = document.getElementsByName('check');
  var str = '';
    for(i = 0;i<=checkboxes.length;i++)
    {
        if(document.getElementById('check'+i).checked == true)
        {
            val = document.getElementById('check'+i).value;
            str += val+',';
          }
          
          res = str.substr(0,str.length-1);
          document.getElementById('enq_no').value = res;
        }
        
}
</script>

<script>
function submitt(value) {
    // alert(value);
    var value2=document.getElementById('party_name').value;
  if(value2!=''){
  if(value!=''){
	    window.location = 'quote.php?enq_no=' + btoa(value);
  }
  else{
    alert("Please select the Checkbox...!");
  }
}
  else {
    alert("Please select the Party Name...!");
  }
}
	
</script>

<script>
function get_party(value) {
  // alert(value);
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
  
   document.getElementById('enqlist').innerHTML =r;
   

}
};
xmlhttp.open("GET","ajax/get_party.php?id="+value,true);
xmlhttp.send();
  }
}
</script> 