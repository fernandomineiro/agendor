<?php
 require 'vendor/autoload.php';
    $url = 'https://api.agendor.com.br/v3/people?';

    // initialize curl resource
    $ch = curl_init();

    // set the http request authentication headers
    $headers = array('Authorization: Token=ea431751-a7e9-442e-b684-81eb31b61349');

    // set curl options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    // execute curl
    $response = curl_exec($ch);

    // check http code
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // close curl resource
    curl_close($ch);

    if ($code == 200)
    {
        // json decode reponse
        $news = json_decode($response);

        // display response
        foreach ($news as $news_item)
        {
            echo 'id: ' . $news_item->cpf . "\n";
            echo 'name: ' . $news_item->role . "\n\n";
        }
    }
    else{
        echo"erro";
    }
