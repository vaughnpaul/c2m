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


function replaceDiv( oldDivId, newDivId, content ) {
	
	var div = document.getElementById(oldDivId);
	var oDiv = document.createElement( 'DIV' );
	
	oDiv.innerHTML = content;
	div.parentNode.replaceChild(oDiv.firstChild, div);
}


function sendForm( theForm, uri ) {
	var data = '';

	var formElements = theForm.elements;
	var numElements = theForm.elements.length;
	
	for ( var i = 0; i < numElements; i++ ) {
		data += theForm.elements[i].name+'='+theForm.elements[i].value+'&';
	}
	
	makeQuery( uri, 'post', data );
}


function saveOrder(what,catid) {
	var data = '',o;
	var action;
	if ( what == 'cat' ) {
		for ( i=0; i<aaElts.length; i++ ) {
			set[i] = aaElts[i].id;
			data += set[i]+'='+i+'&';
		}
		action = 'save_order';
	}
	else {
		for ( i=0; i<aaElts.length; i++ ) {
			set[i] = aaElts[i].id;
			o=aaElts.length-i;
			data += set[i]+'='+o+'&';
		}
		action = 'save_port_order&catid='+catid;		
	}
	
	makeQuery( 'ajax.php?action='+action, 'post', data );
}


function undoOrder() {
	for ( i=0; i<set.length; i++ ) {
		aaElts[i] = eval('dd.elements.'+set[i]);
		aaElts[i].moveTo( margLeft, margTop + i*dy );
	}	
}



function my_PickFunc()
{
    // Store position of the item about to be dragged
    // so we can interchange positions of items when the drag operation ends
    posOld = dd.obj.y;
}


function my_DropFunc()
{
    // Calculate the snap position which is closest to the drop coordinates
    var y = dd.obj.y+dy/2;
    y = Math.max(margTop, Math.min(y - (y-margTop)%dy, margTop + (aaElts.length-1)*dy));
    
    // Index of the new position within the spatial order of all items
    var i = (y-margTop)/dy;
    
    // Let the dropped item snap to position
    dd.obj.moveTo(margLeft, y);
    
}

function my_DragFunc()
{
    // Calculate the snap position which is closest to the drop coordinates
    var y = dd.obj.y+dy/2;
    y = Math.max(margTop, Math.min(y - (y-margTop)%dy, margTop + (aaElts.length-1)*dy));
    
    // Index of the new position within the spatial order of all items
    var i = (y-margTop)/dy;
    
    
	if ( i != (posOld-margTop)/dy ) 
	{
	    // Interchange the positions of the two items  
	    aaElts[i].moveTo(margLeft, posOld);
	    
	    // Update the array according to the changed succession of items
	    aaElts[(posOld-margTop)/dy] = aaElts[i];
	    aaElts[i] = dd.obj;
	    posOld = margTop+i*dy;
	}
	
	if ( dd.obj.x != margLeft )
		dd.obj.moveTo( margLeft, dd.obj.y);
}