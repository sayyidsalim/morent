<?php
require_once __DIR__ . "/kenoksi.php";
class products
{
  private $connection;

  public function __construct()
  {
    $database = new Database;
    $this->connection = $database->getConnection();
  }

/**
 * 
 * @param null
 * @return $stmt data semua produk
 * @author sy Salim <mohsalim951l@email.com>
 */

  public function getAllData() : string
  {
    $sql = "SELECT * FROM products";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt;
    $this->connection = null;
  }

  /**
   * @param null
   * @return $stmt berisi data yang akan tampil du halaman home yang berupa sebuah object
   * @author sy salim <mohsalim951@gmail.com>
   */
  // disini sebuah fungsi yang digunakan untuk menampilkan semua data di halaman home...


  public function getAllInHome(): object
  {
    $sql = "SELECT products.id, name, steering, gasoline, harga, gambar_1, kategori, person FROM products JOIN gambar on gambar_id = gambar.id JOIN capacity on capacity_id = capacity.id JOIN type on type_id = type.id";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt;
    $this->connection = null;
  }

  /**
   * @param  id berupa sebuah id dari produk yang akan di proleh dari get
   * @return $stmt berupa semua data yang akan di tampilkan menurut id dari parameter id
   * @author sy salim <mohsalim951gmail.com>
   */

  // disini sebuah fungsi untuk memanggil semua di dalam products dengan id
  public function getById(int $id) : object
  {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt;
    $this->connection = null;
  }

  /**
   * @param  id berupa sebuah id dari produk yang akan di proleh dari get
   * @return $stmt berupa semua data yang akan di tampilkan menurut id dari parameter id dan akan di tampilkan di halaman single...
   * @author sy salim <mohsalim951gmail.com>
   */

  // disini sebuah fungsi untuk memanggil sebuah seluruh data untuk halaman single berdasarkan id single
  public function getAllInSingleById($id) : object
  {
    $sql = "SELECT products.id, name, steering, gasoline, gambar_2, gambar_3, harga, gambar_1, kategori, description, person FROM products JOIN gambar on gambar_id = gambar.id JOIN capacity on capacity_id = capacity.id JOIN type on type_id = type.id WHERE products.id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt;
    $this->connection = null;
  }

  /**
   * @param int
   * @return array
   * @author say salim
   */
  public function getForOrder(int $id): array
  {
    $sql ="SELECT name, gambar_1,harga FROM products JOIN gambar ON gambar_id = gambar.id WHERE products.id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
