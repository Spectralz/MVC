<?php


class DataBase
{
    static $db_host;
    static $db_user;
    static $db_password;
    static $db_used;
    static $pdo;

    public function __construct($db_host, $db_user, $db_password, $db_used)
    {
        $this->db_host = $db_host;
        $this->db_user =$db_user;
        $this->db_password = $db_password;
        $this->db_used= $db_used;
    }



    public function dbConnect()
    {
        $link = "mysql:host=$this->db_host;dbname=$this->db_used";
        $this->pdo = new PDO($link, $this->db_user, $this->db_password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        $set_utf8 = $this->pdo->query('SET NAMES UTF8');
        echo "DB connected";
    }

    public function dbSqlPrepare($sql)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function dbSqlCreate($sql)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute();
    }
    public function dbSqlCreateUser($sql)
    {
        $query = $this->pdo->prepare($sql);
        $query->execute();
    }
}