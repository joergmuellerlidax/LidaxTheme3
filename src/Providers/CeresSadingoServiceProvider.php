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
			'tpl.category.item'      => 'Category.Item.CategoryItem',       // provide template to use for item categories
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
		// provide mapped category IDs - DEPRECATED?
		$eventDispatcher->listen('init.categories', function (CategoryMap $categoryMap) use (&$config) {
				$categoryMap->setCategoryMap(array(
						CategoryKey::HOME => $config->get("CeresSadingo.global.category.home"),
						CategoryKey::PAGE_NOT_FOUND => $config->get("CeresSadingo.global.category.page_not_found"),
						CategoryKey::ITEM_NOT_FOUND => $config->get("CeresSadingo.global.category.item_not_found")
				));
		}, self::EVENT_LISTENER_PRIORITY);
		// footer view
		$eventDispatcher->listen('IO.init.templates', function(Partial $partial)
		{
			 $partial->set('footer', 'CeresSadingo::content.Footer');
			 $partial->set('category', 'CeresSadingo::content.Category');
		}, 0);
		return false;

  }
}
