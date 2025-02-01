<?php
include '../connect.php';

$password = filterPostRequest('password');
$email = filterPostRequest('email');

$std = $con->prepare(
    "SELECT * From `users` Where `email` =? And `password` =? ");
    $std->execute(array ($email,$password));
    $row =$std->fetch(PDO::FETCH_ASSOC);

    
    $countRow = $std->rowCount();
    if($countRow>0){

        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$row));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}
        
       