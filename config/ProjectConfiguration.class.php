<?php

require_once realpath(__FILE__ . '/../..') . '/lib/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropel15Plugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('sfCompat10Plugin');
	$this->enablePlugins('sfPagerNavigationPlugin');
  }
}
