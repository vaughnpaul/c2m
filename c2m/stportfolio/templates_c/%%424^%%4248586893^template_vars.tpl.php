<?php /* Smarty version 2.6.2, created on 2010-09-27 16:47:00
         compiled from template_vars.tpl */ ?>
<script type="text/javascript">
function addVariable( dest, name ) {
    var destination = document.getElementById( dest );
    var addValue = '{'+name+'}';

    //IE support
    if (document.selection) {
        destination.focus();
        sel = document.selection.createRange();
        sel.text = addValue;
        //document.sqlform.insert.focus();
    }
    //MOZILLA/NETSCAPE support
    else if (destination.selectionStart || destination.selectionStart == "0") {
        var startPos = destination.selectionStart;
        var endPos = destination.selectionEnd;
        var oldValue = destination.value;

        destination.value = oldValue.substring(0, startPos) + addValue + oldValue.substring(endPos, oldValue.length);
    } else {
        destination.value += addValue;
    }
    
}
</script>

<table border=0>
    <tr>
      <th colspan="2">&nbsp;</th>
    </tr>
	<tr><th colspan="2">Variables</tr>
    <tr>
      <td height="19" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '<?php echo $this->_tpl_vars['dest']; ?>
', 'title' ); return false;">{title}</a></td>
      <td>-&nbsp;Title of the portfolio.</td>
    </tr>
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '<?php echo $this->_tpl_vars['dest']; ?>
', 'image' ); return false;">{image}</a></td>
      <td>-&nbsp;Show  image of the portfolio.</td>
    </tr>
    <tr>
      <td height="19" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '<?php echo $this->_tpl_vars['dest']; ?>
', 'caption' ); return false;">{caption}</a></td>
      <td>-&nbsp;Displays the caption for the image.</td>
    </tr>  <tr>
      <td height="19" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '<?php echo $this->_tpl_vars['dest']; ?>
', 'description' ); return false;">{description}</a></td>
      <td>-&nbsp;Displays the description of the portfolio.</td>
    </tr>
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '<?php echo $this->_tpl_vars['dest']; ?>
', 'readmore' ); return false;">{readmore}</a></td>
      <td>-&nbsp;Displays read more image of the portfolio. </td>
    </tr>
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '<?php echo $this->_tpl_vars['dest']; ?>
', 'thumbnails' ); return false;">{thumbnails}</a></td>
      <td>-&nbsp;Displays any additional thumbnail images. </td>
    </tr>
    
    <?php if (count($_from = (array)$this->_tpl_vars['variables'])):
    foreach ($_from as $this->_tpl_vars['var']):
?>
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '<?php echo $this->_tpl_vars['dest']; ?>
', '<?php echo $this->_tpl_vars['var']['name']; ?>
' ); return false;">{<?php echo $this->_tpl_vars['var']['name']; ?>
}</a></td>
      <td>-&nbsp;<?php echo $this->_tpl_vars['var']['description']; ?>
</td>
    </tr>
    <?php endforeach; unset($_from); endif; ?>
</table>