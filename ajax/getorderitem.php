<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
 
 $orderno=$_GET['q2'];
  $itemno=$_GET['id'];
    
    $sql = "SELECT * FROM order2 o2 left join order1 o1 on o2.cid=o1.id WHERE ord_no = '$orderno' and itemno='$itemno'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['itemno'] = $row['itemno'];
        $data['descr'] = $row['itemdesc'];
        $data['label'] = $row['label'];
        $data['print'] = $row['print'];
        $data['quality'] = $row['quality'];
        $data['clwidth'] = $row['clwidth'];
        $data['size'] = $row['size'];
        $data['unit'] = $row['unit'];
        $data['pack'] = $row['pack'];
        $data['quantity'] = $row['quantity'];
		$data['pono'] = $row['pono'];
        
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>