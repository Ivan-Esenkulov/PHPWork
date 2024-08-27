<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>

<?php
use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Loader;
/*use Bitrix\Main\Localization\Loc;*/
/*Loader::registerAutoLoadClasses(null, ['ctest' => '/local/modules/lib/ctest.php']);*/
use Bitrix\Test\Ctest;
/*$path = $_SERVER["DOCUMENT_ROOT"] . "/temporary_files/" . $_FILES["file"]["name"];

$res = move_uploaded_file($_FILES["file"]["tmp_name"], $path);*/

/*debugFun($res);

debugFun($_FILES['file']['tmp_name']);

debugFun($_SERVER["DOCUMENT_ROOT"]); */?>

    <!--<a href="<?/* $_FILES["file"]["tmp_name"] */?>" download><?php /*= $_FILES["file"]["name"] */?></a>-->

<?php /*unlink($_SERVER["DOCUMENT_ROOT"] . "/temporary_files/" . $_FILES["file"]["name"]); */ ?>
<?php

/*Debug::dumpToFile(['FILES' => $_FILES, 'NAME' => $_POST['fio']], rand(1,100) . "values", "/files.php");*/

/*$arr['NAME'] = $_POST['fio'];
$arFiles = [
    "name" => $_FILES['file']['name'],
    "size" => $_FILES['file']['size'],
    "tmp_name" => $_FILES['file']['tmp_name'],
    "type" => $_FILES['file']['typ'],
];*/
Ctest::test2();
$app = \Bitrix\Main\Application::getInstance();
$context = $app->getContext();
$request = $context->getRequest();
$file = $request->getFileList()->toArray();
/*debugFun($file->toArray());
debugFun($request->getPostList()->toArray());*/

/*function test()
{
    echo '11111111111';
}*/
$context->getResponse();
$idFile = CFile::SaveFile($file, 'temporary_files/');
$fileT = CFile::GetByID($idFile)->Fetch();
$server = $context->getServer();
debugFun($server);
echo 'Text';
echo '1111111';
debugFun(Loader::getDocumentRoot());
debugFun($app->getDocumentRoot());
/*while ($t = $fileT->fetch()) {
    debugFun($t);
}*/
/*LocalRedirect('/test_form/form.php');*/


/*Debug::startTimeLabel('test');
test();
Debug::endTimeLabel('test');
Debug::getTimeLabels();
CEvent::Send("TEST_1", "s1", $arr, 'Y', '', [$idFile]);
LocalRedirect('/test_form/form.php');*/
?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>