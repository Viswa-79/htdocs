<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM item_master WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['code'] = $row['code'];
        $data['descr'] = $row['descr'];
        $data['label'] = $row['label'];
        $data['print'] = $row['print'];
        $data['quality'] = $row['quality'];
        $data['clwidth'] = $row['clwidth'];
        $data['size'] = $row['size'];
        $data['unit'] = $row['unit'];
        $data['pack'] = $row['pack'];
        
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>