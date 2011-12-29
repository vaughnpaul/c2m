<?php include("$_SERVER[DOCUMENT_ROOT]/global-inc.php"); ?>
<?php include('blog/wp-blog-header.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $mainTitle; ?> - Web Design, Web Development and Strategic Consulting</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="swfobject.js"></script>
		<script type="text/javascript">
			var flashvars = {};
			var params = {};
			params.scale = "noscale";
			params.salign = "tl";
			params.wmode = "transparent";
			params.allowfullscreen = "true";
			var attributes = {};
			swfobject.embedSWF("PhotoRotatorFX.swf", "PhotoRotatorFXDiv", "450", "300", "10.0.0", false, flashvars, params, attributes);
		</script>
<style>
.ven{
	margin:0px 0px 15px 70px;
}
</style>
<script src="maxheight.js" type="text/javascript"></script>
    <!--[if IE]>
    <script type="text/javascript" src="ie_png.js"></script>
       <script type="text/javascript">
           DD_belatedPNG.fix('.png');
       </script>
    <![endif]-->
</script>
<style type="text/css">
		body{
			background-color:#999999;
			padding:0px;
			margin:0px;
		}
		.container{
			border:1px solid #000000;
		}
		fieldset{
			border:none;
			padding:0;
			margin:0;
		}
		.content{
			background-color:#FFFFFF;
			padding:20px;
			font-family:Arial;
			font-size:12;
			line-height:150%;
			color:#333333;
		}
		.headerBar{
			background-color:#CCCCCC;
			padding:20px;
			border-bottom:0px solid #000000;
		}
		.headerText{
			color:#666666;
			font-size:32px;
			font-family:Arial;
			font-weight:bold;
			text-align:left;
		}
		p,label,.formText{
			line-height:150%;
			font-family:Arial;
			font-size:12px;
			color:#333333;
		}
		.alert{
			font-size:20px;
			line-height:200%;
			color:#FF0000;
			font-family:Arial;
			font-weight:bold;
		}
		div.errorText{
			font-size:12px;
			line-height:150%;
			font-weight:bold;
			color:#FF0000;
			font-family:Arial;
			background-color:#FFEEEE;
			padding:5px;
			margin:3px;
		}
		a:link,a:active,a:visited,a{
			color:#0000FF;
		}
		a.poweredBy{
			font-size:10px;
			font-family:trebuchet ms;
			text-decoration:none;
		}
		.poweredBy{
			text-align:center;
			width:100%;
		}
		.vcard,.vevent{
			background:#eee;
			border:2px solid #ccc !important;
			padding:14px;
			-moz-border-radius:4px;
			-webkit-border-radius:4px;
			border-radius:4px;
			margin:5px 0 !important;
		}
		span.vcard,span.vevent{
			padding:2px 1px 2px 70px !important;
			margin:0 2px 0 !important;
		}
		.org{
			display:block;
			margin:8px 0 0 0;
			padding-left:19px;
			background:url(http://c2minteractive.us1.list-manage.com/images/vcard.png) no-repeat;
			font-weight:bold;
			font-size:110%;
		}
		.hcard-download{
			background:url(http://c2minteractive.us1.list-manage.com/images/hcard-download-or.png) no-repeat;
			padding:2px 0 2px 32px;
		}
		label{
			font-weight:normal;
		}
		td.mc_submit_button{
			text-align:center;
		}
		#mergeTable{
			width:100%;
		}
		#interestTable{
			width:100%;
		}
		#bottomTable{
			width:100%;
			text-align:center;
		}
		#archive-list{
			margin:3em;
			list-style:square;
			line-height:1.6em;
		}
		.required{
			text-align:right;
			font-size:11px;
			font-weight:bold;
		}
		.formText{
			vertical-align:top;
		}
		.subfield{
			display:block;
			margin:2px 0;
			padding:4px;
			line-height:30px;
		}
		.phonefield{
			min-width:265px;
		}
		.phonefield .subfield,.datefield .subfield{
			display:inline;
		}
		.subfield label{
			padding-left:4px;
			font-style:italic;
		}
		.mergeTable{
			border-collapse:separate;
		}
		.mergeRow td{
			padding:12px;
			border-top:1px solid #ccc;
		}
		input,textarea,select{
			padding:4px;
		}
		input:focus,textarea:focus,select:focus{
			background:#ffc;
		}
		.countryfield select{
			min-width:120px;
		}
		.radiogroup label{
			padding-right:12px;
		}
		h1{
			font-size:25px;
			line-height:30px;
			margin-bottom:5px;
		}
		#archive-company{
			font-weight:normal;
		}
		#archive-company,#archive-subscribe-link{
			margin:5px 0;
		}
		#archive-subscribe-link{
			float:right;
			margin-top:2px;
		}
		#forward-friend-table label{
			font-weight:bold;
		}
		#forwardToFriendFooter{
			padding-top:10px;
			border-top:1px solid #ccc;
		}
		.interestgroup_field,.interestgroup_field li,.interestgroup_row{
			margin:0;
			padding:0;
			list-style:none;
		}
		div.required{
			display:inline;
		}
		p,label,.formText{
			line-height:150%;
			font-family:Arial;
			font-size:12px;
			color:#333333;
		}
		a:link,a:active,a:visited,a{
			color:#0000FF;
		}
