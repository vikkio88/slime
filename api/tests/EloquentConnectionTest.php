<?php
use Illuminate\Database\Schema\Blueprint;


class EloquentConnectionTest extends PHPUnit_Framework_TestCase
{

	/**
	 *
	 */
	public function testIlluminateConnection()
	{
		Illuminate\Database\Capsule\Manager::schema()->create('test', function (Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->timestamps();
		});

		\Illuminate\Database\Capsule\Manager::table('test')->insert(
			[
				'email' => 'test@example.org'
			]
		);

		$test = \Illuminate\Database\Capsule\Manager::table('test')->first();
		$this->assertNotEmpty($test);
		\Illuminate\Database\Capsule\Manager::schema()->drop('test');
	}
}
