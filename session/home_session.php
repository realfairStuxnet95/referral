<?php 
 session_start();
 if((isset($_SESSION['director_id']) && isset($_SESSION['director_name'])) && !isset($)){
 	header("Location:finish_account");
 }

?>