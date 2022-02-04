<?php
$CAPTCHA_SITE_KEY = "6LeCkMUdAAAAAOly8h1e4t4oIRlDODXWbBM5iUJ4";

function removeFilename($url)
{
    $file_info = pathinfo($url);
    return isset($file_info['extension'])
        ? str_replace($file_info['filename'] . "." . $file_info['extension'], "", $url)
        : $url;
}

// $USERNOTIFICATION_FILE_PATH = trim(removeFilename($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']),"/backend/");
$USERNOTIFICATION_FILE_PATH = "https://svgroups.in/new/svgroups";
?>
