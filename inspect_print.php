

<?php

function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inspection Print</title>
<style type="text/css">
.style1
{
color:#990000;
font-weight:bold;
}
.style5 {font-size: 18px}
</style>

 <script src="jquery-1.4.4.min.js" type="text/javascript"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



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
   <script src="js1/jquery-1.7.1.min.js"></script>
    <script src="js1/jspdf.js"></script>
    <script src="js1/jspdf.plugin.standard_fonts_metrics.js"></script>
    <script src="js1/jspdf.plugin.split_text_to_size.js"></script>
    <script src="js1/jspdf.plugin.from_html.js"></script>
    <script src="js1/html2canvas.js"></script>
	 <script src="js1/FileSaver.js"></script>

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
</head>

 <?php
 include('config.php');
$sid=base64_decode($_GET['cid']);

 $sql = " SELECT *,e.id as id FROM inspection e left join partymaster p on e.partyname=p.id WHERE e.id='$sid'";
$result =mysqli_query($conn, $sql);
$so=mysqli_fetch_array($result);


$date=date('d/m/Y',strtotime($so['date']));

?>


<?php
$sql1 = " SELECT * FROM address";
$result1 =mysqli_query($conn, $sql1);
$ad=mysqli_fetch_array($result1);


$a11=mysqli_query($conn,"SELECT * FROM inspection1 where cid='$sid'");

$so1=mysqli_fetch_array($a11);
?>





<body>


    <div id="mydiv" style="font-size:20px;">
 
  <table width="878"  align="center" style="border-collapse:collapse; border:none;">
 
	  
	      <tr height="70px">
      <td style="border:none;vertical-align:top;margin-top:2px;" align="center">
	  <b>INSPECTION REPORT</BR>
	
      
</td>
	  </tr>
	  </table>
	 
  <table  width="878" align="center" style=" border:none;border-collapse: collapse;">
 
 <tr style="line-height:35px;">
 <td width="261" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Book No.</strong> </span></td>
 <td width="605" style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['dcno'];?></span></td>

 
 </tr>
 
   <tr style="line-height:35px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Date</strong> </span>
</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $date;?></span>
</td>

 
 </tr>
   <tr style="line-height:35px;">
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5"><strong>Party Name</strong> </span>
</td>
 <td style="border:none; border-right:none; vertical-align:text-top;" >

 <span class="style5">:&nbsp;&nbsp;&nbsp;<?php echo $so['name'];?></span>
</td>

 
 </tr>
 
</table>
  <br />
 <table width="870" align="center" style=" border:1px solid #000000; border-collapse: collapse;font-size:18px;">
    <tr>
   
      <td width="80"  style=" border:1px solid #000000;border-left:2px solid #000000;border-top:2px solid #000000; "><div align="center"> <strong>S.No</strong></div></td>
      <td width="161"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center">
        <strong>Factory Name</strong>
       
      </div></td>
      <td width="100"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center" ><strong>Factory Loc</strong></div></td>
     
	  <td width="80"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center" ><strong>Style No</strong></div></td>
	  <td width="80"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center" ><strong>Order qty</strong></div></td>
	  <td width="80"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center" ><strong>Inspection Type</strong></div></td>
	  <td width="70"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center" ><strong>Manday</strong></div></td>
	  <td width="70"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center" ><strong>Charges</strong></div></td>
	  <td width="70"  style=" border:1px solid #000000;border-top:2px solid #000000; "><div align="center" ><strong>Gst</strong></div></td>
	  <td width="70"  style=" border:1px solid #000000;border-top:2px solid #000000;border-right:2px solid #000000; "><div align="center" ><strong>Total Amnt</strong></div></td>

	  
      
    </tr>
      
      <?php
	  $sno=1;
