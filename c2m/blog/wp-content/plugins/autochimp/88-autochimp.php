<?php
/*
Plugin Name: AutoChimp
Plugin URI: http://www.wandererllc.com/company/plugins/autochimp/
Description: Keeps MailChimp mailing lists in sync with your WordPress site.  It also leverages BuddyPress and allows you to synchronize all of your profile fields.  Gives users the ability to create MailChimp mail campaigns from blog posts.
Author: Wanderer LLC Dev Team
Version: 1.10
*/

if ( !class_exists( 'MCAPI_13' ) )
{
	require_once 'inc/MCAPI.class.php';
}

define( "WP88_MC_APIKEY", "wp88_mc_apikey" );
define( "WP88_MC_LISTS", "wp88_mc_selectedlists" );
define( "WP88_MC_ADD", "wp88_mc_add" );
define( "WP88_MC_DELETE", "wp88_mc_delete" );
define( "WP88_MC_UPDATE", "wp88_mc_update" );
define( 'WP88_MC_BYPASS_OPT_IN', 'wp88_mc_bypass_opt_in' );
define( "WP88_MC_TEMPEMAIL", "wp88_mc_tempemail" );
define( "WP88_MC_CAMPAIGN_FROM_POST", "wp88_mc_campaign_from_post" );
define( "WP88_MC_CAMPAIGN_CATEGORY", "wp88_mc_campaign_category" );
define( "WP88_MC_CREATE_CAMPAIGN_ONCE", "wp88_mc_create_campaign_once" );
define( "WP88_MC_SEND_NOW", "wp88_mc_send_now" );
define( "WP88_MC_LAST_CAMPAIGN_ERROR", "wp88_mc_last_error" );
define( "WP88_MC_LAST_MAIL_LIST_ERROR", "wp88_mc_last_ml_error" );
define( "WP88_MC_CAMPAIGN_CREATED", "wp88_mc_campaign" );
define( 'WP88_MC_FIX_REGPLUS', 'wp88_mc_fix_regplus' );
define( 'WP88_MC_FIX_REGPLUSREDUX', 'wp88_mc_fix_regplusredux' );
define( 'WP88_MC_SYNC_BUDDYPRESS', 'wp88_mc_sync_buddypress' );
// NOTE: The following two static defines shouldn't have anything to do with
// BuddyPress, but they do; they were introduced when the BuddyPress sync feature
// was written.  But, remember, these are always used regardless of additional
// plugins that are used.
define( 'WP88_MC_STATIC_TEXT', 'wp88_mc_bp_static_text' );
define( 'WP88_MC_STATIC_FIELD', 'wp88_mc_bp_static_field' );

define( "AC_DEFAULT_CATEGORY", "Any category" );

define( 'MMU_ADD', 1 );
define( 'MMU_DELETE', 2 );
define( 'MMU_UPDATE', 3 );

define( 'WP88_SEARCHABLE_PREFIX', 'wp88_mc' );
define( 'WP88_WORDPRESS_FIELD_MAPPING', 'wp88_mc_wp_f_' );
define( 'WP88_BP_XPROFILE_FIELD_MAPPING', 'wp88_mc_bp_xpf_' );
define( 'WP88_IGNORE_FIELD_TEXT', 'Ignore this field' );
define( 'WP88_GROUPINGS_TEXT', 'GROUPINGS' );
define( 'WP88_FIELD_DELIMITER', '+++' );

// Global variables - If you change this, be sure to see AC_FetchMappedWordPressData()
// which has static comparisons to the values in this array.  FIX LATER.
$wpUserDataArray = array( 'Username', 'Nickname', 'Website', 'Bio' , /*'AIM', 'Yahoo IM', 'Jabber-Google Chat'*/ );

//
//	Actions to hook to allow AutoChimp to do it's work
//
//	See:  http://codex.wordpress.org/Plugin_API/Action_Reference
//
add_action('admin_menu', 'AC_OnPluginMenu');				// Sets up the menu and admin page
add_action('user_register','AC_OnRegisterUser');			// Called when a user registers on the site
add_action('delete_user','AC_OnDeleteUser');				//   "      "  "  "   unregisters "  "  "
add_action('show_user_profile','AC_OnAboutToUpdateUser');	// Little trickier for update...need to save email in order to track them down later
add_action('profile_update','AC_OnUpdateUser' );			// Uses the saved email to update the user.
add_action('publish_post','AC_OnPublishPost' );				// Called when an author publishes a post.
add_action('xmlrpc_publish_post', 'AC_OnPublishPost' );		// Same as above, but for XMLRPC
add_action('publish_phone', 'AC_OnPublishPost' );			// Same as above, but for email.  No idea why it's called "phone".
add_action('bp_init', 'AC_OnBuddyPressInstalled');			// Only load the component if BuddyPress is loaded and initialized.
add_action('xprofile_updated_profile', 'AC_OnBuddyPressUserUpdate' ); // Used to sync users with MailChimp
//add_action('xprofile_screen_edit_profile', 'OnBuddyPressUserScreenUpdate' );

