<?php include "config.php"; ?>
  <?php include "head.php"; ?>
  <script src="sweetalert2@11.js"></script>  

<script>
function ee1(x)
{


//alert(x);
var a=x;
var c=(a.substr(8));
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


var rc=document.getElementById('rc').value?document.getElementById('rc').value:0;



        var t=document.getElementById('quantity'+b).value?document.getElementById('quantity'+b).value:0;
// alert(t);
		var v1=document.getElementById('rate'+b).value?document.getElementById('rate'+b).value:0;

        var tt=parseFloat(t)*parseFloat(v1);
		
		document.getElementById('bvalue'+b).value=tt.toFixed(2);

    var v=document.getElementById('gst'+b).value?document.getElementById('gst'+b).value:0;
var k2=(parseFloat)(tt)/100*(parseFloat)(v);
document.getElementById('gstamount'+b).value=k2.toFixed(2);
var k3=(parseFloat)(tt)+(parseFloat)(k2);
//alert(k2);
document.getElementById('amount'+b).value=k3.toFixed(2);

  


	   m=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('amount'+i).value!='')
	{
		
      var r= document.getElementById('amount'+i).value?document.getElementById('amount'+i).value:0;
  
      var m=(parseFloat)(r)+(parseFloat)(m);
	  
	//  alert(m);

	   document.getElementById('net').value=m.toFixed(2);
		
		
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
	  
    s1=0;
      for(i=0;i<rc;i++)
	  {
	  
	   	if(document.getElementById('bvalue'+i).value!='')
	{
		
      var r1= document.getElementById('bvalue'+i).value?document.getElementById('bvalue'+i).value:0;
  
      var s1=(parseFloat)(r1)+(parseFloat)(s1);
	  
	//  alert(s1);

	   document.getElementById('taxable').value=s1.toFixed(2);
		
		
	}
	  }

// nn();

	  


}


function nn()
{

        var t1=document.getElementById('taxable').value?document.getElementById('taxable').value:0;
       var cgst=document.getElementById('cgst').value?document.getElementById('cgst').value:0;
		//var sgst=document.getElementById('sgst').value?document.getElementById('sgst').value:0;
	//	var igst=document.getElementById('igst').value?document.getElementById('igst').value:0;
		var roundoff=document.getElementById('round').value?document.getElementById('round').value:0;
		
      //  var cgsta=parseFloat(t1)*parseFloat(cgst)/100;
		//var sgsta=parseFloat(t1)*parseFloat(sgst)/100;
		//var igsta=parseFloat(t1)*parseFloat(igst)/100;
		

      var tot=parseFloat(t1)+parseFloat(cgst)+parseFloat(roundoff);
	  
	  document.getElementById('net').value=tot.toFixed(2);

}

</script>


