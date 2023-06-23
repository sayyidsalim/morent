<?php
require_once __DIR__ . "/../repository/kenoksi.php";
class search
{
  public $connection;
  public function __construct()
  {
    $database = new Database;
    $this->connection = $database->getConnection();
  }

  /**
   * @param string
   * @return array
   * @author sy salim <mohsalim951@gmail.com>
   */

   
  public function searchBy(string $search): array
  {
    $sql = "SELECT * FROM products WHERE name LIKE :search";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindValue(":search", "%" . $search . "%");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $this->connection = null;
  }
}