//
//	AC_OnBuddyPressInstalled
//
//	Called when BuddyPress is installed and active
//
function AC_OnBuddyPressInstalled()
{
	require_once('buddypress_integration.php');
}

//
//	AC_OnBuddyPressUserUpdate
//
//	Called when a BP user updates his profile.  This is used to update
//	MailChimp Merge Variables.
//
function AC_OnBuddyPressUserUpdate()
{
	// Get the current user
	$user = wp_get_current_user();
	// Pass their ID to the function that does the work.
	AC_OnUpdateUser( $user->ID );
}

//
//	START Register Plus AND Register Plus Redux Workaround
//
//	Register Plus overrides this:
//	http://codex.wordpress.org/Function_Reference/wp_new_user_notification
//
//	Look at register-plus.php somewhere around line 1715.  Same thing in
//	register-plus-redux.php around line 2324. More on Pluggable functions
//	can be found here:  http://codex.wordpress.org/Pluggable_Functions
//
//	Register Plus's overridden wp_new_user_notification() naturally includes the
//	original WordPress code for wp_new_user_notification().  This function calls
//	wp_set_password() after it sets user meta data.  This, as far as I can tell,
//	is the only place we can hook WordPress to update the user's MailChimp mailing
//	list with the user's first and last names.  NOTE:  This is a strange and non-
//	standard place for Register Plus to write the user's meta information.  Other
//	plugins like Wishlist Membership work with AutoChimp right out of the box.
//	This hack is strictly to make AutoChimp work with the misbehaving Register Plus.
//
//	The danger with this sort of code is that if the function that is overridden
//	is updated by WordPress, we'll likely miss out!  The best solution is to
//	have Register Plus perform it's work in a more standard way.
//
//	See the readme for more information on this issue.  The good news is the folks
//	at Register Plus explained this problem and are working on fixing it.
//
function AC_OverrideWarning()
{
	if( current_user_can(10) &&  $_GET['page'] == 'autochimp' )
		echo '<div id="message" class="updated fade"><p><strong>You have another plugin installed that is conflicting with AutoChimp and Register Plus.  This other plugin is overriding the user notification emails or password setting.  Please see <a href="http://www.wandererllc.com/plugins/autochimp/">AutoChimp FAQ</a> for more information.</strong></p></div>';
}

if ( function_exists( 'wp_set_password' ) )
{
	// Check if the user wants to patch
	$fixRegPlus = get_option( WP88_MC_FIX_REGPLUS );
	$fixRegPlusRedux = get_option( WP88_MC_FIX_REGPLUSREDUX );
	if ( '1' === $fixRegPlus || '1' === $fixRegPlusRedux )
	{
		add_action( 'admin_notices', 'AC_OverrideWarning' );
	}
}

//
// Override wp_set_password() which is called by Register Plus's overridden
// pluggable function - the only place I can see to grab the user's first
// and last name.
//
if ( !function_exists('wp_set_password') && ( '1' === get_option( WP88_MC_FIX_REGPLUS ) ||
											  '1' === get_option( WP88_MC_FIX_REGPLUSREDUX ) ) ) :
function wp_set_password( $password, $user_id )
{
	//
	// START original WordPress code
	//
	global $wpdb;

	$hash = wp_hash_password($password);
	$wpdb->update($wpdb->users, array('user_pass' => $hash, 'user_activation_key' => ''), array('ID' => $user_id) );

	wp_cache_delete($user_id, 'users');
	//
	// END original WordPress code
	//

	//
	// START Detect Register Plus
	//

	// Clear out any cached email
	update_option( AC_GenerateTempEmailOptionName( $user_id ), "" );
	// Write some basic info to the DB about the user being added
	$user_info = get_userdata( $user_id );
	update_option( WP88_MC_LAST_CAMPAIGN_ERROR, "Updating user:  $user_info->first_name $user_info->last_name" );
	// Do the real work
	AC_ManageMailUser( MMU_ADD, $user_info, TRUE );

	//
	// END Detect
	//
}
endif;	// wp_set_password is not overridden yet

//
// 	END Register Plus Workaround
//

//
//	Filters to hook
//
add_filter( 'plugin_row_meta', 'AC_AddAutoChimpPluginLinks', 10, 2 ); // Expand the links on the plugins page

//
//	Function to create the menu and admin page handler
//
function AC_OnPluginMenu()
{
	add_submenu_page('options-general.php', 'AutoChimp Options', 'AutoChimp', 'add_users', basename(__FILE__), AC_AutoChimpOptions );
}

