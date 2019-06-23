<?php
use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;

define("RUNNER", true);
require "bootstrap.php";


if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_FILES['uploaded'])) {
        $fileName = $_FILES['uploaded']['name'];
        $fileContent = file_get_contents($_FILES['uploaded']['tmp_name']);
        $blobClient->createBlockBlob($containerName, $fileName, $fileContent);
    }
}else{
    if(isset($_GET['analyze'])){
        require "analyze.php";
    }
}

/**
 * @var BlobRestProxy $blobClient
 */
$listBlobsOptions = new ListBlobsOptions();
$blobs = [];
do{
    $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
    foreach ($result->getBlobs() as $blob)
    {
        $blobs[] = $blob;
    }

    $listBlobsOptions->setContinuationToken($result->getContinuationToken());
} while($result->getContinuationToken());

require "index.view.php";
