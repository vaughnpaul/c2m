<?php /* Smarty version 2.6.2, created on 2010-09-27 16:03:17
         compiled from settings.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'tabcontainer', 'settings.tpl', 46, false),array('block', 'tab', 'settings.tpl', 47, false),)), $this); ?>
<script language="javascript">
function poptable() {
	chldwin=window.open("colors.php?clid=1",'newwindow','toolbar=0,top=300,left=250,width=550,height=100,scrollbars=yes');
}

var showing;

function toggle( what ) {
	var buttonTitle = '';
	var html;

	if ( what == showing ) {
		if ( document.getElementById('hc').style.display=='block' ) {
			document.getElementById('hc').style.display='none';
			buttonTitle = 'Show';
		}
		else {
			document.getElementById('hc').style.display='block';
			buttonTitle = 'Hide';
		}
		
	}
	else {
		buttonTitle = 'Hide';
		document.getElementById('hc').style.display='block';
	}

	document.getElementById('hc').innerHTML = document.getElementById(what).innerHTML;
	
	if ( what == 'integration' ) {
		document.getElementById('integrationbutton').innerHTML = buttonTitle+' integration code';
		document.getElementById('htaccessbutton').innerHTML = 'Show .htaccess code';
	}
	else {
		document.getElementById('integrationbutton').innerHTML = 'Show integration code';
		document.getElementById('htaccessbutton').innerHTML = buttonTitle+' .htaccess code';
	}
		
	showing = what;
	
}
</script>
<h1>Settings</h1>

<form method="post" enctype="multipart/form-data" style="margin: 0px; padding: 0px;">
<?php $this->_tag_stack[] = array('tabcontainer', array()); smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<?php $this->_tag_stack[] = array('tab', array('caption' => 'Main Settings')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<div id="integration" style="position: absolute; top: 0px; left: 0px; display: none;">
<pre>
&lt;?php 
include("<?php echo $this->_tpl_vars['integrationCode']; ?>
");
?&gt;
</pre>
</div>

<div id="htaccess" style="position: absolute; top: 0px; left: 0px; display: none;">
<pre><?php echo $this->_tpl_vars['htaccessCode']; ?>
</pre>
</div>
<table border="0" cellpadding="0" cellspacing="0">
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td width="181"><?php echo $this->_tpl_vars['msg']; ?>
</td>
    <td width="314"><?php if ($this->_tpl_vars['settings']['set_readme']): ?><img src="<?php echo $this->_tpl_vars['docroot'];  echo $this->_tpl_vars['settings']['set_readme']; ?>
"><?php endif; ?></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td nowrap class="td">Upload a &quot;read more button&quot;</td>
    <td><input name="fupload" type="file" class="textbox" ></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td bgcolor="#F0F0F0"><input name="upload" type="submit" class="button" value="Upload"> 
      <strong>(to upload readmore button click here) </strong></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td><?php echo $this->_tpl_vars['msg2']; ?>
</td>
    <td><?php if ($this->_tpl_vars['settings']['set_logo']): ?><img src="<?php echo $this->_tpl_vars['docroot'];  echo $this->_tpl_vars['settings']['set_logo']; ?>
" /><?php endif; ?></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td nowrap="nowrap" class="td">Upload a company logo </td>
    <td><input name="fupload2" type="file" class="textbox"></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td bgcolor="#F0F0F0"><input name="upload2" type="submit" class="button" value="Upload" />
        <strong>(to upload readmore button click here) </strong></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="td">Link color </td>
    <td><input  name="lclass" type="text" class="textbox" value="<?php echo $this->_tpl_vars['settings']['set_lclass']; ?>
"></td>
  </tr>
  <tr>
    <td class="td">Link hover color </td>
    <td><input name="hclass" type="text" class="textbox" value="<?php echo $this->_tpl_vars['settings']['set_hclass']; ?>
"></td>
  </tr>
  <tr>
    <td class="td">Admin password </td>
    <td>     <input type="password" class="textbox" name="apass" value="<?php echo $this->_tpl_vars['admin_password']; ?>
" readonly> </td>
  </tr>
  <tr>
    <td class="td">Max. Image Width</td>
    <td><input type="text" class="textbox" name="set_imagew" value="<?php echo $this->_tpl_vars['settings']['set_imagew']; ?>
" />    </td>
  </tr>
  <tr>
    <td class="td">Max. Image Height</td>
    <td><input type="text" class="textbox" name="set_imageh" value="<?php echo $this->_tpl_vars['settings']['set_imageh']; ?>
" />    </td>
  </tr>
  <tr>
    <td class="td">Max. Thumbnail Width</td>
    <td><input type="text" class="textbox" name="resize_width" value="<?php echo $this->_tpl_vars['settings']['resize_width']; ?>
"> </td>
  </tr>
  <tr>
    <td class="td">Max. Thumbnail Height</td>
    <td><input type="text" class="textbox" name="resize_height" value="<?php echo $this->_tpl_vars['settings']['resize_height']; ?>
"> </td>
  </tr>
  <tr>
    <td class="td">Thumbs per row </td>
    <td><input type="text" class="textbox" name="set_maxthumbs" value="<?php echo $this->_tpl_vars['settings']['set_maxthumbs']; ?>
" />    </td>
  </tr>
  <tr>
    <td class="td">Entries per page </td>
    <td>  <input type="text" class="textbox" name="entry" value="<?php echo $this->_tpl_vars['perpage']; ?>
"> </td>
  </tr>
  <tr>
    <td class="td" valign="top">
    	Inclusion Script <br />
    	[ <a href="#" id="htaccessbutton" onclick="javascript: toggle('htaccess');">Show .htaccess code</a> ]<br />
    	[ <a href="#" id="integrationbutton" onclick="javascript: toggle('integration');">Show integration code</a> ]<br />    </td>
    <td valign="top">
    	<input type="text" name="inclusion_script" value="<?php echo $this->_tpl_vars['settings']['inclusion_script']; ?>
">
    	<div id='hc' style="display: none; border: 1px solid black; width: 500px; overflow: scroll;">
    	<pre><?php echo $this->_tpl_vars['htaccessCode']; ?>
</pre>
    	</div>    </td>
  </tr>
  <tr>
    <td><div align="center">
    </div>      <div align="center">
      </div></td>
    <td><input name="submit1" type="submit" class="button" value="Update"></td>
  </tr>
</table>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tab', array('caption' => 'Header Settings')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<table border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td class="td">Include category header </td>
    <td><input name="cat" type="checkbox" id="cat" value="category" <?php if ($this->_tpl_vars['settings']['set_cat'] == 1): ?>checked<?php endif; ?>></td>
  </tr>
  <tr>
    <td align="right" class="td">Choose Color : &nbsp;&nbsp;</td>
    <td width="166" align="left"><a href="#" onClick="poptable()"><div style="border: 1px solid black; background-color: <?php echo $this->_tpl_vars['settings']['set_hcolor']; ?>
; color: <?php echo $this->_tpl_vars['settings']['set_hcolor']; ?>
; width:20%">&nbsp;</div></a>
	</td>
  </tr>
  <td height="27" align="right" class="td">Font : &nbsp;&nbsp; </td>
      <td><select name="hfont" class="drop1">
          <option value="<?php echo $this->_tpl_vars['settings']['set_htext']; ?>
"><?php echo $this->_tpl_vars['settings']['set_htext']; ?>
</option>
          <option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
          <option value="Courier New, Courier, mono">Courier New, Courier, mono</option>
          <option value="Times New Roman, Times, serif">Times New Roman, Times, serif</option>
          <option value="Verdana, Arial, Helvetica, sans-serif">Verdana, Arial, Helvetica, sans-serif</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Impact">Impact</option>
      </select></td>
  </tr><tr>
    <td height="27" align="right" class="td">Size : &nbsp;&nbsp; </td>
    <td><select name="hsize" class="drop1">
        <option value="<?php echo $this->_tpl_vars['settings']['set_hsize']; ?>
"><?php echo $this->_tpl_vars['settings']['set_hsize']; ?>
</option>
        <option value="9px">9px</option>
        <option value="10px">10px</option>
        <option value="12px">12px</option>
        <option value="14px">14px</option>
        <option value="16px">16px</option>
        <option value="24px">24px</option>
        <option value="36px">36px</option>
        <option value="inherit">inherit</option>
        <option value="large">large</option>
        <option value="larger">larger</option>
        <option value="medium">medium</option>
        <option value="small">small</option>
        <option value="smaller">smaller</option>
        <option value="x-large">x-large</option>
        <option value="x-small">x-small</option>
        <option value="xx-large">xx-large</option>
        <option value="xx-small">xx-small</option>
    </select></td>
  </tr>
  <tr>
    <td height="28" class="td">Category header alignment </td>
    <td><input name="align" type="radio" value="left" <?php if ($this->_tpl_vars['settings']['set_align'] == 'left'): ?>checked<?php endif; ?>>
    Left
      <input name="align" type="radio" value="center" <?php if ($this->_tpl_vars['settings']['set_align'] == 'center'): ?>checked<?php endif; ?>>
    Center
    <input name="align" type="radio" value="right" <?php if ($this->_tpl_vars['settings']['set_align'] == 'right'): ?>checked<?php endif; ?>>
    Right </td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="right" class="td"><div align="center">
      <input name="submit2" type="submit" id="submit" value="Update">
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>
</form>