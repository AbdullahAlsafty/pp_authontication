<?php
include '../connect.php';

include "deletimage.php";

$noteid = filterPostRequest('note_id');
$filename = filterPostRequest('imagename');
 
deleteimage('imagename');


$std = $con->prepare("DELETE FROM `notes` WHERE `id` =? ");
   $std->execute(array($noteid));

    $countRow = $std->rowCount();
    if($countRow>0){
        // $stmt = $con->prepare("SELECT * FROM `notes` WHERE  `id`= ?");
        // $stmt->execute(array($noteid));
        // $rows =$stmt->fetch(PDO::FETCH_ASSOC);
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}