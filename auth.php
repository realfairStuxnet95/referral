<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_type']) && !isset($_SESSION['names'])){
    	header("Location:access");
    }
}else{
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_type']) && !isset($_SESSION['names'])){
    	header("Location:access");
    }
}
?>