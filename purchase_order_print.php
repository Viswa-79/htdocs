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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quotation Print</title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>
    <script src="jquery-1.4.4.min.js" type="text/javascript"></script>

<!--    <link href="smart-gallery.css" rel="stylesheet" type="text/css" />

    <script src="smart-gallery.min.js" type="text/javascript"></script>-->


<script type="text/javascript">

    function PrintElem(elem)
    {
		
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="tables.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>









</script>
</head>

<body>

<div id="mydiv" >


<?php
error_reporting(0);

	$sid=base64_decode($_REQUEST['cid']);
	
		if($sid=='')
{
$s1="SELECT * FROM purchaseorder order by id desc";
$sel=mysqli_query($connection,$s1);
$row=mysqli_fetch_array($sel);

$sid=$row['cid'];
}
else
{
$sid=base64_decode($_REQUEST['cid']);
}

// $wz=mysqli_query($connection,"select * from invoice_settings");
// $wz1=mysqli_fetch_array($wz);

// $color=$wz1['color'];
// $font_color=$wz1['font_color'];
// $ino_prefix=$wz1['ino_prefix'];
// $ino_year=$wz1['ino_year'];
// $ino_start=$wz1['ino_start'];

// $logo=$wz1['logo'];
// $logo_height=$wz1['logo_height'];
// $logo_width=$wz1['logo_width'];
// $terms=$wz1['terms'];




?>
    



<table align="center" width="852" style="border:none; page-break-before:always;">

  <tr style="border:none;">
    <td  width="709" height="25" style="border:none;"><div style="margin-left:40%"><strong style="font-size:22px;">PURCHASE&nbsp;ORDER</strong></div></td>
  </tr>
</table>


  <?php

  $wz=mysqli_query($conn,"select * from purchaseorder where id='$sid'");
$wz1=mysqli_fetch_array($wz);
$refno=$wz1['purchaseno'];
// $date=$wz1['date'];

$partyname=$wz1['supplier'];

$date=date('d-m-Y',strtotime($wz1['date']));
$del_date=date('d-m-Y',strtotime($wz1['duedate']));



?>  


<table width="850" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center">

  <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td  colspan="5"  align="center"  style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black;border-collapse: collapse; border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse; vertical-align:text-top;" >
   <?php
   
	$rz1=mysqli_query($conn,"select * from address");
	$rz2=mysqli_fetch_array($rz1);
	?>   
          <div style="height:auto; vertical-align:top; margin-left:20px;margin-top:10px; text-transform:capitalize;width:100%;">
  
      <img src="..\assets\img\avatars\credence.png" style=" height: 60px;
    width: 180px;"   /><br />


        <strong style="font-size:20px;"><?php echo $rz2['companyname']; ?></strong><br />
        <?php echo $rz2['address'].","; ?><br />
        <?php echo $rz2['city']."-".$rz2['pincode'].",<br>".$rz2['state'].",".$rz2['country']."."; ?><br />
  		 <strong>Mobile No : <?php echo $rz2['mobile'];?></strong><br />
		
    </div>
 <strong>Email : <?php echo $rz2['emailid'];?></strong>
    <div align="left" style="width:100%;margin-bottom:5px;">
    <!-- <div align="left" style="width:50%;float:left;"><strong>&nbsp;GST No. : <?php echo $rz2['gstno'];?></strong></div> -->
	<!--<div align="right" style="width:50%;float:right;"><strong>PAN No. : <?php echo $rz2['pan'];?>&nbsp;</strong></div> -->
	</div><br />

    </td>
  </tr>
 

    <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="38" colspan="2" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black; border-bottom: 1px solid #999;border-collapse: collapse; border-top: 2px solid black;border-collapse: collapse;" ><strong>&nbsp;Party Name :-</strong>
	</td>
	  <td width="183" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 2px solid black;border-collapse: collapse;border-right:none;"><strong style="font-size:18;padding-left:5px;">PO No</strong><strong style="font-size:18;"></strong></td>
    <td width="11" height="38" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 2px solid black;border-collapse: collapse; border-right:none;border-left:none;"><strong style="color:#000;">:</strong></td>
    <td width="205" style="border: 1px solid thin black;border-collapse: collapse; border-color:#999;border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse;border-left:none;font-size:18;"><?php echo $refno;?></td>
	</tr>
	
	
  <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="50" colspan="2" rowspan="3" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black;border-collapse: collapse; border-top: 1px solid #999;border-bottom: 1px solid #999;border-collapse: collapse; vertical-align:text-top;" >
<div style="margin-left:15%;margin-top:2%">
        <?php  
$a0="SELECT * FROM purchaseorder e left join partymaster a on e.supplier=a.id where e.id='$sid'";
//echo $a0;
$a1=mysqli_query($conn,$a0);
$r1=mysqli_fetch_array($a1);

          
        echo "<span style='text-transform:capitalize;text-align:left;font-weight:bold'>".$r1['name']."</span>";?><br>
        <?php echo $r1['address'];?>, <?php echo $r1['city'];?> -
<?php echo $r1['pincode'];?>,<br>
<?php echo $r1['state'];?>, <?php echo $r1['country'].".";?><br>
<strong >GST NO : </strong><?php echo $r1['gstno'];?> <br>


      </div>   	
    
    </td>

    <td height="28" style="border: 1px solid thin black;border-collapse: collapse;border-color:#999;border-right:none;padding-left:5px;FONT-SIZE:16px"><strong> Date</strong></td>
    <td style="border: 1px solid thin black;border-collapse: collapse;border-color:#999;border-right:none;border-left:none;"><strong>:</strong></td>
    <td style="border: 1px solid thin black;border-collapse: collapse;border-color:#999;border-right: 2px solid black;border-left:none;FONT-SIZE:16px"><?php echo $date;?></td>
  </tr>
  

  <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="33" style="border: 1px solid black;border-collapse: collapse;border-color:#999;border-right:none;padding-left:5px;" ><strong>Delivery&nbsp;Date</strong></td>
    <td style="border: 1px solid black;border-collapse: collapse;border-color:#999;border-right:none;border-left:none;"><strong>:</strong></td>
    <td style="border: 1px solid black;border-collapse: collapse;border-color:#999;border-right: 2px solid black;border-left:none;"><?php echo $del_date;?></td>
  </tr>
  <tr style="border: none;">
    <td height="33" style="border: 0px solid black;border-collapse: collapse;border-color:#999;border-right:none;padding-left:5px;" ><!--<strong>Quotation No</strong>--></td>
    <td style="border: 0px solid black;border-collapse: collapse;border-color:#999;border-right:none;border-left:none;"><!--<strong>:</strong>--></td>
    <td style="border: 0px solid black;border-collapse: collapse;border-color:#999;border-right: 2px solid black;border-left:none;"><?php echo '';?></td>
  </tr>



  
  

</table>

<table  width="850"  align="center" style="border: 1.5px solid black;border-collapse: collapse;font-size:16px">
  <tr align="center" style="font-weight:bold;border-collapse: collapse;background-color:#<?php echo $color;?>;color:#<?php echo $font_color;?>;">
    <td style="border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-collapse: collapse; "  height="35">S.No</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black"> Particulars</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black">Qty</td>
    <td  style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">Unit</td>
    <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">BUDGET FROM</td>
    <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">BUDGET TO</td>

  <td   style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 2px solid black;border-bottom: 2px solid black ;border-left: 1px solid black; ">Remarks</td>

</tr>
  <?php

		   $sno=1;$i=0;$j=0;
  $sql = "SELECT * FROM purchaseorder1 m left join asset_master  n on m.productname=n.id where m.cid='$sid' order by m.id asc";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
	?>
  <tr style="border-bottom:none;border-collapse: collapse;font-size:14px;">
    <td height="" style="border-left: 2px solid black;border-bottom:none;border-top:none;border-collapse: collapse;
   border-right: 1px solid #999;"><div align="center"><?php echo $sno;?> </div></td>
    <td height=""  align="left"style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999;   border-collapse: 2px solid black;border-bottom: collapse; padding-left:5px;"><?php echo $row['asset_name'];?> </td>
    <td height=""  align="center"style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999;   border-collapse: 2px solid black;border-bottom: collapse; padding-left:5px;"><?php echo $row['quantity'];?> </td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['unit']; ?></td>

    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['budget_from']; ?></td>
    <td height=""  align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['budget_to']; ?></td>
    <td height=""  align="left" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-left: 1px solid #999; border-collapse: 2px solid black;border-bottom: collapse;padding-right:5px;"><?php echo $row['remark']; ?></td>
  </tr>
  <?php
	
//   $tlpcs+=number_format((float)$row['totamnt'], 2, '.', '');
  $tman+=number_format((float)$row['manday'], 2, '.', '');
  $tcharge+=number_format((float)$row['charges'], 2, '.', '');
  $tfinal+=number_format((float)$row['finamnt'], 2, '.', '');
    $net_value = $tfinal;
	$sno++;
	
	$j++;
	  }
	  
	  $k=$sno;
	  
	  if($k>10)
	  {
		 $rr=20;
	  }
	  else
	  {
		 $rr=16;  
	  }
	  
	  
	  for($i=$sno;$i<=$rr;$i++)

