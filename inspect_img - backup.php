<?php include "config.php"; 
ini_set('max_execution_time', '900000');
ini_set('memory_limit', '32M');
ini_set('post_max_size', '16M');
ini_set('upload_max_filesize', '16M');

?>

          <script>
function ee1(x)
{

// alert(x);
var a=x;
var c=(a.substr(6));
e=parseInt(c)+1;

document.getElementById('addimage'+e).style.display='table-row';

}

</script>
 


<?php
$fg1="select max(dcno) as id from inspection_grn";
		   //echo $fg1;
		   $fg2=mysqli_query($conn,$fg1);
		   $fg3=mysqli_fetch_object($fg2);
		   $fg4=$fg3->id+1;
       ?>



<?php
		 $sid=base64_decode($_GET['cid']);
		 ?> 

  <?php include "head.php"; ?>
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
              <div class="row ">
              <div class="col-12 mb-4">
              <div class="card-header d-flex align-items-center  justify-content-between">
                      <button class="btn btn-label-primary">Inspection</button>
                      
                      <a href="inspect_list.php"
                          type="button" class="btn btn-outline-warning" >
                            <span class="ti-xs ti ti-eye me-1"></span> View List
                          </a>
                    </div>
<br>
<div class="" style=" text-align:center">   
<button class="btn btn-bg-primary">Maximum Upload File Size : 2MB&nbsp;
   <span class="ti-xs ti ti-photo me-1"></span> JPEG&nbsp;
                        <span class="ti-xs ti ti-file me-1"></span> JPG&nbsp;
                        <span class="ti-xs ti ti-user me-1"></span> PNG
                        </button>
                       </div>
<br>
                <input type="text" hidden name="sidd" id="sidd" value="<?php echo $sid;?>">
                        <!-- Personal Info -->
                        <?php 
					$sql = "SELECT * FROM staff_assign where id='$sid'";
                    $result = mysqli_query($conn, $sql);
                    $rw11 = mysqli_fetch_array($result);
                    $partyname = $rw11['partyname']; 
                    $quote = $rw11['quote']; 
                    
					$sql5 = "SELECT * FROM staff_assign1 where cid='$sid'";
                    $result5 = mysqli_query($conn, $sql5);
                    $rw5 = mysqli_fetch_array($result5);
                    $factory = $rw5['factoryname']; 
                    $style = $rw5['styleno']; 
                    
                     ?>

<div class="card card-body">
<div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary"> Remark Images</span>
                        </div>
