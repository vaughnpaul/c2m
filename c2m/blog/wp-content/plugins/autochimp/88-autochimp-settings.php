<div class="wrap" style="max-width:950px !important;">
<h2>AutoChimp</h2>
<div id="poststuff" style="margin-top:10px;">
<div id="mainblock" style="width:710px">
<div class="dbx-content">

<form enctype="multipart/form-data" action="<?php echo $action_url ?>" method="POST">

<?php
require_once 'inc/MCAPI.class.php';
require_once 'ui_helpers.php';
wp_nonce_field('mailchimpz-nonce');

$pluginFolder = get_bloginfo('wpurl') . '/wp-content/plugins/' . dirname( plugin_basename( __FILE__ ) ) . '/';
?>

<div style="float:right;width:220px;margin-left:10px;border: 1px solid #ddd;background: #fdffee; padding: 10px 0 10px 10px;">
 	<h2 style="margin: 0 0 5px 0 !important;">Information</h2>
 	<ul id="dbx-content" style="text-decoration:none;">
    	<li><img src="<?php echo $pluginFolder;?>help.png"><a style="text-decoration:none;" href="http://www.wandererllc.com/company/plugins/autochimp" target="_blank"> Support and Help</a></li>
		<li><a style="text-decoration:none;" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HPCPB3GY5LUQW&lc=US" target="_blank"><img src="<?php echo $pluginFolder;?>paypal.gif"></a></li>
    	<li><table border="0">
    		<tr>
    			<td><a href="http://member.wishlistproducts.com/wlp.php?af=1080050" target="_blank"><img src="http://www.wishlistproducts.com/affiliatetools/images/WLM_120X60.gif" border="0"></a></td>
    			<td>Want a membership site? Try <a style="text-decoration:none;" href="http://member.wishlistproducts.com/wlp.php?af=1080050" target="_blank">Wishlist</a></td>
    		</tr>
    	</table></li>
    	<li><table border="0">
    		<tr>
    			<td><a href="http://www.woothemes.com/amember/go.php?r=39127&i=b18" target="_blank"><img src="http://woothemes.com/ads/120x90c.jpg" border=0 alt="WooThemes - WordPress themes for everyone" width=120 height=90></a></td>
    			<td>Make your site <em>stunning</em> with <a style="text-decoration:none;" href="http://www.woothemes.com/amember/go.php?r=39127&i=b18" target="_blank">WooThemes for WordPress</a></td>
    		</tr>
    	</table></li>
    	<li><a href="http://eepurl.com/MnhD" target="_blank"><img src="http://www.mailchimp.com/img/badges/banner3.gif" border="0"></a></li>
    	<li>Contact <a href="http://www.wandererllc.com/company/contact/" target="_blank">Wanderer LLC</a> to sponsor a feature or write a plugin just for you.</li>
    	<li>Leave a good rating or comments for <a href="http://wordpress.org/extend/plugins/autochimp/" target="_blank">AutoChimp</a>.</li>
	</ul>
</div>

<div id="mailchimp_api_key" class="postbox" style="width:450px;height:230px">
<h3 class='hndle'><span>MailChimp API Key Management</span></h3>
<div class="inside">

<?php
	// Fetch the Key from the DB here
	$apiKey = get_option( WP88_MC_APIKEY );

	if ( empty( $apiKey ) )
	{
		print "<p><em>No API Key has been saved yet!</em></p>";
		print "<p>Set your Mailchimp API Key, which you can find on the <a target=\"_blank\" href=\"http://us1.admin.mailchimp.com/account/api\">MailChimp website</a>, ";
		print "in the text box below. Once the API Key is set, you will see the various options that AutoChimp provides.</p>";
		print '<p>Set Your MailChimp API Key: ';
	}
	else
	{
		print "<p>Your Current MailChimp API Key:  <strong>$apiKey</strong><p/>";
		print '<p><em>There is no need to set your API Key again unless you have acquired a new API key at <a href="http://eepurl.com/MnhD">mailchimp.com</a>.</em></p>';
		print '<p>Change Your MailChimp API Key: ';
	}
?>

<input type="text" name="api_key" size="45" /></p>
<div class="submit"><input type="submit" class="button-primary" name="save_api_key" value="Save API Key" /></div>

<div class="clear"></div>
</div>
</div>

<div id="mailchimp_lists" class="postbox" style="width:450px">
<h3 class='hndle'><span>Mailing List Management</span></h3>
<div class="inside">

