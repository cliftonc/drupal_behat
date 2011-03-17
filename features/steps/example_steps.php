<?php
// features/steps/example_steps.php
$steps->Given('/^that I am an anonymous user$/', function($world) {
	global $user;
	$user->uid == 0;
});

$steps->When('/^I look at the menu$/', function($world) {
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
	print_r(menu_get_object('module',1,'blog/1'));
	   
});

$steps->Then('/^I should see "([^"]*)" the content$/', function($world, $arg1) {
	// print_r($world->node);
    // throw new \Behat\Behat\Exception\Pending();
});
