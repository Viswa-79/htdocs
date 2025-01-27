<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "DELETE FROM budget_entry WHERE id = '".$_GET['id']."'";
    $result=mysqli_query($conn ,$sql);
    
    $sql1 = "DELETE FROM budget_yarn WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    $sql1 = "DELETE FROM budget_kintting WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    $sql1 = "DELETE FROM budget_dyeing WHERE cid = '".$_GET['id']."'";
    $result1=mysqli_query($conn ,$sql1);

    // $sql1 = "DELETE FROM budget_entry WHERE cid = '".$_GET['id']."'";
    // $result1=mysqli_query($conn ,$sql1);

    
    if($result){
       
        $data['sts'] = 'ok';
       
    } 
    
    
    //returns data as JSON format
    echo json_encode($data);
}
?>