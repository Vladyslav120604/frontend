<?php  
error_reporting(E_ALL);
set_error_handler('user_log');
   
   function user_log ($errno, $errmsg, $file, $line) {
   $date = date('Y-m-d H:i:s');
   $f = fopen('../log/info.php', 'a');    
	   if (!empty($f)) {
		   $filename  =str_replace($_SERVER['DOCUMENT_ROOT'],'',$file);
		   $err  = "[ $date ]  file: $file  $errno  $errmsg  line: $line\r\n";
		   fwrite($f, $err);
		   fclose($f);
	   }
   }
?>