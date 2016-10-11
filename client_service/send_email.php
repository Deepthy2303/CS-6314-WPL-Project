<?php

//get variables received
//get books that match query this with col name
$emailTo = $_REQUEST["to"];
print_r($_REQUEST);

		$emailTo = "srikanth90.krish@gmail.com";
		//$emailTo = $user->getEmail();
		
$command = "powershell C:\\wamp\\www\\client_service\\email.ps1 ".$emailTo;
		
		echo exec($command,$output);
		
		
		
		

