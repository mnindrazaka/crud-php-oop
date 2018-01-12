<?php

include 'Database.php';

class Crud {

  private $database;

  public function __construct()
  {
    $this->database = new Database("localhost", "root", "", "db_perpustakaan");
  }

  public function select($table, $where = null) {
    // building query
    $q = "SELECT * FROM $table ";
    if($where) {
      $q .= "WHERE $where";
    }

    // execute and get result
    $table = $this->database->koneksi->query($q);
    $result = [];
    while($data = $table->fetch_assoc()) {
      array_push($result, $data);
    }
    return $result;
  }

  public function insert($table, $data) {
    $q = "INSERT INTO $table SET ";
    foreach($data as $key => $value) {
      $q .= "$key = '$value'";

      if(key(array_slice($data, -1, 1)) != $key) {
        $q .= ", ";
      }
    }
    $this->database->koneksi->query($q);
  }

  public function update($table, $data, $id_key, $id_value)
  {
    $q = "UPDATE $table SET ";
    foreach($data as $key => $value) {
      $q .= "$key = '$value'";

      if(key(array_slice($data, -1, 1)) != $key) {
        $q .= ", ";
      }
    }

    $q .= " WHERE $id_key = '$id_value'";
    $this->database->koneksi->query($q);
  }

  public function delete($table, $id_key, $id_value)
  {
    $q = "DELETE FROM $table WHERE $id_key = '$id_value'";
    $this->database->koneksi->query($q);
  }
}
