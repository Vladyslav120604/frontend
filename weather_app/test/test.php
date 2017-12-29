<?php  
 $file = 'test.txt';
 $result = file_get_contents($file);
 echo $result;
 file_put_contents($file, $result+=1);
?>