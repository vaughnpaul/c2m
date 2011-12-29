<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty es_date modifier plugin
 *
 * Type:     modifier<br>
 * Name:     es_date<br>
 * Purpose:  ouput data depending on global settigns
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_es_date($string)
{
	global $system;
	
	return $system->getDate( $string );
}

/* vim: set expandtab: */

?>
