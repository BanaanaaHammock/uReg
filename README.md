# [phpReg](https://github.com/jonmalave/phpReg)
Flat File PHP Registration System

phpReg was created as a plugin for [uMMORPG](https://www.assetstore.unity3d.com/en/#!/content/51212) framework to easily handle user registration and authentication.


## How it works?

Add **phpReg.php** to your web server.

Upon successfully uploading to your web server, your next step will be to create a `Database` folder on your web server. It should look something like this: `/var/www/domain/Database`


**Database** 

`Database` folder can be renamed if you like, and also can be moved to any path on your server. 

*NOTE: You'll need to keep in mind that if your rename `Database` folder, you must find and replace all `Database` references in the code, along with adding the correct path. Example: if you move `Database` Folder to `/var/local/Database`. Please update the `Database` references with the new name and path.


**User Account:** 

User accounts are simply `.php` files with a prepended user id that will look something like this: `Database/user.php` 

Each user account stores a password in this format `<?php $userPass = 'password'; ?>` 

phpReg uses the `.php` filename itself to verify existing user ids, then checks the `$userPass` variable for a matching password. If successfully matched, phpReg will return an `echo 'ok';` to complete the authentication with uMMORPG Login system.


**Register/Authenticate Users:** 

For uMMORPG you you should replace the entire line `133` of `NetworkManagerMMO.cs` where you find the `request` variable with the following `var request = new WWW("http://domain.com/phpReg.php?id="+id+"&pw="+pw);`. 

Finally make sure to uncomment the 3 lines below this, and set line `161` to the following: 
`if (Utils.IsNullOrWhiteSpace(id) && Utils.IsNullOrWhiteSpace(pw)) {`.

That's it! you now have a simple flat file solution for user registrations ready to go! 

## Acknowledgement

phpReg created by [Jon Malave](http://jonmalave.com) | uMMORPG by [noobtuts](https://noobtuts.com)

