<?php
include '../connect.php';



 $noteid = filterPostRequest('note_id');
$noteTitle = filterPostRequest('notes_title');
$noteSubtitle = filterPostRequest('notes_subtitle');

$std = $con->prepare("UPDATE `notes` SET `notes_title`=?,`notes_subtitle`=?
 WHERE  (`id`= ?)  ");
   $std->execute(array($noteTitle,$noteSubtitle,$noteid));

    $countRow = $std->rowCount();
    if($countRow>0){
        $stmt = $con->prepare("SELECT * FROM `notes` WHERE  `id`= ?");
        $stmt->execute(array($noteid));
        $rows =$stmt->fetch(PDO::FETCH_ASSOC);
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$rows));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}