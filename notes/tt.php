<?php


include '../connect.php';
include 'deletimage.php';
include "addimage.php";


 $noteid = filterPostRequest('note_id');
$noteTitle = filterPostRequest('notes_title');
$noteSubtitle = filterPostRequest('notes_subtitle');
$newImageFile ='newImageFile';
$oldImageName = "oldImageName";




if(isset($_FILES[$newImageFile])){

    deleteimage($oldImageName);
  $uploadreturn =   uplodefile($newImageFile);
    $std = $con->prepare("UPDATE `notes` SET `notes_title`=?,`notes_subtitle`=?,`notes_image`=?
 WHERE  (`id`= ?)  ");
   $std->execute(array($noteTitle,$noteSubtitle,$uploadreturn['imagename'],$noteid));
  

}else {

    $std = $con->prepare("UPDATE `notes` SET `notes_title`=?,`notes_subtitle`=?
    WHERE  (`id`= ?)  ");
      $std->execute(array($noteTitle,$noteSubtitle,$noteid));
}

    $countRow = $std->rowCount();

    if($countRow>0){
        $stmt = $con->prepare("SELECT * FROM `notes` WHERE  `id`= ?");
        $stmt->execute(array($noteid));
        $rows =$stmt->fetch(PDO::FETCH_ASSOC);
      
        echo json_encode(array('Status'=>'Success','Row Coun'=>$countRow,'user_data'=>$rows));
    
    }else {
        echo json_encode(array('Status'=>'Failure','Row Coun'=>$countRow));}