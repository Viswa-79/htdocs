<?php
include "config.php"; 
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
<title><?php  include('../title.php');?></title>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>
    <script src="..\plugins\jQuery\jquery-1.4.4.min.js" type="text/javascript"></script>

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

</head>

<body>

<div id="mydiv" >


<?php

 $sid=base64_decode($_REQUEST['cid']);
	
		if($sid=='')
{
$s1="SELECT * FROM general_exp order by id desc";
$sel=mysqli_query($connection,$s1);
$row=mysqli_fetch_array($sel);

$sid=$row['cid'];
}
else
{
$sid=base64_decode($_REQUEST['cid']);
}

$wz=mysqli_query($conn,"select * from invoice_settings");
$wz1=mysqli_fetch_array($wz);

$color=$wz1['color'];
$font_color=$wz1['font_color'];
$ino_prefix=$wz1['ino_prefix'];
$ino_year=$wz1['ino_year'];
$ino_start=$wz1['ino_start'];

$logo=$wz1['logo'];
$logo_height=$wz1['logo_height'];
$logo_width=$wz1['logo_width'];
$logo2=$wz1['logo2'];
$logo_height2=$wz1['logo_height2'];
$logo_width2=$wz1['logo_width2'];
$terms=$wz1['terms'];




?>

    
<table align="center" width="1000" border="2px" style="border:2px solid black;border-collapse:collapse;">


<table align="center" width="1000" border="2px" style="border:2px solid black;border-collapse:collapse;">

  <tr style="border:none;">
    <td  width="547" height="25" style="background-color:#<?php echo $color;?>;color:#<?php echo $font_color;?>;" ><div style="margin-left:0%;text-align: -webkit-center;"><strong style="font-size:22px;">EXPENSE VOUCHER</strong></div></td>
   
  </tr>
</table>

<div  style="background:url(assets/img/favicon/<?php echo $logo;?>) no-repeat;
  opacity: 0.08;
 
  float:center;
  position: absolute;
  float:center;
  margin-left:17%;
  margin-top:50%;
  height:100%;
  width:100%;" width="300px" height="300px">
</div>
  

  <?php

$wz=mysqli_query($conn,"select * from general_exp b left join expense_party c on b.supplier=c.id  where b.id='$sid'");
$wz1=mysqli_fetch_array($wz);
$invoiceno=$wz1['rec_no'];


$partyname=$wz1['supplier'];
$remarks=$wz1['remarks'];

$invoicedate=date('d-m-Y',strtotime($wz1['date']));
?>  

<?php
     	

     
  

      
       ?>
<table width="1000" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center">


    
    <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td width="547" height="38" rowspan="2" style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 2px solid black; border-bottom: 1px solid #999;border-collapse: collapse; border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid black;margin:10px;vertical-align:top;" >    

    <div  style="width:20%;float:left;margin-top:10px;">
	<img src="../assets/img/favicon/CREDENCE.png" height="90px" width="250px" style="margin-left:0%;"/></div>

 <div style="vertical-align:top;margin-top:10px; text-transform:capitalize;float:left;margin-left:1%;">
      <?php

	$rz1=mysqli_query($conn,"select * from address");
	$rz2=mysqli_fetch_array($rz1);
	?>

<span style="font-size:28px;"> 
		   <!-- <strong style="color:#2c3192"><?php echo $rz2['companyname']; ?></strong></span><br/> -->
		<span style="font-size:15px;">
		
        <?php echo $rz2['address'].","; ?><br />

        <?php echo $rz2['city'];echo "-";echo $rz2['pincode']; ?>.<br/>
           Mobile : <?php echo $rz2['mobile'];?>&nbsp;&nbsp;<br />

        e-mail  : <span style="text-transform:lowercase;font-size:17px;"><?php echo $rz2['emailid'];?></span>
</span>
    </div>
	</td>
	  <td width="92" height="35"  align="center"  style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 1px solid black;border-collapse: collapse; border-top: 2px solid black;border-right: 1px solid black;border-collapse: collapse; " >Rec&nbsp;No.</td>
	   <td width="116"  align="center"  style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 1px solid black;border-collapse: collapse; border-top: 2px solid black;border-right: 1px solid black;border-collapse: collapse; " >&nbsp;<?php echo $invoiceno;?></td>
	    <td width="76"  align="center"  style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 1px solid black;border-collapse: collapse; border-top: 2px solid black;border-right: 1px solid black;border-collapse: collapse; " >Date</td>
		 <td width="145"  align="center"  style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 1px solid black;border-collapse: collapse; border-top: 2px solid black;border-right: 2px solid black;border-collapse: collapse; " >&nbsp;<?php echo $invoicedate;?></td>
  </tr>
		 <tr style="border: 1px solid black;border-collapse: collapse;border-color:#999;">
    <td height="100" colspan="4"  style="border: 1px solid black;border-collapse: collapse;border-color:#999; border-left: 1px solid black; border-bottom: 1px solid #999;border-collapse: collapse; border-top: 1px solid black;border-collapse: collapse;border-right: 2px solid black;margin:10px;vertical-align:top;padding-left:8px" > Party&nbsp;Details:<br><br>
	  <?php  
          $a0="SELECT * FROM expense_party where id='$partyname'";
//echo $a0;

$a1=mysqli_query($conn,$a0);

$r1=mysqli_fetch_array($a1);

          
        echo "<span style='text-transform:uppercase;'><strong>".$r1['name']."</strong></span>";
		
		echo ","."<br />";echo"<span style='text-transform:Capitalize;'>".$r1['address']."</span>";echo ",";echo $r1['state'];echo ",";echo "<br />";echo $r1['city'];echo"-";echo $r1['pincode'];echo "."; echo "<br />";?>
      <?php if($r1['city']!=''){ ?>
      Mobile : <?php echo $r1['mobileno']; }?></td>
	</tr>
		 
	  
	
	  
