<?php
#todo use DAL
namespace Asgard\Session;

class DBDriver extends Driver implements DriverInterface {
	protected $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function _open() {
		return $this->db ? true:false;
	}

	public function _close() {
		return true;
	}

	public function _read($id) {
		$row = $this->db->query('SELECT data FROM session WHERE id = ?', [$id])->first();
		if(!isset($row['data']))
			return;
		return $row['data'];
	}

	public function _write($id, $data) {
		$access = time();
		$this->db->query('REPLACE INTO session VALUES (?, ?, ?)', [$id, $access, $data]);
		return true;
	}

	public function _destroy($id) {
		$this->db->query('DELETE FROM session WHERE id = ?', [$id]);
		return true;
	}

	public function _gc($max) {
		$old = time() - $max;
		$this->db->query('DELETE FROM session WHERE access <= ?', [$old]);
		return true;
	}
}