// Inspired by NextGen Gallery by Alex Rabe
function AC_AddAutoChimpPluginLinks($links, $file)
{
	if ( $file == plugin_basename(__FILE__) )
	{
		$links[] = '<a href="http://wordpress.org/extend/plugins/autochimp/">' . __('Overview', 'autochimp') . '</a>';
		$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HPCPB3GY5LUQW&lc=US">' . __('Donate', 'autochimp') . '</a>';
	}
	return $links;
}

//
//	This function is responsible for displaying the AutoChimp admin panel.  That
//	happens at the very bottom, with the require statement.  The rest of the code
//	is for saving the options.
//
function AC_AutoChimpOptions()
{
	// Stop the user if they don't have permission
	if (!current_user_can('add_users'))
	{
    	wp_die( __('You do not have sufficient permissions to access this page.') );
  	}

	// If the upload_files POST option is set, then files are being uploaded
	if ( isset( $_POST['save_api_key'] ) )
	{
		// Security check
		check_admin_referer( 'mailchimpz-nonce' );

		$newAPIKey = $_POST['api_key'];

		// Update the database
		update_option( WP88_MC_APIKEY, $newAPIKey );

		// Tell the user
		print '<div id="message" class="updated fade"><p>Successfully saved your API Key!</p></div>';
	}

	// Save off the autochimp options here
	if ( isset( $_POST['save_autochimp_options'] ) )
	{
		// Security check
		check_admin_referer( 'mailchimpz-nonce' );

		// Step 1:  Save the mailing lists that the user wants to affect

		// Declare an empty string...add stuff later
		$selectionOption = "";

		// Go through here and generate the option - a list of mailing list IDs separated by commas
		foreach( $_POST as $postVar )
		{
			$pos = strpos( $postVar, WP88_SEARCHABLE_PREFIX );
			if ( false === $pos ){}
			else
			{
				$selectionOption .= $postVar . ",";
			}
		}

		// Update the database
		update_option( WP88_MC_LISTS, $selectionOption );

		// Tell the user
		print '<div id="message" class="updated fade"><p>Successfully saved your AutoChimp options!</p></div>';

		// Step 2:  Save when the user wants to update the list

		if ( isset( $_POST['on_add_subscriber'] ) )
			update_option( WP88_MC_ADD, '1' );
		else
			update_option( WP88_MC_ADD, '0' );

		if ( isset( $_POST['on_bypass_opt_in'] ) )
			update_option( WP88_MC_BYPASS_OPT_IN, '1' );
		else
			update_option( WP88_MC_BYPASS_OPT_IN, '0' );

		if ( isset( $_POST['on_delete_subscriber'] ) )
			update_option( WP88_MC_DELETE, '1' );
		else
			update_option( WP88_MC_DELETE, '0' );

		if ( isset( $_POST['on_update_subscriber'] ) )
			update_option( WP88_MC_UPDATE, '1' );
		else
			update_option( WP88_MC_UPDATE, '0' );

		// Step 3:  Save the extra WordPress fields that the user wants to sync.
		global $wpUserDataArray;
		foreach( $wpUserDataArray as $userField )
		{
			// Encode the name of the field
			$fieldName = AC_EncodeUserOptionName( WP88_WORDPRESS_FIELD_MAPPING, $userField );

			// Now dereference the selection
			$fieldData = $_POST[ $fieldName ];

			// Save the selection
			update_option( $fieldName, $fieldData );
		}

		// Now save the special static field and the mapping
		$staticText = $_POST[ 'static_select' ];
		update_option( WP88_MC_STATIC_TEXT, $staticText );
		update_option( WP88_MC_STATIC_FIELD, $_POST[ WP88_MC_STATIC_FIELD ] );

		// Step 4:  Save the user's campaign-from-post choices

		if ( isset( $_POST['on_campaign_from_post'] ) )
			update_option( WP88_MC_CAMPAIGN_FROM_POST, '1' );
		else
			update_option( WP88_MC_CAMPAIGN_FROM_POST, '0' );

		if ( isset( $_POST['on_send_now'] ) )
			update_option( WP88_MC_SEND_NOW, '1' );
		else
			update_option( WP88_MC_SEND_NOW, '0' );

		if ( isset( $_POST['on_create_once'] ) )
			update_option( WP88_MC_CREATE_CAMPAIGN_ONCE, '1' );
		else
			update_option( WP88_MC_CREATE_CAMPAIGN_ONCE, '0' );

		$category = $_POST['campaign_category'];
		update_option( WP88_MC_CAMPAIGN_CATEGORY, $category );

		// Step 5:  Save other plugin integration choices

		if ( isset( $_POST['on_fix_regplus'] ) )
			update_option( WP88_MC_FIX_REGPLUS, '1' );
		else
			update_option( WP88_MC_FIX_REGPLUS, '0' );

		if ( isset( $_POST['on_fix_regplusredux'] ) )
			update_option( WP88_MC_FIX_REGPLUSREDUX, '1' );
		else
			update_option( WP88_MC_FIX_REGPLUSREDUX, '0' );

		if ( isset( $_POST['on_sync_buddypress'] ) )
			update_option( WP88_MC_SYNC_BUDDYPRESS, '1' );
		else
			update_option( WP88_MC_SYNC_BUDDYPRESS, '0' );

		// This hidden field allows the user to save their mappings even when the
		// sync button isn't checked
		if ( isset( $_POST['buddypress_running'] ) )
		{
			//
			// Save the mappings of BuddyPress XProfile fields to MailChimp Merge Vars
			//

			// Each XProfile field will have a select box selection assigned to it.
			// Save this selection.
			global $wpdb;
			$fields = $wpdb->get_results( "SELECT name,type FROM wp_bp_xprofile_fields WHERE type != 'option'", ARRAY_A );

			foreach( $fields as $field )
			{
				// Encode the name of the field
				$selectName = AC_EncodeUserOptionName( WP88_BP_XPROFILE_FIELD_MAPPING, $field['name'] );

				// Now dereference the selection
				$selection = $_POST[ $selectName ];

				// Save the selection
				update_option( $selectName, $selection );
			}
		}
	}

	if ( isset( $_POST['sync_existing_users'] ) )
	{
		$numSuccess = 0;
		$numFailed = 0;
		$message = "";

		// Get a list of users on this site.
		$users = get_users_of_blog();

		// Iterate over the array and retrieve that users' basic information.
		foreach ( $users as $user )
		{
			$result = AC_OnUpdateUser( $user->ID, FALSE );
			if ( 0 === $result )
				$numSuccess++;
			else
			{
				$numFailed++;
	    		$message .= "(User ID: $user->ID, Error: $result), ";
			}
		}
		// Tell the user that all is well
		print '<div id="message" class="updated fade"><p>Successfully syncronized '. $numSuccess .' MailChimp users. ' . $numFailed . ' <strong>failed</strong>.  Failure Details: ' . $message . 'If needed, you can look up error codes <a target="_blank" href="http://www.mailchimp.com/api/1.3/exceptions.field.php">here</a>.</p></div>';
	}

	// The file that will handle uploads is this one (see the "if" above)
	$action_url = $_SERVER['REQUEST_URI'];
	require_once '88-autochimp-settings.php';
}

