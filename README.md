# [uReg](https://github.com/jonmalave/uReg)

**uReg** is a User Registration plugin for [uMMORPG](https://www.assetstore.unity3d.com/en/#!/content/51212) framework! 

A quick and easy solution for user registration and authentication using a Flat File approach. 


## How it works?

Add **uReg.php** to your web server.

Upon successfully uploading to your web server, your next step will be to create a `Database` folder. It should look something like this: `/var/www/domain/Database`


**Database** 

`Database` folder can be renamed if you like, and also can be moved to any path on your server. 

*NOTE: You'll need to keep in mind that if your rename `Database` folder, you must find and replace all `Database` references in the code, along with adding the correct path. Example: if you move `Database` Folder to `/var/local/Database`. Please update the `Database` references with the new name and path.


**Authentication:** 

User accounts are simply `.php` files with a prepended user id that will look something like this: `Database/user.php` 

Each user account stores a password in this format `<?php $userPass = 'password'; ?>` 

uReg uses the `.php` filename itself to verify existing user ids, then checks the `$userPass` variable for a matching password. If successfully matched, uReg will return an `echo 'ok';` to complete the authentication with uMMORPG Login system.


**Integration:** 

You should now replace the entire line `133` of `NetworkManagerMMO.cs` with the following 
`var request = new WWW("http://domain.com/uReg.php?id="+id+"&pw="+pw);`. 

Note: make sure to uncomment the 3 lines below the `var request` variable, 

Finally update line `161` to the following:  
`if (Utils.IsNullOrWhiteSpace(id) && Utils.IsNullOrWhiteSpace(pw)) {`

That's it! you now have a simple flat file solution for user registrations ready to go!  Enjoy!

## Acknowledgement

uReg created by [Jon Malave](http://jonmalave.com) | uMMORPG by [noobtuts](https://noobtuts.com)

