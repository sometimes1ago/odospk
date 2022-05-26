<?php


final class Data
{
  private $db;

  public function __construct(Database $db)
  {
    $this->db = $db;
  }

  public function getCourses(string $type): array
  {
    $result = $this->db->fecthAll('SELECT * FROM `getCourses` WHERE `courseType` = :type', ['type' => $type]);
    return $result;
  }

}