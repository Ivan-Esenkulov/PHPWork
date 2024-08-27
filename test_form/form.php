<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<?php /*phpinfo() */?>
<div class="container">
    <form id="ttttt" action="heandler.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <label>
                <span class="col-md-6">ФИО</span>
                <input type="text" name="fio" value=""/>
            </label>
        </div>
        <div class="row">
            <label>
                <input type="file" name="file">
            </label>
        </div>
        <div class="row">
                <input type="submit" value="Отправить">
        </div>
    </form>

    <?php
   /* echo "Text" . PHP_EOL;
    $path = "../TestJS.html";
    echo $path . PHP_EOL;
    */?><!--
    <br>
    --><?php
/*    echo dirname(__FILE__) . '<br>' . PHP_EOL;
    echo realpath($path);*/
    ?>

</div>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>