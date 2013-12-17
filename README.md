course-subscriber
=================

BeezNest Course Subscriber is an application that acts as a small administration and login panel for multi-lms users

Installation
=================

Check web/config.php

create database
php app/console doctrine:schema:update --force

php app/console assets:install web

sudo chmod -R 777 app/cache app/logs

php app/console cache:clear --env=dev
php app/console cache:clear --env=prod

Set up your ACL's.
> app/console init:acl
> app/console sonata:admin:setup-acl
> app/console sonata:admin:generate-object-acl

Guide used:
http://domitable.com/content/getting-started-symfony-23-sonata-admin-user-bundles