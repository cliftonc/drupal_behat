<?php

require_once 'drupal-6.helpers.php';

chdir('/var/www/drupal-6.20'); //the Drupal root, relative to the directory of the path

require_once '/var/www/drupal-6.20/includes/bootstrap.inc';
require_once '/var/www/drupal-6.20/includes/common.inc';
require_once '/var/www/drupal-6.20/includes/module.inc';

// Override 
$_SERVER['SERVER_SOFTWARE'] = 'behat';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

// Bootstrap
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
module_load_all();

