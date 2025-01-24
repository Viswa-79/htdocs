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



<script language="javascript" type="text/javascript">


function tott(v1)
{


//alert(v1);

a=v1;
b=(a.substr(4));




var t=document.getElementById('quantity'+b).value?document.getElementById('quantity'+b).value:0;
// alert(t);
		var v1=document.getElementById('rate'+b).value?document.getElementById('rate'+b).value:0;

        var tt=parseFloat(t)*parseFloat(v1);
		
        document.getElementById('bvalue'+b).value=tt.toFixed(2);
        
        var v=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
        // alert(v);
var k2=(parseFloat)(tt)/100*(parseFloat)(v);
document.getElementById('gstamount'+b).value=k2.toFixed(2);
var k3=(parseFloat)(tt)+(parseFloat)(k2);
document.getElementById('amount'+b).value=k3.toFixed(2);

var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;

  k=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('amount'+i).value!='')
	{
		
      var r= document.getElementById('amount'+i).value?document.getElementById('amount'+i).value:0;
  
      var k=(parseFloat)(r)+(parseFloat)(k);
	  
	//  alert(k);
	   document.getElementById('net').value=k.toFixed(2);
		
		
	}
	  }
	  
    p=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('gstamount'+i).value!='')
	{
		
      var r1= document.getElementById('gstamount'+i).value?document.getElementById('gstamount'+i).value:0;
  
      var p=(parseFloat)(r1)+(parseFloat)(p);
	  
	 //alert(k6);

	   document.getElementById('cgst').value=p.toFixed(2);
		
     
	}
	  }

    s=0;
      for(i=0;i<=20;i++)
	  {
	  
	   	if(document.getElementById('bvalue'+i).value!='')
	{
		
      var r1= document.getElementById('bvalue'+i).value?document.getElementById('bvalue'+i).value:0;
  
      var s=(parseFloat)(r1)+(parseFloat)(s);
	  
	//  alert(k);

	   document.getElementById('taxable').value=s.toFixed(2);
		
		
	}
	  }

nn();

	  


}


function nn()
{

        var t1=document.getElementById('taxable').value?document.getElementById('taxable').value:0;
       var cgst=document.getElementById('cgst').value?document.getElementById('cgst').value:0;
	//	var sgst=document.getElementById('sgst').value?document.getElementById('sgst').value:0;
	//	var igst=document.getElementById('igst').value?document.getElementById('igst').value:0;
		var roundoff=document.getElementById('round').value?document.getElementById('round').value:0;
		
   //     var cgsta=parseFloat(t1)*parseFloat(cgst)/100;
	//	var sgsta=parseFloat(t1)*parseFloat(sgst)/100;
	//	var igsta=parseFloat(t1)*parseFloat(igst)/100;
		

      var tot=parseFloat(t1)+parseFloat(cgst)+parseFloat(roundoff);
	  
	  document.getElementById('net').value=tot.toFixed(2);

}

</script>

