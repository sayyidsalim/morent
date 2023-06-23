<?php
include_once __DIR__ . "/kenoksi.php";
$contries = ["surabaya", "jakarta", "semarang", "lombok", "kediri", "malang", "sidoarjo"];
class order
{
  public $connection;
  public function __construct()
  {
    $database = new Database;
    $this->connection = $database->getConnection();
  }

  public function insertInOrder(
    int $product_id,
    int $user_id,
    string $waktu_order_dimulai,
    string $waktu_order_selesai,
    string $nama_penerima,
    string $alamat_penerima,
    $telepon_penerima,
    string $negara_penerima,
    $total_harga
  ) {
    $sql = "INSERT INTO ordercar(product_id, user_id, waktu_order_dimulai, waktu_order_selesai, nama_penerima, alamat_penerima,telepon_penerima, negara_penerima, total_harga) VALUES(?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connection->prepare($sql);
    try {

      $stmt->bindParam(1, htmlspecialchars($product_id));
      $stmt->bindParam(2, htmlspecialchars($user_id));
      $stmt->bindParam(3, htmlspecialchars(strtolower($waktu_order_dimulai)));
      $stmt->bindParam(4, htmlspecialchars(strtolower($waktu_order_selesai)));
      $stmt->bindParam(5, htmlspecialchars(strtolower(trim($nama_penerima))));
      $stmt->bindParam(6, htmlspecialchars(strtolower($alamat_penerima)));
      $stmt->bindParam(7, htmlspecialchars($telepon_penerima));
      $stmt->bindParam(8, htmlspecialchars(strtolower(trim($negara_penerima))));
      $stmt->bindParam(9, htmlspecialchars($total_harga));
      $stmt->execute();
      $orderId = $this->connection->lastInsertId();
      return $orderId;
    } catch (PDOException $exception) {
      echo "gagal memasukkan data" . $exception->getMessage();
    }
    $stmt->closeCursor();
  }

  public function pembayaran(int $order_id, $metode_pembayaran, $nama_rekening, $nomer_rekening): bool
  {
    try {
      $sql = "INSERT INTO pembayaran(order_id, metode_pembayaran, nama_rekening, nomer_rekening)VALUE(?,?,?,?)";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(1, htmlspecialchars($order_id));
      $stmt->bindParam(2, htmlspecialchars(trim(strtolower($metode_pembayaran))));
      $stmt->bindParam(3, htmlspecialchars(trim(strtolower($nama_rekening))));
      $stmt->bindParam(4, htmlspecialchars($nomer_rekening));
      $stmt->execute();
      return true;
    } catch (PDOException $exception) {
      echo "gagal memasukkan data" . $exception->getMessage();
      return false;
    }
    $stmt->closeCursor();
  }
}
