<?php
// Vestacp classes
// Functions in this class
// - Make Database
include 'vestaClass.php';
$myVestaClass = new vestaClass;
echo $myVestaClass->makeDatabase($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode, $db_name, $db_user, $db_pass);
// - MakeUser
echo $myVestaClass->makeUser($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode, $password, $email, $fist_name, $last_name, $package);
// - MakeWebDNSMail
echo $myVestaClass->makeWebDNSMail($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode, $domain);
// Get specific user from specific server
echo $myVestaClass->getUserFromServer($vst_hostname, $vst_port, $vst_username, $vst_password, $username);
// Get all user from specefic server
echo $myVestaClass->getUsersFromServer($vst_hostname, $vst_port, $vst_username, $vst_password);
// - DeleteUser
echo $myVestaClass->deleteUser($vst_hostname, $vst_port, $vst_username, $vst_password, $username, $vst_returncode);
?>