<?php include "config.php";include "head.php" ?>
<?php include "session.php";?>

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

          <!-- / Navbar -->
      
          <!-- Content wrapper -->
          <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y"> 

          <?php 

           $sq ="SELECT * from permission_access WHERE usr_id ='$uid' and names=3";
                    $result1 = mysqli_query($conn, $sq);
                    $row = mysqli_fetch_array($result1);
                     $create_permit = $row['create_access'];
                     $delete_permit = $row['delete_access'];
                     $write_permit = $row['write_access'];
                    


          $query = "SELECT max(status) as status FROM employee WHERE userrole=2 ";
          $result = mysqli_query($conn, $query);
          $rws = mysqli_fetch_array($result);
           $show = $rws['status'];
          
          ?>
          
          <div class="card-header d-flex align-items-center justify-content-between mb-4 mt-4">
         <button class="btn btn-primary">Manage Staff</button>
 <div >
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                              <?php
                              if($create_permit==1){
                                ?>
                              <a type="button" href="emp_add.php" class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
</a> 
<?php
}else{
  ?>
                              <button disabled class="btn btn-primary"> <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i> Add New
                             
</button> <?php } ?>
                              <div class="btn-group" role="group">
                                <?php if($user_role==1){ ?>
                                <?php if($show==1){ ?>
                                <button
                                  id="0"
                                  type="button"
                                  class="btn btn-label-warning "
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  onclick ="block_all(this.id)"
                                  aria-expanded="false">
                                  Block All
                                </button>
                                <?php }else{
                                  ?>
                                <button
                                  id="2"
                                  type="button"
                                  class="btn btn-label-warning "
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  onclick ="unblock_all(this.id)"
                                  aria-expanded="false">
                                  Unblock All
                                  
                                </button>
                               <?php } }
                               else{ ?>
                                <button
                                  id="0"
                                  disabled
                                  type="button"
                                  class="btn btn-label-warning "
                                  data-bs-toggle="dropdown"
                                  aria-haspopup="true"
                                  onclick ="block_all(this.id)"
                                  aria-expanded="false">
                                  Block All
                                </button>
                               <?php
                               }
                               ?>
                                <!-- <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                             
                                  <a class="dropdown-item" href="javascript:void(0);">  <span class="ti ti-file"></span> Report</a>
                                </div> -->
                              </div>
                            </div>
                          </div>
                        </div>         


<!-- Teams Cards -->
<div class=" row g-4 mb-4">
                 <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php  echo $rows['id'];?>">
                          
                         
                           
                 <?php
			$sql = "SELECT * FROM employee ";
      $result = mysqli_query($conn,$sql);
      $count1=mysqli_num_rows($result);
               
       
          ?>

                <div class="col-sm-6 col-xl-3" >
                  <div class="card">
                    <a href="emp_master1.php">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left" >
                          <span>All STAFFS</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2" ><?php echo $count1; ?> </h3>
                            <p class="text-success mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-primary">
                            <i class="ti ti-user-plus ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
      </a>
                  </div>
                </div>

                <?php

                $date=date('y-m-d');
	 	$sql2 = "SELECT * FROM  attendance where date='$date' and direction='IN' group by empid ";
$result2 = mysqli_query($conn,$sql2);
 $count2=mysqli_num_rows($result2);
 //$row = mysqli_fetch_array($result);
 
 $sql1 = "SELECT * from employee where status='2' order by name ASC";
 $result1 = mysqli_query($conn,$sql1);
 $count3=mysqli_num_rows($result1);
			while($row1 = mysqli_fetch_array($result1)){  
          
          ?>   <?php 
               }
               $absent=$count1-$count3; 
                ?>          
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <a href="emp_master1.php?bid=<?php echo base64_encode("Disable");?>">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>RELIEVED STAFFS</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2"><?php echo $count3; ?></h3>
                            <p class="text-success mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-success">
                          <i class="ti ti-user-check ti-sm"> </i>
                          </span>
                        </div>
                      </div>
                    </div>
      </a>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>WORKING STAFFS</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2"><?php echo $absent; ?></h3>
                            <p class="text-danger mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-danger">
                          <i class="ti ti-user ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php

$date=date('y-m-d');
$sql3 = "SELECT * FROM  leave_req where  fdate<='$date' and todate>='$date' and status='Approved' ";
$result3 = mysqli_query($conn,$sql3);
$count4=mysqli_num_rows($result3);
//$row = mysqli_fetch_array($result);