//
//	Syncs a single user of this site with the options that the site owner has
//	selected in the admin panel.
//
//	List of exceptions and error codes: http://www.mailchimp.com/api/1.3/exceptions.field.php
//
function AC_ManageMailUser( $mode, $user_info, $writeDBMessages )
{
	$apiKey = get_option( WP88_MC_APIKEY );
	$api = new MCAPI_13( $apiKey );

	$myLists = $api->lists();
	$errorCode = 0;

	if ( null != $myLists )
	{
		$list_id = -1;

		// See if the user has selected some lists
		$selectedLists = get_option( WP88_MC_LISTS );

		// Put all of the selected lists into an array to search later
		$valuesArray = array();
		$valuesArray = preg_split( "/[\s,]+/", $selectedLists );

		foreach ( $myLists['data'] as $list )
		{
			$list_id = $list['id'];

			// See if this mailing list should be selected
			foreach( $valuesArray as $searchableID )
			{
				$pos = strpos( $searchableID, $list_id );
				if ( false === $pos ){}
				else
				{
					// First and last names are always added.  NOTE:  Email is only
					// managed when a user is updating info 'cause email is used as
					// the key when adding a new user.
					$merge_vars = array( 'FNAME'=>$user_info->first_name, 'LNAME'=>$user_info->last_name );

					// Grab the extra WP user info
					$data = AC_FetchMappedWordPressData( $user_info->ID );
					// Add that info into the merge array.
					AC_AddUserFieldsToMergeArray( $merge_vars, $data );

					// Grab extra data if the user wants to Sync Buddy Press
					$syncBuddyPress = get_option( WP88_MC_SYNC_BUDDYPRESS );
					if ( "1" === $syncBuddyPress )
					{
						// Hunt down Buddy Press user data.
						$data = AC_FetchMappedXProfileData( $user_info->ID );
						// Add BuddyPress's data into the merge array
						AC_AddUserFieldsToMergeArray( $merge_vars, $data );
					}

					// This one gets static data...add it as well to the array.
					$data = AC_FetchStaticData();
					// Add that info into the merge array.
					AC_AddUserFieldsToMergeArray( $merge_vars, $data );

					switch( $mode )
					{
						case MMU_ADD:
						{
							// Check to see if the site wishes to bypass the double opt-in feature
							$doubleOptIn = ( 0 === strcmp( '1', get_option( WP88_MC_BYPASS_OPT_IN ) ) ) ? false : true;
							$retval = $api->listSubscribe( $list_id, $user_info->user_email, $merge_vars, 'html', $doubleOptIn );
							if ( $api->errorCode )
							{
								$errorCode = $api->errorCode;

								if ( FALSE != $writeDBMessages )
								{
									// Set latest activity - displayed in the admin panel
									$errorString = "Problem adding $user_info->first_name $user_info->last_name ('$user_info->user_email') to list $list_id.  Error Code: $errorCode, Message: $api->errorMessage, Data: ";
									$errorString .= print_r( $merge_vars, TRUE );
									update_option( WP88_MC_LAST_MAIL_LIST_ERROR, $errorString );
								}
							}
							else
							{
								if ( FALSE != $writeDBMessages )
									update_option( WP88_MC_LAST_MAIL_LIST_ERROR, "Added $user_info->first_name $user_info->last_name ('$user_info->user_email') to list $list_id." );
							}
							break;
						}
						case MMU_DELETE:
						{
							update_option( WP88_MC_LAST_MAIL_LIST_ERROR, $lastMessage );
							// By default this sends a goodbye email and fires off a notification to the list owner
							$retval = $api->listUnsubscribe( $list_id, $user_info->user_email );
							if ( $api->errorCode )
							{
								$errorCode = $api->errorCode;

								if ( FALSE != $writeDBMessages )
								{
									// Set latest activity - displayed in the admin panel
									update_option( WP88_MC_LAST_MAIL_LIST_ERROR, "Problem removing $user_info->first_name $user_info->last_name ('$user_info->user_email') from list $list_id.  Error Code: $errorCode, Message: $api->errorMessage" );
								}
							}
							else
							{
								if ( FALSE != $writeDBMessages )
									update_option( WP88_MC_LAST_MAIL_LIST_ERROR, "Removed $user_info->first_name $user_info->last_name ('$user_info->user_email') from list $list_id." );
							}
							break;
						}
						case MMU_UPDATE:
						{
							// Get the old email - this feels a little dangerous...'cause users have to go
							// through the profile panel.  If they don't and email is updated, data can
							// get out of sync.  See the readme.txt for more.
							$updateEmail = get_option( AC_GenerateTempEmailOptionName( $user_info->ID ) );

							// If this email is empty, then it means that some method other than viewing
							// the admin panel has invoked the update - another plugin like "Register
							// Plus", for instance.  In that case, there is no danger in the email getting
							// out of sync so AutoChimp can use the original email.
							if ( strlen( $updateEmail ) == 0 )
								$updateEmail = $user_info->user_email;

							// Potential update to the email address (more likely than name!)
							$merge_vars['EMAIL'] = $user_info->user_email;

							// No emails are sent after a successful call to this function.
							$retval = $api->listUpdateMember( $list_id, $updateEmail, $merge_vars );
							if ( $api->errorCode )
							{
								$errorCode = $api->errorCode;
								if ( FALSE != $writeDBMessages )
								{
									// Set latest activity - displayed in the admin panel
									$errorString = "Problem updating $user_info->first_name $user_info->last_name ('$user_info->user_email') from list $list_id.  Error Code: $errorCode, Message: $api->errorMessage, Data: ";
									$errorString .= print_r( $merge_vars, TRUE );
									update_option( WP88_MC_LAST_MAIL_LIST_ERROR, $errorString );
								}
							}
							else
							{
								if ( FALSE != $writeDBMessages )
								{
									$errorString = "Updated $user_info->first_name $user_info->last_name ('$user_info->user_email') from list $list_id.  Data: ";
									$errorString .= print_r( $merge_vars, TRUE );
									update_option( WP88_MC_LAST_MAIL_LIST_ERROR, $errorString );
								}
							}
							break;
						}
					}
				}
			}
		}
	}
	return $errorCode;
}

