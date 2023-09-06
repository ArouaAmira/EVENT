<?php
class Config {
    private static $pdo=NULL;
    public static function getConnexion() {
        if (!isset(self::$pdo)){
            try {
                self::$pdo =new PDO("mysql:host=localhost;dbname=projet1","root","",
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]);
            }
            catch (Exception $e){
                die("Error: ".$e->getMessage());
            }
        }
        return self::$pdo;
    }
}
?>