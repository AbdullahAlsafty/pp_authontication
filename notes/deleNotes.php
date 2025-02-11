<?php
include '../connect.php';

include "deletimage.php";

$noteid = filterPostRequest('note_id');
$imagename = filterPostRequest('imagename');
 


$std = $con->prepare("DELETE FROM `notes` WHERE `id` =? ");
   $std->execute(array($noteid));

    $countRow = $std->rowCount();
    if($countRow>0){
    $deletimagereturn =  deleteimage('imagename');
      
        echo json_encode(array('Status'=>'Success delet note','delet image status'=>$deletimagereturn));
    
    }else {
        echo json_encode(array('Status'=>'Failure delet note','delet image status'=>"لم يتم تنذيذ دالة حذف الصور لانه لم يتم تنفيذ دالة حذف النوت اصلا "));}