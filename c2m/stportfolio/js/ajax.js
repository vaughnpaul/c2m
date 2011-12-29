function replaceDiv( oldDivId, newDivId, content ) {
	
	var div = document.getElementById(oldDivId);
	var oDiv = document.createElement( 'DIV' );
	
	oDiv.innerHTML = content;
	div.parentNode.replaceChild(oDiv.firstChild, div);
}

function showProgress( text ) {
	if ( !text )
		text = 'loading...';
	document.getElementById('progress').innerHTML = text;
	document.getElementById('progress').style.display='block';	
}

function hideProgress() {
	document.getElementById('progress').style.display='none';	
}

function makeQuery( uri, method, data ) {
	var req = new XML();
	req.url = uri;
	req.onload = function(text) {
		hideProgress();
		//try {
			//alert(text);
			eval(text);
		//}
		//catch(e) {
			//alert('There was an error trying execute server responce\r\n\r\n'+text);
		//}
		//redrawScreen();
	};
	
	
	showProgress( '<img src="images/indicator.gif" />&nbsp;loading...' );
	req.progress = function(){};
	
	if ( method == 'get' )
		req.GET();
	else
		req.POST(data);
}