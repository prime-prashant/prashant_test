<?php

include 'config.php';
$currentDate = date('Y-m-d g:i:s');
$data = json_decode(file_get_contents("php://input"));
$uname = mysql_real_escape_string($data->uname);
$fname = mysql_real_escape_string($data->fname);
$lname = mysql_real_escape_string($data->lname);
$email = mysql_real_escape_string($data->email);
$password = mysql_real_escape_string($data->password);
$role = mysql_real_escape_string($data->role);
$dob = mysql_real_escape_string($data->dob);
    
 
$image = time().'.jpg';
if($uname != '' || $fname != '' || $lname != '' || $email != '' || $password != '' || $dob != '')
mysql_query("INSERT INTO `registration` (`uname`,`fname`,`lname`,`email`,`password`,`role`, `dob`,`doj`,`image`) VALUES 
('".$uname."','".$fname."','".$lname."','".$email."','".$password."','".$role."','".$dob."', '".$currentDate."','".$image."')");

?>
