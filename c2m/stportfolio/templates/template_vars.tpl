<script type="text/javascript">
function addVariable( dest, name ) {ldelim}
    var destination = document.getElementById( dest );
    var addValue = '{ldelim}'+name+'{rdelim}';

    //IE support
    if (document.selection) {ldelim}
        destination.focus();
        sel = document.selection.createRange();
        sel.text = addValue;
        //document.sqlform.insert.focus();
    {rdelim}
    //MOZILLA/NETSCAPE support
    else if (destination.selectionStart || destination.selectionStart == "0") {ldelim}
        var startPos = destination.selectionStart;
        var endPos = destination.selectionEnd;
        var oldValue = destination.value;

        destination.value = oldValue.substring(0, startPos) + addValue + oldValue.substring(endPos, oldValue.length);
    {rdelim} else {ldelim}
        destination.value += addValue;
    {rdelim}
    
{rdelim}
</script>

<table border=0>
    <tr>
      <th colspan="2">&nbsp;</th>
    </tr>
	<tr><th colspan="2">Variables</tr>
    <tr>
      <td height="19" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '{$dest}', 'title' ); return false;">{ldelim}title{rdelim}</a></td>
      <td>-&nbsp;Title of the portfolio.</td>
    </tr>
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '{$dest}', 'image' ); return false;">{ldelim}image{rdelim}</a></td>
      <td>-&nbsp;Show  image of the portfolio.</td>
    </tr>
    <tr>
      <td height="19" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '{$dest}', 'caption' ); return false;">{ldelim}caption{rdelim}</a></td>
      <td>-&nbsp;Displays the caption for the image.</td>
    </tr>  <tr>
      <td height="19" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '{$dest}', 'description' ); return false;">{ldelim}description{rdelim}</a></td>
      <td>-&nbsp;Displays the description of the portfolio.</td>
    </tr>
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '{$dest}', 'readmore' ); return false;">{ldelim}readmore{rdelim}</a></td>
      <td>-&nbsp;Displays read more image of the portfolio. </td>
    </tr>
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '{$dest}', 'thumbnails' ); return false;">{ldelim}thumbnails{rdelim}</a></td>
      <td>-&nbsp;Displays any additional thumbnail images. </td>
    </tr>
    
    {foreach from=$variables item=var}
    <tr>
      <td height="20" class="header" valign="top"><a href="#" onclick="javasctipt: addVariable( '{$dest}', '{$var.name}' ); return false;">{ldelim}{$var.name}{rdelim}</a></td>
      <td>-&nbsp;{$var.description}</td>
    </tr>
    {/foreach}
</table>