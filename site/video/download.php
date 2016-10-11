<?php
	function download_remote_file($file_url, $save_to)
	{
		$content = file_get_contents($file_url);
		file_put_contents($save_to, $content);
	}
	
download_remote_file(, realpath("./downloads") . '/file.jpg');

