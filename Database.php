<?php

class Database {

  private $host;
  private $user;
  private $password;
  private $database;
  public $koneksi;

  public function __construct($host, $user, $password, $database) {
    $this->host = $host;
    $this->user = $user;
    $this->password = $password;
    $this->database = $database;

    $this->inisialisasi();
  }

  public function inisialisasi() {
    $this->koneksi = new mysqli(
      $this->host,
      $this->user,
      $this->password,
      $this->database
    );
  }
}
