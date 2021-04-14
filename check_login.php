<?php
session_start();
if(!isset($_SESSION['community_token'])){

header('Location:signin.php');
}
?>