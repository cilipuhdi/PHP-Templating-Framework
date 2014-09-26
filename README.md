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
Download or Fork Twitter Bootstrap into a folder named assets.

Enable mod_rewrite for Apache (a2enmod rewrite)

Folder structure:
-----------------
<pre>
/var/www/
        /assets/
               /css
               /img
               /js
        /templates/
                  /header.htm
                  /index.htm
                  /footer.htm
        /index.php
</pre>

Use the document named default as reference for Apache configuration.
