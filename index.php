<?php
include "authentication/signUp.php";

$std = $con->prepare(
"INSERT INTO `users` ( `userName`, `email`, `password`)VALUES ( ?, ?, ?)");
$std->execute(array($userName,$email,$password));


$countRow = $std->rowCount();
if($countRow>0){
    echo 'Success >> '. $countRow;

}else {
    echo "Failur >>". $countRow;
}