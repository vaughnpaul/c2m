var USE_IFRAME = 0;
function XML(o){
	this.set = function(o){for(var i in o){this[i]=o[i]}};
	this.XMLHTTP_LOAD_COMPLETE = 4;
	this.XMLHTTP_HTTP_STATUS = 200;
	//this.progress = function(v){alert(v)};
	//this.onload = function(v){alert(v);return v};
	this.UA = function(){};
	this.onerr    = function(v){alert (v)};
	this.createXmlHttp = function(){
		if(typeof USE_IFRAME != 'undefined' && USE_IFRAME){
			return new IFRAMEHttpRequest()
		}
		var xmlhttp = false;
			this.MSXMLHTTP = false;
		try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			this.MSXMLHTTP = true;
	    }catch (e){
		try{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			this.MSXMLHTTP = true;
		}catch (E){xmlhttp = false;}
		}
	    if (!xmlhttp && typeof XMLHttpRequest != 'undefined'){xmlhttp = new XMLHttpRequest();}
		if (!xmlhttp){xmlhttp = new IFRAMEHttpRequest()}
		return xmlhttp;
	};
	this.GET = function(){
		var xmlhttp = this.createXmlHttp();
		var clone = this;
		var result = new Object();
		try {
			xmlhttp.open("GET", this.url, true);
			xmlhttp.onreadystatechange = function(){
				clone.progress('loading '+ clone.url + " " + xmlhttp.readyState);
				if (xmlhttp.readyState == clone.XMLHTTP_LOAD_COMPLETE){
					//clone.UA(xmlhttp);
					return clone.onload(xmlhttp.responseText);
				}
			}
			xmlhttp.send(null);
		} catch (e){this.onerr(e)}
	};
	this.POST = function(data){
		var xmlhttp = this.createXmlHttp();
		var clone = this;
		var result = new Object();
		try {
			xmlhttp.open("POST", this.url, true);
			
			try {
		      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		      xmlhttp.setRequestHeader("Content-length", data.length);
		      xmlhttp.setRequestHeader("Connection", "close");
			} catch (e){}
			
			xmlhttp.onreadystatechange = function(){
				clone.progress('loading '+ clone.url + " " + xmlhttp.readyState);
				if (xmlhttp.readyState == clone.XMLHTTP_LOAD_COMPLETE){
					return clone.onload(xmlhttp.responseText);
				}
			}
			xmlhttp.send(data);
		} catch (e){alert(e)}
	};

	if(o){for(var i in o){this[i]=o[i]}}
	return this;
}

function Counter(){
	if(!this.count){this.count = 1}else{this.count++}
	return this.count;
}

function getFrameDoc(id){
	var f = document.getElementById(id);
	var doc;
	if(document.frames){
		doc = document.frames[id].document;
	}
	if(!doc){doc = f.contentWindow.document}
	return doc;
}
function getFrameWin(id){
	var f = document.getElementById(id);
	var doc;
	if(document.frames){
		doc = document.frames[id]
	}
	if(!doc){doc = f.contentWindow}
	return doc;
}


function IFRAMEHttpRequest(){

	this.ifm = document.createElement("IFRAME");
	this.ifm.id = "IFRAME_LOADER_" + Counter();

	this.div = document.createElement("DIV")
	with(this.div.style){
		visibility="hidden";
		position="absolute";
		left="-10";
		top="-10";
		width="100";
		height="100";
	}
	this.div.appendChild(this.ifm);
	
	this.onreadystatechange = function(){};
	this._header = new Object();
	this.getResponseHeader = function(key){return this._header[key]};
	this.open = function(method,url,sync){
		this.method  = method;
		this.requestURL = url;
	};

	this.MAKE_ONLOAD_FUNC = function(xmlobj,frame_id){
		var IFOBJ = function(){this.set = function(o){for(var i in o){this[i]=o[i]}};return this};
		var ifload = new IFOBJ();
		ifload.set({
			xmlobj   : xmlobj,
			frame_id : frame_id
		});
		var _onload = function(ifload){
			if(ifload.xmlobj.method == "POST"){
				//alert(getFrameWin(ifload.frame_id).location.href);
			}
			ifload.xmlobj.readyState = 4;
			var doc = getFrameDoc(ifload.frame_id);
			var src = doc.body.innerHTML;
			src = src.replace(/<pre>/i,"").replace(/<\/pre>/i,"").
					replace(/&lt;/g,"<").replace(/&gt;/g,">").replace(/&amp;/g,'&');
			ifload.xmlobj.responseText = src;
			//var buf ="";for(var i in doc) {buf += i+"="+doc[i]+"<br>"}
			ifload.xmlobj._header["Last-Modified"] = doc.lastModified;
			ifload.xmlobj.onreadystatechange();
			if(ifload.xmlobj.method != "POST"){
				//document.body.removeChild(ifload.xmlobj.div);
			}
		};
		ifload.onload = function(){_onload(ifload)};
		return ifload.onload;
	};

	this._GET = function(){
		this.ifm.src = this.requestURL;
		//frmDoc = getFrameDoc(this.ifm.id);
		//frmDoc.location.replace("./" + this.requestURL);
		var func = this.MAKE_ONLOAD_FUNC(this,this.ifm.id);
		if (this.ifm.addEventListener){ 
			this.ifm.addEventListener('load', func, false)
		}else if(this.ifm.attachEvent){ 
			this.ifm.attachEvent('onload',func)
		}
		document.body.appendChild(this.div);
	};
	this._POST = function(query){
		document.body.appendChild(this.div);
		var form = document.createElement("FORM");
			form.method = "POST";
			form.action = this.requestURL;
			form.target = this.ifm.id;//this.ifm.id;
			
		var postVars = query.split("&");
		for ( postVar in postVars ) {
			var pv = postVars[postVar].split("=");
			var input = document.createElement("input");
			with(input){
				name = pv[0];
				value = pv[1]
			}
			form.appendChild(input);
		}
		//onload='alert(getFrameWin(this.name).location.href)'
		this.div.innerHTML="<iframe name='" + this.ifm.id + "' ></iframe>";
		this.ifm = this.div.getElementsByTagName("iframe")[0];
		this.ifm.id = this.ifm.name;
		this.div.appendChild(form);
		var _func = function(ifm_obj){
			//for(i in ifm_obj.ifm){alert(i +"="+ ifm_obj.ifm[i])}
			var func = ifm_obj.MAKE_ONLOAD_FUNC(ifm_obj,ifm_obj.ifm.id);
			if (ifm_obj.ifm.addEventListener){ 
				ifm_obj.ifm.addEventListener('load', func, false)
			}else if(ifm_obj.ifm.attachEvent){ 
				ifm_obj.ifm.attachEvent('onload',func)
			}
			form.submit()
		};
		var IFRAMEHTTP_CLONE = this;
		var func2 = function(){_func(IFRAMEHTTP_CLONE)};
		setTimeout(func2,100);
	};
	this.send = function(query){
		if(this.method == "GET"){
			this._GET()
		}else{
			this._POST(query);
		}
	};
	return this;
}
