<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty gallery_price modifier plugin
 *
 * Type:     modifier<br>
 * Name:     default<br>
 * Purpose:  designate default value for empty variables
 * @link http://smarty.php.net/manual/en/language.modifier.default.php
 *          default (Smarty online manual)
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_gallery_price($string)
{
	return galleryPrice( $string );
}

/* vim: set expandtab: */

?>
