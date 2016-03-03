<?php
namespace Asgard\Session\Tests;

class SessionTest extends \PHPUnit_Framework_TestCase {
	protected static $db;

	public static function setUpBeforeClass() {
		static::$db = $db = new \Asgard\Db\DB([
			'driver' => 'sqlite',
			'database' => ':memory:'
		]);
		$schema = new \Asgard\Db\Schema($db);

		$table = 'session';
		$schema->drop($table);
		$schema->create($table, function($table) {
			$table->addColumn('id', 'integer', [
				'string' => 32,
			]);
			$table->addColumn('access', 'datetime', [
			]);
			$table->addColumn('data', 'text', [
			]);
			$table->setPrimaryKey(
				['id'],
				'primary'
			);
		});
	}

	public function test() {
		$session = new \Asgard\Session\DBDriver(static::$db);

		$this->assertTrue($session->_open());
		$this->assertTrue($session->_close());

		$id = '124567';

		#write
		$session->_write($id, 'bob');
		#read
		$this->assertEquals('bob', $session->_read($id));

		#destroy
		$session->_destroy($id);
		$this->assertEquals(0, static::$db->dal()->from('session')->count());

		#gc
		$session->_write($id, 'bob');
		$session->_gc(0);
		$this->assertEquals(0, static::$db->dal()->from('session')->count());
	}
}