?>             
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>STAFFS ON LEAVE</span>
                          <div class="d-flex align-items-center my-2">
                            <h3 class="mb-0 me-2"><?php echo $count4; ?></h3>
                            <p class="text-success mb-0"></p>
                          </div>
                          <p class="mb-0"></p>
                        </div>
                        <div class="avatar">
                          <span class="avatar-initial rounded bg-label-warning">
                            <i class="ti ti-user-exclamation ti-sm"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

<!-- Vertically Centered Modal -->
                    <div class="">
                     
                      <div class="">
                       

                        <!-- Modal -->
                       
                      </div>
                    </div>
                         </div>                   

                         <div class="card card-body"  style="">
              
                <div style="padding-left:10px;padding-right:10px;padding-bottom:10px;height:500px " class="table-responsive text-nowrap">
                  <table id="myTable" class="table table-hover" >
                    <thead>
                      <tr>
                                      <th >S.no</th>
                                      <th nowrap >Staff ID</th>
                                      <th nowrap> Name & Designation</th>
                                      <th >Department</th>
                                      <th >R.Manager</th>
                                      <th >D.O.J</th>
                                      <th  >Status</th>
                                      <th >Action</th>
                                      <th ></th>
                      </tr>
                    </thead>
                    <tbody  class="table-border">
                    <?php
                                                  $sno=1;
                                                  $clr='';
                                  // LOOP TILL END OF DATA
                                  if($_GET['bid']!='')
                                  {
                                    $sts=base64_decode($_GET['bid']);  
                                  $sql = "SELECT *,e.id as id FROM employee e left join depart d on e.depart=d.id left join desi_master m on e.desig=m.id where status='$sts' order by e.id asc";
                                  }
                                  else{
                                  $sql = "SELECT *,e.id as id FROM employee e left join depart d on e.depart=d.id left join desi_master m on e.desig=m.id where status!='2' order by e.id asc";
                                  }
                              $result =mysqli_query($conn, $sql);
                              $count=mysqli_num_rows($result);
                              if($count>0)
                              {
                               while($rows=mysqli_fetch_array($result))
            
                              {

                                $status=$rows['status'];  
                                $urole=$rows['userrole'];  
                                $id=$rows['id'];  
				
				
                                if($status=='2'){
                                  $sts='Disable';
                                  $clr='danger';
                                }
                                elseif($status=='1'){
                                  $sts='Active';
                                  $clr='success';
                                }
                                elseif($status=='0'){
                                  $sts='In Active';
                                  $clr='danger';
                                }

                                  $sql2 = " SELECT * FROM employee t where id='".$rows['reportmanager']."' ";
                                  $result2 =mysqli_query($conn, $sql2);
                               
                                  
                                  $rows2=mysqli_fetch_array($result2);



                              ?>
                             
                      <tr style="font-size:15px">
                        <input type="text" hidden name="id[]" id="id<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                        <td style="padding-top:15px;padding-bottom:15px;padding-left:20px;" >
                          <input type="text" hidden name="nam_id[]" id="nam_id<?php echo $sno; ?>" value="<?php echo $id;?>" onkeyup="get_permit(edit<?php echo $sno;?>.id)">
                          <span class="fw-medium" nowrap><?php echo $sno;?></span>
                        </td>
                        <td style="padding-top:15px;padding-bottom:15px;" nowrap><?php echo $rows['empid'];?></td>
                        <td style="padding-top:15px;padding-bottom:15px;" nowrap>
                         <span class="text-primary"><?php echo $rows['name'];?></span><br>
                        <span style="padding-top: 5px;font-size:12px;font-style:italic" class="text-dark"> <?php echo $rows['desig'];?></span>
                        </td>
                        <td style="padding-top:15px;padding-bottom:15px;font-size:13px" nowrap><?php  echo $rows['depname'];?></td>
                                  <!-- <td style="padding-top:15px;padding-bottom:15px;font-size:13px" nowrap><?php echo $rows['desig'];?></td> -->
                                  <td style="padding-top:15px;padding-bottom:15px;"nowrap><?php  echo $rows2['name'];?></td>
                                  <td style="padding-top:15px;padding-bottom:15px;"nowrap><?php echo date ('d M Y ',strtotime($rows['hiringdate'])); ?></td>
                                   <td  style="padding-top:15px;padding-bottom:15px;"nowrap><span class="badge bg-label-<?php echo $clr;?> me-1" style="color:"><?php echo $sts;?></span></td>
                       
                        <td>
                        <div class="ms-auto">
                         <ul class="list-inline mb-0 d-flex align-items-center">
                         
                           <li class="list-inline-item">
                             <div class="dropdown">
                               <button
                                 type="button"
                                 class="btn dropdown-toggle hide-arrow p-0"
                                 data-bs-toggle="dropdown"
                                 aria-expanded="false">
                                 <i class="ti ti-dots-vertical text-muted"></i>
                               </button>
                               <ul class="dropdown-menu dropdown-menu-end">
                                 
                                 <li>
                                  <a class="dropdown-item"  id="edit<?php echo $sno;?>" href="emp_add_upd.php?cid=<?php echo base64_encode($rows['id']);?>"  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>&nbsp;&nbsp;Profile</a></li>
<?php if($empid=='ADM01'){?>
                                 <li><a class="dropdown-item"  id="edit<?php echo $sno;?>" href="security.php?cid=<?php echo base64_encode($rows['id']);?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
  <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
</svg>&nbsp;&nbsp;Change Password</a></li>
<?php } ?>
                                 <li><a class="dropdown-item"  id="edit<?php echo $sno;?>" href="demo.php?cid=<?php echo base64_encode($rows['id']);?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
  <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
  <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
</svg>&nbsp;&nbsp;Documents</a></li>
                                 <li><a class="dropdown-item text-dark"  id="edit<?php echo $sno;?>" data-bs-toggle="modal"
                          data-bs-target="#modalCenter" onclick="get_permit(this.id)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
  <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
</svg>&nbsp;&nbsp;Permission</a></li>

                                 <li><a class="dropdown-item text-dark"  id="editval<?php echo $sno;?>"  data-bs-target="#addRoleModal"
                            data-bs-toggle="modal" onclick="get_permitacc(this.id)">
                            <svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g>
                            <path d="m452 288.109v-248.037l-60-40-60 40v203.82c-3.922-2.368-8.144-4.338-12.631-5.825l-46.612-15.452c11.111-17.11 
                            17.574-37.504 17.574-59.38v-77.684c0-47.173-38.378-85.551-85.551-85.551h-47.56c-47.173 0-85.551 38.378-85.551 85.551v77.684c0
                             21.877 6.463 42.27 17.574 59.38l-46.612 15.452c-25.499 8.453-42.631 32.18-42.631 59.043v141.321h281.35c18.186 43.179 60.935 
                             73.569 110.65 73.569 66.168 0 120-53.832 120-120 0-44.325-24.159-83.112-60-103.891zm-60-251.982 30
                              20v219.67c-9.592-2.478-19.645-3.797-30-3.797s-20.408 1.319-30 3.797v-33.797h30v-30h-30v-30h30v-30h-30v-30h30v-30h-30v-35.873zm-61.114
                               252.641c-10.843 6.444-20.588 14.544-28.886 23.953v-48.807l7.929 2.629c10.476 3.473 18.205 11.933 20.957 22.225zm-240.886-34.799 20.88-6.922c18.995
                                15.918 43.456 25.518 70.12 25.518s51.125-9.6 70.12-25.518l20.88 6.922v48.596h-182zm170.331-132.812-7.521 3.212c-13.452 5.744-28.445 6.198-42.272
                                 1.26-19.068-6.81-40.069-6.812-59.135 0-13.801 4.928-28.82 4.463-42.291-1.31l-7.442-3.189v-13.075c3.757-2.015 9.125-4.604 
                                 16.016-7.181 13.266-4.961 35.016-10.874 63.289-10.874s50.021 5.913 63.287 10.874c6.928 2.59 12.317 5.194 16.069 
                                 7.208zm-158.662 32.464c19.291 7.084 40.353 7.212 59.824.26 12.561-4.486 26.394-4.485 39.007.019 9.606 3.431 19.602 
                                 5.14 29.583 5.14 10.246 0 20.475-1.803 30.248-5.392v9.587c0 43.743-35.588 79.331-79.331 79.331s-79.331-35.588-79.331-79.331zm55.551-123.621h47.561c26.856 
                                 0 49.319 19.158 54.448 44.524-17.586-7.121-44.081-14.524-78.254-14.524-34.137 0-60.613 7.387-78.199 14.502 5.137-25.355 27.595-44.502 
                                 54.444-44.502zm-127.22 267.11c0-13.907 8.87-26.191 22.071-30.567l7.929-2.628v144.517h-30zm60 111.322v-75.866h182v59.434c0 5.574.391 11.058
                                  1.13 16.432zm302 73.568c-49.626 0-90-40.374-90-90s40.374-90 90-90 90 40.374 90 90-40.374 90-90 90z"/>
                                  <path d="m392 362c-24.813 0-45 20.187-45 45s20.187 45 45 45 45-20.187 45-45-20.187-45-45-45zm0 60c-8.271
                                   0-15-6.729-15-15s6.729-15 15-15 15 6.729 15 15-6.729 15-15 15z"/></g>
                                  </svg>&nbsp;&nbsp;Permission Access</a></li>

                                 <!-- <li><a class="dropdown-item"  id="edit<?php echo $sno;?>" href="lastlogin.php?cid=<?php echo base64_encode($rows['id']);?>" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
</svg>&nbsp;&nbsp;Recent login</a></li> -->
                                 
                                 <li>
                                  
                                 <a type="button" 
                          class="dropdown-item" style="color:red"
                          id="del<?php echo $sno;?>" onclick="delCurr(del<?php echo $sno;?>.id);" >
                            <span style="color:red" class="ti-xs ti ti-trash me-1"></span>Delete
                         </a>

                                  

                                 </li>
                               </ul>
                             </div>
                           </li>
                         </ul>
                       </div>
                        </td>
                        <?php if($urole==1){?>
                          <td></td>
                          <?php }else{?>
                        <?php if($status==1){ ?>
                        <td >  <button class="btn btn-label-danger"  style="width: 125px;"
                        id="block<?php echo $rows['id'];?>" onclick="block_usr(block<?php echo $sno;?>.id);">
                       <span class="ti-xs ti ti-lock me-1"></span><b>Block</b> 
                        </button>
                           </td>
                           
                        <?php } else if($status==0){?>
                         <td>  <button class="btn btn-label-success"  
                id="unblock<?php echo $rows['id'];?>" onclick="unblock_usr(unblock<?php echo $sno;?>.id);"
                >    <span class="ti-xs ti ti-key me-1"></span><b>Unblock</b> 
                  </button>
                        </td>
                        <?php } }?>
                        <?php
                                       $sno++;
                                      
                                     } ?>
                      </tr>
                      
                      <?php
                              
                            }
                          
                         
                       else{ ?>
                     <tr><td colspan="9" align="center">  <p>No Data Found</p></td> </tr>
                       <?php
                       } ?>
                        
                    </tbody>
                  </table>
                </div>
              </div>

 <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
   <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
