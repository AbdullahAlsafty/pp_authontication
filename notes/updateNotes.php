<?php
include '../connect.php';



$noteid = filterPostRequest('note_id');
$userid = filterPostRequest('user_id');
$noteTitle = filterPostRequest('noteTitle');
$noteSubtitle = filterPostRequest('notes_subtitle');

$std = $con->prepare("UPDATE `notes` SET `notes_title`=?,`notes_subtitle`=?
 WHERE  (`id`= ?) And `notes_user_id` = ? ");
   $std->execute(array($noteTitle,$noteSubtitle,$noteid,$userid));

    $countRow = $std->rowCount();
    if($countRow>0){
        $stmt = $con->prepare("SELECT * FROM `notes` WHERE  `id`= ?");
        $stmt->execute(array($noteid));
        $rows =$stmt->fetch(PDO::FETCH_ASSOC);
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$rows));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}