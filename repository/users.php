<?php
require_once __DIR__ . "/kenoksi.php";
class users
{
  public $connection;
  private string $username;
  private string $email;
  private int $telepon;
  function __construct()
  {
    $database = new Database;
    $this->connection = $database->getConnection();
  }

  // setter untuk username
  public function setUsername(string $username): void
  {
    $this->username = $username;
  }
  // getter untuk username
  public function getUsername(): string
  {
    return $this->username;
  }

  // setter getter untuk email

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  // setter getter untuk telepon

  public function setTelepon($telepon): void
  {
    $this->telepon = $telepon;
  }

  public function getTelepon(): int
  {
    return $this->telepon;
  }
  // membuat pemanggilan data melalui username untuk login
  function getByUsernameInLogin(string $username)
  {
    $sql = "SELECT username, role, password, id FROM users WHERE username = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(1, $username);
    $this->setUsername($username);
    $stmt->execute();
    return $stmt;
    $this->connection = null;
  }


  // disini adalah funcsi yang akan di buat untuk mengisi data ke dalam database..

  function insertAllData(string $username, string $email, string $telepon, string $password): void
  {
    try {
      $sql = "INSERT INTO users(username,email,telepon,password)VALUES(?,?,?,?)";
      $stmt = $this->connection->prepare($sql);
      $stmt->bindParam(1, htmlspecialchars(strtolower($username)));
      $stmt->bindParam(2, htmlspecialchars($email));
      $stmt->bindParam(3, htmlspecialchars($telepon));
      $stmt->bindParam(4, htmlspecialchars(trim(password_hash($password, PASSWORD_DEFAULT))));
      $stmt->execute();
      $this->email = $email;
      $this->telepon = $telepon;
      $this->connection = null;
    } catch (PDOException $Exception) {
      $Exception->getMessage();
    }
  }
}
