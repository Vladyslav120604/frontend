<?php  
    $a = json_decode(file_get_contents("data.json"), true);
        $user_login = $_POST['name'];
        $user_pass =  $_POST['pass'];
        //$a = array();
        for ($i=0, $size = count($a), $result = 'tt'; $i < $size; $i++) {
            //$a[$i] = array("pass" => $user_pass, 'name' => $user_login);
            if ($user_login === $a[$i]['name']) {
                if($user_pass === $a[$i]['pass']) {
                    $result = 'user';
                    echo 'redirect1';
                    $result = 'user'; 
                }
                echo 'invalidPass';
                $result = 'user';
             }
        }
        if($result == 'tt'){
        	$a[$size] =  array("pass" => $user_pass, 'name' => $user_login);
        	echo 'redirect';       
        }
        file_put_contents("data.json", json_encode($a));
?>
