<?php
// user_handler.php
require_once "../bootstrap.php";

//users and login and signup
class UserHandler
{
	//come to this code only for signups
	public function create_user($email, $pass, $imgurl = null, $name)
	{
		global $entityManager;

		$user_rep = $entityManager->getRepository('User');
		$users = $user_rep->findAll();		
		foreach ($users as $user) 
		{
			if (strtolower ($email) == strtolower ($user->getEmail()))
			{
				//email matched		
				return "exist";
			}
		}
		//now safely add user to db
		
		$user = new User();

		$user->setName($name);
		$user->setPassword($pass);
		$user->setEmail($email);
		date_default_timezone_set('America/Chicago');
		$date = date('m/d/Y h:i:s a', time());	
		
		$user->setLastlogin((string)$date);	//set current timestamp
		$user->setImageurl($imgurl);	
		
		//find the email and pass in database first
		
		$entityManager->persist($user);
		$entityManager->flush();

		$ret = array(
		'name'=>$user->getName(),
		'email'=>$user->getEmail(),					
		'lastlogin'=>$user->getLastlogin(),					
		'failedlogin'=>$user->getFailedlogin(),
		'imageurl'=>$user->getImageurl(),					
		'id'=>$user->getId()
		);	//end array
		
		return $ret;
	}
	
	//call this to login a user
	public function exist($email, $pass=null/*for google*/, $imgurl = null, $name = null)
	{
		global $entityManager;
		
		$user_rep = $entityManager->getRepository('User');
		$users = $user_rep->findAll();
		
		if ($pass != null)
		{
			foreach ($users as $user) 
			{
				if (strtolower ($email) == strtolower ($user->getEmail()))
				{
					//email matched
					if(strtolower ($pass) == strtolower ($user->getPassword()))
					{
						//password matched
						//user exists return the entire user object
						$ret = array(
						'name'=>$user->getName(),
						'email'=>$user->getEmail(),					
						'lastlogin'=>$user->getLastlogin(),					
						'failedlogin'=>$user->getFailedlogin(),
						'imageurl'=>$user->getImageurl(),					
						'id'=>$user->getId()
						);	//end array
						
						date_default_timezone_set('America/Chicago');
						$date = date('m/d/Y h:i:s a', time());	
		
						$user->setLastlogin((string)$date);	//set current timestamp
						$entityManager->persist($user);
						$entityManager->flush();
						
						return $ret;
					}
					else 
					{
						//wrong password -- failed login for email
						$user->setFailedlogin();
						$entityManager->persist($user);
						$entityManager->flush();

						return "pass";	//wrong password
					}
				}
			}
		}
		else	//this is a google login -- dont check pass
		{
			foreach ($users as $user) 
			{
				if (strtolower ($email) == strtolower ($user->getEmail()))
				{
					//email exist in the db 
					//user exists return the entire user object
					$ret = array(
					'name'=>$user->getName(),
					'email'=>$user->getEmail(),					
					'lastlogin'=>$user->getLastlogin(),					
					'failedlogin'=>$user->getFailedlogin(),
					'imageurl'=>$user->getImageurl(),					
					'id'=>$user->getId()
					);	//end array
					date_default_timezone_set('America/Chicago');
					$date = date('m/d/Y h:i:s a', time());	
					
					$user->setLastlogin((string)$date);	//set current timestamp
					$entityManager->persist($user);
					$entityManager->flush();
					
					return $ret;					
				}
			}
			//email does not exist--- signup the user
			$ret = $this->create_user($email, $pass, $imgurl, $name);					
			return $ret;				
		}
		
		return null;	//email not found in db		
	}

	//call this to login a user
	public function update($id, $name = null)
	{
		global $entityManager;
		
		$usr = $entityManager->getRepository('User')->findBy(array('id' => $id));
		$user = $usr[0];
		$user->setName($name);
					$ret = array(
					'name'=>$user->getName(),
					'email'=>$user->getEmail(),					
					'lastlogin'=>$user->getLastlogin(),					
					'failedlogin'=>$user->getFailedlogin(),
					'imageurl'=>$user->getImageurl(),					
					'id'=>$user->getId()
					);	//end array
					$entityManager->persist($user);
					$entityManager->flush();
					
					return $ret;					
	
	}
	
	
	
}