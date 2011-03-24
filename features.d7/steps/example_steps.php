<?php

// features/steps/example_steps.php
$steps->Given('/^that I am an anonymous user$/', function($world) {
	global $user;
	$user->uid == 0;
});

$steps->When('/^I look at the primary links menu$/', function($world) {
	$world->menu = menu_tree_all_data('main-menu');
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
	$world->node = menu_get_object('node',1,$node);
});

$steps->Then('/^I should see "([^"]*)" in the content$/', function($world, $contents) {	
	if($world->node->body['en'][0]['value'] != $contents) {
	   throw new \Behat\Behat\Exception\Exception();	
	}    
});

$steps->Given('/^that I am a logged in user$/', function($world) {
    global $user;
    $user->uid == 1;
});

$steps->When('/^I look at my blog$/', function($world) {    
    
    $module = menu_get_item('blog/1');
        
    // Wrap into helper    
    $module_func = $module['page_callback'];
    
    
    
    $module_arg = $module['page_arguments'][0];    
    require_once $module['include_file'];                   
    $result = $module_func($module_arg);   // Check D7 code
    $world->blog = $result['nodes'][7]['body']['#object']->body['en'][0]['value'];

    print($world->blog);
    
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