$i=1;
$mantot=0;
$chargetot=0;
$gsttot=0;
$amnttot=0;
    $b1="SELECT * FROM inspection1 e left join partymaster p on e.factoryname=p.id where cid='$sid' order by e.id asc";
	$b2=mysqli_query($conn,$b1);
	while($so1=mysqli_fetch_object($b2))
	{ 

	?>
  <tr style="border-bottom:0px solid black;" >

            <td height="50" style="text-align:center;border-left:2px solid black;border-right:1px solid black;"><?php echo $sno;?></td>
            <td height="50" style="text-align:left;border-right:1px solid black;"><?php echo $so1->name;?></td>
            <td height="50" style="text-align:left;border-right:1px solid black;"><?php echo $so1->factoryloc;?></td>
            <td height="50" style="text-align:left;border-right:1px solid black;"><?php echo $so1->styleno;?></td>
            <td height="50" style="text-align:left;border-right:1px solid black;"><?php echo $so1->offerqty;?></td>
            <td height="50" style="text-align:left;border-right:1px solid black;"><?php echo $so1->inspecttype ;?></td>
            <td height="50" style="text-align:right;border-right:1px solid black;"><?php echo  number_format((float)$so1->manday, 0, '.', '');?></td>
            <td height="50" style="text-align:right;border-right:1px solid black;"><?php echo  number_format((float)$so1->charges, 2, '.', '');?></td>
            <td height="50" style="text-align:right;border-right:1px solid black;"><?php echo  number_format((float)$so1->gst, 2, '.', '');?></td>
            <td height="50" style="text-align:right;border-right:2px solid black;"><?php echo  number_format((float)$so1->totamnt, 2, '.', '');?></td>
      
    </tr>
 
   <?php
   
   $sno++;
   $i++;

   $mantot+= number_format((float)$so1->manday, 0, '.', '');
   $chargetot+= number_format((float)$so1->charges, 2, '.', '');
   $gsttot+= number_format((float)$so1->gst, 2, '.', '');
   $amnttot+= number_format((float)$so1->totamnt, 2, '.', '');
	  }
	  ?>
 <tr style="border-bottom:2px solid black;" >

            <td height="350" style="text-align:center;border-left:2px solid black;border-right:1px solid black;"></td>
            <td height="350" style="text-align:left;border-right:1px solid black;"></td>
            <td height="350" style="text-align:left;border-right:1px solid black;"></td>
            <td height="350" style="text-align:left;border-right:1px solid black;"></td>
            <td height="350" style="text-align:left;border-right:1px solid black;"></td>
            <td height="350" style="text-align:left;border-right:1px solid black;"></td>
            <td height="350" style="text-align:right;border-right:1px solid black;"></td>
            <td height="350" style="text-align:right;border-right:1px solid black;"></td>
            <td height="350" style="text-align:right;border-right:1px solid black;"></td>
            <td height="350" style="text-align:right;border-right:2px solid black;"></td>
      
    </tr>
 <tr style="border-bottom:2px solid black;" >

            <td height="30" colspan="6" style="text-align:right;border-left:2px solid black;border-right:1px solid black;padding-right:10px"><b>TOTAL</b></td>
            <td height="30" style="text-align:right;border-right:1px solid black;"><b><?php echo  number_format((float)$mantot, 0, '.', '');?></b></td>
            <td height="30" style="text-align:right;border-right:1px solid black;"><b><?php echo  number_format((float)$chargetot, 2, '.', '');?></b></td>
            <td height="30" style="text-align:right;border-right:1px solid black;"><b><?php echo  number_format((float)$gsttot, 2, '.', '');?></b></td>
            <td height="30" style="text-align:right;border-right:2px solid black;"><b><?php echo  number_format((float)$amnttot, 2, '.', '');?></b></td>
      
    </tr>

  </table>
 


<table  width="878" align="center" style=" border-top:0px solid #000000; border-collapse: collapse;">
 
 <tr>
 <td style="border:none; border-right:none;" >
  <p align="justify"><br />

 For <?php echo 'CREDENCE';?>,
   <br />
   <br /><br /><br />
  (Authorized Signatory)
 </p></td>

 
 </tr>
  </table>
   

</div>
  <div align="center">
    <input type="button" value="Print" onclick="PrintElem('#mydiv')" />
     
    
  </div>
</body>
</html>


