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
            <style>
			  #myInput {
				  border-radius: 10px;
    background-image: url('/css/searchicon.png');
	background-color: lavender; /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}


</style>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
	  alert("hello");
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
const myFunction = () => {
  const trs = document.querySelectorAll('#myTable tr:not(.header)')
  const filter = document.querySelector('#myInput').value
  const regex = new RegExp(filter, 'i')
  const isFoundInTds = td => regex.test(td.innerHTML)
  const isFound = childrenArr => childrenArr.some(isFoundInTds)
  const setTrStyleDisplay = ({ style, children }) => {
    style.display = isFound([
      ...children // <-- All columns
    ]) ? '' : 'none' 
  }
  
  trs.forEach(setTrStyleDisplay)
}
</script>

            <?php
  $from=$_POST['fromdate'];
  $to=$_POST['todate'];
  $type=$_POST['type'];
  $partyname=$_POST['partyname'];
 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y">

            <?php

$sql = "SELECT * FROM partymaster where id='$partyname'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);


?>
              <div id="mydiv" class="card mb-4 ">
              <div style=" text-align:center;padding-top:10px"> 
                      <h3>Payment Ledger Report</h3>
                     </div>
          
                 
             
                <div class="card-body text-nowrap table-responsive" >
    <table id="ConvertTable" class="table table-bordered  table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                 <tr style="background-color:white;font-size:14px">
                    <td colspan="4" style="text-align:left">Payment Ledger For :  <?php echo $row['name'];?></td>
                    <td colspan="4" style="text-align:left">Payment Ledger From : <?php echo date('d/m/Y',strtotime($from));?> | To : <?php echo date('d/m/Y',strtotime($to));?></td>
                </tr>
                  <tr >
                    <th >S.No</th>
                    <th>Date</th>
					<th>Ref&nbsp;No</th>
                    <th colspan="2">Description</th>
                    <th>Credit</th>
                    <th>Debit</th>
                    <th>Balance</th>

	</tr>
                </thead>
                <?php if($type=='Sales'){?>
                 <tbody  id="myTable">
                <?php
                $sno=1;

                $aa=array('type'=>$type);
                $aa=array_filter($aa);
                
                //print_r($aa);
                
                $i=1;
                $rr='';
                foreach($aa as $key => $aa1)
                {
                    if($i<count($aa))
                    {
                     $rq='and';
                    }
                    else
                    {
                     $rq='';	
                    }
                    $rr=$rr.' '.$key."="."'".$aa[$key]."'"." ".$rq;
                
                    
                $i++;	
                }
                
                
                  if($rr!='')
                
                { 
                   
                 $rr='and'.$rr;  
                   
                }
                  else
                
                { 
                   
                 $rr='';  
                   
                } 
            
               
$tx0="SELECT  v1.date AS Rdate,sum(v1.net) AS credit FROM sales_invoice AS v1  where v1.partyname='".$partyname."' and date<'$from'";

$tx=mysqli_query($conn,$tx0);
$tx1=mysqli_fetch_array($tx);
 $ocredit=number_format((float)$tx1['credit'], 2, '.', '');

// echo $tx0;


 $yx0="SELECT v1.date AS Rdate,sum(v1.round) AS debit FROM voucher AS v1 where  v1.partyname='".$partyname."' and date<'$from'";

$yx=mysqli_query($conn,$yx0);
$yx1=mysqli_fetch_array($yx);
$odebit=$yx1['debit'];


$opening=number_format((float)$ocredit, 2, '.', '')-number_format((float)$odebit, 2, '.', '');


		  echo "<tr style='text-align:center;font-size:14px;'>
		


";


echo"<td align='center'colspan='5' style='background-color: aliceblue;'>"."Outstanding Balance"."</td>

<td align='right'>".number_format((float)$opening, 2, '.', '')."</td>
<td align='right'>"."</td>
<td align='right'>".number_format((float)$opening, 2, '.', '')."</td>


</tr>";

$sno=1;



$sel1="SELECT A.Rno AS RecNo, A.Rdate AS RecDate,A.description as Description,A.credit AS Credit,A.debit AS Debit,@e := @e + (A.credit-A.debit) AS Balance FROM (

SELECT  v1.invoiceno AS Rno,v1.date AS Rdate,'Sales Invoice' as description,v1.net AS credit,'' AS debit FROM sales_invoice AS v1  where v1.partyname='".$partyname."' group by v1.invoiceno 



union SELECT  v1.vno AS Rno,v1.date AS Rdate,CONCAT(v1.paytype,' ','-',' ',v1.payment,' ','/',' ',v1.detail) as description,'' AS credit,v1.round AS debit FROM voucher AS v1 where  v1.partyname='".$partyname."' 

)
 AS A  JOIN (SELECT @e := $opening) s  where A.Rdate between '$from' and '$to'   order by Rdate Asc
