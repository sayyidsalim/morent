<?php 
require_once __DIR__ . "/koneksi.php";
class admin {
  // class ini akan berisi berbagai perintah yang akan dikirim ke perintah yang akan memanggil semua yang di perlukan di alaman dashbord
  public $connection;
  function __construct()
  {
    $database = new Database;
    $this->connection= $database->getConnection();
  }

}
