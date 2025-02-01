<?php
include '../connect.php';


$title = filterPostRequest('notes_title');
$subtitle = filterPostRequest('notes_suptitle');
$userid = filterPostRequest('notes_user');

$std = $con->prepare("INSERT INTO `notes`( `notes_title`, `notes_suptitle`, `notes_user`) VALUES (' ?,? ,? )");
   

    $countRow = $std->rowCount(array($title,$subtitle,$userid));
    if($countRow>0){
        $stmt = $con->prepare("SELECT * FROM `users` WHERE  `id`=?");
        $stmt->execute(array($con->lastInsertId()));
        $rows =$stmt->fetch(PDO::FETCH_ASSOC);
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$rows));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}