//
//	Given a post ID, creates a MailChimp campaign.  Returns STRING "-1" if the
//	creation was skipped, "0" on failure, and a legit ID on success.  Except for
//	"-1", each return point will write the latest result of the function to the
//	DB which will be visible to the user in the admin page.
//
//	Pass the post ID and an instance of the MailChimp API class (for performance).
//
function AC_CreateCampaignFromPost( $postID, $api )
{
	$myLists = $api->lists();

	if ( NULL != $myLists )
	{
		$list_id = -1;

		// See if the user has selected some lists
		$selectedLists = get_option( WP88_MC_LISTS );

		// Does the user only want to create campaigns once?
		if ( '1' == get_option( WP88_MC_CREATE_CAMPAIGN_ONCE ) )
		{
			if ( '1' == get_post_meta( $postID, WP88_MC_CAMPAIGN_CREATED, true ) )
				return '-1';	// Don't create the campaign again!
		}

		// Get the info on this post
		$post = get_post( $postID );

		// If the post is somehow in an unsupported state (sometimes from email
		// posts), then just skip the post.
		if ('pending' == $post->post_status ||
			'draft' == $post->post_status ||
			'private' == $post->post_status )
		{
			return '-1'; // Don't create the campaign yet.
		}

		// Put all of the selected lists into an array to search later
		$valuesArray = array();
		$valuesArray = preg_split( "/[\s,]+/", $selectedLists );

		foreach ( $myLists['data'] as $list )
		{
			$list_id = $list['id'];

			// See if this mailing list should have a campaign created for it
			foreach( $valuesArray as $searchableID )
			{
				$pos = strpos( $searchableID, $list_id );
				if ( false === $pos ){}
				else
				{
					// Time to start creating the campaign...
					// First, create the options array
					$options = array();
					$options['list_id']	= $list_id;
					$options['subject']	= $post->post_title;
					$options['from_email'] = $list['default_from_email'];
					$options['to_email'] = '*|FNAME|*';
					$options['from_name'] = $list['default_from_name'];
					$options['tracking'] = array('opens' =>	true, 'html_clicks' => true, 'text_clicks' => false );
					$options['authenticate'] = true;

					$postContent = apply_filters( 'the_content', $post->post_content );
					// Potentially an expensive call here to append text
					$permalink = get_permalink( $postID );
					$postContent .= "<p>Read the full story <a href=\"$permalink\">here</a>.</p>";
					$postContent = str_replace( ']]>', ']]&gt;', $postContent );
					$content = array();
					$content['html'] = $postContent;
					$content['text'] = strip_tags( $postContent );

					// More info here:  http://www.mailchimp.com/api/1.2/campaigncreate.func.php
					$result = $api->campaignCreate( 'regular', $options, $content );
					if ($api->errorCode)
					{
						// Set latest activity - displayed in the admin panel
						update_option( WP88_MC_LAST_CAMPAIGN_ERROR, "Problem with campaign with title '$post->post_title'.  Error Code: $api->errorCode, Message: $api->errorMessage" );
						$result = "0";
					}
					else
					{
						// Set latest activity
						update_option( WP88_MC_LAST_CAMPAIGN_ERROR, "Your latest campaign created is titled '$post->post_title' with ID: $result" );

						// Mark this post as having a campaign created from it.
						add_post_meta( $postID, WP88_MC_CAMPAIGN_CREATED, "1" );
					}

					// Done
					return $result;
				}
			}
		}
	}
}

