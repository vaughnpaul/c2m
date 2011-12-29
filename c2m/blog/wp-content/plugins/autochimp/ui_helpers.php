<?php

//
//	Given an field name, generates select box HTML.  Also takes an extra array
//	argument holding the mailing lists's Merge Variable names.  This is simply
//	a time-saver so that this data doesn't need to be queried several times.
//
function AC_GenerateFieldSelectBox( $fieldName, $mcMergeVars )
{
	// See which field should be selected (if any)
	$selectedVal = get_option( $fieldName );

	// Create a select box from MailChimp merge values
	$selectBox = '<select name="' . $fieldName . '">' . PHP_EOL;

	// Create an "Ignore" option
	$selectBox .= '<option>' . WP88_IGNORE_FIELD_TEXT . '</option>' . PHP_EOL;

	// Loop through each merge value; use the name as the selectable
	// text and the tag as the value that gets selected.  The tag
	// is what's used to lookup and set values in MailChimp.
	foreach( $mcMergeVars as $field => $tag )
	{
		// Not selected by default
		$sel = '<option value="' . $tag . '"';

		// Should it be $tag?  Is it the same as the tag that the user selcted?
		// Remember, the tag isn't visible in the combo box, but it's saved when
		// the user makes a selection.
		if ( 0 === strcmp( $tag, $selectedVal ) )
			$sel .= ' selected>';
		else
			$sel .= '>';

		// print an option for each merge value
		$selectBox .= $sel . $field . '</option>' . PHP_EOL;
	}
	$selectBox .= '</select>' . PHP_EOL;
	return $selectBox;
}

?>