<?php

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $user ): bool ;

    public function findOneByUsername(string $username): UserDTO;
}