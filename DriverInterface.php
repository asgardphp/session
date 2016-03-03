<?php
namespace Asgard\Session;

interface DriverInterface {
	public function handle();

	public function _open();

	public function _close();

	public function _read($id);

	public function _write($id, $data);

	public function _destroy($id);

	public function _gc($max);
}