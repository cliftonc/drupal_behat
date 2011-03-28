<?php

// features/steps/example_steps.php
$steps->Given('/^that I am an anonymous user$/', function($world) {
    bdd_drupal_set_user(BDD_DRUPAL_ANONYMOUS); 	
});

$steps->When('/^I look at the primary links menu$/', function($world) {
	$world->menu = bdd_drupal_get_menu('primary-links');    	
});

$steps->Then('/^I should see "([^"]*)" in the menu$/', function($world, $title) {    	
	$found = false;	
	foreach ($world->menu as $menuitem) {
		if($menuitem['link']['title'] == $title) $found = true;    
	}	
	if(!$found) {
	   throw new \Behat\Behat\Exception\Exception();
	}
});

$steps->When('/^I look at the "([^"]*)" node$/', function($world, $node) {
	$world->node = menu_get_object('node',1,'node/1');	
});

$steps->Then('/^I should see "([^"]*)" in the content$/', function($world, $contents) {	
	if($world->node->body != $contents) {
	   throw new \Behat\Behat\Exception\Exception();	
	}    
});

$steps->Given('/^that I am a logged in user$/', function($world) {
    bdd_drupal_set_user(BDD_DRUPAL_ADMIN);	
});

$steps->When('/^I look at my blog$/', function($world) {    
    
    $module = menu_get_item('blog/1');

    // print_r($module);
    // Wrap into helper    
    $module_func = $module['page_callback'];
    $module_arg = $module['page_arguments'][0];
    
    print_r("HERE");
    
    require_once $module['file'];               
    
    
    print_r("HERE");
    
    
    $result = $module_func($module_arg);        
    
    print_r("HERE");
        
    // $world->blog = $result;            
     
});

$steps->Then('/^I should see "([^"]*)" the content$/', function($world, $text) {
	
	if(is_string($world->blog)) {
	   if(strpos($world->blog,$text) === false){
         throw new \Behat\Behat\Exception\Exception();
        }
	} else {
		 throw new \Behat\Behat\Exception\Exception();
	}
    
});
