<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {img} function plugin
 *
 * Type:     function<br>
 * Name:     img<br>
 * Purpose:  yield the <img> tag from cached data<br>
 * @param array
 * @param Smarty
 */
function smarty_function_img($params, &$smarty)
{
	$src = smarty_function_imgsrc( $params, $smarty );

	extract( $params );

	if ( $maxHeight || $maxWidth ) {

		global $c;

		$path = str_replace( $c->path( 'doc' ), $c->path( 'full' ), $src );

		$pathParts = explode( '?', $path );

		$path = $pathParts[0];

		if ( file_exists( $path ) ) {
			list( $width, $height ) = getImageSize( $path );

			if ( $height != 0 ) {
				$whRatio = $width / $height;

				if ( $width > $maxWidth )
					$w = " width=$maxWidth";

				if ( $height > $maxHeight )
					$h = " height=$maxHeight";

				if ( $maxHeight != 0 ) {
					if ( $maxWidth / $maxHeight > $whRatio )
						$w = '';

					if ( $maxWidth / $maxHeight < $whRatio )
						$h = '';
				}
			}
		}
	}
	else {
		$w = '';
		$h = '';
	}

	return "<img src='$src'" . $w . $h . ">";
}

?>