
<?php

//// delet file 
 

function deleteimage ($filename){
 
   
     
     
     
   
   if (isset($_POST[$filename]) ){
 $imagename2 = $_POST[$filename];
   
    
    if (file_exists('../'.'dirctuplode/'.$imagename2 )){

     unlink('../'.'dirctuplode/'.$imagename2 );
    //  echo "تم حذف الملف  من على السيرفر بنجاح";
     return  array ("status"=>"success", "message"=>  "تم حذف الملف  من على السيرفر بنجاح");
 
    }
 else{
  // echo " لا يوجد ملف بهذا الاسم ";
  return  array ("status"=>"faill", "message"=>  "لا يوجد ملف بهذا الاسم او ان الملف تم حذفه من الداتا بيزز ");

 
 }  
 }
}

