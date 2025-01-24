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
            <form action="" method="post" enctype="multipart/form-data">
              <!-- Default -->
             
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">ASSET ALLOTMENT</button><br>
                      

                      <div 
                      class="card-header sticky-element  d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                      <h5 class="card-title mb-sm-0 me-2" ></h5>
                      
                     <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown"> 
                              <!-- <a
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-primary"
                             
                                  aria-haspopup="true"
                                  aria-expanded="false"><i style="color: white;" class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                  
</a>&nbsp;&nbsp; -->
                              <a type="button" href="ass_assign_list.php" class="btn btn-primary">Assign&nbsp;List
                             
</a>
                              
                              
                              <!-- <div class="btn-group" role="group">
                                <button
                                  id="btnGroupDrop1"
                                  type="button"
                                  class="btn btn-label-warning dropdown-toggle"
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  aria-expanded="false">
                                  
                                </button>
                               
                               
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                       
                                 
                                </div>
                              </div> -->
                            </div>
                          </div>
                    </div>
                    </div>
 
      <div class="card mt-4">
               
                  
                <div class="card-body">
                  <div class=" table-responsive">
                  
                    <table  class="table table-border table-hover mt-2">
                      <thead>
                        <tr>
                        <th >S.No</th>
                                  <th >Rec.No</th>
                                  <!-- <th nowrap>Product&nbsp;Type</th>  -->
                                  <th nowrap>Group</th> 
                                  <th nowrap>Product&nbsp;Name</th> 
                                  <th nowrap>Model</th> 
                                  <th nowrap>Warrant&nbsp;Date</th> 
                                  <th>Qty</th> 
                                  <th nowrap>Product No</th> 
                                  <th nowrap>Department</th>
                                  <th nowrap>Designation</th>
                                  <th nowrap>Assign</th>
                                  <th nowrap>Assign Date</th>
                                  <th>Status</th>
                        </tr>
                      </thead>
                      
                      <tbody> <tr>
                              <?php
                        $sno=1;$j=0;$pi=1;
						
						    $sql6 = " SELECT *,a.id as id,c.type as type,sum(a.quantity) as quantity,c.id as lp,d.id as dd,e.id as ee FROM purchaseentry1 a left join purchaseentry b on a.cid=b.id left join asset_type c on b.type=c.id left join asset_group d on a.productgrp=d.id left join asset_master e on a.productname=e.id  where e.asset_type='Asset' group by e.asset_name order by e.asset_name asc";
                              $result6 = mysqli_query($conn, $sql6);
                              while ($rw6 = mysqli_fetch_array($result6))
                              {
								  
								 $ee1=$rw6['ee'];	
              			
 	
   $sql5 = " SELECT * FROM asset_assign WHERE pro_name='$ee1' order by pro_no desc";
                              $result5 = mysqli_query($conn, $sql5);
                              $wz1 = mysqli_fetch_array($result5);
                             $sn=$wz1['pro_no']+1;  
								
                     $sql4 = "SELECT *,a.id as id,c.type as type,a.quantity as quantity,c.id as lp,d.id as dd,e.id as ee,a.model as model FROM purchaseentry1 a left join purchaseentry b on a.cid=b.id left join asset_type c on b.type=c.id left join asset_group d on a.productgrp=d.id left join asset_master e on a.productname=e.id  where e.asset_type='Asset' and e.id='$ee1' order by receipt asc";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                $rec=$rw['receipt']; 
                               $id=$rw['id'];
                               $lp=$rw['lp'];
                               $dd=$rw['dd'];
                               $ee=$rw['ee'];
                               $a=$rw['quantity'];
                               $type=$rw['type'];
                                 $group_name=$rw['group_name'];
                                 $asset_name=$rw['asset_name'];
                                 $warrant_date=$rw['warrant_date'];

                                  $model=$rw['model'];			

                 
    $sql5 = "SELECT * FROM  asset_assign where pro_name='$ee' and rec_no='$rec'";
                                $result5 = mysqli_query($conn, $sql5);
                                $rw2 = mysqli_fetch_array($result5);
                                $Count = mysqli_num_rows($result5);
                               
                    $b=$a-$Count;   
  					  

                      
		  for($i=1;$i<=$b;$i++){ ?>
		   <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $id;?>"> 
				<td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno++; ?></div>
                </td>
				<td  style="padding: 0.3rem;">
                <input
                                    type="text"
                                    class="form-control"
                                    id="rec_no<?php echo $i;?>"
                                    name="rec_no[]"
                                    style="text-align:right"
                                    value="<?php echo $rec; ?>"
                                  
                                    value="1"
                                    aria-label="Product barcode" readonly/>
                </td>


                <!-- <td style="padding: 0.3rem;width:230p;">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_type<?php echo $i;?>"
                                    name="pro_type[]"
                                    style="text-align:left;width:230px"
                                    hidden
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $lp; ?>"
                                    aria-label="Product barcode"  readonly/>
                                    <input type="text"  class="form-control"    style="text-align:left;width:230px"  id="pro_type1<?php echo $i;?>"
                                    name="pro_type1[]"  value="<?php echo $type; ?>" readonly /> 

                                       
                </td>    -->
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_grp<?php echo $i;?>"
                                    name="pro_grp[]"
                                    style="text-align:left;width:200px"
                                    hidden
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $dd; ?>"
                                    aria-label="Product barcode" readonly/>
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_grp1<?php echo $i;?>"
                                    name="pro_grp1[]"
                                    style="text-align:left;width:200px"
                                    
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $group_name; ?>"
                                    aria-label="Product barcode" readonly/>
                                       
                </td>   
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_name<?php echo $i;?>"
                                    name="pro_name[]"
                                    style="text-align:left"
                                    hidden
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $ee; ?>"
                                    aria-label="Product barcode" readonly/>
                 <input
                                    type="text"
                                    class="form-control"
                                    id="pro_name1<?php echo $i;?>"
                                    name="pro_name1[]"
                                    style="text-align:left"
                                    
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="<?php echo $asset_name; ?>"
                                    aria-label="Product barcode" readonly/>
                                       
                </td>   


                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="model<?php echo $i;?>"
                                    name="model[]"
                                    style="text-align:left;width:200px;text-transform:uppercase"
                                    value="<?php echo $model; ?>"
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                   
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="warrant_date<?php echo $i;?>"
                                    name="warrant_date[]"
                                    style="text-align:right"
                                    value="<?php echo $warrant_date; ?>"
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                   
                                    aria-label="Product barcode"/>
                                       
                </td>            
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="qty<?php echo $i;?>"
                                    name="qty[]"
                                    style="text-align:right"
                                    
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    value="1"
                                    aria-label="Product barcode" readonly/>
                                       
                </td>            
                
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="pro_no<?php echo $i;?>"
                                    name="pro_no[]"
                                    style="text-align:right"
                                    value="<?php echo $sn++;?>"
                                    onkeyUp="tott(rate<?php echo $i;?>.id);"
                                   
                                    aria-label="Product barcode" readonly/>
                                       
                </td>            
                         
                <td style="padding: 0.3rem;width:130px;">
                <select name="depart[]" id="depart<?php echo $j;?>"  class="select form-select"  onchange="get1(this.id,this.value);" >
                                <option value="">Select</option>

                                <?php 
					$sql = "SELECT * FROM depart ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['depname'];?>
						 </option>
					<?php } ?>
                              </select>
                                       
                </td>   
                <td style="padding: 0.3rem;width:130px;">
                <select class="select form-select"  name="desig[]" id="desig<?php echo $j;?>" onchange="get2(this.id,this.value);" >
						  <option value="">--Select--</option>
              </select>
                                       
                </td>   
                
                <td style="padding:0.3rem">
                <select name="assign_to[]" id="assign_to<?php echo $j;?>" class="select form-select"   >
                                <option value="">Select</option>

                              </select>
                </td>      
                
                
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                   
                                    step="0.01"
                                    class="form-control"
                                    id="assign_date<?php echo $i;?>"
                                    name="assign_date[]"
                                   value="<?php echo date("Y-m-d");?>"
                                  
									 onkeyUp="tott(rate<?php echo $i;?>.id);"
                                    aria-label="Product barcode"/>
                                       
                </td> 
                <td style="padding: 0.3rem">

                <select name="status[]" id="status<?php echo $i;?>"  class="select form-select"   >
                                <option value="">Select</option>
                                <option value="1">Assign</option>
                              
                    </select>
                    </td>



                          
          </tr>
                        
                <?php
               $j++;   
               }       
    } 
							  }
  