</table>

<table  width="1000"  align="center" style="border: 1.5px solid black;border-collapse: collapse;">
  <tr align="center" style="font-weight:bold;border-collapse: collapse;background-color:#<?php echo $color;?>;color:#<?php echo $font_color;?>;">
    <td style="border-left: 2px solid black;border-top: 2px solid black;border-collapse: collapse;border-right: 1px solid #999;border-bottom: 1px solid #999;border-collapse: collapse;text-transform:uppercase" width="36" height="35">S.no</td>
    <td width="432" style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999;text-transform:uppercase">Expense </td>
    <td width="432" style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999;text-transform:uppercase">Description</td>
    <td width="432" style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999;text-transform:uppercase">From Date</td>
    <td width="432" style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999;text-transform:uppercase">To Date</td>
    <td width="432" style="border: 1px solid black;border-top: 2px solid black;border-collapse: collapse; border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999;border-right:2px solid black;text-transform:uppercase">Amount</td>

  </tr>
  <?php

		  $sno=1;$i=0;$j=0;$tman=0;
		  $sql = "SELECT * FROM general_exp1 a left join  expense b on a.exp_type=b.id  where a.cid='$sid'";
			$result = mysqli_query($conn,$sql);

    
	while($row = mysqli_fetch_array($result))
 
	{ $remark=$row['remark'];
	?>
  <tr style="border-bottom:none;border-collapse: collapse;">
    <td height="" style="border-left: 2px solid black;border-bottom:none;border-top:none;border-collapse: collapse;
   border-right: 1px solid #999;border-bottom: 1px solid #999;"><div align="center"><?php echo $sno++;?> </div></td>

   <td height="" align="left" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999; border-collapse: collapse; padding-left:5px;padding-top:10px;padding-bottom:10px;">
        <?php echo $row['expense_name'];?></td>
<?php if ($remark!=""){ ?>
   <td height="" align="left" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999; border-collapse: collapse; padding-left:5px;text-transform:Capitalize;">
   <?php echo $remark;?></td>		
 <?php }else { ?>
  <td height="" align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999; border-collapse: collapse; padding-left:5px;">
        -</td>	
        <?php } ?>
    <td height="" align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999; border-collapse: collapse; padding-left:10px;"><?php echo date('d-m-Y',strtotime($row['from_date']));?></td>
    <td height="" align="center" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999; border-collapse: collapse; padding-left:10px;"><?php echo date('d-m-Y',strtotime($row['to_date']));?></td>
    <td height=""  align="right" style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-bottom: 1px solid #999;border-left: 1px solid #999; border-collapse: collapse;padding-left:8px;border-right:2px solid black;padding-right:20px"><?php echo $row['amount'];?>
    </td>
  
    </td>
  </tr>
 
  <!-- <tr style="">
    <td height="18" style="border-left: 2px solid black;border-top:none;border-bottom:none;border-right: 1px solid black;border-collapse: collapse;border-collapse: collapse;border-right: 1px solid #999;"></td>
    <td height="18" style="border-left: 1px solid black;border-top:none;border-bottom:none;border-right: 1px solid black;border-collapse: collapse;border-collapse: collapse;border-right: 1px solid #999;"></td>

    <td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
    <td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
	  <td style="border-top:none;border-bottom:none;border-right: 1px solid #999;border-collapse: collapse;"></td>
    <td height="18" style="border-top:none;border-bottom:none;border-right: 2px solid black;border-collapse: collapse;"></td>
  </tr> -->

  <?php
	
  //   $tlpcs+=number_format((float)$row['totamnt'], 2, '.', '');
    $tman+=number_format((float)$row['amount'], 2, '.', '');
 
    
    $sno++;
    
    $j++;
    


   } 

   ?>
<tr  style="border-top: 1px solid #999;" height="35">
 
	
      <td  style="border-left:2px solid black;border-right:1px solid #999 ;" colspan="5" ><div align="right"><strong>Net Amount&nbsp;</strong></div></td>
	  <td  style="border-right:2px solid black;padding-right:20px;border-left:1px solid #999 ;" ><div align="right"><strong><?php echo $tman; ?></strong></div></td>

    </tr>
  
</table>
<table width="1000" style="border: 1px solid black;border-collapse: collapse;border-color:#999;"  align="center"> 
 
    
     
     
  <tr >
 
	 
      <td height="68"  width="335" style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-left: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-collapse: collapse;"><strong>
      &nbsp; Remarks:</strong>
      </br>
&nbsp;&nbsp;<?php echo $remarks;?>
      <div align="left">
 </div>
    </td>
	
  
    <td width="220" height="68"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-left: 1px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-collapse: collapse;"><strong>
      &nbsp;Receiver's Signature:</strong>
      </br>

      <div align="center"> </div>
    </td>
	
	
    <td width="323" height="80"  align="center"  style="vertical-align:text-top;border: 1px solid black;border-collapse: collapse; border-color:#999;border-right: 2px solid black;border-collapse: collapse;border-bottom: 2px solid black;border-collapse: collapse;"><strong>For <?php echo $rz2['companyname']; ?></strong>  <br />
      <br />
      <br />
      <br />
      <br />
      <br />
    
    <div align="center"> Authorised Signatory. </div></td>
  </tr>
</table>
<br />
<br />



</div>
</div>
<div align="center">


<!--<input type="button" value="Print" onClick="PrintElem('#mydiv')" />-->
   	
	 <?php /*?>	  <a href="purchaseorder_print11.php?cid=<?php echo $sid;?>" >  <input type="button" value="Export To Word" /></a> <?php */?>

  
</div>





</body>
</html>
