<?php  
 	include '../errors/errors.php';

 	$name = $_POST['name'];
 	$msg = $_POST['msg'];
 	$time = $_POST['jsTime'];
 	echo $time;
 	$user = 'root';
    $pass = '';
    $dbh = new mysqli('127.0.0.1', $user, $pass, 'users');
    echo $ff;
 	$dbh-> query ("INSERT INTO `messages` (`jsTime`,`time`, `name`, `message`) VALUES ('".$time."' ,'".time()."', '".$name."', '".$msg."')");	
?>