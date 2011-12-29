<script language="javascript">

function changeVarType() {ldelim}
	var type = document.editVariable.var_type.options[document.editVariable.var_type.selectedIndex].value;
	if ( type == 'link' ) {ldelim}
		document.getElementById('link_fields').style.display='block';
		document.getElementById('text_fields').style.display='none';
		document.getElementById('image_fields').style.display='none';
	{rdelim}
	else if ( type == 'text' ) {ldelim}
		document.getElementById('link_fields').style.display='none';
		document.getElementById('text_fields').style.display='block';
		document.getElementById('image_fields').style.display='none';
	{rdelim}
	else {ldelim}
		document.getElementById('link_fields').style.display='none';
		document.getElementById('text_fields').style.display='none';
		document.getElementById('image_fields').style.display='block';
	{rdelim}
{rdelim}
</script>

{if $action eq 'edit'}
<table width="600" border="0" cellpadding="1" cellspacing="1">
<tr><td colspan="4"><h1 style="width: 600px;">Add Variable</h1></td></tr>
<tr>
  <td colspan="4" width="100%">
	<form name="editVariable" method="post" enctype="multipart/form-data">
	<input name="action" value="save" type="hidden">
	<input type="hidden" name="id" value="{$variable.id}?>">
	<table width="100%" border="0" cellpadding="1" cellspacing="1">
	{if $errors|@count}
		<tr><td colspan="2" style="color: red;"><br />
		{foreach from=$errors item=error}
			{$error}<br />
		{/foreach}
		</td></tr>
	{/if}
	  <tr>
	    <td class="titles" width="200">&nbsp;Variable Name </td>
	    <td><input name="name" type="text" class="textbox" value="{$variable.name}"></td>
	  </tr>
	  <tr>
	    <td class="titles">&nbsp;Description </td>
	    <td><input name="description" type="text" class="textbox" value="{$variable.description}"></td>
	  </tr>
	  <tr>
	    <td class="titles">&nbsp;Type </td>
	    <td>
	    	<select name="var_type" class="textbox" onchange="javascript:changeVarType();">
	    	{html_options options=$typeOptions selected=$variable.type}
	    	</select>
		    </td>
<!--			    <td><select name="type" class="textbox"><option value="link">link</option><option value="text">text</option><option value="image">image</option></select></td>-->
		  </tr>
		</table>
		
		<div id="link_fields" style="position: relative;">
		<table width="100%" border="0" cellpadding="1" cellspacing="1">
		  <tr>
		    <td class="titles" width="200">&nbsp;Link Title </td>
		    <td><input name="link_title" type="text" class="textbox" value="{$variable.link_title}"></td>
		  </tr>
		  <tr>
		    <td class="titles">&nbsp;URL </td>
		    <td><input name="link_url" type="text" class="textbox" value="{$variable.link_url}"></td>
		  </tr>
		  <tr>
		    <td class="titles">&nbsp;Target </td>
		    <td>
	    	<select name="link_target" class="textbox">
	    	{html_options options=$targetOptions selected=$variable.link_target}
	    	</select>
			    </td>
			  </tr>
			</table>
			</div>
			
			<div id="text_fields" style="position: relative;">
			<table width="100%" border="0" cellpadding="1" cellspacing="1">
			  <tr>
			    <td class="titles" width="200">&nbsp;Text </td>
			    <td><textarea name="text" cols="30" rows="5" class="textbox" id="catdesc">{$variable.text_text}</textarea></td>
			  </tr>
			</table>
			</div>

			<div id="image_fields" style="position: relative;">
			<table width="100%" border="0" cellpadding="1" cellspacing="1">
			  <tr>
			    <td class="titles" width="200">&nbsp;Upload Image </td>
			    <td><input type="file" name="image" class="textbox"></td>
			  </tr>
			  <tr>
			    <td class="titles">&nbsp;Alternate Text </td>
			    <td><input name="image_alt" type="text" class="textbox" value="{$variable.image_alt}"></td>
			  </tr>
			{if $variable.image}
			  <tr>
			    <td class="titles" width="200">&nbsp;Current Image </td>
			    <td><img src="{$variable.image|substr:1}"></td>
			  </tr>
			{/if}
			</table>
			</div>
			
			<script type="text/javascript">changeVarType();</script>

			
			<table width="100%" border="0" cellpadding="1" cellspacing="1">
			  <tr>
			    <td width="200">&nbsp;</td>
			    <td>
			    	<input name="submit1" type="submit" class="textbox" value="Save">
			    	<input name="Submit2" type="reset" class="textbox" value="Reset">
			    	<input name="Submit3" type="button" class="textbox" onclick="javascript:document.location.href='variables.php';" value="Cancel">
			    </td>
			  </tr>
			</table>
      		
      		</form>
      </td>
    </tr>
  </table>
{else}
<table width="600" border="0" cellpadding="1" cellspacing="1">
<tr><td colspan="4"><h1 style="width: 600px;">Variables</h1></td></tr>
<tr>
  <td colspan="4" width="100%">
	{if $variables}
	      <table width="100%">
		  <tr>
		    <td width="12%" height="22" bgcolor="#F4F4F4" class="titles">Name</td>
		    <td width="14%" bgcolor="#F4F4F4" class="titles">Type</td>
		    <td bgcolor="#F4F4F4" class="titles">Description</td>
		    <td width="1%" bgcolor="#F4F4F4" class="titles">Action</td>
		  </tr>
		  {foreach from=$variables item=row}
		  <tr><td>{$row.name}</td><td>{$row.type}</td><td>{$row.description}</td><td><a href='variables.php?action=edit&id={$row.id}'>edit</a>&nbsp;&nbsp;<a href='#' onclick='javascript: if (confirm("Are you really want to delete this variable?")) document.location.href="variables.php?action=delete&id={$row.id}";'>delete</a></tr>
		  {/foreach}
		  </table><br />
	{else}
		<br />No variables currently defined
	{/if}
      </td>
    </tr>
  </table>
{/if}