<?php

/**
 * Definitions
 */
define('BDD_DRUPAL_ANONYMOUS',0);
define('BDD_DRUPAL_ADMIN',1);

/**
 * Set the drupal user
 * @param $userId
 * @return true
 */
function bdd_drupal_set_user($userId) {
    global $user;
    $user->uid = $userId;
    return true;    
}

/**
 * Get a menu
 * @param $menuName
 * @return menu Array
 */
function bdd_drupal_get_menu($menuName) {
	return menu_tree_all_data($menuName);
}

/**
 * Link is in a menu
 * @param $path
 * @return unknown_type
 */
function bdd_drupal_is_in_menu($title, $menu) {
	$found = false;    
    foreach ($menu as $menuitem) {
        if($menuitem['link']['title'] == $title) $found = true;    
    }           
    return $found;
}

/**
 * 
 * @param $path
 * @return unknown_type
 */
function bdd_drupal_get_node_at_path($path) {
   return menu_get_object('node',1,$path);  
}

/**
 * 
 * @param $path
 * @return unknown_type
 */
function bdd_drupal_get_path_content($path) {

	$returnValue = "";
	$item = menu_get_item($path);	
    $callback = $item['page_callback'];   
        
    if($callback) {
        
    	// This page has a callback to get additional content
    	$callback_arg = $item['page_arguments'][0];
        
    	// This page has additional include file requirements
        if($item['file']) {    
            require_once $item['file'];
        }                   
        
        // Call callback
        $result = $callback($callback_arg);   // Check D7 code                    
        print("RESULT: " . $result);
        $returnValue = $result;
                
    } 
    
    return $returnValue;
	
}

/**
 * Get the default value (english) of a node body.
 * @param $node
 * @param $propertyName
 * @return unknown_type
 */
function bdd_drupal_get_node_property($node,$propertyName) {   
	return $node->body['en'][0][$propertyName];
}

/**
 * Check if string contains some text
 * @param $object
 * @param $text
 * @return unknown_type
 */
function bdd_drupal_contains($object,$text) {
	if(is_string($object)) {
       if(strpos($object,$text) === false){
       	    return false;
       }
	} else {
		return false;
	}
	return true;
}