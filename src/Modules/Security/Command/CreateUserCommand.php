<?php

namespace App\Modules\Security\Command;

use App\Modules\Security\Domain\Action\CreateUserAction;
use App\Modules\Security\Request\CreateUserInput;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:create-user',
    description: 'Creates a new user.',
    aliases: ['app:add-user'],
)]
class CreateUserCommand extends Command
{
    public function __construct(private readonly CreateUserAction $createUserAction)
    {
        parent::__construct(null);
    }

    protected function configure(): void
    {
        $this->addArgument('login', InputArgument::REQUIRED, 'User Login');
        $this->addArgument('password', InputArgument::REQUIRED, 'User Password');
        $this->addArgument('roles', InputArgument::REQUIRED, 'User Roles');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $login = $input->getArgument('login');

        $createUserInput = new CreateUserInput();
        $createUserInput->login = $login;
        $createUserInput->password = $input->getArgument('password');
        $createUserInput->roles = explode(',', trim($input->getArgument('roles')));

        $user = $this->createUserAction->createUser($createUserInput);

        $output->writeln(sprintf("Successfully create user '%s' with id '%s' ", $login, $user->getId()));

        return Command::SUCCESS;
    }
}
