#!/usr/bin/env php
<?php

// Check if cURL extension is available
if (!extension_loaded('curl')) {
    die("cURL extension is not available. Please install/enable it.\n");
}

// Function to make a GET request and return the response
function makeGetRequest($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        die("cURL error: " . curl_error($ch) . "\n");
    }

    curl_close($ch);
    return $response;
}

// Function to make a POST request and return the response
function makePostRequest($url, $data) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        die("cURL error: " . curl_error($ch) . "\n");
    }

    curl_close($ch);
    return $response;
}

// Check for the command-line arguments
if (count($argv) < 3) {
    die("Usage: ./apiclient.php get <URL> or ./apiclient.php post <URL> [<Ref> <Centre> <Service> <Country>]\n");
}

$action = $argv[1];
$url = $argv[2];

if ($action === 'get') {
    $response = makeGetRequest($url);
    echo "GET Response:\n$response\n";
} elseif ($action === 'post' && count($argv) === 7) {
    $ref = $argv[3];
    $centre = $argv[4];
    $service = $argv[5];
    $country = $argv[6];

    // Create an array with the data
    $postData = [
        'Ref' => $ref,
        'Centre' => $centre,
        'Service' => $service,
        'Country' => $country,
    ];

    // Make the POST request
    $response = makePostRequest($url, $postData);

    echo "POST Response:\n$response\n";
} else {
    die("Usage: ./apiclient.php get <URL> or ./apiclient.php post <URL> [<Ref> <Centre> <Service> <Country>]\n");
}
