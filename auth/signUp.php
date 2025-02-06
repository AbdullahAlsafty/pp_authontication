<?php
include '../connect.php';


$userName = filterPostRequest('userName');
$password = filterPostRequest('password');
$email = filterPostRequest('email');

$std = $con->prepare(
    "INSERT INTO `users` ( `userName`, `email`, `password`)VALUES ( ?, ?, ?)");
    $std->execute(array($userName,$email,$password));




    $countRow = $std->rowCount();
    if($countRow>0){
        $stmt = $con->prepare("SELECT `id`, `userName`, `email`, `password` FROM `users` WHERE  `id`=?");
        $stmt->execute(array($con->lastInsertId()));
        $rows =$stmt->fetch(PDO::FETCH_ASSOC);
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$rows));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}