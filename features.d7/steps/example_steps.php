<?php

// features/steps/example_steps.php
$steps->Given('/^that I am an anonymous user$/', function($world) {     
    bdd_drupal_set_user(BDD_DRUPAL_ANONYMOUS); 
});


$steps->Given('/^that I am a logged in user$/', function($world) {
    bdd_drupal_set_user(BDD_DRUPAL_ADMIN);
});

$steps->When('/^I look at the primary links menu$/', function($world) {
	$world->menu = bdd_drupal_get_menu('main-menu'); 	
});

$steps->Then('/^I should see "([^"]*)" in the menu$/', function($world, $title) {    		
	if(!bdd_drupal_is_in_menu($title,$world->menu)) {
	   throw new \Behat\Behat\Exception\Exception();
	}
});

$steps->When('/^I look at the "([^"]*)" node$/', function($world, $node) {
	$world->node = bdd_drupal_get_path_content($node);        
});

$steps->Then('/^I should see "([^"]*)" in the content$/', function($world, $text) {		
	if(bdd_drupal_contains($world->node,$text) == false) {
	   throw new \Behat\Behat\Exception\Exception();	
	}    
});

$steps->When('/^I look at my blog$/', function($world) {        		      	  
   	$world->blog = bdd_drupal_get_path_content('blog/1');   	  
});

$steps->Then('/^I should see "([^"]*)" the content$/', function($world, $text) {
	
    if(bdd_drupal_contains($world->blog,$text) == false){         
         throw new \Behat\Behat\Exception\Exception();
    }
    
});
