<?php
     
    require 'conn.php';
    $id = trim($_POST['id']);
    $sql = "DELETE FROM children WHERE id=$id;";
    $result = $conn->query($sql);
     
    if ($result===TRUE){
 
        echo  json_encode(['success' => true , 'message' => 'Child record deleted successfully']);       
    } else{
        echo  json_encode(['success' => false , 'message' => 'Not Successful']);
    }
    exit(0);


?>
 