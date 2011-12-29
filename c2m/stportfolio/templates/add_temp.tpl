{capture name='variables'}
{include file="template_vars.tpl"}
{/capture}

<h1>Add Template</h1>
<form action="" method="post" name="frmtemp">
{tabcontainer}
{tab caption='Listing Template'}
<table>
<tr><td valign="top">
  <table border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="3" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th scope="row">Template name </th>
      <td colspan="2"><input type="text" name="tname"></td>
    </tr>
    <tr>
      <th colspan="3" scope="row">
	  <textarea name="tdesc" cols="50" rows="10"></textarea></th>
    </tr>
    <tr>
      <th colspan="3" scope="row"><input type="submit" name="submittemp" value="Add Listing Template"> </th>
    </tr>
  </table>
</td><td valign="top">

{$smarty.capture.variables}

</td></tr></table>
{/tab}
{tab caption='Detail Template'}
<table>
<tr><td valign="top">
  <table border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <th colspan="3" scope="row">&nbsp;</th>
    </tr>
    <tr>
      <th scope="row">Template name </th>
      <td colspan="2"><input type="text" name="dname"></td>
    </tr>
    <tr>
      <th colspan="3" scope="row">
	  <textarea name="ddesc" cols="50" rows="10"></textarea></th>
    </tr>
    <tr>
      <th colspan="3" scope="row"><input type="submit" name="submitdetail" value="Add Detail Template"> </th>
    </tr>
  </table>
</td><td valign="top">

{$smarty.capture.variables}

</td></tr></table>
{/tab}
{/tabcontainer}
</form>