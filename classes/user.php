<?php



final class User
{
  private int $id;
  private string $login;
  private string $name;
  private string $accessLevel;
  private string $photo;

  public function __construct(
    int $id,
    string $login,
    string $name,
    string $accessLevel,
    string $photo
  )
  {
    $this->id = $id;
    $this->login = $login;
    $this->name = $name;
    $this->accessLevel = $accessLevel;
    $this->photo = $photo;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getLogin(): string
  {
    return $this->login;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getAccessLevel(): string
  {
    return $this->accessLevel;
  }

  public function getPhoto(): string
  {
    return $this->photo;
  }
}
