<?php  
 	include '../errors/errors.php';

	$name = $_POST['name'];
	$msg = $_POST['msg'];
	$time = $_POST['jsTime'];

        $user_login = $_POST['name'];

        $user = 'vsergeevdb';
        $pass = 'dfpflfyysrpwtytienrb';
        $dbh = new mysqli('localhost', $user, $pass, 'vsergeevdb');
 	
	$dbh-> query ("INSERT INTO `messages` (`jsTime`,`time`, `name`, `message`) VALUES ('".$time."' ,'".time()."', '".$name."', '".$msg."')");	
?>