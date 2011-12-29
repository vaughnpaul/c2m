<?php /* Smarty version 2.6.2, created on 2010-09-27 17:37:52
         compiled from add_temp.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'tabcontainer', 'add_temp.tpl', 7, false),array('block', 'tab', 'add_temp.tpl', 8, false),)), $this); ?>
<?php ob_start();  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "template_vars.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  $this->_smarty_vars['capture']['variables'] = ob_get_contents(); ob_end_clean(); ?>

<h1>Add Template</h1>
<form action="" method="post" name="frmtemp">
<?php $this->_tag_stack[] = array('tabcontainer', array()); smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start();  $this->_tag_stack[] = array('tab', array('caption' => 'Listing Template')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<table>
<tr><td valign="top">
  <table border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="3" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th scope="row">Template name </th>
      <td colspan="2"><input type="text" name="tname"></td>
    </tr>
    <tr>
      <th colspan="3" scope="row">
	  <textarea name="tdesc" cols="50" rows="10"></textarea></th>
    </tr>
    <tr>
      <th colspan="3" scope="row"><input type="submit" name="submittemp" value="Add Listing Template"> </th>
    </tr>
  </table>
</td><td valign="top">

<?php echo $this->_smarty_vars['capture']['variables']; ?>


</td></tr></table>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack);  $this->_tag_stack[] = array('tab', array('caption' => 'Detail Template')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<table>
<tr><td valign="top">
  <table border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="3" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th scope="row">Template name </th>
      <td colspan="2"><input type="text" name="dname"></td>
    </tr>
    <tr>
      <th colspan="3" scope="row">
	  <textarea name="ddesc" cols="50" rows="10"></textarea></th>
    </tr>
    <tr>
      <th colspan="3" scope="row"><input type="submit" name="submitdetail" value="Add Detail Template"> </th>
    </tr>
  </table>
</td><td valign="top">

<?php echo $this->_smarty_vars['capture']['variables']; ?>


</td></tr></table>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack);  $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>
</form>