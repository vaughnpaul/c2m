<?php /* Smarty version 2.6.2, created on 2010-09-27 14:48:42
         compiled from add_category.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'add_category.tpl', 95, false),)), $this); ?>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/wz_dragdrop.js"></script>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/xmlhttp.js"></script>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/reorder.js"></script>

<script type="text/javascript">
function jobsdel(id)
	{
	
	  var stat;
	  stat =  confirm(" The record will be permanently deleted");
	  
	  if(stat==true) {
	  if(id !="") {
  			//location.href="add_category.php?id="+id;
  			makeQuery( 'ajax.php?action=delete_category&id='+id, 'get' );
		}
	}
}

function newCategory() {
	document.getElementById('edit_cat_title').innerHTML='Add Category';
	document.editForm.id.value='';
	document.editForm.catname.value='';
	document.editForm.catdesc.value='';
	document.editForm.catname.focus();
}

function editCategory( id, name, description ) {
	document.getElementById('edit_cat_title').innerHTML='Edit Category';
	document.editForm.id.value=id;
	document.editForm.catname.value=name;
	document.editForm.catdesc.value=description;
	document.editForm.catname.focus();
}

</script>

<table border="0" cellpadding="0" cellspacing="0">
<tr><td valign="top" width="300">

<!--<div id="cat_title" class="title" style="border:1PX SOLID #055789; height: 22px; line-height: 22px; background-color: #F4F4F4;">&nbsp;Categories</div>-->
<h1 id="cat_title">Categories</h1>
<div style="margin: 3px;">
<table width="100%">
<tr>
	<td align="center"><span id="menu_saveorder"><a href="#" onclick="javascript:saveOrder('cat',0); return false;">Save Order</a></span></td>
	<td align="center"><span id="menu_undoorder"><a href="#" onclick="javascript:undoOrder(); return false;">Undo Order</a></span></td>
	<td align="center"><span id="menu_new"><a href="#" onclick="javascript:newCategory(); return false;">New Category</a></span></td>
</tr>
</table>
</div>
<div id="category_container" style="position: relative; width: 300px;">
<?php if (count($_from = (array)$this->_tpl_vars['categories'])):
    foreach ($_from as $this->_tpl_vars['category']):
?>
  <div id="cat_<?php echo $this->_tpl_vars['category']['ID']; ?>
" style="position: absolute;  line-height: 15px; height: 15px; left: 0px; top:<?php echo $this->_tpl_vars['category']['top']; ?>
px; border:1px solid #EEEEEE;">
  <table cellpadding="2" cellspacing="0">
  <tr>
  	<td width="100%"><?php echo $this->_tpl_vars['category']['NAME']; ?>
</td>
    <td width="40" class="td"><div align="center"><a href="#" onclick="javascript:makeQuery('ajax.php?action=edit_category&id=<?php echo $this->_tpl_vars['category']['ID']; ?>
','get'); return false;">edit</a></div></td>
    <td width="40"><div align="center"><a href="#" onclick="javascript:jobsdel('<?php echo $this->_tpl_vars['category']['ID']; ?>
'); return false;">delete</a></div></td>
  </tr>
  </table>
  </div>
<?php endforeach; unset($_from); endif; ?>
</div>

</td><td valign="top" width="10">&nbsp;
</td><td valign="top">

<form name="editForm" method="post" style="margin: 0px; padding: 0px;">
<input type="hidden" name="id" value="">
<table width="400" border="0" align="right" cellpadding="0" cellspacing="0">
<tr><td colspan="2"><h1 id="edit_cat_title">Add Category</h1></td></tR>
  <tr>
    <td class="titles">Category Name </td>
    <td><input name="catname" type="text" class="textbox"></td>
  </tr>
  <tr>
    <td class="titles" valign="top">Category Description </td>
    <td>
      <textarea name="catdesc" cols="30" rows="5" class="textbox" id="catdesc"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="submit" type="button" class="textbox" onclick="javascript:sendForm(document.editForm, 'ajax.php?action=save_category');" value="Submit">
    <input name="Submit2" type="reset" class="textbox" value="Reset"></td>
  </tr>
</table>
</form>
</td></tr>
</table>
<script type="text/javascript">
<!--

// set proper category container height
document.getElementById('category_container').style.height=<?php echo count($this->_tpl_vars['ids']); ?>
*25+'px';

SET_DHTML(CURSOR_MOVE);

// Array intended to reflect the order of the draggable items
var set;
var aaElts = new Array();

var dy      = 25;
var margTop;
var margLeft;
var posOld;

<?php if (@ ((is_array($_tmp=$this->_tpl_vars['ids'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
set = [<?php echo $this->_tpl_vars['setList']; ?>
];
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