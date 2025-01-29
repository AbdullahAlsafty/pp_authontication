<?php
include '../connect.php';


$userName = filterRequest('userName');
$password = filterRequest('password');
$email = filterRequest('email');

$std = $con->prepare(
    "INSERT INTO `users` ( `userName`, `email`, `password`)VALUES ( ?, ?, ?)");
    $std->execute(array($userName,$email,$password));
    
    
    $countRow = $std->rowCount();
    if($countRow>0){
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}