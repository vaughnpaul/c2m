<?php /* Smarty version 2.6.2, created on 2010-09-27 14:48:00
         compiled from menu.tpl */ ?>
<P style="background-color:#015b8f; padding:0px" align=left><?php 
$r = mysql_fetch_array(mysql_query("select * from settings where settings_id = '1'")); 
echo '<img src="'.$r["set_logo"].'" />'; ?></P>

<?php if ($this->_tpl_vars['not_menu']): ?>
<DIV id=chromemenu>
<UL>
  <LI><div>&nbsp;</div>  </LI>
</UL>
</DIV>
<?php else: ?>
<DIV id=chromemenu>
<UL style="white-space: nowrap;">
  <LI><A href="admin.php">Home</A> 
  <LI><A onmouseover="cssdropdown.dropit(this,event,'dropmenu_cat')" href="add_category.php">Categories </A>
  <LI><A onmouseover="cssdropdown.dropit(this,event,'dropmenu1')" href="list_port.php">Portfolio </A>
  <LI><A href="settings.php">Settings</A> 
  <LI><A onmouseover="cssdropdown.dropit(this,event,'dropmenu5')" href="templates.php">Templates</A> 
  <LI><A href="<?php echo $this->_tpl_vars['settings']['inclusion_script']; ?>
" target="_blank">Preview </A>
  <LI><A href="logout.php">Logout </A>
  </LI>
</UL>
</DIV>

<DIV class=dropmenudiv id=dropmenu_cat>
	<A href="add_category.php">View</A> 
</DIV>

<DIV class=dropmenudiv id=dropmenu1>
	<A href="list_port.php">View</A> 
	<A href="add_port.php">Add Portfolio</A> 
</DIV>

<DIV class=dropmenudiv id=dropmenu5 style="WIDTH: 200px">
	<A href="templates.php">Edit Templates</A> 
	<A href="add_temp.php">Add Template</A> 
	<A href="variables.php">Edit Variables</A> 
	<A href="variables.php?action=edit&id=0">Add Variable</A> 
</DIV>
<?php endif; ?>