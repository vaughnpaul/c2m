<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {imgsrc} function plugin
 *
 * Type:     function<br>
 * Name:     imgsrc<br>
 * Purpose:  yield the src part of an <img> tag, from cached data<br>
 * @param array
 * @param Smarty
 */
function smarty_function_imgsrc($params, &$smarty)
{
	extract( $params );

	global $site, $db, $c, $siteData;

	$c->_table 	= $table;
	$c->_field 	= $field;
	$c->_id 	= $id;

/*	if ( !$c->_skin )
		$c->_skin	= $siteData[skin_id];

	if ( $table == SETTINGS_TABLE ) {
	   $skinWhere = 'and skin_id=\''. intval( $c->_skin ) .'\'';
    }
*/	   
	if ( !$c->cached() ) {
        $content = $db->getOne( "select $field from $table where id = '$id' $skinWhere" );

        // if we could not write to the cache, then return image.php object

		if ( !$c->cache( $content ) )
        	return DOC_ROOT . "image.php?table=$table&field=$field&id=$id";
	}

	if ( $timestamp == 'no' )
		return $c->path( 'doc' );
	else
		return $c->path( 'doc' ) . '?' . filemtime( $c->path( 'full' ) );
}

?>