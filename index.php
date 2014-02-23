<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Its a ean API test page </title>
<style type="text/css">
h1 {
	text-align: center;
}
body {
  //background: url('/images/IMG_7467.jpg') no-repeat;
  //background-size: 100%;
}
/* search form 
-------------------------------------- */
.searchform {
	display: inline-block;
	zoom: 1; /* ie7 hack for display:inline-block */
	*display: inline;
	border: solid 1px #d2d2d2;
	padding: 3px 5px;
	
	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	-moz-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	box-shadow: 0 1px 0px rgba(0,0,0,.1);

	background: #f1f1f1;
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
	background: -moz-linear-gradient(top,  #fff,  #ededed);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie8 */
}
.searchform input {
	font: normal 12px/100% Arial, Helvetica, sans-serif;
}
.searchform .neighborhood {
	background: #fff;
	padding: 6px 6px 6px 8px;
	width: 400px;
	border: solid 1px #bcbbbb;
	outline: none;

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
}
.searchform .searchbutton {
	color: #fff;
	border: solid 1px #494949;
	font-size: 11px;
	height: 27px;
	width: 27px;
	text-shadow: 0 1px 1px rgba(0,0,0,.6);

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	background: #5f5f5f;
	background: -webkit-gradient(linear, left top, left bottom, from(#9e9e9e), to(#454545));
	background: -moz-linear-gradient(top,  #9e9e9e,  #454545);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie8 */
}
#logo {
  margin-bottom: 1em;
}

#tagline {
  font-size: 54px;
  font-style: italic;
// color: white;
  margin-bottom: 3em;
}

</style>
</head>

<body>

<div class="container">
<div class="header"></a> 
    <!-- end .header --></div>
<div class="content" style="text-align:center">
  <p id="tagline">EAN Test</p>

    
    
		<?php
        
        //You can find the below at http://developer.ean.com/

        //Declare your key, secret key and callback URL variables (Without these, the api wont work at all)
        $consumerKey = "yourkey";
        $clientSecret = "yoursecret";
        
        //Include the EAN class
        
        require_once('ean.php');
        
        //And some code!
        $ean = new EAN($consumerKey, $clientSecret);
  			// make the page all good looking
  			echo '<br><span style="text-align:left;font-family: Arial, Helvetica, sans-serif; color: black; font-weight: bold; font-size: 20px;">';
  			echo '<pre>';
        //lets find a hotel using the discover Hotel api
        $discovery = json_decode($ean->discoverHotel('new york city',null,null,'10',null),1);
        // want to see the entire result, print_r it
        //print_r($discovery); // you may find $discovery['searchResults']['searchResult']['metadata'] interesting if you intend to paginate
        
        //Great, we can now get the top 10 results (because that is the limit we set in discoverHotel above)
        print_r($discovery['searchResults']['searchResult']['0']['results']);

        flush();
        	echo '</pre>';
        
        ?>
    
     </span>
    <div>
  </div>
  <div class="footer">
  <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>

