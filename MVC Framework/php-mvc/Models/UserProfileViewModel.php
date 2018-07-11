<?php


namespace Models;

class UserProfileViewModel
{

  private $id;

  private $username;

  private $full_name;

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * @param mixed $username
   */
  public function setUsername($username)
  {
    $this->username = $username;
  }

  /**
   * @return mixed
   */
  public function getFullName()
  {
    return $this->full_name;
  }

  /**
   * @param mixed $full_name
   */
  public function setFullName($full_name)
  {
    $this->full_name = $full_name;
  }


}