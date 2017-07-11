<?php

namespace CeresSadingo\Providers;

use IO\Helper\TemplateContainer;
use IO\Extensions\Functions\Partial;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class CeresSadingoServiceProvider extends ServiceProvider
{
	const EVENT_LISTENER_PRIORITY = 100;

	private static $templateKeyToViewMap = [
			'tpl.home'               => 'Homepage.Homepage',                // provide template to use for homepage
			'tpl.category.item'      => 'content.CategoryItem',       // provide template to use for item categories
	];
	/**
	 * Register the service provider.
	 */
	public function register(){
	}

	public function boot (Twig $twig, Dispatcher $eventDispatcher)
  {

    // provide template to use for homepage
    $eventDispatcher->listen('IO.tpl.home', function(TemplateContainer $container, $templateData) {
        $container->setTemplate("CeresSadingo::Homepage.Homepage");
        return false;
    });

		// footer view
		$eventDispatcher->listen('IO.init.templates', function(Partial $partial)
		{
			 $partial->set('footer', 'CeresSadingo::content.Footer');
			 $partial->set('CategoryItem', 'CeresSadingo::content.CategoryItem');
		}, 0);
		return false;

  }
}
