<script language="javascript">
function poptable() {ldelim}
	chldwin=window.open("colors.php?clid=1",'newwindow','toolbar=0,top=300,left=250,width=550,height=100,scrollbars=yes');
{rdelim}

var showing;

function toggle( what ) {ldelim}
	var buttonTitle = '';
	var html;

	if ( what == showing ) {ldelim}
		if ( document.getElementById('hc').style.display=='block' ) {ldelim}
			document.getElementById('hc').style.display='none';
			buttonTitle = 'Show';
		{rdelim}
		else {ldelim}
			document.getElementById('hc').style.display='block';
			buttonTitle = 'Hide';
		{rdelim}
		
	{rdelim}
	else {ldelim}
		buttonTitle = 'Hide';
		document.getElementById('hc').style.display='block';
	{rdelim}

	document.getElementById('hc').innerHTML = document.getElementById(what).innerHTML;
	
	if ( what == 'integration' ) {ldelim}
		document.getElementById('integrationbutton').innerHTML = buttonTitle+' integration code';
		document.getElementById('htaccessbutton').innerHTML = 'Show .htaccess code';
	{rdelim}
	else {ldelim}
		document.getElementById('integrationbutton').innerHTML = 'Show integration code';
		document.getElementById('htaccessbutton').innerHTML = buttonTitle+' .htaccess code';
	{rdelim}
		
	showing = what;
	
{rdelim}
</script>
<h1>Settings</h1>

<form method="post" enctype="multipart/form-data" style="margin: 0px; padding: 0px;">
{tabcontainer}
{tab caption='Main Settings'}
<div id="integration" style="position: absolute; top: 0px; left: 0px; display: none;">
<pre>
&lt;?php 
include("{$integrationCode}");
?&gt;
</pre>
</div>

<div id="htaccess" style="position: absolute; top: 0px; left: 0px; display: none;">
<pre>{$htaccessCode}</pre>
</div>
<table border="0" cellpadding="0" cellspacing="0">
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td width="181">{$msg}</td>
    <td width="314">{if $settings.set_readme}<img src="{$docroot}{$settings.set_readme}">{/if}</td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td nowrap class="td">Upload a &quot;read more button&quot;</td>
    <td><input name="fupload" type="file" class="textbox" ></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td bgcolor="#F0F0F0"><input name="upload" type="submit" class="button" value="Upload"> 
      <strong>(to upload readmore button click here) </strong></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td>{$msg2}</td>
    <td>{if $settings.set_logo}<img src="{$docroot}{$settings.set_logo}" />{/if}</td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td nowrap="nowrap" class="td">Upload a company logo </td>
    <td><input name="fupload2" type="file" class="textbox"></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td bgcolor="#F0F0F0"><input name="upload2" type="submit" class="button" value="Upload" />
        <strong>(to upload readmore button click here) </strong></td>
  </tr>
  <tr bordercolor="#F0F0F0" bgcolor="#F0F0F0">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="td">Link color </td>
    <td><input  name="lclass" type="text" class="textbox" value="{$settings.set_lclass}"></td>
  </tr>
  <tr>
    <td class="td">Link hover color </td>
    <td><input name="hclass" type="text" class="textbox" value="{$settings.set_hclass}"></td>
  </tr>
  <tr>
    <td class="td">Admin password </td>
    <td>     <input type="password" class="textbox" name="apass" value="{$admin_password}" readonly> </td>
  </tr>
  <tr>
    <td class="td">Max. Image Width</td>
    <td><input type="text" class="textbox" name="set_imagew" value="{$settings.set_imagew}" />    </td>
  </tr>
  <tr>
    <td class="td">Max. Image Height</td>
    <td><input type="text" class="textbox" name="set_imageh" value="{$settings.set_imageh}" />    </td>
  </tr>
  <tr>
    <td class="td">Max. Thumbnail Width</td>
    <td><input type="text" class="textbox" name="resize_width" value="{$settings.resize_width}"> </td>
  </tr>
  <tr>
    <td class="td">Max. Thumbnail Height</td>
    <td><input type="text" class="textbox" name="resize_height" value="{$settings.resize_height}"> </td>
  </tr>
  <tr>
    <td class="td">Thumbs per row </td>
    <td><input type="text" class="textbox" name="set_maxthumbs" value="{$settings.set_maxthumbs}" />    </td>
  </tr>
  <tr>
    <td class="td">Entries per page </td>
    <td>  <input type="text" class="textbox" name="entry" value="{$perpage}"> </td>
  </tr>
  <tr>
    <td class="td" valign="top">
    	Inclusion Script <br />
    	[ <a href="#" id="htaccessbutton" onclick="javascript: toggle('htaccess');">Show .htaccess code</a> ]<br />
    	[ <a href="#" id="integrationbutton" onclick="javascript: toggle('integration');">Show integration code</a> ]<br />    </td>
    <td valign="top">
    	<input type="text" name="inclusion_script" value="{$settings.inclusion_script}">
    	<div id='hc' style="display: none; border: 1px solid black; width: 500px; overflow: scroll;">
    	<pre>{$htaccessCode}</pre>
    	</div>    </td>
  </tr>
  <tr>
    <td><div align="center">
    </div>      <div align="center">
      </div></td>
    <td><input name="submit1" type="submit" class="button" value="Update"></td>
  </tr>
