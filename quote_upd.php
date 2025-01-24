<?php include "config.php"; ?>

<?php ini_set('max_execution_time', '100000');?>

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
function get_product_details(id,value) {
//alert("hello");
  var c=id.substr(11);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  
$('#unit'+c).val(data.unit);
$('#rate'+c).val(data.price);
$('#specification'+c).val(data.specification);                  
}

      }
    };
    xmlhttp.open("GET","ajax/getproduct.php?id="+value,true);
    xmlhttp.send();
  }
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
                      <button class="btn btn-label-primary">Quotation</button>
                      <a href="quote_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span>View List
                          </a>
                    </div>          
                                
            
               
                
              <div class="card mb-2 mt-4" >
                <form class="card-body"action="" method="post" enctype="multipart/form-data">
                    <div class="card-header d-flex align-items-center justify-content-between">
              
                     
                    </div>
                    <div class="bs-stepper-content">
                      <form action="" method="post" enctype="multipart/form-data">
                        
                        <!-- Personal Info -->
                        
                        <?php
                        $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=16";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $write_permit = $row['write_access'];

                              $sql4 = " SELECT * FROM quote WHERE id='$sid'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                              $id= $wz1['id'];
                                  ?>
                        <!-- Social Links -->
                        <div id="fabric_process" class="content">
                        <div class="row g-3">
                          <div class="col-md-2">
                          <input type="text"  name="cid" readonly id="cid" hidden  value="<?php echo $wz1['id']; ?>" />

                            <label class="form-label" for="collapsible-fullname">File&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="quote_no"
                              name="quote_no"
                              readonly
                              value="<?php echo $wz1['quote_no']; ?>"
                              class="form-control bg-label-secondary text-dark"
                               />
                          </div> 
                         
                          <div class="col-md-2">
                            <label class="form-label" for="collapsible-fullname">Quotation&nbsp;No&nbsp;<span style="color:red;">*</span></label>
                            <input
                              type="text"
                              id="qno"
                              name="qno"
                              class="form-control"
                              value="<?php echo $wz1['qno']; ?>"
                              placeholder="" />
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
                            <label >Party&nbsp;Name&nbsp;<span style="color:red;">*</span></label>
                            <select name="partyname" id="partyname" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['partyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                       
                          <div class="col-md-2" >
                            <label >Supplier&nbsp;Name&nbsp;</label>
                            <select name="supplyname" id="supplyname" class="select form-select" data-allow-clear="true" >
                                <option value="">Select</option>
							<?php 
					$sql = "SELECT * FROM partymaster WHERE party_group='Sales' order by name asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                     <option <?php if($rw['id']==$wz1['supplyname']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
                    <?php } ?>                                        
                                
                              </select>
                          </div>
                       
                      <div class="col-md-2">
                      <label class="form-label" for="collapsible-fullname">Po&nbsp;No</label>
                      <input
                      type="text"
                      name="pono"
                      id="pono"
                      class="form-control"
                      value="<?php echo $wz1['pono']; ?>"
                      placeholder="" />
                        </div>

                        </div>
                        <br>

                        <div class="row g-3">
                          <?php
                      $sql44 = " SELECT * FROM quote2 where cid='$id'";
                      $result44 = mysqli_query($conn, $sql44);
                      $rw = mysqli_fetch_array($result44);
                      ?>


<div class="col-sm-6">
<input type="text" hidden  name="fid" id="fid" value="<?php echo $rw['id'];?>"> 

                <label for="formFile" class="form-label">Document 1</label>
                <input type="text" hidden name="doct11"  value="<?php echo $rw['doct1'];?>"/>
                <input class="form-control" type="file" id="file1" name="doct1"
                accept="image/jpeg,image/png,image/jpg,application/pdf">                      
                <a href="uploads/<?php echo $rw['doct1']; ?>" target="blank"><?php echo $rw['doct1']; ?></a>  
                    </div>
                   
                    <div class="col-sm-6">
                     
                <label for="formFile" class="form-label">Document 2</label>
                <input type="text" hidden name="doct22"  value="<?php echo $rw['doct2'];?>"/>
                <input class="form-control" type="file" id="file2" name="doct2" 
