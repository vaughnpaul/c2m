<?php /* Smarty version 2.6.2, created on 2010-09-27 14:41:56
         compiled from setup/step3.tpl */ ?>
<h1 id="cat_title">Step 3 - SEF URLs setup</h1>

<br />
<?php if ($this->_tpl_vars['error']): ?>
<table align='center'><tr><td><font size='4' color='#FF4444' face='Arial'><?php echo $this->_tpl_vars['error']; ?>
</font></td></tr></table>
<?php endif; ?>
<div>
To get a ST Portfolio code displayed on your website you will need to include portfolio.php file from any script you want on your server.<br />
Please enter the script path that will contain integration code in the box below.<br /><br />
For example, in you want potfolio to be displayed on that address:<br />
<i>http://www.server.com/mypages/myportfolio.php</i> then the script path will be <i>/mypages/myportfolio.php</i>
<form action="" method="post" name="form1">
<input type="hidden" name="step" value="<?php echo $this->_tpl_vars['nextStep']; ?>
">
Script Path: &nbsp;<input type="text" value="" name="script">
<input name="Submit" type="submit" class="button" value="Next >">
</form>
</div>