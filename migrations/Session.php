<?php
class Session extends \Asgard\Migration\DBMigration {
	public function up() {
		$table = $this->container['config']['database.prefix'].'session';
		$this->container['schema']->create($table, function($table) {
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

	public function down() {
		$this->container['schema']->drop($this->container['config']['database.prefix'].'session');
	}
}