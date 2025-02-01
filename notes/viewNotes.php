<?php
include '../connect.php';
$user_id = filterPostRequest('notes_user_id');

$std = $con->prepare(
    "SELECT * From `notes` Where `notes_user_id` = ?");
    $std->execute(array($user_id));
    $row =$std->fetchAll(PDO::FETCH_ASSOC);

    
    $countRow = $std->rowCount();
    if($countRow>0){

        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'allNotes'=>$row));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}
        
       