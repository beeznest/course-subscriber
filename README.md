Course subscriber
=================

BeezNest Course Subscriber is an application that acts as a small administration and login panel for multi-lms users.

It allows admin users to manage all notable resources that need to be shared between systems, and makes extensive use of webservices to create users, enable accesses to other platforms and recover tracking information to process whether users can move from one course (resource) to another in the main platform.

It can be seen as a centralizing application, kind of a "meta" LMS, that controls access to specific resources based on the results obtained to previous resources (sequencialized in a configured ordered).

Installation
=================

Check web/config.php

create database
php app/console doctrine:schema:update --force

php app/console assets:install web

sudo chmod -R 777 app/cache app/logs
# or chown www-data

php app/console cache:clear --env=dev
php app/console cache:clear --env=prod

Set up your ACL's.
> app/console init:acl
> app/console sonata:admin:setup-acl
> app/console sonata:admin:generate-object-acl

Guide used:
http://domitable.com/content/getting-started-symfony-23-sonata-admin-user-bundles
