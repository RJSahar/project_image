<?php

session_start();
include 'script.php';
include 'head.php';
if (!isset($_SESSION['logged_user'])) { ?>
    <div class="container">
        <p class="fs-1 fw-bold" style="color: white" align="center">Тебе нужно зарегистрироваться, чтобы пользваться сервисом</p>
    </div>
<?php } else { ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="mb-3">
                    <br>
                    <form method="post" name="img_load" enctype="multipart/form-data">
                        <input class="form-control" name="img" type="file" id="formFileMultiple" multiple accept="image/*">
                        <label for="formFileMultiple" class="form-label text-white">Загрузите изображение здесь</label><br>
                        <input type="submit" name="Submit" value="Отправить" class="btn btn-primary">
                    </form>
                </div>
                <hr>
                <div class="mb-3">
                    <form enctype="multipart/form-data" method="post">
                        <label for="img_url" class="form-label text-white">Вставьте ссылку на изображение</label>
                        <input class="form-control" type="text" name="img_url" id="img_url"><br>
                        <input type="submit" value="Отправить URL" class="btn btn-primary">
                    </form>
                    <br>  
                </div>
            </div>
            <div class="col-md-12">
            <?php foreach (array_slice($files, 0, 5) as $file): ?>
                        <img width="300" src="/image/<?=$_SESSION['logged_user'] . "//" . $file ?>" class="img-thumbnail">
                    <?php endforeach ?>
            </div>
        </div> 
    </div>   
</body>
</html>

<?php } ?>