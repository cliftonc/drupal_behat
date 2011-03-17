<?php

/**
 * Place bootstrap scripts here:
 *
 *     require_once 'PHPUnit/Autoload.php';
 *     require_once 'PHPUnit/Framework/Assert/Functions.php';
 */
chdir('/var/www/drupal-6.20'); //the Drupal root, relative to the directory of the path
require_once './includes/bootstrap.inc';
require_once './includes/common.inc';
require_once './includes/module.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);



drupal_load('module', 'i18n'); // I had to load i18n, otherwise I got some errors. If you don't use it, remove this
module_invoke('i18n', 'boot');
drupal_load('module', 'node');
module_invoke('node', 'boot');
drupal_load('module', 'menu');
module_invoke('menu', 'boot');

module_load_all();

?>