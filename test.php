<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Loader;
use Bitrix\Iblock\Iblock;
use Bitrix\Main\Diag\Debug;

global $USER;

if ($USER->IsAuthorized()) {
    echo 'Test authorized';
}










/*$fp = fopen("directory/open_stream.txt", 'a');
debugFun($fp);
debugFun(fwrite($fp, "<p>Hello, World!</p>\n"));
debugFun(fclose($fp));*/

/*$a = disk_free_space("/");
$b = disk_total_space("/");

echo $a / (1024 * 1024 * 1024); echo '<br>';
echo $b / (1024 * 1024 * 1024); echo '<br><br>';

function sizeData($bytes)
{
    $type = ["Б", "Кбайт", "Мбайт", "Гбайт", "Тбайт", "Пбайт", "Эбайт", "Збайт", "Йбайт"];
    $index = 0;
    while($bytes >= 1024)
    {
        $bytes /= 1024;
        $index++;
    }
    return sprintf("%.2f %s", $bytes, $type[$index]);
}
echo $_SERVER['HTTPS']; echo "<br><br>";
echo session_id(); echo "<br><br>";
$sess = \Bitrix\Main\Application::getInstance()->getSession();
debugFun($sess->getId()); echo "<br><br>";
debugFun(realpath_cache_size()); echo "<br><br>";
var_dump(readlink("/")); echo "<br><br>";
var_dump(linkinfo("text1.txt")); echo "<br><br>";
echo symlink("text1.txt", "txt_file"); echo "<br><br>";
var_dump(move_uploaded_file("/text1.txt", "/include/"));
echo sizeData($b); echo "<br><br>";
debugFun(lstat("text1.txt")); echo "<br><br>";
var_dump(is_executable('text1.txt')); echo "<br><br>";
var_dump(mime_content_type("/include/bx_default_logo.gif")); echo "<br><br>";
$path = pathinfo("/include/news.php");
debugFun($path); echo "<br><br>";
$ex = file("text1.txt", FILE_IGNORE_NEW_LINES);
debugFun(stat("text1.txt")); echo "<br><br>";
debugFun(stat("text1.txt")); echo "<br><br>";
echo date('d/m/Y H:i:s',fileatime('text1.txt')); echo "<br><br>";
debugFun($ex);


debugFun(file_get_contents("text1.txt", false, null, 50, 50));*/


/*$Bytes . " " . $Type[$Index];*/
/*debugFun(copy('1.php', 'freshdress_test.php'));*/
/*unlink('1.php');*/

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>