<?php include "config.php"; ?>

<script>
function ee1(x)
{


// alert(x);
var a=x;
var c=(a.substr(11));
e=parseInt(c)+1;

document.getElementById('s1'+e).style.display='table-row';

}

</script>

<script language="javascript" type="text/javascript">




function tott(v1) {
    a = v1;
    b = a.substr(8);
//alert(b);
     var rc = document.getElementById('rc').value ? document.getElementById('rc').value : 0;

   
    // Calculate total quantity
    var totalQty =0;
    for (i =0; i<rc;i++) {
       
        if (document.getElementById('amount' + i).value != '') {
            var qty = document.getElementById('amount' + i).value ? document.getElementById('amount' + i).value : 0;
            totalQty += parseFloat(qty);
         
        }
    }

    // Display total quantity in a separate field (e.g., 'totalQtyField')
    document.getElementById('total').value = totalQty.toFixed();


   
}


</script>



<?php
$fg1="select max(exp_no) as id from project_expense";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>


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
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                      <button class="btn btn-label-primary"> Project Expense</button>
                      <a href="project_expense_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View Expense
                          </a>
                    </div>  <br>         
                    <form action="" method="post"  autocomplete="off">
                                <div class="card mb-2 mt-2">
                   
                        
                      <div id="fabric_process" class="content card-body">
                        <div class="row mb-6">
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Exp&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="exp_no"
                              name="exp_no"
                              readonly
                              value="<?php echo $fg4; ?>"
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
                          <label class="form-label" for="collapsible-fullname">Po&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <select name="pono" id="pono" class="select form-select" data-allow-clear="true" required  onchange="get_party(this.value);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM staff_assign  order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['pono'];?>"><?php echo $rw['pono'];?>
						 </option>
					<?php }  ?>
                              </select>
                          </div>
                          
                          <div class="col-md-2">
                          <label class="form-label" for="collapsible-fullname">Factory&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="factoryname" id="factoryname" class="select form-select" data-allow-clear="true" required  onchange="get_party4(this.value);">
                               
                              </select>
                          </div>
                          
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Allow&nbsp;Expense<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="allow_exp"
                              name="allow_exp"
                              readonly
                              class="form-control"
                             
                              placeholder="" />
                          </div>   


                          </div><br><hr>
                     
                        
                        <div class="table-responsive card-body content" style="height:250px">
                            <table class="table table-responsive table-hover">
                              <thead class="border-bottom">
                                <tr>
                                  <th style="width:50px">S.No</th>
                                  <th>Expense</th> 
                                  <th>Description</th> 
                                  <th>User</th> 
                                  <th>Bill&nbsp;Upload</th> 
                                  <th>Amount</th> 
                                                                
                                  
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              for ($i = 0, $sno = 1; $i < 1; $i++, $sno++) {
                                ?>  
                                <tr>
                                
                                  <td  style="padding: 0.3rem;text-align:center">
                                   <?php echo $sno; ?>
                </td>
               
                                   <td style="padding: 0.3rem">
                                   <select name="exp_name[]" style="width:200px" id="exp_name<?php echo $i;?>" class="select form-select"  onchange="get_details(this.id,this.value);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM expense  order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['expense_name'];?>
						 </option>
					<?php }  ?>
                              </select>
                </td>

                <td style="padding: 0.3rem">
                 <input style="width:150px"
                                    type="text"
                                    class="form-control"
                                    id="description<?php echo $i;?>"
                                name="description[]"
                                    aria-label="Product barcode"
                                    onkeydown="ee1(this.id)"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                <select name="user[]" style="width:200px" id="user<?php echo $i;?>" class="select form-select"  onchange="get_details(this.id,this.value);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM employee where status='1'  order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php }  ?>
                              </select>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="file"
                                    class="form-control"
                                    id="bill_upload<?php echo $i;?>"
                                name="bill_upload[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input style="width:120px"
                                    type="text"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                name="amount[]"
                                onkeyUp="tott(amount<?php echo $i;?>.id);"

                                    aria-label="Product barcode"/>
                                       
                </td>  
             
                
               
                  
                                   
                          
                
                
               
                           
                
                   </tr>
                                <?php
                              }
                              for ($i = 1, $sno = 2; $i < 30; $i++, $sno++) {
                                ?>
                      <tr id="s1<?php echo $i; ?>" style="display:none">
                      
                      <td  style="padding: 0.3rem;text-align:center">
                                 
                                 <?php echo $sno; ?>
                                  
              </td>
             
                                    <td style="padding: 0.3rem">
                                   <select name="exp_name[]" style="width:200px" id="exp_name<?php echo $i;?>" class="select form-select"  onchange="get_details(this.id,this.value);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM expense  order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['expense_name'];?>
						 </option>
					<?php }  ?>
                              </select>
                </td>

                <td style="padding: 0.3rem">
                 <input style="width:150px"
                                    type="text"
                                    class="form-control"
                                    id="description<?php echo $i;?>"
                                name="description[]"
                                    aria-label="Product barcode"
                                    onkeydown="ee1(this.id)"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                <select name="user[]" style="width:200px" id="user<?php echo $i;?>" class="select form-select"  onchange="get_details(this.id,this.value);">
                                <option value="">Select</option>
                                <?php 
					$sql = "SELECT * FROM employee where status='1' order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                         <option value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?>
						 </option>
					<?php }  ?>
                              </select>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input
                                    type="file"
                                    class="form-control"
                                    id="bill_upload<?php echo $i;?>"
                                name="bill_upload[]"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td style="padding: 0.3rem">
                 <input style="width:120px"
                                    type="text"
                                    class="form-control"
                                    id="amount<?php echo $i;?>"
                                name="amount[]"
                                onkeyUp="tott(amount<?php echo $i;?>.id);"

                                    aria-label="Product barcode"/>
                                       
                </td>
                
                                </tr>         
