<?php  
    //$a = json_decode(file_get_contents("data.json"), true);
    //$mysqli = new mysqli ('localhost', 'root', ' ', 'users');
    function printResult($result_set, $user_login, $user_pass, $dbh){
        $result = 'tt';
        while(($row = $result_set->fetch_assoc()) != false){
                //$a[$i] = array("pass" => $user_pass, 'name' => $user_login);
            if ($user_login === $row['login']) {
                if($user_pass === $row['password']) {
                   $result = 'user';
                    echo 'redirect1';
                    $result = 'user'; 
                 }
                 else{
                     echo 'invalidPass';
                     $result = 'user';
                 }
             }
        }
            if($result == 'tt'){
                //$a[$size] =  array("pass" => $user_pass, 'name' => $user_login);
                 $dbh-> query ("INSERT INTO `users` (`timestamp`, `login`, `password`) VALUES ('".time()."', '".$user_login."', '".$user_pass."')");
                echo 'redirect';       
            }
    }
    $user_login = $_POST['name'];
    $user_pass =  $_POST['pass'];
    $user = 'root';
    $pass = '';
    $dbh = new mysqli('127.0.0.1', $user, $pass, 'users');
    //$success = $dbh-> query ("INSERT INTO `users` (`timestamp`, `login`, `password`) VALUES ('".time()."', '".$user_login."', '".$user_pass."')");
    $result_set = $dbh->query("SELECT * FROM `users`");
    printResult($result_set, $user_login, $user_pass, $dbh);
    
    $dbh -> close();
?>
