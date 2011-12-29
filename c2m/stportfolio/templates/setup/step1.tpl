<h1 id="cat_title">Step 1 - License</h1>

{if $error}
<table align='center'><tr><td><font size='4' color='#FF4444' face='Arial'>{$error}</font></td></tr></table>
{/if}

<table align="center">
<form method="post" action="">
<input type="hidden" name="step" value="{$nextStep}">
  <tr bgcolor="#FFFFFF">
    <td height="19" colspan="2">&nbsp;</td>
  </tr>
    <tr bgcolor="#FFFFFF">
      <td height="19"><div align="right"><strong class="td">Enter License Key: </strong></div></td>
      <td height="19"><input name="license" type="text" class="textbox" id="licence"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="19">&nbsp;</td>
      <td height="19"><input name="btnlicence" type="submit" class="button" id="btnlicence" value="Next >"></td>
    </tr>
</form>
</table>