<?php


/**
 * Class ExampleTest
 */
class ExampleTest extends PHPUnit_Framework_TestCase
{

	/**
	 *
	 */
	public function testIlluminateConnection()
	{
		Illuminate\Database\Capsule\Manager::schema()->create('test', function ($table) {
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
