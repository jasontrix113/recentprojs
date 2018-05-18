<?php

require __DIR__ . '/../Bootstrap/app.php';

// Create Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('jsnjocsin@gmail.com')
    ->setPassword('jpskrilljap113');

// Create Mailer with our Transport.
$mailer = new Swift_Mailer($transport);

$app-> run();