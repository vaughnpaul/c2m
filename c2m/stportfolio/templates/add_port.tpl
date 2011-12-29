<LINK href="{$smarty.const.DOCROOT}css/upload.css" type=text/css rel=stylesheet> 
<style>
.imgdiv {ldelim}
	height: {$settings.resize_height}px;
	width: {$settings.resize_width}px;
	border-style: solid;
	border-width: 5px;
	border-color: #DEDFDE;
{rdelim}

.imgtitle {ldelim}
	width: {math equation="x-y" x=$settings.resize_width y="27"}px;
{rdelim}

.imgtitleedit {ldelim}
	width: {math equation="x+y" x=$settings.resize_width y="5"}px;
{rdelim}
</style>

<script language="javascript">
function check()
{ldelim}
	len = document.frm.Disabled.length;
	if (document.frm.title.value == "")
	{ldelim}
		alert("Please enter portfolio title");
		document.frm.title.focus();
		return false;
	{rdelim}
	
	if (len == 0)
	{ldelim}
		alert("Please add a category");
		document.frm.Enabled.focus();
		return false;
	
	{rdelim}
	return true;
{rdelim}

function getlist()
{ldelim}
	 len = document.frm.Disabled.length;
	 var str = "";
	 for(i=0;i<len;i++)
	 {ldelim}
	 	
		str = str + document.frm.Disabled.options[i].value + "-" ;
	 {rdelim}
	 
	 document.frm.cat.value = str;
{rdelim}


function MoveOption(objSourceElement, objTargetElement)    {ldelim}
//alert("hello");
        var aryTempSourceOptions = new Array();      
  var x = 0;                //looping through source element to find selected options  
      for (var i = 0; i < objSourceElement.length; i++) {ldelim}    
        if (objSourceElement.options[i].selected) {ldelim}       
         //need to move this option to target element         
       var intTargetLen = objTargetElement.length++;      
          objTargetElement.options[intTargetLen].text = objSourceElement.options[i].text;      
          objTargetElement.options[intTargetLen].value = objSourceElement.options[i].value; 
//var obchk=objTargetElement.options[intTargetLen].value
//document.addevents.chk.value+=obchk;
//document.addevents.chkcnt.value=objTargetElement.length;
//alert(objTargetElement.length);
        {rdelim}       
     else {ldelim}          
      //storing options that stay to recreate select element        
        var objTempValues = new Object();        
        objTempValues.text = objSourceElement.options[i].text;      
          objTempValues.value = objSourceElement.options[i].value;    
            aryTempSourceOptions[x] = objTempValues;       
         x++;          
  {rdelim}      
  {rdelim}                //resetting length of source    
    objSourceElement.length = aryTempSourceOptions.length;       
 //looping through temp array to recreate source select element    
    for (var i = 0; i < aryTempSourceOptions.length; i++) {ldelim}     
       objSourceElement.options[i].text = aryTempSourceOptions[i].text;    
        objSourceElement.options[i].value = aryTempSourceOptions[i].value;    
        objSourceElement.options[i].selected = false;       

 {rdelim}    {rdelim}    
 
var enabled = 0;

function enableWYSIWYG( obj, w, h, tb ) {ldelim}
	if ( !enabled ) {ldelim}
		var sBasePath = '{$smarty.const.DOCROOT}fckeditor/' ;
		var oFCKeditor = new FCKeditor( obj, w, h, tb ) ;
		oFCKeditor.BasePath	= sBasePath ;
		oFCKeditor.ReplaceTextarea() ;
	{rdelim}
	else {ldelim}
		alert( 'You have already WYSIWYG enabled' );
	{rdelim}
	enabled = 1;
{rdelim}
 


function editTitle( id ) {ldelim}
	var v = document.getElementById( 'imgtitle'+id ).innerHTML;
	var vb = document.getElementById( 'imgedita'+id ).innerHTML;
	var contentb = '<input id="imgeditvalueb'+id+'" type=text class="imgtitleedit" style="width:20px" value="'+vb+'">';
	var content = '<div style="position: absolute;"><input id="imgeditvalue'+id+'" type=text class="imgtitleedit" value="'+v+'"><br /><a href="javascript:saveTitle('+id+');"><b>save</b></a></div>';
	document.getElementById( 'label'+id ).innerHTML = content;
	document.getElementById( 'imgedita'+id ).innerHTML = contentb;
{rdelim}

