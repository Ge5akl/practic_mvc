 <head>
     <title>Авторизация</title>
 </head>
 <div id="form_auth">
     <h2>Форма авторизации</h2>
     <form action="" method="post" name="form_auth">
         <?php if (!empty($pageData['error'])) : ?>
             <p><?php echo $pageData['error']; ?></p>
         <?php endif; ?>
         <table>

             <tbody>
                 <tr>
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
             </tbody>
         </table>
     </form>
 </div>