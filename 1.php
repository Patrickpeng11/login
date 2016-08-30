<?php
$url = "https://accounts.google.com/o/oauth2/auth";

$params = array(
    "response_type" => "code",
    "client_id" => "581712155038-6fjd2g6m5ii9huint8vl7m3osq3nelb2.apps.googleusercontent.com",
    "scope" => "https://www.googleapis.com/auth/plus.me"
    );

$request_to = $url . '?' . http_build_query($params);

header("Location: " . $request_to);
if(isset($_GET['code'])) {
    // try to get an access token
    $code = $_GET['code'];
    $url = 'https://accounts.google.com/o/oauth2/token';
    $params = array(
        "code" => $code,
        "client_id" => "581712155038-6fjd2g6m5ii9huint8vl7m3osq3nelb2.apps.googleusercontent.com",
        "client_secret" => "YourSecret",
        "grant_type" => "authorization_code"
    );

    $request = new HttpRequest($url, HttpRequest::METH_POST);
    $request->setPostFields($params);
    $request->send();
    $responseObj = json_decode($request->getResponseBody());
    echo "Access token: " . $responseObj->access_token;
}

?>