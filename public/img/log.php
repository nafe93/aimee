<?php
//$filetxt = file_get_contents('/var/www/aimee/storage/logs/laravel.log');
//echo $filetxt; 

$file = file('/var/www/aimee/storage/logs/laravel.log');
$id = (count($file))-1;
for($i = $id-120; $i<$id;$i++)
{
 echo "$file[$i] <BR>";
}
?>
