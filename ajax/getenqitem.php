<?php
include "../config.php";
if(!empty($_GET['id']))
{
 
 
 $orderno=$_GET['q2'];
  $itemno=$_GET['id'];
    
    $sql = "SELECT * FROM enquiry1 o2 left join enquiry o1 on o2.cid=o1.id WHERE enq_no = '$orderno' and itemno='$itemno'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    $sql1 = "SELECT * FROM item_master WHERE id='$itemno'";
    $result1 = mysqli_query($conn, $sql1);
    
    $row1 = mysqli_fetch_assoc($result1);   
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['itemno'] = $row['itemno'];
        $data['descr'] = $row['itemdesc'];
        $data['label'] = $row['label'];
        $data['print'] = $row['print'];
        $data['quality'] = $row['quality'];
        $data['price'] = $row['price'];
       
        $data['size'] = $row['size'];
        $data['unit'] = $row['unit'];
     
        $data['quantity'] = $row['quantity'];
        $data['pack'] = $row1['pack'];
        $data['totamt'] = $row['price'] * $row['quantity'];

        
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>