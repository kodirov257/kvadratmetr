<?php

namespace App\Console\Commands\User;

use App\Entity\User\User;
use App\UseCases\Auth\RegisterService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class VerifyCommand extends Command
{
    protected $signature = 'user:verify {email}';

    protected $description = 'Verify user email';

    private $service;

    public function __construct(RegisterService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): int
    {
        $email = $this->argument('email');

        /** @var User $user */
        if (!$user = User::where('email', $email)->first()) {
            $this->error('Undefined user with email ' . $email);
            return 0;
        }

        try {
            $this->service->verify($user->id);
        } catch (\DomainException $e) {
            $this->error($e->getMessage());
            return 0;
        }

        $this->info('User is successfully verified');
        return 1;
    }
}
