<?php


final class Data
{
  private $db;

  public function __construct(Database $db)
  {
    $this->db = $db;
  }

  public function getCourses(string $type): ?array
  {
    $result = $this->db->fecthAll('SELECT * FROM `getCourses` WHERE `courseType` = :type', ['type' => $type]);
    return $result;
  }

  public function getUserNotes($userId): ?array
  {
    return $this->db->fecthAll('CALL getUserNotes(:id)', ['id' => $userId]);
  }

  public function createUserNote($value, $userId): void
  {
    $this->db->query('call createNote(:value, :userId)', ['value' => $value, 'userId' => $userId]);
    header("Location: " . $_SERVER['REQUEST_URI']);
  }

  public function getQueries(string $sortBy, string $startDate, string $endDate, array $statuses = []): ?array
  {
    if (count($statuses) < 2) {
      $result = $this->db->fecthAll(
        "SELECT * FROM `getQueriesPreSort` WHERE `date` BETWEEN '$startDate' AND '$endDate' AND `status` = '$statuses[0]' ORDER BY $sortBy DESC"
      );
    } else {
      $result = $this->db->fecthAll(
        "SELECT * FROM `getQueriesPreSort` WHERE `date` BETWEEN '$startDate' AND '$endDate' AND `status` = '$statuses[0]' OR `status` = '$statuses[1]' ORDER BY $sortBy DESC"
      );
    }

    return $result;
  } 

}