function AC_OnPublishPost( $postID )
{
	// Does the user want to create campaigns from posts
	$campaignFromPost = get_option( WP88_MC_CAMPAIGN_FROM_POST );
	if ( "1" == $campaignFromPost )
	{
		// Get the info on this post
		$post = get_post( $postID );
		$categories = get_the_category( $postID );	// Potentially several categories

		// What category does the user want to use to create campaigns?
		$campaignCategory = get_option( WP88_MC_CAMPAIGN_CATEGORY );

		// If it matches the user's category choice or is any category, then
		// do the work.  This needs to be a loop because a post can belong to
		// multiple categories.
		foreach( $categories as $category )
		{
			if ( $category->name == $campaignCategory || AC_DEFAULT_CATEGORY == $campaignCategory )
			{
				// Create an instance of the MailChimp API
				$apiKey = get_option( WP88_MC_APIKEY );
				$api = new MCAPI_13( $apiKey );

				// Do the work
				$id = AC_CreateCampaignFromPost( $postID, $api );

				// Does the user want to send the campaigns right away?
				$sendNow = get_option( WP88_MC_SEND_NOW );

				// Send it, if necessary (if user wants it), and the $id is
				// sufficiently long (just picking longer than 3 for fun).
				if ( "1" == $sendNow && ( strlen( $id ) > 3 ) )
				{
					$api->campaignSendNow( $id );
				}

				// As soon as the first match is found, break out.
				break;
			}
		}
	}
}

//
//	Given a mailing list, return an associative array of the names and tags of
//	the merge variables (custom fields) for that mailing list.
//
function AC_FetchMailChimpMergeVars( $api, $list_id )
{
	$mergeVars = array();
	$mv = $api->listMergeVars( $list_id );

	// NOTE: It appears this only returns ONE interest group. It also appears that
	// this function has been deprecated in favor of listInterestGroupings(), but
	// the 1.2 include file is not in sync with this new function.
	$ig = $api->listInterestGroupings( $list_id );

	// Bail here if nothing is returned
	if ( NULL == $mv && NULL == $ig )
		return $mergeVars;

	// Copy over the merge variables
	if ( !empty( $mv ) )
	{
		foreach( $mv as $i => $var )
		{
			$mergeVars[ $var['name'] ] = $var['tag'];
		}
	}

	// Copy over the interest groups
	if ( !empty( $ig ) )
	{
		foreach( $ig as $i => $var )
		{
			// Create a special encoding - grouping text, plus delimiter, then the name of the grouping
			$mergeVars[ $var['name'] ] = WP88_GROUPINGS_TEXT . WP88_FIELD_DELIMITER . $var['name'];
		}
	}

	return $mergeVars;
}

