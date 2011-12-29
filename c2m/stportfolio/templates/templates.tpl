<script language="javascript">
function frmsubmit() {ldelim}
	document.frmtemp.submit();
{rdelim}
</script>

<h1>Templates</h1>
<form method="post" name="frmtemp" style="padding: 0px; margin: 0px">
{tabcontainer}
{tab caption='Listing Templates'}
<table>
<tr><td valign="top">
  <table border="0" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="2" scope="row">Template Name </th>
      <td colspan="2">
      	<select name="template" onChange="frmsubmit();">
      	{html_options values=$tempValues output=$tempTitles selected=$template_id}
      	</select>      
      	<input type="submit" name="subtemp" value="Use this template"></td>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row">
	  <textarea name="tdesc" id="tdesc" cols="50" rows="10">{$tdesc}</textarea></th>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row"><input type="submit" name="submittemp" value="Save Template"> </th>
    </tr>
  </table>
</td><td valign="top">

{include file="template_vars.tpl" dest='tdesc'}

</td></tr></table>
{/tab}

{tab caption='Detailed Templates'}
<table>
<tr><td valign="top">
  <table border="0" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="2" scope="row">Template Name </th>
      <td colspan="2">
      	<select name="detail" onChange="frmsubmit();">
      	{html_options values=$detValues output=$detTitles selected=$detail_id}
      	</select>      
      	<input type="submit" name="subtemp" value="Use this template"></td>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row">
	  <textarea name="ddesc" id="ddesc" cols="50" rows="10">{$ddesc}</textarea></th>
    </tr>
    <tr>
      <th colspan="4" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th colspan="4" scope="row"><input type="submit" name="submitdet" value="Save Template"> </th>
    </tr>
  </table>
  
</td><td valign="top">

{include file="template_vars.tpl" dest='ddesc'}

</td></tr></table>
{/tab}
{/tabcontainer}
</form>