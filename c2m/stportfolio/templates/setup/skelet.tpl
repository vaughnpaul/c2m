<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>{$title}</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="css/stylesheet.css" type=text/css rel=stylesheet>
<SCRIPT src="js/chrome.js" type=text/javascript></SCRIPT>

<SCRIPT src="js/tabber.js" type=text/javascript></SCRIPT>
<LINK media=screen href="example.css" type=text/css rel=stylesheet>
<LINK media=print href="example-print.css" type=text/css rel=stylesheet>

<SCRIPT type=text/javascript>
document.write('<style type="text/css">.tabber{ldelim}display:none;{rdelim}<\/style>');
</SCRIPT>

<STYLE type=text/css>
.style1 {ldelim}
	COLOR: #000000
{rdelim}
.style5 {ldelim}
	COLOR: #003366
{rdelim}
</STYLE>
</HEAD>

<BODY>

<div id="progress" style="position: absolute; top:105px; left:40px; display:none; color:red;"><img src="{$smarty.const.DOCROOT}images/indicator.gif" /></div>
<P style="background-color:#015b8f; padding:0px" align=left><img src="images/rounded2.jpg"></P> 
<DIV id=chromemenu>
<UL>
  <LI><div>Installation :: Step {$smarty.request.step}</div></li>

</UL>
</DIV>



<DIV id=content>
<BR>
<DIV style="MARGIN-LEFT: 25px; WIDTH: 80%">
<BR>
{include file=$bodyTemplate}
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