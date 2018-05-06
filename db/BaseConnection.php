<?php

namespace db {

  abstract class BaseConnection
  {
    
    protected $server;
    protected $port;
    protected $user;
    protected $password;
    protected $database;

    function __construct($server, $port, $user, $password, $database)
    {
      $this->server = $server;
      $this->port = $port;
      $this->user = $user;
      $this->password = $password;
      $this->database = $database;
    }

    abstract public function connect();
    abstract public function disconnect();
    abstract public function executeSql($sql);
    abstract public function getResults($result);
  }
}
