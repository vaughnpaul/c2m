<?php /* Smarty version 2.6.2, created on 2010-09-27 14:43:44
         compiled from setup/final.tpl */ ?>
<h1 id="cat_title">Thank you</h1>

<br />
<div>
<b>Installation was successfully completed!</b><br /><br />
You need to use the following code in your script to integrate ST Portfolio into your website:
<pre>
&lt;?php 
include("<?php echo $this->_tpl_vars['integration']; ?>
");
?&gt;
</pre>
<br />
If you want to enable Search Engine Friendly URLs, please copy the code below and paste it into the <i>.htaccess</i> file into <i><?php echo @constant('DOCROOT'); ?>
</i> directory.<br />
<textarea cols=60 rows=15><?php echo $this->_tpl_vars['htaccessCode']; ?>
</textarea>
<br /><br />
<input type="button" name="continueButton" value="Proceed to Login" onclick="javascript: document.location.href='admin.php'">
</div>