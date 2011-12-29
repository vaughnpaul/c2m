<?php /* Smarty version 2.6.2, created on 2010-09-27 14:48:17
         compiled from admin.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'tabcontainer', 'admin.tpl', 2, false),array('block', 'tab', 'admin.tpl', 3, false),)), $this); ?>
<h1 class="style1" style="text-align:left; background-color:#FFFFFF;">Admin Panel Index</h1> 
<?php $this->_tag_stack[] = array('tabcontainer', array()); smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start();  $this->_tag_stack[] = array('tab', array('caption' => 'Company News')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<div style="* height: 250px; min-height: 250px;">
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'rssfeeds.tpl', 'smarty_include_vars' => array('feeds' => $this->_tpl_vars['cn'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack);  $this->_tag_stack[] = array('tab', array('caption' => 'Product Updates')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<div style="* height: 250px; min-height: 250px;">
<br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'rssfeeds.tpl', 'smarty_include_vars' => array('feeds' => $this->_tpl_vars['pu'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack);  $this->_tag_stack[] = array('tab', array('caption' => 'Support')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<div style="* height: 250px; min-height: 250px;">
<br />
For technical support, please visit our online help desk.<br />
Here there is a knowledge base, downloads, and the ability to submit an online ticket.<br />
<a href="http://www.solvetechnology.com/helpdesk/">http://www.solvetechnology.com/helpdesk/</a>
</div>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack);  $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>