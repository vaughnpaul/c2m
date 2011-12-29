<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


function smarty_block_tab($params, $content, &$smarty)
{
    if (is_null($content)) {
    }
    
    else
    
	    $_output = '<DIV class=tabbertab><h2>'.$params['caption'].'</h2>';
    	$_output .= $content . '</div>';
    	
    return $_output;

}

/* vim: set expandtab: */

?>
