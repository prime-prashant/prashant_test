<?php
include 'config.php';

$r = @$_SESSION['role'];
$us = @$_SESSION['user'];
if($r == 'Admin')
{
 $result =  mysql_query("select * from registration where NOT role ='" . $r . "' ");
}
else if  ($r == 'Manager')
{
    $result =  mysql_query("select * from registration where NOT role ='" . $r . "' AND NOT role='Admin' ");
}
else if ($r == 'Designer' || $r == 'Developer'){
    $result = mysql_query("select * from registration where role = '" . $r . "' AND NOT uname ='" . $us . "' ");
}
else{

    $result = mysql_query("select * from registration;");
}
$data=array();
while($row = mysql_fetch_array($result))
{

$data[]=$row;

};
echo json_encode($data);
?>