{	  
	  ?>
  
  <tr >
    <td height="18" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: 1px solid black;border-collapse: collapse;border-collapse: collapse;border-right: 1px solid #999;"></td>
   
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	<!-- <td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td> -->
	<!-- <td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td> -->
	<!-- <td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td> -->
	<!-- <td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td> -->
	<td style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  
</tr>
  <?php } ?>

 
</table>



<table width="850" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center"> 
 
    
     
     
  <tr >
  
  
    <td width="452" height="68"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-left: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-collapse: collapse;">
	<strong>
      Remarks:&nbsp;&nbsp;&nbsp;</strong>
      </br>

      <div align="left"><?php echo $r1['remarks'];?> </div>
    </td>
	
	
    <td width="386" height="80"  align="center"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-collapse: collapse;"><strong>For <?php echo $rz2['companyname']; ?></strong>  <br />
      <br />
      <br />
      <br />
      <br />
      <br />
    
    <div align="center"> Authorised Signatory. </div></td>
  </tr>
</table>




</div>
</div>
<div align="center">


<input type="button" value="Print" onClick="PrintElem('#mydiv')" />
   	
	 <?php /*?>	  <a href="purchaseorder_print11.php?cid=<?php echo $sid;?>" >  <input type="button" value="Export To Word" /></a> <?php */?>

  
</div>





</body>
</html>
