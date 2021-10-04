<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'localhost:97/apitoko/public/user/list',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => '{
    "username": "lain",
    "password": "123",
    "nama": "123",
    "email": "ttesting"
}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: BearereyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6OTdcL2FwaXRva29cL3B1YmxpY1wvYXBpXC9sb2dpbiIsImlhdCI6MTYxMjM2MDIxMiwiZXhwIjoxNjEyMzYzODEyLCJuYmYiOjE2MTIzNjAyMTIsImp0aSI6IjRtRThlZzFOZjVsMzIxYkEiLCJzdWIiOjIsInBydiI6IjgzN2IxMGY0ODYyNjBhNmZiYzdjMzdmZTYyNTU3YWU4NmQ0MWFhYmIifQ.BCoKJ0UOn1sxUg8mFIgQLFH5wVWFUS8D3fL388wT3-0',
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