</style>
	
</head>
<body id="page-6" onload="new ElementMaxHeight();">
	<div class="top-tail"></div>
    <div class="bottom-tail">
        <div id="main">
        <!--header -->
          <div id="header">
                <div class="wrapper">

		
                    <div class="logo float-l"><a href="/"><img alt="" src='images/logo.gif' /></a></div>
                    <div class="float-l">
                        <ul class="wrapper">
                            <li><a href="/"><img src="images/m1-act.gif" alt="" /></a></li>
                            <li><a href="<?php echo $profileLink; ?>"><img src="images/page-1-m2.gif" alt="" /></a></li>
                            <li><a href="<?php echo $portfolioLink; ?>"><img src="images/m3.gif" alt="" /></a></li>
                            <li><a href="<?php echo $solutionsLink; ?>"><img src="images/m4.gif" alt="" /></a></li>
                            <li><a href="<?php echo $contactLink; ?>"><img src="images/m5.gif" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
                <img class="slogan" alt="" src='images/slogan.jpg' />
            </div>
        <!--header end-->
            <div id="content">
            	<div class="row-1">                
                    <div class="box-left">
                        <div class="box-right">
                            <div class="box-top-left">
                                <div class="box-top-right">
                                    <div class="box-bot-left">
                                        <div class="box-bot-right">
                                            <h2><a href="/">Home</a> <?php include("$_SERVER[DOCUMENT_ROOT]/addThis.php"); ?></h2>
                                          <div class="inner">
                                            <div class="wrapper">
                                              <div class="col-1">
                                                <h3 class="title1">Mailing List</h3>

                                                
                                                
    <table width="100%" cellpadding="20" cellspacing="0"><tr><td align="center" valign="top">
    
    <!-- \\\ wrap table /// -->

<!-- Begin MailChimp Signup Form -->
<!--[if IE]>
<style type="text/css" media="screen">
	#mc_embed_signup fieldset {position: relative;}
	#mc_embed_signup legend {position: absolute; top: -1em; left: .2em;}
</style>
<![endif]--> 
<!--[if IE 7]>
<style type="text/css" media="screen">
	.mc-field-group {overflow:visible;}
</style>
<![endif]-->

<div id="mc_embed_signup">
<form action="http://c2minteractive.us1.list-manage1.com/subscribe/post?u=d7e3f1274fdf7768c1c20a4d6&amp;id=33ca9dfd34" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" style="font: normal 100% Arial, sans-serif;font-size: 10px;">
	<fieldset style="-moz-border-radius: 4px;border-radius: 4px;-webkit-border-radius: 4px;border: 1px solid #000000;padding-top: 1.5em;margin: .5em 0;background-color: #FFFFFF;color: #000;text-align: left;">
	<legend style="white-space: normal;text-transform: capitalize;font-weight: bold;color: #666666;background: #CCCCCC;padding: .5em 1em;border: 1px solid #000000;-moz-border-radius: 4px;border-radius: 4px;-webkit-border-radius: 4px;font-size: 1.2em;"><span>join our mailing list</span></legend>
<div class="indicate-required" style="text-align: right;font-style: italic;overflow: hidden;color: #000;margin: 0 9% 0 0;">* indicates required</div>
<div class="mc-field-group" style="margin: 1.3em 5%;clear: both;overflow: hidden;">
<label for="mce-EMAIL" style="display: block;margin: .3em 0;line-height: 1em;font-weight: bold;">Email Address <strong class="note-required">*</strong>
</label>
<input type="text" value="" name="EMAIL" class="required email" id="mce-EMAIL" style="margin-right: 1.5em;padding: .2em .3em;width: 90%;float: left;z-index: 999;">
</div>
<div class="mc-field-group" style="margin: 1.3em 5%;clear: both;overflow: hidden;">
<label for="mce-MMERGE3" style="display: block;margin: .3em 0;line-height: 1em;font-weight: bold;">First Name </label>
<input type="text" value="" name="MMERGE3" class="" id="mce-MMERGE3" style="margin-right: 1.5em;padding: .2em .3em;width: 90%;float: left;z-index: 999;">
</div>
<div class="mc-field-group" style="margin: 1.3em 5%;clear: both;overflow: hidden;">
<label for="mce-LNAME" style="display: block;margin: .3em 0;line-height: 1em;font-weight: bold;">Last Name </label>
<input type="text" value="" name="LNAME" class="" id="mce-LNAME" style="margin-right: 1.5em;padding: .2em .3em;width: 90%;float: left;z-index: 999;">
</div>
<div class="mc-field-group" style="margin: 1.3em 5%;clear: both;overflow: hidden;">
<label for="mce-group[6]" style="display: block;margin: .3em 0;line-height: 1em;font-weight: bold;">What is your level of technical experience? </label>
<select name="group[6]" class="REQ_CSS" id="mce-group[6]" style="margin-right: 1.5em;padding: .2em .3em;width: 90%;float: left;z-index: 999;">
<option value=""></option>
<option value="16">Newbie</option>
<option value="32">Techie</option>

