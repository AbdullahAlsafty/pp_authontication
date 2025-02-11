<?php
// uplode file File 

function uplodefile ($file){

  
    define("Mb",1048576);
    $errormessage  = [];
    
    $counterfile = '../counter.txt';
    
    $dirctfolder= '../dirctuplode';
    
    
    if (!is_dir($dirctfolder)){
    
    mkdir($dirctfolder,0777,true );
    }
    
    if (!file_exists($counterfile)){
     file_put_contents($counterfile,1 );
    
    }
    if (isset($_FILES[$file ]) && $_FILES[$file]['error'] ==0){
     $imagname = $_FILES[$file]["name"];
     $tempname = $_FILES[$file]["tmp_name"];
     $imagesize = $_FILES[$file]["size"];
     $strtoarray = explode('.',$imagname);
     $ext = end($strtoarray);
     $ext = strtolower($ext);
     
     $allowext = ['jpg','png','gif',];
     
     
     if (!empty($imagname)&&!in_array($ext,$allowext)){
     $errormessage[] = 'Error in extention';
     
     }
     elseif (($imagesize >20* Mb)){
         $errormessage[] = 'حجم الصورة اكبر من 20 ميجا ';

     }
    
    
     $filecontent = file_get_contents($counterfile);
    
    $newimagename =$filecontent.'_'.$imagname;
    if (empty($errormessage)){
        $path = $dirctfolder."/" . $newimagename;
     if (move_uploaded_file($tempname,$dirctfolder."/" . $newimagename)){
         file_put_contents($counterfile,$filecontent+1);
        //  echo json_encode(array("status"=>"success", "message"=>  "تم رفع الملف على السيرفر بنجاح"   ,"path"=>$path));
          
        return array("status"=>"success", "message"=>  "تم رفع الملف على السيرفر بنجاح"   ,"path"=>$path,"imagename"=>$newimagename );
        }else {
                // echo json_encode(array("status"=>"fail", "message"=>"فشل اثناء عملية رفع الملف على السيرفر "));
return array("status"=>"faill", "message"=>"فشل اثناء عملية رفع الملف على السيرفر ");

             }
    }else{
        // echo json_encode(array("status"=>"fail", "message"=>array($errormessage)));
        return array("status"=>"faill", "message"=>array($errormessage));

    }
    
     
    
    }else{


        // echo json_encode(array("status"=>"fail", "message"=>"  لم يتم وضع اي ملف للتحميل او ان الملف به ايرورز "));
        return array("status"=>"fail", "message"=>"  لم يتم وضع اي ملف للتحميل او ان الملف به ايرورز ");

    }
    
    
     }
