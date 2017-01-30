<?php


use App\Lib\Slime\Interfaces\DatabaseHelpers\DbHelperInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Schema\Blueprint as Blueprint;

class M1478637077UserTokens implements DbHelperInterface
{

    public function run()
    {
        $tableName = 'user_tokens';
        Capsule::schema()->dropIfExists($tableName);
        Capsule::schema()->create($tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->string('user_ip')->nullable();
            $table->string('login_token');
            $table->dateTime('last_usage');
            $table->timestamps();

            $table->unique('login_token');
        });
    }

}