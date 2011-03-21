<?php

define('DRUPAL_ROOT','/var/www/drupal-dev');

require_once '/var/www/drupal-dev/includes/bootstrap.inc';

// Override 
$_SERVER['SERVER_SOFTWARE'] = 'behat';
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

// Bootstrap
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

/**
drupal_load('module', 'i18n'); // I had to load i18n, otherwise I got some errors. If you don't use it, remove this
module_invoke('i18n', 'boot');
drupal_load('module', 'node');
module_invoke('node', 'boot');
drupal_load('module', 'menu');
module_invoke('menu', 'boot');
**/
// Test
// drupal_load('module', 'blog'); // I had to load i18n, otherwise I got some errors. If you don't use it, remove this

module_load_all();
