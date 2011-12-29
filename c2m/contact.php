<?php session_start();
include("$_SERVER[DOCUMENT_ROOT]/global-inc.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $mainTitle; ?> - Contact Us</title>

<script type="text/javascript">
	function validate(){
		if(document.getElementById('name').value=='name'){    // if value of the name field = Name
			document.getElementById('name').value="";
		}
		if(document.getElementById('email').value=='e-mail'){	 // if value of the email field = Email
			document.getElementById('email').value="";
		}
		if(document.getElementById('phone').value=='phone'){	 // if value of the phone field = Phone
			document.getElementById('phone').value="";
		}
		if(document.getElementById('address').value=='address'){	 // if value of the address field = address
			document.getElementById('address').value="";
		}
		
		if(document.getElementById('comments').value=='message'){	 // if value of the message field = message
			document.getElementById('comments').value="";
		}
		
		var name  = document.getElementById("name").value;		//person's name
		var e_mail = document.getElementById('email').value;	//email address
		var phone=document.getElementById('phone').value;		//person's phone number
		var address=document.getElementById('address').value;			//person's address
		var comments=document.getElementById('comments').value; //person's message

		if((name==null||name=="")&&(e_mail==null||e_mail=="")&&(phone==null||phone=="")&&(address==null||address=="")&&(comments==null||comments=="")){	
			
			//if users submit the blank form

			document.getElementById('error').innerHTML="You cannot send a blank form";
			return false;
		}

		else{
			if(name==null||name==""){		//if person's name is blank
				document.getElementById('error').innerHTML="enter name";
				return false;
			}

			if(e_mail==null || e_mail==""){		//if person's email is blank
				document.getElementById('error').innerHTML="enter email";
				return false;
			}

			else if(e_mail!=null || e_mail!=""){	//if person's email is invalid
				var x=document.forms["contact_form"]["email"].value
				var atpos=x.indexOf("@");
				var dotpos=x.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
				  document.getElementById('error').innerHTML="not a valid email";
				   return false;
				}
			}

			if(comments==null||comments==""){		//if person's message is blank
				document.getElementById('error').innerHTML="enter some message";
				return false;
			}
		}
		return true;
	}
</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/style.css" rel="stylesheet" type="text/css" />
<link href="/layout.css" rel="stylesheet" type="text/css" />
<style>
#contactForm {
	padding:0px;
}
#contactForm textarea{
	height:147px
}
</style>
<script src="/maxheight.js" type="text/javascript"></script>
    <!--[if IE]>
    <script type="text/javascript" src="ie_png.js"></script>
       <script type="text/javascript">
           DD_belatedPNG.fix('.png');
       </script>
    <![endif]-->
</head>
<body id="page-5" onload="new ElementMaxHeight();">
	<div class="top-tail"></div>
    <div class="bottom-tail">
        <div id="main">
        <!--header -->
            <div id="header">
                <div class="wrapper">
                    <div class="logo float-l"><a href="/"><img alt="" src='images/logo.gif' /></a></div>
                    <div class="float-l">
                        <ul class="wrapper">
                            <li><a href="/"><img src="images/m1.gif" alt="" /></a></li>
                            <li><a href="<?php echo $profileLink; ?>"><img src="images/m2.gif" alt="" /></a></li>
                            <li><a href="<?php echo $portfolioLink; ?>"><img src="images/m3.gif" alt="" /></a></li>
                            <li><a href="<?php echo $solutionsLink; ?>"><img src="images/page-5-m4.gif" alt="" /></a></li>
                            <li><a href="<?php echo $contactLink; ?>"><img src="images/m5-act.gif" alt="" /></a></li>
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
                                                    <div class="col-1 maxheight">
                                                        <h3 class="title1">Contact Information</h3>
                                                        <div class="wrapper">
                                                        	<img src='images/page-img4.png' alt="" width="111" height="89" class="img-indent png" />
                                                            <!--<p>Teaneck,NJ.</p>
                                                            <span class="phone">+1 800 559 6580</span>Freephone:<br />
                                                            <span class="phone">+1 800 603 6035</span>Telephone:<br />
                                                            <span class="phone">+1 800 889 9898</span>FAX:<br />
                                                            E-mail: <a href="#">info@<?php echo $domainName; ?></a> -->
                                                        </div>                                                        
                                                        <p>Use the form below to send us a note:</p>
                                                        <div class="block">
	                                                        <h3 class="title1">Contact Form</h3>
                                                            <div class="wrapper">
																<span id="error"style="color:red;"><br /></span>
                                                            	<form action="formtoemailpro.php" id="contactForm" method="post" name="contact_form">
																	<div class="float-l">																		
                                                                        <div><input type="text" name="name" value="name" onFocus="document.getElementById('error').innerHTML='<br />';javascript:this.value=''"id="name"/></div>
																		
                                                                        <div><input type="text" name="email" value="e-mail" onFocus="document.getElementById('error').innerHTML='<br />';javascript:this.value=''" id="email"/></div>
																		<div><input type="text" name="phone" value="phone" onFocus="javascript:this.value=''" id="phone"/></div>
                                                                        <div><input type="text" name="address" value="address" onFocus="javascript:this.value=''" id="address"/></div>
																		<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image"><br><a href="#" style="background:#ececec" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">Reload Image</a>
																		<div><input type="text" name="captcha_code"value="Enter the code from above" onFocus="javascript:this.value=''" ></div>
                                                                    </div>
                                                                
                                                                    <div class="float-l"style="height:194px;">
																		
                                                                        <textarea style="height:187px;"name="comments" cols="30" rows="60" onFocus="document.getElementById('error').innerHTML='<br />';javascript:this.value=''"id="comments">message</textarea>
                                                                    </div>
                                                                    <div class="clear"></div>                                    
                                                                    <div class="button float-r">
                                                                       <a href="#" onclick="document.getElementById('contactForm').reset()">Clear</a>
                                                                       <a href="#" onclick="if(validate()){document.getElementById('contactForm').submit();}">Send</a>
																		<!--<button name="reset" type="reset"/>Clear</button>
																		<button name="submit" type="submit"onclick="check_blank();"/>Send</button>-->
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>    
                                                    <div class="col-2 maxheight">
                                                        <h3 class="title1">Our Locations</h3>                                                        
                                                        <h5>Where do we serve?</h5>
                                                        <p>We are a local company, but we are global in focus.  For those clients that require in person, face-to-face interactions, we serve the Northern/Central NJ and New York area.</p>
														<p>For clients with which borders are no barrier, we have conducted business across the globe and in many timezones.</p>
                                                        
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
<?php include("$_SERVER[DOCUMENT_ROOT]/footer.php"); ?>
