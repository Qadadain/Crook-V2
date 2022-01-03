#!/usr/bin/env sh

while ! mysqladmin ping -hdb --silent; do
    sleep 1
done

php /var/www/html/bin/console doctrine:database:create -n
php /var/www/html/bin/console doctrine:migrations:migrate -n


exec "$@"
