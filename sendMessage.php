<?php

/* 
    Repository GIT
    https://github.com/web-push-libs/web-push-php
*/

require_once("./vendor/autoload.php");

use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

/* 
  Generate Keys VAPID
  https://www.attheminute.com/vapid-key-generator
*/

$keys = [
    'public' => 'BPc1kPKBH-pLTz5VNP33doBxwgepeo8w97EaQ2I30XqwvLxKPFOCtC6CZjIt_pjkMlhsx2_MCePqJFvoehA79EY',
    'private' => '6tBhrWwNe5_wRipy93qkZBJ6l9H8gN1g6EqPB9h7kGY'
];

$email = 'mailto:email@gmail.com';

$key_navegator_client_subscribe = '{"endpoint":"https://fcm.googleapis.com/fcm/send/cqXnGBZ1ZtY:APA91bHOB7i-TOOF4DxsohkyTQdym4ULYM-cn-cci_3bzOWLTZBbM0LDfO8zQ2MfTcoz1PtSc1zzx-0Hce_8PFxtbut6i9xZsqoAZfpq7YcdVOCtdW7266wc1HtSVmBaUMUwb26PIicf","expirationTime":null,"keys":{"p256dh":"BOS5iogY1TqVmXXlelYiJTsPgXW0Y8gefX1PintMvt-SykPQa4ew9H-A9XrLk8T3qEd2FOrP9SKVdA6qoMEV_Es","auth":"GdKU5iW92BdEoz8W9LBoBg"}}';

$payload_content_message = '{ "title":"Hello Boy", "body":"Deu certo rapá", "icon":"icon.png", "url":"./?message=helloboy" }';

$auth = [
    'VAPID' => [
        'subject' => $email, // can be a mailto: or your website address
        'publicKey' => $keys['public'], // (recommended) uncompressed public key P-256 encoded in Base64-URL
        'privateKey' => $keys['private'], // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
    ],
];

$webPush = new WebPush($auth);

$report = $webPush->sendOneNotification(
  Subscription::create(json_decode($key_navegator_client_subscribe)), 
  $payload_content_message, 
  ['TTL' => 15000]
);

print_r($report);