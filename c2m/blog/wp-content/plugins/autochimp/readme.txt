=== AutoChimp ===
Plugin Name: AutoChimp
Contributors: WandererLLC
Plugin URI: http://www.wandererllc.com/company/plugins/autochimp/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=HPCPB3GY5LUQW&lc=US
Tags: MailChimp, Mail, Chimp, email, campaign, mailing list, BuddyPress, Register, Plus, Redux, Profile Fields, XProfile, merge, admin, create, automatically, subscribe, unsubscribe, sync, synchronize
Requires at least: 2.8
Tested up to: 3.04
Stable tag: 1.10

Keep website users and MailChimp mailing lists in sync and create campaigns from posts.

== Description ==

Automatically subscribe, unsubscribe, and update users to your [MailChimp](http://eepurl.com/MnhD "Mail Chimp") mailing list as users subscribe and unsubscribe to your site.  Sync your BuddyPress profile fields with your MaiChimp merge variables and groups.  Create MailChimp mail campaigns automatically from blog posts.  AutoChimp uses a single options page to help you manage your preferred settings.  In order to use AutoChimp, you must already have an account with MailChimp and at least one mailing list.

To use, save your MailChimp API Key on the options page then start adding your new registrations to any selected MailChimp mailing list.  You can configure the plugin to update your mailing list when 1) a new user subscribes, 2) a user unsubscribes, or 3) a user updates his information.  You may also choose to create campaigns automatically from post categories of your choosing.  You can send the campaigns immediately or just save them.

== Screenshots ==

1. The options page for AutoChimp works in a logical flow from top to bottom.  The first thing to do is to save your API key.  Once you do this, you only need to select the options that you want to support. This screenshot shows the maximum available options, which can grow considerably if you are using BuddyPress. Don't forget to click "Save AutoChimp Options" when you're finished!

== Special Notes ==

1)  MailChimp, like all other major email campaign managers, sends newly subscribed members a confirmation email. So, you must wait until the new subscriber receives, accepts, and confirms the new subscription before you see them appear in your mailing list.  AutoChimp will trigger the confirmation email right away.  However, this can all be bypassed by checking the "Bypass double opt-in" checkbox.

2)  Updating your mailing list when a user changes their profile has the potential to be problematic.  If you have alternate UIs or non-standard ways of updating users, then the correct sequence of calls may not happen and, as a result, the subscribed user will not be found in your MailChimp mailing list.  This is because there is the notion of an old email and a new email.  The old email must be fetched before the new email and if the plugin doesn't correctly pick up the old email, then it will be impossible to update a member.  The old email is fetched when the user's profile page is displayed.  The new email is saved when the user commits the update.

3) Sometimes, plugin output may not render properly in your campaigns generated from posts.  This is usually because the plugin doesn't have access to information it needs until it is displaying its output on the screen for an end user.  The best suggestion in this case is to learn which of your plugins are problematic (most are fine) and adapt accordingly.  We'll look for ways to improve this in the future too.

4) Your campaign formatting may appear differently than your post formatting.  This is because your post uses formatting files that belong to your WordPress theme that your campaign doesn't have access to.  The best thing you can do is to use the HTML tab in the "Post Edit" page to add specific HTML instructions.  MailChimp campaigns speak HTML very well.

5) The subject of your campaign is your blog post title.  The "From" email address and name are taken from your MailChimp configuration.  To change that, you'll need to log into your MailChimp account.  The "To" field is the "*|FNAME|*" merge code.

== Frequently Asked Questions ==

= Why doesn't the AutoChimp menu appear under the Settings menu? =

That's because you are likely running a version of WordPress before 3.0.  Please upgrade to the latest version.  3.x is a big step up from 2.x!

= How do I make suggestions or report bugs for this plugin? =

Just go to <http://www.wandererllc.com/company/plugins/autochimp/> and follow the instructions.

= How do I add a signup box using AutoChimp? = 

AutoChimp is not a visual plugin.  It does all it's work behind the scenes keeping your blog users in sync with your mailing list.  If you are looking for a registration widget for MailChimp, search for "MailChimp List Subscribe Form" on the WordPress plugin site.

== Changelog ==

= 1.10 =

* Can now synchronize all WordPress user fields.
* Fixed bug associated with Register Plus Redux.
* Moved the static text field from the BuddyPress UI to the main UI.

= 1.02 =

* Fixed issue where new blog users were synchronized with MailChimp but errors were incorrectly reported.
* Added extra links in the UI to give users more info.
* Cleaned up some strings.

= 1.01 =

* Bypass Double Opt-in is now OFF by default.
* AutoChimp now can coexist with the MailChimp widget plugin.
* Renamed functions to reduce conflicts with other plugins.

= 1.00 =

* Added integration with BuddyPress.  You can now sync your BuddyPress profile fields with your MailChimp merge variables and groups.
* Added a fix/patch for Register Plus and Register Plus Redux.  You can now sync first name and last name with MailChimp successfully.
* Improved the UI

= 0.83 =

* Fixed issue of missing break statements.

= 0.82 =

* Fixed issue of pending email posts to campaigns being sent prematurely.
* Added "Read the full story here" with permalink URL to the blog post at the bottom of the campaign.

= 0.81 =

* A tiny update to make small updates to the UI.

= 0.8 =

* Users can now create mail campaigns from posts when publishing a new post.
* Added additional UI to support basic preferences for creating campaigns from posts.

= 0.6 =

* Add, update, and delete users in your mailing list as your site's users change.  This synchronization is one-way:  from site to mailing list.
* Basic UI for keeping a mailing list in sync with your site's users.

== Upgrade Notice ==

= 1.10 = 

Recommended if you use Register Plus or Register Plus Redux.  Also, if you want to synchronize fields other than first name, last name, and email, please upgrade.

= 1.02 =

Small changes and fixes which are recommended for all users.

= 1.01 =

Recommended for all users, especially those who also use the MailChimp widget plugin.

= 1.0 =

Recommended for all users.  This version greatly expands AutoChimp's feature set.

= 0.83 =

All users should upgrade to this version ASAP.

= 0.82 =

Not a critical update.  Small fix for email-to-post users, plus a "Read more" link at the bottom of campaigns.

= 0.81 =

This version simply tightens down the 0.8 UI.

= 0.8 =

This version adds the ability to create campaigns from blog posts.

== Acknowledgements ==

There are many people who have suggested features for AutoChimp.  Special consideration needs to be made to the following people who had an active role in contributing by providing a detailed design, monetary sponsorship, or offering to test and provide useful feedback:

1) Anton Alksnin at [Forex Alert](http://www.forex-alert.net "Forex Alert") for supporting the "blog post to campaign" feature.
2) Peter Michael at [FlowDrops](http://www.flowdrops.com/) for some quality testing.
3) [Latinos a Morir](http://www.latinosamorir.com/) for supporting the BuddyPress Synchronization feature.
4) Bryan Hoffman at [Dwell DFW Apartments](http://apartments.dwelldfw.com/dallas/) for supporting synchronizing all WordPress user fields.

== License ==

This file is part of AutoChimp.

AutoChimp is free software:  you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.  

AutoChimp is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

See the license at <http://www.gnu.org/licenses/>.