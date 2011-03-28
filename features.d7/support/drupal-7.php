<?php

require_once 'drupal-7.helpers.php';

chdir('/var/www/drupal-dev'); //the Drupal root, relative to the directory of the path
define('DRUPAL_ROOT','/var/www/drupal-dev');

require_once '/var/www/drupal-dev/includes/bootstrap.inc';

// Override 
$_SERVER['SERVER_SOFTWARE'] = 'behat';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

// Bootstrap
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
module_load_all();