?>  
<input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>"/>            
                  </tbody>
                    </table>


                    
                  </div>


                
                </div>

              
              </div>
              <br>
              <div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="home.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Previous</span>
                              </a>
                             
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                            </div> 

</form>
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



  <?php
if (isset($_POST['submit'])) {


  foreach ($_POST['pro_name'] as $key => $val) {


  $pro_type = $_POST['pro_type'][$key];
  $pid = $_POST['rid'][$key];
  $rec_no = $_POST['rec_no'][$key];
  $pro_grp = $_POST['pro_grp'][$key];
  $pro_name = $_POST['pro_name'][$key];
  $warrant_date = $_POST['warrant_date'][$key];
  $qty = $_POST['qty'][$key];
  $pro_no = $_POST['pro_no'][$key];
  $depart = $_POST['depart'][$key];
  $desig = $_POST['desig'][$key];
  $assign_to = $_POST['assign_to'][$key];
  $assign_date = $_POST['assign_date'][$key];
  $status = $_POST['status'][$key];
  


  if ($status!='') {

  
 $sql = "INSERT into asset_assign (pid,rec_no,pro_type,pro_grp,pro_name,warrant_date,qty,pro_no,depart,desig,assign_to,assign_date,status) values ('$pid','$rec_no','$pro_type','$pro_grp','$pro_name','$warrant_date','$qty','$pro_no','$depart','$desig','$assign_to','$assign_date','$status')";
    $result = mysqli_query($conn, $sql);
  }
}
  
  if ($result) {

 echo "<script>alert('Asset Updated Successfully');window.location='ass.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 



<script>
  function get_checkqty(id,value){
    var c=id.substr(8);
    // alert(c);
    var orderqty=document.getElementById('orderqty'+c).value?document.getElementById('orderqty'+c).value:0;
   if(parseFloat(value) > parseFloat(orderqty)){
      alert("Quantity Exceeded Order Quantity.");
      document.getElementById('quantity'+c).value='';
    }
  }
  </script>

<script>
function get1(id,value) {
// alert(value);
var c=(id.substr(6));
// alert(c);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);

						  document.getElementById('desig'+c).innerHTML = r;
					   

      }
    };
    xmlhttp.open("GET","ajax/getdesignation.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>
<script>
function get2(id,value) {
//alert(value);
var c=(id.substr(5));
// alert(c);
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);

						  document.getElementById('assign_to'+c).innerHTML = r;
					   

      }
    };
    xmlhttp.open("GET","ajax/get_asset_person.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>






















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
  window.location='purchaseentrylist.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/delpurchaseentry.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>