 <head>
     <title>Авторизация</title>
 </head>
 <div id="form_auth">
        <h2>Форма авторизации</h2>
        <form action="" method="post" name="form_auth">
             <?php if(!empty($pageData['error'])) :?>
                        <p><?php echo $pageData['error']; ?></p>
                    <?php endif; ?>
            <table>
          
                <tbody><tr>
                    <td> login: </td>
                    <td>
                        <input type="text" name="login" required="required"><br>
                    </td>
                </tr>
          
                <tr>
                    <td> Пароль: </td>
                    <td>
                        <input type="password" name="password" placeholder="минимум 6 символов" required="required"><br>
                    </td>
                </tr>
 
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btn_submit_auth" value="Войти">
                    </td>
                </tr>
            </tbody></table>
        </form>
         <h1 class="text-center login-title">Регистрация</h1>
                        <div class="account-wall">
                            <form method="post" class="form-signin" id="form-reg" name="form-reg">
                            <input type="hidden" name="register" value="register">
                                <?php if(!empty($pageData['registerMsg'])) :?>
                                    <p><?php echo $pageData['registerMsg']; ?></p>
                                <?php endif; ?>
                                <input type="text" name="Reglogin" class="form-control" id="regLogin" placeholder="Логин" required>
                                <input type="password" name="Regpassword" class="form-control" id="regPassword" placeholder="Пароль" required>
                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Регистрация"/>
                            </form>
    </div>