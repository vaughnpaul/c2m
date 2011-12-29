<?php
#version 3.9.1
/*********************************
These are the only two variables that
you MUST change
********************************/

$license = "F5D63C2BD783F33-C55E293B8B-5AD3877970394";

$set['recipient'] = array('dharmmotyar@gmail.com','dharmmotyar@gmail.com');

/********************************/




$set['required'] = array('email', 'name');/*list of field names that you will require to have data, or an error message will appear*/
//$set['bcc'] = 'another@yourisp.com';/*create an array of valid email addresses if you want bcc copies sent*/


$set['redirect'] = 'thanks.php';/*http://www.yoursite.com/somepage.htm  This is the page visitors see after successfully sending you information.  Strongly recommended*/
$set['banlist'] = array('*@somedomain.com', 'user@domain.com', 'etc@domains.com');
$set['dropdown_recipient'] = '0'; /*If you have a dropdown list for potential recipients, put 1.  Most will leave to zero... off */
$set['dropdown_name'] = 'send_to'; /*The name of your field for the drop down list... don't use 'recipient' */
$set['dropdown_list'] = $set['recipient'];/*This keeps your email addresses private */
$set['dropdown_email_match'] = '1';/*Autoreply to visitor will be from the email address of person chosen in drop down list... 1=on, zero=off*/
$set['drop_down_default'] = true;/*Will choose the first email in the recipient array (see above) if no dropdown list or checkbox chosen.  If set to false, then an error message will appear instead*/


$set['webmaster_subject'] = 'Contact from your website %s';
$set['webmaster_body_intro'] = "Here is the information sent to you on %s:\n\n";
$set['webmaster_confirm'] = '<br>Sent message to %s';
$set['webmaster_from_override'] = '';//Changes the FROM address on emails sent to the "webmaster"
/*********************************/
/*Auto-reply sent to visitor*/
/*********************************/
$set['autoresponder'] = '0';
$set['auto_from_name'] = "Contact Form"; /*Can be whatever you want... visitor sees this in the To: portion of auto reply email*/
$set['auto_from'] = $set['recipient'][0]; /*Very important if you want them to be able to reply to your email */
$set['auto_reply_name'] = "";/*Most leave blank.  Used if you want a different name when your visitor replies to your autoresponder email */
$set['auto_reply'] = ""; /*Most leave blank.  Used if you want a different email addy when your visitor replies to your autoresponder email */
$set['receipt'] = '0'; /*On =1 ... sends copy of posted info to your visitor */
$set['receipt_intro'] = "Here is what you sent us:\n\n";
$set['auto_reply_subject'] = 'Thank you for visiting %s.';
$set['auto_reply_body'] = "We received your information and will be getting back to you shortly.\n\n";
$set['auto_reply_signaturesignature'] = "\n\nSincerely, \n\n" . $this->website.' Webmaster';
$set['auto_reply_confirm'] = 'Sent auto-reply to %s';

/********************************
Extra Security Settings - Basic
******************************/
$set['extraSecurity'] = '1';/*1=On, 0=Off*/
$set['onlyAllow'] = '';/*Array of field variables that you will only allow, or else error thrown. Ex. = array('email', 'name', 'message');*/
$set['lengthDefault'] = '2500';/*default length of data you will allow, unless you specify otherwide.  5000 = wideopen, 50 = tight*/
$set['lengthSpecifics'] = '';/*Array of specific field sizes allowed. Ex. = array('email'=>30, 'message'=>50); */
$set['emailFieldValues'] = array('email', 'Email', 'e-mail', 'E-mail'); /*Array of field names allowed to contain email info*/
/********************************
Extra Security Settings - Advanced
******************************/
$set['spamBlock'] = '0';/*Token session matching... requires that you read the documentation. Leave off if you don't know what this does.*/
@(include 'tokenConfig.php');

/*********************************/
/*New Template setup*/
/*********************************/
$set['error_template'] = 'template/error_page.tpl.php';/*This is the template file for errors*/
$set['webmaster_template'] = 'template/webmaster.tpl.php';/*This is the template file for the email sent to you*/
$set['visitor_template'] = 'template/visitor.tpl.php';/*This is the template file for emails to the visitors*/
$set['confirmation_template'] = 'template/confirm.tpl.php';/*This is the template file for emails to the visitors*/
$set['template_bg_image_dir'] = '';/*This should be the path to the DIRECTORY for your bg image, if any, for your email template  ex: http://yoursite.com/ufm/template/   Notice trailing slash*/

$set['confirmation_step'] = '0';


/*********************************/
/*Default field checking functions*/
/*Delete, modify, or add lines if you know what you're doing.*/
/*Playing with these formulas is not for the faint of heart... be careful*/
/*********************************/

$set['field_check_eregi'] = array(
'email' => '^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]{2,})+$'
);

$set['field_check_ereg'] = array(
'phone' => '(^(.*)[0-9]{3})(.*)([0-9]{3})(.*)([0-9]{4}$)',
'phone_no' => '(^(.*)[0-9]{3})(.*)([0-9]{3})(.*)([0-9]{4}$)'
);

/*********************************
Database settings -- only upgraded version
www.UltimateFormMail.com
*********************************/
$set['use_database'] = '0';/*Use database? 1=On 0=off*/

