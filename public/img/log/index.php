<?php 
	
	echo "<pre>";

	echo(
		file_get_contents ('../../../storage/logs/laravel.log', false, null, (filesize ('../../../storage/logs/laravel.log') - 100000))
		);

	/*echo "<pre>";

	echo(
		file_get_contents ('../../../storage/logs/laravel.log', false, null, 12500)
		);
*/




 ?>