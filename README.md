## STEPS

## step1
clone this repository from git link
## step2
in root folder contain mcq_db.sql file, Import this file in local server
## step3
add database name in .env file and database.php file (in route/database.php)[**ALREADY ADDED**]
## step4
get baseurl after run command"php artisan serve"

## URLS [Added in web.php in routes folder]
baseurl              ---for register
baseurl+/get_users   ---for getting registeered users
baseurl+/login       ---for login
baseurl+/logout      ---for logout
baseurl+/dashboard   ---for dashboard

## Main controller 
Usercontroller

## ADMIN credentials(only admin can view list users section)
username = admin
useremail = admin@gmail.com
## NORMAL USER credentials(SAMPLE CREDENTIALS)
username = fox1
useremail = fox1@gmail.com

username = fox2
useremail = fox2@gmail.com