<?php
		   $fg1="select max(dc_no) as id from asset_outward";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $enq=$fg3->id+1;
   ?>

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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-success">Asset Outward</button>
                      <a href="asset_outward_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Asset Outward List
                          </a>
                    </div>      
                                
            
               
                
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">&nbsp;DC&nbsp;No</label>
                            <input
                              type="text"
                              id="dc_no"
                              name="dc_no"
                              readonly
                              value="<?php echo $enq; ?>"
                              class="form-control"
                               />
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Date&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="date"
                              id="date"
                              name="date"
                              class="form-control"
                              value="<?php echo date("Y-m-d");?>"
                              placeholder="" />
                          </div>
                         
                          <div class="col-md-2">
                            <label >Supplier&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="supplier" id="supplier" class="select form-select" data-allow-clear="true"  onchange="get_items(this.value);" required>
                                <option value="">Select</option>
                                <?php 
				$sql1 = "SELECT * FROM partymaster WHERE party_group='Purchase' order by name asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw = mysqli_fetch_array($result1))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php } ?>
                                                    </select>
                          </div>
                          
                         
                        
                        </div>
                     <br>
                     <div class="mb-0"><hr></div>
                
                        <div class="table-responsive">
                            <table class="table table-border table-hover mt-2">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                 
                                  <th nowrap>Group</th> 
                                  <th nowrap>Product Name</th> 
                                 <th nowrap>Product No</th>
                                 <th nowrap>Warrant Date</th>
                                 <th nowrap>Remarks</th>
                             
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                             
                             for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  

                                <tr>
                                  <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td> 
               
                <td style="padding: 0.3rem;width:230px;">
                               <select name="ass_grp[]"  id="ass_grp<?php echo $i;?>" class="select form-select"  onchange="get_items1(this.id,this.value);">
                                <option value="">Select</option>
							         
                </td>
                <td style="padding: 0.3rem;width:230px;">
                               <select name="ass_name[]"  id="ass_name<?php echo $i;?>" class="select form-select"   onKeyDown="ee1(this.id);"  onchange="asset(this.id,this.value);" >
                                <option value="">Select</option>
							
                                
                              </select>                
                </td>
                <td style="padding: 0.3rem;width:230px;">
                               <select name="ass_no[]"  id="ass_no<?php echo $i;?>" class="select form-select"   onchange="warrant(this.id,this.value);">
                                <option value="">Select</option>
							
                                
                              </select>                
                </td>
                              
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="warrant<?php echo $i;?>"
                                    name="warrant[]"
                                    style="text-align:right"
                                    aria-label="Product barcode"/>
                                       
                </td>
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="remark<?php echo $i;?>"
                                    name="remark[]"
                                    style="text-align:right"
								
                                    aria-label="Product barcode"/>
                                       
                </td>
              
               
              
              
                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 20; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      <td  style="padding: 0.3rem;">
                              <div align="center"><?php echo $sno;?></div>
                </td> 
                <td style="padding: 0.3rem;width:230px;">
                               <select name="ass_grp[]"  id="ass_grp<?php echo $i;?>" class="select form-select"  onchange="get_items1(this.id,this.value);"  >
                                <option value="">Select</option>
							
                                
                              </select>                
                </td>
                <td style="padding: 0.3rem;width:230px;">
                               <select name="ass_name[]"  id="ass_name<?php echo $i;?>" class="select form-select" onKeyDown="ee1(this.id);"  onchange="asset(this.id,this.value);" >
                                <option value="">Select</option>
						
                                
                              </select>
                                       
                </td>
               
                <td style="padding: 0.3rem;width:230px;">
                               <select name="ass_no[]"  id="ass_no<?php echo $i;?>" class="select form-select"    onKeyDown="ee1(this.id);"   onchange="warrant(this.id,this.value);">
                                <option value="">Select</option>
							
                                
                              </select>                
                </td>
                              
                <td style="padding: 0.3rem">
                 <input
                                    type="date"
                                    class="form-control"
                                    id="warrant<?php echo $i;?>"
                                    name="warrant[]"
                                    style="text-align:right"
									
                                    aria-label="Product barcode"/>
                                       
                </td>
               
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control"
                                    id="remark<?php echo $i;?>"
                                    name="remark[]"
                                    style="text-align:right"
								
                                    aria-label="Product barcode"/>
                                       
                </td>
               
              
              
                    </tr>
                    <?php
                              }
                              ?>
                              
       <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
                
                              </tbody>
                            </table>
                          </div>
               
              <br>
              <div class="mb-0"><hr></div>
              <div class="row g-3 mt-2">
                          
                         
                         
                          
                          
                          </div>
              <div class="row g-3 mt-2">
                       
                          <div class="col-md-12">
                            <label class="form-label" for="collapsible-fullname">Remarks</label>
                            <input
                              type="text"
                              id="remarks"
                              name="remarks"
                              class="form-control"
                              placeholder="" />
                          </div>
                          </div>

</div>
                  </div>
              </div>    

                          <br><div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-secondary btn-prev" href="attendance.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                             
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

  $dc_no = $_POST['dc_no'];
  $date = $_POST['date'];
  $supplier = $_POST['supplier'];

  $remarks = $_POST['remarks'];
  
    $sql = "INSERT into asset_outward (dc_no,date,supplier,remarks)
     values ('$dc_no','$date','$supplier','$remarks')";
    $result = mysqli_query($conn, $sql);
  
    $cid = mysqli_insert_id($conn);


  foreach ($_POST['ass_grp'] as $key => $val) {
    
    
   
    $ass_grp = $_POST['ass_grp'][$key];
    $ass_name = $_POST['ass_name'][$key];
    $ass_no = $_POST['ass_no'][$key];
    
    $warrant = $_POST['warrant'][$key];
    $remark = $_POST['remark'][$key];
 
    if ($ass_grp != '' && $ass_no != '' ) {
     $sql1 = "INSERT into asset_outward1 (cid,ass_grp,ass_name,ass_no,warrant,remark) 
 values ('$cid','$ass_grp','$ass_name','$ass_no','$warrant','$remark')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
  
  if ($result1) {
    echo '<script>
    Swal.fire({
      title: "success!",
      text: " Asset outward Add successfully.",
      icon: "success",
      confirmButtonText: "OK"
    
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "asset_outward_list.php"; // Corrected line
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