//
//	Looks up the user's additional WordPress user data and returns a meaningful
//	array of associations to the users based on what the user wants to sync.
//
function AC_FetchMappedWordPressData( $userID )
{
	// User data array
	$dataArray = array();

	// This global array holds the names of the WordPress user fields
	global $wpUserDataArray;

	// Get this user's data
	$user_info = get_userdata( $userID );

	// Loop through each field that the user wants to sync and hunt down the user's
	// values for those fields and stick them into an array.
	foreach ( $wpUserDataArray as $field )
	{
		// Figure out which MailChimp field to map to
		$optionName = AC_EncodeUserOptionName( WP88_WORDPRESS_FIELD_MAPPING, $field );
		$fieldData = get_option( $optionName );

		// If the mapping is not set, then skip everything and go on to the next field
		if ( 0 !== strcmp( $fieldData, WP88_IGNORE_FIELD_TEXT ) )
		{
			// Now, get the user's data.  Since the data is basically static,
			// this is just a collection of "if"s.
			if ( 0 === strcmp( $field, 'Username' ) )
			{
				$value = $user_info->user_login;
				$dataArray[] = array( 	'name' => $optionName,
										'tag' => $fieldData,
										'value' => $value );
			}
			elseif ( 0 === strcmp( $field, 'Nickname' ) )
			{
				$value = $user_info->user_nicename;
				$dataArray[] = array( 	'name' => $optionName,
										'tag' => $fieldData,
										'value' => $value );
			}
			elseif ( 0 === strcmp( $field, 'Website' ) )
			{
				$value = $user_info->user_url;
				$dataArray[] = array( 	'name' => $optionName,
										'tag' => $fieldData,
										'value' => $value );
			}
			elseif ( 0 === strcmp( $field, 'Bio' ) )
			{
				$value = $user_info->user_description;
				$dataArray[] = array( 	'name' => $optionName,
										'tag' => $fieldData,
										'value' => $value );
			}
			elseif ( 0 === strcmp( $field, 'AIM' ) )
			{
				$value = $user_info->user_description;
				$dataArray[] = array( 	'name' => $optionName,
										'tag' => $fieldData,
										'value' => $value );
			}
			elseif ( 0 === strcmp( $field, 'Yahoo IM' ) )
			{
				$value = $user_info->user_description;
				$dataArray[] = array( 	'name' => $optionName,
										'tag' => $fieldData,
										'value' => $value );
			}
			elseif ( 0 === strcmp( $field, 'Jabber-Google Chat' ) )
			{
				$value = $user_info->user_description;
				$dataArray[] = array( 	'name' => $optionName,
										'tag' => $fieldData,
										'value' => $value );
			}
		}
	}
	return $dataArray;
}

//
//	Looks up the user's BP XProfile data and returns a meaningful array of
//	associations to the users based on what the user wants to sync.
//
function AC_FetchMappedXProfileData( $userID )
{
	// User data array
	$dataArray = array();

	// Need to query data in the BuddyPress extended profile table
	global $wpdb;

	// Now, see which XProfile fields the user wants to sync.
	$sql = "SELECT option_name,option_value FROM wp_options WHERE option_name LIKE '" .
			WP88_BP_XPROFILE_FIELD_MAPPING .
			"%' AND option_value != '" .
			WP88_IGNORE_FIELD_TEXT . "'";
	$fieldNames = $wpdb->get_results( $sql, ARRAY_A );

	// Loop through each field that the user wants to sync and hunt down the user's
	// values for those fields and stick them into an array.
	foreach ( $fieldNames as $field )
	{
		$optionName = AC_DecodeUserOptionName( WP88_BP_XPROFILE_FIELD_MAPPING, $field['option_name'] );

		// Big JOIN to get the user's value for the field in question
		// Best to offload this on SQL than PHP.
		$sql = "SELECT name,value,type FROM wp_bp_xprofile_data JOIN wp_bp_xprofile_fields ON wp_bp_xprofile_fields.id = wp_bp_xprofile_data.field_id WHERE user_id = $userID AND name = '$optionName' LIMIT 1";
		$results = $wpdb->get_results( $sql, ARRAY_A );

		// Populate the data array
		if ( !empty( $results[0] ) )
		{
			$value = $results[0]['value'];

			// Do conversions based on field type

			// First, convert a timestamp to a date
			if ( 0 === strcmp( $results[0]['type'],"datebox" ) )
			{
				$value = date( "Y-m-d", $value );
			}

			// Now convert a checkbox type to a string
			if ( 0 === strcmp( $results[0]['type'],"checkbox" ) )
			{
				$checkboxData = unserialize( $value );
				$value = "";
				foreach( $checkboxData as $item )
				{
					$value .= $item . ',';
				}
				$value = rtrim( $value, ',' );
			}

			$dataArray[] = array( 	"name" => $optionName,
									"tag" => $field['option_value'],
									"value" => $value );
		}
	}
	return $dataArray;
}

