<?php

$local_cert = 'lib/wordstat/solid-cert.crt';
$wsdlurl = 'https://api.direct.yandex.ru/wsdl/v4/';

ini_set("soap.wsdl_cache_enabled", "0");

$client = new SoapClient($wsdlurl,
    array(
        'trace'=> 1,
        'exceptions' => 0,
        'encoding' => 'UTF-8',
        'local_cert' => $local_cert,
        'passphrase' => ''
    )
);

$result = $client->PingAPI();

if (is_soap_fault($result)) {

    trigger_error("SOAP Fault: (faultcode: {$result->faultcode}, faultstring: {$result->faultstring}, detail: {$result->detail})", E_USER_ERROR);

} else {

    $params = array(
	"CampaignID" => 9309473,
        "Mode"       => "SinglePrice",
    //  "Mode" => "Wizard",
        "PriceBase" => "min",
        "ProcBase" => "value",
        "Proc" => 14,
        "MaxPrice" => 9.5,
        "PhrasesType" => "Search"
    );

    function SetAutoPrice($campaignId, $singlePrice, $mode='SinglePrice'){
        
        $client->SetAutoPrice
                
    }
    
}

/*
function getWordstatReport($client,$params){
	$reportID = $client->CreateNewWordstatReport($params);
	sleep(9);
	return $client->getWordstatReport($reportID);	
}

$wordstat = getWordstatReport($client,$params);
echo $wordstat[0]->SearchedWith[0]->Shows; 
*/
?>