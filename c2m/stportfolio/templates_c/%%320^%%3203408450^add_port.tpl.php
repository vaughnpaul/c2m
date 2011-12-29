<?php /* Smarty version 2.6.2, created on 2010-09-27 16:48:19
         compiled from add_port.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'add_port.tpl', 12, false),array('function', 'html_options', 'add_port.tpl', 147, false),array('block', 'tabcontainer', 'add_port.tpl', 129, false),array('block', 'tab', 'add_port.tpl', 130, false),array('modifier', 'default', 'add_port.tpl', 167, false),array('modifier', 'intval', 'add_port.tpl', 205, false),array('modifier', 'count', 'add_port.tpl', 209, false),)), $this); ?>
<LINK href="<?php echo @constant('DOCROOT'); ?>
css/upload.css" type=text/css rel=stylesheet> 
<style>
.imgdiv {
	height: <?php echo $this->_tpl_vars['settings']['resize_height']; ?>
px;
	width: <?php echo $this->_tpl_vars['settings']['resize_width']; ?>
px;
	border-style: solid;
	border-width: 5px;
	border-color: #DEDFDE;
}

.imgtitle {
	width: <?php echo smarty_function_math(array('equation' => "x-y",'x' => $this->_tpl_vars['settings']['resize_width'],'y' => '27'), $this);?>
px;
}

.imgtitleedit {
	width: <?php echo smarty_function_math(array('equation' => "x+y",'x' => $this->_tpl_vars['settings']['resize_width'],'y' => '5'), $this);?>
px;
}
</style>

<script language="javascript">
function check()
{
	len = document.frm.Disabled.length;
	if (document.frm.title.value == "")
	{
		alert("Please enter portfolio title");
		document.frm.title.focus();
		return false;
	}
	
	if (len == 0)
	{
		alert("Please add a category");
		document.frm.Enabled.focus();
		return false;
	
	}
	return true;
}

function getlist()
{
	 len = document.frm.Disabled.length;
	 var str = "";
	 for(i=0;i<len;i++)
	 {
	 	
		str = str + document.frm.Disabled.options[i].value + "-" ;
	 }
	 
	 document.frm.cat.value = str;
}


function MoveOption(objSourceElement, objTargetElement)    {
//alert("hello");
        var aryTempSourceOptions = new Array();      
  var x = 0;                //looping through source element to find selected options  
      for (var i = 0; i < objSourceElement.length; i++) {    
        if (objSourceElement.options[i].selected) {       
         //need to move this option to target element         
       var intTargetLen = objTargetElement.length++;      
          objTargetElement.options[intTargetLen].text = objSourceElement.options[i].text;      
          objTargetElement.options[intTargetLen].value = objSourceElement.options[i].value; 
//var obchk=objTargetElement.options[intTargetLen].value
//document.addevents.chk.value+=obchk;
//document.addevents.chkcnt.value=objTargetElement.length;
//alert(objTargetElement.length);
        }       
     else {          
      //storing options that stay to recreate select element        
        var objTempValues = new Object();        
        objTempValues.text = objSourceElement.options[i].text;      
          objTempValues.value = objSourceElement.options[i].value;    
            aryTempSourceOptions[x] = objTempValues;       
         x++;          
  }      
  }                //resetting length of source    
    objSourceElement.length = aryTempSourceOptions.length;       
 //looping through temp array to recreate source select element    
    for (var i = 0; i < aryTempSourceOptions.length; i++) {     
       objSourceElement.options[i].text = aryTempSourceOptions[i].text;    
        objSourceElement.options[i].value = aryTempSourceOptions[i].value;    
        objSourceElement.options[i].selected = false;       

 }    }    
 
var enabled = 0;

function enableWYSIWYG( obj, w, h, tb ) {
	if ( !enabled ) {
		var sBasePath = '<?php echo @constant('DOCROOT'); ?>
fckeditor/' ;
		var oFCKeditor = new FCKeditor( obj, w, h, tb ) ;
		oFCKeditor.BasePath	= sBasePath ;
		oFCKeditor.ReplaceTextarea() ;
	}
	else {
		alert( 'You have already WYSIWYG enabled' );
	}
	enabled = 1;
}
 


function editTitle( id ) {
	var v = document.getElementById( 'imgtitle'+id ).innerHTML;
	var vb = document.getElementById( 'imgedita'+id ).innerHTML;
	var contentb = '<input id="imgeditvalueb'+id+'" type=text class="imgtitleedit" style="width:20px" value="'+vb+'">';
	var content = '<div style="position: absolute;"><input id="imgeditvalue'+id+'" type=text class="imgtitleedit" value="'+v+'"><br /><a href="javascript:saveTitle('+id+');"><b>save</b></a></div>';
	document.getElementById( 'label'+id ).innerHTML = content;
	document.getElementById( 'imgedita'+id ).innerHTML = contentb;
}

function saveTitle( id ) {
	var title = document.getElementById('imgeditvalue'+id).value;
	var order = document.getElementById('imgeditvalueb'+id).value;
	//var content = '<div id="imgtitle'+id+'" class="imgtitle">'+title+'</div><div id="imgedit'+id+'" class="imgedit"><a href="javascript: editTitle('+id+');"><b>edit</b></a></div>';
	//document.getElementById( 'label'+id ).innerHTML = content;
	makeQuery( 'ajax.php?action=saveTitle&title='+title+'&order='+order+'&id='+id );
}

//--> 
</script>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/wz_dragdrop.js"></script>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/xmlhttp.js"></script>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
js/add_port.js"></script> 

<h1><?php if ($this->_tpl_vars['port']['ID']): ?>Edit<?php else: ?>Add<?php endif; ?> Portfolio</h1>
<?php $this->_tag_stack[] = array('tabcontainer', array()); smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<?php $this->_tag_stack[] = array('tab', array('caption' => 'General')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<script type="text/javascript" src="<?php echo @constant('DOCROOT'); ?>
fckeditor/fckeditor.js"></script> 

<form method="post" name="frm" enctype="multipart/form-data" ONSUBMIT="return check()">
<input type="hidden" NAME="id" value="<?php echo $this->_tpl_vars['port']['ID']; ?>
">
<table width="700" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td colspan="2" width="150">Title</td>
    <td width="550"><input name="title" type="text" class="textbox" id="title" value="<?php echo $this->_tpl_vars['port']['NAME']; ?>
"></td>
  </tr>
  <tr>
    <td colspan="2">Category</td>
    <td>
	  <table>
	  <tr>
	    <td width="16%" height="59" class="td">
		<select name="Enabled" size="5" multiple style="width: 100px;" class="textbox">
		<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['categoryValues'],'output' => $this->_tpl_vars['categoryTitles']), $this);?>

		</select>
		</td>
	    <td width="15%" class="td"><div align="center">
	        <input type="button" name="Disable" value=" &gt;&gt; " style="width: 50px;" onClick="MoveOption(this.form.Enabled, this.form.Disabled)">
	        <br>
	        <input type="button" name="Enable" value="&lt;&lt;" style="width: 50px;" onClick="MoveOption(this.form.Disabled, this.form.Enabled)">
	    </div></td>
	    <td>
		<select name="Disabled" size="5" multiple style="width: 100px;" class="textbox">
		<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['addedCategoryValues'],'output' => $this->_tpl_vars['addedCategoryTitles']), $this);?>

		</SELECT>
		<input type="hidden" name="cat">
		</td>
	  </tr>
	  </table>
    </td>
  </tr>
  <tr>
    <td colspan="2">Website</td>
    <td><input name="website" type="text" class="textbox" id="website" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['port']['WEBSITE'])) ? $this->_run_mod_handler('default', true, $_tmp, 'http://') : smarty_modifier_default($_tmp, 'http://')); ?>
"></td>
  </tr>
  <!-- <tr>
    <td colspan="2">Image</td>
    <td><input name="upload" type="file" class="textbox" id="upload"></td>
  </tr> //-->
  <tr>
    <td colspan="3" valign="top">Description&nbsp;&nbsp;[ <a href="javascript:enableWYSIWYG('description','700', '300', 'port');">Use WYSIWYG Editor</a> ]</td>
  </tr>
  <tr>  
    <td colspan="3" valign="top" class="td">
	<textarea style="width: 500px; height: 200px;" name="description" class="textbox"><?php echo $this->_tpl_vars['port']['DESCRIPTION']; ?>
</textarea></td>
    </tr>
  <tr>
    <td colspan="2">Length</td>
    <td><input name="length" type="text" class="textbox" id="length" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['port']['LENGTH'])) ? $this->_run_mod_handler('default', true, $_tmp, 100) : smarty_modifier_default($_tmp, 100)); ?>
"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td><input name="submit" type="submit" class="button" value="Submit" onClick="getlist()">
    <input name="reset" type="reset" class="button" value="Reset"></td>
  </tr>
</table>
</form>

<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('tab', array('caption' => 'Images')); smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat=true);while ($_block_repeat) { ob_start(); ?>
<div id="imgcontainer">
	<div id="iframe" style="position: absolute; top: 0px; left: 0px; height: 50px;"><iframe id="uploadForm" src="upload.php?port_id=<?php echo $this->_tpl_vars['port']['ID']; ?>
" frameborder="0" style="position: absolute; height: 50px; top: 0px; left: 0px;"></iframe></div>
	<?php echo $this->_tpl_vars['images']; ?>

</div>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tab($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>
<?php $this->_block_content = ob_get_contents(); ob_end_clean(); echo smarty_block_tabcontainer($this->_tag_stack[count($this->_tag_stack)-1][1], $this->_block_content, $this, $_block_repeat=false); }  array_pop($this->_tag_stack); ?>

<script type="text/javascript">
<!--

var nextTop = <?php echo ((is_array($_tmp=$this->_tpl_vars['nextTop'])) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp)); ?>
;
var nextLeft = <?php echo ((is_array($_tmp=$this->_tpl_vars['nextLeft'])) ? $this->_run_mod_handler('intval', true, $_tmp) : intval($_tmp)); ?>
;

// set proper category container height
//document.getElementById('images').style.height=<?php echo count($this->_tpl_vars['port']['images']); ?>
*25+'px';

SET_DHTML(CURSOR_MOVE);

// Array intended to reflect the order of the draggable items
var set;
var aaElts = new Array();

var dy      = <?php echo smarty_function_math(array('equation' => "x+y",'x' => $this->_tpl_vars['settings']['resize_height'],'y' => '95'), $this);?>
;
var dx      = <?php echo smarty_function_math(array('equation' => "x+y",'x' => $this->_tpl_vars['settings']['resize_width'],'y' => '27'), $this);?>
;
var margTop;
var margLeft;
var posOld;

<?php if (count($this->_tpl_vars['port']['images'])): ?>
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