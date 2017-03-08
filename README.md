# Slime (SLIM + Eloquent)
[![Build Status](https://travis-ci.org/vikkio88/slime.svg?branch=master)](https://travis-ci.org/vikkio88/slime) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vikkio88/slime/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vikkio88/slime/?branch=master) [![Code Climate](https://codeclimate.com/github/vikkio88/slime/badges/gpa.svg)](https://codeclimate.com/github/vikkio88/slime) [![Test Coverage](https://codeclimate.com/github/vikkio88/slime/badges/coverage.svg)](https://codeclimate.com/github/vikkio88/slime/coverage) [![Issue Count](https://codeclimate.com/github/vikkio88/slime/badges/issue_count.svg)](https://codeclimate.com/github/vikkio88/slime) 

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
create_model <name> (namespaces availabile)
create_action <name> (namespaces availabile)
create_seeder <name>
create_route <name>
migrate
seed
build
```
which code can be found on ```App\Lib\Slime\Console\Commands```
 
 and 
 ```
 coverage [percentage]
 echo [parameter1] [parameter2] ...
 ```
 which code can be found on ```App\Console```
#### Build Command
Running the command ```php novice build``` you will generate a lighter version of your api project (easier to deploy via ftp) in the ```dist/``` folder.
```
php novice build
```
Will generate the deployable version, if you want it to be execute with verbose output just add **-v**
```
php novice build clean
```
will clean the ```dist/``` folder.

There is one configuration file that will allow you to customize your build ```config/build.php```
You can add to this file the folders and the files you want the build script to copy over, and if you want to exclude more files on the vendor clean process.

#### Namespaced Generator Commands
```
php novice create_model users\\player
```
Will generate a Model inside the right folder, creating the namespace structure (psr4 standard) and the namespace string on the file head.
the command above will generate ```Models/Users/Player.php``` file and the class will be in the namespace ```App\Models\Users```.

```
php novice create_action users\\player_get_one
```
Will generate an Action inside the right folder, creating the namespace structure (psr4 standard) and the namespace string on the file head.
the command above will generate ```Actions/Users/PlayerGetOne.php``` file and the class will be in the namespace ```App\Actions\Users```.

All the Generator commands convert snake_case into UpperCamelCase, so if you type
```
php novice create_model users\\player_match
```
the command above will generate ```Models/Users/PlayerMatch.php``` file and the class will be in the namespace ```App\Models\Users```.
