<?php
include "../config.php";
if(!empty($_GET['id']))
{
   
    $sql = "SELECT * FROM order1 WHERE ord_no = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result); 
    $cid = $row['id'];	
    //get user data from the database
    
    if($count > 0){
		echo "<option value=''>Select</option>";
    $sql = "SELECT * FROM order2 o2 left join item_master im on o2.itemno=im.id WHERE cid = '$cid'";
    $result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value='".$row['itemno']."'>".$row['code']."</option>";
	}		
}
}
?>