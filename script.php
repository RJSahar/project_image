<?php 
if (isset($_SESSION['logged_user'])) {
    if (!is_dir('image/' . $_SESSION['logged_user'])) {
     mkdir('image/' . $_SESSION['logged_user']);
    }
    $files = scandir('image/' . $_SESSION['logged_user']);
    $files = array_diff($files, ['.', '..']);
    shuffle($files);

    if (!empty($_FILES['img']['tmp_name'])) {
        $fileTempName = $_FILES['img']['tmp_name'];
        $type = $_FILES['img']['type']; 

        if (is_uploaded_file($fileTempName)) {
            $file_name = time() . '_' . rand(0, 1000);

            switch ($_FILES['img']['type']) {
                case 'image/png':
                    $file_name .= '.png';               
                    break;
                case 'image/jpg':
                    $file_name .= '.jpg';               
                    break;
                case 'image/jpeg':
                    $file_name .= '.jpeg';              
                    break;
                default:
                    echo 'Файл неподдерживаемого типа';
                    break;
            }

            if (move_uploaded_file($fileTempName, "image/" . $_SESSION['logged_user'] . "//" . $file_name)) {
                echo 'Файл сохранен под именем ' . $file_name;

            } else {
                echo 'Не удалось сохранить';
            }
        } else {
            echo 'Файл не был загружен на сервер';
        }
    }

    if (!empty($_POST['img_url'])) {
        $img_url = $_POST['img_url'];
        $raw_img_url = file_get_contents($img_url);

        if ($raw_img_url) {
            $url_image_name = time() . '_' . rand(0, 1000);
            file_put_contents("image/" . $_SESSION['logged_user'] . $url_image_name . ".jpg", $raw_img_url);
        }
    }
}
?>