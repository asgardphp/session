<?php
namespace Asgard\Session;

class Bundle extends \Asgard\Core\BundleLoader {
	public function buildContainer(\Asgard\Container\ContainerInterface $container) {
		$container->register('data', function($container) { return new Data($container->get('db')); } );
	}

	public function run(\Asgard\Container\ContainerInterface $container) {
		
	}
}