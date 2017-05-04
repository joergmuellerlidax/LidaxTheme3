<?php

namespace CeresSadingo\Providers;

use IO\Helper\TemplateContainer;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

class CeresSadingoServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 */
	public function register(){

	}

	public function boot (Twig $twig, Dispatcher $eventDispatcher)
  {
		// footer view
		$eventDispatcher->listen('IO.init.templates', function(Partial $partial)
		{
			 $partial->set('footer', 'CeresSadingo::content.Footer');
		}, 0);
  	return false;
		
    // provide template to use for homepage
    $eventDispatcher->listen('IO.tpl.home', function(TemplateContainer $container, $templateData) {
        $container->setTemplate("CeresSadingo::content.Homepage");
        return false;
    });


  }
}
