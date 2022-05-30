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
    $result = $this->db->fetchAll('SELECT * FROM `getCourses` WHERE `courseType` = :type', ['type' => $type]);
    return $result;
  }

  public function getUserNotes($userId): ?array
  {
    return array_reverse($this->db->fetchAll('CALL getUserNotes(:id)', ['id' => $userId]));
  }

  public function createUserNote($value, $userId): void
  {
    $this->db->query('call createNote(:value, :userId)', ['value' => $value, 'userId' => $userId]);
    header("Location: " . $_SERVER['REQUEST_URI']);
  }

  public function getQueries(string $queriesType, string $sortBy): ?array
  {
    $result = [];

    switch ($queriesType) {
      case 'Education':
        $result = $this->db->fetchAll("SELECT * FROM `getQueriesPreSort` WHERE `status` = 'Не обработано' OR `status` = 'Обработано' ORDER BY $sortBy DESC");
        break;
      case 'Archived':
        $result = $this->db->fetchAll("SELECT * FROM `getQueriesPreSort` WHERE `status` = 'Архивировано' ORDER BY $sortBy DESC");
        break;
      case 'Removed':
        $result = $this->db->fetchAll("SELECT * FROM `getQueriesPreSort` WHERE `status` = 'Удалено' ORDER BY $sortBy DESC");
        break;
    }

    return $result;
  } 

}