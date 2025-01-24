<?php include "config.php"; ?>


  <?php include "head.php"; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

          
     <!-- Content wrapper -->
     <div class="content-wrapper">
            <!-- Content -->
  
            <?php
 include('config.php');
$sid=base64_decode($_GET['cid']);

 $sql = " SELECT *,e.id as id FROM inspection_grn e WHERE e.cid='$sid'";
$result =mysqli_query($conn, $sql);
$so=mysqli_fetch_array($result);


$date=date('d/m/Y',strtotime($so['date']));
 $qtyresult=$so['qntyresult'];
 $styleresult=$so['styleresult'];
 $wmresult=$so['wmresult2'];
 $pack=$so['packresult'];
 $qremark=$so['qntyremark'];
 $sremark=$so['styleremarks'];
 $wmremark=$so['wmremarks'];
 $pkremark=$so['packremark'];
 $ordqty=$so['ordqty'];
 $pack1tot=$so['pack1tot'];
 $unpack1tot=$so['unpack1tot'];
 $unfinishtot=$so['unfinishtot'];
 $cartonqtytot=$so['cartonqtytot'];
 $totcarton=$so['totalcartontot'];
 $pack2tot=$so['pack2tot'];
 $unpack2tot=$so['unpack2tot'];
 $selectedcarton=$so['selectedcarton'];
 $cartonno=$so['cartonno'];
 $styleitem=$so['styleitem'];
 $approve=$so['approve'];
 $stylematerial=$so['stylematerial'];
 $stylecolor=$so['stylecolor'];
 $styleresult=$so['styleresult'];
 $styleremarks=$so['styleremarks'];
 $signe=$so['signe'];
 $signed1=$so['signed1'];
 $cartresult=$so['cartresult'];
 $cartremarks=$so['cartremarks'];

?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">

              <div id="mydiv" class="card  ">
                <div style=" text-align:center;padding:15px">
                      <span style="font-size:26px;font-family:table-icons" class="btn btn-outline-warning">Inspection</span>
                     </div>
                    
                <div class="card-body text-nowrap table-responsive">
                <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                <thead style="font-weight:bold;text-transform:uppercase">
                  <tr style="">
                  <th class="text-label-warning" height="100" style="text-align:center;font-size: 30px;font-weight:bold;padding-bottom:40px;width:400px;font-family:tabler-icons;color:#F5BD8C">CREDENCE<br>
                <span style="font-size:12px;color:#767383;font-family:none;text-transform:capitalize">"We Value beliefs & Standard"</span>
                 </th>

                  <th style="font-weight:bold;text-align:center;width:400px;"> Report<br><hr style="margin-left:-10px;margin-right:-10px"><div style="text-align:left" >
                  <span style="font-weight:bold;padding-bottom:25px">Inspection&nbsp;Report&nbsp;No. </span>:<span style="padding-left:20px;"><?php echo $so['dcno'];?></span><br><hr style="margin-left:-10px;margin-right:-10px">
                  <span style="font-weight:bold;padding-top:25px">Inspection&nbsp;Date</span><span style="padding-left:55px">:</span><span style="padding-left:20px;"><?php echo date('d-m-Y',strtotime($so['date']));?></span>
                </div>
            </th>
                  <th style="font-weight:bold;text-align:center;width:400px;"><hr style="margin-left:-10px;margin-right:-10px"><div style="text-align:center" >
                  <span style="font-weight:bold;padding-bottom:25px">Conclusion </span><br>
                  
                </div>
            </th>

                  
	</tr>
</table>
                </thead>
<br>
                 <tbody>
                      <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
               
                      
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:400px "  height="35">Client&nbsp;Name</td>
    <td colspan="2"align="left" style="font-weight:normal;border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:300px "><?php echo  $so['clientname'];?></td>

    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:500px ">Product Picture</td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Client&nbsp;country</td>
    <td colspan="2"align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['clientcountry'];?></td>
    <td colspan="4" rowspan="10" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><img src="uploads/<?php echo  $so['uploadimg'];?>"  style="width:400px;height:400px"></td>


