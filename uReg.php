<?php
// uReg, A User Registration Plugin for uMMORPG by Jon Malave (http://jonmalave.com)
$uReg = function () { 
	// set user id and password with HTTP-GET
	$id = htmlspecialchars($_GET['id']);
	$pw = htmlspecialchars($_GET['pw']);
	
	// register new user if set to true
	$addUser = true;

	// open database, search for existing user and authenticate, or register new user
	if ($db = opendir("Database")) {
		while (false !== ($userData = readdir($db))) {
			if ($userData === "$id.php") {
				// user exists; disable add user event
				$addUser = false;
				
				// retrieve password from database
				include_once("Database/$userData");	
				
				// authenticate with password
				if ($pw === $userPass){
					// return successful authentication
					echo "ok";
				}
				else {
					// return un-successful authentication					
					echo "invalid password";
				}
			
			}			
		}
		
		// register & authenticate new user
		if($addUser && $id !== "" && $pw !== ""){
			// specify user id
			$newUser = "Database/$id.php";
			
			// create user account in database
			fopen($newUser, "w");	
			
			// access the new user account				
			$addData = file_get_contents($newUser);
			
			// set password to append to user account
			$addData .= '<?php $userPass = ' . "'" . $pw . "'" . '; ?>';
			
			// save password data to user account
			file_put_contents($newUser, $addData);
			
			// return successful user registration and authentication
			echo "ok";
			
			// uncomment below for testing user registration
			//echo "new user created!";
		}
		closedir($db);
	}
}

uReg();
?>
