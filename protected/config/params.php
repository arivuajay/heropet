<?php

$whitelist = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    $mailsendby = 'smtp';
} else {
    $mailsendby = 'phpmail';
}

$fb_app_id = '809335985824213';
$fb_sec_id = '555f113549dcbb1faf4c0d80dc361969';

$google_app_id = '164476298414-4mm3prp7mk0utcuvjva7h5jnvfus68h9.apps.googleusercontent.com';
$google_sec_id = 'KoSNFXEJsRAHye0lSZaGqvZo';

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
    
    'FB_APP_ID' => $fb_app_id,
    'FB_SEC_ID' => $fb_sec_id,
    
    'GOOGLE_APP_ID' => $google_app_id,
    'GOOGLE_SEC_ID' => $google_sec_id,
);

