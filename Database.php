<?php //db.conf

class Database
{
    const DBHOST = 'localhost';
    const DBUSER = 'root';
    const DBPASS = '';
    const DBNAME = 'scrabblito';

    private static $dbh;

    private static function getDbh()
    {
        if (empty(self::$dbh)) {
            try {
                //connexion à la base avec la classe PDO et le dsn
                $dbh = new PDO(
                    'mysql:host=' . DBHOST . ';dbname=' . DBNAME,
                    DBUSER,
                    DBPASS,
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4", //on s'assure de communiquer en utf8
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod.
                    ]
                );
            } catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
                echo 'Erreur de connexion : ' . $e->getMessage();
            }
        }
        return self::$dbh;
    }

    static public function findWord($word)
    {
        $dbh = self::getDbh();
        $sql = "SELECT *
                FROM words
                WHERE word = :word";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([":word" => $word]);

        return $stmt->fetch();
    }
}