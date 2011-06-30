<?php

require_once '/Users/jon/Development/Personal/symfony/symfony-1.3.8/lib/autoload/sfCoreAutoload.class.php';
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