</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Factory&nbsp;Name</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['factoryname'];?></td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">PO&nbsp;Number</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['pono'];?></td>
</tr>

<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">SKU /Article No.</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['sku'];?></td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Servic Performed</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['service'];?></td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Order&nbsp;Quantity&nbsp;/<br>&nbsp;Offer&nbsp;Quantity&nbsp;(pcs)</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['ordqty'];?></td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Inspector's&nbsp;Name</td>
    <td colspan="2"align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['inspectname'];?></td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Inspection&nbsp;Location</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['inspectloc'];?></td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Inspector's In-Out Time</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['inspecttime'];?></td>
</tr>  
</table>
<br>

<table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
    <tr height="70" align="left" style="font-weight:bold;border-collapse: collapse;">
        <td style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:400px" height="35"><u>Inspection&nbsp;Result :</u></td>
        <td colspan=""align="center" style="border-top: 1px solid black;border-left: none;border-right: 0px solid black;border-collapse: collapse;border-bottom: 1px solid black ;width:300px "><input type="checkbox" >&nbsp;&nbsp;Passed</td>
        <td colspan=""align="center" style="border-top: 1px solid black;border-left: none;border-right: 0px solid black;border-collapse: collapse;border-bottom: 1px solid black ;width:300px "><input type="checkbox" >&nbsp;&nbsp;Failed</td>
        <td colspan=""align="center" style="border-top: 1px solid black;border-left: none;border-right: 0px solid black;border-collapse: collapse;border-bottom: 1px solid black ;width:300px "><input type="checkbox" >&nbsp;&nbsp;Pending</td>
        <td colspan=""align="center" style="border-top: 1px solid black;border-left: none;border-right: 0px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;width:300px "><input type="checkbox" >&nbsp;&nbsp;Actual Finding</td>
    </tr>
    <tr align="left" style="border-collapse: collapse;">
        <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; " height="35">Remarks</td>
        <td colspan="6" rowspan="10" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "></td>
    </tr>
</table>
<br>

