<?php
    //Запускаем сессию
    session_start();

    //Добавляем файл подключения к БД
    require_once("dbconnect.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

    /*
        Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, значит пользователь зашёл на эту страницу напрямую. В этом случае выводим ему сообщение об ошибке.
    */
    if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"])){

         // (1) Место для следующего куска кода
        
        //Проверяем полученную капчу
        //Обрезаем пробелы с начала и с конца строки
          

            // (2) Место для следующего куска кода
            
            // Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.
            if(isset($_POST["login"])){
                
                //Обрезаем пробелы с начала и с конца строки
                $login = trim(htmlspecialchars($_POST["login"]));

                //Проверяем переменную на пустоту
                if(!empty($login)){
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $login = htmlspecialchars($login, ENT_QUOTES);
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваше имя</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем скрипт
                    exit();
                }

                
            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с именем</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем скрипт
                exit();
            }

            
            if(isset($_POST["login"])){

                //Обрезаем пробелы с начала и с конца строки
                $login = trim( htmlspecialchars($_POST["login"]));

                if(!empty($login)){


                    $login = htmlspecialchars($login, ENT_QUOTES);

                    // (3) Место кода для проверки формата почтового адреса и его уникальности


                    //Проверяем нет ли уже такого адреса в БД.
                    $result_query = $mysqli->query("SELECT `login` FROM `users` WHERE `login`='".$login."'");
                    
                    if($result_query->num_rows == 1){

                        //Если полученный результат не равен false
                        if(($row = $result_query->fetch_assoc()) != false){
                            
                                // Сохраняем в сессию сообщение об ошибке. 
                                $_SESSION["error_messages"] .= "<p class='mesage_error' >Пользователь с таким логином уже зарегистрирован</p>";
                                
                                //Возвращаем пользователя на страницу регистрации
                                header("HTTP/1.1 301 Moved Permanently");
                                header("Location: ".$address_site."/form_register.php");
                            
                        }else{
                            // Сохраняем в сессию сообщение об ошибке. 
                            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка в запросе к БД</p>";
                            
                            //Возвращаем пользователя на страницу регистрации
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."/form_register.php");
                        }

                        /* закрытие выборки */
                        $result_query->close();

                        //Останавливаем  скрипт
                        exit();
                    }

                    /* закрытие выборки */
                    $result_query->close();
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш login</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем  скрипт
                    exit();
                }

            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода login</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }

            
            if(isset($_POST["password"])){

                //Обрезаем пробелы с начала и с конца строки
                $password = trim($_POST["password"]);

                if(!empty($password)){
                    $password = htmlspecialchars($password, ENT_QUOTES);

                    //Шифруем папроль
                    $password = md5($password."top_secret"); 
                }else{
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваш пароль</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем  скрипт
                    exit();
                }

            }else{
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле для ввода пароля</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }

            // (4) Место для кода добавления пользователя в БД

            //Запрос на добавления пользователя в БД
            $result_query_insert = $mysqli->query("INSERT INTO `users` (login, password) VALUES ('".$login."','".$password."')");

            if(!$result_query_insert){
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }else{

                $_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно!!! <br />Теперь Вы можете авторизоваться используя Ваш логин и пароль.</p>";

                //Отправляем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
            }

            /* Завершение запроса */
            $result_query_insert->close();

            //Закрываем подключение к БД
            $mysqli->close();
            
        }
?>