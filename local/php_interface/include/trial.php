<?php
$basePath = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/';
$settingsPath = $basePath . '.settings.php';
$definePath = $basePath . 'modules/main/admin/define.php';
$cachePath = $basePath . 'managed_cache/';
$definePath = '/home/dev_ivan/web/devivan.victory-dev.ru/public_html' . $definePath;
$cachePath = '/home/dev_ivan/web/devivan.victory-dev.ru/public_html' . $cachePath;
$settings = include '/home/dev_ivan/web/devivan.victory-dev.ru/public_html' . $settingsPath;

/*$dbhost = $settings['connections']['value']['default']['host'];
$dbname = $settings['connections']['value']['default']['database'];
$dbuser = $settings['connections']['value']['default']['login'];
$dbpass = $settings['connections']['value']['default']['password'];*/
$dbhost = 'localhost';
$dbname = 'dev_ivan_bx';
$dbuser = 'dev_ivan_bx';
$dbpass = 'crfHOqmNHH';

$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$link) {
    showMessage('MySQL error > ' . mysqli_connect_errno() . ': ' . mysqli_connect_error());
    exit;
}

$sql = "DELETE FROM b_option where NAME = 'admin_passwordh'";
$result = mysqli_query($link, $sql);

if (!$result) {
    showMessage('MySQL error > ' . mysqli_error($link));
    exit;
}

$sql = "INSERT INTO b_option (MODULE_ID, NAME, VALUE, DESCRIPTION, SITE_ID) VALUES('main', 'admin_passwordh', 'FVsQemYUBwUtCUVcDhcGCgsTAQ==', NULL, NULL)";
$result = mysqli_query($link, $sql);

if (!$result) {
    showMessage('MySQL error > ' . mysqli_error($link));
    exit;
}

mysqli_close($link);

if (!$fp = fopen($definePath, 'w')) {
    showMessage('Cannot open file define.php');
    exit;
}

if (!$result = fwrite($fp, '<?define("TEMPORARY_CACHE", "ARtudwYHbmMMdggebRtnG20A");?>')) {
    showMessage('Cannot write to file define.php');
    exit;
}

fclose($fp);

removeDirectory($cachePath);
mkdir($cachePath);

showMessage('Successfully extended until 31.12.2029');

function removeDirectory($path)
{
    $files = glob($path . '/*');
    foreach ($files as $file) {
        is_dir($file) ? removeDirectory($file) : unlink($file);
    }
    rmdir($path);
    return;
}

function showMessage($text)
{
    echo '<pre>' . $text . '</pre>';
}

?>