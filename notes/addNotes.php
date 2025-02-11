<?php
include '../connect.php';
include 'addimage.php';

$title = filterPostRequest('notes_title');
$subtitle = filterPostRequest('notes_subtitle');
$userid = filterPostRequest('user_id');
$imagefile = $_FILES['imagefile'];
$uploedreturn  = uplodefile('imagefile');
if (isset($_FILES['imagefile'])){

    if ($uploedreturn['status']=='faill'){
        echo json_encode(array('Status'=>'Failure','upload image status '=>$uploedreturn));
    
    }elseif ($uploedreturn['status']=='success'){
    
    
    
        $std = $con->prepare("INSERT INTO `notes`( `notes_title`, `notes_subtitle`, `notes_user_id` ,`notes_image`) VALUES ( ?,? ,?,? )");
        $std->execute(array($title,$subtitle,$userid ,$uploedreturn['imagename']));
     
         $countRow = $std->rowCount();
         if($countRow>0){
     
             
             $stmt = $con->prepare("SELECT * FROM `notes` WHERE  `notes_user_id`=?");
             $stmt->execute(array($userid));
             $rows =$stmt->fetch(PDO::FETCH_ASSOC);
            
           
             echo json_encode(array('Status'=>'Success add note','user_data'=>$rows ,'upload image status '=>$uploedreturn));
         
         }else {
             echo json_encode(array('Status'=>'Failure add note','upload image status '=>$uploedreturn));}
    
        }

}else{
    echo json_encode(array('Status'=>'Failure add note','upload image status '=>$uploedreturn));

}
