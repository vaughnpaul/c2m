<?php /* Smarty version 2.6.2, created on 2010-09-27 16:47:36
         compiled from variables.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'variables.tpl', 33, false),array('modifier', 'substr', 'variables.tpl', 102, false),array('function', 'html_options', 'variables.tpl', 52, false),)), $this); ?>
<script language="javascript">

function changeVarType() {
	var type = document.editVariable.var_type.options[document.editVariable.var_type.selectedIndex].value;
	if ( type == 'link' ) {
		document.getElementById('link_fields').style.display='block';
		document.getElementById('text_fields').style.display='none';
		document.getElementById('image_fields').style.display='none';
	}
	else if ( type == 'text' ) {
		document.getElementById('link_fields').style.display='none';
		document.getElementById('text_fields').style.display='block';
		document.getElementById('image_fields').style.display='none';
	}
	else {
		document.getElementById('link_fields').style.display='none';
		document.getElementById('text_fields').style.display='none';
		document.getElementById('image_fields').style.display='block';
	}
}
</script>

<?php if ($this->_tpl_vars['action'] == 'edit'): ?>
<table width="600" border="0" cellpadding="1" cellspacing="1">
<tr><td colspan="4"><h1 style="width: 600px;">Add Variable</h1></td></tr>
<tr>
  <td colspan="4" width="100%">
	<form name="editVariable" method="post" enctype="multipart/form-data">
	<input name="action" value="save" type="hidden">
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['variable']['id'];  echo '?>'; ?>
">
	<table width="100%" border="0" cellpadding="1" cellspacing="1">
	<?php if (count($this->_tpl_vars['errors'])): ?>
		<tr><td colspan="2" style="color: red;"><br />
		<?php if (count($_from = (array)$this->_tpl_vars['errors'])):
    foreach ($_from as $this->_tpl_vars['error']):
?>
			<?php echo $this->_tpl_vars['error']; ?>
<br />
		<?php endforeach; unset($_from); endif; ?>
		</td></tr>
	<?php endif; ?>
	  <tr>
	    <td class="titles" width="200">&nbsp;Variable Name </td>
	    <td><input name="name" type="text" class="textbox" value="<?php echo $this->_tpl_vars['variable']['name']; ?>
"></td>
	  </tr>
	  <tr>
	    <td class="titles">&nbsp;Description </td>
	    <td><input name="description" type="text" class="textbox" value="<?php echo $this->_tpl_vars['variable']['description']; ?>
"></td>
	  </tr>
	  <tr>
	    <td class="titles">&nbsp;Type </td>
	    <td>
	    	<select name="var_type" class="textbox" onchange="javascript:changeVarType();">
	    	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['typeOptions'],'selected' => $this->_tpl_vars['variable']['type']), $this);?>

	    	</select>
		    </td>
<!--			    <td><select name="type" class="textbox"><option value="link">link</option><option value="text">text</option><option value="image">image</option></select></td>-->
		  </tr>
		</table>
		
		<div id="link_fields" style="position: relative;">
		<table width="100%" border="0" cellpadding="1" cellspacing="1">
		  <tr>
		    <td class="titles" width="200">&nbsp;Link Title </td>
		    <td><input name="link_title" type="text" class="textbox" value="<?php echo $this->_tpl_vars['variable']['link_title']; ?>
"></td>
		  </tr>
		  <tr>
		    <td class="titles">&nbsp;URL </td>
		    <td><input name="link_url" type="text" class="textbox" value="<?php echo $this->_tpl_vars['variable']['link_url']; ?>
"></td>
		  </tr>
		  <tr>
		    <td class="titles">&nbsp;Target </td>
		    <td>
	    	<select name="link_target" class="textbox">
	    	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['targetOptions'],'selected' => $this->_tpl_vars['variable']['link_target']), $this);?>

	    	</select>
			    </td>
			  </tr>
			</table>
			</div>
			
			<div id="text_fields" style="position: relative;">
			<table width="100%" border="0" cellpadding="1" cellspacing="1">
			  <tr>
			    <td class="titles" width="200">&nbsp;Text </td>
			    <td><textarea name="text" cols="30" rows="5" class="textbox" id="catdesc"><?php echo $this->_tpl_vars['variable']['text_text']; ?>
</textarea></td>
			  </tr>
			</table>
			</div>

			<div id="image_fields" style="position: relative;">
			<table width="100%" border="0" cellpadding="1" cellspacing="1">
			  <tr>
			    <td class="titles" width="200">&nbsp;Upload Image </td>
			    <td><input type="file" name="image" class="textbox"></td>
			  </tr>
			  <tr>
			    <td class="titles">&nbsp;Alternate Text </td>
			    <td><input name="image_alt" type="text" class="textbox" value="<?php echo $this->_tpl_vars['variable']['image_alt']; ?>
"></td>
			  </tr>
			<?php if ($this->_tpl_vars['variable']['image']): ?>
			  <tr>
			    <td class="titles" width="200">&nbsp;Current Image </td>
			    <td><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['variable']['image'])) ? $this->_run_mod_handler('substr', true, $_tmp, 1) : substr($_tmp, 1)); ?>
"></td>
			  </tr>
			<?php endif; ?>
			</table>
			</div>
			
			<script type="text/javascript">changeVarType();</script>

			
			<table width="100%" border="0" cellpadding="1" cellspacing="1">
			  <tr>
			    <td width="200">&nbsp;</td>
			    <td>
			    	<input name="submit1" type="submit" class="textbox" value="Save">
			    	<input name="Submit2" type="reset" class="textbox" value="Reset">
			    	<input name="Submit3" type="button" class="textbox" onclick="javascript:document.location.href='variables.php';" value="Cancel">
			    </td>
			  </tr>
			</table>
      		
      		</form>
      </td>
    </tr>
  </table>
<?php else: ?>
<table width="600" border="0" cellpadding="1" cellspacing="1">
<tr><td colspan="4"><h1 style="width: 600px;">Variables</h1></td></tr>
<tr>
  <td colspan="4" width="100%">
	<?php if ($this->_tpl_vars['variables']): ?>
	      <table width="100%">
		  <tr>
		    <td width="12%" height="22" bgcolor="#F4F4F4" class="titles">Name</td>
		    <td width="14%" bgcolor="#F4F4F4" class="titles">Type</td>
		    <td bgcolor="#F4F4F4" class="titles">Description</td>
		    <td width="1%" bgcolor="#F4F4F4" class="titles">Action</td>
		  </tr>
		  <?php if (count($_from = (array)$this->_tpl_vars['variables'])):
    foreach ($_from as $this->_tpl_vars['row']):
?>
		  <tr><td><?php echo $this->_tpl_vars['row']['name']; ?>
</td><td><?php echo $this->_tpl_vars['row']['type']; ?>
</td><td><?php echo $this->_tpl_vars['row']['description']; ?>
</td><td><a href='variables.php?action=edit&id=<?php echo $this->_tpl_vars['row']['id']; ?>
'>edit</a>&nbsp;&nbsp;<a href='#' onclick='javascript: if (confirm("Are you really want to delete this variable?")) document.location.href="variables.php?action=delete&id=<?php echo $this->_tpl_vars['row']['id']; ?>
";'>delete</a></tr>
		  <?php endforeach; unset($_from); endif; ?>
		  </table><br />
	<?php else: ?>
		<br />No variables currently defined
	<?php endif; ?>
      </td>
    </tr>
  </table>
<?php endif; ?>