<?php

namespace Models;

use \Exceptions\UserProfileValidationException;

class UserProfileSaveModel
{

  const USERNAME_MIN_LENGTH = 3;
  const USERNAME_MAX_LENGTH = 10;

  /**
   * @var string
   */
  private $username;

  /**
   * @var UserProfileViewModel
   */
  private $fullName;

  /**
   * @var string
   */
  private $password;

  /**
   * @var string
   */
  private $confirmPassword;

  /**
   * @return string
   */
  public function getUsername(): string
  {
    return $this->username;
  }

  /**
   * @param string $username
   * @throws \Exception
   */
  public function setUsername(string $username)
  {
    if (mb_strlen($username) < self::USERNAME_MIN_LENGTH || mb_strlen($username) > self::USERNAME_MAX_LENGTH) {
      throw new \Exceptions\UserProfileValidationException('Invalid length for user_name');
    }
    $this->username = $username;
  }

  /**
   * @return string
   */
  public function getFullName(): string
  {
    return $this->fullName;
  }

  /**
   * @param string $fullName
   * @throws \Exception
   */
  public function setFullName(string $fullName)
  {
    if (mb_strlen($fullName) < self::USERNAME_MIN_LENGTH || mb_strlen($fullName) > self::USERNAME_MAX_LENGTH) {
      throw new UserProfileValidationException('Invalid length for user_name');
    }
    $this->fullName = $fullName;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * @param string $password
   * @throws UserProfileValidationException
   */
  public function setPassword(string $password)
  {
    if (mb_strlen($password) < self::USERNAME_MIN_LENGTH || mb_strlen($password) > self::USERNAME_MAX_LENGTH) {
      throw new UserProfileValidationException('Invalid length for user_name');
    }
    $this->password = $password;
  }

  /**
   * @return string
   */
  public function getConfirmPassword(): string
  {
    return $this->confirmPassword;
  }

  /**
   * @param string $confirmPassword
   * @throws UserProfileValidationException
   */
  public function setConfirmPassword(string $confirmPassword)
  {
    if (mb_strlen($confirmPassword) < self::USERNAME_MIN_LENGTH || mb_strlen($confirmPassword) > self::USERNAME_MAX_LENGTH) {
      throw new UserProfileValidationException('Invalid length for user_name');
    }
    $this->confirmPassword = $confirmPassword;
  }

}