$set['database'] = array(
'dbase' => 'your_database',
'host' => 'localhost',
'user' => 'your_username',
'pass' => 'password' ,
'table' => 'the_table'
);

/*********************************
Upload attachments
**********************************/
//$set['required_filefields'] = array('file1','file2');
$set['file_max_size'] = '500';/*Max file size in KB*/
$set['file_max_size_total'] = '500';/*If more than one file, this is the maximum total upload size for all attachments combined*/
$set['banned_ext'] = array('php', 'phtml', 'cgi', 'pl', 'asp', 'jsp', 'c', 'cfm', 'shtml', 'exe', 'bat', 'com');
$set['send_attachment'] = '1';/*If you turn to 0 then no attachments will be sent to you - if you want the extra security*/

/*********************************
File Save
*********************************/
$set['file_upload'] = '1';
$set['file_max_size_total'] = '500';/*If more than one file, this is the maximum total upload size for all attachments combined*/
//$set['file_save_dir'] = '/home/sitename/public_html/upload';/*This dir needs to be writable.  It can be outside the world visible root*/
$set['prevent_overwrite'] = '1';/*when name collision occurs, 0=delete old and overwrite, 1=change name of uploaded file*/

/*********************************
Reply with attachment 
*********************************/

//$set['reply_attach_files'] = array('test.txt','/home/serverpath/directory/file.zip');/*You can attache files to your reply email if you uncomment this line and put the correct file path location in the array*/

/*********************************
Simultaneous mailing list subscribe
*********************************/
$set['mail_list'] = '0';/*Change to 1 if you want to subscribe someone to a newsletter list at the same time they submit the form.*/
$set['mail_list_url'] = '';/*Put the url where you would normally submit name and email to sign up a subscriber for your mailing list.  Format is htt://www.mailinglisturl.com */
$set['mail_list_map'] = array('email'=>'from', 'name'=>'name');

/*********************************
Error language
*********************************/
$set['no_email_field'] = '<h2>You need to have a form field named <b>email</b></h2><p>Change your html code in your form so that the email field is named &quot;email&quot;</p>';
$set['error_title'] = '<h2>No email sent</h2><p>%s</p>';
$set['total_file_size_error'] = 'You attempted to send us %d Kb or more in attachments and we only allow %d for security reasons.<br>';
$set['file_size_error'] = "You attempted to send us a %d Kb attachment and we only allow %d for security reasons.<br>";
$set['file_type_error'] = 'You attempted to send us a %s document and it is banned for security reasons.<br>';
$set['required_error'] = '%s is required... but not found<br>';
$set['required_no_error'] = '%s is required... AND found<br>';
$set['referer_error'] = 'Posted info from %s but should be from %s<br>';
$set['invalid_error'] = 'Your %s is invalid<br>';
$set['recipient_error'] = 'The recipient you chose %s was not found<br>';
$set['drop_down_error'] = 'Your drop down form field is missing or does not match<br>';
$set['drop_down_not_in_list_error'] = 'Your drop down selection was not valid<br>';
$set['email_banned'] = 'Your email address is not allowed<br>';
$set['wrong_hash'] = 'You either took longer than %s minutes to complete the form or you are coming from an unauthorized domain.';
$set['token_error'] = 'Suspicious activity detected<br>';
$set['time_to_live_error'] = 'Too much time taken to fill out form<br>';

/*********************************/
/*Email Variables*/
/*********************************/
$set['recipient_html'] = true;
$set['webmaster_html'] = true;
$set['email_type'] = '2';/*1=smtp, 2=mail(), 3=qmail, 4=sendmail   Choose 2 unless it doesn't work for you*/

/*** Next 4 are for SMTP only... and most won't have to change ****/
$set['host'] = 'localhost';/*Most don't need to change */
$set['authorization'] = 'false';/*Most don't need to change.  set to 'true' if you need to change */
$set['username'] = '';/*Most don't need to change */
$set['password'] = '';/*Most don't need to change */
$set['ssl'] = false;
$set['port'] = '';

/*********************************
Formatting of Email - w/o Mail Merge
**********************************/
$set['formatStyle'] = '1';/*0=no change, 1=Title Case, 2= Sentence case, 3=ALL UPPER*/
$set['convertUnderscore'] = '1';/*Replace field_name with field name*/
$set['convertDash'] = '1';/*Replace field-name with field name*/


/*********************************/
/*Testing code language*/
/*********************************/
$set['testing'] = '0'; /*On = 1 ... great for debugging */
$set['testing_title'] = '<h1>Test Results:</h1>';
$set['testing_error'] = '<p>No email would be sent to %s</p>';
$set['timestamp'] = '<p>The form was submitted %s</p>';
error_reporting(0);/*You can change to error_reporting(E_ALL); for testing purposes*/

/*********************************/
/*Miscellaneous*/
/*********************************/
$set['date_format'] = 'l F j, Y'; /*date format for information*/
$set['offset'] = '0'; /*Number of hours difference from your server's time.  Can be positive or negative*/
$set['post_info'] = "%s: %s\n";
$set['ignore_these'] = array('Submit','submit','required', 'Required','PHPSESSID', 'token');

/***************************
File to include at the very end
of successful execution 
************************/
$set['extra_end_routine'] = '';/*A full file path goes here with server root in the path.  File is included at the end of successful execution*/

?>