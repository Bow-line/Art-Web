<?php


class Registration extends Database
{
    private $collection='zarejestruj';
    public function __construct() {
        parent::__construct();
        $this->dbHandler = $this->dbHandler->{$this->collection};
    }
}