";
//echo $sel1;

$sel=mysqli_query($conn,$sel1);



while($row=mysqli_fetch_array($sel))
{


   $receipt_no=$row['RecNo'];

   $party_name=$row['party_name'];
  $date=date("d/m/Y",strtotime($row['RecDate']));
  
  $description=$row['Description'];



   $credit=$row['Credit'];

     $debit=$row['Debit'];
	   $balance=$row['Balance'];
	//echo $sales1;

		
		  echo "</tr>";
		  
	  
		  echo "<tr style='text-align:center;font-size:14px;'>
		  <td align='center'>".$sno++."</td>



<td align='left'>".$date."</td>
<td align='center'>".$receipt_no."</td>";


echo"<td align='left' colspan='2'>".$description."</td>


<td align='right'>";
if($credit!=0)
{ echo number_format((float)$credit, 2, '.', ''); }
echo"</td>
<td align='right'>";
if($debit!=0)
{ 
echo number_format((float)$debit, 2, '.', '');
}
echo"</td>
<td align='right'>".number_format((float)$balance, 2, '.', '')."</td>


</tr>";




$tcredit+=number_format((float)$credit, 2, '.', '');
$tdebit+=number_format((float)$debit, 2, '.', '');



	 
}
$ttcredit=$tcredit+$opening;
$tbalance=$opening+$tcredit-$tdebit;
	echo "</tr><tr style='text-align:center;font-size:14px;'>";

echo"<td colspan='5' align='right'><strong>"."Total Amount"."</strong></td>


<td align='right'><strong>".number_format((float)$ttcredit, 2, '.', '')."</strong></td>
<td align='right' ><strong>".number_format((float)$tdebit, 2, '.', '')."</strong></td>
<td align='right' ><strong>".number_format((float)$tbalance, 2, '.', '')."</strong></td>




