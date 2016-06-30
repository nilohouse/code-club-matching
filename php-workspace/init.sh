#!/bin/bash

chgrp -R www-data storage/ bootstrap/cache/
chmod -R ug+rwx storage bootstrap/cache

composer install
php artisan key:generate

npm install -g bower
npm install -g gulp

bower install dependencies --allow-root

npm install
gulp