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

  public function getCourseData(string $name): ?array
  {
    return $this->db->fetch('SELECT * FROM `getCourses` WHERE `name` = :name', ['name' => $name]);
  }

  public function getUserNotes($userId): ?array
  {
    return array_reverse($this->db->fetchAll('CALL getUserNotes(:id)', ['id' => $userId]));
  }

  public function createUserNote($value, $userId): void
  {
    $this->db->query('call createNote(:value, :userId)', ['value' => $value, 'userId' => $userId]);
  }

  public function getPhotos(): ?array 
  {
    return $this->db->fetchAll('SELECT * FROM `gallery`');
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

  public function getCalls(string $sortBy) {
    return $this->db->fetchAll(
      "SELECT * FROM `getCalls` WHERE `status` = 'Не обзвонен' OR `status` = 'Обзвонен' ORDER BY $sortBy DESC"
    );
  }

  public function handleCall(string $id) {
    $preparedCallId = htmlspecialchars(substr(trim($id), 5));
    $this->db->query(
      "UPDATE `calls` SET `status` = 'Обзвонен' WHERE `id` = :id",
      ['id' => $preparedCallId]
    );
  }

  public function dropCall(string $id) {
    $preparedCallId = htmlspecialchars(substr(trim($id), 5));
    $this->db->query(
      "DELETE FROM `calls` WHERE `id` = :id",
      ['id' => $preparedCallId]
    );
  }

  public function dropNote(string $id) {
    $preparedNoteId = htmlspecialchars(substr(trim($id), 5));
    $this->db->query(
      'DELETE FROM `notes` WHERE `id` = :id',
      ['id' => $preparedNoteId]
    );
  }

  public function editNote(string $id, string $newValue) {
    $preparedNoteId = htmlspecialchars(substr(trim($id), 5));
    $preparedValue = htmlspecialchars(trim($newValue));
    
    $this->db->query(
      "UPDATE `notes` SET `value` = :newValue WHERE `id` = :id",
      ['newValue' => $preparedValue, 'id' => $preparedNoteId]
    );
  }

  public function getUsersList(): ?array
  {
    return $this->db->fetchAll('SELECT * FROM `getUsersList`');
  }
}