<script>
  function chkreqqty2(id,value){
    var c=id.substr(8);
    //alert(c);
    var reqqty=document.getElementById('reqqty'+c).value?document.getElementById('reqqty'+c).value:0;
   if(parseFloat(value)>parseFloat(reqqty)){
      alert("Required Quantity Exceeded Order Quantity.");
      document.getElementById('quantity'+c).value='';
    }
  }
  </script>

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
              <div class="row">
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">Asset Inward</button>
                      <a href="asset_outward_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Asset Inward 
                          </a>
                    </div>  <br>         
                                
            
               
                
              <div class="card mb-2 mt-2" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                              $sql4 = " SELECT * FROM asset_inward WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">Inward&nbsp;Dc&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dc_no"
                              name="dc_no"
                              readonly
                              value="<?php echo $wz1['rec_no']; ?>"
                              class="form-control"
                              readonly />
                          </div>
                        
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder="" />
                          </div>

                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">DC &nbsp;No<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="dcno"
                              name="dcno"
                              class="form-control"
                              value="<?php echo $wz1['dcno']; ?>"
                              placeholder=""  readonly/>
                          </div>
                          
                          <div class="col-md-2">
                            <label >Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplier" id="supplier" class="select form-select" data-allow-clear="true" onchange="get_items(this.value);"  style="pointer-events: none;">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Purchase' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['supplier']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                        
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">DC&nbsp;Date<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="dc_date"
                              name="dc_date"
                              class="form-control"
                              value="<?php echo $wz1['date']; ?>"
                              placeholder=""  readonly/>
                          </div>
                          
                            </div>
                      
                        </div><br>
                        <div class="mb-0"><hr></div>
                                           
                        <div class="table-responsive">
                            <table class="table table-border  table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th nowrap>Group</th> 
                                  <th nowrap>Product Name</th> 
                                 <th nowrap>Product No</th>
                                 <th nowrap>Warrant Date</th>
                                 <th nowrap>Remarks</th>
                                 <th nowrap>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                        $sno=1; $i=0;
                              $sql4 = " SELECT * FROM asset_inward1 Where cid='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                  ?> 
                <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

                               <td  style="padding: 0.3rem">
                               <div style="text-align:center">  <?php echo $sno; ?></div>
                </td>

              
                <td style="padding: 0.3rem;width: 230px;">
                <select name="ass_grp[]"  id="ass_grp<?php echo $i;?>" class="select form-select" onchange="get_items1(this.id,this.value);" style="pointer-events: none;">
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT *,a.id as id FROM asset_group a left join asset_assign b on a.id=b.pro_grp left join purchaseentry c on b.rec_no=c.receipt where c.supplier='".$wz1['supplier']."' group by b.pro_grp order by a.id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['ass_grp']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['group_name'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>
              
                <td style="padding: 0.3rem;width: 230px;">
                <select name="ass_name[]"  id="ass_name<?php echo $i;?>" class="select form-select" onchange="asset(this.id,this.value);" style="pointer-events: none;" >
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT *  FROM asset_master where asset_group='".$rw['ass_grp']."'  order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['ass_name']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['asset_name'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>

              
                <td style="padding: 0.3rem;width: 230px;">
                <select name="ass_no[]"  id="ass_no<?php echo $i;?>" class="select form-select" onchange="warrant(this.id,this.value);"  style="pointer-events: none;">
                                  <option value="">Select</option>
                                   <?php 
				                  	$sql = "SELECT * FROM asset_assign   where pro_name='".$rw['ass_name']."' order by id asc";
                            $result = mysqli_query($conn, $sql);
                             while($rw1 = mysqli_fetch_array($result))
					                  { ?>
                        <option <?php if($rw1['id']==$rw['ass_no']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['pro_no'];?></option>
                        <?php } ?>
                                
                              </select>
                                       
                </td>





                      
                                  <td style="padding: 0.3rem">
                                    <input
                                    type="date"
                                  
                                    class="form-control"
                                    id="warrant<?php echo $i;?>"
                                    style="text-align:right"
                                    name="warrant[]"
                                    value="<?php echo $rw['warrant']; ?>"
                                    
									   
                                    aria-label="Product barcode" readonly/>
                                       
                </td>            
                  
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="remark<?php echo $i;?>"
                                    name="remark[]"
                                    style="text-align:right"
                                    value="<?php echo $rw['remark']; ?>"
                                    readonly/>
                                       
                </td>        
                    
                    
                <td style="padding: 0.3rem;width: 230px;">
                <select name="status[]"  id="status<?php echo $i;?>" class="select form-select"   >
                <option value="">Select </option>
                              <option value="Ready"<?php if($rw['status']=='Ready'){ ?>Selected<?php } ?>>Ready</option>
                              <option value="Not Ready"<?php if($rw['status']=='Not Ready'){ ?>Selected<?php } ?>>Not Ready</option>
                             
                             
                              </select>
                                       
                </td>
                     
                      
          </tr>
                        
                <?php
                            $sno++; $i++;
    }
?>              

<input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
                              </tbody>
                            </table>
                         
              </div>
              <br>
              <div class="mb-0"><hr></div>
              
                          
                           <div class="row g-3 mt-2">
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <input
                              type="text"
                              id="remarks"
                              name="remarks"
                              value="<?php echo $wz1['remarks']; ?>"
                              class="form-control"
                              placeholder="" />
                          </div>
                          </div>

  </div>
                  </div>
              </div>    
            

                          <br><div class="col-12 d-flex justify-content-between">
                          <a class="btn btn-label-dark btn-prev" href="asset_inward_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Previous</span>
  </a>
  
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              
                            </div>    
                        </div>
                        </form>
                  
               
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


<?php
if (isset($_POST['submit'])) {

  $cid = $_POST['cid'];
  $rec_no = $_POST['rec_no'];
  $date = $_POST['date'];
  $dcno = $_POST['dcno'];
 
  $supplier = $_POST['supplier'];
  $dc_date = $_POST['dc_date'];

  $remarks = $_POST['remarks'];


   $sql = "UPDATE asset_inward SET rec_no='$rec_no',date='$date',dcno='$dcno',dc_date='$dc_date',remarks='$remarks' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['ass_grp'] as $key => $val) {

    $rid = $_POST['rid'][$key];
    $ass_grp = $_POST['ass_grp'][$key];
    $ass_name = $_POST['ass_name'][$key];
  
    $ass_no = $_POST['ass_no'][$key];
    $warrant = $_POST['warrant'][$key];
    $remark = $_POST['remark'][$key];
    $status = $_POST['status'][$key];


    
     $sql1 = "UPDATE asset_inward1 SET  status='$status' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
  }
  
  if ($result1) {
    echo '<script>
    Swal.fire({
      title: "Updated!",
      text: " Asset Inward Updated successfully.",
      icon: "success",
      confirmButtonText: "OK"
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "asset_inward_list.php"; // Corrected line
      }
    });
  </script>';
  } 
  
  else {
    echo '<script>
            Swal.fire({
              title: "Error!",
              text: "There was an error saving the Asset.",
              icon: "error",
              confirmButtonText: "OK"
            });
          </script>';
  }
}
?> 
<script>
function get_items(value) {
// alert(value);



  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
  for (var i=0;i<=20;i++){
						  document.getElementById('ass_grp'+i).innerHTML = r;
  }

      }
    };
    xmlhttp.open("GET","ajax/get_ass_out_grp.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items1(id,value) {
// alert(value);

var c=(id.substr(7));

var supplier=document.getElementById('supplier').value;
var ass_grp=document.getElementById('ass_grp'+c).value;
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
 // alert(r);

	 document.getElementById('ass_name'+c).innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_ass_out_name.php?id="+value+"&supplier="+supplier+"&ass_grp="+ass_grp,true);
    xmlhttp.send();
  }
}
</script>