<div class="modal-dialog modal-dialog-centered" role="document" id="popup">
                           
                           
                            </div>
                          </form>
                          </div>
 </div>

 </div>  
            </div>  
        <!-- / Layout page -->
      </div>
      </div>
    </div>

    <!-- permission access -->
     <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                   <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role" id="permit_access">
                 
                </div>
                 </form>
              </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    
<?php include "footer.php"; ?>
  </body>

<?php
if (isset($_POST['submit'])) {

  foreach($_POST['module'] as $key => $val) {
    $name_id = $_POST['nam_id'];
  $module = $_POST['module'];
    $modules=implode(",", $_POST['module']);

    $sql = "UPDATE employee SET module='$modules' WHERE id='$name_id'";
    $result = mysqli_query($conn, $sql);
  }
  
  
  if ($result) {

  echo "<script>alert('Modules Assigned Successfully..');window.location='emp_master1.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<?php
if (isset($_POST['submit1'])) {

  foreach($_POST['names'] as $key => $val) {
    $uid = $_POST['usr_id'][$key];
    $mid = $_POST['mid'][$key];
    $name = $_POST['names'][$key];
  // $raccess = $_POST['read_access'];
    $r_access= $_POST['read_access'][$key];
    $w_access= $_POST['write_access'][$key];
    $c_access= $_POST['create_access'][$key];
    $d_access= $_POST['delete_access'][$key];

      if($r_access=='on'){
    $r_status='1';
   }
   else{
    $r_status='0';
   }
   
      if($w_access=='on'){
    $w_status='1';
   }
   else{
    $w_status='0';
   }
   
      if($c_access=='on'){
  $c_status='1';
   }
   else{
    $c_status='0';
   }
   
      if($d_access=='on'){
    $d_status='1';
   }
   else{
    $d_status='0';
   }
    
    $sq = "SELECT * FROM permission_access WHERE usr_id='$uid' and names='$name'";
   $res = mysqli_query($conn, $sq);
   $count = mysqli_num_rows($res);
   if($count <= 0){
   $row = mysqli_fetch_assoc($res);

   $sql ="INSERT into permission_access (usr_id,mod_id,names,read_access,write_access,create_access,delete_access)
   VALUES('$uid','$mid','$name','$r_status','$w_status','$c_status','$d_status')";
   $result1 = mysqli_query($conn, $sql);
   }
   else{
    $sql1 = "UPDATE permission_access SET read_access='$r_status',write_access='$w_status',create_access='$c_status',delete_access='$d_status' WHERE usr_id='$uid' and mod_id='$mid' and names='$name'";
    $result1 = mysqli_query($conn, $sql1);
  }
  }
  
  
  if ($result1) {

   echo "<script>alert('Access Permission Granted..');window.location='emp_master1.php';</script>";

  } else {
    echo '<script>alert("Something Wrong, data not stored")</script>';
  }
}
?> 

<script>
function delCurr(id) {
  var c = id.substr(3);
  var user_id = document.getElementById('id' + c).value;

  // Using SweetAlert for confirmation
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result4) => {
    if (result4.isConfirmed) {
      // User confirmed deletion
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          r = xmlhttp.responseText;
          const data = JSON.parse(r);
          if (data.sts == 'ok') {
            // Notify user and redirect on success
            Swal.fire('Deleted!', 'Your file has been deleted.', 'success').then(() => {
              window.location = 'emp_master1.php';
            });
          }
        }
      };
      xmlhttp.open("GET", "ajax/delemp.php?id=" + user_id, true);
      xmlhttp.send();
    }
  });
}
</script>