function AC_FetchStaticData()
{
	// Will hold a row of static data...assuming user wants this data, of course
	$dataArray = array();

	// Does the user want static data?
	$mapping = get_option( WP88_MC_STATIC_FIELD );

	// If the mapping is set...
	if ( 0 !== strcmp( $mapping, WP88_IGNORE_FIELD_TEXT ) )
	{
		$text = get_option( WP88_MC_STATIC_TEXT );

		if ( !empty( $text ) )
		{
			$dataArray[] = array( 	"name" => WP88_MC_STATIC_FIELD,
									"tag" => $mapping,
									"value" => $text );
		}
	}
	return $dataArray;
}

//
//	Takes a by-reference array argument and adds XProfile merge variable data
//	specific to the user ID passed in to the array.
//
function AC_AddUserFieldsToMergeArray( &$mergeVariables, $data )
{
	// Create a potentially used groupings array.  Tack this on at the end
	$groupingsArray = array();

	// Add this data to the merge variables
	foreach ( $data as $item )
	{
		// Catch the "GROUPINGS" tag and create a special array for that
		$groupTag = strpos( $item['tag'], WP88_GROUPINGS_TEXT );
		if ( FALSE === $groupTag )
		{
			$mergeVariables[ $item['tag'] ] = $item['value'];
		}
		else
		{
			$fields = explode( WP88_FIELD_DELIMITER, $item['tag'] );
			$groupingsArray[] = array('name' => $fields[1],
									'groups' => $item['value'] );
		}
	}

	// Tack on the group array now if there are groupings to add
	if ( !empty( $groupingsArray ) )
	{
		$mergeVariables[ WP88_GROUPINGS_TEXT ] = $groupingsArray;
	}
}

function AC_EncodeUserOptionName( $encodePrefix, $optionName )
{
	// Tack on the prefix to the option name
	$encoded = $encodePrefix . $optionName;

	// Make sure the option name has no spaces; replace them with underscores
	$encoded = str_replace( ' ', '_', $encoded );

	return $encoded;
}

function AC_DecodeUserOptionName( $decodePrefix, $optionName )
{
	// Strip out the searchable tag
	$decoded = substr_replace( $optionName, '', 0, strlen( $decodePrefix ) );

	// Replace understores with spaces
	$decoded = str_replace( '_', ' ', $decoded );

	return $decoded;
}

// This function creates a user-unique email option name used as a field in
// the wp_options table.  This is used to temporarily store the user's email
// address.
function AC_GenerateTempEmailOptionName( $userID )
{
	return WP88_MC_TEMPEMAIL . $userID;
}

//
//	WordPress Action handlers
//

function AC_OnRegisterUser( $userID )
{
	$user_info = get_userdata( $userID );
	$onAddSubscriber = get_option( WP88_MC_ADD );
	if ( "1" == $onAddSubscriber )
	{
		$result = AC_ManageMailUser( MMU_ADD, $user_info, TRUE );
	}
	return $result;
}

function AC_OnDeleteUser( $userID )
{
	$user_info = get_userdata( $userID );
	$onDeleteSubscriber = get_option( WP88_MC_DELETE );
	if ( "1" == $onDeleteSubscriber )
	{
		$result = AC_ManageMailUser( MMU_DELETE, $user_info, TRUE );
	}
	return $result;
}

function AC_OnAboutToUpdateUser( $userID )
{
	$user_info = get_userdata( $userID );
	$onUpdateSubscriber = get_option( WP88_MC_UPDATE );
	if ( "1" == $onUpdateSubscriber )
	{
		$updateEmail = $user_info->user_email;
		$optionName = AC_GenerateTempEmailOptionName( $user_info->ID );
		update_option( $optionName, $updateEmail );
	}
}

function AC_OnUpdateUser( $userID, $writeDBMessages=TRUE )
{
	$user_info = get_userdata( $userID );
	$onUpdateSubscriber = get_option( WP88_MC_UPDATE );
	if ( "1" === $onUpdateSubscriber )
	{
		$result = AC_ManageMailUser( MMU_UPDATE, $user_info, $writeDBMessages );
		update_option( AC_GenerateTempEmailOptionName( $user_info->ID ), "" );

		// 232 is the MailChimp error code for: "user doesn't exist".  This
		// error can occur when a new user signs up but there's a required
		// field in MailChimp which the software doesn't have access to yet.
		// The field will be populated when the user finally activates their
		// account, but their account won't exist.  So, catch that here and
		// try to re-add them.  This is a costly workflow, but that's how
		// it works.
		//
		// This can also happen when synchronizing users with MailChimp who
		// aren't subscribers to the MailChimp mailing list yet.
		if ( 232 === $result )
		{
			$onAddSubscriber = get_option( WP88_MC_ADD );
			if ( "1" === $onAddSubscriber )
			{
				$result = AC_ManageMailUser( MMU_ADD, $user_info, $writeDBMessages );
			}
		}
	}
	return $result;
}

?>