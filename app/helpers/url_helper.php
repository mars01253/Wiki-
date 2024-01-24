<?php
  // Simple page redirect
  function redirect($page){
    header('location: ' . URLROOT .  $page);
  }


function isLogedin(){
  if(isset($_SESSION['id'])){
    return true ;
  }else{
    return false ;
  }
}