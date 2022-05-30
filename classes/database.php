<?php


/**
 * Singleton class
 *
 */
final class Database
{
  private static $instance = null;
  private \PDO $pdo;
  // Prevent cloning and de-serializing
  public function __clone() {}
  public function __wakeup() {}

  /**
   * Call this method to get singleton
   *
   * @return Database
   */
  public static function Instance()
  {
    if (self::$instance === null) {
      $instance = new self();
    }

    return $instance;
  }

  /**
   * Fetching all rows in query execution result
   * @param string $sql Query statement string
   * @param array $params Params for query statement
   * @return array Associative array as result of query execution
   */
  public final function fetchAll(string $sql, array $params = []): ?array {
    $result = $this->pdo->prepare($sql);
    $result->execute($params);
    $result = $result->fetchAll(\PDO::FETCH_ASSOC);
    return $result;
  }

  /**
   * Fetching all rows in query execution result
   * @param string $sql Query statement string
   * @param array $params Params for query statement
   * @return array One item as associative array of an query execution result
   */
  public final function fetch(string $sql, array $params = []): ?array {
    $result = $this->pdo->prepare($sql);
    $result->execute($params);
    $result = $result->fetch(\PDO::FETCH_ASSOC);
    
    if ($result) {
      return $result;
    } else {
      return [];
    }
  }

  public final function query(string $sql, array $params = []): void
  {
    $this->pdo->prepare($sql)->execute($params);
  }
  
  /**
   * Private ctor so nobody else can instantiate it
   *
   */
  private function __construct()
  {
    $this->pdo = new \PDO('mysql:charset=utf8; port=3307; host=localhost; dbname=odospk', 'root', '');
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
  }
}
