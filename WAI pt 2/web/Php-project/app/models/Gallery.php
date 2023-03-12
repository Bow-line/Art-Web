<?php


class Gallery extends Database
{
   private $collectionName='gallery';
   public function __construct() {
       parent::__construct();
       $this->dbHandler = $this->dbHandler->{$this->collectionName};
   }


}