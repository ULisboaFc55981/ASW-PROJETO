<?php
include './function.php';

if(loginAdmin('admin',md5('aswgrupo09'))){

    echo "<p> valido </p>";
}

echo password_hash($password, PASSWORD_BCRYPT);
echo "<br>";
echo dirname(__FILE__);
echo "\n";
echo "<br>";
echo realpath(__FILE__);

$data = getAllUsers();

print_r($data);
?>