accept="image/jpeg,image/png,image/jpg,application/pdf">  
<a href="uploads/<?php echo $rw['doct2']; ?>" target="blank"><?php echo $rw['doct2']; ?></a>                      
                    </div>
    <?php if($rw44['doct3']!=''){ ?>              
                    <div class="col-sm-6">
                     
                <label for="formFile" class="form-label">Document 3</label>
                <input type="text" hidden name="doct33"  value="<?php echo $rw['doct3'];?>"/>
                <input class="form-control" type="file" id="file3" name="doct3" 
accept="image/jpeg,image/png,image/jpg,application/pdf">  
<a href="uploads/<?php echo $rw['doct3']; ?>" target="blank"><?php echo $rw['doct3']; ?></a>                      
                    </div>
                  <?php
                  } 
                  else{}
                  if($rw44['doct4']!=''){
                  ?> 

                    <div class="col-sm-6">
                     
                <label for="formFile" class="form-label">Document 4</label>
                <input type="text" hidden name="doct44"  value="<?php echo $rw['doct4'];?>"/>
                <input class="form-control" type="file" id="file4" name="doct4" 
accept="image/jpeg,image/png,image/jpg,application/pdf">  
<a href="uploads/<?php echo $rw['doct4']; ?>" target="blank"><?php echo $rw['doct4']; ?></a>                      
                    </div>
                  <?php
                  }
                  else{}
                  ?>
