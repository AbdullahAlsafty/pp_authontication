<?php
include '../connect.php';
include 'addimage.php';

$title = filterPostRequest('notes_title');
$subtitle = filterPostRequest('notes_subtitle');
$userid = filterPostRequest('user_id');
$imagefile = $_FILES['imagefile'];
$kk = uplodefile('imagefile');
if ($kk['status']=='fail'){
}elseif ($kk['status']=='success'){



    $std = $con->prepare("INSERT INTO `notes`( `notes_title`, `notes_subtitle`, `notes_user_id` ,`notes_image`) VALUES ( ?,? ,?,? )");
    $std->execute(array($title,$subtitle,$userid ,$kk['imagename']));
 
     $countRow = $std->rowCount();
     if($countRow>0){
 
         
         $stmt = $con->prepare("SELECT * FROM `notes` WHERE  `notes_user_id`=?");
         $stmt->execute(array($userid));
         $rows =$stmt->fetch(PDO::FETCH_ASSOC);
        
       
         echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$rows));
     
     }else {
         echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}

    }
