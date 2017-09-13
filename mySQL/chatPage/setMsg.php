<?php  
 	$name = $_POST['name'];
 	$msg = $_POST['msg'];

 	$user = 'root';
    $pass = '';
    $dbh = new mysqli('127.0.0.1', $user, $pass, 'users');
   // $dbh->query("SELECT * FROM `messages`");
 	$dbh-> query ("INSERT INTO `messages` (`time`, `name`, `message`) VALUES ('".time()."', '".$name."', '".$msg."')");	
?>