</select>
</div>
<div class="mc-field-group" style="margin: 1.3em 5%;clear: both;overflow: hidden;">
    <label class="input-group-label" style="display: block;margin: .3em 0;line-height: 1em;font-weight: bold;">Email Format </label>
    <div class="input-group" style="padding: .7em .7em .7em 0;font-size: .9em;margin: 0 0 1em 0;">
    <ul style="margin: 0;padding: 0;"><li style="list-style: none;overflow: hidden;padding: .2em 0;clear: left;display: block;margin: 0;"><input type="radio" value="html" name="EMAILTYPE" id="mce-EMAILTYPE-0" style="margin-right: 2%;padding: .2em .3em;width: auto;float: left;z-index: 999;"><label for="mce-EMAILTYPE-0" style="display: block;margin: .4em 0 0 0;line-height: 1em;font-weight: bold;width: auto;float: left;text-align: left !important;">html</label></li>
<li style="list-style: none;overflow: hidden;padding: .2em 0;clear: left;display: block;margin: 0;"><input type="radio" value="text" name="EMAILTYPE" id="mce-EMAILTYPE-1" style="margin-right: 2%;padding: .2em .3em;width: auto;float: left;z-index: 999;"><label for="mce-EMAILTYPE-1" style="display: block;margin: .4em 0 0 0;line-height: 1em;font-weight: bold;width: auto;float: left;text-align: left !important;">text</label></li>
<li style="list-style: none;overflow: hidden;padding: .2em 0;clear: left;display: block;margin: 0;"><input type="radio" value="mobile" name="EMAILTYPE" id="mce-EMAILTYPE-2" style="margin-right: 2%;padding: .2em .3em;width: auto;float: left;z-index: 999;"><label for="mce-EMAILTYPE-2" style="display: block;margin: .4em 0 0 0;line-height: 1em;font-weight: bold;width: auto;float: left;text-align: left !important;">mobile</label></li>
</ul>
    </div>
</div>
		<div id="mce-responses" style="float: left;top: -1.4em;padding: 0em .5em 0em .5em;overflow: hidden;width: 90%;margin: 0 5%;clear: both;">
			<div class="response" id="mce-error-response" style="display: none;margin: 1em 0;padding: 1em .5em .5em 0;font-weight: bold;float: left;top: -1.5em;z-index: 1;width: 80%;background: FBE3E4;color: #D12F19;"></div>
			<div class="response" id="mce-success-response" style="display: none;margin: 1em 0;padding: 1em .5em .5em 0;font-weight: bold;float: left;top: -1.5em;z-index: 1;width: 80%;background: #E3FBE4;color: #529214;"></div>
		</div>
		<div><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn" style="clear: both;width: auto;display: block;margin: 1em 0 1em 5%;"></div>
	</fieldset>	
	<a href="#" id="mc_embed_close" class="mc_embed_close" style="display: none;">Close</a>
</form>
</div>
<script type="text/javascript">
var fnames = new Array();var ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[3]='MMERGE3';ftypes[3]='text';fnames[2]='LNAME';ftypes[2]='text';
try {
    var jqueryLoaded=jQuery;
    jqueryLoaded=true;
} catch(err) {
    var jqueryLoaded=false;
}
var head= document.getElementsByTagName('head')[0];
if (!jqueryLoaded) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js';
    head.appendChild(script);
    if (script.readyState && script.onload!==null){
        script.onreadystatechange= function () {
              if (this.readyState == 'complete') mce_preload_check();
        }    
    }
}
var script = document.createElement('script');
script.type = 'text/javascript';
script.src = 'http://downloads.mailchimp.com/js/jquery.form-n-validate.js';
head.appendChild(script);
var err_style = '';
try{
    err_style = mc_custom_error_style;
} catch(e){
    err_style = 'margin: 1em 0 0 0; padding: 1em 0.5em 0.5em 0.5em; background: FFEEEE none repeat scroll 0% 0%; font-weight: bold; float: left; z-index: 1; width: 80%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: FF0000;';
}
var head= document.getElementsByTagName('head')[0];
var style= document.createElement('style');
style.type= 'text/css';
if (style.styleSheet) {
  style.styleSheet.cssText = '.mce_inline_error {' + err_style + '}';
} else {
  style.appendChild(document.createTextNode('.mce_inline_error {' + err_style + '}'));
}
head.appendChild(style);
setTimeout('mce_preload_check();', 250);

