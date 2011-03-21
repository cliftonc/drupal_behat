<?php

// features/steps/example_steps.php
$steps->Given('/^that I am an anonymous user$/', function($world) {
	global $user;
	$user->uid == 0;
});

$steps->When('/^I look at the primary links menu$/', function($world) {
	$world->menu = menu_tree_all_data('primary-links');	
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
    global $user;
    $user->uid == 1;
});

$steps->When('/^I look at my blog$/', function($world) {    
    //print_r(menu_get_item('blog/1'));
    
    $module = menu_get_item('blog/1');
    
    // Wrap into helper    
    $module_func = $module['page_callback'];
    $module_arg = $module['page_arguments'][0];    
    require_once $module['file'];                   
    $result = call_user_func($module_func,$module_arg);
    $world->blog = $result;            
     
});

$steps->Then('/^I should see "([^"]*)" the content$/', function($world, $text) {
	
	if(strpos($world->blog,$text) === false){
        throw new \Behat\Behat\Exception\Exception();
    }
    
});
