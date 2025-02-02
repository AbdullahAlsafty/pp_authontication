<?php
include 'connect.php';


$userName = filterPostRequest('userNamevv');

$std = $con->prepare(
    "UPDATE `notes` SET `notes_title`=? WHERE id = 66");
    $std->execute((array($userName)));
   

    $countRow = $std->rowCount();
    if($countRow>0){
        // $stmt = $con->prepare("SELECT * FROM `users` WHERE  `id`=?");
        // $stmt->execute(array($con->lastInsertId()));
        // $rows =$stmt->fetch(PDO::FETCH_ASSOC);
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}