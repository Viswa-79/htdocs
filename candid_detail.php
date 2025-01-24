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
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
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


<?php $id=base64_decode($_GET['id']);
?>
            
            <div  class="container-xxl flex-grow-1 container-p-y">

            <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;">
            
            </h1>
            <?php
                           $sql4 = " SELECT * FROM  hr_master h  left join depart a on h.depname=a.id  left join desi_master b on h.desiname=b.id  WHERE h.id='$id'";
                              $result4 = mysqli_query($conn, $sql4);
                              $wz1 = mysqli_fetch_array($result4);
                                  ?>

              <div id="mydiv" class="card mb-4 ">

             
              <div class="card-header d-flex align-items-center justify-content-between mb-2 mt-0">
          <button class="btn btn-label-primary waves-effect">Detail Report</button>
          <a class="btn btn-label-secondary float-end  waves-effect" style="text-transform:uppercase" data-bs-toggle="offcanvas">Department : <?php echo $wz1['depname']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;Designation : <?php echo $wz1['desig']; ?></a>
      </div><br>
                     <div class="card-header d-flex align-items-center justify-content-between"> 
                    
                  </div>
                <div class="card-body text-nowrap table-responsive">
                <table  class=" table table-bordered " width="100%" style="border-collapse:collapse" border="1" >
                <thead >
                 
                  <tr >
                  <th >S.No</th>
                  <th>Name</th>
                  <th>Ph.no</th>
				
                 
                  <th style="text-align:center">Total</th>
                 
                 
          
                    
	</tr>
                </thead>
                 <tbody  id="myTable">
                <?php
                $sno=1;
                $q1=0; 
                
          $sql4 = "SELECT * FROM details_entry d left join hr_master h on d.cid=h.id left join depart a on h.depname=a.id  left join desi_master b on h.desiname=b.id   where d.cid='$id' and d.status='1' order by  d.totalmark  desc";
            $result4 = mysqli_query($conn, $sql4);
            while($wz1 = mysqli_fetch_array($result4))
            {

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
               <td style="text-align:center"><?php echo $sno; ?></td>          
                   
               <td style="text-transform:uppercase;"><b><?php echo $wz1['name']; ?><b></td>           
               <td><?php echo $wz1['mobile']; ?></td>           
                  
                       
                   
             
             
                        <td style="text-align:center" ><b><?php echo $total;?>%</b></td>  
                        
                        
						



                  </tr>
                    <tr>
               <td colspan="2" class="whitespace-nowrap px-4 py-3 sm:px-5" style="font-size:20px;text-align:left">
               <table class=" table table-bordered " width="100%" style="border-collapse:collapse" border="1">
                    
                     <tr> <td>Clarity of expression </td><td><?php echo $wz1['slider_val'];?></td></tr>
                     <tr> <td>Active listening</td><td><?php echo $wz1['slider_val2'];?></td></tr>
                     <tr> <td>Ability to articulate ideas</td><td><?php echo $wz1['slider_val3'];?></td></tr>
                     <tr> <td>Ability to speak bold</td><td><?php echo $wz1['slider_val4'];?></td></tr>
                     <tr> <td>Knowledge of relevant tools/software</td><td> <?php echo $wz1['slider_val5'];?></td></tr>
                     <tr> <td>Problem-solving ability</td><td><?php echo $wz1['slider_val6'];?></td></tr>
                     <tr> <td>Familiarity with industry best practices</td><td><?php echo $wz1['slider_val7'];?></td></tr>
                     <tr> <td>Understand the technical requirements</td><td><?php echo $wz1['slider_val8'];?> </td></tr>
                     <tr> <td>Ability to work well in a team</td><td><?php echo $wz1['slider_val9'];?> </td></tr>
                     <tr> <td>Contributing to group discussions</td><td><?php echo $wz1['slider_val10'];?> </td></tr>
                     
           </table>
                     
            </td>
            <td colspan="2" class="whitespace-nowrap px-4 py-3 sm:px-5"  style="font-size:20px;text-align:left">
            <table class=" table table-bordered " width="100%" style="border-collapse:collapse" border="1">


            <tr> <td>Handling conflicts or disagreements </td><td><?php echo $wz1['slider_val11'];?> </td></tr>
            <tr> <td>Encourage continuously and developing team</td><td><?php echo $wz1['slider_val12'];?></td></tr>
            <tr> <td>Flexibility in handling change </td><td><?php echo $wz1['slider_val13'];?></td></tr>
            <tr> <td>Willingness to learn new skills</td><td><?php echo $wz1['slider_val14'];?></td></tr>
            <tr> <td>Ability to work in diverse environments </td><td><?php echo $wz1['slider_val15'];?></td></tr>
            <tr> <td>Able to manage any situation </td><td><?php echo $wz1['slider_val16'];?></td></tr>
            <tr> <td>Initiative-taking</td><td><?php echo $wz1['slider_val17'];?></td></tr>
            <tr> <td>Decision-making skills </td><td><?php echo $wz1['slider_val18'];?></td></tr>
            <tr> <td>Ability to motivate others </td><td><?php echo $wz1['slider_val19'];?></td></tr>
            <tr> <td>create more leaders</td><td><?php echo $wz1['slider_val20'];?></td></tr>

                       

                        </table>
                        </td>

                        </tr>
<?php if( $wz1['img1']!=''||  $wz1['img2']!=''){ ?>

                        <tr>
                      
						 <td colspan="2" class="whitespace-nowrap px-4 py-3 sm:px-5">
                         <div class="preview-container" id="previewContainer">
        <img src="uploads/<?php echo $wz1['img1'];?>" style="width:550px;height:700px;border-radius:5px"  alt="Preview Image" id="previewImage">
       
       
    </div>
                        </td>
                       
						 <td  colspan="2"class="whitespace-nowrap px-4 py-3 sm:px-5">
                         <div class="preview-container" id="previewContainer">
      
        <img src="uploads/<?php echo $wz1['img2'];?>" alt="Preview Image" style="width:550px;height:700px;border-radius:5px" id="previewImage"><br>
       
    </div>
                        </td>
                       




                  </tr>
                  <?php }else {?>
                  <tr>
                      
                      <td colspan="4" style="text-align:center;text-transform:uppercase;" class="whitespace-nowrap px-4 py-3 sm:px-5"><h5>Files Not Attached</h5>
                                  
                                 </td>
                                
                    
                                
         
         
         
         
                           </tr>
                           <?php }?>
           
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