<div class="table-responsive">
<table class="table table-border border-top table-hover">
  <thead class="border-bottom " >
    <tr style="text-align:center;font-weight:bold">
        <th style="font-weight:bold" >s.no</th>
        <th style="font-weight:bold" >images</th>
        <th style="font-weight:bold" >remarks</th> 
        <th style="font-weight:bold" ></th> 
        
      </tr>
      
    </thead>
    <tbody>
      <?php 		
      $i = 0;
      $sno = 1;
      $sql2 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=1 order by id asc";
                    $result2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($result2);
                    if($count2 > 0){
                    while($rw2 = mysqli_fetch_array($result2))
                     {
                      $img_id = $rw2['img_id'];
                      $no = $rw2['sno'];
                      $status = $rw2['status'];
                                ?> 
             <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
               
               <tr >
                                  <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw2['id'];?>" /> 
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="<?php echo $img_id;?>" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <!-- <input type="text" hidden name="file11"  value="<?php echo $rw2['defimg'];?>"/> -->
                                      <input class="form-control"  type="file" id="file<?php echo $i;?>" name="file"
                         >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td nowrap>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                             <?php 
                       } else{
                         ?>
                         <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                           <span class="ti ti-repeat"></span>&nbsp;Replace</button>

                           <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>

                       <?php 
                       }
                        ?>
          </td>
          <td >   
          <a  href="uploads/<?php echo $rw2['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                     </td>
                                </tr>
                              </form>
                                <?php
                  $i++;
          }
          $j = $i;
             for ($i = $j, $sno = $j+1; $i < 100; $i++, $sno++) {
               ?>
                                <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             

                                  <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr>   
               
                        <?php
                          }
                        }
                        else{
                           for ($i = 0, $sno = 1; $i <1; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 1, $sno = 2; $i < 100; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="1" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                        </form>
                                <br>
                                <br>
               
                                <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                              <div class="card card-body">
                              <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary"> Workmanship Record</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >Reamrks</th> 
                                  <th style="font-weight:bold" ></th> 
                                  
                                </tr>
                                
                              </thead>
                              <tbody>
                             
              <?php 		
                     $i = 100;
                  $sno = 1;
                   $sql3 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=2 order by id asc";
                    $result3 = mysqli_query($conn, $sql3);
                    $count3 = mysqli_num_rows($result3);
                    if($count3 > 0){
                    while($rw3 = mysqli_fetch_array($result3))
                     {
                      $imgid = $rw3['img_id'];
                      $no = $rw3['sno'];
                      $sts = $rw3['status'];
                                ?> 
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw3['id'];?>" /> 
                                <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $rw3['sno'];?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                        <input type="text" hidden name="file11"  value="<?php echo $rw3['file'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                                    
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw3['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($imgid!=$sts){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                      <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                      <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                       <?php 
                       }
                        ?>
          </td>
                  <td >
                  <a  href="uploads/<?php echo $rw3['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                     </td>
                                </tr>
                                <?php
           
          }
          $j = $i;
          $no = $sno;
             for ($i = $j, $sno = $no; $i < 200; $i++, $sno++) {
          ?>
                                <tr  id="addimage<?php echo $i;?>" style="display:none">
                                 <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    aria-label="Product barcode"/>
                                    
                </td>
                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                     
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 100, $sno = 1; $i <101; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 101, $sno = 2; $i < 200; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="2" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>
                                              
                              </tbody>
                            </table>
                          </div>
                             </div>
                        </form>
                        <br>
              
                            <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                            <div class="col-md-12 mb-4 card card-body">
                              
                         <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">Packing List</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>
                                
                              </thead>
                              <tbody>
                              <?php 		
                               $i = 200;
                               $sno = 1;
                $sql4 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=3 order by id asc";
                    $result4 = mysqli_query($conn, $sql4);
                    $count4 = mysqli_num_rows($result4);
                    if($count4 > 0){
                    while($rw4 = mysqli_fetch_array($result4))
                     {
                      $img = $rw4['img_id'];
                      $no = $rw4['sno'];
                      $status1 = $rw4['status'];
                                ?> 
                           
                           
                                <tr >
                                <td hidden>
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw4['id'];?>" /> 

                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $rw4['sno'];?>">
                              </td>
                                  <td style="padding: 0.3rem;text-align:center">
                               
                        <input type="text" hidden name="file11"  value="<?php echo $rw4['file'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                                
                            </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw4['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img!=$status1){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                        <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                        <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                          <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                         <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw4['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                      </td>
                                </tr>
                                <?php
           
          }
          $j = $i;
          // $no = $sno;
             for ($i = $j, $sno = $no; $i < 300; $i++, $sno++) {
          ?>
                                <tr  id="addimage<?php echo $i;?>" style="display:none">
                                 <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    aria-label="Product barcode"/>
                                    
                </td>
                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                     
          </td>
          <td >
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 200, $sno = 1; $i <201; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 201, $sno = 2; $i < 300; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="3" 
                                  aria-label="Product barcode"/>
                                  </td>

                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>          
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                                <br>

                            <div class="col-md-12 mb-4 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">Barcode Sheet</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>                                
                              </thead>
                              <tbody>
                              <?php 		
                           $i = 300;
                           $sno = 1;
                    $sql5 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=4 order by id asc";
                    $result5 = mysqli_query($conn, $sql5);
                    $count5 = mysqli_num_rows($result5);
                    if($count5 > 0){
                    while($rw5 = mysqli_fetch_array($result5))
                     {
                      $img_id1 = $rw5['img_id'];
                      $no = $rw5['sno'];
                      $sts1 = $rw5['status'];
                                ?> 
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw5['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4"
                                  aria-label="Product barcode"/>
                                  </td>

                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                               
                        <input type="text" hidden name="file11"  value="<?php echo $rw5['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                      </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw5['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id1!=$sts1){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                       <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                       <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                       <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw5['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
              </td>
            </tr>
                                <?php

          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 400; $i++, $sno++) {
          ?>
                                <tr  id="addimage<?php echo $i;?>" style="display:none">
                                 <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4"
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    aria-label="Product barcode"/>
                                    
                </td>
                 
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 300, $sno = 1; $i <301; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 301, $sno = 2; $i < 400; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="4" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>
                                              
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                                  <br>

              <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">Onsite Test</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>  
                                
                              </thead>
                              <tbody>
                              <?php 		
                              $i = 400;
                              $sno = 1;
                $sql6 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=5 order by id asc";
                    $result6 = mysqli_query($conn, $sql6);
                    $count6 = mysqli_num_rows($result6);
                    if($count6 > 0){
                    while($rw6 = mysqli_fetch_array($result6))
                     {
                      $img_id = $rw6['img_id'];
                      $no = $rw6['sno'];
                      $sts = $rw6['status'];
                                ?> 
                            
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw6['id'];?>" /> 

                                <td hidden style="padding: 0.3rem;text-align:center">
                                  <input type="text" hidden  class="form-control" id="img_id<?php echo $i;?>" name="img_id" value="5">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                        <input type="text" hidden name="file11"  value="<?php echo $rw6['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                       
                </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw6['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                        
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$sts){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                         <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                        <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                        ?>
          </td> 
        <td >
        <a  href="uploads/<?php echo $rw6['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                     </td>
                                </tr>
                                <?php

          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 500; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                              
                                <td hidden>
                                  <input hidden type="text" class="form-control" id="img_id<?php echo $i;?>" name="img_id" value="5">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
             </td>
                     <td  style="padding: 0.3rem;text-align:center">
                                     <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                </td>
                   <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td> 

           <td >
           
                     </td>
            </tr>
            <?php
                          }
                        }
                        else{
                           for ($i = 400, $sno = 1; $i <401; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="5" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 401, $sno = 2; $i < 500; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="5" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>                  
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                           
                          <br>
                          <br>
                           

                             <div class="col-md-12 mb-8 card card-body">
                      
                              <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">REFERENCE SAMPLE V/S BULK</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr>  
                     
                              </thead>
                              <tbody>
                              <?php 		
                          $i = 500;
                          $sno = 1;
                $sql7 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=6 order by id asc";
                    $result7 = mysqli_query($conn, $sql7);
                    $count7 = mysqli_num_rows($result7);
                    if($count7 > 0){
                    while($rw7 = mysqli_fetch_array($result7))
                     {
                      $img_id = $rw7['img_id'];
                      $no = $rw7['sno'];
                      $status = $rw7['status'];
                                ?> 
                              <?php 
                              // for ($i = 500, $sno = 1; $i <501; $i++, $sno++) {
             ?> 
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw7['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="6">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw7['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw7['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                      <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                        <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                          <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw7['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a> 
             </td>
                                </tr>
                                <?php

          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 600; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="6">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
                   </td>
                       
                      <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >
             </td>
                                </tr>   
                               
                                <?php
                          }
                        }
                        else{
                           for ($i = 500, $sno = 1; $i <501; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="6" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 501, $sno = 2; $i < 600; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="6" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>             
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                             <br>
                             <br>


                             <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">GENERAL PRESENTATION </span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr> 
                              </thead>
                              <tbody>
                              <?php 		
                             $i = 600;
                           $sno = 1;
                    $sql8 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=7 order by id asc";
                    $result8 = mysqli_query($conn, $sql8);
                    $count8 = mysqli_num_rows($result8);
                    if($count8 > 0){
                    while($rw8 = mysqli_fetch_array($result8))
                     {
                      $img_id = $rw8['img_id'];
                      $no = $rw8['sno'];
                      $status = $rw8['status'];
                                ?> 

                                  <tr >
                                  <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw8['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="7">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw8['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw8['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                        <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                        <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                         <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                        ?>
          </td> 
          <td > 
          <a  href="uploads/<?php echo $rw8['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
          </td>
                                </tr>
                          
                               
                                <?php

          }
             for ($i = 601, $sno = 2; $i < 700; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="7">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                   
          </td>
          <td > 
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 600, $sno = 1; $i <601; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="7" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 601, $sno = 2; $i < 700; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="7" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?> 
                                              
                              </tbody>
                            </table>
                                </div> 
                                </div>                            
                                 <br>
                                 <br>


                             <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">PO Sheet Image</span>
                        </div>
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr> 
                              </thead>
                              <tbody>
                              <?php 		
                         $i = 700;
                         $sno = 1;
                    $sql9 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=8";
                    $result9 = mysqli_query($conn, $sql9);
                    $count9 = mysqli_num_rows($result9);
                    if($count9 > 0){
                    while($rw9 = mysqli_fetch_array($result9))
                     {
                      $img_id = $rw9['img_id'];
                      $no = $rw9['sno'];
                      $status = $rw9['status'];
                                ?> 
                             
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw9['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="8">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw9['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw9['defimg_remarks']; ?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                      <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                      <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                         <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                          <?php 
                       }
                        ?>
          </td>
          <td >
          <a  href="uploads/<?php echo $rw9['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a>
                      </td>
                                </tr>
                                <?php

          }
          $j =$i;
             for ($i = $j, $sno = $no; $i < 800; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="8">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td > 
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 700, $sno = 1; $i <701; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="8" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 701, $sno = 2; $i < 800; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="8" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>             
                              </tbody>
                            </table>
                                </div> 
                                </div> 
                                <br>
                                <br>


                             <div class="col-md-12 mb-8 card card-body">
                       <div style=" text-align:center;padding:15px">
                  <span style="font-size:16px;font-family:table-icons;" class="btn btn-outline-primary">COC Image</span>
                        </div>
                        
                      <div class=" table-responsive">
                            <table class="table table-border table-hover">
                              <thead class="border-bottom border-top" >
                                <tr style="text-align:center;font-weight:bold">
                                  <th style="font-weight:bold" >s.no</th>
                                  <th style="font-weight:bold" >Images</th>
                                  <th style="font-weight:bold" >remarks</th> 
                                  
                                </tr> 
                              </thead>
                              <tbody>
                              <?php 		
      $i = 800;
      $sno = 1;
      $sql10 = "SELECT * FROM wm_record_img where cid='$sid' and img_id=9 order by id asc";
                    $result10 = mysqli_query($conn, $sql10);
                    $count10 = mysqli_num_rows($result10);
                    if($count10 > 0){
                    while($rw10 = mysqli_fetch_array($result10))
                     {
                      $img_id = $rw10['img_id'];
                      $no = $rw10['sno'];
                      $status = $rw10['status'];
                                ?> 
                                <tr >
                                <input type="text" hidden id="rid<?php echo $i;?>" name="rid" value="<?php echo $rw10['id'];?>" /> 

                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="9">
                              </td>
                              <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $no;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    
                        <input type="text" hidden name="file11"  value="<?php echo $rw10['defimg'];?>"/>
                        <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                       
                                  </td>
                
                <td style="padding: 0.3rem">
                <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    value="<?php echo $rw10['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                </td>  
              
                      <td>
                      <span style="font-size:16px;font-family:table-icons;width:50px" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                      <?php 
                        if($img_id!=$status){
                          ?>
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                       <?php 
                       } else{
                          ?>
                        <button class="btn btn-light" id="replace<?php echo $i;?>" name="replace" onclick="upload_img(this.id)">
                        <span class="ti ti-repeat"></span>&nbsp;Replace</button>
                           <button class="btn btn-danger" id="delimg<?php echo $i;?>" onclick="del_img(this.id)" >
                       <span class="ti ti-trash"></span>&nbsp;Delete  </button>
                        <?php 
                       }
                      // for ($i = 800, $sno = 1; $i <801; $i++, $sno++) {
                        ?>
                    </td>
                    <td >
                    <a  href="uploads/<?php echo $rw10['defimg']; ?>" target="blank"
                          type="button" class="btn btn-outline-dark" >
                          <span class="ti-xs ti ti-photo me-1"></span> View Image
                          </a> 
                       </td>
                                </tr>
              <?php
          
          }
          $j = $i;
             for ($i = $j, $sno = $no; $i < 900; $i++, $sno++) {
          ?>
                                <tr id="addimage<?php echo $i;?>" style="display:none" >
                                <td hidden>
                                  <input hidden type="text" class="form-control" name="img_id" id="img_id<?php echo $i;?>" value="9">
                                  </td>
                                  <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                  <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    
                                    aria-label="Product barcode"/>
                </td>
                 
                <td style="padding: 0.3rem">
                             <input 
                                    type="text"
                                    class="form-control"
                                    id="remimg_remarks<?php echo $i;?>"
                                    name="remimg_remarks"
                                    
                                    aria-label="Product barcode"/>
                              </td>  
                                
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
          <td>    
                     
                         <button class="btn btn-warning submit-btn" value="upload" name="submit1" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
             </td>
          <td>    
            
             </td>
                                </tr>   
                                <?php
                          }
                        }
                        else{
                           for ($i = 800, $sno = 1; $i <801; $i++, $sno++) {
                          ?>
                           <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                             <tr >
                                <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="9" 
                                  aria-label="Product barcode"/>
                                  </td>
                                <td style="width:100px;text-align:center">
                                  <input type="text" style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>

                                  <td  style="padding: 0.3rem;text-align:center">
                                      <input class="form-control" type="file" id="file<?php echo $i;?>" name="file"
                        >                      
                        
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                value="<?php echo $rw2['defimg_remarks'];?>"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                      <td>
                     <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>  
                    </td>
                    
                    <td> 
                           <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                             <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
          </td>
          <td >           
                     
                     </td>
                      </tr>
                           </form>
                     <?php   
                     }
                       for ($i = 801, $sno = 2; $i < 900; $i++, $sno++) {
                         ?>      
                         <form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
                          <tr id="addimage<?php echo $i;?>" style="display:none">
                                  <td hidden>
                                  <input hidden type="text" name="img_id" id="img_id<?php echo $i;?>" class="form-control" value="9" 
                                  aria-label="Product barcode"/>
                                  </td>
                                  <td>
                                  <input type="text"  style="text-align:center" readonly name="sno" id="sno<?php echo $i;?>" class="form-control" value="<?php echo $sno;?>">
                              </td>
                                  <td  style="padding: 0.3rem;text-align:center">
                                    <input 
                                    type="file"
                                    class="form-control"
                                    id="file<?php echo $i;?>"
                                    name="file"
                                    style="text-align:center;"                         
                                    aria-label="Product barcode"/>
                                    
                    
                                  </td>
                
                <td style="padding: 0.3rem">
                 <input
                                    type="text"
                                    class="form-control" 
                                    id="remimg_remarks<?php echo $i;?>"
                                name="remimg_remarks"
                                    aria-label="Product barcode"/>
                                       
                </td>  
                <td>
                      <span style="font-size:16px;font-family:table-icons" id="addrow<?php echo $i;?>" class="btn btn-primary" onclick="ee1(this.id)">+</span>
          </td>
        
          <td>    
                         <button class="btn btn-warning submit-btn" value="upload" name="submit" onclick="save_img(this.id);" id="upload_img<?php echo $i;?>">
                         <span class="align-middle d-sm-inline-block ti ti-upload me-sm-1"></span>Upload</button>
                      
          </td>
          <td >
                
                     </td>
                                </tr> 
                       </form>
                                <?php
                                }
                                }
                                ?>            
                              </tbody>
                            </table>
                                </div> 
                                </div>    
            </div>    
            </div>    
              
				   <!-- <div class="col-12 d-flex justify-content-between">
                              <a href="inspection_list.php" class="btn btn-label-dark btn-prev">
                                <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block">Preview</span>
                              </a>
                             
                              <button class="btn btn-warning"  name="submit" value="submit">
                                <span class="align-middle d-sm-inline-block  me-sm-1">Submit</span>
                              </button>
							
                        </div>
                                  -->
                        
                      </div>
            
                
            </div>  
        <!-- / Layout page -->
      </div>
      </div>
    </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      
      <div class="drag-target"></div>
    
<?php include "footer.php"; ?>

<script>
function upload_img(id) {
  var c=(id.substr(7));
  // alert(c);
  var formData = new FormData();
    var imageFile = document.getElementById('file'+c).files[0];
    var value3=document.getElementById('remimg_remarks'+c).value;
  var value4=document.getElementById('rid'+c).value;
  
    formData.append('file', imageFile);
    formData.append('remimg_remarks', value3);
    formData.append('rid', value4);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/ajax_php_upd.php', true);
    xhr.onload = function() {
      r = xhr.responseText;
      
        if (xhr.status === 200) {
            // alert('Image Replaced Successfully!');
            alert(r);
        } else {
            // alert('Image Replaced Failed!');
        }
    };
    xhr.send(formData);
 
}

</script>

<script>
function save_img(id) {
  // alert("Hi");
  var c=(id.substr(10));
  // alert(c);
  var formData = new FormData();
    var imageFile = document.getElementById('file'+c).files[0];
    var value3=document.getElementById('remimg_remarks'+c).value;
  var value4=document.getElementById('img_id'+c).value;
  var value5=document.getElementById('sidd').value;
  var value6=document.getElementById('sno'+c).value;
  
    formData.append('file', imageFile);
    formData.append('remimg_remarks', value3);
    formData.append('img_id', value4);
    formData.append('sidd', value5);
    formData.append('sno', value6);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/ajax_php_file.php', true);
    xhr.onload = function() {
      r = xhr.responseText;
     
        if (xhr.status === 200) {
            // alert('Image Uploaded Successfully!');
             alert(r);
             window.location='inspect_img.php?cid=<?php echo base64_encode($sid);?>';

        } else {
            // alert('Image Upload Failed!');
        }
    };
    xhr.send(formData);
 
}

</script>

<script>
function del_img(id) {

  var res = confirm("Are you sure to Delete?");

  if (res) {
  var c=(id.substr(6));
  var formData = new FormData();
  var value6=document.getElementById('rid'+c).value;
  
    formData.append('rid', value6);
     
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/del_img.php', true);
    xhr.onload = function() {
      r = xhr.responseText;
    //  alert(r);
        if (xhr.status === 200) {
            alert('Image Deleted Successfully!');
            window.location='inspect_img.php?cid=<?php echo base64_encode($sid);?>';
        } else {
            alert('Image Deleted Failed!');
        }
    };
    xhr.send(formData);
}
}

</script>
