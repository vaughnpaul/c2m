<?php /* Smarty version 2.6.2, created on 2010-09-27 16:47:00
         compiled from templates.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'tabcontainer', 'templates.tpl', 9, false),array('block', 'tab', 'templates.tpl', 10, false),array('function', 'html_options', 'templates.tpl', 21, false),)), $this); ?>
<script language="javascript">
function frmsubmit() {
	document.frmtemp.submit();
}
</script>

<h1>Templates</h1>
<form method="post" name="frmtemp" style="padding: 0px; margin: 0px">
<?php $this->_tag_stack[] = array('tabcontainer', array()); smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start();  $this->_tag_stack[] = array('tab', array('caption' => 'Listing Templates')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<table>
<tr><td valign="top">
  <table border="0" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="2" scope="row">Template Name </th>
      <td colspan="2">
      	<select name="template" onChange="frmsubmit();">
      	<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['tempValues'],'output' => $this->_tpl_vars['tempTitles'],'selected' => $this->_tpl_vars['template_id']), $this);?>

      	</select>      
      	<input type="submit" name="subtemp" value="Use this template"></td>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row">
	  <textarea name="tdesc" id="tdesc" cols="50" rows="10"><?php echo $this->_tpl_vars['tdesc']; ?>
</textarea></th>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row"><input type="submit" name="submittemp" value="Save Template"> </th>
    </tr>
  </table>
</td><td valign="top">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_vars.tpl", 'smarty_include_vars' => array('dest' => 'tdesc')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</td></tr></table>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tab', array('caption' => 'Detailed Templates')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<table>
<tr><td valign="top">
  <table border="0" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="2" scope="row">Template Name </th>
      <td colspan="2">
      	<select name="detail" onChange="frmsubmit();">
      	<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['detValues'],'output' => $this->_tpl_vars['detTitles'],'selected' => $this->_tpl_vars['detail_id']), $this);?>

      	</select>      
      	<input type="submit" name="subtemp" value="Use this template"></td>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row">
	  <textarea name="ddesc" id="ddesc" cols="50" rows="10"><?php echo $this->_tpl_vars['ddesc']; ?>
</textarea></th>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row"><input type="submit" name="submitdet" value="Save Template"> </th>
    </tr>
  </table>
  
</td><td valign="top">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_vars.tpl", 'smarty_include_vars' => array('dest' => 'ddesc')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</td></tr></table>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack);  $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>
</form>