<?php
// uReg, A User Registration Plugin for uMMORPG by Jon Malave (http://jonmalave.com)
function uReg() { 
	// set user id and password with HTTP-GET
	$userID = htmlspecialchars($_GET['id']);
	$userPW = htmlspecialchars($_GET['pw']);
	
	// register new user if set to true
	$registerUser = true;
	
	// open database, search for existing user and authenticate, or register new user
	if ($database = opendir("Database")) {
		while (false !== ($queryAccount = readdir($database))) {
			if ($queryAccount === "$userID.php") {
				// user exists; disable registration event
				$registerUser = false;
				// retrieve password from database
				include_once("Database/$queryAccount");	
				// authenticate with password
				if ($userPW === $accountPW){
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
		if($registerUser && $userID !== "" && $userPW !== ""){
			// set new user account with user id
			$userAccount = "Database/$userID.php";
			// create user account in database
			fopen($userAccount, "w");	
			// set access the new user account				
			$userData = file_get_contents($userAccount);
			// set password data to append to user account
			$userData .= '<?php $accountPW = ' . "'" . $userPW . "'" . '; ?>';
			// save password data to new user account
			file_put_contents($userAccount, $userData);
			// return successful user registration and authentication
			echo "ok";
			// uncomment below for testing user registration
			//echo "new user created!";
		}
		closedir($database);
	}
}
uReg();
?>
