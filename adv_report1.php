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
	  //alert("hello");
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

       
            <div  class="container-xxl flex-grow-1 container-p-y" >

            <!-- <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;"> -->
            
            </h1>
             




                                
     


            <?php
  $fromdate=$_POST['fromdate'];
  $todate=$_POST['todate'];

 ?>


              <div id="mydiv" class="card mb-4  ">
                
                    

                            <div class="card-header d-flex align-items-center justify-content-between mb-2 mt-0">
          <button class="btn btn-label-primary waves-effect">Advance Salary Report</button>
          <button style="font-size:14px;font-family:table-icons;text-transform:uppercase" class="btn btn-outline-warning">From : <?php echo date('d-m-Y',strtotime($fromdate));?>&nbsp;| &nbsp;To : <?php echo date('d-m-Y',strtotime($todate));?></button>
      </div><br>
                     <div class="table-responsive text-nowrap card-header  align-items-center "> 
                     <table id="ConvertTable" class="table table-bordered table-hover colorful-table">
        <thead style="text-align:center;font-weight:bold">
                 
                  <tr style="text-transform:uppercase">
                  <th  style="text-align:center" nowrap><b>S.No</b></th>                
                  <th  style="text-align:center" nowrap><b>EMP ID</b></th>                
                  <th  style="text-align:center" nowrap><b>Date</b></th>                
                  <th  style="text-align:center" nowrap><b>Name</b></th>                
                  <th  style="text-align:center"nowrap><b>Department</b></th>
                  <th  style="text-align:center" nowrap><b>Amount</b></th>
				
           
                 
                 
                    
	</tr>
                </thead>
                 <tbody  id="myTable">
                <?php
               
            $staffname=$_REQUEST['staffname'];
           
            
          

    
    
    
    
                    $aa=array('h.staff_name'=>$staffname);
                    $aa=array_filter($aa);
                    
                    //print_r($aa);
                    
                    // $aa=array_filter($aa);

                    //print_r($aa);
                    
                    $i=1;$rr='';
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
                    $sno=1;	
 
                $q1=0; 
                $clr='';
             $tott=0;
     $sql4 = "SELECT *,h.id as id,h.status as status From  adv_salary  h left join employee e  on h.staff_name=e.id left join depart d on e.depart=d.id    where h.date between '$fromdate' and '$todate' $rr order by h.id asc";

              
    $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {
              $tot= $wz1['advamt'];
            

           
            ?>
                    <tr>
                        <input name="id" id="id<?php echo $sno; ?>" hidden value="<?php echo $wz1['id']; ?>" />
               <td style="text-align:center"><?php echo $sno; ?></td>          
               <td style="text-align:center"><?php echo $wz1['empid']; ?></td>           
               <td style="text-align:center"  nowrap><?php echo date('d-m-Y',strtotime($wz1['date']));?></td>           
               <td style="text-align:center"><?php echo $wz1['name']; ?></td>           

               <td style="text-align:left"><?php echo $wz1['depname']; ?></td>           
               <td style="text-align:center"  nowrap><?php echo $tot; ?></td>           
              
              
               
                   
             
                  </tr>

           
             <?php $sno++;
        $tott+=number_format((float)$tot, 2, '.', '');
   

         unset($outtime);unset($intime);
            }
             ?>

<tr style="font-weight:bold;font-size:17px">
             <td colspan="5" style="text-align:right;"><?php echo 'TOTAL'; ?></td>
             <td style="text-align:center"><?php echo number_format((float)$tott, 2, '.', ''); ?></td>
           
           
          </tr>




  
            </tbody>
            
</table> 

             
              </div>            
              </div>            
                  
           
            
            <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="adv_report.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-warning mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
<button onClick="tableToExcel('ConvertTable')" class="btn btn-warning " ><i class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i class="ti ti-arrow-right me-sm-1 me-0"></i></button>
      
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


<script>


function get(value1,value2) {
	// alert(value1);
	//  alert(value2);

   
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
location.reload();
//document.getElementById('accept_profile').innerHTML=r;
						

      }
    };
    xmlhttp.open("GET","ajax/get_status.php?id="+value1+"&status="+value2,true);
    xmlhttp.send();
 
}
</script> 
