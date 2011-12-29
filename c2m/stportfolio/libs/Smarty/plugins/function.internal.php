<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {internal} function plugin
 *
 * Type:     function<br>
 * Name:     imgsrc<br>
 * Purpose:  insert internal system variables or links to internal resources<br>
 * @param array
 * @param Smarty
 */
function smarty_function_imgsrc($params, &$smarty)
{
	extract( $params );

	global $system, $siteLastUpdate;
	
	switch ( $resource_type ) {
	    
	    case 'page':
	    case 'form':
	    case 'report':
	       $output = $system->getURL( $resource_type, $resource_id );
	       break;
	       
	    case 'variable':
	    
	       switch( $resource_id ) {
	           case 'numvisitors':
	               $output = $system->siteData['counter'];
	               break;
	               
	           case 'lastupdate':
	               $output = $siteLastUpdate;
	               break;
	       }
	       break;
	       
	    case 'user_info':
	       $output = $_SESSION['es_auth'][$resource_id];
	       break;
	}

    return $output;
}

?>