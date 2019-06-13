<?php

$fname = $_POST['fname'];
$email = $_POST['email'];
$message = $_POST['message'];


// this is our array post data
$colours = $_POST['colours'];

$coloursHtml = '';

foreach ($colours as $colour){
    $coloursHtml .= '- '.$colour . PHP_EOL;
}


$postFields = [
    'content' => [
        'from' => ['name' => 'hello@reddico.co.uk', 'email' => 'hello@reddico.co.uk'],
        'subject' => 'Sparkpost test email from ' . $fname,
        'text' => 'A new sparkpost test message has been sent. Please find details below:'.PHP_EOL.'Name: ' . $fname . PHP_EOL . 'Email address: ' . $email . PHP_EOL .'Message: ' . $message . PHP_EOL .'Colours: ' . PHP_EOL . $coloursHtml,
    ],
    "recipients"=> [
        [
            "address"=> [
               "email"=> "test@reddico.co.uk"
            ]
        ],
        [
            "address"=> [
                "email"=> "ainsley@reddico.co.uk"
            ]
        ]
    ]
];


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.eu.sparkpost.com/api/v1/transmissions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($postFields),
    CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        "Authorization: bdbc039a2456e1b2ef5f74a60bbb5b366c1c0df7",
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
    return "cURL Error #:" . $err;
} else {
    return $response;
}

?>