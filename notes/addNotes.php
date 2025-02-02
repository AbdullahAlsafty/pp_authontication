<?php
include '../connect.php';


$title = filterPostRequest('notes_title');
$subtitle = filterPostRequest('notes_suptitle');
$userid = filterPostRequest('notes_user_id');


$std = $con->prepare("INSERT INTO `notes`( `notes_title`, `notes_suptitle`, `notes_user_id`) VALUES ( ?,? ,? )");
   $std->execute(array($title,$subtitle,$userid));

    $countRow = $std->rowCount();
    if($countRow>0){
        $stmt = $con->prepare("SELECT * FROM `notes` WHERE  `notes_user_id`=?");
        $stmt->execute(array($userid));
        $rows =$stmt->fetch(PDO::FETCH_ASSOC);
       
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$rows));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}