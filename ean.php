<?php

class EAN {
  public $base_url = "http://api.ean.com/";
 // public $secure_base_url = "https://api.ean.com/";
  public $consumerKey;
  public $clientSecret;
  public $useragent = "Jay Zalowitz's EAN API PHP Class";

  function __construct($consumerKey, $clientSecret) {

    $this->consumerKey = $consumerKey;
    $this->clientSecret = $clientSecret; 
  }

  function discoverHotel($address = null, $hotelId = null, $affinity = null, $maxResults = '200',$offset = null) {
//    Docs: http://dev.ean.com/docs/innovation-labs/expedia/travel-search/hotel-search/
//    address string  A geo codeable address. e.g. 'seattle'
//    hotelId integer hotel identifier
//    poiId integer Point of interest identifier
//    regionId  integer Region identifier

    $profileApiLocation = $this->base_url .'expe/affinity/v1/get/hotels?userId=ama';
    $profileApiLocation .= '&format=json';
    $profileApiLocation .= '&apiKey='.$this->consumerKey;
    if ($address){
    $profileApiLocation .= '&address='.urlencode($address);
    }
    if ($affinity){
    $profileApiLocation .= '&affinity='.urlencode($affinity);
    }
    if ($hotelId){
    $profileApiLocation .= '&hotelId='.urlencode($hotelId);
    }
    if ($maxResults){
    $profileApiLocation .= '&maxResults='.urlencode($maxResults);
    }
    if ($offset){
    $profileApiLocation .= '&offset='.urlencode($offset);
    }


    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $profileApiLocation,
    CURLOPT_USERAGENT => $this->useragent
    ));
  $response = curl_exec($curl);
  curl_close($curl);

  return $response;
  }



}
