<?php

// NOTE:  Functionality is currently failing because registering with a BuddyPress
// system causes the ADD functionality to be called.  If you have any required fields
// the ADD will fail 'cause that's not set yet (it gets set on activation).  If it
// fails, then you'll later get an UPDATE failure 'cause that's what happens when
// a user activates their account.

//
//	MailChimp Merge Data looks something like this:
//	Array ( [name] => Years Shredding [req] => 1 [field_type] => text [public] => 1
//	[show] => 1 [order] => 4 [default] => [helptext] => [size] => 25 [tag] => YEARSSHRED ) )
//

//
//	Function for displaying the UI for BuddyPress integration
//
function AC_ShowBuddyPressUI( $api, $list )
{
	// Need to query data in the BuddyPress extended profile table
	global $wpdb;

	// Get settings
	$syncBuddyPress = get_option( WP88_MC_SYNC_BUDDYPRESS );
	$staticText = get_option( WP88_MC_STATIC_TEXT );

	// Start outputting UI
	print '<p><strong>You are using <a target="_blank" href="http://wordpress.org/extend/plugins/buddypress/">BuddyPress</a></strong>. With AutoChimp, you can automatically synchronize your BuddyPress user Profile Fields with your selected MailChimp mailing list as users join your site and update their profile.  Please ensure that only one list is selected.</p>';
	print '<fieldset style="margin-left: 20px;">';

	// Create a hidden field just to signal that the user can save their preferences
	// even if the sync button
	print '<input type="hidden" name="buddypress_running" />';
	print '<p><input type=CHECKBOX value="on_sync_buddypress" name="on_sync_buddypress" ';
	if ( '1' === $syncBuddyPress )
		print 'checked';
	print '> Automatically Sync BuddyPress Profile Fields with MailChimp.</p>';
	print '<p>Use the following table to assign your BuddyPress Profile Fields to your MailChimp fields.  <strong>Tip:</strong> You can use the "Static Text" field at the bottom to assign the same value to each new user which will distinguish users from your site from users from other locations.</p>';

	$fields = $wpdb->get_results( "SELECT name,type FROM wp_bp_xprofile_fields WHERE type != 'option'", ARRAY_A );
	if ( $fields )
	{
		// Get the mailing list's Merge Variables
		$mcFields = AC_FetchMailChimpMergeVars( $api, $list );
		if ( empty( $mcFields ) )
			print "<p><em><strong>Problem: </strong>AutoChimp could not retrieve your MailChimp Merge Variables. Try saving your selected mailing list again.</em></p>";

		foreach ( $fields as $field )
		{
			// Generate a select box for this particular field
			$fieldNameTag = AC_EncodeUserOptionName( WP88_BP_XPROFILE_FIELD_MAPPING, $field['name'] );
			$selectBox = AC_GenerateFieldSelectBox( $fieldNameTag, $mcFields );
			$output .= '<tr class="alternate">' . PHP_EOL . '<td width="70%">' . $field['name'] . '</td>' . PHP_EOL . '<td width="30%">' . $selectBox . '</td>' . PHP_EOL . '</tr>' . PHP_EOL;
		}

//		$selectBox = AC_GenerateFieldSelectBox( WP88_MC_STATIC_FIELD, $mcFields );
//		$output .= '<tr class="alternate"><td width="70%">Static Text:<input type="text" name="static_select" value="' . $staticText . '"size="25" /></td><td width="30%">' . $selectBox . '</td></tr>';
		$tableText .= '<div id=\'filelist\'>' . PHP_EOL;
		$tableText .= '<table class="widefat" style="width:650px">
				<thead>
				<tr>
					<th scope="col">BuddyPress Profile Field:</th>
					<th scope="col">Assign to MailChimp Field:</th>
				</tr>
				</thead>' . PHP_EOL;
		$tableText .= $output;
		$tableText .= '</table>' . PHP_EOL . '</div>' . PHP_EOL;
		print $tableText;
	}
}
?>