<?php
                              }
                              ?>   
                                     <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
              
                              </tbody>
                            </table>

<br>
                           

                            </div>

                            <div class="row g-3 mt-2">
              <div class="col-md-10"></div>
                          <div class="col-md-2" style="align:right;">
                            <label class="form-label" for="collapsible-fullname">Total&nbsp;</label>
                            <input
                              type="text"
                              id="total"
                              name="total"
                              style="text-align:right"
							 
                              class="form-control" readonly/>
                          </div>










                  </div>
                
              </div>
                  
            </div>
               
           
                          
                         <div class="col-12 d-flex justify-content-between ">
                              <a class="btn btn-label-secondary btn-prev" href="home.php">
                                <i class="ti ti-home me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block ">Home</span>
                              </a>
                              <button class="btn btn-success"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
                            </div>    
                    
                        </form>
                   
                   
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

  $exp_no = $_POST['exp_no'];
  $date = $_POST['date'];
 
  $pono = $_POST['pono'];
  $factoryname = $_POST['factoryname'];
  $allow_exp = $_POST['allow_exp'];
  $total = $_POST['total'];


 





  if ($factoryname != '') {
  $sql = "INSERT into project_expense (exp_no,date,factoryname,allow_exp,pono,total)
  values('$exp_no','$date','$factoryname','$allow_exp','$pono','$total')";
  $result = mysqli_query($conn, $sql);
  }

  $cid = mysqli_insert_id($conn);

  foreach ($_POST['exp_name'] as $key => $val) {
    
    $exp_name = $_POST['exp_name'][$key];
    $description = $_POST['description'][$key];

    $user = $_POST['user'][$key];
    $bill_upload = $_POST['bill_upload'][$key];
    $amount = $_POST['amount'][$key];



    $p1 = $_FILES['bill_upload']['name'][$key];
    $p_tmp1 = $_FILES['bill_upload']['tmp_name'][$key];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);


    if ($exp_name != '') {
       $sql1 = "INSERT into project_expense1 (cid,exp_name,description,user,bill_upload,amount) 
 values ('$cid','$exp_name','$description','$user','$p1','$amount')";
      $result1 = mysqli_query($conn, $sql1);
    }
  
  
  if ($result) {

  echo "<script>alert('Project Expense Successfully');window.location='project_expenes_entry.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
}
?> 



<script>
function get_assign(value) {
 
//   alert(value);
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

$('#partyname').val(data.partyname);
$('#pono').val(data.pono);
}

      }
    };
    xmlhttp.open("GET","ajax/get_assign.php?id="+value,true);
    xmlhttp.send();
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
//alert(r);
  
   document.getElementById('factoryname').innerHTML =r;
 

}
};
xmlhttp.open("GET","ajax/get_exp_factory.php?id="+value,true);
xmlhttp.send();
  }
}
</script> 


<script>
function get_party3(value) {
  // alert(value);
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
  
   document.getElementById('allow_exp').innerHTML =r;
 

}
};
xmlhttp.open("GET","ajax/get_allow_exp.php?id="+value,true);
xmlhttp.send();
  }
}
</script> 



<script>
function get_party4(value) {
  // alert(value);

  var pono=document.getElementById('pono').value?document.getElementById('pono').value:0;

  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
  
   document.getElementById('allow_exp').value =r;
 

}
};
xmlhttp.open("GET","ajax/get_allow_exp.php?id="+pono+"&q1="+value,true);
xmlhttp.send();
  }
}
</script> 


<!-- <script>
function get_po(value) {
  
    // alert(c);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

}

      }
    };
    xmlhttp.open("GET","ajax/get_assign.php?id="+value,true);
    xmlhttp.send();
  }
}
</script> -->


<script>
function get_details(id,value) {
    var c=id.substr(11);
    // alert(c);
  var value2=document.getElementById('quote').value;
  var value3=document.getElementById('partyname').value;
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#offerqty'+c).val(data.quantity);
$('#styleno'+c).val(data.styleno);
$('#itemdesc'+c).val(data.itemdesc);
$('#color'+c).val(data.color);
$('#size'+c).val(data.size);
$('#inspecttype'+c).val(data.inspect);
}

      }
    };
    xmlhttp.open("GET","ajax/get_details.php?id="+value+"&quote="+value2+"&partyname="+value3,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_party1(value) {
  // alert(value);
  if (value != "") {
    //alert(value);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
// alert(r);
  for(var i=0;i<=200;i++)
	 {
    $('#location'+i).val(data.city);
   }

}
};
xmlhttp.open("GET","ajax/getParty.php?id="+value,true);
xmlhttp.send();
  }
}
</script> 

<!-- <script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('myForm');
    const select = document.getElementById('ponakshathram');

    form.addEventListener('submit', function (event) {
        // Get selected options
        const selectedOptions = Array.from(select.selectedOptions).filter(option => option.value !== '');

        // Check if at least one option is selected
        if (selectedOptions.length === 0) {
            event.preventDefault();
            alert('Please select at least one Porunthum Nakshathram.');
			document.getElementById('ponakshathram').focus();
// alert(select);
            // Ensure the focus is set correctly after the alert is dismissed
            select.focus();
            setTimeout(() => {
                select.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }, 0);
        }
    });
});


</script> -->