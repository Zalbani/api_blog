# Blog API

> An app just for try api platform

[comment]: <> (Deploy with heroku available at : <https://mycalendapp.herokuapp.com/>)

## Built With

* [Symfony](https://github.com/symfony/symfony) - Symfony is a PHP framework for web and console applications and a set of reusable PHP components
* [Api platform](https://github.com/api-platform/api-platform) - REST and GraphQL framework to build modern API-driven projects

## Installation

```bash
# install dependencies
$ composer install

# serve with at localhost:8000
$ php -S 127.0.0.1:8000 -t public
```

## Development setup

How to setup the development environement : 
 - how to create db ?
 - how to fill it ?
 - how to run test-suite ?

```bash
# Database connection
# Just update the .env file custom every variable that inside <...>
DATABASE_URL="mysql://<user>:<password>@<127.0.0.1>:<3306>/<db_name>?serverVersion=5.7"
DATABASE_URL="postgresql://<user>:<password>@<127.0.0.1>:<5432>/<db_name>?serverVersion=13&charset=utf8"

# Database setup
$ bin/console doctrine:database:create
$ bin/console doctrine:migrations:migrate

# Fill database with fake data
$ bin/console doctrine:fixtures:load

# run test
$ bin/phpunit
```

Some useful command if you want to create or update db scheme and then migrate them.
```bash
# Create an entity
$ bin/console make:entity <NameYourEntity>

# Create a migration
$ bin/console make:migration
```

## Organisation
```bash
.
├─ migrations                   -> History of all db update create with the command : $ bin/console make:migration
│   ├─ VersionX.php
│   └─ VersionX.php
├─ src
│   ├─ DataFixtures             -> All fake data you thats add into db when u execute : $ bin/console doctrine:fixtures:load
│   └─ Entity                   -> All the database entity and object definition are store here
│      ├─ RessourceId           -> An abstraction for Id because they are in all entity 
│      └─ Timestampable         -> Same for times tamp, permit to add field createdAt ans updatedAt in all entity 
└─ tests                        -> In this folder you have all tests executed with the command : $ bin/phpunit
    ├─ Func                     -> Functional tests
    │  └─ AbstractEndPoint.php  -> This abstraction avoid us the repetitive action to create one client foreach functional test
    └─ Unit                     -> Unit tests
```

## Release History

* 0.0.1
    * Work in progress

## Authors

Alban PIERSON – pro.pierson.alban@gmail.com

## License

This project is licensed under the GNU GPL v3 License - see the [LICENSE.md](LICENSE.md) file for details
