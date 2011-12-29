<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


function smarty_block_tabcontainer($params, $content, &$smarty)
{
    if (is_null($content)) {
    }
    
    else
    
	    $_output = '<DIV class=tabber>';
    	$_output .= $content . '</div>';
    	
    return $_output;

}

/* vim: set expandtab: */

?>
