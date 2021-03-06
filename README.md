Course subscriber
=================

BeezNest Course Subscriber is an application that acts as a small administration and login panel for multi-lms users.

It allows admin users to manage all notable resources that need to be shared between systems, and makes extensive use of webservices to create users, enable accesses to other platforms and recover tracking information to process whether users can move from one course (resource) to another in the main platform.

It can be seen as a centralizing application, kind of a "meta" LMS, that controls access to specific resources based on the results obtained to previous resources (sequencialized in a configured ordered).

Installation
=================

Check web/config.php

Setup directory permissions.
http://symfony.com/doc/current/book/installation.html#configuration-and-setup

Update vendors.
```
composer update
```

Create database.
Rename parameters.yml.dist to app/config/parameters.yml and update the DB credentials.

Update the DB with the Doctrine2 entities:
```
php app/console doctrine:schema:update --force
```

Create an admin user:
```
php app/console fos:user:create admin admin@example.com mypassword --super-admin
```

Generate resources, moves files from bundles/xxx/Resources/public/ to web/bundles/xxx/
```
php app/console assets:install web
```

Clear cache:
```
php app/console cache:clear --env=dev
php app/console cache:clear --env=prod
```

If the system is getting upset over permissions to access the cache (usually a blank page, but if you're in debug mode you'll even get the error message), you might have to implement one of the three methods offered at http://symfony.com/doc/current/book/installation.html#configuration-and-setup
If none of these work, you'll have to redefine the permissions on your app/cache directory every time you launch the cache:clear command:
```
sudo chown -R www-data:www-data app/cache
```

Set up your ACL's (these are access control lists inside the Sonata application).
```
app/console init:acl
app/console sonata:admin:setup-acl
app/console sonata:admin:generate-object-acl
```

Translations:
After adding translations in the src/Application/SubscriberBundle/Resources/translations
you need to clean your cache:

```
php app/console cache:clear
```

Upgrade from previous versions
==============================

To upgrade from previous versions, you'll have to run migrations.
This is easily done by issueing the following command:
```
php app/console doctrine:schema:update --force
```

Migrating from development to production environment
====================================================

Update web/app.php, and change the call to AppKernel to:
```
$kernel = new AppKernel('prod', false);
```
Clean the cache:
```
php app/console cache:clear --env=dev
php app/console cache:clear --env=prod
```

  


Misc
====

[![Build Status](https://api.travis-ci.org/beeznest/course-subscriber.png)](https://travis-ci.org/beeznest/course-subscriber)

Todo
====

* names for custom bundles have too generic names, i.e. sonata user should be student, namespace could be better than "Application"?
* new controller for login/* to use students table to authenticate isntead of fos_user?
