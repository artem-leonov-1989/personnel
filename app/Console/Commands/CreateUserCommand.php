<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUserCommand extends Command
{
    protected $signature = 'user:create';
    protected $description = 'Сворення нового користувача та рандомний пароль';

    public function handle(): void
    {
        $login = $this->ask('Вкажіть логін користувача');
        if (!User::where('users.login', $login)->exists()) {
            $name = $this->ask("Вкажіть ім'я користувача");
            $password = Str::password(rand(10, 15));
            $user = User::create([
                'login' => $login,
                'name' => $name,
                'password' => Hash::make('password'),
            ]);
            $this->info('Пароль користувача - ' . $password);
            return;
        }
        $this->error('Такий логін вже існує!');
    }
}
