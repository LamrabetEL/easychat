#Easychat : simple chat Application 

Install xamps server 
https://www.apachefriends.org/fr/index.html

#Database configuration 

From PhpMyAdmin import the file in Eaasychat/sql/easychat.Sql

in app/ConfigDb.php adapte values of host , user , password to be your env 

#Vhost configuration 

in C:\xampp\apache\conf\extra\httpd-vhosts.conf add : 

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/tests/easychat/web"
    ServerName www.easychat.dev
</VirtualHost>

in C:\Windows\System32\drivers\etc\hosts add 
127.0.0.1       www.easychat.dev

#Account created automaticlly 
go to www.easychat.dev
test account : user :elamrabet password :elamrabet 

