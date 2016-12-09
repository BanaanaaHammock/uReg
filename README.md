# [uReg](https://github.com/jonmalave/uReg)

**uReg** is a User Registration Plugin for [uMMORPG](https://www.assetstore.unity3d.com/en/#!/content/51212) framework! 

A quick and easy solution for user registration and authentication using a Flat file database approach. 

[![Code Climate](https://codeclimate.com/github/jonmalave/uReg/badges/gpa.svg)](https://codeclimate.com/github/jonmalave/uReg) [![Issue Count](https://codeclimate.com/github/jonmalave/uReg/badges/issue_count.svg)](https://codeclimate.com/github/jonmalave/uReg) 

## How it works?

Add **uReg.php** to your web server.

Upon successfully uploading to your web server, your next step will be to create a `Database` folder. It should look something like this: `/var/www/domain.com/Database`


**Database:** 

`Database` folder can be renamed if you like, and also can be moved to any path on your server. 

*NOTE: You'll need to keep in mind that if your rename `Database` folder, you must find and replace all `Database` references in the code, along with adding the correct path. Example: if you move `Database` Folder to `/var/local/Database`. Please update the `Database` references with the new name and path.


**Registration:** 

User Registration is simple! Just enter whatever user id and password you would like to use on the uMMORPG game login screen. If the user id is not taken, uReg will create a new account with the id and password specified.


**Authentication:** 

User accounts are simply `.php` files with a prepended user id that will look something like this: `Database/user.php` 

Each user account stores a password in this format `<?php $accountPass = 'password'; ?>` 

uReg uses the `.php` filename itself to verify existing user ids, then checks the `$userPass` variable for a matching password. If successfully matched, uReg will return an `echo 'ok';` to complete the authentication with uMMORPG Login system.


**Integration:** 

1. Update line `133` of `NetworkManagerMMO.cs` with the following:  
`var request = new WWW("http://domain.com/uReg.php?id="+id+"&pw="+pw);`. 

2. Uncomment the 3 lines below the `var request` variable, 

3. Finally Update line `161` to the following:  
`if (Utils.IsNullOrWhiteSpace(id) && Utils.IsNullOrWhiteSpace(pw)) {`


That's it! you now have a simple Flat file solution for user registration & authentication ready to go!  Enjoy!

## Acknowledgement

uReg created by [Jon Malave](http://jonmalave.com) | uMMORPG by [noobtuts](https://noobtuts.com)

