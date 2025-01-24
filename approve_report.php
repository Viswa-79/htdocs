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

            <?php 
       $id= base64_decode($_GET['id']);
  $fromdate=$_POST['fromdate'];
  $todate=$_POST['todate'];
 ?>
       
            <div  class="container-xxl flex-grow-1 container-p-y" >

            <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1>
             




                                
     
     <?php
                           $sql4 = " SELECT * FROM  hr_master h  left join depart a on h.depname=a.id  left join desi_master b on h.desiname=b.id  WHERE h.id='$id'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>





              <div id="mydiv" class="card mb-4  ">
                
                    

                            <div class="card-header d-flex align-items-center justify-content-between mb-2 mt-0">
          <button class="btn btn-label-primary waves-effect">Approval Report</button>
          <a class="btn btn-label-secondary float-end  waves-effect" style="text-transform:uppercase" data-bs-toggle="offcanvas">Department : <?php echo $wz1['depname']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;Designation : <?php echo $wz1['desig']; ?></a>
      </div><br>
                     <div class="table-responsive text-nowrap card-header  align-items-center "> 
                    <table class="table table-bordered p-2"  width="100%" style="border-collapse:collapse;font-family:arial;" border="1" >
                <thead >
                 
                  <tr style="text-transform:uppercase">
                  <th  style="text-align:center" nowrap><b>S.No</b></th>
                  <th  style="text-align:center"nowrap><b>Name</b></th>
                  <th  style="text-align:center" nowrap><b>Ph.no</b></th>
				  <th  style="text-align:center" nowrap><b>Q.Set-1</b></th>
                  <th  style="text-align:center" nowrap><b>Q.Set-2</b></th>
                  <th  style="text-align:center" nowrap><b>Q.Set-3</b></th>
                  <th  style="text-align:center" nowrap><b>Q.Set-4</b></th>
                  <th  style="text-align:center" nowrap><b>Q.Set-5</b></th>
                  <th  style="text-align:center" nowrap><b>Total</b></th>
                  <th style="text-align:center;" nowrap><b>Status</b></th>
                 
                 
                    
	</tr>
                </thead>
                 <tbody  id="myTable">
                <?php
                $sno=1;
                $q1=0; 
                $clr='';
                
      $sql4 = "SELECT *,d.id as id FROM details_entry d left join hr_master h on d.cid=h.id left join depart a on h.depname=a.id  left join desi_master b on h.desiname=b.id   where d.cid='$id' and d.status='1' order by d.totalmark desc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {


                
                if($wz1['approve']=='1')
                $clr='success';
              elseif($wz1['approve']=='2')
                $clr='danger';
              elseif($wz1['approve']=='3')
                $clr='secondary';
            


             $a  = $wz1['slider_val'] + $wz1['slider_val2']+$wz1['slider_val3']+$wz1['slider_val4'];
            $q1 = ($a / 400) * 100 ;
             $b  = $wz1['slider_val5'] + $wz1['slider_val6']+$wz1['slider_val7']+$wz1['slider_val8'];
            $q2 = ($b / 400) * 100 ;
             $c  = $wz1['slider_val9'] + $wz1['slider_val10']+$wz1['slider_val11']+$wz1['slider_val12'];
            $q3 = ($c / 400) * 100 ;
             $d = $wz1['slider_val13'] + $wz1['slider_val14']+$wz1['slider_val15']+$wz1['slider_val16'];
            $q4 = ($d / 400) * 100 ;
             $e  = $wz1['slider_val17'] + $wz1['slider_val18']+$wz1['slider_val19']+$wz1['slider_val20'];
            $q5 = ($e / 400) * 100 ;
            $f= $q1+$q2+$q3+$q4+$q5;
           $total=( $f / 500)*100;
            ?>
                    <tr>
                        <input name="id" id="id<?php echo $sno; ?>" hidden value="<?php echo $wz1['id']; ?>" />
               <td style="text-align:center"><?php echo $sno; ?></td>          
                   
               <td style="text-align:center;text-transform:uppercase"><b style="font-size:14px"><?php echo $wz1['name']; ?></b></td>           
               <td style="text-align:center"><?php echo $wz1['mobile']; ?></td>           
               <td style="text-align:center"><?php echo $q1;?></td>           
               <td style="text-align:center"><?php echo $q2;?></td>           
               <td style="text-align:center"><?php echo $q3;?></td>           
               <td style="text-align:center"><?php echo $q4;?></td>           
               <td style="text-align:center"><?php echo $q5;?></td>           
               <td style="text-align:center"><b><?php echo $total;?>%</b></td> 
               
               <?php if($wz1['approve']=='0'){        ?>
               <td> <button class="btn btn-success btn-sm waves-effect waves-light" style="width:85px;" data-bs-toggle="modal" data-bs-target="#modalCenter3" value="1" tabindex="0" onclick="get(id<?php echo $sno;?>.value,1);" type="button" >Select
                            &nbsp;
                          </button><br>
                          <button class="btn btn-danger btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalCenter3" style="width:85px;" value="2" tabindex="0"  onclick="get(id<?php echo $sno;?>.value,2);" type="button" >Reject
                           &nbsp;
                          </button><br>
                          <button class="btn btn-secondary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalCenter3" style="width:85px;" value="2" tabindex="0"  onclick="get(id<?php echo $sno;?>.value,3);" type="button" >Hold
                           &nbsp;
                          </button>
                        
                        
                        
                        
                        </td >  <?php }else{?>         
               <td style="text-align:center; "> <button class="btn btn-<?php echo $clr;?> btn-sm waves-effect waves-light" style="width:95px;"data-bs-toggle="modal" data-bs-target="#modalCenter3"  onclick="get(id<?php echo $sno;?>.value,0);" tabindex="0"  type="button" ><?php if($wz1['approve']=='1') {  ?> Selected<?php }elseif($wz1['approve']=='2'){?> Rejected<?php } else{?>Holded<?php }?>
                            &nbsp;
                          </button>
                          
                        
                        
                        
                        
                        </td> <?php }?>          
                   
             
                  </tr>
           
             <?php $sno++;
			 unset($outtime);unset($intime);
            }
             ?>
            </tbody>
            
</table> 

             
              </div>            
              </div>            
                  
           
            
            <div class="card-header d-flex align-items-center justify-content-between"> 
<a href="hr_master.php" class="btn btn-primary mt-4"><i class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
<button onclick="PrintElem('#mydiv')" class="btn btn-secondary mt-4" value="Print"><i class="ti ti-printer me-sm-1 me-0"></i>Print</button>
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
        mywindow.document.write('th, td { padding: 10px; text-align:center; }');
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

