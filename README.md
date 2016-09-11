# Slime
[![Build Status](https://travis-ci.org/vikkio88/slime.svg?branch=master)](https://travis-ci.org/vikkio88/slime)  [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vikkio88/angularjs-slim-boilerplate/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vikkio88/angularjs-slim-boilerplate/?branch=master)

Laravel is as heavy as a pregnant morbidly obese hippo and full of things that you would never use but you like eloquent models?

Well use **slime** for fuck sake.

Basically a boilerplate to create quickly AngularJs+RestFulAPI webapps.

### Ingredients

**Aqua, Eloquent (from Laravel), Slim (v3), Some AngulaJS bullshit**

**Beware, it might contain nuts, my nuts**

# HowTo
First clone the project
```
git clone git@github.com:vikkio88/slime.git
```
## BackEnd
Install the backend service
```
cd slime/api
composer install
```

Move and edit the configuration from the file ```/api/.env.example``` to the file ```/api/.env```

Run the migrations and seeders
```
php novice migrate && php novice seeder
```
Run the tests
```
phpunit
```
# FrontEnd
Install all the libs for the frontend
```
cd slime
bower install
```
edit two configurations, one on the ```/index.html```

```
<base href="/BASEWEBDIR">
```
the second is the file ```/app/modules/app.constants.js```
where you need to setup correctly the ```api/``` entrypoint url
(To avoid problems CORS related it should be the same as the frontend so ```.../BASEWEBDIR/api/```)


# ToDo
## BackEnd
- [] Improve ```novice``` script (it was taken from another [project](https://github.com/kladd/slim-eloquent)) in order to make it able to be extendable
- [] Add to ```novice``` the command to ```create migration``` and  ``create model``
- [] Create a Controllers Layer
- [] Introduce Middleware
- [] Move to a separate project

## FrontEnd
- [] Change Css Framework to ```SemanticUI```
- [] Introduce jasmine tests for AngularJS
- [] Make the constant easier to configure
- [] Move to a set of separated projects with more than one FE framework
