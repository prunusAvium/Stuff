<?php


namespace Controllers;

use Core\ViewInterface;
use Models\UserProfileSaveModel;
use Models\UserProfileViewModel;

class UsersController
{

  private $view;

  public function __construct(ViewInterface $view)
  {
    $this->view = $view;
  }

  public function profile(int $id)
  {

    // TODO -> get from DB  $user = UserService->getOne($id);
    $user = new UserProfileViewModel();
    $user->setId($id);
    $user->setUsername('Pesho');
    $user->setFullName('Peter Petrov');

    $this->view->render('user_profile', $user);
  }

  public function profileSave(int $id, UserProfileSaveModel $user)
  {
    //TODO -> UserService->save($user);
    echo 'Save user:' . $id . ' with name ' . $user->getUsername();
  }

  public function delete(int $id)
  {
    echo 'Delete User ' . $id;
  }

}