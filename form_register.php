<?php

session_start();
include 'head.php';
?>

    <div class="block_for_messages">
        <?php
            if(isset($_SESSION["error_messages"]) && !empty($_SESSION["error_messages"])){
                echo $_SESSION["error_messages"];
                unset($_SESSION["error_messages"]);
            }
 
            if(isset($_SESSION["success_messages"]) && !empty($_SESSION["success_messages"])){
            echo $_SESSION["success_messages"];
            unset($_SESSION["success_messages"]);
            }
        ?>
    </div>
 
    <?php if(!isset($_SESSION["login"]) && !isset($_SESSION["password"])){ ?>
        <div id="form_register" class="container">
            <label for="form_register" class="form-label text-white"><h2>Форма регистрации</h2></label>
 
            <form action="register.php" method="post" name="form_register">
                <div class="container">
                    <label for="form_register" class="form-label text-white"><h4>Login:</h4></label>
                    <input class="form-label" type="text" name="login" required="required" size="15" maxlength="15"><br>
                    <span id="valid_login_message" class="mesage_error"></span>
                    <label for="form_register" class="form-label text-white"><h4>Пароль:</h4></label>
                    <input type="password" name="password" placeholder="минимум 6 символов" required="required" size="15" maxlength="15" minlength="6"><br>
                    <span id="valid_password_message" class="mesage_error"></span>
                    <input class="btn btn-success" type="submit" name="btn_submit_register" value="Зарегистрироватся!">
                </div>
            </form>
        </div>
    <?php }else{ ?>
    <div id="authorized">
        <h2>Вы уже зарегистрированы</h2>
    </div>
    <?php } ?>
</body>
</html>