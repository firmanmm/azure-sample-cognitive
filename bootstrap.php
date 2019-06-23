<?php

if (!\defined('RUNNER')) {
    die("Direct execution not allowed");
}

require "vendor/autoload.php";

use Dotenv\Dotenv;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

try {
    $dotenv = Dotenv::create(__DIR__);
    $dotenv->load();
} catch (\Exception $e){
    \define('PRODUCTION', true);
}

$accountName = getenv('ACCOUNT_NAME');
$accountKey = getenv('ACCOUNT_KEY');

$connString = "DefaultEndpointsProtocol=https;AccountName=".$accountName.";AccountKey=".$accountKey;
$blobClient = BlobRestProxy::createBlobService($connString);
$createContainerOptions = new CreateContainerOptions();
$createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
$createContainerOptions->addMetaData("key1", "value1");
$createContainerOptions->addMetaData("key2", "value2");
$containerName = "blockblobsmain";
try {
    if(!$blobClient->getContainerProperties($containerName)) {
        $blobClient->createContainer($containerName, $createContainerOptions);
    }
   
}catch(Exception $e) {
    die($e);
}