<h1 id="cat_title">Step 3 - SEF URLs setup</h1>

<br />
{if $error}
<table align='center'><tr><td><font size='4' color='#FF4444' face='Arial'>{$error}</font></td></tr></table>
{/if}
<div>
To get a ST Portfolio code displayed on your website you will need to include portfolio.php file from any script you want on your server.<br />
Please enter the script path that will contain integration code in the box below.<br /><br />
For example, in you want potfolio to be displayed on that address:<br />
<i>http://www.server.com/mypages/myportfolio.php</i> then the script path will be <i>/mypages/myportfolio.php</i>
<form action="" method="post" name="form1">
<input type="hidden" name="step" value="{$nextStep}">
Script Path: &nbsp;<input type="text" value="" name="script">
<input name="Submit" type="submit" class="button" value="Next >">
</form>
</div>