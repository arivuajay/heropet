<?php
$whitelist = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    $mailsendby = 'smtp';
    $test_ip = '122.174.91.122';
} else {
    $mailsendby = 'phpmail';
    $test_ip = Yii::app()->request->getUserHostAddress();
}

// Custom Params Value
return array(
    //Global Settings
    'EMAILLAYOUT' => 'file', // file(file concept) or db(db_concept)
    'EMAILTEMPLATE' => '/mailtemplate/',
    'MAILSENDBY' => $mailsendby,
    //EMAIL Settings
    'SMTPHOST' => 'smtp.gmail.com',
    'SMTPPORT' => '465', // Port: 465 or 587
    'SMTPUSERNAME' => 'marudhuofficial@gmail.com',
    'SMTPPASS' => 'ninja12345',
    'SMTPAUTH' => true, // Auth : true or false
    'SMTPSECURE' => 'ssl', // Secure :tls or ssl
    'NOREPLYMAIL' => 'noreply@heropet.com',
    'CONTACTMAIL' => 'contact@heropet.com',
    'JS_SHORT_DATE_FORMAT' => 'yy-mm-dd',
    'PHP_SHORT_DATE_FORMAT' => 'Y-m-d',

    //Product Settings
    'JOURNAL_IMG_PATH' => 'uploads/journal/',
    'EMAILHEADERIMAGE' => '/themes/adminlte/img/header-logo.png',

    'PAGE_SIZE' => '10',
    
    'EMAILHEADERIMAGE' => '',
    
    'IPADDRESS' => $test_ip,
);