function saveTitle( id ) {ldelim}
	var title = document.getElementById('imgeditvalue'+id).value;
	var order = document.getElementById('imgeditvalueb'+id).value;
	//var content = '<div id="imgtitle'+id+'" class="imgtitle">'+title+'</div><div id="imgedit'+id+'" class="imgedit"><a href="javascript: editTitle('+id+');"><b>edit</b></a></div>';
	//document.getElementById( 'label'+id ).innerHTML = content;
	makeQuery( 'ajax.php?action=saveTitle&title='+title+'&order='+order+'&id='+id );
{rdelim}

//--> 
</script>
<script type="text/javascript" src="{$smarty.const.DOCROOT}js/wz_dragdrop.js"></script>
<script type="text/javascript" src="{$smarty.const.DOCROOT}js/xmlhttp.js"></script>
<script type="text/javascript" src="{$smarty.const.DOCROOT}js/add_port.js"></script> 

<h1>{if $port.ID}Edit{else}Add{/if} Portfolio</h1>
{tabcontainer}
{tab caption='General'}
<script type="text/javascript" src="{$smarty.const.DOCROOT}fckeditor/fckeditor.js"></script> 

<form method="post" name="frm" enctype="multipart/form-data" ONSUBMIT="return check()">
<input type="hidden" NAME="id" value="{$port.ID}">
<table width="700" border="0" cellpadding="1" cellspacing="1">
  <tr>
    <td colspan="2" width="150">Title</td>
    <td width="550"><input name="title" type="text" class="textbox" id="title" value="{$port.NAME}"></td>
  </tr>
  <tr>
    <td colspan="2">Category</td>
    <td>
	  <table>
	  <tr>
	    <td width="16%" height="59" class="td">
		<select name="Enabled" size="5" multiple style="width: 100px;" class="textbox">
		{html_options values=$categoryValues output=$categoryTitles}
		</select>
		</td>
	    <td width="15%" class="td"><div align="center">
	        <input type="button" name="Disable" value=" &gt;&gt; " style="width: 50px;" onClick="MoveOption(this.form.Enabled, this.form.Disabled)">
	        <br>
	        <input type="button" name="Enable" value="&lt;&lt;" style="width: 50px;" onClick="MoveOption(this.form.Disabled, this.form.Enabled)">
	    </div></td>
	    <td>
		<select name="Disabled" size="5" multiple style="width: 100px;" class="textbox">
		{html_options values=$addedCategoryValues output=$addedCategoryTitles}
		</SELECT>
		<input type="hidden" name="cat">
		</td>
	  </tr>
	  </table>
    </td>
  </tr>
  <tr>
    <td colspan="2">Website</td>
    <td><input name="website" type="text" class="textbox" id="website" value="{$port.WEBSITE|default:'http://'}"></td>
  </tr>
  <!-- <tr>
    <td colspan="2">Image</td>
    <td><input name="upload" type="file" class="textbox" id="upload"></td>
  </tr> //-->
  <tr>
    <td colspan="3" valign="top">Description&nbsp;&nbsp;[ <a href="javascript:enableWYSIWYG('description','700', '300', 'port');">Use WYSIWYG Editor</a> ]</td>
  </tr>
  <tr>  
    <td colspan="3" valign="top" class="td">
	<textarea style="width: 500px; height: 200px;" name="description" class="textbox">{$port.DESCRIPTION}</textarea></td>
    </tr>
  <tr>
    <td colspan="2">Length</td>
    <td><input name="length" type="text" class="textbox" id="length" value="{$port.LENGTH|default:100}"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td><input name="submit" type="submit" class="button" value="Submit" onClick="getlist()">
    <input name="reset" type="reset" class="button" value="Reset"></td>
  </tr>
</table>
</form>

{/tab}

{tab caption='Images'}
<div id="imgcontainer">
	<div id="iframe" style="position: absolute; top: 0px; left: 0px; height: 50px;"><iframe id="uploadForm" src="upload.php?port_id={$port.ID}" frameborder="0" style="position: absolute; height: 50px; top: 0px; left: 0px;"></iframe></div>
	{$images}
</div>
{/tab}
{/tabcontainer}

<script type="text/javascript">
<!--

var nextTop = {$nextTop|intval};
var nextLeft = {$nextLeft|intval};

// set proper category container height
//document.getElementById('images').style.height={$port.images|@count}*25+'px';

SET_DHTML(CURSOR_MOVE);

// Array intended to reflect the order of the draggable items
var set;
var aaElts = new Array();

var dy      = {math equation="x+y" x=$settings.resize_height y="95"};
var dx      = {math equation="x+y" x=$settings.resize_width y="27"};
var margTop;
var margLeft;
var posOld;

{if $port.images|@count}
set = [{$setList}];
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