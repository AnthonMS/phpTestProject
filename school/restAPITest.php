<?php

function cvrCall($vat)
{
    // strip all other characters than numbers
    //$vat = preg_replace('/[^0-9]/', '', $vat);

    // check whether VAT-number is invalid
    if (empty($vat))
    {
        // print error
        return('Please enter a CVR-number.');
    }
    else {
        // start cURL
        $ch = curl_init();
        $url = "http://cvrapi.dk/api?search=" . $vat . "&country=dk";
        //return file_get_contents($url);

        // set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "my project");

        // parse result
        $result = curl_exec($ch);

        // close connection when done
        curl_close($ch);

        // return our decoded result
        return json_decode($result, 1);
    }
}

// Test CVRAPI
print_r( cvrCall("EAS") );

?>