<!-- <script>
function asset(id,value) {
 alert('hello');

var c=(id.substr(8));

var supplier=document.getElementById('supplier').value;
var ass_grp=document.getElementById('ass_grp'+c).value;
var ass_name=document.getElementById('ass_name'+c).value;
  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
  alert(r);

	 document.getElementById('ass_no'+c).innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_ass_out_assno.php?id="+value+"&supplier="+supplier+"&ass_grp="+ass_grp+"&ass_name="+ass_name,,true);
    xmlhttp.send();
  }
}
</script> -->
<script>
function asset(id, value) {
    var c = id.substr(8);
    var supplier = document.getElementById('supplier').value;
    var ass_grp = document.getElementById('ass_grp' + c).value;
    var ass_name = document.getElementById('ass_name' + c).value;

    if (value != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var r = xmlhttp.responseText;
               // alert(r);
                document.getElementById('ass_no' + c).innerHTML = r;
            }
        };
        xmlhttp.open("GET", "ajax/get_ass_out_assno.php?id=" + value + "&supplier=" + supplier + "&ass_grp=" + ass_grp + "&ass_name=" + ass_name, true);
        xmlhttp.send();
    }
}
</script>


<!-- <script>
function warrant(id, value) {
    var c = id.substr(6);
 
    var ass_grp = document.getElementById('ass_grp' + c).value;
    var ass_name = document.getElementById('ass_name' + c).value;

    if (value != "") {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(data.sts == 'ok'){
  
  $('#id').val(data.id);  
  $('#warrant').val(data.warrant);             
           
            
           
}
        };
        xmlhttp.open("GET", "ajax/get_ass_out_warrant.php?id=" + value +"&ass_grp=" + ass_grp + "&ass_name=" + ass_name, true);
        xmlhttp.send();
    }
}
</script> -->

<script>
function warrant(id,value) {
   // alert(id);
  var c=(id.substr(6));
 // alert(c);
 var ass_grp = document.getElementById('ass_grp' + c).value;
    var ass_name = document.getElementById('ass_name' + c).value;
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
    $('#id'+c).val(data.id);  
  $('#warrant'+c).val(data.warrant);           
             
            
}

      }
    };
    xmlhttp.open("GET", "ajax/get_ass_out_warrant.php?id=" + value +"&ass_grp=" + ass_grp + "&ass_name=" + ass_name, true);
    xmlhttp.send();
  }
}
</script>