After installation completed

1. you need to change file in the code path--> config/database.php
   You have chnage "username" and "password" of your database

2. Then you have to import the setup.sql file to your database
   Command to import
    $  mysql -u root -p < /path/of/yourfile/setup.sql
   That setup.sql file is located in Sql folder

3. Restart the Apache webserver
$ systemctl restart httpd
