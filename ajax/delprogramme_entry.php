<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "DELETE FROM programme_entry WHERE id = '".$_GET['id']."'";
    $result=mysqli_query($conn ,$sql);
    
    $sql1 = "DELETE FROM programme_entry1 WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    $sql1 = "DELETE FROM programme_entry2 WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    $sql1 = "DELETE FROM programme_entry3 WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    $sql1 = "DELETE FROM programme_entry4 WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    
    if($result){
       
        $data['sts'] = 'ok';
       
    } 
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>