<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {list} function plugin
 *
 * Type:     function<br>
 * Name:     list
 * {list key=home_age selected=$home_age}
 * Purpose:  yield a complete <select> list, based on the EasySite Lists tool
 * @param array
 * @param Smarty
 */
function smarty_function_list($params, &$smarty)
{
	global $db, $site;

	extract( $params );

	$arr = array();

	if ( !$key && $name )
		$key = $name;

	switch( $key ) {

		// handle the reserved list types first
		case 'count':

			for( $i = $start; $i <= $end; $i++ ) {
				$arr [] = array( $i, $i );
			}

			break;

		default:
			// get the list contents from the database

			$items = $db->getAll( 'select * from ' . LISTITEMS_TABLE . " where list_key = '$key' and site_key = '$site' order by _order" );

			// reformat in key => value format

			foreach( $items as $index => $row ) {
				$arr[] = array(  $row[data], $row[label] );
			}

			break;
	}

	$numItems = sizeof( $arr );

	if ( !$numItems ) {

		// no list found, so use a simple textfield instead

		return "<input size=20 type=text name='$name' selected='$selected'>";

		//return "[ Smarty error: The list with key '$key' could not be found. ]";
	}
	else {

		if ( !$name )
			$name = $key;

		$result = "<select name='$name' {$extra}>";

		for( $i = 0; $i < $numItems; $i++ ) {

			$key = $arr[$i][0];
			$val = $arr[$i][1];

			if ( $key == '' && $val == '' )
				continue;

			if ( is_array( $selected ) && @in_array( $key, $selected ) )
				$sel = ' selected';
			elseif ( $selected == $key )
				$sel = ' selected';
			else
				$sel = '';

			$result .= "<option value=\"$key\"$sel>$val</option>\n";
		}

		$result .= "</select>";

		return $result;
	}
}

?> 