var mce_preload_checks = 0;
function mce_preload_check(){
    if (mce_preload_checks>40) return;
    mce_preload_checks++;
    try {
        var jqueryLoaded=jQuery;
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    try {
        var validatorLoaded=$("#fake-form").validate({});
    } catch(err) {
        setTimeout('mce_preload_check();', 250);
        return;
    }
    mce_init_form();
}
function mce_init_form(){
    $(document).ready( function($) {
      var options = { errorClass: 'mce_inline_error', errorElement: 'div', onkeyup: function(){}, onfocusout:function(){}, onblur:function(){}  };
      var mce_validator = $("#mc-embedded-subscribe-form").validate(options);
      options = { url: 'http://c2minteractive.us1.list-manage.com/subscribe/post-json?u=d7e3f1274fdf7768c1c20a4d6&id=33ca9dfd34&c=?', type: 'GET', dataType: 'json', contentType: "application/json; charset=utf-8",
                    beforeSubmit: function(){
                        $('#mce_tmp_error_msg').remove();
                        $('.datefield','#mc_embed_signup').each(
                            function(){
                                var txt = 'filled';
                                var fields = new Array();
                                var i = 0;
                                $(':text', this).each(
                                    function(){
                                        fields[i] = this;
                                        i++;
                                    });
                                $(':hidden', this).each(
                                    function(){
                                    	if ( fields[0].value=='MM' && fields[1].value=='DD' && fields[2].value=='YYYY' ){
                                    		this.value = '';
									    } else if ( fields[0].value=='' && fields[1].value=='' && fields[2].value=='' ){
                                    		this.value = '';
									    } else {
	                                        this.value = fields[0].value+'/'+fields[1].value+'/'+fields[2].value;
	                                    }
                                    });
                            });
                        return mce_validator.form();
                    }, 
                    success: mce_success_cb
                };
      $('#mc-embedded-subscribe-form').ajaxForm(options);      
      
    });
}
function mce_success_cb(resp){
    $('#mce-success-response').hide();
    $('#mce-error-response').hide();
    if (resp.result=="success"){
        $('#mce-'+resp.result+'-response').show();
        $('#mce-'+resp.result+'-response').html(resp.msg);
        $('#mc-embedded-subscribe-form').each(function(){
            this.reset();
    	});
    } else {
        var index = -1;
        var msg;
        try {
            var parts = resp.msg.split(' - ',2);
            if (parts[1]==undefined){
                msg = resp.msg;
            } else {
                i = parseInt(parts[0]);
                if (i.toString() == parts[0]){
                    index = parts[0];
                    msg = parts[1];
                } else {
                    index = -1;
                    msg = resp.msg;
                }
            }
        } catch(e){
            index = -1;
            msg = resp.msg;
        }
        try{
            if (index== -1){
                $('#mce-'+resp.result+'-response').show();
                $('#mce-'+resp.result+'-response').html(msg);            
            } else {
                err_id = 'mce_tmp_error_msg';
                html = '<div id="'+err_id+'" style="'+err_style+'"> '+msg+'</div>';
                
                var input_id = '#mc_embed_signup';
                var f = $(input_id);
                if (ftypes[index]=='address'){
                    input_id = '#mce-'+fnames[index]+'-addr1';
                    f = $(input_id).parent().parent().get(0);
                } else if (ftypes[index]=='date'){
                    input_id = '#mce-'+fnames[index]+'-month';
                    f = $(input_id).parent().parent().get(0);
                } else {
                    input_id = '#mce-'+fnames[index];
                    f = $().parent(input_id).get(0);
                }
                if (f){
                    $(f).append(html);
                    $(input_id).focus();
                } else {
                    $('#mce-'+resp.result+'-response').show();
                    $('#mce-'+resp.result+'-response').html(msg);
                }
            }
        } catch(e){
            $('#mce-'+resp.result+'-response').show();
            $('#mce-'+resp.result+'-response').html(msg);
        }
    }
}

</script>
<!--End mc_embed_signup-->

    <!-- /// wrap table \\\ -->
    </td></tr></table>
												<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row-2">                
                    <img alt="" src='images/box3-bot.jpg' />
                </div>
            </div>  	        
        </div>
        <!--footer -->
<?php include("$_SERVER[DOCUMENT_ROOT]/footer.php"); ?>