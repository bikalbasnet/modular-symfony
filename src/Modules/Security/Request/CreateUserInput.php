<?php

namespace App\Modules\Security\Request;

use App\Infrastructure\ParamConverter\RequestDataTransferObject;

class CreateUserInput implements RequestDataTransferObject
{
    public string $login;

    public string $password;

    /**
     * @var array<string>
     */
    public array $roles;
}
