<?php
date_default_timezone_set("Africa/Nairobi");
require "conn.php";  
$last_id = '';

function execute($sql){     
   $db = $GLOBALS['conn'];
    if ($db->query($sql) === TRUE) {
      $GLOBALS['last_id']= $db->insert_id;      
      return true;
    } else {
      return $db->error;
    }
}

function get_data($sql){  
  $db = $GLOBALS['conn'];
  $result = $db->query($sql);     
  return $result->fetch_all(MYSQLI_ASSOC);
}

 
?>
