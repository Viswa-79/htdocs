<?php include "config.php"; ?>

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>




<script>
function getord(id,value) {
  var c=id.substr(7);
  var orderno=document.getElementById('orderno'+c).value;
//alert(c);

  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
var r1=r.split('???');
var sts=r1[0];
//alert(r);
if(sts==1)
{

		 document.getElementById('productname'+c).innerHTML =r1[1];
		 

            }
            
      }
    };
    xmlhttp.open("GET","ajax/get_purchase.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>  



<?php


		   $fg1="select max(quote_no) as id from quote";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>


  <?php include "head.php"; ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php
		 $sid=base64_decode($_GET['enq_no']);
		 ?>
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
              <div class="row">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary">Quotation</button>
                      <a href="quote_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Quotation
                          </a>
                    </div><br>
              <div class="card mb-2 mt-2" >
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
                     
                     
                    </div>
                    <div class="bs-stepper-content">
                    
                        
                        <?php
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=16";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                    

                              $sql4 = " SELECT * FROM enquiry WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                             
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content card-body">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">File&nbsp;No</label>
                            <input
                              type="text"
                              id="quote_no"
                              name="quote_no"
                              readonly
                              value="<?php echo $enq; ?>"
                              class="form-control bg-label-secondary text-dark"
                               />
                          </div>
                          
                           <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quotation&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input required
                              type="text"
                              id="qno"
                              name="qno"
                              value="<?php echo $enq; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quotation&nbsp;Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              class="form-control"
                              id="date"
                              placeholder=""
                              name="date"
                              value="<?php echo date("Y-m-d");?>"
                              aria-label="Product barcode" />
                          </div>

                          <div class="col-md-2"  for="collapsible-fullname">
                            <label >Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true" required  style="text-transform:uppercase">
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster WHERE party_group='sales' order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
               <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                                    </select>
                          </div>
                         
                          <div class="col-md-2"  for="collapsible-fullname">
                            <label >Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplyname" id="supplyname" class="select form-select" data-allow-clear="true"  style="text-transform:uppercase">
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster WHERE party_group='sales' order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
               <option <?php if($rw['id']==$wz1['supplyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>
                                                    </select>
                          </div>
                         <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">PO&nbsp;No</label>
                          <input type="text"
                          class="form-control"
                          id="pono"   
                          name="pono" />
                       </div>

                         <div class="col-md-2" hidden>
                          <label class="form-label" for="collapsible-fullname">Status</label>
                          <input type="text"
                          class="form-control"
                          id="status"   
                          name="status" readonly/>
                       </div>

                          <div class="row g-3">
                    
                            <?php
                      $sql44 = " SELECT * FROM enquiry2 where cid='$sid'";
                      $result44 = mysqli_query($conn, $sql44);
                      $rw = mysqli_fetch_array($result44);
                      ?>

<input type="text" hidden  name="fid" id="fid" value="<?php echo $rw['id'];?>"> 

<div class="col-sm-6">
<label for="formFile" class="form-label">Document 1</label>
                <input type="text" hidden name="doct11"  value="<?php echo $rw['doct1'];?>"/>
                <input class="form-control" type="file" id="file1" name="doct1"
                accept="image/jpeg,image/png,application/pdf">                      
                <a href="uploads/<?php echo $rw['doct1']; ?>" target="blank"><?php echo $rw['doct1']; ?></a>  
                    </div>
                 
                    <div class="col-sm-6">
                     
                <label for="formFile" class="form-label">Document 2</label>
                <input type="text" hidden name="doct22"  value="<?php echo $rw['doct2'];?>"/>
                <input class="form-control" type="file" id="file2" name="doct2" 
accept="image/jpeg,image/png,application/pdf">  
<a href="uploads/<?php echo $rw['doct2']; ?>" target="blank"><?php echo $rw['doct2']; ?></a>                      
                    </div>
                  <?php
                 
                  if($rw['doct3']!=''){
                    ?>
                    <div class="col-sm-6">
                     
                <label for="formFile" class="form-label">Document 3</label>
                <input type="text" hidden name="doct33"  value="<?php echo $rw['doct3'];?>"/>
                <input class="form-control" type="file" id="file3" name="doct3" 
accept="image/jpeg,image/png,application/pdf">  
<a href="uploads/<?php echo $rw['doct3']; ?>" target="blank"><?php echo $rw['doct3']; ?></a>                      
                    </div>
                  <?php
                  }
                  else{}
                  if($rw['doct4']!=''){
                    ?>
                    <div class="col-sm-6">
                     
                <label for="formFile" class="form-label">Document 4</label>
                <input type="text" hidden name="doct44"  value="<?php echo $rw['doct4'];?>"/>
                <input class="form-control" type="file" id="file4" name="doct4" 
accept="image/jpeg,image/png,application/pdf">  
<a href="uploads/<?php echo $rw['doct4']; ?>" target="blank"><?php echo $rw['doct4']; ?></a>                      
                    </div>
                  <?php
                  }
                  else{}
                  ?>
</div>
              <br>
             
             
 </div>
                  </div>
              </div>    
            
               
            </div>
  <br>                    

                   <?php 
                    $i=0;
                   $sql11 = " SELECT *,m.id as aid FROM enquiry1 s left join assignment m on s.companyname=m.id WHERE cid IN($sid)  group by s.companyname";
                  $result11 =mysqli_query($conn, $sql11);
                  while($rw11=mysqli_fetch_array($result11)){
                  $id= $rw11['aid'];
                    ?>

                    <button onclick="return false"  style="font-family:serif;text-transform:capitalize;" class="btn btn-label-primary">FACTORY - <?php echo $rw11['name'];?></button>
<br>
<br>
                <div class="card mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-border table-hover">
                              <thead class="border-bottom">
                      <tr>
                        <th>S.No</th>   
                        <th hidden>factory&nbsp;name</th>
                        <th >Enq&nbsp;No</th>
                        <th>style&nbsp;No</th>
                        <th>factory&nbsp;Loc</th>
                        <th>item&nbsp;Description</th>
                        <th>color</th>
                        <th>Size</th>
                        <th>Inspection&nbsp;type</th>
                        <th>order&nbsp;qty</th>
                        <th>Unit</th>
                        <th>inspect&nbsp;level</th>
                        <th>critical&nbsp;AQL&nbsp;Level </th>
                        <th>major&nbsp;AQL&nbsp;Level</th>
                        <th>minor&nbsp;AQL&nbsp;Level</th>
                        <th>manday</th>
                        <th>charges</th>
                        <th>total&nbsp;amnt</th>
                        <th>gst</th>
                        <!-- <th>discount</th> -->
                        <th>final&nbsp;amnt</th>
                      
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                  
                    <?php
                                 $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM enquiry1 m left join enquiry n on m.cid=n.id WHERE cid IN($sid) and companyname='$id' ";
                  $result =mysqli_query($conn, $sql);
                  while($rw=mysqli_fetch_array($result))
                  {
                  ?>
                  <tr>
                      <td style="text-align:center"><?php echo $sno;?></td>
                    
                  
                      <td hidden style="padding: 0.3rem">
                      <select hidden style="width:300px" name="companyname[]" id="companyname<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM assignment order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['companyname']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['name'];?></option>
                    <?php } ?>
                                
                              </select></td>
                      <td  style="padding: 0.3rem">
                      <input type="text" 
                            class="form-control"
                            id="enqno<?php echo $i;?>"
                            name="enqno[]"
                            value="<?php echo $rw['enq_no']; ?>"
                           readonly >
                    </td>
                      <td style="padding: 0.3rem">
                      <input type="text"
                            class="form-control"
                            id="styleno<?php echo $i;?>"
                            name="styleno[]"
                            value="<?php echo $rw['styleno']; ?>"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input type="text"
                            class="form-control"
                            id="factoryloc<?php echo $i;?>"
                            name="factoryloc[]"
                             value="<?php echo $rw['location']; ?>"
                            >
                    </td>

                      <td style="padding: 0.3rem">
                      <input type="text"
                            class="form-control"
                            id="itemdesc<?php echo $i;?>"
                            name="itemdesc[]"
                            value="<?php echo $rw['itemdesc']; ?>"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input type="text" style="width:130px"
                            class="form-control"
                            id="color<?php echo $i;?>"
                            name="color[]"
                            value="<?php echo $rw['color']; ?>"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input type="text"
                            class="form-control"
                            id="size<?php echo $i;?>"
                            name="size[]"
                            value="<?php echo $rw['size']; ?>"
                               style="width:110px" ></td>
                      
                               <td style="padding: 0.3rem">
                      <select id="inspect<?php echo $i;?>" name="inspect[]" class="select form-select">
                      <option value="">Select</option>
                      <?php 
                      $sql2 = "SELECT * FROM inspect_type ORDER BY id asc";
                      $result2 = mysqli_query($conn, $sql2);
                      while($rs = mysqli_fetch_array($result2)){
                        ?>
                        <option value="<?php echo $rs['id'];?>"><?php echo $rs['type'];?></option>
                     <?php }
                      ?>
                      
                      </select>
                                </td>
                      
                                <td style="padding: 0.3rem">
					                <input type="text" 
                            class="form-control"
                            id="quantity<?php echo $i;?>"
                            name="quantity[]"
                            value="<?php echo $rw['quantity']; ?>"
                               ></td>

                      <td style="padding: 0.3rem;">
                      <select  style="width:110px" name="unit[]" id="unit<?php echo $i;?>"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM unit_master order by id";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['unit']==$rw['unit']){ ?> Selected <?php } ?> value="<?php echo $rw1['unit'];?>"><?php echo $rw1['unit'];?></option>
                    <?php } ?>
                                
                              </select></td>

                               <td style="padding: 0.3rem">
                               <select id="inspect_level<?php echo $i;?>" name="inspect_level[]" class="select form-select">
                              <option value="">--SELECT--</option>
                            <optgroup label="General Inspection">
                              <option value="g1">Level 1</option>
                              <option value="g2" >Level 2</option>
                              <option value="g3">Level 3</option>
                            </optgroup>
                            <optgroup label="Special Inspection">
                              <option value="s1">S1</option>
                              <option value="s2">S2</option>
                              <option value="s3">S3</option>
                              <option value="s4">S4</option>
                            </optgroup>
                          </select>
                               </td>

                               <td style="padding: 0.3rem">
                               <select id="critical<?php echo $i;?>" name="critical[]" class="select form-select">
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065">0.065</option>
                              <option value="0.1">0.1</option>
                              <option value="0.15">0.15</option>
                              <option value="0.25">0.25</option>
                              <option value="0.4">0.4</option>
                              <option value="0.65">0.65</option>
                              <option value="1.0">1.0</option>
                              <option value="1.5">1.5</option>
                              <option value="2.5">2.5</option>
                              <option value="4">4.0</option>
                              <option value="6.5">6.5</option>
                          </select>
                              </td>

                               <td style="padding: 0.3rem">
                               <select id="major<?php echo $i;?>" name="major[]" class="select form-select" >
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065">0.065</option>
                              <option value="0.1">0.1</option>
                              <option value="0.15">0.15</option>
                              <option value="0.25">0.25</option>
                              <option value="0.4">0.4</option>
                              <option value="0.65">0.65</option>
                              <option value="1.0">1.0</option>
                              <option value="1.5">1.5</option>
                              <option value="2.5">2.5</option>
                              <option value="4">4.0</option>
                              <option value="6.5">6.5</option>
                          </select>
                              </td>
                               <td style="padding: 0.3rem">
                               <select id="minor<?php echo $i;?>" name="minor[]" class="select form-select" >
                              <option value="" selected>Not Allowed</option>
                              <option value="0.065">0.065</option>
                              <option value="0.1">0.1</option>
                              <option value="0.15">0.15</option>
                              <option value="0.25">0.25</option>
                              <option value="0.4">0.4</option>
                              <option value="0.65">0.65</option>
                              <option value="1.0">1.0</option>
                              <option value="1.5">1.5</option>
                              <option value="2.5">2.5</option>
                              <option value="4">4.0</option>
                              <option value="6.5">6.5</option>
                          </select>
                              </td>

                               <td style="padding: 0.3rem">
                      <input type="text"
                            class="form-control"
                            id="manday<?php echo $i;?>"
                            name="manday[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                             onchange="tott(charges<?php echo $i;?>.id)" 
                               style="width:110px"  
                               ></td>

                               <td style="padding: 0.3rem">
                             <input type="text"
                            class="form-control"
                            id="charges<?php echo $i;?>"
                            name="charges[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                              style="width:110px " 
                              ></td>

                              
                              <td style="padding: 0.3rem">
                                <input type="text"
                                class="form-control"
                                id="totamnt<?php echo $i;?>"
                                name="totamnt[]"
                                onkeyup="tott(charges<?php echo $i;?>.id)"
                                onchange="tott(charges<?php echo $i;?>.id)" 
                                ></td>
                                
                                <td style="padding: 0.3rem">
                              <input type="text"
                             class="form-control"
                             id="gst<?php echo $i;?>"
                             name="gst[]"
                              onkeyup="tott(charges<?php echo $i;?>.id)"
                             onchange="tott(charges<?php echo $i;?>.id)" 
                               style="width:110px"  
                               ></td>
                               <!-- <td style="padding: 0.3rem">
                            <input type="text"
                            class="form-control"
                            id="discount<?php echo $i;?>"
                            name="discount[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                                ></td> -->

                               <td style="padding: 0.3rem">
                            <input type="text"
                            class="form-control"
                            id="finamnt<?php echo $i;?>"
                            name="finamnt[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                                ></td>
                            
                            
                      </tr>
                 
                            <?php
                            $sno++; $i++;
                        }
                       ?>
                    </tbody>
                  </table>
                </div>
                <hr>
                  </div>
                </div>
                <?php
                 }
                  ?>  <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
                 <div class="card mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-border table-hover">
                              <thead class="border-bottom">  
                         <th colspan="7"></th>
                         <th>manday</th>
                        <th hidden>charges</th>
                        <th>total&nbsp;amnt</th>
                        <th>gst</th>
                        <!-- <th>discount</th> -->
                        <th>final&nbsp;amnt</th>
                </thead>
                <tbody>
                  <tr >
                        <td colspan="6"></td>

                        <td style="text-align:right"><b>TOTAL</b></td>
                          <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control"
                            id="mantot"
                            name="mantot"
                               style="width:60px" readonly ></td>

                               <td hidden style="padding: 0.3rem;width:100px">
                      <input hidden style="font-weight:bold"
                            class="form-control "
                            id="chargetot"
                            name="chargetot"
                              style="width:60px " readonly></td>

                              
                              <td style="padding: 0.3rem;width:100px">
                                <input style="font-weight:bold"
                                class="form-control "
                                id="tottamnt1"
                                name="tottamnt1"
                                readonly ></td>
                                
                                <td style="padding: 0.3rem;width:100px">
                       <input style="font-weight:bold"
                             class="form-control "
                             id="gsttot"
                             name="gsttot"
                               style="width:60px" readonly ></td>
                              

                               <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="finamnttot"
                            name="finamnttot"
                               readonly ></td>
                                 <!-- <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="discounttot"
                            name="discounttot"
                               readonly ></td> -->
                      </tr>
                </tbody>
                </table>
                </div>
                </div>
                </div>
</div>
                          <div class="col-12 d-flex justify-content-between">
                          <a class="btn btn-label-dark btn-prev" href="enquirylist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Preview</span>
                              </a>
                              <?php if($create_permit==1){ ?>
                              <button class="btn btn-success btn-next"  name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                              <?php } else {?>
                              <button disabled class="btn btn-success btn-next"  name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                              <?php } ?>
                            </div>    
                        
                            
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

  $quote_no = $_POST['quote_no'];
  $qno = $_POST['qno'];
  $date = $_POST['date'];
  $status = $_POST['status'];
  $partyname = $_POST['partyname'];
  $supplyname = $_POST['supplyname'];
  $mantot = $_POST['mantot'];
  $chargetot = $_POST['chargetot'];
  $gsttot = $_POST['gsttot'];
  $tottamnt1 = $_POST['tottamnt1'];
  $discounttot = $_POST['discounttot'];
  $finamnttot = $_POST['finamnttot'];
  $pono = $_POST['pono'];
  
  if ($partyname != '') {
    $sql = "INSERT into quote (quote_no,qno,date,partyname,mantot,chargetot,gsttot,tottamnt1,discounttot,finamnttot,supplyname,pono,status) 
 values ('$quote_no','$qno','$date','$partyname','$mantot','$chargetot','$gsttot','$tottamnt1','$discounttot','$finamnttot','$supplyname','$pono','$status')";
    $result = mysqli_query($conn, $sql);
  }

  $cid = mysqli_insert_id($conn);

foreach ($_POST['styleno'] as $key => $val) {

    $enqno = $_POST['enqno'][$key];
    $companyname = $_POST['companyname'][$key];
    $styleno = $_POST['styleno'][$key];
    $factoryloc = $_POST['factoryloc'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $color = $_POST['color'][$key];
    $size = $_POST['size'][$key];
    $quantity = $_POST['quantity'][$key];
    $unit = $_POST['unit'][$key];
    $inspect_level = $_POST['inspect_level'][$key];
    $critical = $_POST['critical'][$key];
    $major = $_POST['major'][$key];
    $minor = $_POST['minor'][$key];
    $inspect = $_POST['inspect'][$key];
    $manday = $_POST['manday'][$key];
    $charges = $_POST['charges'][$key];
    $gst = $_POST['gst'][$key];
    $totamnt = $_POST['totamnt'][$key];
    $discount = $_POST['discount'][$key];
    $finamnt = $_POST['finamnt'][$key];
   
    if ($styleno != '') {
     $sql1 = "INSERT into quote1 (cid,enqno,companyname,styleno,itemdesc,size,quantity,unit,inspect,manday,charges,gst,totamnt,discount,finamnt,color,critical,major,minor,factoryloc,inspect_level) 
 values ('$cid','$enqno','$companyname','$styleno','$itemdesc','$size','$quantity','$unit','$inspect','$manday','$charges','$gst','$totamnt','$discount','$finamnt','$color','$critical','$major','$minor','$factoryloc','$inspect_level')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }

  if($_FILES['doct1']['name']!='')
  {
  
$p1 = $_FILES['doct1']['name'];
$p_tmp1 = $_FILES['doct1']['tmp_name'];
$path = "uploads/$p1";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
$p1=$_REQUEST['doct11'];
} 


if($_FILES['doct2']['name']!='')
  {

$p2 = $_FILES['doct2']['name'];
$p_tmp2 = $_FILES['doct2']['tmp_name'];
$path = "uploads/$p2";
$move = move_uploaded_file($p_tmp2, $path);

}
else
{
$p2=$_REQUEST['doct22'];
} 

  if($_FILES['doct3']['name']!='')
  {

$p3 = $_FILES['doct3']['name'];
$p_tmp1 = $_FILES['doct3']['tmp_name'];
$path = "uploads/$p3";
$move = move_uploaded_file($p_tmp1, $path);
}
else
{
$p3=$_REQUEST['doct33'];
} 


if($_FILES['doct4']['name']!='')
  {

$p4 = $_FILES['doct4']['name'];
$p_tmp2 = $_FILES['doct4']['tmp_name'];
$path = "uploads/$p4";
$move = move_uploaded_file($p_tmp2, $path);

}
else
{
$p4=$_REQUEST['doct44'];
} 


 $sql2 = "INSERT into quote2 (cid,doct1,doct2,doct3,doct4) values('$cid','$p1','$p2','$p3','$p4')";
$result2 = mysqli_query($conn, $sql2);

  if ($result) {

  echo "<script>alert('Quotation Saved Successfully');window.location='enquirylist.php';</script>";

  } else {
     echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 



<script language="javascript" type="text/javascript">

function tott(v1)
{

// alert(v1);

a=v1;
b=(a.substr(7));

        var v=document.getElementById('manday'+b).value?document.getElementById('manday'+b).value:0;
        var t=document.getElementById('charges'+b).value?document.getElementById('charges'+b).value:0;
        var gst=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
        // var dis=document.getElementById('discount'+b).value?document.getElementById('discount'+b).value:0;
        
        var tt=parseFloat(v) * parseFloat(t);
        var tm=parseFloat(tt) * parseFloat(gst)/100;
        var tm1=parseFloat(tm) + parseFloat(tt);
        // var tm2=parseFloat(tm1) - parseFloat(dis);
        // alert(tt);
		
		document.getElementById('totamnt'+b).value=tt.toFixed(2);
		document.getElementById('finamnt'+b).value=tm1.toFixed(2);


var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;

m=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('manday'+i).value!='')
	{
      var r= document.getElementById('manday'+i).value?document.getElementById('manday'+i).value:0;
  
      var m=(parseFloat)(r)+(parseFloat)(m);
	  
	//  alert(k);
	   document.getElementById('mantot').value=m;		
		
	}
	  }

n=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('charges'+i).value!='')
	{
      var r= document.getElementById('charges'+i).value?document.getElementById('charges'+i).value:0;
  
      var n=(parseFloat)(r)+(parseFloat)(n);
	  
	//  alert(k);
	   document.getElementById('chargetot').value=n;		
		
	}
	  }

o=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('gst'+i).value!='')
	{
      var r= document.getElementById('gst'+i).value?document.getElementById('gst'+i).value:0;
  
      var o=(parseFloat)(r)+(parseFloat)(o);
	  
	//  alert(k);
	   document.getElementById('gsttot').value=o;		
		
	}
	  }

