
<?php

//// delet file 
 

function deleteimage ($filename){
 
   
     
     
     
   
   if (isset($_POST[$filename]) ){
 $imagename2 = $_POST[$filename];
   
    
    if (file_exists('../'.'dirctuplode/'.$imagename2 )){
      
     unlink('../'.'dirctuplode/'.$imagename2 );
     echo "تم حذف الملف  من على السيرفر بنجاح";
     return 'success';
 
    }
 else{
   echo " لا يوجد ملف بهذا الاسم ";
 
 }  }else{
     echo "لم يتم وضع اسم الملف المراد خذفة ";
   }
 }

