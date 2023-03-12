<?php

class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $dbPort = DB_PORT;

    protected $statement;
    protected $dbHandler;
    protected $error;

    public function __construct()
    {
        $conn = "mongodb://{$this->dbHost}:{$this->dbPort}/{$this->dbName}";

        try {
            $this->dbHandler = (new MongoDB\Client($conn,['username'=>$this->dbUser,'password'=>$this->dbPass]))->{$this->dbName};
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }
    public function insert ($data=[]){
        $this->dbHandler->insertOne($data);

    }
    public function getall(){
        return $this->dbHandler->find();
    }
    public function findall(){
        return $this->dbHandler->findOne();
    }
}

