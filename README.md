Informational:
==============

A PHP based framework for a simple web app.

This was built from reading through blog posts, [specifically this one](http://www.dreamincode.net/forums/topic/242835-creating-a-simple-dynamic-website-with-php/)

Dependencies:
-------------
Apache (2.2)
PHP5


Instructions:
=============
Enable mod_rewrite for Apache (a2enmod rewrite)

Folder structure:
-----------------

>	/var/www/
>			/assets/
>					/css
>					/img
>					/js
>			/templates/
>					  /header.htm
>					  /index.htm
>					  /footer.htm
>			/index.php


Apache config example(with comments):
-------------------------------------
>	<VirtualHost *:80>
>		ServerAdmin webmaster@localhost
>
>		DocumentRoot /var/www/
>		<Directory />
>			Options FollowSymLinks
>			AllowOverride None
>		</Directory>
>		<Directory /var/www/>
>			Options Indexes FollowSymLinks MultiViews
>			AllowOverride None
>			Order allow,deny
>			allow from all
>	# Turn on mod_rewrite for this directory
>		RewriteEngine On
>
>	# Allow to search for existing directories (-d) and files (-f)
>		RewriteCond %{REQUEST_FILENAME} !-d
>		RewriteCond %{REQUEST_FILENAME} !-f
>	# Passes through a call to ajax.php
>		RewriteCond $1 (ajax|index)
>		RewriteRule ^([a-z]*)\.php(.*)$ -  [NC,L]
>	# If the query string is not preceeded by a question mark like 
>   # http://mydomain.de/home/go=5&set=0 another rule is needed	
>		RewriteRule ^(.+?)/(.+)$ index.php?id=$1&$2 [L]
>	# Read anything trailing / as a ? parameter for php quries 
>   # (i.e. site.com/about = site.com/index.php?id=about)
>		RewriteRule ^(.+?)/?$ index.php?id=$1&%{QUERY_STRING} [L]
>	# All unhandled by above rules are redirected directly to index.php 
>   # main page (which should have index.htm as default view)	
>		RewriteRule ^(.*)$ index.php [L]
>		</Directory>
>		ScriptAlias /cgi-bin/ /usr/lib/cgi-bin/
>		<Directory "/usr/lib/cgi-bin">
>			AllowOverride None
>			Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
>			Order allow,deny
>			Allow from all
>		</Directory>
>
>		ErrorLog ${APACHE_LOG_DIR}/error.log
>
>		# Possible values include: debug, info, notice, warn, error, crit,
>		# alert, emerg.
>		LogLevel debug 
>
>		CustomLog ${APACHE_LOG_DIR}/access.log combined
>
>	    Alias /doc/ "/usr/share/doc/"
>	    <Directory "/usr/share/doc/">
>	        Options Indexes MultiViews FollowSymLinks
>	        AllowOverride None
>	        Order deny,allow
>	        Deny from all
>	        Allow from 127.0.0.0/255.0.0.0 ::1/128
>	    </Directory>
>	</VirtualHost>