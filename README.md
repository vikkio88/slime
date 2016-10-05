# Slime
[![Build Status](https://travis-ci.org/vikkio88/slime.svg?branch=master)](https://travis-ci.org/vikkio88/slime) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vikkio88/slime/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vikkio88/slime/?branch=master)

Laravel is as heavy as a pregnant morbidly obese hippo and full of things that you would never use but you like eloquent models?

Well use **slime** for fuck sake.

Basically a boilerplate to create quickly RestFulAPI.

### Ingredients

**Aqua, Eloquent (from Laravel), Slim (v3), Some other bullshit**

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

# ToDo
## BackEnd
-  Improve ```novice``` script (it was taken from another [project](https://github.com/kladd/slim-eloquent)) in order to make it able to be extendable
-  Add to ```novice``` the command to ```create migration``` and  ``create model``
-  Finalize the Action Layer