<?php
if ( !empty( $apiKey ) )
{
	// Create an object to interface with MailChimp
	$api = new MCAPI_13( $apiKey );

	// This array holds the lists that have been selected
	$listArray = array();

	//
	//	Options for managing mailing lists
	//

	$myLists = $api->lists();

	if ( null != $myLists )
	{
		$list_id = -1;

		// See if the user has selected some lists
		$selectedLists = get_option( WP88_MC_LISTS );

		// Put all of the selected lists into an array to search later
		$listArray = preg_split( '/[\s,]+/', $selectedLists );

		print '<p><strong>1) Which mailing lists would you like to update?</strong></p>';
		foreach ( $myLists['data'] as $list )
		{
			$listName = $list['name'];
			$list_id = $list['id'];

			// Form this plugin's ID for the list (so it's searchable!)
			$searchableListID = WP88_SEARCHABLE_PREFIX . $list_id;

			// See if this mailing list should be selected
			$selected = array_search( $searchableListID, $listArray );

			// Generate a checkbox here (checked if this list was selected previously)
			print "<p><input type=CHECKBOX value=\"$searchableListID\" name=\"$searchableListID\" ";
			if ( false === $selected ){} else
				print 'checked';
			print "> $listName</p>";
		}

		// Now add options for when to update the mailing list (add, delete, update)
		$onAddSubscriber = get_option( WP88_MC_ADD );
		$onDeleteSubscriber = get_option( WP88_MC_DELETE );
		$onUpdateSubscriber = get_option( WP88_MC_UPDATE );
		$onBypassOptIn = get_option( WP88_MC_BYPASS_OPT_IN );

		print '<p><strong>2) When would you like to update your selected Mailing Lists?</strong></p>';

		print '<p><input type=CHECKBOX value="on_add_subscriber" name="on_add_subscriber" ';
		if ( '0' === $onAddSubscriber ){} else
			print 'checked';
		print '> When a user subscribes <em>(Adds the user to your mailing list)</em></p>';

		print '<p><fieldset style="margin-left: 20px;"><input type=CHECKBOX value="on_bypass_opt_in" name="on_bypass_opt_in" ';
		if ( '1' === $onBypassOptIn )
			print 'checked';
		print '> Bypass the MailChimp double opt-in.  New registrants will <em>not</em> recieve confirmation emails from MailChimp. <em>(MailChimp <a target="_blank" href="http://www.mailchimp.com/kb/article/how-does-confirmed-optin-or-double-optin-work">does not recommend</a> abusing this so be careful)</em></fieldset></p>';

		print '<p><input type=CHECKBOX value="on_delete_subscriber" name="on_delete_subscriber" ';
		if ( '0' === $onDeleteSubscriber ){} else
			print 'checked';
		print '> When a user leaves your site <em>(Unsubscribes the user from your mailing list)</em></p>';

		print '<p><input type=CHECKBOX value="on_update_subscriber" name="on_update_subscriber" ';
		if ( '0' === $onUpdateSubscriber ){} else
			print 'checked';
		print '> When a user updates his information <em>(Syncs the user with your mailing list)</em></p>';

		print '<p><strong>3) What additional WordPress user information do you want to sync with MailChimp?</strong></p>';
		print '<p><em>First name, last name, and email are always synchronized.</em></p>';
		print '<p>Use the following table to assign your WordPress User Fields to your MailChimp fields.  <strong>Tip:</strong> You can use the "Static Text" field at the bottom to assign the same value to each new user which will distinguish users from your site from users from other locations.</p>';

		//
		// START: 	Generate a list of controls here for basic WordPress user fields
		//			(besides first and last name).
		//

		// Hold table output here
		$output = '';

		// NOTE:  This just takes the FIRST selected list!  Multiple selected lists
		// will just not work.
		$list = $listArray[ 0 ];
		// Strip out the searchable tag
		$list = substr_replace( $list, '', 0, strlen( WP88_SEARCHABLE_PREFIX ) );
		$mergeVars = AC_FetchMailChimpMergeVars( $api, $list );
		if ( empty( $mergeVars ) )
			print "<p><em><strong>Problem: </strong>AutoChimp could not retrieve your MailChimp Merge Variables. Try saving your selected mailing list again.</em></p>";

		global $wpUserDataArray;
		foreach( $wpUserDataArray as $userField )
		{
			$fieldNameTag = AC_EncodeUserOptionName( WP88_WORDPRESS_FIELD_MAPPING, $userField );
			$selectBox = AC_GenerateFieldSelectBox( $fieldNameTag, $mergeVars );
			$output .= '<tr class="alternate">' . PHP_EOL . '<td width="70%">' . $userField . '</td>' . PHP_EOL . '<td width="30%">' . $selectBox . '</td>' . PHP_EOL . '</tr>' . PHP_EOL;
		}

		// This static field used to belong to the BuddyPress Sync UI, but has since
		// been moved to the main UI.  It's still represented by a DB value that makes
		// it look like it belongs to BuddyPress, so heads up.
		$selectBox = AC_GenerateFieldSelectBox( WP88_MC_STATIC_FIELD, $mergeVars );
		$output .= '<tr class="alternate"><td width="70%">Static Text:<input type="text" name="static_select" value="' . $staticText . '"size="18" /></td><td width="30%">' . $selectBox . '</td></tr>';

		// Generate the table now
		$tableText .= '<div id=\'filelist\'>' . PHP_EOL;
		$tableText .= '<table class="widefat" style="width:425px">
				<thead>
				<tr>
					<th scope="col">WordPress User Field:</th>
					<th scope="col">Assign to MailChimp Field:</th>
				</tr>
				</thead>' . PHP_EOL;
		$tableText .= $output;
		$tableText .= '</table>' . PHP_EOL . '</div>' . PHP_EOL;
		print $tableText;
		//
		// END:	Generate a list of controls
		//

		// Show the user the last message
		$lastMessage = get_option( WP88_MC_LAST_MAIL_LIST_ERROR );
		if ( empty( $lastMessage ) )
			$lastMessage = 'No mailing list activity yet.';
		print "<p><strong>Latest mailing list activity:</strong>  <em>$lastMessage</em></p>";
?>
		<p>You can also perform a <em>manual</em> sync with your existing user base.  This is recommended only once to bring existing users in sync.  After you've synchronized your users, and you use AutoChimp to keep your users in sync, you should not need to do this again.  <strong>Note: </strong>Depending on how many users you have, this could take a while.  Please be patient.</p>
		<div class="submit"><input type="submit" name="sync_existing_users" value="Sync Existing Users" /></div>
		<div class="submit"><input type="submit" name="save_autochimp_options" class="button-primary" value="Save Options" /></div>
<?php
	}
	else
	{
		print '<p><em>Unable to retrieve your lists with this key!</em>  Did you paste it in correctly?  If so, make sure you\'re connected to the internet and not working offline.</p>';
	}

	//
	//	Option for creating campaigns from posts
	//

	// Load the options from the DB
	$campaignFromPost = get_option( WP88_MC_CAMPAIGN_FROM_POST );
	$campaignCategory = get_option( WP88_MC_CAMPAIGN_CATEGORY );
	$createOnce = get_option( WP88_MC_CREATE_CAMPAIGN_ONCE );
	$sendNow = get_option( WP88_MC_SEND_NOW );
	$fixRegPlus = get_option( WP88_MC_FIX_REGPLUS );
	$fixRegPlusRedux = get_option( WP88_MC_FIX_REGPLUSREDUX );

	// If $createOnce isn't set, default to "1"
	if ( 0 == strlen( $createOnce ) )
	{
		$createOnce = '1';
		update_option( WP88_MC_CREATE_CAMPAIGN_ONCE, $createOnce );
	}

	// For running the first time, make sure the default category is selected
	if ( empty( $campaignCategory ) )
		$campaignCategory = AC_DEFAULT_CATEGORY;

?>

<div class="clear"></div>
</div>
</div>

<div id="mailchimp_campaigns" class="postbox">
<h3 class='hndle'><span>Mail Campaigns from Posts</span></h3>
<div class="inside">

<?php
	print '<p><input type=CHECKBOX value="on_campaign_from_post" name="on_campaign_from_post" ';
	if ( '0' === $campaignFromPost || empty( $campaignFromPost ) ){} else
		print 'checked';
	print '> Create campaigns from posts. The campaign will be created for each of the mailing lists you selected above.</p>';

	print '<p>';
	print 'Choose a category to create campaigns from: ';

	// Generate a category combo box

	// Fetch this site's categories
	$category_args=array(	'orderby' => 'name',
	  						'order' => 'ASC',
	  						'hide_empty' => 0 );
	$categories=get_categories( $category_args );

	// Add the default category first, and select it if necessary.
	$selText = ( AC_DEFAULT_CATEGORY == $campaignCategory ) ? 'selected>' : '>';
	print '<select name="campaign_category"><option ' . $selText . AC_DEFAULT_CATEGORY . '</option>';

	// Loop through each category and add them to the combo box
	foreach($categories as $category)
	{
		// See if the category needs to be selected
		$selText = ( $category->name == $campaignCategory ) ? 'selected>' : '>';
		print '<option ' .  $selText . $category->name . '</option>';
	}

	print '</select></p>';

	// Create a checkbox asking the user if they want to send campaigns right away
	print '<p><input type=CHECKBOX value="on_send_now" name="on_send_now" ';
	if ( '0' === $sendNow || empty( $sendNow ) ){} else
		print 'checked';
	print '> Send campaign <em>as soon as</em> a post is published. Not checking this option will save a draft version of your new MailChimp campaign.</p>';

	// Create a checkbox asking the user if they want to suppress additional campaigns when posts are updated
	print '<p><input type=CHECKBOX value="on_create_once" name="on_create_once" ';
	if ( '0' === $createOnce || empty( $createOnce ) ){} else
		print 'checked';
	print '> Create a campaign only once. Not checking this option will create an additional campaign each time you update your post. <em>Recommended <strong>ON</strong></em></p>';

	// Show the user the last message
	$lastMessage = get_option( WP88_MC_LAST_CAMPAIGN_ERROR );
	if ( empty( $lastMessage ) )
		$lastMessage = 'No campaign activity yet.';

	print "<p><strong>Latest campaign activity:</strong>  <em>$lastMessage</em></p>";
?>
<div class="submit"><input type="submit" name="save_autochimp_options" class="button-primary" value="Save Options" /></div>

<div class="clear"></div>
</div>
</div>

<div id="mailchimp_plugin_integration" class="postbox">
<h3 class='hndle'><span>External Plugin Integration and Synchronization</span></h3>
<div class="inside">

<?php
	print '<p>AutoChimp provides integration and bux fixes for other plugins. If you are using any of these plugins, they will be listed here:</p>';

	if ( class_exists( 'RegisterPlusPlugin' ) )
	{
		print '<p><strong>You are using <a target="_blank" href="http://wordpress.org/extend/plugins/register-plus/">Register Plus</a></strong> which has a known issue preventing first and last name being synchronized with MailChimp. <em>AutoChimp can fix this</em>.</p>';
		print '<fieldset style="margin-left: 20px;">';
		print '<p><input type=CHECKBOX value="on_fix_regplus" name="on_fix_regplus" ';
		if ( '1' === $fixRegPlus )
			print "checked";
		print '> Patch Register Plus and sync first/last name with your selected mailing list. <em>Recommended <strong>ON</strong></em>.</p>';
		print '<p><em>News:</em> The Register Plus Redux version 3.7.0 will also fix this; please delete Register Plus and install <a href="http://wordpress.org/extend/plugins/register-plus-redux/" target="_blank">Register Plus Redux</a>.  More info can be found <a href="http://radiok.info/blog/conflicts-begone/" target="_blank">here</a>.</p>';
		print '</fieldset>';
	}

	if ( class_exists( 'RegisterPlusReduxPlugin' ) )
	{
		print '<p><strong>You are using <a target="_blank" href="http://wordpress.org/extend/plugins/register-plus-redux/">Register Plus Redux</a></strong> which has a known issue preventing first and last name being synchronized with MailChimp. <em>AutoChimp can fix this</em>.</p>';
		print '<fieldset style="margin-left: 20px;">';
		print "<p><input type=CHECKBOX value=\"on_fix_regplusredux\" name=\"on_fix_regplusredux\" ";
		if ( '1' === $fixRegPlusRedux )
			print "checked";
		print '> Patch Register Plus Redux and sync first/last name with your selected mailing list. <em>Recommended <strong>ON</strong></em>. <strong>Note:</strong> You must enable "<em>Require new users enter a password during registration...</em>" in your Register Plus Redux options in order for the AutoChimp patch to work.</p>';
		print '<p><em>News:</em> Register Plus Redux version 3.7.0 will fix this; please upgrade to that version when it\'s available.  More info can be found <a href="http://radiok.info/blog/conflicts-begone/" target="_blank">here</a>.</p>';
		print '</fieldset>';
	}

	if ( function_exists( 'AC_ShowBuddyPressUI' ) )
	{
		// NOTE:  This just takes the FIRST selected list!  Multiple selected lists
		// will just not work.
		$list = $listArray[ 0 ];
		// Strip out the searchable tag
		$list = substr_replace( $list, '', 0, strlen( WP88_SEARCHABLE_PREFIX ) );
		// Special function just for BuddyPress
		AC_ShowBuddyPressUI( $api, $list );
	}
?>

<div class="submit"><input type="submit" name="save_autochimp_options" class="button-primary" value="Save Options" /></div>

<div class="clear"></div>
</div>
</div>

<?php
}
?>

</form>

</div>
</div>
</div>
</div>
