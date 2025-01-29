<?php

include 'function/filter_request.php';
include 'connect.php';


echo 'signUp file ';
echo '<br>';

$userName = filterRequest('userName');
$password = filterRequest('password');
$email = filterRequest('email');

