<?PHP
/**
 * Класс конфига БД
 */
class DB{
    const USER = "root";
    const PASS = "";
    const HOST = "localhost";
    const db = "tasklist";

    public static function connToDB(){
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::db;

        $conn = $mysqli = new mysqli($host, $user, $pass, $db);
        return $conn;
    }
}