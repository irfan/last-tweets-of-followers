LTOF - Last Tweets of Followers
=======================

Introduction
------------
Module builded on ZF2 skeleton application.

Directory Structure
------------------
module/Tweets folder looks like this:

    ├── Module.php
    ├── config
    │   └── module.config.php
    ├── src
    │   └── Tweets
    │       ├── Controller
    │       │   └── TweetController.php
    │       ├── Service
    │       │   ├── TwitterFactory.php
    │       │   └── TwitterService.php
    │       └── View
    │           └── Helper
    │               └── ConfigHelper.php
    └── view
        └── tweets
            └── tweet
                ├── list.phtml
                └── pagination.phtml

Installation
------------
- Clone the repository, install composer and run
    php composer.phar install
- Configure your virtual host file.
- Copy config/autoload/local.php.dist to config/autoload/local.php

Test
----
- No test written yet.

Configuration of the config/autoload/local.php:
----------------------------------------------
- Change the user name in twitter array.
- Go to https://apps.twitter.com page and create an application.
- Copy consumer key and consumer secret and put under oauth_options in this config.
- Generate access token.
- Put the access token and secret under access_token.


