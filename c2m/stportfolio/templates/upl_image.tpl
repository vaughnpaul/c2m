<div class="contdiv" id='image{$image.id}' style="position: absolute; top: {$top}px; left: {$left}px; width: {math equation="x+y" x=$settings.resize_width y="15"}px; height: {math equation="x+y" x=$settings.resize_height y="65"}px;">
<table cellspacing="1" cellpadding="0">
<tr>
	<td><span style="font-family: Courier; font-size:35px; font-weight: bold; color: #DEDFDE"><div id="imgedita{$image.id}">{$image._order}</div></span></td>
	<td valign="bottom" align="right"><a href="#" onclick="javascript: if( confirm('Are you really want to delete this image?') ) {ldelim} makeQuery( 'ajax.php?action=deleteImage&id={$image.id}&port_id={$image.port_id}', 'get' ); {rdelim} return false;"><b>delete</b></a></td>
</tr>
<tr>
	<td colspan="2"><div class="imgdiv"><img src="{$smarty.const.DOCROOT}{$image.img_thumb}"></div></td>
</tr>
</table>

<div id="label{$image.id}" style="position: relative;">&nbsp;
	<div id="imgtitle{$image.id}" class="imgtitle">{$image.title}</div>
	<div id="imgedit{$image.id}" class="imgedit"><a href="#" onclick="javascript: editTitle('{$image.id}'); return false;"><b>edit</b></a></div>
</div>
</div>