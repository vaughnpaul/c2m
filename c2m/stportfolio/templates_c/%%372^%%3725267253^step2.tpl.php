<?php /* Smarty version 2.6.2, created on 2010-09-27 14:40:08
         compiled from setup/step2.tpl */ ?>
<h1 id="cat_title">Step 2 - MySQL and Settings</h1>

<?php if ($this->_tpl_vars['error']): ?>
<table align='center'><tr><td><font size='4' color='#FF4444' face='Arial'><?php echo $this->_tpl_vars['error']; ?>
</font></td></tr></table>
<?php endif; ?>

  <table width="700" border="0" cellpadding="1" cellspacing="1">
	<form action="" method="post" name="form1">
	<input type="hidden" name="step" value="<?php echo $this->_tpl_vars['nextStep']; ?>
">
    <tr>
      <td colspan="2">
          Note: This will overwrite any current setup. <br>
      - You may rename the admin.php to anything you want. <br>
      - This is really meant to be integrated into a page, though it can run alone good with only a little modification. <br>
      - Please make sure you delete setup.php file after the setup is finished<br>
      - For more information, read readme.txt. <br>      </td>
    </tr>
    <tr bgcolor="#f4f4f4">
      <td height="19" colspan="2"><strong class="titles">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- MYSQL</strong></td>
    </tr>
    <tr>
      <td width="360" align="right"><strong class="td"> MySQL Host</strong></td>
      <td width="408"><input name="host" type="text" class="textbox" id="host" value="localhost"></td>
    </tr>
    <tr>
      <td align="right"><strong class="td">MySQL User: </strong></td>
      <td width="408"><input name="user" type="text" class="textbox" id="user"></td>
    </tr>
    <tr>
      <td align="right"><strong class="td">Password:</strong></td>
      <td><input name="password" type="password" class="textbox" id="password"></td>
    </tr>
    <tr>
      <td align="right"><strong class="td">Database:</strong></td>
      <td><input name="table" type="text" class="textbox" id="table"></td>
	
    </tr>
	<TR>
	  <td align="right"><strong class="td">Admin User Name:</strong></td>
	  <td><input name="admin_user" type="text" class="textbox" id="table"></td>
	  
	</TR>
	<tr>
	<td align="right"><strong class="td">Admin Password:</strong></td>
	  <td><input name="admin_password" type="password" class="textbox" id="table"></td>
	</tr>
	<td align="right"><strong class="td">Confirm Admin Password:</strong></td>
	  <td><input name="admin_password2" type="password" class="textbox" id="table"></td>
	</tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#f4f4f4">
      <td height="19" colspan="2"><strong class="titles">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- SETTINGS</strong></td>
    </tr>
    <tr>
      <td align="right"><strong class="td">Installation Directory: </strong></td>
      <td><input name="docroot" type="text" class="textbox" id="docroot" value="<?php echo $this->_tpl_vars['docroot']; ?>
"></td>
    </tr>
    <tr>
      <td align="right"><div class="td">
        <div align="right"><strong>Entries Per Page: </strong></div>
      </div></td>
      <td><input name="perpage" type="text" class="textbox" id="perpage" value="10" size="4"></td>
    </tr>
    <tr>
      <td align="right"><strong class="td">Description Length: </strong></td>
      <td><input name="description" type="text" class="textbox" id="description" value="150" size="5"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td><input name="Submit" type="submit" class="button" value="Next >"></td>
    </tr>
	</form>
</table>