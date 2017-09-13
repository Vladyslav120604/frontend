<?php  
    //$a = json_decode(file_get_contents("data.json"), true);

//Sample Database Connection Syntax for PHP and MySQL.

//Connect To Database

$hostname="localhost";
$username="root";
$password=" ";
$dbname="your_dbusername";
$usertable="users";
$yourfield = "your_field";

mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);

# Check If Record Exists

$query = "SELECT * FROM $usertable";

$result = mysql_query($query);

if($result)
{
  while($row = mysql_fetch_array($result))
  {
    $name = $row["$yourfield"];
    echo "Name: ".$name."<br>";
  }
}



       /* $user_login = $_POST['name'];
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
                else{
                    echo 'invalidPass';
                    $result = 'user';
                }
             }
        }
        if($result == 'tt'){
        	$a[$size] =  array("pass" => $user_pass, 'name' => $user_login);
        	echo 'redirect';       
        }
        file_put_contents("data.json", json_encode($a));*/

?>