p=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('totamnt'+i).value!='')
	{
      var r= document.getElementById('totamnt'+i).value?document.getElementById('totamnt'+i).value:0;
  
      var p=(parseFloat)(r)+(parseFloat)(p);
	  
	//  alert(k);
	   document.getElementById('tottamnt1').value=p.toFixed(2);		
		
	}
	  }

// q=0;
//       for(i=0;i<rc;i++)
// 	  {
	  
// 	   	if(document.getElementById('discount'+i).value!='')
// 	{
//       var r= document.getElementById('discount'+i).value?document.getElementById('discount'+i).value:0;
  
//       var q=(parseFloat)(r)+(parseFloat)(q);
	  
// 	//  alert(k);
// 	   document.getElementById('discounttot').value=q;		
		
// 	}
// 	  }

s=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('finamnt'+i).value!='')
	{
      var r= document.getElementById('finamnt'+i).value?document.getElementById('finamnt'+i).value:0;
  
      var s=(parseFloat)(r)+(parseFloat)(s);
	  
	//  alert(s);
	   document.getElementById('finamnttot').value=s.toFixed(2);		
		
	}
	  }
    var tv=document.getElementById('finamnttot').value?document.getElementById('finamnttot').value:0;
        var fv=document.getElementById('tottamnt1').value?document.getElementById('tottamnt1').value:0;
		
        var gv=parseFloat(tv) - parseFloat(fv);
        // alert(gv);
        document.getElementById('gsttot').value=gv.toFixed(2);

	  }
</script>
