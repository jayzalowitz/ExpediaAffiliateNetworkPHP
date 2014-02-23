ExpediaAffiliateNetworkPHP
==========================

An Expedia affiliate network class for PHP

To setup:

        //Include your app information
        $consumerKey = "yourclientkey";
        $clientSecret = "yourclientsecret"; //this is called "shared secret" in the mashery email you got when you signed.
        $redirectUri="http://your.com/index.php";
        
        //Include the ean class
        require_once('ean.php');

        // Instanciate the class
        $ean = new EAN($consumerKey, $clientSecret);

        // thats it!

Examples to use from index.php: 

        //find a hotel
		//discoverHotel($address = null, $hotelId = null, $affinity = null, $maxResults = '200',$offset = null)
      	$ean->discoverHotel('new york city',null,null,'10',null);

      	//Take a hotel id from ean and convert it to expedia
      	$expediaHotelId = $ean->ToExpedia($theEANhotelId);

      	//Get pricing for that hotel for april 14 2014 - 15th
      	$availandpricedata =  $ean->hotelList($hotelid,'04/14/2014','04/15/2014','1');
            
