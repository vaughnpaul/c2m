<?php /* Smarty version 2.6.2, created on 2010-09-27 16:51:26
         compiled from upl_image.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'upl_image.tpl', 1, false),)), $this); ?>
<div class="contdiv" id='image<?php echo $this->_tpl_vars['image']['id']; ?>
' style="position: absolute; top: <?php echo $this->_tpl_vars['top']; ?>
px; left: <?php echo $this->_tpl_vars['left']; ?>
px; width: <?php echo smarty_function_math(array('equation' => "x+y",'x' => $this->_tpl_vars['settings']['resize_width'],'y' => '15'), $this);?>
px; height: <?php echo smarty_function_math(array('equation' => "x+y",'x' => $this->_tpl_vars['settings']['resize_height'],'y' => '65'), $this);?>
px;">
<table cellspacing="1" cellpadding="0">
<tr>
	<td><span style="font-family: Courier; font-size:35px; font-weight: bold; color: #DEDFDE"><div id="imgedita<?php echo $this->_tpl_vars['image']['id']; ?>
"><?php echo $this->_tpl_vars['image']['_order']; ?>
</div></span></td>
	<td valign="bottom" align="right"><a href="#" onclick="javascript: if( confirm('Are you really want to delete this image?') ) { makeQuery( 'ajax.php?action=deleteImage&id=<?php echo $this->_tpl_vars['image']['id']; ?>
&port_id=<?php echo $this->_tpl_vars['image']['port_id']; ?>
', 'get' ); } return false;"><b>delete</b></a></td>
</tr>
<tr>
	<td colspan="2"><div class="imgdiv"><img src="<?php echo @constant('DOCROOT');  echo $this->_tpl_vars['image']['img_thumb']; ?>
"></div></td>
</tr>
</table>

<div id="label<?php echo $this->_tpl_vars['image']['id']; ?>
" style="position: relative;">&nbsp;
	<div id="imgtitle<?php echo $this->_tpl_vars['image']['id']; ?>
" class="imgtitle"><?php echo $this->_tpl_vars['image']['title']; ?>
</div>
	<div id="imgedit<?php echo $this->_tpl_vars['image']['id']; ?>
" class="imgedit"><a href="#" onclick="javascript: editTitle('<?php echo $this->_tpl_vars['image']['id']; ?>
'); return false;"><b>edit</b></a></div>
</div>
</div>