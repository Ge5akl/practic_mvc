<?php
    //Подключение шапки
    require_once("header.php");
?>
 

 
<?php
    //Проверяем, если пользователь не авторизован, то выводим форму авторизации, 
    //иначе выводим сообщение о том, что он уже авторизован
    if(!isset($_SESSION["login"]) && !isset($_SESSION["password"])){
?>
 
 
    <div id="form_auth">
        <h2>Форма авторизации</h2>
        <form action="auth.php" method="post" name="form_auth">
            <table>
          
                <tbody><tr>
                    <td> login: </td>
                    <td>
                        <input type="text" name="login" required="required"><br>
                        <span id="valid_login_message" class="mesage_error"></span>
                    </td>
                </tr>
          
                <tr>
                    <td> Пароль: </td>
                    <td>
                        <input type="password" name="password" placeholder="минимум 6 символов" required="required"><br>
                        <span id="valid_password_message" class="mesage_error"></span>
                    </td>
                </tr>
 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_submit_auth" value="Войти">
                    </td>
                </tr>
            </tbody></table>
        </form>
    </div>
 
<?php
    }else{
?>
 
    <div id="authorized">
        <h2>Вы уже авторизованы</h2>
    </div>
 
<?php
    }
?>
 
<?php
    //Подключение подвала
    require_once("footer.php");
?>