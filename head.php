<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>RJSahar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: grey;
            /*background-image: url(https://catherineasquithgallery.com/uploads/posts/2021-02/1612465017_43-p-seraya-stena-fon-dlya-fotoshopa-79.jpg);*/
        } 
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">RJSahar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-grid gap-2" id="navbarSupportedContent">
                <a class="nav-link active btn btn-outline-success" aria-current="page" href="/form_register.php">Регистрация</a><br>
            </div>
            <?php if (!isset($_SESSION['logged_user'])) { ?>
            <div class="collapse navbar-collapse d-grid gap-2 justify-content-md-end" id="navbarSupportedContent">
                <form class="d-grid gap-2 d-md-flex justify-content-md-end" action="form_auth.php" method="post">
                    <input type="text" name="login" class="form-control" id="login" placeholder="Логин"><br>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Пароль"><br>
                    <button class="btn btn-success">Авторизоваться</button><br>
                </form>
            </div>
            <?php } else { ?>
            <div class="container">
                <p class="fs-1 fw-bold" style="color: white" align="center"><?php echo $_SESSION['logged_user']; ?></p>
            </div>
            <form method="post" name="exit">
                <input type="submit" name="submit" value="Выход" class="btn btn-primary">
            </form>
            
            <?php if(isset($_POST['submit'])) {
                unset($_SESSION['logged_user']);
                unset($_POST['submit']);
                header("Location: index.php");
            }
            } ?>
        </div>
    </nav>