</div>

                        </div>
                  </div>
                  
              </div>    
            
    <br>                    


    <?php
    $i=0; 
    $sql11 = " SELECT *,s.companyname as aid FROM quote1 s left join assignment m on s.companyname=m.id WHERE cid='$id'  group by s.companyname";
                  $result11 =mysqli_query($conn, $sql11);
                  while($rw11=mysqli_fetch_array($result11))
                  {
                    $aid= $rw11['aid'];
                    
                    ?>
    <button onclick="return false"  style="font-family:serif;text-transform:capitalize;" class="btn btn-label-primary">FACTORY - <?php echo $rw11['name'];?></button>
    &nbsp;&nbsp; 
    <?php if($write_permit==1){ ?>
                                <a id="del<?php echo $i;?>"
                                class="btn  btn-sm text-danger" 
                               href="ajax/del_quote_factory.php?cid=<?php echo base64_encode($id);?>&& aid=<?php echo base64_encode($aid);?>">
                                <i class="fa fa-trash"></i></a>
                             <?php } else { ?>
                                <button disabled
                                class="btn  btn-sm text-danger" 
                               href="ajax/del_quote_factory.php?cid=<?php echo base64_encode($id);?>&& aid=<?php echo base64_encode($aid);?>">
                                <i class="fa fa-trash"></i></button>
                             <?php } ?>
                              
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
                        <th>Job&nbsp;No</th>
                        <th>style&nbsp;No</th>
                        <th>factory&nbsp;loc</th>
                        <th>item&nbsp;description</th>
                        <th>color</th>
                        <th>Size</th>
                        <th>Inspection&nbsp;type</th>
                        <th>order&nbsp;qty</th>
                        <th>Unit</th>
                        <th>inspect&nbsp;level</th>
                        <th>critical&nbsp;AQL&nbsp;level</th>
                        <th>major&nbsp;AQL&nbsp;level</th>
                        <th>minor&nbsp;AQL&nbsp;level</th>
                        <th>manday</th>
                        <th>charges</th>
                        <th>taxable&nbsp;amnt</th>
                        <th>gst</th>
                        <!-- <th>discount</th> -->
                        <th>final&nbsp;amnt</th>
                      
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                  
                    <?php
                                 $sno=1;
                      // LOOP TILL END OF DATA
                      $sql = " SELECT * FROM quote1 WHERE cid='$id' and companyname='$aid'";
                  $result =mysqli_query($conn, $sql);
                  while($rw=mysqli_fetch_array($result))
                  {
                  ?>

           <input type="text" hidden name="rid[]" id="rid" value="<?php echo $rw['id'];?>"> 

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
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="enqno<?php echo $i;?>"
                            name="enqno[]"
                            value="<?php echo $rw['enqno']; ?>"
                           readonly >
                    </td>
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="styleno<?php echo $i;?>"
                            name="styleno[]"
                            value="<?php echo $rw['styleno']; ?>"
                            >
                    </td>

                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="factoryloc<?php echo $i;?>"
                            name="factoryloc[]"
                            value="<?php echo $rw['factoryloc']; ?>"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="itemdesc<?php echo $i;?>"
                            name="itemdesc[]"
                            value="<?php echo $rw['itemdesc']; ?>"
                            >
                    </td>
                      <td style="padding: 0.3rem">
                      <input 
                            class="form-control"
                            id="color<?php echo $i;?>"
                            name="color[]"
                            value="<?php echo $rw['color']; ?>"
                            >
                    </td>

                    <td style="padding: 0.3rem">
                      <input style="width:130px"
                            class="form-control"
                            id="size<?php echo $i;?>"
                            name="size[]"
                            value="<?php echo $rw['size']; ?>"
                                ></td>

                                <td style="padding: 0.3rem">
                                <select  name="inspect[]" id="inspect<?php echo $i;?>" class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM inspect_type order by id asc";
                    $result1 = mysqli_query($conn, $sql1);
                    while($rw1 = mysqli_fetch_array($result1))
					{ ?>
                     <option <?php if($rw1['id']==$rw['inspect']){ ?> Selected <?php } ?> value="<?php echo $rw1['id'];?>"><?php echo $rw1['type'];?></option>
                    <?php } ?>
                                
                              </select>
                              </td>

                      <td style="padding: 0.3rem">
					  <input type="text" 
                      style="text-align:right;"
                            class="form-control"
                            id="quantity<?php echo $i;?>"
                            name="quantity[]"
                            value="<?php echo $rw['quantity']; ?>"
                               ></td>

                      <td style="padding: 0.3rem;width:130px">
                      <select style="width:130px" name="unit[]" id="unit<?php echo $i;?>"  class="select form-select" data-allow-clear="true">
                                <option value="">Select</option>
							<?php 
					$sql1 = "SELECT * FROM unit_master ";
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
                              <option value="g1" <?php if($rw['inspect_level']=='g1'){ ?>Selected<?php } ?>>Level 1</option>
                              <option value="g2" <?php if($rw['inspect_level']=='g2'){ ?>Selected<?php } ?>>Level 2</option>
                              <option value="g3" <?php if($rw['inspect_level']=='g3'){ ?>Selected<?php } ?>>Level 3</option>
                            </optgroup>
                            <optgroup label="Special Inspection">
                              <option value="s1" <?php if($rw['inspect_level']=='s1'){ ?>Selected<?php } ?>>S1</option>
                              <option value="s2" <?php if($rw['inspect_level']=='s2'){ ?>Selected<?php } ?>>S2</option>
                              <option value="s3" <?php if($rw['inspect_level']=='s3'){ ?>Selected<?php } ?>>S3</option>
                              <option value="s4" <?php if($rw['inspect_level']=='s4'){ ?>Selected<?php } ?>>S4</option>
                            </optgroup>
                          </select>
                               </td>

                               <td style="padding: 0.3rem">
                               <select id="critical<?php echo $i;?>" name="critical[]" class="select form-select">
                              <option value="" >Not Allowed</option>
                              <option value="0.065" <?php if($rw['critical']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw['critical']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw['critical']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw['critical']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw['critical']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw['critical']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw['critical']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw['critical']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw['critical']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw['critical']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw['critical']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                              </td>

                               <td style="padding: 0.3rem">
                               <select id="major<?php echo $i;?>" name="major[]" class="select form-select">
                              <option value="" >Not Allowed</option>
                              <option value="0.065" <?php if($rw['major']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw['major']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw['major']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw['major']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw['major']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw['major']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw['major']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw['major']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw['major']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw['major']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw['major']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
                          </select>
                              </td>

                               <td style="padding: 0.3rem">
                               <select id="minor<?php echo $i;?>" name="minor[]" class="select form-select">
                              <option value="" >Not Allowed</option>
                              <option value="0.065" <?php if($rw['minor']=='0.065'){ ?>Selected<?php } ?>>0.065</option>
                              <option value="0.1" <?php if($rw['minor']=='0.1'){ ?>Selected<?php } ?>>0.1</option>
                              <option value="0.15" <?php if($rw['minor']=='0.15'){ ?>Selected<?php } ?>>0.15</option>
                              <option value="0.25" <?php if($rw['minor']=='0.25'){ ?>Selected<?php } ?>>0.25</option>
                              <option value="0.4" <?php if($rw['minor']=='0.4'){ ?>Selected<?php } ?>>0.4</option>
                              <option value="0.65" <?php if($rw['minor']=='0.65'){ ?>Selected<?php } ?>>0.65</option>
                              <option value="1.0" <?php if($rw['minor']=='1.0'){ ?>Selected<?php } ?>>1.0</option>
                              <option value="1.5" <?php if($rw['minor']=='1.5'){ ?>Selected<?php } ?>>1.5</option>
                              <option value="2.5" <?php if($rw['minor']=='2.5'){ ?>Selected<?php } ?>>2.5</option>
                              <option value="4" <?php if($rw['minor']=='4'){ ?>Selected<?php } ?>>4.0</option>
                              <option value="6.5" <?php if($rw['minor']=='6.5'){ ?>Selected<?php } ?>>6.5</option>
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
                               value="<?php echo $rw['manday']; ?>"></td>

                               <td style="padding: 0.3rem">
                             <input type="text"
                            class="form-control"
                            id="charges<?php echo $i;?>"
                            name="charges[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                              style="width:110px " 
                             value="<?php echo $rw['charges']; ?>" ></td>

                              

                               <td style="padding: 0.3rem">
                             <input type="text"
                            class="form-control"
                            id="totamnt<?php echo $i;?>"
                            name="totamnt[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                              value="<?php echo $rw['totamnt']; ?>"  ></td>
                            
                              <td style="padding: 0.3rem">
                             <input type="text"
                            class="form-control"
                            id="gst<?php echo $i;?>"
                            name="gst[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                              style="width:110px"  value="<?php echo $rw['gst']; ?>"
                              ></td>
                               <!-- <td style="padding: 0.3rem">
                            <input type="text"
                            class="form-control"
                            id="discount<?php echo $i;?>"
                            name="discount[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                              value="<?php echo $rw['discount']; ?>"  ></td> -->

                               <td style="padding: 0.3rem">
                            <input type="text"
                            class="form-control"
                            id="finamnt<?php echo $i;?>"
                            name="finamnt[]"
                             onkeyup="tott(charges<?php echo $i;?>.id)"
                            onchange="tott(charges<?php echo $i;?>.id)" 
                               value="<?php echo $rw['finamnt']; ?>" ></td>

                               <td>     <?php if($write_permit==1){ ?>
<a href="ajax/del_quote_row.php?cid=<?php echo base64_encode($rw['id']);?>">
                                <button type="button" 
                                class="btn btn-link btn-sm text-danger" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="Delete">
                                <i class="fa fa-trash"></i></button>
                              </a>
                              <?php } else { ?>
                                <button type="button" disabled
                                class="btn btn-link btn-sm text-danger" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="Delete">
                                <i class="fa fa-trash"></i></button>
                                <?php } ?>
                              
                            </td>
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
                  ?>
                  <input type="text" hidden class="form-control form-control-lg" name="rc[]" id="rc" value="<?php echo $i;?>">
                 <div class="card mb-4">
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-border table-hover">
                              <thead class="border-bottom">  
                         <th >Approval&nbsp;Status</th>
                         <th colspan="8"></th>
                         <th>manday</th>
                        <th hidden>charges</th>
                        <th>Taxable&nbsp;value</th>
                        <th>gst&nbsp;value</th>
                        <!-- <th>discount</th> -->
                        <th>final&nbsp;amnt</th>
                </thead>
                <tbody>
                  <tr >
                        <td colspan="">
                            <select name="status" id="status" class="form-select" style="width:200px">
                        <option value="">Select</option>
                        <option value="1" <?php if($wz1['status']=='1'){ ?>Selected<?php } ?> >Approved</option>
                        <option value="0" <?php if($wz1['status']=='0'){ ?>Selected<?php } ?> >Approval Pending </option>   
          </select>
                        </td>
                        <td colspan="7"></td>

                        <td style="text-align:right"><b>TOTAL</b></td>
                          <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control"
                            id="mantot"
                            name="mantot"
                            value="<?php echo $wz1['mantot']; ?>"
                               style="width:60px" readonly ></td>

                               <td hidden style="padding: 0.3rem;width:100px">
                      <input hidden style="font-weight:bold"
                            class="form-control "
                            id="chargetot"
                            name="chargetot"
                            value="<?php echo $wz1['chargetot']; ?>"
                              style="width:60px " readonly></td>

                              

                               <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="tottamnt1"
                            name="tottamnt1"
                            value="<?php echo $wz1['tottamnt1']; ?>"
                               readonly ></td>
                     
                               <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="gsttot"
                            name="gsttot"
                            value="<?php echo $wz1['gsttot']; ?>"
                              style="width:60px" readonly ></td>
                               <!-- <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="discounttot"
                            name="discounttot"
                            value="<?php echo $wz1['discounttot']; ?>"
                               readonly ></td> -->

                               <td style="padding: 0.3rem;width:100px">
                      <input style="font-weight:bold"
                            class="form-control "
                            id="finamnttot"
                            name="finamnttot"
                            value="<?php echo $wz1['finamnttot']; ?>"
                               readonly ></td>
                                
                      </tr>
                </tbody>
                </table>
                </div>
                </div>
                </div>

                          <br><div class="col-12 d-flex justify-content-between">
                              <a class="btn btn-label-dark btn-prev" href="quote_list.php">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Back</span>
                              </a>
                              <?php if($write_permit==1){ ?>
                              <button class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } else { ?>
                              <button disabled class="btn btn-warning btn-next" name="submit" value="submit" >
                                <span class="align-middle d-sm-inline-block me-sm-1">Update</span>
                                <i class="ti ti-check"></i>
                              </button>
                              <?php } ?>
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
  $fid = $_POST['fid'];
  $quote_no = $_POST['quote_no'];
  $date = $_POST['date'];
  $partyname = $_POST['partyname'];
  $supplyname = $_POST['supplyname'];
  $pono = $_POST['pono'];
  $mantot = $_POST['mantot'];
  $chargetot = $_POST['chargetot'];
  $gsttot = $_POST['gsttot'];
  $tottamnt1 = $_POST['tottamnt1'];
  $discounttot = $_POST['discounttot'];
  $finamnttot = $_POST['finamnttot'];
  $status = $_POST['status'];
  $pono = $_POST['pono'];

    $sql = "UPDATE quote SET quote_no='$quote_no',date='$date',partyname='$partyname',supplyname='$supplyname',mantot='$mantot',chargetot='$chargetot',gsttot='$gsttot',tottamnt1='$tottamnt1',discounttot='$discounttot',finamnttot='$finamnttot',status='$status',pono='$pono' where id='$cid'";
    $result = mysqli_query($conn, $sql);
  

  foreach ($_POST['companyname'] as $key => $val) {
    
    $rid = $_POST['rid'][$key];
    $companyname = $_POST['companyname'][$key];
    $styleno = $_POST['styleno'][$key];
    // $label = $_POST['label'][$key];
    $itemdesc = $_POST['itemdesc'][$key];
    $color = $_POST['color'][$key];
    $quantity = $_POST['quantity'][$key];
    $size = $_POST['size'][$key];
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
    $factoryloc = $_POST['factoryloc'][$key];
   
    
      $sql1 = "UPDATE quote1 SET companyname='$companyname',styleno='$styleno',itemdesc='$itemdesc',size='$size',quantity='$quantity',unit='$unit',inspect='$inspect',manday='$manday',charges='$charges',gst='$gst',totamnt='$totamnt',discount='$discount',finamnt='$finamnt',color='$color',inspect_level='$inspect_level',critical='$critical',major='$major',minor='$minor',factoryloc='$factoryloc' where id='$rid'";
      $result1 = mysqli_query($conn, $sql1);
    
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


    $sql4 = "UPDATE quote2 SET doct1='$p1',doct2='$p2',doct3='$p3',doct4='$p4' WHERE id='$fid'";
    $result4 = mysqli_query($conn, $sql4);
    

  if ($result) {
    
   echo "<script>alert('Quotation Updated Successfully');window.location='quote_list.php'</script>";

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
	  
	//  alert(k);
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



<!-- <script>
function delpurchaseentry() {


  var res = confirm("Are you sure to Delete Factory?");
if (res) {
    

  // alert(id);
  // alert(aid);
  if (id != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
if(data.sts == 'ok')
alert("Deleted Successfully");

 window.location="quote_upd.php";

      }
    }
    xmlhttp.open("GET","ajax/del_quote_factory.php?id="+id, true);

    xmlhttp.send();
  }
}
}
</script> -->