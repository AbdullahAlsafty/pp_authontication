<?php

function filterPostRequest($requestName){
  return  htmlspecialchars(strip_tags($_POST[$requestName]));
}


function filterGetRequest($requestName){
  return  htmlspecialchars(strip_tags($_GET[$requestName]));
}