<script>
function get_permit(id) {
  var c=(id.substr(4));
  // alert(id);
  var value2 = document.getElementById('nam_id'+c).value;
  // alert(value2);
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

 document.getElementById('popup').innerHTML=r;  



      }
      };
    xmlhttp.open("GET","ajax/get_permit.php?id="+id +"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>

<script>
function get_permitacc(id) {
  var c=(id.substr(7));
  // alert(id);
  var value2 = document.getElementById('nam_id'+c).value;
  // alert(value2);
  if (id!= "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//  alert(r);

 document.getElementById('permit_access').innerHTML=r;  



      }
      };
    xmlhttp.open("GET","ajax/get_permitacc.php?id="+id+"&cid="+value2,true);
    xmlhttp.send();
  }
}
</script>


<script>
function block_usr(id) {

  var res = confirm("Are you sure to Block User !");
if (res) {
    

  var c=(id.substr(5));
  var cid=document.getElementById('id'+c).value;
  // alert(cid);
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("User ID Blocked Successfully..");
  window.location='emp_master1.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/block_user.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>

<script>
function unblock_usr(id) {

  var res = confirm("Are you sure to Unblock User !");
if (res) {
    

  var c=(id.substr(7));
  var cid=document.getElementById('id'+c).value;
  //alert(cid);
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){

  alert("User ID Unblocked Successfully..");
  window.location='emp_master1.php';

                   
}
      }
    };
    xmlhttp.open("GET","ajax/block_user.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>

<script>
function block_all(id) {

  var res = confirm("Are you sure to Unblock All Users !");
if (res) {
    
// alert("hi");
  // var c=(id.substr(7));
  var cid=("1");
  if (cid != "") {
    // alert(cid);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);

  alert("All Users ID Unblocked Successfully..");
  window.location='emp_master1.php';

  
      }
    };
    xmlhttp.open("GET","ajax/block_user_all.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>

<script>
function unblock_all(id) {
  var res = confirm("Are you sure to Unblock All Users !");
  if (res) {
    
    // var cid=document.getElementById('id').value;
    var cid = ("2");
  // alert(cid);
  if (cid != "") {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
// alert(r);

  alert("All Users ID Unblocked Successfully..");
  window.location='emp_master1.php';

 
      }
    };
    xmlhttp.open("GET","ajax/block_user_all.php?id="+cid,true);
    xmlhttp.send();
  }
}
}
</script>