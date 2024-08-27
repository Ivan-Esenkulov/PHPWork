<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
    <div class="container">
        <form action="ajax_heandlers.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <label>
                    <span class="col-md-6">ФИО</span>
                    <input required type="text" name="fio"/>
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
    </div>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>