<?php

namespace App\Modules\Security\Domain\Action;

use App\Modules\Security\Persistence\Entity\User;
use App\Modules\Security\Persistence\Repository\UserRepository;
use App\Modules\Security\Request\CreateUserInput;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CreateUserAction
{
    public function __construct(
        private readonly UserPasswordHasherInterface $hasher,
        private readonly UserRepository $userRepository
    )
    {
    }

    public function createUser(CreateUserInput $userInput): User
    {
        $user = new User();
        $user->setEmail($userInput->login);

        $hashedPwd = $this->hasher->hashPassword($user, $userInput->password);
        $user->setPassword($hashedPwd);

        $user->setRoles($userInput->roles);

        $this->userRepository->saveUser($user);

        return $user;
    }
}
