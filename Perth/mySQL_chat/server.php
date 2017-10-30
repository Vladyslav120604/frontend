<?php  
    error_reporting(E_ALL);
    set_error_handler('setErrors');
    
    function setErrors ($errno, $errmsg, $file, $line) {
        $date = date('Y-m-d H:i:s');
        $f = fopen('log/info.php', 'a');
        if (!empty($f)) {
              $filename  =str_replace($_SERVER['DOCUMENT_ROOT'],'',$file);
              $err  = "[ $date ]  file: $file  $errno  $errmsg  line: $line\r\n";
              fwrite($f, $err);
              fclose($f);
        }
    }

    function logging($result, $name){
       $date = date('Y-m-d H:i:s');
        $f = fopen('log/info.php', 'a');
        if (!empty($f)) {
             $log  = "[ $date ]   $name   $result\r\n";
             fwrite($f, $log);
              fclose($f);
        }
    }
    
    function printResult($result_set, $user_login, $user_pass, $dbh){
        $result = 'tt';
        while(($row = $result_set->fetch_assoc()) != false){
            if ($user_login === $row['login']) {
                if($user_pass === $row['password']) {
                   $result = 'user';
                    echo 'entrace';
                    $result = 'user';
                    logging('has entered', $user_login); 
                 }
                 else{
                     echo 'invalidPass';
                     $result = 'user';
                 }
             }
        }
        if($result == 'tt'){
                $dbh-> query ("INSERT INTO `users` (`timestamp`, `login`, `password`) VALUES ('".time()."', '".$user_login."', '".$user_pass."')");
            echo 'redirect';
            logging('was registered', $user_login);       
        }
    }
    
    $user_login = $_POST['name'];
    $user_pass =  $_POST['pass'];
    $user = 'vsergeevdb';
    $pass = 'dfpflfyysrpwtytienrb';
    $dbh = new mysqli('localhost', $user, $pass, 'vsergeevdb');
    $result_set = $dbh->query("SELECT * FROM `users`");
    printResult($result_set, $user_login, $user_pass, $dbh);
    
    $dbh -> close();
?>
