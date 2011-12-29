<?php include("$_SERVER[DOCUMENT_ROOT]/global-inc.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $mainTitle; ?> - Thank You</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="layout.css" rel="stylesheet" type="text/css" />
    <!--[if IE]>
    <script type="text/javascript" src="ie_png.js"></script>
       <script type="text/javascript">
           DD_belatedPNG.fix('.png');
       </script>
    <![endif]-->   
</head>
<body id="page-6">
	<div class="top-tail"></div>
    <div class="bottom-tail">
        <div id="main">
        <!--header -->
            <div id="header">
                <div class="wrapper">
                    <div class="logo float-l"><a href="index.html"><img alt="" src='images/logo.gif' /></a></div>
                    <div class="float-l">
                        <ul class="wrapper">
                            <li><a href="/"><img src="images/m1.gif" alt="" /></a></li>
                            <li><a href="<?php echo $profileLink; ?>"><img src="images/m2.gif" alt="" /></a></li>
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
                                            <h2><a href="index.html">Home</a></h2>
                                            <div class="inner">
                                                <div class="wrapper">                                        	
                                                    <div class="col-1">
                                                        <h3 class="title1">Payment Form</h3>
														<br  /><br  /><br  /><br  /><br  /><br  /><p>Welcome to our payment page.  PayPal&reg; is our transaction provider.  You can pay using your PayPal&reg; account or with a credit card, however you do not <em>need</em> a PayPal&reg; account to make a payment. </p> 
<p>Remember,  when paying througy PayPal&reg;, your financial information is not revealed to C2M Interactive.  You will have an opportunity to enter the invoice amount on the subsequent PayPal&reg; page.</p>
														<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="4875489">
<table>
<tr><td><input type="hidden" name="on0" value="Invoice Number (if given):">Invoice Number (if given):</td></tr><tr><td><input type="text" name="os0" maxlength="60"></td></tr>
</table>
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>



														<br  /><br  /><br  />
<!--														
														<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="34648">
<table>
<tr><td><input type="hidden" name="on0" value="Invoice Number (if given):">Invoice Number (if given):</td></tr><tr><td><input type="text" name="os0" maxlength="60"></td></tr>
</table>
<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form> -->

														<br  /><br  /><br  /><br  /><br  /><br  /><br  /><br  /><br  />
        
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
