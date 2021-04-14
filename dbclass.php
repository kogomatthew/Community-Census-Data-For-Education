<?php

require "conn.php";  

function execute($sql){     
 
    if ($GLOBALS['conn']->query($sql) === TRUE) {
      return true;
    } else {
      return $conn->error;
    }
}

function get_data($sql){
  
  $result = $GLOBALS['conn']->query($sql);     
  return $result->fetch_all(MYSQLI_ASSOC);
}

 
?>