<table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                      
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:300px "  height="35">Inspection&nbsp;Conclusion</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Passed</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Failed</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Pending</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Actual Finding</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:700px ">Remarks</td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Sec 1 -&nbsp;Quantity</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($qtyresult=='Pass'){
        ?>
       <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($qtyresult=='Fail'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($qtyresult=='Pending'){
        ?>
     <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
    <?php
        if($qtyresult=='na'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $qremark;?></td>
</tr>

<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Sec&nbsp;2-&nbsp;Style,&nbsp;material, colour&nbsp;(conformity) </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($styleresult=='Pass'){
        ?>
       <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($styleresult=='Fail'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($styleresult=='Pending'){
        ?>
     <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
    <?php
        if($styleresult=='na'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $sremark;?></td>
</tr>

<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Sec 3 -&nbsp;Workmanship</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($wmresult=='Pass'){
        ?>
       <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($wmresult=='Fail'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($wmresult=='Pending'){
        ?>
     <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
    <?php
        if($wmresult=='na'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $wmremark;?></td>
</tr>

<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Sec 4 -&nbsp;Packing</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($pack=='Pass'){
        ?>
       <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($pack=='Fail'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($pack=='Pending'){
        ?>
     <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
    <?php
        if($pack=='na'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $pkremark;?></td>
</tr>

<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Sec 5 - Marking / Label / Trims</td>
    
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
    <?php
        if($cartresult=='Pass'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
   
   </td>
   <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
     <?php
        if($cartresult=='Fail'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
   
   </td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
         <?php
        if($cartresult=='Pending'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
   
    </td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($cartresult=='na'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $cartremarks;?></td>
</tr>
<!-- <tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Sec 6 - Onsite Test</td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "></td>
</tr>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Sec 7 - Client Special Requirement</td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2"align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><input type="checkbox"></td>
    <td colspan="2"align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "></td>
</tr> -->
</table>
<br>


<table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                     
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">S.No.</td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;">Problem Remarks - Need to be confirmed by client</td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">1.</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $qremark;?></td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">2.</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $styleremarks;?></td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">3.</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $wmremark;?></td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">4.</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $pkremark;?></td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">5.</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $cartremarks;?></td>
   </tr>

</table><br>


<div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">1.Quantity Details</span>
                     </div>
                     <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
               
                      
               <tr align="left" style="font-weight:bold;border-collapse: collapse;">
                 <td  rowspan="2" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">PO&nbsp;No.</td>
                 <td colspan="" rowspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Item&nbsp;No.</td>
                 <td colspan="" rowspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Order Qty(Pcs)</td>
                 <td colspan="3"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:300px ">Offered Quantity Breakdown(Pcs)</td>
                 <td colspan="" rowspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Quantity per Carton(Pcs)</td>
                 <td colspan="" rowspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Total number of cartons</td>
                 <td colspan="4" rowspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">Samples Picked</td>
             </tr>
             <tr align="left" style="border-collapse: collapse;font-weight:bold;">
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Packed</td>
                 <td colspan="" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Unpacked</td>
                 <td colspan="" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Unfinished</td>
                 <td style="font-weight:;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Packed</td>
                 <td colspan="" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Unpacked</td>
             </tr>
             <?php 
					$sql1 = "SELECT * FROM inspection_qty where cid='$sid'";
                    $result = mysqli_query($conn, $sql1);
                    while($rw11 = mysqli_fetch_array($result)){
                        ?>
             <tr align="center" style="border-collapse: collapse;">
                 <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><?php echo  $rw11['pono1']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['skuno']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['orderqty']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['pack1']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['unpack1']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['unfinish']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['cartonqty']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['totcarton']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['pack2']; ?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $rw11['unpack2']; ?></td>
             </tr>
             <?php
                    }
                    ?>
             <tr align="left" style="border-collapse: collapse;font-weight:bold">
                 <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><b>TOTAL</b></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $ordqty;?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $pack1tot;?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $unpack1tot;?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $unfinishtot;?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $cartonqtytot;?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $totcarton;?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $pack2tot;?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $unpack2tot;?></td>
             </tr>
             </table>
             <br>
             
             <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                     <b>Selected Cartons:</b>
  <tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Total&nbsp;No.of&nbsp;Selected&nbsp;Cartons:</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo $selectedcarton;?></td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="left" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Carton&nbsp;No&nbsp;/&nbsp;Item&nbsp;No</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $cartonno;?></td>
   </tr>
</table>
<br>
             <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
  <tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Result</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo $qtyresult;?></td>

   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Remarks</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $qremark;?></td>

   </tr>

</table><br>

<div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">2.Style, Material, Color Confirmity</span>
                     </div>
                     <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
               
                      
               <tr align="left" style="font-weight:bold;border-collapse: collapse;">
                 <td  rowspan="" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Item&nbsp;No.</td>
                 <td colspan="5"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:300px ">APPROVED&nbsp;SAMPLE/DIGITAL&nbsp;IMAGE&nbsp;PROVIDED&nbsp;BY</td>
                 <td colspan="" rowspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">STYLE&nbsp;&&nbsp;MATERIAL&nbsp;COLOR&nbsp;CONFORMITY</td>
                 <td colspan="" rowspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">COLOR&nbsp;OR&nbsp;SHADE&nbsp;CONFORMITY</td>
                 <td colspan="" rowspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">result</td>
             </tr>
             <?php
             $sql12 = "SELECT * FROM inspection_style WHERE cid = '$sid'";
             $result12 = mysqli_query($conn, $sql12);
            while ($row1=mysqli_fetch_array($result12))
            {
              ?>
             <tr align="left" height="40" style="border-collapse: collapse;">
                <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['styleitem'];?></td>
                 <td colspan="5" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['approve'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['stylematerial'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['stylecolor'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['styleresult'];?></td>
             </tr>
             <?php
             }
             ?>
             
             
             </table><br>

<table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
  <!-- <tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Result</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo $styleresult;?></td>
   </tr> -->
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px  "  height="35">Remarks</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $styleremarks;?></td>
   </tr>

</table>
<br>
<div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">3.WORKMANSHIP SUMMARY</span>
                     </div>
                     <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
               
                      
               <tr align="left" style="font-weight:bold;border-collapse: collapse;">
                 <td  rowspan="3" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">PO&nbsp;No.</td>
                 <td colspan="" rowspan="3" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Item&nbsp;No.</td>
                 <td colspan="" rowspan="3" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Sample Size(Pcs)</td>
                 <td colspan="6"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:300px ">Defects Summary</td>
                 <td colspan="" rowspan="3" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">Result</td>
             </tr>
             <tr align="left" style="border-collapse: collapse;">
                 <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Critical</td>
                 <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">major</td>
                 <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">minor</td>
             </tr>
             <tr align="left" style="border-collapse: collapse;">
                 <td style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Allowed</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Found</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Allowed</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Found</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Allowed</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">Found</td>
             </tr>
               <?php 
               $sql3 = "SELECT * FROM inspection_wm_summary where cid='$sid'";
               $result = mysqli_query($conn, $sql3);
               while($rw3 = mysqli_fetch_array($result)){
                ?>
             <tr align="left" style="border-collapse: collapse;">
                 <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><?php echo  $rw3['wmpono'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['itemno'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['size'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['callow'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['cfound'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['majallow'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['majfound'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['minallow'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['minfound'];?></td>
                 <td rowspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw3['wmresult1'];?></td>
             </tr>
             <?php
               }
               ?>
             <tr align="left" style="border-collapse: collapse;font-weight:bold">
                 <td align="right" colspan="2" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Total</td>
                 <td   align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['sizetot'];?></td>
             <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['callowtot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['cfoundtot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['majallowtot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['majfoundtot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['minallowtot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['minfoundtot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so[''];?></td>
             </tr>
             <tr align="left" style="border-collapse: collapse;">
                 <td colspan="10" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">
                 NOTE: &nbsp;<?php echo  $so['wmnotes'];?>
                 </td>
                  </tr>
            
             </table><br>

<div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">3 A. WORKMANSHIP RECORD</span>
                     </div>
                     <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
               
                      
               <tr align="left" style="font-weight:bold;border-collapse: collapse;">
                 <td  rowspan="" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Defect&nbsp;Code.</td>
                 <td colspan="5"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:300px ">Defect Description</td>
                 <td colspan="" rowspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">critical</td>
                 <td colspan="" rowspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">major</td>
                 <td colspan="" rowspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:200px ">minor</td>
             </tr>
             <?php
             $sql12 = "SELECT * FROM inspection_wm_records WHERE cid = '$sid'";
             $result12 = mysqli_query($conn, $sql12);
            while ($row1=mysqli_fetch_array($result12))
            {
              ?>
             <tr align="left" height="40" style="border-collapse: collapse;">
                <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['defectno'];?></td>
                 <td colspan="5" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['defectdesc'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['wmr_critical'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['wmr_major'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row1['wmr_minor'];?></td>
             </tr>
             <?php
             }
             ?>
             <tr align="left" style="border-collapse: collapse;font-weight:bold">
                 <td colspan="6"  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><b>Total Found</b></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['critfoundtot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['majfoundtot1'];?></td>
                 <td rowspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['minfoundtot1'];?></td>
             </tr>
             
             <tr align="left" style="border-collapse: collapse;font-weight:bold">
                 <td colspan="6"  align="right" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><b>acceptance</b></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['critaccepttot'];?></td>
                 <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['majaccepttot'];?></td>
                 <td rowspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['minaccepttot'];?></td>
             </tr>
             
             </table><br>

             <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Result</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo $so['wmresult2'];?></td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="left" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Remarks</td>
    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['wmremarks'];?></td>
   </tr>
</table><br>


    

<!-- <tr align="left" style="border-collapse: collapse;">
    <td align="center" style="width:650px;font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;"  height="35"><img src="uploads/<?php  echo $row2['defimg'];?>" style=" width:300px;height:300px"></td>

    <td colspan="2" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:650px "><?php echo  $row2['defimg_remarks'];?></td>

   </tr> -->
 
<!-- </table> -->
<br>

<div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">4.Packing Details</span>
                     </div>
                     <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
               
                      
               <tr align="left" style="font-weight:bold;border-collapse: collapse;">
                 <td  rowspan="2" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Item&nbsp;No&nbsp;/ Size</td>
                 <td colspan="2"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">QTY/Master carton&nbsp;(pcs)</td>
                 <td colspan="2"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">QTY/inner pack (pcs)</td>
                 <td colspan="2"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Carton Gross weight (Kgs)</td>
                 <td colspan="2"  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Combine master carton (CM)</td>
                  </tr>
             <tr align="left" style="border-collapse: collapse;">
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">spec</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">actual</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">spec</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">actual</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">spec</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">actual</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">spec</td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">actual</td>
             </tr>
             <?php 
             $sql14 = "SELECT * FROM inspection_packing WHERE cid='$sid'";
             $result14 = mysqli_query($conn, $sql14);
             while($rs1=mysqli_fetch_array($result14)){

              ?>
             <tr height="35" align="left" style="border-collapse: collapse;">
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['pkpono'];?></td>
                 <td align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><?php echo $rs1['qtyspec'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['qtyactual'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['innerspec'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['inneractual'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['grossspec'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['grossactual'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['dimspec'];?></td>
                 <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rs1['dimactual'];?></td>
             </tr>
            <?php
             }
             ?>
             </table><br>

                     <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
               
               <tr align="left" style="border-collapse: collapse;">
                 <td   style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px;padding-bottom:30px "  height="35"><b>Packing method :</b> &nbsp;&nbsp;<?php echo $so['packmethod'];?></td>
                 </tr>
                 </table><br>

             <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                <b>Carton Details:</b>
             <tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Carton poly</td>
    <td  colspan="7" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo $so['cartonply'];?></td>

   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Fastening method</td>
    <td colspan="7" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['fastmethod'];?></td>

   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">material</td>
    <td colspan="7"  align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo  $so['material'];?></td>

   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Metal Stripped?</td>
    <td colspan="7"  align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo   $so['metal'];?></td>

   </tr>
             </table><br>

             <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
             <tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35"><b>Result</b></td>
    <td  colspan="7" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo  $so['packresult'];?></td>

   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><b>Remarks</b></td>
    <td colspan="7" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $so['packremark'];?></td>

   </tr>

             </table><br>

             <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">5.Carton marketing/ Labelling/ Trims</span>
                     </div>
             <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                      
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td rowspan="2" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:400px ">Specification</td>
    <td colspan="3" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">result</td>
    <td rowspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:400px ">observations:</td>
</tr>
<tr align="left" style="border-collapse: collapse;font-weight:bold">
  <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Conform</td>
    <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">Not Conform</td>
    <td colspan=""  align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:100px ">NA</td>
</tr>

             <?php
             $query = "SELECT * FROM inspection_carton m left join carton_master n on m.specs = n.id  WHERE cid='$sid'";
             $result = mysqli_query($conn, $query);
             while($row = mysqli_fetch_array($result)){
                $res = $row['result'];
                ?>
<tr align="left" style="border-collapse: collapse;">
    <td style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><?php echo $row['specs'];?></td>
    <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
        <?php
        if($res=='Conform'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
          <?php
        if($res=='Not Conform'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    
    </td>
    <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; ">
          <?php
        if($res=='na'){
        ?>
    <input type="checkbox" Checked>
    <?php }
    else{ ?>
         <input type="checkbox" >
   <?php } ?>
    </td>
    <td colspan="" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $row['observation'];?></td>
</tr>
<?php
             } ?>
</table>
<br>

<table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
             <tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35"><b>Result</b></td>
    <td  colspan="7" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo $cartresult;?></td>
   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><b>Remarks</b></td>
    <td colspan="7" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $cartremarks;?></td>
   </tr>

             </table><br>
             <div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">6.Onsite Test</span>
                     </div>
                     <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                     
                     <tr align="left" style="font-weight:bold;border-collapse: collapse;">
                       <td align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">test</td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:80px">Sample&nbsp;Size</td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:300px">Method&nbsp;of&nbsp;Testing</td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:300px">Details&nbsp;of&nbsp;Testing&nbsp;(tested parts & failure details)</td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:80px">Result</td>
                      </tr>
                      <?php 
					$sql32 = "SELECT * FROM inspection_onsite where cid ='$sid' order by id asc";
                    $result = mysqli_query($conn, $sql32);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
                   <tr align="left" style="border-collapse: collapse;">
                       <td align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><?php echo  $rw['testtype']; ?></td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw['dropsize']; ?></td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw['dropmethod']; ?></td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw['dropdetail']; ?></td>
                       <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo $rw['dropresult']; ?></td>
                      </tr>
                  <?php
                    }
                    ?>
                   </table><br>

                   <table  class=" table table-bordered" style="border :none;text-transform:uppercase" border="1" >
                     
                     <tr align="left" style="border:none;">
                       <td colspan="" align="left" style="border-left: 0px solid black;border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-collapse: collapse;font-weight:bold; "  height="35">Measurement chart provided by:</td>
                       <td  align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;">
                       <?php
                  if($so['measurement']=='Buyer'){
                     ?>
                <input type="checkbox" Checked>&nbsp;&nbsp;Buyer
                    <?php  } else { ?>
                  <input type="checkbox" >&nbsp;&nbsp;Buyer
                   <?php } ?> 
                       
                    </td>
                       <td colspan="" align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;">
                       <?php
                  if($so['measurement']=='Manufacturer'){
                     ?>
                <input type="checkbox" Checked>&nbsp;&nbsp;Manufacturer
                    <?php  } else { ?>
                  <input type="checkbox" >&nbsp;&nbsp;Manufacturer
                   <?php } ?>  
                    </td>
                       <td colspan="" align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;">
                         <?php
                  if($so['measurement']=='Not Available'){
                     ?>
                <input type="checkbox" Checked>&nbsp;&nbsp;Not Available
                    <?php  } else { ?>
                  <input type="checkbox" >&nbsp;&nbsp;Not Available
                   <?php } ?>   
                    </td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                      </tr>

                     <tr align="left" style="border:none;">
                       <td colspan="" align="left" style="border-left: 0px solid black;border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-collapse: collapse;font-weight:bold; "  height="35">Measurement Result:</td>
                       <td  align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;">
                       <?php
                  if($so['measureresult']=='Within Tolerance'){
                     ?>
                <input type="checkbox" Checked>&nbsp;&nbsp;Within Tolerance
                    <?php  } else { ?>
                  <input type="checkbox" >&nbsp;&nbsp;Within Tolerance
                   <?php } ?> 
                       
                    </td>
                       <td colspan="" align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;">
                       <?php
                  if($so['measureresult']=='Beyond Tolerance'){
                     ?>
                <input type="checkbox" Checked>&nbsp;&nbsp;Beyond Tolerance
                    <?php  } else { ?>
                  <input type="checkbox" >&nbsp;&nbsp;Beyond Tolerance
                   <?php } ?>  
                    </td>
                       <td colspan="" align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;">
                         <?php
                  if($so['measureresult']=='Actual Finding'){
                     ?>
                <input type="checkbox" Checked>&nbsp;&nbsp;Actual Finding
                    <?php  } else { ?>
                  <input type="checkbox" >&nbsp;&nbsp;Actual Finding
                   <?php } ?>   
                    </td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black;"></td>
                      </tr>
                  
                   <tr align="left" style="border:none;">
                       <td colspan="" align="left" style="font-weight:bold;border-left: 0px solid black;border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-collapse: collapse; "  height="35">Tolerance provided by: </td>
                       <td  align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "><?php echo  $so['tolprovide']; ?></td>

                       <td colspan="" align="left" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "></td>
                       <td colspan="" align="center" style="border-top: 0px solid black;border-collapse: collapse;border-right: 0px solid black;border-bottom: 0px solid black ;border-left: 0px solid black; "></td>
                      </tr>
                   </table><br>

                   <!-- <table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px "  height="35">Result</td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;"><?php echo  $so['result']; ?></td>

   </tr>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="font-weight:bold;border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35">Remarks</td>
    <td colspan="2" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "></td>
   </tr>

</table> -->

<div style=" text-align:center;padding:15px">
                      <span style="font-size:16px;font-family:table-icons" class="btn btn-outline-primary">7.Client Special Requirement</span>
                     </div>
<table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
                     
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td align="center" colspan="" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:100px; "  >S.No.</td>
    <td align="left" colspan="" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:600px; "  >Client Requirement</td>
    <td align="center" colspan="" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:120px; "  >Result</td>
   </tr>
   <?php 
   $sno=1;
					$sql = "SELECT * FROM inspection_client where cid='$sid' order by id asc";
                    $result = mysqli_query($conn, $sql);
                    while($rw = mysqli_fetch_array($result))
					{ ?>
<tr align="left" style="border-collapse: collapse;">
    <td align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "height="35"  ><?php echo $sno; ?></td>

    <td colspan="" align="left" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo   $rw['clientreq']; ?></td>

    <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo   $rw['clientresult']; ?></td>

   </tr>
<?php
             $sno++;
                   }
                    ?>
</table><br> 

<table  class=" table table-bordered" style="border-collapse:collapse;text-transform:uppercase" border="1" >
  <tr align="left" style="font-weight:bold;border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse;width:600px "  height="35">Signed</td>
    <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black;width:600px ">Signed</td>

   </tr>
   <?php
  $sql11 = "SELECT * FROM employee where id='$signed1'";
  $result = mysqli_query($conn, $sql11);
  $rw4 = mysqli_fetch_array($result);
  ?>
<tr align="left" style="border-collapse: collapse;">
    <td colspan="" align="center" style="border-left: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-collapse: collapse; "  height="35"><?php echo  $signe; ?></td>

    <td colspan="" align="center" style="border: 1px solid black;border-top: 1px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 1px solid black ;border-left: 1px solid black; "><?php echo   $rw4['name']; ?></td>

   </tr>

</table>

<br>
<br>
<br>
<br>
<div style="text-align:center">****End Of Report****</div>
</tbody>
</div>
              </div> 

                
             
      <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="inspect_list.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-warning mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
        </div>
        </div>
        
            <!-- / Content -->

          

            <div class="content-backdrop fade"></div>
          </div> </div>
          <!-- Content wrapper -->
         
          
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
<script src="jquery-1.4.4.min.js" type="text/javascript"></script>



<script type="text/javascript">

    function PrintElem(elem) {
        Popup($(elem).html());
    }

    function Popup(data) {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>');
        mywindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; }');
        mywindow.document.write('table, th, td { border: 1px solid #000; }');
        mywindow.document.write('th, td { padding: 10px; }');
        mywindow.document.write('th { background-color: #f2f2f2; font-weight: bold; }');
        mywindow.document.write('tr:nth-child(even) { background-color: #f9f9f9; }');
        mywindow.document.write('</style>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>