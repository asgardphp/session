<?php
namespace Asgard\Session;

abstract class Driver {
	public final function handle() {
		session_set_save_handler(
			array($this, "_open"),
			array($this, "_close"),
			array($this, "_read"),
			array($this, "_write"),
			array($this, "_destroy"),
			array($this, "_gc")
		);
	}
}