</tr>";	 		 

	 ?>
         
              </tbody>
              <?php } else{?>
                <tbody  id="myTable">
                <?php
                $sno=1;

                $aa=array('type'=>$type);
                $aa=array_filter($aa);
                
                //print_r($aa);
                
                $i=1;
                $rr='';
                foreach($aa as $key => $aa1)
                {
                    if($i<count($aa))
                    {
                     $rq='and';
                    }
                    else
                    {
                     $rq='';	
                    }
                    $rr=$rr.' '.$key."="."'".$aa[$key]."'"." ".$rq;
                
                    
                $i++;	
                }
                
                
                  if($rr!='')
                
                { 
                   
                 $rr='and'.$rr;  
                   
                }
                  else
                
                { 
                   
                 $rr='';  
                   
                } 
            
               
$tx0="SELECT  v1.date AS Rdate,sum(v1.net) AS credit FROM purchaseentry AS v1  where v1.supplier='".$partyname."' and date<'$from'";

$tx=mysqli_query($conn,$tx0);
$tx1=mysqli_fetch_array($tx);
 $ocredit=number_format((float)$tx1['credit'], 2, '.', '');

// echo $tx0;


 $yx0="SELECT v1.date AS Rdate,sum(v1.round) AS debit FROM voucher AS v1 where  v1.partyname='".$partyname."' and date<'$from'";

$yx=mysqli_query($conn,$yx0);
$yx1=mysqli_fetch_array($yx);
$odebit=$yx1['debit'];


$opening=number_format((float)$ocredit, 2, '.', '')-number_format((float)$odebit, 2, '.', '');


		  echo "<tr style='text-align:center;font-size:14px;'>
		


";


echo"<td align='center'colspan='5' style='background-color: aliceblue;'>"."Outstanding Balance"."</td>

<td align='right'>".number_format((float)$opening, 2, '.', '')."</td>
<td align='right'>"."</td>
<td align='right'>".number_format((float)$opening, 2, '.', '')."</td>


</tr>";

$sno=1;



 $sel1="SELECT A.Rno AS RecNo, A.Rdate AS RecDate,A.description as Description,A.credit AS Credit,A.debit AS Debit,@e := @e + (A.credit-A.debit) AS Balance FROM (

SELECT  v1.receipt AS Rno,v1.date AS Rdate,'Purchase Invoice' as description,v1.net AS credit,'' AS debit FROM purchaseentry AS v1  where v1.supplier='".$partyname."' group by v1.receipt 



union SELECT  v1.vno AS Rno,v1.date AS Rdate,CONCAT(v1.paytype,' ','-',' ',v1.payment,' ','/',' ',v1.detail) as description,'' AS credit,v1.round AS debit FROM voucher AS v1 where  v1.partyname='".$partyname."' 

)
 AS A  JOIN (SELECT @e := $opening) s  where A.Rdate between '$from' and '$to'   order by Rdate Asc
";
//echo $sel1;

$sel=mysqli_query($conn,$sel1);



while($row=mysqli_fetch_array($sel))
{


   $receipt_no=$row['RecNo'];

   $party_name=$row['party_name'];
  $date=date("d/m/Y",strtotime($row['RecDate']));
  
  $description=$row['Description'];



   $credit=$row['Credit'];

     $debit=$row['Debit'];
	   $balance=$row['Balance'];
	//echo $sales1;

		
		  echo "</tr>";
		  
	  
		  echo "<tr style='text-align:center;font-size:14px;'>
		  <td align='center'>".$sno++."</td>



<td align='left'>".$date."</td>
<td align='center'>".$receipt_no."</td>";


echo"<td align='left' colspan='2'>".$description."</td>


<td align='right'>";
if($credit!=0)
{ echo number_format((float)$credit, 2, '.', ''); }
echo"</td>
<td align='right'>";
if($debit!=0)
{ 
echo number_format((float)$debit, 2, '.', '');
}
echo"</td>
<td align='right'>".number_format((float)$balance, 2, '.', '')."</td>


</tr>";




$tcredit+=number_format((float)$credit, 2, '.', '');
$tdebit+=number_format((float)$debit, 2, '.', '');



	 
}
$ttcredit=$tcredit+$opening;
$tbalance=$opening+$tcredit-$tdebit;
	echo "</tr><tr style='text-align:center;font-size:14px;'>
";

echo"<td colspan='5' align='right'><strong>"."Total Amount"."</strong></td>


<td align='right'><strong>".number_format((float)$ttcredit, 2, '.', '')."</strong></td>
<td align='right' ><strong>".number_format((float)$tdebit, 2, '.', '')."</strong></td>
<td align='right' ><strong>".number_format((float)$tbalance, 2, '.', '')."</strong></td>




</tr>";	 		 

	 ?>
         
              </tbody>
              <?php } ?>
</table> 

                </div>
              </div>            
                  
           <br>
            <div class="card-header d-flex align-items-center justify-content-between">
              
<a href="payment_ledger_report.php" class="btn btn-primary"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-warning" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning " ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>
        
</div> 
</div>
        
          

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
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
   window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>  

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
        mywindow.document.write('th, td { padding: 10px; text-align: center; }');
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