</table>
{/tab}

{tab caption='Header Settings'}
<table border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td class="td">Include category header </td>
    <td><input name="cat" type="checkbox" id="cat" value="category" {if $settings.set_cat eq 1}checked{/if}></td>
  </tr>
  <tr>
    <td align="right" class="td">Choose Color : &nbsp;&nbsp;</td>
    <td width="166" align="left"><a href="#" onClick="poptable()"><div style="border: 1px solid black; background-color: {$settings.set_hcolor}; color: {$settings.set_hcolor}; width:20%">&nbsp;</div></a>
	</td>
  </tr>
  <td height="27" align="right" class="td">Font : &nbsp;&nbsp; </td>
      <td><select name="hfont" class="drop1">
          <option value="{$settings.set_htext}">{$settings.set_htext}</option>
          <option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
          <option value="Courier New, Courier, mono">Courier New, Courier, mono</option>
          <option value="Times New Roman, Times, serif">Times New Roman, Times, serif</option>
          <option value="Verdana, Arial, Helvetica, sans-serif">Verdana, Arial, Helvetica, sans-serif</option>
          <option value="Tahoma">Tahoma</option>
          <option value="Impact">Impact</option>
      </select></td>
  </tr><tr>
    <td height="27" align="right" class="td">Size : &nbsp;&nbsp; </td>
    <td><select name="hsize" class="drop1">
        <option value="{$settings.set_hsize}">{$settings.set_hsize}</option>
        <option value="9px">9px</option>
        <option value="10px">10px</option>
        <option value="12px">12px</option>
        <option value="14px">14px</option>
        <option value="16px">16px</option>
        <option value="24px">24px</option>
        <option value="36px">36px</option>
        <option value="inherit">inherit</option>
        <option value="large">large</option>
        <option value="larger">larger</option>
        <option value="medium">medium</option>
        <option value="small">small</option>
        <option value="smaller">smaller</option>
        <option value="x-large">x-large</option>
        <option value="x-small">x-small</option>
        <option value="xx-large">xx-large</option>
        <option value="xx-small">xx-small</option>
    </select></td>
  </tr>
  <tr>
    <td height="28" class="td">Category header alignment </td>
    <td><input name="align" type="radio" value="left" {if $settings.set_align eq "left"}checked{/if}>
    Left
      <input name="align" type="radio" value="center" {if $settings.set_align eq "center"}checked{/if}>
    Center
    <input name="align" type="radio" value="right" {if $settings.set_align eq "right"}checked{/if}>
    Right </td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="right" class="td"><div align="center">
      <input name="submit2" type="submit" id="submit" value="Update">
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
{/tab}
{/tabcontainer}
</form>