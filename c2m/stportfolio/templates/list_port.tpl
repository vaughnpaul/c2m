<script type="text/javascript" src="{$smarty.const.DOCROOT}js/wz_dragdrop.js"></script>
<script type="text/javascript" src="{$smarty.const.DOCROOT}js/xmlhttp.js"></script>
<script type="text/javascript" src="{$smarty.const.DOCROOT}js/reorder.js"></script>

<script type="text/javascript">

function jobsdel(id) {ldelim}
	
	var stat;
	stat =  confirm(" The record will be permanently deleted");
	if(stat==true) {ldelim}
		if(id !="") {ldelim}
			location.href="list_port.php?id="+id;
		{rdelim}
	{rdelim}
{rdelim}

function call_cat() {ldelim}
	
	document.frm.submit();

{rdelim}

</script>

<table width="700" border="0" cellpadding="0" cellspacing="0">
<tr><td valign="top">

<table width="100%" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td height="22" colspan="2" class="titles">
    	<form name = "frm" method="post" style="margin: 0px; padding: 0px;">List by Category
    	<select name="category" class="textbox" id="category" onChange="call_cat()">
    	{html_options values=$categoryValues output=$categoryTitles selected=$catid}
    	</select>
        </form>
	</td>
    <td height="22" class="titles">&nbsp;</td>
    <td height="22" class="titles"><div align="right"><a href="add_port.php">add portfolio</a> </div></td>
	<td align="right">{if $catid}<span id="menu_saveorder"><a href="#" onclick="javascript:saveOrder('port','{$catid}'); return false;">Save Order</a></span>&nbsp;&nbsp;&nbsp;&nbsp;<span id="menu_undoorder"><a href="#" onclick="javascript:undoOrder(); return false;">Undo Order</a></span>{else}Select a Category to save order{/if}</td>
  </tr>
<!--  <tr>
    <td height="22" colspan="5" bgcolor="#F4F4F4" class="titles"><div align="left">Category : {$catName}</div></td>
    </tr>
-->  <tr>
    <td width="20%" height="22" bgcolor="#F4F4F4" class="titles">Title</td>
    <td width="25%" bgcolor="#F4F4F4" class="titles" colspan=2 >Website</td>
    <td width="10%" bgcolor="#F4F4F4" class="titles"></td>
    <td width="20%" bgcolor="#F4F4F4">&nbsp;</td>
  </tr>
</table>

</td></tr>
<tr><td>

<div id="portfolio_container" style="position: relative;">

{foreach from=$ports item=port}
  <div id="port_{$port.ID}" style="position: absolute;  line-height: 15px; height: 15px; left: 0px; top:{$port.top}px; border:1px solid #EEEEEE;">
  <table width="700">
  <tr>
    <td width="30%">{$port.NAME}</td>
    <td width="50%">{$port.WEBSITE}</td>
    <td width="20%"><div align="center"><a href="add_port.php?id={$port.ID}">edit</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:jobsdel('{$port.ID}')">delete</a></div></td>
  </tr>
  </table>
  </div>
{/foreach}

</div>
</td></tr>
</table>

{if $ports|@count}
<script type="text/javascript">
<!--

// set proper category container height
document.getElementById('portfolio_container').style.height={$ids|@count}*25+'px';

{if $catid}
SET_DHTML(CURSOR_MOVE);

// Array intended to reflect the order of the draggable items
var set = [{$setList}];
var aaElts = new Array();

var dy      = 25;
var margTop;
var margLeft;
var posOld;

var i;
for ( i=0; i<set.length; i++ ) {ldelim}
	ADD_DHTML( set[i] );
	aaElts[i] = eval('dd.elements.'+set[i]);
{rdelim}
margTop = eval('dd.elements.'+set[0]+'.y');
margLeft = eval('dd.elements.'+set[0]+'.x');
{/if}

//-->
</script>
{/if}