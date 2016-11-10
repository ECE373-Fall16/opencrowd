# 11

#demo link for testing https://lettucebuy-yiiin.c9users.io/
- download all files in github
- change permision of the www folder using: chown -hR ece373 /var/www
- extrax the zip in /var/www/html/
- create a folder call databases
- cut the create_all.php to databases folder
- change permission of the databases folder: chmod 777 databases/
- install php-sqlite: sudo apt-get install php5-sqlite
- restar you apache server : sudo service apache2 restart

go to localhost for testing
