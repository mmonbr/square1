Square1.io Backend Test
======================
My approach to Square1's backend test

Requetiments
------------

    - PHP 5.6+
    - SQLite

Installation
------------    
    $ git clone https://github.com/mmonbr/square1.git
    $ composer install
    $ touch database/database.sqlite
    $ cp .env.example .env
    $ php artisan key:generate
    $ php artisan migrate
    $ php artisan import
    $ php artisan serve