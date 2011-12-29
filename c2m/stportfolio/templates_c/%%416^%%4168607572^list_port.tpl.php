<?php /* Smarty version 2.6.2, created on 2010-09-27 16:03:51
         compiled from list_port.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'list_port.tpl', 34, false),array('modifier', 'count', 'list_port.tpl', 74, false),)), $this); ?>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/wz_dragdrop.js"></script>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/xmlhttp.js"></script>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/reorder.js"></script>

<script type="text/javascript">

function jobsdel(id) {
	
	var stat;
	stat =  confirm(" The record will be permanently deleted");
	if(stat==true) {
		if(id !="") {
			location.href="list_port.php?id="+id;
		}
	}
}

function call_cat() {
	
	document.frm.submit();

}

</script>

<table width="700" border="0" cellpadding="0" cellspacing="0">
<tr><td valign="top">

<table width="100%" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td height="22" colspan="2" class="titles">
    	<form name = "frm" method="post" style="margin: 0px; padding: 0px;">List by Category
    	<select name="category" class="textbox" id="category" onChange="call_cat()">
    	<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['categoryValues'],'output' => $this->_tpl_vars['categoryTitles'],'selected' => $this->_tpl_vars['catid']), $this);?>

    	</select>
        </form>
	</td>
    <td height="22" class="titles">&nbsp;</td>
    <td height="22" class="titles"><div align="right"><a href="add_port.php">add portfolio</a> </div></td>
	<td align="right"><?php if ($this->_tpl_vars['catid']): ?><span id="menu_saveorder"><a href="#" onclick="javascript:saveOrder('port','<?php echo $this->_tpl_vars['catid']; ?>
'); return false;">Save Order</a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span id="menu_undoorder"><a href="#" onclick="javascript:undoOrder(); return false;">Undo Order</a></span><?php else: ?>Select a Category to save order<?php endif; ?></td>
  </tr>
<!--  <tr>
    <td height="22" colspan="5" bgcolor="#F4F4F4" class="titles"><div align="left">Category : <?php echo $this->_tpl_vars['catName']; ?>
</div></td>
    </tr>
-->  <tr>
    <td width="20%" height="22" bgcolor="#F4F4F4" class="titles">Title</td>
    <td width="25%" bgcolor="#F4F4F4" class="titles" colspan=2 >Website</td>
    <td width="10%" bgcolor="#F4F4F4" class="titles"></td>
    <td width="20%" bgcolor="#F4F4F4">&nbsp;</td>
  </tr>
</table>

</td></tr>
<tr><td>

<div id="portfolio_container" style="position: relative;">

<?php if (count($_from = (array)$this->_tpl_vars['ports'])):
    foreach ($_from as $this->_tpl_vars['port']):
?>
  <div id="port_<?php echo $this->_tpl_vars['port']['ID']; ?>
" style="position: absolute;  line-height: 15px; height: 15px; left: 0px; top:<?php echo $this->_tpl_vars['port']['top']; ?>
px; border:1px solid #EEEEEE;">
  <table width="700">
  <tr>
    <td width="30%"><?php echo $this->_tpl_vars['port']['NAME']; ?>
</td>
    <td width="50%"><?php echo $this->_tpl_vars['port']['WEBSITE']; ?>
</td>
    <td width="20%"><div align="center"><a href="add_port.php?id=<?php echo $this->_tpl_vars['port']['ID']; ?>
">edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:jobsdel('<?php echo $this->_tpl_vars['port']['ID']; ?>
')">delete</a></div></td>
  </tr>
  </table>
  </div>
<?php endforeach; unset($_from); endif; ?>

</div>
</td></tr>
</table>

<?php if (count($this->_tpl_vars['ports'])): ?>
<script type="text/javascript">
<!--

// set proper category container height
document.getElementById('portfolio_container').style.height=<?php echo count($this->_tpl_vars['ids']); ?>
*25+'px';

<?php if ($this->_tpl_vars['catid']): ?>
SET_DHTML(CURSOR_MOVE);

// Array intended to reflect the order of the draggable items
var set = [<?php echo $this->_tpl_vars['setList']; ?>
];
var aaElts = new Array();

var dy      = 25;
var margTop;
var margLeft;
var posOld;

var i;
for ( i=0; i<set.length; i++ ) {
	ADD_DHTML( set[i] );
	aaElts[i] = eval('dd.elements.'+set[i]);
}
margTop = eval('dd.elements.'+set[0]+'.y');
margLeft = eval('dd.elements.'+set[0]+'.x');
<?php endif; ?>

//-->
</script>
<?php endif; ?>