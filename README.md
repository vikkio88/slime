# Slime (SLIM + Eloquent)
[![Build Status](https://travis-ci.org/vikkio88/slime.svg?branch=master)](https://travis-ci.org/vikkio88/slime) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vikkio88/slime/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vikkio88/slime/?branch=master) [![Code Climate](https://codeclimate.com/github/vikkio88/slime/badges/gpa.svg)](https://codeclimate.com/github/vikkio88/slime) [![Test Coverage](https://codeclimate.com/github/vikkio88/slime/badges/coverage.svg)](https://codeclimate.com/github/vikkio88/slime/coverage) 

Laravel is as heavy as a pregnant morbidly obese hippo and full of things that you would never use but you like eloquent models?

Well use **slime-api** for fuck sake.

Basically a boilerplate to create quickly RestFulAPI.

### Ingredients

**Aqua, Eloquent (from Laravel), Slim (v3), Some other bullshit**

**Beware, it might contain nuts**

# HowTo
First clone the project
```
git clone git@github.com:vikkio88/slime.git
```
or install with composer
```
composer create-project vikkio88/slime-api WHATEVER
```

Install the dependencies (not needed if you used ```create-project``` command above)
```
composer install
```

Move and edit the configuration from the file ```.env.example``` to the file ```.env```

Run the migrations and seeders
```
php novice migrate && php novice seeder
```
Run the tests
```
phpunit
```

# Novice
```novice``` is a php cli script taken from another [project](https://github.com/kladd/slim-eloquent).
In this small project I extended it to make it easier for everyone to generate classes and even generate their own commands.
## How to
**Novice** will run a script which is in the right place, if it extends the right Interface.
The file ```config/console``` contains the path where novice will search for the scripts
```php
return [
    'commandPaths' => [
        'App\Lib\Slime\Console\Commands\\',
        'App\Console\\'
    ]
];
```
If you need more, just add more (dont forget to add them to the composer json autoloader config)

## Usage
To run a ```novice``` command you will need to be in the root of the project and type
```
$ php novice <command_name>
```

### Command Bundled
Out of the box **Slime** provide you the following *novice* commands:
```
create_config <name>
create_migration <name>
create_model <name>
create_seeder <name>
create_route <name>
migrate
seed
```
which code can be found on ```App\Lib\Slime\Console\Commands```
 
 and 
 ```
 coverage [percentage]
 echo [parameter1] [parameter2] ...
 ```
 which code can be found on ```App\Console```
