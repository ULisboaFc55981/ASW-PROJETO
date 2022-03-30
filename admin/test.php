<?php
include './function.php';
include './database.php';

echo password_hash($password, PASSWORD_BCRYPT);
echo "<br>";
echo dirname(__FILE__);
echo "\n";
echo "<br>";
echo realpath(__FILE__);
$data=array();
$data = getAllUsers();

foreach($data as $test){
print_r($test);

}
?>