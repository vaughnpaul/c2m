<?php /* Smarty version 2.6.2, created on 2010-09-27 14:39:13
         compiled from setup/skelet.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?php echo $this->_tpl_vars['title']; ?>
</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="css/stylesheet.css" type=text/css rel=stylesheet>
<SCRIPT src="js/chrome.js" type=text/javascript></SCRIPT>

<SCRIPT src="js/tabber.js" type=text/javascript></SCRIPT>
<LINK media=screen href="example.css" type=text/css rel=stylesheet>
<LINK media=print href="example-print.css" type=text/css rel=stylesheet>

<SCRIPT type=text/javascript>
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</SCRIPT>

<STYLE type=text/css>
.style1 {
	COLOR: #000000
}
.style5 {
	COLOR: #003366
}
</STYLE>
</HEAD>

<BODY>

<div id="progress" style="position: absolute; top:105px; left:40px; display:none; color:red;"><img src="<?php echo @constant('DOCROOT'); ?>
images/indicator.gif" /></div>
<P style="background-color:#015b8f; padding:0px" align=left><img src="images/rounded2.jpg"></P> 
<DIV id=chromemenu>
<UL>
  <LI><div>Installation :: Step <?php echo $_REQUEST['step']; ?>
</div></li>

</UL>
</DIV>



<DIV id=content>
<BR>
<DIV style="MARGIN-LEFT: 25px; WIDTH: 80%">
<BR>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['bodyTemplate'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</DIV>
<P>&nbsp;</P>
<P>&nbsp;</P>
<P>&nbsp;</P>
<P>&nbsp;</P>
<P><BR><BR></P>
<DIV style="BACKGROUND: url(images/chromebg8.gif) repeat-x 50% top; BORDER-BOTTOM: #cccccc 1px solid">
	<P class=style5><BR>ST Response v1.0. A Solve Technology Product<BR></P>
</DIV>
<P style="BACKGROUND-COLOR: #09658f">&nbsp;</P>
</DIV>
</BODY>
</HTML>