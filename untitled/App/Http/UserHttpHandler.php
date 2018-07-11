<?php
/**
 * Created by PhpStorm.
 * User: al3ex
 * Date: 26.5.2018 г.
 * Time: 22:46 ч.
 */

namespace App\Http;


use App\Data\UserDTO;
use App\Service\UserServiceInterface;

class UserHttpHandler extends HttpHandlerAbstract
{
    public function register(UserServiceInterface $userService , array $formData = [])
    {
        if (isset($formData['register'])) {
            $user = UserDTO::create(
                $formData['username'],
                $formData['password'],
                $formData['first_name'],
                $formData['last_name'],
                $formData['born_on']
            );
            $userService->register(
                $user,
                $formData['confirm_password']
            );

            $this->redirect('login.php');
        } else {
            $this->render('users/register');
        }
    }
}