<?php include "config.php";include "head.php" ?><?php include "session.php";?>
<body>

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

		var v=document.getElementById('rate'+b).value?document.getElementById('rate'+b).value:0;

        var tt=parseFloat(t)*parseFloat(v);
		
		document.getElementById('value'+b).value=tt.toFixed(2);
		
		var v=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
var k2=(parseFloat)(tt)/100*(parseFloat)(v);
document.getElementById('gstamount'+b).value=k2.toFixed(2);
var k3=(parseFloat)(tt)+(parseFloat)(k2);
//alert(k2);
document.getElementById('amount'+b).value=k3.toFixed(2);

var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;

  k=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('value'+i).value!='')
	{
		
      var r= document.getElementById('value'+i).value?document.getElementById('value'+i).value:0;
  
      var k=(parseFloat)(r)+(parseFloat)(k);
	  
	//  alert(k);
	   document.getElementById('taxable').value=k.toFixed(2);
		
		
	}
	  }
	  
	  
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
nn();



}
</script>
<script language="javascript" type="text/javascript">

function nn()
{

        var t1=document.getElementById('taxable').value?document.getElementById('taxable').value:0;
        var cgst=document.getElementById('cgst').value?document.getElementById('cgst').value:0;
		
		var roundoff=document.getElementById('round').value?document.getElementById('round').value:0;
		var other=document.getElementById('other').value?document.getElementById('other').value:0;
		
      

      var tot=parseFloat(t1)+parseFloat(cgst)+parseFloat(roundoff)+parseFloat(other);
	  
	  document.getElementById('net').value=tot;

}
</script>




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
            <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-4">
          <h3> <button class="btn btn-label-primary"> Leave Managment</button></h3>
          <a href="purchaseentrylist.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View GRN
                          </a>
                     
                    
</div>      
              <!-- Default -->
              <div class="row g-4">
              <?php
		 $sid=base64_decode($_GET['cid']);
		 ?>
              <div class="col-xl-12 col-lg-6 col-md-6">
               <div class="card " >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
              
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                   
                        
                        <div class="mb-0"><hr></div>
                      <div class=" mb-2 mt-4">
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th style="width:50px">Rec.No</th>
                                  <th nowrap>Product&nbsp;Type</th> 
                                  <th nowrap>Group</th> 
                                  <th nowrap>Product&nbsp;Name</th> 
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
                              <tbody>
                              <?php
                        $sno=1;$j=0;$pi=1;
                        $sql4 = " SELECT *,a.id as id,c.type as type,a.quantity as quantity,c.id as lp,d.id as dd,e.id as ee FROM purchaseentry1 a left join purchaseentry b on a.cid=b.id left join asset_type c on b.type=c.id left join asset_group d on a.productgrp=d.id left join asset_master e on a.productname=e.id  where e.asset_type='Asset' order by a.id asc";
                              $result4 = mysqli_query($conn, $sql4);
                              while ($rw = mysqli_fetch_array($result4))
                              {
                                
                               $id=$rw['id'];
                               $lp=$rw['lp'];
                               $dd=$rw['dd'];
                               $ee=$rw['ee'];
                               $a=$rw['quantity'];
                               $type=$rw['type'];
                               $rec=$rw['receipt'];
                                 $group_name=$rw['group_name'];
                                 $asset_name=$rw['asset_name'];
                                 $warrant_date=$rw['warrant_date'];

                                $sql5 = " SELECT * FROM  asset_assign    where pro_type='$lp' and pro_grp='$dd' and pro_name='$ee' and pro_no!='' order by id asc";
                                 $result5 = mysqli_query($conn, $sql5);
                                 $rw2 = mysqli_fetch_array($result5);
                                $Count = mysqli_num_rows($result5);
                                  //if($Count>0)
								  {

                                  

                      
		  for($i=1;$i<=$a;$i++){ ?>
		   <tr>
                <input type="text" hidden name="rid[]" id="rid" value="<?php echo $id;?>"> 
				<td  style="padding: 0.3rem;">
                               <div style="text-align:center">  <?php echo $sno++; ?></div>
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="number"
                                    class="form-control"
                                    id="rec_no<?php echo $i;?>"
                                    name="rec_no[]"
                                    style="text-align:right"
                                    value="<?php echo $rec; ?>"
                                   
                                    aria-label="Product barcode"/>
                                       
                </td>      


                <td style="padding: 0.3rem;width:230p;">
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

                                       
                </td>   
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
                                    type="text"
                                    class="form-control"
                                    id="pro_no<?php echo $i;?>"
                                    name="pro_no[]"
                                    style="text-align:right"
                                    value="<?php echo $i;?>"
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
                <select class="select form-select"  name="desig[]" id="desig<?php echo $j;?>" >
						  <option value="">--Select--</option>
              </select>
                                       
                </td>   
                
                <td style="padding: 0.3rem">
                <select name="assign_to[]" id="assign_to<?php echo $i;?>"  class="select form-select"   >
                                <option value="">Select</option>

                                <?php 
					$sql = "SELECT * FROM employee ";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
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
                                <option value="1">GET</option>
                                <option value="2">Not GET</option>
                    </select>
                    </td>



                          
          </tr>
                        
                <?php
                $j++;
               }
              }
  }
?>  
<input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">            
                              </tbody>
                            </table>
                          </div>
                
              </div>
              <br>
              <div class="mb-0"><hr></div>
             
                         
                          
                         
                       
                          
                        
                          
                   



 </div>
                  </div>
              </div>    
            
                          <br><div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="purchaseentrylist.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Preview</span>
                              </a>
                             
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block me-sm-1">Update</span>
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


  foreach ($_POST['pro_type'] as $key => $val) {


  $pro_type = $_POST['pro_type'][$key];
  $pid = $_POST['rid'][$key];
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

  
 $sql = "INSERT into asset_assign (pid,pro_type,pro_grp,pro_name,warrant_date,qty,pro_no,depart,desig,assign_to,assign_date,status) values ('$pid','$pro_type','$pro_grp','$pro_name','$warrant_date','$qty','$pro_no','$depart','$desig','$assign_to','$assign_date','$status')";
    $result = mysqli_query($conn, $sql);
  }
}
  
  if ($result) {

  echo "<script>alert('Purchase Updated Successfully');window.location='asset_assign.php';</script>";

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






function get_items(value) {
// alert(value);



  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
  for (var i=0;i<=20;i++){
						  document.getElementById('productgrp'+i).innerHTML = r;
  }

      }
    };
    xmlhttp.open("GET","ajax/get_assgrp.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_items1(id,value) {
//  alert(value);

var c=(id.substr(10));


  if (value!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

	 document.getElementById('productname'+c).innerHTML = r;


      }
    };
    xmlhttp.open("GET","ajax/get_assname.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>