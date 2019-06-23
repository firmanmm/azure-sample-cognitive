<?php

if (!\defined('RUNNER')) {
    die("Direct execution not allowed");
}

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use function GuzzleHttp\json_decode;

try {
    $fileLoc = $_GET['analyze'];
    $endpoint = getenv("VISION_ENDPOINT");
    $visionName = getenv("VISION_NAME");
    $visionKey = getenv("VISION_KEY");
    $client = new Client();
    $response = $client->post(
        $endpoint.'vision/v1.0/analyze?visualFeatures=Description',
        [
            RequestOptions::HEADERS => [
                "Ocp-Apim-Subscription-Key"=>$visionKey,
                "Content-Type"=>"application/json"
            ],
            RequestOptions::JSON => [
                "url" => $fileLoc
            ]
        ]);
    $responseBody = (string)($response->getBody());
    $responseArray = json_decode($responseBody, true);
    $rawCaptions = $responseArray["description"]["captions"];
    $captions = [];
    foreach($rawCaptions as $caption) {
        $captions[] = $caption;
    }
    require "analyze.view.php";
    die();
}catch(Exception $e) {
    die($e);
}

