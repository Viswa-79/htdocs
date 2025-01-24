<?php
require("config.php");
session_start();



function no_to_words($no)
{   
 $words = array('0'=> '' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fouteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Fourty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred &','1000' => 'Thousand','100000' => 'Lakh','10000000' => 'Crore');
    if($no == 0)
        return ' ';
    else {
	$novalue='';
	$highno=$no;
	$remainno=0;
	$value=100;
	$value1=1000;       
            while($no>=100)    {
                if(($value <= $no) &&($no  < $value1))    {
                $novalue=$words["$value"];
                $highno = (int)($no/$value);
                $remainno = $no % $value;
                break;
                }
                $value= $value1;
                $value1 = $value * 100;
            }       
          if(array_key_exists("$highno",$words))
              return $words["$highno"]." ".$novalue." ".no_to_words($remainno);
          else {
             $unit=$highno%10;
             $ten =(int)($highno/10)*10;            
             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);
           }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Invoice Print</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Libre Barcode 39' rel='stylesheet'>
<style type="text/css">
    	.container{
    margin-top:20px;
    background:#eee;
}
    
    
    
    .invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,
.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #0d6efd;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #0d6efd
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #ddd;
    color: black
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice {
    background: #fff;
    padding: 20px
}
.barcode {
    font-family: 'Libre Barcode 39';font-size: 22px;
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}
    
.invoice-hsn {
    margin: 0 -20px;
    background: #f0f3f4;
 padding-bottom: 5px;
    padding-top: 10px;
    padding-right: 20px;padding-left: 20px;
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

    
    
    
    
.invoice-from,
.invoice-to {
    padding-right: 15px
}
    .invoice-hsn1,{
    padding-right: 0px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 10px
}

.invoice-price {
    background: #ddd;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 10px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}


.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: blue;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 20px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 5px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
    {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: auto;
  padding: 10px;
  height: auto; /* Should be removed. Only for demonstration */
}
    .column1 {
  float: right;
  width: auto;
  padding: 10px;
  height: auto; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
  
    </style>
       <script>
       $(document).ready(function () {
            $(function () {
                var doc = new jsPDF();
                var specialElementHandlers = {
                    '#editor': function (element, renderer) {
                        return true;
                    }
                };
 
                $('#cmd').click(function () {
                    doc.fromHTML($('#mydiv').html(), 15, 15, {
                        'width': 170,
                        'elementHandlers': specialElementHandlers
                    });
                    doc.save('sample-file.pdf');
                });
            });
        });
    </script>
     <script src="jquery-1.4.4.min.js" type="text/javascript"></script>
     <script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.1.min.js" > </script> 
</head>

<?php

	$sid=base64_decode($_REQUEST['cid']);
	
	
	if($sid=='')
{
$s1="SELECT * FROM sales_invoice order by id desc";
$sel=mysqli_query($connection,$s1);
$row=mysqli_fetch_array($sel);

$sid=$row['cid'];
}
else
{
$sid=base64_decode($_REQUEST['cid']);
}

	
// $wz=mysqli_query($conn,"select * from address");
// $wz1=mysqli_fetch_array($wz);

// $color=$wz1['color'];
// $font_color=$wz1['font_color'];
// $ino_prefix=$wz1['ino_prefix'];
// $ino_year=$wz1['ino_year'];
// $ino_start=$wz1['ino_start'];

// $logo=$wz1['logo'];
// $logo_height=$wz1['logo_height'];
// $logo_width=$wz1['logo_width'];

// $logo2=$wz1['logo2'];
// //echo $logo2;
// $logo_height2=$wz1['logo_height2'];
// $logo_width2=$wz1['logo_width2'];

// $terms=$wz1['terms'];

?>

<?php

 $s1="SELECT * FROM profomo where id='$sid' order by id desc";
$sel=mysqli_query($conn,$s1);
$count=mysqli_num_rows($sel);
$wz1=mysqli_fetch_array($sel);

$invoiceno=$wz1['profomo'];
$partyname=$wz1['partyname'];
$gsttype=$wz1['gsttype'];
$gstper=$wz1['gstpercent'];
$date=date('d-m-Y',strtotime($wz1['date']));

?>
<?php
     	
$f51=strlen($invoiceno);
if($f51=='1')
{
$f52='00';
}
if($f51=='2')
{
$f52='0';
}
if($f51=='3')
{
$f52='';
}

  
//   $invno=$ino_prefix.$f52.$invoiceno."/".$ino_year; 
      
       ?>
	   
	   <?php

	$rz1=mysqli_query($conn,"select * from address");
	$rz2=mysqli_fetch_array($rz1);
	?>
<body >
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div id="mydiv" class="container" style="padding-top:5px">
<div class="col-md-12">
<div class="invoice">

<div class="invoice-company text-inverse f-w-600" >
<span class="pull-right hidden-print">
    <a  class="btn btn-sm btn-white m-b-10 p-l-5"><b>GST No : <?php echo $rz2['gstno'];?></b></a>
    <a  class="btn btn-sm btn-white m-b-10 p-l-5"><b>PAN No : <?php echo $rz2['pan'];?></b></a>
    <a  class="btn btn-sm btn-white m-b-10 p-l-5" style="background-color: blue;color: white">PROFORMA INVOICE</a>
<a  class="btn btn-sm btn-white m-b-10 p-l-5" style="background-color: green;color: white"> ORIGINAL</a>

</span>
<img src="..\assets\img\avatars\credence1.png" alt="<?php echo $rz2['logo']; ?>" width="160" height="60">
</div>

<div class=" invoice-header ">
<div class="col-md-5 invoice-from" style="padding-left:0px;padding-right:1px;">
<small style="text-transform:uppercase"><b>Our Details :</b></small>
<address style="margin-bottom: 0rem;" class="m-t-1 m-b-1">
<strong class="text-inverse"><?php echo $rz2['companyname']; ?></strong><br>
<span style="text-align:justify"><?php echo $rz2['address']; ?></span><br>
<?php echo $rz2['city']; ?> -
<?php echo $rz2['pincode']; ?>,
<?php echo $rz2['state']; ?>, 
<?php echo $rz2['country']."."; ?><br>
<strong>EMail : </strong> <?php echo $rz2['emailid'];?><br>
<strong>Mob No : </strong><?php echo $rz2['mobile'];?><br>
</address>
</div>

<div class="col-md-4 invoice-to" style="padding-right:1px;text-transform:uppercase">
    <?php  
          $a0="SELECT * FROM partymaster where id='$partyname'";
//echo $a0;

$a1=mysqli_query($conn,$a0);

$r1=mysqli_fetch_array($a1);
?>
    <small><b>Client Details :</b></small>
<address style="margin-left: 0rem" class="m-t-1 m-b-1">
<strong class="text-inverse"><?php echo $r1['name'];?></strong><br>
<?php echo $r1['address'];?>, <?php echo $r1['city'];?> -
<?php echo $r1['pincode'];?>,<br>
<?php echo $r1['state'];?>, <?php echo $r1['country'].".";?><br>
<strong >GST NO : </strong><?php echo $r1['gstno'];?> <br>
<!-- <strong style="text-transform:capitalize">Mob NO :</strong> <?php echo $r1['mobileno'];?>  -->
</address>
</div><hr>
<div class="col-md-3" style="text-align:left;padding-left:0px;padding-right:0px;">
<div  class="invoice-detail">
<strong>Proforma No : </strong><?php echo $invoiceno;?><br>
<strong>Date : </strong><?php echo $date;?><br>
   <!-- <strong>Quotation No : <?php echo $wz1['orderno'];?> </strong><br>
    <strong>Date :  <?php 
	if($wz1['orderdate']!='0000-00-00')
	{
	echo $orderdate;
	
	}?></strong><br>
<strong>Payment Terms : </strong>Immediate -->
</div>
</div>
</div>


<div class="invoice-content">
<br>

<table>
<thead>
<tr>
<th>#</th>
<th class="text-left">Description&nbsp;of&nbsp;Service</th>
<th class="text-center">SAC Code</th>
<th class="text-center">Manday</th>
<th class="text-center">Charges</th>
<!-- <th class="text-center">GST (%)</th> -->
<th class="text-right">Amount</th>
</tr>
</thead>
<tbody>
<?php
		   $sno=1;$i=0;$j=0;
           $tbas=0; $tgsta=0; $tamount=0;
				   	$sql = "SELECT *,sum(gst) as gst,sum(charges) as charges,sum(manday) as manday,sum(totamnt) as totamnt FROM profomo1 m left join assignment n on m.factoryname=n.id where cid='$sid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

	?>
<tr>
<td class=""></td>
<td class="text-left">
<h3><a target="_blank" ><b><u>Description</u></b><br><br></a>
</h3><?php echo $wz1['description']; ?></td>
<td class="saccode" style="text-align: center"><?php echo $row['sac']; ?></td>
<td class="hsn" style="text-align: center"><?php echo $row['manday']; ?></td>
<td class="qty" style="text-align: center"><?php echo number_format((float)$row['charges'], 2, '.', '');?></td>
<!-- <td class="qty" style="text-align: center"><?php echo number_format((float)$row['gst'], 2, '.', '');?></td> -->
<td class="total"><?php echo number_format((float)$row['totamnt'], 2, '.', ''); ?></td>
</tr>
<tr>
<td class=""> </td>
<td class="text-left">
<a><a target="_blank" ><br></a>
</a></td>
<td class="saccode" style="text-align: center"></td>
<td class="hsn" style="text-align: right"></td>
<td class="qty" style="text-align: center"><b>Total</b></td>
<td class="total"><?php echo number_format((float)$row['totamnt'], 2, '.', ''); ?></td>
</tr>



</tbody>
</table>
  <?php
 
 $sql1 = "SELECT * FROM profomo where id='$sid'";
 $result1 =mysqli_query($conn, $sql1);
 $rw1=mysqli_fetch_array($result1);
$grossvalue=$rw1['grossamt'];
$gst=$rw1['gstpercent'];


$netvalue=$rw1['net'];
$round=$rw1['round'];
$taxable=$rw1['grossamt'];
$gstval= $taxable;
  ?>

<div class="invoice-price">
<div class="invoice-price-left">
<div class="invoice-price-row">
<div class="sub-price">
<small>TAXABLE VALUE</small>
<span class="text-inverse">Rs.<?php echo number_format((float)$grossvalue, 2, '.', ''); ?></span>
</div>
<div class="sub-price">
<i class="fa fa-plus text-muted"></i>
</div>
<div class="sub-price">
<small>GST </small>
<span class="text-inverse"><?php echo $gstper; ?> %</span>
</div>
</div>
</div>
<div class="invoice-price-right" >
<small ><b>NET TOTAL</b></small> <span class="f-w-600"><b>Rs.<?php echo number_format((float)$netvalue, 2, '.', ''); ?></b></span>
</div>
</div>

</div>
    
    <div class="invoice-price-amt">
<div class="invoice-price-left">
<div class="invoice-price-row">

<a  class="btn btn-sm btn-white m-b-10 p-l-5" style="background-color: blue;color: white">Amount In Words</a>
<a style="width: 85%;text-align: left"  class="btn btn-sm btn-white m-b-10 p-l-5"><?php echo no_to_words(ceil($netvalue)).'Only.';?>. </a>

</div>
</div>

</div>
<div class="invoice-hsn" style="margin-top:50px">

  <div>
 
  <div  style="border-radius: 5px">
    <table   style="border:1px solid black;border-collapse:collapse;">
        <h5>SAC Calculation :</h5>
<tr>
<th style="border:1px solid black;padding: 8px;text-align: center" rowspan="2">SAC CODE</th>
    <th style="border:1px solid black;padding: 8px;text-align: center" rowspan="2">TAXABLE VALUE</th>
    <th style="border:1px solid black;padding: 5px;text-align: center" colspan="2" >CGST</th>
    <th style="border:1px solid black;padding: 5px;text-align: center" colspan="2">SGST</th>
    <th style="border:1px solid black;padding: 5px;text-align: center" colspan="2">IGST</th>
    <th style="border:1px solid black;padding: 8px;text-align: center" 	rowspan="2">TOTAL GST</th>
</tr>
<tr>
	<td style="border:1px solid black;padding: 5px" align="center">%</td><td style="border:1px solid black;padding: 5px"align="center">Value</td>
	<td style="border:1px solid black;padding: 5px" align="center">%</td><td style="border:1px solid black;padding: 5px" align="center">Value</td>
	<td style="border:1px solid black;padding: 5px" align="center">%</td><td style="border:1px solid black;padding: 5px" align="center">Value</td>
</tr>
 <?php
	$tbas=0;
    $tgstamt=0;
	$rq="SELECT sum(taxable) as taxable FROM profomo1  where cid='$sid' ";
	$rq0=mysqli_query($conn,$rq);
	$rq1=mysqli_fetch_array($rq0);
	
	$tot=$rq1['taxable'];
	

if($gsttype==1){
    $cgst=($gstper)/2;
    $cgsta=$tot*$cgst/100;
 
    $sgst=($gstper)/2;
    $sgsta=$tot*$sgst/100;

    $igst=0;
    $igsta=0;
    $gt=$cgsta + $sgsta;
}
if($gsttype==2){
    $igst=($gstper);
    $igsta=$tot*$igst/100;
    
    $cgst=0;
    $cgsta=0;
 
    $sgst=0;
    $sgsta=0;
    $gt=$igsta;
}
    

$gstamt=$gt;
	?>
<tr>
<td style="border:1px solid black;padding: 5px;text-align: center"><?php echo $rq1['sac'];?></td>
    <td style="border:1px solid black;padding: 5px" align="right"><?php echo round($tot,2);?></td>
	<td style="border:1px solid black;padding: 5px" align="center"><?php echo $cgst; ?></td>
    <td style="border:1px solid black;padding: 5px" align="right"><?php echo number_format((float)$cgsta, 2, '.', ''); ?></td>
	<td style="border:1px solid black;padding: 5px" align="center"><?php echo $sgst; ?></td>
	<td style="border:1px solid black;padding: 5px" align="right"><?php echo number_format((float)$sgsta, 2, '.', ''); ?></td>
	<td style="border:1px solid black;padding: 5px" align="center"><?php echo $igst; ?></td>
	<td style="border:1px solid black;padding: 5px" align="right"><?php echo number_format((float)$igsta, 2, '.', ''); ?></td>
	<td style="border:1px solid black;padding: 5px" align="right"><?php echo number_format((float)$gstamt, 2, '.', ''); ?></td>
</tr>
<?php 
 $tbas+=$rq1['bas'];
 $tgstamt+=number_format((float)$gstamt, 2, '.', '');
 
	?>
<tr>
    <td colspan="8" style="border-right:1px solid black;text-align:right">TOTAL</td>
    <td style="text-align:right;padding: 5px"><?php echo number_format((float)$tgstamt, 2, '.', '');;?></td>
</tr>
</table>

  </div>
</div>      
     
        
</div><br>
    <div class="invoice-price">
<div class="invoice-price-left">
<div class="invoice-price-row">
    
    <div style="background-color: blue;color: white;padding: 10px;margin-top:5px"  >
<span >Account Details</span>
</div>
<div class="sub-price">
<small>Account Name</small>
<span style="font-size: 13px" class="text-inverse"><?php echo $rz2['acc_name']; ?></span>
</div><div class="sub-price">
<small>Account Number</small>
<span style="font-size: 13px" class="text-inverse"><?php echo $rz2['acno']; ?></span>
</div><div class="sub-price">
<small>IFSC Code</small>
<span style="font-size: 13px" class="text-inverse"><?php echo $rz2['ifsc']; ?></span>
</div><div class="sub-price">
<small>Bank Name & Branch</small>
<span style="font-size: 13px" class="text-inverse"><?php echo $rz2['branch']; ?>
</span>
    
</div><div class="sub-price">
<span class="text-inverse"><img src="..\assets\img\avatars\kvb1.png" alt="<?php echo $rz2['logo']; ?>" width="60" height="60">
</span>
    
</div>


</div>


</div>

</div>


   <!-- <a  class="btn btn-sm btn-white m-b-10 p-l-5" style="background-color: blue;color: white">Outstanding Balance</a>
 <a style="width: 85%;text-align: left"  class="btn btn-sm btn-white m-b-10 p-l-5">#TRUE004-23/24 . 5,760.00 Gst Amount + #TRUE005-23/24 . 75,520.00 = <b>Rs. 81,280.00</b> </a><br> -->
<!-- <div style="text-align: justify" class="invoice-note">
    <H5>Terms & Conditions:</H5>
    
<b>1. Payment:</b> Immediate payment upon invoice receipt. We accept only Online Transfer through account. Include invoice number with payment.
<b>2. Delivery:</b> Upon payment, receive an email with instllation/access instructions.<b>3. Ownership & Use:</b> Purchase grants non-transferable license for personal/business use. Copyright and Source Code remain with Seller.<b>4. Refunds:</b>
Due to digital nature, sales are final. No refunds products are tailored to customer requirements.
<b>5. Compatibility & Support:</b> Ensure product compatibility. No guaranteed compatibility; limited technical support.<b>6. License Restrictions:</b>No reselling, redistributing, or sublicensing. Unauthorized use leads to license termination.<b>7. Privacy & Data:</b>
No personal data collected or processed; adheres to Privacy Policy.<b>8. Warranties:</b>Product provided "as is." No guarantees for fitness or error-free operation.<b>9. Limitation of Liability:</b> Liability limited to product's purchase price. Not liable for indirect damages.<b>10. Governing Law:</b> Agreement governed by [india]'s laws. Disputes under exclusive Tiruppur Jurisdiction courts.

</div> -->
    
 

    <div class="invoice-hsn" style="margin-bottom:-20px">
    <table  align="center" style=" border-top:1px solid #000000; border-collapse: collapse;">
 
 <tr>
 <td style="border:none; border-right:none;" >
  <p align="justify"><br />

 <b>For <?php echo $rz2['companyname'];?>,
  </b> <br />
   <br /><br /><br />
 <b> (Authorized Signatory)</b>
 </p></td>

 
 </tr>
  </table>
</div>
</div>

</div>
</div>
<br>
<br>
<br>
<table width="full" align="left" style="margin-left:20px;margin-right:20px;border: 1.5px solid black;border-collapse: collapse;margin-bottom:30px">
  <tr align="center" style="font-weight:bold;border-collapse: collapse;text-transform:uppercase;font-size:15px">
    <td style="border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-collapse: collapse; "  height="35">S.No</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999;">Inspection Date</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999;">Factory Name</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">Factory Loc</td>
    <td style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">Styleno</td>
	 <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">offer qty</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">inspect type</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">Manday</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">charges</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">total amount</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">RATE ADOPTED ON BILLING DATE</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">TRANSPORT & HOSTEL CHARGES</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">REMARKS REPORT NO.</td>
  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black;border-left: 1px solid #999; ">INSPECTION BOOKED BY</td>

</tr>
  <?php

		   $sno=1;$i=0;
           $tlbundle=0; $tlpcs=0; $tcharge=0; $tomtrs=0;
$sql = "SELECT * FROM profomo1 m left join assignment n on m.factoryname=n.id left join inspect_type s on m.inspecttype=s.id where m.cid='$sid' order by m.id asc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
	?>
  <tr style="border-bottom:none;border-collapse: collapse;font-size:12px;">
    <td height="" style="border-left: 2px solid black;border-bottom:none;border-top:none;border-collapse: collapse;
   border-right: 1px solid #999;"><div align="center"><?php echo $sno;?> </div></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo date('d-m-Y',strtotime($row['insdate'])) ?></td>
    <td height="" align="left" style="padding-left:5px;border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999;   border-collapse: 2px solid black;border-bottom: collapse; padding-left:5px;"><?php echo $row['name'];?> </td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['factoryloc']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['styleno']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['orderqty']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['type']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['manday']; ?></td>
    <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['charges']; ?></td>
    <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['totamnt']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['billdate']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['th_charges']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['remarkreport']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['inspectbook']; ?></td>
  </tr>
  <?php
	
	$tlbundle+=number_format((float)$row['orderqty'], 2, '.', '');
	$tlpcs+=number_format((float)$row['manday'], 2, '.', '');
	$tcharge+=number_format((float)$row['charges'], 2, '.', '');
  $tomtrs+=number_format((float)$row['totamnt'], 2, '.', '');

	$sno++;
	 }
	  ?>
  <tr height="500">
    <td  style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: 1px solid black;border-collapse: collapse;border-collapse: collapse;border-right: 1px solid #999;"></td>
   
	<td  style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td  style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
</tr>
  
  <tr  style="border-bottom:2px solid black;">
 
	
 <td  style="border-top:2px solid black;border-left:2px solid black;" colspan="5" ><div align="right"><strong>Total&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></div></td>
<td  style="border-top:2px solid black;border-right:1px solid black;" ><div align="right"><strong><?php echo $tlbundle; ?></strong></div></td>
<td  style="border-top:2px solid black;border-right:1px solid black;" ><div align="right"></div></td>

<td  style="border-top:2px solid black;border-right:1px solid black;" ><div align="center"><strong><?php echo $tlpcs; ?></strong></div></td>
<td  style="border-top:2px solid black;border-right:1px solid black;" ><div align="right"><strong><?php echo $tcharge; ?></strong></div></td>
<td  style="border-top:2px solid black;border-right:1px solid black;" ><div align="right"><strong><?php echo $tcharge; ?></strong></div></td>
<td colspan="5" style="border-top:2px solid black;border-right:2px solid black;" ><div align="right"><strong></strong></div></td>
</tr>
  
</table>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>
<!-- <div align="center">
    <input type="button" value="Print" onclick="PrintElem('#mydiv')" />
     
    
  </div> -->