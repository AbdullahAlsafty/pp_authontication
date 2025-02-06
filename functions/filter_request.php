<?php


// post
function filterPostRequest($requestName){
  return  htmlspecialchars(strip_tags($_POST[$requestName]));
}
//Get
function filterGetRequest($requestName){
  return  htmlspecialchars(strip_tags($_GET[$requestName]));
}


 
  
  
  
  
 
   
  
   