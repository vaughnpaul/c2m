<h1 class="style1" style="text-align:left; background-color:#FFFFFF;">Admin Login</h1> 
<form name="form1" method="post">
  <table border="0" cellpadding="1" cellspacing="0">
  {if $error}
    <tr>
      <td height="30" colspan="2"><div align="center"><strong>{$error}</strong></div></td>
    </tr>
    {/if}
    <tr>
      <td class="title_s">User&nbsp;&nbsp;</td>
      <td width="64%" height="22"><input name="nuser" type="text" class="textbox" id="nuser"></td>
    </tr>
    <tr>
      <td class="title_s">Password&nbsp;&nbsp;</td>
      <td height="22"><input name="password" type="password" class="textbox" id="password"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td height="25"><input name="submit" type="submit" class="button" value="Login"></td>
    </tr>
  </table>
</form>