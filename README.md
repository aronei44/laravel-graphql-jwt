# Chat App (BAAS)

This BAAS just a learn project for chatting api service with graphql API, JWT auth, using telescope for logging

## Installation

clone this project
```
git clone https://github.com/aronei44/laravel-graphql-jwt.git project
cd project
```

environment
```
composer update
cp .env.example .env
php artisan key:generate
php artisan jwt:secret
```

fill database information and
```
php artisan migrate
php artisan serve
```

## Debug

open http:127.0.0.1:8000/graphiql for graphql playground

open http:127.0.0.1:8000/telescope for log

## Contribution Rules

- 1 model use 1 schema
- each mutation, query, subscription use 1 directive and/or base laravel directive just like @all, @find etc
- for file upload, please write your mutation example in EXAMPLE.MD because too hard to understand. LOL :)
- always use eagerload (@hasMany, @hasOne, @belongsTo, @hasManyThrough)

## File Modularization (directive / resolver)

to create new mutation, query, subscription resolver:

```
php artisan lighthouse:query name
php artisan lighthouse:mutation name
php artisan lighthouse:subscription name
```
etc (see php artisan list)

```
--app
    | --graphql
    |   | --queries
    |   |   | --yourQueries.php
    |   | --mutations
    |   |   | --yourMutation.php
    |   | --subscriptions
    |   |   | --yourSubs.php
```
etc
