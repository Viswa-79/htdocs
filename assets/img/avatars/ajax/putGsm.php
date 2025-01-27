
<?php
include "../config.php";
if(!empty($_GET['value']))
{
  
  $id=$_GET['id'];   
  $gsm=$_GET['value'];
  
  if($id==""){
 $sql="insert into gsm (gsm) values('$gsm')"; 
$result1=mysqli_query($conn, $sql);
if($result1) { 
    echo "GSM Registered Successfully";
  }
}
else{
  $sql="UPDATE gsm SET gsm='$gsm' WHERE id='$id'"; 
  $result2=mysqli_query($conn, $sql);
   if($result2) { 
    echo "GSM Updated Successfully";
  
  }
}


}
?> 
