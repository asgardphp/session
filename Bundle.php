<?php
namespace Asgard\Session;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run(\Asgard\Container\ContainerInterface $container) {
		$container['httpKernel']->filterAll('Asgard\Session\Filter');
	}
}